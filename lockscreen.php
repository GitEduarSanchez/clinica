<?php
require_once("class/class.php");
$tra = new Login();

if(isset($_POST['btn-login']))
	{
	$log = $tra->Logueo();
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="assets/images/favicon.png" rel="icon" type="image">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css"> 
<!-- script jquery -->
<script src="assets/js/jquery.min.js"></script> 
<script type="text/javascript" src="assets/script/titulos.js"></script>
<script type="text/javascript" src="assets/script/validation.min.js"></script>
<script type="text/javascript" src="assets/script/script.js"></script>
<!-- script jquery -->
</head>
<body>

	
<header class="home">                                       
<div class="accountbg"><span class="panel panel-color panel-primary panel-pages">
<img src="assets/images/sclogo.png" alt="capa" width="390" height="56" class="sobre" /></span></div>

              <div class="wrapper-page">
                     <div class="panel panel-color panel-primary panel-pages">
<!--<img class="sobre" src="assets/images/sclogo.png" width="440" height="140" />-->
                     <div class="panel-heading bg-img"> 
<span class="text-center m-t-12 text-white"></span>                    
              </div>

<div class="panel-body">
<form class="form-horizontal m-t-20" name="lockscreen" id="lockscreen" action="">

                    <div id="error">
        <!-- error will be shown here ! -->
                    </div>

<div class="text-center"> 
<?php
if($_SESSION["tipo"]=="1"){
  
     if (isset($_SESSION['cedula'])) {
         if (file_exists("fotos/".$_SESSION['cedula'].".jpg")){
             echo "<img src='fotos/".$_SESSION['cedula'].".jpg?' class='img-responsive img-circle img-thumbnail' alt='thumbnail' width='90' height='90'>"; 
         } else {
             echo "<img src='fotos/avatar.jpg' class='img-responsive img-circle img-thumbnail' alt='thumbnail' width='90' height='90'>"; 
         } } else {
             echo "<img src='fotos/avatar.jpg' class='img-responsive img-circle img-thumbnail' alt='thumbnail' width='90' height='90'>"; 
        }

} else {
  
     if (isset($_SESSION['codmedico'])) {
         if (file_exists("fotos/".$_SESSION['codmedico'].".jpg")){
             echo "<img src='fotos/".$_SESSION['codmedico'].".jpg?' class='img-responsive img-circle img-thumbnail' alt='thumbnail' width='90' height='90'>"; 
         } else {
             echo "<img src='fotos/avatar2.jpg' class='img-responsive img-circle img-thumbnail' alt='thumbnail' width='90' height='90'>"; 
         } } else {
             echo "<img src='fotos/avatar2.jpg' class='img-responsive img-circle img-thumbnail' alt='thumbnail' width='90' height='90'>"; 
        }
  }
?>
</div>

<div class="form-group">
                      <center><h4><?php echo $_SESSION['usuario'] ?></h4></center>
			  <p align="center" class="text-muted">Introduzca su Contrase??a para acceder al sistema</p>
                      </div> 
			
<div class="form-group has-feedback">
                <label class="control-label">Ingrese su Password: <span class="symbol required"></span></label>
              <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario'] ?>">
              <input type="hidden" name="select" id="select" value="<?php echo $_SESSION['select'] ?>">
<input class="form-control" type="password" placeholder="Ingrese su Password" name="password" id="password" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-lock form-control-feedback"></i>			
					</div>
					
					
<div class="form-group m-t-30 m-b-0">
<div class="col-sm-12 text-center"><a href="logout" class="text-muted">No Acceder con <?php echo $_SESSION['usuario']?>?</a></div>
</div>

<div class="form-group text-center m-t-20">
<div class="col-xs-12"> 
<button class="btn btn-block btn-lg btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Haga clic aqu?? para iniciar sesi??n" name="btn-login" id="btn-login" type="submit"><span class="fa fa-sign-in"></span> Acceder</button>
</div>
</div>

</form>
</div>
</div>
</div> 
<div id="footer">Mayor informaci??n comuniquese al Correo: Sergiomonsalve05@hotmail.com o Celular: 3166182057<br>@Todos los derechos reservados CopyRight ?? 2017. By. IPS RADIOSALUD S.A.S<br>
 Recomendamos el uso del navegador Mozilla Firefox. Descargue  aqui  <a class="simple" href="http://www.mozilla-europe.org/es/firefox/" target="_blank"> Mozilla Firefox</a><img src="assets/images/header-logo.png" width="90" height="35"></div>
</div>
        <script>
            var resizefunc = [];
        </script>

        <!-- Main -->
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
  

        <script src="assets/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="assets/plugins/notifications/notify-metro.js"></script>
        <script src="assets/plugins/notifications/notifications.js"></script>
        <script src="assets/plugins//noty/packaged/jquery.noty.packaged.min.js"></script>
</header>
</body>
</html>