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
    <link rel="stylesheet" href="../CSS Styles/EstiloRegistrarVenta.css">
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
        </nav>
    </header>
    <h3 class="text-center p-2">Formulario</h3>
    <div id="container-gral" class="container-fluid row d-flex " style="display: flex; align-items: center; justify-content: center;">
    
        <form id="RegVenta" method="POST">
        <?php
            include "../phpControllers/conexion.php";
            include "../phpControllers/RegistrarVenta.php";
            include "../phpControllers/RegistrarVenta-2.php";
            include "../phpControllers/RegistrarVenta-3.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">IdVenta</label>
                <input type="text" class="form-control" name="IdVenta" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">IdProducuto</label>
                <input type="text" class="form-control" name="IdProducto" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">FechaVenta</label>
                <input type="date" class="form-control" name="FechaVenta">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                <input type="text" class="form-control" name="Cantidad">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="text" class="form-control" name="Precio">
            </div>
            <button type="submit" class="btn btn-primary mb-3 w-100 m-a" name="btnvender">Registrar Venta</button>
        </form>



        <div id="tabla-productos" class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">IdProducto</th>
                        <th scope="col">IdVenta</th>
                        <th scope="col">PrecioTotal</th>
                        <th scope="col">CantidadComprada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conex = new mysqli("localhost", "root", "", "usuarios");
                    $conex->set_charset("utf8");

                    $sql = $conex->query("SELECT * FROM detalleventa;");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                        <tr>
                            <td><?= $datos->IdProducto ?></td>
                            <td><?= $datos->IdVenta ?></td>
                            <td><?= $datos->PrecioTotal ?></td>
                            <td><?= $datos->CantidadComprada ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="tabla-det-venta" class="col-8 p-4">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">IdVenta</th>
                        <th scope="col">FechaVenta</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conex = new mysqli("localhost", "root", "", "usuarios");
                    $conex->set_charset("utf8");

                    $sql = $conex->query("SELECT * FROM venta;");
                    while ($datos = $sql->fetch_object()) {
                    ?>
                        <tr>
                            <td><?= $datos->IdVenta ?></td>
                            <td><?= $datos->FechaVenta ?></td>
                            <td><?= $datos->Cantidad ?></td>
                            <td><?= $datos->Precio ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="mensaje-pantalla-pequena">Por favor, agrande su pantalla para una mejor experiencia.</div>
        <div id="btn-ver"><a href="tabla.php">Ver Tabla</a></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>