<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="auditor" || $_SESSION["acceso"]=="tecnico" || $_SESSION['acceso'] == "general" || $_SESSION["acceso"]=="ginecologo" || $_SESSION["acceso"]=="bacteriologo" || $_SESSION["acceso"]=="radiologo" || $_SESSION["acceso"]=="terapeuta" || $_SESSION["acceso"]=="odontologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

if(isset($_POST['btn-submit']))
{
$reg = $tra->RegistrarPacientes();
exit;
} 
else if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarPacientes();
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
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css"> 

<!-- script jquery -->
<script src="assets/js/jquery.min.js"></script> 
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/script/script2.js"></script>
<script type="text/javascript" src="assets/script/validation.min.js"></script>
<script type="text/javascript" src="assets/script/script.js"></script>
    <script type="text/javascript">
    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i.test(value);
    }, "Ingrese solo letras");
    </script>
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Pacientes</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="pacientes">Control</a></li>
<li class="active">Gestión de Pacientes</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<?php  if (isset($_GET['codpaciente'])) {
      
      $reg = $tra->PacientesPorId(); ?>
      
<form class="form" name="updatepaciente" id="updatepaciente" method="post" data-id="<?php echo $reg[0]["codpaciente"] ?>" action="#">
        
    <?php } else { ?>
        
<form class="form" method="post"  action="#" name="paciente" id="paciente"> 
      
    <?php } ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos de Pacientes</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                  </div> 
             
			 <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Tipo de Identificación: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['idenpaciente'])) { ?>
<select name="idenpaciente" id="idenpaciente" class='form-control' required="" aria-required="true">
                                    <option value="">SELECCIONE</option>
<option value="REGISTRO CIVIL"<?php if (!(strcmp('REGISTRO CIVIL', $reg[0]['idenpaciente']))) {echo "selected=\"selected\"";} ?>>REGISTRO CIVIL</option>
<option value="TARJETA DE IDENTIDAD"<?php if (!(strcmp('TARJETA DE IDENTIDAD', $reg[0]['idenpaciente']))) {echo "selected=\"selected\"";} ?>>TARJETA DE IDENTIDAD</option>
<option value="CEDULA"<?php if (!(strcmp('CEDULA', $reg[0]['idenpaciente']))) {echo "selected=\"selected\"";} ?>>CEDULA</option>
<option value="CEDULA EXTRANJERA"<?php if (!(strcmp('CEDULA EXTRANJERA', $reg[0]['idenpaciente']))) {echo "selected=\"selected\"";} ?>>CEDULA EXTRANJERA</option> 
                                                    </select>
                             <?php } else { ?>  
<select name="idenpaciente" id="idenpaciente" class='form-control' required="" aria-required="true"> 
             <option value="">SELECCIONE</option>
<option value="REGISTRO CIVIL">REGISTRO CIVIL</option>
<option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
<option value="CEDULA">CEDULA</option>
<option value="CEDULA EXTRANJERA">CEDULA EXTRANJERA</option>  
                                                    </select>
                              <?php } ?>
                              </div> 
                        </div>


                        <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Identificación: <span class="symbol required"></span></label> 
 <input type="hidden" name="codpaciente" id="codpaciente" <?php if (isset($reg[0]['codpaciente'])) { ?> value="<?php echo $reg[0]['codpaciente']; ?>"<?php } ?>>
