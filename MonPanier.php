<?php
// Gestion d'un Panier - Modifier ou Supprimer un produit du panier
include "./public/headers.php";
$grandTotal = 0;
$cart = getAllCart();

if (isset($_POST['ModifierProduit'])) {
    $id = $_POST['id_produit'];
    $quant = $_POST['Quant'];
    addCart($id, $quant, false);
}

if (isset($_POST['SupprimerProduit'])) {
    $id = $_POST['id_produit'];
    unset($_SESSION['cart'][$id]);
    @header('Location: ./MonPanier.php');
    exit();
}

if (isset($_POST['payer'])) {
    if (isset($_SESSION['utilisateur'])) {
        $id_user = $_SESSION['utilisateur'];
        AjoutCommand($_SESSION['totals'], $id_user);
        emptyCart();

    } else {
        @header('Location: ./connexion.php');
        exit();
    }
}

?>

<main>
    <section>
        <div class="registerfrm">
            <center>
                <h2>Mon Panier <i class="bi bi-cart"></i></h2>
                <hr width="600px"><br>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($cart as $idProduct => $quant) {
                                    $product = getProductById($idProduct);
                                    $total = $quant * $product['price'];
                                    $grandTotal += $total;
                                    $_SESSION['totals'] = $grandTotal;
                                    ?>
                                    <form method="post">
                                        <tr>
                                            <input type="hidden" name="id_produit" value="<?php echo $idProduct; ?>">
                                            <td>
                                                <?php echo $product['name']; ?>
                                            </td>
                                            <td><input min="1" max="<?php echo $product['quantity']; ?>" type="number"
                                                    value="<?php echo $quant; ?>" name="Quant">
                                            </td>
                                            <td>
                                                <?php echo $product['price']; ?>
                                            </td>
                                            <td>
                                                <?php echo $product['description']; ?>
                                            </td>
                                            <td>
                                                <?php echo $total; ?>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-info" name="ModifierProduit">
                                                    <i class="bi bi-cart-plus-fill"></i>
                                                </button>
                                                <button type="submit" class="btn btn-danger" name="SupprimerProduit">
                                                   <i class="bi bi-cart-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <center>
                                        <h3>Prix Total: <b>$
                                                <?php echo $grandTotal; ?>
                                            </b></h3>
                                    </center>
                                </div>
                            </div><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post">
        <center>
            <button class="btn btn-info" name="payer" style="width: 300px;">
                <b>Payez</b> <i class="bi bi-credit-card-2-front-fill"></i>
            </button>
            <br><br>
            <div id="paypal-payment-button" name="payer" style="width: 300px;"></div>
        </center>

        </form>
    </section>
</main>

<script
    src="https://www.paypal.com/sdk/js?client-id=AeNR5aCDiC3uGG8jDi6KBG_RgBSxh1GcIQ80ANEo_cE-adwN62-Zfaym-lsaJkk0ssHuc1XLgkl2uEU-&currency=CAD"></script>
<script src="./public/paypal.js"></script>

</body>

</html>