<?php

function randomToken() {
    $_SESSION['token-num'] = mt_rand(100000, 999999);
    $_SESSION['token-id-'.$_SESSION['token-num']] = bin2hex(random_bytes(mt_rand(64,96)));
    $_SESSION['token-time'] = time();
}

function addToken() {
    echo '<input type="hidden" name="token" value="'.$_SESSION['token-id-'.$_SESSION['token-num']].'">';
}

function verifyToken($withTime = true)
{
    $_SESSION['token-ok'] = false;

    /*
     * Vérification que les variables de session existent bien
     */
    if (isset($_SESSION['token-id-'.$_SESSION['token-num']]) && isset($_SESSION['token-num'])) {
        if (isset($_SESSION['token-time'])) {
            /*
             * Vérification de la concordance des variables de session avec les variables du post (délai accordé de 15mn)
             */
            if ($_SESSION['token-id-'.$_SESSION['token-num']] == $_POST['token']) {
                if ($withTime == false) {
                    $_SESSION['token-ok'] = true;
                } else {
                    $difference = (int)(time() - $_SESSION['token-time']);
                    if ($difference <= 900) $_SESSION['token-ok'] = true;
                }
            }
        }
    }

    if ($_SESSION['token-ok'] == false) {
        die ('<b>Erreur s&eacute;curit&eacute; !</b><br /><a href="index.php">Cliquez ici</a> pour continuer sur le site.');
    }
}

function generateStringUserToken() {
    $alphanum = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $s = "";
    while (strlen($s) < 128) $s .= substr($alphanum, mt_rand(0, strlen($alphanum)-1), 1);
    return ($s);
}

function generateUserToken() {
    $s = generateStringUserToken();
    while (__FETCH('SELECT tokcode FROM tokens WHERE tokcode="'.__STRING($s).'"')) $s = generateStringUserToken();
    return ($s);
}

function checkUserToken() {
    if (!isset($_COOKIE['use-token'])) {
        header('location: /login.php');
        exit;
    }
    if (!$tok = __FETCH('SELECT * FROM tokens WHERE toknum="'.__STRING($_COOKIE['use-token']).'"')) {
        setcookie('use-token', '', time()-3600, '/', '', true);
        header('location: /login.php');
        exit;
    }
    __QUERY('UPDATE tokens SET tokget=NOW() WHERE tokid='.$tok['tokid']);
    if ($tok['tokend'] < date('Y-m-d H:i:s')) {
        setcookie('use-token', '', time()-3600, '/', '', true);
        header('location: /login.php');
        exit;
    }
    setcookie('use-token', $tok['toknum'], strtotime($tok['tokend']), '/', '', true);
    $utilisateur = new User();
    if (!$utilisateur->LoadFromID($tok['tokuse'])) {
        setcookie('use-token', '', time()-3600, '/', '', true);
        header('location: /login.php');
        exit;
    }
    $_SESSION['user_id'] = $utilisateur->getUseid();
}
?>
