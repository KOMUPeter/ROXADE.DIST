<?php
include('config/config.inc.php');

// echo 'start';

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Verify the CSRF token

    verifyToken();


    // Get user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate the user
    $user = authenticateUser($email, $password);

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
        // si le cookie return url est présent ou non , alors appeler cette header.

        if (isset($_COOKIE['return_url'])) {
            $return_url = $_COOKIE['return_url'];
            header("location: $return_url");
            // echo 'isset return_url';
            exit;
            
        } else {
            // Redirect to the user's dashboard or another page
            // echo 'redirection index';

            header('location: index.php');
            exit;
        }

    } else {
        // Authentication failed
        // echo 'authentification failed';
        $error_message = 'Email ou mot de passe invalide';
        header('location:login.php');
        exit;
    }

}
// header('location: login.php');
// exit;

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

