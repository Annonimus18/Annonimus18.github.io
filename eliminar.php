<?php
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ID'])) {
    $id = $_POST['ID'];
    
    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM PRODUCTOS WHERE ID = '$id'";
    if (mysqli_query($conn, $sql)) {
        // Redirigir a la página principal con un mensaje de éxito
        header('Location: productos.php?message=deleted');
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }
}
?>
