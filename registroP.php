<?php
session_start();
require_once('conexion.php'); 

if (isset($_POST['realizar_pedido'])) {
    $cedula_cliente = $_POST['cedula_cliente'];
    $cantidad_bote = $_POST['cantidad_bote'];

    date_default_timezone_set('America/Caracas');
    $fecha_llenado = date('Y-m-d H:i:s');

    $query = "INSERT INTO pedidos (cedula_cliente, cantidad_bote, fecha_llenado) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $cedula_cliente, $cantidad_bote, $fecha_llenado);

    if ($stmt->execute()) {
        $response = "1"; 
    } else {
        $response = "Error al realizar el pedido: " . $conn->error;
    }

    $stmt->close();

    echo json_encode(array("response" => $response));
    exit;
}

$client_query = "SELECT cedula, nombre, apellido FROM cliente";
$result = $conn->query($client_query);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Realizar Pedido</title>
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

<div class="container"><br><br><br><br>
    <h4 class="card-panel blue lighten-4 black-text center">Realizar Pedido</h4><br><br><br>
    <form id="realizar_pedido_form">
        <div class="input-field">
            <select name="cedula_cliente" id="cedula_cliente">
                <option value="" disabled selected>Selecciona un cliente</option>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['cedula'] . '">' . $row['nombre'] . ' ' . $row['apellido'] . '</option>';
                }
                ?>
            </select>
            <label>Cliente</label>
        </div>
        <div class="input-field">
            <input type="number" name="cantidad_bote" id="cantidad_bote" required min="1" maxlength="11">
            <label for="cantidad_bote">Cantidad de Botes</label>
        </div>
        <button type="submit" name="realizar_pedido" class="btn">Realizar Pedido</button>
    </form>
    <div id="success_message" class="green-text"></div>
    <div id="error_message" class="red-text"></div>
</div>
<br><br><br><br><br><br>
<footer class="page-footer blue darken-1">
    <div class="footer-copyright">
        <div class="container">
            <p>Copyright © 2023 rubilopez.site</p>
            <a class="left" href="https://github.com/Fullsun15/Practica4.git" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" width="35px" height="35px"></a>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="assets/js/init.js"></script>
</body>
</html>
