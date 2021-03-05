<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION['acceso'] == "odontologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->OdontologiaPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarOdontologia();
exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="assets/images/favicon.png" rel="icon" type="image">
<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css"> 

<!-- script dientes -->
<link rel="stylesheet" href="assets/css/cssDiente.css">
<link rel="stylesheet" href="assets/css/cssFormulario.css">
<link rel="stylesheet" href="assets/css/cssComponentesPersonalizados.css">
<link rel="stylesheet" href="assets/css/cssContenido.css">

<!-- script jquery -->
<script src="assets/js/jquery-2.0.3.min.js"></script>
<script src="assets/script/jsAcciones.js"></script>
<script src="assets/script/html2canvas.js" type="text/javascript"></script> 
<script src="assets/js/jquery.min.js"></script>  
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/script/script2.js"></script>
<script type="text/javascript" src="assets/script/validation.min.js"></script>
<script type="text/javascript" src="assets/script/script.js"></script>
<!-- script jquery -->  


<!-- Calendario -->
<link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
<script src="assets/calendario/jquery-ui.js"></script>
<script src="assets/script/jscalendario.js"></script>
<script src="assets/script/autocompleto.js"></script>
<!-- Calendario -->
  

</head>
<body onLoad="muestraReloj()" class="fixed-left">
                    

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

<div class="clearfix"></div>
                </div>
       </div>
</div>

<div class="content-page">
<div class="content">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Odontología</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="odontologia">Control</a></li>
<li class="active">Gestión de Odontología</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="updateodontologia" id="updateodontologia" method="post" data-id="<?php echo $reg[0]["cododontologia"] ?>" action="#" onSubmit="asigna()"> 
      

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                  </div> 

