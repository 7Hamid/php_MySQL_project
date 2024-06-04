<?php include 'nav.php'; ?>

<?php
// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the product ID from the URL
    $product_id = $_GET['id'];
    // Fetch the details of the product with the provided ID
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    $stmt = $pdo->prepare("SELECT produit.*, categorie.libelle as 'categorie_libelle' FROM produit INNER JOIN categorie ON produit.id_categorie=categorie.id WHERE produit.id = ?");
    $stmt->execute([$product_id]);
    $product_details = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product_details) {
        ?>
        <section class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="card card-style1 border-0">
                            <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                    </div>
                                    <div class="col-lg-6 px-xl-10">
                                        <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                            <h3 class="h2 text-white mb-0"><?php echo $product_details['libelle']; ?></h3>
                                        </div>
                                        <ul class="list-unstyled mb-1-9">
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Prix:</span> <?php echo $product_details['prix']; ?> MAD</li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Discount:</span><?php echo $product_details['discount']; ?> %</li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Categorie:</span><?php echo $product_details['categorie_libelle']; ?></li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span>+212 709 573 577</li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Date de publication:</span><?php echo $product_details['date_creation']; ?></li>
                                        </ul>
                                        <a href="../produits.php" class="btn btn-primary">Retour</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div>
                            <span class="section-title text-primary mb-3 mb-sm-4">Description</span>
                            <p><?php echo $product_details['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    } else {
        echo "<p>Product not found.</p>";
    }
} else {
    echo "<p>Product ID not provided.</p>";
}
?>

<?php include 'footer.php'; ?>
