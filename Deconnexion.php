<?php
// Rénitialiser une session - Se deconnecter
session_start();
unset($_SESSION['utilisateur']);
@header('Location: ./home.php');

?>