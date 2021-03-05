<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

if(isset($_POST['btn-submit']))
{
$reg = $tra->RegistrarMedicos();
exit;
} 
else if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarMedicos();
exit;
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Médicos</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="medicos">Control</a></li>
<li class="active">Gestión de Médicos</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>
        
<?php  if (isset($_GET['codmedico'])) {
      
      $reg = $tra->MedicosPorId(); ?>
      
<form class="form" name="updatemedico" id="updatemedico" method="post" data-id="<?php echo $reg[0]["codmedico"] ?>" action="#" enctype="multipart/form-data">
        
    <?php } else { ?>
        
<form class="form" method="post"  action="#" name="medico" id="medico" enctype="multipart/form-data"> 
      
    <?php } ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Gestión de Médicos</h3></div>
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
                              <?php if (isset($reg[0]['identmedico'])) { ?>
<select name="identmedico" id="identmedico" class='form-control' required="" aria-required="true">
                                    <option value="">SELECCIONE</option>
<option value="REGISTRO CIVIL"<?php if (!(strcmp('REGISTRO CIVIL', $reg[0]['identmedico']))) {echo "selected=\"selected\"";} ?>>REGISTRO CIVIL</option>
<option value="TARJETA DE IDENTIDAD"<?php if (!(strcmp('TARJETA DE IDENTIDAD', $reg[0]['identmedico']))) {echo "selected=\"selected\"";} ?>>TARJETA DE IDENTIDAD</option>
<option value="CEDULA"<?php if (!(strcmp('CEDULA', $reg[0]['identmedico']))) {echo "selected=\"selected\"";} ?>>CEDULA</option>
<option value="CEDULA EXTRANJERA"<?php if (!(strcmp('CEDULA EXTRANJERA', $reg[0]['identmedico']))) {echo "selected=\"selected\"";} ?>>CEDULA EXTRANJERA</option> 
                                                    </select>
                             <?php } else { ?>  
<select name="identmedico" id="identmedico" class='form-control' required="" aria-required="true"> 
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
 <input type="hidden" name="codmedico" id="codmedico" <?php if (isset($reg[0]['codmedico'])) { ?> value="<?php echo $reg[0]['codmedico']; ?>"<?php } ?>>
<input type="text" class="form-control" name="cedmedico" id="cedmedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Identificación" <?php if (isset($reg[0]['cedmedico'])) { ?> value="<?php echo $reg[0]['cedmedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nombres: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="nommedico" id="nommedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombres" <?php if (isset($reg[0]['nommedico'])) { ?> value="<?php echo $reg[0]['nommedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Apellidos: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="apemedico" id="apemedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Apellidos" <?php if (isset($reg[0]['apemedico'])) { ?> value="<?php echo $reg[0]['apemedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>
                    </div>

          <div class="row">  
                              
              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Tarjeta Profesional: <span class="symbol required"></span></label> 
  <input type="text" class="form-control" name="tpmedico" id="tpmedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Tarjeta Profesional" <?php if (isset($reg[0]['tpmedico'])) { ?> value="<?php echo $reg[0]['tpmedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>


              <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
  <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
    <input type="text" class="form-control" name="tlfmedico" id="tlfmedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nº de Teléfono" <?php if (isset($reg[0]['tlfmedico'])) { ?> value="<?php echo $reg[0]['tlfmedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i>  
                              </div> 
                        </div>

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Sexo: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['sexomedico'])) { ?>
<select name="sexomedico" id="sexomedico" class="form-control" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="MASCULINO"<?php if (!(strcmp('MASCULINO', $reg[0]['sexomedico']))) {echo "selected=\"selected\"";} ?>>MASCULINO</option>
<option value="FEMENINO"<?php if (!(strcmp('FEMENINO', $reg[0]['sexomedico']))) {echo "selected=\"selected\"";} ?>>FEMENINO</option>
                      </select>
                             <?php } else { ?>  
  <select name="sexomedico" id="sexomedico" class="form-control" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                  </select>
                              <?php } ?>
                              </div> 
                        </div>  

                        <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
            <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<input name="fnacmedico" class="form-control nacimiento" type="text" id="fnacmedico" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Nacimiento" autocomplete="off" <?php if (isset($reg[0]['fnacmedico'])) { ?> value="<?php echo date("d-m-Y",strtotime($reg[0]['fnacmedico'])); ?>" <?php } ?> required="required"/>
                        <i class="fa fa-calendar form-control-feedback"></i>  
                                                                </div> 
                                                            </div> 
             </div>  


          <div class="row"> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Especialidad: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['especmedico'])) { ?>
<select class="form-control" id="especmedico" name="especmedico" required="" aria-required="true">
                                                                <option value="">SELECCIONE</option>
<option value="MEDICO GENERAL"<?php if (!(strcmp('MEDICO GENERAL', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>MÉDICO GENERAL</option>
<option value="GINECOLOGO"<?php if (!(strcmp('GINECOLOGO', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>GINECÓLOGO</option>
<option value="ES ULTRASONIDO"<?php if (!(strcmp('ES ULTRASONIDO', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>ES ULTRASONIDO</option>
<option value="ES OBSTETRA"<?php if (!(strcmp('ES OBSTETRA', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>ES OBSTETRA</option>
<option value="BACTERIOLOGO"<?php if (!(strcmp('BACTERIOLOGO', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>BACTERIÓLOGO</option>
<option value="RADIOLOGO"<?php if (!(strcmp('RADIOLOGO', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>RADIOLOGO</option>
<option value="ODONTOLOGO"<?php if (!(strcmp('ODONTOLOGO', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>ODONTÓLOGO</option>
<option value="TERAPEUTA"<?php if (!(strcmp('TERAPEUTA', $reg[0]['especmedico']))) {echo "selected=\"selected\"";} ?>>TERAPEUTA</option>
                                                                </select> 
                             <?php } else { ?>  
<select class="form-control" id="especmedico" name="especmedico" required="" aria-required="true">
                                                                <option value="" disabled selected>SELECCIONE</option>
                                                <option value="MEDICO GENERAL">MÉDICO GENERAL</option>
                                                <option value="GINECOLOGO">GINECÓLOGO</option>
                                                <option value="ES ULTRASONIDO">ES ULTRASONIDO</option>
                                                 <option value="ES OBSTETRA">ES OBSTETRA</option>
                                                <option value="BACTERIOLOGO">BACTERIÓLOGO</option>
                                                <option value="RADIOLOGO">RADIOLOGO</option>
                                                <option value="ODONTOLOGO">ODONTÓLOGO</option>
                                                <option value="TERAPEUTA">TERAPEUTA</option>
                                                                </select> 
                              <?php } ?>
                              </div> 
                        </div> 

                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
            <label class="control-label">Modulo de Acceso: <span class="symbol required"></span></label>
                              <?php if (isset($reg[0]['moduloespec'])) { ?>
<select class="form-control" id="moduloespec" name="moduloespec" required="" aria-required="true">
                                <option value="">SELECCIONE</option>
<option value="MEDICO GENERAL"<?php if (!(strcmp('MEDICO GENERAL', $reg[0]['moduloespec']))) {echo "selected=\"selected\"";} ?>>MÉDICO GENERAL</option>
<option value="GINECOLOGO"<?php if (!(strcmp('GINECOLOGO', $reg[0]['moduloespec']))) {echo "selected=\"selected\"";} ?>>GINECOLOGIA</option>
<option value="BACTERIOLOGO"<?php if (!(strcmp('BACTERIOLOGO', $reg[0]['moduloespec']))) {echo "selected=\"selected\"";} ?>>BACTERIOLOGIA</option>
<option value="RADIOLOGO"<?php if (!(strcmp('RADIOLOGO', $reg[0]['moduloespec']))) {echo "selected=\"selected\"";} ?>>RADIOLOGIA</option>
<option value="ODONTOLOGO"<?php if (!(strcmp('ODONTOLOGO', $reg[0]['moduloespec']))) {echo "selected=\"selected\"";} ?>>ODONTOLOGIA</option>
<option value="TERAPEUTA"<?php if (!(strcmp('TERAPEUTA', $reg[0]['moduloespec']))) {echo "selected=\"selected\"";} ?>>TERAPIAS</option>
                                                                </select> 
                             <?php } else { ?>  
<select class="form-control" id="moduloespec" name="moduloespec" required="" aria-required="true">
                                <option value="" disabled selected>SELECCIONE</option>
                          <option value="MEDICO GENERAL">MÉDICO GENERAL</option>
                                                <option value="GINECOLOGO">GINECOLOGÍA</option>
                        <option value="BACTERIOLOGO">BACTERIOLOGÍA</option>
                                                <option value="RADIOLOGO">RADIOLOGÍA</option>
                        <option value="ODONTOLOGO">ODONTÓLOGÍA</option>
                                                <option value="TERAPEUTA">TERAPIAS</option>
                                                                </select> 
                              <?php } ?>
                              </div> 
                        </div> 

                            <div class="col-md-6"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Correo Electronico: <span class="symbol required"></span></label> 
 <input type="text" class="form-control" name="correomedico" id="correomedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Correo Electronico" <?php if (isset($reg[0]['correomedico'])) { ?> value="<?php echo $reg[0]['correomedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-envelope-o form-control-feedback"></i>  
                              </div> 
                        </div>
    
             </div>

             <div class="row"> 

                         <div class="col-md-6"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label> 
 <input type="text" class="form-control" name="direcmedico" id="direcmedico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dirección Domiciliaria" <?php if (isset($reg[0]['direcmedico'])) { ?> value="<?php echo $reg[0]['direcmedico']; ?>"<?php } ?> required="" aria-required="true">
                        <i class="fa fa-map-marker form-control-feedback"></i>  
                              </div> 
                        </div> 
                              
             <div class="col-sm-6">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 90px; height: 100px;">
<?php if (isset($reg[0]['cedmedico'])) {
    if (file_exists("firmasdigitales/".$reg[0]['cedmedico'].".jpg")){
    echo "<img src='firmasdigitales/".$reg[0]['cedmedico'].".jpg?".date('h:i:s')."' class='img-rounded' border='0' width='100' height='110' title='Firma Digital' data-rel='tooltip'>"; 
}else{
    echo "<img src='firmasdigitales/sinfirma.jpg' class='img-rounded' border='1' width='90' height='100' title='Sin Firma Digital' data-rel='tooltip'>"; 
} } else {
    echo "<img src='firmasdigitales/sinfirma.jpg' class='img-rounded' border='1' width='90' height='100' title='Sin Firma Digital' data-rel='tooltip'>"; 
}
?>
                            </div>
                            <div>
                              <span class="btn btn-default btn-file">
              <span class="fileinput-new"><i class="fa fa-file-image-o"></i> Imagen</span>
               <span class="fileinput-exists"><i class="fa fa-paint-brush"></i> Imagen</span>
<input type="file" size="10" data-original-title="Subir Fotografia" data-rel="tooltip" placeholder="Suba su Fotografia" name="imagen" id="imagen"  />
                              </span>
 <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times-circle"></i> Remover</a><small><p>Para Subir su Firma Digital debe tener en cuenta lo siguiente:<br> * La Imagen debe ser extension.jpg<br> * La imagen no debe ser mayor de 50 KB</p></small>                             </div>
                          </div>
                        </div>
              
                    </div><br> 
        
            <div class="modal-footer"> 
<?php  if (isset($_GET['codmedico'])) { ?>
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


<footer class="footer"> <i class="fa fa-copyright"></i> <span class=""></span>. </footer>
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