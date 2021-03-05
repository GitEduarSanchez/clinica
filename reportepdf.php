<?php
include_once('fpdf/pdf.php');

require_once("class/class.php");

ob_start();

$casos = array (

                  'SUCURSALES' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarSucursales',

                                    'output' => array('Listado de Sucursales.pdf', 'I')

                                  ),

                  'SEDES' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarSedes',

                                    'output' => array('Listado de Sedes.pdf', 'I')

                                  ),

                  'EPS' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarEps',

                                    'output' => array('Listado de EPS.pdf', 'I')

                                  ),

                  'USUARIOS' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarUsuarios',

                                    'output' => array('Listado de Usuarios.pdf', 'I')

                                  ),

                  'LOGS' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarLogs',

                                    'output' => array('Listado Logs de Acceso.pdf', 'I')

                                  ),

                  'MEDICOS' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarMedicos',

                                    'output' => array('Listado de Médicos.pdf', 'I')

                                  ),

                  'PACIENTES' => array(

                                    'medidas' => array('L', 'mm', 'LEGAL'),

                                    'func' => 'TablaListarPacientes',

                                    'output' => array('Listado de Pacientes.pdf', 'I')

                                  ),

            'CITASCANCELADA' => array(

                                    'medidas' => array('L','mm','LEGAL'),

                                    'func' => 'TablaCitaMedicaCancelada',

                                    'output' => array('Citas Medicas Canceladas.pdf', 'I')

                                  ),
        
              'CITASXFECHAS' => array(

                                    'medidas' => array('L','mm','LEGAL'),

                                    'func' => 'TablaCitasMedicasFechas',

                                    'output' => array('Reporte de Citas por Fechas.pdf', 'I')

                                  ),
        
              'CITASXMEDICOS' => array(

                                    'medidas' => array('L','mm','LEGAL'),

                                    'func' => 'TablaCitasMedicasMedicos',

                                    'output' => array('Reporte de Citas por Médicos.pdf', 'I')

                                  ),

                  'APERTURAS' => array(

                                    'medidas' => array('P', 'mm', 'A4'),

                                    'func' => 'TablaAperturas',

                                    'output' => array('Aperturas de Historias.pdf', 'I')

                                  ),
        
        'HOJAEVOLUTIVA' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaEvolutivas',

                                    'output' => array('Hoja Evolutiva.pdf', 'I')

                                  ),
        
           'REMISIONES' => array(
                                    
                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaRemisiones',

                                    'output' => array('Remision.pdf', 'I')

                                  ),
        
        'FORMULASMEDICAS' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaFormulasMedicas',

                                    'output' => array('Formula Medica.pdf', 'I')

                                  ),
        
        'ORDENESMEDICAS' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaOrdenesMedicas',

                                    'output' => array('Orden Medica.pdf', 'I')

                                  ),
        
        'FORMULASTERAPIAS' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaFormulasTerapias',

                                    'output' => array('Formula de Terapias.pdf', 'I')

                                  ),
        
        'SOLICITUDEXAMEN' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaExamenes',

                                    'output' => array('Solicitud de Examen de Laboratorio.pdf', 'I')

                                  ),
        
        'CRIOCAUTERIZACION' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaCriocauterizacion',

                                    'output' => array('Criocauterizacion.pdf', 'I')

                                  ),
        
        'COLPOSCOPIAS' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaColposcopias',

                                    'output' => array('Colposcopias.pdf', 'I')

                                  ),
        
        'ECOGRAFIAS' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaEcografias',

                                    'output' => array('Ecografia.pdf', 'I')

                                  ),

                  'LABORATORIO' => array(

                                    'medidas' => array('P','mm','LEGAL'),

                                    'func' => 'TablaLaboratorio',

                                    'output' => array('Resultado de Laboratorio.pdf', 'I')

                                  ),
        
        'LECTURARX' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaLecturasRx',

                                    'output' => array('Lecturas Rx.pdf', 'I')

                                  ),
        
        'TERAPIAS' => array(

                                    'medidas' => array('P','mm','LETTER'),

                                    'func' => 'TablaTerapias',

                                    'output' => array('Terapias.pdf', 'I')

                                  ),

                  'ODONTOLOGIA' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaOdontologia',

                                    'output' => array('Historia Clinica Odontologica.pdf', 'I')

                                  ),
        
        'HOJAODONTOLOGIA' => array(

                                    'medidas' => array('P','mm','A4'),

                                    'func' => 'TablaHojaOdontologia',

                                    'output' => array('Hoja Evolutiva Odontologica.pdf', 'I')

                                  ),


        'CONSENTIMIENTOINFORMADO' => array(

                                    'medidas' => array('P','mm','LETTER'),

                                    'func' => 'TablaConsentimientoInformado',

                                    'output' => array('Consentimiento Informado.pdf', 'I')

                                  ),

        

                );

 
$tipo = base64_decode($_GET['tipo']);
$caso_data = $casos[$tipo];
$pdf = new PDF($caso_data['medidas'][0], $caso_data['medidas'][1], $caso_data['medidas'][2]);
$pdf->AddPage();
$pdf->SetAuthor("Ing. Eduar Sanchez ");
$pdf->SetCreator("FPDF Y PHP");
$pdf->{$caso_data['func']}();
$pdf->Output($caso_data['output'][0], $caso_data['output'][1]);
ob_end_flush();
?>