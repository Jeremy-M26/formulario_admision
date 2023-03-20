<?php

$conexion = mysqli_connect("localhost","root","","formulario_admision");

    if(!$conexion){
        echo "Conexion fallida" . mysqli_connect_error();    
    }
?>
