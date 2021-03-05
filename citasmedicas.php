<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="tecnico") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarCitasMedicas();
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


  <!-- sample modal content -->
<div id="panel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog">
                                                <div class="modal-content p-0 b-0">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button> 
             <h3 class="panel-title"><i class="fa fa-align-justify"></i> Datos de Cita Médica</h3> 
                                                        </div> 
                                                        <div class="panel-body"> 
                                                         <div id="muestracitasmedicasmodal"></div>
                                                        </div>
                                                     <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times-circle"></span> Aceptar</button>
                  </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


<!-- Modal para mostrar detalles del producto-->
<div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content p-0 b-0">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button> 
<h3 class="panel-title"><i class="fa fa-align-justify"></i> Actualizar Cita Médica</h3> 
                                                        </div> 
                                        
  <form class="form" name="updatecita" id="updatecita" method="post" action="#">
          <div class="panel-body">
            <div id="error">
              <!-- error will be shown here ! -->
            </div>
           
           <div class="row">

           <div class="col-md-3"> 
             <div class="form-group has-feedback">
              <label class="control-label">Nº de Identificación:</label> 
<input type="hidden" name="codcita" id="codcita"> 
<input type="hidden" name="codpaciente" id="codpaciente">
<input type="hidden" name="medico" id="medico">
<input type="hidden" name="desde2" id="desde2">
<input type="hidden" name="hasta2" id="hasta2">
<input class="form-control" type="text" name="cedpaciente" id="cedpaciente" disabled="disabled"> 
                        <i class="fa fa-flash form-control-feedback"></i>
            </div> 
          </div> 

          <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
              <label class="control-label">Nombres:</label> 
<input class="form-control" type="text" name="pnompaciente" id="pnompaciente" disabled="disabled"> 
                        <i class="fa fa-pencil form-control-feedback"></i>
            </div> 
          </div> 

          <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Apellidos:</label> 
<input class="form-control" type="text" name="papepaciente" id="papepaciente" disabled="disabled">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                 </div> 
          </div> 


          <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Fecha de Nacimiento:</label> 
<input class="form-control" type="text" name="fnacpaciente" id="fnacpaciente" disabled="disabled">
                        <i class="fa fa-calendar form-control-feedback"></i>                                                               
                   </div> 
            </div>
        </div>

            <div class="row"> 

          <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Eps:</label> 
<input class="form-control" type="text" name="eps" id="eps" disabled="disabled">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                  </div> 
            </div>

          <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Grupo Sanguineo:</label> 
<input class="form-control" type="text" name="gruposapaciente" id="gruposapaciente" disabled="disabled">
                        <i class="fa fa-pencil form-control-feedback"></i>
                </div> 
          </div>

          <div class="col-md-2"> 
            <div class="form-group has-feedback"> 
              <label class="control-label">Nº de Teléfono:</label> 
<input class="form-control" type="text" name="tlfpaciente" id="tlfpaciente" disabled="disabled"> 
                        <i class="fa fa-phone form-control-feedback"></i>
            </div> 
          </div> 

          <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Seleccione Médico: <span class="symbol required"></span></label> 
<select name="codmedico" id="codmedico" onchange="VerBotonMedico();" class='form-control' required="" aria-required="true">
             <option value="">SELECCIONE MEDICO</option>
             <?php
             $med = new Login();
             $med = $med->ListarMedicos();
             for($i=0;$i<sizeof($med);$i++){
              ?> 
<option value="<?php echo $med[$i]['codmedico']; ?>"><?php echo $med[$i]['cedmedico']."  -  ".$med[$i]['nommedico']." ".$med[$i]['apemedico']."  -  ".$med[$i]['especmedico']; ?></option>
            <?php } ?>
          </select>
        </div> 
      </div>

      <div class="col-md-2"> 
        <div class="form-group has-feedback"> 
          <label class="control-label"></label> 
          <div id="muestracitas">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-placement="left" data-backdrop="static" data-keyboard="false" data-id="" rel="tooltip" title="Ver" onClick="BotonCitasModal(document.getElementById('codmedico').value)"><span class="fa fa-eye"></span> Ver Citas</button><input type="hidden" name="especialidad" id="especialidad"></div>
        </div> 
      </div> 
  </div>

    <hr>

     <div class="row">

           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <label class="control-label">Motivo de Cita Médica: <span class="symbol required"></span></label> 
<textarea name="motivocita" class="form-control" id="motivocita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Cita Medica o Dato Clinico para Lectura Rx" rows="3" required="" aria-required="true">SIN DESCRIPCION</textarea> 
                        <i class="fa fa-pencil form-control-feedback"></i>
               </div> 
           </div>

         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <label class="control-label">Observaciones de Cita Médica: <span class="symbol required"></span></label> 
<textarea name="observacionescita" class="form-control" id="observacionescita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observaciones de Cita Medica o Tipo de Estudio para Lectura Rx" rows="3" required="" aria-required="true">SIN OBSERVACIONES</textarea>
                        <i class="fa fa-comment form-control-feedback"></i>
                 </div> 
            </div> 
       </div>

       <div class="row"> 

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">Fecha de Cita: <span class="symbol required"></span></label> 
 <input class="form-control calendario" type="text" name="fechacita" id="fechacita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Hora de Cita:</label> 
