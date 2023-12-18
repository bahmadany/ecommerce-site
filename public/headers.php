<?php
include './includes/fonctions.php';
$quantity = qteCart();
?>

<!--Entêtes et sections-->

<!DOCTYPE html>
<html lang="fr">

<style>
    
    .navbar-text {
      flex-grow: 1; /* Permet au texte de prendre l'espace disponible */
      text-align: center; /* Centre le texte */ 
    }

    .ml-auto {
      margin-left: auto !important; /* Déplace le bouton à droite */
    }
    .navbar-brand img {
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }
</style>
  
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="cache-control" content="no-cache">
  <title>kadyStore</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</head>

<!-- Header -->

<header>
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <a class="navbar-brand" href="home.php">
    <img src="./images/logo.png" width="70" class="d-inline-block align-top" alt="logo">
  </a>
  <span class="navbar-text mx-2 text-light">Bienvenue chez KadyStore</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
        // Si un utilisateur s'est connecté, afficher le menu
        if (isset($_SESSION['utilisateur'])) {
          $utilisateur_prenom = $_SESSION['utilisateur_prenom'];
          $utilisateur_nom = $_SESSION['utilisateur_nom']; ?>

          <li class="nav-item">
              <a class="nav-link active btn btn-primary" style="margin-left: 10px;" href="MonProfil.php">
                  <i class="bi bi-person-circle" style="border: 2px solid #ffffff; padding: 5px; border-radius: 50%;"></i>
                  <?php echo $utilisateur_prenom ." ".$utilisateur_nom; ?>
              </a>
          </li>   
        
          <li class="nav-item">
            <a class="nav-link active" href="Products.php"><i class="bi bi-shop"></i> Achats</a>
          </li>
        
          <li class="nav-item">
            <a href="MonPanier.php" class="btn btn-primary position-relative">
                <i class="bi bi-cart4"></i>
                <span class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle">
                    <?php echo $quantity; ?>
                </span>
            </a>
          </li>
          <?php 
          // Si l'utilisateur est un superadmin, montrer le button Gestion
          if ($_SESSION['utilisateur_role_id'] == "0") { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="bi bi-wrench-adjustable-circle"></i> Gestion</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="GestionProduits.php"><i class="bi bi-basket-fill"></i> Commandes </a>
                </li>
                <hr class="dropdown-divider"> 
                <li><a class="dropdown-item" href="GestionUsers.php"><i class="bi bi-people"></i> Utilisateurs</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="GestionCommande.php"><i class="bi bi-bag-fill"></i> Achats</a></li>
              </ul>
            </li>
          <?php } ?>
        <?php } else ?>
        <?php
        // Si c'est un client, montrer le menu normal sans le button gestion
        if (!isset($_SESSION['utilisateur'])) {
          ?>          
          <li class="nav-item ml-auto"> 
        <form action="connexion.php" method="get" class="form-inline ">
            <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Se Connecter</button>
        </form>
    </li>
        <?php } else { ?>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <li class="nav-item ml-auto"> 
        <form action="Deconnexion.php" method="get" class="form-inline ">
            <button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Se Deconnecter</button>
        </form>
    </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>

