<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="auditor" || $_SESSION["acceso"]=="tecnico" || $_SESSION['acceso'] == "general" || $_SESSION["acceso"]=="ginecologo" || $_SESSION["acceso"]=="laboratorio" || $_SESSION["acceso"]=="radiologo" || $_SESSION["acceso"]=="terapeuta" || $_SESSION["acceso"]=="odontologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="assets/images/favicon.png" rel="icon" type="image">
<link type="text/css" rel="stylesheet" media="all" href="assets/css/calendariocitas.css">
<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/fullcalendar/dist/fullcalendar.css" rel="stylesheet">
 
<!-- script jquery -->
<script src="assets/js/jquery.min.js"></script> 
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/script/script2.js"></script>
<script type="text/javascript" src="assets/plugins/Chart.js/Chart.min.js"></script>
<script type="text/javascript" src="assets/plugins/Chart.js/legend.js"></script>
<!-- script jquery -->	 
 </head>

 <body onLoad="muestraReloj();" class="fixed-left">
 <div id="wrapper">
 <div class="topbar">
 <div class="topbar-left">
 <div class="text-center">

<a href="panel" class="logo"><img src="assets/images/logo_white_2.png" height="50"><span class="current-logo"></span></a>

<a href="panel" class="logo-sm"><img src="assets/images/logo_sm.png" height="50"></a>
                    </div>
 </div>
 <div class="navbar navbar-default" role="navigation">
 <div class="container">
 <div class="">
 <div class="pull-left"> 
 <button type="button" class="button-menu-mobile open-left waves-effect waves-light"><i class="ion-navicon"></i> </button> 
 <span class="clearfix"></span></div>
 <form class="navbar-form pull-left" role="search">
 <div class="form-group"> 
 <input class="form-control search-bar" placeholder="Búsqueda..." type="text">
 </div> 
 <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
 </form>
 <ul class="nav navbar-nav navbar-right pull-right">
 

<!--- MEJORAR DE AQUI ---->
                                <!-- Reloj start-->
                                <li id="header_inbox_bar" class="dropdown hidden-xs">
                                    <a data-toggle="dropdown" class="hour" href="#">
                                    <span id="spanreloj"></span>
                                    </a>
                                </li>
                                <!-- Reloj end -->
<!--- MEJORAR DE AQUI ---->
   

<!----- INICIO DE SESSION ----->
<li class="hidden-xs"> 
   <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-crosshairs"></i></a>   </li>
   <li class="dropdown"> 
   <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">

<span class="dropdown hidden-xs"><abbr title="<?php echo $_SESSION['x']; ?>"><?php echo $_SESSION['ingreso']; ?></abbr> </span>
  <?php
if($_SESSION["tipo"]=="1"){
  
     if (isset($_SESSION['cedula'])) {
         if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
             echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
        }

} else {
	
     if (isset($_SESSION['codmedico'])) {
	       if (file_exists("fotos/".$_SESSION['codmedico'].".jpg")){
             echo "<img src='fotos/".$_SESSION['codmedico'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
         } } else {
	           echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
        }
  }
?> 

</a>
   <ul class="dropdown-menu">
   <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
   <li><a href="password"><i class="fa fa-edit"></i> Actualizar Password </a></li>
   <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
   <li class="divider"></li>
   <li><a href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   </ul>
   </li>
   </ul>
   </div>
   </div>
   </div>
   </div>
   <div class="left side-menu">
   <div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 566px;">
   
   <div class="user-details">
   <div class="text-center"> <?php
if($_SESSION["tipo"]=="1"){
  
     if (isset($_SESSION['cedula'])) {
         if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
             echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
        }

} else {
  
     if (isset($_SESSION['codmedico'])) {
         if (file_exists("fotos/".$_SESSION['codmedico'].".jpg")){
             echo "<img src='fotos/".$_SESSION['codmedico'].".jpg?' class='img-circle'>"; 
         } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
         } } else {
             echo "<img src='fotos/avatar2.jpg' class='img-circle'>"; 
        }
  }
?> </div>
   <div class="user-info">
   <div class="dropdown"> 
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['x']; ?></a>
   <ul class="dropdown-menu">
  <li><a href="perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
   <li><a href="password"><i class="fa fa-edit"></i> Actualizar Password </a></li>
   <li><a href="bloqueo"><i class="fa fa-clock-o"></i> Bloquear Sesión</a></li>
   <li class="divider"></li>
   <li><a href="logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   </ul>
   </div>
   <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
   </div>
   </div>
  <!----- FIN DE SESSION ----->

  <!----- INICIO DE MENU ----->
  <?php include('menu.php'); ?>
  <!----- FIN DE MENU ----->

