<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION['acceso'] == "ginecologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->ColposcopiaPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarColposcopia();
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Colposcopias</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="colposcopias">Control</a></li>
<li class="active">Gestión de Colposcopias</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="updatecolposcopia" id="updatecolposcopia" method="post" data-id="<?php echo $reg[0]["codcolposcopia"] ?>" action="#" onSubmit="asigna()"> 
      

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
             
<input name="codcolposcopia" type="hidden" id="codcolposcopia" value="<?php echo $reg[0]['codcolposcopia']; ?>" />
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
  <div class="col-md-12">
    <div class="panel panel-border panel-primary">
      <div class="panel-body">

        <div class="row">
          <center><img src="assets/images/img_colpos.png" width="100%" /></center>          
        </div>

      </div>
    </div>
  </div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Resultados de Colposcopia</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12">


<div class="table-responsive" data-pattern="priority-columns"><table width="100%">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr>
<td><label>1. EPITELIO ORIGINAL CAPILAR FINA</label></td>
<td><div class="form-group has-feedback"><input name="epiteliooriginal" type="text" class="form-control" id="epiteliooriginal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['epiteliooriginal']; ?>"><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Zona de transformación Tipica </label></td>
<td><div class="form-group has-feedback"><input name="transformaciontipica" type="text" class="form-control" id="transformaciontipica" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['transformaciontipica']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>2. ASPECTO INFLAMATORIO </label></td>
<td><div class="form-group has-feedback"><input name="aspectoinflamatorio" type="text" class="form-control" id="aspectoinflamatorio" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['aspectoinflamatorio']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Zona de transformación Atipica </label></td>
<td><div class="form-group has-feedback"><input name="transformacionatipica" type="text" class="form-control" id="transformacionatipica" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['transformacionatipica']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Aumento red vascular y/o vasos dilatados </label></td>
<td><div class="form-group has-feedback"><input name="aumentoredvascular" type="text" class="form-control" id="aumentoredvascular" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['aumentoredvascular']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Mosaico </label></td>
<td><div class="form-group has-feedback"><input name="mosaico" type="text" class="form-control" id="mosaico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['mosaico']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>3. IMAGENES ATIPICAS </label></td>
<td><div class="form-group has-feedback"><input name="imagenesatipicas" type="text" class="form-control" id="imagenesatipicas" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['imagenesatipicas']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Vasos atípicos(hormquilla, sacacorchos, astenosis, dilataciones) </label></td>
<td><div class="form-group has-feedback"><input name="vasosatipicos" type="text" class="form-control" id="vasosatipicos" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['vasosatipicos']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Epitelio Acetoblanco </label></td>
<td><div class="form-group has-feedback"><input name="epitelioacetoblanco" type="text" class="form-control" id="epitelioacetoblanco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['epitelioacetoblanco']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Condiloma </label></td>
<td><div class="form-group has-feedback"><input name="condiloma" type="text" class="form-control" id="condiloma" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['condiloma']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Base o punteado </label></td>
<td><div class="form-group has-feedback"><input name="baseopunteado" type="text" class="form-control" id="baseopunteado" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['baseopunteado']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Severas alteraciones vasculares y/o aumento de la distancia intercapilar </label></td>
<td><div class="form-group has-feedback"><input name="alteracionesvasculares" type="text" class="form-control" id="alteracionesvasculares" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['alteracionesvasculares']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>4. ASPECTO TUMORAL </label></td>
<td><div class="form-group has-feedback"><input name="aspectotumoral" type="text" class="form-control" id="aspectotumoral" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['aspectotumoral']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- VPH </label></td>
<td><div class="form-group has-feedback"><input name="vph" type="text" class="form-control" id="vph" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['vph']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Ulcerativo </label></td>
<td><div class="form-group has-feedback"><input name="ulcerativo" type="text" class="form-control" id="ulcerativo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['ulcerativo']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- NIC </label></td>
<td><div class="form-group has-feedback"><input name="nic" type="text" class="form-control" id="nic" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['nic']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Proliferativo </label></td>
<td><div class="form-group has-feedback"><input name="proliferativo" type="text" class="form-control" id="proliferativo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['proliferativo']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Ca. Invasor </label></td>
<td><div class="form-group has-feedback"><input name="cainvasor" type="text" class="form-control" id="cainvasor" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['cainvasor']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>5. IMPRESIóN DIAGNOSTICA </label></td>
<td><div class="form-group has-feedback"><input name="impresiondiagnostica" type="text" class="form-control" id="impresiondiagnostica" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['impresiondiagnostica']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td><label>- Normal </label></td>
<td><div class="form-group has-feedback"><input name="impresionnormal" type="text" class="form-control" id="impresionnormal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['impresionnormal']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td><label>- Inflamatoria </label></td>
<td><div class="form-group has-feedback"><input name="impresioninflamatoria" type="text" class="form-control" id="impresioninflamatoria" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['impresioninflamatoria']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="5"><label>OBSERVACIONES: <span class="symbol required"></span></label></td>
                                          </tr>
                                          <tr>
