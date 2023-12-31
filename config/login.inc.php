<?php

$connectionOk = false;

if (isset($_COOKIE['token'])) {

    // Validate the token
    if ($row = __FETCH('SELECT * FROM tokens WHERE tokcode="' . __STRING($_COOKIE['token']) . '" AND tokend >=NOW()')) {
        if ($row['tokuse'] != 0) {
            $userConnected = new User();
            if ($userConnected->loadFromID($row['tokuse'])) {
                if ($userConnected->getUseActive() == 1) {
                    $connectionOk = true;
                    $current_page_url = $_SERVER['REQUEST_URI'];
                    setcookie('return_url', $current_page_url, time() + 86400, '/');
                    // rediriger
                }
            } else {
                unset($userConnected);
            }
        }
        if ($row['tokcct'] != 0) {
            $contactConnected = new ClientContacts();
            if ($contactConnected->loadFromcctID($row['tokcct'])) {
                if ($contactConnected->getCctactive() == 1) {
                    $connectionOk = true;
                    $current_page_url = $_SERVER['REQUEST_URI'];
                    setcookie('return_url', $current_page_url, time() + 86400, '/');
                    // rediriger
                }
            } else {
                unset($contactConnected);
            }
        }
    }
} else {
    header('Location: login.php');
    exit;
}

if (!$connectionOk) {
    // Delete the 'return_url' cookie
    setcookie('return_url', '', time() - 3600, '/');

    // Set a token timeout and replace with actual valiable
    setcookie('token', '', time() - 3600, '/');

    header('Location: login.php');
    exit;
}

?>