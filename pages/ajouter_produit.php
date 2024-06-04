<?php include 'admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouterCategorie</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center bg-primary ">Ajouter un produit</h2>
        <form method="post">
            <div class="form-group">
                <label for="libelle">Libelle:</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="number" class="form-control" id="prix" name="prix" min="1" required>
            </div>
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="number" class="form-control" id="discount" name="discount" min="1" max="90" required>
            </div>
            <?php 
                $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
                $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="form-group">
                <label for="discount">Categorie:</label>
                <select name="categorie" class="form-control">
                    <option value="">Choisissez une catégorie...</option>
                    <?php
                        foreach($categories as $categorie){
                            echo "<option value='".$categorie['id']."'>".$categorie['libelle']."</option>";
                        }
                    ?>
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="ajouterP">Ajouter</button>
            <a href="produits_auth.php" class="btn btn-primary">Retour</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    if(isset($_POST['ajouterP'])){
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $categorie = $_POST['categorie'];
        $date_creation = date('Y-m-d');
        if(!empty($libelle) && !empty($prix) && !empty($discount) && !empty($categorie) ){
            $sqlstate = $pdo->prepare('INSERT INTO produit(libelle, prix, discount,id_categorie, date_creation) VALUES(?, ?, ?, ? ,?)');
            $sqlstate->execute([$libelle,$prix, $discount, $categorie,$date_creation]);
            header('Location: produits_auth.php');
            ?>
            <?php
        }else{
            ?>
              <div class="alert alert-danger fixed-top text-center my-5" role="alert">
                Tous les informations sont nécessaires
              </div>
            <?php
        }
    }
?>

<?php
session_start();
if(!isset($_SESSION['users'])){
  header('Location: login.php');
}
?>
