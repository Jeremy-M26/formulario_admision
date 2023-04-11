<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/formulario_admision/css/styles.css" rel="stylesheet" type="text/css" />
    <title>Consultar solicitudes</title>
    <!-- Datatable CSS -->
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- jQuery Library -->
    <script src="jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Datatable JS -->
    <script src="DataTables/datatables.min.js"></script>
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS DATATABLE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.semanticui.min.css" type="text/css">
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.semanticui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
    <style>
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
  <!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/formulario_admision/index.html">Universidad Tecnologica Nacional</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/formulario_admision/index.html">Volver a la pagina de inicio<span class="sr-only">(current)</span></a>
                </li>
                </ul>
            <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="text" placeholder="Buscar solicitud" id="live_search" aria-label="Buscar solicitud">
            </form>
            </div>
          </nav>
    </header>

    <!-- Ajax -->

    <div id="searchresult"></div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){

        $("#live_search").keyup(function(){
          var input =$(this).val();
          //alert(input);
          if(input !=""){
            $.ajax({
              url:"livesearch.php",
              method:"POST",
              data:{input:input},

              success:function(data){
                $("#searchresult").html(data);
                $("#searchresult").css("display","block");
              }
            });
          }else{
                $("#searchresult").css("display","none");
                
          }
        });
      });
      </script>
</body>
</html>