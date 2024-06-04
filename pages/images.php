<?php include 'admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des catégories</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .category-card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 20px;
            font-weight: bold;
        }
        .card-text {
            color: #666;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des produits</h2>
        <a href="ajouter_produit.php" class="btn btn-primary my-1">ajouterProduit</a>
        <div class="row">
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
            $rows = $pdo->query("SELECT * FROM produits")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                ?>
                <div class="col-md-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="images/<?php echo $row['image'] ?>" alt="...">
                            <h5 class="card-title"><?php echo $row['description']; ?></h5>
                            <p class="card-text"><?php echo $row['prix']; ?>$</p>
                            <p class="card-text">Date de création: <?php echo $row['date_creation']; ?></p>
                            <input type="submit" value="Voir" class="btn-primary">
                            <input type="submit" value="Modifier" class="btn-success">
                            <input type="submit" value="Supprimer" class="btn-danger" name="delete">
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>