<?php
error_reporting(E_ALL); // show all errors

session_start();

if ( !defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__FILE__));
}

const ADRESSE_IP_MAINTENANCE = "45.89.174.232";

const SITE_URL = 'https://support.logidents.com/';


const SMTP_HOST = 'localhost';
const SMTP_LOGIN = 'sup441092';
const SMTP_PASSWORD = 'j8rWaxt6vCP7Gj(';
const SMTP_PORT = '21';

const GLOBAL_HTML_TITLE = "LOGIDENTS | Support clients";

setlocale(LC_TIME, "fr_FR");

/*
 * Fonctions
 */
$files = scandir($_SERVER['DOCUMENT_ROOT'].'/helpers');
foreach($files as $file) if ($file != '.' && $file != '..') require_once ($_SERVER['DOCUMENT_ROOT'].'/helpers/' . $file);

/*
 * Classes
 */
$files = scandir($_SERVER['DOCUMENT_ROOT'].'/classes');
foreach($files as $file) if ($file != '.' && $file != '..') require ($_SERVER['DOCUMENT_ROOT'].'/classes/' . $file);

// require_once('PHPMailerAutoload.php');
require_once('fpdf.php');

?>