<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
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
    </style>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/3.2.0/sha256.js"></script>
    <script>
        function encriptarContraseña() {
            var contraseña = document.getElementById("password").value;
            var shaObj = new jsSHA("SHA-256", "TEXT", {numRounds: 1});
            shaObj.update(contraseña);
            var hash = shaObj.getHash("HEX");
            document.getElementById("password").value = hash;
        }
    </script>
    <form class="registro" method="POST" action="../phpControllers/ControllerLogin.php">
        <h2>Iniciar Sesión</h2>

        <div class="ALERT" id="ALERT" hidden><p class="alert-error">ERROR EN EL LOGIN</p></div>
        
        <label for="nombre">Email</label>
        <input type="text" id="name" name="name" placeholder="Email" value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>" >
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="pass" value="<?php echo isset($_GET['password']) ? htmlspecialchars($_GET['password']) : ''; ?>" placeholder="Password">
        <div class="captcha">
          <!-- Aquí va el código para el captcha -->       
        </div>
        <button name="btningresar" type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>

