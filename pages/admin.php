<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
<body>  
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">MyEspace</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="produits_auth.php">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories_auth.php">Categories</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ajouter
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
            <li><a class="dropdown-item" href="ajouter_produit.php">ajouterProduit</a></li>
            <li><a class="dropdown-item" href="ajouterCategorie.php">ajouterCategorie</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php session_start(); echo $_SESSION['users']['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="logOut.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>


<?php
session_start();
if(!isset($_SESSION['users'])){
  header('Location: login.php');
  exit;
}
?>