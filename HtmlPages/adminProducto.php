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
<html lang="es">

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
    <h2>Bienvenido Usuario: </h2>
    <?php echo htmlspecialchars($_SESSION['name']); ?>

    <div id="cont-222" class="">
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <br>
                <div class="d-flex justify-content-center align-items-center"><button class="btn btn-warning"><a id="boton_nuevo_letra" class="text-danger" style="text-decoration: none;" href="AdminCreateProd.php">Nuevo</a></button></div>
            
                <br>
                <?php
                $conex = new mysqli("localhost", "root", "", "usuarios");
                $conex->set_charset("utf8");
                ?>
                <?php
                $sql = $conex->query("SELECT * FROM producto ");
                while ($datos = $sql->fetch_object()) {
                ?>
                    <tr>
                        <td><?= $datos->IdProducto ?></td>
                        <td><?= $datos->Nombre ?></td>
                        <td><?= $datos->Disponible ?></td>
                        <td><?= $datos->Talla ?></td>
                        <td><?= $datos->url_img?> </td>
                        
                        <td>
                            <a href="admin.php?Nombres=<?= $datos->Nombres ?>">eliminar</i></a>
                            <a href="adminEdit.php?id=<?= $datos->id_persona ?>">editar</i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
    <!--script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--script -->
</body>

</html>