<input class="form-control" type="text" name="hour" id="hour" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-clock-o form-control-feedback"></i>
                             </div>  
                       </div>

        <div class="col-md-3"> 
               <div class="form-group has-feedback"> 
                 <label class="control-label">Sucursal: <span class="symbol required"></span></label> 
 <select name="codsucursal" id="codsucursal" class='form-control' onChange="CargaSedes(this.form.codsucursal.value);" required="" aria-required="true">
             <option value="">SELECCIONE </option>
      <?php
      $su = new Login();
      $su = $su->ListarSucursal();
      for($i=0;$i<sizeof($su);$i++){
                  ?> 
<option value="<?php echo base64_encode($su[$i]['codsucursal']); ?>"><?php echo $su[$i]['nombresucursal']; ?></option>
               <?php } ?>
              </select>
                       </div>  
               </div>

 <div class="col-md-3"> 
   <div class="form-group has-feedback"> 
    <label class="control-label">Sedes: <span class="symbol required"></span></label> 
<div id="sede"><select name="codsede" id="codsede" class='form-control'>
             <option value="">SELECCIONE</option>
      <?php
      $se = new Login();
      $se = $se->ListarSedes();
      for($i=0;$i<sizeof($se);$i++){
                  ?> 
<option value="<?php echo $se[$i]['codsede']; ?>"><?php echo $se[$i]['nombresede']; ?></option>
               <?php } ?>
            </select></div>
                    </div>  
          </div>
     </div>

     <div class="row"> 

       <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Status de Cita:</label> 
<select name="statuscita" id="statuscita" class='form-control' required="" aria-required="true">
             <option value="">SELECCIONE</option>
<option value="EN PROCESO">EN PROCESO</option>
<option value="CANCELADA">CANCELADA</option>
            </select>
                             </div>  
                       </div>

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">Necesita Lectura RX: <span class="symbol required"></span></label> 
 <select name="lectura" id="lectura" class='form-control' required="" aria-required="true">
             <option value="">SELECCIONE</option>
       <option value="SI">SI</option>
       <option value="NO">NO</option>
      </select>
                                 </div> 
                        </div>
     </div><br>

  </div>
  <div class="modal-footer">
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
<button class="btn btn-danger" type="reset" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-trash-o"></i> Cerrar</button>
  </div></form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                    



    <!-- Modal para mostrar detalles del producto-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content p-0 b-0">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button> 
<h3 class="panel-title"><i class="fa fa-align-justify"></i> Citas Registradas</h3> 
                                                        </div> 
                                                        <div class="panel-body"> 
                                                <div id="muestracitasmedicosmodal"></div>
                                                        </div>
                                                     <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-times-circle"></span> Aceptar</button>
                  </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->


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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Control de Citas Médicas</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li class="active">Control de Citas Médicas</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
        
<form class="form" method="post"  action="#" name="citasmedicas" id="citasmedicas"> 
      

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Control de Citas Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
                                        
                                          <div id="delete-ok"></div>
                                          <div id="cancela-ok"></div> 
                                
    <div class="row"> 


  <div class="col-md-6"> 
   <div class="form-group"> 
    <label class="control-label">Seleccione Médico: <span class="symbol required"></span></label> 
    <select name="codmedico" id="codmedico" class='form-control' required="" aria-required="true">
     <option value="">SELECCIONE MEDICO</option>
     <?php
     $med = new Login();
     $med = $med->ListarMedicos();
     for($i=0;$i<sizeof($med);$i++){
      ?> 
      <option value="<?php echo base64_encode($med[$i]['codmedico']) ?>"><?php echo $med[$i]['cedmedico']."  -  ".$med[$i]['nommedico']." ".$med[$i]['apemedico']."  -  ".$med[$i]['especmedico']; ?></option>
    <?php } ?>
  </select>
  </div> 
</div>

      <div class="col-md-3"> 
       <div class="form-group has-feedback"> 
        <label class="control-label">Búsqueda Fecha Desde: <span class="symbol required"></span></label> 
        <input class="form-control" type="text" name="desde" id="desde" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha Desde" required="" aria-required="true">
        <i class="fa fa-calendar form-control-feedback"></i> 
      </div> 
    </div>
    <div class="col-md-3"> 
     <div class="form-group has-feedback"> 
      <label class="control-label">Búsqueda Fecha Hasta: <span class="symbol required"></span></label> 
      <input class="form-control" type="text" name="hasta" id="hasta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha Hasta" required="" aria-required="true">
      <i class="fa fa-calendar form-control-feedback"></i> 
    </div> 
  </div>
</div><br> 
        
            <div class="modal-footer"> 
<button type="button" onClick="BuscaCitasMedicas()" class="btn btn-primary"><span class="fa fa-search"></span> Realizar Búsqueda</button>
                          </div>

                    </div><!-- /.box-body -->
                </div>
                          </div>
                     </div>
              </div>
       </div>
</div>
         <div id="muestracitasmedicas"></div>

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
    
    <script>

$('body').on('focus',".calendario", function(){
    $(this).datepicker({
 closeText: 'Cerrar',
 prevText: '<Anterior',
 nextText: 'Siguiente>',
 currentText: 'Hoy',
 monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNames: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 weekHeader: 'Sm',
 dateFormat: 'yy-mm-dd',
 minDate: "0",
 //maxDate: "+2M, -10D",
 changeMonth: true,
 changeYear: true
                         });
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