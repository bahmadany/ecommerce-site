<?php
// Modifier les informations d'un utilisateur
include "./public/headers.php";
$users = getAllUsers();
if (isset($_SESSION['utilisateur'])) {
 // Utiliser l'id d'un utilisateur s'il existe, sinon celui de la session
     $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['id'];
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
            UpdateUser($id, $user_name, $nom, $prenom, $email, $role_id);
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
                            <h2 class="mb-3">Modifier un utilisateur</h2>
                        </center>
                        <hr>
                        <form method="post">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="user_name" class="form-label"><b>Username
                                            </b></label>
                                    <input type="text" name="user_name" class="form-control" id="user_name"
                                        value="<?php echo $user['user_name']; ?>">
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
                                    <label for="role_id" class="form-label">Rôle</label>
                                    <select name="role_id" class="form-control" id="role_id">
                                          <option value="0" <?php echo ($user['role_id'] == 0) ? 'selected' : ''; ?>>SuperAdmin</option>
                                        <option value="1" <?php echo ($user['role_id'] == 1) ? 'selected' : ''; ?>>Admin</option>
                                        <option value="2" <?php echo ($user['role_id'] == 2) ? 'selected' : ''; ?>>Client</option>
                                    </select>
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

