<?php

// Démarrage de la session
session_start();

// Initialisation du panier dans la session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Fonction de connexion à la base de données
function connexionDB()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "ecommerce";
    $dbport = 3306;
    $conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname, $dbport);
    if (!$conn) {
        die("Error during connection => " . mysqli_connect_error());
    }
    return $conn;
}

// Fonction d'authentification de l'utilisateur
function authentification($email, $mot_de_passe)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM  User wHERE email =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $utilisateur = $stmt->get_result();

     // Vérification des identifiants
    if ($utilisateur->num_rows >= 1) {
        $utilisateur = $utilisateur->fetch_assoc();
        if (password_verify($mot_de_passe, $utilisateur['pwd'])) {
            $_SESSION['utilisateur'] = $utilisateur['id'];
            $_SESSION['utilisateur_nom'] = $utilisateur['lname'];
            $_SESSION['utilisateur_username'] = $utilisateur['user_name'];
            $_SESSION['utilisateur_email'] = $utilisateur['email'];
            $_SESSION['utilisateur_prenom'] = $utilisateur['fname'];
            $_SESSION['utilisateur_role_id'] = $utilisateur['role_id'];
            @header('Location: ./home.php');
        } else {
            $error_message = "Email ou Mot de Passe incorrect, Réessayer S'il vous plaît !!";
            echo "<div style='color: red; font-weight: bold; text-align: center;'>{$error_message}</div>";
        }
    } else {
        $error_message = "Email ou Mot de Passe incorrect, Réessayer S'il vous plaît !!";
        echo "<div style='color: red; font-weight: bold; text-align: center;'>{$error_message}</div>";
    }
}

//Enregistrer un nouveau utilisateur
function register($username, $email, $mot_de_passe, $prenom, $nom, $rue, $numero_rue, $ville, $province, $zipcode, $pays)
{
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $role_id = 1;
    $conn = connexionDB();
    $sql1 = "INSERT INTO User (user_name, email, pwd, fname, lname, role_id) 
    VALUES (?,?,?,?,?,?)";
    $sql2 = "INSERT INTO Address (street_name, street_nb, city, province, zip_code, country)
    VALUES (?,?,?,?,?,?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
    $stmt1->bind_param("ssssss", $username, $email, $mot_de_passe, $prenom, $nom, $role_id);
    $stmt2->bind_param("ssssss", $rue, $numero_rue, $ville, $province, $zipcode, $pays);
    $result1 = $stmt1->execute();
    $result2 = $stmt2->execute();
    if ($result1 && $result2) {
        @header('Location: ./connexion.php');
    } else {
        echo "Erreur !!!";
    }
}

// Mettre à jour un utilisateur
function UpdateUser($id, $user_name,$nom, $prenom, $email, $role_id)
{
    $conn = connexionDB();
    $sql = "UPDATE User SET user_name=?, lname=?, fname=?, email=?, role_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $user_name, $nom, $prenom, $email, $role_id, $id);
    $result = $stmt->execute();
    if ($result) {
        @header("Cache-Control: no-cache, no-store, must-revalidate");
        @header("Pragma: no-cache");
        @header("Expires: 0");
        @header('Location: ./GestionUsers.php');
    } else {
        echo "Erreur lors de la mise à jour";
    }
}

// Mettre à jour son propre utilisateur
function UpdateUser2($user_name, $nom, $prenom, $email, $role_id, $id)
{
    $conn = connexionDB();
    $sql = "UPDATE User SET user_name=?, lname=?, fname=?, email=?, role_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $user_name, $nom, $prenom, $email, $role_id, $id);
    $result = $stmt->execute();
    if ($result) {
        @header("Cache-Control: no-cache, no-store, must-revalidate");
        @header("Pragma: no-cache");
        @header("Expires: 0");
        @header('Location: ./MonProfil.php');
    } else {
        echo "Erreur lors de la mise à jour";
    }
}


//Modifier le mot de passe
function UpdatePassword($id, $mot_de_passe)
{
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $conn = connexionDB();
    $sql = "UPDATE User SET pwd=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $mot_de_passe, $id);
    $result = $stmt->execute();
    if ($result) {
        @@header('Location: ./MonProfil.php');
    } else {
        echo "Erreur lors de la modification du mot de passe";
    }
}

################################################################################
###############################  Utilisateurs ##################################
################################################################################

//Recupérer tous les utilisateurs
function getAllUsers()
{
    $conn = connexionDB();
    $sql = "SELECT * FROM User;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $users = array();
    foreach ($resultats as $user) {
        $users[] = $user;
    }
    return $users;
}

//Récupérerer un utilisateur par ID
function getUserById($id)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM User where id=?; ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user;
}

//Supprimer un utilisateur par ID
function SupprimerUser($id)
{
    $conn = connexionDB();

    $user = getUserById($id);
    if ($user) {

        $sql = 'DELETE FROM User where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result) {
            @header('Location: ./GestionUsers.php');
            exit();
        } else {
            echo "Error";
        }
    } else {
        echo "L'utilisateur n'existe pas";
    }
}

################################################################################
###############################  Produits ######################################
################################################################################

