<?php
include "./public/headers.php";
?>
<!--Afficher le profil de l'utilisateur connecté-->

<main>
  <section style="background-color: #eee;">
    <div class="container py-5">

    
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="images/boy.png" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                <div class="bg-primary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                    <h3 class="h2 text-white mb-0"><?php echo $_SESSION['utilisateur_prenom'] . " " . $_SESSION['utilisateur_nom']; ?></h3>
                    <span class="text-warning"> <?php echo $_SESSION['utilisateur_username'] ?></span>
                </div>
    
              <p class="text-muted mb-1"><b>Client :</b>
                <?php echo $_SESSION['utilisateur']; ?>
              </p>
              <p class="text-muted mb-1"><b>Pseudo :</b>
                 <?php echo $_SESSION['utilisateur_username'] ?>
              </p>
              
              <div class="d-block justify-content-center mb-2 ">
                <a href="editMonProfil.php" class="btn btn-danger">Editer</a>
              </div>
              <div class="d-block justify-content-center mb-2">
                <a href="changePassword.php" class="btn btn-warning">Nouveau Mot de Passe</a>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><b>Prénom</b></p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                  <?php echo $_SESSION['utilisateur_prenom'] ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><b>Nom</b></p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                  <?php echo $_SESSION['utilisateur_nom']; ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><b>Email</b></p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php echo $_SESSION['utilisateur_email']; ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><b>Phone</b></p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    +1 (438) 987 6545
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0"><b>Rôle</b></p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                  <?php
                      $role_id = $_SESSION['utilisateur_role_id'];

                      if ($role_id == 0) {
                          echo "SuperAdmin";
                      } elseif ($role_id == 1) {
                          echo "Admin";
                      } elseif ($role_id == 2) {
                          echo "Client";
                      } else {
                          echo "Inconnu";
                      }
                    ?>
     
                  </p>
                </div>
              </div>
              <hr>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>
<?php include './footer.php'; ?>