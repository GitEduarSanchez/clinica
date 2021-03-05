<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->PlantillaEcografiaPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->AsignarPlantillaEcografia();
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Asignación de Plantillas Ecográficas</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="plantillasgineologia">Control</a></li>
<li class="active">Asignación de Plantillas</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos de Plantillas Ecográficas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<div class="row"> 
                 
              <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Código de Plantilla: <span class="symbol required"></span></label> 
<input type="hidden" name="idplantillaecografia" id="idplantillaecografia" <?php if (isset($reg[0]['idplantillaecografia'])) { ?> value="<?php echo $reg[0]['idplantillaecografia']; ?>"<?php } ?>>
<input type="text" class="form-control" name="codplantillaecografia" id="codplantillaecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Código de Plantilla" <?php if (isset($reg[0]['codplantillaecografia'])) { ?> value="<?php echo $reg[0]['codplantillaecografia']; ?>" <?php } ?> tabindex="1" readonly="readonly">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div> 

              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombre de Plantilla: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="nombreplantillaecografia" id="nombreplantillaecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Plantilla" <?php if (isset($reg[0]['nombreplantillaecografia'])) { ?> value="<?php echo $reg[0]['nombreplantillaecografia']; ?>"<?php } ?> readonly="readonly">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-6"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Procedimientos: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="procedimientoecografia" id="procedimientoecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Procedimientos" <?php if (isset($reg[0]['procedimientoecografia'])) { ?> value="<?php echo $reg[0]['procedimientoecografia']; ?>"<?php } ?> readonly="readonly">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                    </div>


          <div class="row"> 
                              
              <div class="col-md-12"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Descripción Plantilla Ecografica: <span class="symbol required"></span></label> 
 <textarea name="descripcionecografia" class="form-control" id="descripcionecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion de Plantilla Ecográfica" rows="10" readonly="readonly"><?php if (isset($reg[0]['descripcionecografia'])) { ?><?php echo $reg[0]['descripcionecografia']; ?><?php } ?></textarea>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Plantillas Ecográficas Asignadas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<div id="delete-ok" style="display:none;">&nbsp;</div>                                 
 <div id="asignacionplantillaecografia"> <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
$rog = $tro->MostrarPlantillasEcografiaAsignadas();

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
 <a class="btn btn-danger btn-xs" title="Eliminar" onClick="EliminarPlantillaG('<?php echo base64_encode($rog[$i]["codasigplantilla"]); ?>','<?php echo base64_encode($rog[$i]["codplantilla"]); ?>','<?php echo base64_encode("ASIGNACIONPLANTILLASECOGRAFICAS") ?>')"><i class="fa fa-trash-o"></i></a></div>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Asignación de Plantillas Ecográficas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<form name="asignarplantillaecografia" id="asignarplantillaecografia" method="post" data-id="<?php echo $reg[0]['codplantillaecografia']; ?>" action="#">
                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                     </div> 
             


       <div class="row">  
        <div class="col-md-12"> 
         <div class="form-group has-feedback"> 
          <label class="control-label">Seleccione Médico: <span class="symbol required"></span></label> 
          <input type="hidden" name="codplantillaecografia" id="codplantillaecografia" value="<?php echo $reg[0]['codplantillaecografia']; ?>">
          <select name="codmedico" id="codmedico" class='form-control' required="" aria-required="true">
           <option value="">SELECCIONE MEDICO PARA TU BUSQUEDA</option>
           <?php
           $med = new Login();
           $med = $med->ListarMedicosEspecialidadGinecologia();
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

        <!-- jQuery  
        <script src="assets/js/jquery.min.js"></script>-->
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

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <!-- jQuery  -->
        <script src="assets/pages/jquery.todo.js"></script>
        
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