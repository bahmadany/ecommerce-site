<?php
// Formulaire d'inscirption d'un utilisateur
include "./public/headers.php";
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $rue = $_POST['rue'];
    $numero_rue = $_POST['numero_rue'];
    $ville = $_POST['ville'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $pays = $_POST['pays'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $c_mot_de_passe = $_POST['c-mot_de_passe'];
    if (!empty($nom) && !empty($username) && !empty($prenom) && !empty($email) && !empty($rue)&& !empty($numero_rue)&& !empty($province) && !empty($zipcode) && !empty($pays) && !empty($rue) && !empty($mot_de_passe) && !empty($c_mot_de_passe)) {
        if ($mot_de_passe === $c_mot_de_passe) {
            register($username, $email, $mot_de_passe, $prenom, $nom, $rue, $numero_rue, $ville, $province, $zipcode, $pays);

        }
    }
}
?>

<?php

?>

<section>
    <div class="registerfrm">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="login-container">
                        <center>
                            <h3 class="mb-3">SIGN UP</h3>
                        </center>
                        <form method="post">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="username" class="form-label"> <b>Username</b></label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label"> <b>Nom</b></label>
                                    <input type="text" name="nom" class="form-control" id="nom">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label"><b>Prénom</b></label>
                                    <input type="text" name="prenom" class="form-control" id="prenom">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"><b>Email</b></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="rue" class="form-label"> <b>Rue</b></label>
                                    <input type="text" name="rue" class="form-control" id="rue">
                                </div>
                                <div class="mb-3">
                                    <label for="numero_rue" class="form-label"><b>Numero Rue</b></label>
                                    <input type="text" name="numero_rue" class="form-control" id="numero_rue">
                                </div>
                                <div class="mb-3">
                                    <label for="ville" class="form-label"> <b>Ville</b></label>
                                    <input type="text" name="ville" class="form-control" id="ville">
                                </div>
                                <div class="mb-3">
                                    <label for="province" class="form-label"><b>Province</b></label>
                                    <input type="text" name="province" class="form-control" id="province">
                                </div>
                                <div class="mb-3">
                                    <label for="zipcode" class="form-label"><b>Code Postal</b></label>
                                    <input type="text" name="zipcode" class="form-control" id="zipcode">
                                </div>
                                <div class="mb-3">
                                    <label for="pays" class="form-label"><b>Pays</b></label>
                                    <input type="text" name="pays" class="form-control" id="pays">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputpassword" class="form-label"><b>Password</b></label>
                                    <input type="password" name="mot_de_passe" class="form-control"
                                        id="exampleInputpassword">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputpassword" class="form-label"><b>Confirm Password</b></label>
                                    <input type="password" name="c-mot_de_passe" class="form-control"
                                        id="exampleInputpassword">
                                </div>
                                <br>
                                <div class="d-grid gap-2">
                                    <button type="submit" name="register" class="btn btn-primary">S'Inscrire</button>
                                </div>
                                <label class="form-check-label" for="exampleCheck1">Se Connecter</label><a
                                    href="connexion.php" style="color: navy; font-weight:bold; text-decoration:none;">
                                    Connexion</a>
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