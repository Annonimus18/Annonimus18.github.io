<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVEEDORES</title>
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
    
<h1>REGISTRO DE PROVEEDORES</h1>
    <?php
    include("database.php");

    // Mostrar mensaje de éxito si existe
    if (isset($_GET['message']) && $_GET['message'] == 'deleted') {
        echo "<p style='color: green;'>Usuario Eliminado</p>";
    }
    ?>

    
    <table border="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>TELEFONO</th>
                <th>DIRECCION</th>
                <th>PRODUCTOS</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM PROVEEDORES";
            $resultado = mysqli_query($conn, $sql);
            while ($mostrar = mysqli_fetch_array($resultado)) {
        ?>


            <tr>
                <td><?php echo $mostrar['ID']; ?></td>
                <td><?php echo $mostrar['NOMBRE']; ?></td>
                <td><?php echo $mostrar['CORREO']; ?></td>
                <td><?php echo $mostrar['TELEFONO']; ?></td>
                <td><?php echo $mostrar['DIRECCION']; ?></td>
                <td><?php echo $mostrar['PRODUCTOS']; ?></td>
                <td>
                    <form action="deleteprov.php" method="POST">
                        <input type="hidden" name="ID" value="<?php echo $mostrar['ID']; ?>">
                        <button type="submit" name="Eliminar">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="actualizarprov.php" method="GET">
                        <input type="hidden" name="ID" value="<?php echo $mostrar['ID']; ?>">
                        <button type="submit" name="Actualizar">Actualizar</button>
                    </form>
                </td>
               
            </tr>
            <?php
            }
            ?>


            </tbody>
        
        
    </table>
    
            

            

</body>
</html>