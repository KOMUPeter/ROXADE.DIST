<?php 
// Détruire le cookie "return_url"
setcookie('return_url', '', time() - 3600, '/');

// Rediriger l'utilisateur vers la page de connexion
header('Location: login.php');
exit;
?>