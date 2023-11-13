<?php
include('config/config.inc.php');

// echo 'start';

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Verify the CSRF token (à implémenter)
    verifyToken();

    // Get client input
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : '';
    
    $user = authenticateUser($email, $password);

    $client = authenticateContact($email, $password);

    if ($user !== false) {
        // User authenticated successfully
        // Création du token dans la base de données
        $codeToken = generateUserToken();
        __QUERY('INSERT INTO tokens (
        tokcode, 
        tokstart, 
        tokend, 
        tokuse, 
        tokip, 
        toknav
        ) VALUES (
        "' . __STRING($codeToken) . '", 
        NOW(), 
        DATE_ADD(NOW(), INTERVAL 86400 SECOND), 
        ' . $user->getUseid() . ', 
        "' . __STRING($_SERVER['REMOTE_ADDR']) . '", 
        "' . __STRING($_SERVER['HTTP_USER_AGENT']) . '"    
        )'
        );

        // Set a COOKIE for the user
        setcookie('token', $codeToken, time() + 86400, '/');
    } elseif ($client !== false) {
        // Client authenticated successfully
        // Création du token dans la base de données pour le client
        $codeToken = generateUserToken();
        __QUERY('INSERT INTO tokens (
        tokcode, 
        tokstart, 
        tokend, 
        tokcct, 
        tokip, 
        toknav
        ) VALUES ( 
        "' . __STRING($codeToken) . '", 
        NOW(), 
        DATE_ADD(NOW(), INTERVAL 86400 SECOND), 
        ' . $client->getCctid() . ', 
        "' . __STRING($_SERVER['REMOTE_ADDR']) . '", 
        "' . __STRING($_SERVER['HTTP_USER_AGENT']) . '"    
        )'
        );

        // Set a COOKIE for the client
        setcookie('token', $codeToken, time() + 86400, '/');
    } else {
        // Authentication failed
        // echo 'authentification failed';
        $error_message = 'Email ou mot de passe invalide';
        header('location:login.php');
        exit;
    }

    // si le cookie return_url est présent ou non, alors appeler cette header.
    if (isset($_COOKIE['return_url'])) {
        $return_url = $_COOKIE['return_url'];
        header("location: $return_url");
        exit;
    } else {
        // Redirect to the user's dashboard or another page
        // echo 'redirection index';
        header('location: index.php');
        exit;
    }
}

function authenticateUser($email, $password)
{
    if (!$result = __FETCH('SELECT * FROM users WHERE useactive=1 AND uselogin="' . __STRING($email) . '" AND usepassword=PASSWORD("' . __STRING($password) . '")'))
        return (false);
    // if (!password_verify($password, $result['usepassword'])) return (false);

    // Password is correct, create a User object and return it
    $user = new user();
    $user->loadFromID($result['useid']);
    return $user;
}

function authenticateContact($email, $password)
{    if (!$result = __FETCH('SELECT * FROM clients_contacts WHERE cctactive =1 AND cctemail ="' . __STRING($email) . '" AND cctpassword=PASSWORD("' . __STRING($password) . '")'))

        return (false);

    $client = new ClientContacts();
    $client->loadFromcctID($result['cctcli']);
    return $client;
}