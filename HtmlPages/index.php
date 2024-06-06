<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Ropa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/49f6844fc6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS Styles/styles.css">
  <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/9901/9901994.png" type="image/x-icon">
  <link rel="stylesheet" href="dropdown.css">

  <style>
    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      padding: 0px;
      right: 0.1cm;
      top: 2.9cm;
    }

    .dropdown-content a {
      color: black;
      padding: 8px 12px;
      text-decoration: none;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font: italic;
      display: flex;
    }

    .dropdown-content a:hover {
      background-color: cornflowerblue;
      font: bold;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    #carr-img {
      width: auto;
      /* Establece el ancho de la imagen */
      height: autoy;
      /* Establece el alto de la imagen */

    }
  </style>
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <a href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/8780/8780935.png" alt="Logo"></a>
        <div></div>
      </div>
      <div class="nav">
        <ul>
          <li><a href="">Productos</a></li>
          <li><a href="">Contáctanos</a></li>
        </ul>
      </div>


      <div class="user" id="myDropdown">
        <img src="https://cdn-icons-png.flaticon.com/512/14366/14366060.png" alt="Logo" onclick="toggleDropdown()">
        <div class="dropdown-content">
          <a href="Login.php?">Iniciar sesión</a>
          <a href="register.php">Registrarse</a>
        </div>
      </div>
      <script>
        function toggleDropdown() {
          var dropdown = document.getElementById("myDropdown");
          var dropdownContent = dropdown.querySelector(".dropdown-content");
          dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        }
        window.onclick = function(event) {
          var dropdown = document.getElementById("myDropdown");
          if (event.target !== dropdown && !dropdown.contains(event.target)) {
            var dropdownContent = dropdown.querySelector(".dropdown-content");
            dropdownContent.style.display = "none";
          }
        }
      </script>
    </nav>
  </header>
<!-- Carrusel -->
  <div class="d-flex justify-content-center">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="../Images/stardust.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Stardust Dragon</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../Images/caos_dragon.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Dragon Caos Maximo</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="../Images/descargar.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Chiori</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Carrusel -->  
  <br><br>
  <!-- Productos-->
  <div class="row">
  <?php
  $conex = new mysqli("localhost", "root", "", "usuarios");
  $conex->set_charset("utf8");
  $sql = $conex->query("SELECT * FROM producto;");
  while ($datos = $sql->fetch_object()){
  ?>
  <div class="col-md-3 mb-2" id="tarjeta">
      <div class="card" style="width: 18rem;" id="tarjeta_img">
        <img src="<?=$datos->url_img?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Stock Disponible: <?=$datos->Disponible?></h5>
          <p class="card-text"><?= $datos->Nombre ?></p>
          <a href="#" class="btn btn-primary">Boton de Enviar</a>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  </div>    
  <!-- Usuarios-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>