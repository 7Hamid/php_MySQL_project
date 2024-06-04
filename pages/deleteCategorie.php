<?php
  $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
  $id = $_GET['id'];
  $delete = $pdo->prepare("DELETE FROM categorie WHERE ID=?");
  $deleted= $delete->execute([$id]);
  if($deleted){
    header('Location: ../categories_auth.php');
  }
?>