<input type="text" class="form-control" name="cedpaciente" id="cedpaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Identificación" <?php if (isset($reg[0]['cedpaciente'])) { ?> value="<?php echo $reg[0]['cedpaciente']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Primer Nombre: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="pnompaciente" id="pnompaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Primer Nombre" <?php if (isset($reg[0]['pnompaciente'])) { ?> value="<?php echo $reg[0]['pnompaciente']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Segundo Nombre: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="snompaciente" id="snompaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Seguno Nombre" <?php if (isset($reg[0]['snompaciente'])) { ?> value="<?php echo $reg[0]['snompaciente']; ?>"<?php } ?>
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                    </div>

          <div class="row">  
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Primer Apellido: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="papepaciente" id="papepaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Primer Apellido" <?php if (isset($reg[0]['papepaciente'])) { ?> value="<?php echo $reg[0]['papepaciente']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Segundo Apellido: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="sapepaciente" id="sapepaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Segundo Apellido" <?php if (isset($reg[0]['sapepaciente'])) { ?> value="<?php echo $reg[0]['sapepaciente']; ?>"<?php } ?>>
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>

                        <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
            <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<input name="fnacpaciente" class="form-control nacimiento" type="text" id="fnacpaciente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Nacimiento" autocomplete="off" <?php if (isset($reg[0]['sapepaciente'])) { ?> value="<?php echo date("d-m-Y",strtotime($reg[0]['fnacpaciente'])); ?>" <?php } ?> required="required"/>
                        <i class="fa fa-calendar form-control-feedback"></i>  
                                                                </div> 
                                                            </div>


              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="tlfpaciente" id="tlfpaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Teléfono" <?php if (isset($reg[0]['tlfpaciente'])) { ?> value="<?php echo $reg[0]['tlfpaciente']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i>  
                              </div> 
                        </div>  
             </div>  


          <div class="row"> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Grupo Saguineo: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['gruposapaciente'])) { ?>
<select name="gruposapaciente" id="gruposapaciente" class='form-control' required="" aria-required="true">
                               <option value="">SELECCIONE</option>
<option value="A RH-"<?php if (!(strcmp('A RH-', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>A RH-</option>
<option value="A RH+"<?php if (!(strcmp('A RH+', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>A RH+</option>
<option value="AB RH-"<?php if (!(strcmp('AB RH-', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>AB RH-</option>
<option value="AB RH+"<?php if (!(strcmp('AB RH+', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>AB RH+</option>
<option value="B RH-"<?php if (!(strcmp('B RH-', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>B RH-</option>
<option value="B RH+"<?php if (!(strcmp('B RH+', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>B RH+</option>
<option value="O RH-"<?php if (!(strcmp('O RH-', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>O RH-</option>
<option value="O RH+"<?php if (!(strcmp('O RH+', $reg[0]['gruposapaciente']))) {echo "selected=\"selected\"";} ?>>O RH+</option>
                      </select>
                             <?php } else { ?>  
<select name="gruposapaciente" id="gruposapaciente" class='form-control' required="" aria-required="true">
                               <option value="">SELECCIONE</option>
                                     <option value="A RH-">A RH-</option>
                                     <option value="A RH+">A RH+</option>
                                     <option value="AB RH-">AB RH-</option>
                                     <option value="AB RH+">AB RH+</option>
                                     <option value="B RH-">B RH-</option>
                                     <option value="B RH+">B RH+</option>
                                     <option value="O RH-">O RH-</option>
                                     <option value="O RH+">O RH+</option>
                      </select>
                              <?php } ?>
                              </div> 
                        </div> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Puesto de Salud: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['eps'])) { ?>
<select name="eps" id="eps" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <?php
      $pa = new Login();
      $pa = $pa->ListarEps();
      for($i=0;$i<sizeof($pa);$i++){
                  ?>
<option value="<?php echo $pa[$i]['codeps'] ?>"<?php if ($pa[$i]['codeps'] == $reg[0]['eps']) { ?> selected="selected" <?php } ?>><?php echo $pa[$i]['nomcontabilidad'] ?></option>      
                      <?php 
  }
?>
                      </select>
                             <?php } else { ?>  
<select name="eps" id="eps" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <?php
      $pa = new Login();
      $pa = $pa->ListarEps();
      for($i=0;$i<sizeof($pa);$i++){
                  ?>
<option value="<?php echo $pa[$i]['codeps'] ?>"><?php echo $pa[$i]['nomcontabilidad'] ?></option>       
                      <?php 
  }
?>
                      </select>
                              <?php } ?>
                              </div> 
                        </div> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Tipo de Seguro: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['vinculacion'])) { ?>
<select name="vinculacion" id="vinculacion" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="CONTRIBUTIVO"<?php if (!(strcmp('CONTRIBUTIVO', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>CONTRIBUTIVO</option>
<option value="CONTRIBUTIVO SUB"<?php if (!(strcmp('CONTRIBUTIVO SUB', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>CONTRIBUTIVO SUB</option>
<option value="SUBSIDIADO"<?php if (!(strcmp('SUBSIDIADO', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>SUBSIDIADO</option>
<option value="SUBSIDIADO SUB"<?php if (!(strcmp('SUBSIDIADO SUB', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>SUBSIDIADO SUB</option>
<option value="VINCULADOS"<?php if (!(strcmp('VINCULADOS', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>VINCULADOS</option>
<option value="DEDO NO ASEGURADO"<?php if (!(strcmp('DEDO NO ASEGURADO', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>DEDO NO ASEGURADO</option>
<option value="PARTICULARES"<?php if (!(strcmp('PARTICULARES', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>PARTICULARES</option>
<option value="OTROS"<?php if (!(strcmp('OTROS', $reg[0]['vinculacion']))) {echo "selected=\"selected\"";} ?>>OTROS</option>
                      </select>
                             <?php } else { ?>  
<select name="vinculacion" id="vinculacion" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="CONTRIBUTIVO">CONTRIBUTIVO</option>
                        <option value="CONTRIBUTIVO SUB">CONTRIBUTIVO SUB</option>
                        <option value="SUBSIDIADO">SUBSIDIADO</option>
                        <option value="SUBSIDIADO SUB">SUBSIDIADO SUB</option>
                        <option value="VINCULADOS">VINCULADOS</option>
                        <option value="DEDO NO ASEGURADO">DEDO NO ASEGURADO</option>
                        <option value="PARTICULARES">PARTICULARES</option>
                        <option value="OTROS">OTROS</option>
                      </select>
                              <?php } ?>
                              </div> 
                        </div>

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Estado Civil: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['estadopaciente'])) { ?>
<select class="form-control" id="estadopaciente" name="estadopaciente" required="" aria-required="true">
                                <option value="" disabled selected>SELECCIONE</option>
<option value="SOLTERO(A)"<?php if (!(strcmp('SOLTERO(A)', $reg[0]['estadopaciente']))) {echo "selected=\"selected\"";} ?>> SOLTERO(A)</option>
<option value="CASADO(A)"<?php if (!(strcmp('CASADO(A)', $reg[0]['estadopaciente']))) {echo "selected=\"selected\"";} ?>> CASADO(A)</option>
<option value="VIUDO(A)"<?php if (!(strcmp('VIUDO(A)', $reg[0]['estadopaciente']))) {echo "selected=\"selected\"";} ?>> VIUDO(A)</option>
<option value="DIVORCIADO(A)"<?php if (!(strcmp('DIVORCIADO(A)', $reg[0]['estadopaciente']))) {echo "selected=\"selected\"";} ?>> DIVORCIADO(A)</option>
<option value="CONCUBINO(A)"<?php if (!(strcmp('CONCUBINO(A)', $reg[0]['estadopaciente']))) {echo "selected=\"selected\"";} ?>> CONCUBINO(A)</option>
<option value="UNION LIBRE"<?php if (!(strcmp('UNION LIBRE', $reg[0]['estadopaciente']))) {echo "selected=\"selected\"";} ?>> UNION LIBRE</option>                                    
                                    </select> 
                             <?php } else { ?>  
<select class="form-control" id="estadopaciente" name="estadopaciente" required="" aria-required="true">
                                <option value="" disabled selected>SELECCIONE</option>
                                    <option value="SOLTERO(A)"> SOLTERO(A)</option>
                                    <option value="CASADO(A)"> CASADO(A)</option>
                                    <option value="VIUDO(A)"> VIUDO(A)</option>
                                    <option value="DIVORCIADO(A)"> DIVORCIADO(A)</option>
                                    <option value="CONCUBINO(A)"> CONCUBINO(A)</option> 
                                    <option value="UNION LIBRE"> UNION LIBRE</option>
                                    </select>
                              <?php } ?>
                              </div> 
                        </div>  
             </div>  
          

          <div class="row"> 
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="ocupacionpaciente" id="ocupacionpaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Ocupación Laboral" <?php if (isset($reg[0]['ocupacionpaciente'])) { ?> value="<?php echo $reg[0]['ocupacionpaciente']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Sexo: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['sexopaciente'])) { ?>
<select name="sexopaciente" id="sexopaciente" class="form-control" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="MASCULINO"<?php if (!(strcmp('MASCULINO', $reg[0]['sexopaciente']))) {echo "selected=\"selected\"";} ?>>MASCULINO</option>
<option value="FEMENINO"<?php if (!(strcmp('FEMENINO', $reg[0]['sexopaciente']))) {echo "selected=\"selected\"";} ?>>FEMENINO</option>
                      </select>
                             <?php } else { ?>  
  <select name="sexopaciente" id="sexopaciente" class="form-control" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                  </select>
                              <?php } ?>
                              </div> 
                        </div> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Identidad Cultural: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['enfoquepaciente'])) { ?>
<select name="enfoquepaciente" id="enfoquepaciente" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="INDIGENA"<?php if (!(strcmp('INDIGENA', $reg[0]['enfoquepaciente']))) {echo "selected=\"selected\"";} ?>>INDIGENA</option>
<option value="PALENQUERO"<?php if (!(strcmp('PALENQUERO', $reg[0]['enfoquepaciente']))) {echo "selected=\"selected\"";} ?>>PALENQUERO</option>
<option value="MULATO"<?php if (!(strcmp('MULATO', $reg[0]['enfoquepaciente']))) {echo "selected=\"selected\"";} ?>>MULATO</option>
<option value="BLANCO"<?php if (!(strcmp('BLANCO', $reg[0]['enfoquepaciente']))) {echo "selected=\"selected\"";} ?>>BLANCO</option>
<option value="NEGRO"<?php if (!(strcmp('NEGRO', $reg[0]['enfoquepaciente']))) {echo "selected=\"selected\"";} ?>>NEGRO</option>
<option value="OTRO"<?php if (!(strcmp('OTRO', $reg[0]['enfoquepaciente']))) {echo "selected=\"selected\"";} ?>>OTRO</option>
                      </select> 
                             <?php } else { ?>  
<select name="enfoquepaciente" id="enfoquepaciente" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="INDIGENA">INDIGENA</option>
                        <option value="PALENQUERO">PALENQUERO</option>
                        <option value="MULATO">MULATO</option>
                        <option value="BLANCO">BLANCO</option>
                        <option value="NEGRO">NEGRO</option>
                        <option value="OTRO">OTRO</option>
                      </select>
                              <?php } ?>
                              </div> 
                        </div>

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Provincia: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['departamento'])) { ?>
<select name="departamento" id="departamento" class='form-control' onChange="CargaMunicipios(this.form.departamento.value);" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <?php
      $de = new Login();
      $de = $de->ListarDepartamentos();
      for($i=0;$i<sizeof($de);$i++){
                  ?>
<option value="<?php echo $de[$i]['id'] ?>"<?php if ($de[$i]['id'] == $reg[0]['departamento']) { ?> selected="selected" <?php } ?>><?php echo $de[$i]['nombre'] ?></option>       
                      <?php 
  }
############################# FIN DE BUSQUEDA DE DEPARTAMENTOS ######################################
?>
                      </select> 
                             <?php } else { ?>  
<select name="departamento" id="departamento" class='form-control' onChange="CargaMunicipios(this.form.departamento.value);" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <?php
      $de = new Login();
      $de = $de->ListarDepartamentos();
      for($i=0;$i<sizeof($de);$i++){
                  ?>
<option value="<?php echo $de[$i]['id'] ?>"><?php echo $de[$i]['nombre'] ?></option>        
                      <?php 
  }
?>
                      </select>
                              <?php } ?>
                              </div> 
                        </div>  
             </div>  
          

          <div class="row">

                <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Municipios: <span class="symbol required"></span></label>
          <?php if (isset($reg[0]['municipio'])) { ?>
<select name="municipio" id="municipio" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
             <?php
        $mu = new Login();
        $mu = $mu->ListarMunicipios();  
        for($i=0;$i<sizeof($mu);$i++){
                  ?>
<option value="<?php echo $mu[$i]['id'] ?>" <?php if ($mu[$i]['id'] == $reg[0]['municipio']) { ?> selected="selected" <?php } ?> ><?php echo $mu[$i]['nombre_municipio'] ?></option>    
                      <?php 
  }
?>  
                      </select>
                             <?php } else { ?>
<select class="form-control" id="municipio" name="municipio" required="required">
<option value="">SELECCIONE</option>
          </select>
                              <?php } ?>
                    </div>
                </div>    
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Centro Poblado: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="ciudad" id="ciudad" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Centro Poblado" <?php if (isset($reg[0]['ciudad'])) { ?> value="<?php echo $reg[0]['ciudad']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div> 

                            <div class="col-md-6"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label> 
 <input type="text" class="form-control" name="direcpaciente" id="direcpaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dirección Domiciliaria" <?php if (isset($reg[0]['direcpaciente'])) { ?> value="<?php echo $reg[0]['direcpaciente']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-map-marker form-control-feedback"></i>  
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Acompañante</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
   
             
       <div class="row"> 
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Acompañante: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="nomacompana" id="nomacompana" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre Acompañante" <?php if (isset($reg[0]['nomacompana'])) { ?> value="<?php echo $reg[0]['nomacompana']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label> 
 <input type="text" class="form-control" name="direcacompana" id="direcacompana" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dirección Domiciliaria" <?php if (isset($reg[0]['direcacompana'])) { ?> value="<?php echo $reg[0]['direcacompana']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-map-marker form-control-feedback"></i>  
                              </div> 
                        </div>

              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="tlfacompana" id="tlfacompana" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº Teléfono" <?php if (isset($reg[0]['tlfacompana'])) { ?> value="<?php echo $reg[0]['tlfacompana']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i>  
                              </div> 
                        </div> 
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Parentesco: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="parentescoacompana" id="parentescoacompana" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Parentesco" <?php if (isset($reg[0]['parentescoacompana'])) { ?> value="<?php echo $reg[0]['parentescoacompana']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Responsable</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
   
             
       <div class="row"> 
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Responsable: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="nomresponsable" id="nomresponsable" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre Responsable" <?php if (isset($reg[0]['nomresponsable'])) { ?> value="<?php echo $reg[0]['nomresponsable']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label> 
 <input type="text" class="form-control" name="direcresponsable" id="direcresponsable" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dirección Domiciliaria" <?php if (isset($reg[0]['direcresponsable'])) { ?> value="<?php echo $reg[0]['direcresponsable']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-map-marker form-control-feedback"></i>  
                              </div> 
                        </div>

              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="tlfresponsable" id="tlfresponsable" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº Teléfono" <?php if (isset($reg[0]['tlfresponsable'])) { ?> value="<?php echo $reg[0]['tlfresponsable']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i>  
                              </div> 
                        </div> 
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Parentesco: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="parentescoresponsable" id="parentescoresponsable" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Parentesco" <?php if (isset($reg[0]['parentescoresponsable'])) { ?> value="<?php echo $reg[0]['parentescoresponsable']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div> 
             </div><br>
        
            <div class="modal-footer"> 
<?php  if (isset($_GET['codpaciente'])) { ?>
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
<button class="btn btn-danger" type="reset"><i class="fa fa-trash-o"></i> Cancelar</button> 
    <?php } else { ?>
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><i class="fa fa-trash-o"></i> Limpiar</button>
    <?php } ?>   
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
        
        <!-- jQuery  -->
        <script src="assets/plugins/moment/moment.js"></script>
        
        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
           
        <!-- jQuery  -->
        <script src="assets/pages/jquery.dashboard.js"></script>
  

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