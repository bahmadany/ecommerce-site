<?php
// Récuperer les informations d'un profil et les modifier
include "./public/headers.php";
$users = getAllUsers();

if (isset($_SESSION['utilisateur'])) {
    $id = $_SESSION['utilisateur'];
    $user = getUserById($id);
    if (isset($_POST['register'])) {
        $user_name = $_POST['user_name'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role_id = $_POST['role_id'];

        if (
            !empty($nom) || !empty($prenom) || !empty($email) || !empty($user_name) || !empty($role_id)
        ) {
            UpdateUser2($id, $nom, $prenom, $email, $role_id, $user_name);
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
                            <h3 class="mb-3">Editer mon Profile</h3>
                        </center>
                        <hr>
                        <form method="post">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="user_name" class="form-label"><b>Username
                                            </b></label>
                                    <input type="text" name="user_name" class="form-control" id="user_name"
                                        value="<?php echo $user['user_name']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label"><b>Nom
                                            </b></label>
                                    <input type="text" name="nom" class="form-control" id="nom"
                                        value="<?php echo $user['lname']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label"><b>Prénom
                                            </b></label>
                                    <input type="text" name="prenom" class="form-control" id="prenom"
                                        value="<?php echo $user['fname']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1"> <b>Email</b></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        value="<?php echo $user['email']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="role_id" class="form-label">Role Id</label>
                                    <input type="text" name="role_id" class="form-control" id="role_id"
                                        value="<?php echo $user['role_id']; ?>">
                                </div>
                                <br>
                                    <div class="mb-3 d-grid gap-2">
                                        <button type="submit" name="register" class="btn btn-primary">Modifier</button>
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