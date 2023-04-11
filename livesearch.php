<?php
include("conexion.php");
if(isset($_POST['input'])){

    $input = $_POST['input'];

    $sql = "SELECT * FROM admision WHERE cedula LIKE '{$input}%' OR pasaporte LIKE '{$input}%' OR nombre LIKE '{$input}%' OR primer_apellido LIKE '{$input}%' OR segundo_apellido LIKE '{$input}%' OR nacionalidad LIKE '{$input}%' OR sexo LIKE '{$input}%' OR carrera_a_estudiar LIKE '{$input}%' OR id LIKE '{$input}%' LIMIT 3 ";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) > 0){?>

<div class="container" >
<table class="data_table ui celled table hover" style="width: 100%;">
<h1 id="table_title" >Consulta de solicitud</h1>
<thead>
    <tr>
        <th style="background-color: #cecece">#</th>
        <th style="background-color: #cecece">Cedula</th>
        <th style="background-color: #cecece">Nombre</th>
        <th style="background-color: #cecece">Primer apellido</th>
        <th style="background-color: #cecece">Segundo apellido</th>
        <th style="background-color: #cecece">Nacionalidad</th>
        <th style="background-color: #cecece">Sexo</th>
        <th style="background-color: #cecece">Estado civil</th>
        <th style="background-color: #cecece">Fecha de nacimiento</th>
        <th style="background-color: #cecece">Carrera a estudiar</th>
        <th style="background-color: #cecece">Fecha de la solicitud</th>
        <th style="background-color: #cecece">Estado de la solicitud</th>
        <th style="background-color: #cecece">Comentario</th>
    </tr>
</thead>

<tbody>
        <?php
        
        while($row = mysqli_fetch_assoc($resultado)){

            $id = $row['id'];
            $cedula = $row['cedula'];
            $nombre = $row['nombre'];
            $primer_apellido = $row['primer_apellido'];
            $segundo_apellido = $row['segundo_apellido'];
            $nacionalidad = $row['nacionalidad'];
            $sexo = $row['sexo'];
            $estado_civil = $row['estado_civil'];
            $fecha_de_nacimiento = $row['fecha_de_nacimiento'];
            $carrera_a_estudiar = $row['carrera_a_estudiar'];
            $fecha_solicitud = $row['fecha_solicitud'];
            $estado = $row['estado'];
            $comentario = $row['comentario'];
        ?>
        <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $cedula;?></td>
            <td><?php echo $nombre;?></td>
            <td><?php echo $primer_apellido;?></td>
            <td><?php echo $segundo_apellido;?></td>
            <td><?php echo $nacionalidad;?></td>
            <td><?php echo $sexo;?></td>
            <td><?php echo $estado_civil;?></td>
            <td><?php echo $fecha_de_nacimiento;?></td>
            <td><?php echo $carrera_a_estudiar;?></td>
            <td><?php echo $fecha_solicitud;?></td>
            <td><?php echo $estado;?></td>
            <td><?php echo $comentario;?></td>
       
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