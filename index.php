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

</head>
<body>
    <?php include 'nav.php';?>
    <section class="home" id="home">
        <div class="container text-center mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h4><span style="color: red;">Salut</span>, Nos clients</h4>
                    <h1>Bienvenue chez <span style="color: red;">hamidStore</span></h1>
                    <br>
                    <h3 class="text-center">Nous avons d'<span style="color: red;">Excellentes Offres </span>pour vous</h3>
                    <a href="produits.php" class="btn btn-lg btn-danger mt-3">Explorer</a>
                    <br><br><br><br><br><br><br>
                    <div class="social-media my-3 mr-5>
                        <a href="#"><img src="uploads/Facebook.png" width="50px" height="50px" alt=""></a>
                        <a href="#"><img src="uploads/Instagram.png" width="50px" height="50px" alt=""></a>
                        <a href="#"><img src="uploads/Twitter.png" width="50px" height="50px" alt=""></a>
                        <a href="https://github.com/7Hamid/"><img src="uploads/github.png" width="50px" height="50px" alt="" ></a>
                        <a href=//send?phone=212709573577"><img src="uploads/Whatsapp.png" width="50px" height="50px" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="uploads/Marketing-amico.png" width="698px" height="720px" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="uploads/illu1.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h1>About<span>Me</span></h1>
                    <h5><span>Full-Stack</span> Developer</h5>
                    <p>I'm glad to see you here guys and I'll do my best to help you all.
                    My name is Chetouani Hamid, 20 years old, from Morocco.
                    I'm a front-end web developer, I can provide clean code and perfect design.
                    I also make the website more and more interactive and attractive with web
                    animations, a responsive design makes your website accessible to all users,
                    regardless of their device.
                    I also graduated from an informatics university which made me know more about
                    coding and programming.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container text-center">
            <h1>Our<span>Services</span></h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="uploads/phone.png" alt="" class="edit-image">
                            <h5>Mobile</h5>
                            <p>I'm a front-end web developer, I can provide clean code and perfect design of mobile phones</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="uploads/desktop.png" alt="" class="edit-image">
                            <h5>Desktop</h5>
                            <p>I'm a front-end web developer, I can provide clean code and perfect design of mobile phones</p>
                        </div>
                    </div>
                </div>
                <!-- Add more service cards here -->
            </div>
        </div>
    </section>

    <?php include 'footer.php' ?>

</body>
</html>


