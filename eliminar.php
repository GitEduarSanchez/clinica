<?php
require_once("class/class.php");
$tra = new Login();
$tipo = base64_decode($_GET['tipo']);
switch($tipo)
	{
case 'USUARIOS':
$tra->EliminarUsuarios();
exit;
break;

case 'SUCURSALES':
$tra->EliminarSucursal();
exit;
break;

case 'SEDES':
$tra->EliminarSedes();
exit;
break;

case 'EPS':
$tra->EliminarEps();
exit;
break;

case 'PLANTILLASGINECOLOGICAS':
$tra->EliminarPlantillaEcografia();
exit;
break;

case 'PLANTILLASLECTURARX':
$tra->EliminarPlantillaLecturarx();
exit;
break;

case 'ASIGNACIONPLANTILLASECOGRAFICAS':
$tra->EliminarAsigPlantillaEcografia();
exit;
break;

case 'ASIGNACIONPLANTILLASLECTURARX':
$tra->EliminarAsigPlantillaLecturarx();
exit;
break;

case 'PACIENTES':
$tra->EliminarPacientes();
exit;
break;

case 'REINICIAMEDICO':
$tra->ReiniciarMedico();
exit;
break;

case 'MEDICOS':
$tra->EliminarMedicos();
exit;
break;

case 'CANCELARCITAMEDICA':
$tra->CancelarCitaMedica();
exit;
break;

case 'CITASMEDICAS':
$tra->EliminarCitasMedicas();
exit;
break;

case 'APERTURA':
$tra->EliminarAperturas();
exit;
break;

case 'HOJAEVOLUTIVA':
$tra->EliminarHojaEvolutiva();
exit;
break;

case 'REMISIONES':
$tra->EliminarRemisiones();
exit;
break;

case 'FORMULASMEDICAS':
$tra->EliminarFormulasMedicas();
exit;
break;

case 'FORMULASTERAPIAS':
$tra->EliminarFormulasTerapias();
exit;
break;

case 'SOLICITUDEXAMEN':
$tra->EliminarSolicitudExamenes();
exit;
break;

case 'CRIOCAUTERIZACION':
$tra->EliminarCriocauterizacion();
exit;
break;

case 'COLPOSCOPIAS':
$tra->EliminarColposcopia();
exit;
break;

case 'ECOGRAFIAS':
$tra->EliminarEcografia();
exit;
break;

case 'LABORATORIO':
$tra->EliminarLaboratorio();
exit;
break;


case 'LECTURARX':
$tra->EliminarLecturaRx();
exit;
break;

case 'TERAPIAS':
$tra->EliminarTerapias();
exit;
break;

case 'CICLOTERAPIAS':
$tra->EliminarCicloTerapia();
exit;
break;

case 'REFERENCIAS':
$tra->EliminarReferenciaTratamiento();
exit;
break;

case 'ODONTOLOGIA':
$tra->EliminarOdontologia();
exit;
break;

case 'CONSENTIMIENTOGENERAL':
$tra->EliminarConsentimientoGeneral();
exit;
break;

case 'CONSENTIMIENTOGINECOLOGIA':
$tra->EliminarConsentimientoGinecologia();
exit;
break;

case 'CONSENTIMIENTOLABORATORIO':
$tra->EliminarConsentimientoLaboratorio();
exit;
break;

case 'CONSENTIMIENTORADIOLOGIA':
$tra->EliminarConsentimientoRadiologia();
exit;
break;

case 'CONSENTIMIENTOTERAPIA':
$tra->EliminarConsentimientoTerapia();
exit;
break;

case 'CONSENTIMIENTOODONTOLOGO':
$tra->EliminarConsentimientoOdontologia();
exit;
break;

}
?>