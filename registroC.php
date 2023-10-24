<?php
session_start();

// Incluye el archivo de conexión a la base de datos
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $zona_pais = $_POST["zona_pais"];

    // Validaciones (puedes agregar más según tus necesidades)
    if (empty($cedula) || empty($nombre) || empty($apellido) || empty($zona_pais)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Consulta SQL para insertar el cliente en la base de datos
    $sql = "INSERT INTO cliente (cedula, nombre, apellido, zona_pais) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $cedula, $nombre, $apellido, $zona_pais);

    if ($stmt->execute()) {
        // Cliente registrado con éxito
        echo "1"; // Respuesta exitosa
    } else {
        echo "Hubo un error al registrar el cliente."; // Respuesta de error
    }

    $stmt->close();
    exit;
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Clientes - Embotelladora Thomsom</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        body{
            background-color: #fafafa;
        }
    </style>
</head>
<body>
<nav class="blue darken-1">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo left">Embotelladora Thomsom</a>
            <ul id="nav-mobile" class="right">
                <li><a href="pagina_principal.php">Inicio</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
            </ul>
        </div>
    </nav>

    <div class="container"><br><br>
        <h4 class="card-panel blue lighten-4 black-text center">Registro de Clientes</h4><br>
        <div class="container">
        <form onsubmit="return registrarCliente();" id="registro-cliente-form">
            <div class="input-field">
                <input type="number" name="cedula" id="cedula" required maxlength="11">
                <label for="cedula">Cédula</label>
            </div>
            <div class="input-field">
                <input type="text" name="nombre" id="nombre" required maxlength="25">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field">
                <input type="text" name="apellido" id="apellido" required maxlength="25">
                <label for="apellido">Apellido</label>
            </div>
            
            <div class="input-field">
                <select name="zona_pais" id="zona_pais">
                    <option value="" disabled selected>Selecciona una sucursal</option>
                    <option value="Maracaibo">Maracaibo</option>
                    <option value="Táchira">Táchira</option>
                </select>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Registrar
                <i class="material-icons right">send</i>
            </button>
        </form>
        <div id="resultado" style="color: green;"></div>
    </div>
    </div>
<br><br><br><br>
    <footer class="page-footer blue darken-1">
        <div class="footer-copyright">
            <div class="container">
                <p>Copyright © 2023 rubilopez.site</p>
                <a class="left" href="https://github.com/Fullsun15/Practica4.git" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" width="35px" height="35px"></a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/js/init.js"></script>
</body>
</html>