<td colspan="5"><div class="form-group has-feedback"><textarea name="observacionesimpresion" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="observacionesimpresion" placeholder="Ingrese Observaciones de Impresion Diagnostica" required="" aria-required="true"><?php echo $reg[0]['observacionesimpresion']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                        </tbody>
                                      </table>        
                          
                          
                      
                                       <table width="100%">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr>
<td colspan="3"><label>1. La unión escamocolumnar es visible? </label></td>
<td><div class="radio radio-primary"><input name="union" id="union1" type="radio" class="radio" value="SI"  <?php if($reg[0]['tunion'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="union1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="union" id="union2" class="radio" value="NO"  <?php if($reg[0]['tunion'] == "NO") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="union2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="3"><label>2. La lesión es complentamente visible? </label></td>
<td><div class="radio radio-primary"><input name="lesion" id="lesion1" type="radio" class="radio" value="SI" <?php if($reg[0]['tlesion'] == "SI") { ?> checked="checked" <?php } ?> checked="checked" required="" aria-required="true" /><label for="lesion1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="lesion" id="lesion2" class="radio" value="NO" <?php if($reg[0]['tlesion'] == "SI") { ?> checked="checked" <?php } ?> required="" aria-required="true" /><label for="lesion2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>Otros: <span class="symbol required"></span></label></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="7"><div class="form-group has-feedback"><textarea name="otros" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="otros" placeholder="Ingrese Otros" required="" aria-required="true"><?php echo $reg[0]['otros']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>Sitio de la Biopsia: <span class="symbol required"></span></label></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="7"><div class="form-group has-feedback"><textarea name="biopsia" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="biopsia" placeholder="Ingrese Sitio de la Biopsia" required="" aria-required="true"><?php echo $reg[0]['biopsia']; ?></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>- Exocervix: </label></td>
<td><div class="form-group has-feedback"><input name="exocervix" type="text" class="form-control" id="exocervix" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['exocervix']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>- Vagina: </label></td>
<td><div class="form-group has-feedback"><input name="vagina" type="text" class="form-control" id="vagina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['vagina']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>- Uniones escamoculumnar: </label></td>
<td><div class="form-group has-feedback"><input name="escamoculumnar" type="text" class="form-control" id="escamoculumnar" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['escamoculumnar']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>- Endocervix: </label></td>
<td><div class="form-group has-feedback"><input name="endocervix" type="text" class="form-control" id="endocervix" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['endocervix']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>- Endometrio: </label></td>
<td><div class="form-group has-feedback"><input name="endometrio" type="text" class="form-control" id="endometrio" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" value="<?php echo $reg[0]['endometrio']; ?>"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                        </tbody>
                                      </table></div>
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
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label><input type="text" id="presuntivo'+cont+'" name="presuntivo[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true"><input name="idciepresuntivo[]'+cont+'" type="hidden" class="form-control" id="idciepresuntivo'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/><textarea name="observacionpresuntivo[]'+cont+'" class="form-control" id="observacionpresuntivo'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observacion de Dx Presuntivo" title="Ingrese Observacion de Dx Presuntivo" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
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
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Dx Definitivo: <span class="symbol required"></span></label><input type="text" id="definitivo'+cont+'" name="definitivo[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" required="" aria-required="true"><input name="idciedefinitivo[]'+cont+'" type="hidden" class="form-control" id="idciedefinitivo'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/><textarea name="observaciondefinitivo[]'+cont+'" class="form-control" id="observaciondefinitivo'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observacion de Dx Definitivo" title="Ingrese Observacion de Dx Definitivo" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
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
    
  
<script language='JavaScript'>
function addRowX3()  //Esta la funcion que agrega las filas :
{
cont++;
//autocompletar

//
var indiceFila=1;
myNewRow = document.getElementById('tabla3').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Nombre de Dx para Fórmula Médica: <span class="symbol required"></span></label><input type="text" id="formula'+cont+'" name="formula[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar3(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx para Fórmula Médica" required="" aria-required="true"><input name="idcieformula[]'+cont+'" type="hidden" class="form-control" id="idcieformula'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/><textarea name="formulamedica[]'+cont+'" class="form-control" id="formulamedica'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Fórmula Médica" title="Ingrese Observación de Fórmula Médica" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
indiceFila++;
}

//////////////Borrar() ///////////
function borrar3() {
var table = document.getElementById('tabla3');
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
function addRowX4()  //Esta la funcion que agrega las filas :
{
cont++;
//autocompletar

//
var indiceFila=1;
myNewRow = document.getElementById('tabla4').insertRow(-1);
myNewRow.id=indiceFila;
myNewCell=myNewRow.insertCell(-1);
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Nombre de Dx para Orden Médica: <span class="symbol required"></span></label><input type="text" id="ordenes'+cont+'" name="ordenes[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar4(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx para Orden Médica" required="" aria-required="true"><input name="idcieorden[]'+cont+'" type="hidden" class="form-control" id="idcieorden'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/><textarea name="ordenmedica[]'+cont+'" class="form-control" id="ordenmedica'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Orden Médica" title="Ingrese Observación de Orden Médica" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
indiceFila++;
}

//////////////Borrar() ///////////
function borrar4() {
var table = document.getElementById('tabla4');
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