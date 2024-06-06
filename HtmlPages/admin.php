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
    <title>Usuario Admnistrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/49f6844fc6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS Styles/styles.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/9901/9901994.png" type="image/x-icon">
    <link rel="stylesheet" href="dropdown.css">

</head>
<style>
    #tarjeta {
        position: relative;
    }

    #tarjeta_img {
        margin: 0 auto;
    }

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
            display: inline;
            align-items: center;
            justify-content: center;
        }
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        /* Permite que los divs se envuelvan a la siguiente línea */
        justify-content: space-between;
        /* Distribuye el espacio entre los divs */
    }

    .box {
        width: calc(25% - 20px);
        /* Calcula el ancho de cada div (25% - 20px de margen) */
        background-color: lightblue;
        padding: 20px;
        margin: 10px;
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

    <div id="cont-222" class="">
        <table class="table">
            <thead class="bg-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Sexo</th>

                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Id_Cargo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-flex justify-content-center align-items-center"><button class="btn btn-warning" ><a class="text-danger" style="text-decoration: none;" id="boton_nuevo_letra" href="adminProducto.php">Producto</a></button></div>   
                <br>
                <div class="d-flex justify-content-center align-items-center"><button class="btn btn-warning"><a id="boton_nuevo_letra" class="text-danger" style="text-decoration: none;" href="AdminCreate.php">Nuevo</a></button></div>
            
                <br>
                <?php
                $conex = new mysqli("localhost", "root", "", "usuarios");
                $conex->set_charset("utf8");
                ?>
                <?php
                $sql = $conex->query("SELECT * FROM nombre, cargo WHERE nombre.Id_Cargo=cargo.Id_Cargo;");
                while ($datos = $sql->fetch_object()) {
                ?>
                    <tr>
                        <td><?= $datos->id_persona ?></td>
                        <td><?= $datos->Nombres ?></td>
                        <td><?= $datos->Edad ?></td>
                        <td><?= $datos->Sexo ?></td>
                        <td><?= $datos->Email ?></td>
                        <td><?= $datos->Password ?></td>
                        <td><?= $datos->Id_Cargo ?></td>
                        <td><?= $datos->Descripción ?></td>
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
    <br>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <div id="mensaje-pantalla-pequena">Por favor, agrande su pantalla para una mejor experiencia.</div>
    </div>
    <br>
    <br>
    <div class="d-flex justify-content-center align-items-center">
        <div id="btn-ver"><button class="btn btn-success"><a href="tabla.php">Ver Tabla</a></button></div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--script -->
</body>

</html>