<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION['acceso'] == "laboratorio") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$valor = new Login();
$valor = $valor->ValorLaboratorioPorId();

$reg = $tra->LaboratorioPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarLaboratorio();
exit;
}
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
<link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css"> 

<!-- script jquery -->
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Exámen Laboratorio</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="laboratorio">Control</a></li>
<li class="active">Gestión de Exámen Laboratorio</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="updatelaboratorio" id="updatelaboratorio" method="post" data-id="<?php echo $reg[0]["codlaboratorio"] ?>" action="#"> 
      

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
             
<input name="codlaboratorio" type="hidden" id="codlaboratorio" value="<?php echo $reg[0]['codlaboratorio']; ?>" />
<input type="hidden" name="codmedico" id="codmedico" value="<?php echo $reg[0]['codmedico']; ?>">
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $reg[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $reg[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $reg[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $reg[0]['codsede']; ?>">

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


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Exámenes de Laboratorio</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

               <div class="row">

    <div class="col-lg-12"> 
        <ul class="nav nav-tabs tabs" style="font-size: 14px"> 
              <li class="active"> 
                    <a href="#home" data-toggle="tab" aria-expanded="true"> 
                      <span class="hidden-xs"><abbr title="HEMATOLOGIA">HEMATOLOGÍA</abbr></span>
                    </a>                  
              </li> 
                   
              <li class=""> 
                    <a href="#profile" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="QUIMICA SANGUINEA">QUIMICA SANG.</abbr></span>
                    </a>                  
              </li> 
              
              <li class=""> 
                    <a href="#messages" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="UROANÁLISIS">UROANÁLISIS</abbr></span>
                    </a>                  
              </li> 
              
              <li class=""> 
                    <a href="#settings" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="FLUJO VAGINAL">FLUJO VAGINAL</abbr></span>
                    </a>                  
              </li> 
              
              <li class=""> 
                    <a href="#cinco" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="INMUNOLOGÍA">INMUNOLOGÍA</abbr></span
                    </a>                  
              </li> 
              
              <li class="">                                      
                    <a href="#seis" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="PARASITO-MICROBIOLOGÍA">PARASITO-MICROB.</abbr></span> 
                    </a>                 
              </li>
        </ul> 
                
    
    <div class="tab-content"> 
                                
                <div class="tab-pane active" id="home"> 
                               
<div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                           <thead>
                                                <tr>
<th colspan="5"><label><center>HEMATOLOGÍA</center></label></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
<td width="353"><label>EXÁMEN</span></td>
<td colspan="2"><label>RESULTADO</label></td>
<td colspan="2"><label>VALOR NORMAL</label></td>
                                                </tr>
                                                <tr>
<td>HEMATOCRITO</td>
<td width="250"><div class="form-group has-feedback"><input name="hematocrito" type="text" class="form-control" id="hematocrito" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hematocrito']; ?>"><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="190"><div align="right">%</div></td>
<td width="210"><div align="right"><?php echo $valor[0]['hematocritov']; ?></div></td>
<td width="170"><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>HEMOGLOBINA</td>
<td><div class="form-group has-feedback"><input name="hemoglobina" type="text" class="form-control" id="hemoglobina" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hemoglobina']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">gr/dl</div></td>
<td><div align="right"><?php echo $valor[0]['hemoglobinav']; ?></div></td>
<td><div align="right">gr/dl</div></td>
                                                </tr>
                                                <tr>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input name="leucocitos" type="text" class="form-control" id="leucocitos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['leucocitos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mm3</div></td>
<td><div align="right"><?php echo $valor[0]['leucocitosv']; ?></div></td>
<td><div align="right">mm3</div></td>
                                                </tr>
                                                <tr>
<td>NEUTROFILOS</td>
<td><div class="form-group has-feedback"><input name="neutrofilos" type="text" class="form-control" id="neutrofilos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['neutrofilos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['neutrofilosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>LINFOCITOS</td>
<td><div class="form-group has-feedback"><input name="linfocitos" type="text" class="form-control" id="linfocitos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['linfocitos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['linfocitosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>EOSINOFILOS</td>
<td><div class="form-group has-feedback"><input name="eosinofilos" type="text" class="form-control" id="eosinofilos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['eosinofilos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['eosinofilosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>MONOCITOS</td>
<td><div class="form-group has-feedback"><input name="monositos" type="text" class="form-control" id="monositos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['monositos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['monositosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>BASOFILOS</td>
<td><div class="form-group has-feedback"><input name="basofilos" type="text" class="form-control" id="basofilos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['basofilos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['basofilosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>CAYADOS</td>
<td><div class="form-group has-feedback"><input name="cayados" type="text" class="form-control" id="cayados" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['cayados']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['cayadosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>PLAQUETAS</td>
<td><div class="form-group has-feedback"><input name="plaquetas" type="text" class="form-control" id="plaquetas" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['plaquetas']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mm3</div></td>
<td><div align="right"><?php echo $valor[0]['plaquetasv']; ?></div></td>
<td><div align="right">mm3</div></td>
                                                </tr>
                                                <tr>
<td>RETICULOCITOS</td>
<td><div class="form-group has-feedback"><input name="reticulositos" type="text" class="form-control" id="reticulositos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hematocrito']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['reticulositosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>V.S.G</td>
<td><div class="form-group has-feedback"><input name="vsg" type="text" class="form-control" id="vsg" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['vsg']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mm/hr</div></td>
<td><div align="right"><?php echo $valor[0]['vsgv']; ?></div></td>
<td><div align="right">mm/hr</div></td>
                                                </tr>
                                                <tr>
<td>PT</td>
<td><div class="form-group has-feedback"><input name="pt" type="text" class="form-control" id="pt" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['pt']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">seg. CD</div></td>
<td><div align="right"><?php echo $valor[0]['ptv']; ?></div></td>
<td><div align="right">seg. CD</div></td>
                                                </tr>
                                                <tr>
<td>PTT</td>
<td><div class="form-group has-feedback"><input name="ptt" type="text" class="form-control" id="ptt" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['ptt']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">seg. CD</div></td>
<td><div align="right"><?php echo $valor[0]['pttv']; ?></div></td>
<td><div align="right">seg. CD</div></td>
                                                </tr>
                                                <tr>
<td><label>HEMOCLASIFICACIÓN</label></td>
<td><label>GRUPO</label></td>
<td><div class="form-group has-feedback"><input name="clasifgrupo" type="text" class="form-control" id="clasifgrupo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['clasifgrupo']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>RH:</td>
<td><div class="form-group has-feedback"><input name="clasifrh" type="text" class="form-control" id="clasifrh" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['clasifrh']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                                </tr>
                                                <tr>
<td colspan="5"><label>OBSERVACIONES:</label></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacioneshematologia" cols="80" rows="2" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" id="observacioneshematologia" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"><?php echo $reg[0]['observacioneshematologia']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i>                                             </td>
                                                </tr>
                                        </tbody>
                                   </table>  
                                </div>
                           </div> 
                
<div class="tab-pane" id="profile"> 
             <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
<th colspan="5"><label>QUÍMICA SANGUÍNEA </label></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
<td width="353"><label>EXÁMEN</label></td>
<td colspan="2"><label>RESULTADO</label></td>
<td colspan="2"><label>VALOR NORMAL</label></td>
                                              </tr>
                                                <tr>
<td width="353">GLUCOSA</td>
<td width="268"><div class="form-group has-feedback"><input name="glucosa" type="text" class="form-control" id="glucosa" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['glucosa']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="192"><div align="right">mg/dl</div></td>
<td width="222"><div align="right"><?php echo $valor[0]['glucosav']; ?></div></td>
<td width="167"><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>COLESTEROL TOTAL</td>
<td><div class="form-group has-feedback"><input name="colesteroltotal" type="text" class="form-control" id="colesteroltotal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['colesteroltotal']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['colesteroltotalv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>COLESTEROL HDL</td>
<td><div class="form-group has-feedback"><input name="colesterolhdl" type="text" class="form-control" id="colesterolhdl" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['colesterolhdl']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['colesterolhdlv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>COLESTEROL LDL</td>
<td><div class="form-group has-feedback"><input name="colesterolldl" type="text" class="form-control" id="colesterolldl" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['colesterolldl']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['colesterolldlv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>TRIGLICERIDOS</td>
<td><div class="form-group has-feedback"><input name="trigliceridos" type="text" class="form-control" id="trigliceridos" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['trigliceridos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['trigliceridosv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>ACIDO ÚRICO</td>
<td><div class="form-group has-feedback"><input name="acidourico" type="text" class="form-control" id="acidourico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['acidourico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['acidouricov']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>NITROGENO UREICO</td>
<td><div class="form-group has-feedback"><input name="nitrogenoureico" type="text" class="form-control" id="nitrogenoureico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['nitrogenoureico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['nitrogenoureicov']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>CREATININA</td>
<td><div class="form-group has-feedback"><input name="creatinina" type="text" class="form-control" id="creatinina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['creatinina']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['creatininav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>PROTEINAS TOTALES</td>
<td><div class="form-group has-feedback"><input name="proteinastotales" type="text" class="form-control" id="proteinastotales" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['proteinastotales']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['proteinastotalesv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>ALBÚMINA</td>
<td><div class="form-group has-feedback"><input name="albumina" type="text" class="form-control" id="albumina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['albumina']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['albuminav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>GLOBULINAS</td>
<td><div class="form-group has-feedback"><input name="globulina" type="text" class="form-control" id="globulina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['globulina']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['globulinav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>BILIRRUBINA TOTAL</td>
<td><div class="form-group has-feedback"><input name="bilirrubinatotal" type="text" class="form-control" id="bilirrubinatotal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['bilirrubinatotal']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['bilirrubinatotalv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>BILIRRUBINA DIRECTA</td>
<td><div class="form-group has-feedback"><input name="bilirrubinadirecta" type="text" class="form-control" id="bilirrubinadirecta" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['bilirrubinadirecta']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['bilirrubinadirectav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>BILIRRUBINA INDIRECTA</td>
<td><div class="form-group has-feedback"><input name="bilirrubinaindirecta" type="text" class="form-control" id="bilirrubinaindirecta" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['bilirrubinaindirecta']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['bilirrubinaindirectav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>FOSFATASA ALCALINA</td>
<td><div class="form-group has-feedback"><input name="fosfatasaalcalina" type="text" class="form-control" id="fosfatasaalcalina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['fosfatasaalcalina']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['fosfatasaalcalinav']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td>TGO/AST</td>
<td><div class="form-group has-feedback"><input name="tgo" type="text" class="form-control" id="tgo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['tgo']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['tgov']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td>TGP/ALT</td>
<td><div class="form-group has-feedback"><input name="tgp" type="text" class="form-control" id="tgp" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['tgp']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['tgpv']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td>AMILASA</td>
<td><div class="form-group has-feedback"><input name="amilasa" type="text" class="form-control" id="amilasa" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['amilasa']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['amilasav']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td colspan="5"><label>OBSERVACIONES:</label></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacionesquimica" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="observacionesquimica" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"><?php echo $reg[0]['observacionesquimica']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i>                                                </td>
                                                </tr>
                                          </tbody>
                                    </table>
                                </div> 
                            </div>

                  
  <div class="tab-pane" id="messages"> 
          <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                          <tr>
<th colspan="5"><label>UROANÁLISIS</label></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
<td colspan="2"><label>EXÁMEN QUIMICO </label></td>
<td colspan="2"><label >EXÁMEN MICROCOSPICO </label></td>
<td><label>XC</label></td>
                                          </tr>
                                          <tr>
<td width="256">COLOR</td>
<td width="336"><div class="form-group has-feedback"><input name="colorquimico" type="text" class="form-control" id="colorquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['colorquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td colspan="2" height="25">CELULAS EPITELIALES BAJAS</td>
<td width="227"><div class="form-group has-feedback"><input name="celulasepibajas" type="text" class="form-control" id="celulasepibajas" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['celulasepibajas']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>ASPECTO</td>
<td><div class="form-group has-feedback"><input name="aspectoquimico" type="text" class="form-control" id="aspectoquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['aspectoquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td colspan="2" height="20">CELULAS EPITELIALES ALTAS</td>
<td><div class="form-group has-feedback"><input name="celulasepialtas" type="text" class="form-control" id="celulasepialtas" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['celulasepialtas']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>PH</td>
<td><div class="form-group has-feedback"><input name="phquimico" type="text" class="form-control" id="phquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['phquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="166">BACTERIAS</span></td>
<td width="217"><div class="form-group has-feedback"><input class="form-control" type="text" name="bacteriasmicroscopico" id="bacteriasmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['bacteriasmicroscopico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>DENSIDAD</td>
<td><div class="form-group has-feedback"><input name="densidadquimico" type="text" class="form-control" id="densidadquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['densidadquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="leucocitosmicroscopico" id="leucocitosmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['leucocitosmicroscopico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>PROTEINA</td>
<td><div class="form-group has-feedback"><input name="proteinaquimico" type="text" class="form-control" id="proteinaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['proteinaquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HEMATIES</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="hematiesmicroscopico" id="hematiesmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hematiesmicroscopico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>GLUCOSA</td>
<td><div class="form-group has-feedback"><input name="glucosaquimico" type="text" class="form-control" id="glucosaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['glucosaquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>CRISTALES</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cristalesmicroscopico" id="cristalesmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['cristalesmicroscopico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>CETONAS</td>
<td><div class="form-group has-feedback"><input name="cetonaquimico" type="text" class="form-control" id="cetonaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['cetonaquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td>BILIRRUBINAS</td>
<td><div class="form-group has-feedback"><input name="bilirrubinaquimico" type="text" class="form-control" id="bilirrubinaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['bilirrubinaquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>CILINDROS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cilindrosmicroscopico" id="cilindrosmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['cilindrosmicroscopico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>UROBILINOGENO</td>
<td><div class="form-group has-feedback"><input name="urobilinogenoquimico" type="text" class="form-control" id="urobilinogenoquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['urobilinogenoquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td>SANGRE</td>
<td><div class="form-group has-feedback"><input name="sangrequimico" type="text" class="form-control" id="sangrequimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['sangrequimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>MOCO</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="mocomicroscopico" id="mocomicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['mocomicroscopico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input name="leucocitosquimico" type="text" class="form-control" id="leucocitosquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['leucocitosquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td>NITRITOS</td>
<td><div class="form-group has-feedback"><input name="nitritosquimico" type="text" class="form-control" id="nitritosquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['nitritosquimico']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td colspan="5"><label>OBSERVACIONES:</label></td>
                                          </tr>
                                          <tr>
                                            <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacionessanguinea" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="observacionessanguinea" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"><?php echo $reg[0]['observacionessanguinea']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i>                                            </td>
                                             </tr>
                                        </tbody>
                                    </table>
                            </div> 
                      </div> 


                                    
    <div class="tab-pane" id="settings"> 
            <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        
                                        <tbody>
                                          <tr>
<td colspan="5"><label>FROTIS DE FLUJO VAGINAL </label></td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>EX&Aacute;MEN FRESCO </label></td>
<td colspan="2"><label>GRAM</label></td>
                                          </tr>
                                          <tr>
<td width="256">PH</td>
<td width="144"><div class="form-group has-feedback"><input name="phfresco" type="text" class="form-control" id="phfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['phfresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>BACILOS GRAM POSITIVO</td>
<td width="144"><div class="form-group has-feedback"><input name="basilosgranpositivo" type="text" class="form-control" id="basilosgranpositivo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hematocrito']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>CELULAS GUIA</td>
<td><div class="form-group has-feedback"><input name="celulasfresco" type="text" class="form-control" id="celulasfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['celulasfresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>BACILOS GRAM NEGATIVO</td>
<td><div class="form-group has-feedback"><input name="basilosgrannegativo" type="text" class="form-control" id="basilosgrannegativo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['basilosgrannegativo']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>TEST AMINAS</td>
<td><div class="form-group has-feedback"><input name="testaminafresco" type="text" class="form-control" id="testaminafresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['testaminafresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>COCOBACILO GRAM VARIABLE</td>
<td><div class="form-group has-feedback"><input name="cocobacilogran" type="text" class="form-control" id="cocobacilogran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['cocobacilogran']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>HONGOS</td>
<td><div class="form-group has-feedback"><input name="hongosfresco" type="text" class="form-control" id="hongosfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hongosfresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>DIPLOCOCO GRAM NEGATIVO</td>
<td><div class="form-group has-feedback"><input name="diplococogran" type="text" class="form-control" id="diplococogran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['diplococogran']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>TRICHOMONAS</td>
<td><div class="form-group has-feedback"><input name="trichomonafresco" type="text" class="form-control" id="trichomonafresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['trichomonafresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>BLASTOCONIDIAS</td>
<td><div class="form-group has-feedback"><input name="blastoconidiasgran" type="text" class="form-control" id="blastoconidiasgran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['blastoconidiasgran']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input name="leucitofresco" type="text" class="form-control" id="leucitofresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['leucitofresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>PSEUDOMICELIO</td>
<td><div class="form-group has-feedback"><input name="pseudomiceliogran" type="text" class="form-control" id="pseudomiceliogran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['pseudomiceliogran']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>HEMATIES</td>
<td><div class="form-group has-feedback"><input name="hematiesfresco" type="text" class="form-control" id="hematiesfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hematiesfresco']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>PMN</td>
<td><div class="form-group has-feedback"><input name="pmngran" type="text" class="form-control" id="pmngran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['pmngran']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="5"><label>OBSERVACIONES</label></td>
                                          </tr>
                                          <tr>
                                            <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacionesfrotis" cols="80" rows="2" onkeyup="this.value=this.value.toUpperCase();" class="form-control" id="observacionesfrotis" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"><?php echo $reg[0]['observacionesfrotis']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i>                                            </td>
                                               </tr>
                                        </tbody>
                                    </table>
                              </div> 
                      </div> 
                
      <div class="tab-pane" id="cinco"> 
              <div class="table-responsive" data-pattern="priority-columns">
                         <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                          <tr>
<th colspan="3"><label>INMUNOLOGÍA</label></th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                          <tr>
<td><label>EXÁMEN</label></td>
<td><label>RESULTADO</label></td>
                                          </tr>
                                          <tr>
<td width="336">PRUEBA DE EMBARAZO</td>
<td width="238"><div class="form-group has-feedback"><input name="pruebaembarazo" type="text" class="form-control" id="pruebaembarazo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['pruebaembarazo']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>RPR-SISFILIS</td>
<td><div class="form-group has-feedback"><input name="rprsisfilis" type="text" class="form-control" id="rprsisfilis" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['rprsisfilis']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>RA TEST</td>
<td><div class="form-group has-feedback"><input name="ratest" type="text" class="form-control" id="ratest" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['ratest']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>ASTOS</td>
<td><div class="form-group has-feedback"><input name="astos" type="text" class="form-control" id="astos" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['astos']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>                                          </tr>
                                          <tr>
<td colspan="3"><label>OBSERVACIONES:</label></td>
                                          </tr>
                                          <tr>
<td colspan="3"><div class="form-group has-feedback"><textarea name="observacionesinmunologia" onkeyup="this.value=this.value.toUpperCase();" cols="80" class="form-control" id="observacionesinmunologia" placeholder="Ingrese Observaciones de Resultado" rows="2"></textarea><?php echo $reg[0]['observacionesinmunologia']; ?><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                        </tbody>
                                  </table>
                            </div> 
                      </div> 
                

    <div class="tab-pane" id="seis"> 
            <div class="table-responsive" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <tbody>
                                          <tr>
<td colspan="5"><label>COPROPARASITOLOGÍA</label></td>
                                          </tr>
                                          <tr>
<td width="330">COLOR</td>
<td width="260"><div class="form-group has-feedback"><input class="form-control" type="text" name="colorparasitologia" id="colorparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['colorparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="60">QUISTE</span></td>
<td width="350">Blastocystis hominis</td>
                                          </tr>
                                          <tr>
<td>CONSISTENCIA</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="consistenciaparasitologia" id="consistenciaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['consistenciaparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td>Endolimax nana</td>
                                          </tr>
                                          <tr>
<td>PH</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="phparasitologia" id="phparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['phparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td>Entamoeba coli</td>
                                          </tr>
                                          <tr>
<td>SANGRE OCULTA</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="sangreocultaparasitologia" id="sangreocultaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['sangreocultaparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td>Entamoeba hitolytica</td>
                                          </tr>
                                          <tr>
<td>AZUCARES REDUCTORES</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="azucaresparasitologia" id="azucaresparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['azucaresparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td><span style="font-size: 12px">Giardia lamblia</span></td>
                                          </tr>
                                          <tr>
<td>ALMIDONES SIN DIGERIR</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="almidonesparasitologia" id="almidonesparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['almidonesparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Ascaris lumbricoides</td>
                                          </tr>
                                          <tr>
<td>HONGOS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="hongosparasitologia" id="hongosparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['hongosparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td><span style="font-size: 12px">Uncinaria</span></td>
                                          </tr>
                                          <tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>HUEVO</td>
<td>Tricocefalo</td>
                                          </tr>
                                          <tr>
<td>TRICHOMONAS HOMINIS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="trichomonaparasitologia" id="trichomonaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['trichomonaparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Tenia sp</td>
                                          </tr>
                                          <tr>
<td>IODAMOEBA BUTSLLI</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="iodamoebaparasitologia" id="iodamoebaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['iodamoebaparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Hymenolepis nana</td>
                                          </tr>
                                          <tr>
<td>OTROS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="otrosparasitologia" id="otrosparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['otrosparasitologia']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Strongyloides</td>
                                          </tr>
                                        </tbody>
                                      </table>
                               </div>
                    
           <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <tbody>
                                          <tr>
<td colspan="3"><label>MICROBIOLOGÍA</label></td>
                                          </tr>
                                          <tr>
<td width="467">KOH</td>
<td width="338"><div class="form-group has-feedback"><input class="form-control" type="text" name="kohmicro" id="kohmicro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['kohmicro']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>BACILOSOCOPIA</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="baciloscopiamicro" id="baciloscopiamicro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['baciloscopiamicro']; ?>" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                    </tbody>
                              </table>
                          </div>
                      </div> 
                  </div> 
              </div> 
          </div> 
      </div>         

  </div>



           <br> 
        
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

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script>
            
            $('body').on('focus',"#hour", function(){
            $(this).timepicker({defaultTIme: true});
            });
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