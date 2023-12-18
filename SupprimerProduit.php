<?php
//Supprimer un produit
include "./public/headers.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    SupprimerProduitById($id);
}
?>