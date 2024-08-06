<?php
include("database.php");

$proveedor = [
    'ID' => '',
    'NOMBRE' => '',
    'CORREO' => '',
    'TELEFONO' => '',
    'DIRECCION' => '',
    'PRODUCTOS' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ID'])) {
    $id = $_GET['ID'];
    
    // Obtener los datos actuales del proveedor
    $sql = "SELECT * FROM PROVEEDORES WHERE ID = '$id'";
    $resultado = mysqli_query($conn, $sql);
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $proveedor = mysqli_fetch_assoc($resultado);
    } else {
        echo "Error al obtener los datos del proveedor: " . mysqli_error($conn);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ID'])) {
    $original_id = $_POST['ORIGINAL_ID'];
    $id = $_POST['ID'];
    $nombre = $_POST['NOMBRE'];
    $correo = $_POST['CORREO'];
    $telefono = $_POST['TELEFONO'];
    $direccion = $_POST['DIRECCION'];
    $productos = $_POST['PRODUCTOS'];

    // Actualizar el proveedor en la base de datos
    $sql = "UPDATE PROVEEDORES SET ID='$id', NOMBRE='$nombre', CORREO='$correo', TELEFONO='$telefono', DIRECCION='$direccion', PRODUCTOS='$productos' WHERE ID='$original_id'";
    if (mysqli_query($conn, $sql)) {
        // Redirigir a la página principal después de actualizar
        header('Location: proveedores.php');
        exit();
    } else {
        echo "Error al actualizar el proveedor: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Proveedor</title>
    <link rel="stylesheet" href="inicio.css">
</head>
<body>
    <header>
        <h1>BIENVENIDO</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">ENTRAR</a></li>
            <li><a href="proveedores.php">VER PROVEEDORES</a></li>
            <li><a href="datos.html">DATOS</a></li>
        </ul>
    </nav>

    <h1>Actualizar Proveedor</h1>
    <form action="actualizarprov.php" method="POST">
        <input type="hidden" name="ORIGINAL_ID" value="<?php echo htmlspecialchars($proveedor['ID']); ?>">
        <label for="ID">ID:</label>
        <input type="number" id="ID" name="ID" value="<?php echo htmlspecialchars($proveedor['ID']); ?>"><br>
        <label for="NOMBRE">Nombre:</label>
        <input type="text" id="NOMBRE" name="NOMBRE" value="<?php echo htmlspecialchars($proveedor['NOMBRE']); ?>"><br>
        <label for="CORREO">Correo:</label>
        <input type="email" id="CORREO" name="CORREO" value="<?php echo htmlspecialchars($proveedor['CORREO']); ?>"><br>
        <label for="TELEFONO">Teléfono:</label>
        <input type="tel" id="TELEFONO" name="TELEFONO" value="<?php echo htmlspecialchars($proveedor['TELEFONO']); ?>"><br>
        <label for="DIRECCION">Dirección:</label>
        <input type="text" id="DIRECCION" name="DIRECCION" value="<?php echo htmlspecialchars($proveedor['DIRECCION']); ?>"><br>
        <label for="PRODUCTOS">Productos:</label>
        <input type="text" id="PRODUCTOS" name="PRODUCTOS" value="<?php echo htmlspecialchars($proveedor['PRODUCTOS']); ?>"><br>
        <button type="submit">Actualizar</button>
   
