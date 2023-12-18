<?php
//Supprimer une commande
include "./public/headers.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    SupprCommandById($id);
}
?>