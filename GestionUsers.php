<?php
include "./public/headers.php";
$users = getAllUsers();
?>

<!--Afficher tous les utilisateurs de la BD-->
<main>
    <section>
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>Liste des utilisateurs</h4>
                        </center>
                        <hr>
                            <table class="table table-bordered" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>N°</th>
                                        <th>Username</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $user['id']; ?></th>
                                            <td><?php echo $user['user_name']; ?></td>
                                            <td><?php echo $user['lname']; ?></td>
                                            <td><?php echo $user['fname']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td>
                                                <?php 
                                                    $role_id = $user['role_id'];
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
                                            </td>
                                            <td>
                                                <a href="editUser.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm" title="Éditer" style="border-radius: 5px;">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                                <a href="SupprimerUser.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" title="Supprimer" style="border-radius: 5px;">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>