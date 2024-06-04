<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

// Vérification si le formulaire de recherche a été soumis
if(isset($_GET['query'])) {
    // Nettoyage de la chaîne de recherche pour éviter les injections SQL
    $search = htmlspecialchars($_GET['query']);

    // Requête de recherche
    $sql = "SELECT * FROM products WHERE product_name LIKE :search OR description LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des résultats
    if(count($results) > 0) {
        foreach($results as $result) {
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$result['product_name']}</h5>";
            echo "<p class='card-text'>{$result['description']}</p>";
            echo "<p class='card-text'>Price: {$result['price']}</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }
}
?>
