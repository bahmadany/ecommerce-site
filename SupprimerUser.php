<?php
//Supprimer un utilisateur
include "./public/headers.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    SupprimerUser($id);
}
@header("location: GestionUsers.php");
?>