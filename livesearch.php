<?php
include("conexion.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $sql = "SELECT * FROM admision WHERE cedula LIKE '{$input}%' OR pasaporte LIKE '{$input}%' OR nombre LIKE '{$input}%' OR primer_apellido LIKE '{$input}%' OR segundo_apellido LIKE '{$input}%' OR nacionalidad LIKE '{$input}%' OR sexo LIKE '{$input}%' OR carrera_a_estudiar LIKE '{$input}%' OR idoculto LIKE '{$input}%' LIMIT 3 ";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){?>

<div class="contenedor_tabla" >
<table class="data_table">
<h1 id="table_title" >Solicitud</h1>
<thead>
    <tr>
        <th>#</th>
        <th>Cedula</th>
        <th>Pasaporte</th>
        <th>Nombre</th>
        <th>Primer apellido</th>
        <th>Segundo apellido</th>
        <th>Nacionalidad</th>
        <th>Sexo</th>
        <th>Estado civil</th>
        <th>Fecha de nacimiento</th>
        <th>Tipo de sangre</th>
        <th>Carrera a estudiar</th>
    </tr>
</thead>

<tbody>
        <?php
        
        while($row = mysqli_fetch_assoc($resultado)){

            $idoculto = $row['idoculto'];
            $cedula = $row['cedula'];
            $pasaporte = $row['pasaporte'];
            $nombre = $row['nombre'];
            $primer_apellido = $row['primer_apellido'];
            $segundo_apellido = $row['segundo_apellido'];
            $nacionalidad = $row['nacionalidad'];
            $sexo = $row['sexo'];
            $estado_civil = $row['estado_civil'];
            $fecha_de_nacimiento = $row['fecha_de_nacimiento'];
            $tipo_de_sangre = $row['tipo_de_sangre'];
            $carrera_a_estudiar = $row['carrera_a_estudiar'];
        ?>
        <tr>
            <td><?php echo $idoculto;?></td>
            <td><?php echo $cedula;?></td>
            <td><?php echo $pasaporte;?></td>
            <td><?php echo $nombre;?></td>
            <td><?php echo $primer_apellido;?></td>
            <td><?php echo $segundo_apellido;?></td>
            <td><?php echo $nacionalidad;?></td>
            <td><?php echo $sexo;?></td>
            <td><?php echo $estado_civil;?></td>
            <td><?php echo $fecha_de_nacimiento;?></td>
            <td><?php echo $tipo_de_sangre;?></td>
            <td><?php echo $carrera_a_estudiar;?></td>
        </tr>
        <?php

        }
        ?>
</tbody>
</table>
</div>
<?php

    }else{

        echo "<h6 class= 'text-danger text-center mt-3'>La solicitud no ha sido encontrada</h6>";

    }

}
?>