//Ajout d'un produit
function AjouterProduit($name, $price, $quantity, $description = "", $img_url = "")
{
    $conn = connexionDB();
    $sql = "Insert into Product (name, price, quantity, description, img_url) values (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $name, $price, $quantity, $description, $img_url);
    $result = $stmt->execute();
    $id_produit = $conn->insert_id;
    $stmt->close();
    $conn->close();
    if ($result) {
        if (!empty($img_url)) {
            insertImage($id_produit, $img_url);
        }
        @header('Location: ./GestionProduits.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout";
    }
    $stmt->close();
    $conn->close();
}

// Récupérer tous les produits
function getAllProducts()
{
    $conn = connexionDB();
    $sql = "SELECT p.id, p.name,p.description,p.price, p.quantity, p.img_url FROM product p ;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $products = array();
    foreach ($resultats as $product) {
        $products[] = $product;
    }
    return $products;
}

//Récuperer un produit par son ID
function getProductById($id)
{
    $conn = connexionDB();
    $sql = "SELECT p.id, p.name, p.quantity, p.price, p.img_url, p.description FROM product p where p.id=?; ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_assoc();
    return $products;
}


//Supprimer un produit par son ID
function SupprimerProduitById($id)
{
    $conn = connexionDB();

    $product = getProductById($id);
    if ($product) {

        $sql = 'DELETE FROM Product where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result) {
            @header('Location: ./GestionProduits.php');
            exit();
        }
    } else {
        echo "Erreur de suppression";
    }
}

//Modifier un produit par son ID
function ModifierProduit($id, $name, $price, $quantity, $description, $img_url)
{
    $conn = connexionDB();
    $sql = "update Product set name=?, price=?, quantity=?, description=?, img_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $price, $quantity, $description, $img_url, $id);
    $result = $stmt->execute();
    if ($result) {
        @header('Location: ./GestionProduits.php');
        exit();
    } else {
        echo "Erreur de modification";
    }
    $stmt->close();
}

################################################################################
###############################  Panier ########################################
################################################################################

function addCart($id, $quantite, $ishome = true)
{
    $_SESSION['cart'][$id] = $quantite;
    if ($ishome) {
        header('Location: ./Products.php');
        exit();
    } else {
        header('Location: ./MonPanier.php');
        exit();
    }
}
function qteCart()
{
    $countElmnt = count($_SESSION['cart']);
    return $countElmnt;
}
function getAllCart()
{
    return $_SESSION['cart'];
}

function emptyCart()
{
    unset($_SESSION['cart']);
    @header('Location: ./ordered.php');
    exit();
}

// Ajouter une image à un produit
function insertImage($id_produit, $chemin)
{
    $conn = connexionDB();
    $sql = "INSERT INTO Images(id_produit,chemin) values(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('is', $id_produit, $chemin);
    $resultat = $stmt->execute();
    if ($resultat) {
        // @header("Location: ./GestionProduits.php");
    } else {
        echo "An error occurred";
    }
}

function getDateAct()
{
    return $date_order = date("Y-m-d h:m:s");
}

################################################################################
###############################  Commandes ##################################
################################################################################

// Ajouter une commande
function AjoutCommand($total, $id_utilisateur)
{
    $conn = connexionDB();
    $sql = "INSERT INTO User_order(total, date, user_id) values(?,?,?)";
    $stmt = $conn->prepare($sql);
    $date_order = getDateAct();
    $stmt->bind_param('isi', $total, $date_order, $id_utilisateur);
    $resultat = $stmt->execute();
    if ($resultat) {
        $id_commande = $conn->insert_id;
        $MonPanier = getAllCart();
        foreach ($MonPanier as $id_produit => $qte) {
            
            ListeDeCommandes($id_commande, $id_produit, $qte, $total);
        }
        @header("Location: ./ordered.php");
    }
}

// AJouter une commande à une liste
function ListeDeCommandes($id_commande, $id_produit, $qte, $total)
{
    $conn = connexionDB();
    $sql = "INSERT INTO order_has_product(order_id, product_id, quantity, price) values(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $id_commande, $id_produit, $qte, $total);
    $resultat = $stmt->execute();
}

// Récupérer toutes les commandes
function getAllCommands()
{
    $conn = connexionDB();
    $sql = "SELECT * FROM user_order"; //Commands = user_order  
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
    $commands = array();

    foreach ($resultats as $command) {
        $commands[] = $command;
    }
    return $commands;
}

// Récuperer toutes les commandes par ID
function getCommandById($id)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM order_has_product where order_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();
    $commands = array();
    foreach ($results as $command) {
        $commands[] = $command;
    }
    return $commands;
}

// Récuperer sa propre commande par son ID
function getCommandById2($id)
{
    $conn = connexionDB();
    $sql = "SELECT * FROM order_has_product INNER JOIN user_order ON order_has_product.order_id = user_order.id
    WHERE user_order.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $results = $stmt->get_result();
    $commands = array();
    foreach ($results as $command) {
        $commands[] = $command;
    }
    return $commands;
}

// Supprimer la commande d'un utilisateur par son ID

function SupprCommandById($id)
{
    $conn = connexionDB();

    $command = getCommandById($id);
    if ($command) {

        $sql = 'DELETE FROM user_order where id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result) {
            @header('Location: ./GestionCommande.php');
            exit();
        }
    } else {
        echo "Erreur lors de la suppression";
    }
}
?>