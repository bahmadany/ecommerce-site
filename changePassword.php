<?php
include "./public/headers.php";
$users = getAllUsers();

// Changer le mot de passe d'un utilisateur

if (isset($_SESSION['utilisateur'])) {
    $id = $_SESSION['utilisateur'];
    $user = getUserById($id);
    if (isset($_POST['update'])) {
        $ancien_mot_de_passe = $_POST['ancien_mot_de_passe'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $c_mot_de_passe = $_POST['c-mot_de_passe'];

        if (
            !empty($mot_de_passe) || !empty($c_mot_de_passe)
        ) {
            if ($mot_de_passe === $c_mot_de_passe) {
                UpdatePassword($id, $mot_de_passe);
            }
        }
    }
}

?>

<section>
    <div class="registerfrm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-container">
                        <center>
                            <h3 class="mb-3">Nouveau Mot de Passe</h3>
                        </center>
                        <hr>
                        <form method="post">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="exampleInputpassword" class="form-label">
                                        <b>Ancien Mot de Passe</b></label>
                                <input type="password" name="ancien_mot_de_passe" class="form-control" id="exampleInputpassword" value="***************" >
                                        
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputpassword" class="form-label">
                                        <b>Nouveau Mot de Passe</b></label>
                                    <input type="password" name="mot_de_passe" class="form-control"
                                        id="exampleInputpassword"  placeholder="Entrer votre nouveau mot de passe" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputpassword" class="form-label">
                                        <b>Confirmer Mot de Passe</b></label>
                                    <input type="password" name="c-mot_de_passe" class="form-control"
                                        id="exampleInputpassword" placeholder="Confirmer votre nouveau mot de passe" required>
                                </div>
                                <br>
                                    <div class="mb-3 d-grid gap-2 ">
                                        <button type="submit" name="update" class="btn btn-primary">Modifer</button>
                                    </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

</body>

</html>