<?php
// Gérer les différentes commandes
include "./public/headers.php";
$commandes = getAllCommands();
?>
<!--Afficher toutes les commandes de la BD-->

<main>
    <section>
        <div class="registerfrm">
        <hr> <center>
                <h2><b>Gestion des Commandes</b></h2
            </center><hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID Client</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date de Commande</th>
                                    <th scope="col">Panier</th>
                                    <th scope="col">Prix Total</th>
                                    <th scope="col">Management</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($commandes as $commande) {
                                    $id_user = $commande['user_id'];
                                    $user = getUserById($id_user) ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $commande['id']; ?>
                                        </th>
                                        <td>
                                            <?php echo $commande['user_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['lname'] . " " . $user['fname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $commande['date']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $tab_commands = getCommandById($commande['id']);
                                            foreach ($tab_commands as $key => $value) {
                                                ?>
                                                <?php echo $value['quantity']; ?>
                                            <?php } ?>
                                        </td>                                       
                                        <td>
                                            <?php echo $commande['total']; ?>
                                        </td>
                                        <td>
                                            <a href="./SupprimerCommand.php?id=<?php echo $commande['id']; ?>"
                                                class="btn btn-danger">
                                                <i class="bi bi-trash3-fill">
                                                </i>
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