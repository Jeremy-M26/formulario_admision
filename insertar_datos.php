<?php
  include("conexion.php");// el include es para llamar a un archivo, en este caso el de la conexion

$cedula=$_POST["cedula"];
$idoculto=$_POST["idoculto"];
$pasaporte=$_POST["pasaporte"];
$nombre=$_POST["nombre"];
$primer_apellido=$_POST["apellido1"];
$segundo_apellido=$_POST["apellido2"];
$nacionalidad=$_POST["nacionalidad"];
$sexo=$_POST["sexo"];
$estado_civil=$_POST["estado_civil"];
$fecha_de_nacimiento=$_POST["edad"];
$tipo_de_sangre=$_POST["sangre"];
$religion=$_POST["religion"];
$carrera_a_estudiar=$_POST["carrera"];
$nivel_a_estudiar=$_POST["grado_post"];
$fecha_de_termino_de_estudios_secundarios=$_POST["termino"];
$direccion=$_POST["direccion"];
$provincia=$_POST["provincia"];
$telefono_residencial=$_POST["telefono"];
$telefono_celular=$_POST["celular"];
$correo_electronico=$_POST["email"];
$nombre_del_padre=$_POST["nombre_padre"];
$apellidos_del_padre=$_POST["apellidos_padre"];
$telefono_del_padre=$_POST["celular_padre"];
$nombre_de_la_madre=$_POST["nombre_madre"];
$apellidos_madre=$_POST["apellidos_madre"];
$celular_madre=$_POST["celular_madre"];


$sql = "INSERT INTO `admision`(`cedula`, `idoculto`, `pasaporte`, `nombre`, `primer_apellido`, `segundo_apellido`, `nacionalidad`, `sexo`, `estado_civil`, `fecha_de_nacimiento`, `tipo_de_sangre`, `religion`, `carrera_a_estudiar`, `nivel_a_estudiar`, `fecha_de_termino_de_estudios_secundarios`, `direccion`, `provincia`, `telefono_residencial`, `telefono_celular`, `correo_electronico`, `nombre_del_padre`, `apellidos_del_padre`, `telefono_del_padre`, `nombre_de_la_madre`, `apellidos_madre`, `celular_madre`) VALUES ('$cedula','$idoculto','$pasaporte','$nombre','$primer_apellido','$segundo_apellido','$nacionalidad','$sexo','$estado_civil','$fecha_de_nacimiento','$tipo_de_sangre','$religion','$carrera_a_estudiar','$fecha_de_termino_de_estudios_secundarios','$direccion','$provincia','$telefono_residencial','$telefono_celular','$telefono_celular','$correo_electronico','$nombre_del_padre','$apellidos_del_padre','$telefono_del_padre','$nombre_de_la_madre','$apellidos_madre','$celular_madre')";

$resultado = mysqli_query($conexion, $sql);

if ($resultado === TRUE) {
    header("location:../index.html");
} else {
    echo "Datos NO insertados";
}
?>