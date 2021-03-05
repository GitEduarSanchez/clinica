<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION['acceso'] == "ginecologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->HojaEvolutivaPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarHojaEvolutiva();
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Hojas Evolutivas</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="hojaevolutiva">Control</a></li>
<li class="active">Gestión de Hojas Evolutivas</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="updatehojaevg" id="updatehojaevg" method="post" data-id="<?php echo $reg[0]["codprocedimiento"] ?>" action="#" onSubmit="asigna()"> 
      

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
             
<input name="codprocedimiento" type="hidden" id="codprocedimiento" value="<?php echo $reg[0]['codprocedimiento']; ?>" />
<input type="hidden" name="codmedico" id="codmedico" value="<?php echo $reg[0]['codmedico']; ?>">
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $reg[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $reg[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $reg[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $reg[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="<?php echo $reg[0]['procedimiento']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $reg[0]['especialidad']; ?>">
<input type="hidden" name="sexo" id="sexo" value="<?php echo $reg[0]['sexopaciente']; ?>">

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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Motivo de Consulta</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Motivo de Consulta: <span class="symbol required"></span></label> 
<textarea name="motivoconsulta" class="form-control" id="motivoconsulta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Consulta" rows="2" required="" aria-required="true"><?php echo $reg[0]['motivoconsulta']; ?></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>

              <div class="col-md-6"> 
                <div class="form-group has-feedback"> 
          <label class="control-label">Exámen Físico: <span class="symbol required"></span></label> 
 <textarea name="examenfisico" class="form-control" id="examenfisico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Exámen Físico" rows="2" required="" aria-required="true"><?php echo $reg[0]['examenfisico']; ?></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div> 
            </div>

<?php if($reg[0]['sexopaciente']=="FEMENINO" && $reg[0]['especialidad'] =="MEDICO GENERAL") { ?>

  <div class="row">

       <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Citologia: </label> 
 <input class="form-control nacimiento" type="text" name="fechacitologia" id="fechacitologia" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Citologia" autocomplete="off" value="<?php echo $variable = ( $reg[0]['fechacitologia'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechacitologia']))); ?>" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-4"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Esta Embarazada:</label> 
<select name="embarazada" id="embarazada" class='form-control' onchange="Embarazada()" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="SI"<?php if (!(strcmp('SI', $reg[0]['embarazada']))) {echo "selected=\"selected\"";} ?>>SI</option>
<option value="NO"<?php if (!(strcmp('NO', $reg[0]['embarazada']))) {echo "selected=\"selected\"";} ?>>NO</option>
                      </select>
                             </div>  
                       </div>

       <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Mestruación: <span class="symbol required"></span></label> 
<?php if($reg[0]['embarazada']=='NO') { ?> 
<input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" value="<?php echo "0000-00-00"; ?>" disabled="disabled" required="" aria-required="true">
<?php } else { ?>
<input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" value="<?php echo date("d-m-Y", strtotime($reg[0]['fechamestruacion'])); ?>" required="" aria-required="true">
<?php } ?>
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>
                </div> 


      <?php } elseif($reg[0]['sexopaciente']=="FEMENINO" && $reg[0]['especialidad'] =="GINECOLOGO") { ?>

  <div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Citologia: </label> 
 <input class="form-control nacimiento" type="text" name="fechacitologia" id="fechacitologia" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Citologia" autocomplete="off" value="<?php echo $variable = ( $reg[0]['fechacitologia'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechacitologia']))); ?>" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Esta Embarazada: <span class="symbol required"></span></label> 
<select name="embarazada" id="embarazada" class='form-control' onchange="Embarazada()" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="SI"<?php if (!(strcmp('SI', $reg[0]['embarazada']))) {echo "selected=\"selected\"";} ?>>SI</option>
<option value="NO"<?php if (!(strcmp('NO', $reg[0]['embarazada']))) {echo "selected=\"selected\"";} ?>>NO</option>
                      </select>
                             </div>  
                       </div>

      <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Mestruación: <span class="symbol required"></span></label> 
<?php if($reg[0]['embarazada']=='NO') { ?> 
<input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" value="<?php echo "0000-00-00"; ?>" disabled="disabled" required="" aria-required="true">
<?php } else { ?>
<input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" value="<?php echo date("d-m-Y", strtotime($reg[0]['fechamestruacion'])); ?>" required="" aria-required="true">
<?php } ?>
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

<input type="hidden" name="di" id="di" value="28">
<input type="hidden" name="sem" id="sem" value="14"> 

<?php if($reg[0]['embarazada']=='SI') { ?>

  <div class="col-md-2"> 
         <div class="form-group has-feedback"><br>
<button type="button" class="btn btn-info waves-effect waves-light" onclick="CalcularEmbarazo()" name="calcular" id="calcular"><span class="fa fa-calculator"></span> Calcular Parto</button>
        </div> 
      </div>    
  </div> 

<?php } else { ?>

  <div class="col-md-2"> 
         <div class="form-group has-feedback"><br>
<button type="button" class="btn btn-info waves-effect waves-light" onclick="CalcularEmbarazo()" name="calcular" id="calcular" disabled="disabled"><span class="fa fa-calculator"></span> Calcular Parto</button>
        </div> 
      </div>    
  </div> 

<?php } ?>

<?php if($reg[0]['embarazada']=='SI') { ?>
            
      <div class="row">

            <div id="result2"> 

              <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
                   <label class="control-label">Fecha Probable de Parto: <span class="symbol required"></span></label> 
 <input class="form-control" type="text" name="fechaparto" id="fechaparto" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Fecha Posible de Parto" value="<?php echo date("d-m-Y",strtotime($reg[0]['fechaparto'])); ?>" readonly="readonly">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>
            </div>                            
            
          <div id="result3">

            <div class="col-md-3"> 
                   <div class="form-group has-feedback"> 
        <label class="control-label">Semanas de Gestación: <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="semanas" id="semanas" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Semana Gestación" value="<?php echo $reg[0]['semanas']; ?>" readonly="readonly">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div> 
                 </div>
        </div>
            
                        <?php } ?> 

     <div class="row">
      <div id="result2"></div>                      
      <div id="result3"></div>
    </div> 

                        <?php } ?>             
          
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Signos Vitales</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">TA(mm/Hg): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="ta" id="ta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese TA" value="<?php echo $reg[0]['ta']; ?>" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">Temperatura:(&deg;C): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="temperatura" id="temperatura" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Temperatura" value="<?php echo $reg[0]['temperatura']; ?>" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">FC(por minuto): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fc" id="fc" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese FC" value="<?php echo $reg[0]['fc']; ?>" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">FR(por minuto): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fr" id="fr" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese FR" value="<?php echo $reg[0]['fr']; ?>" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">PESO(Kg): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="peso" id="peso" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Peso" value="<?php echo $reg[0]['peso']; ?>" required="" aria-required="true">
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Atención Actividad y/o Procedimiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
  <label class="control-label">Atención Actividad y/o Procedimiento: <span class="symbol required"></span></label> 
<textarea name="atenproced" class="form-control" id="atenproced" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención Actividad y/o Procedimiento" rows="2" required="" aria-required="true"><?php echo $reg[0]['atenproced']; ?></textarea> 
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Identificación del Origen de la Enfermedad o Accidente</h3></div>
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
# Con este tenemos ya un array de 3 posiciones. Segun el ejemplo, este es el codigo del presuntivo que se muestra, esa es la variable q obtengo de la bd, es decir aqui se muestra todo bien, ahora vamos a actualizar
 
$explode = explode(",,",$reg[0]['dxpresuntivo']);

# Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
for($cont=0; $cont<COUNT($explode); $cont++):
  # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
  list($presuntivo,$idciepresuntivo,$observacionpresuntivo) = explode("/",$explode[$cont]);
?>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label> 
<input name="idciepresuntivo[]" type="hidden" class="form-control" id="idciepresuntivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" value="<?php echo $idciepresuntivo; ?>" required="required"/>

<input type="text" id="presuntivo" name="presuntivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" value="<?php echo $presuntivo; ?>" readonly="readonly" required="" aria-required="true">

<textarea name="observacionpresuntivo[]" class="form-control" id="observacionpresuntivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Presuntivo" title="Ingrese Observación de Dx Presuntivo" rows="2" required="" aria-required="true"><?php echo $observacionpresuntivo; ?></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div><?php endfor; ?> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Origen de la Enfermedad o Accidente del Paciente: <span class="symbol required"></span></label> 
<select name="origenenfermedad" id="origenenfermedad" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="PACIENTE SANO"<?php if (!(strcmp('PACIENTE SANO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>PACIENTE SANO</option>
<option value="ACCIDENTE DE TRABAJO"<?php if (!(strcmp('ACCIDENTE DE TRABAJO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>ACCIDENTE DE TRABAJO</option>
<option value="ACCIDENTE DE TRANSITO"<?php if (!(strcmp('ACCIDENTE DE TRANSITO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>ACCIDENTE DE TRANSITO</option>
<option value="ACCIDENTE RAPIDO"<?php if (!(strcmp('ACCIDENTE RAPIDO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>ACCIDENTE RAPIDO</option>
<option value="ACCIDENTE OFIDICO"<?php if (!(strcmp('ACCIDENTE OFIDICO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>ACCIDENTE OFIDICO</option>
<option value="OTRO TIPO DE ACCIDENTE"<?php if (!(strcmp('OTRO TIPO DE ACCIDENTE', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>OTRO TIPO DE ACCIDENTE</option>
<option value="EVENTO CATASTROFICO"<?php if (!(strcmp('EVENTO CATASTROFICO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>EVENTO CATASTROFICO</option>
<option value="LESION POR AGRESION"<?php if (!(strcmp('LESION POR AGRESION', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>LESION POR AGRESION</option>
<option value="LESION AUTO INFLINGIDA"<?php if (!(strcmp('LESION AUTO INFLINGIDA', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>LESION AUTO INFLINGIDA</option>
<option value="SOSPECHA DE MALTRATO FISICO"<?php if (!(strcmp('SOSPECHA DE MALTRATO FISICO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>SOSPECHA DE MALTRATO FISICO</option>
<option value="SOSPECHA DE ABUSO SEXUAL"<?php if (!(strcmp('SOSPECHA DE ABUSO SEXUAL', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>SOSPECHA DE ABUSO SEXUAL</option>
<option value="SOSPECHA DE VIOLENCIA SEXUAL"<?php if (!(strcmp('SOSPECHA DE VIOLENCIA SEXUAL', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>SOSPECHA DE VIOLENCIA SEXUAL</option>
<option value="SOSPECHA DE MALTRATO EMOCIONAL"<?php if (!(strcmp('SOSPECHA DE MALTRATO EMOCIONAL', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>SOSPECHA DE MALTRATO EMOCIONAL</option>
<option value="ENFERMEDAD GENERAL"<?php if (!(strcmp('ENFERMEDAD GENERAL', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>ENFERMEDAD GENERAL</option>
<option value="ENFERMEDAD PROFESIONAL U OCUPACIONAL"<?php if (!(strcmp('ENFERMEDAD PROFESIONAL U OCUPACIONAL', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>ENFERMEDAD PROFESIONAL U OCUPACIONAL</option>
<option value="OTRO"<?php if (!(strcmp('OTRO', $reg[0]['origenenfermedad']))) {echo "selected=\"selected\"";} ?>>OTRO</option>
                      </select>
                </div> 
              </div>
            </div>

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla2"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX2()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar2()"><span class="fa fa-times"></span> Eliminar Dx</button>
<?php 
# Con este tenemos ya un array de 3 posiciones. Segun el ejemplo.
$explode = explode(",,",$reg[0]['dxdefinitivo']);

# Recorremos el array para despues separar en 3 variables lo que se requiere.
for($cont=0; $cont<COUNT($explode); $cont++):
  # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
  //list($presuntivo.$cont,$codigo.$cont,$observaciones.$cont) = explode("/",$explode[$cont]);
  list($definitivo,$idciedefinitivo,$observaciondefinitivo) = explode("/",$explode[$cont]);
?>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Definitivo: <span class="symbol required"></span></label> 
<input name="idciedefinitivo[]" type="hidden" class="form-control" id="idciedefinitivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" value="<?php echo $idciedefinitivo; ?>" required="required"/>

<input type="text" id="definitivo" name="definitivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" value="<?php echo $definitivo; ?>" readonly="readonly" required="" aria-required="true">

<textarea name="observaciondefinitivo[]" class="form-control" id="observaciondefinitivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Definitivo" title="Ingrese Observación de Dx Definitivo" rows="2" required="" aria-required="true"><?php echo $observaciondefinitivo; ?></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div><?php endfor; ?> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Conducta o Plan de Tratamiento: <span class="symbol required"></span></label> 
<textarea name="tratamiento" class="form-control" id="tratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Conducta o Plan de Tratamiento del Paciente" rows="3" required="" aria-required="true"><?php echo $reg[0]['tratamiento']; ?></textarea>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Fórmulas y Órdenes Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>
<?php 
if($reg[0]['formulas']==""){ ?>

                  <div class="form-group"> 
  <input type="hidden" id="formula" name="formula[]">
  <input type="hidden" id="formulamedica" name="formulamedica[]">
  <input type="hidden" id="idcieformula" name="idcieformula[]">
                  </div>

<?php } else {
 
# Con este tenemos ya un array de 3 posiciones. Segun el ejemplo, este es el codigo del presuntivo que se muestra, esa es la variable q obtengo de la bd, es decir aqui se muestra todo bien, ahora vamos a actualiar y vera, es este el q estoy trabajando, dale amigo
 
$explode = explode(",,",$reg[0]['formulas']);

# Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
for($cont=0; $cont<COUNT($explode); $cont++):
  # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
  list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);
?>

                <div class="form-group has-feedback"> 
        <label class="control-label">Nombre de Dx para Fórmula Médica: <span class="symbol required"></span></label> 
<input name="idcieformula[]" type="hidden" class="form-control" id="idcieformula" onKeyUp="this.value=this.value.toUpperCase()" value="<?php echo $idcieformula; ?>" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/>

<input type="text" id="formula" name="formula[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" title="Ingrese Nombre de Dx" value="<?php echo $codcie.": ".$nombrecie; ?>" readonly="readonly" required="" aria-required="true">

<textarea name="formulamedica[]" class="form-control" id="formulamedica" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Fórmula Médica" title="Ingrese Observación de Fórmula Médica" rows="2" required="" aria-required="true"><?php echo $formulamedica; ?></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
                         <?php endfor; } ?>
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
               </div> 
           </div>

         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>
<?php 
if($reg[0]['ordenes']==""){ ?>

                  <div class="form-group"> 
  <input type="hidden" id="orden" name="ordenes[]">
  <input type="hidden" id="ordenmedica" name="ordenmedica[]">
  <input type="hidden" id="idcieorden" name="idcieorden[]">
                  </div>

<?php } else {
 
# Con este tenemos ya un array de 3 posiciones. Segun el ejemplo, este es el codigo del presuntivo que se muestra, esa es la variable q obtengo de la bd, es decir aqui se muestra todo bien, ahora vamos a actualiar y vera, es este el q estoy trabajando, dale amigo
 
$explode = explode(",,",$reg[0]['ordenes']);

# Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
for($cont=0; $cont<COUNT($explode); $cont++):
  # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
  list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);
?> 

                <div class="form-group has-feedback"> 
        <label class="control-label">Nombre de Dx para Orden Médica: <span class="symbol required"></span></label> 
<input name="idcieorden[]" type="hidden" class="form-control" id="idcieorden" onKeyUp="this.value=this.value.toUpperCase()" value="<?php echo $idcieorden; ?>" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/>

<input type="text" id="ordenes" name="ordenes[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" title="Ingrese Nombre de Dx" value="<?php echo $codcie." : ".$nombrecie; ?>" readonly="readonly" required="" aria-required="true">

<textarea name="ordenmedica[]" class="form-control" id="ordenmedica" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Orden Médica" title="Ingrese Observación de Orden Médica" rows="2" required="" aria-required="true"><?php echo $ordenmedica; ?></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
                         <?php endfor; } ?>
           </div></td>
    </tr><input type="hidden" name="var_cont">
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<?php 
if($reg[0]['remision']==""){ ?>

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Desea Realizar Remisión: <span class="symbol required"></span></label> 
<input id="boton" onClick="mostrar();" style="cursor: pointer;" class="btn btn-info" value="SI" type="button"> 
        <div id="remision" style="display: none;" align="center">
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
        </div> 
                </div> 
              </div>
            </div>

<?php } else {  ?>

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Remisión de Paciente: <span class="symbol required"></span></label>  
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"><?php echo $reg[0]['remision']; ?></textarea>
                        <i class="fa fa-phone form-control-feedback"></i>
                </div> 
              </div>
            </div>
<?php } ?><br> 
        
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