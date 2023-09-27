<?php

$connectionOk = false;

if (isset($_COOKIE['token'])) {

    // Validate the token
    if ($row = __FETCH('SELECT * FROM tokens WHERE tokcode="'.__STRING($_COOKIE['token']).'" AND tokend >=NOW()')) {
        $userConnected = new User();
        if ($userConnected->loadFromID($row['tokuse'])) {
            if ($userConnected->getUseActive() == 1) {
                $connectionOk = true;
                $current_page_url = $_SERVER['REQUEST_URI'];
                setcookie('return_url', $current_page_url, time() + 86400, '/'); 
            }
        }
    }
}

// if (!$connectionOk) {
//     // Delete the 'return_url' cookie
//     setcookie('return_url', '', time() - 3600, '/');

//     // Set a token timeout and replace with actual valiable
//     setcookie('token', '', time() - 3600, '/');

//     header('Location: login.php');
//     exit;
// } else {
//     // Authentication failed
//     $error_message = 'Email ou mot de passe invalide';
// }


if (!$connectionOk) {
    // delete cookie
    // set token :: time -3600 to setout token
    header('location: login.php');
    exit;
}
?>



    <!-- <a href="../../demo44/dist/index.html" class="menu-link active">
    <span
        class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
        <i
            class="ki-outline ki-element-11 text-primary fs-1"></i>
    </span>
    <span class="d-flex flex-column">
        <span class="fs-6 fw-bold text-gray-800">Default</span>
        <span class="fs-7 fw-semibold text-muted">Reports &
            statistics</span>
    </span>
</a>
<a href="defuse.php" class="menu-link active">
    <span
        class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
        <i
            class="ki-outline ki-element-11 text-primary fs-1"></i>
    </span>
    <span class="d-flex flex-column">
        <span class="fs-6 fw-bold text-gray-800">DEFUSE</span>
        <span class="fs-7 fw-semibold text-muted">defuse</span>
    </span>
</a> -->
