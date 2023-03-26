<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "formulario_admision"; /* Database name */

$conexion = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conexion) {
 die("Connection failed: " . mysqli_connect_error());
}
