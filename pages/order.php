<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name">
        <label for="prix">prix</label>
        <input type="text" name="prix" id="prix">
        <button type="submit" name="envoyer">envoyer</button>
    </form>
</body>
</html>

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    if(isset($_POST['envoyer'])){
        $name = $_POST['name'];
        $prix = $_POST['prix'];
        $date_creation = date('Y-m-d');

        if(!empty($name) && !empty($prix)){
            $sqlstate = $pdo->prepare("INSERT INTO orders (id, name, prix, date_creation) VALUES(null,?,?,?)");
            $sqlstate->execute([$name,$prix,$date_creation]);
        }
    }
?>