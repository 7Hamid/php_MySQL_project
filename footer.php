<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <div class="py-3 bg-dark text-center">
    <div class="text-center">
      <h2 class="h2 text-uppercase mb-4 font-weight-bold text-white">
        Subscribe to our newsletter
      </h2>
      <p class="text-white-50">
        Be the first to get the latest news about trends,
        promotions and much more
      </p>
    </div>
    
    <!-- form -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4"> <!-- Adjust the column width as needed -->
            <form class="form-inline mb-4" method="post" style="width: 100%;">
                <div class="input-group w-100">
                    <input type="email" name="email" class="form-control" placeholder="Your email address">
                    <button type="submit" class="btn btn-outline-light bg-dark" name="join">Join</button>
                </div>
            </form>
        </div>
    </div>
  </div>
  <!-- links -->
  <div class="text-center mb-4">
    <a href="about.php" class="text-white-50 mr-3">About Us</a>
    <a href="contacters.php" class="text-white-50">Contact Us</a>
    <!-- socials -->
    <div class="text-center mb-5">
      <a href="#" class="text-white-50 mr-2"><i class="fab fa-youtube"></i></a>
      <a href="#" class="text-white-50 mr-2"><i class="fab fa-instagram"></i></a>
      <a href="#" class="text-white-50 mr-2"><i class="fab fa-twitter"></i></a>
      <a href="#" class="text-white-50"><i class="fab fa-facebook-f"></i></a>
    </div>
  </div>
  <!-- copyright -->
  <div class="py-3 bg-dark text-center">
    <div class="container">
      <p class="text-white-50 mb-0">
        &copy; chetouani-LuXtore <?php echo date("Y-m-d"); ?>. All rights reserved.
      </p>
    </div>
  </div>
</body>
</html>

<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    if(isset($_POST['join'])){
      $email = $_POST['email'];
      $date_creation = date('Y-m-d');
      if(!empty($email)){
        $sqlstate = $pdo->prepare('INSERT INTO subscribers (email, date_creation) VALUES(?,?)');
        $sqlstate->execute([$email,$date_creation]);
      }
    }
?>


