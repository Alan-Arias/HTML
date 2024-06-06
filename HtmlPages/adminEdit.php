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
<?php
include "../phpControllers/conexion.php";
$id = $_GET["id"];
$sql = $conex->query("select*from nombre where id_persona=$id");
?>
<!DOCTYPE html>
<html lang="es">

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
    ?>

    <!-- tabla de busqueda oculta 11-->
    <h2>Bienvenido Usuario: </h2>
    <?php echo htmlspecialchars($_SESSION['name']);
    
    ?>

    <h3 class="text-center p- p-5">Formulario</h3>
    <div id="container-gral" class="container-fluid row d-flex " style="display: flex; align-items: center; justify-content: center;">
        <form id="cont-111" class="p-3" method="POST">
            <h3 class="text-center text-secondary">Editar Usuarios</h3>
            <?php
            include "../phpControllers/conexion.php";
            include "../phpControllers/EditarPersona.php";
            ?>
            <?php
            
            while ($datos = $sql->fetch_object()) {?>
            <input type="hidden" name="id" value="<?=$_GET["id"] ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="Nombres" value="<?=$datos->Nombres ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="Edad" value="<?= $datos->Edad?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sexo</label>
                    <input type="text" class="form-control" name="Sexo" value="<?= $datos->Sexo?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="Email" value="<?=$datos->Email ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="Passwrd">
                </div>
            <?php
            }
            ?>

            <button type="submit" class="btn btn-primary" id="bnteditar" name="bnteditar">Actualizar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


        <!--script -->

</body>

</html>