<?php
include("database.php");
if(@$_Post['GUARDAR']);
{

mysqli_query ($conn,"INSERT INTO PRODUCTOS (ID,NOMBRE_PRODUCTO,PRECIO,CANTIDAD,MARCA,DESCRIPCION,PROVEEDOR) VALUES( '$_POST[ID]','$_POST[NOMBREPRODUCTO]',
    '$_POST[PRECIO]','$_POST[CANTIDAD]','$_POST[MARCA]','$_POST[DESCRIPCION]','$_POST[PROVEEDOR]')");
}

    

header("Location:index.php" );


?>