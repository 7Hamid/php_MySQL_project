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
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .register-container {
      margin-top: 100px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 register-container">
        <h2 class="text-center mb-4">Register</h2>
        <form action="register.php" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
          <p class="text-center mt-3">Already have an account? <a href="login.php">Log in</a></p>
        </form>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>


<?php
// Establish database connection
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
//require_once 'pages/database.php';

// Check if form is submitted
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $date_creation = date('Y-m-d'); // Get the current date
    
    // Check if all fields are not empty
    if(!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)){
        // Check if password matches confirm password
        if($password === $confirm_password) {
            // Prepare the SQL statement
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, date_creation) VALUES (?, ?, ?, ?)");
            
            // Execute the prepared statement
            $stmt->execute([$username, $email, $password, $date_creation]);

            //redirection
            header('Location: login.php');
            
            // Check if the insertion was successful
            if($stmt->rowCount() > 0){
                echo "<script>alert('User registered successfully!');</script>";
            } else {
                echo "<script>alert('Failed to register user!');</script>";
            }
        } else {
            echo "<script>alert('Password and Confirm Password do not match!');</script>";
        }
    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}
?>
