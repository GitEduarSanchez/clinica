<?php
session_start();
require_once("classconexion.php");
include_once('funciones_basicas.php');

ini_set('memory_limit', '-1'); //evita el error Fatal error: Allowed memory size of X bytes exhausted (tried to allocate Y bytes)...
ini_set('max_execution_time', 800); // es lo mismo que set_time_limit(300) ;

############################################ CLASE LOGIN #############################################
class Login extends Db
{
	public function __construct()
	{
		parent::__construct();
	} 	

	
############  FUNCION PARA EXPIRAR SISTEMA POR FECHA ESTIMADA  ################
	public function Expiro()
	{
		self::SetNames();
		$fecha_atual = date("Y-m-d");
		$fecha_expira = "2020-12-31";
		
//$variable = ( $fecha_atual <= $fecha_expira ? "" : header("Location: http://localhost/medical/404"));
$variable = ( $fecha_atual <= $fecha_expira ? "" : header("Location: http://hitoriaclinica.hol.es/medical/404"));
		
	}
############  FIN DE FUNCION PARA EXPIRAR SISTEMA POR FECHA ESTIMADA  ################

##########################  FUNCION PARA EXPIRAR SESSION POR INACTIVIDAD #######################
public function ExpiraSession(){


	if(!isset($_SESSION['acceso'])){// Esta logeado?.
		header("Location: logout"); 
	}

	//Verifico el tiempo si esta seteado, caso contrario lo seteo.
	if(isset($_SESSION['time'])){
		$tiempo = $_SESSION['time'];
	}else{
		$tiempo = strtotime(date("Y-m-d h:i:s"));
	}

	$inactividad =36000; 

	$actual =  strtotime(date("Y-m-d h:i:s"));

	if( ($actual-$tiempo) >= $inactividad){
		?>					
		<script type='text/javascript' language='javascript'>
			alert('SU SESSION A EXPIRADO \nPOR FAVOR LOGUEESE DE NUEVO PARA ACCEDER AL SISTEMA') 
			document.location.href='logout'	 
		</script> 
		<?php

	}else{

		$_SESSION['time'] =$actual;

	} 
}

########################## FUNCION PARA EXPIRAR SESSION POR INACTIVIDAD #######################



###################### FUNCION PARA ACCEDER AL SISTEMA DE CLINICA #######################
	public function Logueo()
	{
		self::SetNames();
		if(empty($_POST["usuario"]) or empty($_POST["password"]))
		{
		echo "<div class='alert alert-danger'>";
		echo "<span class='fa fa-info-circle'></span> LOS CAMPOS NO PUEDEN IR VACIOS";
		echo "</div>";
		exit;
		}
		//$pass = sha1(md5($_POST["password"]));
		$pass = $_POST["password"];

if ($_POST['select'] == "ADMINISTRADOR" || $_POST['select']=="SECRETARIA" || $_POST['select']=="ENFERMERA" || $_POST['select']=="TEC RADIOLOGIA") {

	    $sql = " select * from usuarios where usuario = ? and password = ? and status = 'ACTIVO'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $_POST["usuario"], $pass ) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		echo "<div class='alert alert-danger'>";
		echo "<span class='fa fa-info-circle'></span> LOS DATOS INGRESADOS NO EXISTEN";
		echo "</div>";
		exit;
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$p[]=$row;
			}
			$_SESSION["codigo"] = $p[0]["codigo"];
			$_SESSION["tipoidentificacion"] = $p[0]["tipoidentificacion"];
			$_SESSION["cedula"] = $p[0]["cedula"];
			$_SESSION["nombres"] = $p[0]["nombres"];
			$_SESSION["sexo"] = $p[0]["sexo"];
			$_SESSION["cargo"] = $p[0]["cargo"];
			$_SESSION["email"] = $p[0]["email"];
			$_SESSION["usuario"] = $p[0]["usuario"];
			$_SESSION["nivel"] = $p[0]["nivel"];
			$_SESSION["status"] = $p[0]["status"];

			$_SESSION["x"] = $p[0]["nivel"];
			$_SESSION["ingreso"] = $p[0]["nombres"];
			$_SESSION["tipo"] = "1";
			$_SESSION["select"] = $_POST['select'];
			
			$query = " insert into log values (null, ?, ?, ?, ?, ?); ";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(1,$a);
			$stmt->bindParam(2,$b);
			$stmt->bindParam(3,$c);
			$stmt->bindParam(4,$d);
			$stmt->bindParam(5,$e);
			
			$a = strip_tags($_SERVER['REMOTE_ADDR']);
			$b = strip_tags(date("Y-m-d h:i:s"));
			$c = strip_tags($_SERVER['HTTP_USER_AGENT']);
			$d = strip_tags($_SERVER['PHP_SELF']);
			$e = strip_tags($_POST["usuario"]);
			$stmt->execute();
			
			switch($_SESSION["nivel"])
	{
		    case 'ADMINISTRADOR(A)' :
	        $_SESSION["acceso"]="administrador";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		<?php
			break;
		    case 'SECRETARIA' :
		    $_SESSION["acceso"]="secretaria";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		    <?php
		    break;
		    case 'ENFERMERO(A)' :
		    $_SESSION["acceso"]="enfermera";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
            <?php
		     break;
		     case 'TEC RADIOLOGIA' :
		    $_SESSION["acceso"]="tecnico";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		   <?php
		   break;
				
		     }
		  } 
		} else {
		
		$sql = " select * from medicos where cedmedico = ? and clavemedico = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $_POST["usuario"], $pass ) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
			echo "<div class='alert alert-danger'>";
		    echo "<span class='fa fa-info-circle'></span> LOS DATOS INGRESADOS NO EXISTEN";
		    echo "</div>";
		    exit;
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$p[]=$row;
			}
			
			//echo "<font color='white'>ok</font color>"; // log in
			$_SESSION["codmedico"] = $p[0]["codmedico"];
			$_SESSION["identmedico"] = $p[0]["identmedico"];
			$_SESSION["cedmedico"] = $p[0]["cedmedico"];
			$_SESSION["tpmedico"] = $p[0]["tpmedico"];
			$_SESSION["nommedico"] = $p[0]["nommedico"];
			$_SESSION["apemedico"] = $p[0]["apemedico"];
			$_SESSION["tlfmedico"] = $p[0]["tlfmedico"];
			$_SESSION["sexomedico"] = $p[0]["sexomedico"];
			$_SESSION["correomedico"] = $p[0]["correomedico"];
			$_SESSION["direcmedico"] = $p[0]["direcmedico"];
			$_SESSION["moduloespec"] = $p[0]["moduloespec"];
			$_SESSION["especmedico"] = $p[0]["especmedico"];
			$_SESSION["fnacmedico"] = $p[0]["fnacmedico"];
			$_SESSION["usuario"] = $p[0]["cedmedico"];

			$_SESSION["x"] = $p[0]["especmedico"];
			$_SESSION["nombres"] = $p[0]["especmedico"]." / ".$p[0]["nommedico"]." ".$p[0]["apemedico"];
			$_SESSION["ingreso"] = $p[0]["nommedico"]." ".$p[0]["apemedico"];
			$_SESSION["tipo"] = "2";
			$_SESSION["select"] = $_POST['select'];
			
			$query = " insert into log values (null, ?, ?, ?, ?, ?); ";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(1,$a);
			$stmt->bindParam(2,$b);
			$stmt->bindParam(3,$c);
			$stmt->bindParam(4,$d);
			$stmt->bindParam(5,$e);
			$a = strip_tags($_SERVER['REMOTE_ADDR']);
			$b = strip_tags(date("Y-m-d h:i:s"));
			$c = strip_tags($_SERVER['HTTP_USER_AGENT']);
			$d = strip_tags($_SERVER['PHP_SELF']);
			$e = strip_tags($_POST["usuario"]);
			$stmt->execute();
			
			switch($_SESSION["moduloespec"])
	{
		    case 'MEDICO GENERAL' :
	        $_SESSION["acceso"]="general";
			
		    ?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		    <?php
		    break;
 		    case 'GINECOLOGO' :
		    $_SESSION["acceso"]="ginecologo";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		    <?php
		    break;
 		    case 'BACTERIOLOGO' :
		    $_SESSION["acceso"]="laboratorio";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>

		    <?php
		    break;
 		    case 'RADIOLOGO' :
		    $_SESSION["acceso"]="radiologo";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		    <?php
		    break;
 		    case 'TERAPEUTA' :
		    $_SESSION["acceso"]="terapeuta";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		    <?php
		    break;
 		    case 'ODONTOLOGO' :
		    $_SESSION["acceso"]="odontologo";
			?>
		   
			<script type="text/javascript">
            window.location="panel";
            </script>
			
		   <?php
		   break;
		         }
	    	}
	 }
		//print_r($_POST);
		exit;
	}
###################### FUNCION PARA ACCEDER AL SISTEMA DE CLINICA #######################





################################ FUNCION RECUPERAR Y ACTUALIZAR PASSWORD ###############################

################################## FUNCION PARA RECUPERAR CLAVE ###################################
public function RecuperarPassword()
	{
		self::SetNames();
		if(empty($_POST["email"]))
		{
			echo "1";
			exit;
		}
		
if ($_POST['select'] == "ADMINISTRADOR" || $_POST['select']=="SECRETARIA" || $_POST['select']=="ENFERMERA" || $_POST['select']=="TEC RADIOLOGIA") {

		$sql = " select * from usuarios where email = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["email"]) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "2";
		    exit;
		}
		else
		{
			//if($row = $stmt->fetch())
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$pa[] = $row;
			}
			$id = $pa[0]["codigo"];
			$nombres = $pa[0]["nombres"];
			$password = $pa[0]["password"];
		}
	
			$sql = " update usuarios set "
			  ." password = ? "
			  ." where "
			  ." codigo = ?;
			   ";
		    $stmt = $this->dbh->prepare($sql);
		    $stmt->bindParam(1, $password);
		    $stmt->bindParam(2, $codigo);
			
            $codigo = $id;
			$pass = strtoupper(generar_clave(10));
			$password = $pass;
            $stmt->execute();

        } else {


        	$sql = " select * from medicos where correomedico = ?";
        	$stmt = $this->dbh->prepare($sql);
        	$stmt->execute( array($_POST["email"]) );
        	$num = $stmt->rowCount();
        	if($num==0)
        	{
        		echo "2";
        		exit;
        	}
        	else
        	{
			//if($row = $stmt->fetch())
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$pa[] = $row;
			}
			$id = $pa[0]["codmedico"];
			$nombres = $pa[0]["especmedico"].": ".$pa[0]["nommedico"]." ".$pa[0]["apemedico"];
			$password = $pa[0]["clavemedico"];
		}
	
			$sql = " update medicos set "
			  ." clavemedico = ? "
			  ." where "
			  ." codmedico = ?;
			   ";
		    $stmt = $this->dbh->prepare($sql);
		    $stmt->bindParam(1, $password);
		    $stmt->bindParam(2, $codigo);
			
            $codigo = $id;
			$pass = strtoupper(generar_clave(10));
			$password = $pass;
            $stmt->execute();

        }
		
    $para = $_POST["email"];
    $titulo = 'RECUPERACION DE PASSWORD';
    $header = 'From: ' . 'SISTEMA DE GESTION MEDICA';
    $msjCorreo = " Nombre: $nombres\n Nuevo Passw: $pass\n Mensaje: Por favor use esta nueva clave de acceso para ingresar al Sistema de Gestion Medica\n";
    mail($para, $titulo, $msjCorreo, $header);
			
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> SU NUEVA CLAVE DE ACCESO LE FUE ENVIADA A SU CORREO";
	echo "</div>";
}	
################################## FUNCION PARA RECUPERAR CLAVE ###################################

############################# FUNCION PARA ACTUALIZAR PASSWORD  ##################################
	public function ActualizarPassword()
	{
		if(empty($_POST["cedula"]))
		{
			echo "1";
			exit;
		}

	if($_SESSION["tipo"]=="1"){
		
		self::SetNames();
		$sql = " update usuarios set "
			  ." usuario = ?, "
			  ." password = ? "
			  ." where "
			  ." codigo = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $usuario);
		$stmt->bindParam(2, $password);
		$stmt->bindParam(3, $codigo);	
			
		$usuario = strip_tags($_POST["usuario"]);
		$password = $_POST["password"];
		$codigo = strip_tags($_SESSION["codigo"]);
		$stmt->execute();

	} else {

		$sql = " update medicos set "
			  ." clavemedico = ? "
			  ." where "
			  ." codmedico = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $password);
		$stmt->bindParam(2, $codmedico);	
			
		$password = $_POST["password"];
		$codmedico = strip_tags($_POST["codigo"]);
		$stmt->execute();
	}
		
    echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> SU CLAVE DE ACCESO FUE ACTUALIZADA EXITOSAMENTE, SER&Aacute; EXPULSADO DE SU SESI&Oacute;N Y DEBER&Aacute; DE ACCEDER NUEVAMENTE";
	echo "</div>";		
		?>
		<script>
        function redireccionar(){location.href="logout.php";}
        setTimeout ("redireccionar()", 3000);
        </script>
		<?php
		exit;
	}
############################# FUNCION PARA ACTUALIZAR PASSWORD  ##################################

############################## FUNCION RECUPERAR Y ACTUALIZAR PASSWORD ##############################









































########################### FUNCION CONFIGURACION GENERAL DEL SISTEMA ############################

########################### FUNCION ID CONFIGURACION DEL SISTEMA #########################
	public function ConfiguracionPorId()
	{
		self::SetNames();
		$sql = " select * from configuracion where id = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array('1') );
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
########################### FUNCION ID CONFIGURACION DEL SISTEMA #########################

########################### FUNCION  ACTUALIZAR CONFIGURACION ##############################
	public function ActualizarConfiguracion()
	{
		if(empty($_POST["nombresucursal"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		$sql = " select * from configuracion where id != ? and nitsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["id"], $_POST["nitsucursal"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update configuracion set "
			  ." nitsucursal = ?, "
			  ." nombresucursal = ?, "
			  ." departamentosucursal = ?, "
			  ." ciudadsucursal = ?, "
			  ." direccionsucursal = ?, "
			  ." emailsucursal = ?, "
			  ." telefonosucursal = ?, "
			  ." identdirecsucursal = ?, "
			  ." nomdirecsucursal = ?, "
			  ." apedirecsucursal = ?, "
			  ." telefdirecsucursal = ? "
			  ." where "
			  ." id = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $nitsucursal);
		$stmt->bindParam(2, $nombresucursal);
		$stmt->bindParam(3, $departamentosucursal);
		$stmt->bindParam(4, $ciudadsucursal);
		$stmt->bindParam(5, $direccionsucursal);
		$stmt->bindParam(6, $emailsucursal);
		$stmt->bindParam(7, $telefonosucursal);
		$stmt->bindParam(8, $identdirecsucursal);
		$stmt->bindParam(9, $nomdirecsucursal);
		$stmt->bindParam(10, $apedirecsucursal);
		$stmt->bindParam(11, $telefdirecsucursal);
		$stmt->bindParam(12, $id);
			
		$nitsucursal = strip_tags($_POST["nitsucursal"]."-".$_POST["divv"]);
		$nombresucursal = strip_tags($_POST["nombresucursal"]);
		$departamentosucursal = strip_tags($_POST["departamentosucursal"]);
		$ciudadsucursal = strip_tags($_POST["ciudadsucursal"]);
		$direccionsucursal = strip_tags($_POST["direccionsucursal"]);
		$emailsucursal = strip_tags($_POST["emailsucursal"]);
		$telefonosucursal = strip_tags($_POST["telefonosucursal"]);
		$identdirecsucursal = strip_tags($_POST["identdirecsucursal"]);
		$nomdirecsucursal = strip_tags($_POST["nomdirecsucursal"]);
		$apedirecsucursal = strip_tags($_POST["apedirecsucursal"]);
		$telefdirecsucursal = strip_tags($_POST["telefdirecsucursal"]);
		$id = strip_tags($_POST["id"]);
		$stmt->execute();
		
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LOS DATOS DE CONFIGURACI&Oacute;N GENERAL FUERON ACTUALIZADOS EXITOSAMENTE </div>";
		exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
########################### FUNCION  ACTUALIZAR CONFIGURACION ##############################
	
############################ FIN DE FUNCION CONFIGURACION GENERAL DEL SISTEMA ########################
































	public function Registrarfoto()
	{
		self::SetNames();
		if( empty($_POST["cedpaciente"]))
		{
			echo "1";
			exit;
		}
		
		$sql = " select cedpaciente from pacientes where cedpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["cedpaciente"]) );
		$num = $stmt->rowCount();
		if($num != 0)
		{
	    	$cedpaciente = strip_tags($_POST["cedpaciente"]);
		
		
         
         if (isset($_FILES['imagen']['name'])) { $nombre_archivo = $_FILES['imagen']['name']; } else { $nombre_archivo =''; }
		 if (isset($_FILES['imagen']['type'])) { $tipo_archivo = $_FILES['imagen']['type']; } else { $tipo_archivo =''; }
		 if (isset($_FILES['imagen']['size'])) { $tamano_archivo = $_FILES['imagen']['size']; } else { $tamano_archivo =''; }  
		 if (isset($_FILES['imagen']['name'])) { $nombre_archivo = $_FILES['imagen']['name']; } else {  echo "<div class='alert alert-success'>";
			echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<span class='fa fa-check-square-o'></span> NO HAY IMAGEN </div>"; }
         //compruebo si las características del archivo son las que deseo  
		 if ($tipo_archivo="image/jpeg" || $tipo_archivo="image/jpg" || $tipo_archivo="image/png" || $tipo_archivo="image/gif") 
		 {  
		   
		 if (move_uploaded_file($_FILES['imagen']['tmp_name'], "fotos/".$nombre_archivo) && rename("fotos/".$nombre_archivo,"fotos/".$_POST['cedpaciente'].".jpg"))
		 { 
		     echo "<div class='alert alert-success'>";
			echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<span class='fa fa-check-square-o'></span> FOTO AGREGADA CON EXITO </div>";
		     header('Location:http://www.clinica.isasport.com.co/fotopaciente.php');
		     
		 } else {
		    
		 }
		 ## se puede dar otro aviso 
		 }else{
		     echo "<div class='alert alert-success'>";
			echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<span class='fa fa-check-square-o'></span> FORMATO </div>";
		 }
}

}
####################################### CLASE USUARIOS #############################################

################################## FUNCION REGISTRAR USUARIOS ###############################
	public function RegistrarUsuarios()
	{
		self::SetNames();
		if(empty($_POST["nombres"]) or empty($_POST["usuario"]) or empty($_POST["password"]))
		{
			echo "1";
			exit;
		}
		$sql = " select cedula from usuarios where cedula = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["cedula"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "2";
		exit;
		}
		else
		{
		$sql = " select email from usuarios where email = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["email"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "3";
		exit;
		}
		else
		{
		$sql = " select usuario from usuarios where usuario = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["usuario"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
			$query = " insert into usuarios values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(1, $tipoidentificacion);
			$stmt->bindParam(2, $cedula);
			$stmt->bindParam(3, $nombres);
			$stmt->bindParam(4, $sexo);
			$stmt->bindParam(5, $cargo);
			$stmt->bindParam(6, $email);
			$stmt->bindParam(7, $usuario);
			$stmt->bindParam(8, $password);
			$stmt->bindParam(9, $nivel);
			$stmt->bindParam(10, $status);
			
			$tipoidentificacion	 = strip_tags($_POST["tipoidentificacion"]);
			$cedula = strip_tags($_POST["cedula"]);
			$nombres = strip_tags($_POST["nombres"]);
			$sexo = strip_tags($_POST["sexo"]);
			$cargo = strip_tags($_POST["cargo"]);
			$email = strip_tags($_POST["email"]);
			$usuario = strip_tags($_POST["usuario"]);
		//	$password = $_POST["password"];
	    	$password = $_POST["password"];
			$nivel = strip_tags($_POST["nivel"]);
			$status = strip_tags($_POST["status"]);
			$stmt->execute();
		
		##################  SUBIR FOTO DE USUARIOS ######################################
         //datos del arhivo  
         if (isset($_FILES['imagen']['name'])) { $nombre_archivo = $_FILES['imagen']['name']; } else { $nombre_archivo =''; }
		 if (isset($_FILES['imagen']['type'])) { $tipo_archivo = $_FILES['imagen']['type']; } else { $tipo_archivo =''; }
		 if (isset($_FILES['imagen']['size'])) { $tamano_archivo = $_FILES['imagen']['size']; } else { $tamano_archivo =''; }  
         //compruebo si las características del archivo son las que deseo  
		 if ((strpos($tipo_archivo,'image/jpeg')!==false)&&$tamano_archivo<50000) 
		 {  
		 if (move_uploaded_file($_FILES['imagen']['tmp_name'], "fotos/".$nombre_archivo) && rename("fotos/".$nombre_archivo,"fotos/".$_POST["cedula"].".jpg"))
		 { 
		 
		     
		 
		 } 
		 ## se puede dar otro aviso 
		 }
		##################  FINALIZA SUBIR FOTO DE USUARIOS ######################################

	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<span class='fa fa-check-square-o'></span> EL USUARIO FUE REGISTRADO EXITOSAMENTE";
    echo "</div>";		
	exit;
		}
		else
		{
			echo "4";
			exit;
		   }
		}
	}
}
################################## FUNCION REGISTRAR USUARIOS ###############################

################################## FUNCION LISTAR USUARIOS ################################
	public function ListarUsuarios()
	{
		self::SetNames();
		$sql = " select * from usuarios ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################## FUNCION LISTAR USUARIOS ################################

############################ FUNCION LISTAR LOGS DE USUARIOS #############################
	public function ListarLogs()
	{
		self::SetNames();
		if($_SESSION['acceso'] == "administrador") {
		$sql = " select * from log ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
		
	} else {
	         
			 $sql = " select * from log where usuario = '".$_SESSION["usuario"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}
############################ FUNCION LISTAR LOGS DE USUARIOS #############################

############################ FUNCION ID USUARIOS #################################
	public function UsuariosPorId()
	{
		self::SetNames();
		$sql = " select * from usuarios where codigo = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codigo"])) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################ FUNCION ID USUARIOS #################################
	
############################ FUNCION ACTUALIZAR USUARIOS ############################
	public function ActualizarUsuarios()
	{
		
		if(empty($_POST["cedula"]) or empty($_POST["nombres"]) or empty($_POST["usuario"]) or empty($_POST["password"]))
		{
			echo "1";
			exit;
		}
		self::SetNames();
		$sql = " select * from usuarios where codigo != ? and cedula = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codigo"], $_POST["cedula"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		echo "2";
		exit;
		}
		else
		{
		$sql = " select email from usuarios where codigo != ? and email = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codigo"], $_POST["email"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		echo "3";
		exit;
		}
		else
		{
		$sql = " select usuario from usuarios where codigo != ? and usuario = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codigo"], $_POST["usuario"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$sql = " update usuarios set "
			  ." tipoidentificacion = ?, "
			  ." cedula = ?, "
			  ." nombres = ?, "
			  ." sexo = ?, "
			  ." cargo = ?, "
			  ." email = ?, "
			  ." usuario = ?, "
			  ." password = ?, "
			  ." nivel = ?, "
			  ." status = ? "
			  ." where "
			  ." codigo = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $tipoidentificacion);
		$stmt->bindParam(2, $cedula);
		$stmt->bindParam(3, $nombres);
		$stmt->bindParam(4, $sexo);
		$stmt->bindParam(5, $cargo);
		$stmt->bindParam(6, $email);
		$stmt->bindParam(7, $usuario);
		$stmt->bindParam(8, $password);
		$stmt->bindParam(9, $nivel);
		$stmt->bindParam(10, $status);
		$stmt->bindParam(11, $codigo);
			
		$tipoidentificacion	 = strip_tags($_POST["tipoidentificacion"]);
		$cedula = strip_tags($_POST["cedula"]);
		$nombres = strip_tags($_POST["nombres"]);
		$sexo = strip_tags($_POST["sexo"]);
		$cargo = strip_tags($_POST["cargo"]);
		$email = strip_tags($_POST["email"]);
		$usuario = strip_tags($_POST["usuario"]);
		$password = $_POST["password"];
		$nivel = strip_tags($_POST["nivel"]);
		$status = strip_tags($_POST["status"]);
		$codigo = strip_tags($_POST["codigo"]);
		$stmt->execute();
		
		##################  SUBIR FOTO DE USUARIOS ######################################
         //datos del arhivo  
         if (isset($_FILES['imagen']['name'])) { $nombre_archivo = $_FILES['imagen']['name']; } else { $nombre_archivo =''; }
		 if (isset($_FILES['imagen']['type'])) { $tipo_archivo = $_FILES['imagen']['type']; } else { $tipo_archivo =''; }
		 if (isset($_FILES['imagen']['size'])) { $tamano_archivo = $_FILES['imagen']['size']; } else { $tamano_archivo =''; }  
         //compruebo si las características del archivo son las que deseo  
		 if ((strpos($tipo_archivo,'image/jpeg')!==false)&&$tamano_archivo<50000) 
		 {  
		 if (move_uploaded_file($_FILES['imagen']['tmp_name'], "fotos/".$nombre_archivo) && rename("fotos/".$nombre_archivo,"fotos/".$_POST["cedula"].".jpg"))
		 { 
		 ## se puede dar un aviso
		 } 
		 ## se puede dar otro aviso 
		 }
		##################  FINALIZA SUBIR FOTO DE USUARIOS ######################################
		
    echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<span class='fa fa-check-square-o'></span> EL USUARIO FUE ACTUALIZADO EXITOSAMENTE";
    echo "</div>";		
	exit;
	
	}
		else
		{
			echo "4";
			exit;
			}
		}
	}
}
############################ FUNCION ACTUALIZAR USUARIOS ############################

################################ FUNCION ELIMINAR USUARIOS #################################
	public function EliminarUsuarios()
	{
		/*$sql = " select codigo from pagos where codigo = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codigo"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{*/

		$sql = " delete from usuarios where codigo = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codigo);
		$codigo = base64_decode($_GET["codigo"]);
		$stmt->execute();
		
		header("Location: usuarios?mesage=1");
		exit;
		   
		  /* }else {
		   
			header("Location: usuarios?mesage=2");
			exit;
		  }*/
			
	}
################################ FUNCION ELIMINAR USUARIOS #################################

################################## FIN DE CLASE USUARIOS #########################################






































#########################################  CLASE SUCURSALES #########################################

################################# FUNCION REGISTRAR SUCURSALES ######################################
	public function RegistrarSucursal()
	{
		self::SetNames();
		if(empty($_POST["nitsucursal"]) or empty($_POST["div"]) or empty($_POST["nombresucursal"]))
		{
			echo "1";
			exit;
		}
		
		$sql = " select nitsucursal from sucursales where nitsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["nitsucursal"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into sucursales values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $nitsucursal);
		$stmt->bindParam(2, $nombresucursal);
		$stmt->bindParam(3, $departamentosucursal);
		$stmt->bindParam(4, $ciudadsucursal);
		$stmt->bindParam(5, $direccionsucursal);
		$stmt->bindParam(6, $emailsucursal);
		$stmt->bindParam(7, $telefonosucursal);
		$stmt->bindParam(8, $identdirecsucursal);
		$stmt->bindParam(9, $nomdirecsucursal);
		$stmt->bindParam(10, $apedirecsucursal);
		$stmt->bindParam(11, $telefdirecsucursal);
			
		$nitsucursal = strip_tags($_POST["nitsucursal"]."-".$_POST["divv"]);
		$nombresucursal = strip_tags($_POST["nombresucursal"]);
		$departamentosucursal = strip_tags($_POST["departamentosucursal"]);
		$ciudadsucursal = strip_tags($_POST["ciudadsucursal"]);
		$direccionsucursal = strip_tags($_POST["direccionsucursal"]);
		$emailsucursal = strip_tags($_POST["emailsucursal"]);
		$telefonosucursal = strip_tags($_POST["telefonosucursal"]);
		$identdirecsucursal = strip_tags($_POST["identdirecsucursal"]);
		$nomdirecsucursal = strip_tags($_POST["nomdirecsucursal"]);
		$apedirecsucursal = strip_tags($_POST["apedirecsucursal"]);
		$telefdirecsucursal = strip_tags($_POST["telefdirecsucursal"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
    echo "<span class='fa fa-check-square-o'></span> LA SUCURSAL FUE REGISTRADA EXITOSAMENTE </div>";
    exit;
		
		}
		else
		{
			echo "3";
			exit;
		}
	}
################################# FUNCION REGISTRAR SUCURSALES ######################################

################################# FUNCION LISTAR SUCURSALES ######################################
	public function ListarSucursal()
	{
		self::SetNames();
$sql = " SELECT * FROM sucursales INNER JOIN departamentos ON sucursales.departamentosucursal = departamentos.id";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################# FUNCION LISTAR SUCURSALES ######################################

################################# FUNCION ID SUCURSALES ######################################
	public function SucursalPorId()
	{
		self::SetNames();
		$sql = " SELECT * FROM sucursales INNER JOIN departamentos ON sucursales.departamentosucursal = departamentos.id WHERE sucursales.codsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codsucursal"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
################################# FUNCION ID SUCURSALES ######################################

################################# FUNCION ACTUALIZAR SUCURSALES ######################################
	public function ActualizarSucursal()
	{
		if(empty($_POST["nombresucursal"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		$sql = " select * from sucursales where codsucursal != ? and nitsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codsucursal"], $_POST["nitsucursal"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update sucursales set "
			  ." nitsucursal = ?, "
			  ." nombresucursal = ?, "
			  ." departamentosucursal = ?, "
			  ." ciudadsucursal = ?, "
			  ." direccionsucursal = ?, "
			  ." emailsucursal = ?, "
			  ." telefonosucursal = ?, "
			  ." identdirecsucursal = ?, "
			  ." nomdirecsucursal = ?, "
			  ." apedirecsucursal = ?, "
			  ." telefdirecsucursal = ? "
			  ." where "
			  ." codsucursal = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $nitsucursal);
		$stmt->bindParam(2, $nombresucursal);
		$stmt->bindParam(3, $departamentosucursal);
		$stmt->bindParam(4, $ciudadsucursal);
		$stmt->bindParam(5, $direccionsucursal);
		$stmt->bindParam(6, $emailsucursal);
		$stmt->bindParam(7, $telefonosucursal);
		$stmt->bindParam(8, $identdirecsucursal);
		$stmt->bindParam(9, $nomdirecsucursal);
		$stmt->bindParam(10, $apedirecsucursal);
		$stmt->bindParam(11, $telefdirecsucursal);
		$stmt->bindParam(12, $codsucursal);
			
		$nitsucursal = strip_tags($_POST["nitsucursal"]."-".$_POST["divv"]);
		$nombresucursal = strip_tags($_POST["nombresucursal"]);
		$departamentosucursal = strip_tags($_POST["departamentosucursal"]);
		$ciudadsucursal = strip_tags($_POST["ciudadsucursal"]);
		$direccionsucursal = strip_tags($_POST["direccionsucursal"]);
		$emailsucursal = strip_tags($_POST["emailsucursal"]);
		$telefonosucursal = strip_tags($_POST["telefonosucursal"]);
		$identdirecsucursal = strip_tags($_POST["identdirecsucursal"]);
		$nomdirecsucursal = strip_tags($_POST["nomdirecsucursal"]);
		$apedirecsucursal = strip_tags($_POST["apedirecsucursal"]);
		$telefdirecsucursal = strip_tags($_POST["telefdirecsucursal"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$stmt->execute();
		
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA SUCURSAL FUE ACTUALIZADA EXITOSAMENTE </div>";
		exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
################################# FUNCION ACTUALIZAR SUCURSALES ######################################

################################# FUNCION ELIMINAR SUCURSALES ######################################
	public function EliminarSucursal()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select codsucursal from citasmedicas where codsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codsucursal"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from sucursales where codsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codsucursal);
		$codsucursal = base64_decode($_GET["codsucursal"]);
		$stmt->execute();
		
		header("Location: sucursales?mesage=1");
		exit;
		   
		   }else {
		   
			header("Location: sucursales?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: sucursales?mesage=3");
		exit;
	    }	
	}
################################# FUNCION ELIMINAR SUCURSALES ######################################

##################################### FIN DE CLASE SUCURSALES ###################################






































############################################# CLASE SEDES ############################################

###################################### FUNCION REGISTRAR SEDES #####################################
	public function RegistrarSedes()
	{
		self::SetNames();
		if(empty($_POST["nombresede"]) or empty($_POST["departamentosede"]) or empty($_POST["ciudadsede"]))
		{
			echo "1";
			exit;
		}
		
		$sql = " select nombresede from sedes where nombresede = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["nombresede"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into sedes values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codsucursal);
		$stmt->bindParam(2, $nombresede);
		$stmt->bindParam(3, $departamentosede);
		$stmt->bindParam(4, $ciudadsede);
		$stmt->bindParam(5, $direccionsede);
		$stmt->bindParam(6, $emailsede);
		$stmt->bindParam(7, $telefonosede);
		$stmt->bindParam(8, $identdirecsede);
		$stmt->bindParam(9, $nomdirecsede);
		$stmt->bindParam(10, $apedirecsede);
		$stmt->bindParam(11, $telefdirecsede);
			
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$nombresede = strip_tags($_POST["nombresede"]);
		$departamentosede = strip_tags($_POST["departamentosede"]);
		$ciudadsede = strip_tags($_POST["ciudadsede"]);
		$direccionsede = strip_tags($_POST["direccionsede"]);
		$emailsede = strip_tags($_POST["emailsede"]);
		$telefonosede = strip_tags($_POST["telefonosede"]);
		$identdirecsede = strip_tags($_POST["identdirecsede"]);
		$nomdirecsede = strip_tags($_POST["nomdirecsede"]);
		$apedirecsede = strip_tags($_POST["apedirecsede"]);
		$telefdirecsede = strip_tags($_POST["telefdirecsede"]);
		$stmt->execute();
		
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA SEDE FUE REGISTRADA EXITOSAMENTE </div>";
		exit;
		
		}
		else
		{
			echo "3";
			exit;
		}
	}
###################################### FUNCION REGISTRAR SEDES #####################################

###################################### FUNCION LISTAR SEDES #####################################
	public function ListarSedes()
	{
		self::SetNames();
		$sql = " SELECT * FROM sedes INNER JOIN sucursales ON sedes.codsucursal = sucursales.codsucursal INNER JOIN departamentos ON sedes.departamentosede = departamentos.id";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
###################################### FUNCION LISTAR SEDES #####################################

###################################### FUNCION ID SEDES ######################################
	public function SedesPorId()
	{
		self::SetNames();
		$sql = " SELECT * FROM sedes INNER JOIN sucursales ON sedes.codsucursal = sucursales.codsucursal INNER JOIN departamentos ON sedes.departamentosede = departamentos.id WHERE sedes.codsede = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codsede"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
###################################### FUNCION ID SEDES ######################################

###################################### FUNCION ACTUALIZAR SEDES ######################################
	public function ActualizarSedes()
	{
		if(empty($_POST["nombresede"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		$sql = " select * from sedes where codsede != ? and nombresede = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codsede"], $_POST["nombresede"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update sedes set "
			  ." codsucursal = ?, "
			  ." nombresede = ?, "
			  ." departamentosede = ?, "
			  ." ciudadsede = ?, "
			  ." direccionsede = ?, "
			  ." emailsede = ?, "
			  ." telefonosede = ?, "
			  ." identdirecsede = ?, "
			  ." nomdirecsede = ?, "
			  ." apedirecsede = ?, "
			  ." telefdirecsede = ? "
			  ." where "
			  ." codsede = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $codsucursal);
		$stmt->bindParam(2, $nombresede);
		$stmt->bindParam(3, $departamentosede);
		$stmt->bindParam(4, $ciudadsede);
		$stmt->bindParam(5, $direccionsede);
		$stmt->bindParam(6, $emailsede);
		$stmt->bindParam(7, $telefonosede);
		$stmt->bindParam(8, $identdirecsede);
		$stmt->bindParam(9, $nomdirecsede);
		$stmt->bindParam(10, $apedirecsede);
		$stmt->bindParam(11, $telefdirecsede);
		$stmt->bindParam(12, $codsede);
			
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$nombresede = strip_tags($_POST["nombresede"]);
		$departamentosede = strip_tags($_POST["departamentosede"]);
		$ciudadsede = strip_tags($_POST["ciudadsede"]);
		$direccionsede = strip_tags($_POST["direccionsede"]);
		$emailsede = strip_tags($_POST["emailsede"]);
		$telefonosede = strip_tags($_POST["telefonosede"]);
		$identdirecsede = strip_tags($_POST["identdirecsede"]);
		$nomdirecsede = strip_tags($_POST["nomdirecsede"]);
		$apedirecsede = strip_tags($_POST["apedirecsede"]);
		$telefdirecsede = strip_tags($_POST["telefdirecsede"]);
		$codsede = strip_tags($_POST["codsede"]);
		$stmt->execute();
		
		
	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA SEDE FUE ACTUALIZADA EXITOSAMENTE </div>";
		exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
###################################### FUNCION ACTUALIZAR SEDES ######################################

###################################### FUNCION ELIMINAR SEDES ######################################
	public function EliminarSedes()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select codsede from citasmedicas where codsede = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codsede"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from sedes where codsede = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codsede);
		$codsede = base64_decode($_GET["codsede"]);
		$stmt->execute();
		
		header("Location: sedes?mesage=1");
		exit;
		   
		   }else {
		   
			header("Location: sedes?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: sedes?mesage=3");
		exit;
	    }	
	}
###################################### FUNCION ELIMINAR SEDES ######################################

########################################## FIN DE CLASE SEDES  ##########################################







































############################################# CLASE EPS ###########################################

###################################### FUNCION REGISTRAR EPS ######################################
	public function RegistrarEps()
	{
		self::SetNames();
		if(empty($_POST["codigo"]) or empty($_POST["nomentidad"]))
		{
			echo "1";
			exit;
		}
		
		$sql = " select codigo from eps where codigo = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codigo"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into eps values (null, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codigo);
		$stmt->bindParam(2, $nomentidad);
		$stmt->bindParam(3, $nit);
		$stmt->bindParam(4, $tipo);
		$stmt->bindParam(5, $dv);
		$stmt->bindParam(6, $expedida);
		$stmt->bindParam(7, $nomcontabilidad);
			
		$codigo = strip_tags($_POST["codigo"]);
		$nomentidad = strip_tags($_POST["nomentidad"]);
		$nit = strip_tags($_POST["nit"]);
		$tipo = strip_tags($_POST["tipo"]);
		$dv = strip_tags($_POST["dv"]);
		$expedida = strip_tags($_POST["expedida"]);
		$nomcontabilidad = strip_tags($_POST["nomcontabilidad"]);
		$stmt->execute();
		
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> EL EPS FUE REGISTRADO EXITOSAMENTE </div>";
		exit;
		
		}
		else
		{
			echo "3";
			exit;
		}
	}
###################################### FUNCION REGITRAR EPS ######################################

###################################### FUNCION LISTAR EPS ######################################
	public function ListarEps()
	{
		self::SetNames();
		$sql = " select * from eps ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
###################################### FUNCION LISTAR EPS ######################################

###################################### FUNCION ID EPS ######################################
	public function EpsPorId()
	{
		self::SetNames();
		$sql = " select * from eps where codeps = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codeps"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
###################################### FUNCION ID EPS ######################################

###################################### FUNCION ACTUALIZAR EPS ######################################
	public function ActualizarEps()
	{
		if(empty($_POST["nomentidad"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		$sql = " select * from eps where codeps != ? and codigo = ? and nomentidad = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codeps"], $_POST["codigo"], $_POST["nomentidad"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update eps set "
			   ." codigo = ?, "
			   ." nomentidad = ?, "
			   ." nit = ?, "
			   ." tipo = ?, "
			   ." dv = ?, "
			   ." expedida = ?, "
			   ." nomcontabilidad = ? "
			  ." where "
			  ." codeps = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $codigo);
		$stmt->bindParam(2, $nomentidad);
		$stmt->bindParam(3, $nit);
		$stmt->bindParam(4, $tipo);
		$stmt->bindParam(5, $dv);
		$stmt->bindParam(6, $expedida);
		$stmt->bindParam(7, $nomcontabilidad);
		$stmt->bindParam(8, $codeps);
			
		$codigo = strip_tags($_POST["codigo"]);
		$nomentidad = strip_tags($_POST["nomentidad"]);
		$nit = strip_tags($_POST["nit"]);
		$tipo = strip_tags($_POST["tipo"]);
		$dv = strip_tags($_POST["dv"]);
		$expedida = strip_tags($_POST["expedida"]);
		$nomcontabilidad = strip_tags($_POST["nomcontabilidad"]);
		$codeps = strip_tags($_POST["codeps"]);
		$stmt->execute();
		
	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> EL EPS FUE ACTUALIZADO EXITOSAMENTE </div>"; 
		exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
###################################### FUNCION ACTUALIZAR EPS ######################################

###################################### FUNCION ELIMINAR EPS ######################################
	public function EliminarEps()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select eps from pacientes where eps = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codeps"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from eps where codeps = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codeps);
		$codeps = base64_decode($_GET["codeps"]);
		$stmt->execute();
		
		header("Location: eps?mesage=1");
		exit;
		   
		   }else {
		   
			header("Location: eps?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: eps?mesage=3");
		exit;
	    }	
	}
###################################### FUNCION ELIMINAR EPS ######################################

############################################# FIN CLASE EPS ##################################################










































################################# CLASE VALORES EXAMENES DE LABORATORIO ###################################

############################## FUNCION REGISTRAR VALORES EXAMENES DE LABORATORIO ############################
public function RegistrarValorLaboratorio()
	{
		self::SetNames();
		if(empty($_POST["codvalores"]) or empty($_POST["hematocritov"]) or empty($_POST["hemoglobinav"]))
		{
			echo "1";
			exit;
		}
		
	
		$query = " insert into valoreslaboratorio values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codvalores);
		$stmt->bindParam(2, $hematocrito);
		$stmt->bindParam(3, $hemoglobina);
		$stmt->bindParam(4, $leucocitos);
		$stmt->bindParam(5, $neutrofilos);
		$stmt->bindParam(6, $linfocitos);
		$stmt->bindParam(7, $eosinofilos);
		$stmt->bindParam(8, $monositos);
		$stmt->bindParam(9, $basofilos);
		$stmt->bindParam(10, $cayados);
		$stmt->bindParam(11, $plaquetas);
		$stmt->bindParam(12, $reticulositos);
		$stmt->bindParam(13, $vsg);
		$stmt->bindParam(14, $pt);
		$stmt->bindParam(15, $ptt);
		$stmt->bindParam(16, $glucosa);
		$stmt->bindParam(17, $colesteroltotal);
		$stmt->bindParam(18, $colesterolhdl);
		$stmt->bindParam(19, $colesterolldl);
		$stmt->bindParam(20, $trigliceridos);
		$stmt->bindParam(21, $acidourico);
		$stmt->bindParam(22, $nitrogenoureico);
		$stmt->bindParam(23, $creatinina);
		$stmt->bindParam(24, $proteinastotales);
		$stmt->bindParam(25, $albumina);
		$stmt->bindParam(26, $globulina);
		$stmt->bindParam(27, $bilirrubinatotal);
		$stmt->bindParam(28, $bilirrubinadirecta);
		$stmt->bindParam(29, $bilirrubinaindirecta);
		$stmt->bindParam(30, $fosfatasaalcalina);
		$stmt->bindParam(31, $tgo);
		$stmt->bindParam(32, $tgp);
		$stmt->bindParam(33, $amilasa);
				
		$codvalores = strip_tags($_POST['codvalores']);	
		$hematocrito = strip_tags($_POST['hematocritov']);
		$hemoglobina = strip_tags($_POST['hemoglobinav']); 
		$leucocitos = strip_tags($_POST['leucocitosv']); 
		$neutrofilos = strip_tags($_POST['neutrofilosv']); 
		$linfocitos = strip_tags($_POST['linfocitosv']); 
		$eosinofilos = strip_tags($_POST['eosinofilosv']); 
		$monositos = strip_tags($_POST['monositosv']); 
		$basofilos = strip_tags($_POST['basofilosv']); 
		$cayados = strip_tags($_POST['cayadosv']); 
		$plaquetas = strip_tags($_POST['plaquetasv']); 
		$reticulositos = strip_tags($_POST['reticulositosv']); 
		$vsg = strip_tags($_POST['vsgv']); 
		$pt = strip_tags($_POST['ptv']); 
		$ptt = strip_tags($_POST['pttv']); 
		$glucosa = strip_tags($_POST['glucosav']);
		$colesteroltotal = strip_tags($_POST['colesteroltotalv']); 
		$colesterolhdl = strip_tags($_POST['colesterolhdlv']); 
		$colesterolldl = strip_tags($_POST['colesterolldlv']); 
		$trigliceridos = strip_tags($_POST['trigliceridosv']); 
		$acidourico = strip_tags($_POST['acidouricov']); 
		$nitrogenoureico = strip_tags($_POST['nitrogenoureicov']); 
		$creatinina = strip_tags($_POST['creatininav']); 
		$proteinastotales = strip_tags($_POST['proteinastotalesv']); 
		$albumina = strip_tags($_POST['albuminav']); 
		$globulina = strip_tags($_POST['globulinav']);
		$bilirrubinatotal = strip_tags($_POST['bilirrubinatotalv']); 
		$bilirrubinadirecta = strip_tags($_POST['bilirrubinadirectav']); 
	    $bilirrubinaindirecta = strip_tags($_POST['bilirrubinaindirectav']); 
		$fosfatasaalcalina = strip_tags($_POST['fosfatasaalcalinav']); 
		$tgo = strip_tags($_POST['tgov']); 
		$tgp = strip_tags($_POST['tgpv']); 
		$amilasa = strip_tags($_POST['amilasav']); 
		$stmt->execute();

		
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LOS VALORES NORMALES DE EXAMEN DE LABORATORIO FUERON REGISTRADOS EXITOSAMENTE </div>";
		exit;
		}
		
	
############################## FUNCION REGISTRAR VALORES EXAMENES DE LABORATORIO ############################
	
############################## FUNCION ID VALORES EXAMENES DE LABORATORIO ############################
	public function ValorLaboratorioPorId()
	{
		self::SetNames();
		$sql = " select * from valoreslaboratorio where codvalores = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array('1') );
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################## FUNCION ID VALORES EXAMENES DE LABORATORIO ############################
	
############################## FUNCION ACTUALIZAR VALORES EXAMENES DE LABORATORIO ############################
	public function ActualizarValorLaboratorio()
	{
		if(empty($_POST["hematocritov"]))
		{
			echo "1";
		    exit;
		}
		
		self::SetNames();
		$sql = " update valoreslaboratorio set "
			  ." hematocritov = ?, "
			  ." hemoglobinav = ?, "
			  ." leucocitosv = ?, "
			  ." neutrofilosv = ?, "
			  ." linfocitosv = ?, "
			  ." eosinofilosv = ?, "
			  ." monositosv = ?, "
			  ." basofilosv = ?, "
			  ." cayadosv = ?, "
			  ." plaquetasv = ?, "
			  ." reticulositosv = ?, "
			  ." vsgv = ?, "
			  ." ptv = ?, "
			  ." pttv = ?, "
			  ." glucosav = ?, "
			  ." colesteroltotalv = ?, "
			  ." colesterolhdlv = ?, "
			  ." colesterolldlv = ?, "
			  ." trigliceridosv = ?, "
			  ." acidouricov = ?, "
			  ." nitrogenoureicov = ?, "
			  ." creatininav = ?, "
			  ." proteinastotalesv = ?, "
			  ." albuminav = ?, "
			  ." globulinav = ?, "
			  ." bilirrubinatotalv = ?, "
			  ." bilirrubinadirectav = ?, "
			  ." bilirrubinaindirectav = ?, "
			  ." fosfatasaalcalinav = ?, "
			  ." tgov = ?, "
			  ." tgpv = ?, "
			  ." amilasav = ? "
			  ." where "
			  ." codvalores = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $hematocrito);
		$stmt->bindParam(2, $hemoglobina);
		$stmt->bindParam(3, $leucocitos);
		$stmt->bindParam(4, $neutrofilos);
		$stmt->bindParam(5, $linfocitos);
		$stmt->bindParam(6, $eosinofilos);
		$stmt->bindParam(7, $monositos);
		$stmt->bindParam(8, $basofilos);
		$stmt->bindParam(9, $cayados);
		$stmt->bindParam(10, $plaquetas);
		$stmt->bindParam(11, $reticulositos);
		$stmt->bindParam(12, $vsg);
		$stmt->bindParam(13, $pt);
		$stmt->bindParam(14, $ptt);
		$stmt->bindParam(15, $glucosa);
		$stmt->bindParam(16, $colesteroltotal);
		$stmt->bindParam(17, $colesterolhdl);
		$stmt->bindParam(18, $colesterolldl);
		$stmt->bindParam(19, $trigliceridos);
		$stmt->bindParam(20, $acidourico);
		$stmt->bindParam(21, $nitrogenoureico);
		$stmt->bindParam(22, $creatinina);
		$stmt->bindParam(23, $proteinastotales);
		$stmt->bindParam(24, $albumina);
		$stmt->bindParam(25, $globulina);
		$stmt->bindParam(26, $bilirrubinatotal);
		$stmt->bindParam(27, $bilirrubinadirecta);
		$stmt->bindParam(28, $bilirrubinaindirecta);
		$stmt->bindParam(29, $fosfatasaalcalina);
		$stmt->bindParam(30, $tgo);
		$stmt->bindParam(31, $tgp);
		$stmt->bindParam(32, $amilasa);
		$stmt->bindParam(33, $codvalores);
				
			
		$hematocrito = $_POST['hematocritov'];
		$hemoglobina = $_POST['hemoglobinav']; 
		$leucocitos = $_POST['leucocitosv']; 
		$neutrofilos = $_POST['neutrofilosv']; 
		$linfocitos = $_POST['linfocitosv']; 
		$eosinofilos = $_POST['eosinofilosv']; 
		$monositos = $_POST['monositosv']; 
		$basofilos = $_POST['basofilosv']; 
		$cayados = $_POST['cayadosv']; 
		$plaquetas = $_POST['plaquetasv']; 
		$reticulositos = $_POST['reticulositosv']; 
		$vsg = $_POST['vsgv']; 
		$pt = $_POST['ptv']; 
		$ptt = $_POST['pttv']; 
		$glucosa = $_POST['glucosav'];
		$colesteroltotal = $_POST['colesteroltotalv']; 
		$colesterolhdl = $_POST['colesterolhdlv']; 
		$colesterolldl = $_POST['colesterolldlv']; 
		$trigliceridos = $_POST['trigliceridosv']; 
		$acidourico = $_POST['acidouricov']; 
		$nitrogenoureico = $_POST['nitrogenoureicov']; 
		$creatinina = $_POST['creatininav']; 
		$proteinastotales = $_POST['proteinastotalesv']; 
		$albumina = $_POST['albuminav']; 
		$globulina = $_POST['globulinav'];
		$bilirrubinatotal = $_POST['bilirrubinatotalv']; 
		$bilirrubinadirecta = $_POST['bilirrubinadirectav']; 
	    $bilirrubinaindirecta = $_POST['bilirrubinaindirectav']; 
		$fosfatasaalcalina = $_POST['fosfatasaalcalinav']; 
		$tgo = $_POST['tgov']; 
		$tgp = $_POST['tgpv']; 
		$amilasa = $_POST['amilasav']; 
	    $codvalores = $_POST['codvalores'];
		$stmt->execute();
		
		
	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LOS VALORES NORMALES DE EXAMEN DE LABORATORIO FUERON ACTUALIZADOS EXITOSAMENTE </div>";
		exit;
	}
############################## FUNCION ACTUALIZAR VALORES EXAMENES DE LABORATORIO ############################

############################### FIN CLASE VALORES EXAMENES DE LABORATORIO ###############################











































################################ CLASE PLANTILLAS ECOGRAFICAS ######################################

############################ FUNCION REGISTRAR PLANTILLAS ECOGRAFICAS ################################
	public function RegistrarPlantillaEcografia()
	{
		self::SetNames();
		if(empty($_POST["nombreplantillaecografia"]) or empty($_POST["procedimientoecografia"]))
		{
			echo "1";
			exit;
		}

	$sql = " select codplantillaecografia from plantillasecografia order by codplantillaecografia desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

     $codplantillaecografia["codplantillaecografia"]=$row["codplantillaecografia"];

      }
          if(empty($codplantillaecografia["codplantillaecografia"]))
           {
              $codplantilla = 'E00000000000001';
     } else
           {
               $num     = substr($codplantillaecografia["codplantillaecografia"] , 1);
               $dig     = $num + 1;
               $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
               $codplantilla = 'E'.$codigo;	
         }


        ###################### AQUI VALIDO SI EXISTEN MEDICOS #######################
		for($i=0;$i<count($_POST['codmedico']);$i++){  //recorro el array
        
        if (empty($_POST['codmedico'][$i]) || trim($_POST['codmedico'][$i])==""){
		echo "1";
		exit;
	                                    }
		                                        }


        ###################### AQUI VALIDO QUE NO EXISTA EL NOMBRE DE PLANTILLA #######################
		$sql = " select nombreplantillaecografia from plantillasecografia where nombreplantillaecografia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["nombreplantillaecografia"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "2";
		exit;
		}


		####################### AQUI VERIFICO QUE STE MEDICO TENGA ESTA PLANTILLA #########################
		for($i=0;$i<count($_POST['codmedico']);$i++){  //recorro el array
        if (!empty($_POST['codmedico'][$i])) {

        $sql = " select codplantilla, codmedico from asignacionplantillas where codplantilla = ? and codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($codplantilla, $_POST["codmedico"][$i]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "3";
		exit;
		}
	                                       }
		                                        }


		$query = " insert into plantillasecografia values (null, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codplantilla);
		$stmt->bindParam(2, $nombreplantillaecografia);
		$stmt->bindParam(3, $procedimientoecografia);
		$stmt->bindParam(4, $descripcionecografia);
			
		$nombreplantillaecografia = strip_tags($_POST["nombreplantillaecografia"]);
		$procedimientoecografia = strip_tags($_POST["procedimientoecografia"]);
		$descripcionecografia = strip_tags(preg_replace("/\r\n|\r|\n/",'\n',$_POST["descripcionecografia"]));
		$stmt->execute();


		 ########################### AQUI ASIGNO LA PLANTILLA A LOS MEDICOS ##############################
		for($i=0;$i<count($_POST['codmedico']);$i++){  //recorro el array
        if (!empty($_POST['codmedico'][$i])) {

        $query = " insert into asignacionplantillas values (null, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codplantilla);
		$stmt->bindParam(2, $codmedico);
			
		$codmedico = strip_tags($_POST["codmedico"][$i]);
		$stmt->execute();

	                                       }
		                                        }
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA PLANTILLA ECOGRAFICA FUE REGISTRADA EXITOSAMENTE </div>";
	exit;
}
########################## FUNCION REGISTRAR PLANTILLAS ECOGRAFICAS ################################

############################# FUNCION LISTAR PLANTILLAS ECOGRAFICA ################################
	public function ListarPlantillaEcografia()
	{
		self::SetNames();
		$sql = " select * from plantillasecografia ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################### FUNCION LISTAR PLANTILLAS ECOGRAFICA ##################################


########################### FUNCION ID PLANTILLAS ECOGRAFICA ##################################
	public function PlantillaEcografiaPorId()
	{
		self::SetNames();
		$sql = " select * from plantillasecografia where codplantillaecografia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codplantillaecografia"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################# FUNCION ID PLANTILLAS ECOGRAFICA ##################################
	
############################# FUNCION ACTUALIZAR PLANTILLAS ECOGRAFICA ##################################
	public function ActualizarPlantillaEcografia()
	{
		if(empty($_POST["nombreplantillaecografia"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		$sql = " select * from plantillasecografia where codplantillaecografia != ? and nombreplantillaecografia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codplantillaecografia"], $_POST["nombreplantillaecografia"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update plantillasecografia set "
			  ." nombreplantillaecografia = ?, "
			  ." procedimientoecografia = ?, "
			  ." descripcionecografia = ? "
			  ." where "
			  ." codplantillaecografia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $nombreplantillaecografia);
		$stmt->bindParam(2, $procedimientoecografia);
		$stmt->bindParam(3, $descripcionecografia);
		$stmt->bindParam(4, $codplantillaecografia);
			
		$nombreplantillaecografia = strip_tags($_POST["nombreplantillaecografia"]);
		$procedimientoecografia = strip_tags($_POST["procedimientoecografia"]);
		$descripcionecografia = strip_tags(preg_replace("/\r\n|\r|\n/",'\n',$_POST["descripcionecografia"]));
		$codplantillaecografia = strip_tags($_POST["codplantillaecografia"]);
		$stmt->execute();
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA PLANTILLA ECOGRAFICA FUE ACTUALIZADA EXITOSAMENTE </div>";
    exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
############################# FUNCION ACTUALIZAR PLANTILLAS ECOGRAFICA ##################################

############################# FUNCION ELIMINAR PLANTILLAS ECOGRAFICA ##################################
	public function EliminarPlantillaEcografia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select codplantilla from asignacionplantillas where codplantilla = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codplantillaecografia"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from plantillasecografia where codplantillaecografia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codplantillaecografia);
		$codplantillaecografia = base64_decode($_GET["codplantillaecografia"]);
		$stmt->execute();
		
		header("Location: plantillasginecologia?mesage=1");
		exit;
		   
		   }else {
		   
			header("Location: plantillasginecologia?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: plantillasginecologia?mesage=3");
		exit;
	    }	
	}
######################## FUNCION ELIMINAR PLANTILLAS ECOGRAFICA ##################################

########################### FUNCION ASIGNAR PLANTILLAS ECOGRAFICA ##################################
	public function AsignarPlantillaEcografia()
	{
		self::SetNames();
		if(empty($_POST["codplantillaecografia"]) or empty($_POST["codmedico"]))
		{
			echo "1";
			exit;
		}

		$sql = " select codplantilla, codmedico from asignacionplantillas where codplantilla = ? and codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codplantillaecografia"], $_POST["codmedico"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into asignacionplantillas values (null, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codplantilla);
		$stmt->bindParam(2, $codmedico);
			
		$codplantilla = strip_tags($_POST["codplantillaecografia"]);
		$codmedico = strip_tags($_POST["codmedico"]);
		$stmt->execute();
		
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA PLANTILLA ECOGRAFICA FUE ASIGNADA AL MEDICO EXITOSAMENTE </div>";
		exit;
		
	    }
		else
		{
			echo "3";
			exit;
		}
	}
########################### FUNCION ASIGNAR PLANTILLAS ECOGRAFICA ##################################

############################ FUNCION LISTAR PLANTILLAS ECOGRAFICA ASIGNADAS ###########################
public function MostrarPlantillasEcografiaAsignadas()
	{
		self::SetNames();
		$sql = "select * from asignacionplantillas, medicos WHERE asignacionplantillas.codplantilla = ? and asignacionplantillas.codmedico = medicos.codmedico";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codplantillaecografia'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		echo "";
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################# FUNCION LISTAR PLANTILLAS ECOGRAFICA ASIGNADAS ###########################

############################ FUNCION BUSCAR PLANTILLAS ECOGRAFICAS ##############################
public function BuscarPlantillasEcograficasModal()
	{
		self::SetNames();
		
 $sql ="SELECT * FROM (medicos INNER JOIN asignacionplantillas ON medicos.codmedico=asignacionplantillas.codmedico) LEFT JOIN plantillasecografia ON asignacionplantillas.codplantilla=plantillasecografia.codplantillaecografia WHERE asignacionplantillas.codmedico = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim(base64_decode($_GET['codmedico'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
	echo "<center><div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-info-circle'></span> NO TIENE PLANTILLAS DE ECOGRAFICAS ASIGNADAS ACTUALMENTE</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		  } 
}
############################ FUNCION BUSCAR PLANTILLAS ECOGRAFICAS ##############################

######################## FUNCION ELIMINAR ASIGNACION DE PLANTILLAS ECOGRAFICAS ######################
		public function EliminarAsigPlantillaEcografia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from asignacionplantillas where codasigplantilla = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codasigplantilla);
		$codasigplantilla = base64_decode($_GET["codasigplantilla"]);
		$stmt->execute();
		
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<center><span class='fa fa-check-square-o'></span> LA ASIGNACION DE PLANTILLA ECOGRAFICA FUE ELIMINADA EXITOSAMENTE </center></div>";
		exit;	
		
		} else {
		
		echo "<div class='alert alert-danger'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<center><span class='fa fa-info-circle'></span> USTED NO PUEDE ELIMINAR ASIGNACION DE PLANTILLA ECOGRAFICA, NO ERES EL ADMINISTRADOR </center></div>";
		exit;
		  }
			
		} 
######################## FUNCION ELIMINAR ASIGNACION DE PLANTILLAS ECOGRAFICAS ######################

############################# FIN CLASE PLANTILLAS ECOGRAFICAS ##################################







































################################ CLASE PLANTILLAS LECTURAS RX ###################################

############################ FUNCION REGISTRAR PLANTILLAS LECTURAS RX #############################
	public function RegistrarPlantillaLecturarx()
	{
		self::SetNames();
		if(empty($_POST["nombreplantillalecturarx"]) or empty($_POST["procedimientolecturarx"]))
		{
			echo "1";
			exit;
		}

	$sql = " select codplantillalecturarx from plantillaslecturarx order by codplantillalecturarx desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codplantillalecturarx["codplantillalecturarx"]=$row["codplantillalecturarx"];

      }
          if(empty($codplantillalecturarx["codplantillalecturarx"]))
           {
              $codplantilla = 'L00000000000001';
     }else
           {
               $num     = substr($codplantillalecturarx["codplantillalecturarx"] , 1);
               $dig     = $num + 1;
               $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
               $codplantilla = 'L'.$codigo;	
         }


        ###################### AQUI VALIDO SI EXISTEN MEDICOS #######################
		for($i=0;$i<count($_POST['codmedico']);$i++){  //recorro el array
        
        if (empty($_POST['codmedico'][$i]) || trim($_POST['codmedico'][$i])==""){
		echo "1";
		exit;
	                                    }
		                                        }


        ###################### AQUI VALIDO QUE NO EXISTA EL NOMBRE DE PLANTILLA #######################
		$sql = " select nombreplantillalecturarx from plantillaslecturarx where nombreplantillalecturarx = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["nombreplantillalecturarx"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "2";
		exit;
		}



		####################### AQUI VERIFICO QUE STE MEDICO TENGA ESTA PLANTILLA #########################
		for($i=0;$i<count($_POST['codmedico']);$i++){  //recorro el array
        if (!empty($_POST['codmedico'][$i])) {

        $sql = " select codplantilla, codmedico from asignacionplantillas where codplantilla = ? and codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($codplantilla, $_POST["codmedico"][$i]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "3";
		exit;
		}
	                                       }
		                                        }


		$query = " insert into plantillaslecturarx values (null, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codplantilla);
		$stmt->bindParam(2, $nombreplantillalecturarx);
		$stmt->bindParam(3, $procedimientolecturarx);
		$stmt->bindParam(4, $descripcionlecturarx);
			
		$nombreplantillalecturarx = strip_tags($_POST["nombreplantillalecturarx"]);
		$procedimientolecturarx = strip_tags($_POST["procedimientolecturarx"]);
		$descripcionlecturarx = strip_tags(preg_replace("/\r\n|\r|\n/",'\n',$_POST["descripcionlecturarx"]));
		$stmt->execute();
		
		
		 ########################### AQUI ASIGNO LA PLANTILLA A LOS MEDICOS ##############################
		for($i=0;$i<count($_POST['codmedico']);$i++){  //recorro el array
        if (!empty($_POST['codmedico'][$i])) {

        $query = " insert into asignacionplantillas values (null, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codplantilla);
		$stmt->bindParam(2, $codmedico);
			
		$codmedico = strip_tags($_POST["codmedico"][$i]);
		$stmt->execute();

	                                       }
		                                        }
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA PLANTILLA PARA LECTURA RX FUE REGISTRADA EXITOSAMENTE </div>";
	exit;
}
########################### FUNCION REGISTRAR PLANTILLAS LECTURAS RX #############################

######################### FUNCION LISTAR PLANTILLAS LECTURAS RX #################################
	public function ListarPlantillaLecturarx()
	{
		self::SetNames();
		$sql = " select * from plantillaslecturarx ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
############################ FUNCION LISTAR PLANTILLAS LECTURAS RX ###################################

############################ FUNCION ID PLANTILLAS LECTURAS RX ###################################
	public function PlantillaLecturarxPorId()
	{
		self::SetNames();
		$sql = " select * from plantillaslecturarx where codplantillalecturarx = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codplantillalecturarx"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################ FUNCION ID PLANTILLAS LECTURAS RX ###################################

############################ FUNCION ACUALIZAR PLANTILLAS LECTURAS RX ###############################
	public function ActualizarPlantillaLecturarx()
	{
		if(empty($_POST["nombreplantillalecturarx"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		$sql = " select * from plantillaslecturarx where codplantillalecturarx != ? and nombreplantillalecturarx = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codplantillalecturarx"], $_POST["nombreplantillalecturarx"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update plantillaslecturarx set "
			  ." nombreplantillalecturarx = ?, "
			  ." procedimientolecturarx = ?, "
			  ." descripcionlecturarx = ? "
			  ." where "
			  ." codplantillalecturarx = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $nombreplantillalecturarx);
		$stmt->bindParam(2, $procedimientolecturarx);
		$stmt->bindParam(3, $descripcionlecturarx);
		$stmt->bindParam(4, $codplantillalecturarx);
			
		$nombreplantillalecturarx = strip_tags($_POST["nombreplantillalecturarx"]);
		$procedimientolecturarx = strip_tags($_POST["procedimientolecturarx"]);
		$descripcionlecturarx = strip_tags(preg_replace("/\r\n|\r|\n/",'\n',$_POST["descripcionlecturarx"]));
		$codplantillalecturarx = strip_tags($_POST["codplantillalecturarx"]);
		$stmt->execute();
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA PLANTILLA DE LECTURA RX FUE ACTUALIZADA EXITOSAMENTE </div>";
	exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
########################### FUNCION ACUALIZAR PLANTILLAS LECTURAS RX ##############################

########################### FUNCION ELIMINAR PLANTILLAS LECTURAS RX ##############################
	public function EliminarPlantillaLecturarx()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select codplantilla from asignacionplantillas where codplantilla = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codplantillalecturarx"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from plantillaslecturarx where codplantillalecturarx = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codplantillalecturarx);
		$codplantillalecturarx = base64_decode($_GET["codplantillalecturarx"]);
		$stmt->execute();
		
		header("Location: plantillasradiologia?mesage=1");
		exit;
		   
		   }else {
		   
			header("Location: plantillasradiologia?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: plantillasginecologia?mesage=3");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR PLANTILLAS LECTURAS RX ##############################

########################### FUNCION ASIGNAR PLANTILLAS LECTURAS RX ##############################
	public function AsignarPlantillaLecturarx()
	{
		self::SetNames();
		if(empty($_POST["codplantillalecturarx"]) or empty($_POST["codmedico"]))
		{
			echo "1";
			exit;
		}

		$sql = " select codplantilla, codmedico from asignacionplantillas where codplantilla = ? and codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codplantillalecturarx"], $_POST["codmedico"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into asignacionplantillas values (null, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codplantilla);
		$stmt->bindParam(2, $codmedico);
			
		$codplantilla = strip_tags($_POST["codplantillalecturarx"]);
		$codmedico = strip_tags($_POST["codmedico"]);
		$stmt->execute();
		
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA PLANTILLA DE LECTURA RX FUE ASIGNADA AL MEDICO EXITOSAMENTE </div>";
		exit;
		
	    }
		else
		{
			echo "3";
			exit;
		}
	}
############################# FUNCION ASIGNAR PLANTILLAS LECTURAS RX ##############################
	
########################## FUNCION ASIGNAR PLANTILLAS LECTURAS RX ASIGNADAS #########################
public function MostrarPlantillasLecturarxAsignadas()
	{
		self::SetNames();
		$sql = "select * from asignacionplantillas, medicos WHERE asignacionplantillas.codplantilla = ? and asignacionplantillas.codmedico = medicos.codmedico";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codplantillalecturarx'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		echo "";
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
######################## FUNCION LISTAR PLANTILLAS LECTURAS RX ASIGNADAS ###########################

############################ FUNCION BUSCAR PLANTILLAS LECTURA RX POR MEDICO ##############################
public function BuscarPlantillasLecturaRxModal()
	{
		self::SetNames();
		
 $sql ="SELECT * FROM (medicos INNER JOIN asignacionplantillas ON medicos.codmedico=asignacionplantillas.codmedico) LEFT JOIN plantillaslecturarx ON asignacionplantillas.codplantilla=plantillaslecturarx.codplantillalecturarx WHERE asignacionplantillas.codmedico = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim(base64_decode($_GET['codmedico'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
	echo "<center><div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-info-circle'></span> NO TIENE PLANTILLAS DE LECTURAS RX ASIGNADAS ACTUALMENTE</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		  } 
}
############################ FUNCION BUSCAR PLANTILLAS LECTURA RX POR MEDICO ##############################

########################### FUNCION ELIMINAR ASIGNACION DE PLANTILLAS LECTURAS RX #######################
public function EliminarAsigPlantillaLecturarx()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from asignacionplantillas where codasigplantilla = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codasigplantilla);
		$codasigplantilla = base64_decode($_GET["codasigplantilla"]);
		$stmt->execute();
		
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<center><span class='fa fa-check-square-o'></span> LA ASIGNACION DE PLANTILLA LECTURA RX FUE ELIMINADA EXITOSAMENTE </center></div>";
		exit;	
		
		} else {
		
		echo "<div class='alert alert-danger'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<center><span class='fa fa-info-circle'></span> USTED NO PUEDE ELIMINAR ASIGNACION DE PLANTILLA LECTURA RX, NO ERES EL ADMINISTRADOR </center></div>";
		exit;
		  }
			
		} 
########################### FUNCION ELIMINAR ASIGNACION DE PLANTILLAS LECTURAS RX #######################

############################# FIN CLASE PLANTILLAS LECTURAS RX ###################################































####################################### CLASE MEDICOS ##########################################

###################################### FUNCION REGISTRAR MEDICOS ######################################
	public function RegistrarMedicos()
	{
		self::SetNames();
		if(empty($_POST["identmedico"]) or empty($_POST["cedmedico"]))
		{
			echo "1";
			exit;
		}
		
		$sql = " select correomedico from medicos where correomedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["correomedico"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "2";
		exit;
		}
		else
		{
		
		$sql = " select cedmedico from medicos where cedmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["cedmedico"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into medicos values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $identmedico);
		$stmt->bindParam(2, $cedmedico);
		$stmt->bindParam(3, $tpmedico);
		$stmt->bindParam(4, $nommedico);
		$stmt->bindParam(5, $apemedico);
		$stmt->bindParam(6, $tlfmedico);
		$stmt->bindParam(7, $sexomedico);
		$stmt->bindParam(8, $correomedico);
		$stmt->bindParam(9, $direcmedico);
		$stmt->bindParam(10, $moduloespec);
		$stmt->bindParam(11, $especmedico);
		$stmt->bindParam(12, $fnacmedico);
		$stmt->bindParam(13, $clavemedico);
			
		$identmedico = strip_tags($_POST["identmedico"]);
		$cedmedico = strip_tags($_POST["cedmedico"]);
		$tpmedico = strip_tags($_POST["tpmedico"]);
		$nommedico = strip_tags($_POST["nommedico"]);
		$apemedico = strip_tags($_POST["apemedico"]);
		$tlfmedico = strip_tags($_POST["tlfmedico"]);
		$sexomedico = strip_tags($_POST["sexomedico"]);
		$correomedico = strip_tags($_POST["correomedico"]);
		$direcmedico = strip_tags($_POST["direcmedico"]);
		$moduloespec = strip_tags($_POST["moduloespec"]);
		$especmedico = strip_tags($_POST["especmedico"]);
		$fnacmedico = strip_tags(date("Y-m-d",strtotime($_POST['fnacmedico'])));
		//$clavemedico = sha1(md5($cedmedico));
		$clavemedico = $cedmedico;
		$stmt->execute();
		
##################  SUBIR FOTO DE FIRMA DE MEDICOS ######################################
         //datos del arhivo  
         if (isset($_FILES['imagen']['name'])) { $nombre_archivo = $_FILES['imagen']['name']; } else { $nombre_archivo =''; }
		 if (isset($_FILES['imagen']['type'])) { $tipo_archivo = $_FILES['imagen']['type']; } else { $tipo_archivo =''; }
		 if (isset($_FILES['imagen']['size'])) { $tamano_archivo = $_FILES['imagen']['size']; } else { $tamano_archivo =''; }
		 //$nombre_archivo = $_FILES['imagen']['name'];  
         //$tipo_archivo = $_FILES['imagen']['type'];  
         //$tamano_archivo = $_FILES['imagen']['size'];  
         //compruebo si las características del archivo son las que deseo  
if ((strpos($tipo_archivo,'image/jpeg')!==false)&&$tamano_archivo<200000) 
{  
if (move_uploaded_file($_FILES['imagen']['tmp_name'], "firmasdigitales/".$nombre_archivo) && rename("firmasdigitales/".$nombre_archivo,"firmasdigitales/".$_POST["cedmedico"].".jpg"))
{ 
## se puede dar un aviso
} 
## se puede dar otro aviso 
}
##################  FINALIZA SUBIR FOTO DE FIRMA DE USUARIOS ######################################

		
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> EL MEDICO FUE REGISTRADO EXITOSAMENTE </div>";
		exit;
		
		}
		else
		{
			echo "3";
			exit;
		}
	}  }
###################################### FUNCION REGISTRAR MEDICOS ######################################

###################################### FUNCION LISTAR MEDICOS ######################################
	public function ListarMedicos()
	{
		self::SetNames();
		$sql = " select * from medicos ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
###################################### FUNCION LISTAR MEDICOS ######################################

################################ FUNCION LISTAR MEDICOS GENERAL ##################################
	public function ListarMedicosEspecialidadGeneral()
	{
		self::SetNames();
		$sql = " select * from medicos where moduloespec = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################ FUNCION LISTAR MEDICOS GENERAL ##################################

############################### FUNCION LISTAR MEDICOS GINECOLOGO #################################
	public function ListarMedicosEspecialidadGinecologia()
	{
		self::SetNames();
		$sql = " select * from medicos where moduloespec = 'GINECOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
############################### FUNCION LISTAR MEDICOS GINECOLOGO ######################################

################################## FUNCION LISTAR MEDICOS BACTERIOLOGO #################################
	public function ListarMedicosEspecialidadBacteriologo()
	{
		self::SetNames();
		$sql = " select * from medicos where moduloespec = 'BACTERIOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################# FUNCION LISTAR MEDICOS BACTERIOLOGO ###############################

############################## FUNCION LISTAR MEDICOS RADIOLOGO #################################
	public function ListarMedicosEspecialidadRadiologo()
	{
		self::SetNames();
		$sql = " select * from medicos where moduloespec = 'RADIOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
############################### FUNCION LISTAR MEDICOS RADIOLOGO ################################

############################## FUNCION LISTAR MEDICOS TERAPEUTA ####################################
	public function ListarMedicosEspecialidadTerapeuta()
	{
		self::SetNames();
		$sql = " select * from medicos where moduloespec = 'TERAPEUTA'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
############################## FUNCION LISTAR MEDICOS TERAPEUTA ###################################
	
################################ FUNCION LISTAR MEDICOS ODONTOLOGO #################################
	public function ListarMedicosEspecialidadOdontologo()
	{
		self::SetNames();
		$sql = " select * from medicos where moduloespec = 'ODONTOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################ FUNCION LISTAR MEDICOS ODONTOLOGO #################################

###################################### FUNCION ID MEDICOS ######################################
	public function MedicosPorId()
	{
		self::SetNames();
	$sql = " select * from medicos where codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codmedico"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
###################################### FUNCION ID MEDICOS ######################################

###################################### FUNCION ID MEDICOS SESSION ################################
	public function MedicosSessionPorId()
	{
		self::SetNames();
	$sql = " select * from medicos where codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_SESSION["codmedico"]));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
###################################### FUNCION ID MEDICOS SESSION ################################

###################################### FUNCION ACTUALIZAR MEDICOS ######################################
	public function ActualizarMedicos()
	{
		if(empty($_POST["nommedico"]))
		{
		echo "1";
		exit;
		}
		
		$sql = " select correomedico from medicos where codmedico != ? and correomedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["correomedico"]) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "2";
		exit;
		}
		else
		{
		
		self::SetNames();
		$sql = " select * from medicos where codmedico != ? and cedmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["cedmedico"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update medicos set "
			  ." identmedico = ?, "
			  ." cedmedico = ?, "
			  ." tpmedico = ?, "
			  ." nommedico = ?, "
			  ." apemedico = ?, "
			  ." tlfmedico = ?, "
			  ." sexomedico = ?, "
			  ." correomedico = ?, "
			  ." direcmedico = ?, "
			  ." moduloespec = ?, "
			  ." especmedico = ?, "
			  ." fnacmedico = ? "
			  ." where "
			  ." codmedico = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $identmedico);
		$stmt->bindParam(2, $cedmedico);
		$stmt->bindParam(3, $tpmedico);
		$stmt->bindParam(4, $nommedico);
		$stmt->bindParam(5, $apemedico);
		$stmt->bindParam(6, $tlfmedico);
		$stmt->bindParam(7, $sexomedico);
		$stmt->bindParam(8, $correomedico);
		$stmt->bindParam(9, $direcmedico);
		$stmt->bindParam(10, $moduloespec);
		$stmt->bindParam(11, $especmedico);
		$stmt->bindParam(12, $fnacmedico);
		$stmt->bindParam(13, $codmedico);
			
		$identmedico = strip_tags($_POST["identmedico"]);
		$cedmedico = strip_tags($_POST["cedmedico"]);
		$tpmedico = strip_tags($_POST["tpmedico"]);
		$nommedico = strip_tags($_POST["nommedico"]);
		$apemedico = strip_tags($_POST["apemedico"]);
		$tlfmedico = strip_tags($_POST["tlfmedico"]);
		$sexomedico = strip_tags($_POST["sexomedico"]);
		$correomedico = strip_tags($_POST["correomedico"]);
		$direcmedico = strip_tags($_POST["direcmedico"]);
		$moduloespec = strip_tags($_POST["moduloespec"]);
		$especmedico = strip_tags($_POST["especmedico"]);
		$fnacmedico = strip_tags(date("Y-m-d",strtotime($_POST['fnacmedico'])));
		$codmedico = strip_tags($_POST["codmedico"]);
		$stmt->execute();
		
##################  SUBIR FOTO DE FIRMA DE MEDICOS ######################################
         //datos del arhivo  
         $nombre_archivo = $_FILES['imagen']['name'];  
         $tipo_archivo = $_FILES['imagen']['type'];  
         $tamano_archivo = $_FILES['imagen']['size'];  
         //compruebo si las características del archivo son las que deseo  
if ((strpos($tipo_archivo,'image/jpeg')!==false)&&$tamano_archivo<200000) 
{  
if (move_uploaded_file($_FILES['imagen']['tmp_name'], "firmasdigitales/".$nombre_archivo) && rename("firmasdigitales/".$nombre_archivo,"firmasdigitales/".$_POST["cedmedico"].".jpg"))
{ 
## se puede dar un aviso
} 
## se puede dar otro aviso 
}
##################  FINALIZA SUBIR FOTO DE FIRMA DE USUARIOS ######################################

if($_SESSION["tipo"]=="1"){

	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> EL MEDICO FUE ACTUALIZADO EXITOSAMENTE </div>"; 
	exit;

} else {

	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> SUS DATOS PERSONALES FUERON ACTUALIZADOS EXITOSAMENTE </div>"; 
	exit;
}
	}
	else
		{
			echo "3";
			exit;
		}
	} 
	   }
###################################### FUNCION ACTUALIZAR MEDICOS ######################################

###################################### FUNCION ELIMINAR MEDICOS ######################################
	public function EliminarMedicos()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select codmedico from citasmedicas where codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codmedico"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from medicos where codmedico = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codmedico);
		$codmedico = base64_decode($_GET["codmedico"]);
		$stmt->execute();
		
		header("Location: medicos?mesage=1");
		exit;
		   
		   }else {
		   
			header("Location: medicos?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: medicos?mesage=3");
		exit;
	    }	
	}
###################################### FUNCION ELIMINAR MEDICOS ######################################

################################## FUNCION REINICIAR CLAVE MEDICOS ###################################
	public function ReiniciarMedico()
	{
		self::SetNames();
		$sql = " update medicos set "
			  ." clavemedico = ? "
			  ." where "
			  ." codmedico = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->bindParam(1, $clavemedico);
		$stmt->bindParam(2,$codmedico);
		
		$cedmedico= strip_tags(base64_decode($_GET['cedmedico']));
		$clavemedico = sha1(md5($cedmedico));
		$codmedico= strip_tags(base64_decode($_GET['codmedico']));
		$stmt->execute();
		header("Location: medicos?&mesage=4");
		exit;
	}
################################## FUNCION REINICIAR CLAVE MEDICOS ###################################

###################################### FIN CLASE MEDICOS ########################################































########################################### CLASE PACIENTES #############################################

################################## FUNCION REGISTRAR PACIENTES #############################
   
	public function RegistrarPacientes()
	{
		self::SetNames();
		if(empty($_POST["idenpaciente"]) or empty($_POST["cedpaciente"]))
		{
			echo "1";
			exit;
		}
		
		$sql = " select cedpaciente from pacientes where cedpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["cedpaciente"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into pacientes values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $idenpaciente);
		$stmt->bindParam(2, $cedpaciente);
		$stmt->bindParam(3, $pnompaciente);
		$stmt->bindParam(4, $snompaciente);
		$stmt->bindParam(5, $papepaciente);
		$stmt->bindParam(6, $sapepaciente);
		$stmt->bindParam(7, $fnacpaciente);
		$stmt->bindParam(8, $tlfpaciente);
		$stmt->bindParam(9, $gruposapaciente);
		$stmt->bindParam(10, $eps);
		$stmt->bindParam(11, $vinculacion);
		$stmt->bindParam(12, $estadopaciente);
		$stmt->bindParam(13, $ocupacionpaciente);
		$stmt->bindParam(14, $sexopaciente);
		$stmt->bindParam(15, $enfoquepaciente);
		$stmt->bindParam(16, $departamento);
		$stmt->bindParam(17, $municipio);
		$stmt->bindParam(18, $ciudad);
		$stmt->bindParam(19, $direcpaciente);
		$stmt->bindParam(20, $nomacompana);
		$stmt->bindParam(21, $direcacompana);
		$stmt->bindParam(22, $tlfacompana);
		$stmt->bindParam(23, $parentescoacompana);
		$stmt->bindParam(24, $nomresponsable);
		$stmt->bindParam(25, $direcresponsable);
		$stmt->bindParam(26, $tlfresponsable);
		$stmt->bindParam(27, $parentescoresponsable);
			
		$idenpaciente = strip_tags($_POST["idenpaciente"]);
		$cedpaciente = strip_tags($_POST["cedpaciente"]);
		$pnompaciente = strip_tags($_POST["pnompaciente"]);
		$snompaciente = strip_tags($_POST["snompaciente"]);
		$papepaciente = strip_tags($_POST["papepaciente"]);
		$sapepaciente = strip_tags($_POST["sapepaciente"]);
		$fnacpaciente = strip_tags(date("Y-m-d",strtotime($_POST['fnacpaciente'])));
		$tlfpaciente = strip_tags($_POST["tlfpaciente"]);
		$gruposapaciente = strip_tags($_POST["gruposapaciente"]);
		$eps = strip_tags($_POST["eps"]);
		$vinculacion = strip_tags($_POST["vinculacion"]);
		$estadopaciente = strip_tags($_POST["estadopaciente"]);
		$ocupacionpaciente = strip_tags($_POST["ocupacionpaciente"]);
		$sexopaciente = strip_tags($_POST["sexopaciente"]);
		$enfoquepaciente = strip_tags($_POST["enfoquepaciente"]);
		$departamento = strip_tags($_POST["departamento"]);
		$municipio =strip_tags($_POST["municipio"]);
		$ciudad = strip_tags($_POST["ciudad"]);
		$direcpaciente = strip_tags($_POST["direcpaciente"]);
		$nomacompana = strip_tags($_POST["nomacompana"]);
		$direcacompana = strip_tags($_POST["direcacompana"]);
		$tlfacompana = strip_tags($_POST["tlfacompana"]);
		$parentescoacompana = strip_tags($_POST["parentescoacompana"]);
		$nomresponsable = strip_tags($_POST["nomresponsable"]);
		$direcresponsable = strip_tags($_POST["direcresponsable"]);
		$tlfresponsable = strip_tags($_POST["tlfresponsable"]);
		$parentescoresponsable = strip_tags($_POST["parentescoresponsable"]);
		$stmt->execute();
        //datos del arhivo  
         
         
		 
##################  FINALIZA SUBIR FOTO FOTO DE PACIENTES ######################################
			echo "<div class='alert alert-success'>";
			echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<span class='fa fa-check-square-o'></span> EL PACIENTE FUE REGISTRADO EXITOSAMENTE </div>";
		
		}
		else
		{
			echo "3";
			exit;
		}
	}

################################## FUNCION REGISTRAR PACIENTES #############################

################################## FUNCION LISTAR PACIENTES #############################
	public function ListarPacientes()
	{
		self::SetNames();
		$sql = " SELECT * FROM pacientes INNER JOIN eps ON pacientes.eps = eps.codeps INNER JOIN departamentos ON pacientes.departamento = departamentos.id INNER JOIN municipios ON pacientes.municipio = municipios.id";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################## FUNCION LISTAR PACIENTES #############################

################################## FUNCION ID PACIENTES #############################
	public function PacientesPorId()
	{
		self::SetNames();
		$sql = " SELECT * FROM pacientes INNER JOIN eps ON pacientes.eps = eps.codeps INNER JOIN departamentos ON pacientes.departamento = departamentos.id INNER JOIN municipios ON pacientes.municipio = municipios.id WHERE pacientes.codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codpaciente"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
################################## FUNCION ID PACIENTES #############################
	
################################## FUNCION ID PACIENTES #############################
	public function PacPorId()
	{
		self::SetNames();
		$sql = " SELECT * FROM pacientes INNER JOIN eps ON pacientes.eps = eps.codeps INNER JOIN departamentos ON pacientes.departamento = departamentos.id INNER JOIN municipios ON pacientes.municipio = municipios.id WHERE pacientes.codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET["codpaciente"]));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
################################## FUNCION ID PACIENTES #############################
	
################################## FUNCION ACTUALIZAR PACIENTES #############################
	public function ActualizarPacientes()
	{
		self::SetNames();
		if(empty($_POST["pnompaciente"]))
		{
		echo "1";
		exit;
		}

		$sql = " select * from pacientes where codpaciente != ? and cedpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codpaciente"], $_POST["cedpaciente"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " update pacientes set "
			  ." idenpaciente = ?, "
			  ." cedpaciente = ?, "
			  ." pnompaciente = ?, "
			  ." snompaciente = ?, "
			  ." papepaciente = ?, "
			  ." sapepaciente = ?, "
			  ." fnacpaciente = ?, "
			  ." tlfpaciente = ?, "
			  ." gruposapaciente = ?, "
			  ." eps = ?, "
			  ." vinculacion = ?, "
			  ." estadopaciente = ?, "
			  ." ocupacionpaciente = ?, "
			  ." sexopaciente = ?, "
			  ." enfoquepaciente = ?, "
			  ." departamento = ?, "
			  ." municipio = ?, "
			  ." ciudad = ?, "
			  ." direcpaciente = ?, "
			  ." nomacompana = ?, "
			  ." direcacompana = ?, "
			  ." tlfacompana = ?, "
			  ." parentescoacompana = ?, "
			  ." nomresponsable = ?, "
			  ." direcresponsable = ?, "
			  ." tlfresponsable = ?, "
			  ." parentescoresponsable = ? "
			  ." where "
			  ." codpaciente = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $idenpaciente);
		$stmt->bindParam(2, $cedpaciente);
		$stmt->bindParam(3, $pnompaciente);
		$stmt->bindParam(4, $snompaciente);
		$stmt->bindParam(5, $papepaciente);
		$stmt->bindParam(6, $sapepaciente);
		$stmt->bindParam(7, $fnacpaciente);
		$stmt->bindParam(8, $tlfpaciente);
		$stmt->bindParam(9, $gruposapaciente);
		$stmt->bindParam(10, $eps);
		$stmt->bindParam(11, $vinculacion);
		$stmt->bindParam(12, $estadopaciente);
		$stmt->bindParam(13, $ocupacionpaciente);
		$stmt->bindParam(14, $sexopaciente);
		$stmt->bindParam(15, $enfoquepaciente);
		$stmt->bindParam(16, $departamento);
		$stmt->bindParam(17, $municipio);
		$stmt->bindParam(18, $ciudad);
		$stmt->bindParam(19, $direcpaciente);
		$stmt->bindParam(20, $nomacompana);
		$stmt->bindParam(21, $direcacompana);
		$stmt->bindParam(22, $tlfacompana);
		$stmt->bindParam(23, $parentescoacompana);
		$stmt->bindParam(24, $nomresponsable);
		$stmt->bindParam(25, $direcresponsable);
		$stmt->bindParam(26, $tlfresponsable);
		$stmt->bindParam(27, $parentescoresponsable);
		$stmt->bindParam(28, $codpaciente);
			
		$idenpaciente = strip_tags($_POST["idenpaciente"]);
		$cedpaciente = strip_tags($_POST["cedpaciente"]);
		$pnompaciente = strip_tags($_POST["pnompaciente"]);
		$snompaciente = strip_tags($_POST["snompaciente"]);
		$papepaciente = strip_tags($_POST["papepaciente"]);
		$sapepaciente = strip_tags($_POST["sapepaciente"]);
		$fnacpaciente = strip_tags(date("Y-m-d",strtotime($_POST['fnacpaciente'])));
		$tlfpaciente = strip_tags($_POST["tlfpaciente"]);
		$gruposapaciente = strip_tags($_POST["gruposapaciente"]);
		$eps = strip_tags($_POST["eps"]);
		$vinculacion = strip_tags($_POST["vinculacion"]);
		$estadopaciente = strip_tags($_POST["estadopaciente"]);
		$ocupacionpaciente = strip_tags($_POST["ocupacionpaciente"]);
		$sexopaciente = strip_tags($_POST["sexopaciente"]);
		$enfoquepaciente = strip_tags($_POST["enfoquepaciente"]);
		$departamento = strip_tags($_POST["departamento"]);
		$municipio = strip_tags($_POST["municipio"]);
		$ciudad = strip_tags($_POST["ciudad"]);
		$direcpaciente = strip_tags($_POST["direcpaciente"]);
		$nomacompana = strip_tags($_POST["nomacompana"]);
		$direcacompana = strip_tags($_POST["direcacompana"]);
		$tlfacompana = strip_tags($_POST["tlfacompana"]);
		$parentescoacompana = strip_tags($_POST["parentescoacompana"]);
		$nomresponsable = strip_tags($_POST["nomresponsable"]);
		$direcresponsable = strip_tags($_POST["direcresponsable"]);
		$tlfresponsable = strip_tags($_POST["tlfresponsable"]);
		$parentescoresponsable = strip_tags($_POST["parentescoresponsable"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$stmt->execute();
		
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> EL PACIENTE FUE ACTUALIZADO EXITOSAMENTE </div>";
		exit;
	}
	else
		{
			echo "3";
			exit;
		}
	}
################################## FUNCION ACTUALIZAR PACIENTES #############################
	
################################## FUNCION ELIMINAR PACIENTES #############################
	public function EliminarPacientes()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " select codpaciente from citasmedicas where codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codpaciente"])) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$sql = " delete from pacientes where codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$cedula);
		$cedula = base64_decode($_GET["codpaciente"]);
		$stmt->execute();
		
		header("Location: pacientes?mesage=1");
		exit;
		   
		  }else {
		   
			header("Location: pacientes?mesage=2");
			exit;
		  } 
			
		} else {
		
		header("Location: pacientes?mesage=3");
		exit;
	    }	
	}
################################## FUNCION ELIMINAR PACIENTES #############################

########################################## FIN CLASE PACIENTES #########################################




































###################################### CLASE CITAS MEDICAS ######################################

############################# FUNCION BUSQUEDA DE CITAS MEDICAS ################################
public function BuscarCitasMedicas()
	{
		self::SetNames();
		
 $sql ="SELECT * FROM (citasmedicas LEFT JOIN medicos ON citasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON citasmedicas.codpaciente=pacientes.codpaciente LEFT JOIN sucursales ON citasmedicas.codsucursal=sucursales.codsucursal LEFT JOIN sedes ON citasmedicas.codsede=sedes.codsede WHERE citasmedicas.codmedico = ? AND citasmedicas.fechacita >= ? AND citasmedicas.fechacita <= ? AND citasmedicas.statuscita = 'EN PROCESO' ORDER BY citasmedicas.codcita DESC";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim(base64_decode($_GET['codmedico'])));
		$stmt->bindValue(2, trim(date("Y-m-d",strtotime($_GET['desde']))));
		$stmt->bindValue(3, trim(date("Y-m-d",strtotime($_GET['hasta']))));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
	echo "<center><div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-info-circle'></span> NO EXISTEN SOLICITUDES DE CITAS MEDICAS DISPONIBLES ACTUALMENTE</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		  } 
 
}
########################## FUNCION BUSQUEDA DE CITAS MEDICAS ################################

################################### CLASE CITAS MEDICOS MODAL #####################################
public function BuscarCitasModal()
	{
		self::SetNames();
		
 $sql ="SELECT * FROM (citasmedicas LEFT JOIN medicos ON citasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON citasmedicas.codpaciente=pacientes.codpaciente LEFT JOIN sucursales ON citasmedicas.codsucursal=sucursales.codsucursal LEFT JOIN sedes ON citasmedicas.codsede=sedes.codsede WHERE citasmedicas.codmedico = ? AND citasmedicas.statuscita = 'EN PROCESO' ORDER BY citasmedicas.codcita DESC";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim(base64_decode($_GET['codmedico'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
	echo "<center><div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-info-circle'></span> NO EXISTEN SOLICITUDES DE CITAS MEDICAS DISPONIBLES ACTUALMENTE</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		  } 
}
########################### FUNCION BUSQUEDA DE CITAS MEDICAS MODAL ############################

######################## FUNCION BUSQUEDA DE CITAS CANCELADAS POR PACIENTE ##############################
public function BuscarCitasMedicasCanceladas()
	{
	    self::SetNames();
		$sql ="SELECT * FROM (citasmedicas LEFT JOIN medicos ON citasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON citasmedicas.codpaciente=pacientes.codpaciente WHERE citasmedicas.codpaciente = ? AND citasmedicas.statuscita = 'CANCELADA' ORDER BY citasmedicas.codcita DESC";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
	echo "<br><center><div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-info-circle'></span> ESTE PACIENTE NO TIENE CITAS MEDICAS CANCELADAS</div></center>"; 
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
######################## FUNCION BUSQUEDA DE CITAS CANCELADAS POR PACIENTE ##############################

############################# FUNCION REGISTRAR CITAS MEDICAS ################################
	public function RegistrarCitasMedicas()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}
		
		$hora = strtotime($_POST['hour']); //hora cita
		$horaactual = date("h:i:s"); //hora actual
		$fecha = date("Y-m-d",strtotime($_POST['fechacita'])); //fechacita
		$fechaactual = date("Y-m-d"); //fechaactual
		
		$hora1 = $hora;
        $hora2 = strtotime($horaactual);
		
	  if (strtotime($fecha) < strtotime($fechaactual)) {
	  
	     echo "2";
		 exit;
	  
	  }
	  else
	  {
		
	  if ((strtotime($fecha) == strtotime($fechaactual)) && ($hora2 >= $hora1)){
	  
	     echo "3";
		 exit;
	  
	    }
	     else
		{
		$sql = " select * from citasmedicas where codmedico = ?  and fechacita = ? and horacita = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], date("Y-m-d",strtotime($_POST['fechacita'])), $_POST['hour']) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into citasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codsucursal);
		$stmt->bindParam(4, $codsede);
		$stmt->bindParam(5, $motivocita);
		$stmt->bindParam(6, $observacionescita);
		$stmt->bindParam(7, $horacita);
		$stmt->bindParam(8, $fechacita);
		$stmt->bindParam(9, $ingresocita);
		$stmt->bindParam(10, $cedula);
		$stmt->bindParam(11, $lectura);
		$stmt->bindParam(12, $especialidad);
		$stmt->bindParam(13, $statuscita);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codsucursal = strip_tags(base64_decode($_POST["codsucursal"]));
		$codsede = strip_tags(base64_decode($_POST["codsede"]));
		$motivocita = strip_tags($_POST["motivocita"]);
		$observacionescita = strip_tags($_POST["observacionescita"]);
		$horacita = strip_tags($_POST['hour']);
		$fechacita = strip_tags(date("Y-m-d",strtotime($_POST['fechacita'])));
		$ingresocita = strip_tags(date('Y-m-d'));
		$cedula = strip_tags($_SESSION["cedula"]);
if (strip_tags(isset($_POST['lectura']))) { $lectura = strip_tags($_POST["lectura"]); } else { $lectura = strip_tags('NO'); }
        $especialidad = strip_tags($_POST["especialidad"]);
		$statuscita = strip_tags('EN PROCESO');
		$stmt->execute();
		
			echo "<div class='alert alert-success'>";
			echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<span class='fa fa-check-square-o'></span> LA CITA MEDICA FUE REGISTRADA EXITOSAMENTE </div>";
			exit;
		}
		else
		{
		  echo "4";
		  exit;
	         }
	     }
	}  
}
############################ FUNCION REGISTRAR CITAS MEDICAS ####################################

######################## FUNCION BUSQUEDA CITAS MEDICAS ############################
public function BusquedaCitasMedicas()
	{
		self::SetNames();
		$sql ="SELECT * FROM (citasmedicas LEFT JOIN medicos ON citasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON citasmedicas.codpaciente=pacientes.codpaciente LEFT JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON citasmedicas.codsucursal=sucursales.codsucursal LEFT JOIN sedes ON citasmedicas.codsede=sedes.codsede WHERE citasmedicas.codmedico = ? AND citasmedicas.fechacita >= ? AND citasmedicas.fechacita <= ? ORDER BY citasmedicas.codcita DESC";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim(base64_decode($_GET['codmedico'])));
		$stmt->bindValue(2, trim(date("Y-m-d",strtotime($_GET['desde']))));
		$stmt->bindValue(3, trim(date("Y-m-d",strtotime($_GET['hasta']))));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
		echo "<center><div class='alert alert-warning'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-info-circle'></span> ESTE MEDICO NO DISPONE DE CITAS MEDICAS EN LA FECHA INGRESADA</div></center>";
		exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
########################## FUNCION BUSQUEDA CITAS MEDICAS ##########################

########################### FUNCION ID CITAS MEDICAS ################################
	   public function CitasPorId()
	{
		self::SetNames();
		$sql = " SELECT * from citasmedicas INNER JOIN medicos ON citasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON citasmedicas.codpaciente = pacientes.codpaciente INNER JOIN sucursales ON citasmedicas.codsucursal = sucursales.codsucursal INNER JOIN eps ON pacientes.eps = eps.codeps WHERE citasmedicas.codcita = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codcita"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
################################ FUNCION ID CITAS MEDICAS ################################

################################ FUNCION PARA ACTUALIZAR CITAS MEDICAS #################################
	public function ActualizarCitasMedicas()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}
		
		$hora = strtotime($_POST['hour']); //hora cita
		$horaactual = date("h:i:s"); //hora actual
		$fecha = date("Y-m-d",strtotime($_POST['fechacita'])); //fechacita
		$fechaactual = date("Y-m-d"); //fechaactual
		
		$hora1 = $hora;
        $hora2 = strtotime($horaactual);
		
	  if (strtotime($fecha) < strtotime($fechaactual)) {
	  
	     echo "2";
		 exit;
	  }
	  else
	  {
	  if ((strtotime($fecha) == strtotime($fechaactual)) && ($hora2 >= $hora1)){
	  
	     echo "3";
		 exit;
	  
	    }
	     else
		{
		
$sql = " select * from citasmedicas where codcita != ? and codmedico = ?  and fechacita = ? and horacita = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codcita"],$_POST["codmedico"], date("Y-m-d",strtotime($_POST['fechacita'])), $_POST['hour']) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$sql = " update citasmedicas set "
			  ." codmedico = ?, "
			  ." codpaciente = ?, "
			  ." motivocita = ?, "
			  ." observacionescita = ?, "
			  ." horacita = ?, "
			  ." fechacita = ?, "
			  ." especialidad = ?, "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $motivocita);
		$stmt->bindParam(4, $observacionescita);
		$stmt->bindParam(5, $horacita);
		$stmt->bindParam(6, $fechacita);
		$stmt->bindParam(7, $especialidad);
		$stmt->bindParam(8, $statuscita);
		$stmt->bindParam(9, $codcita);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$motivocita = strip_tags($_POST["motivocita"]);
		$observacionescita = strip_tags($_POST["observacionescita"]);
		$horacita = strip_tags($_POST['hour']);
		$fechacita = strip_tags(date("Y-m-d",strtotime($_POST['fechacita'])));
		$especialidad = strip_tags($_POST["especialidad"]);
		$statuscita = strip_tags($_POST["statuscita"]);
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> LA CITA MEDICA FUE ACTUALIZADA EXITOSAMENTE </div>";
		exit;

		} else {

		  echo "4";
		  exit;
	         }
	     }
	}
}
############################### FUNCION PARA ACTUALIZAR CITAS MEDICAS ##############################

############################### FUNCION PARA CANCELAR CITA MEDICA ##################################
	public function CancelarCitaMedica()
	{
		
		self::SetNames();
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('CANCELADA');
		$codcita = strip_tags(base64_decode($_GET["codcita"]));
		$stmt->execute();
		
	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> LA CITA MEDICA FUE CANCELADA EXITOSAMENTE </div>";
		exit;
	}
############################### FUNCION PARA CANCELAR CITA MEDICA #################################

############################ FUNCION PARA ELIMINAR CITAS MEDICAS ################################
	public function EliminarCitasMedicas()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from citasmedicas where codcita = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codcita);
		$codcita = base64_decode($_GET["codcita"]);
		$stmt->execute();
		
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> LA CITA MEDICA FUE ELIMINADA EXITOSAMENTE </div>";
		exit;
		   
		   } else {
		   
			echo "<div class='alert alert-warning'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> USTED NO PUEDE ELIMINAR CITAS MEDICAS, NO ERES EL ADMINISTRADOR </div>";
		exit;
		  }
			
		} 
########################## FUNCION PARA ELIMINAR CITAS MEDICAS #################################

######################## FUNCION BUSQUEDA CITAS MEDICAS PARA REPORTES ############################
public function BuscarCitasMedicasReportes()
	{
		self::SetNames();
		$sql = " SELECT * from citasmedicas INNER JOIN medicos ON citasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON citasmedicas.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON citasmedicas.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON citasmedicas.codsede = sedes.codsede WHERE citasmedicas.ingresocita BETWEEN ? AND ? AND citasmedicas.codsucursal = ? AND citasmedicas.codsede = ? AND citasmedicas.especialidad = ? ORDER BY citasmedicas.codcita DESC";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim(date("Y-m-d",strtotime($_GET['desde']))));
		$stmt->bindValue(2, trim(date("Y-m-d",strtotime($_GET['hasta']))));
		$stmt->bindValue(3, trim(base64_decode($_GET['codsucursal'])));
		$stmt->bindValue(4, trim(base64_decode($_GET['codsede'])));
		$stmt->bindValue(5, trim($_GET['especialidad']));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
		echo "<center><div class='alert alert-warning'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-info-circle'></span> NO SE ENCONTRARON CITAS MEDICAS EN TU BUSQUEDA REALIZADA</div></center>";
		exit;
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
########################## FUNCION BUSQUEDA CITAS MEDICAS PARA REPORTES ##########################

################## FUNCION PARA BUSQUEDA DE CITAS MEDICAS POR MEDICO PARA REPORTES ##################
public function BuscarCitasPorMedicosReportes()
	{
		self::SetNames();
		
		$sql = " SELECT * from citasmedicas INNER JOIN medicos ON citasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON citasmedicas.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON citasmedicas.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON citasmedicas.codsede = sedes.codsede WHERE citasmedicas.codmedico = ? AND citasmedicas.codsucursal = ? AND citasmedicas.codsede = ? ORDER BY citasmedicas.codcita DESC";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(1, trim($_GET['codmedico']));
		$stmt->bindValue(2, trim(base64_decode($_GET['codsucursal'])));
		$stmt->bindValue(3, trim(base64_decode($_GET['codsede'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		echo "<br><center><div class='alert alert-danger'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-info-circle'></span> NO SE ENCONTRARON CITAS MEDICAS ACTUALMENTE</div></center>";
		exit;
		
		}
		else
		{
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
################### FUNCION PARA BUSQUEDA DE CITAS MEDICAS POR MEDICO PARA REPORTES #################

############################## FIN DE CLASE CITAS MEDICAS ###############################




































##################################### CLASE APERTURAS DE HISTORIAS ########################################

############################# FUNCION VERIFICA APERTURAS DE HISTORIAS MEDICAS #########################
public function BuscarAperturasPacientes()
	{
		self::SetNames();
		$sql = "SELECT codpaciente FROM aperturasmedicas WHERE codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codpaciente'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num>0)
		{
		echo "<center><div class='alert alert-danger'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-info-circle'></span> ESTE PACIENTE YA TIENE APERTURA DE HISTORIA MEDICA REALIZADA, DEBE DE PROCESARLE UNA HOJA EVOLUTIVA</div></center>";
		exit;
		
		}
		else
		{
		
		$sql ="SELECT * FROM (citasmedicas LEFT JOIN medicos ON citasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON citasmedicas.codpaciente=pacientes.codpaciente LEFT JOIN eps ON pacientes.eps=eps.codeps WHERE citasmedicas.codcita = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codcita'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################# FUNCION VERIFICA APERTURAS DE HISTORIAS MEDICAS #########################

############################# FUNCION REGISTRAR APERTURAS DE HISTORIAS MEDICAS ##############################
public function RegistrarApertura()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["motivoconsulta"]))
		{
			echo "1";
			exit;
		}
		
	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }	

	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) { 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }	
		
		################# PROCESO PARA REGISTRO DE APERTURAS DE HISTORIAS ##############

		$sql = " select codapertura from aperturasmedicas order by codapertura desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codapertura["codapertura"]=$row["codapertura"];

      }
          if(empty($codapertura["codapertura"])) {

                $numproced = 'A00000000000001';

          } else {

                $num     = substr($codapertura["codapertura"] , 1);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
                $numproced = "A".$codigo;	
         }
		
		$sql = " select * from aperturasmedicas where codmedico = ? and codpaciente = ? and codsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into aperturasmedicas values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $fechaapertura);
		$stmt->bindParam(5, $enfermedadpaciente);
		$stmt->bindParam(6, $antecedentepaciente);
		$stmt->bindParam(7, $antecedentefamiliares);
		$stmt->bindParam(8, $antecedentealergico);
		$stmt->bindParam(9, $antecedentepatologico);
		$stmt->bindParam(10, $antecedentequirurgico);
		$stmt->bindParam(11, $antecedentefarmacologico);
		$stmt->bindParam(12, $antecedenteginecologico);
		$stmt->bindParam(13, $historialgestacional);
		$stmt->bindParam(14, $planificacionfamiliar);
		$stmt->bindParam(15, $codcita);
		$stmt->bindParam(16, $codsucursal);
		$stmt->bindParam(17, $codsede);
		$stmt->bindParam(18, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$fechaapertura = strip_tags(date("Y-m-d h:i:s"));
		$enfermedadpaciente = strip_tags($_POST["enfermedadpaciente"]);
		$antecedentepaciente = strip_tags($_POST["antecedentepaciente"]);
		$antecedentefamiliares = strip_tags($_POST["antecedentefamiliares"]);
		$antecedentealergico = strip_tags($_POST["antecedentealergico"]);
		$antecedentepatologico = strip_tags($_POST["antecedentepatologico"]);
		$antecedentequirurgico = strip_tags($_POST["antecedentequirurgico"]);
		$antecedentefarmacologico = strip_tags($_POST["antecedentefarmacologico"]);

if (strip_tags($_POST['sexo']=="FEMENINO")) { $antecedenteginecologico = strip_tags($_POST["antecedenteginecologico"]); } else { $antecedenteginecologico = strip_tags('NO DISPONE'); }	

if (strip_tags($_POST['sexo']=="FEMENINO")) { $historialgestacional = strip_tags($_POST["historialgestacional"]); } else { $historialgestacional = strip_tags('NO DISPONE'); }	

if (strip_tags($_POST['sexo']=="FEMENINO")) { $planificacionfamiliar = strip_tags($_POST["planificacionfamiliar"]); } else { $planificacionfamiliar = strip_tags('NO DISPONE'); }		

		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

		
		################# PROCESO PARA REGISTRO DE HOJAS EVOLUTIVAS ##############
		$query = " insert into hojasevolutivas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $motivoconsulta);
		$stmt->bindParam(6, $examenfisico);
		$stmt->bindParam(7, $fechacitologia);
		$stmt->bindParam(8, $embarazada);
		$stmt->bindParam(9, $fechamestruacion);
		$stmt->bindParam(10, $semanas);
		$stmt->bindParam(11, $fechaparto);
		$stmt->bindParam(12, $atenproced);
		$stmt->bindParam(13, $ta);
		$stmt->bindParam(14, $temperatura);
		$stmt->bindParam(15, $fc);
		$stmt->bindParam(16, $fr);
		$stmt->bindParam(17, $peso);
		$stmt->bindParam(18, $dxpresuntivo);
		$stmt->bindParam(19, $dxdefinitivo);
		$stmt->bindParam(20, $origenenfermedad);
		$stmt->bindParam(21, $tratamiento);
		$stmt->bindParam(22, $fechagenerahoja);
		$stmt->bindParam(23, $codcita);
		$stmt->bindParam(24, $codsucursal);
		$stmt->bindParam(25, $codsede);
		$stmt->bindParam(26, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$motivoconsulta = strip_tags($_POST['motivoconsulta']);
		$examenfisico = strip_tags($_POST["examenfisico"]);

if (strip_tags(isset($_POST['fechacitologia'])) && strip_tags($_POST['fechacitologia']!="")) { $fechacitologia = strip_tags(date("Y-m-d",strtotime($_POST['fechacitologia']))); } else { $fechacitologia = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['embarazada']))) { $embarazada = strip_tags($_POST["embarazada"]); } else { $embarazada = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechamestruacion']))) { $fechamestruacion = strip_tags(date("Y-m-d",strtotime($_POST['fechamestruacion']))); } else { $fechamestruacion = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['semanas']))) { $semanas = strip_tags($_POST["semanas"]); } else { $semanas = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechaparto']))) { $fechaparto = strip_tags(date("Y-m-d",strtotime($_POST['fechaparto']))); } else { $fechaparto = strip_tags('0000-00-00'); }


//if (strip_tags($_POST['sexo']=="FEMENINO") && strip_tags($_POST['especialidad']=="GINECOLOGO")) { $fechaparto = strip_tags(date("Y-m-d",strtotime($_POST['fechaparto']))); } else { $fechaparto = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['atenproced']))) { $atenproced = strip_tags($_POST['atenproced']); } else { $atenproced = strip_tags('NINGUNA'); }

		$ta = strip_tags($_POST["ta"]);
		$temperatura = strip_tags($_POST["temperatura"]);
		$fc = strip_tags($_POST["fc"]);
		$fr = strip_tags($_POST["fr"]);
		$peso = strip_tags($_POST["peso"]);
		
		$cont = 0;
	    $arrayBD = array();
	    $presuntivo = $_POST["presuntivo"];
		$idciepresuntivo = $_POST["idciepresuntivo"];
	    $observacionpresuntivo = $_POST["observacionpresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $presuntivo[$cont]."/".$idciepresuntivo[$cont]."/".$observacionpresuntivo[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpresuntivo = implode(",,",$arrayBD);
		
		
		$cont = 0;
	    $arrayBD = array();
	    $definitivo = $_POST["definitivo"];
		$idciedefinitivo = $_POST["idciedefinitivo"];
	    $observaciondefinitivo = $_POST["observaciondefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $definitivo[$cont]."/".$idciedefinitivo[$cont]."/".$observaciondefinitivo[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdefinitivo = implode(",,",$arrayBD);
		
		$origenenfermedad = strip_tags($_POST["origenenfermedad"]);
		$tratamiento = strip_tags($_POST["tratamiento"]);
		$fechagenerahoja = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		
	################# PROCESO PARA REGISTRO DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 
		
		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
		 
	################# PROCESO PARA REGISTRO DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {

		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
	################# PROCESO PARA REGISTRO DE REMISIONES ##############
	if (strip_tags(isset($_POST['remision']))) {
		
		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
	}
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA APERTURA DE HISTORIA M&Eacute;DICA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?a=".base64_encode($numproced)."&tipo=".base64_encode("APERTURAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Apertura de Historia' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR APERTURA</strong></a></div>";
	exit;
		}
		else
		{
		  echo "6";
		  exit;
	         }
	     }
############################# FUNCION REGISTRAR APERTURAS DE HISTORIAS MEDICAS ##############################

############################ FUNCION LISTAR APERTURAS DE HISTORIAS MEDICAS #############################
public function ListarApertura()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM aperturasmedicas INNER JOIN medicos ON aperturasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON aperturasmedicas.codpaciente = pacientes.codpaciente WHERE aperturasmedicas.especialidad = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

		$sql = " SELECT * FROM aperturasmedicas INNER JOIN medicos ON aperturasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON aperturasmedicas.codpaciente = pacientes.codpaciente WHERE aperturasmedicas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}
########################### FUNCION LISTAR APERTURAS DE HISTORIAS MEDICAS #############################

############################ FUNCION LISTAR APERTURAS DE HISTORIAS MEDICAS #2 ############################
public function ListarAperturaG()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM aperturasmedicas INNER JOIN medicos ON aperturasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON aperturasmedicas.codpaciente = pacientes.codpaciente WHERE aperturasmedicas.especialidad = 'GINECOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		
		$sql = " SELECT * FROM aperturasmedicas INNER JOIN medicos ON aperturasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON aperturasmedicas.codpaciente = pacientes.codpaciente WHERE aperturasmedicas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
######################### FUNCION LISTAR APERTURAS DE HISTORIAS MEDICAS #2 #########################

########################### FUNCION ID APERTURAS DE HISTORIAS MEDICAS ###############################
public function AperturasPorId()
	{
		self::SetNames();
		$sql ="SELECT 
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,  

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico,

aperturasmedicas.codapertura,
aperturasmedicas.codmedico, 
aperturasmedicas.codpaciente,
aperturasmedicas.especialidad,
aperturasmedicas.enfermedadpaciente,
aperturasmedicas.antecedentepaciente,
aperturasmedicas.antecedentefamiliares,
aperturasmedicas.antecedentealergico,
aperturasmedicas.antecedentepatologico,
aperturasmedicas.antecedentequirurgico,
aperturasmedicas.antecedentefarmacologico,
aperturasmedicas.antecedenteginecologico,
aperturasmedicas.historialgestacional,
aperturasmedicas.planificacionfamiliar,
aperturasmedicas.codcita, 
aperturasmedicas.codsucursal, 
aperturasmedicas.codsede, 
aperturasmedicas.especialidad,
aperturasmedicas.fechaapertura,

hojasevolutivas.codprocedimiento,
hojasevolutivas.procedimiento,
hojasevolutivas.motivoconsulta,
hojasevolutivas.examenfisico,
hojasevolutivas.fechacitologia,
hojasevolutivas.embarazada, 
hojasevolutivas.fechamestruacion, 
hojasevolutivas.semanas, 
hojasevolutivas.fechaparto,
hojasevolutivas.atenproced,
hojasevolutivas.ta,
hojasevolutivas.temperatura,
hojasevolutivas.fc, 
hojasevolutivas.fr, 
hojasevolutivas.peso, 
hojasevolutivas.dxpresuntivo,
hojasevolutivas.dxdefinitivo, 
hojasevolutivas.origenenfermedad, 
hojasevolutivas.tratamiento, 
hojasevolutivas.fechagenerahoja,

remisiones.remision,
remisiones.fecharemision,

formulasmedicas.fechaformula,
GROUP_CONCAT(DISTINCT formulasmedicas.idcieformula, '/', formulasmedicas.formulamedica, '/', cie10.codcie, '/', cie10.nombrecie SEPARATOR ',,') AS formulas, 

ordenesmedicas.fechaorden,
GROUP_CONCAT(DISTINCT ordenesmedicas.idcieorden, '/', ordenesmedicas.ordenmedica, '/', cie.codcie, '/', cie.nombrecie SEPARATOR ',,') AS ordenes, cie10.nombrecie,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

FROM (aperturasmedicas INNER JOIN hojasevolutivas ON aperturasmedicas.codapertura=hojasevolutivas.codprocedimiento) 
LEFT JOIN remisiones ON aperturasmedicas.codapertura=remisiones.codprocedimiento 
LEFT JOIN formulasmedicas ON aperturasmedicas.codapertura=formulasmedicas.codprocedimiento 
LEFT JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie 
LEFT JOIN ordenesmedicas ON aperturasmedicas.codapertura=ordenesmedicas.codprocedimiento 
LEFT JOIN cie10 as cie ON ordenesmedicas.idcieorden = cie.idcie 
LEFT JOIN medicos ON aperturasmedicas.codmedico = medicos.codmedico 
LEFT JOIN pacientes ON aperturasmedicas.codpaciente=pacientes.codpaciente 
LEFT JOIN eps ON pacientes.eps = eps.codeps
LEFT JOIN sucursales ON aperturasmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON aperturasmedicas.codsede=sedes.codsede 
WHERE aperturasmedicas.codapertura = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["a"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID APERTURAS DE HISTORIAS MEDICAS ###############################

########################## FUNCION ACTUALIZAR APERTURAS DE HISTORIAS MEDICAS #######################
	public function ActualizarAperturas()
	{
		if(empty($_POST["enfermedadpaciente"]))
		{
		echo "1";
		exit;
		}
		

	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }

	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) { 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }
		
	    ################# PROCESO PARA ACTUALIZAR DE APERTURAS DE HISTORIAS ##############
		self::SetNames();
		$sql = " update aperturasmedicas set "
			  ." enfermedadpaciente = ?, "
			  ." antecedentepaciente = ?, "
			  ." antecedentefamiliares = ?, "
			  ." antecedentealergico = ?, "
			  ." antecedentepatologico = ?, "
			  ." antecedentequirurgico = ?, "
			  ." antecedentefarmacologico = ?, "
			  ." antecedenteginecologico = ?, "
			  ." historialgestacional = ?, "
			  ." planificacionfamiliar = ? "
			  ." where "
			  ." codapertura = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $enfermedadpaciente);
		$stmt->bindParam(2, $antecedentepaciente);
		$stmt->bindParam(3, $antecedentefamiliares);
		$stmt->bindParam(4, $antecedentealergico);
		$stmt->bindParam(5, $antecedentepatologico);
		$stmt->bindParam(6, $antecedentequirurgico);
		$stmt->bindParam(7, $antecedentefarmacologico);
		$stmt->bindParam(8, $antecedenteginecologico);
		$stmt->bindParam(9, $historialgestacional);
		$stmt->bindParam(10, $planificacionfamiliar);
		$stmt->bindParam(11, $codapertura);
			
		$enfermedadpaciente = strip_tags($_POST["enfermedadpaciente"]);
		$antecedentepaciente = strip_tags($_POST["antecedentepaciente"]);
		$antecedentefamiliares = strip_tags($_POST["antecedentefamiliares"]);
		$antecedentealergico = strip_tags($_POST["antecedentealergico"]);
		$antecedentepatologico = strip_tags($_POST["antecedentepatologico"]);
		$antecedentequirurgico = strip_tags($_POST["antecedentequirurgico"]);
		$antecedentefarmacologico = strip_tags($_POST["antecedentefarmacologico"]);

if (strip_tags($_POST['sexo']=="FEMENINO")) { $antecedenteginecologico = strip_tags($_POST["antecedenteginecologico"]); } else { $antecedenteginecologico = strip_tags('NO DISPONE'); }	

if (strip_tags($_POST['sexo']=="FEMENINO")) { $historialgestacional = strip_tags($_POST["historialgestacional"]); } else { $historialgestacional = strip_tags('NO DISPONE'); }	

if (strip_tags($_POST['sexo']=="FEMENINO")) { $planificacionfamiliar = strip_tags($_POST["planificacionfamiliar"]); } else { $planificacionfamiliar = strip_tags('NO DISPONE'); }	
		$codapertura = strip_tags($_POST["codapertura"]);
		$stmt->execute();
		
		
		 ################# PROCESO PARA ACTUALIZAR HOJAS EVOLUTIVAS ##############
		$sql = " update hojasevolutivas set "
			  ." motivoconsulta = ?, "
			  ." examenfisico = ?, "
			  ." fechacitologia = ?, "
			  ." embarazada = ?, "
			  ." fechamestruacion = ?, "
			  ." semanas = ?, "
			  ." fechaparto = ?, "
			  ." ta = ?, "
			  ." temperatura = ?, "
			  ." fc = ?, "
			  ." fr = ?, "
			  ." peso = ?, "
			  ." dxpresuntivo = ?, "
			  ." dxdefinitivo = ?, "
			  ." origenenfermedad = ?, "
			  ." tratamiento = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $motivoconsulta);
		$stmt->bindParam(2, $examenfisico);
		$stmt->bindParam(3, $fechacitologia);
		$stmt->bindParam(4, $embarazada);
		$stmt->bindParam(5, $fechamestruacion);
		$stmt->bindParam(6, $semanas);
		$stmt->bindParam(7, $fechaparto);
		$stmt->bindParam(8, $ta);
		$stmt->bindParam(9, $temperatura);
		$stmt->bindParam(10, $fc);
		$stmt->bindParam(11, $fr);
		$stmt->bindParam(12, $peso);
		$stmt->bindParam(13, $dxpresuntivo);
		$stmt->bindParam(14, $dxdefinitivo);
		$stmt->bindParam(15, $origenenfermedad);
		$stmt->bindParam(16, $tratamiento);
		$stmt->bindParam(17, $codprocedimiento);
			
		$motivoconsulta = strip_tags($_POST['motivoconsulta']);
		$examenfisico = strip_tags($_POST["examenfisico"]);

if (strip_tags(isset($_POST['fechacitologia'])) && strip_tags($_POST['fechacitologia']!="")) { $fechacitologia = strip_tags(date("Y-m-d",strtotime($_POST['fechacitologia']))); } else { $fechacitologia = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['embarazada']))) { $embarazada = strip_tags($_POST["embarazada"]); } else { $embarazada = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechamestruacion']))) { $fechamestruacion = strip_tags(date("Y-m-d",strtotime($_POST['fechamestruacion']))); } else { $fechamestruacion = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['semanas']))) { $semanas = strip_tags($_POST["semanas"]); } else { $semanas = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechaparto']))) { $fechaparto = strip_tags(date("Y-m-d",strtotime($_POST['fechaparto']))); } else { $fechaparto = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['atenproced']))) { $atenproced = strip_tags($_POST['atenproced']); } else { $atenproced = strip_tags('NINGUNA'); }

		$ta = strip_tags($_POST["ta"]);
		$temperatura = strip_tags($_POST["temperatura"]);
		$fc = strip_tags($_POST["fc"]);
		$fr = strip_tags($_POST["fr"]);
		$peso = strip_tags($_POST["peso"]);
		
		$cont = 0;
	    $arrayBD = array();
	    $presuntivo = $_POST["presuntivo"];
		$idciepresuntivo = $_POST["idciepresuntivo"];
	    $observacionpresuntivo = $_POST["observacionpresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $presuntivo[$cont]."/".$idciepresuntivo[$cont]."/".$observacionpresuntivo[$cont];
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpresuntivo = implode(",,",$arrayBD);
		
		$cont = 0;
	    $arrayBD = array();
	    $definitivo = $_POST["definitivo"];
		$idciedefinitivo = $_POST["idciedefinitivo"];
	    $observaciondefinitivo = $_POST["observaciondefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $definitivo[$cont]."/".$idciedefinitivo[$cont]."/".$observaciondefinitivo[$cont];
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdefinitivo = implode(",,",$arrayBD);
		
		$origenenfermedad = strip_tags($_POST["origenenfermedad"]);
		$tratamiento = strip_tags($_POST["tratamiento"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
		$stmt->execute();

################# PROCESO PARA REGISTRO Y ACTUALIZACION DE REMISIONES ##############
	if (strip_tags(isset($_POST['remision']) && !empty($_POST['remision']))) {

		$sql = " select * from remisiones where codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codapertura"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

		 } else {

		$sql = " update remisiones set "
			  ." remision = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $remision);
		$stmt->bindParam(2, $codprocedimiento);
			
		$remision = strip_tags($_POST["remision"]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
	    }
	}


	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

        $sql = " select * from formulasmedicas where codprocedimiento = ? and idcieformula = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codapertura"], $_POST['idcieformula'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update formulasmedicas set "
			  ." formulamedica = ? "
			  ." where "
			  ." idcieformula = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $formulamedica);
		$stmt->bindParam(2, $idcieformula);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    } 


	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

        $sql = " select * from ordenesmedicas where codprocedimiento = ? and idcieorden = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codapertura"], $_POST['idcieorden'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update ordenesmedicas set "
			  ." ordenmedica = ? "
			  ." where "
			  ." idcieorden = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $ordenmedica);
		$stmt->bindParam(2, $idcieorden);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codapertura"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    }

	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA APERTURA DE HISTORIA M&Eacute;DICA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?a=".base64_encode($codprocedimiento)."&tipo=".base64_encode("APERTURAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Apertura de Historia' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR APERTURA</strong></a></div>";
		exit;
	}
########################## FUNCION ACTUALIZAR APERTURAS DE HISTORIAS MEDICAS #######################

############################ FUNCION ELIMINAR APERTURAS DE HISTORIAS MEDICAS ###########################
public function EliminarAperturas()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from aperturasmedicas where codapertura = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codapertura);
		$codapertura = base64_decode($_GET["codapertura"]);
		$stmt->execute();
		
		$sql = " delete from hojasevolutivas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codapertura);
		$codapertura = base64_decode($_GET["codapertura"]);
		$stmt->execute();
		
		$sql = " delete from formulasmedicas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codapertura);
		$codapertura = base64_decode($_GET["codapertura"]);
		$stmt->execute();
		
		$sql = " delete from ordenesmedicas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codapertura);
		$codapertura = base64_decode($_GET["codapertura"]);
		$stmt->execute();
		
		$sql = " delete from remisiones where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codapertura);
		$codapertura = base64_decode($_GET["codapertura"]);
		$stmt->execute();
		
		header("Location: aperturas?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: aperturas?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR APERTURAS DE HISTORIAS MEDICAS ###########################

################################## FIN DE CLASE APERTURAS DE HISTORIAS ###############################




































##################################### CLASE HOJA EVOLUTIVA ########################################

############################# FUNCION VERIFICA HOJA EVOLUTIVA #########################
public function BuscarHojaEvolutiva()
	{
		self::SetNames();
		$sql = "SELECT codpaciente FROM hojasevolutivas WHERE codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codpaciente'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		echo "<center><div class='alert alert-danger'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-info-circle'></span> ESTE PACIENTE NO TIENE APERTURA DE HISTORIA MEDICA, DEBERA DE PROCESARLE UNA</div></center>";
		exit;
		}
		else
		{
		$sql ="SELECT * FROM (citasmedicas LEFT JOIN medicos ON citasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON citasmedicas.codpaciente=pacientes.codpaciente LEFT JOIN eps ON pacientes.eps=eps.codeps WHERE citasmedicas.codcita = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codcita'])));
		$stmt->execute();
		$num = $stmt->rowCount();
		
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
############################# FUNCION VERIFICA HOJA EVOLUTIVA #########################

############################# FUNCION REGISTRAR HOJA EVOLUTIVA ##############################
public function RegistrarHojaEvolutiva()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["motivoconsulta"]))
		{
			echo "1";
			exit;
		}
		
	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }	

	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) { 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }	
		
		$sql = " select codprocedimiento from hojasevolutivas where procedimiento = 'HOJA EVOLUTIVA' order by codprocedimiento desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codprocedimiento["codprocedimiento"]=$row["codprocedimiento"];

      }
          
         if(empty($codprocedimiento["codprocedimiento"])) {

                $numproced = 'H00000000000001';

          } else {

                $num     = substr($codprocedimiento["codprocedimiento"] , 1);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
                $numproced = "H".$codigo;	
         }
		
		################# PROCESO PARA REGISTRO DE HOJAS EVOLUTIVAS ##############
		$query = " insert into hojasevolutivas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $motivoconsulta);
		$stmt->bindParam(6, $examenfisico);
		$stmt->bindParam(7, $fechacitologia);
		$stmt->bindParam(8, $embarazada);
		$stmt->bindParam(9, $fechamestruacion);
		$stmt->bindParam(10, $semanas);
		$stmt->bindParam(11, $fechaparto);
		$stmt->bindParam(12, $atenproced);
		$stmt->bindParam(13, $ta);
		$stmt->bindParam(14, $temperatura);
		$stmt->bindParam(15, $fc);
		$stmt->bindParam(16, $fr);
		$stmt->bindParam(17, $peso);
		$stmt->bindParam(18, $dxpresuntivo);
		$stmt->bindParam(19, $dxdefinitivo);
		$stmt->bindParam(20, $origenenfermedad);
		$stmt->bindParam(21, $tratamiento);
		$stmt->bindParam(22, $fechagenerahoja);
		$stmt->bindParam(23, $codcita);
		$stmt->bindParam(24, $codsucursal);
		$stmt->bindParam(25, $codsede);
		$stmt->bindParam(26, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$motivoconsulta = strip_tags($_POST['motivoconsulta']);
		$examenfisico = strip_tags($_POST["examenfisico"]);

if (strip_tags(isset($_POST['fechacitologia'])) && strip_tags($_POST['fechacitologia']!="")) { $fechacitologia = strip_tags(date("Y-m-d",strtotime($_POST['fechacitologia']))); } else { $fechacitologia = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['embarazada']))) { $embarazada = strip_tags($_POST["embarazada"]); } else { $embarazada = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechamestruacion']))) { $fechamestruacion = strip_tags(date("Y-m-d",strtotime($_POST['fechamestruacion']))); } else { $fechamestruacion = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['semanas']))) { $semanas = strip_tags($_POST["semanas"]); } else { $semanas = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechaparto']))) { $fechaparto = strip_tags(date("Y-m-d",strtotime($_POST['fechaparto']))); } else { $fechaparto = strip_tags('0000-00-00'); }

        $atenproced = strip_tags($_POST["atenproced"]);
		$ta = strip_tags($_POST["ta"]);
		$temperatura = strip_tags($_POST["temperatura"]);
		$fc = strip_tags($_POST["fc"]);
		$fr = strip_tags($_POST["fr"]);
		$peso = strip_tags($_POST["peso"]);
		
		$cont = 0;
	    $arrayBD = array();
	    $presuntivo = $_POST["presuntivo"];
		$idciepresuntivo = $_POST["idciepresuntivo"];
	    $observacionpresuntivo = $_POST["observacionpresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $presuntivo[$cont]."/".$idciepresuntivo[$cont]."/".$observacionpresuntivo[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpresuntivo = implode(",,",$arrayBD);
		
		
		$cont = 0;
	    $arrayBD = array();
	    $definitivo = $_POST["definitivo"];
		$idciedefinitivo = $_POST["idciedefinitivo"];
	    $observaciondefinitivo = $_POST["observaciondefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $definitivo[$cont]."/".$idciedefinitivo[$cont]."/".$observaciondefinitivo[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdefinitivo = implode(",,",$arrayBD);
		
		$origenenfermedad = strip_tags($_POST["origenenfermedad"]);
		$tratamiento = strip_tags($_POST["tratamiento"]);
		$fechagenerahoja = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		
	################# PROCESO PARA REGISTRO DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 
		
		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
		 
	################# PROCESO PARA REGISTRO DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {

		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
	################# PROCESO PARA REGISTRO DE REMISIONES ##############
	if (strip_tags(isset($_POST['remision']))) {
		
		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
	}
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA HOJA EVOLUTIVA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?h=".base64_encode($numproced)."&tipo=".base64_encode("HOJAEVOLUTIVA")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Hoja Evolutiva' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR HOJA EVOLUTIVA</strong></a></div>";
	exit;
}
############################# FUNCION REGISTRAR HOJA EVOLUTIVA ##############################

############################ FUNCION LISTAR HOJA EVOLUTIVA #############################
public function ListarHojaEvolutiva()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM hojasevolutivas INNER JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico INNER JOIN pacientes ON hojasevolutivas.codpaciente = pacientes.codpaciente WHERE hojasevolutivas.especialidad = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		$sql = " SELECT * FROM hojasevolutivas INNER JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico INNER JOIN pacientes ON hojasevolutivas.codpaciente = pacientes.codpaciente WHERE hojasevolutivas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
}
############################ FUNCION LISTAR HOJA EVOLUTIVA #############################

############################ FUNCION LISTAR HOJA EVOLUTIVA #2 ############################
public function ListarHojaEvolutivaG()
	{
		self::SetNames();

if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM hojasevolutivas INNER JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico INNER JOIN pacientes ON hojasevolutivas.codpaciente = pacientes.codpaciente WHERE hojasevolutivas.especialidad = 'GINECOLOGO' and  hojasevolutivas.procedimiento != 'CRIOCAUTERIZACION'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		$sql = " SELECT * FROM hojasevolutivas INNER JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico INNER JOIN pacientes ON hojasevolutivas.codpaciente = pacientes.codpaciente WHERE hojasevolutivas.codmedico = '".$_SESSION["codmedico"]."' and  hojasevolutivas.procedimiento != 'CRIOCAUTERIZACION'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR HOJA EVOLUTIVA #2 ############################

########################### FUNCION ID HOJA EVOLUTIVA ###############################
public function HojaEvolutivaPorId()
	{
		self::SetNames();
		$sql ="SELECT 
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,  

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico,  

hojasevolutivas.codmedico, 
hojasevolutivas.codpaciente,
hojasevolutivas.codprocedimiento,
hojasevolutivas.procedimiento,
hojasevolutivas.motivoconsulta,
hojasevolutivas.examenfisico,
hojasevolutivas.fechacitologia,
hojasevolutivas.embarazada, 
hojasevolutivas.fechamestruacion, 
hojasevolutivas.semanas, 
hojasevolutivas.fechaparto,
hojasevolutivas.atenproced,
hojasevolutivas.ta,
hojasevolutivas.temperatura,
hojasevolutivas.fc, 
hojasevolutivas.fr, 
hojasevolutivas.peso, 
hojasevolutivas.dxpresuntivo,
hojasevolutivas.dxdefinitivo, 
hojasevolutivas.origenenfermedad, 
hojasevolutivas.tratamiento, 
hojasevolutivas.fechagenerahoja,
hojasevolutivas.codcita, 
hojasevolutivas.codsucursal, 
hojasevolutivas.codsede, 
hojasevolutivas.especialidad,
remisiones.remision,
remisiones.fecharemision,

formulasmedicas.fechaformula,
GROUP_CONCAT(DISTINCT formulasmedicas.idcieformula, '/', formulasmedicas.formulamedica, '/', cie10.codcie, '/', cie10.nombrecie SEPARATOR ',,') AS formulas, 

ordenesmedicas.fechaorden,
GROUP_CONCAT(DISTINCT ordenesmedicas.idcieorden, '/', ordenesmedicas.ordenmedica, '/', cie.codcie, '/', cie.nombrecie SEPARATOR ',,') AS ordenes, cie10.nombrecie,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

FROM (hojasevolutivas LEFT JOIN remisiones ON hojasevolutivas.codprocedimiento=remisiones.codprocedimiento)

LEFT JOIN formulasmedicas ON hojasevolutivas.codprocedimiento=formulasmedicas.codprocedimiento 
LEFT JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie 
LEFT JOIN ordenesmedicas ON hojasevolutivas.codprocedimiento=ordenesmedicas.codprocedimiento 
LEFT JOIN cie10 as cie ON ordenesmedicas.idcieorden = cie.idcie 
LEFT JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico 
LEFT JOIN pacientes ON hojasevolutivas.codpaciente=pacientes.codpaciente 
LEFT JOIN eps ON pacientes.eps = eps.codeps
LEFT JOIN sucursales ON hojasevolutivas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON hojasevolutivas.codsede=sedes.codsede 
WHERE hojasevolutivas.codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["h"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}	
########################### FUNCION ID HOJA EVOLUTIVA ###############################

########################## FUNCION ACTUALIZAR HOJA EVOLUTIVA #######################
	public function ActualizarHojaEvolutiva()
	{
		self::SetNames();
		if(empty($_POST["motivoconsulta"]))
		{
		echo "1";
		exit;
		}
		
	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }

	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) {

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }
		
		 ################# PROCESO PARA ACTUALIZAR HOJAS EVOLUTIVAS ##############
		$sql = " update hojasevolutivas set "
			  ." motivoconsulta = ?, "
			  ." examenfisico = ?, "
			  ." fechacitologia = ?, "
			  ." embarazada = ?, "
			  ." fechamestruacion = ?, "
			  ." semanas = ?, "
			  ." fechaparto = ?, "
			  ." atenproced = ?, "
			  ." ta = ?, "
			  ." temperatura = ?, "
			  ." fc = ?, "
			  ." fr = ?, "
			  ." peso = ?, "
			  ." dxpresuntivo = ?, "
			  ." dxdefinitivo = ?, "
			  ." origenenfermedad = ?, "
			  ." tratamiento = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $motivoconsulta);
		$stmt->bindParam(2, $examenfisico);
		$stmt->bindParam(3, $fechacitologia);
		$stmt->bindParam(4, $embarazada);
		$stmt->bindParam(5, $fechamestruacion);
		$stmt->bindParam(6, $semanas);
		$stmt->bindParam(7, $fechaparto);
		$stmt->bindParam(8, $atenproced);
		$stmt->bindParam(9, $ta);
		$stmt->bindParam(10, $temperatura);
		$stmt->bindParam(11, $fc);
		$stmt->bindParam(12, $fr);
		$stmt->bindParam(13, $peso);
		$stmt->bindParam(14, $dxpresuntivo);
		$stmt->bindParam(15, $dxdefinitivo);
		$stmt->bindParam(16, $origenenfermedad);
		$stmt->bindParam(17, $tratamiento);
		$stmt->bindParam(18, $codprocedimiento);
			
		$motivoconsulta = strip_tags($_POST['motivoconsulta']);
		$examenfisico = strip_tags($_POST["examenfisico"]);

if (strip_tags(isset($_POST['fechacitologia'])) && strip_tags($_POST['fechacitologia']!="")) { $fechacitologia = strip_tags(date("Y-m-d",strtotime($_POST['fechacitologia']))); } else { $fechacitologia = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['embarazada']))) { $embarazada = strip_tags($_POST["embarazada"]); } else { $embarazada = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechamestruacion']))) { $fechamestruacion = strip_tags(date("Y-m-d",strtotime($_POST['fechamestruacion']))); } else { $fechamestruacion = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['semanas']))) { $semanas = strip_tags($_POST["semanas"]); } else { $semanas = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechaparto']))) { $fechaparto = strip_tags(date("Y-m-d",strtotime($_POST['fechaparto']))); } else { $fechaparto = strip_tags('0000-00-00'); }

		$atenproced = strip_tags($_POST["atenproced"]);
		$ta = strip_tags($_POST["ta"]);
		$temperatura = strip_tags($_POST["temperatura"]);
		$fc = strip_tags($_POST["fc"]);
		$fr = strip_tags($_POST["fr"]);
		$peso = strip_tags($_POST["peso"]);
		
		$cont = 0;
	    $arrayBD = array();
	    $presuntivo = $_POST["presuntivo"];
		$idciepresuntivo = $_POST["idciepresuntivo"];
	    $observacionpresuntivo = $_POST["observacionpresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $presuntivo[$cont]."/".$idciepresuntivo[$cont]."/".$observacionpresuntivo[$cont];
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpresuntivo = implode(",,",$arrayBD);
		
		$cont = 0;
	    $arrayBD = array();
	    $definitivo = $_POST["definitivo"];
		$idciedefinitivo = $_POST["idciedefinitivo"];
	    $observaciondefinitivo = $_POST["observaciondefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $definitivo[$cont]."/".$idciedefinitivo[$cont]."/".$observaciondefinitivo[$cont];
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdefinitivo = implode(",,",$arrayBD);
		
		$origenenfermedad = strip_tags($_POST["origenenfermedad"]);
		$tratamiento = strip_tags($_POST["tratamiento"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$stmt->execute();


################# PROCESO PARA REGISTRO Y ACTUALIZACION DE REMISIONES ##############
	if (strip_tags(isset($_POST['remision']) && !empty($_POST['remision']))) { 

		$sql = " select * from remisiones where codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

		 } else {

		$sql = " update remisiones set "
			  ." remision = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $remision);
		$stmt->bindParam(2, $codprocedimiento);
			
		$remision = strip_tags($_POST["remision"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
	    }
	}


	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

        $sql = " select * from formulasmedicas where codprocedimiento = ? and idcieformula = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieformula'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update formulasmedicas set "
			  ." formulamedica = ? "
			  ." where "
			  ." idcieformula = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $formulamedica);
		$stmt->bindParam(2, $idcieformula);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    } 


	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

        $sql = " select * from ordenesmedicas where codprocedimiento = ? and idcieorden = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieorden'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update ordenesmedicas set "
			  ." ordenmedica = ? "
			  ." where "
			  ." idcieorden = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $ordenmedica);
		$stmt->bindParam(2, $idcieorden);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    }
		
	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA HOJA EVOLUTIVA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?h=".base64_encode($codprocedimiento)."&tipo=".base64_encode("HOJAEVOLUTIVA")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Hoja Evolutiva' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR HOJA EVOLUTIVA</strong></a></div>";
		exit;
	}
########################## FUNCION ACTUALIZAR HOJA EVOLUTIVA #######################

############################ FUNCION ELIMINAR HOJA EVOLUTIVA ###########################
public function EliminarHojaEvolutiva()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from aperturasmedicas where codapertura = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from hojasevolutivas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from formulasmedicas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from ordenesmedicas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from remisiones where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		header("Location: hojaevolutiva?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: hojaevolutiva?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR HOJA EVOLUTIVA ###########################

################################### FIN DE CLASE HOJA EVOLUTIVA ###################################





































##################################### CLASE REMISIONES ########################################

############################# FUNCION REGISTRAR REMISIONES ##############################
public function RegistrarRemisiones()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["remision"]))
		{
			echo "1";
			exit;
		}		
		
	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) { 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }
    }

	
	$sql = " select codprocedimiento from remisiones where procedimiento = 'REMISION' order by codprocedimiento desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codprocedimiento["codprocedimiento"]=$row["codprocedimiento"];

      }
          
         if(empty($codprocedimiento["codprocedimiento"])) {

                $numproced = 'R00000000000001';

          } else {

                $num     = substr($codprocedimiento["codprocedimiento"] , 1);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
                $numproced = "R".$codigo;	
         }

		
    ################# PROCESO PARA REGISTRO DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
		 
	################# PROCESO PARA REGISTRO DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    }
		
		################# PROCESO PARA REGISTRO DE REMISIONES ##############		
		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA REMISION FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?h=".base64_encode($numproced)."&tipo=".base64_encode("REMISIONES")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Remision' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR REMISION</strong></a></div>";
	exit;
}
############################# FUNCION REGISTRAR REMISIONES ##############################

############################ FUNCION LISTAR REMISIONES #############################
public function ListarRemisiones()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM remisiones INNER JOIN medicos ON remisiones.codmedico = medicos.codmedico INNER JOIN pacientes ON remisiones.codpaciente = pacientes.codpaciente WHERE remisiones.especialidad = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		$sql = " SELECT * FROM remisiones INNER JOIN medicos ON remisiones.codmedico = medicos.codmedico INNER JOIN pacientes ON remisiones.codpaciente = pacientes.codpaciente WHERE remisiones.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}
############################ FUNCION LISTAR REMISIONES #############################

############################ FUNCION LISTAR REMISIONES #2 ############################
public function ListarRemisionesG()
	{
		self::SetNames();
	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM remisiones INNER JOIN medicos ON remisiones.codmedico = medicos.codmedico INNER JOIN pacientes ON remisiones.codpaciente = pacientes.codpaciente WHERE remisiones.especialidad = 'GINECOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		$sql = " SELECT * FROM remisiones INNER JOIN medicos ON remisiones.codmedico = medicos.codmedico INNER JOIN pacientes ON remisiones.codpaciente = pacientes.codpaciente WHERE remisiones.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}
############################ FUNCION LISTAR REMISIONES #2 ############################

########################### FUNCION ID REMISIONES ###############################
public function RemisionesPorId()
	{
		self::SetNames();
		$sql ="SELECT 
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,  

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico,

remisiones.codmedico, 
remisiones.codpaciente, 
remisiones.codprocedimiento, 
remisiones.procedimiento, 
remisiones.codcita, 
remisiones.codsucursal, 
remisiones.codsede, 
remisiones.codremision, 
remisiones.remision, 
remisiones.fecharemision,
remisiones.especialidad, 

formulasmedicas.fechaformula,
GROUP_CONCAT(DISTINCT formulasmedicas.idcieformula, '/', formulasmedicas.formulamedica, '/', cie10.codcie, '/', cie10.nombrecie SEPARATOR ',,') AS formulas, 

ordenesmedicas.fechaorden,
GROUP_CONCAT(DISTINCT ordenesmedicas.idcieorden, '/', ordenesmedicas.ordenmedica, '/', cie.codcie, '/', cie.nombrecie SEPARATOR ',,') AS ordenes, cie10.nombrecie,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

 FROM (remisiones LEFT JOIN formulasmedicas ON remisiones.codprocedimiento=formulasmedicas.codprocedimiento) 
 LEFT JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie 
 LEFT JOIN ordenesmedicas ON remisiones.codprocedimiento=ordenesmedicas.codprocedimiento 
 LEFT JOIN cie10 as cie ON ordenesmedicas.idcieorden = cie.idcie 
 LEFT JOIN medicos ON remisiones.codmedico = medicos.codmedico 
 LEFT JOIN pacientes ON remisiones.codpaciente=pacientes.codpaciente 
 LEFT JOIN eps ON pacientes.eps = eps.codeps
LEFT JOIN sucursales ON remisiones.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON remisiones.codsede=sedes.codsede 
 WHERE remisiones.codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["r"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID REMISIONES ###############################

########################## FUNCION ACTUALIZAR REMISIONES #######################
	public function ActualizarRemisiones()
	{
		self::SetNames();
		if(empty($_POST["codremision"]) or empty($_POST["codprocedimiento"]) or empty($_POST["remision"]))
		{
		echo "1";
		exit;
		}

	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) { 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }
    }
		
	   
		$sql = " update remisiones set "
			  ." remision = ? "
			  ." where "
			  ." codremision = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $remision);
		$stmt->bindParam(2, $codremision);
			
		$remision = strip_tags($_POST["remision"]);
		$codremision = strip_tags($_POST["codremision"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();


	    ################# PROCESO PARA REGISTRO Y ACTUALIZACION DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

        $sql = " select * from formulasmedicas where codprocedimiento = ? and idcieformula = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieformula'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update formulasmedicas set "
			  ." formulamedica = ? "
			  ." where "
			  ." idcieformula = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $formulamedica);
		$stmt->bindParam(2, $idcieformula);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    } 
		 
		 
	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

        $sql = " select * from ordenesmedicas where codprocedimiento = ? and idcieorden = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieorden'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update ordenesmedicas set "
			  ." ordenmedica = ? "
			  ." where "
			  ." idcieorden = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $ordenmedica);
		$stmt->bindParam(2, $idcieorden);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    }
		
	    echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LA REMISI&Oacute;N FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?r=".base64_encode($codprocedimiento)."&tipo=".base64_encode("REMISIONES")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Remision' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR REMISI&Oacute;N</strong></a></div>";
		exit;
	}
########################## FUNCION ACTUALIZAR REMISIONES #######################

############################ FUNCION ELIMINAR REMISIONES ###########################
public function EliminarRemisiones()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from remisiones where codremision = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codremision);
		$codremision = base64_decode($_GET["codremision"]);
		$stmt->execute();
		
		header("Location: remisiones?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: remisiones?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR REMISIONES ###########################

##################################### FIN DE CLASE REMISIONES ########################################






























##################################### CLASE FORMULAS MEDICAS ########################################

############################# FUNCION REGISTRAR FORMULAS MEDICAS ##############################
public function RegistrarFormulasMedicas()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["formulamedica"]))
		{
			echo "1";
			exit;
		}		
		
	############# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ############## 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }	

	if (strip_tags(isset($_POST['idcieorden']))) {

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }
    }

	
	$sql = " select codprocedimiento from formulasmedicas where procedimiento = 'FORMULA MEDICA' order by codprocedimiento desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codprocedimiento["codprocedimiento"]=$row["codprocedimiento"];

      }
          
         if(empty($codprocedimiento["codprocedimiento"])) {

                $numproced = 'F00000000000001';

          } else {

                $num     = substr($codprocedimiento["codprocedimiento"] , 1);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
                $numproced = "F".$codigo;	
         }

    ################# PROCESO PARA REGISTRO DE FORMULA MEDICA ##############

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
		 
		 
	################# PROCESO PARA REGISTRO DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    }
		
	################# PROCESO PARA REGISTRO DE REMISIONES ##############		
	if (strip_tags(isset($_POST['remision']))) {

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento); 
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
	}
		
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA F&Oacute;RMULA M&Eacute;DICA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?fm=".base64_encode($numproced)."&tipo=".base64_encode("FORMULASMEDICAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Formula Medica' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR F&Oacute;RMULA M&Eacute;DICA</strong></a></div>";
	exit;
}
############################# FUNCION REGISTRAR FORMULAS MEDICAS ##############################

############################ FUNCION LISTAR FORMULAS MEDICAS #############################
public function ListarFormulasMedicas()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM formulasmedicas INNER JOIN medicos ON formulasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON formulasmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie WHERE formulasmedicas.especialidad = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM formulasmedicas INNER JOIN medicos ON formulasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON formulasmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie WHERE formulasmedicas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR FORMULAS MEDICAS #############################

############################ FUNCION LISTAR FORMULAS MEDICAS #2 ############################
public function ListarFormulasMedicasG()
	{
		self::SetNames();
		if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM formulasmedicas INNER JOIN medicos ON formulasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON formulasmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie WHERE formulasmedicas.especialidad = 'GINECOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM formulasmedicas INNER JOIN medicos ON formulasmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON formulasmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie WHERE formulasmedicas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}		
############################ FUNCION LISTAR FORMULAS MEDICAS #2 ############################

########################### FUNCION ID FORMULAS MEDICAS ###############################
public function FormulasMedicasPorId()
	{
		self::SetNames();

 $sql ="SELECT 
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,   

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico, 

formulasmedicas.codmedico, 
formulasmedicas.codpaciente, 
formulasmedicas.codprocedimiento, 
formulasmedicas.procedimiento, 
formulasmedicas.codcita, 
formulasmedicas.codsucursal, 
formulasmedicas.codsede, 
formulasmedicas.codformula, 
formulasmedicas.especialidad,
formulasmedicas.fechaformula,

remisiones.remision,
remisiones.fecharemision, 

GROUP_CONCAT(DISTINCT formulasmedicas.idcieformula, '/', formulasmedicas.formulamedica, '/', cie10.codcie, '/', cie10.nombrecie SEPARATOR ',,') AS formulas, 

ordenesmedicas.fechaorden,
GROUP_CONCAT(DISTINCT ordenesmedicas.idcieorden, '/', ordenesmedicas.ordenmedica, '/', cie.codcie, '/', cie.nombrecie SEPARATOR ',,') AS ordenes, cie10.nombrecie,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

 FROM (formulasmedicas LEFT JOIN remisiones ON formulasmedicas.codprocedimiento = remisiones.codprocedimiento) 
 LEFT JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie 
 LEFT JOIN ordenesmedicas ON formulasmedicas.codprocedimiento=ordenesmedicas.codprocedimiento 
 LEFT JOIN cie10 as cie ON ordenesmedicas.idcieorden = cie.idcie 
 LEFT JOIN medicos ON formulasmedicas.codmedico = medicos.codmedico 
 LEFT JOIN pacientes ON formulasmedicas.codpaciente=pacientes.codpaciente 
 LEFT JOIN eps ON pacientes.eps = eps.codeps
LEFT JOIN sucursales ON formulasmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON formulasmedicas.codsede=sedes.codsede 
 WHERE formulasmedicas.codprocedimiento = ?";

		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["fm"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID FORMULAS MEDICAS ###############################

########################## FUNCION ACTUALIZAR FORMULAS MEDICAS #######################
	public function ActualizarFormulasMedicas()
	{
		self::SetNames();
		if(empty($_POST["formulamedica"]) or empty($_POST["codprocedimiento"]) or empty($_POST["idcieformula"]))
		{
		echo "1";
		exit;
		}

	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }	

	if (strip_tags(isset($_POST['idcieorden']))) { 

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }
    }


	 ################# PROCESO PARA REGISTRO Y ACTUALIZACION DE FORMULA MEDICA ##############
		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

        $sql = " select * from formulasmedicas where codprocedimiento = ? and idcieformula = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieformula'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update formulasmedicas set "
			  ." formulamedica = ? "
			  ." where "
			  ." idcieformula = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $formulamedica);
		$stmt->bindParam(2, $idcieformula);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
		
		         } 
	}
	        }
		 
		 
	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

        $sql = " select * from ordenesmedicas where codprocedimiento = ? and idcieorden = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieorden'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update ordenesmedicas set "
			  ." ordenmedica = ? "
			  ." where "
			  ." idcieorden = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $ordenmedica);
		$stmt->bindParam(2, $idcieorden);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    }

	if (strip_tags(isset($_POST['remision']) && !empty($_POST['remision']))) { 

		$sql = " select * from remisiones where codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

		 } else {

		$sql = " update remisiones set "
			  ." remision = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $remision);
		$stmt->bindParam(2, $codprocedimiento);
			
		$remision = strip_tags($_POST["remision"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
	    }
	}
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA F&Oacute;RMULA M&Eacute;DICA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?fm=".base64_encode($codprocedimiento)."&tipo=".base64_encode("FORMULASMEDICAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Formula Medica' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR F&Oacute;RMULA M&Eacute;DICA</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR FORMULAS MEDICAS #######################

############################ FUNCION ELIMINAR FORMULAS MEDICAS ###########################
public function EliminarFormulasMedicas()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from formulasmedicas where codformula = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codformula);
		$codformula = base64_decode($_GET["codformula"]);
		$stmt->execute();
		
		header("Location: formulasmedicas?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: formulasmedicas?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR FORMULAS MEDICAS ###########################

##################################### FIN DE CLASE FORMULAS MEDICAS ########################################



































##################################### CLASE ORDENES MEDICAS ########################################

############################# FUNCION REGISTRAR ORDENES MEDICAS ##############################
public function RegistrarOrdenesMedicas()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["formulamedica"]))
		{
			echo "1";
			exit;
		}		
		
	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ############## 
	   $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }	

	if (strip_tags(isset($_POST['idcieformula']))) {

		$formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }
    }

	
	$sql = " select codprocedimiento from ordenesmedicas where procedimiento = 'ORDENES MEDICA' order by codprocedimiento desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codprocedimiento["codprocedimiento"]=$row["codprocedimiento"];

      }
          
         if(empty($codprocedimiento["codprocedimiento"])) {

                $numproced = 'O00000000000001';

          } else {

                $num     = substr($codprocedimiento["codprocedimiento"] , 1);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
                $numproced = "O".$codigo;	
         }

    ################# PROCESO PARA REGISTRO DE ORDENES MEDICA ##############

		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }

	################# PROCESO PARA REGISTRO DE FORMULAS MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) {
		
		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	}
		
	################# PROCESO PARA REGISTRO DE REMISIONES ##############		
	if (strip_tags(isset($_POST['remision']))) {

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento); 
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
	}
		
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA &Oacute;RDEN M&Eacute;DICA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?om=".base64_encode($numproced)."&tipo=".base64_encode("ORDENESMEDICAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Ordenes Medica' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR &Oacute;RDEN M&Eacute;DICA</strong></a></div>";
	exit;
}
############################# FUNCION REGISTRAR ORDENES MEDICAS ##############################

############################ FUNCION LISTAR ORDENES MEDICAS #############################
public function ListarOrdenesMedicas()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM ordenesmedicas INNER JOIN medicos ON ordenesmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON ordenesmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON ordenesmedicas.idcieorden = cie10.idcie WHERE ordenesmedicas.especialidad = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

		$sql = " SELECT * FROM ordenesmedicas INNER JOIN medicos ON ordenesmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON ordenesmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON ordenesmedicas.idcieorden = cie10.idcie WHERE ordenesmedicas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR ORDENES MEDICAS #############################

############################ FUNCION LISTAR ORDENES MEDICAS #2 ############################
public function ListarOrdenesMedicasG()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM ordenesmedicas INNER JOIN medicos ON ordenesmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON ordenesmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON ordenesmedicas.idcieorden = cie10.idcie WHERE ordenesmedicas.especialidad = 'GINECOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

		$sql = " SELECT * FROM ordenesmedicas INNER JOIN medicos ON ordenesmedicas.codmedico = medicos.codmedico INNER JOIN pacientes ON ordenesmedicas.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON ordenesmedicas.idcieorden = cie10.idcie WHERE ordenesmedicas.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR ORDENES MEDICAS #2 ############################

########################### FUNCION ID ORDENES MEDICAS ###############################
public function OrdenesMedicasPorId()
	{
		self::SetNames();

 $sql ="SELECT 
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,  

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico,

ordenesmedicas.codmedico, 
ordenesmedicas.codpaciente, 
ordenesmedicas.codprocedimiento, 
ordenesmedicas.procedimiento, 
ordenesmedicas.codcita, 
ordenesmedicas.codsucursal, 
ordenesmedicas.codsede, 
ordenesmedicas.codorden, 
ordenesmedicas.especialidad,

remisiones.remision,
remisiones.fecharemision,

formulasmedicas.fechaformula,  
GROUP_CONCAT(DISTINCT formulasmedicas.idcieformula, '/', formulasmedicas.formulamedica, '/', cie10.codcie, '/', cie10.nombrecie SEPARATOR ',,') AS formulas, 

ordenesmedicas.fechaorden,
GROUP_CONCAT(DISTINCT ordenesmedicas.idcieorden, '/', ordenesmedicas.ordenmedica, '/', cie.codcie, '/', cie.nombrecie SEPARATOR ',,') AS ordenes, cie10.nombrecie,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

 FROM (ordenesmedicas LEFT JOIN remisiones ON ordenesmedicas.codprocedimiento = remisiones.codprocedimiento)  
 LEFT JOIN cie10 as cie ON ordenesmedicas.idcieorden = cie.idcie
 LEFT JOIN formulasmedicas ON ordenesmedicas.codprocedimiento=formulasmedicas.codprocedimiento 
 LEFT JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie

 LEFT JOIN medicos ON ordenesmedicas.codmedico = medicos.codmedico 
 LEFT JOIN pacientes ON ordenesmedicas.codpaciente=pacientes.codpaciente 
 LEFT JOIN eps ON pacientes.eps = eps.codeps
LEFT JOIN sucursales ON ordenesmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON ordenesmedicas.codsede=sedes.codsede  
 WHERE ordenesmedicas.codprocedimiento = ?";

		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["om"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID ORDENES MEDICAS ###############################

########################## FUNCION ACTUALIZAR ORDENES MEDICAS #######################
	public function ActualizarOrdenesMedicas()
	{
		self::SetNames();
		if(empty($_POST["idcieorden"]) or empty($_POST["codprocedimiento"]) or empty($_POST["ordenmedica"]))
		{
		echo "1";
		exit;
		}

	################# VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############

	   	$orden = $_POST['idcieorden'];
        $repeated = array_filter(array_count_values($orden), function($count) {
        return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }

	if (strip_tags(isset($_POST['idcieformula']))) { 

       $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        } 
    }


	 ################# PROCESO PARA REGISTRO Y ACTUALIZACION DE ORDENES MEDICA ##############
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

        $sql = " select * from ordenesmedicas where codprocedimiento = ? and idcieorden = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieorden'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update ordenesmedicas set "
			  ." ordenmedica = ? "
			  ." where "
			  ." idcieorden = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $ordenmedica);
		$stmt->bindParam(2, $idcieorden);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
		
		         } 
	}
	        }

		 
	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE FORMULAS MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) {

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

        $sql = " select * from formulasmedicas where codprocedimiento = ? and idcieformula = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieformula'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update formulasmedicas set "
			  ." formulamedica = ? "
			  ." where "
			  ." idcieformula = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $formulamedica);
		$stmt->bindParam(2, $idcieformula);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		           } 
	           }
	        }
	}

	if (strip_tags(isset($_POST['remision']) && !empty($_POST['remision']))) {

		$sql = " select * from remisiones where codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

		 } else {

		$sql = " update remisiones set "
			  ." remision = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $remision);
		$stmt->bindParam(2, $codprocedimiento);
			
		$remision = strip_tags($_POST["remision"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
	    }
	}
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA &Oacute;RDEN M&Eacute;DICA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?om=".base64_encode($codprocedimiento)."&tipo=".base64_encode("ORDENESMEDICAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Orden Medica' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR &Oacute;RDEN M&Eacute;DICA</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR ORDENES MEDICAS #######################

############################ FUNCION ELIMINAR ORDENES MEDICAS ###########################
public function EliminarOrdenesMedicas()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from ordenesmedicas where codorden = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codorden);
		$codorden = base64_decode($_GET["codorden"]);
		$stmt->execute();
		
		header("Location: ordenesmedicas?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: ordenesmedicas?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR ORDENES MEDICAS ###########################

################################ FIN DE CLASE ORDENES MEDICAS ##################################
































##################################### CLASE FORMULAS DE TERAPIAS ########################################

############################# FUNCION REGISTRAR FORMULAS DE TERAPIAS ##############################
public function RegistrarFormulasTerapias()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}

	
	$sql = " select codfterapia from formulasterapias order by codfterapia desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codfterapia["codfterapia"]=$row["codfterapia"];

      }
          
         if(empty($codfterapia["codfterapia"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codfterapia["codfterapia"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }


		$sql = " SELECT * FROM formulasterapias WHERE codmedico = ? and codpaciente = ? and codsucursal = ? and DATE_FORMAT(fechaformulaterapia,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_POST["codmedico"]), $_POST["codpaciente"], $_POST["codsucursal"], date("Y-m-d")) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasterapias values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $terapiasrespiratorias);
		$stmt->bindParam(8, $terapiasfisicas);
		$stmt->bindParam(9, $micronebulizaciones);
		$stmt->bindParam(10, $fechaformulaterapia);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
if (strip_tags(isset($_POST['terapiasrespiratorias']))) { $terapiasrespiratorias = strip_tags($_POST['terapiasrespiratorias']); } else { $terapiasrespiratorias =''; }
		if (strip_tags(isset($_POST['terapiasfisicas']))) { $terapiasfisicas = strip_tags($_POST['terapiasfisicas']); } else { $terapiasfisicas =''; }
		if (strip_tags(isset($_POST['micronebulizaciones']))) { $micronebulizaciones = strip_tags($_POST['micronebulizaciones']); } else { $micronebulizaciones =''; }
		$fechaformulaterapia = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA F&Oacute;RMULA PARA TERAPIA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?ft=".base64_encode($numproced)."&tipo=".base64_encode("FORMULASTERAPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Formulas para Terapias' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR F&Oacute;RMULA PARA TERAPIA</strong></a></div>";
	exit;
		}
		else
		{
		  echo "2";
		  exit;
	    }
}
############################# FUNCION REGISTRAR FORMULAS DE TERAPIAS ##############################

############################ FUNCION LISTAR FORMULAS DE TERAPIAS #############################
public function ListarFormulasTerapias()
	{
		self::SetNames();
		$sql = " SELECT * FROM formulasterapias INNER JOIN medicos ON formulasterapias.codmedico = medicos.codmedico INNER JOIN pacientes ON formulasterapias.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
############################ FUNCION LISTAR FORMULAS DE TERAPIAS #############################

########################### FUNCION ID FORMULAS DE TERAPIAS ###############################
public function FormulasTerapiasPorId()
	{
		self::SetNames();

		$sql = " SELECT * FROM formulasterapias INNER JOIN medicos ON formulasterapias.codmedico = medicos.codmedico INNER JOIN pacientes ON formulasterapias.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON formulasterapias.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON formulasterapias.codsede = sedes.codsede WHERE formulasterapias.codfterapia = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["ft"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID FORMULAS DE TERAPIAS ###############################

########################## FUNCION ACTUALIZAR FORMULAS DE TERAPIAS #######################
	public function ActualizarFormulasTerapias()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
		echo "1";
		exit;
		}

		$sql = " update formulasterapias set "
			  ." terapiasrespiratorias = ?, "
			  ." terapiasfisicas = ?, "
			  ." micronebulizaciones = ? "
			  ." where "
			  ." codfterapia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $terapiasrespiratorias);
		$stmt->bindParam(2, $terapiasfisicas);
		$stmt->bindParam(3, $micronebulizaciones);
		$stmt->bindParam(4, $codfterapia);

if (strip_tags(isset($_POST['terapiasrespiratorias']))) { $terapiasrespiratorias = strip_tags($_POST['terapiasrespiratorias']); } else { $terapiasrespiratorias =''; }
		if (strip_tags(isset($_POST['terapiasfisicas']))) { $terapiasfisicas = strip_tags($_POST['terapiasfisicas']); } else { $terapiasfisicas =''; }
		if (strip_tags(isset($_POST['micronebulizaciones']))) { $micronebulizaciones = strip_tags($_POST['micronebulizaciones']); } else { $micronebulizaciones =''; }
		$codfterapia = strip_tags($_POST["codfterapia"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA F&Oacute;RMULA PARA TERAPIA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?fm=".base64_encode($codfterapia)."&tipo=".base64_encode("FORMULASTERAPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Formula Terapia' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR F&Oacute;RMULA TERAPIA</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR FORMULAS DE TERAPIAS #######################

############################ FUNCION ELIMINAR FORMULAS DE TERAPIAS ###########################
public function EliminarFormulasTerapias()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from formulasterapias where codfterapia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codfterapia);
		$codfterapia = base64_decode($_GET["codfterapia"]);
		$stmt->execute();
		
		header("Location: formulasterapias?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: formulasterapias?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR FORMULAS DE TERAPIAS ###########################

############################### FIN DE CLASE FORMULAS DE TERAPIAS ###################################

































##################################### CLASE SOLICITUD EXAMENES ########################################

############################# FUNCION REGISTRAR SOLICITUD EXAMENES ##############################
public function RegistrarSolicitudExamenes()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}

		if($_POST["idcie"]=="")
		{
			echo "2";
			exit;
		}

	
	$sql = " select codexamen from solicexamenes order by codexamen desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codexamen["codexamen"]=$row["codexamen"];

      }
          
         if(empty($codexamen["codexamen"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codexamen["codexamen"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }


		$sql = " SELECT * FROM solicexamenes WHERE codmedico = ? and codpaciente = ? and codsucursal = ? and DATE_FORMAT(fechasolicitud,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_POST["codmedico"]), $_POST["codpaciente"], $_POST["codsucursal"], date("Y-m-d")) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into solicexamenes values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $cuadrohepatico);
		$stmt->bindParam(8, $hematocrito);
		$stmt->bindParam(9, $hemoglobina);
		$stmt->bindParam(10, $vsg);
		$stmt->bindParam(11, $esp);
		$stmt->bindParam(12, $gotagruesa);
		$stmt->bindParam(13, $factorrh);
		$stmt->bindParam(14, $glicemia);
		$stmt->bindParam(15, $colesteroltotal);
		$stmt->bindParam(16, $colesterolhdl);
		$stmt->bindParam(17, $colesterolldl);
		$stmt->bindParam(18, $trigliceridos);
		$stmt->bindParam(19, $creatinina);
		$stmt->bindParam(20, $bun);
		$stmt->bindParam(21, $urea);
		$stmt->bindParam(22, $acidourico);
		$stmt->bindParam(23, $gliecemiapre);
		$stmt->bindParam(24, $parcialorina);
		$stmt->bindParam(25, $materiafecal);
		$stmt->bindParam(26, $basiloscopia);
		$stmt->bindParam(27, $koh);
		$stmt->bindParam(28, $flujovaginal);
		$stmt->bindParam(29, $embarazo);
		$stmt->bindParam(30, $serologia);
		$stmt->bindParam(31, $otros);
		$stmt->bindParam(32, $idcie);
		$stmt->bindParam(33, $fechasolicitud);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		if (strip_tags(isset($_POST['cuadrohepatico']))) { $cuadrohepatico = strip_tags($_POST['cuadrohepatico']); } else { $cuadrohepatico =''; }
		if (strip_tags(isset($_POST['hematocrito']))) { $hematocrito = strip_tags($_POST['hematocrito']); } else { $hematocrito =''; }
		if (strip_tags(isset($_POST['hemoglobina']))) { $hemoglobina = strip_tags($_POST['hemoglobina']); } else { $hemoglobina =''; }
		if (strip_tags(isset($_POST['vsg']))) { $vsg = strip_tags($_POST['vsg']); } else { $vsg =''; }
		if (strip_tags(isset($_POST['esp']))) { $esp = strip_tags($_POST['esp']); } else { $esp =''; }
		if (strip_tags(isset($_POST['gotagruesa']))) { $gotagruesa = strip_tags($_POST['gotagruesa']); } else { $gotagruesa =''; }
		if (strip_tags(isset($_POST['factorrh']))) { $factorrh = strip_tags($_POST['factorrh']); } else { $factorrh =''; }
		if (strip_tags(isset($_POST['glicemia']))) { $glicemia = strip_tags($_POST['glicemia']); } else { $glicemia =''; }
		if (strip_tags(isset($_POST['colesteroltotal']))) { $colesteroltotal = strip_tags($_POST['colesteroltotal']); } else { $colesteroltotal =''; }
		if (strip_tags(isset($_POST['colesterolhdl']))) { $colesterolhdl = strip_tags($_POST['colesterolhdl']); } else { $colesterolhdl =''; }
		if (strip_tags(isset($_POST['colesterolldl']))) { $colesterolldl = strip_tags($_POST['colesterolldl']); } else { $colesterolldl =''; }
		if (strip_tags(isset($_POST['trigliceridos']))) { $trigliceridos = strip_tags($_POST['trigliceridos']); } else { $trigliceridos =''; }
		if (strip_tags(isset($_POST['creatinina']))) { $creatinina = strip_tags($_POST['creatinina']); } else { $creatinina =''; }
		if (strip_tags(isset($_POST['bun']))) { $bun = strip_tags($_POST['bun']); } else { $bun =''; }
		if (strip_tags(isset($_POST['urea']))) { $urea = strip_tags($_POST['urea']); } else { $urea =''; }
		if (strip_tags(isset($_POST['acidourico']))) { $acidourico = strip_tags($_POST['acidourico']); } else { $acidourico =''; }
		if (strip_tags(isset($_POST['gliecemiapre']))) { $gliecemiapre = strip_tags($_POST['gliecemiapre']); } else { $gliecemiapre =''; }
		if (strip_tags(isset($_POST['parcialorina']))) { $parcialorina = strip_tags($_POST['parcialorina']); } else { $parcialorina =''; }
		if (strip_tags(isset($_POST['materiafecal']))) { $materiafecal = strip_tags($_POST['materiafecal']); } else { $materiafecal =''; }
		if (strip_tags(isset($_POST['basiloscopia']))) { $basiloscopia = strip_tags($_POST['basiloscopia']); } else { $basiloscopia =''; }
		if (strip_tags(isset($_POST['koh']))) { $koh = strip_tags($_POST['koh']); } else { $koh =''; }
		if (strip_tags(isset($_POST['flujovaginal']))) { $flujovaginal = strip_tags($_POST['flujovaginal']); } else { $flujovaginal =''; }
		if (strip_tags(isset($_POST['embarazo']))) { $embarazo = strip_tags($_POST['embarazo']); } else { $embarazo =''; }
		if (strip_tags(isset($_POST['serologia']))) { $serologia = strip_tags($_POST['serologia']); } else { $serologia =''; }
		if (strip_tags(isset($_POST['otros']))) { $otros = strip_tags($_POST['otros']); } else { $otros =''; }
		$idcie = strip_tags($_POST["idcie"]);
		$fechasolicitud = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA SOLICITUD DE EX&Aacute;MEN FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?se=".base64_encode($numproced)."&tipo=".base64_encode("SOLICITUDEXAMEN")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Solicitud Examen' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR SOLICITUD</strong></a></div>";
	exit;
		}
		else
		{
		  echo "3";
		  exit;
	    }
}
############################# FUNCION REGISTRAR SOLICITUD EXAMENES ##############################

############################ FUNCION LISTAR SOLICITUD EXAMENES #############################
public function ListarSolicitudExamenes()
	{
		self::SetNames();
		$sql = " SELECT * FROM solicexamenes INNER JOIN medicos ON solicexamenes.codmedico = medicos.codmedico INNER JOIN pacientes ON solicexamenes.codpaciente = pacientes.codpaciente INNER JOIN cie10 ON solicexamenes.idcie = cie10.idcie";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
############################ FUNCION LISTAR SOLICITUD EXAMENES #############################

########################### FUNCION ID SOLICITUD EXAMENES ###############################
public function SolicitudExamenesPorId()
	{
		self::SetNames();

		$sql = " SELECT * FROM solicexamenes INNER JOIN medicos ON solicexamenes.codmedico = medicos.codmedico INNER JOIN pacientes ON solicexamenes.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps INNER JOIN cie10 ON solicexamenes.idcie = cie10.idcie LEFT JOIN sucursales ON solicexamenes.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON solicexamenes.codsede = sedes.codsede WHERE solicexamenes.codexamen = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["se"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID SOLICITUD EXAMENES ###############################

########################## FUNCION ACTUALIZAR SOLICITUD EXAMENES #######################
	public function ActualizarSolicitudExamenes()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
		echo "1";
		exit;
		}

		if($_POST["idcie"]=="")
		{
			echo "2";
			exit;
		}

		$sql = " update solicexamenes set "
			  ." codpaciente = ?, "
			  ." cuadrohepatico = ?, "
			  ." hematocrito = ?, "
			  ." hemoglobina = ?, "
			  ." vsg = ?, "
			  ." esp = ?, "
			  ." gotagruesa = ?, "
			  ." factorrh = ?, "
			  ." glicemia = ?, "
			  ." colesteroltotal = ?, "
			  ." colesterolhdl = ?, "
			  ." colesterolldl = ?, "
			  ." trigliceridos = ?, "
			  ." creatinina = ?, "
			  ." bun = ?, "
			  ." urea = ?, "
			  ." acidourico = ?, "
			  ." gliecemiapre = ?, "
			  ." parcialorina = ?, "
			  ." materiafecal = ?, "
			  ." basiloscopia = ?, "
			  ." koh = ?, "
			  ." flujovaginal = ?, "
			  ." embarazo = ?, "
			  ." serologia = ?, "
			  ." otros = ?, "
			  ." idcie = ? "
			  ." where "
			  ." codexamen = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $codpaciente);
		$stmt->bindParam(2, $cuadrohepatico);
		$stmt->bindParam(3, $hematocrito);
		$stmt->bindParam(4, $hemoglobina);
		$stmt->bindParam(5, $vsg);
		$stmt->bindParam(6, $esp);
		$stmt->bindParam(7, $gotagruesa);
		$stmt->bindParam(8, $factorrh);
		$stmt->bindParam(9, $glicemia);
		$stmt->bindParam(10, $colesteroltotal);
		$stmt->bindParam(11, $colesterolhdl);
		$stmt->bindParam(12, $colesterolldl);
		$stmt->bindParam(13, $trigliceridos);
		$stmt->bindParam(14, $creatinina);
		$stmt->bindParam(15, $bun);
		$stmt->bindParam(16, $urea);
		$stmt->bindParam(17, $acidourico);
		$stmt->bindParam(18, $gliecemiapre);
		$stmt->bindParam(19, $parcialorina);
		$stmt->bindParam(20, $materiafecal);
		$stmt->bindParam(21, $basiloscopia);
		$stmt->bindParam(22, $koh);
		$stmt->bindParam(23, $flujovaginal);
		$stmt->bindParam(24, $embarazo);
		$stmt->bindParam(25, $serologia);
		$stmt->bindParam(26, $otros);
		$stmt->bindParam(27, $idcie);
		$stmt->bindParam(28, $codexamen);
		
		$codpaciente = strip_tags($_POST["codpaciente"]);
		if (strip_tags(isset($_POST['cuadrohepatico']))) { $cuadrohepatico = strip_tags($_POST['cuadrohepatico']); } else { $cuadrohepatico =''; }
		if (strip_tags(isset($_POST['hematocrito']))) { $hematocrito = strip_tags($_POST['hematocrito']); } else { $hematocrito =''; }
		if (strip_tags(isset($_POST['hemoglobina']))) { $hemoglobina = strip_tags($_POST['hemoglobina']); } else { $hemoglobina =''; }
		if (strip_tags(isset($_POST['vsg']))) { $vsg = strip_tags($_POST['vsg']); } else { $vsg =''; }
		if (strip_tags(isset($_POST['esp']))) { $esp = strip_tags($_POST['esp']); } else { $esp =''; }
		if (strip_tags(isset($_POST['gotagruesa']))) { $gotagruesa = strip_tags($_POST['gotagruesa']); } else { $gotagruesa =''; }
		if (strip_tags(isset($_POST['factorrh']))) { $factorrh = strip_tags($_POST['factorrh']); } else { $factorrh =''; }
		if (strip_tags(isset($_POST['glicemia']))) { $glicemia = strip_tags($_POST['glicemia']); } else { $glicemia =''; }
		if (strip_tags(isset($_POST['colesteroltotal']))) { $colesteroltotal = strip_tags($_POST['colesteroltotal']); } else { $colesteroltotal =''; }
		if (strip_tags(isset($_POST['colesterolhdl']))) { $colesterolhdl = strip_tags($_POST['colesterolhdl']); } else { $colesterolhdl =''; }
		if (strip_tags(isset($_POST['colesterolldl']))) { $colesterolldl = strip_tags($_POST['colesterolldl']); } else { $colesterolldl =''; }
		if (strip_tags(isset($_POST['trigliceridos']))) { $trigliceridos = strip_tags($_POST['trigliceridos']); } else { $trigliceridos =''; }
		if (strip_tags(isset($_POST['creatinina']))) { $creatinina = strip_tags($_POST['creatinina']); } else { $creatinina =''; }
		if (strip_tags(isset($_POST['bun']))) { $bun = strip_tags($_POST['bun']); } else { $bun =''; }
		if (strip_tags(isset($_POST['urea']))) { $urea = strip_tags($_POST['urea']); } else { $urea =''; }
		if (strip_tags(isset($_POST['acidourico']))) { $acidourico = strip_tags($_POST['acidourico']); } else { $acidourico =''; }
		if (strip_tags(isset($_POST['gliecemiapre']))) { $gliecemiapre = strip_tags($_POST['gliecemiapre']); } else { $gliecemiapre =''; }
		if (strip_tags(isset($_POST['parcialorina']))) { $parcialorina = strip_tags($_POST['parcialorina']); } else { $parcialorina =''; }
		if (strip_tags(isset($_POST['materiafecal']))) { $materiafecal = strip_tags($_POST['materiafecal']); } else { $materiafecal =''; }
		if (strip_tags(isset($_POST['basiloscopia']))) { $basiloscopia = strip_tags($_POST['basiloscopia']); } else { $basiloscopia =''; }
		if (strip_tags(isset($_POST['koh']))) { $koh = strip_tags($_POST['koh']); } else { $koh =''; }
		if (strip_tags(isset($_POST['flujovaginal']))) { $flujovaginal = strip_tags($_POST['flujovaginal']); } else { $flujovaginal =''; }
		if (strip_tags(isset($_POST['embarazo']))) { $embarazo = strip_tags($_POST['embarazo']); } else { $embarazo =''; }
		if (strip_tags(isset($_POST['serologia']))) { $serologia = strip_tags($_POST['serologia']); } else { $serologia =''; }
		if (strip_tags(isset($_POST['otros']))) { $otros = strip_tags($_POST['otros']); } else { $otros =''; }
		$idcie = strip_tags($_POST["idcie"]);
		$codexamen = strip_tags($_POST["codexamen"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA SOLICITUD DE EX&Aacute;MEN FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?se=".base64_encode($codexamen)."&codsucursal=".base64_encode($codsucursal)."&codsede=".base64_encode($codsede)."&tipo=".base64_encode("SOLICITUDEXAMEN")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Solicitud Examen' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR SOLICITUD</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR SOLICITUD EXAMENES #######################

############################ FUNCION ELIMINAR SOLICITUD EXAMENES ###########################
public function EliminarSolicitudExamenes()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from solicexamenes where codexamen = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codexamen);
		$codexamen = base64_decode($_GET["codexamen"]);
		$stmt->execute();
		
		header("Location: examenes?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: examenes?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR SOLICITUD EXAMENES ###########################

############################### FUNCION REPORTES DE CONSULTORIO #################################
public function BuscarReportesConsultorio()
	{
		self::SetNames();
		
		if($_GET['optradio'] == "1") {
		
$sql ="SELECT * FROM (aperturasmedicas LEFT JOIN medicos ON aperturasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON aperturasmedicas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON aperturasmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON aperturasmedicas.codsede=sedes.codsede
WHERE aperturasmedicas.codpaciente = ? AND aperturasmedicas.especialidad = 'MEDICO GENERAL'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON APERTURAS MEDICAS EN CONSULTORIO PARA EL PACIENTE </div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		} elseif($_GET['optradio'] == "2") {
		
$sql ="SELECT * FROM (hojasevolutivas LEFT JOIN medicos ON hojasevolutivas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON hojasevolutivas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON hojasevolutivas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON hojasevolutivas.codsede=sedes.codsede
WHERE hojasevolutivas.codpaciente = ? AND hojasevolutivas.especialidad = 'MEDICO GENERAL'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON HOJAS EVOLUTIVAS EN CONSULTORIO PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "3") {
		
$sql ="SELECT * FROM (remisiones LEFT JOIN medicos ON remisiones.codmedico=medicos.codmedico) LEFT JOIN pacientes ON remisiones.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON remisiones.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON remisiones.codsede=sedes.codsede
WHERE remisiones.codpaciente = ? AND remisiones.especialidad = 'MEDICO GENERAL'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON REMISIONES MEDICAS EN CONSULTORIO PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "4") {
		
$sql ="SELECT * FROM (formulasmedicas LEFT JOIN medicos ON formulasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON formulasmedicas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON formulasmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON formulasmedicas.codsede=sedes.codsede
WHERE formulasmedicas.codpaciente = ? AND formulasmedicas.especialidad = 'MEDICO GENERAL'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON FORMULAS MEDICAS EN CONSULTORIO PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "5") {
		
$sql ="SELECT * FROM (ordenesmedicas LEFT JOIN medicos ON ordenesmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON ordenesmedicas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON ordenesmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON ordenesmedicas.codsede=sedes.codsede
WHERE ordenesmedicas.codpaciente = ? AND ordenesmedicas.especialidad = 'MEDICO GENERAL'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON ORDENES MEDICAS EN CONSULTORIO PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "6") {
		
$sql ="SELECT * FROM (formulasterapias LEFT JOIN medicos ON formulasterapias.codmedico=medicos.codmedico) LEFT JOIN pacientes ON formulasterapias.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON formulasterapias.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON formulasterapias.codsede=sedes.codsede
WHERE formulasterapias.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON FORMULAS DE TERAPIAS EN CONSULTORIO PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		 }
	 } elseif($_GET['optradio'] == "7") {
		
$sql ="SELECT * FROM (solicexamenes LEFT JOIN medicos ON solicexamenes.codmedico=medicos.codmedico) LEFT JOIN pacientes ON solicexamenes.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON solicexamenes.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON solicexamenes.codsede=sedes.codsede
WHERE solicexamenes.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON SOLICITUD DE EXAMENES EN CONSULTORIO PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		 }
	 }
}
############################### FUNCION REPORTES DE CONSULTORIO #################################
	
############################### FIN DE CLASE SOLICITUD EXAMENES ################################































##################################### CLASE CRIOCAUTERIZACION ########################################

############################# FUNCION REGISTRAR CRIOCAUTERIZACION ##############################
public function RegistrarCriocauterizacion()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["motivoconsulta"]))
		{
			echo "1";
			exit;
		}
		
	########### VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }	

	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) { 

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }	
		
		$sql = " select codprocedimiento from hojasevolutivas where procedimiento = 'CRIOCAUTERIZACION' order by codprocedimiento desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codprocedimiento["codprocedimiento"]=$row["codprocedimiento"];

      }
          
         if(empty($codprocedimiento["codprocedimiento"])) {

                $numproced = 'C00000000000001';

          } else {

                $num     = substr($codprocedimiento["codprocedimiento"] , 1);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 14, "0", STR_PAD_LEFT);
                $numproced = "C".$codigo;	
         }
		
		################# PROCESO PARA REGISTRO DE HOJAS EVOLUTIVAS ##############
		$query = " insert into hojasevolutivas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $motivoconsulta);
		$stmt->bindParam(6, $examenfisico);
		$stmt->bindParam(7, $fechacitologia);
		$stmt->bindParam(8, $embarazada);
		$stmt->bindParam(9, $fechamestruacion);
		$stmt->bindParam(10, $semanas);
		$stmt->bindParam(11, $fechaparto);
		$stmt->bindParam(12, $atenproced);
		$stmt->bindParam(13, $ta);
		$stmt->bindParam(14, $temperatura);
		$stmt->bindParam(15, $fc);
		$stmt->bindParam(16, $fr);
		$stmt->bindParam(17, $peso);
		$stmt->bindParam(18, $dxpresuntivo);
		$stmt->bindParam(19, $dxdefinitivo);
		$stmt->bindParam(20, $origenenfermedad);
		$stmt->bindParam(21, $tratamiento);
		$stmt->bindParam(22, $fechagenerahoja);
		$stmt->bindParam(23, $codcita);
		$stmt->bindParam(24, $codsucursal);
		$stmt->bindParam(25, $codsede);
		$stmt->bindParam(26, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$motivoconsulta = strip_tags($_POST['motivoconsulta']);
if (strip_tags(isset($_POST['examenfisico']))) { $examenfisico = strip_tags($_POST["examenfisico"]); } else { $examenfisico = strip_tags('NINGUNO'); }

if (strip_tags(isset($_POST['fechacitologia'])) && strip_tags($_POST['fechacitologia']!="")) { $fechacitologia = strip_tags(date("Y-m-d",strtotime($_POST['fechacitologia']))); } else { $fechacitologia = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['embarazada']))) { $embarazada = strip_tags($_POST["embarazada"]); } else { $embarazada = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechamestruacion']))) { $fechamestruacion = strip_tags(date("Y-m-d",strtotime($_POST['fechamestruacion']))); } else { $fechamestruacion = strip_tags('0000-00-00'); }

if (strip_tags(isset($_POST['semanas']))) { $semanas = strip_tags($_POST["semanas"]); } else { $semanas = strip_tags('NO'); }

if (strip_tags(isset($_POST['fechaparto']))) { $fechaparto = strip_tags(date("Y-m-d",strtotime($_POST['fechaparto']))); } else { $fechaparto = strip_tags('0000-00-00'); }

        $atenproced = strip_tags($_POST["atenproced"]);

if (strip_tags(isset($_POST['ta']))) { $ta = strip_tags($_POST["ta"]); } else { $ta = strip_tags('0'); }
if (strip_tags(isset($_POST['temperatura']))) { $temperatura = strip_tags($_POST["temperatura"]); } else { $temperatura = strip_tags('0'); }
if (strip_tags(isset($_POST['fc']))) { $fc = strip_tags($_POST["fc"]); } else { $fc = strip_tags('0'); }
if (strip_tags(isset($_POST['fr']))) { $fr = strip_tags($_POST["fr"]); } else { $fr = strip_tags('0'); }
if (strip_tags(isset($_POST['peso']))) { $peso = strip_tags($_POST["peso"]); } else { $peso = strip_tags('0'); }
		
		$cont = 0;
	    $arrayBD = array();
	    $presuntivo = $_POST["presuntivo"];
		$idciepresuntivo = $_POST["idciepresuntivo"];
	    $observacionpresuntivo = $_POST["observacionpresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $presuntivo[$cont]."/".$idciepresuntivo[$cont]."/".$observacionpresuntivo[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpresuntivo = implode(",,",$arrayBD);
		
		
		$cont = 0;
	    $arrayBD = array();
	    $definitivo = $_POST["definitivo"];
		$idciedefinitivo = $_POST["idciedefinitivo"];
	    $observaciondefinitivo = $_POST["observaciondefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $definitivo[$cont]."/".$idciedefinitivo[$cont]."/".$observaciondefinitivo[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdefinitivo = implode(",,",$arrayBD);
		
		$origenenfermedad = strip_tags($_POST["origenenfermedad"]);
		$tratamiento = strip_tags($_POST["tratamiento"]);
		$fechagenerahoja = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		
	################# PROCESO PARA REGISTRO DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 
		
		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
		 
	################# PROCESO PARA REGISTRO DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {

		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
		
		         } 
	        }
	    } 
		 
	################# PROCESO PARA REGISTRO DE REMISIONES ##############
	if (strip_tags(isset($_POST['remision']))) {
		
		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $numproced);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();
	}
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA CRIOCAUTERIZACION FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?c=".base64_encode($numproced)."&tipo=".base64_encode("CRIOCAUTERIZACION")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Criocauterizacion' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR CRIOCAUTERIZACION</strong></a></div>";
	exit;
}
############################# FUNCION REGISTRAR CRIOCAUTERIZACION ##############################

############################ FUNCION LISTAR CRIOCAUTERIZACION ############################
public function ListarCriocauterizacion()
	{
		self::SetNames();

if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM hojasevolutivas INNER JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico INNER JOIN pacientes ON hojasevolutivas.codpaciente = pacientes.codpaciente WHERE hojasevolutivas.especialidad = 'GINECOLOGO' AND hojasevolutivas.procedimiento = 'CRIOCAUTERIZACION'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		$sql = " SELECT * FROM hojasevolutivas INNER JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico INNER JOIN pacientes ON hojasevolutivas.codpaciente = pacientes.codpaciente WHERE hojasevolutivas.codmedico = '".$_SESSION["codmedico"]."' AND hojasevolutivas.procedimiento = 'CRIOCAUTERIZACION'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR CRIOCAUTERIZACION ############################

########################### FUNCION ID CRIOCAUTERIZACION ###############################
public function CriocauterizacionPorId()
	{
		self::SetNames();
		$sql ="SELECT 
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,  

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico,  

hojasevolutivas.codmedico, 
hojasevolutivas.codpaciente,
hojasevolutivas.codprocedimiento,
hojasevolutivas.procedimiento,
hojasevolutivas.motivoconsulta,
hojasevolutivas.atenproced,
hojasevolutivas.dxpresuntivo,
hojasevolutivas.dxdefinitivo, 
hojasevolutivas.origenenfermedad, 
hojasevolutivas.tratamiento, 
hojasevolutivas.fechagenerahoja,
hojasevolutivas.codcita, 
hojasevolutivas.codsucursal, 
hojasevolutivas.codsede, 
hojasevolutivas.especialidad,
remisiones.remision,
remisiones.fecharemision,

formulasmedicas.fechaformula,
GROUP_CONCAT(DISTINCT formulasmedicas.idcieformula, '/', formulasmedicas.formulamedica, '/', cie10.codcie, '/', cie10.nombrecie SEPARATOR ',,') AS formulas, 

ordenesmedicas.fechaorden,
GROUP_CONCAT(DISTINCT ordenesmedicas.idcieorden, '/', ordenesmedicas.ordenmedica, '/', cie.codcie, '/', cie.nombrecie SEPARATOR ',,') AS ordenes, cie10.nombrecie,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

FROM (hojasevolutivas LEFT JOIN remisiones ON hojasevolutivas.codprocedimiento=remisiones.codprocedimiento)

LEFT JOIN formulasmedicas ON hojasevolutivas.codprocedimiento=formulasmedicas.codprocedimiento 
LEFT JOIN cie10 ON formulasmedicas.idcieformula = cie10.idcie 
LEFT JOIN ordenesmedicas ON hojasevolutivas.codprocedimiento=ordenesmedicas.codprocedimiento 
LEFT JOIN cie10 as cie ON ordenesmedicas.idcieorden = cie.idcie 
LEFT JOIN medicos ON hojasevolutivas.codmedico = medicos.codmedico 
LEFT JOIN pacientes ON hojasevolutivas.codpaciente=pacientes.codpaciente 
LEFT JOIN eps ON pacientes.eps = eps.codeps
LEFT JOIN sucursales ON hojasevolutivas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON hojasevolutivas.codsede=sedes.codsede 
WHERE hojasevolutivas.codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["c"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}	
########################### FUNCION ID CRIOCAUTERIZACION ###############################

########################## FUNCION ACTUALIZAR CRIOCAUTERIZACION #######################
	public function ActualizarCriocauterizacion()
	{
		self::SetNames();
		if(empty($_POST["motivoconsulta"]))
		{
		echo "1";
		exit;
		}
		
	############ VERIFICO QUE NO EXISTAN ID REPETIDOS PARA FORMULAS Y ORDENES MEDICAS ##############
	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "3";
		  exit;
        }

	if (strip_tags(isset($_POST['idcieformula']) or isset($_POST['idcieorden']))) {

	   $formula = $_POST['idcieformula'];
       $repeated = array_filter(array_count_values($formula), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }	

        $orden = $_POST['idcieorden'];
       $repeated = array_filter(array_count_values($orden), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }
		
		 ################# PROCESO PARA ACTUALIZAR HOJAS EVOLUTIVAS ##############
		$sql = " update hojasevolutivas set "
			  ." motivoconsulta = ?, "
			  ." atenproced = ?, "
			  ." dxpresuntivo = ?, "
			  ." dxdefinitivo = ?, "
			  ." origenenfermedad = ?, "
			  ." tratamiento = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $motivoconsulta);
		$stmt->bindParam(2, $atenproced);
		$stmt->bindParam(3, $dxpresuntivo);
		$stmt->bindParam(4, $dxdefinitivo);
		$stmt->bindParam(5, $origenenfermedad);
		$stmt->bindParam(6, $tratamiento);
		$stmt->bindParam(7, $codprocedimiento);
			
		$motivoconsulta = strip_tags($_POST['motivoconsulta']);
		$atenproced = strip_tags($_POST["atenproced"]);
		$cont = 0;
	    $arrayBD = array();
	    $presuntivo = $_POST["presuntivo"];
		$idciepresuntivo = $_POST["idciepresuntivo"];
	    $observacionpresuntivo = $_POST["observacionpresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $presuntivo[$cont]."/".$idciepresuntivo[$cont]."/".$observacionpresuntivo[$cont];
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpresuntivo = implode(",,",$arrayBD);
		
		$cont = 0;
	    $arrayBD = array();
	    $definitivo = $_POST["definitivo"];
		$idciedefinitivo = $_POST["idciedefinitivo"];
	    $observaciondefinitivo = $_POST["observaciondefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $definitivo[$cont]."/".$idciedefinitivo[$cont]."/".$observaciondefinitivo[$cont];
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdefinitivo = implode(",,",$arrayBD);
		
		$origenenfermedad = strip_tags($_POST["origenenfermedad"]);
		$tratamiento = strip_tags($_POST["tratamiento"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$stmt->execute();


################# PROCESO PARA REGISTRO Y ACTUALIZACION DE REMISIONES ##############
	if (strip_tags(isset($_POST['remision']) && !empty($_POST['remision']))) { 

		$sql = " select * from remisiones where codprocedimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into remisiones values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $remision);
		$stmt->bindParam(6, $fecharemision);
		$stmt->bindParam(7, $codcita);
		$stmt->bindParam(8, $codsucursal);
		$stmt->bindParam(9, $codsede);
		$stmt->bindParam(10, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]);
		$remision = strip_tags($_POST["remision"]);
		$fecharemision = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

		 } else {

		$sql = " update remisiones set "
			  ." remision = ? "
			  ." where "
			  ." codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $remision);
		$stmt->bindParam(2, $codprocedimiento);
			
		$remision = strip_tags($_POST["remision"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $codsucursal = strip_tags($_POST["codsucursal"]);
	    $codsede = strip_tags($_POST["codsede"]);
	    $stmt->execute();
	    }
	}


	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE FORMULA MEDICA ##############
	if (strip_tags(isset($_POST['idcieformula']))) { 

		for($i=0;$i<count($_POST['formulamedica']);$i++){  //recorro el array
        if (!empty($_POST['formulamedica'][$i])) {

        $sql = " select * from formulasmedicas where codprocedimiento = ? and idcieformula = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieformula'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into formulasmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieformula);
		$stmt->bindParam(6, $formulamedica);
		$stmt->bindParam(7, $fechaformula);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$fechaformula = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update formulasmedicas set "
			  ." formulamedica = ? "
			  ." where "
			  ." idcieformula = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $formulamedica);
		$stmt->bindParam(2, $idcieformula);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieformula = strip_tags($_POST["idcieformula"][$i]);
		$formulamedica = strip_tags($_POST["formulamedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    } 


	################# PROCESO PARA REGISTRO Y ACTUALIZACION DE ORDENES MEDICA ##############
	if (strip_tags(isset($_POST['idcieorden']))) {
		
		for($i=0;$i<count($_POST['ordenmedica']);$i++){  //recorro el array
        if (!empty($_POST['ordenmedica'][$i])) {

        $sql = " select * from ordenesmedicas where codprocedimiento = ? and idcieorden = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codprocedimiento"], $_POST['idcieorden'][$i]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into ordenesmedicas values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codmedico);
		$stmt->bindParam(2, $codpaciente);
		$stmt->bindParam(3, $codprocedimiento);
		$stmt->bindParam(4, $procedimiento);
		$stmt->bindParam(5, $idcieorden);
		$stmt->bindParam(6, $ordenmedica);
		$stmt->bindParam(7, $fechaorden);
		$stmt->bindParam(8, $codcita);
		$stmt->bindParam(9, $codsucursal);
		$stmt->bindParam(10, $codsede);
		$stmt->bindParam(11, $especialidad);
			
		$codmedico = strip_tags($_POST["codmedico"]);
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
		$procedimiento = strip_tags($_POST["procedimiento"]); 
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$fechaorden = strip_tags(date("Y-m-d h:i:s"));
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$especialidad = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	} else {

		$sql = " update ordenesmedicas set "
			  ." ordenmedica = ? "
			  ." where "
			  ." idcieorden = ? and codprocedimiento = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $ordenmedica);
		$stmt->bindParam(2, $idcieorden);
		$stmt->bindParam(3, $codprocedimiento);
			
		$idcieorden = strip_tags($_POST["idcieorden"][$i]);
		$ordenmedica = strip_tags($_POST["ordenmedica"][$i]);
		$codprocedimiento = strip_tags($_POST["codprocedimiento"]);
	    $stmt->execute();
		
		         } 
	}
	        }
	    }
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA CRIOCAUTERIZACION FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?c=".base64_encode($codprocedimiento)."&tipo=".base64_encode("CRIOCAUTERIZACION")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Criocauterizacion' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR CRIOCAUTERIZACION</strong></a></div>";
		exit;
	}
########################## FUNCION ACTUALIZAR CRIOCAUTERIZACION #######################

############################ FUNCION ELIMINAR CRIOCAUTERIZACION ###########################
public function EliminarCriocauterizacion()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from hojasevolutivas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from formulasmedicas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from ordenesmedicas where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		$sql = " delete from remisiones where codprocedimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codprocedimiento);
		$codprocedimiento = base64_decode($_GET["codprocedimiento"]);
		$stmt->execute();
		
		header("Location: criocauterizacion?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: criocauterizacion?mesage=2");
			exit;
		  }
	} 
############################ FUNCION ELIMINAR CRIOCAUTERIZACION ###########################

################################## FIN DE CLASE CRIOCAUTERIZACION #############################






























##################################### CLASE COLPOSCOPIAS ########################################

############################# FUNCION REGISTRAR COLPOSCOPIAS ##############################
public function RegistrarColposcopia()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["impresiondiagnostica"]))
		{
			echo "1";
			exit;
		}
		
		
		$sql = " select codcolposcopia from colposcopias order by codcolposcopia desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codcolposcopia["codcolposcopia"]=$row["codcolposcopia"];

      }
          
         if(empty($codcolposcopia["codcolposcopia"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codcolposcopia["codcolposcopia"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }
		
		################# PROCESO PARA REGISTRO DE COLPOSCOPIAS ##############
		$sql = " SELECT * FROM colposcopias WHERE codmedico = ? AND codpaciente = ? AND codsucursal = ? AND codsede = ? AND DATE_FORMAT(fechacolposcopia,'%Y-%m-%d') = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"], $_POST["codsede"], date("Y-m-d")));
		$num = $stmt->rowCount();
		if($num == 0)
		{

		$query = " insert into colposcopias values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $epiteliooriginal);
		$stmt->bindParam(8, $aspectoinflamatorio);
		$stmt->bindParam(9, $aumentoredvascular);
		$stmt->bindParam(10, $imagenesatipicas);
		$stmt->bindParam(11, $epitelioacetoblanco);
		$stmt->bindParam(12, $baseopunteado);
		$stmt->bindParam(13, $aspectotumoral);
		$stmt->bindParam(14, $ulcerativo);
		$stmt->bindParam(15, $proliferativo);
		$stmt->bindParam(16, $impresiondiagnostica);
		$stmt->bindParam(17, $impresionnormal);
		$stmt->bindParam(18, $impresioninflamatoria);
		$stmt->bindParam(19, $transformaciontipica);
		$stmt->bindParam(20, $transformacionatipica);
		$stmt->bindParam(21, $mosaico);
		$stmt->bindParam(22, $vasosatipicos);
		$stmt->bindParam(23, $condiloma);
		$stmt->bindParam(24, $alteracionesvasculares);
		$stmt->bindParam(25, $vph);
		$stmt->bindParam(26, $nic);
		$stmt->bindParam(27, $cainvasor);
		$stmt->bindParam(28, $observacionesimpresion);
		$stmt->bindParam(29, $union);
		$stmt->bindParam(30, $lesion);
		$stmt->bindParam(31, $otros);
		$stmt->bindParam(32, $biopsia);
		$stmt->bindParam(33, $exocervix);
		$stmt->bindParam(34, $escamoculumnar);
		$stmt->bindParam(35, $vagina);
		$stmt->bindParam(36, $endocervix);
		$stmt->bindParam(37, $endometrio);
		$stmt->bindParam(38, $fechacolposcopia);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
if (strip_tags(isset($_POST['epiteliooriginal']))) { $epiteliooriginal = strip_tags($_POST['epiteliooriginal']); } else { $epiteliooriginal =''; }
if (strip_tags(isset($_POST['aspectoinflamatorio']))) { $aspectoinflamatorio = strip_tags($_POST['aspectoinflamatorio']); } else { $aspectoinflamatorio =''; }
if (strip_tags(isset($_POST['aumentoredvascular']))) { $aumentoredvascular = strip_tags($_POST['aumentoredvascular']); } else { $aumentoredvascular =''; }
if (strip_tags(isset($_POST['imagenesatipicas']))) { $imagenesatipicas = strip_tags($_POST['imagenesatipicas']); } else { $imagenesatipicas =''; }
if (strip_tags(isset($_POST['epitelioacetoblanco']))) { $epitelioacetoblanco = strip_tags($_POST['epitelioacetoblanco']); } else { $epitelioacetoblanco =''; }
if (strip_tags(isset($_POST['baseopunteado']))) { $baseopunteado = strip_tags($_POST['baseopunteado']); } else { $baseopunteado =''; }
if (strip_tags(isset($_POST['aspectotumoral']))) { $aspectotumoral = strip_tags($_POST['aspectotumoral']); } else { $aspectotumoral =''; }
if (strip_tags(isset($_POST['ulcerativo']))) { $ulcerativo = strip_tags($_POST['ulcerativo']); } else { $ulcerativo =''; }
if (strip_tags(isset($_POST['proliferativo']))) { $proliferativo = strip_tags($_POST['proliferativo']); } else { $proliferativo =''; }
	$impresiondiagnostica = strip_tags($_POST['impresiondiagnostica']); 
if (strip_tags(isset($_POST['impresionnormal']))) { $impresionnormal = strip_tags($_POST['impresionnormal']); } else { $impresionnormal =''; }
if (strip_tags(isset($_POST['impresioninflamatoria']))) { $impresioninflamatoria = strip_tags($_POST['impresioninflamatoria']); } else { $impresioninflamatoria =''; }
	if (strip_tags(isset($_POST['transformaciontipica']))) { $transformaciontipica = strip_tags($_POST['transformaciontipica']); } else { $transformaciontipica =''; }
if (strip_tags(isset($_POST['transformacionatipica']))) { $transformacionatipica = strip_tags($_POST['transformacionatipica']); } else { $transformacionatipica =''; }
if (strip_tags(isset($_POST['mosaico']))) { $mosaico = strip_tags($_POST['mosaico']); } else { $mosaico =''; }
if (strip_tags(isset($_POST['vasosatipicos']))) { $vasosatipicos = strip_tags($_POST['vasosatipicos']); } else { $vasosatipicos =''; }
if (strip_tags(isset($_POST['condiloma']))) { $condiloma = strip_tags($_POST['condiloma']); } else { $condiloma =''; }
if (strip_tags(isset($_POST['alteracionesvasculares']))) { $alteracionesvasculares = strip_tags($_POST['alteracionesvasculares']); } else { $alteracionesvasculares =''; }
if (strip_tags(isset($_POST['vph']))) { $vph = strip_tags($_POST['vph']); } else { $vph =''; }
if (strip_tags(isset($_POST['nic']))) { $nic = strip_tags($_POST['nic']); } else { $nic =''; }
if (strip_tags(isset($_POST['cainvasor']))) { $cainvasor = strip_tags($_POST['cainvasor']); } else { $cainvasor =''; }
	$observacionesimpresion = strip_tags($_POST['observacionesimpresion']);
	$union = strip_tags($_POST['union']);
	$lesion = strip_tags($_POST['lesion']);
	$otros = strip_tags($_POST['otros']); 
	$biopsia = strip_tags($_POST['biopsia']); 
if (strip_tags(isset($_POST['exocervix']))) { $exocervix = strip_tags($_POST['exocervix']); } else { $exocervix =''; }
if (strip_tags(isset($_POST['escamoculumnar']))) { $escamoculumnar = strip_tags($_POST['escamoculumnar']); } else { $escamoculumnar =''; }
if (strip_tags(isset($_POST['vagina']))) { $vagina = strip_tags($_POST['vagina']); } else { $vagina =''; }
if (strip_tags(isset($_POST['endocervix']))) { $endocervix = strip_tags($_POST['endocervix']); } else { $endocervix =''; }
if (strip_tags(isset($_POST['endometrio']))) { $endometrio = strip_tags($_POST['endometrio']); } else { $endometrio =''; }
	   $fechacolposcopia = strip_tags(date("Y-m-d h:i:s"));
	   $stmt->execute();
		
		
		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA COLPOSCOPIA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?co=".base64_encode($numproced)."&tipo=".base64_encode("COLPOSCOPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Colposcopia' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR COLPOSCOPIA</strong></a></div>";
	exit;
		}
		else
		{
		  echo "3";
		  exit;
	    }
}
############################# FUNCION REGISTRAR COLPOSCOPIAS ##############################

############################ FUNCION LISTAR COLPOSCOPIAS ############################
public function ListarColposcopia()
	{
		self::SetNames();

if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM colposcopias INNER JOIN medicos ON colposcopias.codmedico = medicos.codmedico INNER JOIN pacientes ON colposcopias.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {
		$sql = " SELECT * FROM colposcopias INNER JOIN medicos ON colposcopias.codmedico = medicos.codmedico INNER JOIN pacientes ON colposcopias.codpaciente = pacientes.codpaciente WHERE colposcopias.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR COLPOSCOPIAS ############################

########################### FUNCION ID COLPOSCOPIAS ###############################
public function ColposcopiaPorId()
	{
		self::SetNames();
		$sql = " SELECT * FROM colposcopias INNER JOIN medicos ON colposcopias.codmedico = medicos.codmedico INNER JOIN pacientes ON colposcopias.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON colposcopias.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON colposcopias.codsede = sedes.codsede WHERE colposcopias.codcolposcopia = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["co"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}	
########################### FUNCION ID COLPOSCOPIAS ###############################

########################## FUNCION ACTUALIZAR COLPOSCOPIAS #######################
	public function ActualizarColposcopia()
	{
		self::SetNames();
		if(empty($_POST["impresiondiagnostica"]) or empty($_POST["observacionesimpresion"]))
		{
		echo "1";
		exit;
		}
		
	
		$sql = " update colposcopias set "
			  ." epiteliooriginal = ?, "
			  ." aspectoinflamatorio = ?, "
			  ." aumentoredvascular = ?, "
			  ." imagenesatipicas = ?, "
			  ." epitelioacetoblanco = ?, "
			  ." baseopunteado = ?, "
			  ." aspectotumoral = ?, "
			  ." ulcerativo = ?, "
			  ." proliferativo = ?, "
			  ." impresiondiagnostica = ?, "
			  ." impresionnormal = ?, "
			  ." impresioninflamatoria = ?, "
			  ." transformaciontipica = ?, "
			  ." transformacionatipica = ?, "
			  ." mosaico = ?, "
			  ." vasosatipicos = ?, "
			  ." condiloma = ?, "
			  ." alteracionesvasculares = ?, "
			  ." vph = ?, "
			  ." nic = ?, "
			  ." cainvasor = ?, "
			  ." observacionesimpresion = ?, "
			  ." tunion = ?, "
			  ." tlesion = ?, "
			  ." otros = ?, "
			  ." biopsia = ?, "
			  ." exocervix = ?, "
			  ." escamoculumnar = ?, "
			  ." vagina = ?, "
			  ." endocervix = ?, "
			  ." endometrio = ? "
			  ." where "
			  ." codcolposcopia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $epiteliooriginal);
		$stmt->bindParam(2, $aspectoinflamatorio);
		$stmt->bindParam(3, $aumentoredvascular);
		$stmt->bindParam(4, $imagenesatipicas);
		$stmt->bindParam(5, $epitelioacetoblanco);
		$stmt->bindParam(6, $baseopunteado);
		$stmt->bindParam(7, $aspectotumoral);
		$stmt->bindParam(8, $ulcerativo);
		$stmt->bindParam(9, $proliferativo);
		$stmt->bindParam(10, $impresiondiagnostica);
		$stmt->bindParam(11, $impresionnormal);
		$stmt->bindParam(12, $impresioninflamatoria);
		$stmt->bindParam(13, $transformaciontipica);
		$stmt->bindParam(14, $transformacionatipica);
		$stmt->bindParam(15, $mosaico);
		$stmt->bindParam(16, $vasosatipicos);
		$stmt->bindParam(17, $condiloma);
		$stmt->bindParam(18, $alteracionesvasculares);
		$stmt->bindParam(19, $vph);
		$stmt->bindParam(20, $nic);
		$stmt->bindParam(21, $cainvasor);
		$stmt->bindParam(22, $observacionesimpresion);
		$stmt->bindParam(23, $union);
		$stmt->bindParam(24, $lesion);
		$stmt->bindParam(25, $otros);
		$stmt->bindParam(26, $biopsia);
		$stmt->bindParam(27, $exocervix);
		$stmt->bindParam(28, $escamoculumnar);
		$stmt->bindParam(29, $vagina);
		$stmt->bindParam(30, $endocervix);
		$stmt->bindParam(31, $endometrio);
		$stmt->bindParam(32, $codcolposcopia);
			
	if (strip_tags(isset($_POST['epiteliooriginal']))) { $epiteliooriginal = strip_tags($_POST['epiteliooriginal']); } else { $epiteliooriginal =''; }
	if (strip_tags(isset($_POST['aspectoinflamatorio']))) { $aspectoinflamatorio = strip_tags($_POST['aspectoinflamatorio']); } else { $aspectoinflamatorio =''; }
	if (strip_tags(isset($_POST['aumentoredvascular']))) { $aumentoredvascular = strip_tags($_POST['aumentoredvascular']); } else { $aumentoredvascular =''; }
	if (strip_tags(isset($_POST['imagenesatipicas']))) { $imagenesatipicas = strip_tags($_POST['imagenesatipicas']); } else { $imagenesatipicas =''; }
	if (strip_tags(isset($_POST['epitelioacetoblanco']))) { $epitelioacetoblanco = strip_tags($_POST['epitelioacetoblanco']); } else { $epitelioacetoblanco =''; }
	if (strip_tags(isset($_POST['baseopunteado']))) { $baseopunteado = strip_tags($_POST['baseopunteado']); } else { $baseopunteado =''; }
	if (strip_tags(isset($_POST['aspectotumoral']))) { $aspectotumoral = strip_tags($_POST['aspectotumoral']); } else { $aspectotumoral =''; }
	if (strip_tags(isset($_POST['ulcerativo']))) { $ulcerativo = strip_tags($_POST['ulcerativo']); } else { $ulcerativo =''; }
	if (strip_tags(isset($_POST['proliferativo']))) { $proliferativo = strip_tags($_POST['proliferativo']); } else { $proliferativo =''; }
	$impresiondiagnostica = strip_tags($_POST['impresiondiagnostica']); 
	if (strip_tags(isset($_POST['impresionnormal']))) { $impresionnormal = strip_tags($_POST['impresionnormal']); } else { $impresionnormal =''; }
if (strip_tags(isset($_POST['impresioninflamatoria']))) { $impresioninflamatoria = strip_tags($_POST['impresioninflamatoria']); } else { $impresioninflamatoria =''; }
	if (strip_tags(isset($_POST['transformaciontipica']))) { $transformaciontipica = strip_tags($_POST['transformaciontipica']); } else { $transformaciontipica =''; }
if (strip_tags(isset($_POST['transformacionatipica']))) { $transformacionatipica = strip_tags($_POST['transformacionatipica']); } else { $transformacionatipica =''; }
	if (strip_tags(isset($_POST['mosaico']))) { $mosaico = strip_tags($_POST['mosaico']); } else { $mosaico =''; }
	if (strip_tags(isset($_POST['vasosatipicos']))) { $vasosatipicos = strip_tags($_POST['vasosatipicos']); } else { $vasosatipicos =''; }
	if (strip_tags(isset($_POST['condiloma']))) { $condiloma = strip_tags($_POST['condiloma']); } else { $condiloma =''; }
if (strip_tags(isset($_POST['alteracionesvasculares']))) { $alteracionesvasculares = strip_tags($_POST['alteracionesvasculares']); } else { $alteracionesvasculares =''; }
	if (strip_tags(isset($_POST['vph']))) { $vph = strip_tags($_POST['vph']); } else { $vph =''; }
	if (strip_tags(isset($_POST['nic']))) { $nic = strip_tags($_POST['nic']); } else { $nic =''; }
	if (strip_tags(isset($_POST['cainvasor']))) { $cainvasor = strip_tags($_POST['cainvasor']); } else { $cainvasor =''; }
	$observacionesimpresion = strip_tags($_POST['observacionesimpresion']);
	$union = strip_tags($_POST['union']); 
	$lesion = strip_tags($_POST['lesion']);
	$otros = strip_tags($_POST['otros']); 
	$biopsia = strip_tags($_POST['biopsia']); 
	if (strip_tags(isset($_POST['exocervix']))) { $exocervix = strip_tags($_POST['exocervix']); } else { $exocervix =''; }
	if (strip_tags(isset($_POST['escamoculumnar']))) { $escamoculumnar = strip_tags($_POST['escamoculumnar']); } else { $escamoculumnar =''; }
	if (strip_tags(isset($_POST['vagina']))) { $vagina = strip_tags($_POST['vagina']); } else { $vagina =''; }
	if (strip_tags(isset($_POST['endocervix']))) { $endocervix = strip_tags($_POST['endocervix']); } else { $endocervix =''; }
	if (strip_tags(isset($_POST['endometrio']))) { $endometrio = strip_tags($_POST['endometrio']); } else { $endometrio =''; }
	   $codcolposcopia = strip_tags($_POST["codcolposcopia"]);
	$stmt->execute();

		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA COLPOSCOPIA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?co=".base64_encode($codcolposcopia)."&tipo=".base64_encode("COLPOSCOPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Criocauterizacion' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR COLPOSCOPIA</strong></a></div>";
		exit;
	}
########################## FUNCION ACTUALIZAR COLPOSCOPIAS #######################

############################ FUNCION ELIMINAR COLPOSCOPIAS ###########################
public function EliminarColposcopia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from colposcopias where codcolposcopia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codcolposcopia);
		$codcolposcopia = base64_decode($_GET["codcolposcopia"]);
		$stmt->execute();
		
		header("Location: colposcopias?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: colposcopias?mesage=2");
			exit;
		  }
	} 
############################ FUNCION ELIMINAR COLPOSCOPIAS ###########################

################################## FIN DE CLASE COLPOSCOPIAS #############################

































################################## CLASE ECOGRAFIAS #############################

############################# FUNCION REGISTRAR ECOGRAFICAS ##############################
public function RegistrarEcografia()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["observacionecografia"]))
		{
			echo "1";
			exit;
		}		
	
	$sql = " select codecografia from ecografias order by codecografia desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codecografia["codecografia"]=$row["codecografia"];

      }
          
         if(empty($codecografia["codecografia"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codecografia["codecografia"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }

		 
		$sql = " SELECT * FROM ecografias WHERE codmedico = ? AND codpaciente = ? AND codsucursal = ? AND codsede = ? AND DATE_FORMAT(fechaecografia,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"], $_POST["codsede"], date("Y-m-d")) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		
	if (isset($_FILES["file"]))
{
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name ){
		
		$file_name = $_FILES['file']['name'][$key];
		$file_size =$_FILES['file']['size'][$key];
		$file_tmp =$_FILES['file']['tmp_name'][$key];
		$file_type=$_FILES['file']['type'][$key];
		
		if ($file_type == ''){		} 
		
		 //valido que los archivos cargados sean imagenes con extension jpeg,jpg,png,gif
		 elseif ($file_type != '' && $file_type != 'image/jpeg' && $file_type != 'image/jpg' && $file_type != 'image/png' && $file_type != 'image/gif')
	  
		{
		
		//si los archivos cargados no son imagenes muestro un mensaje de error de carga
		echo "2";
		exit;
		
		} else{
		 
		if (is_dir('./fotos/'.$numproced)){
	   
	   //guardo las imagenes cargadas en la carpeta que se creo
		move_uploaded_file($file_tmp,"./fotos/".$numproced."/".$file_name);       
	
	//Ruta de la imagen original
	     $rutaImagenOriginal="./fotos/".$numproced."/".$_FILES['file']['name'][$key];
	
	     //Creamos una variable imagen a partir de la imagen original
	     $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	
	     //Se define el maximo ancho o alto que tendra la imagen final
	     $max_ancho = 200;
	     $max_alto = 200;
	
	    //Ancho y alto de la imagen original
	    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	
	    //Se calcula ancho y alto de la imagen final
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;
	
	    //Si el ancho y el alto de la imagen no superan los maximos, 
	    //ancho final y alto final son los que tiene actualmente
	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
		$ancho_final = $ancho;
		$alto_final = $alto;
	   }
	/*
	 * si proporcion horizontal*alto mayor que el alto maximo,
	 * alto final es alto por la proporcion horizontal
	 * es decir, le quitamos al alto, la misma proporcion que 
	 * le quitamos al alto
	 * 
	*/
	elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	}
	/*
	 * Igual que antes pero a la inversa
	*/
	else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
	
	//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
	
	//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	
	//Se destruye variable $img_original para liberar memoria
	imagedestroy($img_original);
	
	unlink($rutaImagenOriginal);
	
	//Definimos la calidad de la imagen final
	$calidad=95;
	
	
	//Se crea la imagen final en el directorio indicado
	imagejpeg($tmp,$rutaImagenOriginal,$calidad);
	
	
		} else {
	   
	   //creo la carpeta donde guardare las imagenes cargadas
		$dirmake = mkdir('./fotos/'.$numproced, 0777);   
	
		//guardo las imagenes cargadas en la carpeta que se creo
		move_uploaded_file($file_tmp,"./fotos/".$numproced."/".$file_name);
				
				
		//Ruta de la imagen original
	     $rutaImagenOriginal="./fotos/".$numproced."/".$_FILES['file']['name'][$key];
	
	     //Creamos una variable imagen a partir de la imagen original
	     $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	
	     //Se define el maximo ancho o alto que tendra la imagen final
	     $max_ancho = 200;
	     $max_alto = 200;
	
	    //Ancho y alto de la imagen original
	    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	
	    //Se calcula ancho y alto de la imagen final
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;
	
	    //Si el ancho y el alto de la imagen no superan los maximos, 
	    //ancho final y alto final son los que tiene actualmente
	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
		$ancho_final = $ancho;
		$alto_final = $alto;
	   }
	/*
	 * si proporcion horizontal*alto mayor que el alto maximo,
	 * alto final es alto por la proporcion horizontal
	 * es decir, le quitamos al alto, la misma proporcion que 
	 * le quitamos al alto
	 * 
	*/
	elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	}
	/*
	 * Igual que antes pero a la inversa
	*/
	else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
	
	//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
	
	//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	
	//Se destruye variable $img_original para liberar memoria
	imagedestroy($img_original);
	
	unlink($rutaImagenOriginal);
	
	//Definimos la calidad de la imagen final
	$calidad=95;
	
	
	//Se crea la imagen final en el directorio indicado
	imagejpeg($tmp,$rutaImagenOriginal,$calidad);
	
				 }
	}
		}
	}
		$query = " insert into ecografias values (?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $procedimientoecografia);
		$stmt->bindParam(8, $observacionecografia);
		$stmt->bindParam(9, $fechaecografia);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$procedimientoecografia = strip_tags($_POST['procedimientoecografia']);
		$observacionecografia = strip_tags($_POST["observacionecografia"]);
		$fechaecografia = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();

		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> EL ECOGRAFIA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?ec=".base64_encode($numproced)."&tipo=".base64_encode("ECOGRAFIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Ecografia' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR ECOGRAFIA</strong></a></div>";
	exit;
	
	} else {
		 
		echo "2";
		 exit;
	  }
}
############################# FUNCION REGISTRAR ECOGRAFICAS ##############################

############################ FUNCION LISTAR ECOGRAFICAS #############################
public function ListarEcografia()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM ecografias INNER JOIN medicos ON ecografias.codmedico = medicos.codmedico INNER JOIN pacientes ON ecografias.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM ecografias INNER JOIN medicos ON ecografias.codmedico = medicos.codmedico INNER JOIN pacientes ON ecografias.codpaciente = pacientes.codpaciente WHERE ecografias.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR ECOGRAFICAS #############################

########################### FUNCION ID ECOGRAFICAS ###############################
public function EcografiaPorId()
	{
		self::SetNames();

 $sql = " SELECT * FROM ecografias INNER JOIN medicos ON ecografias.codmedico = medicos.codmedico INNER JOIN pacientes ON ecografias.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON ecografias.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON ecografias.codsede = sedes.codsede WHERE ecografias.codecografia = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["ec"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID ECOGRAFICAS ###############################

########################## FUNCION ACTUALIZAR ECOGRAFICAS #######################
	public function ActualizarEcografia()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["observacionecografia"]))
		{
		echo "1";
		exit;
		}
		
		
		if (isset($_FILES["file"]))
{
		foreach($_FILES['file']['tmp_name'] as $key => $tmp_name ){
		
		$file_name = $_FILES['file']['name'][$key];
		$file_size =$_FILES['file']['size'][$key];
		$file_tmp =$_FILES['file']['tmp_name'][$key];
		$file_type=$_FILES['file']['type'][$key];
		
		if ($file_type == ''){		} 
		
		 //valido que los archivos cargados sean imagenes con extension jpeg,jpg,png,gif
		 elseif ($file_type != '' && $file_type != 'image/jpeg' && $file_type != 'image/jpg' && $file_type != 'image/png' && $file_type != 'image/gif')
	  
		{
		
		//si los archivos cargados no son imagenes muestro un mensaje de error de carga
		echo "2";
		exit;
		
		} else{
		 
		if (is_dir('./fotos/'.$_POST["codecografia"])){
	   
	   //guardo las imagenes cargadas en la carpeta que se creo
		move_uploaded_file($file_tmp,"./fotos/".$_POST["codecografia"]."/".$file_name);       
	
	//Ruta de la imagen original
	     $rutaImagenOriginal="./fotos/".$_POST["codecografia"]."/".$_FILES['file']['name'][$key];
	
	     //Creamos una variable imagen a partir de la imagen original
	     $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	
	     //Se define el maximo ancho o alto que tendra la imagen final
	     $max_ancho = 200;
	     $max_alto = 200;
	
	    //Ancho y alto de la imagen original
	    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	
	    //Se calcula ancho y alto de la imagen final
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;
	
	    //Si el ancho y el alto de la imagen no superan los maximos, 
	    //ancho final y alto final son los que tiene actualmente
	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
		$ancho_final = $ancho;
		$alto_final = $alto;
	   }
	/*
	 * si proporcion horizontal*alto mayor que el alto maximo,
	 * alto final es alto por la proporcion horizontal
	 * es decir, le quitamos al alto, la misma proporcion que 
	 * le quitamos al alto
	 * 
	*/
	elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	}
	/*
	 * Igual que antes pero a la inversa
	*/
	else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
	
	//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
	
	//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	
	//Se destruye variable $img_original para liberar memoria
	imagedestroy($img_original);
	
	unlink($rutaImagenOriginal);
	
	//Definimos la calidad de la imagen final
	$calidad=95;
	
	
	//Se crea la imagen final en el directorio indicado
	imagejpeg($tmp,$rutaImagenOriginal,$calidad);
	
	
		} else {
	   
	   //creo la carpeta donde guardare las imagenes cargadas
		$dirmake = mkdir('./fotos/'.$_POST["codecografia"], 0777);   
	
		//guardo las imagenes cargadas en la carpeta que se creo
		move_uploaded_file($file_tmp,"./fotos/".$_POST["codecografia"]."/".$file_name);
				
				
		//Ruta de la imagen original
	     $rutaImagenOriginal="./fotos/".$_POST["codecografia"]."/".$_FILES['file']['name'][$key];
	
	     //Creamos una variable imagen a partir de la imagen original
	     $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	
	     //Se define el maximo ancho o alto que tendra la imagen final
	     $max_ancho = 200;
	     $max_alto = 200;
	
	    //Ancho y alto de la imagen original
	    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	
	    //Se calcula ancho y alto de la imagen final
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;
	
	    //Si el ancho y el alto de la imagen no superan los maximos, 
	    //ancho final y alto final son los que tiene actualmente
	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
		$ancho_final = $ancho;
		$alto_final = $alto;
	   }
	/*
	 * si proporcion horizontal*alto mayor que el alto maximo,
	 * alto final es alto por la proporcion horizontal
	 * es decir, le quitamos al alto, la misma proporcion que 
	 * le quitamos al alto
	 * 
	*/
	elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	}
	/*
	 * Igual que antes pero a la inversa
	*/
	else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
	
	//Creamos una imagen en blanco de tamaño $ancho_final  por $alto_final .
	$tmp=imagecreatetruecolor($ancho_final,$alto_final);	
	
	//Copiamos $img_original sobre la imagen que acabamos de crear en blanco ($tmp)
	imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	
	//Se destruye variable $img_original para liberar memoria
	imagedestroy($img_original);
	
	unlink($rutaImagenOriginal);
	
	//Definimos la calidad de la imagen final
	$calidad=95;
	
	
	//Se crea la imagen final en el directorio indicado
	imagejpeg($tmp,$rutaImagenOriginal,$calidad);
	
				 }
	}
		}
	}
		
		
		$sql = " update ecografias set "
			  ." procedimiento = ?, "
			  ." observacionecografia = ? "
			  ." where "
			  ." codecografia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $procedimiento);
		$stmt->bindParam(2, $observacionecografia);
		$stmt->bindParam(3, $codecografia);
		
		$procedimiento = strip_tags($_POST["procedimientoecografia"]);
		$observacionecografia = htmlspecialchars_decode (addslashes(trim($_POST['observacionecografia'])));
		$codecografia = strip_tags($_POST["codecografia"]);
	    $stmt->execute();
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA ECOGRAFIA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?ec=".base64_encode($codecografia)."&tipo=".base64_encode("ECOGRAFIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Ecografia' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR ECOGRAFIA</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR ECOGRAFICAS #######################

############################ FUNCION ELIMINAR ECOGRAFICAS ###########################
public function EliminarEcografia()
	{
		if($_SESSION['acceso'] == "administrador") {

		//funcion para eliminar una carpeta con contenido
        $codecografia = base64_decode($_GET["codecografia"]);
        $carpeta = "fotos/".$codecografia;		
        foreach(glob($carpeta . "/*") as $archivos_carpeta){             
              if (is_dir($archivos_carpeta)){
                  rmDir_rf($archivos_carpeta);
              } else {
                  unlink($archivos_carpeta);
                     }
        }
        rmdir($carpeta);

		$sql = " delete from ecografias where codecografia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codecografia);
		$codecografia = base64_decode($_GET["codecografia"]);
		$stmt->execute();
		
		header("Location: ecografias?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: ecografias?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR ECOGRAFICAS ###########################
	
############################### FUNCION REPORTES DE GINECOLOGIA #################################
public function BuscarReportesGinecologia()
	{
		self::SetNames();
		
		if($_GET['optradio'] == "1") {
		
$sql ="SELECT * FROM (aperturasmedicas LEFT JOIN medicos ON aperturasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON aperturasmedicas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON aperturasmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON aperturasmedicas.codsede=sedes.codsede
WHERE aperturasmedicas.codpaciente = ? AND aperturasmedicas.especialidad = 'GINECOLOGO'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON APERTURAS MEDICAS EN GINECOLOGIA PARA EL PACIENTE </div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		} elseif($_GET['optradio'] == "2") {
		
$sql ="SELECT * FROM (hojasevolutivas LEFT JOIN medicos ON hojasevolutivas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON hojasevolutivas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON hojasevolutivas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON hojasevolutivas.codsede=sedes.codsede
WHERE hojasevolutivas.codpaciente = ? AND hojasevolutivas.especialidad = 'GINECOLOGO' AND procedimiento.especialidad = 'HOJA EVOLUTIVA' ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON HOJAS EVOLUTIVAS EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "3") {
		
$sql ="SELECT * FROM (remisiones LEFT JOIN medicos ON remisiones.codmedico=medicos.codmedico) LEFT JOIN pacientes ON remisiones.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON remisiones.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON remisiones.codsede=sedes.codsede
WHERE remisiones.codpaciente = ? AND remisiones.especialidad = 'GINECOLOGO'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON REMISIONES MEDICAS EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "4") {
		
$sql ="SELECT * FROM (formulasmedicas LEFT JOIN medicos ON formulasmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON formulasmedicas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON formulasmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON formulasmedicas.codsede=sedes.codsede
WHERE formulasmedicas.codpaciente = ? AND formulasmedicas.especialidad = 'GINECOLOGO'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON FORMULAS MEDICAS EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "5") {
		
$sql ="SELECT * FROM (ordenesmedicas LEFT JOIN medicos ON ordenesmedicas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON ordenesmedicas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON ordenesmedicas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON ordenesmedicas.codsede=sedes.codsede
WHERE ordenesmedicas.codpaciente = ? AND ordenesmedicas.especialidad = 'GINECOLOGO'";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON ORDENES MEDICAS EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
		  } elseif($_GET['optradio'] == "6") {
		
$sql ="SELECT * FROM (hojasevolutivas LEFT JOIN medicos ON hojasevolutivas.codmedico=medicos.codmedico) LEFT JOIN pacientes ON hojasevolutivas.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON hojasevolutivas.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON hojasevolutivas.codsede=sedes.codsede
WHERE hojasevolutivas.codpaciente = ? AND hojasevolutivas.especialidad = 'GINECOLOGO' AND hojasevolutivas.procedimiento = 'CRIOCAUTERIZACION' ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON CRIOCAUTERIZACIONES EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		 }
	 } elseif($_GET['optradio'] == "7") {
		
$sql ="SELECT * FROM (colposcopias LEFT JOIN medicos ON colposcopias.codmedico=medicos.codmedico) LEFT JOIN pacientes ON colposcopias.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON colposcopias.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON colposcopias.codsede=sedes.codsede
WHERE colposcopias.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON COLPOSCOPIAS EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		 }
	 } elseif($_GET['optradio'] == "8") {
		
$sql ="SELECT * FROM (ecografias LEFT JOIN medicos ON ecografias.codmedico=medicos.codmedico) LEFT JOIN pacientes ON ecografias.codpaciente=pacientes.codpaciente
LEFT JOIN sucursales ON ecografias.codsucursal=sucursales.codsucursal
LEFT JOIN sedes ON ecografias.codsede=sedes.codsede
WHERE ecografias.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON ECOGRAFIAS EN GINECOLOGIA PARA EL PACIENTE INGRESADO</div></center>";
	exit;
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		 }
	 }
}
############################### FUNCION REPORTES DE GINECOLOGIA #################################

################################## CLASE ECOGRAFIAS #############################









































##################################### CLASE LABORATORIOS ########################################

############################# FUNCION REGISTRAR LABORATORIOS ##############################
public function RegistrarLaboratorio()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}		
	
	$sql = " select codlaboratorio from laboratorio order by codlaboratorio desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codlaboratorio["codlaboratorio"]=$row["codlaboratorio"];

      }
          
         if(empty($codlaboratorio["codlaboratorio"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codlaboratorio["codlaboratorio"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }

		 
		$sql = " select * from laboratorio where codmedico = ? and codpaciente = ? and codsucursal = ? and codsede = ? and DATE_FORMAT(fechalaboratorio,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"], $_POST["codsede"], date("Y-m-d")) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into laboratorio values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $hematocrito);
		$stmt->bindParam(8, $hemoglobina);
		$stmt->bindParam(9, $leucocitos);
		$stmt->bindParam(10, $neutrofilos);
		$stmt->bindParam(11, $linfocitos);
		$stmt->bindParam(12, $eosinofilos);
		$stmt->bindParam(13, $monositos);
		$stmt->bindParam(14, $basofilos);
		$stmt->bindParam(15, $cayados);
		$stmt->bindParam(16, $plaquetas);
		$stmt->bindParam(17, $reticulositos);
		$stmt->bindParam(18, $vsg);
		$stmt->bindParam(19, $pt);
		$stmt->bindParam(20, $ptt);
		$stmt->bindParam(21, $clasifgrupo);
		$stmt->bindParam(22, $clasifrh);
		$stmt->bindParam(23, $observacioneshematologia);
		$stmt->bindParam(24, $glucosa);
		$stmt->bindParam(25, $colesteroltotal);
		$stmt->bindParam(26, $colesterolhdl);
		$stmt->bindParam(27, $colesterolldl);
		$stmt->bindParam(28, $trigliceridos);
		$stmt->bindParam(29, $acidourico);
		$stmt->bindParam(30, $nitrogenoureico);
		$stmt->bindParam(31, $creatinina);
		$stmt->bindParam(32, $proteinastotales);
		$stmt->bindParam(33, $albumina);
		$stmt->bindParam(34, $globulina);
		$stmt->bindParam(35, $bilirrubinatotal);
		$stmt->bindParam(36, $bilirrubinadirecta);
		$stmt->bindParam(37, $bilirrubinaindirecta);
		$stmt->bindParam(38, $fosfatasaalcalina);
		$stmt->bindParam(39, $tgo);
		$stmt->bindParam(40, $tgp);
		$stmt->bindParam(41, $amilasa);
		$stmt->bindParam(42, $observacionesquimica);
		$stmt->bindParam(43, $colorquimico);
		$stmt->bindParam(44, $aspectoquimico);
		$stmt->bindParam(45, $phquimico);
		$stmt->bindParam(46, $densidadquimico);
		$stmt->bindParam(47, $proteinaquimico);
		$stmt->bindParam(48, $glucosaquimico);
		$stmt->bindParam(49, $cetonaquimico);
		$stmt->bindParam(50, $bilirrubinaquimico);
		$stmt->bindParam(51, $urobilinogenoquimico);
		$stmt->bindParam(52, $sangrequimico);
		$stmt->bindParam(53, $leucocitosquimico);
		$stmt->bindParam(54, $nitritosquimico);
		$stmt->bindParam(55, $celulasepibajas);
		$stmt->bindParam(56, $celulasepialtas);
		$stmt->bindParam(57, $bacteriasmicroscopico);
		$stmt->bindParam(58, $leucocitosmicroscopico);
		$stmt->bindParam(59, $hematiesmicroscopico);
		$stmt->bindParam(60, $cristalesmicroscopico);
		$stmt->bindParam(61, $cilindrosmicroscopico);
		$stmt->bindParam(62, $mocomicroscopico);
		$stmt->bindParam(63, $observacionessanguinea);
		$stmt->bindParam(64, $pruebaembarazo);
		$stmt->bindParam(65, $rprsisfilis);
		$stmt->bindParam(66, $ratest);
		$stmt->bindParam(67, $astos);
		$stmt->bindParam(68, $observacionesinmunologia);
		$stmt->bindParam(69, $phfresco);
		$stmt->bindParam(70, $celulasfresco);
		$stmt->bindParam(71, $testaminafresco);
		$stmt->bindParam(72, $hongosfresco);
		$stmt->bindParam(73, $trichomonafresco);
		$stmt->bindParam(74, $leucitofresco);
		$stmt->bindParam(75, $hematiesfresco);
		$stmt->bindParam(76, $basilosgranpositivo);
		$stmt->bindParam(77, $basilosgrannegativo);
		$stmt->bindParam(78, $cocobacilogran);
		$stmt->bindParam(79, $diplococogran);
		$stmt->bindParam(80, $blastoconidiasgran);
		$stmt->bindParam(81, $pseudomiceliogran);
		$stmt->bindParam(82, $pmngran);
		$stmt->bindParam(83, $observacionesfrotis);
		$stmt->bindParam(84, $colorparasitologia);
		$stmt->bindParam(85, $consistenciaparasitologia);
		$stmt->bindParam(86, $phparasitologia);
		$stmt->bindParam(87, $sangreocultaparasitologia);
		$stmt->bindParam(88, $azucaresparasitologia);
		$stmt->bindParam(89, $almidonesparasitologia);
		$stmt->bindParam(90, $hongosparasitologia);
		$stmt->bindParam(91, $trichomonaparasitologia);
		$stmt->bindParam(92, $iodamoebaparasitologia);
		$stmt->bindParam(93, $otrosparasitologia);
		$stmt->bindParam(94, $kohmicro);
		$stmt->bindParam(95, $baciloscopiamicro);
		$stmt->bindParam(96, $fechalaboratorio);				
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
if (strip_tags(isset($_POST['hematocrito']))) { $hematocrito = strip_tags($_POST['hematocrito']); } else { $hematocrito =''; }
if (strip_tags(isset($_POST['hemoglobina']))) { $hemoglobina = strip_tags($_POST['hemoglobina']); } else { $hemoglobina =''; }
if (strip_tags(isset($_POST['leucocitos']))) { $leucocitos = strip_tags($_POST['leucocitos']); } else { $leucocitos =''; }
if (strip_tags(isset($_POST['neutrofilos']))) { $neutrofilos = strip_tags($_POST['neutrofilos']); } else { $neutrofilos =''; }
if (strip_tags(isset($_POST['linfocitos']))) { $linfocitos = strip_tags($_POST['linfocitos']); } else { $linfocitos =''; }
if (strip_tags(isset($_POST['eosinofilos']))) { $eosinofilos = strip_tags($_POST['eosinofilos']); } else { $eosinofilos =''; }
if (strip_tags(isset($_POST['monositos']))) { $monositos = strip_tags($_POST['monositos']); } else { $monositos =''; }
if (strip_tags(isset($_POST['basofilos']))) { $basofilos = strip_tags($_POST['basofilos']); } else { $basofilos =''; }
if (strip_tags(isset($_POST['cayados']))) { $cayados = strip_tags($_POST['cayados']); } else { $cayados =''; }
if (strip_tags(isset($_POST['plaquetas']))) { $plaquetas = strip_tags($_POST['plaquetas']); } else { $plaquetas =''; }
if (strip_tags(isset($_POST['reticulositos']))) { $reticulositos = strip_tags($_POST['reticulositos']); } else { $reticulositos =''; }
if (strip_tags(isset($_POST['vsg']))) { $vsg = strip_tags($_POST['vsg']); } else { $vsg =''; }
if (strip_tags(isset($_POST['pt']))) { $pt = strip_tags($_POST['pt']); } else { $pt =''; }
if (strip_tags(isset($_POST['ptt']))) { $ptt = strip_tags($_POST['ptt']); } else { $ptt =''; }
if (strip_tags(isset($_POST['clasifgrupo']))) { $clasifgrupo = strip_tags($_POST['clasifgrupo']); } else { $clasifgrupo =''; }
if (strip_tags(isset($_POST['clasifrh']))) { $clasifrh = strip_tags($_POST['clasifrh']); } else { $clasifrh =''; }
if (strip_tags(isset($_POST['observacioneshematologia']))) { $observacioneshematologia = strip_tags($_POST['observacioneshematologia']); } else { $observacioneshematologia =''; }
if (strip_tags(isset($_POST['glucosa']))) { $glucosa = strip_tags($_POST['glucosa']); } else { $glucosa =''; }
if (strip_tags(isset($_POST['colesteroltotal']))) { $colesteroltotal = strip_tags($_POST['colesteroltotal']); } else { $colesteroltotal =''; }
if (strip_tags(isset($_POST['colesterolhdl']))) { $colesterolhdl = strip_tags($_POST['colesterolhdl']); } else { $colesterolhdl =''; }
if (strip_tags(isset($_POST['colesterolldl']))) { $colesterolldl = strip_tags($_POST['colesterolldl']); } else { $colesterolldl =''; }
if (strip_tags(isset($_POST['trigliceridos']))) { $trigliceridos = strip_tags($_POST['trigliceridos']); } else { $trigliceridos =''; }
if (strip_tags(isset($_POST['acidourico']))) { $acidourico = strip_tags($_POST['acidourico']); } else { $acidourico =''; }
if (strip_tags(isset($_POST['nitrogenoureico']))) { $nitrogenoureico = strip_tags($_POST['nitrogenoureico']); } else { $nitrogenoureico =''; }
if (strip_tags(isset($_POST['creatinina']))) { $creatinina = strip_tags($_POST['creatinina']); } else { $creatinina =''; }
if (strip_tags(isset($_POST['proteinastotales']))) { $proteinastotales = strip_tags($_POST['proteinastotales']); } else { $proteinastotales =''; }
if (strip_tags(isset($_POST['albumina']))) { $albumina = strip_tags($_POST['albumina']); } else { $albumina =''; }
if (strip_tags(isset($_POST['globulina']))) { $globulina = strip_tags($_POST['globulina']); } else { $globulina =''; }
if (strip_tags(isset($_POST['bilirrubinatotal']))) { $bilirrubinatotal = strip_tags($_POST['bilirrubinatotal']); } else { $bilirrubinatotal =''; }
if (strip_tags(isset($_POST['bilirrubinadirecta']))) { $bilirrubinadirecta = strip_tags($_POST['bilirrubinadirecta']); } else { $bilirrubinadirecta =''; }
if (strip_tags(isset($_POST['bilirrubinaindirecta']))) { $bilirrubinaindirecta = strip_tags($_POST['bilirrubinaindirecta']); } else { $bilirrubinaindirecta =''; }
if (strip_tags(isset($_POST['fosfatasaalcalina']))) { $fosfatasaalcalina = strip_tags($_POST['fosfatasaalcalina']); } else { $fosfatasaalcalina =''; }
if (strip_tags(isset($_POST['tgo']))) { $tgo = strip_tags($_POST['tgo']); } else { $tgo =''; }
if (strip_tags(isset($_POST['tgp']))) { $tgp = strip_tags($_POST['tgp']); } else { $tgp =''; }
if (strip_tags(isset($_POST['amilasa']))) { $amilasa = strip_tags($_POST['amilasa']); } else { $amilasa =''; }
if (strip_tags(isset($_POST['observacionesquimica']))) { $observacionesquimica = strip_tags($_POST['observacionesquimica']); } else { $observacionesquimica =''; }
if (strip_tags(isset($_POST['colorquimico']))) { $colorquimico = strip_tags($_POST['colorquimico']); } else { $colorquimico =''; }
if (strip_tags(isset($_POST['aspectoquimico']))) { $aspectoquimico = strip_tags($_POST['aspectoquimico']); } else { $aspectoquimico =''; }
if (strip_tags(isset($_POST['phquimico']))) { $phquimico = strip_tags($_POST['phquimico']); } else { $phquimico =''; }
if (strip_tags(isset($_POST['densidadquimico']))) { $densidadquimico = strip_tags($_POST['densidadquimico']); } else { $densidadquimico =''; }
if (strip_tags(isset($_POST['proteinaquimico']))) { $proteinaquimico = strip_tags($_POST['proteinaquimico']); } else { $proteinaquimico =''; }
if (strip_tags(isset($_POST['glucosaquimico']))) { $glucosaquimico = strip_tags($_POST['glucosaquimico']); } else { $glucosaquimico =''; }
if (strip_tags(isset($_POST['cetonaquimico']))) { $cetonaquimico = strip_tags($_POST['cetonaquimico']); } else { $cetonaquimico =''; }
if (strip_tags(isset($_POST['bilirrubinaquimico']))) { $bilirrubinaquimico = strip_tags($_POST['bilirrubinaquimico']); } else { $bilirrubinaquimico =''; }
if (strip_tags(isset($_POST['urobilinogenoquimico']))) { $urobilinogenoquimico = strip_tags($_POST['urobilinogenoquimico']); } else { $urobilinogenoquimico =''; }
if (strip_tags(isset($_POST['sangrequimico']))) { $sangrequimico = strip_tags($_POST['sangrequimico']); } else { $sangrequimico =''; }
if (strip_tags(isset($_POST['leucocitosquimico']))) { $leucocitosquimico = strip_tags($_POST['leucocitosquimico']); } else { $leucocitosquimico =''; }
if (strip_tags(isset($_POST['nitritosquimico']))) { $nitritosquimico = strip_tags($_POST['nitritosquimico']); } else { $nitritosquimico =''; }
if (strip_tags(isset($_POST['celulasepibajas']))) { $celulasepibajas = strip_tags($_POST['celulasepibajas']); } else { $celulasepibajas =''; }
if (strip_tags(isset($_POST['celulasepialtas']))) { $celulasepialtas = strip_tags($_POST['celulasepialtas']); } else { $celulasepialtas =''; }
if (strip_tags(isset($_POST['bacteriasmicroscopico']))) { $bacteriasmicroscopico = strip_tags($_POST['bacteriasmicroscopico']); } else { $bacteriasmicroscopico =''; }
if (strip_tags(isset($_POST['leucocitosmicroscopico']))) { $leucocitosmicroscopico = strip_tags($_POST['leucocitosmicroscopico']); } else { $leucocitosmicroscopico =''; }
if (strip_tags(isset($_POST['hematiesmicroscopico']))) { $hematiesmicroscopico = strip_tags($_POST['hematiesmicroscopico']); } else { $hematiesmicroscopico =''; }
if (strip_tags(isset($_POST['cristalesmicroscopico']))) { $cristalesmicroscopico = strip_tags($_POST['cristalesmicroscopico']); } else { $cristalesmicroscopico =''; }
if (strip_tags(isset($_POST['cilindrosmicroscopico']))) { $cilindrosmicroscopico = strip_tags($_POST['cilindrosmicroscopico']); } else { $cilindrosmicroscopico =''; }
if (strip_tags(isset($_POST['mocomicroscopico']))) { $mocomicroscopico = strip_tags($_POST['mocomicroscopico']); } else { $mocomicroscopico =''; }
if (strip_tags(isset($_POST['observacionessanguinea']))) { $observacionessanguinea = strip_tags($_POST['observacionessanguinea']); } else { $observacionessanguinea =''; }
if (strip_tags(isset($_POST['pruebaembarazo']))) { $pruebaembarazo = strip_tags($_POST['pruebaembarazo']); } else { $pruebaembarazo =''; }
if (strip_tags(isset($_POST['rprsisfilis']))) { $rprsisfilis = strip_tags($_POST['rprsisfilis']); } else { $rprsisfilis =''; }
if (strip_tags(isset($_POST['ratest']))) { $ratest = strip_tags($_POST['ratest']); } else { $ratest =''; }
if (strip_tags(isset($_POST['astos']))) { $astos = strip_tags($_POST['astos']); } else { $astos =''; }
if (strip_tags(isset($_POST['observacionesinmunologia']))) { $observacionesinmunologia = strip_tags($_POST['observacionesinmunologia']); } else { $observacionesinmunologia =''; }
if (strip_tags(isset($_POST['phfresco']))) { $phfresco = strip_tags($_POST['phfresco']); } else { $phfresco =''; }
if (strip_tags(isset($_POST['celulasfresco']))) { $celulasfresco = strip_tags($_POST['celulasfresco']); } else { $celulasfresco =''; }
if (strip_tags(isset($_POST['testaminafresco']))) { $testaminafresco = strip_tags($_POST['testaminafresco']); } else { $testaminafresco =''; }
if (strip_tags(isset($_POST['hongosfresco']))) { $hongosfresco = strip_tags($_POST['hongosfresco']); } else { $hongosfresco =''; }
if (strip_tags(isset($_POST['trichomonafresco']))) { $trichomonafresco = strip_tags($_POST['trichomonafresco']); } else { $trichomonafresco =''; }
if (strip_tags(isset($_POST['leucitofresco']))) { $leucitofresco = strip_tags($_POST['leucitofresco']); } else { $leucitofresco =''; }
if (strip_tags(isset($_POST['hematiesfresco']))) { $hematiesfresco = strip_tags($_POST['hematiesfresco']); } else { $hematiesfresco =''; }
if (strip_tags(isset($_POST['basilosgranpositivo']))) { $basilosgranpositivo = strip_tags($_POST['basilosgranpositivo']); } else { $basilosgranpositivo =''; }
if (strip_tags(isset($_POST['basilosgrannegativo']))) { $basilosgrannegativo = strip_tags($_POST['basilosgrannegativo']); } else { $basilosgrannegativo =''; }
if (strip_tags(isset($_POST['cocobacilogran']))) { $cocobacilogran = strip_tags($_POST['cocobacilogran']); } else { $cocobacilogran =''; }
if (strip_tags(isset($_POST['diplococogran']))) { $diplococogran = strip_tags($_POST['diplococogran']); } else { $diplococogran =''; }
if (strip_tags(isset($_POST['blastoconidiasgran']))) { $blastoconidiasgran = strip_tags($_POST['blastoconidiasgran']); } else { $blastoconidiasgran =''; }
  if (strip_tags(isset($_POST['pseudomiceliogran']))) { $pseudomiceliogran = strip_tags($_POST['pseudomiceliogran']); } else { $pseudomiceliogran =''; }
if (strip_tags(isset($_POST['pmngran']))) { $pmngran = strip_tags($_POST['pmngran']); } else { $pmngran =''; }
if (strip_tags(isset($_POST['observacionesfrotis']))) { $observacionesfrotis = strip_tags($_POST['observacionesfrotis']); } else { $observacionesfrotis =''; }
if (strip_tags(isset($_POST['colorparasitologia']))) { $colorparasitologia = strip_tags($_POST['colorparasitologia']); } else { $colorparasitologia =''; }
if (strip_tags(isset($_POST['consistenciaparasitologia']))) { $consistenciaparasitologia = strip_tags($_POST['consistenciaparasitologia']); } else { $consistenciaparasitologia =''; }
if (strip_tags(isset($_POST['phparasitologia']))) { $phparasitologia = strip_tags($_POST['phparasitologia']); } else { $phparasitologia =''; }
if (strip_tags(isset($_POST['sangreocultaparasitologia']))) { $sangreocultaparasitologia = strip_tags($_POST['sangreocultaparasitologia']); } else { $sangreocultaparasitologia =''; }
if (strip_tags(isset($_POST['azucaresparasitologia']))) { $azucaresparasitologia = strip_tags($_POST['azucaresparasitologia']); } else { $azucaresparasitologia =''; }
if (strip_tags(isset($_POST['almidonesparasitologia']))) { $almidonesparasitologia = strip_tags($_POST['almidonesparasitologia']); } else { $almidonesparasitologia =''; }
if (strip_tags(isset($_POST['hongosparasitologia']))) { $hongosparasitologia = strip_tags($_POST['hongosparasitologia']); } else { $hongosparasitologia =''; }
 if (strip_tags(isset($_POST['trichomonaparasitologia']))) { $trichomonaparasitologia = strip_tags($_POST['trichomonaparasitologia']); } else { $trichomonaparasitologia =''; }
if (strip_tags(isset($_POST['iodamoebaparasitologia']))) { $iodamoebaparasitologia = strip_tags($_POST['iodamoebaparasitologia']); } else { $iodamoebaparasitologia =''; }
if (strip_tags(isset($_POST['otrosparasitologia']))) { $otrosparasitologia = strip_tags($_POST['otrosparasitologia']); } else { $otrosparasitologia =''; }
if (strip_tags(isset($_POST['kohmicro']))) { $kohmicro = strip_tags($_POST['kohmicro']); } else { $kohmicro =''; }
if (strip_tags(isset($_POST['baciloscopiamicro']))) { $baciloscopiamicro = strip_tags($_POST['baciloscopiamicro']); } else { $baciloscopiamicro =''; }		
		$fechalaboratorio = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();


		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> EL EXAMEN DE LABORATORIO FUE REGISTRADO EXITOSAMENTE <a href='reportepdf?l=".base64_encode($numproced)."&tipo=".base64_encode("LABORATORIO")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Examen de Laboratorio' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR EX&Aacute;MEN DE LABORATORIO</strong></a></div>";
	exit;
	
	} else {
		 
		echo "2";
		 exit;
	  }
}
############################# FUNCION REGISTRAR LABORATORIOS ##############################

############################ FUNCION LISTAR LABORATORIOS #############################
public function ListarLaboratorio()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM laboratorio INNER JOIN medicos ON laboratorio.codmedico = medicos.codmedico INNER JOIN pacientes ON laboratorio.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM laboratorio INNER JOIN medicos ON laboratorio.codmedico = medicos.codmedico INNER JOIN pacientes ON laboratorio.codpaciente = pacientes.codpaciente WHERE laboratorio.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR LABORATORIOS #############################

########################### FUNCION ID LABORATORIOS ###############################
public function LaboratorioPorId()
	{
		self::SetNames();

 $sql = " SELECT * FROM laboratorio INNER JOIN medicos ON laboratorio.codmedico = medicos.codmedico INNER JOIN pacientes ON laboratorio.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON laboratorio.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON laboratorio.codsede = sedes.codsede WHERE laboratorio.codlaboratorio = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["l"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID LABORATORIOS ###############################

########################## FUNCION ACTUALIZAR LABORATORIOS #######################
	public function ActualizarLaboratorio()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["codlaboratorio"]))
		{
		echo "1";
		exit;
		}


		$sql = " update laboratorio set "
			  ." codpaciente = ?, "
			  ." hematocrito = ?, "
			  ." hemoglobina = ?, "
			  ." leucocitos = ?, "
			  ." neutrofilos = ?, "
			  ." linfocitos = ?, "
			  ." eosinofilos = ?, "
			  ." monositos = ?, "
			  ." basofilos = ?, "
			  ." cayados = ?, "
			  ." plaquetas = ?, "
			  ." reticulositos = ?, "
			  ." vsg = ?, "
			  ." pt = ?, "
			  ." ptt = ?, "
			  ." clasifgrupo = ?, "
			  ." clasifrh = ?, "
			  ." observacioneshematologia = ?, "
			  ." glucosa = ?, "
			  ." colesteroltotal = ?, "
			  ." colesterolhdl = ?, "
			  ." colesterolldl = ?, "
			  ." trigliceridos = ?, "
			  ." acidourico = ?, "
			  ." nitrogenoureico = ?, "
			  ." creatinina = ?, "
			  ." proteinastotales = ?, "
			  ." albumina = ?, "
			  ." globulina = ?, "
			  ." bilirrubinatotal = ?, "
			  ." bilirrubinadirecta = ?, "
			  ." bilirrubinaindirecta = ?, "
			  ." fosfatasaalcalina = ?, "
			  ." tgo = ?, "
			  ." tgp = ?, "
			  ." amilasa = ?, "
			  ." observacionesquimica = ?, "
			  ." colorquimico = ?, "
			  ." aspectoquimico = ?, "
			  ." phquimico = ?, "
			  ." densidadquimico = ?, "
			  ." proteinaquimico = ?, "
			  ." glucosaquimico = ?, "
			  ." cetonaquimico = ?, "
			  ." bilirrubinaquimico = ?, "
			  ." urobilinogenoquimico = ?, "
			  ." sangrequimico = ?, "
			  ." leucocitosquimico = ?, "
			  ." nitritosquimico = ?, "
			  ." celulasepibajas = ?, "
			  ." celulasepialtas = ?, "
			  ." bacteriasmicroscopico = ?, "
			  ." leucocitosmicroscopico = ?, "
			  ." hematiesmicroscopico = ?, "
			  ." cristalesmicroscopico = ?, "
			  ." cilindrosmicroscopico = ?, "
			  ." mocomicroscopico = ?, "
			  ." observacionessanguinea = ?, "
			  ." pruebaembarazo = ?, "
			  ." rprsisfilis = ?, "
			  ." ratest = ?, "
			  ." astos = ?, "
			  ." observacionesinmunologia = ?, "
			  ." phfresco = ?, "
			  ." celulasfresco = ?, "
			  ." testaminafresco = ?, "
			  ." hongosfresco = ?, "
			  ." trichomonafresco = ?, "
			  ." leucitofresco = ?, "
			  ." hematiesfresco = ?, "
			  ." basilosgranpositivo = ?, "
			  ." basilosgrannegativo = ?, "
			  ." cocobacilogran = ?, "
			  ." diplococogran = ?, "
			  ." blastoconidiasgran = ?, "
			  ." pseudomiceliogran = ?, "
			  ." pmngran = ?, "
			  ." observacionesfrotis = ?, "
			  ." colorparasitologia = ?, "
			  ." consistenciaparasitologia = ?, "
			  ." phparasitologia = ?, "
			  ." sangreocultaparasitologia = ?, "
			  ." azucaresparasitologia = ?, "
			  ." almidonesparasitologia = ?, "
			  ." hongosparasitologia = ?, "
			  ." trichomonaparasitologia = ?, "
			  ." iodamoebaparasitologia = ?, "
			  ." otrosparasitologia = ?, "
			  ." kohmicro = ?, "
			  ." baciloscopiamicro = ? "
			  ." where "
			  ." codlaboratorio = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $codpaciente);
		$stmt->bindParam(2, $hematocrito);
		$stmt->bindParam(3, $hemoglobina);
		$stmt->bindParam(4, $leucocitos);
		$stmt->bindParam(5, $neutrofilos);
		$stmt->bindParam(6, $linfocitos);
		$stmt->bindParam(7, $eosinofilos);
		$stmt->bindParam(8, $monositos);
		$stmt->bindParam(9, $basofilos);
		$stmt->bindParam(10, $cayados);
		$stmt->bindParam(11, $plaquetas);
		$stmt->bindParam(12, $reticulositos);
		$stmt->bindParam(13, $vsg);
		$stmt->bindParam(14, $pt);
		$stmt->bindParam(15, $ptt);
		$stmt->bindParam(16, $clasifgrupo);
		$stmt->bindParam(17, $clasifrh);
		$stmt->bindParam(18, $observacioneshematologia);
		$stmt->bindParam(19, $glucosa);
		$stmt->bindParam(20, $colesteroltotal);
		$stmt->bindParam(21, $colesterolhdl);
		$stmt->bindParam(22, $colesterolldl);
		$stmt->bindParam(23, $trigliceridos);
		$stmt->bindParam(24, $acidourico);
		$stmt->bindParam(25, $nitrogenoureico);
		$stmt->bindParam(26, $creatinina);
		$stmt->bindParam(27, $proteinastotales);
		$stmt->bindParam(28, $albumina);
		$stmt->bindParam(29, $globulina);
		$stmt->bindParam(30, $bilirrubinatotal);
		$stmt->bindParam(31, $bilirrubinadirecta);
		$stmt->bindParam(32, $bilirrubinaindirecta);
		$stmt->bindParam(33, $fosfatasaalcalina);
		$stmt->bindParam(34, $tgo);
		$stmt->bindParam(35, $tgp);
		$stmt->bindParam(36, $amilasa);
		$stmt->bindParam(37, $observacionesquimica);
		$stmt->bindParam(38, $colorquimico);
		$stmt->bindParam(39, $aspectoquimico);
		$stmt->bindParam(40, $phquimico);
		$stmt->bindParam(41, $densidadquimico);
		$stmt->bindParam(42, $proteinaquimico);
		$stmt->bindParam(43, $glucosaquimico);
		$stmt->bindParam(44, $cetonaquimico);
		$stmt->bindParam(45, $bilirrubinaquimico);
		$stmt->bindParam(46, $urobilinogenoquimico);
		$stmt->bindParam(47, $sangrequimico);
		$stmt->bindParam(48, $leucocitosquimico);
		$stmt->bindParam(49, $nitritosquimico);
		$stmt->bindParam(50, $celulasepibajas);
		$stmt->bindParam(51, $celulasepialtas);
		$stmt->bindParam(52, $bacteriasmicroscopico);
		$stmt->bindParam(53, $leucocitosmicroscopico);
		$stmt->bindParam(54, $hematiesmicroscopico);
		$stmt->bindParam(55, $cristalesmicroscopico);
		$stmt->bindParam(56, $cilindrosmicroscopico);
		$stmt->bindParam(57, $mocomicroscopico);
		$stmt->bindParam(58, $observacionessanguinea);
		$stmt->bindParam(59, $pruebaembarazo);
		$stmt->bindParam(60, $rprsisfilis);
		$stmt->bindParam(61, $ratest);
		$stmt->bindParam(62, $astos);
		$stmt->bindParam(63, $observacionesinmunologia);
		$stmt->bindParam(64, $phfresco);
		$stmt->bindParam(65, $celulasfresco);
		$stmt->bindParam(66, $testaminafresco);
		$stmt->bindParam(67, $hongosfresco);
		$stmt->bindParam(68, $trichomonafresco);
		$stmt->bindParam(69, $leucitofresco);
		$stmt->bindParam(70, $hematiesfresco);
		$stmt->bindParam(71, $basilosgranpositivo);
		$stmt->bindParam(72, $basilosgrannegativo);
		$stmt->bindParam(73, $cocobacilogran);
		$stmt->bindParam(74, $diplococogran);
		$stmt->bindParam(75, $blastoconidiasgran);
		$stmt->bindParam(76, $pseudomiceliogran);
		$stmt->bindParam(77, $pmngran);
		$stmt->bindParam(78, $observacionesfrotis);
		$stmt->bindParam(79, $colorparasitologia);
		$stmt->bindParam(80, $consistenciaparasitologia);
		$stmt->bindParam(81, $phparasitologia);
		$stmt->bindParam(82, $sangreocultaparasitologia);
		$stmt->bindParam(83, $azucaresparasitologia);
		$stmt->bindParam(84, $almidonesparasitologia);
		$stmt->bindParam(85, $hongosparasitologia);
		$stmt->bindParam(86, $trichomonaparasitologia);
		$stmt->bindParam(87, $iodamoebaparasitologia);
		$stmt->bindParam(88, $otrosparasitologia);
		$stmt->bindParam(89, $kohmicro);
		$stmt->bindParam(90, $baciloscopiamicro);
		$stmt->bindParam(91, $codlaboratorio);
				
			
		$codpaciente = strip_tags($_POST["codpaciente"]);
if (strip_tags(isset($_POST['hematocrito']))) { $hematocrito = strip_tags($_POST['hematocrito']); } else { $hematocrito =''; }
if (strip_tags(isset($_POST['hemoglobina']))) { $hemoglobina = strip_tags($_POST['hemoglobina']); } else { $hemoglobina =''; }
if (strip_tags(isset($_POST['leucocitos']))) { $leucocitos = strip_tags($_POST['leucocitos']); } else { $leucocitos =''; }
if (strip_tags(isset($_POST['neutrofilos']))) { $neutrofilos = strip_tags($_POST['neutrofilos']); } else { $neutrofilos =''; }
if (strip_tags(isset($_POST['linfocitos']))) { $linfocitos = strip_tags($_POST['linfocitos']); } else { $linfocitos =''; }
if (strip_tags(isset($_POST['eosinofilos']))) { $eosinofilos = strip_tags($_POST['eosinofilos']); } else { $eosinofilos =''; }
if (strip_tags(isset($_POST['monositos']))) { $monositos = strip_tags($_POST['monositos']); } else { $monositos =''; }
if (strip_tags(isset($_POST['basofilos']))) { $basofilos = strip_tags($_POST['basofilos']); } else { $basofilos =''; }
if (strip_tags(isset($_POST['cayados']))) { $cayados = strip_tags($_POST['cayados']); } else { $cayados =''; }
if (strip_tags(isset($_POST['plaquetas']))) { $plaquetas = strip_tags($_POST['plaquetas']); } else { $plaquetas =''; }
if (strip_tags(isset($_POST['reticulositos']))) { $reticulositos = strip_tags($_POST['reticulositos']); } else { $reticulositos =''; }
if (strip_tags(isset($_POST['vsg']))) { $vsg = strip_tags($_POST['vsg']); } else { $vsg =''; }
if (strip_tags(isset($_POST['pt']))) { $pt = strip_tags($_POST['pt']); } else { $pt =''; }
if (strip_tags(isset($_POST['ptt']))) { $ptt = strip_tags($_POST['ptt']); } else { $ptt =''; }
if (strip_tags(isset($_POST['clasifgrupo']))) { $clasifgrupo = strip_tags($_POST['clasifgrupo']); } else { $clasifgrupo =''; }
if (strip_tags(isset($_POST['clasifrh']))) { $clasifrh = strip_tags($_POST['clasifrh']); } else { $clasifrh =''; }
if (strip_tags(isset($_POST['observacioneshematologia']))) { $observacioneshematologia = strip_tags($_POST['observacioneshematologia']); } else { $observacioneshematologia =''; }
if (strip_tags(isset($_POST['glucosa']))) { $glucosa = strip_tags($_POST['glucosa']); } else { $glucosa =''; }
if (strip_tags(isset($_POST['colesteroltotal']))) { $colesteroltotal = strip_tags($_POST['colesteroltotal']); } else { $colesteroltotal =''; }
if (strip_tags(isset($_POST['colesterolhdl']))) { $colesterolhdl = strip_tags($_POST['colesterolhdl']); } else { $colesterolhdl =''; }
if (strip_tags(isset($_POST['colesterolldl']))) { $colesterolldl = strip_tags($_POST['colesterolldl']); } else { $colesterolldl =''; }
if (strip_tags(isset($_POST['trigliceridos']))) { $trigliceridos = strip_tags($_POST['trigliceridos']); } else { $trigliceridos =''; }
if (strip_tags(isset($_POST['acidourico']))) { $acidourico = strip_tags($_POST['acidourico']); } else { $acidourico =''; }
if (strip_tags(isset($_POST['nitrogenoureico']))) { $nitrogenoureico = strip_tags($_POST['nitrogenoureico']); } else { $nitrogenoureico =''; }
if (strip_tags(isset($_POST['creatinina']))) { $creatinina = strip_tags($_POST['creatinina']); } else { $creatinina =''; }
if (strip_tags(isset($_POST['proteinastotales']))) { $proteinastotales = strip_tags($_POST['proteinastotales']); } else { $proteinastotales =''; }
if (strip_tags(isset($_POST['albumina']))) { $albumina = strip_tags($_POST['albumina']); } else { $albumina =''; }
if (strip_tags(isset($_POST['globulina']))) { $globulina = strip_tags($_POST['globulina']); } else { $globulina =''; }
if (strip_tags(isset($_POST['bilirrubinatotal']))) { $bilirrubinatotal = strip_tags($_POST['bilirrubinatotal']); } else { $bilirrubinatotal =''; }
if (strip_tags(isset($_POST['bilirrubinadirecta']))) { $bilirrubinadirecta = strip_tags($_POST['bilirrubinadirecta']); } else { $bilirrubinadirecta =''; }
if (strip_tags(isset($_POST['bilirrubinaindirecta']))) { $bilirrubinaindirecta = strip_tags($_POST['bilirrubinaindirecta']); } else { $bilirrubinaindirecta =''; }
if (strip_tags(isset($_POST['fosfatasaalcalina']))) { $fosfatasaalcalina = strip_tags($_POST['fosfatasaalcalina']); } else { $fosfatasaalcalina =''; }
if (strip_tags(isset($_POST['tgo']))) { $tgo = strip_tags($_POST['tgo']); } else { $tgo =''; }
if (strip_tags(isset($_POST['tgp']))) { $tgp = strip_tags($_POST['tgp']); } else { $tgp =''; }
if (strip_tags(isset($_POST['amilasa']))) { $amilasa = strip_tags($_POST['amilasa']); } else { $amilasa =''; }
if (strip_tags(isset($_POST['observacionesquimica']))) { $observacionesquimica = strip_tags($_POST['observacionesquimica']); } else { $observacionesquimica =''; }
if (strip_tags(isset($_POST['colorquimico']))) { $colorquimico = strip_tags($_POST['colorquimico']); } else { $colorquimico =''; }
if (strip_tags(isset($_POST['aspectoquimico']))) { $aspectoquimico = strip_tags($_POST['aspectoquimico']); } else { $aspectoquimico =''; }
if (strip_tags(isset($_POST['phquimico']))) { $phquimico = strip_tags($_POST['phquimico']); } else { $phquimico =''; }
if (strip_tags(isset($_POST['densidadquimico']))) { $densidadquimico = strip_tags($_POST['densidadquimico']); } else { $densidadquimico =''; }
if (strip_tags(isset($_POST['proteinaquimico']))) { $proteinaquimico = strip_tags($_POST['proteinaquimico']); } else { $proteinaquimico =''; }
if (strip_tags(isset($_POST['glucosaquimico']))) { $glucosaquimico = strip_tags($_POST['glucosaquimico']); } else { $glucosaquimico =''; }
if (strip_tags(isset($_POST['cetonaquimico']))) { $cetonaquimico = strip_tags($_POST['cetonaquimico']); } else { $cetonaquimico =''; }
if (strip_tags(isset($_POST['bilirrubinaquimico']))) { $bilirrubinaquimico = strip_tags($_POST['bilirrubinaquimico']); } else { $bilirrubinaquimico =''; }
if (strip_tags(isset($_POST['urobilinogenoquimico']))) { $urobilinogenoquimico = strip_tags($_POST['urobilinogenoquimico']); } else { $urobilinogenoquimico =''; }
if (strip_tags(isset($_POST['sangrequimico']))) { $sangrequimico = strip_tags($_POST['sangrequimico']); } else { $sangrequimico =''; }
if (strip_tags(isset($_POST['leucocitosquimico']))) { $leucocitosquimico = strip_tags($_POST['leucocitosquimico']); } else { $leucocitosquimico =''; }
if (strip_tags(isset($_POST['nitritosquimico']))) { $nitritosquimico = strip_tags($_POST['nitritosquimico']); } else { $nitritosquimico =''; }
if (strip_tags(isset($_POST['celulasepibajas']))) { $celulasepibajas = strip_tags($_POST['celulasepibajas']); } else { $celulasepibajas =''; }
if (strip_tags(isset($_POST['celulasepialtas']))) { $celulasepialtas = strip_tags($_POST['celulasepialtas']); } else { $celulasepialtas =''; }
if (strip_tags(isset($_POST['bacteriasmicroscopico']))) { $bacteriasmicroscopico = strip_tags($_POST['bacteriasmicroscopico']); } else { $bacteriasmicroscopico =''; }
if (strip_tags(isset($_POST['leucocitosmicroscopico']))) { $leucocitosmicroscopico = strip_tags($_POST['leucocitosmicroscopico']); } else { $leucocitosmicroscopico =''; }
if (strip_tags(isset($_POST['hematiesmicroscopico']))) { $hematiesmicroscopico = strip_tags($_POST['hematiesmicroscopico']); } else { $hematiesmicroscopico =''; }
if (strip_tags(isset($_POST['cristalesmicroscopico']))) { $cristalesmicroscopico = strip_tags($_POST['cristalesmicroscopico']); } else { $cristalesmicroscopico =''; }
if (strip_tags(isset($_POST['cilindrosmicroscopico']))) { $cilindrosmicroscopico = strip_tags($_POST['cilindrosmicroscopico']); } else { $cilindrosmicroscopico =''; }
if (strip_tags(isset($_POST['mocomicroscopico']))) { $mocomicroscopico = strip_tags($_POST['mocomicroscopico']); } else { $mocomicroscopico =''; }
if (strip_tags(isset($_POST['observacionessanguinea']))) { $observacionessanguinea = strip_tags($_POST['observacionessanguinea']); } else { $observacionessanguinea =''; }
if (strip_tags(isset($_POST['pruebaembarazo']))) { $pruebaembarazo = strip_tags($_POST['pruebaembarazo']); } else { $pruebaembarazo =''; }
if (strip_tags(isset($_POST['rprsisfilis']))) { $rprsisfilis = strip_tags($_POST['rprsisfilis']); } else { $rprsisfilis =''; }
if (strip_tags(isset($_POST['ratest']))) { $ratest = strip_tags($_POST['ratest']); } else { $ratest =''; }
if (strip_tags(isset($_POST['astos']))) { $astos = strip_tags($_POST['astos']); } else { $astos =''; }
if (strip_tags(isset($_POST['observacionesinmunologia']))) { $observacionesinmunologia = strip_tags($_POST['observacionesinmunologia']); } else { $observacionesinmunologia =''; }
if (strip_tags(isset($_POST['phfresco']))) { $phfresco = strip_tags($_POST['phfresco']); } else { $phfresco =''; }
if (strip_tags(isset($_POST['celulasfresco']))) { $celulasfresco = strip_tags($_POST['celulasfresco']); } else { $celulasfresco =''; }
if (strip_tags(isset($_POST['testaminafresco']))) { $testaminafresco = strip_tags($_POST['testaminafresco']); } else { $testaminafresco =''; }
if (strip_tags(isset($_POST['hongosfresco']))) { $hongosfresco = strip_tags($_POST['hongosfresco']); } else { $hongosfresco =''; }
if (strip_tags(isset($_POST['trichomonafresco']))) { $trichomonafresco = strip_tags($_POST['trichomonafresco']); } else { $trichomonafresco =''; }
if (strip_tags(isset($_POST['leucitofresco']))) { $leucitofresco = strip_tags($_POST['leucitofresco']); } else { $leucitofresco =''; }
if (strip_tags(isset($_POST['hematiesfresco']))) { $hematiesfresco = strip_tags($_POST['hematiesfresco']); } else { $hematiesfresco =''; }
if (strip_tags(isset($_POST['basilosgranpositivo']))) { $basilosgranpositivo = strip_tags($_POST['basilosgranpositivo']); } else { $basilosgranpositivo =''; }
if (strip_tags(isset($_POST['basilosgrannegativo']))) { $basilosgrannegativo = strip_tags($_POST['basilosgrannegativo']); } else { $basilosgrannegativo =''; }
if (strip_tags(isset($_POST['cocobacilogran']))) { $cocobacilogran = strip_tags($_POST['cocobacilogran']); } else { $cocobacilogran =''; }
if (strip_tags(isset($_POST['diplococogran']))) { $diplococogran = strip_tags($_POST['diplococogran']); } else { $diplococogran =''; }
if (strip_tags(isset($_POST['blastoconidiasgran']))) { $blastoconidiasgran = strip_tags($_POST['blastoconidiasgran']); } else { $blastoconidiasgran =''; }
  if (strip_tags(isset($_POST['pseudomiceliogran']))) { $pseudomiceliogran = strip_tags($_POST['pseudomiceliogran']); } else { $pseudomiceliogran =''; }
if (strip_tags(isset($_POST['pmngran']))) { $pmngran = strip_tags($_POST['pmngran']); } else { $pmngran =''; }
if (strip_tags(isset($_POST['observacionesfrotis']))) { $observacionesfrotis = strip_tags($_POST['observacionesfrotis']); } else { $observacionesfrotis =''; }
if (strip_tags(isset($_POST['colorparasitologia']))) { $colorparasitologia = strip_tags($_POST['colorparasitologia']); } else { $colorparasitologia =''; }
if (strip_tags(isset($_POST['consistenciaparasitologia']))) { $consistenciaparasitologia = strip_tags($_POST['consistenciaparasitologia']); } else { $consistenciaparasitologia =''; }
if (strip_tags(isset($_POST['phparasitologia']))) { $phparasitologia = strip_tags($_POST['phparasitologia']); } else { $phparasitologia =''; }
if (strip_tags(isset($_POST['sangreocultaparasitologia']))) { $sangreocultaparasitologia = strip_tags($_POST['sangreocultaparasitologia']); } else { $sangreocultaparasitologia =''; }
if (strip_tags(isset($_POST['azucaresparasitologia']))) { $azucaresparasitologia = strip_tags($_POST['azucaresparasitologia']); } else { $azucaresparasitologia =''; }
if (strip_tags(isset($_POST['almidonesparasitologia']))) { $almidonesparasitologia = strip_tags($_POST['almidonesparasitologia']); } else { $almidonesparasitologia =''; }
if (strip_tags(isset($_POST['hongosparasitologia']))) { $hongosparasitologia = strip_tags($_POST['hongosparasitologia']); } else { $hongosparasitologia =''; }
 if (strip_tags(isset($_POST['trichomonaparasitologia']))) { $trichomonaparasitologia = strip_tags($_POST['trichomonaparasitologia']); } else { $trichomonaparasitologia =''; }
if (strip_tags(isset($_POST['iodamoebaparasitologia']))) { $iodamoebaparasitologia = strip_tags($_POST['iodamoebaparasitologia']); } else { $iodamoebaparasitologia =''; }
if (strip_tags(isset($_POST['otrosparasitologia']))) { $otrosparasitologia = strip_tags($_POST['otrosparasitologia']); } else { $otrosparasitologia =''; }
if (strip_tags(isset($_POST['kohmicro']))) { $kohmicro = strip_tags($_POST['kohmicro']); } else { $kohmicro =''; }
if (strip_tags(isset($_POST['baciloscopiamicro']))) { $baciloscopiamicro = strip_tags($_POST['baciloscopiamicro']); } else { $baciloscopiamicro =''; }
		$codlaboratorio = strip_tags($_POST['codlaboratorio']);
	    $stmt->execute();

		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> EL EX&Aacute;MEN DE LABORATORIO FUE ACTUALIZADO EXITOSAMENTE <a href='reportepdf?l=".base64_encode($codlaboratorio)."&tipo=".base64_encode("LABORATORIO")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Examen de Laboratorio' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR EX&Aacute;MEN DE LABORATORIO</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR LABORATORIOS #######################

############################ FUNCION ELIMINAR LABORATORIOS ###########################
public function EliminarLaboratorio()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from laboratorio where codlaboratorio = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codlaboratorio);
		$codlaboratorio = base64_decode($_GET["codlaboratorio"]);
		$stmt->execute();
		
		header("Location: laboratorio?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: laboratorio?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR LABORATORIOS ###########################

############################### FUNCION REPORTES DE LABORATORIO #################################
public function BuscarReportesLaboratorio()
	{
		self::SetNames();
				
$sql = " SELECT * FROM laboratorio INNER JOIN medicos ON laboratorio.codmedico = medicos.codmedico INNER JOIN pacientes ON laboratorio.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON laboratorio.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON laboratorio.codsede = sedes.codsede WHERE laboratorio.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON EXAMEN DE LABORATORIO PARA EL PACIENTE INGRESADO </div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}
############################### FUNCION REPORTES DE LABORATORIO #################################
	
##################################### FIN DE CLASE LABORATORIOS ########################################









































##################################### CLASE RADIOLOGIA ########################################

############################# FUNCION REGISTRAR RADIOLOGIA ##############################
public function RegistrarLecturaRx()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}		
	
	$sql = " select codrx from lecturasrx order by codrx desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codrx["codrx"]=$row["codrx"];

      }
          
         if(empty($codrx["codrx"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codrx["codrx"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }

		 
		$sql = " SELECT * FROM lecturasrx WHERE codmedico = ? AND codpaciente = ? AND codsucursal = ? AND codsede = ? AND tipoestudiorx = ? AND DATE_FORMAT(fecharx,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"], $_POST["codsede"], $_POST["tipoestudiorx"], date("Y-m-d")) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into lecturasrx values (?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $tipoestudiorx);
		$stmt->bindParam(8, $diagnosticorx);
		$stmt->bindParam(9, $fecharx);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$tipoestudiorx = strip_tags($_POST["tipoestudiorx"]);
		$diagnosticorx = strip_tags($_POST["diagnosticorx"]);
		$fecharx = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();


		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> EL LECTURA RX FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?le=".base64_encode($numproced)."&tipo=".base64_encode("LECTURARX")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Lectura Rx' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR LECTURA RX</strong></a></div>";
	exit;
	
	} else {
		 
		echo "2";
		 exit;
	  }
}
############################# FUNCION REGISTRAR RADIOLOGIA ##############################

################################ FUNCION PARA PROCESAR SIN LECTURA RX #################################
	public function ProcesarLecturaRx()
	{
		if(empty($_POST["codmedico"]))
		{
		echo "1";
		exit;
		}
		
		self::SetNames();
		
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	 echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA CITA MEDICA SIN LECTURA RX FUE PROCESADA EXITOSAMENTE </div>";
	exit;
	}
################################ FUNCION PARA PROCESAR SIN LECTURA RX #################################

############################ FUNCION LISTAR RADIOLOGIA #############################
public function ListarLecturaRx()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM lecturasrx INNER JOIN medicos ON lecturasrx.codmedico = medicos.codmedico INNER JOIN pacientes ON lecturasrx.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM lecturasrx INNER JOIN medicos ON lecturasrx.codmedico = medicos.codmedico INNER JOIN pacientes ON lecturasrx.codpaciente = pacientes.codpaciente WHERE lecturasrx.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR RADIOLOGIA #############################

########################### FUNCION ID RADIOLOGIA ###############################
public function LecturaRxPorId()
	{
		self::SetNames();

 $sql = " SELECT * FROM lecturasrx INNER JOIN medicos ON lecturasrx.codmedico = medicos.codmedico INNER JOIN pacientes ON lecturasrx.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON lecturasrx.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON lecturasrx.codsede = sedes.codsede WHERE lecturasrx.codrx = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["le"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID RADIOLOGIA ###############################

########################## FUNCION ACTUALIZAR RADIOLOGIA #######################
	public function ActualizarLecturaRx()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["tipoestudiorx"]))
		{
		echo "1";
		exit;
		}


		$sql = " update lecturasrx set "
			  ." tipoestudiorx = ?, "
			  ." diagnosticorx = ? "
			  ." where "
			  ." codrx = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $tipoestudiorx);
		$stmt->bindParam(2, $diagnosticorx);
		$stmt->bindParam(3, $codrx);
			
		$tipoestudiorx = strip_tags($_POST["tipoestudiorx"]);
		$diagnosticorx = strip_tags($_POST["diagnosticorx"]);
		$codrx = strip_tags($_POST["codrx"]);
	    $stmt->execute();
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA LECTURA RX FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?le=".base64_encode($codrx)."&tipo=".base64_encode("LECTURARX")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Lectura Rx' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR LECTURA RX</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR RADIOLOGIA #######################

############################ FUNCION ELIMINAR RADIOLOGIA ###########################
public function EliminarLecturaRx()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from lecturasrx where codrx = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codrx);
		$codrx = base64_decode($_GET["codrx"]);
		$stmt->execute();
		
		header("Location: lecturasrx?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: lecturasrx?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR RADIOLOGIA ###########################

############################### FUNCION REPORTES DE RADIOLOGIA #################################
public function BuscarReportesLecturaRx()
	{
		self::SetNames();
				
$sql = " SELECT * FROM lecturasrx INNER JOIN medicos ON lecturasrx.codmedico = medicos.codmedico INNER JOIN pacientes ON lecturasrx.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON lecturasrx.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON lecturasrx.codsede = sedes.codsede WHERE lecturasrx.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON LECTURA RX PARA EL PACIENTE INGRESADO </div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}
############################### FUNCION REPORTES DE RADIOLOGIA #################################
	
##################################### FIN DE CLASE RADIOLOGIA ########################################


































##################################### CLASE TERAPIAS ########################################

######################## FUNCION BUSQUEDA TERAPIAS ABIERTAS ############################
public function BusquedaTerapiasAbiertas()
	{
		self::SetNames();
		$sql ="SELECT 
terapias.codterapia,
terapias.diagnosticoterapia,
terapias.observacionesterapia, 

GROUP_CONCAT(DISTINCT cicloterapias.idterapia, '/', cicloterapias.tratamientoterapia, '/', cicloterapias.fechacicloterapia SEPARATOR ',,') AS terapias

FROM terapias INNER JOIN cicloterapias ON terapias.codterapia=cicloterapias.codterapia 
WHERE terapias.codpaciente = ? AND terapias.observacionesterapia = ''";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codpaciente"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
	   }
}
######################## FUNCION BUSQUEDA TERAPIAS ABIERTAS ############################

############################# FUNCION REGISTRAR TERAPIAS ##############################
public function RegistrarTerapias()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}		
	
	$sql = " select codterapia from terapias order by codterapia desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codterapia["codterapia"]=$row["codterapia"];

      }
          
         if(empty($codterapia["codterapia"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codterapia["codterapia"] , 10);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }

		//$fecha = date("d-m-Y h:i:s", strtotime($_POST['fechaterapia']." ".$_POST['horaterapia']));
		$fecha = $_POST['fechaterapia'];
        $repeated = array_filter(array_count_values($fecha), function($count) {
        return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }

		
    	$sql = " SELECT * FROM terapias WHERE codmedico = ? AND codpaciente = ? AND codsucursal = ? AND codsede = ? AND diagnosticoterapia = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"], $_POST["codsede"], $_POST["diagnosticoterapia"]));
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$query = " insert into terapias values (?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $diagnosticoterapia);
		$stmt->bindParam(8, $observacionesterapia);
		$stmt->bindParam(9, $fechaterapia);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$diagnosticoterapia = strip_tags($_POST["diagnosticoterapia"]);
	if (strip_tags(isset($_POST['observacionesterapia']))) { $observacionesterapia = strip_tags($_POST['observacionesterapia']); } else { $observacionesterapia =''; }
		$fechaterapia = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();

		
		############################ PROCESO PARA REGISTRO DE CICLO DE TERAPIAS #####################
		for($i=0;$i<count($_POST['tratamientoterapia']);$i++){  //recorro el array
            if (!empty($_POST['tratamientoterapia'][$i])) {
		
		$query = " insert into cicloterapias values (null, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $tratamientoterapia);
		$stmt->bindParam(3, $fechacicloterapia);
			
		$tratamientoterapia = strip_tags($_POST["tratamientoterapia"][$i]);
		$fecha = strip_tags(date("Y-m-d",strtotime($_POST['fechaterapia'][$i])));
		$hora = strip_tags($_POST["horaterapia"][$i]);
		$fechacicloterapia = strip_tags($fecha.' '.$hora);
		$stmt->execute();

		       } 
	     }


		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA TERAPIAS FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?t=".base64_encode($numproced)."&tipo=".base64_encode("TERAPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Terapias' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR TERAPIAS</strong></a></div>";
	exit;
		}
		else
		{
		  echo "3";
		  exit;
	    }
}
############################# FUNCION REGISTRAR TERAPIAS ##############################

############################# FUNCION AGREGAR TERAPIAS ##############################
public function AgregarTerapias()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}		

		//$fecha = date("d-m-Y h:i:s", strtotime($_POST['fechaterapia']." ".$_POST['horaterapia']));
		$fecha = $_POST['fechaterapia'];
        $repeated = array_filter(array_count_values($fecha), function($count) {
        return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }


    for($i=0;$i<count($_POST['tratamientoterapia']);$i++){  //recorro el array
      if (!empty($_POST['tratamientoterapia'][$i])) {
		
		$fecha = strip_tags(date("Y-m-d",strtotime($_POST['fechaterapia'][$i])));
		$sql = " SELECT fechacicloterapia FROM cicloterapias where DATE_FORMAT(fechacicloterapia,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(date("Y-m-d", strtotime($fecha))) );
		$num = $stmt->rowCount();
		if($num > 0)
		{
		
		echo "4";
		exit;
		}
		 else
		{
		$query = " insert into cicloterapias values (null, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codterapia);
		$stmt->bindParam(2, $tratamientoterapia);
		$stmt->bindParam(3, $fechacicloterapia);
			
		$codterapia = strip_tags($_POST["codterapia"]);
		$tratamientoterapia = strip_tags($_POST["tratamientoterapia"][$i]);
		$fecha = strip_tags(date("Y-m-d",strtotime($_POST['fechaterapia'][$i])));
		$hora = strip_tags($_POST["horaterapia"][$i]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);
		$fechacicloterapia = strip_tags($fecha.' '.$hora);
		$stmt->execute();
		}

	  } 
	}

		$sql = " update terapias set "
			  ." observacionesterapia = ? "
			  ." where "
			  ." codterapia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $observacionesterapia);
		$stmt->bindParam(2, $codterapia);
			
	if (strip_tags(isset($_POST['observacionesterapia']))) { $observacionesterapia = strip_tags($_POST['observacionesterapia']); } else { $observacionesterapia =''; }
        $codterapia = strip_tags($_POST["codterapia"]);
		$stmt->execute();

		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA TERAPIAS FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?t=".base64_encode($codterapia)."&tipo=".base64_encode("TERAPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Terapias' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR TERAPIAS</strong></a></div>";
	exit;
	
}
############################# FUNCION AGREGAR TERAPIAS ##############################


############################ FUNCION LISTAR TERAPIAS #############################
public function ListarTerapias()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM terapias INNER JOIN medicos ON terapias.codmedico = medicos.codmedico INNER JOIN pacientes ON terapias.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM terapias INNER JOIN medicos ON terapias.codmedico = medicos.codmedico INNER JOIN pacientes ON terapias.codpaciente = pacientes.codpaciente WHERE terapias.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR TERAPIAS #############################

########################### FUNCION ID TERAPIAS ###############################
public function TerapiasPorId()
	{
		self::SetNames();

 $sql ="SELECT
pacientes.cedpaciente, 
pacientes.idenpaciente,
pacientes.pnompaciente,
pacientes.snompaciente, 
pacientes.papepaciente, 
pacientes.sapepaciente, 
pacientes.fnacpaciente, 
pacientes.gruposapaciente, 
pacientes.tlfpaciente,
pacientes.gruposapaciente,
pacientes.vinculacion,
pacientes.estadopaciente, 
pacientes.ocupacionpaciente,
pacientes.sexopaciente,  
pacientes.enfoquepaciente,
pacientes.ciudad,
pacientes.direcpaciente,
pacientes.nomacompana,
pacientes.direcacompana,
pacientes.tlfacompana,
pacientes.parentescoacompana,
pacientes.nomresponsable,
pacientes.direcresponsable,
pacientes.tlfresponsable,
pacientes.parentescoresponsable,
eps.nomcontabilidad,  

medicos.cedmedico,
medicos.tpmedico,
medicos.nommedico,
medicos.apemedico,
medicos.especmedico,

terapias.codmedico, 
terapias.codpaciente, 
terapias.codsucursal, 
terapias.codsede, 
terapias.codterapia,
terapias.diagnosticoterapia,
terapias.observacionesterapia,

GROUP_CONCAT(DISTINCT cicloterapias.idterapia, '/', cicloterapias.tratamientoterapia, '/', cicloterapias.fechacicloterapia SEPARATOR ',,') AS terapias,

sucursales.nitsucursal, 
sucursales.nombresucursal, 
sucursales.direccionsucursal, 
sucursales.emailsucursal, 
sucursales.telefonosucursal,
sedes.nombresede,
sedes.direccionsede,
sedes.emailsede,
sedes.telefonosede

FROM terapias INNER JOIN cicloterapias ON terapias.codterapia=cicloterapias.codterapia 
INNER JOIN medicos ON terapias.codmedico = medicos.codmedico 
INNER JOIN pacientes ON terapias.codpaciente = pacientes.codpaciente 
INNER JOIN eps ON pacientes.eps = eps.codeps 
LEFT JOIN sucursales ON terapias.codsucursal = sucursales.codsucursal 
LEFT JOIN sedes ON terapias.codsede = sedes.codsede 
WHERE terapias.codterapia = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["t"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID TERAPIAS ###############################

########################## FUNCION ACTUALIZAR TERAPIAS #######################
	public function ActualizarTerapias()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["diagnosticoterapia"]))
		{
		echo "1";
		exit;
		}

		$fecha = $_POST['fechaterapia'];
        $repeated = array_filter(array_count_values($fecha), function($count) {
        return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "2";
		  exit;
        }

        $sql = " update terapias set "
			  ." diagnosticoterapia = ?, "
			  ." observacionesterapia = ? "
			  ." where "
			  ." codterapia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $diagnosticoterapia);
		$stmt->bindParam(2, $observacionesterapia);
		$stmt->bindParam(3, $codterapia);
		
		$diagnosticoterapia = strip_tags($_POST['diagnosticoterapia']);
		$observacionesterapia = strip_tags($_POST["observacionesterapia"]);
		$codterapia = strip_tags($_POST["codterapia"]);
		$stmt->execute();
		
		    
      for($i=0;$i<count($_POST['idterapia']);$i++){  //recorro el array
           if (!empty($_POST['idterapia'][$i])) {
		
		$sql = " update cicloterapias set "
			  ." tratamientoterapia = ?, "
			  ." fechacicloterapia = ? "
			  ." where "
			  ." idterapia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $tratamientoterapia);
		$stmt->bindParam(2, $fechacicloterapia);
		$stmt->bindParam(3, $idterapia);
			
		$tratamientoterapia = strip_tags($_POST["tratamientoterapia"][$i]);
		$fecha = strip_tags(date("Y-m-d",strtotime($_POST['fechaterapia'][$i])));
		$hora = strip_tags($_POST["horaterapia"][$i]);
		$fechacicloterapia = strip_tags($fecha.' '.$hora);
		$idterapia = strip_tags($_POST["idterapia"][$i]);
		$stmt->execute();
		
		     } 
	    }
		
	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA TERAPIA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?t=".base64_encode($codterapia)."&tipo=".base64_encode("TERAPIAS")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Terapias' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR TERAPIAS</strong></a></div>";
	exit;
	}
########################## FUNCION ACTUALIZAR TERAPIAS #######################

############################ FUNCION ELIMINAR TERAPIAS ###########################
public function EliminarTerapias()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from terapias where codterapia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codterapia);
		$codterapia = base64_decode($_GET["codterapia"]);
		$stmt->execute();
		
		$sql = " delete from cicloterapias where codterapia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codterapia);
		$codterapia = base64_decode($_GET["codterapia"]);
		$stmt->execute();
		
		header("Location: terapias?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: terapias?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR TERAPIAS ###########################

############################ FUNCION ELIMINAR CICLO TERAPIAS ###########################
public function EliminarCicloTerapia()
	{
		
		$sql = " select codterapia from cicloterapias where codterapia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codterapia"])) );
		$num = $stmt->rowCount();
		if($num >= 2)
		{

		$sql = " delete from cicloterapias where idterapia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$idterapia);
		$idterapia = base64_decode($_GET["idterapia"]);
		$stmt->execute();
		
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> EL CICLO DE TERAPIA FUE ELIMINADO EXITOSAMENTE </div>";
		exit;
		   
		   }else {
		   
		echo "<div class='alert alert-danger'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> TODOS LOS CICLO DE TERAPIAS NO PUEDEN SER ELIMINADOS, VERIFIQUE POR FAVOR ! </div>";
		exit;
		  }
}
############################ FUNCION ELIMINAR CICLO TERAPIAS ###########################

############################### FUNCION REPORTES DE TERAPIAS #################################
public function BuscarReportesTerapias()
	{
		self::SetNames();
				
$sql = " SELECT * FROM terapias INNER JOIN medicos ON terapias.codmedico = medicos.codmedico INNER JOIN pacientes ON terapias.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON terapias.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON terapias.codsede = sedes.codsede WHERE terapias.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON TERAPIAS PARA EL PACIENTE INGRESADO </div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}
############################### FUNCION REPORTES DE TERAPIAS #################################
	
##################################### FIN DE CLASE TERAPIAS ########################################














































##################################### CLASE ODONTOLOGIA ########################################

######################## FUNCION BUSQUEDA ODONTOLOGIA ABIERTAS ############################
public function VerificaOdontologia()
	{
		self::SetNames();
		$sql ="SELECT * FROM odontologia WHERE codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codpaciente"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
	   }
}
######################## FUNCION BUSQUEDA ODONTOLOGIA ABIERTAS ############################

##################### FUNCION PARA REGISTRAR REFERENCIAS TRATAMIENTO ########################
	public function RegistrarOdontograma()
	{
		self::SetNames();
		if(empty($_POST["codpaciente"])) 
		{
		echo "<center><div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LOS CAMPOS NO PUEDEN IR VACIOS";
		echo "</div></center>";		
		exit;
		}

		$query = " insert into referenciasodontograma values (null, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $codpaciente);
		$stmt->bindParam(2, $estados);
		$stmt->bindParam(3, $fecharegistro);
			
		$codpaciente = strip_tags($_POST['codpaciente']);
		$referencias = array_values(array_unique($_POST["estados"]));
		$referenciasarray = str_replace("_ _", "__",$referencias);
		//$listaSimple = array_unique($referencias);
        $listaSimple = array_values(array_unique($referenciasarray));
		
		$arrayBD[] = array_values(array_unique($listaSimple));
        ######### INSERCION EN LA BD #########
        $listaSimpleFinal = implode("__",$listaSimple);
		$estados = str_replace("_ _", "__",$listaSimpleFinal);
        $fecharegistro = strip_tags(date("Y-m-d h:i:s"));
		$stmt->execute();
		
		$sql="select * from referenciasodontograma where codpaciente= ? order by codreferencia desc limit 1";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST['codpaciente']) );
		$num = $stmt->rowCount();
			if($row = $stmt->fetch())
			{
				$p[] = $row;
			}
		$anterior = $row['estados'];
		$id = $row['codreferencia'];
		$codpaciente = $row['codpaciente'];
		
		
		$sql = " delete from referenciasodontograma where codreferencia != ? and codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$id);
		$stmt->bindParam(2,$codpaciente);
		$id = $id;
		$codpaciente = $codpaciente;
		$stmt->execute();

		echo "<center><div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-square-o'></span> LAS REFERENCIAS DEL ODONTOGRAMA FUERON REGISTRADAS EXITOSAMENTE";
		echo "</div></center>";		
		exit;
		
		}
##################### FUNCION PARA REGISTRAR REFERENCIAS TRATAMIENTO ########################

######################### FUNCION ID REFERENCIA TRATAMIENTO #############################
	public function ReferenciaOdontogramaPorId()
	{
		self::SetNames();
	$sql = "SELECT * FROM referenciasodontograma where codpaciente = ? order by codreferencia desc limit 1 ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codpaciente"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch())
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
######################### FUNCION ID REFERENCIA TRATAMIENTO #############################

############################ FUNCION ELIMINAR REFERENCIAS TRATAMIENTO ###########################
public function EliminarReferenciaTratamiento()
	{
		
		$sql="SELECT * FROM referenciasodontograma where codpaciente= ? order by codreferencia desc limit 1";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET['codpaciente'])));
		$num = $stmt->rowCount();
			if($row = $stmt->fetch())
			{
				$p[] = $row;
			}
		$anterior = $row['estados'];

		$valor= $_GET['codreferencia'];
		$recibo = explode("__",$anterior);
		$listaSimple = array_unique($recibo);
        $listaSimpleFinal = array_values($listaSimple);
        unset($listaSimpleFinal[$valor]);
		
		# Indicamos que elimine "melon" del array y que reindexe los valores
        deleteFromArray($listaSimpleFinal,$valor,false);
        # mostramos el array
        //print_r(array_values($listaSimpleFinal));

       $arrayBD[] = $listaSimpleFinal;
       ######### INSERCION EN LA BD #########
       $dxpresuntivo = implode("__",$listaSimpleFinal);
	   
	   $sql = " update referenciasodontograma set "
			  ." estados = ? "
			  ." where "
			  ." codpaciente = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $dxpresuntivo);
		$stmt->bindParam(2, $codigoPaciente);
			
		$codigoPaciente = strip_tags(base64_decode($_GET['codpaciente']));
		$stmt->execute();

		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		echo "<span class='fa fa-check-circle'></span> LA REFERENCIA DE TRATAMIENTO FUE ELIMINADA EXITOSAMENTE </div>";
		exit;
}
############################ FUNCION ELIMINAR REFERENCIAS TRATAMIENTO ###########################

############################# FUNCION REGISTRAR ODONTOLOGIA ##############################
public function RegistrarOdontologia()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}
		elseif($_POST["procedimiento"]=="0" && empty($_POST["plantratamiento"]))
		{
			echo "2";
			exit;
		}
		elseif($_POST["procedimiento"]=="0" && empty($_POST["estados"]))
		{
			echo "3";
			exit;
		}		
	
	$sql = " select cododontologia from odontologia order by cododontologia desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $cododontologia["cododontologia"]=$row["cododontologia"];

      }
          
         if(empty($cododontologia["cododontologia"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($cododontologia["cododontologia"] , 10);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }
		
	if($_POST["procedimiento"]=="0") {  

	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }

		
    	$sql = "SELECT * FROM odontologia where codmedico = ? and codpaciente = ? and codsucursal = ? and codsede = ? and DATE_FORMAT(fechadentagrama,'%Y-%m-%d') = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codmedico"], $_POST["codpaciente"], $_POST["codsucursal"], $_POST["codsede"], date("Y-m-d")) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		
		$query = " insert into odontologia values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codcita);
		$stmt->bindParam(5, $codsucursal);
		$stmt->bindParam(6, $codsede);
		$stmt->bindParam(7, $tratamientomedico);
		$stmt->bindParam(8, $cualestratamiento);
		$stmt->bindParam(9, $ingestamedicamentos);
		$stmt->bindParam(10, $cualesingesta);
		$stmt->bindParam(11, $alergias);
		$stmt->bindParam(12, $cualesalergias);
		$stmt->bindParam(13, $hemorragias);
		$stmt->bindParam(14, $cualeshemorragias);
		$stmt->bindParam(15, $sinositis);
		$stmt->bindParam(16, $enfermedadrespiratoria);
		$stmt->bindParam(17, $diabetes);
		$stmt->bindParam(18, $cardiopatia);
		$stmt->bindParam(19, $hepatitis);
		$stmt->bindParam(20, $hepertension);
		$stmt->bindParam(21, $asistenciaodontologica);
		$stmt->bindParam(22, $ultimavisitaodontologia);
		$stmt->bindParam(23, $cepillado);
		$stmt->bindParam(24, $cuantoscepillados);
		$stmt->bindParam(25, $sedadental);
		$stmt->bindParam(26, $cuantascedasdetal);
		$stmt->bindParam(27, $cremadental);
		$stmt->bindParam(28, $enjuague);
		$stmt->bindParam(29, $otros);
		$stmt->bindParam(30, $sangranencias);
		$stmt->bindParam(31, $tomaaguallave);
		$stmt->bindParam(32, $elementosconfluor);
		$stmt->bindParam(33, $aparatosortodoncia);
		$stmt->bindParam(34, $protesis);
		$stmt->bindParam(35, $protesisfija);
		$stmt->bindParam(36, $protesisremovible);
		$stmt->bindParam(37, $labios);
		$stmt->bindParam(38, $lengua);
		$stmt->bindParam(39, $paladar);
		$stmt->bindParam(40, $pisoboca);
		$stmt->bindParam(41, $carrillos);
		$stmt->bindParam(42, $glandulasalivales);
		$stmt->bindParam(43, $maxilar);
		$stmt->bindParam(44, $senosmaxilares);
		$stmt->bindParam(45, $musculosmasticadores);
		$stmt->bindParam(46, $sistemanervioso);
		$stmt->bindParam(47, $sistemavascular);
		$stmt->bindParam(48, $sistemalinfatico);
		$stmt->bindParam(49, $funcionoclusal);
		$stmt->bindParam(50, $observacionperiodontal);
		$stmt->bindParam(51, $supernumerarios);
		$stmt->bindParam(52, $adracion);
		$stmt->bindParam(53, $manchas);
		$stmt->bindParam(54, $patologiapulpar);
		$stmt->bindParam(55, $placablanda);
		$stmt->bindParam(56, $placacalificada);
		$stmt->bindParam(57, $otrosdental);
		$stmt->bindParam(58, $observacionexamendental);
		$stmt->bindParam(59, $dxpres);
		$stmt->bindParam(60, $dxdef);
		$stmt->bindParam(61, $pronostico);
		$stmt->bindParam(62, $plantratamiento);
		$stmt->bindParam(63, $fechadentagrama);
		$stmt->bindParam(64, $procedimiento);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codcita = strip_tags($_POST["codcita"]);
		$codsucursal = strip_tags($_POST["codsucursal"]);
		$codsede = strip_tags($_POST["codsede"]);


if($_POST["procedimiento"]=="0"){


		$tratamientomedico = strip_tags($_POST['tratamientomedico']);
if (strip_tags(isset($_POST['cualestratamiento']))) { $cualestratamiento = strip_tags($_POST['cualestratamiento']); } else { $cualestratamiento =''; }
		$ingestamedicamentos = strip_tags($_POST['ingestamedicamentos']);
if (strip_tags(isset($_POST['cualesingesta']))) { $cualesingesta = strip_tags($_POST['cualesingesta']); } else { $cualesingesta =''; }
		$alergias = strip_tags($_POST['alergias']);
if (strip_tags(isset($_POST['cualesalergias']))) { $cualesalergias = strip_tags($_POST['cualesalergias']); } else { $cualesalergias =''; }
		$hemorragias = strip_tags($_POST['hemorragias']);
if (strip_tags(isset($_POST['cualeshemorragias']))) { $cualeshemorragias = strip_tags($_POST['cualeshemorragias']); } else { $cualeshemorragias =''; }
		$sinositis = strip_tags($_POST['sinositis']);
		$enfermedadrespiratoria = strip_tags($_POST['enfermedadrespiratoria']);
		$diabetes = strip_tags($_POST['diabetes']);
		$cardiopatia = strip_tags($_POST['cardiopatia']);
		$hepatitis = strip_tags($_POST['hepatitis']);
		$hepertension = strip_tags($_POST['hepertension']);
		$asistenciaodontologica = strip_tags($_POST['asistenciaodontologica']);
		$ultimavisitaodontologia = strip_tags(date("Y-m-d", strtotime($_POST["ultimavisitaodontologia"])));
		$cepillado = strip_tags($_POST['cepillado']);
if (strip_tags(isset($_POST['cuantoscepillados']))) { $cuantoscepillados = strip_tags($_POST['cuantoscepillados']); } else { $cuantoscepillados =''; }
		$sedadental = strip_tags($_POST['sedadental']);
if (strip_tags(isset($_POST['cuantascedasdetal']))) { $cuantascedasdetal = strip_tags($_POST['cuantascedasdetal']); } else { $cuantascedasdetal =''; }
		$cremadental = strip_tags($_POST['cremadental']);
		$enjuague = strip_tags($_POST['enjuague']);
		$otros = strip_tags($_POST['otros']);
		$sangranencias = strip_tags($_POST['sangranencias']);
		$tomaaguallave = strip_tags($_POST['tomaaguallave']);
		$elementosconfluor = strip_tags($_POST['elementosconfluor']);
		$aparatosortodoncia = strip_tags($_POST['aparatosortodoncia']);
		$protesis = strip_tags($_POST['protesis']);
if (strip_tags(isset($_POST['protesisfija']))) { $protesisfija = strip_tags($_POST['protesisfija']); } else { $protesisfija =''; }
if (strip_tags(isset($_POST['protesisremovible']))) { $protesisremovible = strip_tags($_POST['protesisremovible']); } else { $protesisremovible =''; }
		$labios = strip_tags($_POST['labios']);
		$lengua = strip_tags($_POST['lengua']);
		$paladar = strip_tags($_POST['paladar']);
		$pisoboca = strip_tags($_POST['pisoboca']);
		$carrillos = strip_tags($_POST['carrillos']);
		$glandulasalivales = strip_tags($_POST['glandulasalivales']);
		$maxilar = strip_tags($_POST['maxilar']);
		$senosmaxilares = strip_tags($_POST['senosmaxilares']);
		$musculosmasticadores = strip_tags($_POST['musculosmasticadores']);
		$sistemanervioso = strip_tags($_POST['sistemanervioso']);
		$sistemavascular = strip_tags($_POST['sistemavascular']);
		$sistemalinfatico = strip_tags($_POST['sistemalinfatico']);
		$funcionoclusal = strip_tags($_POST['funcionoclusal']);
		$observacionperiodontal = strip_tags($_POST['observacionperiodontal']);
		$supernumerarios = strip_tags($_POST['supernumerarios']);
		$adracion = strip_tags($_POST['adracion']);
		$manchas = strip_tags($_POST['manchas']);
		$patologiapulpar = strip_tags($_POST['patologiapulpar']);
		$placablanda = strip_tags($_POST['placablanda']);
		$placacalificada = strip_tags($_POST['placacalificada']);
		$otrosdental = strip_tags($_POST['otrosdental']);
		$observacionexamendental = strip_tags($_POST['observacionexamendental']);
		$cont = 0;
	    $arrayBD = array();
	    $pres = $_POST["presuntivo"];
		$idciepres = $_POST["idciepresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $pres[$cont]."/".$idciepres[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpres = implode(",,",$arrayBD);
		
		
		$cont = 0;
	    $arrayBD = array();
	    $def = $_POST["definitivo"];
		$idciedef = $_POST["idciedefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $def[$cont]."/".$idciedef[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdef = implode(",,",$arrayBD);
		
		$pronostico = strip_tags($_POST["pronostico"]);
		$plantratamiento = implode(',',$_POST['plantratamiento']);
		$fechadentagrama = strip_tags(date("Y-m-d h:i:s"));
		$procedimiento = strip_tags($_POST["procedimiento"]);

} else {


		if (strip_tags($_POST["procedimiento"]=='1')) { $tratamientomedico = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cualestratamiento =''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $ingestamedicamentos = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cualesingesta =''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $alergias = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cualesalergias =''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $hemorragias = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cualeshemorragias =''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $sinositis = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $enfermedadrespiratoria = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $diabetes = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cardiopatia = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $hepatitis = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $hepertension = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $asistenciaodontologica = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $ultimavisitaodontologia = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cepillado = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cuantoscepillados =''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $sedadental = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cuantascedasdetal =''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $cremadental = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $enjuague = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $otros = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $sangranencias = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $tomaaguallave = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $elementosconfluor = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $aparatosortodoncia = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $protesis = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $protesisfija = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $protesisremovible = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $labios = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $lengua = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $paladar = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $pisoboca = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $carrillos = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $glandulasalivales = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $maxilar = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $senosmaxilares = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $musculosmasticadores = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $sistemanervioso = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $sistemavascular = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $sistemalinfatico = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $funcionoclusal = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $observacionperiodontal = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $supernumerarios = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $adracion = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $manchas = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $patologiapulpar = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $placablanda = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $placacalificada = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $otrosdental = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $observacionexamendental = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $dxpres = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $dxdef = ''; }
		if (strip_tags($_POST["procedimiento"]=='1')) { $pronostico = ''; }
		$plantratamiento = strip_tags($_POST['plantratamiento']);
		$fechadentagrama = strip_tags(date("Y-m-d h:i:s"));
		$procedimiento = strip_tags($_POST["procedimiento"]);

}

		$stmt->execute();


		################# PROCESO PARA ACTUALIZAR CITA MEDICA ##############
		$sql = " update citasmedicas set "
			  ." statuscita = ? "
			  ." where "
			  ." codcita = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $statuscita);
		$stmt->bindParam(2, $codcita);
			
		$statuscita = strip_tags('VERIFICADA');
		$codcita = strip_tags($_POST["codcita"]);
		$stmt->execute();
		
if($_POST["procedimiento"]=="0"){

	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA CONSULTA ODONTOLOGICA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?od=".base64_encode($numproced)."&tipo=".base64_encode("ODONTOLOGIA")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Consulta Odontologicas' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR CONSULTA ODONTOLOGICA</strong></a></div>";
	exit;

} else {

	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA HOJA EVOLUTIVA PARA ODONTOLOGIA FUE REGISTRADA EXITOSAMENTE <a href='reportepdf?od=".base64_encode($numproced)."&tipo=".base64_encode("HOJAODONTOLOGIA")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Hoja Evolutiva' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR HOJA EVOLUTIVA</strong></a></div>";
	exit;

           }
		}
		else
		{
		  echo "6";
		  exit;
	    }
}
############################# FUNCION REGISTRAR ODONTOLOGIA ##############################

############################ FUNCION LISTAR ODONTOLOGIA #############################
public function ListarOdontologia()
	{
		self::SetNames();

	if($_SESSION["tipo"]=="1"){

		$sql = " SELECT * FROM odontologia INNER JOIN medicos ON odontologia.codmedico = medicos.codmedico INNER JOIN pacientes ON odontologia.codpaciente = pacientes.codpaciente";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}	
	else {

	$sql = " SELECT * FROM odontologia INNER JOIN medicos ON odontologia.codmedico = medicos.codmedico INNER JOIN pacientes ON odontologia.codpaciente = pacientes.codpaciente WHERE odontologia.codmedico = '".$_SESSION["codmedico"]."'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
}	
############################ FUNCION LISTAR ODONTOLOGIA #############################

########################### FUNCION ID ODONTOLOGIA ###############################
public function OdontologiaPorId()
	{
		self::SetNames();

 $sql ="SELECT * FROM odontologia INNER JOIN referenciasodontograma ON odontologia.codpaciente=referenciasodontograma.codpaciente 
INNER JOIN medicos ON odontologia.codmedico = medicos.codmedico 
INNER JOIN pacientes ON odontologia.codpaciente = pacientes.codpaciente 
INNER JOIN eps ON pacientes.eps = eps.codeps 
LEFT JOIN sucursales ON odontologia.codsucursal = sucursales.codsucursal 
LEFT JOIN sedes ON odontologia.codsede = sedes.codsede 
WHERE odontologia.cododontologia = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["od"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID ODONTOLOGIA ###############################

########################## FUNCION ACTUALIZAR ODONTOLOGIA #######################
	public function ActualizarOdontologia()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]))
		{
			echo "1";
			exit;
		}
		elseif($_POST["procedimiento"]=="0" && empty($_POST["plantratamiento"]))
		{
			echo "2";
			exit;
		}
		elseif($_POST["procedimiento"]=="0" && empty($_POST["estados"]))
		{
			echo "3";
			exit;
		}		


	if($_POST["procedimiento"]=="0") {  

	   $presuntivo = $_POST['presuntivo'];
       $repeated = array_filter(array_count_values($presuntivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "4";
		  exit;
        }
		
	   $definitivo = $_POST['definitivo'];
       $repeated = array_filter(array_count_values($definitivo), function($count) {
       return $count > 1;
        });

          foreach ($repeated as $key => $value) {
          echo "5";
		  exit;
        }
    }


    if($_POST["procedimiento"]=="0") { 


    	################# PROCESO PARA ACTUALIZAR CNSULTAS ODONTOLOGICAS ##############
		self::SetNames();
		$sql = " update odontologia set "
			  ." tratamientomedico = ?, "
			  ." cualestratamiento = ?, "
			  ." ingestamedicamentos = ?, "
			  ." cualesingesta = ?, "
			  ." alergias = ?, "
			  ." cualesalergias = ?, "
			  ." hemorragias = ?, "
			  ." cualeshemorragias = ?, "
			  ." sinositis = ?, "
			  ." enfermedadrespiratoria = ?, "
			  ." diabetes = ?, "
			  ." cardiopatia = ?, "
			  ." hepatitis = ?, "
			  ." hepertension = ?, "
			  ." asistenciaodontologica = ?, "
			  ." ultimavisitaodontologia = ?, "
			  ." cepillado = ?, "
			  ." cuantoscepillados = ?, "
			  ." sedadental = ?, "
			  ." cuantascedasdetal = ?, "
			  ." cremadental = ?, "
			  ." enjuague = ?, "
			  ." otros = ?, "
			  ." sangranencias = ?, "
			  ." tomaaguallave = ?, "
			  ." elementosconfluor = ?, "
			  ." aparatosortodoncia = ?, "
			  ." protesis = ?, "
			  ." protesisfija = ?, "
			  ." protesisremovible = ?, "
			  ." labios = ?, "
			  ." lengua = ?, "
			  ." paladar = ?, "
			  ." pisoboca = ?, "
			  ." carrillos = ?, "
			  ." glandulasalivales = ?, "
			  ." maxilar = ?, "
			  ." senosmaxilares = ?, "
			  ." musculosmasticadores = ?, "
			  ." sistemanervioso = ?, "
			  ." sistemavascular = ?, "
			  ." sistemalinfatico = ?, "
			  ." funcionoclusal = ?, "
			  ." observacionperiodontal = ?, "
			  ." supernumerarios = ?, "
			  ." adracion = ?, "
			  ." manchas = ?, "
			  ." patologiapulpar = ?, "
			  ." placablanda = ?, "
			  ." placacalificada = ?, "
			  ." otrosdental = ?, "
			  ." observacionexamendental = ?, "
			  ." presuntivo = ?, "
			  ." definitivo = ?, "
			  ." pronostico = ?, "
			  ." plantratamiento = ? "
			  ." where "
			  ." cododontologia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $tratamientomedico);
		$stmt->bindParam(2, $cualestratamiento);
		$stmt->bindParam(3, $ingestamedicamentos);
		$stmt->bindParam(4, $cualesingesta);
		$stmt->bindParam(5, $alergias);
		$stmt->bindParam(6, $cualesalergias);
		$stmt->bindParam(7, $hemorragias);
		$stmt->bindParam(8, $cualeshemorragias);
		$stmt->bindParam(9, $sinositis);
		$stmt->bindParam(10, $enfermedadrespiratoria);
		$stmt->bindParam(11, $diabetes);
		$stmt->bindParam(12, $cardiopatia);
		$stmt->bindParam(13, $hepatitis);
		$stmt->bindParam(14, $hepertension);
		$stmt->bindParam(15, $asistenciaodontologica);
		$stmt->bindParam(16, $ultimavisitaodontologia);
		$stmt->bindParam(17, $cepillado);
		$stmt->bindParam(18, $cuantoscepillados);
		$stmt->bindParam(19, $sedadental);
		$stmt->bindParam(20, $cuantascedasdetal);
		$stmt->bindParam(21, $cremadental);
		$stmt->bindParam(22, $enjuague);
		$stmt->bindParam(23, $otros);
		$stmt->bindParam(24, $sangranencias);
		$stmt->bindParam(25, $tomaaguallave);
		$stmt->bindParam(26, $elementosconfluor);
		$stmt->bindParam(27, $aparatosortodoncia);
		$stmt->bindParam(28, $protesis);
		$stmt->bindParam(29, $protesisfija);
		$stmt->bindParam(30, $protesisremovible);
		$stmt->bindParam(31, $labios);
		$stmt->bindParam(32, $lengua);
		$stmt->bindParam(33, $paladar);
		$stmt->bindParam(34, $pisoboca);
		$stmt->bindParam(35, $carrillos);
		$stmt->bindParam(36, $glandulasalivales);
		$stmt->bindParam(37, $maxilar);
		$stmt->bindParam(38, $senosmaxilares);
		$stmt->bindParam(39, $musculosmasticadores);
		$stmt->bindParam(40, $sistemanervioso);
		$stmt->bindParam(41, $sistemavascular);
		$stmt->bindParam(42, $sistemalinfatico);
		$stmt->bindParam(43, $funcionoclusal);
		$stmt->bindParam(44, $observacionperiodontal);
		$stmt->bindParam(45, $supernumerarios);
		$stmt->bindParam(46, $adracion);
		$stmt->bindParam(47, $manchas);
		$stmt->bindParam(48, $patologiapulpar);
		$stmt->bindParam(49, $placablanda);
		$stmt->bindParam(50, $placacalificada);
		$stmt->bindParam(51, $otrosdental);
		$stmt->bindParam(52, $observacionexamendental);
		$stmt->bindParam(53, $dxpres);
		$stmt->bindParam(54, $dxdef);
		$stmt->bindParam(55, $pronostico);
		$stmt->bindParam(56, $plantratamiento);
		$stmt->bindParam(57, $cododontologia);
			
		$tratamientomedico = strip_tags($_POST['tratamientomedico']);
if (strip_tags(isset($_POST['cualestratamiento']))) { $cualestratamiento = strip_tags($_POST['cualestratamiento']); } else { $cualestratamiento =''; }
		$ingestamedicamentos = strip_tags($_POST['ingestamedicamentos']);
if (strip_tags(isset($_POST['cualesingesta']))) { $cualesingesta = strip_tags($_POST['cualesingesta']); } else { $cualesingesta =''; }
		$alergias = strip_tags($_POST['alergias']);
if (strip_tags(isset($_POST['cualesalergias']))) { $cualesalergias = strip_tags($_POST['cualesalergias']); } else { $cualesalergias =''; }
		$hemorragias = strip_tags($_POST['hemorragias']);
if (strip_tags(isset($_POST['cualeshemorragias']))) { $cualeshemorragias = strip_tags($_POST['cualeshemorragias']); } else { $cualeshemorragias =''; }
		$sinositis = strip_tags($_POST['sinositis']);
		$enfermedadrespiratoria = strip_tags($_POST['enfermedadrespiratoria']);
		$diabetes = strip_tags($_POST['diabetes']);
		$cardiopatia = strip_tags($_POST['cardiopatia']);
		$hepatitis = strip_tags($_POST['hepatitis']);
		$hepertension = strip_tags($_POST['hepertension']);
		$asistenciaodontologica = strip_tags($_POST['asistenciaodontologica']);
		$ultimavisitaodontologia = strip_tags(date("Y-m-d", strtotime($_POST["ultimavisitaodontologia"])));
		$cepillado = strip_tags($_POST['cepillado']);
if (strip_tags(isset($_POST['cuantoscepillados']))) { $cuantoscepillados = strip_tags($_POST['cuantoscepillados']); } else { $cuantoscepillados =''; }
		$sedadental = strip_tags($_POST['sedadental']);
if (strip_tags(isset($_POST['cuantascedasdetal']))) { $cuantascedasdetal = strip_tags($_POST['cuantascedasdetal']); } else { $cuantascedasdetal =''; }
		$cremadental = strip_tags($_POST['cremadental']);
		$enjuague = strip_tags($_POST['enjuague']);
		$otros = strip_tags($_POST['otros']);
		$sangranencias = strip_tags($_POST['sangranencias']);
		$tomaaguallave = strip_tags($_POST['tomaaguallave']);
		$elementosconfluor = strip_tags($_POST['elementosconfluor']);
		$aparatosortodoncia = strip_tags($_POST['aparatosortodoncia']);
		$protesis = strip_tags($_POST['protesis']);
if (strip_tags(isset($_POST['protesisfija']))) { $protesisfija = strip_tags($_POST['protesisfija']); } else { $protesisfija =''; }
if (strip_tags(isset($_POST['protesisremovible']))) { $protesisremovible = strip_tags($_POST['protesisremovible']); } else { $protesisremovible =''; }
		$labios = strip_tags($_POST['labios']);
		$lengua = strip_tags($_POST['lengua']);
		$paladar = strip_tags($_POST['paladar']);
		$pisoboca = strip_tags($_POST['pisoboca']);
		$carrillos = strip_tags($_POST['carrillos']);
		$glandulasalivales = strip_tags($_POST['glandulasalivales']);
		$maxilar = strip_tags($_POST['maxilar']);
		$senosmaxilares = strip_tags($_POST['senosmaxilares']);
		$musculosmasticadores = strip_tags($_POST['musculosmasticadores']);
		$sistemanervioso = strip_tags($_POST['sistemanervioso']);
		$sistemavascular = strip_tags($_POST['sistemavascular']);
		$sistemalinfatico = strip_tags($_POST['sistemalinfatico']);
		$funcionoclusal = strip_tags($_POST['funcionoclusal']);
		$observacionperiodontal = strip_tags($_POST['observacionperiodontal']);
		$supernumerarios = strip_tags($_POST['supernumerarios']);
		$adracion = strip_tags($_POST['adracion']);
		$manchas = strip_tags($_POST['manchas']);
		$patologiapulpar = strip_tags($_POST['patologiapulpar']);
		$placablanda = strip_tags($_POST['placablanda']);
		$placacalificada = strip_tags($_POST['placacalificada']);
		$otrosdental = strip_tags($_POST['otrosdental']);
		$observacionexamendental = strip_tags($_POST['observacionexamendental']);
		
		$cont = 0;
	    $arrayBD = array();
	    $pres = $_POST["presuntivo"];
		$idciepres = $_POST["idciepresuntivo"];
	    for($cont; $cont<count($_POST["presuntivo"]); $cont++):
		$arrayBD[] = $pres[$cont]."/".$idciepres[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxpres = implode(",,",$arrayBD);
		
		
		$cont = 0;
	    $arrayBD = array();
	    $def = $_POST["definitivo"];
		$idciedef = $_POST["idciedefinitivo"];
	    for($cont; $cont<count($_POST["definitivo"]); $cont++):
		$arrayBD[] = $def[$cont]."/".$idciedef[$cont]."\n";
	    endfor;
        ######### INSERCION EN LA BD #########
		$dxdef = implode(",,",$arrayBD);
		
		$pronostico = strip_tags($_POST["pronostico"]);
		$plantratamiento = implode(',',$_POST['plantratamiento']);
		$cododontologia = strip_tags($_POST["cododontologia"]);
	    $stmt->execute();

	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA CONSULTA ODONTOLOGICA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?od=".base64_encode($cododontologia)."&tipo=".base64_encode("ODONTOLOGIA")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Consulta Odontologicas' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR CONSULTA ODONTOLOGICA</strong></a></div>";
	exit;

} else {

	   $sql = " update odontologia set "
			  ." plantratamiento = ? "
			  ." where "
			  ." cododontologia = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $plantratamiento);
		$stmt->bindParam(2, $cododontologia);
		
		$plantratamiento = strip_tags($_POST["plantratamiento"]);
		$cododontologia = strip_tags($_POST["cododontologia"]);
	    $stmt->execute();

	echo "<div class='alert alert-info'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> LA HOJA EVOLUTIVA PARA ODONTOLOGIA FUE ACTUALIZADA EXITOSAMENTE <a href='reportepdf?od=".base64_encode($cododontologia)."&tipo=".base64_encode("HOJAODONTOLOGIA")."' class='on-default' data-placement='left' data-toggle='tooltip' data-original-title='Imprimir Hoja Evolutiva' target='_black' rel='noopener noreferrer'><strong>IMPRIMIR HOJA EVOLUTIVA</strong></a></div>";
	exit;
}
		
	}
########################## FUNCION ACTUALIZAR ODONTOLOGIA #######################

############################ FUNCION ELIMINAR ODONTOLOGIA ###########################
public function EliminarOdontologia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from odontologia where cododontologia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$cododontologia);
		$cododontologia = base64_decode($_GET["cododontologia"]);
		$stmt->execute();
		
	if(base64_decode($_GET['procedimiento']) == "0") {

		$sql = " delete from referenciasodontograma where codpaciente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codpaciente);
		$codpaciente = base64_decode($_GET["codpaciente"]);
		$stmt->execute();

		//funcion para eliminar una carpeta con contenido
        $codpaciente = base64_decode($_GET["codpaciente"]);
        $archivos = "fotos/".$codpaciente.".png";		
        unlink($archivos);
	}
		
		header("Location: odontologia?mesage=1");
		exit;
		   
		   } else {
		   
			header("Location: odontologia?mesage=2");
			exit;
		  }
			
		} 
############################ FUNCION ELIMINAR ODONTOLOGIA ###########################

############################### FUNCION REPORTES DE ODONTOLOGIA #################################
public function BuscarReportesOdontologia()
	{
		self::SetNames();
				
$sql = " SELECT * FROM odontologia INNER JOIN medicos ON odontologia.codmedico = medicos.codmedico INNER JOIN pacientes ON odontologia.codpaciente = pacientes.codpaciente INNER JOIN eps ON pacientes.eps = eps.codeps LEFT JOIN sucursales ON odontologia.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON odontologia.codsede = sedes.codsede WHERE odontologia.codpaciente = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET['codpaciente']) );
		$stmt->execute();
		$num = $stmt->rowCount();
		if($num==0)
		{
		
	echo "<div class='alert alert-danger'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON CONSULTAS ODONTOLOGICAS PARA EL PACIENTE INGRESADO </div></center>";
	exit;
		
		}
		else
		{
			while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
}
############################### FUNCION REPORTES DE ODONTOLOGIA #################################
	
##################################### FIN DE CLASE ODONTOLOGIA ########################################















































############################### CLASE CONSENTIMIENTO INFORMADO ################################

######################### FUNCION REGISTRAR CONSENTIMIENTO INFORMADO #############################
	public function RegistrarConsentimiento()
	{
		self::SetNames();
		if(empty($_POST["codmedico"]) or empty($_POST["codpaciente"]) or empty($_POST["codsucursal"]))
		{
			echo "1";
			exit;
		}

$sql = " select codconsentimiento from consentimientoinformado order by codconsentimiento desc limit 1";
	foreach ($this->dbh->query($sql) as $row){

      $codconsentimiento["codconsentimiento"]=$row["codconsentimiento"];

      }
          
         if(empty($codconsentimiento["codconsentimiento"])) {

                $numproced = '000000000000001';

          } else {

                $num     = substr($codconsentimiento["codconsentimiento"] , 0);
                $dig     = $num + 1;
                $codigo = str_pad($dig, 15, "0", STR_PAD_LEFT);
                $numproced = $codigo;	
         }


        $sql = " select codpaciente from consentimientoinformado where codpaciente = ? and fechaconsentimiento = ? and especialidad = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_POST["codpaciente"], $_POST["fechaconsentimiento"], $_POST["especialidad"]) );
		$num = $stmt->rowCount();
		if($num == 0)
		{
		$query = " insert into consentimientoinformado values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(1, $numproced);
		$stmt->bindParam(2, $codmedico);
		$stmt->bindParam(3, $codpaciente);
		$stmt->bindParam(4, $codsucursal);
		$stmt->bindParam(5, $codsede);
		$stmt->bindParam(6, $procedimiento);
		$stmt->bindParam(7, $procedimientotextual);
		$stmt->bindParam(8, $observacionprocedimiento);
		$stmt->bindParam(9, $nofirmapaciente);
		$stmt->bindParam(10, $doctestigo);
		$stmt->bindParam(11, $nombretestigo);
		$stmt->bindParam(12, $fechaconsentimiento);
		$stmt->bindParam(13, $modulo);
			
		$codmedico = strip_tags(base64_decode($_POST["codmedico"]));
		$codpaciente = strip_tags($_POST["codpaciente"]);
		$codsucursal = strip_tags(base64_decode($_POST["codsucursal"]));
		$codsede = strip_tags(base64_decode($_POST["codsede"]));
		$procedimiento = strip_tags($_POST["procedimiento"]);
if (strip_tags(isset($_POST['procedimientotextual']))) { $procedimientotextual = strip_tags($_POST['procedimientotextual']); } else { $procedimientotextual =''; }
if (strip_tags(isset($_POST['observacionprocedimiento']))) { $observacionprocedimiento = strip_tags($_POST['observacionprocedimiento']); } else { $observacionprocedimiento =''; }
if (strip_tags(isset($_POST['nofirmapaciente']))) { $nofirmapaciente = strip_tags($_POST['nofirmapaciente']); } else { $nofirmapaciente =''; }
if (strip_tags(isset($_POST['doctestigo']))) { $doctestigo = strip_tags($_POST['doctestigo']); } else { $doctestigo =''; }
if (strip_tags(isset($_POST['nombretestigo']))) { $nombretestigo = strip_tags($_POST['nombretestigo']); } else { $nombretestigo =''; }
		$fechaconsentimiento = strip_tags(date("Y-m-d h:i:s"));
		$modulo = strip_tags($_POST["especialidad"]);
		$stmt->execute();

	echo "<div class='alert alert-success'>";
	echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	echo "<span class='fa fa-check-square-o'></span> EL CONSENTIMIENTO INFORMADO DEL PACIENTE FUE REGISTRADO EXITOSAMENTE </div>";
	echo "<a href='reportepdf.php?in=".base64_encode($numproced)."&tipo=".base64_encode("CONSENTIMIENTOINFORMADO")."' target='_blank' rel='noopener noreferrer'><button type='button' class='btn btn-info waves-effect waves-light'><i class='fa fa-print'></i> IMPRIMIR CONSENTIMIENTO INFORMADO</button></a><br><br>";
		
		exit;
		}
		else
		{
			echo "3";
			exit;
		}
	}   
######################### FUNCION REGISTRAR CONSENTIMIENTO INFORMADO #############################

########################## FUNCION LISTAR CONSENTIMIENTO GENERAL ###############################
	public function ListarConsentimientoGeneral()
	{
		self::SetNames();
		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.especialidad = 'MEDICO GENERAL'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################## FUNCION LISTAR CONSENTIMIENTO GENERAL ###############################

########################## FUNCION LISTAR CONSENTIMIENTO GINECOLOGO ###############################
	public function ListarConsentimientoGinecologo()
	{
		self::SetNames();
		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.especialidad = 'GINECOLOGIA'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################## FUNCION LISTAR CONSENTIMIENTO GINECOLOGO ###############################

########################## FUNCION LISTAR CONSENTIMIENTO LABORATORIO ###############################
	public function ListarConsentimientoLaboratorio()
	{
		self::SetNames();
		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.especialidad = 'BACTERIOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################## FUNCION LISTAR CONSENTIMIENTO LABORATORIO ###############################

########################## FUNCION LISTAR CONSENTIMIENTO RADIOLOGIA ###############################
	public function ListarConsentimientoRadiologia()
	{
		self::SetNames();
		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.especialidad = 'RADIOLOGO'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################## FUNCION LISTAR CONSENTIMIENTO RADIOLOGIA ###############################


########################## FUNCION LISTAR CONSENTIMIENTO TERAPIAS ###############################
	public function ListarConsentimientoTerapias()
	{
		self::SetNames();
		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.especialidad = 'TERAPEUTA'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################## FUNCION LISTAR CONSENTIMIENTO TERAPIAS ###############################


########################## FUNCION LISTAR CONSENTIMIENTO ODONTOLOGIA ###############################
	public function ListarConsentimientoOdontologia()
	{
		self::SetNames();
		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.especialidad = 'ODONTOLOGIA'";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
########################## FUNCION LISTAR CONSENTIMIENTO ODONTOLOGIA ###############################

########################### FUNCION ID CONSENTIMIENTO INFORMADO ###############################
public function ConsentimientoInformadoPorId()
	{
		self::SetNames();

		$sql = " SELECT * FROM consentimientoinformado INNER JOIN medicos ON consentimientoinformado.codmedico = medicos.codmedico INNER JOIN pacientes ON consentimientoinformado.codpaciente = pacientes.codpaciente LEFT JOIN sucursales ON consentimientoinformado.codsucursal = sucursales.codsucursal LEFT JOIN sedes ON consentimientoinformado.codsede = sedes.codsede WHERE consentimientoinformado.codconsentimiento = ?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["in"])));
		$num = $stmt->rowCount();
		if($num==0)
		{
			echo "";
		}
		else
		{
			if($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}	
########################### FUNCION ID CONSENTIMIENTO INFORMADO ###############################

########################### FUNCION ELIMINAR CONSENTIMIENTO GENERAL ###########################
	public function EliminarConsentimientoGeneral()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from consentimientoinformado where codconsentimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codconsentimiento);
		$codconsentimiento = base64_decode($_GET["codconsentimiento"]);
		$stmt->execute();
		
		header("Location: consentimientogen?mesage=1");
		exit;
			
		} else {
		
		header("Location: consentimientogen?mesage=2");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR CONSENTIMIENTO GENERAL ###########################

########################### FUNCION ELIMINAR CONSENTIMIENTO GINECOLOGIA ###########################
	public function EliminarConsentimientoGinecologia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from consentimientoinformado where codconsentimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codconsentimiento);
		$codconsentimiento = base64_decode($_GET["codconsentimiento"]);
		$stmt->execute();
		
		header("Location: consentimientogin?mesage=1");
		exit;
			
		} else {
		
		header("Location: consentimientogin?mesage=2");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR CONSENTIMIENTO GINECOLOGIA ###########################

########################### FUNCION ELIMINAR CONSENTIMIENTO LABORATORIO ###########################
	public function EliminarConsentimientoLaboratorio()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from consentimientoinformado where codconsentimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codconsentimiento);
		$codconsentimiento = base64_decode($_GET["codconsentimiento"]);
		$stmt->execute();
		
		header("Location: consentimientolab?mesage=1");
		exit;
			
		} else {
		
		header("Location: consentimientolab?mesage=2");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR CONSENTIMIENTO LABORATORIO ###########################

########################### FUNCION ELIMINAR CONSENTIMIENTO RADIOLOGIA ###########################
	public function EliminarConsentimientoRadiologia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from consentimientoinformado where codconsentimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codconsentimiento);
		$codconsentimiento = base64_decode($_GET["codconsentimiento"]);
		$stmt->execute();
		
		header("Location: consentimientolec?mesage=1");
		exit;
			
		} else {
		
		header("Location: consentimientolec?mesage=2");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR CONSENTIMIENTO RADIOLOGIA ###########################

########################### FUNCION ELIMINAR CONSENTIMIENTO TERAPEUTA ###########################
	public function EliminarConsentimientoTerapia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from consentimientoinformado where codconsentimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codconsentimiento);
		$codconsentimiento = base64_decode($_GET["codconsentimiento"]);
		$stmt->execute();
		
		header("Location: consentimientoter?mesage=1");
		exit;
			
		} else {
		
		header("Location: consentimientoter?mesage=2");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR CONSENTIMIENTO TERAPEUTA ###########################

########################### FUNCION ELIMINAR CONSENTIMIENTO ODONTOLOGIA ###########################
	public function EliminarConsentimientoOdontologia()
	{
		if($_SESSION['acceso'] == "administrador") {
		
		$sql = " delete from consentimientoinformado where codconsentimiento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1,$codconsentimiento);
		$codconsentimiento = base64_decode($_GET["codconsentimiento"]);
		$stmt->execute();
		
		header("Location: consentimientodo?mesage=1");
		exit;
			
		} else {
		
		header("Location: consentimientodo?mesage=2");
		exit;
	    }	
	}
########################### FUNCION ELIMINAR CONSENTIMIENTO ODONTOLOGIA ###########################

############################### FIN DE CLASE CONSENTIMIENTO INFORMADO ################################
















































################################### FUNCION PARA LISTAR COMBOBOX #################################

################################ FUNCION PARA LISTAR DEPARTAMENTOS ################################
	public function ListarDepartamentos()
	{
		self::SetNames();
		$sql = " select * from departamentos ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################ FUNCION PARA LISTAR DEPARTAMENTOS ################################

################################ FUNCION PARA LISTAR MUNICIPIOS #################################
	public function ListarMunicipios()
	{
		self::SetNames();
		$sql = " select * from municipios ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
################################ FUNCION PARA LISTAR MUNICIPIOS #################################

######################### FUNCION PARA LISTAR MUNICIPIOS POR DEPARTAMENTOS ########################
	public function ListarMunicipiosD()
	{
		self::SetNames();
		$sql = "select * from municipios where departamento = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array($_GET["departamento"]) );
		$num = $stmt->rowCount();
		     if($num==0)
		{
			echo "<option value=''>SELECCIONE</option>";
			exit;
		       }
		else
		{
		while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
######################### FUNCION PARA LISTAR MUNICIPIOS POR DEPARTAMENTOS ########################

######################### FUNCION PARA LISTAR SEDES POR SUCURSALES #############################

	public function ListarSedesD()
	{
		self::SetNames();
		$sql = "select * from sedes where codsucursal = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array(base64_decode($_GET["codsucursal"])));
		$num = $stmt->rowCount();
		     if($num==0)
		{
			echo "<select name='codsede' id='codsede' class='form-control'>";
            echo "<option value='0'>SELECCIONE</option>";
			echo "</select>";
			exit;
		       }
		else
		{
		while($row = $stmt->fetch())
			{
				$this->p[]=$row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
######################### FUNCION PARA LISTAR SEDES POR SUCURSALES #############################

########################### FUNCION PARA LISTAR COMBOBOX #################################

























############################ FUNCION PARA CONTAR CITAS MEDICAS POR ESPECIALIDAD ################################
public function CitasProceso()
	{
$year = date('Y');
$sql = "SELECT COUNT(*) as total, especialidad as totalmes from citasmedicas WHERE statuscita = 'EN PROCESO' GROUP BY especialidad";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}

public function CitasVerificada()
	{
$year = date('Y');
$sql = "SELECT COUNT(*) as total, especialidad as totalmes from citasmedicas WHERE statuscita = 'VERIFICADA' GROUP BY especialidad";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
	
	
public function CitasCancelada()
	{
$year = date('Y');
$sql = "SELECT COUNT(*) as total, especialidad as totalmes from citasmedicas WHERE statuscita = 'CANCELADA' GROUP BY especialidad";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}

########################## FIN DE FUNCION PARA CONTAR CITAS MEDICAS POR ESPECIALIDAD #########################








######################### FUNCION PARA CONTAR CONSULTAS A MEDICO GINECOLOGO ############################

public function ContarGinecologia()
	{
$sql = "select
(select count(*) from aperturasmedicas where especialidad = 'GINECOLOGO') as ape,
(select count(*) from hojasevolutivas where especialidad = 'GINECOLOGO' and procedimiento = 'HOJA EVOLUTIVA') as hojas,
(select count(*) from remisiones where especialidad = 'GINECOLOGO') as rem,
(select count(*) from formulasmedicas where especialidad = 'GINECOLOGO') as fo,
(select count(*) from hojasevolutivas where especialidad = 'GINECOLOGO' and procedimiento = 'CRIOCAUTERIZACION') as crio,
(select count(*) from colposcopias) as colp,
(select count(*) from ecografias) as ecog";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
####################### FIN DE FUNCION PARA CONTAR CONSULTAS A MEDICO GINECOLOGO ########################


##################### FUNCION PARA CONTAR CITAS MEDICAS PARA RADIOLOGIA ############################

public function ContarRadiologia()
	{
$sql = "select
(select count(*) from citasmedicas where especialidad = 'RADIOLOGO' and lectura = 'SI') as si,
(select count(*) from citasmedicas where especialidad = 'RADIOLOGO' and lectura = 'NO') as no";
//(select count(*) from citasmedicas where especialidad = 'RADIOLOGO' and lectura = 'NO' and DATE_FORMAT(ingresocita,'%Y') = '".date('Y')."') as no";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
###################### FIN DE FUNCION PARA CONTAR CITAS MEDICAS PARA RADIOLOGIA ##################



############################### FUNCION PARA CONTAR REGISTROS #################################

public function ContarRegistros()
	{

if($_SESSION["tipo"]=="1"){

	$sql = "select
(select count(*) from usuarios) as user,
(select count(*) from medicos) as med,
(select count(*) from pacientes) as pac,
(select count(*) from log) as total";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
	 else { 

	$sql = "select
(select count(*) from pacientes) as pac,
(select count(*) from citasmedicas where codmedico = '".$_SESSION['codmedico']."' and statuscita = 'EN PROCESO' and YEAR(ingresocita) = '".date('Y')."') as proceso,
(select count(*) from citasmedicas where codmedico = '".$_SESSION['codmedico']."' and statuscita = 'VERIFICADA' and YEAR(ingresocita) = '".date('Y')."') as verificada,
(select count(*) from citasmedicas where codmedico = '".$_SESSION['codmedico']."' and statuscita = 'CANCELADA' and YEAR(ingresocita) = '".date('Y')."') as cancelada";

		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}

}


########################### FIN DE FUNCION PARA CONTAR REGISTROS ##############################

}
#################################### AQUI TERMINA LA CLASE LOGIN ###################################
?>