<?php
$con = new Login();
$con = $con->ContarRegistros();

$pro = new Login();
$pro = $pro->CitasProceso();

$ver = new Login();
$ver = $ver->CitasVerificada();

$can = new Login();
$can = $can->CitasCancelada();

$gin = new Login();
$gin = $gin->ContarGinecologia();

$rad = new Login();
$rad = $rad->ContarRadiologia();
?>
   
<div class="clearfix"></div>
</div>
</div>
</div>

<div class="content-page">
<div class="content">
<div class="container">

<div class="row">
<div class="col-sm-12">
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Panel Principal </h4>
<ol class="breadcrumb pull-right">
<li class="active">Panel Principal</li>
</ol>

<div class="clearfix"></div>
</div>
</div>
</div>


<?php if($_SESSION["tipo"]=="1"){ ?>

  <div class="row">

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Total Médicos</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="fa fa-user-md"></span> <?php echo $con[0]['med'] ?></b></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Total Pacientes</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="fa fa-user"></span> <?php echo $con[0]['pac'] ?></b></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Total Usuarios</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="ion ion-android-contact"></span> <?php echo $con[0]['user'] ?></b></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Total Accesos</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="ion ion-ios7-timer"></span> <?php echo $con[0]['total'] ?></b></h3>
        </div>
      </div>
    </div>

  </div>


  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-border panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-area-chart"></i> Citas Médicas</h3>
        </div>
        <div class="panel-body">
          <div align="center" id="canvas-holder" class="widget-content">
            <canvas id="lineChart" width="600" height="250"></canvas>
            <h5><div id="lineLegendd"></div></h5>
          </div>
<script>

var data = {
      labels : ["Médico General","Ginecología","Bacteriología","Odontología","Radiología","Terapeuta"],
      datasets : [
        {
          fillColor : "rgba(49, 126, 235, 0.2)",
          strokeColor : "#6b9dfa",
          pointColor : "#1e45d7",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(49, 126, 235, 1)",
          data : [<?php 

      if($pro[0]['total'] == 0) { echo 0; } else {

      $meses = array("MEDICO GENERAL" => 0, "GINECOLOGO"=> 0, "BACTERIOLOGO"=> 0, "ODONTOLOGO"=> 0, "RADIOLOGO"=> 0, "TERAPEUTA"=> 0);
                    foreach($pro as $row) {
                        $mes = $row['totalmes'];
                        $meses[$mes] = $row['total'];
                                          }
                    foreach($meses as $mes) {
                        echo "{$mes},"; } } ?>],
          label: 'Citas En Proceso'
        },
        {
          label: "Citas Verificada",
          fillColor : "rgba(249,79,71,0.2)",
          strokeColor : "#eb5d82",
          pointColor : "#b74865",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(249,79,71,1)",
          data : [<?php 

      if($ver[0]['total'] == 0) { echo 0; } else {

      $meses = array("MEDICO GENERAL" => 0, "GINECOLOGO"=> 0, "BACTERIOLOGO"=> 0, "ODONTOLOGO"=> 0, "RADIOLOGO"=> 0, "TERAPEUTA"=> 0);
                    foreach($ver as $row) {
                        $mes = $row['totalmes'];
                        $meses[$mes] = $row['total'];
                                          }
                    foreach($meses as $mes) {
                        echo "{$mes},"; } } ?>]
        },
        {
          label: "Citas Cancelada",
          fillColor : "rgba(248,250,96,0.2)",
          strokeColor : "#e9e225",
          pointColor : "#faab12",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(248,250,96,1)",
          data : [<?php

      if($can[0]['total'] == 0) { echo 0; } else {
 
      $meses = array("MEDICO GENERAL" => 0, "GINECOLOGO"=> 0, "BACTERIOLOGO"=> 0, "ODONTOLOGO"=> 0, "RADIOLOGO"=> 0, "TERAPEUTA"=> 0);
                    foreach($can as $row) {
                        $mes = $row['totalmes'];
                        $meses[$mes] = $row['total'];
                                          }
                    foreach($meses as $mes) {
                        echo "{$mes},"; } } ?>]
               }
            ]

    }

var ctx = document.getElementById("lineChart").getContext("2d");
var lineChart = new Chart(ctx).Line(data, {
   responsive : true,
   animation: true,
   barValueSpacing : 5,
   barDatasetSpacing : 1,
   tooltipFillColor: "rgba(0,0,0,0.8)",                
   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
});
//legend(document.getElementById("lineLegendd"), data, lineChart, "<%=label%>: <%=value%>");
legend(document.getElementById("lineLegendd"), data, "<%=label%>: <%=value%>g");


</script>
                                    </div>
                              </div>
                          </div>
                    </div>

                    <div class="row">
                         
                          <div class="col-lg-6">
                              <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-pie-chart"></i> Citas Ginecologícas</h3>
                                    </div>
                                    <div class="panel-body">
                  <div id="canvas-holder" class="widget-content">
                  <table>
                  <tr>
                  <td width="10"><h5><div style="clear: left;" id="pieLegend"></div></h5></td>
                  <td width="80"><canvas id="pieChart" width="250" height="250"></canvas></td>
                  </tr>
                  </table>
                                    </div>
<script>
var data = [
                {
          value: <?php echo $gin[0]['ape'] ?>,
          color:"#0b82e7",
          highlight: "#0c62ab",
          label: "Aperturas"
        },
        {
          value: <?php echo $gin[0]['hojas'] ?>,
          color: "#e3e860",
          highlight: "#a9ad47",
          label: "Hojas Evolutivas"
        },
        {
          value: <?php echo $gin[0]['rem'] ?>,
          color: "#eb5d82",
          highlight: "#b74865",
          label: "Remisiones"
        },
        {
          value: <?php echo $gin[0]['fo'] ?>,
          color: "red",
          highlight: "#FF0043",
          label: "Fórm Médicas"
        },
        {
          value: <?php echo $gin[0]['crio'] ?>,
          color: "blue",
          highlight: "#2000FF",
          label: "Criocauterización"
        },
        {
          value: <?php echo $gin[0]['colp'] ?>,
          color: "#5ae85a",
          highlight: "#42a642",
          label: "Colposcopias"
        },
        {
          value: <?php echo $gin[0]['ecog'] ?>,
          color: "#a6429b",
          highlight: "#e965db",
          label: "Ecografías"
        }
      ];

var ctx = document.getElementById("pieChart").getContext("2d");
var pieChart = new Chart(ctx).Pie(data, {responsive:true});
legend(document.getElementById("pieLegend"), data, pieChart, "<%=label%>: <%=value%>");
</script>
                                    </div>
                  
                              </div>
                          </div>

                         
                          <div class="col-lg-6">
                              <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Citas en Radiología</h3>
                                    </div>
                                    <div class="panel-body">
                  <div align="center" id="canvas-holder" class="widget-content">
                  <canvas id="barChart" width="250" height="105"></canvas>
                  <h5><div id="barLegend"></div></h5> 
                  </div>
      <script>  
var data = {
    labels : ["Citas para Radiologia"],
    datasets : [
      {
        fillColor : "#6b9dfa",
        strokeColor : "#6b9dfa",
        highlightFill: "#1864f2",
        highlightStroke: "#6b9dfa",
        data : [<?php echo $rad[0]['si'] ?>],
                label : 'Con Lectura Rx'
      },
            {
                fillColor : "rgba(255, 87, 51, 0.5)",
                strokeColor : "rgba(255, 87, 51, 0.75)",
                highlightFill : "rgba(255, 87, 51, 1)",
                highlightStroke : "#fff",
                data : [<?php echo $rad[0]['no'] ?>],
                label : 'Sin Lectura Rx'
            }
    ]

  } 

var ctx = document.getElementById("barChart").getContext("2d");
var barChart = new Chart(ctx).Bar(data, {
   responsive : true,
   animation: true,
   barValueSpacing : 5,
   barDatasetSpacing : 1,
   tooltipFillColor: "rgba(0,0,0,0.8)",                
   multiTooltipTemplate: "<%= datasetLabel %> - <%= value %>"
});
legend(document.getElementById("barLegend"), data, barChart, "<%=label%> ");
//legend(document.getElementById("barLegend"), data, "<%=label%>: <%=value%>g");
</script>
                                    </div>
                              </div>
                          </div>

                    </div>


<?php } else { ?>

  <div class="row">

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Total Pacientes</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="fa fa-user"></span> <?php echo $con[0]['pac'] ?></b></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Citas Pendientes</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="fa fa-calendar"></span> <?php echo $con[0]['proceso'] ?></b></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Citas Verificadas </h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="fa fa-calendar"></span> <?php echo $con[0]['verificada'] ?></b></h3>
        </div>
      </div>
    </div>

    <div class="col-sm-3 col-lg-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-tasks"></i> Citas Canceladas</h4></div>
        <div class="panel-body">
          <h3 class=""><b><span class="fa fa-calendar"></span> <?php echo $con[0]['cancelada'] ?></b></h3>
        </div>
      </div>
    </div>

</div>

  <div class="row">
                    <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-area-chart"></i> Citas Médicas</h3>
                                    </div>
                                    <div class="panel-body">

                                  <div class="col-md-12">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                          <div class="calendario_ajax">
                                         <div id="cal"></div>
                                         <div id="mask"></div>
                                          </div></div>
                                  </div>
                
  <script>
 function generar_calendario(mes,anio)
  {
    //var agenda=$(".cal");
    //agenda.html("<img src='assets/images/loading.gif'>");
    $.ajax({
      type: "GET",
      url: "ajax_calendario.php",
      cache: false,
      data: { mes:mes,anio:anio,accion:"generar_calendario" }
    }).done(function( respuesta ) 
    {
      //agenda.html(respuesta);
      $('#cal').html(respuesta);
    });
  }
    
  function formatDate (input) {
    var datePart = input.match(/\d+/g),
    year = datePart[0].substring(2),
    month = datePart[1], day = datePart[2];
    return day+'-'+month+'-'+year;
  }
    
    $(document).ready(function()
    {
      //GENERAMOS CALENDARIO CON FECHA DE HOY 
      generar_calendario("<?php if (isset($_GET["mes"])) echo $_GET["mes"]; ?>","<?php if (isset($_GET["anio"])) echo $_GET["anio"]; ?>");
      
      //LISTAR EVENTOS DEL DIA 
      $(document).on("click",'a.modall',function(e) 
      {
        e.preventDefault();
        var fecha = $(this).attr('rel');
        
        $('#mask').fadeIn(1000).html('<div id="nuevo_evento" rel="'+fecha+'" class="window" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog"><div class="modal-content p-0 b-0"><div class="panel panel-color panel-primary"><div class="panel-heading"><button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button><h3 class="panel-title"><i class="fa fa-align-justify"></i> Citas Médicas del '+formatDate(fecha)+'</h3></div><div class="panel-body"><div id="respuesta"></div><div id="respuesta_form"></div></div><div class="modal-footer"><button type="button" id="close" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times-circle"></span> Aceptar</button></div></div></div></div></div>');
        $.ajax({
          type: "GET",
          url: "ajax_calendario.php",
          cache: false,
          data: { fecha:fecha,accion:"listar_evento" }
        }).done(function( respuesta ) 
        {
          $("#respuesta_form").html(respuesta);
        });
      
      });
    
      $(document).on("click",'#close',function (e) 
      {
        e.preventDefault();
        $('#mask').fadeOut();
        setTimeout(function() 
        { 
          var fecha=$(".window").attr("rel");
          var fechacal=fecha.split("-");
          generar_calendario(fechacal[1],fechacal[0]);
        }, 500);
      });
        
      $(document).on("click",".anterior,.siguiente",function(e)
      {
        e.preventDefault();
        var datos=$(this).attr("rel");
        var nueva_fecha=datos.split("-");
        generar_calendario(nueva_fecha[1],nueva_fecha[0]);
      });

    });
    </script>  
                 

                                    </div>
                            </div>
                    </div>
  </div>

                    



<?php } ?>

<footer class="footer"> <i class="fa fa-copyright"></i> <span class="current-year"></span>. </footer>
</div>
</div> 

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.app.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/plugins/moment/moment.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        
        
        <!-- flot Chart -->
        <script src="assets/plugins/flot-chart/jquery.flot.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
		
		
		<!-- Datatables-->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.scroller.min.js"></script>

        <script src="assets/plugins/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="assets/pages/jquery.fullcalendar.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>


        <!-- jQuery  -->
        <script src="assets/pages/jquery.todo.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/pages/jquery.chat.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/pages/jquery.dashboard.js"></script>
        
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
		

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>

		</body>
		</html>
<?php } else { ?>   
        <script type='text/javascript' language='javascript'>
        alert('NO TIENES PERMISO PARA ACCEDER A ESTA PAGINA.\nCONSULTA CON EL ADMINISTRADOR PARA QUE TE DE ACCESO')  
        document.location.href='panel'   
        </script> 
<?php } } else { ?>
        <script type='text/javascript' language='javascript'>
        alert('NO TIENES PERMISO PARA ACCEDER AL SISTEMA.\nDEBERA DE INICIAR SESION')  
        document.location.href='logout'  
        </script> 
<?php } ?>  