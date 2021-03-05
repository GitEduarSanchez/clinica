<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="ginecologo") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();

if(isset($_POST['btn-submit']))
{
$reg = $tra->RegistrarCriocauterizacion();
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-edit"></i> Gestión de Criocauterización</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="criocauterizacion">Control</a></li>
<li class="active">Gestión de Criocauterización</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>  
        
<form class="form" method="post"  action="#" name="criocauterizacion" id="criocauterizacion" onSubmit="asigna()"> 

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Gestión de Criocauterización</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

                                                  <div id="error">
                                                 <!-- error will be shown here ! -->
                                                  </div> 
             
       <?php if($_SESSION["tipo"]=="1"){ ?>

     <div class="row"> 

      <div class="col-md-4"> 
       <div class="form-group has-feedback"> 
        <label class="control-label">Búsqueda Fecha Desde: <span class="symbol required"></span></label> 
        <input class="form-control" type="text" name="desde" id="desde" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha Desde" required="" aria-required="true">
        <i class="fa fa-calendar form-control-feedback"></i> 
      </div> 
    </div>
    <div class="col-md-4"> 
     <div class="form-group has-feedback"> 
      <label class="control-label">Búsqueda Fecha Hasta: <span class="symbol required"></span></label> 
      <input class="form-control" type="text" name="hasta" id="hasta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha Hasta" required="" aria-required="true">
      <i class="fa fa-calendar form-control-feedback"></i> 
    </div> 
  </div>

  <div class="col-md-4"> 
    <div class="form-group has-feedback"> 
      <label class="control-label">Seleccione Médico: <span class="symbol required"></span></label>
      <input type="hidden" name="tipo" id="tipo" value="<?php echo $_SESSION['tipo']; ?>">  
      <select name="codmedico" id="codmedico" class='form-control' required="" aria-required="true">
       <option value="">SELECCIONE MEDICO</option>
       <?php
       $med = new Login();
       $med = $med->ListarMedicosEspecialidadGinecologia();
       for($i=0;$i<sizeof($med);$i++){
        ?> 
        <option value="<?php echo base64_encode($med[$i]['codmedico']); ?>"><?php echo $med[$i]['cedmedico']."  -  ".$med[$i]['nommedico']." ".$med[$i]['apemedico']."  -  ".$med[$i]['especmedico']; ?></option>
      <?php } ?>
    </select>
  </div> 
</div>

</div><br> 

        <?php } else { ?>

          <input type="hidden" name="codmedico" id="codmedico" value="<?php echo base64_encode($_SESSION['codmedico']); ?>">

          <div class="row"> 
            <div class="col-md-6"> 
             <div class="form-group has-feedback"> 
              <label class="control-label">Búsqueda Fecha Desde: <span class="symbol required"></span></label> 
              <input class="form-control" type="text" name="desde" id="desde" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha Desde" required="" aria-required="true">
              <i class="fa fa-calendar form-control-feedback"></i> 
            </div> 
          </div>
          <div class="col-md-6"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Búsqueda Fecha Hasta: <span class="symbol required"></span></label> 
            <input class="form-control" type="text" name="hasta" id="hasta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha Hasta" required="" aria-required="true">
            <i class="fa fa-calendar form-control-feedback"></i> 
          </div> 
        </div>

      </div><br>

        <?php } ?>
        
            <div class="modal-footer"> 
<button type="button" onClick="BuscarCriocauterizacion()" class="btn btn-primary"><span class="fa fa-search"></span> Realizar Búsqueda</button>
                          </div>

                    </div><!-- /.box-body -->
                </div>
                          </div>
                     </div>
              </div>
       </div>
</div>
                        <div id="muestracriocauterizacion"></div>
                        <div id="crearcriocauterizacion"></div>

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
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label><input type="text" id="presuntivo'+cont+'" name="presuntivo[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true"><input name="idciepresuntivo[]'+cont+'" type="hidden" class="form-control" id="idciepresuntivo'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/><textarea name="observacionpresuntivo[]'+cont+'" class="form-control" id="observacionpresuntivo'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Presuntivo" title="Ingrese Observación de Dx Presuntivo" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
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
myNewCell.innerHTML='<div class="col-md-13"><div class="form-group has-feedback"><label class="control-label">Dx Definitivo: <span class="symbol required"></span></label><input type="text" id="definitivo'+cont+'" name="definitivo[]'+cont+'" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" required="" aria-required="true"><input name="idciedefinitivo[]'+cont+'" type="hidden" class="form-control" id="idciedefinitivo'+cont+'"  onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Codigo de Dx" required="required"/><textarea name="observaciondefinitivo[]'+cont+'" class="form-control" id="observaciondefinitivo'+cont+'" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Definitivo" title="Ingrese Observación de Dx Definitivo" rows="2" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>';
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