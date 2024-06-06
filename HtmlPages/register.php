<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS Styles/estilos3registro.css">
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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            padding: 0px;
            right: 0.1cm ; 
            top: 2.9cm;
        }
        
        .dropdown-content a {
            color: black;
            padding: 8px 12px;
            text-decoration: none;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font: italic;
        }
        .dropdown-content a:hover{
            background-color: cornflowerblue;
            font: bold;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        #none-class{
            display: none;
        }
        </style>
    <title>Registro</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/8780/8780935.png" alt="Logo"></a>
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
                    <a href="Login.php">Iniciar sesión</a>
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
    <form class="registro" method="POST">
        <h2>Registro de Usuario</h2>
        <div class="cont-p" id="none-class"><p class="ok">REGISTRO COMPLETO</p></div>
        <?php
        include("../phpControllers/RegisterController.php");
        ?>
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo">
        <label for="edad">Edad</label>
        <input type="text" id="edad" name="edad"placeholder="Edad del usuario">
        <label for="sexo">Sexo</label>
        <input type="text" id="sexo" name="sexo"placeholder="Masculino / Femenino">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="alguien@gmail.com">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="password">
        <input class="enviar-btn" type="submit" name="register" value="Registrarse">    
      </form>
      
</body>
</html>
