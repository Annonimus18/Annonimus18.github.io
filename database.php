<?php
$servername = "localhost";
$database = "STORE";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password,$database);

if($conn -> connect_error){
    echo"Error connecting";
}
else{
    //echo"Conexion exitosa";
}


?>