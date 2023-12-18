<?php
// Recuperer les produits par ID et les afficher

include "./public/headers.php";
$id = $_GET['id'];
$product = getProductById($id);
if (isset($_POST['addCart'])) {

    $quantite = $_POST['Quant'];

    if ($quantite > 0) {
        addCart($id, $quantite);
    }
}
?>
<main>
    <section>
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="login-container">
                            <center>
                                <h3 class="mb-3">Details des Produits</h3>
                            </center>
                            <hr />
                            <form method="post">
                                <div class="mb-3">
                                    <center><img src="<?php echo $product['img_url']; ?>" width="100" height="100"
                                            style="border-radius:5px;">
                                    </center><br>
                                    <label for="name"><b>Nom</b></b></label>
                                    <input type="text" class="form-control" name="name"
                                        value="<?php echo $product['name']; ?>" placeholder="Nom du Produit" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="price"><b>Prix</b></label>
                                    <input type="text" class="form-control" name="price"
                                        value="<?php echo $product['price']; ?>" placeholder="Prix du Produit" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="Quant" class="form-label"><b>Quantité</b></label>
                                    <input type="number" class="form-control" name="Quant" min=0 max=<?php echo $product['quantity']; ?> required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label"><b>Description</b></label>
                                    <textarea class="form-control" name="description" rows="3"
                                        readonly><?php echo $product['description']; ?></textarea>
                                </div>
                                <center>
                                    <div class="mb-3 d-grid gap-2">
                                        <button name="addCart"class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i> <b>Ajouter au Panier</b></button> 
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include "./footer.php";
?>