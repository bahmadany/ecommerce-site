<?php
include "./public/headers.php";
$products = getAllProducts();
?>
<!--Afficher tous les produits disponibles de la BD-->

<main>
    <section class="products">
        <div class="container">
            <center>
                <h1>Produits Disponibles</h1>
            </center>
            <hr>
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <div class="col-md-6">
                        <div class="product">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?php echo $product['img_url']; ?>" class="img-fluid my_img" alt="<?php echo $product['name']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <h2><?php echo $product['name']; ?></h2>
                                    <p><b>Description:</b> <?php echo $product['description']; ?></p>
                                    <span class="price"><b>Prix:</b> $<?php echo $product['price']; ?></span>
                                    <br>
                                    <a href="DetailsProduit.php?id=<?php echo $product['id']; ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i> Voir Produit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php

include "./footer.php";
?>