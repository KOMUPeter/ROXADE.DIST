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

// for multilingual support
$databaseLink->query('SET NAMES "UTF8"');

// checks for execution success and if there's an error, it terminates the script and displays an error message with details 
function __QUERY($s) {
    global $databaseLink;
    if (!$result = $databaseLink->query($s)) {
        die('<b style="font-family: Tahoma, arial; font-size: 12px; color: #000;">QUERY Error</b><br /><span style="font-family: Tahoma, arial; font-size: 12px; color: #000;">Query string <b>'.$s.'</b><br /><span style="color: red;">Error > ' . $databaseLink->error . '</span></span>');
    }
    return($result);
}

function __ARRAY($sql) {
    // Retrieves the next row of a result set as an associative array, numeric, or both
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
    // Returns the number of rows in the result set
    return($s->num_rows);
}


function __AFFECTED() {
    // Returns the number of rows affected by the last MySQL operation
    global $databaseLink;
    return($databaseLink->affected_rows);
}

function __INSERT_ID() {
    global $databaseLink;
    // Returns the value generated for an AUTO_INCREMENT column by the last query
    return($databaseLink->insert_id);
}

function __UUID() {
    $row = __FETCH('SELECT UUID() AS uuid');
    return($row['uuid']);
}

function __STRING($s) {
    global $databaseLink;
    // escape characters within a string to make it safe to use in SQL queries
    return($databaseLink->real_escape_string(stripslashes($s)));
}

?>
