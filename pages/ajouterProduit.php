<?php include 'admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .register-container {
      margin-top: 100px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 register-container">
        <h2 class="text-center mb-4">Ajouter produit</h2>
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control" id="image" name="image" required>
          </div>
          <div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" id="description" name="description" required>
          </div>
          <div class="form-group">
            <label for="prix">prix</label>
            <input type="text" class="form-control" id="prix" name="prix" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="ajouter">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_POST['ajouter'])){
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $date_creation = date('Y-m-d');

    if(!empty($image) && !empty($description) && !empty($prix)){
        $target = "uploads/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $stmt = $pdo->prepare("INSERT INTO produits (image, description, prix, date_creation) VALUES (?, ?, ?, ?)");
        $stmt->execute([$image, $description, $prix, $date_creation]);
    }
}
?>


<?php
session_start();
if(!isset($_SESSION['users'])){
  header('Location: login.php');
}
?>
