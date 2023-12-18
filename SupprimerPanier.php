<?php
// Supprimer un Panier
session_start();
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
@header('Location: ./MonPanier.php');
?>