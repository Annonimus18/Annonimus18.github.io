<?php
include("tablaprovee.php");
if(@$_Post['GUARDAR']);
{

mysqli_query ($conn,"INSERT INTO PROVEEDORES (ID,NOMBRE,CORREO,TELEFONO,DIRECCION,PRODUCTOS) VALUES( '$_POST[ID]','$_POST[NOMBRE]',
    '$_POST[CORREO]','$_POST[TELEFONO]','$_POST[DIRECCION]','$_POST[PRODUCTOS]')");
}

    

header("Location:prov.html" );


?>