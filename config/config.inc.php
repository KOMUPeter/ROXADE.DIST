<?php
error_reporting(E_ALL); // show all errors

session_start();

if ( !defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__FILE__));
}

const ADRESSE_IP_MAINTENANCE = "45.89.174.232";

const SITE_URL = 'https://support.roxade.fr/';


const SMTP_HOST = 'mail.gandi.net';
const SMTP_LOGIN = 'support@roxade.fr';
const SMTP_PASSWORD = 'E*9hwvkPT7b7M4%yE(';
const SMTP_PORT = 587;

const GLOBAL_HTML_TITLE = "ROXADE | Support clients";

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

require_once('autoload.php');
require_once('fpdf.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$application = new Application();
?>