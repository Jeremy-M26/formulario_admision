<?php
include 'conexion.php';

$request = 1;
if(isset($_POST['request'])){
    $request = $_POST['request'];
}

// DataTable data
if($request == 1){
    ## Read value
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; // Rows display per page
    $columnIndex = $_POST['order'][0]['column']; // Column index
    $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc

    $searchValue = mysqli_escape_string($conexion,$_POST['search']['value']); // Search value

    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (id like '%".$searchValue."%' or 
            cedula like '%".$searchValue."%' or 
            nombre like'%".$searchValue."%'  or 
            primer_apellido like'%".$searchValue."%'  or 
            nacionalidad like'%".$searchValue."%'  or 
            sexo like'%".$searchValue."%'  or 
            carrera_a_estudiar like'%".$searchValue."%' or
            fecha_solicitud like'%".$searchValue."%' or  
            estado like'%".$searchValue."%'
             ) ";
    }

    ## Total number of records without filtering
    $sel = mysqli_query($conexion,"select count(*) as allcount from admision");
    $records = mysqli_fetch_assoc($sel);
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = mysqli_query($conexion,"select count(*) as allcount from admision WHERE 1 ".$searchQuery);
    $records = mysqli_fetch_assoc($sel);
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from admision WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
    $empRecords = mysqli_query($conexion, $empQuery);
    $data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {

        // Update Button
        $updateButton = "<button class='btn btn-sm btn-primary btn-block pr-sm-0 updateUser' data-id='".$row['id']."' data-toggle='modal' data-target='#updateModal'>Editar</button>";

        // Delete Button
        $deleteButton = "<button class='btn btn-sm btn-danger btn-block pr-sm-0 deleteUser' data-id='".$row['id']."'>Borrar solicitud</button>";
        
        $action = $updateButton." ".$deleteButton;

        $data[] = array(
                "id" => $row['id'],
                "cedula" => $row['cedula'],
                "nombre" => $row['nombre'],
                "primer_apellido" => $row['primer_apellido'],
                "nacionalidad" => $row['nacionalidad'],
                "sexo" => $row['sexo'],
                "carrera_a_estudiar" => $row['carrera_a_estudiar'],
                "fecha_solicitud" => $row['fecha_solicitud'],
                "estado" => $row['estado'],
                "action" => $action,
                "comentario" => $row['comentario']
            );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}

// Fetch user details
if($request == 2){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($conexion,$_POST['id']);
    }

    $record = mysqli_query($conexion,"SELECT * FROM admision WHERE id=".$id);

    $response = array();

    if(mysqli_num_rows($record) > 0){
        $row = mysqli_fetch_assoc($record);
        $response = array(
            "id" => $row['id'],
            "cedula" => $row['cedula'],
            "nombre" => $row['nombre'],
            "primer_apellido" => $row['primer_apellido'],
            "nacionalidad" => $row['nacionalidad'],
            "sexo" => $row['sexo'],
            "carrera_a_estudiar" => $row['carrera_a_estudiar'],
            "fecha_solicitud" => $row['fecha_solicitud'],
            "estado" => $row['estado'],
            "comentario" => $row['comentario'],
        );

        echo json_encode( array("status" => 1,"data" => $response) );
        exit;
    }else{
        echo json_encode( array("status" => 0) );
        exit;
    }
}

// Update user
if($request == 3){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($conexion,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($conexion,"SELECT id FROM admision WHERE id=".$id);
    if(mysqli_num_rows($record) > 0){

        $estado = mysqli_escape_string($conexion,trim($_POST['estado']));
        $comentario = mysqli_escape_string($conexion,trim($_POST['comentario']));

        if( $estado != '' ){

            mysqli_query($conexion,"UPDATE admision SET estado='".$estado."', comentario='".$comentario."' WHERE id=".$id);

            echo json_encode( array("status" => 1,"message" => "Datos actualizados.") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "Por favor rellene todos los campos.") );
            exit;
        }
        
    }else{
        echo json_encode( array("status" => 0,"message" => "ID INVALIDO.") );
        exit;
    }
}

// Delete User
if($request == 4){
    $id = 0;

    if(isset($_POST['id'])){
        $id = mysqli_escape_string($conexion,$_POST['id']);
    }

    // Check id
    $record = mysqli_query($conexion,"SELECT id FROM admision WHERE id=".$id);
    if(mysqli_num_rows($record) > 0){

        mysqli_query($conexion,"DELETE FROM admision WHERE id=".$id);

        echo 1;
        exit;
    }else{
        echo 0;
        exit;
    }
}