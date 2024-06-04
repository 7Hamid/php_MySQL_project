<?php include 'admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifierCategorie</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier une categorie</h2>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    $id = $_GET['id'];
    $sqlstate = $pdo->prepare('SELECT * FROM categorie WHERE id=?');
    $sqlstate->execute([$id]);
    $category = $sqlstate->fetch(PDO::FETCH_ASSOC);
?>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    if(isset($_POST['modifier'])){
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
        if(!empty($libelle) && !empty($description)){
            $sqlstate = $pdo->prepare('UPDATE categorie SET libelle=?,description=? WHERE id=?');
            $sqlstate->execute([$libelle,$description,$id]);
            header('Location: ../categories_auth.php');
            ?>
            <div class="alert alert-success fixed-top text-center" role="alert">
                the category <?php echo $libelle ?> Updated successfully
            </div>
            <?php
        }
    }
?>
        <form method="post">
            <div class="form-group">
                <label for="libelle">Libelle:</label>
                <input  type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $category['libelle'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" " required><?php echo $category['description'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
session_start();
if(!isset($_SESSION['users'])){
  header('Location: login.php');
}
?>
