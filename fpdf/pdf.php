<?php
require('fpdf.php');
 
class PDF extends FPDF
{
var $widths;
var $aligns;
var $flowingBlockAttr;



########################## FUNCION PARA MOSTRAR EL FOOTER ###################################
function Footer()
    {
        //Posición: a 2 cm del final
  $this->Ln();
  $this->SetY(-12);
  $this->SetFont('courier','B',10);
        //Número de página
  $this->Cell(190,5,'IPS - RADIOSALUD (EL DIAGNÓSTICO INMEDIATO MEJORA TU CALIDAD DE VIDA)','T',0,'L');
  $this->AliasNbPages();
  $this->Cell(0,5,'Pagina '.$this->PageNo(),'T',1,'R');
  //Page number
  /*$pagenumber = '{nb}';
    if($this->PageNo() == 2){
        $this->Cell(173,10, ' FOOTER TEST  -  '.$pagenumber, 0, 0);
    }*/

      if($this->page>0)
        {
            // Page footer
            //$this->InFooter = true;
            //$this->Footer();
            //$this->InFooter = false;
            // Close page
            $this->_endpage();
        }

    } 
########################## FUNCION PARA MOSTRAR EL FOOTER ###################################
	
	




################################### REPORTES DE ADMINISTRACION ##################################

########################## FUNCION LISTAR SUCURSALES ##############################
      function TablaListarSucursales()
   {
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE SUCURSALES',0,0,'C');
    
    $this->Ln();
    $this->SetFont('courier','B',10);
    $this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es BLANCO)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL)
    $this->Cell(10,8,'Nº',1,0,'C', True);
    $this->Cell(30,8,'NIT',1,0,'C', True);
    $this->Cell(100,8,'RAZÓN SOCIAL',1,0,'C', True);
    $this->Cell(55,8,'EMAIL',1,0,'C', True);
    $this->Cell(25,8,'Nº DE TLF',1,0,'C', True);
    $this->Cell(30,8,'NIT DIRECTOR',1,0,'C', True);
    $this->Cell(50,8,'NOMBRE DE DIRECTOR',1,0,'C', True);
    $this->Cell(30,8,'Nº DE TLF',1,1,'C', True);
    
    $tra = new Login();
    $reg = $tra->ListarSucursal();

    if($reg==""){
    echo "";      
    } else {
 
    /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(10,30,100,55,25,30,50,30));

	/* AQUI AGREGO LOS VALORES A MOSTRAR EN COLUMNAS */
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,
		utf8_decode($reg[$i]["nitsucursal"]),
		utf8_decode($reg[$i]["nombresucursal"]),
		utf8_decode($reg[$i]["emailsucursal"]),
		utf8_decode($reg[$i]["telefonosucursal"]),
		utf8_decode($reg[$i]["identdirecsucursal"]),
		utf8_decode($reg[$i]["nomdirecsucursal"]." ".$reg[$i]["apedirecsucursal"]),
		utf8_decode($reg[$i]["telefdirecsucursal"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }
########################## FUNCION LISTAR SUCURSALES ##############################

########################## FUNCION LISTAR SEDES ##############################
      function TablaListarSedes()
   {
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE SEDES',0,0,'C');
    
    $this->Ln();
    $this->SetFont('courier','B',10);
    $this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es BLANCO)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL)
    $this->Cell(10,8,'Nº',1,0,'C', True);
    $this->Cell(30,8,'NIT SUCURSAL',1,0,'C', True);
    $this->Cell(70,8,'NOMBRE DE SUCURSAL',1,0,'C', True);
    $this->Cell(60,8,'NOMBRE DE SEDE',1,0,'C', True);
    $this->Cell(55,8,'EMAIL',1,0,'C', True);
    $this->Cell(25,8,'Nº DE TLF',1,0,'C', True);
    $this->Cell(30,8,'NIT DIRECTOR',1,0,'C', True);
    $this->Cell(50,8,'NOMBRE DE DIRECTOR',1,1,'C', True);
    
    $tra = new Login();
    $reg = $tra->ListarSedes();

    if($reg==""){
    echo "";      
    } else {
 
     /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(10,30,70,60,55,25,30,50));

	/* AQUI AGREGO LOS VALORES A MOSTRAR EN COLUMNAS */
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,
		utf8_decode($reg[$i]["nitsucursal"]),
		utf8_decode($reg[$i]["nombresucursal"]),
		utf8_decode($reg[$i]["nombresede"]),
		utf8_decode($reg[$i]["emailsede"]),
		utf8_decode($reg[$i]["telefonosede"]),
		utf8_decode($reg[$i]["identdirecsede"]),
		utf8_decode($reg[$i]["nomdirecsede"]." ".$reg[$i]["apedirecsede"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }
########################## FUNCION LISTAR SEDES ##############################

########################## FUNCION LISTAR EPS ##############################
      function TablaListarEps()
   {
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE EPS',0,0,'C');
    
    $this->Ln();
    $this->SetFont('courier','B',10);
    $this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es BLANCO)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL)
    $this->Cell(10,8,'Nº',1,0,'C', True);
    $this->Cell(25,8,'CÓDIGO',1,0,'C', True);
    $this->Cell(120,8,'NOMBRE DE ENTIDAD',1,0,'C', True);
    $this->Cell(30,8,'NIT',1,0,'C', True);
    $this->Cell(10,8,'TIPO',1,0,'C', True);
    $this->Cell(10,8,'DV',1,0,'C', True);
    $this->Cell(30,8,'EXPEDIDA',1,0,'C', True);
    $this->Cell(90,8,'NOMBRE DE CONTABILIDAD',1,1,'C', True);
    
    $tra = new Login();
    $reg = $tra->ListarEps();

    if($reg==""){
    echo "";      
    } else {
 
     /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(10,25,120,30,10,10,30,90));

	/* AQUI AGREGO LOS VALORES A MOSTRAR EN COLUMNAS */
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,
		utf8_decode($reg[$i]["codigo"]),
		utf8_decode($reg[$i]["nomentidad"]),
		utf8_decode($reg[$i]["nit"]),
		utf8_decode($reg[$i]["tipo"]),
		utf8_decode($reg[$i]["dv"]),
		utf8_decode($reg[$i]["expedida"]),
		utf8_decode($reg[$i]["nomcontabilidad"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }
########################## FUNCION LISTAR EPS ##############################

########################## FUNCION LISTAR USUARIOS ##############################
      function TablaListarUsuarios()
   {
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE USUARIOS',0,0,'C');
    
    $this->Ln();
    $this->SetFont('courier','B',10);
    $this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es BLANCO)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL)
    $this->Cell(10,8,'Nº',1,0,'C', True);
    $this->Cell(30,8,'CÉDULA',1,0,'C', True);
    $this->Cell(80,8,'NOMBRES Y APELLIDOS',1,0,'C', True);
    $this->Cell(25,8,'SEXO',1,0,'C', True);
    $this->Cell(45,8,'CARGO',1,0,'C', True);
    $this->Cell(60,8,'EMAIL',1,0,'C', True);
    $this->Cell(40,8,'USUARIO',1,0,'C', True);
    $this->Cell(40,8,'NIVEL',1,1,'C', True);
    
    $tra = new Login();
    $reg = $tra->ListarUsuarios();

    if($reg==""){
    echo "";      
    } else {
 
    $a=1;
    for($i=0;$i<sizeof($reg);$i++){
    $this->SetFont('courier','',9);  
    $this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(10,6,$a++,1,0,'C');
    $this->CellFitSpace(30,6,$reg[$i]["cedula"],1,0,'C');
    $this->CellFitSpace(80,6,utf8_decode($reg[$i]["nombres"]),1,0,'C');
    $this->CellFitSpace(25,6,utf8_decode($reg[$i]["sexo"]),1,0,'C');
    $this->CellFitSpace(45,6,utf8_decode($reg[$i]["cargo"]),1,0,'C');
    $this->CellFitSpace(60,6,utf8_decode($reg[$i]["email"]),1,0,'C');
    $this->CellFitSpace(40,6,utf8_decode($reg[$i]["usuario"]),1,0,'C');
    $this->CellFitSpace(40,6,utf8_decode($reg[$i]["nivel"]),1,0,'C');
    $this->Ln();
         }
   }
    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }
########################## FUNCION LISTAR USUARIOS ##############################

