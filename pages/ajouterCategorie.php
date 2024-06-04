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
        <h2>Ajouter une categorie</h2>
        <form method="post">
            <div class="form-group">
                <label for="libelle">Libelle:</label>
                <input type="text" class="form-control" id="libelle" name="libelle" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="ajouterC">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    if(isset($_POST['ajouterC'])){
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
        $date_creation = date('Y-m-d');
        if(!empty($libelle) && !empty($description)){
            $sqlstate = $pdo->prepare('INSERT INTO categorie(libelle, description, date_creation) VALUES(?, ? ,?)');
            $sqlstate->execute([$libelle,$description,$date_creation]);
            header('Location: categories_auth.php');
            ?>
            <div class="alert alert-success fixed-top text-center" role="alert">
                the category <?php echo $libelle ?> added successfully
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
