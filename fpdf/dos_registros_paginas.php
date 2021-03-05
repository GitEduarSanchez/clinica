<?php

############################################# FIN DE FUNCIONES PARA MOSTRAR REPORTES DE FORMULAS MEDICAS DEL PACIENTE ##########################################	
function TablaFormulas()  {

	$codsucursal = $_GET["codsucursal"];
	$codsede = $_GET["codsede"];

	$logo1 = "./assets/images/logop.png";
    $logo2 = "./assets/images/rx.png";
	
	$tro = new Login();
    $rem = $tro->FormulasPorId();
	
	$tra = new Login();
    $su = $tra->SucursalPorId();
	
	$tre = new Login();
    $se = $tre->SedesPorId();
	
	$tru = new Login();
	$for = $tru->FormulasModalPorId();

    $a = 1;
	for($i = 0, $s = sizeof($for); $i < $s; $i++) {

	$this->Ln(2);
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	//$this->Cell( 50, 15,$this->Image($logo1, $this->GetX()+50, $this->GetY()-5, 25),20 ,15, 40 , 0 , "PNG" );
	$this->Cell(45,22,$this->Image($logo1, $this->GetX()+10, $this->GetY()+2, 38),5,0,'L');
	$this->Cell(100,5,'SISTEMA DE GESTIÓN DE CALIDAD',5,0,'C');
	$this->Cell(45,22,$this->Image($logo2, $this->GetX()+10, $this->GetY()+1, 16),5,0,'L');
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-31,'FORMATO DE FÓRMULA MÉDICA',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-24,'SUCURSAL '.utf8_decode($su[0]['nombresucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-16,'NIT: '.$su[0]['nitsucursal'].' TLF: '.$su[0]['telefonosucursal'].'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	if($codsede=="0") {
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-8,utf8_decode($su[0]['direccionsucursal']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	} else {
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-9,'SEDE '.utf8_decode($se[0]['nombresede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-10,'TELEFONO SEDE: '.utf8_decode($se[0]['telefonosede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	$this->Ln(4);
	
	$this->Ln();
	$this->SetFont('Arial','B',7);
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(45,0,'',5,0,'L');
	$this->Cell(100,-11,utf8_decode($se[0]['direccionsede']).'',5,0,'C');
	$this->Cell(45,0,'',5,0,'L');
	
	}
	
    $this->Ln();
	$this->SetFont('Arial','B',8);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,1,'C', True);
	
	$this->SetFont('Arial','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'FECHA DE ELABORACIÓN: '.date("Y-m-d", strtotime($rem[0]['fechaformula'])),1,0,'L');
	$this->CellFitSpace(95,5,'HORA DE ELABORACIÓN: '.date("h:i:s", strtotime($rem[0]['fechaformula'])),1,0,'L');
    $this->Ln();
	
	$this->SetFont('Arial','B',8);

	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'DATOS PERSONALES',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Arial','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(95,5,'NÚMERO DE IDENTIFICACIÓN: '.$rem[0]['cedpaciente'],1,0,'L');
	$this->CellFitSpace(95,5,'TIPO DE IDENTIFICACIÓN: '.$rem[0]['idenpaciente'],1,0,'L');
    $this->Ln();
	
	
	$this->SetFont('Arial','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(45,5,'1. APELLIDO: '.utf8_decode($rem[0]['papepaciente']),1,0,'L');
	$this->CellFitSpace(45,5,'2. APELLIDO: '.utf8_decode($rem[0]['sapepaciente']),1,0,'L');
    $this->CellFitSpace(70,5,'NOMBRES: '.utf8_decode($rem[0]['pnompaciente'].' '.$rem[0]['snompaciente']),1,0,'L');
    $this->CellFitSpace(30,5,'SEXO: '.$rem[0]['sexopaciente'],1,0,'L');
    $this->Ln();
	
	$this->SetFont('Arial','',7);  
	$this->SetTextColor(3,3,3);  // Establece el color del texto (en este caso es negro)
    $this->CellFitSpace(80,5,'FECHA DE NACIMIENTO: '.$rem[0]['fnacpaciente'],1,0,'L');
	$this->CellFitSpace(30,5,'EDAD: '.edad($rem[0]['fnacpaciente']).' AÑOS',1,0,'L');
    $this->CellFitSpace(80,5,'ESTADO CIVIL: '.utf8_decode($rem[0]['estadopaciente']),1,0,'L');
    $this->Ln();
	
	$this->Ln();
	$this->SetFont('Arial','B',8);
	$this->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
    $this->SetFillColor(5, 130, 275); // establece el color del fondo de la celda (en este caso es AZUL
	$this->Cell(190,6,'FÓRMULA MÉDICA',1,0,'C', True);
    $this->Ln();
	
	$this->SetFont('Arial','',7);
	$this->SetTextColor(3,3,3);
	$this->MultiCell(190,5,$this->SetFont('ARIAL','',8).$a++.". "."DX: ".strtoupper(utf8_decode($for[$i]['codcie'].": ".$for[$i]['nombrecie']))." \n FÓRMULA: ".$for[$i]['formulamedica'],1,'J');
	
	########################## AQUI MUESTRO LA IMAGEN DE FIRMA DEL ESPECIALISTA #############################
	$img = "./firmasdigitales/".$rem[0]['cedmedico'].".jpg";
	
	  if (file_exists($img)) {
    
	$this->Ln(8); 
    $this->SetFont('Arial','B',7);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: '.$this->Image($img, $this->GetX()+50, $this->GetY()-12, 35), 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($rem[0]['nommedico']. " ".$rem[0]['apemedico']. " - ".$rem[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($rem[0]['tpmedico']),'',1,'C');
    $this->Ln(3);
                            } else {
    $this->Ln(8); 
    $this->SetFont('Arial','B',7);
    $this->Cell( 0, 0,'FIRMA DEL PROFESIONAL: ', 0, 0, "JPG" );
    $this->Ln(3);
    $this->Cell(140,0,utf8_decode($rem[0]['nommedico']. " ".$rem[0]['apemedico']. " - ".$rem[0]['especmedico']),'',1,'C');
    $this->Ln(3);
    $this->Cell(140,0,'T.P. '.utf8_decode($rem[0]['tpmedico']),'',1,'C');
    $this->Ln(5);
                           } ### FIN DE IF DE IMG
						   
	$this->SetFont('Arial','B',8);
    $this->Cell(190,0,'- - - - - - - - - - -  - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -','',1,'C');
    $this->Ln(4);   				   

		if($i % 2 == 1 && $s > 2) {
			$this->AddPage();
		                          } ##fin de if

	                                               } ##fin de for

}
############################################# FIN DE FUNCION PARA MOSTRAR REPORTES DE FORMULAS MEDICAS DEL PACIENTE ##########################################	
?>