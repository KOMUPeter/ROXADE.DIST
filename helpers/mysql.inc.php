<?php

$databaseLink = new mysqli(
    'localhost',
    'sup781982',
    'pm1Gxj55!{6o@fV',
    'support_roxade'
);

if ($databaseLink->connect_errno) {
    printf("Échec de la connexion : %s\n", $databaseLink->connect_error);
    die;
}

$databaseLink->query('SET NAMES "UTF8"');

function __QUERY($s) {
    global $databaseLink;
    if (!$result = $databaseLink->query($s)) {
        die('<b style="font-family: Tahoma, arial; font-size: 12px; color: #000;">QUERY Error</b><br /><span style="font-family: Tahoma, arial; font-size: 12px; color: #000;">Query string <b>'.$s.'</b><br /><span style="color: red;">Error > ' . $databaseLink->error . '</span></span>');
    }
    return($result);
}

function __ARRAY($sql) {
    $row = $sql->fetch_array();
    return($row);
}

function __FETCH($s) {
    $sql = __QUERY($s);
    if ($row = $sql->fetch_array()) {
        return($row);
    }
    return(false);
}

function __ROWS($s) {
    return($s->num_rows);
}

function __AFFECTED() {
    global $databaseLink;
    return($databaseLink->affected_rows);
}

function __INSERT_ID() {
    global $databaseLink;
    return($databaseLink->insert_id);
}

function __UUID() {
    $row = __FETCH('SELECT UUID() AS uuid');
    return($row['uuid']);
}

function __STRING($s) {
    global $databaseLink;
    return($databaseLink->real_escape_string(stripslashes($s)));
}

?>
