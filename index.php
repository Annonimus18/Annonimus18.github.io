<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>STORE</title>
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
    
        
    </body>
    </html>
    
    <form action="registro.php" method="post">

        <input class="controls" type="text" name="ID" id="ID" placeholder="ID">
        <br>
        <br>
        <input class="controls" type="text" name="NOMBREPRODUCTO" id="NOMBREPRODUCTO" placeholder="NOMBRE DEL PRODUCTO">
        <br>
        <br>
        <input class="controls" type="number" name="PRECIO" id="PRECIO" placeholder="PRECIO">
        <br>
        <br>
        <input class="controls" type="number" name="CANTIDAD" id="CANTIDAD" placeholder="CANTIDAD">
        <br>
        <br>
        <input class="controls" type="text" name="MARCA" id="MARCA" placeholder="MARCA">
        <br>
        <br>
        <input class="controls" type="text" name="DESCRIPCION" id="DESCRIPCION" placeholder="DESCRIPCION">
         <br>
         <br>
         <select name="PROVEEDOR" id="">
            <option value="0">selection</option>
            <?php
            include("database.php");
            $prov = "SELECT * FROM PROVEEDORES";
            $result = mysqli_query($conn, $prov);

            while($mostrar = mysqli_fetch_array($result)){
                $id =  $mostrar['ID'];
                $nombre =  $mostrar['NOMBRE'];
                $correo =  $mostrar['CORREO'];
                $telefono =  $mostrar['TELEFONO'];
                $direccion =  $mostrar['DIRECCION'];
                $productos =  $mostrar['PRODUCTOS'];

                ?>
                <option value="<?=$nombre?>">
                    <?php 
                    echo $nombre;
                    ?>
                </option>

               <?php

            }
?>
         </select>
         <br>
        <input class="botons" type="submit" value="GUARDAR" name="GUARDAR" id="GUARDAR">
         <br>
         <br>
        <a href="productos.php"> <input class="botons" type="button" value="MOSTRAR PRODUCTOS" name="MOSTRAR PRODUCTOS" id="MOSTRAR PRODUCTOS"></a>
         <a href="datos.html"><input class="botons" type="button" value="MOSTRAR DATOS" name="MOSTRAR DATOS" id="MOSTRAR DATOS"></a>
         <br>
         <br>
         <br>
         <a href="prov.html"><input clas="botons" type="button" value="PROVEEDORES" name="PROVEEDORES" id="PROVEEDORES"></a>
         <a href="proveedores.php"><input clas="botons" type="button" value="MOSTRAR PROVEEDORES" name="MOSTRAR PROVEEDORES" id="MOSTRAR PROVEEDORES"></a>

        
    </form>


    
</body>
</html>