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
    <title>Registrar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/49f6844fc6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Styles/styles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/9901/9901994.png" type="image/x-icon">
    <link rel="stylesheet" href="dropdown.css">
</head>
<div hidden>
    <?php
    include "../phpControllers/adminRegisterProd.php";
    include "upload.php"
    ?>
</div>
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
    <h3 class="text-center p- p-5">Formulario</h3>
    <div id="container-gral" class="container-fluid row d-flex " style="display: flex; align-items: center; justify-content: center;">
        <form id="cont-111" class="p-3" method="POST" enctype="multipart/form-data">
            <h3 class="text-center text-secondary">Registro de Productos</h3>
            <?php
            include "../phpControllers/conexion.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Detalle</label>
                <input type="text" class="form-control" name="Nombres">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Disponible</label>
                <select class="form-select" aria-label="Default select example" id="Disponible" name="Disponible">
                    <option selected value="si">Disponible</option>
                    <option value="no">No Disponible</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Talla</label>
                <select name="Talla" id="Talla">
                    <option selected value="M">Talla M</option>
                    <option value="S">Talla S</option>
                    <option value="L">Talla L</option>
                </select>
            </div>
            <?php
            ?>
            <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">Imagen</label>
                <input type="file" class="form-control form-control-sm" id="img" name="img">
            </div>
            <div class="mb-3">
                <?php
                $conex = new mysqli("localhost", "root", "", "usuarios");
                $conex->set_charset("utf8");
                ?>
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" id="categoria" name="categoria" aria-label="Default select example">
                    <?php
                    $sql = $conex->query("SELECT * FROM categoria");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                        <option value="<?= $datos->id_categoria ?>"><?= $datos->Nombre ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="bntregistrarprod">Registrarse</button>
        </form>
    </div>
    <!--script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--script -->
</body>

</html>