<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="tecnico") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->PlantillaLecturarxPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->AsignarPlantillaLecturarx();
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Asignación de Plantillas Lectura Rx</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="plantillasradiologia">Control</a></li>
<li class="active">Asignación de Plantillas</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="asignarplantillalecturarx" id="asignarplantillalecturarx" method="post" data-id="<?php echo $reg[0]["codplantillalecturarx"] ?>" action="#"> 
      

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Plantillas Lectura Rx</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

                                                  <div class="row"> 
                 
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Código de Plantilla: <span class="symbol required"></span></label> 
<input type="hidden" name="idplantillalecturarx" id="idplantillalecturarx" <?php if (isset($reg[0]['idplantillalecturarx'])) { ?> value="<?php echo $reg[0]['idplantillalecturarx']; ?>"<?php } ?>>
<input type="text" class="form-control" name="codplantillalecturarx" id="codplantillalecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Código de Plantilla" <?php if (isset($reg[0]['codplantillalecturarx'])) { ?> value="<?php echo $reg[0]['codplantillalecturarx']; ?>" <?php } ?> tabindex="1" readonly="readonly">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div> 

              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Plantilla: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="nombreplantillalecturarx" id="nombreplantillalecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Plantilla" <?php if (isset($reg[0]['nombreplantillalecturarx'])) { ?> value="<?php echo $reg[0]['nombreplantillalecturarx']; ?>"<?php } ?> readonly="readonly">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-5"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Procedimientos: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="procedimientolecturarx" id="procedimientolecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Procedimientos" <?php if (isset($reg[0]['procedimientolecturarx'])) { ?> value="<?php echo $reg[0]['procedimientolecturarx']; ?>"<?php } ?> readonly="readonly">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                    </div>


          <div class="row"> 
                              
              <div class="col-md-12"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Descripción Plantilla Radiologica: <span class="symbol required"></span></label> 
 <textarea name="descripcionlecturarx" class="form-control" id="descripcionlecturarx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion de Plantilla Radiologica" rows="10" readonly="readonly"><?php if (isset($reg[0]['descripcionlecturarx'])) { ?><?php echo $reg[0]['descripcionlecturarx']; ?><?php } ?></textarea>
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>  
             </div><br>


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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Plantillas Lectura Rx Asignadas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<div id="delete-ok" style="display:none;">&nbsp;</div>                                 
 <div id="asignacionplantillalecturarx"> <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombres de Médicos</th>
                                                    <th>Especialidad</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$tro = new Login();
$rog = $tro->MostrarPlantillasLecturarxAsignadas();

if($rog==""){

    echo "";      
    
} else {
 
for($i=0;$i<sizeof($rog);$i++){  
?>
                                                <tr>
            <td><div align="center"><?php echo $rog[$i]['cedmedico']; ?></div></td>
            <td><div align="center"><?php echo $rog[$i]['nommedico']." ".$rog[$i]['apemedico']; ?></div></td>
            <td><div align="center"><?php echo $rog[$i]['especmedico']; ?></div></td>
                          <td class="actions"><div align="center">
 <a class="btn btn-danger btn-xs" title="Eliminar" onClick="EliminarPlantillaL('<?php echo base64_encode($rog[$i]["codasigplantilla"]); ?>','<?php echo base64_encode($rog[$i]["codplantilla"]); ?>','<?php echo base64_encode("ASIGNACIONPLANTILLASLECTURARX") ?>')"><i class="fa fa-trash-o"></i></a></div>
                                            </td>
                                                </tr>
                        <?php } } ?>
                                            </tbody>
                                        </table></div>

          
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Asignación de Plantillas Lectura Rx</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                     </div>
  
      <div class="row">  
        <div class="col-md-12"> 
         <div class="form-group has-feedback"> 
          <label class="control-label">Seleccione Médico: <span class="symbol required"></span></label> 
          <input type="hidden" name="codplantillalecturarx" id="codplantillalecturarx" value="<?php echo $reg[0]['codplantillalecturarx']; ?>">
          <select name="codmedico" id="codmedico" class='form-control' required="" aria-required="true">
           <option value="">SELECCIONE MEDICO PARA TU BUSQUEDA</option>
           <?php
           $med = new Login();
           $med = $med->ListarMedicosEspecialidadRadiologo();
           for($i=0;$i<sizeof($med);$i++){
            ?> 
            <option value="<?php echo $med[$i]['codmedico']; ?>"><?php echo $med[$i]['cedmedico']."  -  ".$med[$i]['nommedico']." ".$med[$i]['apemedico']."  -  ".$med[$i]['especmedico']; ?></option>
          <?php } ?>
        </select>  
      </div> 
    </div> 

  </div><br> 
        
            <div class="modal-footer">        
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><i class="fa fa-play"></i> Asignar</button>
<button class="btn btn-danger" type="reset"><i class="fa fa-trash-o"></i> Cancelar</button> 
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