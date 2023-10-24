<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

require_once('conexion.php'); // Archivo de conexión a la base de datos

// Consulta SQL para obtener la lista de pedidos
$query = "SELECT id, cedula_cliente, CONCAT(nombre, ' ', apellido) AS cliente, zona_pais, cantidad_bote, fecha_llenado
          FROM pedidos
          INNER JOIN cliente c ON cedula_cliente = cedula";

// Si se realiza una búsqueda por cédula
if (isset($_GET['buscar_cedula'])) {
    $cedula = $_GET['cedula'];
    $query .= " WHERE c.cedula LIKE '%$cedula%'";
}

$result = $conn->query($query);

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pedidos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        table, thead, tr{
            border: 1px solid black; 
        }

        .text-center {
        text-align: center;
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
<br><br>
    <div class="container">
        <div class="container margin-top-50">
        <h4 class="card-panel blue lighten-2 black-text center">Pedidos Registrados</h4><br>
        <form method="GET" action="pedidos.php" class="" style="margin-bottom: 20px;">
            <div class="input-field">
                <input type="number" name="cedula" placeholder="Buscar por cédula" maxlength="11">
                </div>
            <div class="center">
                <button type="submit" name="buscar_cedula" class="blue lighten-4 black-text btn">Buscar</button>
            </div>
            <br>
            <div class="center-align" >
                <a class="blue lighten-4 black-text btn" href="registroP.php">Registrar Nuevo Pedido</a>
            </div>

            <div class="right">
            <a href="fpdf\reporteP.php"target="_blank"><i class="material-icons left">picture_as_pdf</i>Reporte PDF</a><hr>
        </div>
        </form>
<br>
    </div>
    

        <table class="striped" >
            <thead>
                <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Cédula del Cliente</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Zona/País</th>
                <th class="text-center">Cantidad de Botes</th>
                <th class="text-center">Fecha de Llenado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='text-center'>" . $row['id'] . "</td>";
                    echo "<td class='text-center'>" . $row['cedula_cliente'] . "</td>";
                    echo "<td class='text-center'>" . $row['cliente'] . "</td>";
                    echo "<td class='text-center'>" . $row['zona_pais'] . "</td>"; // Agregar la zona/país
                    echo "<td class='text-center'>" . $row['cantidad_bote'] . "</td>";
                    echo "<td class='text-center'>" . $row['fecha_llenado'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<br>
    <footer class="page-footer blue darken-1">
        <div class="footer-copyright">
            <div class="container">
                <p>Copyright © 2023 rubilopez.site</p>
                <a class="left" href="https://github.com/Fullsun15/Practica4.git" target="_blank"><img src="https://cdn-icons-png.flaticon.com/512/25/25231.png" width="35px" height="35px"></a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
