<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AzizClothes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produits.php">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacters.php">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Sign In</a></li>
            <li><a class="dropdown-item" href="register.php">Sign Up</a></li>
          </ul>
        </li>
      </ul>
      <form action="search.php" method="GET" class="d-flex">
    <div class="input-group mb-3">
        <input type="text" class="form-control me-2" placeholder="Search" name="query" aria-label="Search" aria-describedby="button-search">
        <button class="btn btn-outline-success" type="submit" id="button-search">Search</button>
    </div>
</form>
    </div>
  </div>
</nav>
