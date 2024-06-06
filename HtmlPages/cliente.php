<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['authenticated']) || $_SESSION['Id_Cargo'] != 2) {
    header("Location: index.php");
    echo '<script>alert("Porfavor, inicie sesión");</script>';

    exit();
}

// Código para la página de cliente
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/49f6844fc6.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap; /* Permite que los divs se envuelvan a la siguiente línea */
            justify-content: space-between; /* Distribuye el espacio entre los divs */
        }
        .box {
            width: calc(25% - 20px); /* Calcula el ancho de cada div (25% - 20px de margen) */
            background-color: lightblue;
            padding: 20px;
            margin: 10px;
        }
    </style>
</head>

<body>
<h1>hola cliente, <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
<form action="../phpControllers/logout.php" method="post">
                <button>Salir</button>
            </form>
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4" id="tarjeta">
            <div class="card" style="width: 18rem;" id="tarjeta_img">
                <img src="../Images/descargar.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Usuario</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">Boton de Enviar</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
