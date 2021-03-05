<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="tecnico") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

if(isset($_POST['btn-submit']))
{
$reg = $tra->RegistrarPlantillaLecturarx();
exit;
} 
else if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarPlantillaLecturarx();
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
   
   <li class="hidden-xs"> 
   <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-crosshairs"></i></a>   </li>
   <li class="dropdown"> 
   <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">

  <span class="dropdown hidden-xs"><abbr title="<?php echo $_SESSION['x']; ?>"><?php echo $_SESSION['ingreso']; ?></abbr> </span>
   <?php
  if (isset($_SESSION['cedula'])) {
  if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
    echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-circle'>"; 
}else{
    echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
} } else {
  echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
}
?> </a>
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
  if (isset($_SESSION['cedula'])) {
  if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
    echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-circle'>"; 
}else{
    echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
} } else {
  echo "<img src='fotos/avatar.jpg' class='img-circle'>"; 
}
?></div>
   <div class="user-info">
   <div class="dropdown"> 
   <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo estado($_SESSION['acceso']); ?></a>
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Gestión de Plantillas Lectura Rx</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="plantillasraiologia">Control</a></li>
<li class="active">Gestión de Plantillas</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
        
<?php  if (isset($_GET['codplantillalecturarx'])) {
      
      $reg = $tra->PlantillaLecturarxPorId(); ?>
      
<form class="form" name="updateplantillalecturarx" id="updateplantillalecturarx" method="post" data-id="<?php echo $reg[0]["codplantillalecturarx"] ?>" action="#">
        
    <?php } else { ?>
        
<form class="form" method="post"  action="#" name="plantillalecturarx" id="plantillalecturarx"> 
      
    <?php } ?> 
      
<?php  if (!isset($_GET['codplantillalecturarx'])) { ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-search"></i> Médicos Radiologos</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
                                                                              
<div id="di"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
<th><div class="checkbox checkbox-primary"><input id="checkTodos" type="checkbox"><label for="checkTodos"></label></div></th>
                                                    <th>Nº</th>
                                                    <th>Nº de Identificación</th>
                                                    <th>Nombres de Médicos</th>
                                                    <th>Especialidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$tro = new Login();
$rog = $tro->ListarMedicosEspecialidadRadiologo();

if($rog==""){

    echo "";      
    
} else {
$e=1;
for($i=0;$i<sizeof($rog);$i++){  
?>
                                                <tr>
<td><div class="checkbox checkbox-primary"><input type="checkbox" name="codmedico[]" id="codmedico" value="<?php echo $rog[$i]['codmedico']; ?>" /><label for="codmedico"></label></div></td>
            <td><div align="center"><?php echo $e++; ?></div></td>
            <td><div align="center"><?php echo $rog[$i]['cedmedico']; ?></div></td>
            <td><div align="center"><?php echo $rog[$i]['nommedico']." ".$rog[$i]['apemedico']; ?></div></td>
            <td><div align="center"><?php echo $rog[$i]['especmedico']; ?></div></td>
                                                </td>
                                                </tr>
                        <?php } } ?>
                                            </tbody>
                                   </table>    </div>
                                          </div>
                                      </div><!-- /.box-body -->
                               </div>
                          </div>
                     </div>
              </div>
       </div>
</div>

<?php } ?> 

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Gestión de Plantillas Lectura Rx
</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                  </div> 
             
       <div class="row"> 

<input type="hidden" name="idplantillalecturarx" id="idplantillalecturarx" <?php if (isset($reg[0]['idplantillalecturarx'])) { ?> value="<?php echo $reg[0]['idplantillalecturarx']; ?>"<?php } ?>>
<input type="hidden" name="codplantillalecturarx" id="codplantillalecturarx" <?php if (isset($reg[0]['codplantillalecturarx'])) { ?> value="<?php echo $reg[0]['codplantillalecturarx']; ?>"<?php } ?>>

         <?php if (isset($reg[0]['idplantillalecturarx'])) { ?>


              <div class="col-md-5"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Plantilla: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="nombreplantillalecturarx" id="nombreplantillalecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Plantilla" <?php if (isset($reg[0]['nombreplantillalecturarx'])) { ?> value="<?php echo $reg[0]['nombreplantillalecturarx']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>

           <?php } else { ?>             
                            
                              
              <div class="col-md-5"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Plantilla: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="nombreplantillalecturarx" id="nombreplantillalecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Plantilla" <?php if (isset($reg[0]['nombreplantillalecturarx'])) { ?> value="<?php echo $reg[0]['nombreplantillalecturarx']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
              <?php } ?>
                              
              <div class="col-md-7"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Procedimientos: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="procedimientolecturarx" id="procedimientolecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Procedimientos" <?php if (isset($reg[0]['procedimientolecturarx'])) { ?> value="<?php echo $reg[0]['procedimientolecturarx']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                    </div>


          <div class="row"> 
                              
              <div class="col-md-12"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Descripción Plantilla Radiologicas: <span class="symbol required"></span></label> 
 <textarea name="descripcionlecturarx" class="form-control" id="descripcionlecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripción de Plantilla Lectura Rx" rows="10" required="" aria-required="true"><?php if (isset($reg[0]['descripcionlecturarx'])) { ?><?php echo $reg[0]['descripcionlecturarx']; ?><?php } ?></textarea>
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>  
             </div><br> 
        
           <div class="modal-footer"> 
<?php  if (isset($_GET['codplantillalecturarx'])) { ?>
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
        <script src="assets/pages/jquery.dashboard.js"></script>
        <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>

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