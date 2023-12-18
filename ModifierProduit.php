<?php
include "./public/headers.php";
// Formulaire de modification d'un produit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = getProductById($id);
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $img = $_FILES["img"]["name"];

        if (empty($name) || empty($price) || empty($description) || empty($quantity)) {
            echo "Veuillez remplir tous les champs !!";
        } else {
            if (isset($_FILES["img"]) && $_FILES["img"]["error"] === UPLOAD_ERR_OK) {
                $img_name = $_FILES["img"]["name"];
                $img_tmp = $_FILES["img"]["tmp_name"];
                $img_url = "images/" . basename($img_name);
    
                $image_type = strtolower(pathinfo($img_url, PATHINFO_EXTENSION));
                if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                    echo "Only images with extension JPG, JPEG, PNG et GIF are allowed.";
                    exit();
                }

                if (move_uploaded_file($img_tmp, $img_url)) {
                    ModifierProduit($id, $name, $price, $quantity, $description, $img_url);
                }
            } else {
                ModifierProduit($id, $name, $price, $quantity, $description, $img_url);
            }
        }
    }
}

?>
<main>
    <section>
        <div class="registerfrm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h2>Modifier Produit</h2>
                        </center>
                        <hr>
                        <!--Form to add new product-->
                        <div class="registerfrm">
                            <form method="post" enctype="multipart/form-data">
                            <img src="<?php echo $product['img_url']; ?>" width="100" height="100"
                                        style="border-radius:5px;">
                                <div class="mb-3">
                                    <label for="img" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="img">
                                </div>
                                <div class="mb-3">
                                    <label for="name"><b>Nom</b></b></label>
                                    <input type="text" class="form-control" name="name"
                                        value="<?php echo $product['name']; ?>" placeholder="Nom du Produit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price"><b>Prix</b></label>
                                    <input type="text" class="form-control" name="price"
                                        value="<?php echo $product['price']; ?>" placeholder="Prix du Produit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity"><b>Quantite</b></label>
                                    <input type="number" class="form-control" name="quantity"
                                        value="<?php echo $product['quantity']; ?>" min="0">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description"
                                        rows="3"><?php echo $product['description']; ?></textarea>
                                </div>
                                <div class="mb-3 d-grid gap-2">
                                    <input type="submit" name="save" value="Modifier" class="btn btn-primary">
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