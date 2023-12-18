<?php
// Gérer les différents produits
include "./public/headers.php";
$products = getAllProducts();
?>

<!--Afficher tous les produits de la BD-->

<main>
    <section>
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h4>Gestion des Produits</h4>
                        </center>
                        <hr>
                        <div class="mb-3">
                            <center><a href="AjouterProduit.php" class="btn btn-success">Ajouter un Produit</a>
                            </center>
                        </div>
                        <table class="table table-striped table-hover" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $product['id']; ?></th>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['price']; ?></td>
                                        <td><?php echo $product['quantity']; ?></td>
                                        <td><?php echo $product['description']; ?></td>
                                        <td><img src="<?php echo $product['img_url']; ?>" width="50" height="50" alt=""></td>
                                        <td>
                                            <a href="./ModifierProduit.php?id=<?php echo $product['id']; ?>" class="btn btn-primary" title="Modifier" style="border-radius: 5px;">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="./SupprimerProduit.php?id=<?php echo $product['id']; ?>" class="btn btn-danger" title="Supprimer" style="border-radius: 5px;">
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