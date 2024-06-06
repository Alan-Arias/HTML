<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['authenticated']) || $_SESSION['Id_Cargo'] != 1) {
    header("Location: index.php");
    echo '<script>alert("Porfavor, inicie sesión");</script>';

    exit();
}

// Código para la página de admin
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Admnistrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/49f6844fc6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Styles/styles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/9901/9901994.png" type="image/x-icon">
    <link rel="stylesheet" href="dropdown.css">

</head>
<style>
    #search-bar {
        display: none;
    }

    #mensaje {
        display: none;
        padding: 20px 30px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 20px;
        border-radius: 5px;
        align-items: center;
        justify-content: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 1cm;
        border: black solid;
        margin-top: 0.5cm;
        margin-left: 25px;
        margin-right: 25px;
    }

    @media (max-width:800px) {
        #search-bar-nav {
            display: none;
        }

        #search-bar {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
</style>

<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php"><img src="https://cdn-icons-png.flaticon.com/512/8780/8780935.png" alt="Logo"></a>
                <div></div>
            </div>

            <div class="container-fluid" id="search-bar-nav">
                <form class="d-flex" role="search" method="POST">
                    <?php
                    include("../phpControllers/search.php");
                    ?>
                    <input class="form-control me-2" name="name-user" id="name-user" type="search" placeholder="Introduzca un Email" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="btnsearch" id="btnsearch">Buscar</button>
                </form>

            </div>

            <form action="../phpControllers/logout.php" method="post">
                <button>Salir</button>
            </form>

            <div class="nav">
                <ul>
                    <li><a href="">Productos</a></li>
                    <li><a href="">Contáctanos</a></li>

                </ul>
            </div>

        </nav>

    </header>

    <div class="container-fluid" id="search-bar">
        <form class="d-flex p-3" role="search" method="POST">
            <?php
            include("../phpControllers/search.php");
            ?>
            <input class="form-control me-2" name="name-user" id="name-user" type="search" placeholder="Introduzca un Email" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="btnsearch" id="btnsearch">Buscar</button>
        </form>
    </div>
    <!-- tabla de busqueda oculta 1-->

    <?php
    include("../phpControllers/viewTableSearch.php");
    include("../phpControllers/DeletePersona.php");
    ?>
    <div>
        <p id='mensaje'>¡Eliminado Correctamente!</p>
    </div>
    <!-- tabla de busqueda oculta 11-->
    <h2>Bienvenido Usuario: </h2>
    <?php echo htmlspecialchars($_SESSION['name']); ?>
    <!--Encriptacion pass-->
    <script>
        function encryptPassword() {
            var password = document.getElementById("password").value;
            var encryptedPassword = CryptoJS.SHA256(password).toString();
            document.getElementById("encryptedPassword").value = encryptedPassword;
            return true;
        }
    </script>
    <!-- Encriptacion Pass-->
    <h3 class="text-center p- p-5">Formulario</h3>
    <div id="container-gral" class="container-fluid row d-flex " style="display: flex; align-items: center; justify-content: center;">
        <form id="cont-111" class="p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Usuarios</h3>
            <?php
            include "../phpControllers/conexion.php";
            include "../phpControllers/registropersona.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombres</label>
                <input type="text" class="form-control" name="Nombres">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Edad</label>
                <input type="text" class="form-control" name="Edad">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sexo</label>
                <input type="text" class="form-control" name="Sexo">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Id_Cargo</label>
                <input type="text" class="form-control" placeholder="1 Admnistrador/2 Usuario" name="Id_Cargo">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" name="Email">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="text" class="form-control" name="Passwrd">
                <input type="hidden" id="encryptedPassword" name="encryptedPassword">
            </div>
            <button type="submit" class="btn btn-primary" name="bntregistrar">Registrarse</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--script -->

</body>

</html>