<input type="hidden" name="cododontologia" id="cododontologia" value="<?php echo $reg[0]['cododontologia']; ?>">
<input type="hidden" name="codmedico" id="codmedico" value="<?php echo $reg[0]['codmedico']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $reg[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $reg[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $reg[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="<?php echo $reg[0]['procedimiento']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $reg[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($reg[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($reg[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $reg[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $reg[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $reg[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $reg[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $reg[0]['ocupacionpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>    
                    </div>


                    </div><!-- /.box-body -->
                </div>
                          </div>
                     </div>
              </div>
       </div>
</div>


<?php if ($reg[0]['procedimiento']=="1") { ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Atención Actividad y/o Procedimiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
  <label class="control-label">Atención Actividad y/o Procedimiento: <span class="symbol required"></span></label>
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $reg[0]['codpaciente']; ?>">
<textarea name="plantratamiento" class="form-control" id="plantratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención Actividad y/o Procedimiento" rows="5" required="" aria-required="true"><?php echo $reg[0]['plantratamiento']; ?></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
<button class="btn btn-danger waves-effect waves-light" type="reset"><span class="fa fa-trash-o"></span> Cancelar</button> 
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php } else { ?>



<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-diamond"></i> Odontograma</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

<div id="seccionDientes" class="sombraFormulario">

<input type="hidden" id="hiddenEstados" name="estados" value="<?php echo $reg[0]['estados']; ?>">
<input type="hidden" id="codpaciente" name="codpaciente" value="<?php echo $reg[0]["codpaciente"]; ?>">
  
  <section id="odontogramaSuperior" class="textAlignCenter">
      <input type="text" id="txtD18" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD17" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD16" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD15" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD14" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD13" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD12" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD11" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD21" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD22" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD23" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD24" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD25" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD26" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD27" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD28" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    
    <br>
        
    <div class="diente" id="D18"><div id="D18-C1"></div><div id="D18-C2"></div><div id="D18-C3"></div><div id="D18-C4"></div><div id="D18-C5"></div><div onclick="seleccionarDiente('D18');">D18</div></div>
    <div class="diente" id="D17"><div id="D17-C1"></div><div id="D17-C2"></div><div id="D17-C3"></div><div id="D17-C4"></div><div id="D17-C5"></div><div onclick="seleccionarDiente('D17');">D17</div></div>
    <div class="diente" id="D16"><div id="D16-C1"></div><div id="D16-C2"></div><div id="D16-C3"></div><div id="D16-C4"></div><div id="D16-C5"></div><div onclick="seleccionarDiente('D16');">D16</div></div>
    <div class="diente" id="D15"><div id="D15-C1"></div><div id="D15-C2"></div><div id="D15-C3"></div><div id="D15-C4"></div><div id="D15-C5"></div><div onclick="seleccionarDiente('D15');">D15</div></div>
    <div class="diente" id="D14"><div id="D14-C1"></div><div id="D14-C2"></div><div id="D14-C3"></div><div id="D14-C4"></div><div id="D14-C5"></div><div onclick="seleccionarDiente('D14');">D14</div></div>
    <div class="diente" id="D13"><div id="D13-C1"></div><div id="D13-C2"></div><div id="D13-C3"></div><div id="D13-C4"></div><div id="D13-C5"></div><div onclick="seleccionarDiente('D13');">D13</div></div>
    <div class="diente" id="D12"><div id="D12-C1"></div><div id="D12-C2"></div><div id="D12-C3"></div><div id="D12-C4"></div><div id="D12-C5"></div><div onclick="seleccionarDiente('D12');">D12</div></div>
    <div class="diente" id="D11"><div id="D11-C1"></div><div id="D11-C2"></div><div id="D11-C3"></div><div id="D11-C4"></div><div id="D11-C5"></div><div onclick="seleccionarDiente('D11');">D11</div></div>
    |-|
    <div class="diente" id="D21"><div id="D21-C1"></div><div id="D21-C2"></div><div id="D21-C3"></div><div id="D21-C4"></div><div id="D21-C5"></div><div onclick="seleccionarDiente('D21');">D21</div></div>
    <div class="diente" id="D22"><div id="D22-C1"></div><div id="D22-C2"></div><div id="D22-C3"></div><div id="D22-C4"></div><div id="D22-C5"></div><div onclick="seleccionarDiente('D22');">D22</div></div>
    <div class="diente" id="D23"><div id="D23-C1"></div><div id="D23-C2"></div><div id="D23-C3"></div><div id="D23-C4"></div><div id="D23-C5"></div><div onclick="seleccionarDiente('D23');">D23</div></div>
    <div class="diente" id="D24"><div id="D24-C1"></div><div id="D24-C2"></div><div id="D24-C3"></div><div id="D24-C4"></div><div id="D24-C5"></div><div onclick="seleccionarDiente('D24');">D24</div></div>
    <div class="diente" id="D25"><div id="D25-C1"></div><div id="D25-C2"></div><div id="D25-C3"></div><div id="D25-C4"></div><div id="D25-C5"></div><div onclick="seleccionarDiente('D25');">D25</div></div>
    <div class="diente" id="D26"><div id="D26-C1"></div><div id="D26-C2"></div><div id="D26-C3"></div><div id="D26-C4"></div><div id="D26-C5"></div><div onclick="seleccionarDiente('D26');">D26</div></div>
    <div class="diente" id="D27"><div id="D27-C1"></div><div id="D27-C2"></div><div id="D27-C3"></div><div id="D27-C4"></div><div id="D27-C5"></div><div onclick="seleccionarDiente('D27');">D27</div></div>
    <div class="diente" id="D28"><div id="D28-C1"></div><div id="D28-C2"></div><div id="D28-C3"></div><div id="D28-C4"></div><div id="D28-C5"></div><div onclick="seleccionarDiente('D28');">D28</div></div><br><hr>
    
    <input type="text" id="txtD55" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD54" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD53" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD52" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD51" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD61" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD62" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD63" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD64" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD65" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly"><br>
    
    <div class="diente" id="D55"><div id="D55-C1"></div><div id="D55-C2"></div><div id="D55-C3"></div><div id="D55-C4"></div><div id="D55-C5"></div><div onclick="seleccionarDiente('D55');">D55</div></div>

    <div class="diente" id="D54"><div id="D54-C1"></div><div id="D54-C2"></div><div id="D54-C3"></div><div id="D54-C4"></div><div id="D54-C5"></div><div onclick="seleccionarDiente('D54');">D54</div></div>

    <div class="diente" id="D53"><div id="D53-C1"></div><div id="D53-C2"></div><div id="D53-C3"></div><div id="D53-C4"></div><div id="D53-C5"></div><div onclick="seleccionarDiente('D53');">D53</div></div>
    <div class="diente" id="D52"><div id="D52-C1"></div><div id="D52-C2"></div><div id="D52-C3"></div><div id="D52-C4"></div><div id="D52-C5"></div><div onclick="seleccionarDiente('D52');">D52</div></div>
    <div class="diente" id="D51"><div id="D51-C1"></div><div id="D51-C2"></div><div id="D51-C3"></div><div id="D51-C4"></div><div id="D51-C5"></div><div onclick="seleccionarDiente('D51');">D51</div></div>
    |-|
    <div class="diente" id="D61"><div id="D61-C1"></div><div id="D61-C2"></div><div id="D61-C3"></div><div id="D61-C4"></div><div id="D61-C5"></div><div onclick="seleccionarDiente('D61');">D61</div></div>
    <div class="diente" id="D62"><div id="D62-C1"></div><div id="D62-C2"></div><div id="D62-C3"></div><div id="D62-C4"></div><div id="D62-C5"></div><div onclick="seleccionarDiente('D62');">D62</div></div>
    <div class="diente" id="D63"><div id="D63-C1"></div><div id="D63-C2"></div><div id="D63-C3"></div><div id="D63-C4"></div><div id="D63-C5"></div><div onclick="seleccionarDiente('D63');">D63</div></div>
    <div class="diente" id="D64"><div id="D64-C1"></div><div id="D64-C2"></div><div id="D64-C3"></div><div id="D64-C4"></div><div id="D64-C5"></div><div onclick="seleccionarDiente('D64');">D64</div></div>
    <div class="diente" id="D65"><div id="D65-C1"></div><div id="D65-C2"></div><div id="D65-C3"></div><div id="D65-C4"></div><div id="D65-C5"></div><div onclick="seleccionarDiente('D65');">D65</div></div>
  </section>
  <br><br>
  <section id="odontogramaInferior" class="textAlignCenter">
    <div class="diente" id="D85"><div id="D85-C1"></div><div id="D85-C2"></div><div id="D85-C3"></div><div id="D85-C4"></div><div id="D85-C5"></div><div onclick="seleccionarDiente('D85');">D85</div></div>
    <div class="diente" id="D84"><div id="D84-C1"></div><div id="D84-C2"></div><div id="D84-C3"></div><div id="D84-C4"></div><div id="D84-C5"></div><div onclick="seleccionarDiente('D84');">D84</div></div>
    <div class="diente" id="D83"><div id="D83-C1"></div><div id="D83-C2"></div><div id="D83-C3"></div><div id="D83-C4"></div><div id="D83-C5"></div><div onclick="seleccionarDiente('D83');">D83</div></div>
    <div class="diente" id="D82"><div id="D82-C1"></div><div id="D82-C2"></div><div id="D82-C3"></div><div id="D82-C4"></div><div id="D82-C5"></div><div onclick="seleccionarDiente('D82');">D82</div></div>
    <div class="diente" id="D81"><div id="D81-C1"></div><div id="D81-C2"></div><div id="D81-C3"></div><div id="D81-C4"></div><div id="D81-C5"></div><div onclick="seleccionarDiente('D81');">D81</div></div>
    |-|
    <div class="diente" id="D71"><div id="D71-C1"></div><div id="D71-C2"></div><div id="D71-C3"></div><div id="D71-C4"></div><div id="D71-C5"></div><div onclick="seleccionarDiente('D71');">D71</div></div>
    <div class="diente" id="D72"><div id="D72-C1"></div><div id="D72-C2"></div><div id="D72-C3"></div><div id="D72-C4"></div><div id="D72-C5"></div><div onclick="seleccionarDiente('D72');">D72</div></div>
    <div class="diente" id="D73"><div id="D73-C1"></div><div id="D73-C2"></div><div id="D73-C3"></div><div id="D73-C4"></div><div id="D73-C5"></div><div onclick="seleccionarDiente('D73');">D73</div></div>
    <div class="diente" id="D74"><div id="D74-C1"></div><div id="D74-C2"></div><div id="D74-C3"></div><div id="D74-C4"></div><div id="D74-C5"></div><div onclick="seleccionarDiente('D74');">D74</div></div>
    <div class="diente" id="D75"><div id="D75-C1"></div><div id="D75-C2"></div><div id="D75-C3"></div><div id="D75-C4"></div><div id="D75-C5"></div><div onclick="seleccionarDiente('D75');">D75</div></div><br><br>
    
    
    
    <input type="text" id="txtD85" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD84" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD83" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD82" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD81" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD71" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD72" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD73" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD74" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD75" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">      
    <br><hr>

    <div class="diente" id="D48"><div id="D48-C1"></div><div id="D48-C2"></div><div id="D48-C3"></div><div id="D48-C4"></div><div id="D48-C5"></div><div onclick="seleccionarDiente('D48');">D48</div></div>
    <div class="diente" id="D47"><div id="D47-C1"></div><div id="D47-C2"></div><div id="D47-C3"></div><div id="D47-C4"></div><div id="D47-C5"></div><div onclick="seleccionarDiente('D47');">D47</div></div>
    <div class="diente" id="D46"><div id="D46-C1"></div><div id="D46-C2"></div><div id="D46-C3"></div><div id="D46-C4"></div><div id="D46-C5"></div><div onclick="seleccionarDiente('D46');">D46</div></div>
    <div class="diente" id="D45"><div id="D45-C1"></div><div id="D45-C2"></div><div id="D45-C3"></div><div id="D45-C4"></div><div id="D45-C5"></div><div onclick="seleccionarDiente('D45');">D45</div></div>
    <div class="diente" id="D44"><div id="D44-C1"></div><div id="D44-C2"></div><div id="D44-C3"></div><div id="D44-C4"></div><div id="D44-C5"></div><div onclick="seleccionarDiente('D44');">D44</div></div>
    <div class="diente" id="D43"><div id="D43-C1"></div><div id="D43-C2"></div><div id="D43-C3"></div><div id="D43-C4"></div><div id="D43-C5"></div><div onclick="seleccionarDiente('D43');">D43</div></div>
    <div class="diente" id="D42"><div id="D42-C1"></div><div id="D42-C2"></div><div id="D42-C3"></div><div id="D42-C4"></div><div id="D42-C5"></div><div onclick="seleccionarDiente('D42');">D42</div></div>
    <div class="diente" id="D41"><div id="D41-C1"></div><div id="D41-C2"></div><div id="D41-C3"></div><div id="D41-C4"></div><div id="D41-C5"></div><div onclick="seleccionarDiente('D41');">D41</div></div>
    |-|
    <div class="diente" id="D31"><div id="D31-C1"></div><div id="D31-C2"></div><div id="D31-C3"></div><div id="D31-C4"></div><div id="D31-C5"></div><div onclick="seleccionarDiente('D31');">D31</div></div>
    <div class="diente" id="D32"><div id="D32-C1"></div><div id="D32-C2"></div><div id="D32-C3"></div><div id="D32-C4"></div><div id="D32-C5"></div><div onclick="seleccionarDiente('D32');">D32</div></div>
    <div class="diente" id="D33"><div id="D33-C1"></div><div id="D33-C2"></div><div id="D33-C3"></div><div id="D33-C4"></div><div id="D33-C5"></div><div onclick="seleccionarDiente('D33');">D33</div></div>
    <div class="diente" id="D34"><div id="D34-C1"></div><div id="D34-C2"></div><div id="D34-C3"></div><div id="D34-C4"></div><div id="D34-C5"></div><div onclick="seleccionarDiente('D34');">D34</div></div>
    <div class="diente" id="D35"><div id="D35-C1"></div><div id="D35-C2"></div><div id="D35-C3"></div><div id="D35-C4"></div><div id="D35-C5"></div><div onclick="seleccionarDiente('D35');">D35</div></div>
    <div class="diente" id="D36"><div id="D36-C1"></div><div id="D36-C2"></div><div id="D36-C3"></div><div id="D36-C4"></div><div id="D36-C5"></div><div onclick="seleccionarDiente('D36');">D36</div></div>
    <div class="diente" id="D37"><div id="D37-C1"></div><div id="D37-C2"></div><div id="D37-C3"></div><div id="D37-C4"></div><div id="D37-C5"></div><div onclick="seleccionarDiente('D37');">D37</div></div>
    <div class="diente" id="D38"><div id="D38-C1"></div><div id="D38-C2"></div><div id="D38-C3"></div><div id="D38-C4"></div><div id="D38-C5"></div><div onclick="seleccionarDiente('D38');">D38</div></div><br><br>
    
    <input type="text" id="txtD48" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD47" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD46" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD45" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD44" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD43" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD42" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD41" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD31" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD32" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD33" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD34" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD35" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD36" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD37" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD38" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
  </section>
</div>

<script src="assets/script/jsTratamiento.js"></script>


<hr>


        <div id="delete-referencia" style="display:none;"></div>
        <section id="seccionPaginaAjax"></section>


    <div class="row">


  <section class="displayInlineBlockMiddle">
        
        <div class="dienteGeneral" id="dienteGeneral">
        
        <div id="C1" onClick="seleccionarCara(this.id);"></div>
        <div id="C2" onClick="seleccionarCara(this.id);"></div>
        <div id="C3" onClick="seleccionarCara(this.id);"></div>
        <div id="C4" onClick="seleccionarCara(this.id);"></div>
        <div id="C5" onClick="seleccionarCara(this.id);"></div>
        
<input type="text" id="txtIdentificadorDienteGeneral" name="txtIdentificadorDienteGeneral" value="DXX" readonly="readonly">
        </div>
        
</section>

<section class="displayInlineBlockMiddle">

 <div id="odontograma" class="formulario sombraFormulario labelPequenio">

 <!-- <form id="odontograma" class="formulario sombraFormulario labelPequenio" method="post">-->

          <div class="tituloFormulario">DATOS DEL TRATAMIENTO</div>
          <div class="contenidoInterno">
            <label for=""><b>Diente Tratado:</b></label>
            <input type="text" id="txtDienteTratado" name="txtDienteTratado" class="textAlignCenter" size="4" readonly="readonly">
            <br>
            <label for=""><b>Cara Tratada:</b></label>
            <input type="text" id="txtCaraTratada" name="txtCaraTratada" class="textAlignCenter" size="4" readonly="readonly">
            <br>
            <label for=""><b>Referencias:</b></label>
            <select id="cbxEstado" name="cbxEstado" style="white">
              <option value="">SELECCIONE REFERENCIA</option>
              <option value="1-DO: EN AZUL DIENTE OBTURADO">DO: EN AZUL DIENTE OBTURADO</option>
              <option value="2-C: EN ROJO CARIADO">C: EN ROJO CARIADO</option>
              <option value="3--: EN AZUL AUSENTE">-: EN AZUL AUSENTE</option>
              <option value="4-X: EN ROJO EXODONCIA">X: EN ROJO EXODONCIA</option>
              <option value="5-CP: EN ROJO CARIES PENETRANTE">CP: EN ROJO CARIES PENETRANTE</option>
              <option value="6-R: EN ROJO RETENIDO">R: EN ROJO RETENIDO</option>
              <option value="7-EN AZUL PIEZA DE PUENTE">FP: EN AZUL PIEZA DE PUENTE</option>
              <option value="8-CO: EN AZUL CORONA">CO: EN AZUL CORONA</option>
              <option value="9-PR: EN AZUL PROTESIS REMOVIBLE">PR: EN AZUL PROTESIS REMOVIBLE</option>
              <option value="10-INC: INSCRUSTACION">INC: INSCRUSTACIÓN</option>
              <option value="11-EP: EN ROJO ENFERMEDAD PERIODONTAL">EP: EN ROJO ENFERMEDAD PERIODONTAL</option>
              <option value="12-FD: EN ROJO FRACTURA DENTARIA">FD: EN ROJO FRACTURA DENTARIA</option>
              <option value="13-MPD: EN ROJO MAL POSICION DENTARIA">MPD: EN ROJO MAL POSICION DENTARIA</option>
              <option value="14-PM: EN AZUL PERNO MUÑON">PM: EN AZUL PERNO MUÑON</option>
              <option value="15-TC: EN AZUL TRATAMIENTO DE CONDUCTO">TC: EN AZUL TRATAMIENTO DE CONDUCTO</option>
              <option value="16-F: EN ROJO FLUOROSIS">F: EN ROJO FLUOROSIS</option>
              <option value="17-IMP: EN AZUL IMPLANTE DENTAL">IMP: EN AZUL IMPLANTE DENTAL</option>
              <option value="18-MB: EN ROJO MANCHA BLANCA">MB: EN ROJO MANCHA BLANCA</option>
              <option value="19-SC: EN AZUL SELLADOR">SC: EN AZUL SELLADOR</option>
              <option value="20-SP SR: EN AZUL SURCO PROFUNDO">SP SR: EN AZUL SURCO PROFUNDO</option>
              <option value="21-HP: EN AZUL HIPOPLASIA DE ESMALTE">HP: EN AZUL HIPOPLASIA DE ESMALTE</option>
            </select>
            <br></br>
            
  <div class="modal-footer">
            
<button type="button" class="btn btn-primary waves-effect waves-light" onClick="guardarTratamiento();"><span class="fa fa-check-square-o"></span> Registrar</button>
  
<button type="button" class="btn btn-success waves-effect waves-light" onClick="agregarTratamiento($('#txtDienteTratado').val(), $('#txtCaraTratada').val(), $('#cbxEstado').val());"><span class="fa fa-plus"></span> Agregar</button>
                </div>
          </div>
        </div><!--form--->
      </section>



<section class="displayInlineBlockTop">
<div id="divTratamiento" class="displayInlineBlockTop sombraFormulario" style="width: 440px;height:216px;overflow-y: scroll;">
<table id="tablaTratamiento" class="table table-small-font table-bordered table-striped" border="1" cellspacing="0" width="100%">
          <thead>
                    <tr align="center">
                        <th><label>DIENTE</label></th>
                        <th><label>CARA</label></th>
                        <th><label>REFERENCIAS</label></th>
                    </tr>
                    </thead>
            <tbody>
            
            <?php 
if($reg[0]['estados']==""){

echo "";

} else {

$explode = explode("__",$reg[0]['estados']);
$listaSimple = array_values(array_unique($explode));

for($cont=0; $cont<COUNT($listaSimple); $cont++):
# Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
list($diente,$caradiente,$referencias) = explode("_",$listaSimple[$cont]);
?>
  <tr>
<td align="center"><?php echo $diente; ?></td>
<td align="center"><?php echo $caradiente; ?></td>
<td align="center"><?php echo $referencias; ?></td>
  
<td><a class="btn btn-danger btn-xs" data-placement="left" data-toggle="tooltip" data-original-title="Eliminar" onClick="EliminarReferencia('<?php echo $cont ?>','<?php echo base64_encode($reg[0]['codpaciente']); ?>','<?php echo base64_encode("REFERENCIAS") ?>')"><i class="fa fa-trash-o"></i></a></td>
</tr><?php endfor; } ?>
            
            </tbody>
        </table>
      </div>

  </section>

    </div> 
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Antecedentes Médicos</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
              
               <div class="col-md-12"> 


      <div class="table-responsive" data-pattern="priority-columns">
                      <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Tratamiento M&eacute;dico: </label></td>
<td><div class="radio radio-primary"><input name="tratamientomedico" id="tratamientomedico1" type="radio" class="radio" value="SI" <?php if($reg[0]['tratamientomedico'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="tratamientomedico1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="tratamientomedico" id="tratamientomedico2" class="radio" value="NO" <?php if($reg[0]['tratamientomedico'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="tratamientomedico2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="tratamientomedico" id="tratamientomedico3" class="radio" value="NO SABE" <?php if($reg[0]['tratamientomedico'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="tratamientomedico3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Ingesta de Medicamentos: </label></td>
<td> <div class="radio radio-primary"><input name="ingestamedicamentos" id="ingestamedicamentos1" type="radio" class="radio" value="SI" <?php if($reg[0]['ingestamedicamentos'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="ingestamedicamentos1">SI</label></div> </td>
<td>&nbsp;</td>
<td> <div class="radio radio-primary"><input type="radio" name="ingestamedicamentos" id="ingestamedicamentos2" class="radio" value="NO" <?php if($reg[0]['ingestamedicamentos'] == "NO") { ?> checked="checked" <?php } ?>  required="" aria-required="true"><label for="ingestamedicamentos2">NO</label></div> </td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="ingestamedicamentos" id="ingestamedicamentos3" class="radio" value="NO SABE"  <?php if($reg[0]['ingestamedicamentos'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="ingestamedicamentos3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualesingesta" id="cualesingesta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualesingesta']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Reacciones Alérgicas: </label></td>
<td><div class="radio radio-primary"><input name="alergias" id="alergias1" type="radio" class="radio" value="SI" <?php if($reg[0]['alergias'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="alergias1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="alergias" id="alergias2" class="radio" value="NO" <?php if($reg[0]['alergias'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="alergias2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="alergias" id="alergias3" class="radio" value="NO SABE" <?php if($reg[0]['alergias'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="alergias3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualesalergias" id="cualesalergias" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualesalergias']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Hemorragia:</label></td>
<td><div class="radio radio-primary"><input name="hemorragias" id="hemorragias1" type="radio" class="radio" value="SI" <?php if($reg[0]['hemorragias'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="hemorragias1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hemorragias" id="hemorragias2" class="radio" value="NO" <?php if($reg[0]['hemorragias'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="hemorragias2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hemorragias" id="hemorragias3" class="radio" value="NO SABE" <?php if($reg[0]['hemorragias'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hemorragias3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualeshemorragias" id="cualeshemorragias" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualeshemorragias']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Sinusitis:</label></td>
<td><div class="radio radio-primary"><input name="sinositis" id="sinositis1" type="radio" class="radio" value="SI" <?php if($reg[0]['sinositis'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="sinositis1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sinositis" id="sinositis2" class="radio" value="NO" <?php if($reg[0]['sinositis'] == "NO") { ?> checked="checked" <?php } ?>  required="" aria-required="true"><label for="sinositis2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sinositis" id="sinositis3" class="radio" value="NO SABE" <?php if($reg[0]['sinositis'] == "NO SABE") { ?> checked="checked" <?php } ?>  required="" aria-required="true" /><label for="sinositis3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>

                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Enfermedad Respiratoria: </span></td>
<td><div class="radio radio-primary"><input name="enfermedadrespiratoria" id="enfermedadrespiratoria1" type="radio" class="radio" value="SI" <?php if($reg[0]['enfermedadrespiratoria'] == "SI") { ?> checked="checked" <?php } ?>  required="" aria-required="true" /><label for="enfermedadrespiratoria1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="enfermedadrespiratoria" id="enfermedadrespiratoria2" class="radio" value="NO" <?php if($reg[0]['enfermedadrespiratoria'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="enfermedadrespiratoria2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="enfermedadrespiratoria" id="enfermedadrespiratoria3" class="radio" value="NO SABE" <?php if($reg[0]['enfermedadrespiratoria'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="enfermedadrespiratoria3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>

                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Diabetes: </label></td>
<td><div class="radio radio-primary"><input name="diabetes" id="diabetes1" type="radio" class="radio" value="SI" <?php if($reg[0]['diabetes'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="diabetes1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="diabetes" id="diabetes2" class="radio" value="NO" <?php if($reg[0]['diabetes'] == "NO") { ?> checked="checked" <?php } ?>  required="" aria-required="true" /><label for="diabetes2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="diabetes" id="diabetes3" class="radio" value="NO SABE" <?php if($reg[0]['diabetes'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="diabetes3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>

                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Cardiopatia:</label></td>
<td><div class="radio radio-primary"><input name="cardiopatia" id="cardiopatia1" type="radio" class="radio" value="SI" <?php if($reg[0]['cardiopatia'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="cardiopatia1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cardiopatia" id="cardiopatia2" class="radio" value="NO" <?php if($reg[0]['cardiopatia'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="cardiopatia2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cardiopatia" id="cardiopatia3" class="radio" value="NO SABE" <?php if($reg[0]['cardiopatia'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="cardiopatia3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>

                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Hepatitis:</label></td>
<td><div class="radio radio-primary"><input name="hepatitis" id="hepatitis1" type="radio" class="radio" value="SI" <?php if($reg[0]['hepatitis'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepatitis1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepatitis" id="hepatitis2" class="radio" value="NO" <?php if($reg[0]['hepatitis'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepatitis2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepatitis" id="hepatitis3" class="radio" value="NO SABE" <?php if($reg[0]['hepatitis'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepatitis3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>

                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Hipertensión Arterial:</label></td>
<td><div class="radio radio-primary"><input name="hepertension" id="hepertension1" type="radio" class="radio" value="SI" <?php if($reg[0]['hepertension'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepertension1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepertension" id="hepertension2" class="radio" value="NO" <?php if($reg[0]['hepertension'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepertension2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepertension" id="hepertension3" class="radio" value="NO SABE" <?php if($reg[0]['hepertension'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepertension3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>


                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Otros:</label></td>
<td><div class="radio radio-primary"><input name="hepertension" id="hepertension1" type="radio" class="radio" value="SI" <?php if($reg[0]['hepertension'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepertension1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepertension" id="hepertension2" class="radio" value="NO" <?php if($reg[0]['hepertension'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepertension2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepertension" id="hepertension3" class="radio" value="NO SABE" <?php if($reg[0]['hepertension'] == "NO SABE") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="hepertension3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Tratamiento" value="<?php echo $reg[0]['cualestratamiento']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>


                                                                    </tr>
                                                        </table>
                                              </div>
                                     </div>
                        </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Hábitos de Salud Oral</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
                
      <div class="table-responsive" data-pattern="priority-columns">
                      <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Asistencia a Odontología: </label></td>
<td><div class="radio radio-primary"><input name="asistenciaodontologica" id="asistenciaodontologica1" type="radio" class="radio" value="SI" <?php if($reg[0]['asistenciaodontologica'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="asistenciaodontologica1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="asistenciaodontologica" id="asistenciaodontologica2" class="radio" value="NO" <?php if($reg[0]['asistenciaodontologica'] == "NO") { ?> checked="checked" <?php } ?>  required="" aria-required="true"><label for="asistenciaodontologica2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Fecha Ultima visita: </label></td>
<td><div class="form-group has-feedback"> <input class="form-control calendario" type="text" name="ultimavisitaodontologia" id="ultimavisitaodontologia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php if($reg[0]['ultimavisitaodontologia']=='0000-00-00') { echo ""; } else { echo date("d-m-Y",strtotime($reg[0]['ultimavisitaodontologia'])); } ?>" placeholder="Ingrese Fecha Ultima Visita"><i class="fa fa-calendar form-control-feedback"></i>
                                                        </div> </td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Cepillado:</label></td>
<td><div class="radio radio-primary"><input name="cepillado" id="cepillado1" type="radio" class="radio" value="SI" <?php if($reg[0]['cepillado'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="cepillado1">SI</label></div> </td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cepillado" id="cepillado2" class="radio" value="NO" <?php if($reg[0]['cepillado'] == "NO") { ?> checked="checked" <?php } ?>  required="" aria-required="true"><label for="cepillado2">NO</label></div> </td>
<td>&nbsp;</td>
<td><label>Cuantas Veces al día: </span></td>
<td><div class="form-group has-feedback"> <input class="form-control" type="text" name="cuantoscepillados" id="cuantoscepillados" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuantos Cepillados" value="<?php echo $reg[0]['cuantoscepillados']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Seda Dental: </label></td>
<td><div class="radio radio-primary"><input name="sedadental" id="sedadental1" type="radio" class="radio" value="SI" <?php if($reg[0]['sedadental'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="sedadental1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sedadental" id="sedadental2" class="radio" value="NO" <?php if($reg[0]['sedadental'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="sedadental2">NO</label></div> </td>
<td>&nbsp;</td>
<td><label>Cuantas Veces al día:</label></td>
<td><div class="form-group has-feedback"> <input class="form-control" type="text" name="cuantascedasdetal" id="cuantascedasdetal" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuanta Seda Dental" value="<?php echo $reg[0]['cuantascedasdetal']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Crema Dental:</label></td>
<td><div class="radio radio-primary"><input name="cremadental" id="cremadental1" type="radio" class="radio" value="SI" <?php if($reg[0]['cremadental'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="cremadental1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cremadental" id="cremadental2" class="radio" value="NO" <?php if($reg[0]['cremadental'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="cremadental2">NO</label></div></td>
<td>&nbsp;</td>
<td></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Enjuague:</label></td>
<td><div class="radio radio-primary"><input name="enjuague" id="enjuague1" type="radio" class="radio" value="SI" <?php if($reg[0]['enjuague'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="enjuague1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="enjuague" id="enjuague2" class="radio" value="NO" <?php if($reg[0]['enjuague'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="enjuague2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Otros:</label></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="otros" id="otros" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Otros" value="<?php echo $reg[0]['otros']; ?>"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                  </tr>
                                                             </table>
                                                </div> 
                                                                          
                                      </div>
                         </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Estado Periodontal</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
         
        <div class="table-responsive" data-pattern="priority-columns">
                        <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Sangran Encias al Cepillar: </label></td>
<td><div class="radio radio-primary"><input name="sangranencias" id="sangranencias1" type="radio" class="radio" value="SI" <?php if($reg[0]['sangranencias'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="sangranencias1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sangranencias" id="sangranencias2" class="radio" value="NO"<?php if($reg[0]['sangranencias'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="sangranencias2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Toma Agua de la Llave:</label></td>
<td><div class="radio radio-primary"><input name="tomaaguallave" id="tomaaguallave1" type="radio" class="radio" value="SI"<?php if($reg[0]['tomaaguallave'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="tomaaguallave1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="tomaaguallave" id="tomaaguallave2" class="radio" value="NO" <?php if($reg[0]['tomaaguallave'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="tomaaguallave2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Le Aplican elementos que contienen Fluor: </label></td>
<td><div class="radio radio-primary"><input name="elementosconfluor" id="elementosconfluor1" type="radio" class="radio" value="SI" <?php if($reg[0]['elementosconfluor'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="elementosconfluor1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="elementosconfluor" id="elementosconfluor2" class="radio" value="NO" <?php if($reg[0]['elementosconfluor'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="elementosconfluor2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Aparatos de Ortodoncia:</label></td>
<td><div class="radio radio-primary"><input name="aparatosortodoncia" id="aparatosortodoncia1" type="radio" class="radio" value="SI" <?php if($reg[0]['aparatosortodoncia'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="aparatosortodoncia1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="aparatosortodoncia" id="aparatosortodoncia2" class="radio" value="NO" <?php if($reg[0]['aparatosortodoncia'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="aparatosortodoncia2">NO</label></div></td>
<td>&nbsp;</td>
<td></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Protésis:</label></td>
<td><div class="radio radio-primary"><input name="protesis" id="protesis1" type="radio" class="radio" value="SI"  <?php if($reg[0]['protesis'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="protesis1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="protesis" id="protesis2" class="radio" value="NO" <?php if($reg[0]['protesis'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="protesis2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="checkbox checkbox-primary"><input name="protesisfija" id="protesisfija" type="checkbox" value="Fija" <?php if($reg[0]['protesisfija'] == "Fija") { ?> checked="checked" <?php } ?>><label for="protesisfija">Fija</label></div></td>
<td><div class="checkbox checkbox-primary"><input name="protesisremovible" id="protesisremovible" type="checkbox" value="Removible" <?php if($reg[0]['protesisremovible'] == "Removible") { ?> checked="checked" <?php } ?>><label for="protesisremovible">Removible</label> </div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                  </table>


    <table width="100%">
                                                                    <tr>
<td height="24">&nbsp;</td>
<td colspan="4"><label>ARTICULACIÓN TEMPORO-MANDIBULAR</label></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td width="1" height="24">&nbsp;</td>
<td width="157"><label>Labios: </label></td>
<td width="104"><div class="radio radio-primary"><input name="labios" id="labios1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['labios'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="labios1">NORMAL</label></div></td>
<td width="10">&nbsp;</td>
<td width="120"><div class="radio radio-primary"><input type="radio" name="labios" id="labios2" class="radio" value="ANORMAL" <?php if($reg[0]['labios'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="labios2">ANORMAL</label></div></td>
<td width="10">&nbsp;</td>
<td width="181"><label>Senos Maxilares:</label></td>
<td width="103"><div class="radio radio-primary"><input name="senosmaxilares" id="senosmaxilares1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['senosmaxilares'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="senosmaxilares1">NORMAL</label></div></td>
<td width="118"><div class="radio radio-primary"><input type="radio" name="senosmaxilares" id="senosmaxilares2" class="radio" value="ANORMAL" <?php if($reg[0]['senosmaxilares'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="senosmaxilares2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Lengua:</label></td>
<td><div class="radio radio-primary"><input name="lengua" id="lengua1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['lengua'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="lengua1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="lengua" id="lengua2" class="radio" value="ANORMAL" <?php if($reg[0]['lengua'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="lengua2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Musculos Masticadores:</label></td>
<td><div class="radio radio-primary"><input name="musculosmasticadores" id="musculosmasticadores1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['musculosmasticadores'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="musculosmasticadores1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="musculosmasticadores" id="musculosmasticadores2" class="radio" value="ANORMAL" <?php if($reg[0]['musculosmasticadores'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="musculosmasticadores2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Paladar: </span></td>
<td><div class="radio radio-primary"><input name="paladar" id="paladar1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['paladar'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="paladar1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="paladar" id="paladar2" class="radio" value="ANORMAL" <?php if($reg[0]['paladar'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="paladar2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Sistema Nervioso:</label></td>
<td><div class="radio radio-primary"><input name="sistemanervioso" id="sistemanervioso1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['sistemanervioso'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="sistemanervioso1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="sistemanervioso" id="sistemanervioso2" class="radio" value="ANORMAL" <?php if($reg[0]['sistemanervioso'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="sistemanervioso2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Piso de la Boca:</label></td>
<td><div class="radio radio-primary"><input name="pisoboca" id="pisoboca1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['pisoboca'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="pisoboca1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="pisoboca" id="pisoboca2" class="radio" value="ANORMAL" <?php if($reg[0]['pisoboca'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="pisoboca2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Vascular:</label></td>
<td><div class="radio radio-primary"><input name="sistemavascular" id="sistemavascular1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['sistemavascular'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="sistemavascular1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="sistemavascular" id="sistemavascular2" class="radio" value="ANORMAL" <?php if($reg[0]['sistemavascular'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="sistemavascular2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Carrillos:</label></td>
<td><div class="radio radio-primary"><input name="carrillos" id="carrillos1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['carrillos'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="carrillos1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="carrillos" id="carrillos2" class="radio" value="ANORMAL" <?php if($reg[0]['carrillos'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="carrillos2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Linfático Regional:</span></td>
<td><div class="radio radio-primary"><input name="sistemalinfatico" id="sistemalinfatico1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['sistemalinfatico'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="sistemalinfatico1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="sistemalinfatico" id="sistemalinfatico2" class="radio" value="ANORMAL" <?php if($reg[0]['sistemalinfatico'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="sistemalinfatico2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Glandulas Salivales:</label></td>
<td><div class="radio radio-primary"><input name="glandulasalivales" id="glandulasalivales1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['glandulasalivales'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="glandulasalivales1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="glandulasalivales" id="glandulasalivales2" class="radio" value="ANORMAL" <?php if($reg[0]['glandulasalivales'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="glandulasalivales2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Función Oclusal:</label></td>
<td><div class="radio radio-primary"><input name="funcionoclusal" id="funcionoclusal1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['funcionoclusal'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="funcionoclusal1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="funcionoclusal" id="funcionoclusal2" class="radio" value="ANORMAL" <?php if($reg[0]['funcionoclusal'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="funcionoclusal2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Maxilar:</span></td>
<td><div class="radio radio-primary"><input name="maxilar" id="maxilar1" type="radio" class="radio" value="NORMAL" <?php if($reg[0]['maxilar'] == "NORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="maxilar1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="maxilar" id="maxilar2" class="radio" value="ANORMAL" <?php if($reg[0]['maxilar'] == "ANORMAL") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="maxilar2">ANORMAL</label></div></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td><label>Observaciones:</label></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td colspan="8"><div class="form-group has-feedback"><textarea name="observacionperiodontal" class="form-control" id="observacionperiodontal" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observacion de Estado Periodontal" rows="4" required="" aria-required="true"><?php echo $reg[0]['observacionperiodontal']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                                                    </tr>
                                                                  </table>
                                                  </div>        
                                          </div>
                            </div>
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row"> 
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Exámen Dental</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12">

          <div class="table-responsive" data-pattern="priority-columns">
                        <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Supernumerarios: </label></td>
<td><div class="radio radio-primary"><input name="supernumerarios" id="supernumerarios1" type="radio" class="radio" value="SI" <?php if($reg[0]['supernumerarios'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="supernumerarios1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="supernumerarios" id="supernumerarios2" class="radio" value="NO" <?php if($reg[0]['supernumerarios'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="supernumerarios2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Placa Blanda: </label></td>
<td><div class="radio radio-primary"><input name="placablanda" id="placablanda1" type="radio" class="radio" value="SI" <?php if($reg[0]['placablanda'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="placablanda1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="placablanda" id="placablanda2" class="radio" value="NO" <?php if($reg[0]['placablanda'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="placablanda2">NO</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Adración:</label></td>
<td> <div class="radio radio-primary"><input name="adracion" id="adracion1" type="radio" class="radio" value="SI"  <?php if($reg[0]['adracion'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="adracion1">SI</label></div> </td>
<td>&nbsp;</td>
<td> <div class="radio radio-primary"><input type="radio" name="adracion" id="adracion2" class="radio" value="NO"  <?php if($reg[0]['adracion'] == "NO") { ?> checked="checked" <?php } ?>  required="" aria-required="true"><label for="adracion2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Placa Calificada: </label></td>
<td><div class="radio radio-primary"><input name="placacalificada" id="placacalificada1" type="radio" class="radio" value="SI" <?php if($reg[0]['placacalificada'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="placacalificada1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="placacalificada" id="placacalificada2" class="radio" value="NO" <?php if($reg[0]['placacalificada'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="placacalificada2">NO</label></div> </td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Manchas: </label></td>
<td><div class="radio radio-primary"><input name="manchas" id="manchas1" type="radio" class="radio" value="SI"  <?php if($reg[0]['manchas'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="manchas1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="manchas" id="manchas2" class="radio" value="NO" <?php if($reg[0]['manchas'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="manchas2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Otros:</label></td>
<td colspan="2"><div class="form-group has-feedback"><input class="form-control" type="text" name="otrosdental" id="otrosdental" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Otros" value="<?php echo $reg[0]['otrosdental']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></div></td></tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Patología Pulpar:</label></td>
<td><div class="radio radio-primary"><input name="patologiapulpar" id="patologiapulpar1" type="radio" class="radio" value="SI" <?php if($reg[0]['patologiapulpar'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="patologiapulpar1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="patologiapulpar" id="patologiapulpar2" class="radio" value="NO" <?php if($reg[0]['patologiapulpar'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true"><label for="patologiapulpar2">NO</label></div></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td><label>Observaciones:</label></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td colspan="8"><div class="form-group has-feedback"><textarea name="observacionexamendental" class="form-control" id="observacionexamendental" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observacion de Examen Dental" rows="4" required="" aria-required="true"><?php echo $reg[0]['observacionexamendental']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                                                    </tr>
                                                                  </table>
                                                                </div>  
                                       </div>
                          </div>
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Diagnóstico y Pronóstico</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

  
            <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">

          <table width="100%" id="tabla"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Dx</button>
<?php 
$explode = explode(",,",$reg[0]['presuntivo']);
for($cont=0; $cont<COUNT($explode); $cont++):
list($presuntivo,$idciepresuntivo) = explode("/",$explode[$cont]);
?>  

<div class="form-group has-feedback"> 
      <label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label>
<input name="idciepresuntivo[]" type="hidden" id="idciepresuntivo" value="<?php echo $idciepresuntivo; ?>"/>

<input type="text" id="presuntivo" name="presuntivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" title="Ingrese Dx Presuntivo" value="<?php echo $presuntivo; ?>" required="" aria-required="true"><i class="fa fa-pencil form-control-feedback"></i>

                  </div><?php endfor; ?> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla2">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX2()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar2()"><span class="fa fa-times"></span> Eliminar Dx</button>
<?php 
$explode = explode(",,",$reg[0]['definitivo']);
for($cont=0; $cont<COUNT($explode); $cont++):
list($definitivo,$idciedefinitivo) = explode("/",$explode[$cont]);
?>
 
<div class="form-group has-feedback"> 
      <label class="control-label">Dx Definitivo: <span class="symbol required"></span></label>
<input name="idciedefinitivo[]" type="hidden" id="idciedefinitivo" value="<?php echo $idciedefinitivo; ?>"/>

<input type="text" id="definitivo" name="definitivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" title="Ingrese Dx Definitivo" value="<?php echo $definitivo; ?>" required="" aria-required="true">
                  <i class="fa fa-pencil form-control-feedback"></i>

                  </div><?php endfor; ?>  
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>
  </div>



   <div class="row">

        <div class="col-md-12"> 
                 <div class="form-group has-feedback">
<label class="control-label">Pronóstico: <span class="symbol required"></span></label> 
<textarea name="pronostico" class="form-control" id="pronostico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Pronóstico" rows="3" required="" aria-required="true"><?php echo $reg[0]['pronostico']; ?></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div>
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Plan de Tratamiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
               
         <div class="table-responsive" data-pattern="priority-columns">
                          <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Operatorio: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento1" type="checkbox" class="checkbox" value="Operatorio" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Operatorio"?"checked=\"checked\"":''; }?> /><label for="plantratamiento1"></label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>Cirug&iacute;a Oral: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento2" type="checkbox" class="checkbox" value="Cirugia Oral" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Cirugia Oral"?"checked=\"checked\"":''; }?> /><label for="plantratamiento2"></label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Periodoncia:</label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento3" type="checkbox" value="Periodoncia" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Periodoncia"?"checked=\"checked\"":''; }?> /><label for="plantratamiento3"></label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>Endodoncia: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento4" type="checkbox" value="Endodoncia" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Endodoncia"?"checked=\"checked\"":''; }?>/><label for="plantratamiento4"></label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Ortodoncia: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento5" type="checkbox" value="Ortodoncia" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Ortodoncia"?"checked=\"checked\"":''; }?>/><label for="plantratamiento5"></label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>Prótesis:</label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento6" type="checkbox" value="Protesis" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Protesis"?"checked=\"checked\"":''; }?>/><label for="plantratamiento6"></label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Medicina Oral:</label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento7" type="checkbox" value="Medicina Oral" <?php 
$news = explode(",", $reg[0]['plantratamiento']);
foreach ($news as $value){
echo $value == "Medicina Oral"?"checked=\"checked\"":''; }?>/><label for="plantratamiento7"> </label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"></td>
                                                                    </tr>
                                                      </table>
                                            </div> 
                         </div>
              </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
<button class="btn btn-danger waves-effect waves-light" type="reset"><span class="fa fa-trash-o"></span> Cancelar</button>   
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<?php } ?>

         </form>
</div>


<footer class="footer"> <i class="fa fa-copyright"></i> <span class="current-year"></span>. </footer>
</div>
</div> 

         <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
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
        
         <!-- Modal-Effect -->
        <script src="assets/plugins/modal-effect/js/classie.js"></script>
        <script src="assets/plugins/modal-effect/js/modalEffects.js"></script>

        <script language='JavaScript'>
var cont=1;
function addRowX()  //Esta la funcion que agrega las filas segunda parte :
{
cont++;
//autocompletar

//
var indiceFila=1;
myNewRow = document.getElementById('tabla').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label><input type="text" id="presuntivo'+cont+'" name="presuntivo[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true"><input name="idciepresuntivo[]'+cont+'" type="hidden" class="form-control" id="idciepresuntivo'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/><i class="fa fa-pencil form-control-feedback"></i></div></div>';
indiceFila++;
}

//////////////Borrar() ///////////
function borrar() {
var table = document.getElementById('tabla');
if(table.rows.length > 1)
    {
    table.deleteRow(table.rows.length -1);
cont--;
    }
}

////////////FUNCION ASIGNA VALOR DE CONT PARA EL FOR DE MOSTRAR DATOS MP-MOD-TT////////
function asigna()
{
valor=document.form.var_cont.value=cont;
}
</script>   
    

<script language='JavaScript'>
function addRowX2()  //Esta la funcion que agrega las filas segunda parte :
{
cont++;
//autocompletar

//
var indiceFila=1;
myNewRow = document.getElementById('tabla2').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Dx Definitivo: <span class="symbol required"></span></label><input type="text" id="definitivo'+cont+'" name="definitivo[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" required="" aria-required="true"><input name="idciedefinitivo[]'+cont+'" type="hidden" class="form-control" id="idciedefinitivo'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/><i class="fa fa-pencil form-control-feedback"></i></div></div>';
indiceFila++;
}

//////////////Borrar() ///////////
function borrar2() {
var table = document.getElementById('tabla2');
if(table.rows.length > 1)
    {
    table.deleteRow(table.rows.length -1);
cont--;
    }
}

////////////FUNCION ASIGNA VALOR DE CONT PARA EL FOR DE MOSTRAR DATOS MP-MOD-TT////////
function asigna()
{
valor=document.form.var_cont.value=cont;
}
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