<?php
include("database.php");

$producto = [
    'ID' => '',
    'NOMBRE_PRODUCTO' => '',
    'PRECIO' => '',
    'CANTIDAD' => '',
    'MARCA' => '',
    'DESCRIPCION' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['ID'])) {
    $id = $_GET['ID'];
    
    // Obtener los datos actuales del producto
    $sql = "SELECT * FROM PRODUCTOS WHERE ID = '$id'";
    $resultado = mysqli_query($conn, $sql);
    $producto = mysqli_fetch_assoc($resultado);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ID'])) {
    $id = $_POST['ID'];
    $nombre_producto = $_POST['NOMBRE_PRODUCTO'];
    $precio = $_POST['PRECIO'];
    $cantidad = $_POST['CANTIDAD'];
    $marca = $_POST['MARCA'];
    $descripcion = $_POST['DESCRIPCION'];

    // Actualizar el producto en la base de datos
    $sql = "UPDATE PRODUCTOS SET NOMBRE_PRODUCTO='$nombre_producto', PRECIO='$precio', CANTIDAD='$cantidad', MARCA='$marca', DESCRIPCION='$descripcion' WHERE ID='$id'";
    if (mysqli_query($conn, $sql)) {
        // Redirigir a la página principal después de actualizar
        header('Location: productos.php');
        exit();
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
</head>
<body>
    <h1>Actualizar Producto</h1>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="ID" value="<?php echo htmlspecialchars($producto['ID']); ?>">
        <label for="NOMBRE_PRODUCTO">Nombre Producto:</label>
        <input type="text" name="NOMBRE_PRODUCTO" value="<?php echo htmlspecialchars($producto['NOMBRE_PRODUCTO']); ?>"><br>
        <label for="PRECIO">Precio:</label>
        <input type="text" name="PRECIO" value="<?php echo htmlspecialchars($producto['PRECIO']); ?>"><br>
        <label for="CANTIDAD">Cantidad:</label>
        <input type="text" name="CANTIDAD" value="<?php echo htmlspecialchars($producto['CANTIDAD']); ?>"><br>
        <label for="MARCA">Marca:</label>
        <input type="text" name="MARCA" value="<?php echo htmlspecialchars($producto['MARCA']); ?>"><br>
        <label for="DESCRIPCION">Descripción:</label>
        <input type="text" name="DESCRIPCION" value="<?php echo htmlspecialchars($producto['DESCRIPCION']); ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
