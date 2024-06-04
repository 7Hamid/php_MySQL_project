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
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Contact Us</h2>
                <form method="POST">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prénom" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="ex: admin@gmail.com" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+212XXXXXXXXX" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Quel est votre objet" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="décrivez votre objet" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="contact">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>

<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    if(isset($_POST['contact'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $date_creation = date('Y-m-d');
        if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)){
            $sqlstate = $pdo->prepare('INSERT INTO contacters(nom, prenom, email, phone, subject, message, date_creation) VALUES(?, ?, ?, ?, ?, ?, ?)');
            $sqlstate->execute([$nom, $prenom, $email, $phone, $subject, $message, $date_creation]);
        }
    }
?>
