<?php include 'admin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits - LUXTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            color: #666;
            font-size: 16px;
        }
        .btn {
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }
        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }
        .btn-success {
            background-color: #008CBA;
            border-color: #008CBA;
        }
        .btn-success:hover {
            background-color: #0077A3;
            border-color: #0077A3;
        }
        .btn-danger {
            background-color: #f44336;
            border-color: #f44336;
        }
        .btn-danger:hover {
            background-color: #d32f2f;
            border-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des produits - LUXTORE</h2>
        <a href="ajouter_produit.php" class="btn btn-primary my-1">Ajouter un produit</a>
        <div class="row">
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
            $rows = $pdo->query("SELECT produit.*,categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie=categorie.id")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $prix = $row['prix'];
                $discount = $row['discount'];
                $prix_final = $prix-(($prix * $discount)/100);
                ?>
                <div class="col-md-4">
                    <div class="card category-card">
                        <div class="card-body">
                            <img src="/opt/lampp/htdocs/ecommerce/uploads/hamid.jpg" alt="..." class="img-fluid">
                            <p class="card-text">-<?php echo $row['discount']; ?>%</p>
                            <h5 class="card-title"><?php echo $row['libelle']; ?></h5>
                            <del><p class="card-text"><?php echo $row['prix']; ?>$</p></del>
                            <p class="card-text"><?php echo $prix_final ?> $</p>
                            <p class="card-text"><?php echo $row['categorie_libelle'] ?></p>
                            <p class="card-text">Date de création: <?php echo $row['date_creation']; ?></p>
                            <a href="" class="btn btn-primary">Afficher</a>
                            <a href="updateProduct.php/?id=<?php echo $row['id'] ?>" class="btn btn-success">Modifier</a>
                            <a href="deleteProduit.php/?id=<?php echo $row['id'] ?>" class="btn btn-danger"
                            onclick="return confirm('voulez-vous vraiment supprimer le produit <?php echo $row['libelle'] ?>')">Supprimer</a>
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
