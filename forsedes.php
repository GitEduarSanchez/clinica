<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

if(isset($_POST['btn-submit']))
{
$reg = $tra->RegistrarSedes();
exit;
} 
else if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarSedes();
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
<!-- Custom file upload -->
<script src="assets/plugins/fileupload/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="assets/script/jquery.mask.js"></script>
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/script/script2.js"></script>
<script type="text/javascript" src="assets/script/jscalendario.js"></script>
<script type="text/javascript" src="assets/script/validation.min.js"></script>
<script type="text/javascript" src="assets/script/script.js"></script>
<script type="text/javascript">
    jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-zA-ZñÑáéíóúÁÉÍÓÚ,. ]+$/i.test(value);
    });
</script>
<!-- script jquery -->

<!-- Calendario -->
<link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
<script src="assets/calendario/jquery-ui.js"></script>
<script type="text/javascript" src="assets/script/jscalendario.js"></script>
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Gestión de Sedes</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="sedes">Control</a></li>
<li class="active">Gestión de Sedes</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Gestión de Sedes</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12"> 
            <div class="box-body">
      
<?php  if (isset($_GET['codsede'])) {
      
      $reg = $tra->SedesPorId(); ?>
      
<form class="form" name="updatesedes" id="updatesedes" method="post" data-id="<?php echo $reg[0]["codsede"] ?>" action="#">
        
    <?php } else { ?>
        
<form class="form" method="post"  action="#" name="sedes" id="sedes"> 
      
    <?php } ?>
                                              <div id="error">
                                              <!-- error will be shown here ! -->
                                              </div>
                        
        <div class="row"> 
                            
                <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Nombre de Sucursal: <span class="symbol required"></span></label> 
 <input type="hidden" name="codsede" id="codsede" <?php if (isset($reg[0]['codsede'])) { ?> value="<?php echo $reg[0]['codsede']; ?>"<?php } ?>>
                 <?php if (isset($reg[0]['codsucursal'])) { ?>
<select name="codsucursal" id="codsucursal" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
          <?php
              $su = new Login();
                    $su = $su->ListarSucursal();
                    for($i=0;$i<sizeof($su);$i++){
                  ?>
<option value="<?php echo $su[$i]['codsucursal'] ?>"<?php if ($su[$i]['codsucursal'] == $reg[0]['codsucursal']) { ?> selected="selected" <?php } ?>><?php echo $su[$i]['nombresucursal'] ?></option>      
                      <?php 
  }
?>
                      </select>
                             <?php } else { ?>  
 <select name="codsucursal" id="codsucursal" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
          <?php
              $su = new Login();
                    $su = $su->ListarSucursal();
                    for($i=0;$i<sizeof($su);$i++){
                  ?>
<option value="<?php echo $su[$i]['codsucursal'] ?>"><?php echo $su[$i]['nombresucursal'] ?></option>       
                      <?php 
  }
?>
                      </select>
                              <?php } ?>
                              </div> 
                        </div> 
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Sede: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="nombresede" id="nombresede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Sede" <?php if (isset($reg[0]['nombresede'])) { ?> value="<?php echo $reg[0]['nombresede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Dirección de Sede: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="direccionsede" id="direccionsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dirección de Sede" <?php if (isset($reg[0]['direccionsede'])) { ?> value="<?php echo $reg[0]['direccionsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                    </div>


          <div class="row">  
                            <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Provincia: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['departamentosede'])) { ?>
<select name="departamentosede" id="departamentosede" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
          <?php
              $de = new Login();
                    $de = $de->ListarDepartamentos();
                    for($i=0;$i<sizeof($de);$i++){
                  ?>
<option value="<?php echo $de[$i]['id'] ?>"<?php if ($de[$i]['id'] == $reg[0]['departamentosede']) { ?> selected="selected" <?php } ?>><?php echo $de[$i]['nombre'] ?></option>         
                      <?php 
  }
############################# FIN DE BUSQUEDA DE DEPARTAMENTOS ######################################
?>
                      </select>
                             <?php } else { ?>  
 <select name="departamentosede" id="departamentosede" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
          <?php
              $de = new Login();
                    $de = $de->ListarDepartamentos();
                    for($i=0;$i<sizeof($de);$i++){
                  ?>
<option value="<?php echo $de[$i]['id'] ?>"><?php echo $de[$i]['nombre'] ?></option>        
                      <?php 
  }
############################# FIN DE BUSQUEDA DE DEPARTAMENTOS ######################################
?>
                      </select>
                              <?php } ?>
                              </div> 
                        </div> 
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Ciudad de Sede: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="ciudadsede" id="ciudadsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Ciudad de Sede" <?php if (isset($reg[0]['ciudadsede'])) { ?> value="<?php echo $reg[0]['ciudadsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div> 

                            <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Correo de Sede: <span class="symbol required"></span></label> 
 <input type="text" class="form-control" name="emailsede" id="emailsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Correo de Sede" <?php if (isset($reg[0]['emailsede'])) { ?> value="<?php echo $reg[0]['emailsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-envelope-o form-control-feedback"></i>  
                              </div> 
                        </div>  
             </div>  
          

          <div class="row"> 
                              
              <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="telefonosede" id="telefonosede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Teléfono" <?php if (isset($reg[0]['telefonosede'])) { ?> value="<?php echo $reg[0]['telefonosede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i>  
                              </div> 
                    </div>
                           
                           <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Identificación Director: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="identdirecsede" id="identdirecsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Identificación Director" <?php if (isset($reg[0]['identdirecsede'])) { ?> value="<?php echo $reg[0]['identdirecsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                    </div>
                              
             <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Nombre de Director: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="nomdirecsede" id="nomdirecsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Director" <?php if (isset($reg[0]['nomdirecsede'])) { ?> value="<?php echo $reg[0]['nomdirecsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                    </div> 
             </div>  
          

          <div class="row">  

            <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Apellido de Director: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="apedirecsede" id="apedirecsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Apellido de Director" <?php if (isset($reg[0]['apedirecsede'])) { ?> value="<?php echo $reg[0]['apedirecsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                    </div>
                              
             <div class="col-md-4"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Teléfono de Director: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="telefdirecsede" id="telefdirecsede" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Teléfono de Director" <?php if (isset($reg[0]['telefdirecsede'])) { ?> value="<?php echo $reg[0]['telefdirecsede']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i>  
                              </div> 
                    </div> 
          </div><br>
        
            <div class="modal-footer"> 
<?php  if (isset($_GET['codsede'])) { ?>
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
<button class="btn btn-danger" type="reset"><i class="fa fa-trash-o"></i> Cancelar</button> 
    <?php } else { ?>
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger" type="reset"><i class="fa fa-trash-o"></i> Limpiar</button>
    <?php } ?>   
                          </div>
                                </form>
                                    </div><!-- /.box-body -->
                </div>
                          </div>
                     </div>
                </div>
           </div>
       </div>
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