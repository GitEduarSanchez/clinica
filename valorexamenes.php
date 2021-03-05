<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="tecnico") {

$tra = new Login();
$ses = $tra->ExpiraSession();
$exp = $tra->Expiro();
$valor = $tra->ValorLaboratorioPorId();

if(isset($_POST['btn-update']))
{
$reg = $tra->ActualizarValorLaboratorio();
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
<div class="page-header-title"><h4 class="pull-left page-title"><i class="fa fa-tasks"></i> Gestión de Valores</h4>
<ol class="breadcrumb pull-right"><li><a href="panel">Inicio</a></li>
<li><a href="#">Control</a></li>
<li class="active">Gestión de Valores</li>
</ol>

<div class="clearfix"></div>

</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Gestión de Valores</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12"> 
            <div class="box-body">
      
<form class="form" name="updatevaloresexamenes" id="updatevaloresexamenes" method="post" data-id="<?php echo $valor[0]["codvalores"] ?>" action="#">

                                              <div id="error">
                                              <!-- error will be shown here ! -->
                                              </div>
                         
 <input type="hidden" name="codvalores" id="codvalores" value="<?php echo $valor[0]['codvalores']; ?>"> 

        <div class="row">                          
                
  <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">

            <tbody>
              <tr>
                <td colspan="3"><label>HEMATOLOGÍA</label></td>
                <td colspan="3"><label>QUÍMICA SANGUÍNEA</label></td>
              </tr>
              <tr>
                <td width="134"><label>EXÁMEN</label></td>
                <td colspan="2"><label>VALOR NORMAL</label></td>
                <td><label>EXÁMEN</label></td>
                <td colspan="2"><label>VALOR NORMAL </label></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">HEMATOCRITO</span></td>
                <td width="214"<div class="form-group has-feedback"><input name="hematocritov" type="text" class="form-control" id="hematocritov" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['hematocritov']; ?>" required="" aria-required="true"><i class="fa fa-pencil form-control-feedback"></i></td>
                <td width="102"><div align="right" style="font-size: 12px">%</div></td>
                <td width="162"><span style="font-size: 12px">GLUCOSA</span></td>
                <td width="195"><div class="form-group has-feedback"><input name="glucosav" type="text" class="form-control" id="glucosav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['glucosav']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td width="93"><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">HEMOGLOBINA</span></td>
                <td><div class="form-group has-feedback"><input name="hemoglobinav" type="text" class="form-control" id="hemoglobinav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['hemoglobinav']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">gr/dl</div></td>
                <td><span style="font-size: 12px">COLESTEROL TOTAL</span></td>
                <td><div class="form-group has-feedback"><input name="colesteroltotalv" type="text" class="form-control" id="colesteroltotalv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['colesteroltotalv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">LEUCOCITOS</span></td>
                <td><div class="form-group has-feedback"><input name="leucocitosv" type="text" class="form-control" id="leucocitosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['leucocitosv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mm3</div></td>
                <td><span style="font-size: 12px">COLESTEROL HDL</span></td>
                <td><div class="form-group has-feedback"><input name="colesterolhdlv" type="text" class="form-control" id="colesterolhdlv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['colesterolhdlv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">NEUTROFILOS</span></td>
                <td><div class="form-group has-feedback"><input name="neutrofilosv" type="text" class="form-control" id="neutrofilosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['neutrofilosv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">COLESTEROL LDL</span></td>
                <td><div class="form-group has-feedback"><input name="colesterolldlv" type="text" class="form-control" id="colesterolldlv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['colesterolldlv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">LINFOCITOS</span></td>
                <td><div class="form-group has-feedback"><input name="linfocitosv" type="text" class="form-control" id="linfocitosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['linfocitosv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">TRIGLICERIDOS</span></td>
                <td><div class="form-group has-feedback"><input name="trigliceridosv" type="text" class="form-control" id="trigliceridosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['trigliceridosv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">EOSINOFILOS</span></td>
                <td><div class="form-group has-feedback"><input name="eosinofilosv" type="text" class="form-control" id="eosinofilosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['eosinofilosv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">ACIDO &Uacute;RICO</span></td>
                <td><div class="form-group has-feedback"><input name="acidouricov" type="text" class="form-control" id="acidouricov" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['acidouricov']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">MONOCITOS</span></td>
                <td><div class="form-group has-feedback"><input name="monositosv" type="text" class="form-control" id="monositosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['monositosv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">NITROGENO UREICO</span></td>
                <td><div class="form-group has-feedback"><input name="nitrogenoureicov" type="text" class="form-control" id="nitrogenoureicov" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['nitrogenoureicov']; ?>"required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">BASOFILOS</span></td>
                <td><div class="form-group has-feedback"><input name="basofilosv" type="text" class="form-control" id="basofilosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['basofilosv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">CREATININA</span></td>
                <td><div class="form-group has-feedback"><input name="creatininav" type="text" class="form-control" id="creatininav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['creatininav']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">CAYADOS</span></td>
                <td><div class="form-group has-feedback"><input name="cayadosv" type="text" class="form-control" id="cayadosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['cayadosv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">PROTEINAS TOTALES</span></td>
                <td><div class="form-group has-feedback"><input name="proteinastotalesv" type="text" class="form-control" id="proteinastotalesv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['proteinastotalesv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">PLAQUETAS</span></td>
                <td><div class="form-group has-feedback"><input name="plaquetasv" type="text" class="form-control" id="plaquetasv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['plaquetasv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mm3</div></td>
                <td><span style="font-size: 12px">ALB&Uacute;MINA</span></td>
                <td><div class="form-group has-feedback"><input name="albuminav" type="text" class="form-control" id="albuminav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['albuminav']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">RETICULOCITOS</span></td>
                <td><div class="form-group has-feedback"><input name="reticulositosv" type="text" class="form-control" id="reticulositosv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['reticulositosv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">%</div></td>
                <td><span style="font-size: 12px">GLOBULINAS</span></td>
                <td><div class="form-group has-feedback"><input name="globulinav" type="text" class="form-control" id="globulinav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['globulinav']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">V.S.G</span></td>
                <td><div class="form-group has-feedback"><input name="vsgv" type="text" class="form-control" id="vsgv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['vsgv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mm/hr</div></td>
                <td><span style="font-size: 12px">BILIRRUBINA TOTAL</span></td>
                <td><div class="form-group has-feedback"><input name="bilirrubinatotalv" type="text" class="form-control" id="bilirrubinatotalv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['bilirrubinatotalv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">PT</span></td>
                <td><div class="form-group has-feedback"><input name="ptv" type="text" class="form-control" id="ptv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['ptv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">seg. CD</div></td>
                <td><span style="font-size: 12px">BILIRRUBINA DIRECTA</span></td>
                <td><div class="form-group has-feedback"><input name="bilirrubinadirectav" type="text" class="form-control" id="bilirrubinadirectav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['bilirrubinadirectav']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td><span style="font-size: 12px">PTT</span></td>
                <td><div class="form-group has-feedback"><input name="pttv" type="text" class="form-control" id="pttv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['pttv']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">seg. CD</div></td>
                <td><span style="font-size: 12px">BILIRRUBINA INDIRECTA</span></td>
                <td><div class="form-group has-feedback"><input name="bilirrubinaindirectav" type="text" class="form-control" id="bilirrubinaindirectav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['bilirrubinaindirectav']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">mg/dl</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span style="font-size: 12px">FOSFATASA ALCALINA</span></td>
                <td><div class="form-group has-feedback"><input name="fosfatasaalcalinav" type="text" class="form-control" id="fosfatasaalcalinav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $valor[0]['fosfatasaalcalinav']; ?>" placeholder="Valor Normal" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">UI/L</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span style="font-size: 12px">TGO/AST</span></td>
                <td><div class="form-group has-feedback"><input name="tgov" type="text" class="form-control" id="tgov" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['tgov']; ?>" required="" aria-required="true" /><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">UI/L</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span style="font-size: 12px">TGP/ALT</span></td>
                <td><div class="form-group has-feedback"><input name="tgpv" type="text" class="form-control" id="tgpv" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['tgpv']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">UI/L</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span style="font-size: 12px">AMILASA</span></td>
                <td><div class="form-group has-feedback"><input name="amilasav" type="text" class="form-control" id="amilasav" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Valor Normal" value="<?php echo $valor[0]['amilasav']; ?>" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
                <td><div align="right" style="font-size: 12px">UI/L</div></td>
              </tr>
            </tbody>
          </table> </div>                        

        </div><br>
        
            <div class="modal-footer"> 
<button type="submit" name="btn-update" id="btn-update" class="btn btn-primary"><span class="fa fa-edit"></span> Actualizar</button>
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