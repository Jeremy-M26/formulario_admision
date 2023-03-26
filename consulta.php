<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/formulario_admision/css/styles.css" rel="stylesheet" type="text/css" />
     <title>Document</title>
</head>
<body>
    <a id="logo1" href="index.html"><img src="/formulario_admision/css/Logo-Unad-inicio-1.png" alt="UNAD" ></a>
    <header>
        <h1 class="consult_h1">"Consultar solicitud"</h1>
    </header>
    <div>
    <input type="text" class="form_control" id="live_search" autocomplete="off" placeholder="Buscar..." >
    </div>

      
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