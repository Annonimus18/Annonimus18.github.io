<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <title>PRODUCTOS</title>
</head>
<body>
<link rel="stylesheet" href="inicio.css">
    

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
    
    <h1>REGISTRO DE PRODUCTOS</h1>
    <?php
    include("database.php");

    // Mostrar mensaje de éxito si existe
    if (isset($_GET['message']) && $_GET['message'] == 'deleted') {
        echo "<p style='color: green;'>Producto Eliminado</p>";
    }
    ?>

    <table border="20">
        <thead>
            <tr>
                <th>PROVEEDOR</th>
                <th>ID</th>
                <th>NOMBRE_PRODUCTO</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>MARCA</th>
                <th>DESCRIPCION</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM PRODUCTOS";
            $resultado = mysqli_query($conn, $sql);
            while ($mostrar = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?php echo $mostrar['PROVEEDOR']?></td>
                <td><?php echo $mostrar['ID']; ?></td>
                <td><?php echo $mostrar['NOMBRE_PRODUCTO']; ?></td>
                <td><?php echo $mostrar['PRECIO']; ?></td>
                <td><?php echo $mostrar['CANTIDAD']; ?></td>
                <td><?php echo $mostrar['MARCA']; ?></td>
                <td><?php echo $mostrar['DESCRIPCION']; ?></td>
                <td>
                    <form action="eliminar.php" method="POST">
                        <input type="hidden" name="ID" value="<?php echo $mostrar['ID']; ?>">
                        <button type="submit" name="Eliminar">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="actualizar.php" method="GET">
                        <input type="hidden" name="ID" value="<?php echo $mostrar['ID']; ?>">
                        <button type="submit" name="Actualizar">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
