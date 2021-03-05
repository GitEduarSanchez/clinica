<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION['acceso'] == "ginecologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

$reg = $tra->EcografiaPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarEcografia();
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
        
<!--bootstrap-wysihtml5-->
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
<link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
<!--venobox lightbox-->
<link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css">
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


  <!-- Modal para mostrar detalles del producto-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content p-0 b-0">
                                                    <div class="panel panel-color panel-primary">
                                                        <div class="panel-heading"> 
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="assets/images/close.png"/></button> 
<h3 class="panel-title"><i class="fa fa-align-justify"></i> Plantillas Ecográficas</h3> 
                                                        </div> 
                                                        <div class="panel-body"> 
                                                         <div id="muestraplantillaecograficamodal"></div>
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Ecografías</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="ecografías">Control</a></li>
<li class="active">Gestión de Ecografías</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<form class="form" name="updateecografia" id="updateecografia" method="post" data-id="<?php echo $reg[0]["codecografia"] ?>" action="#" onSubmit="asigna()"> 
      

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
             
<input name="codecografia" type="hidden" id="codecografia" value="<?php echo $reg[0]['codecografia']; ?>" />
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Procedimientos <label id="nombreplantillaecografia" name="nombreplantillaecografia"></label> para Ecografía</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

<div class="row"> 

  <div class="col-md-9"> 
    <div class="form-group has-feedback"> 
      <label class="control-label">Procedimiento Ecográfico: <span class="symbol required"></span></label> 
      <input type="text" class="form-control" name="procedimientoecografia" id="procedimientoecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Procedimiento Ecográfico" value="<?php echo $reg[0]['procedimiento']; ?>" required="" aria-required="true">
      <i class="fa fa-pencil form-control-feedback"></i>  
    </div> 
  </div>

  <div class="col-md-3">
    <div class="form-group has-feedback"> <br>             
      <button type="button" class="btn btn-info waves-effect waves-light w-xs m-b-5" data-href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-placement="left" data-backdrop="static" data-keyboard="false" data-id="" rel="tooltip" title="Ver" onClick="BuscaPlantillaEcografia('<?php echo $reg[0]["codmedico"] ?>')"><span class="fa fa-paste"></span> Usar Plantilla Ecográfica</button>
    </div>
  </div>


</div>


<div class="row">
 <div class="col-md-12"> 
   <div class="form-group has-feedback">
    <label class="control-label">Descripción Ecográfica: <span class="symbol required"></span></label> 
    <textarea name="observacionecografia" class="form-control" id="observacionecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripción Ecográfica" rows="14" required="" aria-required="true"><?php echo htmlspecialchars($reg[0]['observacionecografia']); ?></textarea> 
    <i class="fa fa-comment form-control-feedback"></i>
  </div> 
</div>
</div> 


<div class="row">

<div class="col-md-12">
  <div class="form-group">


    <table width="100%" id="tabla">
     <tr>
       <td><div class="col-md-12">  
        <button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Imagen</button>
        <button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Imagen</button>


        <div class="form-group"> 
         <label class="control-label">Imagen de Ecografia: <span class="symbol required"></span></label>

         <input type="file" class="btn btn-default btn-file" data-original-title="Subir Ecografias" data-rel="tooltip" placeholder="Suba su Ecografia" name="file[]" id="file">
         <small><p style="font-size:10px">Realice la Búsqueda de la Ecografia:<br> * La Imagen debe ser extension.jpeg,jpg,png,gif<br> * La imagen no debe ser mayor de 200 KB</p></small>
       </div>
     </div></td>
   </tr><input type="hidden" name="var_cont">
 </table>

      </div>
    </div>    
</div>     


<div class="row">
                                                         
<?php
$directory="fotos/".$reg[0]['codecografia'];
if (is_dir($directory)) {
$dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {
           
    if (substr_count($archivo , ".gif")==1 || substr_count($archivo , ".jpg")==1 || substr_count($archivo , ".png")==1 ){
    
//echo '<div class="portfolioContainer">';
echo '<div class="col-sm-2 col-lg-2 col-md-2 webdesign illustrator">';
  echo '<div class="gal-detail thumb">';
      echo '<a href="'.$directory."/".$archivo.'" title="'.base64_encode($archivo).'" class="image-popup" title="Screenshot-1">';
      echo '<img src="'.$directory."/".$archivo.'" class="thumb-img" alt="work-thumbnail"></a>';
  echo '</div>';
echo '</div>';
//echo '</div>';
                  
    }
    }
 $dirint->close();
} else {
 
 }
    ?>
      </div> <br> 
        
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
        
        <!--popup-->
        <script type="text/javascript" src="assets/plugins/isotope/dist/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
          
        <script type="text/javascript">
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>
    
        <!--form summernote-->
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>

        <script>

            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();

                $('.summernote').summernote({
                    height: 200,                 // set editor height

                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor

                    focus: true                 // set focus to editable area after initializing summernote
                });

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
myNewCell.innerHTML='<div class="col-md-12"><div class="form-group"><label class="control-label">Imagen de Ecografía: <span class="symbol required"></span></label><input type="file" class="btn btn-default btn-file" data-original-title="Subir Ecografias" data-rel="tooltip" placeholder="Suba su Ecografia" name="file[]" id="file" required="" aria-required="true"><small><p style="font-size:10px">Realice la B&uacute;squeda de la Ecografia:<br> * La Imagen debe ser extension.jpeg,jpg,png,gif<br> * La imagen no debe ser mayor de 200 KB</p></small></div></div>';
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