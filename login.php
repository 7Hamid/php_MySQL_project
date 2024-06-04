<?php include 'nav.php'?>
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
</head>
<body>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      margin-top: 100px;
    }
  </style>
</head>
<body>
 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 login-container">
        <h2 class="text-center mb-4">Login</h2>
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
          <p class="text-center mt-3">Don't have an account yet? <a href="register.php">Register</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>


<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
    if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      if(!empty($username) && !empty($password)){
        $sqlstate = $pdo->prepare('SELECT * FROM users WHERE username=? AND password=?');
        $sqlstate->execute([$username,$password]);
        if($sqlstate->rowCount()>=1){
          session_start();
          $_SESSION['users'] = $sqlstate->fetch();
          header('Location: pages/admin.php');
        }
        else{
          ?>
          <div class="alert alert-danger text-center fixed-top w-100" role="alert">
            Username or password incorrect
          </div>
          <?php
        }
      }
    }
?>