########################## FUNCION LISTAR USUARIOS ##############################
 function TablaListarLogs()
   {
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE LOGS DE ACCESO DE USUARIOS',0,0,'C');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(10,8,'N°',1,0,'C', True);
	$this->Cell(30,8,'IP',1,0,'C', True);
	$this->Cell(40,8,'TIEMPO ENTRADA',1,0,'C', True);
	$this->Cell(140,8,'NAVEGADOR DE ACCESO',1,0,'C', True);
	$this->Cell(60,8,'PAGINAS DE ACCESO',1,0,'C', True);
	$this->Cell(50,8,'USUARIO',1,1,'C', True);
	

	$tra = new Login();
    $reg = $tra->ListarLogs();

    if($reg==""){
    echo "";      
    } else {
	
    /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(10,30,40,140,60,50));

	/* AQUI AGREGO LOS VALORES A MOSTRAR EN COLUMNAS */
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,utf8_decode($reg[$i]["ip"]),utf8_decode($reg[$i]["tiempo"]),utf8_decode($reg[$i]["detalles"]),utf8_decode($reg[$i]["paginas"]),utf8_decode($reg[$i]["usuario"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('Courier','B',10);
    $this->Cell(30,6,'',0,0,'');
    $this->Cell(160,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO POR:______________________________________________',0,0,'');
    $this->Ln();
    $this->Cell(30,6,'',0,0,'');
    $this->Cell(160,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(11);
   }
########################## FUNCION LISTAR USUARIOS ##############################

########################## FUNCION LISTAR MEDICOS ##############################
      function TablaListarMedicos()
   {
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE MEDICOS',0,0,'C');
    
    $this->Ln();
    $this->SetFont('courier','B',10);
    $this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es BLANCO)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL)
    $this->Cell(12,8,'Nº',1,0,'C', True);
    $this->Cell(30,8,'TARJETA PROF.',1,0,'C', True);
    $this->Cell(30,8,'CÉDULA',1,0,'C', True);
    $this->Cell(80,8,'NOMBRES Y APELLIDOS',1,0,'C', True);
    $this->Cell(25,8,'SEXO',1,0,'C', True);
    $this->Cell(25,8,'FECHA NAC.',1,0,'C', True);
    $this->Cell(16,8,'EDAD',1,0,'C', True);
    $this->Cell(30,8,'ESPECIALIDAD',1,0,'C', True);
    $this->Cell(50,8,'CORREO',1,0,'C', True);
    $this->Cell(30,8,'Nº TELÉFONO',1,1,'C', True);
    
    $tra = new Login();
    $reg = $tra->ListarMedicos();

    if($reg==""){
    echo "";      
    } else {
	
    /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(12,30,30,80,25,25,16,30,50,30));

	/* AQUI AGREGO LOS VALORES A MOSTRAR EN COLUMNAS */
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,
		utf8_decode($reg[$i]["tpmedico"]),
		utf8_decode($reg[$i]["cedmedico"]),
		utf8_decode($reg[$i]["nommedico"]." ".$reg[$i]["apemedico"]),
		utf8_decode($reg[$i]["sexomedico"]),
		utf8_decode(date("d-m-Y",strtotime($reg[$i]["fnacmedico"]))),
		utf8_decode(edad($reg[$i]["fnacmedico"])),
		utf8_decode($reg[$i]["especmedico"]),
		utf8_decode($reg[$i]["correomedico"]),
		utf8_decode($reg[$i]["tlfmedico"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }
########################## FUNCION LISTAR MEDICOS ##############################

########################## FUNCION LISTAR PACIENTES ##############################
      function TablaListarPacientes()
   {
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE PACIENTES',0,0,'C');
    
    $this->Ln();
    $this->SetFont('courier','B',10);
    $this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es BLANCO)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL)
    $this->Cell(12,8,'Nº',1,0,'C', True);
    $this->Cell(30,8,'CÉDULA',1,0,'C', True);
    $this->Cell(80,8,'NOMBRES Y APELLIDOS',1,0,'C', True);
    $this->Cell(25,8,'SEXO',1,0,'C', True);
    $this->Cell(25,8,'FECHA NAC.',1,0,'C', True);
    $this->Cell(20,8,'EDAD',1,0,'C', True);
    $this->Cell(25,8,'GRUPO SANG.',1,0,'C', True);
    $this->Cell(30,8,'ESTADO CIVIL',1,0,'C', True);
    $this->Cell(30,8,'VINCULACIÓN',1,0,'C', True);
    $this->Cell(55,8,'EPS',1,1,'C', True);
    
    $tra = new Login();
    $reg = $tra->ListarPacientes();

    if($reg==""){
    echo "";      
    } else {
	
    /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(12,30,80,25,25,20,25,30,30,55));

	/* AQUI AGREGO LOS VALORES A MOSTRAR EN COLUMNAS */
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,
		utf8_decode($reg[$i]["cedpaciente"]),
		utf8_decode($reg[$i]["pnompaciente"]." ".$reg[$i]["snompaciente"]." ".$reg[$i]["papepaciente"]." ".$reg[$i]["sapepaciente"]),
		utf8_decode($reg[$i]["sexopaciente"]),
		utf8_decode(date("d-m-Y",strtotime($reg[$i]["fnacpaciente"]))),
		utf8_decode(edad($reg[$i]["fnacpaciente"])),
		utf8_decode($reg[$i]["gruposapaciente"]),
		utf8_decode($reg[$i]["estadopaciente"]),
		utf8_decode($reg[$i]["vinculacion"]),
		utf8_decode($reg[$i]["nomentidad"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }
########################## FUNCION LISTAR PACIENTES ##############################

################################### REPORTES DE ADMINISTRACION ##################################
	

	
	





################################# FUNCION CITAS MEDICAS #################################

########################## FUNCION REPORTES DE CITAS CANCELADAS ##############################
 function TablaCitaMedicaCancelada()
   {
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$con = new Login();
    $con = $con->ConfiguracionPorId(); 

    $tra = new Login();
    $reg = $tra->BuscarCitasMedicasCanceladas();

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($con[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($con[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'DIREC: '.utf8_decode($con[0]['direccionsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'TLF: Nº-'.utf8_decode($con[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'EMAIL: '.utf8_decode($con[0]['emailsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,14,'PACIENTE: '.utf8_decode($reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,22,'Nº DE IDENTIFICACIÓN: '.utf8_decode($reg[0]['cedpaciente']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(14);
	
	$this->SetFont('Courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO DE CITAS MEDICAS CANCELADAS POR PACIENTE',0,0,'C');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(10,8,'N°',1,0,'C', True);
	$this->Cell(110,8,'MÉDICO',1,0,'C', True);
	$this->Cell(140,8,'MOTIVO DE CITA',1,0,'C', True);
	$this->Cell(40,8,'FECHA DE CITA',1,0,'C', True);
	$this->Cell(30,8,'STATUS',1,1,'C', True);

    if($reg==""){
    echo "";      
    } else {
	
    /* AQUI DECLARO LAS COLUMNAS*/
	$this->SetWidths(array(10,110,140,40,30));

	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	$this->SetFont('Courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,utf8_decode($reg[$i]['especmedico']." : ".$reg[$i]['nommedico']." ".$reg[$i]['apemedico']),utf8_decode($reg[$i]['motivocita']),date("d-m-Y", strtotime($reg[$i]["fechacita"])),utf8_decode($reg[$i]["statuscita"])));
       }
   }

    $this->Ln(12); 
    $this->SetFont('Courier','B',10);
    $this->Cell(30,6,'',0,0,'');
    $this->Cell(160,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO POR:______________________________________________',0,0,'');
    $this->Ln();
    $this->Cell(30,6,'',0,0,'');
    $this->Cell(160,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(11);
   }
########################## FUNCION REPORTES DE CITAS CANCELADAS ##############################

########################### FUNCION REPORTES DE CITAS MEDICAS POR FECHAS ##########################
	   function TablaCitasMedicasFechas()
   {
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$desde = $_GET["desde"];
    $hasta = $_GET["hasta"];
	$codsucursal = $_GET["codsucursal"];
	$codsede = $_GET["codsede"];
    $especialidad = $_GET["especialidad"];

    $ci = new Login();
    $reg = $ci->BuscarCitasMedicasReportes();

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($reg[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($reg[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'SEDE '.utf8_decode($reg[0]['nombresede']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'DIREC SEDE: '.utf8_decode($reg[0]['direccionsede']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'TLF SEDE: Nº-'.utf8_decode($reg[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE CITAS MÉDICAS DESDE: '.date("d-m-Y", strtotime($desde)).' HASTA '.date("d-m-Y", strtotime($hasta)).' Y ESPECIALIDAD '.$especialidad,0,0,'C');

	
    $this->Ln();
	$this->SetFont('courier','B',10);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(10,8,'N°',1,0,'C', True);
	$this->Cell(85,8,'MÉDICOS',1,0,'C', True);
	$this->Cell(90,8,'PACIENTES',1,0,'C', True);
	$this->Cell(80,8,'MOTIVO DE CITA',1,0,'C', True);
	$this->Cell(40,8,'FECHA/HORA',1,0,'C', True);
	$this->Cell(30,8,'STATUS',1,1,'C', True);
	
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	
	$this->SetFont('courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(10,6,$a++,1,0,'C');
	$this->CellFitSpace(85,6,utf8_decode($reg[$i]['nommedico']." ".$reg[$i]['apemedico']),1,0,'C');
    $this->CellFitSpace(90,6,utf8_decode($reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']),1,0,'C');
    $this->CellFitSpace(80,6,utf8_decode($reg[$i]['motivocita']),1,0,'C');
	$this->CellFitSpace(40,6,date("d-m-Y", strtotime($reg[$i]["fechacita"]))." ".$reg[$i]["horacita"],1,0,'C');
	$this->CellFitSpace(30,6,$reg[$i]["statuscita"],1,0,'C');
    $this->Ln();
	
   }
   
    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }

########################### FUNCION REPORTES DE CITAS MEDICAS POR FECHAS ##########################

########################### FUNCION REPORTES DE CITAS MEDICAS POR MEDICOS ##########################
	   function TablaCitasMedicasMedicos()
   {

	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$codmedico = $_GET["codmedico"];
	$codsucursal = $_GET["codsucursal"];
	$codsede = $_GET["codsede"];

    $ci = new Login();
    $reg = $ci->BuscarCitasPorMedicosReportes();

	$this->Ln(2);
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+74, $this->GetY()+2, 42),5,0,'L');
	$this->Cell(250,8,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()-62, $this->GetY()+1, 24),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-28,utf8_decode($reg[0]['nombresucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-20,'NIT: '.utf8_decode($reg[0]['nitsucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-13,'SEDE '.utf8_decode($reg[0]['nombresede']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,-5,'DIREC SEDE: '.utf8_decode($reg[0]['direccionsede']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',10);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(250,4,'TLF SEDE: Nº-'.utf8_decode($reg[0]['telefonosucursal']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(8);
	
	$this->SetFont('courier','B',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(350,10,'LISTADO GENERAL DE CITAS MÉDICAS DEL MÉDICO '.utf8_decode($reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']),0,0,'C');

    $this->Ln();
	$this->SetFont('courier','B',10);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(10,8,'N°',1,0,'C', True);
	$this->Cell(105,8,'PACIENTES',1,0,'C', True);
	$this->Cell(145,8,'MOTIVO DE CITA',1,0,'C', True);
	$this->Cell(40,8,'FECHA/HORA',1,0,'C', True);
	$this->Cell(30,8,'STATUS',1,1,'C', True);
	
	$a=1;
    for($i=0;$i<sizeof($reg);$i++){ 
	
	$this->SetFont('courier','',10);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(10,6,$a++,1,0,'C');
    $this->CellFitSpace(105,6,utf8_decode($reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']),1,0,'C');
    $this->CellFitSpace(145,6,utf8_decode($reg[$i]['motivocita']),1,0,'C');
	$this->CellFitSpace(40,6,date("d-m-Y", strtotime($reg[$i]["fechacita"]))." ".$reg[$i]["horacita"],1,0,'C');
	$this->CellFitSpace(30,6,$reg[$i]["statuscita"],1,0,'C');
    $this->Ln();
	
   }
   
    $this->Ln(12); 
    $this->SetFont('courier','B',10);
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'ELABORADO POR: '.utf8_decode($_SESSION["nombres"]),0,0,'');
    $this->Cell(120,6,'RECIBIDO:__________________________________',0,0,'');
    $this->Ln();
    $this->Cell(5,6,'',0,0,'');
    $this->Cell(200,6,'FECHA/HORA ELABORACIÓN:  '.date('d-m-Y h:i:s A'),0,0,'');
    $this->Cell(120,6,'',0,0,'');
    $this->Ln(4);
     }

########################### FUNCION REPORTES DE CITAS MEDICAS POR MEDICOS ##########################

################################# FUNCION CITAS MEDICAS #################################






















################################ FUNCION MEDICO GENERAL E GINECOLOGO ###############################

############################# FUNCION PARA MOSTRAR APERTURA DE HISTORIA ########################### 
	  function TablaAperturas()
   {
	
	$tra = new Login();
    $reg = $tra->AperturasPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE APERTURA DE HISTORIA CLÍNICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'HISTORIA CLÍNICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaapertura'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaapertura'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]["fnacpaciente"])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.$reg[0]['parentescoacompana'],1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'MOTIVO DE CONSULTA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['motivoconsulta']),1,'J');
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(30,5,'SIGNOS VITALES: ',1,0,'L');
	$this->CellFitSpace(32,5,'TA(mm/Hg): '.$reg[0]['ta'],1,0,'L');
	$this->CellFitSpace(32,5,'Temp:(°C): '.$reg[0]['temperatura'],1,0,'L');
	$this->CellFitSpace(32,5,'FC(por minuto): '.$reg[0]['fc'],1,0,'L');
	$this->CellFitSpace(32,5,'FR(por minuto): '.$reg[0]['fr'],1,0,'L');
	$this->CellFitSpace(32,5,'PESO(Kg): '.$reg[0]['peso'],1,0,'L');
    $this->Ln();
	
	if($reg[0]['especmedico']=='MEDICO GENERAL' && $reg[0]['sexopaciente']=='FEMENINO'){ 
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->CellFitSpace(65,5,'FECHA ULTIMA CITOLOGÍA: '.$variable = ( $reg[0]['fechacitologia'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechacitologia']))),1,0,'L');
	$this->CellFitSpace(60,5,'EMBARAZADA: '.$reg[0]['embarazada'],1,0,'L');
    $this->CellFitSpace(65,5,'FECHA ULTIMA MESTRUACIÓN: '.$variable = ( $reg[0]['fechamestruacion'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechamestruacion']))),1,0,'L');
    $this->Ln();
	
	} elseif($reg[0]['especmedico']=='GINECOLOGO' && $reg[0]['sexopaciente']=='FEMENINO'){ 
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->CellFitSpace(65,5,'FECHA ULTIMA CITOLOGÍA: '.$variable = ( $reg[0]['fechacitologia'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechacitologia']))),1,0,'L');
	$this->CellFitSpace(60,5,'EMBARAZADA: '.$reg[0]['embarazada'],1,0,'L');
    $this->CellFitSpace(65,5,'FECHA ULTIMA MESTRUACIÓN: '.$variable = ( $reg[0]['fechamestruacion'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechamestruacion']))),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->CellFitSpace(65,5,'SEMANAS DE GESTACIÓN: '.$reg[0]['semanas'],1,0,'L');
	$this->CellFitSpace(60,5,'FECHA PROBABLE DE PARTO: '.$variable = ( $reg[0]['fechaparto'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechaparto']))),1,0,'L');
    $this->Cell(65,5,'',1,0,'L');
    $this->Ln();
	
	}
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'EXAMEN FISICO',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['examenfisico']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'ENFERMEDAD ACTUAL',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['enfermedadpaciente']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'ANTECEDENTES CLINICOS',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'PERSONALES: '.utf8_decode($reg[0]['antecedentepaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,5,'FAMILIARES: '.utf8_decode($reg[0]['antecedentefamiliares']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'ALÉRGICOS: '.utf8_decode($reg[0]['antecedentealergico']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'PATOLÓGICOS: '.utf8_decode($reg[0]['antecedentepatologico']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'QUIRÚRGICOS: '.utf8_decode($reg[0]['antecedentequirurgico']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'FARMACOLÓGICOS: '.utf8_decode($reg[0]['antecedentefarmacologico']),1,0,'L');
    $this->Ln();
	
	if($reg[0]['sexopaciente']=='MASCULINO'){ } else { 
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'GINECOLÓGICOS: '.utf8_decode($reg[0]['antecedenteginecologico']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'HISTORIAL GESTACIONAL: '.utf8_decode($reg[0]['historialgestacional']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'PLANIFICACIÓN FAMILIAR: '.utf8_decode($reg[0]['planificacionfamiliar']),1,0,'L');
    $this->Ln();
	
	}
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'IMPRESIÓN DIAGNÓSTICA',1,0,'C', True);
    $this->Ln();	
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['dxpresuntivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($presuntivo,$idciepresuntivo,$observacionpresuntivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,4,$a++.". ".strtoupper($presuntivo).". \nOBSERVACIÓN: ".utf8_decode($observacionpresuntivo),1,'J');
	
	endfor;
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'IDENTIFICACIÓN DEL ORIGEN DE LA ENFERMEDAD',1,0,'C', True);
    $this->Ln();	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['origenenfermedad']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'CONDUCTA O PLAN DE TRATAMIENTO',1,0,'C', True);
    $this->Ln();	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['tratamiento']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DIAGNÓSTICO DEFINITIVO',1,0,'C', True);
    $this->Ln();
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['dxdefinitivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($definitivo,$idciedefinitivo,$observaciondefinitivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,4,$a++.". ".strtoupper($definitivo).". \nOBSERVACIÓN: ".utf8_decode($observaciondefinitivo),1,'J');
	
	endfor;	
	
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }
	

############################## AQUI MOSTRAMOS LA REMISION DEL PACIENTE #############################
  
    if (strip_tags(isset($reg[0]['remision']))) {
  
    $this->AddPage();
    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE APERTURA DE HISTORIA CLÍNICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}


    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fecharemision'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fecharemision'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.$reg[0]['enfoquepaciente'],1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.utf8_decode($reg[0]['parentescoacompana']),1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN DEL PACIENTE',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,8,utf8_decode($this->SetFont('Courier','',8).$reg[0]['remision']),1,'J');

   $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
    }
    
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4); 
 } 
 
############################## FIN DE MOSTRAMOS LA REMISION DEL PACIENTE #############################


############################## AQUI MUESTRO LAS FORMULAS MEDICAS ################################
	  
    if (strip_tags(isset($reg[0]['formulas']))) {
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['formulas']);

    # Recorremos el array
	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE APERTURA DE HISTORIA CLÍNICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
   $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($formulamedica),1,'J');
	
	
	####################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }

############################### FIN DE MUESTRO LAS FORMULAS MEDICAS ##############################


############################## AQUI MUESTRO LAS ORDENES MEDICAS ############################## 
    
    if (strip_tags(isset($reg[0]['ordenes']))) { 
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['ordenes']);

	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE APERTURA DE HISTORIA CLÍNICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaorden'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaorden'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($ordenmedica),1,'J');


	###################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ########################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }
############################## FIN DE MUESTRO LAS ORDENES MEDICAS ############################## 
}	
############################ FUNCION PARA MOSTRAR APERTURA DE HISTORIA ########################### 





############################### FUNCION PARA MOSTRAR HOJA EVOLUTIVA ################################# 
function TablaEvolutivas()
  {
	$tra = new Login();
    $reg = $tra->HojaEvolutivaPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}

	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'HOJA EVOLUTIVA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechagenerahoja'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechagenerahoja'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]["fnacpaciente"])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.$reg[0]['parentescoacompana'],1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'MOTIVO DE CONSULTA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['motivoconsulta']),1,'J');
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(30,5,'SIGNOS VITALES: ',1,0,'L');
	$this->CellFitSpace(32,5,'TA(mm/Hg): '.$reg[0]['ta'],1,0,'L');
	$this->CellFitSpace(32,5,'Temp:(°C): '.$reg[0]['temperatura'],1,0,'L');
	$this->CellFitSpace(32,5,'FC(por minuto): '.$reg[0]['fc'],1,0,'L');
	$this->CellFitSpace(32,5,'FR(por minuto): '.$reg[0]['fr'],1,0,'L');
	$this->CellFitSpace(32,5,'PESO(Kg): '.$reg[0]['peso'],1,0,'L');
    $this->Ln();
	
	if($reg[0]['especmedico']=='MEDICO GENERAL' && $reg[0]['sexopaciente']=='FEMENINO'){ 
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->CellFitSpace(65,5,'FECHA ULTIMA CITOLOGÍA: '.$variable = ( $reg[0]['fechacitologia'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechacitologia']))),1,0,'L');
	$this->CellFitSpace(60,5,'EMBARAZADA: '.$reg[0]['embarazada'],1,0,'L');
    $this->CellFitSpace(65,5,'FECHA ULTIMA MESTRUACIÓN: '.$variable = ( $reg[0]['fechamestruacion'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechamestruacion']))),1,0,'L');
    $this->Ln();
	
	} elseif($reg[0]['especmedico']=='GINECOLOGO' && $reg[0]['sexopaciente']=='FEMENINO'){ 
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->CellFitSpace(65,5,'FECHA ULTIMA CITOLOGÍA: '.$variable = ( $reg[0]['fechacitologia'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechacitologia']))),1,0,'L');
	$this->CellFitSpace(60,5,'EMBARAZADA: '.$reg[0]['embarazada'],1,0,'L');
    $this->CellFitSpace(65,5,'FECHA ULTIMA MESTRUACIÓN: '.$variable = ( $reg[0]['fechamestruacion'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechamestruacion']))),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->CellFitSpace(65,5,'SEMANAS DE GESTACIÓN: '.$reg[0]['semanas'],1,0,'L');
	$this->CellFitSpace(60,5,'FECHA PROBABLE DE PARTO: '.$variable = ( $reg[0]['fechaparto'] == '0000-00-00' ? "" : date("d-m-Y", strtotime($reg[0]['fechaparto']))),1,0,'L');
    $this->Cell(65,5,'',1,0,'L');
    $this->Ln();
	
	}
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'EXAMEN FISICO',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['examenfisico']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'ATENCIÓN ACTIVIDAD Y/O PROCEDIMIENTO',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,5,utf8_decode($reg[0]['atenproced']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'IMPRESIÓN DIAGNÓSTICA',1,0,'C', True);
    $this->Ln();	
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['dxpresuntivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($presuntivo,$idciepresuntivo,$observacionpresuntivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,4,$a++.". ".strtoupper($presuntivo).". \nOBSERVACIÓN: ".utf8_decode($observacionpresuntivo),1,'J');
	
	endfor;
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'IDENTIFICACIÓN DEL ORIGEN DE LA ENFERMEDAD',1,0,'C', True);
    $this->Ln();	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['origenenfermedad']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'CONDUCTA O PLAN DE TRATAMIENTO',1,0,'C', True);
    $this->Ln();	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['tratamiento']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DIAGNÓSTICO DEFINITIVO',1,0,'C', True);
    $this->Ln();
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['dxdefinitivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($definitivo,$idciedefinitivo,$observaciondefinitivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,4,$a++.". ".strtoupper($definitivo).". \nOBSERVACIÓN: ".utf8_decode($observaciondefinitivo),1,'J');
	
	endfor;	
	
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }
	

############################## AQUI MOSTRAMOS LA REMISION DEL PACIENTE #############################
  
    if (strip_tags(isset($reg[0]['remision']))) {
  
    $this->AddPage();
    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}


    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fecharemision'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fecharemision'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.$reg[0]['enfoquepaciente'],1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.utf8_decode($reg[0]['parentescoacompana']),1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN DEL PACIENTE',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,8,utf8_decode($this->SetFont('Courier','',8).$reg[0]['remision']),1,'J');

   $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
    }
    
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4); 
 } 
 
############################## FIN DE MOSTRAMOS LA REMISION DEL PACIENTE #############################


############################### AQUI MUESTRO LAS FORMULAS MEDICAS ################################
	  
    if (strip_tags(isset($reg[0]['formulas']))) { 
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['formulas']);

    # Recorremos el array
	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
   $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($formulamedica),1,'J');
	
	
	######################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }

############################### FIN DE MUESTRO LAS FORMULAS MEDICAS ##############################


############################## AQUI MUESTRO LAS ORDENES MEDICAS ############################## 
    
    if (strip_tags(isset($reg[0]['ordenes']))) {
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['ordenes']);

	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaorden'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaorden'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($ordenmedica),1,'J');


	####################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }
############################## FIN DE MUESTRO LAS ORDENES MEDICAS ##############################
}
############################### FUNCION PARA MOSTRAR HOJA EVOLUTIVA ################################# 




############################### FUNCION PARA MOSTRAR REMISIONES ################################# 
	  function TablaRemisiones()
   {
	
	$tra = new Login();
    $reg = $tra->RemisionesPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE REMISIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}

	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fecharemision'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fecharemision'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]["fnacpaciente"])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.$reg[0]['parentescoacompana'],1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN DEL PACIENTE',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,8,utf8_decode($this->SetFont('Courier','',8).$reg[0]['remision']),1,'J');

   $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
    }
    
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);



############################### AQUI MUESTRO LAS FORMULAS MEDICAS ###############################
	  
    if (strip_tags(isset($reg[0]['formulas']))) { 
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['formulas']);

    # Recorremos el array
	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE REMISIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
   $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($formulamedica),1,'J');
	
	
	####################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }

############################### FIN DE MUESTRO LAS FORMULAS MEDICAS #############################


############################## AQUI MUESTRO LAS ORDENES MEDICAS ############################## 
    
    if (strip_tags(isset($reg[0]['formulas']))) { 
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['ordenes']);

	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE REMISIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaorden'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaorden'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($ordenmedica),1,'J');


	####################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }
############################## FIN DE MUESTRO LAS ORDENES MEDICAS ############################## 
}
############################### FUNCION PARA MOSTRAR REMISIONES ################################# 





############################### FUNCION PARA MOSTRAR FORMULAS MEDICAS ###########################
function TablaFormulasMedicas()
{
	
	$tra = new Login();
    $reg = $tra->FormulasMedicasPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$explode = explode(",,",$reg[0]['formulas']);

    # Recorremos el array
	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE FÓRMULAS MÉDICAS',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
   $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($formulamedica),1,'J');
	
	
	###################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/


############################## AQUI MUESTRO LAS ORDENES MEDICAS ############################## 
    
   if (strip_tags(isset($reg[0]['ordenes']))) { 
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['ordenes']);

	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE FÓRMULAS MÉDICAS',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaorden'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaorden'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($ordenmedica),1,'J');


	##################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }
############################## FIN DE MUESTRO LAS ORDENES MEDICAS ############################## 

 }
############################ FUNCION PARA MOSTRAR FORMULAS MEDICAS ############################ 


########################### FUNCION PARA MOSTRAR ORDENES MEDICAS ############################# 
function TablaOrdenesMedicas()
{
	
	$tra = new Login();
    $reg = $tra->OrdenesMedicasPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$explode = explode(",,",$reg[0]['ordenes']);

	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE ÓRDENES MÉDICAS',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaorden'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaorden'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($ordenmedica),1,'J');


	####################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/



############################## AQUI MUESTRO LAS FORMULAS MEDICAS ############################## 
    
    if (strip_tags(isset($reg[0]['formulas']))) { 
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['formulas']);

    # Recorremos el array
	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE ÓRDENES MÉDICAS',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
   $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($formulamedica),1,'J');
	
	
	######################## AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA ######################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/

           }
############################## FIN DE MUESTRO LAS FORMULAS MEDICAS ############################## 

 }
############################# FUNCION PARA MOSTRAR ORDENES MEDICAS ########################## 





############################### FUNCION PARA MOSTRAR FORMULAS TERAPIAS ############################# 
	  function TablaFormulasTerapias()
   {
	
	$tra = new Login();
    $reg = $tra->FormulasTerapiasPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE FÓRMULAS DE TERAPIAS',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'NÚMERO DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',8); 
    $this->CellFitSpace(70,5,$reg[0]['cedpaciente'],0,0,'L');

	$this->SetFont('Courier','B',8); 
	$this->CellFitSpace(40,5,'TIPO DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',8); 
	$this->CellFitSpace(35,5,$reg[0]['idenpaciente'],0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'NOMBRES Y APELLIDOS: ',0,0,'L');
	$this->SetFont('Courier','',8);
    $this->CellFitSpace(70,5,utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente'].' '.$reg[0]['papepaciente'].' '.$reg[0]['sapepaciente']),0,0,'L');


	$this->SetFont('Courier','B',8);
	$this->CellFitSpace(40,5,'ESTADO CIVIL: ',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->CellFitSpace(35,5,utf8_decode($reg[0]['estadopaciente']),0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'FECHA DE NACIMIENTO: ',0,0,'L');
    $this->SetFont('Courier','',8);  
    $this->CellFitSpace(70,5,date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),0,0,'L');


    $this->SetFont('Courier','B',8); 
    $this->CellFitSpace(40,5,'EDAD ',0,0,'L');
    $this->SetFont('Courier','',8); 
    $this->CellFitSpace(35,5,edad($reg[0]['fnacpaciente']).' AÑOS',0,0,'L');
    $this->Ln();

    $this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'GRUPO SANGUINEO: ',0,0,'L');
    $this->SetFont('Courier','',8);  
    $this->CellFitSpace(70,5,$reg[0]['gruposapaciente'],0,0,'L');


    $this->SetFont('Courier','B',8); 
    $this->CellFitSpace(40,5,'FECHA ELABORACIÓN: ',0,0,'L');
    $this->SetFont('Courier','',8); 
    $this->CellFitSpace(35,5,date("d-m-Y h:i:s", strtotime($reg[0]['fechaformulaterapia'])),0,0,'L');
    $this->Ln();
	
    
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA DE TERAPIAS',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(100,5,'TERAPIAS RESPIRATORIAS' ,1,0,'L');
	$this->Cell(30,5,'SERIES' ,1,0,'L');
	$this->Cell(20,5,$reg[0]['terapiasrespiratorias'],1,0,'L');
	$this->Cell(40,5,'DX' ,1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(100,5,'TERAPIAS FISICAS' ,1,0,'L');
	$this->Cell(30,5,'SERIES' ,1,0,'L');
	$this->Cell(20,5,$reg[0]['terapiasfisicas'],1,0,'L');
	$this->Cell(40,5,'DX' ,1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(100,5,'MICRONEBULIZACIONES' ,1,0,'L');
	$this->Cell(30,5,'' ,1,0,'L');
	$this->Cell(20,5,$reg[0]['micronebulizaciones'],1,0,'L');
	$this->Cell(40,5,'DIAS' ,1,0,'L');
	
   
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
}
    $this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
  $this->Ln(4);
     }
############################### FUNCION PARA MOSTRAR FORMULAS TERAPIAS ############################# 



############################# FUNCION PARA MOSTRAR SOLICITUD EXAMENES ############################# 
   function TablaExamenes()
{
	$tra = new Login();
    $reg = $tra->SolicitudExamenesPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'SOLICITUD DE SOLICITUD DE EXÁMEN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'NÚMERO DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',8); 
    $this->CellFitSpace(70,5,$reg[0]['cedpaciente'],0,0,'L');

	$this->SetFont('Courier','B',8); 
	$this->CellFitSpace(40,5,'TIPO DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',8); 
	$this->CellFitSpace(35,5,$reg[0]['idenpaciente'],0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'NOMBRES Y APELLIDOS: ',0,0,'L');
	$this->SetFont('Courier','',8);
    $this->CellFitSpace(70,5,utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente'].' '.$reg[0]['papepaciente'].' '.$reg[0]['sapepaciente']),0,0,'L');


	$this->SetFont('Courier','B',8);
	$this->CellFitSpace(40,5,'ESTADO CIVIL: ',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->CellFitSpace(35,5,utf8_decode($reg[0]['estadopaciente']),0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'FECHA DE NACIMIENTO: ',0,0,'L');
    $this->SetFont('Courier','',8);  
    $this->CellFitSpace(70,5,date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),0,0,'L');


    $this->SetFont('Courier','B',8); 
    $this->CellFitSpace(40,5,'EDAD: ',0,0,'L');
    $this->SetFont('Courier','',8); 
    $this->CellFitSpace(35,5,edad($reg[0]['fnacpaciente']).' AÑOS',0,0,'L');
    $this->Ln();

    $this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'GRUPO SANGUINEO: ',0,0,'L');
    $this->SetFont('Courier','',8);  
    $this->CellFitSpace(70,5,$reg[0]['gruposapaciente'],0,0,'L');


    $this->SetFont('Courier','B',8); 
    $this->CellFitSpace(40,5,'FECHA ELABORACIÓN: ',0,0,'L');
    $this->SetFont('Courier','',8); 
    $this->CellFitSpace(35,5,date("d-m-Y h:i:s", strtotime($reg[0]['fechasolicitud'])),0,0,'L');
    $this->Ln();
	
    
	$this->Ln();
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'HEMATOLOGIA',1,0,'L');
	$this->Cell(15,5,'',1,0,'L');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'MICROSCOPIA',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)

    $this->Cell(70,5,'CUADRO HEMATICO',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['cuadrohepatico'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'PARCIAL DE ORINA',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['parcialorina'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'HEMATOCRITO',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['hematocrito'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'COPROLOGICO/MATERIA FECAL',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['materiafecal'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'HEMOGLOBINA',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['hemoglobina'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'BACILOSCOPIA ESPUTO',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['basiloscopia'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'VSG',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['vsg'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'KOH',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['koh'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'ESP',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['esp'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'FROTIS FLUJO VAGINAL',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['flujovaginal'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'EXT. GOTA GRUESA',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['gotagruesa'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'GRUPO O FACTOR RH',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['factorrh'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'',1,0,'L');
	$this->Cell(15,5,'',1,0,'L');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'QUÍMICA SANGUÍNEA',1,0,'L');
	$this->Cell(15,5,'',1,0,'L');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'INMUNOLOGIA',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'',1,0,'L');
	$this->Cell(15,5,'',1,0,'L');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'GLICEMIA',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['glicemia'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'GRAVINDEX/PRUEBA DE EMBARAZO',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['embarazo'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'COLESTEROL TOTAL',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['colesteroltotal'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->Cell(70,5,'SEROLOGIA VDRL',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['serologia'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'COLESTEROL HDL',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['colesterolhdl'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'COLESTEROL LDL',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['colesterolldl'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(70,5,'OTROS',1,0,'L');
	$this->SetFont('Courier','B',8);
    $this->Cell(15,5,$reg[0]['otros'],1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'TRIGLICERIDOS',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['trigliceridos'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'CREATININA',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['creatinina'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'BUN',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['bun'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'UREA',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['urea'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'ÁCIDO ÚRICO',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['acidourico'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(70,5,'GLICEMIA PRE Y POST',1,0,'L');
	$this->SetFont('Courier','B',8);
	$this->Cell(15,5,$reg[0]['gliecemiapre'],1,0,'C');
	$this->Cell(20,5,'',0,0,'L');
	$this->Cell(70,5,'',1,0,'L');
    $this->Cell(15,5,'',1,0,'L');
    $this->Ln();
	
	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,5,'HORARIO TOMA DE MUESTRA: LUNES A VIERNES 7:00 AM',0,0,'C');
    $this->Ln();

	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,5,'HORA ENTREGA RESULTADOS: LUNES A VIERNES 11:30 AM A 12 AM',0,0,'C');
    $this->Ln();
	
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'EXÁMENES DE SANGRE:',1,0,'C');
	$this->Cell(130,5,'AYUNO APROXIMADO DE 8 HORAS',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'PARCIAL DE ORINA:',1,0,'C');
	$this->Cell(130,5,'PRIMERA ORINA DE LA MAÑANA NO DEBE TENER MAS DE 2 HORAS DE RECOLECCIÓN',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'',1,0,'C');
	$this->Cell(130,5,'NO TENER RELACIONES SEXUALES MINIMO 3 DIAS',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'FROTIS FLUJO:',1,0,'C');
	$this->Cell(130,5,'NO APLICARSE CREMA U OVULOS',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'',1,0,'L');
	$this->Cell(130,5,'NO REALIARSE DUCHAS VAGINALES',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'KOH:',1,0,'C');
	$this->Cell(130,5,'NO APLICARSE CREMAS EL DIA ANTERIOR',1,0,'C');
    $this->Ln();
	
	$this->Ln();
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Cell(190,5,'DX: '.utf8_decode(strtoupper($reg[0]['codcie'].": ".$reg[0]['nombrecie'])),0,0,'L');
    $this->Ln(4);

    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
  }

}
############################# FUNCION PARA MOSTRAR SOLICITUD EXAMENES ############################# 


############################# FUNCION PARA MOSTRAR CRIOCAUTERIZACION ############################# 
	  function TablaCriocauterizacion()
   {
	
	$tra = new Login();
    $reg = $tra->CriocauterizacionPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE CRIOCAUTERIZACIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'HOJA DE CRIOCAUTERIZACIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechagenerahoja'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechagenerahoja'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]["fnacpaciente"])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.$reg[0]['parentescoacompana'],1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'MOTIVO DE CONSULTA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['motivoconsulta']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'ATENCIÓN ACTIVIDAD Y/O PROCEDIMIENTO',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,5,utf8_decode($reg[0]['atenproced']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->CellFitSpace(190,6,'IMPRESIÓN DIAGNÓSTICA',1,0,'C', True);
    $this->Ln();	
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['dxpresuntivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($presuntivo,$idciepresuntivo,$observacionpresuntivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,4,$a++.". ".strtoupper($presuntivo).". \nOBSERVACIÓN: ".utf8_decode($observacionpresuntivo),1,'J');
	
	endfor;
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'IDENTIFICACIÓN DEL ORIGEN DE LA ENFERMEDAD',1,0,'C', True);
    $this->Ln();	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['origenenfermedad']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'CONDUCTA O PLAN DE TRATAMIENTO',1,0,'C', True);
    $this->Ln();	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,5,utf8_decode($reg[0]['tratamiento']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DIAGNÓSTICO DEFINITIVO',1,0,'C', True);
    $this->Ln();
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['dxdefinitivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($definitivo,$idciedefinitivo,$observaciondefinitivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,4,$a++.". ".strtoupper($definitivo).". \nOBSERVACIÓN: ".utf8_decode($observaciondefinitivo),1,'J');
	
	endfor;	
	
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }
	

############################## AQUI MOSTRAMOS LA REMISION DEL PACIENTE #############################
  
     if (strip_tags(isset($reg[0]['remision']))) {
  
    $this->AddPage();
    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE CRIOCAUTERIZACIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}


    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fecharemision'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fecharemision'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.$reg[0]['enfoquepaciente'],1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.utf8_decode($reg[0]['parentescoacompana']),1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'REMISIÓN DEL PACIENTE',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(0,8,utf8_decode($this->SetFont('Courier','',8).$reg[0]['remision']),1,'J');

   $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
    }
    
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4); 
 } 
 
############################## FIN DE MOSTRAMOS LA REMISION DEL PACIENTE #############################


############################### AQUI MUESTRO LAS FORMULAS MEDICAS ##############################
	  
    if (strip_tags(isset($reg[0]['formulas']))) {
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['formulas']);

    # Recorremos el array
	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieformula,$formulamedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE CRIOCAUTERIZACIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
   $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($formulamedica),1,'J');
	
	
	###################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA #####################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }

############################### FIN DE MUESTRO LAS FORMULAS MEDICAS ##############################


############################## AQUI MUESTRO LAS ORDENES MEDICAS ############################## 
    
   if (strip_tags(isset($reg[0]['ordenes']))) {
  
	$this->AddPage();

	$explode = explode(",,",$reg[0]['ordenes']);

	for($cont = 0, $s = sizeof($explode); $cont < $s; $cont++):
   
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idcieorden,$ordenmedica,$codcie,$nombrecie) = explode("/",$explode[$cont]);

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE CRIOCAUTERIZACIÓN',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaorden'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaorden'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ÓRDEN MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);
	$this->SetTextColor(3,3,3);
	
	$this->MultiCell(190,5,$this->SetFont('Courier','',8)."DX: ".strtoupper(utf8_decode($codcie.": ".$nombrecie))." \nFÓRMULA: ".utf8_decode($ordenmedica),1,'J');


	####################### AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA #####################
	$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                            } else {
    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(8);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Courier','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($cont != $s - 1) {
			$this->AddPage();
		                          } ##fin de if
	                                               endfor; ##fin de for*/
           }
############################## FIN DE MUESTRO LAS ORDENES MEDICAS ##############################

}
############################# FUNCION PARA MOSTRAR CRIOCAUTERIZACION ############################# 



############################### FUNCION PARA MOSTRAR COLPOSCOPIAS ################################# 
function TablaColposcopias()
  {
	$tra = new Login();
    $reg = $tra->ColposcopiaPorId();

	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE COLPOSCOPIA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
		
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'COLPOSCOPIA',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechacolposcopia'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechacolposcopia'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln(20);
	
	$variable = $this->GetY()-15.5;
	$this->Image('./fotos/img_colpos.png',10,$variable,190.5);
	$this->Ln(70);
	
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'RESULTADO DE COLPOSCOPIA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'1.EPITELIO ORIGINAL CAPILAR FINA:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['epiteliooriginal']),1,0,'L');
    $this->CellFitSpace(80,5,'- Zona de Transformación Típica:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['transformaciontipica']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'2. ASPECTO INFLAMATORIO:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['aspectoinflamatorio']),1,0,'L');
    $this->CellFitSpace(80,5,'- Zona de Transformación Atípica:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['transformacionatipica']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Aumento red vascular y/o vasos dilatados:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['aumentoredvascular']),1,0,'L');
    $this->CellFitSpace(80,5,'- Mosaico:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['mosaico']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'3. IMAGENES ATIPICAS:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['imagenesatipicas']),1,0,'L');
    $this->CellFitSpace(80,5,'- Vasos atípicos(hormquilla, sacacorchos, astenosis, dilataciones):',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['vasosatipicos']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Epitelio Acetoblanco:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['epitelioacetoblanco']),1,0,'L');
    $this->CellFitSpace(80,5,'- Condiloma:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['condiloma']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Base o punteado:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['baseopunteado']),1,0,'L');
    $this->CellFitSpace(80,5,'- Severas alteraciones vasculares y/o aumento de la distancia intercapilar:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['alteracionesvasculares']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'4. ASPECTO TUMORAL:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['aspectotumoral']),1,0,'L');
    $this->CellFitSpace(80,5,'- VPH:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['vph']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Ulcerativo:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['ulcerativo']),1,0,'L');
    $this->CellFitSpace(80,5,'- NIC:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['nic']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Proliferativo:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['proliferativo']),1,0,'L');
    $this->CellFitSpace(80,5,'- Ca. Invasor:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['cainvasor']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'5. IMPRESIÓN DIAGNOSTICA:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['impresiondiagnostica']),1,0,'L');
    $this->CellFitSpace(80,5,'- Normal:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['impresionnormal']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Inflamatoria:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['impresioninflamatoria']),1,0,'L');
    $this->Cell(80,5,'',1,0,'L');
    $this->Cell(16,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'OBSERVACIÓN',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,5,utf8_decode($reg[0]['observacionesimpresion']),1,'J');
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(94,5,'1. LA UNIÓN ESCAMOCOLUMNAR ES VISIBLE? '.$reg[0]['tunion'],1,0,'L');
	$this->Cell(96,5,'2. LA LESIÓN ES COMPLETAMENTE VISIBLE? '.$reg[0]['tlesion'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,5,'OTROS: '.utf8_decode($reg[0]['otros']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,5,'SITIO DE LA BIOPSIA: '.utf8_decode($reg[0]['biopsia']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Exocervix:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['exocervix']),1,0,'L');
    $this->CellFitSpace(80,5,'- Vagina:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['vagina']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Uniones escamoculumnar:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['escamoculumnar']),1,0,'L');
    $this->CellFitSpace(80,5,'- Endocervix:',1,0,'L');
    $this->Cell(16,5,utf8_decode($reg[0]['endocervix']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(78,5,'- Endometrio:',1,0,'L');
	$this->Cell(16,5,utf8_decode($reg[0]['endometrio']),1,0,'L');
    $this->Cell(80,5,'',0,0,'L');
    $this->Cell(16,5,'',0,0,'L');
    $this->Ln();
    

    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }

}
############################### FUNCION PARA MOSTRAR COLPOSCOPIAS ################################# 



############################### FUNCION PARA MOSTRAR ECOGRAFIAS ################################# 
function TablaEcografias()
  {
	$tra = new Login();
    $reg = $tra->EcografiaPorId();

	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE ECOGRAFÍA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
	$this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'PROCEDIMIENTO '.$reg[0]['procedimiento'],1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaecografia'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaecografia'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(80,5,'VINCULACIÓN: '.utf8_decode($reg[0]['vinculacion']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
	$this->CellFitSpace(60,5,'CIUDAD: '.utf8_decode($reg[0]['ciudad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.$reg[0]['parentescoacompana'],1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DESCRIPCIÓN DEL ESTUDIO',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,5,utf8_decode(strtoupper($reg[0]['observacionecografia'])),1,'J');
		
	$directory="fotos/".$reg[0]['codecografia'];
    if (is_dir($directory)) {



    $this->SetFont('Courier','B',9);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'IMAGENES DE ECOGRAFíAS',0,0,'C', false);
    $this->Ln();

    $dirint = dir($directory);
    while (($archivo = $dirint->read()) !== false)
    {

if (substr_count($archivo , ".gif")==1 || substr_count($archivo , ".jpg")==1 || substr_count($archivo , ".png")==1 ){
	
	$this->SetFont('Arial','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(35,35,$this->Image($directory."/".$archivo, $this->GetX()+10, $this->GetY()+1, 30), 0, 0, "" );

	   }
    }
     $dirint->close();
     } 
	
	
	$this->Ln();
	
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }

}
############################### FUNCION PARA MOSTRAR ECOGRAFIAS ################################# 


################################# FUNCION MEDICO GENERAL E GINECOLOGO ##############################








############################### FUNCION PARA MOSTRAR LABORATORIO ################################# 
function TablaLaboratorio()
  {
	$tra = new Login();
    $reg = $tra->LaboratorioPorId();

    $valor = new Login();
    $valor = $valor->ValorLaboratorioPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'NÚMERO DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',8); 
    $this->CellFitSpace(70,5,$reg[0]['cedpaciente'],0,0,'L');

	$this->SetFont('Courier','B',8); 
	$this->CellFitSpace(40,5,'TIPO DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',8); 
	$this->CellFitSpace(35,5,$reg[0]['idenpaciente'],0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'NOMBRES Y APELLIDOS: ',0,0,'L');
	$this->SetFont('Courier','',8);
    $this->CellFitSpace(70,5,utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente'].' '.$reg[0]['papepaciente'].' '.$reg[0]['sapepaciente']),0,0,'L');


	$this->SetFont('Courier','B',8);
	$this->CellFitSpace(40,5,'ESTADO CIVIL: ',0,0,'L');
	$this->SetFont('Courier','',8);
	$this->CellFitSpace(35,5,utf8_decode($reg[0]['estadopaciente']),0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'FECHA DE NACIMIENTO: ',0,0,'L');
    $this->SetFont('Courier','',8);  
    $this->CellFitSpace(70,5,date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),0,0,'L');


    $this->SetFont('Courier','B',8); 
    $this->CellFitSpace(40,5,'EDAD: ',0,0,'L');
    $this->SetFont('Courier','',8); 
    $this->CellFitSpace(35,5,edad($reg[0]['fnacpaciente']).' AÑOS',0,0,'L');
    $this->Ln();

    $this->SetFont('Courier','B',8);  
    $this->CellFitSpace(45,5,'GRUPO SANGUINEO: ',0,0,'L');
    $this->SetFont('Courier','',8);  
    $this->CellFitSpace(70,5,$reg[0]['gruposapaciente'],0,0,'L');

    $this->SetFont('Courier','B',8); 
    $this->CellFitSpace(40,5,'FECHA ELABORACIÓN: ',0,0,'L');
    $this->SetFont('Courier','',8); 
    $this->CellFitSpace(35,5,date("d-m-Y h:i:s", strtotime($reg[0]['fechalaboratorio'])),0,0,'L');
    $this->Ln();
	
    
	$this->SetFont('Courier','B',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(95,5,'HEMATOLOGÍA' ,1,0,'C');
	$this->Cell(101,5,'QUIMÍCA SANGUÍNEA' ,1,0,'C');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'EXÁMEN' ,1,0,'C');
	$this->Cell(31,5,'RESULTADO' ,1,0,'C');
	$this->Cell(31,5,'VALOR NORMAL',1,0,'C');
	$this->Cell(33,5,'EXÁMEN' ,1,0,'C');
	$this->Cell(31,5,'RESULTADO' ,1,0,'C');
	$this->Cell(37,5,'VALOR NORMAL',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'HEMATOCRITO' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['hematocrito'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['hematocritov'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'GLUCOSA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['glucosa'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['glucosav'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'HEMOGLOBINA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['hemoglobina'],1,0,'R');
	$this->Cell(16,5,'gr/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['hemoglobinav'],1,0,'R');
	$this->Cell(16,5,'gr/dl',1,0,'R');
	$this->Cell(33,5,'COLESTEROL TOTAL' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['colesteroltotal'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['colesteroltotalv'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'LEUCOCITOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['leucocitos'],1,0,'R');
	$this->Cell(16,5,'mm3',1,0,'R');
	$this->Cell(15,5,$valor[0]['leucocitosv'],1,0,'R');
	$this->Cell(16,5,'mm3',1,0,'R');
	$this->Cell(33,5,'COLESTEROL HDL' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['colesterolhdl'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['colesterolhdlv'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'NEUTROFILOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['neutrofilos'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['neutrofilosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'COLESTEROL LDL' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['colesterolhdl'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['colesterolhdlv'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'LINFOCITOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['linfocitos'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['linfocitosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'TRIGLICERIDOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['trigliceridos'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['trigliceridosv'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'EOSINOFILOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['eosinofilos'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['eosinofilosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'ACIDO ÚRICO' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['acidourico'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['acidouricov'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'MONOCITOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['monositos'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['monositosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'NITROGENO UREICO' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['nitrogenoureico'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['nitrogenoureicov'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'BASOFILOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['basofilos'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['basofilosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'CREATININA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['creatinina'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['creatininav'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'CAYADOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['cayados'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['cayadosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'PROTEINAS TOTALES' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['proteinastotales'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['proteinastotalesv'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'PLAQUETAS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['plaquetas'],1,0,'R');
	$this->Cell(16,5,'mm3',1,0,'R');
	$this->Cell(15,5,$valor[0]['plaquetasv'],1,0,'R');
	$this->Cell(16,5,'mm3',1,0,'R');
	$this->Cell(33,5,'ALBÚMINA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['albumina'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['albuminav'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'RETICULOCITOS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['reticulositos'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(15,5,$valor[0]['reticulositosv'],1,0,'R');
	$this->Cell(16,5,'%',1,0,'R');
	$this->Cell(33,5,'GLOBULINAS' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['globulina'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['globulinav'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'V.S.G' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['vsg'],1,0,'R');
	$this->Cell(16,5,'mm/hr',1,0,'R');
	$this->Cell(15,5,$valor[0]['vsgv'],1,0,'R');
	$this->Cell(16,5,'mm/hr',1,0,'R');
	$this->Cell(33,5,'BILIRRUBINA TOTAL' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['bilirrubinatotal'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['bilirrubinatotalv'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'PT' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['pt'],1,0,'R');
	$this->Cell(16,5,'seg. CD',1,0,'R');
	$this->Cell(15,5,$valor[0]['ptv'],1,0,'R');
	$this->Cell(16,5,'seg. CD',1,0,'R');
	$this->Cell(33,5,'BILIRRUBINA DIRECTA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['bilirrubinadirecta'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['bilirrubinadirectav'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'PTT' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['ptt'],1,0,'R');
	$this->Cell(16,5,'seg. CD',1,0,'R');
	$this->Cell(15,5,$valor[0]['pttv'],1,0,'R');
	$this->Cell(16,5,'seg. CD',1,0,'R');
	$this->Cell(33,5,'BILIRRUBINA INDIRECTA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['bilirrubinaindirecta'],1,0,'R');
	$this->Cell(16,5,'mg/dl',1,0,'R');
	$this->Cell(15,5,$valor[0]['bilirrubinaindirectav'],1,0,'R');
	$this->Cell(22,5,'mg/dl',1,0,'R');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(33,5,'HEMOCLASIFICACION' ,1,0,'L');
	$this->Cell(15,5,'GRUPO',1,0,'R');
	$this->Cell(16,5,$reg[0]['clasifgrupo'],1,0,'R');
	$this->Cell(15,5,'RH:',1,0,'R');
	$this->Cell(16,5,$reg[0]['clasifrh'],1,0,'R');
	$this->Cell(33,5,'FOSFATASA ALCALINA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['fosfatasaalcalina'],1,0,'R');
	$this->Cell(16,5,'UI/L',1,0,'R');
	$this->Cell(15,5,$valor[0]['fosfatasaalcalinav'],1,0,'R');
	$this->Cell(22,5,'UI/L',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,"OBSERVACIONES: ".utf8_decode($reg[0]['observacioneshematologia']),1,'J');
	$this->Cell(33,5,'TGO/AST' ,0,0,'L');
	$this->Cell(15,5,$reg[0]['tgo'],1,0,'R');
	$this->Cell(16,5,'UI/L',1,0,'R');
	$this->Cell(15,5,$valor[0]['tgov'],1,0,'R');
	$this->Cell(22,5,'UI/L',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,'',0,'J');
	$this->Cell(33,5,'TGP/ALT' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['tgp'],1,0,'R');
	$this->Cell(16,5,'UI/L',1,0,'R');
	$this->Cell(15,5,$valor[0]['tgpv'],1,0,'R');
	$this->Cell(22,5,'UI/L',1,0,'R');
    $this->Ln();
	
	
	$this->MultiCellText(95,5,'',0,'J');
	$this->Cell(33,5,'AMILASA' ,1,0,'L');
	$this->Cell(15,5,$reg[0]['amilasa'],1,0,'R');
	$this->Cell(16,5,'UI/L',1,0,'R');
	$this->Cell(15,5,$valor[0]['amilasav'],1,0,'R');
	$this->Cell(22,5,'UI/L',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,'',0,'J');
	$this->MultiCellText(101,5,"OBSERVACIONES: ".utf8_decode($reg[0]['observacionesquimica']),1,'J');
    $this->Ln();
	
	
	
	$this->Ln();
	$this->SetFont('Courier','B',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(95,5,'' ,0,0,'C');
	$this->Cell(101,5,'' ,0,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','B',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(95,5,'UROANÁLISIS' ,1,0,'C');
	$this->Cell(101,5,'INMUNOLOGÍA' ,1,0,'C');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(45,5,'EXÁMEN QUIMICO',1,0,'C');
	$this->Cell(40,5,'EXÁMEN MICROSCOPICO' ,1,0,'C');
	$this->Cell(10,5,'XC',1,0,'C');
	$this->Cell(33,5,'EXÁMEN' ,1,0,'C');
	$this->Cell(31,5,'RESULTADO' ,1,0,'C');
	$this->Cell(37,5,'VALOR NORMAL',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'COLOR',1,0,'L');
	$this->Cell(20,5,$reg[0]['colorquimico'],1,0,'R');
	$this->Cell(40,5,'CELULAS EPITELIALES BAJAS',1,0,'L');
	$this->Cell(10,5,$reg[0]['celulasepibajas'],1,0,'R');
	$this->Cell(33,5,'PRUEBA DE EMBARAZO',1,0,'L');
	$this->Cell(31,5,$reg[0]['pruebaembarazo'],1,0,'R');
	$this->Cell(37,5,'',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'ASPECTO',1,0,'L');
	$this->Cell(20,5,$reg[0]['aspectoquimico'],1,0,'R');
	$this->Cell(40,5,'CELULAS EPITELIALES ALTAS',1,0,'L');
	$this->Cell(10,5,$reg[0]['celulasepialtas'],1,0,'R');
	$this->Cell(33,5,'RPR- SISFILIS',1,0,'L');
	$this->Cell(31,5,$reg[0]['rprsisfilis'],1,0,'R');
	$this->Cell(37,5,'',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'PH',1,0,'L');
	$this->Cell(20,5,$reg[0]['phquimico'],1,0,'R');
	$this->Cell(20,5,'BACTERIAS',1,0,'L');
	$this->Cell(20,5,$reg[0]['bacteriasmicroscopico'],1,0,'R');
	$this->Cell(10,5,'',1,0,'R');
	$this->Cell(33,5,'RA TEST',1,0,'L');
	$this->Cell(31,5,$reg[0]['ratest'],1,0,'R');
	$this->Cell(37,5,'',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'DENSIDAD',1,0,'L');
	$this->Cell(20,5,$reg[0]['phquimico'],1,0,'R');
	$this->Cell(20,5,'LEUCOCITOS',1,0,'L');
	$this->Cell(20,5,$reg[0]['bacteriasmicroscopico'],1,0,'R');
	$this->Cell(10,5,'',1,0,'R');
	$this->Cell(33,5,'ASTOS',1,0,'L');
	$this->Cell(31,5,$reg[0]['astos'],1,0,'R');
	$this->Cell(37,5,'',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'PROTEINA',1,0,'L');
	$this->Cell(20,5,$reg[0]['proteinaquimico'],1,0,'R');
	$this->Cell(20,5,'HEMATIES',1,0,'L');
	$this->Cell(20,5,$reg[0]['hematiesmicroscopico'],1,0,'R');
	$this->Cell(10,5,'',1,0,'R');
	$this->MultiCellText(101,5,"OBSERVACIONES: ".utf8_decode($reg[0]['observacionesinmunologia']),1,'J');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'GLUCOSA',1,0,'L');
	$this->Cell(20,5,$reg[0]['glucosaquimico'],1,0,'R');
	$this->Cell(20,5,'CRISTALES',1,0,'L');
	$this->Cell(20,5,$reg[0]['cristalesmicroscopico'],1,0,'R');
	$this->Cell(10,5,'',1,0,'R');
	$this->MultiCellText(95,5,'',0,'J');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'CETONAS',1,0,'L');
	$this->Cell(20,5,$reg[0]['cetonaquimico'],1,0,'R');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(10,5,'',1,0,'R');
	$this->MultiCellText(95,5,'',0,'J');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'BILIRRUBINAS',1,0,'L');
	$this->Cell(20,5,$reg[0]['bilirrubinaquimico'],1,0,'R');
	$this->Cell(20,5,'CILINDROS',1,0,'L');
	$this->Cell(20,5,$reg[0]['cilindrosmicroscopico'],1,0,'R');
	$this->Cell(10,5,'',1,0,'L');
	$this->SetFont('Courier','B',7);
	$this->Cell(101,5,'COPROPARASITOLOGÍA',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'UROBILINOGENO',1,0,'L');
	$this->Cell(20,5,$reg[0]['urobilinogenoquimico'],1,0,'R');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(10,5,'',1,0,'R');
	$this->Cell(33,5,'',1,0,'L');
	$this->Cell(16,5,'',1,0,'R');
	$this->Cell(15,5,'QUISTE',1,0,'R');
	$this->Cell(37,5,'Blastocystis hominis',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'SANGRE',1,0,'L');
	$this->Cell(20,5,$reg[0]['sangrequimico'],1,0,'R');
	$this->Cell(20,5,'MOCO',1,0,'L');
	$this->Cell(20,5,$reg[0]['mocomicroscopico'],1,0,'R');
	$this->Cell(10,5,'',1,0,'R');
	$this->Cell(33,5,'COLOR',1,0,'L');
	$this->Cell(16,5,$reg[0]['colorparasitologia'],1,0,'R');
	$this->Cell(15,5,'QUISTE',1,0,'R');
	$this->Cell(37,5,'Endolimax nana',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'LEUCOCITOS',1,0,'L');
	$this->Cell(20,5,$reg[0]['leucocitosquimico'],1,0,'R');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(10,5,'',1,0,'R');
	$this->Cell(33,5,'CONSISTENCIA',1,0,'L');
	$this->Cell(16,5,$reg[0]['consistenciaparasitologia'],1,0,'R');
	$this->Cell(15,5,'QUISTE',1,0,'R');
	$this->Cell(37,5,'Entamoeba coli',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(25,5,'NITRITOS',1,0,'L');
	$this->Cell(20,5,$reg[0]['nitritosquimico'],1,0,'R');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(20,5,'',1,0,'L');
	$this->Cell(10,5,'',1,0,'R');
	$this->Cell(33,5,'PH',1,0,'L');
	$this->Cell(16,5,$reg[0]['phparasitologia'],1,0,'R');
	$this->Cell(15,5,'QUISTE',1,0,'R');
	$this->Cell(37,5,'Entamoeba hitolytica',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,"OBSERVACIONES: ".utf8_decode($reg[0]['observacionessanguinea']),1,'J');
	$this->Cell(33,5,'SANGRE OCULTA',1,0,'L');
	$this->Cell(16,5,$reg[0]['sangreocultaparasitologia'],1,0,'R');
	$this->Cell(15,5,'QUISTE',1,0,'R');
	$this->Cell(37,5,'Giardia lamblia',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,'',0,'J');
	$this->Cell(33,5,'AZUCARES REDUCTORES',1,0,'L');
	$this->Cell(16,5,$reg[0]['azucaresparasitologia'],1,0,'R');
	$this->Cell(15,5,'HUEVO',1,0,'R');
	$this->Cell(37,5,'Ascaris lumbricoides',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,'',0,'J'); 
	$this->Cell(33,5,'ALMIDONES SIN DIGERIR',1,0,'L');
	$this->Cell(16,5,$reg[0]['almidonesparasitologia'],1,0,'R');
	$this->Cell(15,5,'HUEVO',1,0,'R');
	$this->Cell(37,5,'Uncinaria',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','B',7); 
	$this->Cell(95,5,'FROTIS DE FLUJO VAGINAL',1,0,'C');
	$this->SetFont('Courier','',7); 
	$this->Cell(33,5,'HONGOS',1,0,'L');
	$this->Cell(16,5,$reg[0]['hongosparasitologia'],1,0,'R');
	$this->Cell(15,5,'HUEVO',1,0,'R');
	$this->Cell(37,5,'Tricocefalo',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7); 
	$this->Cell(43,5,'EXÁMEN FRESCO',1,0,'C');
	$this->Cell(52,5,'GRAM',1,0,'C'); 
	$this->Cell(33,5,'',1,0,'L');
	$this->Cell(16,5,'',1,0,'R');
	$this->Cell(15,5,'HUEVO',1,0,'R');
	$this->Cell(37,5,'Tenia sp',1,0,'R');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'PH',1,0,'L');
	$this->Cell(20,5,$reg[0]['phfresco'],1,0,'R');
	$this->Cell(38,5,'BACILOS GRAM POSITIVO',1,0,'L');
	$this->Cell(14,5,$reg[0]['basilosgranpositivo'],1,0,'R'); 
	$this->Cell(33,5,'Trichomonas hominis',1,0,'L');
	$this->Cell(16,5,$reg[0]['trichomonaparasitologia'],1,0,'R');
	$this->Cell(15,5,'HUEVO',1,0,'R');
	$this->Cell(37,5,'Hymenolepis nana',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'CELULAS GUIA',1,0,'L');
	$this->Cell(20,5,$reg[0]['celulasfresco'],1,0,'R');
	$this->Cell(38,5,'BACILOS GRAM NEGATIVO',1,0,'L');
	$this->Cell(14,5,$reg[0]['basilosgrannegativo'],1,0,'R'); 
	$this->Cell(33,5,'Iodamoeba butslii',1,0,'L');
	$this->Cell(16,5,$reg[0]['iodamoebaparasitologia'],1,0,'R');
	$this->Cell(15,5,'HUEVO',1,0,'R');
	$this->Cell(37,5,'Strongyloides',1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'TEST AMINAS',1,0,'L');
	$this->Cell(20,5,$reg[0]['testaminafresco'],1,0,'R');
	$this->Cell(38,5,'COCOBACILO GRAM VARIAB.',1,0,'L');
	$this->Cell(14,5,$reg[0]['cocobacilogran'],1,0,'R'); 
	$this->Cell(33,5,'OTROS',1,0,'L');
	$this->Cell(16,5,$reg[0]['otrosparasitologia'],1,0,'R');
	$this->Cell(15,5,'',1,0,'R');
	$this->Cell(37,5,'',1,0,'R');
    $this->Ln();
	
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'HONGOS',1,0,'L');
	$this->Cell(20,5,$reg[0]['hongosfresco'],1,0,'R');
	$this->Cell(38,5,'DIPLOCOCO GRAM NEGATIVO',1,0,'L');
	$this->Cell(14,5,$reg[0]['diplococogran'],1,0,'R'); 
	$this->SetFont('Courier','B',7);
	$this->Cell(101,5,'MICROBIOLOGÍA',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'TRICHOMONAS',1,0,'L');
	$this->Cell(20,5,$reg[0]['trichomonafresco'],1,0,'R');
	$this->Cell(38,5,'BLASTOCONIDIAS',1,0,'L');
	$this->Cell(14,5,$reg[0]['blastoconidiasgran'],1,0,'R'); 
	$this->Cell(33,5,'KOH',1,0,'L');
	$this->Cell(68,5,$reg[0]['kohmicro'],1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'LEUCOCITOS',1,0,'L');
	$this->Cell(20,5,$reg[0]['leucitofresco'],1,0,'R');
	$this->Cell(38,5,'PSEUDOMICELIO',1,0,'L');
	$this->Cell(14,5,$reg[0]['pseudomiceliogran'],1,0,'R'); 
	$this->Cell(33,5,'BACILOSOCOPIA',1,0,'L');
	$this->Cell(68,5,$reg[0]['baciloscopiamicro'],1,0,'R');
    $this->Ln();
	
	$this->SetFont('Courier','',7); 
	$this->Cell(23,5,'HEMATIES',1,0,'L');
	$this->Cell(20,5,$reg[0]['hematiesfresco'],1,0,'R');
	$this->Cell(38,5,'PMN',1,0,'L');
	$this->Cell(14,5,$reg[0]['pmngran'],1,0,'R'); 
	$this->Cell(33,5,'',1,0,'L');
	$this->Cell(68,5,'',1,0,'R');
    $this->Ln();
	
	$this->MultiCellText(95,5,"OBSERVACIONES: ".utf8_decode($reg[0]['observacionesfrotis']),1,'J');
	$this->Ln(5);
	
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }

}
############################### FUNCION PARA MOSTRAR LABORATORIO ################################# 




























############################### FUNCION PARA MOSTRAR LECTURA RX ################################# 
function TablaLecturasRx()
  {
	$tra = new Login();
    $reg = $tra->LecturaRxPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE LECTURA RX',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln(4);
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'Nº DE IDENTIFICACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,utf8_decode($reg[0]['cedpaciente']),0,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'NOMBRE DEL PACIENTE: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente'].' '.$reg[0]['papepaciente'].' '.$reg[0]['sapepaciente']),0,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'FECHA DE NACIMIENTO: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,$reg[0]['fnacpaciente'],0,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'EDAD: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,edad($reg[0]['fnacpaciente']).' AÑOS',0,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'ESTUDIO: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,utf8_decode($reg[0]['tipoestudiorx']),0,0,'L');

	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'FECHA DE ELABORACIÓN: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,date("d-m-Y h:i:s", strtotime($reg[0]['fecharx'])),0,0,'L');

    if($reg[0]['codsede']=="0") {

	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'NOMBRE DE SUCURSAL: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,utf8_decode($reg[0]['nombresucursal']),0,0,'L');
	
	} else {

	$this->Ln();
	$this->SetFont('Courier','B',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'NOMBRE DE SEDE: ',0,0,'L');
	$this->SetFont('Courier','',9);  
    $this->CellFitSpace(150,5,utf8_decode($reg[0]['nombresede']),0,0,'L');

	}

    $this->Ln(15);
	$this->SetFont('Courier','BI',14);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,utf8_decode($reg[0]['tipoestudiorx']),0,0,'L');
    $this->Ln(6);
	
	$this->SetFont('Courier','',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,5,$this->SetFont('Courier','',9).utf8_decode($reg[0]['diagnosticorx']),0,'J');
    $this->Ln(20);     
   
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
     
    $this->SetFont('Courier','BI',8);
    $this->Cell(0, 0,$this->Image($img, $this->GetX()+150, $this->GetY()-15, 35), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(300,0,'DR. '.utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
	$this->Cell(300,0,'MÉDICO RADIOLOGO','',1,'C');
    $this->Ln(3);
    $this->Cell(300,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');

    } else {

	
	$this->SetFont('Courier','BI',8);
    $this->Cell(0, 0,'', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(300,0,'DR. '.utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
	$this->Cell(300,0,'MÉDICO RADIOLOGO','',1,'C');
    $this->Ln(3);
    $this->Cell(300,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    }
}
############################### FUNCION PARA MOSTRAR LECTURA RX ################################# 



























############################### FUNCION PARA MOSTRAR TERAPIAS ################################# 
function TablaTerapias()
  {
	$tra = new Login();
    $reg = $tra->TerapiasPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA DE TERAPIAS',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}

	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'HOJA DE EVOLUCIÓN DE TERAPIAS',1,1,'C', True);

	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(50,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(60,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
	$this->CellFitSpace(50,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(50,5,'PERTENENCIA ÉTNICA: '.$reg[0]['enfoquepaciente'],1,0,'L');
    $this->CellFitSpace(140,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
   	$this->MultiCell(190,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($this->SetFont('Courier','',7).$reg[0]['direcpaciente']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DIAGNÓSTICO',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
   	$this->MultiCell(190,8,utf8_decode($this->SetFont('Courier','',8).$reg[0]['diagnosticoterapia']),1,'J');



	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es negro)
     $this->CellFitSpace(10,8,'Nº ',1,0,'C', True);
     $this->CellFitSpace(35,8,'FECHA /HORA',1,0,'C', True);
	$this->CellFitSpace(105,8,'ATENCION, ACTIVIDAD Y/O PROCEDIMIENTO',1,0,'C', True);
    $this->CellFitSpace(40,8,'FIRMA DEL PROFESIONAL',1,0,'C', True);
    $this->Ln();


    /* AQUI DECLARO LAS COLUMNAS */
	$this->SetWidths(array(10,35,105,40));

    $explode = explode(",,",$reg[0]['terapias']);
    $a=1;
    # Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
    for($cont=0; $cont<COUNT($explode); $cont++):
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idterapia,$tratamientoterapia,$fechacicloterapia) = explode("/",$explode[$cont]);

    $this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->Row(array($a++,
		date("d-m-Y h:i:s", strtotime($fechacicloterapia)),
		utf8_decode($tratamientoterapia),
		''));
    endfor;

    if (strip_tags(isset($reg[0]['observacionesterapia']))) {

    	$this->SetFont('Courier','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
   	$this->MultiCell(190,8,'OBSERVACIONES: '.utf8_decode($this->SetFont('Courier','',7).$reg[0]['observacionesterapia']),1,'J');

   }

	
    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }
}
############################### FUNCION PARA MOSTRAR TERAPIAS ################################# 






































############################### FUNCION PARA MOSTRAR ODONTOLOGIA ################################# 
function TablaOdontologia()
  {
	$tra = new Login();
    $reg = $tra->OdontologiaPorId();
	
	$logo = "./assets/images/logoclinica.png";
    $logo2 = "./assets/images/logoclinica.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HISTORIA ODONTOLÓGICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS DE IDENTIFICACIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechadentagrama'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechadentagrama'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'I. DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(50,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(40,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(100,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'II. ANTECEDENTES MÉDICOS',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,' ',1,0,'L');
	$this->CellFitSpace(15,5,'SI',1,0,'C');
	$this->CellFitSpace(15,5,'NO',1,0,'C');
	$this->CellFitSpace(20,5,'NO SABE',1,0,'C');
	$this->CellFitSpace(80,5,'CUALES: ',1,0,'L');
	$this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'TRATAMIENTO MÉDICO: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['tratamientomedico'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['tratamientomedico'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['tratamientomedico'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,$reg[0]['cualestratamiento'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'INGESTA DE MEDICAMENTOS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['ingestamedicamentos'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['ingestamedicamentos'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['ingestamedicamentos'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,$reg[0]['cualesingesta'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'REACCIONES ALÉRGICAS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['alergias'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['alergias'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['alergias'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,$reg[0]['cualesalergias'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'HEMORRAGIAS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['hemorragias'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['hemorragias'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['hemorragias'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,$reg[0]['cualeshemorragias'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'SINOSITIS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['sinositis'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['sinositis'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['sinositis'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'ENFERMEDAD RESPIRATORIA: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['enfermedadrespiratoria'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['enfermedadrespiratoria'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['enfermedadrespiratoria'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'DIABETES: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['diabetes'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['diabetes'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['diabetes'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'CARDIOPATIA: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['cardiopatia'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['cardiopatia'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['cardiopatia'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'HEPATITIS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['hepatitis'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['hepatitis'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['hepatitis'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'HIPERTENSIÓN ARTERIAL: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['hepertension'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['hepertension'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['hepertension'] == 'NO SABE' ? "X" : " "),1,0,'C');
	$this->Cell(80,5,'',1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'III. HÁBITOS DE SALUD ORAL',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,' ',1,0,'L');
	$this->Cell(15,5,'SI',1,0,'C');
	$this->Cell(15,5,'NO',1,0,'C');
	$this->Cell(100,5,'',1,0,'C');
	$this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'ASISTENCIA A ODONTOLOGÍA: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['asistenciaodontologica'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['asistenciaodontologica'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(40,5,'FECHA ÚLTIMA VISITA: ',1,0,'C');
	$this->Cell(60,5,$reg[0]['ultimavisitaodontologia'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'CEPILLADO: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['cepillado'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['cepillado'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(40,5,'CUANTAS VECES AL DÍA: ',1,0,'C');
	$this->Cell(60,5,$reg[0]['cuantoscepillados'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'SEDA DENTAL: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['sedadental'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['sedadental'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(40,5,'CUANTAS VECES AL DÍA: ',1,0,'C');
	$this->Cell(60,5,$reg[0]['cuantascedasdetal'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'CREMA DENTAL: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['cremadental'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['cremadental'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(40,5,'',1,0,'C');
	$this->Cell(60,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'ENJUAGUE: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['enjuague'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['enjuague'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(40,5,'OTROS: ',1,0,'C');
	$this->Cell(60,5,$reg[0]['otros'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'IV. ESTADO PERIODONTAL',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,' ',1,0,'L');
	$this->Cell(15,5,'SI',1,0,'C');
	$this->Cell(15,5,'NO',1,0,'C');
	$this->Cell(100,5,'',1,0,'C');
	$this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'SANGRAN ENCIAS AL CEPILLAR: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['sangranencias'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['sangranencias'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(100,5,'',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'TOMA AGUA DE LA LLAVE: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['tomaaguallave'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['tomaaguallave'] == 'NO' ? "X" : " "),1,0,'C');
    $this->Cell(100,5,'',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'APLICAN ELEMENTOS QUE CONTIENEN FLUOR: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['elementosconfluor'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['elementosconfluor'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(100,5,'',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'APARATOS DE ORTODONCIA: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['aparatosortodoncia'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['aparatosortodoncia'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(100,5,'',1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'PRÓTESIS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['protesis'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['protesis'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(30,5,'FIJA: ',1,0,'C');
	$this->Cell(20,5,$reg[0]['protesisfija'],1,0,'L');
	$this->Cell(30,5,'REMOVIBLE: ',1,0,'L');
	$this->Cell(20,5,$reg[0]['protesisremovible'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'ARTICULACIÓN TEMPORO - MANDIBULAR',1,0,'L');
	$this->Cell(15,5,'NORMAL',1,0,'C');
	$this->Cell(15,5,'ANORMAL',1,0,'C');
	$this->Cell(60,5,'',1,0,'L');
	$this->Cell(20,5,'NORMAL',1,0,'C');
	$this->Cell(20,5,'ANORMAL',1,0,'C');
	$this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'LABIOS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['labios'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['labios'] == 'ANORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'SENOS MAXILARES: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['senosmaxilares'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['senosmaxilares'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'LENGUA: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['lengua'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['lengua'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Cell(60,5,'MUSCULOS MASTICADORES: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['musculosmasticadores'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['musculosmasticadores'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'PALADAR: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['paladar'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['paladar'] == 'ANORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'SISTEMA NERVIOSO: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['sistemanervioso'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['sistemanervioso'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'PISO DE LA BOCA: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['pisoboca'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['pisoboca'] == 'ANORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'SISTEMA VASCULAR: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['sistemavascular'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['sistemavascular'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'CARRILLOS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['carrillos'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['carrillos'] == 'ANORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'LINFÁTICO REGIONAL: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['sistemalinfatico'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['sistemalinfatico'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'GLÁNDULAS SALIVALES: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['glandulasalivales'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['glandulasalivales'] == 'ANORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'FUNCIÓN OCLUSAL: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['funcionoclusal'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['funcionoclusal'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'MAXILAR: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['maxilar'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['maxilar'] == 'ANORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'MUSCULOS MASTICADORES: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['musculosmasticadores'] == 'NORMAL' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['musculosmasticadores'] == 'ANORMAL' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,8,"OBSERVACIONES: ".utf8_decode($reg[0]['observacionperiodontal']),1,'J');
	
	/*$img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(4); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(4); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }*/


    $this->AddPage();
    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HISTORIA ODONTOLÓGICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'V. EXAMÉN DENTAL',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,' ',1,0,'L');
	$this->Cell(15,5,'SI',1,0,'C');
	$this->Cell(15,5,'NO',1,0,'C');
	$this->Cell(60,5,' ',1,0,'L');
	$this->Cell(20,5,'SI',1,0,'C');
	$this->Cell(20,5,'NO',1,0,'C');
	$this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'SUPERNUMERARIOS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['supernumerarios'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['supernumerarios'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'PLACA BLANDA: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['placablanda'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['placablanda'] == 'NO' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'ADRACIÓN: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['adracion'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['adracion'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'PLACA CALIFICADA: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['placacalificada'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['placacalificada'] == 'NO' ? "X" : " "),1,0,'C');
    $this->Ln();

	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'MANCHAS: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['manchas'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['manchas'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(60,5,'OTROS: ',1,0,'L');
	$this->Cell(20,5,$variable = ( $reg[0]['otrosdental'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(20,5,$variable = ( $reg[0]['otrosdental'] == 'NO' ? "X" : " "),1,0,'C');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(60,5,'PATOLOGÍA PULPAR: ',1,0,'L');
	$this->Cell(15,5,$variable = ( $reg[0]['patologiapulpar'] == 'SI' ? "X" : " "),1,0,'C');
	$this->Cell(15,5,$variable = ( $reg[0]['patologiapulpar'] == 'NO' ? "X" : " "),1,0,'C');
	$this->Cell(100,5,'',1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,8,"OBSERVACIONES: ".utf8_decode($reg[0]['observacionexamendental']),1,'J');
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'VI. ODONTOGRAMA',1,0,'C', True);
    $this->Ln();
	
	$odontograma = "./fotos/".$reg[0]['codpaciente'].".png";
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,70,$this->Image($odontograma, $this->GetX()+30, $this->GetY()+1, 125), 1, 0, "PNG" );
	$this->Ln();
	
	$this->SetFont('Courier','B',7);  
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->CellFitSpace(20,4,'N°',1,0,'C', True);
	$this->CellFitSpace(40,4,'DIENTE',1,0,'C', True);
    $this->CellFitSpace(50,4,'CARA DIENTE',1,0,'C', True);
	$this->CellFitSpace(80,4,'REFERENCIAS',1,0,'C', True);
    $this->Ln();
	
	 $explode = explode("__",$reg[0]['estados']);
     $listaSimple = array_values(array_unique($explode));
     # Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
     for($cont=0; $cont<COUNT($listaSimple); $cont++):
     # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
     list($diente,$caradiente,$referencias) = explode("_",$listaSimple[$cont]);
	 
	 if($caradiente=="C1") { $cara = "VESTIBULAR"; } elseif($caradiente=="C2") { $cara = "DISTAL"; } elseif($caradiente=="C3") { $cara = "PALATINO"; } elseif($caradiente=="C4") { $cara = "MESIAL"; } elseif($caradiente=="C5") { $cara = "OCLUSAL"; }
	 
	$this->SetFont('Courier','',6);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(20,3,$cont+1,1,0,'C');
	$this->CellFitSpace(40,3,utf8_decode($diente),1,0,'C');
    $this->CellFitSpace(50,3,utf8_decode($cara),1,0,'C');
	$this->CellFitSpace(80,3,utf8_decode(substr($referencias, 2)),1,0,'C');
    $this->Ln();
	  endfor;
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'VII. DIAGNÓSTICO Y PRONÓSTICO',1,0,'C', True);
    $this->Ln();
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['presuntivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($presuntivo,$idciepresuntivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,6,"PRESUNTIVO: " .$a++. ". ".$presuntivo,1,'J');
	
	endfor;
	
	
	$explode = explode(",,",utf8_decode(strtoupper($reg[0]['definitivo'])));
    $a=1;
    for($cont=0; $cont<COUNT($explode); $cont++):
	list($definitivo,$idciedefinitivo) = explode("/",$explode[$cont]);
	
    $this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,6,"DEFINITIVO: " .$a++. ". ".$definitivo,1,'J');
	
	endfor;

	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,6,"PRONÓSTICO: ".utf8_decode($reg[0]['pronostico']),1,'J');
	
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'VIII. PLAN DE TRATAMIENTO',1,0,'C', True);
    $this->Ln();
	
	//$news = explode(",", $odont[0]['plantratamiento']);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(190,8,strtoupper($reg[0]['plantratamiento']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(110,10,'',0,0,'I');
    $this->Cell(80,10,'FIRMA DEL PACIENTE: ',0,0,'I');
    $this->Ln();
	


    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(6); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }
}
############################### FUNCION PARA MOSTRAR ODONTOLOGIA ################################# 


############################### FUNCION PARA MOSTRAR HOJA ODONTOLOGIA ################################# 
function TablaHojaOdontologia()
  {
	$tra = new Login();
    $reg = $tra->OdontologiaPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

    $this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE HOJA EVOLUTIVA ODONTOLÓGICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS DE IDENTIFICACIÓN',1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechadentagrama'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechadentagrama'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'I. DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$reg[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$reg[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($reg[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($reg[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$reg[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.date("d-m-Y", strtotime($reg[0]['fnacpaciente'])),1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($reg[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($reg[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(50,5,'PERTENENCIA ÉTNICA: '.utf8_decode($reg[0]['enfoquepaciente']),1,0,'L');
	$this->CellFitSpace(40,5,'TELEFONO: '.$reg[0]['tlfpaciente'],1,0,'L');
    $this->CellFitSpace(100,5,'DIRECCIÓN DOMICILIARIA: '.utf8_decode($reg[0]['direcpaciente']),1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'EPS: '.utf8_decode($reg[0]['nomcontabilidad']),1,0,'L');
    $this->CellFitSpace(60,5,'OCUPACIÓN: '.utf8_decode($reg[0]['ocupacionpaciente']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(130,5,'NOMBRE DEL ACOMPAÑANTE: '.utf8_decode($reg[0]['nomacompana']),1,0,'L');
	$this->CellFitSpace(60,5,'TELEFONO: '.$reg[0]['tlfacompana'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(60,5,'PARENTESCO: '.$reg[0]['parentescoacompana'],1,0,'L');
	$this->CellFitSpace(130,5,'DIRECCIÓN: '.utf8_decode($reg[0]['direcacompana']),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'ATENCION, ACTIVIDAD Y/O PROCEDIMIENTO:',1,0,'C', True);
    $this->Ln();

	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
	$this->MultiCell(190,8,utf8_decode($reg[0]['plantratamiento']),1,'J');
	
	$this->SetFont('Courier','B',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->Cell(110,10,'',0,0,'I');
    $this->Cell(80,10,'FIRMA DEL PACIENTE: ',0,0,'I');
    $this->Ln();


    $img = "./firmasdigitales/".$reg[0]['cedmedico'].".jpg";
	
	if (file_exists($img)) {
    
	$this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-6, 30), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);

    } else {

    $this->Ln(12); 
    $this->SetFont('Courier','B',8);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($reg[0]['nommedico']. " ".$reg[0]['apemedico']. " - ".$reg[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($reg[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
    }
}
############################### FUNCION PARA MOSTRAR HOJA ODONTOLOGIA ################################# 













################################# FUNCION CONSENTIMIENTO INFORMADO ##################################

############################# FUNCION CONSENTIMIENTO INFORMADO #############################
 function TablaConsentimientoInformado()
   {
	
	$tra = new Login();
    $reg = $tra->ConsentimientoInformadoPorId();
	
	$logo = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";

	$this->Ln(2);
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,22,$this->Image($logo, $this->GetX()+18, $this->GetY()+2, 30),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+2, $this->GetY()+1, 15),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,utf8_decode($reg[0]['procedimiento']),5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-23,'SUCURSAL '.utf8_decode($reg[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$reg[0]['nitsucursal'].' TLF: '.$reg[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($reg[0]['codsede']=="0") {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($reg[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($reg[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TLF SEDE: '.utf8_decode($reg[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Courier','B',8);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($reg[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Courier','B',9);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,utf8_decode($reg[0]['procedimiento']),1,1,'C', True);
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("d-m-Y", strtotime($reg[0]['fechaconsentimiento'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($reg[0]['fechaconsentimiento'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',8);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->MultiCell(190,5,'SERVICIO EN EL QUE SE REALIZA EL PROCEDIMIENTO: '.utf8_decode($reg[0]['procedimiento']),1,'J');
    $this->Ln();

	
	
	$this->newFlowingBlock( 190, 5, 0, 'J' );
    $this->SetFont('Courier','',9); 
	$this->WriteFlowingBlock( 'YO: ' );
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock( utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente'].' '.$reg[0]['papepaciente'].' '.$reg[0]['sapepaciente']) );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock( $variable = ( edad($reg[0]['fnacpaciente']) >= '18' ? " MAYOR DE EDAD " : " MENOR DE EDAD "). ', IDENTIFICADO CON ' );
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock($reg[0]['idenpaciente'].' N° '.$reg[0]['cedpaciente']);
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock( ' DE ' );
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock( utf8_decode($reg[0]['ciudad']) );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock(' Y COMO PACIENTE O COMO RESPONSABLE DEL PACIENTE AUTORIZO AL DR.(A) ');
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock( utf8_decode($reg[0]['nommedico'].' '.$reg[0]['apemedico']) );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock(' CON PROFESIÓN O ESPECIALIDAD ');
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock( utf8_decode($reg[0]['especmedico']) );
		
	if($reg[0]['especialidad']=="MEDICO GENERAL") {
	
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock(', PARA LA APERTURA DE HISTORIAS MÉDICAS EN EL (LA) ');	
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock(utf8_decode($reg[0]['nombresucursal']));
    $this->finishFlowingBlock();
	$this->Ln(5);
	
	 } else { 
		
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock(', PARA LA REALIZACIÓN DEL PROCEDIMIENTO ');	
	$this->SetFont( 'Courier', 'B', 9 );
	$this->WriteFlowingBlock(utf8_decode($reg[0]['procedimientotextual']));
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock(', TENIENDO EN CUENTA QUE HE SIDO INFORMADO CLARAMENTE SOBRE LOS RIESGOS QUE SE PUEDEN PRESENTAR, SIENDO ESTOS:');
	$this->finishFlowingBlock();
	$this->Ln(5);
	$this->SetFont( 'Courier', 'B', 9 );
	$this->MultiCell(190,5,utf8_decode($reg[0]['observacionprocedimiento']),0,'J'); 
	$this->Ln(5);
		
	}
		
		
	$this->newFlowingBlock( 190, 5, 0, 'J' );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock('COMPRENDO Y ACEPTO QUE DURANTE EL PROCEDIMIENTO PUEDEN APARECER CIRCUNSTANCIAS IMPREVISIBLES O INESPERADAS, QUE PUEDAN REQUERIR UNA EXTENSIÓN DEL PROCEDIMIENTO ORIGINAL O LA REALIZACIÓN DE OTRO PROCEDIMIENTO NO MENCIONADO ARRIBA.');	
	$this->finishFlowingBlock();
	$this->Ln(5);
	$this->newFlowingBlock( 190, 5, 0, 'J' );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock('AL FIRMAR ESTE DOCUMENTO RECONOZCO QUE LOS HE LEIDO O QUE ME HAN SIDO LEIDO Y EXPLICADO Y QUE COMPRENDO PERFECTAMENTE SU CONTENIDO.');	
	$this->finishFlowingBlock();
	$this->Ln(5);
	$this->newFlowingBlock( 190, 5, 0, 'J' );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock('SE ME HAN DADO AMPLIAS OPORTUNIDADES DE FORMULAR PREGUNTAS Y QUE TODAS LAS PREGUNTAS QUE HE FORMULADO HAN SIDO RESPONDIDAS O EXPLICADAS EN FORMA SATISFACTORIA.');	
	$this->finishFlowingBlock();
	$this->Ln(5);
	$this->newFlowingBlock( 188, 5, 0, 'J' );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock('ACEPTO QUE LA MEDICINA NO ES UNA CIENCIA EXACTA Y QUE NO SE ME HAN GARANTIZADO LOS RESULTADOS QUE SE ESPERAN DE LA INTERVENCIÓN QUIRÚRGICA O PROCEDIMIENTOS DIAGNÓSTICOS, TERAPÉUTICOS U ODONTOLÓGICOS, EN EL SENTIDO DE QUE LA PRÁCTICA DE LA INTERVENCIÓN O PROCEDIMIENTOS QUE REQUIERO COMPROMETE UNA ACTIVIDAD DE MEDIO, PERO NO DE RESULTADOS.');	
	$this->finishFlowingBlock();
	$this->Ln(5);
	$this->newFlowingBlock( 190, 5, 0, 'J' );
	$this->SetFont( 'Courier', '', 9 );
	$this->WriteFlowingBlock('COMPRENDIENDO ESTAS LIMITACIONES, DOY MI CONSENTIMIENTO PARA LA REALIZACIÓN DEL PROCEDIMIENTO Y FIRMO A CONTINUACIÓN:');	
	$this->finishFlowingBlock();
	$this->Ln(20);
	
	
	$this->SetFont('Courier','',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FIRMA DEL PACIENTE: ___________________________',0,0,'L');
	$this->Cell(30,5,'',0,0,'L');
    $this->CellFitSpace(80,5,'FIRMA DEL PROFESIONAL: ___________________________',0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,utf8_decode($reg[0]['pnompaciente'].' '.$reg[0]['snompaciente'].' '.$reg[0]['papepaciente'].' '.$reg[0]['sapepaciente']),0,0,'L');
	$this->Cell(30,5,'',0,0,'L');
    $this->CellFitSpace(80,5,utf8_decode($reg[0]['nommedico'].' '.$reg[0]['apemedico']),0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,utf8_decode($reg[0]['idenpaciente']).' N° '.$reg[0]['cedpaciente'],0,0,'L');
	$this->Cell(30,5,'',0,0,'L');
    $this->CellFitSpace(80,5,utf8_decode('TP. '.$reg[0]['tpmedico']),0,0,'L');
    $this->Ln();
	
	
	if ($reg[0]['doctestigo']!='') { 
	
	$this->Ln(5);
	$this->SetFont('Courier','',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(190,5,'FIRMA DEL TESTIGO O RESPONSABLE: ___________________________',0,0,'L');
    $this->Ln();
	
	$this->SetFont('Courier','',9);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(100,5,utf8_decode($reg[0]['nombretestigo']).'. CC N°'.$reg[0]['doctestigo'],0,0,'L');
    $this->Ln();
	
	}
	
	if ($reg[0]['nofirmapaciente']!='') { 

	$this->Ln();
	$this->SetFont( 'Courier','B', 9 );
	$this->Cell(190,5,utf8_decode('EL PACIENTE NO PUEDE FIRMAR POR:'),0,0);	
	$this->Ln(5);
	$this->SetFont( 'Courier','', 9 );
	$this->MultiCell(190,5,utf8_decode($reg[0]['nofirmapaciente']),0,'J');
		
          }
}
############################# FUNCION CONSENTIMIENTO INFORMADO #############################

################################# FUNCION CONSENTIMIENTO INFORMADO ##################################

































######################### AQUI COMIENZA CODIGO PARA AJUSTAR TEXTO #########################

########### FUNCION PARA CODIGO DE BARRA CON CODE39 ############
function Code39($x, $y, $code, $ext = true, $cks = false, $w = 0.4, $h = 20, $wide = true) {

    //Display code
    $this->SetFont('Arial', '', 10);
    $this->Text($x, $y+$h+4, $code);

    if($ext) {
        //Extended encoding
        $code = $this->encode_code39_ext($code);
    }
    else {
        //Convert to upper case
        $code = strtoupper($code);
        //Check validity
        if(!preg_match('|^[0-9A-Z. $/+%-]*$|', $code))
            $this->Error('Invalid barcode value: '.$code);
    }

    //Compute checksum
    if ($cks)
        $code .= $this->checksum_code39($code);

    //Add start and stop characters
    $code = '*'.$code.'*';

    //Conversion tables
    $narrow_encoding = array (
        '0' => '101001101101', '1' => '110100101011', '2' => '101100101011', 
        '3' => '110110010101', '4' => '101001101011', '5' => '110100110101', 
        '6' => '101100110101', '7' => '101001011011', '8' => '110100101101', 
        '9' => '101100101101', 'A' => '110101001011', 'B' => '101101001011', 
        'C' => '110110100101', 'D' => '101011001011', 'E' => '110101100101', 
        'F' => '101101100101', 'G' => '101010011011', 'H' => '110101001101', 
        'I' => '101101001101', 'J' => '101011001101', 'K' => '110101010011', 
        'L' => '101101010011', 'M' => '110110101001', 'N' => '101011010011', 
        'O' => '110101101001', 'P' => '101101101001', 'Q' => '101010110011', 
        'R' => '110101011001', 'S' => '101101011001', 'T' => '101011011001', 
        'U' => '110010101011', 'V' => '100110101011', 'W' => '110011010101', 
        'X' => '100101101011', 'Y' => '110010110101', 'Z' => '100110110101', 
        '-' => '100101011011', '.' => '110010101101', ' ' => '100110101101', 
        '*' => '100101101101', '$' => '100100100101', '/' => '100100101001', 
        '+' => '100101001001', '%' => '101001001001' );

    $wide_encoding = array (
        '0' => '101000111011101', '1' => '111010001010111', '2' => '101110001010111', 
        '3' => '111011100010101', '4' => '101000111010111', '5' => '111010001110101', 
        '6' => '101110001110101', '7' => '101000101110111', '8' => '111010001011101', 
        '9' => '101110001011101', 'A' => '111010100010111', 'B' => '101110100010111', 
        'C' => '111011101000101', 'D' => '101011100010111', 'E' => '111010111000101', 
        'F' => '101110111000101', 'G' => '101010001110111', 'H' => '111010100011101', 
        'I' => '101110100011101', 'J' => '101011100011101', 'K' => '111010101000111', 
        'L' => '101110101000111', 'M' => '111011101010001', 'N' => '101011101000111', 
        'O' => '111010111010001', 'P' => '101110111010001', 'Q' => '101010111000111', 
        'R' => '111010101110001', 'S' => '101110101110001', 'T' => '101011101110001', 
        'U' => '111000101010111', 'V' => '100011101010111', 'W' => '111000111010101', 
        'X' => '100010111010111', 'Y' => '111000101110101', 'Z' => '100011101110101', 
        '-' => '100010101110111', '.' => '111000101011101', ' ' => '100011101011101', 
        '*' => '100010111011101', '$' => '100010001000101', '/' => '100010001010001', 
        '+' => '100010100010001', '%' => '101000100010001');

    $encoding = $wide ? $wide_encoding : $narrow_encoding;

    //Inter-character spacing
    $gap = ($w > 0.29) ? '00' : '0';

    //Convert to bars
    $encode = '';
    for ($i = 0; $i< strlen($code); $i++)
        $encode .= $encoding[$code[$i]].$gap;

    //Draw bars
    $this->draw_code39($encode, $x, $y, $w, $h);
}

function checksum_code39($code) {

    //Compute the modulo 43 checksum

    $chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 
                            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 
                            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 
                            'W', 'X', 'Y', 'Z', '-', '.', ' ', '$', '/', '+', '%');
    $sum = 0;
    for ($i=0 ; $i<strlen($code); $i++) {
        $a = array_keys($chars, $code[$i]);
        $sum += $a[0];
    }
    $r = $sum % 43;
    return $chars[$r];
}

function encode_code39_ext($code) {

    //Encode characters in extended mode

    $encode = array(
        chr(0) => '%U', chr(1) => '$A', chr(2) => '$B', chr(3) => '$C', 
        chr(4) => '$D', chr(5) => '$E', chr(6) => '$F', chr(7) => '$G', 
        chr(8) => '$H', chr(9) => '$I', chr(10) => '$J', chr(11) => '£K', 
        chr(12) => '$L', chr(13) => '$M', chr(14) => '$N', chr(15) => '$O', 
        chr(16) => '$P', chr(17) => '$Q', chr(18) => '$R', chr(19) => '$S', 
        chr(20) => '$T', chr(21) => '$U', chr(22) => '$V', chr(23) => '$W', 
        chr(24) => '$X', chr(25) => '$Y', chr(26) => '$Z', chr(27) => '%A', 
        chr(28) => '%B', chr(29) => '%C', chr(30) => '%D', chr(31) => '%E', 
        chr(32) => ' ', chr(33) => '/A', chr(34) => '/B', chr(35) => '/C', 
        chr(36) => '/D', chr(37) => '/E', chr(38) => '/F', chr(39) => '/G', 
        chr(40) => '/H', chr(41) => '/I', chr(42) => '/J', chr(43) => '/K', 
        chr(44) => '/L', chr(45) => '-', chr(46) => '.', chr(47) => '/O', 
        chr(48) => '0', chr(49) => '1', chr(50) => '2', chr(51) => '3', 
        chr(52) => '4', chr(53) => '5', chr(54) => '6', chr(55) => '7', 
        chr(56) => '8', chr(57) => '9', chr(58) => '/Z', chr(59) => '%F', 
        chr(60) => '%G', chr(61) => '%H', chr(62) => '%I', chr(63) => '%J', 
        chr(64) => '%V', chr(65) => 'A', chr(66) => 'B', chr(67) => 'C', 
        chr(68) => 'D', chr(69) => 'E', chr(70) => 'F', chr(71) => 'G', 
        chr(72) => 'H', chr(73) => 'I', chr(74) => 'J', chr(75) => 'K', 
        chr(76) => 'L', chr(77) => 'M', chr(78) => 'N', chr(79) => 'O', 
        chr(80) => 'P', chr(81) => 'Q', chr(82) => 'R', chr(83) => 'S', 
        chr(84) => 'T', chr(85) => 'U', chr(86) => 'V', chr(87) => 'W', 
        chr(88) => 'X', chr(89) => 'Y', chr(90) => 'Z', chr(91) => '%K', 
        chr(92) => '%L', chr(93) => '%M', chr(94) => '%N', chr(95) => '%O', 
        chr(96) => '%W', chr(97) => '+A', chr(98) => '+B', chr(99) => '+C', 
        chr(100) => '+D', chr(101) => '+E', chr(102) => '+F', chr(103) => '+G', 
        chr(104) => '+H', chr(105) => '+I', chr(106) => '+J', chr(107) => '+K', 
        chr(108) => '+L', chr(109) => '+M', chr(110) => '+N', chr(111) => '+O', 
        chr(112) => '+P', chr(113) => '+Q', chr(114) => '+R', chr(115) => '+S', 
        chr(116) => '+T', chr(117) => '+U', chr(118) => '+V', chr(119) => '+W', 
        chr(120) => '+X', chr(121) => '+Y', chr(122) => '+Z', chr(123) => '%P', 
        chr(124) => '%Q', chr(125) => '%R', chr(126) => '%S', chr(127) => '%T');

    $code_ext = '';
    for ($i = 0 ; $i<strlen($code); $i++) {
        if (ord($code[$i]) > 127)
            $this->Error('Invalid character: '.$code[$i]);
        $code_ext .= $encode[$code[$i]];
    }
    return $code_ext;
}

function draw_code39($code, $x, $y, $w, $h) {

    //Draw bars

    for($i=0; $i<strlen($code); $i++) {
        if($code[$i] == '1')
            $this->Rect($x+$i*$w, $y, $w, $h, 'F');
    }
}


########### FUNCION PARA CODIGO DE BARRA CON EAN13 ############
function EAN13($x, $y, $barcode, $h=16, $w=.35)
{
 $this->Barcode($x,$y,$barcode,$h,$w,13);
}
function UPC_A($x, $y, $barcode, $h=16, $w=.35)
{
 $this->Barcode($x,$y,$barcode,$h,$w,12);
}
function GetCheckDigit($barcode)
{
 //Compute the check digit
 $sum=0;
 for($i=1;$i<=11;$i+=2)
 $sum+=3*$barcode[$i];
 for($i=0;$i<=10;$i+=2)
 $sum+=$barcode[$i];
 $r=$sum%10;
 if($r>0)
 $r=10-$r;
 return $r;
}
function TestCheckDigit($barcode)
{
 //Test validity of check digit
 $sum=0;
 for($i=1;$i<=11;$i+=2)
 $sum+=3*$barcode[$i];
 for($i=0;$i<=10;$i+=2)
 $sum+=$barcode[$i];
 return ($sum+$barcode[12])%10==0;
}
function Barcode($x, $y, $barcode, $h, $w, $len)
{
 //Padding
 $barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
 if($len==12)
 $barcode='0'.$barcode;
 //Add or control the check digit
 if(strlen($barcode)==12)
 $barcode.=$this->GetCheckDigit($barcode);
 elseif(!$this->TestCheckDigit($barcode))
 $this->Error('Incorrect check digit');
 //Convert digits to bars
 $codes=array(
 'A'=>array(
 '0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
 '5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
 'B'=>array(
 '0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
 '5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
 'C'=>array(
 '0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
 '5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
 );
 $parities=array(
 '0'=>array('A','A','A','A','A','A'),
 '1'=>array('A','A','B','A','B','B'),
 '2'=>array('A','A','B','B','A','B'),
 '3'=>array('A','A','B','B','B','A'),
 '4'=>array('A','B','A','A','B','B'),
 '5'=>array('A','B','B','A','A','B'),
 '6'=>array('A','B','B','B','A','A'),
 '7'=>array('A','B','A','B','A','B'),
 '8'=>array('A','B','A','B','B','A'),
 '9'=>array('A','B','B','A','B','A')
 );
 $code='101';
 $p=$parities[$barcode[0]];
 for($i=1;$i<=6;$i++)
 $code.=$codes[$p[$i-1]][$barcode[$i]];
 $code.='01010';
 for($i=7;$i<=12;$i++)
 $code.=$codes['C'][$barcode[$i]];
 $code.='101';
 //Draw bars
 for($i=0;$i<strlen($code);$i++)
 {
 if($code[$i]=='1')
 $this->Rect($x+$i*$w,$y,$w,$h,'F');
 }
 //Print text uder barcode
 $this->SetFont('Arial','',12);
 $this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));
}



########### FUNCION PARA CREAR MULTICELL SIN SALTO DE LINEA ############
function SetWidths($w)
{
//Set the array of column widths
$this->widths=$w;
}

function SetAligns($a)
{
//Set the array of column alignments
$this->aligns=$a;
}

function Row($data)
{
//Calculate the height of the row
$nb=0;
for($i=0;$i<count($data);$i++)
$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
$h=5*$nb;
//Issue a page break first if needed
$this->CheckPageBreak($h);
//Draw the cells of the row
for($i=0;$i<count($data);$i++)
{
$w=$this->widths[$i];
$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
//Save the current position
$x=$this->GetX();
$y=$this->GetY();
//Draw the border
$this->Rect($x,$y,$w,$h);
//Print the text
$this->MultiCell($w,5,$data[$i],0,$a);
//Put the position to the right of the cell
$this->SetXY($x+$w,$y);
}
//Go to the next line
$this->Ln($h);
}

function CheckPageBreak($h)
{
//If the height h would cause an overflow, add a new page immediately
if($this->GetY()+$h>$this->PageBreakTrigger)
$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
//Computes the number of lines a MultiCell of width w will take
$cw=&$this->CurrentFont['cw'];
if($w==0)
$w=$this->w-$this->rMargin-$this->x;
$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
$s=str_replace("\r",'',$txt);
$nb=strlen($s);
if($nb>0 and $s[$nb-1]=="\n")
$nb--;
$sep=-1;
$i=0;
$j=0;
$l=0;
$nl=1;
while($i<$nb)
{
$c=$s[$i];
if($c=="\n")
{
$i++;
$sep=-1;
$j=$i;
$l=0;
$nl++;
continue;
}
if($c==' ')
$sep=$i;
$l+=$cw[$c];
if($l>$wmax)
{
if($sep==-1)
{
if($i==$j)
$i++;
}
else
$i=$sep+1;
$sep=-1;
$j=$i;
$l=0;
$nl++;
}
else
$i++;
}
return $nl;
}
########### FUNCION PARA CREAR MULTICELL SIN SALTO DE LINEA ############

function GetMultiCellHeight($w, $h, $txt, $border=null, $align='J') {
	// Calculate MultiCell with automatic or explicit line breaks height
	// $border is un-used, but I kept it in the parameters to keep the call
	//   to this function consistent with MultiCell()
	$cw = &$this->CurrentFont['cw'];
	if($w==0)
		$w = $this->w-$this->rMargin-$this->x;
	$wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
	$s = str_replace("\r",'',$txt);
	$nb = strlen($s);
	if($nb>0 && $s[$nb-1]=="\n")
		$nb--;
	$sep = -1;
	$i = 0;
	$j = 0;
	$l = 0;
	$ns = 0;
	$height = 0;
	while($i<$nb)
	{
		// Get next character
		$c = $s[$i];
		if($c=="\n")
		{
			// Explicit line break
			if($this->ws>0)
			{
				$this->ws = 0;
				$this->_out('0 Tw');
			}
			//Increase Height
			$height += $h;
			$i++;
			$sep = -1;
			$j = $i;
			$l = 0;
			$ns = 0;
			continue;
		}
		if($c==' ')
		{
			$sep = $i;
			$ls = $l;
			$ns++;
		}
		$l += $cw[$c];
		if($l>$wmax)
		{
			// Automatic line break
			if($sep==-1)
			{
				if($i==$j)
					$i++;
				if($this->ws>0)
				{
					$this->ws = 0;
					$this->_out('0 Tw');
				}
				//Increase Height
				$height += $h;
			}
			else
			{
				if($align=='J')
				{
					$this->ws = ($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
					$this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
				}
				//Increase Height
				$height += $h;
				$i = $sep+1;
			}
			$sep = -1;
			$j = $i;
			$l = 0;
			$ns = 0;
		}
		else
			$i++;
	}
	// Last chunk
	if($this->ws>0)
	{
		$this->ws = 0;
		$this->_out('0 Tw');
	}
	//Increase Height
	$height += $h;

	return $height;
}

function MultiAlignCell($w,$h,$text,$border=0,$ln=0,$align='L',$fill=false)
{
    // Store reset values for (x,y) positions
    $x = $this->GetX() + $w;
    $y = $this->GetY();

    // Make a call to FPDF's MultiCell
    $this->MultiCell($w,$h,$text,$border,$align,$fill);

    // Reset the line position to the right, like in Cell
    if( $ln==0 )
    {
        $this->SetXY($x,$y);
    }
}


function MultiCellText($w, $h, $txt, $border=0, $ln=0, $align='J', $fill=false)
{
    // Custom Tomaz Ahlin
    if($ln == 0) {
        $current_y = $this->GetY();
        $current_x = $this->GetX();
    }

    // Output text with automatic or explicit line breaks
    $cw = &$this->CurrentFont['cw'];
    if($w==0)
        $w = $this->w-$this->rMargin-$this->x;
    $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
    $s = str_replace("\r",'',$txt);
    $nb = strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $b = 0;
    if($border)
    {
        if($border==1)
        {
            $border = 'LTRB';
            $b = 'LRT';
            $b2 = 'LR';
        }
        else
        {
            $b2 = '';
            if(strpos($border,'L')!==false)
                $b2 .= 'L';
            if(strpos($border,'R')!==false)
                $b2 .= 'R';
            $b = (strpos($border,'T')!==false) ? $b2.'T' : $b2;
        }
    }
    $sep = -1;
    $i = 0;
    $j = 0;
    $l = 0;
    $ns = 0;
    $nl = 1;
    while($i<$nb)
    {
        // Get next character
        $c = $s[$i];
        if($c=="\n")
        {
            // Explicit line break
            if($this->ws>0)
            {
                $this->ws = 0;
                $this->_out('0 Tw');
            }
            $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            $i++;
            $sep = -1;
            $j = $i;
            $l = 0;
            $ns = 0;
            $nl++;
            if($border && $nl==2)
                $b = $b2;
            continue;
        }
        if($c==' ')
        {
            $sep = $i;
            $ls = $l;
            $ns++;
        }
        $l += $cw[$c];
        if($l>$wmax)
        {
            // Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws = 0;
                    $this->_out('0 Tw');
                }
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            }
            else
            {
                if($align=='J')
                {
                    $this->ws = ($ns>1) ?     ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                }
                $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                $i = $sep+1;
            }
            $sep = -1;
            $j = $i;
            $l = 0;
            $ns = 0;
            $nl++;
            if($border && $nl==2)
                $b = $b2;
        }
        else
            $i++;
    }
    // Last chunk
    if($this->ws>0)
    {
        $this->ws = 0;
        $this->_out('0 Tw');
    }
    if($border && strpos($border,'B')!==false)
        $b .= 'B';
    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    $this->x = $this->lMargin;

    // Custom Tomaz Ahlin
    if($ln == 0) {
        $this->SetXY($current_x + $w, $current_y);
    }
}


function RoundedRect($x, $y, $w, $h, $r, $style = '')
	{
		$k = $this->k;
		$hp = $this->h;
		if($style=='F')
			$op='f';
		elseif($style=='FD' || $style=='DF')
			$op='B';
		else
			$op='S';
		$MyArc = 4/3 * (sqrt(2) - 1);
		$this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));
		$xc = $x+$w-$r ;
		$yc = $y+$r;
		$this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));

		$this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
		$xc = $x+$w-$r ;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
		$this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
		$xc = $x+$r ;
		$yc = $y+$h-$r;
		$this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
		$this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
		$xc = $x+$r ;
		$yc = $y+$r;
		$this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
		$this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
		$this->_out($op);
	}

	function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
	{
		$h = $this->h;
		$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
			$x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
	}


    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)

    {

        //Get string width

        $str_width=$this->GetStringWidth($txt);


        //Calculate ratio to fit cell

        if($w==0)

            $w = $this->w-$this->rMargin-$this->x;

        $ratio = ($w-$this->cMargin*2)/$str_width;


        $fit = ($ratio < 1 || ($ratio > 1 && $force));

        if ($fit)

        {

            if ($scale)

            {

                //Calculate horizontal scaling

                $horiz_scale=$ratio*100.0;

                //Set horizontal scaling

                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));

            }

            else

            {

                //Calculate character spacing in points

                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;

                //Set character spacing

                $this->_out(sprintf('BT %.2F Tc ET',$char_space));

            }

            //Override user alignment (since text will fill up cell)

            $align='';

        }


        //Pass on to Cell method

        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);


        //Reset character spacing/horizontal scaling

        if ($fit)

            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');

    }


    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')

    {

        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);

    }


    //Patch to also work with CJK double-byte text

    function MBGetStringLength($s)

    {

        if($this->CurrentFont['type']=='Type0')

        {

            $len = 0;

            $nbbytes = strlen($s);

            for ($i = 0; $i < $nbbytes; $i++)

            {

                if (ord($s[$i])<128)

                    $len++;

                else

                {

                    $len++;

                    $i++;

                }

            }

            return $len;

        }

        else

            return strlen($s);

    }

########################## FIN DEL CODIGO PARA AJUSTAR TEXTO EN CELDAS ###############################

function saveFont()
	{

		$saved = array();

		$saved[ 'family' ] = $this->FontFamily;
		$saved[ 'style' ] = $this->FontStyle;
		$saved[ 'sizePt' ] = $this->FontSizePt;
		$saved[ 'size' ] = $this->FontSize;
		$saved[ 'curr' ] =& $this->CurrentFont;

		return $saved;

	}

	function restoreFont( $saved )
	{

		$this->FontFamily = $saved[ 'family' ];
		$this->FontStyle = $saved[ 'style' ];
		$this->FontSizePt = $saved[ 'sizePt' ];
		$this->FontSize = $saved[ 'size' ];
		$this->CurrentFont =& $saved[ 'curr' ];

		if( $this->page > 0)
			$this->_out( sprintf( 'BT /F%d %.2F Tf ET', $this->CurrentFont[ 'i' ], $this->FontSizePt ) );

	}

	function newFlowingBlock( $w, $h, $b = 0, $a = 'J', $f = 0 )
	{

		// cell width in points
		$this->flowingBlockAttr[ 'width' ] = $w * $this->k;

		// line height in user units
		$this->flowingBlockAttr[ 'height' ] = $h;

		$this->flowingBlockAttr[ 'lineCount' ] = 0;

		$this->flowingBlockAttr[ 'border' ] = $b;
		$this->flowingBlockAttr[ 'align' ] = $a;
		$this->flowingBlockAttr[ 'fill' ] = $f;

		$this->flowingBlockAttr[ 'font' ] = array();
		$this->flowingBlockAttr[ 'content' ] = array();
		$this->flowingBlockAttr[ 'contentWidth' ] = 0;

	}

	function finishFlowingBlock()
	{

		$maxWidth =& $this->flowingBlockAttr[ 'width' ];

		$lineHeight =& $this->flowingBlockAttr[ 'height' ];

		$border =& $this->flowingBlockAttr[ 'border' ];
		$align =& $this->flowingBlockAttr[ 'align' ];
		$fill =& $this->flowingBlockAttr[ 'fill' ];

		$content =& $this->flowingBlockAttr[ 'content' ];
		$font =& $this->flowingBlockAttr[ 'font' ];

		// set normal spacing
		$this->_out( sprintf( '%.3F Tw', 0 ) );

		// print out each chunk

		// the amount of space taken up so far in user units
		$usedWidth = 0;

		foreach ( $content as $k => $chunk )
		{

			$b = '';

			if ( is_int( strpos( $border, 'B' ) ) )
				$b .= 'B';

			if ( $k == 0 && is_int( strpos( $border, 'L' ) ) )
				$b .= 'L';

			if ( $k == count( $content ) - 1 && is_int( strpos( $border, 'R' ) ) )
				$b .= 'R';

			$this->restoreFont( $font[ $k ] );

			// if it's the last chunk of this line, move to the next line after
			if ( $k == count( $content ) - 1 )
				$this->Cell( ( $maxWidth / $this->k ) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 1, $align, $fill );
			else
				$this->Cell( $this->GetStringWidth( $chunk ), $lineHeight, $chunk, $b, 0, $align, $fill );

			$usedWidth += $this->GetStringWidth( $chunk );

		}

	}

	function WriteFlowingBlock( $s )
	{

		// width of all the content so far in points
		$contentWidth =& $this->flowingBlockAttr[ 'contentWidth' ];

		// cell width in points
		$maxWidth =& $this->flowingBlockAttr[ 'width' ];

		$lineCount =& $this->flowingBlockAttr[ 'lineCount' ];

		// line height in user units
		$lineHeight =& $this->flowingBlockAttr[ 'height' ];

		$border =& $this->flowingBlockAttr[ 'border' ];
		$align =& $this->flowingBlockAttr[ 'align' ];
		$fill =& $this->flowingBlockAttr[ 'fill' ];

		$content =& $this->flowingBlockAttr[ 'content' ];
		$font =& $this->flowingBlockAttr[ 'font' ];

		$font[] = $this->saveFont();
		$content[] = '';

		$currContent =& $content[ count( $content ) - 1 ];

		// where the line should be cutoff if it is to be justified
		$cutoffWidth = $contentWidth;

		// for every character in the string
		for ( $i = 0; $i < strlen( $s ); $i++ )
		{

			// extract the current character
			$c = $s[ $i ];

			// get the width of the character in points
			$cw = $this->CurrentFont[ 'cw' ][ $c ] * ( $this->FontSizePt / 1000 );

			if ( $c == ' ' )
			{

				$currContent .= ' ';
				$cutoffWidth = $contentWidth;

				$contentWidth += $cw;

				continue;

			}

			// try adding another char
			if ( $contentWidth + $cw > $maxWidth )
			{

				// won't fit, output what we have
				$lineCount++;

				// contains any content that didn't make it into this print
				$savedContent = '';
				$savedFont = array();

				// first, cut off and save any partial words at the end of the string
				$words = explode( ' ', $currContent );

				// if it looks like we didn't finish any words for this chunk
				if ( count( $words ) == 1 )
				{

					// save and crop off the content currently on the stack
					$savedContent = array_pop( $content );
					$savedFont = array_pop( $font );

					// trim any trailing spaces off the last bit of content
					$currContent =& $content[ count( $content ) - 1 ];

					$currContent = rtrim( $currContent );

				}

				// otherwise, we need to find which bit to cut off
				else
				{

					$lastContent = '';

					for ( $w = 0; $w < count( $words ) - 1; $w++)
						$lastContent .= "{$words[ $w ]} ";

					$savedContent = $words[ count( $words ) - 1 ];
					$savedFont = $this->saveFont();

					// replace the current content with the cropped version
					$currContent = rtrim( $lastContent );

				}

				// update $contentWidth and $cutoffWidth since they changed with cropping
				$contentWidth = 0;

				foreach ( $content as $k => $chunk )
				{

					$this->restoreFont( $font[ $k ] );

					$contentWidth += $this->GetStringWidth( $chunk ) * $this->k;

				}

				$cutoffWidth = $contentWidth;

				// if it's justified, we need to find the char spacing
				if( $align == 'J' )
				{

					// count how many spaces there are in the entire content string
					$numSpaces = 0;

					foreach ( $content as $chunk )
						$numSpaces += substr_count( $chunk, ' ' );

					// if there's more than one space, find word spacing in points
					if ( $numSpaces > 0 )
						$this->ws = ( $maxWidth - $cutoffWidth ) / $numSpaces;
					else
						$this->ws = 0;

					$this->_out( sprintf( '%.3F Tw', $this->ws ) );

				}

				// otherwise, we want normal spacing
				else
					$this->_out( sprintf( '%.3F Tw', 0 ) );

				// print out each chunk
				$usedWidth = 0;

				foreach ( $content as $k => $chunk )
				{

					$this->restoreFont( $font[ $k ] );

					$stringWidth = $this->GetStringWidth( $chunk ) + ( $this->ws * substr_count( $chunk, ' ' ) / $this->k );

					// determine which borders should be used
					$b = '';

					if ( $lineCount == 1 && is_int( strpos( $border, 'T' ) ) )
						$b .= 'T';

					if ( $k == 0 && is_int( strpos( $border, 'L' ) ) )
						$b .= 'L';

					if ( $k == count( $content ) - 1 && is_int( strpos( $border, 'R' ) ) )
						$b .= 'R';

					// if it's the last chunk of this line, move to the next line after
					if ( $k == count( $content ) - 1 )
						$this->Cell( ( $maxWidth / $this->k ) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 1, $align, $fill );
					else
					{

						$this->Cell( $stringWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 0, $align, $fill );
						$this->x -= 2 * $this->cMargin;

					}

					$usedWidth += $stringWidth;

				}

				// move on to the next line, reset variables, tack on saved content and current char
				$this->restoreFont( $savedFont );

				$font = array( $savedFont );
				$content = array( $savedContent . $s[ $i ] );

				$currContent =& $content[ 0 ];

				$contentWidth = $this->GetStringWidth( $currContent ) * $this->k;
				$cutoffWidth = $contentWidth;

			}

			// another character will fit, so add it on
			else
			{

				$contentWidth += $cw;
				$currContent .= $s[ $i ];

			}

		}

	}
	
	########### FUNCION PARA CODIGO DE BARRA CON CODABAR ############
	function Codabar($xpos, $ypos, $code, $start='A', $end='A', $basewidth=0.12, $height=10) {
	$barChar = array (
		'0' => array (6.5, 4.4, 6.5, 3.4, 6.5, 7.3, 2.9),
		'1' => array (6.5, 4.4, 6.5, 8.4, 4.9, 4.3, 6.5),
		'2' => array (6.5, 4.0, 6.5, 9.4, 6.5, 3.0, 8.6),
		'3' => array (17.9, 24.3, 6.5, 6.4, 6.5, 3.4, 6.5),
		'4' => array (6.5, 2.4, 8.9, 6.4, 6.5, 4.3, 6.5),
		'5' => array (5.9,	2.4, 6.5, 6.4, 6.5, 4.3, 6.5),
		'6' => array (6.5, 8.3, 6.5, 6.4, 6.5, 6.4, 7.9),
		'7' => array (6.5, 8.3, 6.5, 2.4, 7.9, 6.4, 6.5),
		'8' => array (6.5, 8.3, 5.9, 10.4, 6.5, 6.4, 6.5),
		'9' => array (7.6, 5.0, 6.5, 8.4, 6.5, 3.0, 6.5),
		'$' => array (6.5, 5.0, 18.6, 24.4, 6.5, 10.0, 6.5),
		'-' => array (6.5, 5.0, 6.5, 4.4, 8.6, 10.0, 6.5),
		':' => array (16.7, 9.3, 6.5, 9.3, 16.7, 9.3, 14.7),
		'/' => array (14.7, 9.3, 16.7, 9.3, 6.5, 9.3, 16.7),
		'.' => array (13.6, 10.1, 14.9, 10.1, 17.2, 10.1, 6.5),
		'+' => array (6.5, 10.1, 17.2, 10.1, 14.9, 10.1, 13.6),
		'A' => array (6.5, 8.0, 19.6, 19.4, 6.5, 16.1, 6.5),
		'T' => array (6.5, 8.0, 19.6, 19.4, 6.5, 16.1, 6.5),
		'B' => array (6.5, 16.1, 6.5, 19.4, 6.5, 8.0, 19.6),
		'N' => array (6.5, 16.1, 6.5, 19.4, 6.5, 8.0, 19.6),
		'C' => array (6.5, 8.0, 6.5, 19.4, 6.5, 16.1, 19.6),
		'*' => array (6.5, 8.0, 6.5, 19.4, 6.5, 16.1, 19.6),
		'D' => array (6.5, 8.0, 6.5, 19.4, 19.6, 16.1, 6.5),
		'E' => array (6.5, 8.0, 6.5, 19.4, 19.6, 16.1, 6.5),
	);
	$this->SetFont('Arial','',8.5);
	$this->SetTextColor(3, 3, 3);  // Establece el color del texto (en este caso es blanco 259)
	$this->Text($xpos, $ypos + $height + 2, $code);
	$this->SetFillColor(0);
	$code = strtoupper($start.$code.$end);
	for($i=0; $i<strlen($code); $i++){
		$char = $code[$i];
		if(!isset($barChar[$char])){
			$this->Error('Invalid character in barcode: '.$char);
		}
		$seq = $barChar[$char];
		for($bar=0; $bar<7; $bar++){
			$lineWidth = $basewidth*$seq[$bar]/4;
			if($bar % 2 == 0){
				$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
			}
			$xpos += $lineWidth;
		}
		$xpos += $basewidth*10.4/6.5;
	}
}

   function TextWithDirection($x, $y, $txt, $direction='R')
{
    if ($direction=='R')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', 1, 0, 0, 1, $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
    elseif ($direction=='L')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', -1, 0, 0, -1, $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
    elseif ($direction=='U')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', 0, 1, -1, 0, $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
    elseif ($direction=='D')
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', 0, -1, 1, 0, $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
    else
        $s=sprintf('BT %.2F %.2F Td (%s) Tj ET', $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}

function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
{
    $font_angle+=90+$txt_angle;
    $txt_angle*=M_PI/180;
    $font_angle*=M_PI/180;

    $txt_dx=cos($txt_angle);
    $txt_dy=sin($txt_angle);
    $font_dx=cos($font_angle);
    $font_dy=sin($font_angle);

    $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET', $txt_dx, $txt_dy, $font_dx, $font_dy, $x*$this->k, ($this->h-$y)*$this->k, $this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}
 // FIN Class PDF
}
?>