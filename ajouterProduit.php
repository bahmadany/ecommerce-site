<?php
include "./public/headers.php";

// Appeler la fonction AjouterProduit lorsqu'on enregistre une commande
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quant'];
    $description = $_POST['description'];
    // $_FILES pour uploader une image
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
                AjouterProduit($name, $price, $quantity, $description, $img_url);
            }
        } else {
            AjouterProduit($name, $price, $quantity, $description, $img_url);
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
                            <h2>Gestion des Produits</h2>
                        </center>
                        <hr>
                        <div class="registerfrm">
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="img" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="img">
                                </div>
                                <div class="mb-3">
                                    <label for="name"><b>Nom</b></b></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Nom du Produit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price"><b>Prix</b></label>
                                    <input type="text" class="form-control" name="price" id="price"
                                        placeholder="Prix du Produit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quant"><b>Quantité</b></label>
                                    <input type="number" class="form-control" placeholder="Quantité Produit" name="quant" id="quant" min="0">
                                </div>
                                <div class="mb-3">
                                    <label for="description"><b>Description</b></label>
                                    <textarea class="form-control" placeholder="Ajoutez une description" name="description" id="description"
                                        rows="5"></textarea>
                                </div>
                                <center>
                                    <div class="mb-3 d-grid gap-2">
                                        <input type="submit" name="save" value="Ajouter" class="btn btn-success">
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
</body>
</html>