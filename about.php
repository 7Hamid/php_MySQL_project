
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - hamidStore</title>
    <!-- Inclure les styles CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Inclure la bibliothèque Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Styles CSS pour la mise en page -->
    <style>
        /* Alignement de la section */
        .about-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
        }
        /* Styles pour le texte */
        .about-text {
            width: 50%;
        }
        /* Styles pour l'image */
        .about-image img {
            width: 100%;
            max-width: 400px; /* Ajustez la largeur maximale de l'image selon vos besoins */
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <?php include 'nav.php'; ?>
    <!-- Section About Us -->
    <section class="about-section">
        <!-- Texte About Us -->
        <div class="about-text">
            <h2>About Us</h2>
            <p>hamidStore is more than just an online electronics store. It's a dynamic platform where technology enthusiasts can not only purchase the latest gadgets and electronic devices, but also sell their own products. For buyers, hamidStore offers an unparalleled shopping experience with a wide range of high-quality electronic products. Explore our carefully curated selection of smartphones, laptops, tablets, accessories, and more. Find everything you need to stay connected, productive, and entertained in today's digital world.</p>
            <p>For sellers, hamidStore provides a secure and user-friendly platform to showcase and sell their electronic products. Whether you're a manufacturer of innovative gadgets, a reseller of electronic hardware, or an enthusiast looking to sell pre-owned items, hamidStore gives you the opportunity to reach millions of potential customers worldwide.</p>
        </div>
        <!-- Image du magasin -->
        <div class="about-image">
            <img src="uploads/master.png" alt="Photo du magasin">
        </div>
    </section>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
