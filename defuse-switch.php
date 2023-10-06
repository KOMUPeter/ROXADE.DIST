<?php 
require_once('config/config.inc.php');
require_once('config/login.inc.php');

if(isset($_GET['f']) && isset($_GET['n']) && isset($_GET['c']) ){

    if($_GET['c'] == "true"){ $value = 1;  } else { $value = 0 ;}

    __QUERY('UPDATE users SET use'. $_GET['f'] .' = '.  $value .' WHERE useid = ' . $_GET['n'] );

} 