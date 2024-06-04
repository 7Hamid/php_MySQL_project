<?php include 'nav.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous"
    >
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous">
    </script>
    <title>LUXTORE</title>
    <style>
        /* Custom styles */
        .category-list {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Section for category list -->
            <div class="category-list">
                <h3>Liste des catégories</h3>
                <ul class="list-group">
                    <?php
                    // Fetch and display categories
                    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
                    $id = $_GET['id'];
                    $rows = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($rows as $row) {
                        echo '<li class="list-group-item">' . $row['libelle'] . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <!-- Section for product list -->
            <h2 class="mb-4">Liste des produits</h2>
            <div class="row">
                <?php
                // Fetch and display products
                $rows = $pdo->query("SELECT produit.*, categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie=categorie.id")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row) {
                    $prix = $row['prix'];
                    $discount = $row['discount'];
                    $prix_final = $prix - (($prix * $discount) / 100);
                    ?>
                    <div class="col-md-4">
                        <div class="card category-card">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $row['libelle']; ?></h5>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                <p class="card-text">-<?php echo $row['discount']; ?>%</p>
                                <del><p class="card-text"><?php echo $row['prix']; ?>$</p></del>
                                <p class="card-text"><?php echo $prix_final ?> $</p>
                                <p class="card-text"><?php echo $row['categorie_libelle'] ?></p>
                                <p class="card-text">Date de création: <?php echo $row['date_creation']; ?></p>
                                <a href="details_produits.php/?id=<?php echo $row['id']; ?>" class="btn btn-primary">Acheter</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
