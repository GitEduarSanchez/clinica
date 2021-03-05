<?php
require_once("class/class.php");
?>

<script type="text/javascript" src="assets/script/script2.js"></script>
<script src="assets/script/jscalendario.js"></script>
<script src="assets/script/autocompleto.js"></script> 
<!-- Calendario -->

<?php
$med = new Login();
$med = $med->ListarMedicos();

$su = new Login();
$su = $su->ListarSucursal();

$new = new Login();
?>


<?php
############################# MOSTRAR USUARIO EN VENTANA MODAL ############################
if (isset($_GET['BuscaUsuarioModal']) && isset($_GET['codigo'])) { 
$reg = $new->UsuariosPorId();
?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Tipo de Identificación:</strong> <?php echo $reg[0]['tipoidentificacion']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Identificación:</strong> <?php echo $reg[0]['cedula']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombres:</strong> <?php echo $reg[0]['nombres']; ?></td>
  </tr>
  <tr>
    <td><strong>Sexo:</strong> <?php echo $reg[0]['sexo']; ?></td>
  </tr>
  <tr>
    <td><strong>Cargo: </strong> <?php echo $reg[0]['cargo']; ?></td>
  </tr>
  <tr>
    <td><strong>Correo Electrónico: </strong> <?php echo $reg[0]['email']; ?></td>
  </tr>
  <tr>
    <td><strong>Usuario: </strong> <?php echo $reg[0]['usuario']; ?></td>
  </tr>
  <tr>
    <td><strong>Nivel: </strong> <?php echo $reg[0]['nivel']; ?></td>
  </tr>
  <tr>
    <td><strong>Status: </strong> <?php echo $status = ( $reg[0]['status'] == 'ACTIVO' ? "<span class='label label-success'><i class='fa fa-check'></i> ".$reg[0]['status']."</span>" : "<span class='label label-warning'><i class='fa fa-times'></i> ".$reg[0]['status']."</span>"); ?></td>
  </tr>
</table>
</div>
  
  <?php
   } 
############################# MOSTRAR USUARIO EN VENTANA MODAL ############################
?>


<?php
############################# MOSTRAR SUCURSALES EN VENTANA MODAL ############################
if (isset($_GET['BuscaSucursalModal']) && isset($_GET['codsucursal'])) { 
$reg = $new->SucursalPorId();
?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Nit de Sucursal:</strong> <?php echo $reg[0]['nitsucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombre de Sucursal:</strong> <?php echo $reg[0]['nombresucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Departamento:</strong> <?php echo $reg[0]['nombre']; ?></td>
  </tr>
  <tr>
    <td><strong>Ciudad:</strong> <?php echo $reg[0]['ciudadsucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Dirección: </strong> <?php echo $reg[0]['direccionsucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Correo Electrónico: </strong> <?php echo $reg[0]['emailsucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono: </strong> <?php echo $reg[0]['telefonosucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº Identificación Director: </strong> <?php echo $reg[0]['identdirecsucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombres de Director: </strong> <?php echo $reg[0]['nomdirecsucursal']." ".$reg[0]['apedirecsucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono: </strong> <?php echo $reg[0]['telefdirecsucursal']; ?></td>
  </tr>
</table>
</div>
  
  <?php
   } 
############################# MOSTRAR SUCURSALES EN VENTANA MODAL ############################
?>


<?php
############################# MOSTRAR SEDES EN VENTANA MODAL ############################
if (isset($_GET['BuscaSedeModal']) && isset($_GET['codsede'])) { 
$reg = $new->SedesPorId();
?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Nombre de Sucursal:</strong> <?php echo $reg[0]['nombresucursal']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombre de Sede:</strong> <?php echo $reg[0]['nombresede']; ?></td>
  </tr>
  <tr>
    <td><strong>Departamento:</strong> <?php echo $reg[0]['nombre']; ?></td>
  </tr>
  <tr>
    <td><strong>Ciudad:</strong> <?php echo $reg[0]['ciudadsede']; ?></td>
  </tr>
  <tr>
    <td><strong>Dirección: </strong> <?php echo $reg[0]['direccionsede']; ?></td>
  </tr>
  <tr>
    <td><strong>Correo Electrónico: </strong> <?php echo $reg[0]['emailsede']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono: </strong> <?php echo $reg[0]['telefonosede']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº Identificación Director: </strong> <?php echo $reg[0]['identdirecsede']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombres de Director: </strong> <?php echo $reg[0]['nomdirecsede']." ".$reg[0]['apedirecsede']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono: </strong> <?php echo $reg[0]['telefdirecsede']; ?></td>
  </tr>
</table>
</div>
  
  <?php
   } 
############################# MOSTRAR SEDES EN VENTANA MODAL ############################
?>



<?php
############################# MOSTRAR EPS EN VENTANA MODAL ############################
if (isset($_GET['BuscaEpsModal']) && isset($_GET['codeps'])) { 

$reg = $new->EpsPorId();

  ?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Código:</strong> <?php echo $reg[0]['codigo']; ?></td>
  </tr>
  <tr>
    <td><strong>Nit de Eps:</strong> <?php echo $reg[0]['nit']; ?></td>
  </tr>
  <tr>
    <td><strong>Tipo de Eps:</strong> <?php echo $reg[0]['tipo']; ?></td>
  </tr>
  <tr>
    <td><strong>Dv de Eps:</strong> <?php echo $reg[0]['dv']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombre de Entidad:</strong> <?php echo $reg[0]['nomentidad']; ?></td>
  </tr>
  <tr>
    <td><strong>Expedida:</strong> <?php echo $reg[0]['expedida']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombre de Contabilidad:</strong> <?php echo $reg[0]['nomcontabilidad']; ?></td>
  </tr>
</table>
</div> 
  <?php
   } 
############################# MOSTRAR EPS EN VENTANA MODAL ############################
?>


<?php
############################# MOSTRAR PACIENTE EN VENTANA MODAL ############################
if (isset($_GET['BuscaPacienteModal']) && isset($_GET['codpaciente'])) { 

$reg = $new->PacientesPorId();

  ?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Tipo de Identificación:</strong> <?php echo $reg[0]['idenpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Identificación:</strong> <?php echo $reg[0]['cedpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombres:</strong> <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Apellidos:</strong> <?php echo $reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Fecha de Nacimiento:</strong> <?php echo $reg[0]['fnacpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Edad:</strong> <?php echo edad($reg[0]['fnacpaciente'])." AÑOS"; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono:</strong> <?php echo $reg[0]['tlfpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Grupo Sanguineo:</strong> <?php echo $reg[0]['gruposapaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Eps:</strong> <?php echo $reg[0]['nomentidad']; ?></td>
  </tr>
  <tr>
    <td><strong>Vinculación:</strong> <?php echo $reg[0]['vinculacion']; ?></td>
  </tr>
  <tr>
    <td><strong>Estado Civil:</strong> <?php echo $reg[0]['estadopaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Ocupación Laboral:</strong> <?php echo $reg[0]['ocupacionpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Sexo:</strong> <?php echo $reg[0]['sexopaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Enfoque Diferencial:</strong> <?php echo $reg[0]['enfoquepaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Departamento:</strong> <?php echo $reg[0]['nombre']; ?></td>
  </tr>
  <tr>
    <td><strong>Municipio:</strong> <?php echo $reg[0]['nombre_municipio']; ?></td>
  </tr>
  <tr>
    <td><strong>Ciudad:</strong> <?php echo $reg[0]['ciudad']; ?></td>
  </tr>
  <tr>
    <td><strong>Dirección Domiciliaria:</strong> <?php echo $reg[0]['direcpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombre de Acompañante:</strong> <?php echo $reg[0]['nomacompana']; ?></td>
  </tr>
  <tr>
    <td><strong>Dirección de Acompañante:</strong> <?php echo $reg[0]['direcacompana']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono de Acompañante:</strong> <?php echo $reg[0]['tlfacompana']; ?></td>
  </tr>
  <tr>
    <td><strong>Parentesco de Acompañante:</strong> <?php echo $reg[0]['parentescoacompana']; ?></td>
  </tr>

  <tr>
    <td><strong>Nombre de Responsable:</strong> <?php echo $reg[0]['nomresponsable']; ?></td>
  </tr>
  <tr>
    <td><strong>Dirección de Responsable:</strong> <?php echo $reg[0]['direcresponsable']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono de Responsable:</strong> <?php echo $reg[0]['tlfresponsable']; ?></td>
  </tr>
  <tr>
    <td><strong>Parentesco de Responsable:</strong> <?php echo $reg[0]['parentescoresponsable']; ?></td>
  </tr>
</table>
</div> 
  <?php
   } 
############################# MOSTRAR PACIENTE EN VENTANA MODAL ############################
?>


<?php
############################# MOSTRAR MEDICO EN VENTANA MODAL ############################
if (isset($_GET['BuscaMedicoModal']) && isset($_GET['codmedico'])) { 

$reg = $new->MedicosPorId();

  ?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Tipo de Identificación:</strong> <?php echo $reg[0]['identmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Identificación:</strong> <?php echo $reg[0]['cedmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Tarjeta Profesional:</strong> <?php echo $reg[0]['tpmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombres:</strong> <?php echo $reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Fecha de Nacimiento:</strong> <?php echo $reg[0]['fnacmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Edad:</strong> <?php echo edad($reg[0]['fnacmedico'])." AÑOS"; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono:</strong> <?php echo $reg[0]['tlfmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Sexo:</strong> <?php echo $reg[0]['sexomedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Correo Electronico:</strong> <?php echo $reg[0]['correomedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Dirección Domiciliaria:</strong> <?php echo $reg[0]['direcmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Especialidad:</strong> <?php echo $reg[0]['especmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Módulo de Acceso:</strong> <?php echo $reg[0]['moduloespec']; ?></td>
  </tr>
</table>
</div> 
  <?php
   } 
############################# MOSTRAR MEDICO EN VENTANA MODAL ############################
?>




















<?php
############################# BUSQUEDA DE PACIENTE PARA CITAS MEDICAS ############################
if (isset($_GET['BuscaPacienteCitas']) && isset($_GET['codpaciente'])) { 
  
$codpaciente = $_GET['codpaciente'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->PacPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-tasks"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

            <div class="row">

           <div class="col-md-2"> 
             <div class="form-group has-feedback">
              <label class="control-label">Nº de Identificación: <span class="symbol required"></span></label> 
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="ingresocita" id="ingresocita" value="<?php echo date('Y-m-d'); ?>" >
<input class="form-control" type="text" name="cedpaciente" id="cedpaciente" value="<?php echo $pa[0]['cedpaciente']; ?>" disabled="disabled"> 
                        <i class="fa fa-flash form-control-feedback"></i>
            </div> 
          </div> 

          <div class="col-md-4"> 
            <div class="form-group has-feedback"> 
              <label class="control-label">Nombres y Apellidos: <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="pnompaciente" id="pnompaciente" value="<?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?>" disabled="disabled"> 
                        <i class="fa fa-pencil form-control-feedback"></i>
            </div> 
          </div> 

          <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fnacpaciente" id="fnacpaciente" value="<?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?>" disabled="disabled">
                        <i class="fa fa-calendar form-control-feedback"></i>                                                               
                   </div> 
            </div>

          <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Eps: <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="eps" id="eps" value="<?php echo $pa[0]['nomcontabilidad']; ?>" disabled="disabled">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                  </div> 
            </div>

        </div>


        <div class="row">
          <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="gruposapaciente" id="gruposapaciente" value="<?php echo $pa[0]['gruposapaciente']; ?>" disabled="disabled">
                        <i class="fa fa-pencil form-control-feedback"></i>
                </div> 
          </div> 

          <div class="col-md-2"> 
            <div class="form-group has-feedback"> 
              <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="tlfpaciente" id="tlfpaciente" value="<?php echo $pa[0]['tlfpaciente']; ?>" disabled="disabled"> 
                        <i class="fa fa-phone form-control-feedback"></i>
            </div> 
          </div> 

          <div class="col-md-6"> 
           <div class="form-group has-feedback"> 
            <label class="control-label">Seleccione Médico: <span class="symbol required"></span></label> 
<select name="codmedico" id="codmedico" onchange="VerBotonMedico();" class='form-control' required="" aria-required="true">
             <option value="">SELECCIONE MEDICO</option>
             <?php
             for($i=0;$i<sizeof($med);$i++){
              ?> 
<option value="<?php echo $med[$i]['codmedico']; ?>"><?php echo $med[$i]['cedmedico']."  -  ".$med[$i]['nommedico']." ".$med[$i]['apemedico']."  -  ".$med[$i]['especmedico']; ?></option>
            <?php } ?>
          </select>
        </div> 
      </div>

      <div class="col-md-2"> 
        <div class="form-group has-feedback"> 
          <label class="control-label"></label> 
          <div id="muestracitas"></div>                                                               
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas Canceladas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

           <div id="div"><div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>N&deg;</th>
                                                    <th>Nombre de Médico</th>
                                                    <th>Motivo de Cita</th>
                                                    <th>Fecha Cita</th>
                                                    <th>Hora Cita</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$tri = new Login();
$reg = $tri->BuscarCitasMedicasCanceladas();

if($reg==""){

    echo "";      
    
} else {
 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
                                                <tr>
                <td><div align="center"><?php echo $a++; ?></div></td>
<td><div align="center"><?php echo $reg[$i]['especmedico']." : ".$reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></div></td>
                <td><div align="center"><?php echo $reg[$i]['motivocita']; ?></div></td>
                <td><div align="center"><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></div></td>
                <td><div align="center"><?php echo $reg[$i]['horacita']; ?></div></td>
<td><div align="center"><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'>".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '>".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'>".$reg[$i]['statuscita']."</span>"; } ?></div></td>
                                                </tr>
                        <?php  } } ?>
                                            </tbody>
  </table><br /><div align="center">
 
<?php if($reg!=""){ ?>

<a href="reportepdf?codpaciente=<?php echo $codpaciente; ?>&tipo=<?php echo base64_encode("CITASCANCELADA") ?>" target="_blank"><button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="button"><span class="fa fa-file-pdf-o"></span> Exportar Pdf</button></a>

<a href="reporteexcel?codpaciente=<?php echo $codpaciente; ?>&tipo=<?php echo base64_encode("CITASCANCELADA") ?>"><button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="button"><span class="fa fa-file-excel-o"></span> Exportar Excel</button> </a>

<?php } ?>
           </div>
      </div></div>
      
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Gestión de Citas Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <label class="control-label">Motivo de Cita Médica: <span class="symbol required"></span></label> 
<textarea name="motivocita" class="form-control" id="motivocita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Cita Medica o Dato Clinico para Lectura Rx" rows="3" required="" aria-required="true">SIN DESCRIPCION</textarea> 
                        <i class="fa fa-pencil form-control-feedback"></i>
               </div> 
           </div>

         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <label class="control-label">Observaciones de Cita Médica: <span class="symbol required"></span></label> 
<textarea name="observacionescita" class="form-control" id="observacionescita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observaciones de Cita Medica o Tipo de Estudio para Lectura Rx" rows="3" required="" aria-required="true">SIN OBSERVACIONES</textarea>
                        <i class="fa fa-comment form-control-feedback"></i>
      </div> 
    </div> 
  </div>

  <div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">Fecha de Cita: <span class="symbol required"></span></label> 
 <input class="form-control calendario" type="text" name="fechacita" id="fechacita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo date('d-m-Y'); ?>" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Hora de Cita:</label> 
<input class="form-control" type="text" name="hour" id="hour" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-clock-o form-control-feedback"></i>
                             </div>  
                       </div>

        <div class="col-md-3"> 
               <div class="form-group has-feedback"> 
                 <label class="control-label">Sucursal: <span class="symbol required"></span></label> 
 <select name="codsucursal" id="codsucursal" class='form-control' onChange="CargaSedes(this.form.codsucursal.value);" required="" aria-required="true">
             <option value="">SELECCIONE </option>
      <?php
      for($i=0;$i<sizeof($su);$i++){
                  ?> 
<option value="<?php echo base64_encode($su[$i]['codsucursal']); ?>"><?php echo $su[$i]['nombresucursal']; ?></option>
               <?php } ?>
              </select>
                       </div>  
               </div>

 <div class="col-md-3"> 
   <div class="form-group has-feedback"> 
    <label class="control-label">Sedes: <span class="symbol required"></span></label> 
<div id="sede"><select name="codsede" id="codsede" disabled="disabled" class='form-control'>
                              <option value="">SELECCIONE</option>
             </select></div>
                    </div>  
          </div>
      </div> 

              <div class="row">             
                <div id="muestracomboboxlectura"></div>
              </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('codmedico').value = '',
    document.getElementById('motivocita').value = '',
    document.getElementById('observacionescita').value = '',
    document.getElementById('lectura').value = '',
    document.getElementById('codsucursal').value = '',
    document.getElementById('codsede').value = '',
    document.getElementById('fechacita').value = '<?php echo date("Y-m-d")?>',
    document.getElementById('horacita').value = '<?php echo date("h:i:s"); ?>'"><span class="fa fa-trash-o"></span> Cancelar</button>  
            </div>
          
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# BUSQUEDA DE PACIENTE PARA CITAS MEDICAS ############################
?>

<?php 
############################# MUESTRA BOTON DE CITAS MEDICAS #############################
if (isset($_GET['BuscaCitasMedicos']) && isset($_GET['codmedico'])) {

$codmedico = $_GET['codmedico'];
  
$med = new Login();
$med = $med->MedicosPorId();

  ?>
<button type="button" class="btn btn-primary waves-effect waves-light" data-href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-placement="left" data-backdrop="static" data-keyboard="false" data-id="" rel="tooltip" title="Ver" onClick="BotonCitasModal('<?php echo $med[0]["codmedico"] ?>')"><span class="fa fa-eye"></span> Ver Citas</button><input type="hidden" name="especialidad" id="especialidad" value="<?php echo $med[0]['moduloespec']; ?>">
  <?php
}
############################# MUESTRA BOTON DE CITAS MEDICAS #############################
?>  


<?php 
############################# MUESTRA BOTON LECTURA RX #########################################
if (isset($_GET['BuscaComboboxLectura']) && isset($_GET['codmedico'])) {

$codmedico = $_GET['codmedico'];

$me = new Login();
$me = $me->MedicosPorId();

if($me[0]['moduloespec']=="RADIOLOGO") {
  ?>
  <div class="col-md-3"> 
                <div class="form-group"> 
        <label class="control-label">Necesita Lectura Rx: <span class="symbol required"></span></label> 
          <select name="lectura" id="lectura" class='form-control' required="" aria-required="true">
             <option value="">SELECCIONE</option>
       <option value="SI">SI</option>
       <option value="NO">NO</option>
            </select>
        
<small> <p style="font-size:10px">En caso de ser cita para Radiologia deber&aacute; de seleccionar si necesita Lecura RX o no</p></small>      
               </div> 
        </div>
  
  <?php
} else {

 echo "";
 exit;
  }
}
############################# MUESTRA BOTON LECTURA RX #########################################
?>

<?php 
###################### BUSQUEDA DE CITAS MEDICAS POR MEDICOS Y MOSTAR EN VENTANA MODAL ########################
if (isset($_GET['BuscaCitasModal']) && isset($_GET['codmedico'])) { 

$codmedico = $_GET['codmedico'];

$me = new Login();
$reg = $me->MedicosPorId();
?>

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                              <tr>
<td colspan="6"><center><label>CITAS M&Eacute;DICAS PARA <?php echo $reg[0]['moduloespec']; ?> DE EL (LA) <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></label></center></td>
                                              </tr>
                                                <tr>
                                                    <th>N&deg;</th>
                                                    <th>Nombre del Paciente</th>
                                                    <th>Motivo de Cita</th>
                                                    <th>Fecha Cita</th>
                                                    <th>Hora Cita</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$tri = new Login();
$a=1;
$reg = $tri->BuscarCitasModal();
for($i=0;$i<sizeof($reg);$i++){  
?>
                                                <tr>
                <td><?php echo $a++; ?></td>
                <td><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></td>
                <td><?php echo $reg[$i]['motivocita']; ?></td>
                <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
                <td><?php echo $reg[$i]['horacita']; ?></td>
<td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success'><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>
                                                </tr>
                        <?php  }  ?>
                                            </tbody>
                    </table>
             </div>
      </div>
</div>                               
<?php
  } 
###################### BUSQUEDA DE CITAS MEDICAS POR MEDICOS Y MOSTAR EN VENTANA MODAL ########################
?>

<?php 
############################# BUSQUEDA DE CITAS MEDICAS  ###################################
if (isset($_GET['BuscaCitasMedicas']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else { 

$reg = new Login();
$reg = $reg->BusquedaCitasMedicas();
?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas del Médico <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

           <div id="div"><div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Nº Identificación</th>
                                                    <th>Nombre de Paciente</th>
                                                    <th>Fecha/Hora</th>
                                                    <th>Status</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 

if($reg==""){

    echo "";      
    
} else {
 
$a=1;
for($i=0;$i<sizeof($reg);$i++){ 
?>
                                                <tr>
                <td><div align="center"><?php echo $a++; ?></td>
<td><?php echo $reg[$i]['cedpaciente']; ?></td>
<td><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></td>
<td><?php echo $reg[$i]['fechacita']." ".$reg[$i]['horacita']; ?></td>
<td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success'><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>
                     <td class="actions"><div align="center">
                           
<a href="#" class="btn btn-success btn-xs" data-placement="left" title="Ver" data-original-title="" data-href="#" data-toggle="modal" data-target="#panel-modal" data-backdrop="static" data-keyboard="false" onClick="VerCitaModal('<?php echo base64_encode($reg[$i]["codcita"]); ?>')"><i class="fa fa-eye"></i></a>
                
                
<?php if($reg[$i]['statuscita'] == "EN PROCESO") { ?>
                
<a href="#" class="btn btn-info btn-xs" data-placement="left" data-toggle="tooltip" data-original-title="Cancelar" onClick="CancelarCita('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode("CANCELARCITAMEDICA") ?>','<?php echo $codmedico ?>','<?php echo $desde ?>','<?php echo $hasta ?>')"><i class="fa fa-history"></i></a>

<?php } ?>


<?php if($reg[$i]['statuscita'] == "CANCELADA" OR $reg[$i]['statuscita'] == "EN PROCESO") { ?>

<a href="#" class="btn btn-primary btn-xs" onClick="CargaCitas('<?php echo $reg[$i]["codcita"]; ?>','<?php echo $reg[$i]["codpaciente"]; ?>','<?php echo $reg[$i]["cedpaciente"]; ?>','<?php echo $reg[$i]["pnompaciente"]." ".$reg[$i]["snompaciente"]; ?>','<?php echo $reg[$i]["papepaciente"]." ".$reg[$i]["sapepaciente"]; ?>','<?php echo date("d-m-Y",strtotime($reg[$i]['fnacpaciente'])); ?>','<?php echo $reg[$i]["nomcontabilidad"]; ?>','<?php echo $reg[$i]["gruposapaciente"]; ?>','<?php echo $reg[$i]["tlfpaciente"]; ?>','<?php echo $reg[$i]["especialidad"]; ?>','<?php echo $reg[$i]["motivocita"]; ?>','<?php echo $reg[$i]["observacionescita"]; ?>','<?php echo date("d-m-Y",strtotime($reg[$i]['fechacita'])); ?>','<?php echo $reg[$i]['horacita']; ?>','<?php echo base64_encode($reg[$i]["codsucursal"]); ?>','<?php echo $reg[$i]["codsede"]; ?>','<?php echo $reg[$i]["statuscita"]; ?>','<?php echo $reg[$i]["lectura"]; ?>','<?php echo $codmedico; ?>','<?php echo base64_decode($codmedico); ?>','<?php echo $desde ?>','<?php echo $hasta ?>')" data-href="#" data-toggle="modal" data-target=".bs-example-modal-lg2" data-placement="left" data-backdrop="static" data-keyboard="false" data-id="" rel="tooltip" title="Editar"><i class="fa fa-pencil"></i></a>

<?php if ($_SESSION['acceso'] == "administrador"){ ?><a class="btn btn-danger btn-xs" data-placement="left" data-toggle="tooltip" data-original-title="Eliminar" onClick="EliminarCita('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode("CITASMEDICAS") ?>','<?php echo $codmedico ?>','<?php echo $desde ?>','<?php echo $hasta ?>')"><i class="fa fa-trash-o"></i></a><?php } ?>

<?php } ?>

                  

                                                </div>
                                            </td>
                                                </tr>
                        <?php  } } ?>
                                            </tbody>
  </table>
                </div>
              </div>
           </div><!-- /.box-body -->
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<?php
           }
  } 
############################# BUSQUEDA DE CITAS MEDICAS ###################################
?>

<?php
############################# MOSTRAR CITAS MEDICAS EN VENTANA MODAL ############################
if (isset($_GET['BuscaCitaModal']) && isset($_GET['codcita'])) { 

$reg = $new->CitasPorId();

  ?>
  
  <div class="row">
  <table border="0" align="center">
  <tr>
    <td><strong>Tipo de Identificación:</strong> <?php echo $reg[0]['idenpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Nº de Identificación:</strong> <?php echo $reg[0]['cedpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Nombre de Paciente:</strong> <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']; ?></td>
  </tr>
  <tr>
  <td><strong>Apellidos de Paciente:</strong> <?php echo $reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Edad:</strong> <?php echo edad($reg[0]['fnacpaciente']); ?> AÑOS</td>
  </tr>
  <tr>
    <td><strong>Nº de Teléfono:</strong> <?php echo $reg[0]['tlfpaciente']; ?></td>
  </tr>
  <tr>
    <td><strong>Médico de Cita:</strong> <?php echo $reg[0]['nommedico']." ".$reg[0]['apemedico']."  -  ".$reg[0]['especmedico']; ?></td>
  </tr>
  <tr>
    <td><strong>Motivo de Cita:</strong> <?php echo $reg[0]['motivocita']; ?></td>
  </tr>
  <tr>
    <td><strong>Observaciones de Cita:</strong> <?php echo $reg[0]['observacionescita']; ?></td>
  </tr>
  <tr>
    <td><strong>Fecha / Hora de Cita:</strong> <?php echo $reg[0]['fechacita']." ".$reg[0]['horacita']; ?></td>
  </tr>
</table>
</div> 
  <?php
   } 
############################# MOSTRAR CITAS MEDICAS EN VENTANA MODAL ############################
?>

<?php 
############################# BUSQUEDA DE CITAS MEDICAS POR FECHAS ###################################
if (isset($_GET['BuscaCitasMedicasReportes']) && isset($_GET['desde']) && isset($_GET['hasta']) && isset($_GET['codsucursal']) && isset($_GET['codsede']) && isset($_GET['especialidad'])) { 

$desde = $_GET['desde'];
$hasta = $_GET['hasta'];
$codsucursal = $_GET['codsucursal'];
$codsede = $_GET['codsede'];
$especialidad = $_GET['especialidad'];

if($desde=="") {


echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO</div></center>"; // wrong details
exit;

} elseif($hasta=="") {


echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE FIN</div></center>";
exit;

 } elseif($hasta<$desde) {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE CULMINACI&Oacute;N</div></center>";
exit;

} elseif($codsucursal=="") {


echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE SUCURSAL PARA TU B&Uacute;SQUEDA</div></center>";
exit;

} elseif($codsede=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE SEDE PARA TU B&Uacute;SQUEDA</div></center>";
exit;

} elseif($especialidad=="") {


echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE ESPECIALIDAD PARA TU B&Uacute;SQUEDA</div></center>";
exit;
    
} else {


?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
                     <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas por Fechas </h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                              <tr>
                                                <th>N&deg;</th>
                                                <th>Nombre del M&eacute;dico</th>
                                                <th>Nombre del Paciente</th>
                                                <th>Motivo de Cita</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Status</th>
                                              </tr>
                                            </thead>
                                            <tbody>
<?php 
$ci = new Login();
$reg = $ci->BuscarCitasMedicasReportes();
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo $reg[$i]['motivocita']; ?></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success'><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>
</tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
              <br /><div align="center">
                          
<a href="reportepdf?desde=<?php echo $desde; ?>&hasta=<?php echo $hasta; ?>&codsucursal=<?php echo $codsucursal; ?>&codsede=<?php echo $codsede; ?>&especialidad=<?php echo $especialidad; ?>&tipo=<?php echo base64_encode("CITASXFECHAS") ?>" target="_blank" rel="noopener noreferrer"><button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="button"><span class="fa fa-file-pdf-o"></span> Exportar Pdf</button></a>

<a href="reporteexcel?desde=<?php echo $desde; ?>&hasta=<?php echo $hasta; ?>&codsucursal=<?php echo $codsucursal; ?>&codsede=<?php echo $codsede; ?>&especialidad=<?php echo $especialidad; ?>&tipo=<?php echo base64_encode("CITASXFECHAS") ?>"><button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="button"><span class="fa fa-file-excel-o"></span> Exportar Excel</button> </a>                   
                                 </div>         
                            </div>
                         </div>
                    </div>
                 </div>
             </div>
          </div>
      </div> <!-- End Row -->
<?php
           }
  } 
############################# BUSQUEDA DE CITAS MEDICAS POR FECHAS ###################################
?>

<?php 
############################# BUSQUEDA DE CITAS MEDICAS POR MEDICOS ##############################
if (isset($_GET['BuscaCitasMedicasPorMedicosReportes']) && isset($_GET['codmedico']) && isset($_GET['codsucursal']) && isset($_GET['codsede'])) { 

$codmedico = $_GET['codmedico'];
$codsucursal = $_GET['codsucursal'];
$codsede = $_GET['codsede'];

if($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU B&Uacute;SQUEDA </div></center>";
exit;

} elseif($codsucursal=="") {


echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE SUCURSAL PARA TU B&Uacute;SQUEDA</div></center>";
exit;

} elseif($codsede=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE SEDE PARA TU B&Uacute;SQUEDA</div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasPorMedicosReportes();
?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div1"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Motivo de Cita</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo $reg[$i]['motivocita']; ?></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>
</tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>

                    <br /><div align="center">
                    
<a href="reportepdf?codmedico=<?php echo $codmedico ?>&codsucursal=<?php echo $codsucursal; ?>&codsede=<?php echo $codsede; ?>&tipo=<?php echo base64_encode("CITASXMEDICOS") ?>" target="_blank" rel="noopener noreferrer"><button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="button"><span class="fa fa-file-pdf-o"></span> Exportar Pdf</button></a>  
<a href="reporteexcel?codmedico=<?php echo $codmedico; ?>&codsucursal=<?php echo $codsucursal; ?>&codsede=<?php echo $codsede; ?>&tipo=<?php echo base64_encode("CITASXMEDICOS") ?>"><button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="button"><span class="fa fa-file-excel-o"></span> Exportar Excel</button> </a>                  
                                 </div>         
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE CITAS MEDICAS POR MEDICOS ###############################
?>






<?php 
############################# BUSQUEDA DE CITAS MEDICAS PARA REGISTRO ############################
if (isset($_GET['MuestraCitasXMedicos']) && isset($_GET['codmedico'])) { 

$codmedico = $_GET['codmedico'];

if($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU B&Uacute;SQUEDA </div></center>";
exit;
    
} else {

?>

  
             <div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
$ci = new Login();
$reg = $ci->BuscarCitasMedicas();
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>

  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearApertura('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-folder-open"></span> Crear Apertura de Historia</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
<?php
     }
} 
############################# BUSQUEDA DE CITAS MEDICAS PARA REGISTRO ##############################
?>







<?php 
############################# BUSQUEDA DE APERTURA DE HISTORIA ################################
if (isset($_GET['BuscaApertura']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearApertura('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-folder-open"></span> Procesar Apertura</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE APERTURA DE HISTORIA #############################
?>



<?php
############################# CREAR APERTURA DE HISTORIA MEDICA ############################
if (isset($_GET['CreaApertura']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->BuscarAperturasPacientes();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="APERTURA MEDICA">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">
<input type="hidden" name="sexo" id="sexo" value="<?php echo $pa[0]['sexopaciente']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Motivo de Consulta</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Motivo de Consulta: <span class="symbol required"></span></label> 
<textarea name="motivoconsulta" class="form-control" id="motivoconsulta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Consulta" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>

              <div class="col-md-6"> 
                <div class="form-group has-feedback"> 
          <label class="control-label">Exámen Físico: <span class="symbol required"></span></label> 
 <textarea name="examenfisico" class="form-control" id="examenfisico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Exámen Físico" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div> 
            </div>

<?php if($pa[0]['sexopaciente']=="FEMENINO" && $modulo =="MEDICO GENERAL") { ?>

  <div class="row">

       <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Citologia: </label> 
 <input class="form-control nacimiento" type="text" name="fechacitologia" id="fechacitologia" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Citologia" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-4"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Esta Embarazada:</label> 
<select name="embarazada" id="embarazada" class='form-control' onchange="Embarazada()" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                             </div>  
                       </div>

       <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Mestruación: <span class="symbol required"></span></label> 
 <input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" disabled="disabled" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>
                </div> 


      <?php } elseif($pa[0]['sexopaciente']=="FEMENINO" && $modulo =="GINECOLOGO") { ?>

  <div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Citologia: </label> 
 <input class="form-control nacimiento" type="text" name="fechacitologia" id="fechacitologia" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Citologia" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Esta Embarazada: <span class="symbol required"></span></label> 
<select name="embarazada" id="embarazada" class='form-control' onchange="Embarazada()" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                             </div>  
                       </div>

      <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Mestruación: <span class="symbol required"></span></label> 
 <input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" disabled="disabled" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

<input type="hidden" name="di" id="di" value="28">
<input type="hidden" name="sem" id="sem" value="14"> 

      <div class="col-md-2"> 
         <div class="form-group has-feedback"><br>
<button type="button" class="btn btn-info waves-effect waves-light" onclick="CalcularEmbarazo()" name="calcular" id="calcular" disabled="disabled"><span class="fa fa-calculator"></span> Calcular Parto</button>
        </div> 
      </div>    
  </div> 

    <div class="row">
      <div id="result2"></div>                      
      <div id="result3"></div>
    </div> 

                        <?php } ?>            
          
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Signos Vitales</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">TA(mm/Hg): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="ta" id="ta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese TA" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">Temperatura:(&deg;C): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="temperatura" id="temperatura" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Temperatura" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">FC(por minuto): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fc" id="fc" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese FC" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">FR(por minuto): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fr" id="fr" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese FR" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">PESO(Kg): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="peso" id="peso" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Peso" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Enfermedad Actual del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Enfermedad Actual del Paciente: <span class="symbol required"></span></label> 
<textarea name="enfermedadpaciente" class="form-control" id="enfermedadpaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Enfermedad Actual del Paciente" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Antecedentes del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">

               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Personales: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedentepaciente" id="antecedentepaciente" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Personales" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>


               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Familiares: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedentefamiliares" id="antecedentefamiliares" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Familiares" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>


               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Alérgico: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedentealergico" id="antecedentealergico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Alérgico" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div>


            <div class="row">

               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Patólogicos: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedentepatologico" id="antecedentepatologico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Patólogicos" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>


               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Quirúrgicos: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedentequirurgico" id="antecedentequirurgico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Quirúrgicos" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>


               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Farmacológicos: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedentefarmacologico" id="antecedentefarmacologico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Farmacológicos" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div>

<?php if($pa[0]['sexopaciente']=="FEMENINO") { ?>

            <div class="row">

               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Antecedentes Ginecológicos: <span class="symbol required"></span></label> 
<textarea class="form-control" name="antecedenteginecologico" id="antecedenteginecologico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Antecedentes Ginecológicos" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>


               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Historial Gestacional: <span class="symbol required"></span></label> 
<textarea class="form-control" name="historialgestacional" id="historialgestacional" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Historial Gestacional" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>


               <div class="col-md-4"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Planificación Familiar: <span class="symbol required"></span></label> 
<textarea class="form-control" name="planificacionfamiliar" id="planificacionfamiliar" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Planificación Familiar" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div>
<?php } ?>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Identificación del Origen de la Enfermedad o Accidente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Dx</button>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label> 
<input name="idciepresuntivo[]" type="hidden" class="form-control" id="idciepresuntivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/>

<input type="text" id="presuntivo" name="presuntivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true">

<textarea name="observacionpresuntivo[]" class="form-control" id="observacionpresuntivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Presuntivo" title="Ingrese Observación de Dx Presuntivo" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Origen de la Enfermedad o Accidente del Paciente: <span class="symbol required"></span></label> 
<select name="origenenfermedad" id="origenenfermedad" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="PACIENTE SANO" >PACIENTE SANO</option>
<option value="ACCIDENTE DE TRABAJO" >ACCIDENTE DE TRABAJO</option>
<option value="ACCIDENTE DE TRANSITO" >ACCIDENTE DE TRANSITO</option>
<option value="ACCIDENTE RAPIDO" >ACCIDENTE RAPIDO</option>
<option value="ACCIDENTE OFIDICO" >ACCIDENTE OFIDICO</option>
<option value="OTRO TIPO DE ACCIDENTE" >OTRO TIPO DE ACCIDENTE</option>
<option value="EVENTO CATASTROFICO" >EVENTO CATASTROFICO</option>
<option value="LESION POR AGRESION" >LESION POR AGRESION</option>
<option value="LESION AUTO INFLINGIDA" >LESION AUTO INFLINGIDA</option>
<option value="SOSPECHA DE MALTRATO FISICO" >SOSPECHA DE MALTRATO FISICO</option>
<option value="SOSPECHA DE ABUSO SEXUAL" >SOSPECHA DE ABUSO SEXUAL</option>
<option value="SOSPECHA DE VIOLENCIA SEXUAL" >SOSPECHA DE VIOLENCIA SEXUAL</option>
<option value="SOSPECHA DE MALTRATO EMOCIONAL" >SOSPECHA DE MALTRATO EMOCIONAL</option>
<option value="ENFERMEDAD GENERAL" >ENFERMEDAD GENERAL</option>
<option value="ENFERMEDAD PROFESIONAL U OCUPACIONAL" >ENFERMEDAD PROFESIONAL U OCUPACIONAL</option>
<option value="OTRO" >OTRO</option>
                      </select>
                </div> 
              </div>
            </div>

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla2"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX2()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar2()"><span class="fa fa-times"></span> Eliminar Dx</button>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Definitivo: <span class="symbol required"></span></label> 
<input name="idciedefinitivo[]" type="hidden" class="form-control" id="idciedefinitivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/>

<input type="text" id="definitivo" name="definitivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" required="" aria-required="true">

<textarea name="observaciondefinitivo[]" class="form-control" id="observaciondefinitivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Definitivo" title="Ingrese Observación de Dx Definitivo" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Conducta o Plan de Tratamiento: <span class="symbol required"></span></label> 
<textarea name="tratamiento" class="form-control" id="tratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Conducta o Plan de Tratamiento del Paciente" rows="3" required="" aria-required="true"></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Desea Realizar Remisión: <span class="symbol required"></span></label> 
<input id="boton" onClick="mostrar();" style="cursor: pointer;" class="btn btn-info waves-effect waves-light" value="SI" type="button"> 
        <div id="remision" style="display: none;" align="center">
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
        </div> 
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Fórmulas y Órdenes Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>  
                 <div class="form-group"> 
  <input type="hidden" id="formula" name="formula[]">
  <input type="hidden" id="formulamedica" name="formulamedica[]">
  <input type="hidden" id="idcieformula" name="idcieformula[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
               </div> 
           </div>


         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>  
                 <div class="form-group"> 
    <input type="hidden" id="ordenes" name="ordenes[]">
  <input type="hidden" id="ordenmedica" name="ordenmedica[]">
  <input type="hidden" id="idcieorden" name="idcieorden[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
      </div> 
    </div>

  </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('motivoconsulta').value = '',
    document.getElementById('examenfisico').value = '',
    document.getElementById('ta').value = '',
    document.getElementById('temperatura').value = '',
    document.getElementById('fc').value = '',
    document.getElementById('fr').value = '',
    document.getElementById('enfermedadpaciente').value = '',
    document.getElementById('antecedentepaciente').value = '',
    document.getElementById('antecedentefamiliares').value = '',
    document.getElementById('antecedentealergico').value = '',
    document.getElementById('antecedentepatologico').value = '',
    document.getElementById('antecedentequirurgico').value = '',
    document.getElementById('antecedentefarmacologico').value = '',
    document.getElementById('antecedenteginecologico').value = '',
    document.getElementById('historialgestacional').value = '',
    document.getElementById('planificacionfamiliar').value = '',
    document.getElementById('presuntivo').value = '',
    document.getElementById('observacionpresuntivo').value = '',
    document.getElementById('origenenfermedad').value = '',
    document.getElementById('definitivo').value = '',
    document.getElementById('observaciondefinitivo').value = '',
    document.getElementById('tratamiento').value = '',
    document.getElementById('remision').value = '',
    document.getElementById('formula').value = '',
    document.getElementById('formulamedica').value = '',
    document.getElementById('idcieformula').value = '',
    document.getElementById('ordenes').value = '',
    document.getElementById('ordenmedica').value = '',
    document.getElementById('idcieorden').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>
          
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR APERTURA DE HISTORIA MEDICA ############################
?>

























<?php 
############################# BUSQUEDA DE HOJA EVOLUTIVA ##########################################
if (isset($_GET['BuscaHojaEvolutiva']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearHojaEvolutiva('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-clipboard"></span> Procesar Hoja</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE HOJA EVOLUTIVA ##########################################
?>

<?php
############################# CREAR HOJA EVOLUTIVA ############################
if (isset($_GET['CreaHojaEvolutiva']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->BuscarHojaEvolutiva();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="HOJA EVOLUTIVA">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">
<input type="hidden" name="sexo" id="sexo" value="<?php echo $pa[0]['sexopaciente']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Motivo de Consulta</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Motivo de Consulta: <span class="symbol required"></span></label> 
<textarea name="motivoconsulta" class="form-control" id="motivoconsulta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Consulta" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>

              <div class="col-md-6"> 
                <div class="form-group has-feedback"> 
          <label class="control-label">Exámen Físico: <span class="symbol required"></span></label> 
 <textarea name="examenfisico" class="form-control" id="examenfisico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Exámen Físico" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div> 
            </div>

<?php if($pa[0]['sexopaciente']=="FEMENINO" && $modulo =="MEDICO GENERAL") { ?>

  <div class="row">

       <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Citologia: </label> 
 <input class="form-control nacimiento" type="text" name="fechacitologia" id="fechacitologia" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Citologia" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-4"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Esta Embarazada:</label> 
<select name="embarazada" id="embarazada" class='form-control' onchange="Embarazada()" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                             </div>  
                       </div>

       <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Mestruación: <span class="symbol required"></span></label> 
 <input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" disabled="disabled" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>
                </div> 


      <?php } elseif($pa[0]['sexopaciente']=="FEMENINO" && $modulo =="GINECOLOGO") { ?>

  <div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Citologia: </label> 
 <input class="form-control nacimiento" type="text" name="fechacitologia" id="fechacitologia" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Citologia" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
                 <label class="control-label">Esta Embarazada: <span class="symbol required"></span></label> 
<select name="embarazada" id="embarazada" class='form-control' onchange="Embarazada()" required="" aria-required="true">
                        <option value="">SELECCIONE</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                      </select>
                             </div>  
                       </div>

      <div class="col-md-4"> 
           <div class="form-group has-feedback"> 
        <label class="control-label">Fecha de Ultima Mestruación: <span class="symbol required"></span></label> 
 <input class="form-control nacimiento" type="text" name="fechamestruacion" id="fechamestruacion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Fecha de Mestruación" autocomplete="off" disabled="disabled" required="" aria-required="true">
                        <i class="fa fa-calendar form-control-feedback"></i>
                                 </div> 
                        </div>

<input type="hidden" name="di" id="di" value="28">
<input type="hidden" name="sem" id="sem" value="14"> 

      <div class="col-md-2"> 
         <div class="form-group has-feedback"><br>
<button type="button" class="btn btn-info waves-effect waves-light" onclick="CalcularEmbarazo()" name="calcular" id="calcular" disabled="disabled"><span class="fa fa-calculator"></span> Calcular Parto</button>
        </div> 
      </div>    
  </div> 

    <div class="row">
      <div id="result2"></div>                      
      <div id="result3"></div>
    </div> 

                        <?php } ?>            
          
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Signos Vitales</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<div class="row">

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">TA(mm/Hg): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="ta" id="ta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese TA" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-3"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">Temperatura:(&deg;C): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="temperatura" id="temperatura" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Temperatura" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">FC(por minuto): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fc" id="fc" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese FC" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">FR(por minuto): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="fr" id="fr" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese FR" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
                                 </div> 
                        </div>

       <div class="col-md-2"> 
           <div class="form-group has-feedback"> 
               <label class="control-label">PESO(Kg): <span class="symbol required"></span></label> 
<input class="form-control" type="text" name="peso" id="peso" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Peso" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Atención Actividad y/o Procedimiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
  <label class="control-label">Atención Actividad y/o Procedimiento: <span class="symbol required"></span></label> 
<textarea name="atenproced" class="form-control" id="atenproced" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención Actividad y/o Procedimiento" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Identificación del Origen de la Enfermedad o Accidente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Dx</button>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label> 
<input name="idciepresuntivo[]" type="hidden" class="form-control" id="idciepresuntivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/>

<input type="text" id="presuntivo" name="presuntivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true">

<textarea name="observacionpresuntivo[]" class="form-control" id="observacionpresuntivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Presuntivo" title="Ingrese Observación de Dx Presuntivo" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Origen de la Enfermedad o Accidente del Paciente: <span class="symbol required"></span></label> 
<select name="origenenfermedad" id="origenenfermedad" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="PACIENTE SANO" >PACIENTE SANO</option>
<option value="ACCIDENTE DE TRABAJO" >ACCIDENTE DE TRABAJO</option>
<option value="ACCIDENTE DE TRANSITO" >ACCIDENTE DE TRANSITO</option>
<option value="ACCIDENTE RAPIDO" >ACCIDENTE RAPIDO</option>
<option value="ACCIDENTE OFIDICO" >ACCIDENTE OFIDICO</option>
<option value="OTRO TIPO DE ACCIDENTE" >OTRO TIPO DE ACCIDENTE</option>
<option value="EVENTO CATASTROFICO" >EVENTO CATASTROFICO</option>
<option value="LESION POR AGRESION" >LESION POR AGRESION</option>
<option value="LESION AUTO INFLINGIDA" >LESION AUTO INFLINGIDA</option>
<option value="SOSPECHA DE MALTRATO FISICO" >SOSPECHA DE MALTRATO FISICO</option>
<option value="SOSPECHA DE ABUSO SEXUAL" >SOSPECHA DE ABUSO SEXUAL</option>
<option value="SOSPECHA DE VIOLENCIA SEXUAL" >SOSPECHA DE VIOLENCIA SEXUAL</option>
<option value="SOSPECHA DE MALTRATO EMOCIONAL" >SOSPECHA DE MALTRATO EMOCIONAL</option>
<option value="ENFERMEDAD GENERAL" >ENFERMEDAD GENERAL</option>
<option value="ENFERMEDAD PROFESIONAL U OCUPACIONAL" >ENFERMEDAD PROFESIONAL U OCUPACIONAL</option>
<option value="OTRO" >OTRO</option>
                      </select>
                </div> 
              </div>
            </div>

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla2"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX2()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar2()"><span class="fa fa-times"></span> Eliminar Dx</button>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Definitivo: <span class="symbol required"></span></label>
<input name="idciedefinitivo[]" type="hidden" class="form-control" id="idciedefinitivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/> 

<input type="text" id="definitivo" name="definitivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" required="" aria-required="true">

<textarea name="observaciondefinitivo[]" class="form-control" id="observaciondefinitivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Definitivo" title="Ingrese Observación de Dx Definitivo" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Conducta o Plan de Tratamiento: <span class="symbol required"></span></label> 
<textarea name="tratamiento" class="form-control" id="tratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Conducta o Plan de Tratamiento del Paciente" rows="3" required="" aria-required="true"></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Desea Realizar Remisión: <span class="symbol required"></span></label> 
<input id="boton" onClick="mostrar();" style="cursor: pointer;" class="btn btn-info waves-effect waves-light" value="SI" type="button"> 
        <div id="remision" style="display: none;" align="center">
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
        </div> 
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Fórmulas y Órdenes Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>  
                 <div class="form-group"> 
  <input type="hidden" id="formula" name="formula[]">
  <input type="hidden" id="formulamedica" name="formulamedica[]">
  <input type="hidden" id="idcieformula" name="idcieformula[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
               </div> 
           </div>


         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>  
                 <div class="form-group"> 
  <input type="hidden" id="ordenes" name="ordenes[]">
  <input type="hidden" id="ordenmedica" name="ordenmedica[]">
  <input type="hidden" id="idcieorden" name="idcieorden[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
      </div> 
    </div>

  </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('motivoconsulta').value = '',
    document.getElementById('examenfisico').value = '',
    document.getElementById('ta').value = '',
    document.getElementById('temperatura').value = '',
    document.getElementById('fc').value = '',
    document.getElementById('fr').value = '',
    document.getElementById('atenproced').value = '',
    document.getElementById('presuntivo').value = '',
    document.getElementById('observacionpresuntivo').value = '',
    document.getElementById('origenenfermedad').value = '',
    document.getElementById('definitivo').value = '',
    document.getElementById('observaciondefinitivo').value = '',
    document.getElementById('tratamiento').value = '',
    document.getElementById('remision').value = '',
    document.getElementById('formula').value = '',
    document.getElementById('formulamedica').value = '',
    document.getElementById('idcieformula').value = '',
    document.getElementById('ordenes').value = '',
    document.getElementById('ordenmedica').value = '',
    document.getElementById('idcieorden').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>
          
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR HOJA EVOLUTIVA ############################
?>




























<?php 
############################# BUSQUEDA DE REMISIONES ##########################################
if (isset($_GET['BuscaRemisiones']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearRemisiones('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-file-text"></span> Procesar Remisión</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REMISIONES ##########################################
?>

<?php
############################# CREAR REMISIONES ############################
if (isset($_GET['CreaRemisiones']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->BuscarHojaEvolutiva();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="REMISION">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Remisión de Paciente: <span class="symbol required"></span></label>  
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
                        <i class="fa fa-phone form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Fórmulas y Órdenes Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>  
                 <div class="form-group"> 
  <input type="hidden" id="formula" name="formula[]">
  <input type="hidden" id="formulamedica" name="formulamedica[]">
  <input type="hidden" id="idcieformula" name="idcieformula[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
               </div> 
           </div>


         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>  
                 <div class="form-group"> 
  <input type="hidden" id="ordenes" name="ordenes[]">
  <input type="hidden" id="ordenmedica" name="ordenmedica[]">
  <input type="hidden" id="idcieorden" name="idcieorden[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
      </div> 
    </div>

  </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('remision').value = '',
    document.getElementById('formula').value = '',
    document.getElementById('formulamedica').value = '',
    document.getElementById('idcieformula').value = '',
    document.getElementById('ordenes').value = '',
    document.getElementById('ordenmedica').value = '',
    document.getElementById('idcieorden').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>
          
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR REMISIONES ############################
?>



























<?php 
############################# BUSQUEDA DE FORMULAS MEDICAS ##########################################
if (isset($_GET['BuscaFormulasMedicas']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearFormulasMedicas('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-file-text"></span> Procesar Fórmula</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE FORMULAS MEDICAS ##########################################
?>

<?php
############################# CREAR FORMULAS MEDICAS ############################
if (isset($_GET['CreaFormulasMedicas']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->BuscarHojaEvolutiva();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="FORMULA MEDICA">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Órdenes y Fórmulas Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>  

<div class="form-group has-feedback"> 
      <label class="control-label">Nombre de Dx para Fórmula Médica: <span class="symbol required"></span></label>
<input name="idcieformula[]" type="hidden" class="form-control" id="idcieformula" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/> 

<input type="text" id="formula" name="formula[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx para Fórmula Médica" required="" aria-required="true">

<textarea name="formulamedica[]" class="form-control" id="formulamedica" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Fórmula Médica" title="Ingrese Observación de Fórmula Médica" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>

         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>
                 <div class="form-group"> 
  <input type="hidden" id="ordenes" name="ordenes[]">
  <input type="hidden" id="ordenmedica" name="ordenmedica[]">
  <input type="hidden" id="idcieorden" name="idcieorden[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Desea Realizar Remisión: <span class="symbol required"></span></label> 
<input id="boton" onClick="mostrar();" style="cursor: pointer;" class="btn btn-info waves-effect waves-light" value="SI" type="button"> 
        <div id="remision" style="display: none;" align="center">
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
        </div> 
                </div> 
              </div>
            </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('remision').value = '',
    document.getElementById('formula').value = '',
    document.getElementById('formulamedica').value = '',
    document.getElementById('idcieformula').value = '',
    document.getElementById('ordenes').value = '',
    document.getElementById('ordenmedica').value = '',
    document.getElementById('idcieorden').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR FORMULAS MEDICAS ############################
?>



























<?php 
############################# BUSQUEDA DE ORDENES MEDICAS ##########################################
if (isset($_GET['BuscaOrdenesMedicas']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearOrdenesMedicas('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-file-text"></span> Procesar Órden</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE ORDENES MEDICAS ##########################################
?>

<?php
############################# CREAR ORDENES MEDICAS ############################
if (isset($_GET['CreaOrdenesMedicas']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->BuscarHojaEvolutiva();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="ORDENES MEDICA">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Fórmulas y Órdenes Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">

         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>  

<div class="form-group has-feedback"> 
      <label class="control-label">Nombre de Dx para Órden Médica: <span class="symbol required"></span></label>
<input name="idcieorden[]" type="hidden" class="form-control" id="idcieorden" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/> 

<input type="text" id="ordenes" name="ordenes[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx para Órden Médica" required="" aria-required="true">

<textarea name="ordenmedica[]" class="form-control" id="ordenmedica" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Fórmula Médica" title="Ingrese Observación de Órden Médica" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div>
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
          </div> 
      </div>


           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>

                  <div class="form-group"> 
  <input type="hidden" id="formula" name="formula[]">
  <input type="hidden" id="formulamedica" name="formulamedica[]">
  <input type="hidden" id="idcieformula" name="idcieformula[]">
                  </div>


           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Desea Realizar Remisión: <span class="symbol required"></span></label> 
<input id="boton" onClick="mostrar();" style="cursor: pointer;" class="btn btn-info waves-effect waves-light" value="SI" type="button"> 
        <div id="remision" style="display: none;" align="center">
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
        </div> 
                </div> 
              </div>
            </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('remision').value = '',
    document.getElementById('formula').value = '',
    document.getElementById('formulamedica').value = '',
    document.getElementById('idcieformula').value = '',
    document.getElementById('ordenes').value = '',
    document.getElementById('ordenmedica').value = '',
    document.getElementById('idcieorden').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR ORDENES MEDICAS ############################
?>


























<?php 
############################# BUSQUEDA DE FORMULAS TERAPIAS ##########################################
if (isset($_GET['BuscaFormulasTerapias']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearFormulaTerapia('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-file-text-o"></span> Procesar Fórmula</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE FORMULAS TERAPIAS ##########################################
?>

<?php
############################# CREAR FORMULAS TERAPIAS ############################
if (isset($_GET['CreaFormulasTerapias']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Fórmulas para Terapias</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

             <div class="row">

  <div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            
                                            <tbody>
                                                <tr>
  <td colspan="4"><label>TERAPIAS</label></td>
                                                </tr>
                                                <tr>
  <td><label>TERAPIAS RESPIRATORIAS</label></td>
  <td><div align="center"><label>SERIES</label></div></td>
  <td><div class="form-group has-feedback"><input class="form-control" type="text" name="terapiasrespiratorias" id="terapiasrespiratorias" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Serie"><i class="fa fa-pencil form-control-feedback"></td>
  <td><label>DX</span></td>
                                                </tr>
                                                <tr>
  <td><label>TERAPIAS FISICAS </label></td>
  <td><div align="center"><label>SERIES</label></div></td>
  <td><div class="form-group has-feedback"><input class="form-control" type="text" name="terapiasfisicas" id="terapiasfisicas" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Serie"><i class="fa fa-pencil form-control-feedback"></td>
  <td><label>DX</span></td>
                                                </tr>
                                                <tr>
  <td><label>MICRONEBULIZACIONES</label></td>
  <td>&nbsp;</td>
  <td><div class="form-group has-feedback"><input class="form-control" type="text" name="micronebulizaciones" id="micronebulizaciones" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Dias"><i class="fa fa-pencil form-control-feedback"></i></td>
  <td><label">DIAS</label></td>
                                            </tr>
                                  </tbody>
                        </table>
                    </div>
              
            </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('terapiasrespiratorias').value = '',
    document.getElementById('terapiasfisicas').value = '',
    document.getElementById('micronebulizaciones').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR FORMULAS TERAPIAS ############################
?>

























<?php 
############################# BUSQUEDA DE SOLICITUD EXAMENES #################################
if (isset($_GET['BuscaSolicitudExamen']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearSolicitud('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-file-text-o"></span> Procesar Solicitud</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE SOLICITUD EXAMENES ################################
?>

<?php
############################# CREAR SOLICITUD EXAMENES ############################
if (isset($_GET['CreaSolicitudExamen']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Observación de Dx</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

        <div class="row"> 

          <div class="col-md-12"> 
                <div class="form-group has-feedback"> 
                        <label class="control-label">Búsqueda de Dx:</label> 
<input name="idcie" type="hidden" id="idcie"/>
<input type="text" id="examen" name="examen" onKeyUp="this.value=this.value.toUpperCase()" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" required="" aria-required="true">
                        <i class="fa fa-search form-control-feedback"></i>   
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Tipos Exámenes para Laboratorio</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

             <div class="row">

  <div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
                          <th><label">HEMATOLOGIA</label></th>
                          <th>&nbsp;</th>
                          <th><label">QUIMICA SANGUINEA</label></th>
                          <th>&nbsp;</th>
                          <th><label>MICROSCOPIA</label></th>
                          <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CUADRO HEMATICO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="cuadrohepatico" id="cuadrohepatico" type="checkbox" class="checks" value="X">
<label for="cuadrohepatico"> </label></div></div></td>
                                                    <td>GLICEMIA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="glicemia" id="glicemia" type="checkbox" class="checks" value="X">
<label for="glicemia"> </label></div></div></td>
                                                    <td>PARCIAL DE ORINA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="parcialorina" id="parcialorina" type="checkbox" class="checks" value="X">
<label for="parcialorina"> </label></div></div></td>
                                              </tr>
                                                <tr>
                                                  <td>HEMATOCRITO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="hematocrito" id="hematocrito" type="checkbox" class="checks" value="X">
<label for="hematocrito"> </label></div></div></td>
                                                  <td>COLESTEROL TOTAL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="colesteroltotal" id="colesteroltotal" type="checkbox" class="checks" value="X">
<label for="colesteroltotal"> </label></div></div></td>
                                                  <td>COPROLOGICO/MATERIA FECAL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="materiafecal" id="materiafecal" type="checkbox" class="checks" value="X">
<label for="materiafecal"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>HEMOGLOBINA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="hemoglobina" id="hemoglobina" type="checkbox" class="checks" value="X">
<label for="hemoglobina"> </label></div></div></td>
                                                  <td>COLESTEROL HDL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="colesterolhdl" id="colesterolhdl" type="checkbox" class="checks" value="X">
<label for="colesterolhdl"> </label></div></div></td>
                                                  <td>BACILOSCOPIA ESPUTO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="basiloscopia" id="basiloscopia" type="checkbox" class="checks" value="X">
<label for="basiloscopia"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>VSG</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="vsg" id="vsg" type="checkbox" class="checks" value="X">
<label for="vsg"> </label></div></div></td>
                                                  <td>COLESTEROL LDL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="colesterolldl" id="colesterolldl" type="checkbox" class="checks" value="X">
<label for="colesterolldl"> </label></div></div></td>
                                                  <td>KOH</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="koh" id="koh" type="checkbox" class="checks" value="X">
<label for="koh"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>ESP</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="esp" id="esp" type="checkbox" class="checks" value="X">
<label for="esp"> </label></div></div></td>
                                                  <td>TRIGLICERIDOS</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="trigliceridos" id="trigliceridos" type="checkbox" class="checks" value="X">
<label for="trigliceridos"> </label></div></div></td>
                                                  <td>FROTIS FLUJO VAGINAL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="flujovaginal" id="flujovaginal" type="checkbox" class="checks" value="X">
<label for="flujovaginal"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>EXT. GOTA GRUESA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="gotagruesa" id="gotagruesa" type="checkbox" class="checks" value="X">
<label for="gotagruesa"> </label></div></div></td>
                                                  <td>CREATININA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="creatinina" id="creatinina" type="checkbox" class="checks" value="X">
<label for="creatinina"> </label></div></div></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                        <tr>
                                                  <td>GRUPO O FACTOR RH</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="factorrh" id="factorrh" type="checkbox" class="checks" value="X">
<label for="factorrh"> </label></div></div></td>
                                                  <td>BUN</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="bun" id="bun" type="checkbox" class="checks" value="X">
<label for="bun"> </label></div></div></td>
                                                  <td><span class="Estilo1"><strong>INMUNOLOGIA</strong></span></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>UREA</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="urea" id="urea" type="checkbox" class="checks" value="X">
<label for="urea"> </label></div></div></td>
                                                  <td>GRAVINDEX/PRUEBA DE EMBARAZO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="embarazo" id="embarazo" type="checkbox" class="checks" value="X">
<label for="embarazo"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>ACIDO URICO</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="acidourico" id="acidourico" type="checkbox" class="checks" value="X">
<label for="acidourico"> </label></div></div></td>
                                                  <td>SEROLOGIA VDRL</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="serologia" id="serologia" type="checkbox" class="checks" value="X">
<label for="serologia"> </label></div></div></td>
                                                </tr>
                        <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>GLICEMIA PRE Y POST</td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="gliecemiapre" id="gliecemiapre" type="checkbox" class="checks" value="X">
<label for="gliecemiapre"> </label></div></div></td>
                                                  <td><span class="Estilo1"><strong>OTROS</strong></span></td>
<td><div align="center"><div class="checkbox checkbox-primary">
<input name="otros" id="otros" type="checkbox" class="checks" value="X">
<label for="otros"> </label></div></div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                    </div>
              
            </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('terapiasrespiratorias').value = '',
    document.getElementById('terapiasfisicas').value = '',
    document.getElementById('micronebulizaciones').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR SOLICITUD EXAMENES ############################
?>


<?php 
############################# BUSQUEDA DE REPORTE CONSULTORIO ##################################
if (isset($_GET['BuscaReporteConsultorio']) && isset($_GET['optradio']) && isset($_GET['codpaciente'])) { 

$codpaciente = $_GET['codpaciente'];
$optradio = $_GET['optradio'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE </div></center>";
exit;
    
} else {

$con = new Login();
$reg = $con->BuscarReportesConsultorio();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-tasks"></i> 
<?php if($optradio == '1') { ?> Aperturas de Historias Médicas 
<?php } elseif($optradio == '2') { ?> Hojas Evolutivas 
<?php } elseif($optradio == '3') { ?> Remisiones 
<?php } elseif($optradio == '4') { ?> Fórmulas Médicas 
<?php } elseif($optradio == '5') { ?> Órdenes Médicas 
<?php } elseif($optradio == '6') { ?> Fórmulas de Terapias 
<?php } elseif($optradio == '7') { ?> Solicitud de Exámenes de Laboratorio 
<?php } ?> del Paciente <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></h3>
                                    </div>
             <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Medico</th>
                                  <th>Procedimiento</th>
                                  <th>Fecha/Hora</th>
                                  <th>Imprimir</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
<td><?php echo $a++; ?></td>
<td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
<td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>

<td>
<?php 
if($optradio == '1') { echo "APERTURAS DE HISTORIAS"; } 
elseif($optradio == '5') { echo "FORMULAS DE TERAPIAS"; } 
elseif($optradio == '7') { echo "SOLICITUD DE EXAMENES"; } 
else { echo $reg[$i]['procedimiento']; } ?></td>

<td>
<?php 
if($optradio == '1') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaapertura'])); } 
elseif($optradio == '2') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechagenerahoja'])); } 
elseif($optradio == '3') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fecharemision'])); } 
elseif($optradio == '4') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaformula'])); } 
elseif($optradio == '5') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaorden'])); } 
elseif($optradio == '6') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaformulaterapia'])); }
elseif($optradio == '7') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechasolicitud'])); } ?></td>

<td><?php if($optradio == '1') { ?> 
<a href="reportepdf?a=<?php echo base64_encode($reg[$i]['codapertura']); ?>&tipo=<?php echo base64_encode("APERTURAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '2') { ?> 
<a href="reportepdf?h=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("HOJAEVOLUTIVA") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '3') { ?> 
<a href="reportepdf?r=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("REMISIONES") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '4') { ?> 
<a href="reportepdf?fm=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("FORMULASMEDICAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '5') { ?> 
<a href="reportepdf?om=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("ORDENESMEDICAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '6') { ?> 
<a href="reportepdf?ft=<?php echo base64_encode($reg[$i]['codfterapia']); ?>&tipo=<?php echo base64_encode("FORMULASTERAPIAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '7') { ?> 
<a href="reportepdf?se=<?php echo base64_encode($reg[$i]['codexamen']); ?>&tipo=<?php echo base64_encode("SOLICITUDEXAMEN") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>  <?php } ?></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REPORTE CONSULTORIO ################################
?>

































<?php 
############################# BUSQUEDA DE CRIOCAUTERZACION #####################################
if (isset($_GET['BuscaCriocauterizacion']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearCriocauterizacion('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-clipboard"></span> Procesar Criocauterización</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE CRIOCAUTERZACION ##########################################
?>

<?php
############################# CREAR CRIOCAUTERZACION ############################
if (isset($_GET['CreaCriocauterizacion']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="procedimiento" id="procedimiento" value="CRIOCAUTERIZACION">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">
<input type="hidden" name="sexo" id="sexo" value="<?php echo $pa[0]['sexopaciente']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Motivo de Consulta</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Motivo de Consulta: <span class="symbol required"></span></label> 
<textarea name="motivoconsulta" class="form-control" id="motivoconsulta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Consulta" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Atención Actividad y/o Procedimiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
  <label class="control-label">Atención Actividad y/o Procedimiento: <span class="symbol required"></span></label> 
<textarea name="atenproced" class="form-control" id="atenproced" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención Actividad y/o Procedimiento" rows="2" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Identificación del Origen de la Enfermedad o Accidente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Dx</button>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label> 
<input name="idciepresuntivo[]" type="hidden" class="form-control" id="idciepresuntivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/>

<input type="text" id="presuntivo" name="presuntivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true">

<textarea name="observacionpresuntivo[]" class="form-control" id="observacionpresuntivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Presuntivo" title="Ingrese Observación de Dx Presuntivo" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Origen de la Enfermedad o Accidente del Paciente: <span class="symbol required"></span></label> 
<select name="origenenfermedad" id="origenenfermedad" class='form-control' required="" aria-required="true">
                        <option value="">SELECCIONE</option>
<option value="PACIENTE SANO" >PACIENTE SANO</option>
<option value="ACCIDENTE DE TRABAJO" >ACCIDENTE DE TRABAJO</option>
<option value="ACCIDENTE DE TRANSITO" >ACCIDENTE DE TRANSITO</option>
<option value="ACCIDENTE RAPIDO" >ACCIDENTE RAPIDO</option>
<option value="ACCIDENTE OFIDICO" >ACCIDENTE OFIDICO</option>
<option value="OTRO TIPO DE ACCIDENTE" >OTRO TIPO DE ACCIDENTE</option>
<option value="EVENTO CATASTROFICO" >EVENTO CATASTROFICO</option>
<option value="LESION POR AGRESION" >LESION POR AGRESION</option>
<option value="LESION AUTO INFLINGIDA" >LESION AUTO INFLINGIDA</option>
<option value="SOSPECHA DE MALTRATO FISICO" >SOSPECHA DE MALTRATO FISICO</option>
<option value="SOSPECHA DE ABUSO SEXUAL" >SOSPECHA DE ABUSO SEXUAL</option>
<option value="SOSPECHA DE VIOLENCIA SEXUAL" >SOSPECHA DE VIOLENCIA SEXUAL</option>
<option value="SOSPECHA DE MALTRATO EMOCIONAL" >SOSPECHA DE MALTRATO EMOCIONAL</option>
<option value="ENFERMEDAD GENERAL" >ENFERMEDAD GENERAL</option>
<option value="ENFERMEDAD PROFESIONAL U OCUPACIONAL" >ENFERMEDAD PROFESIONAL U OCUPACIONAL</option>
<option value="OTRO" >OTRO</option>
                      </select>
                </div> 
              </div>
            </div>

             <div class="row">

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
        <table width="100%" id="tabla2"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX2()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar2()"><span class="fa fa-times"></span> Eliminar Dx</button>
                 <div class="form-group has-feedback"> 
                      <label class="control-label">Dx Definitivo: <span class="symbol required"></span></label>
<input name="idciedefinitivo[]" type="hidden" class="form-control" id="idciedefinitivo" onKeyUp="this.value=this.value.toUpperCase()" autocomplete="off" placeholder="Ingrese Código de Dx" required="required"/> 

<input type="text" id="definitivo" name="definitivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Búsqueda" title="Ingrese Dx Definitivo" required="" aria-required="true">

<textarea name="observaciondefinitivo[]" class="form-control" id="observaciondefinitivo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Dx Definitivo" title="Ingrese Observación de Dx Definitivo" rows="2" required="" aria-required="true"></textarea>
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
<label class="control-label">Conducta o Plan de Tratamiento: <span class="symbol required"></span></label> 
<textarea name="tratamiento" class="form-control" id="tratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Conducta o Plan de Tratamiento del Paciente" rows="3" required="" aria-required="true"></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Remisión</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
        <label class="control-label">Desea Realizar Remisión: <span class="symbol required"></span></label> 
<input id="boton" onClick="mostrar();" style="cursor: pointer;" class="btn btn-info waves-effect waves-light" value="SI" type="button"> 
        <div id="remision" style="display: none;" align="center">
<textarea name="remision" class="form-control" id="remision" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Remisión del Paciente" rows="2" required="" aria-required="true"></textarea>
        </div> 
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Recetar Fórmulas y Órdenes Médicas</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">
          <table width="100%" id="tabla3"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX3()"><span class="fa fa-plus"></span> Agregar Fórmula</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar3()"><span class="fa fa-times"></span> Eliminar Fórmula</button>  
                 <div class="form-group"> 
  <input type="hidden" id="formula" name="formula[]">
  <input type="hidden" id="formulamedica" name="formulamedica[]">
  <input type="hidden" id="idcieformula" name="idcieformula[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
               </div> 
           </div>


         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla4">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX4()"><span class="fa fa-plus"></span> Agregar Orden</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar4()"><span class="fa fa-times"></span> Eliminar Orden</button>  
                 <div class="form-group"> 
  <input type="hidden" id="ordenes" name="ordenes[]">
  <input type="hidden" id="ordenmedica" name="ordenmedica[]">
  <input type="hidden" id="idcieorden" name="idcieorden[]">
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
      </div> 
    </div>

  </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('motivoconsulta').value = '',
    document.getElementById('atenproced').value = '',
    document.getElementById('presuntivo').value = '',
    document.getElementById('observacionpresuntivo').value = '',
    document.getElementById('origenenfermedad').value = '',
    document.getElementById('definitivo').value = '',
    document.getElementById('observaciondefinitivo').value = '',
    document.getElementById('tratamiento').value = '',
    document.getElementById('remision').value = '',
    document.getElementById('formula').value = '',
    document.getElementById('formulamedica').value = '',
    document.getElementById('idcieformula').value = '',
    document.getElementById('ordenes').value = '',
    document.getElementById('ordenmedica').value = '',
    document.getElementById('idcieorden').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>
          
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR CRIOCAUTERZACION ############################
?>

































<?php 
############################# BUSQUEDA DE COLPOSCOPIAS #####################################
if (isset($_GET['BuscaColposcopia']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearColposcopias('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-clipboard"></span> Procesar Colposcopia</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE COLPOSCOPIAS ##########################################
?>

<?php
############################# CREAR COLPOSCOPIAS ############################
if (isset($_GET['CreaColposcopia']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
  <div class="col-md-12">
    <div class="panel panel-border panel-primary">
      <div class="panel-body">

        <div class="row">
    <img src="fotos/img_colpos.png" width="100%" />          
        </div>          

      </div>
    </div>
  </div>
</div>
              
<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Resultados de Colposcopia</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

       <div class="row">
               <div class="col-md-12">


<div class="table-responsive" data-pattern="priority-columns"><table width="100%">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr>
<td><label>1. EPITELIO ORIGINAL CAPILAR FINA</label></td>
<td><div class="form-group has-feedback"><input name="epiteliooriginal" type="text" class="form-control" id="epiteliooriginal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Zona de transformación Tipica </label></td>
<td><div class="form-group has-feedback"><input name="transformaciontipica" type="text" class="form-control" id="transformaciontipica" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>2. ASPECTO INFLAMATORIO </label></td>
<td><div class="form-group has-feedback"><input name="aspectoinflamatorio" type="text" class="form-control" id="aspectoinflamatorio" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Zona de transformación Atipica </label></td>
<td><div class="form-group has-feedback"><input name="transformacionatipica" type="text" class="form-control" id="transformacionatipica" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Aumento red vascular y/o vasos dilatados </label></td>
<td><div class="form-group has-feedback"><input name="aumentoredvascular" type="text" class="form-control" id="aumentoredvascular" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Mosaico </label></td>
<td><div class="form-group has-feedback"><input name="mosaico" type="text" class="form-control" id="mosaico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>3. IMAGENES ATIPICAS </label></td>
<td><div class="form-group has-feedback"><input name="imagenesatipicas" type="text" class="form-control" id="imagenesatipicas" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Vasos atípicos(hormquilla, sacacorchos, astenosis, dilataciones) </label></td>
<td><div class="form-group has-feedback"><input name="vasosatipicos" type="text" class="form-control" id="vasosatipicos" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Epitelio Acetoblanco </label></td>
<td><div class="form-group has-feedback"><input name="epitelioacetoblanco" type="text" class="form-control" id="epitelioacetoblanco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Condiloma </label></td>
<td><div class="form-group has-feedback"><input name="condiloma" type="text" class="form-control" id="condiloma" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Base o punteado </label></td>
<td><div class="form-group has-feedback"><input name="baseopunteado" type="text" class="form-control" id="baseopunteado" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Severas alteraciones vasculares y/o aumento de la distancia intercapilar </label></td>
<td><div class="form-group has-feedback"><input name="alteracionesvasculares" type="text" class="form-control" id="alteracionesvasculares" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>4. ASPECTO TUMORAL </label></td>
<td><div class="form-group has-feedback"><input name="aspectotumoral" type="text" class="form-control" id="aspectotumoral" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- VPH </label></td>
<td><div class="form-group has-feedback"><input name="vph" type="text" class="form-control" id="vph" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Ulcerativo </label></td>
<td><div class="form-group has-feedback"><input name="ulcerativo" type="text" class="form-control" id="ulcerativo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- NIC </label></td>
<td><div class="form-group has-feedback"><input name="nic" type="text" class="form-control" id="nic" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>- Proliferativo </label></td>
<td><div class="form-group has-feedback"><input name="proliferativo" type="text" class="form-control" id="proliferativo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td><label>- Ca. Invasor </label></td>
<td><div class="form-group has-feedback"><input name="cainvasor" type="text" class="form-control" id="cainvasor" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td><label>5. IMPRESIóN DIAGNOSTICA </label></td>
<td><div class="form-group has-feedback"><input name="impresiondiagnostica" type="text" class="form-control" id="impresiondiagnostica" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" required="" aria-required="true"/><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td><label>- Normal </label></td>
<td><div class="form-group has-feedback"><input name="impresionnormal" type="text" class="form-control" id="impresionnormal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td><label>- Inflamatoria </label></td>
<td><div class="form-group has-feedback"><input name="impresioninflamatoria" type="text" class="form-control" id="impresioninflamatoria" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="5"><label>OBSERVACIONES: <span class="symbol required"></span></label></td>
                                          </tr>
                                          <tr>
<td colspan="5"><div class="form-group has-feedback"><textarea name="observacionesimpresion" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="observacionesimpresion" placeholder="Ingrese Observaciones de Impresion Diagnostica" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                        </tbody>
                                      </table>        
                          
                          
                      
                                       <table width="100%">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr>
<td colspan="3"><label>1. La unión escamocolumnar es visible? </label></td>
<td><div class="radio radio-primary"><input name="union" id="union1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="union1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="union" id="union2" class="radio" value="NO" required="" aria-required="true" /><label for="union2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="3"><label>2. La lesión es complentamente visible? </label></td>
<td><div class="radio radio-primary"><input name="lesion" id="lesion1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="lesion1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="lesion" id="lesion2" class="radio" value="NO" required="" aria-required="true" /><label for="lesion2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>Otros: <span class="symbol required"></span></label></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="7"><div class="form-group has-feedback"><textarea name="otros" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="otros" placeholder="Ingrese Otros" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>Sitio de la Biopsia: <span class="symbol required"></span></label></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="7"><div class="form-group has-feedback"><textarea name="biopsia" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="biopsia" placeholder="Ingrese Sitio de la Biopsia" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="2">&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>- Exocervix: </label></td>
<td><div class="form-group has-feedback"><input name="exocervix" type="text" class="form-control" id="exocervix" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>- Vagina: </label></td>
<td><div class="form-group has-feedback"><input name="vagina" type="text" class="form-control" id="vagina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>- Uniones escamoculumnar: </label></td>
<td><div class="form-group has-feedback"><input name="escamoculumnar" type="text" class="form-control" id="escamoculumnar" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>- Endocervix: </label></td>
<td><div class="form-group has-feedback"><input name="endocervix" type="text" class="form-control" id="endocervix" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>- Endometrio: </label></td>
<td><div class="form-group has-feedback"><input name="endometrio" type="text" class="form-control" id="endometrio" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                        </tbody>
                                      </table></div>
              </div>         
       </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('impresiondiagnostica').value = '',
    document.getElementById('observacionesimpresion').value = '',
    document.getElementById('otros').value = '',
    document.getElementById('biopsia').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>
          
                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR COLPOSCOPIAS ############################
?>

































<?php 
############################# BUSQUEDA DE ECOGRAFIAS #####################################
if (isset($_GET['BuscaEcografia']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearEcografia('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-clipboard"></span> Procesar Ecografía</button>
</td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE ECOGRAFIAS ##########################################
?>

<?php
############################# CREAR ECOGRAFIAS ############################
if (isset($_GET['CreaEcografia']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">
<input type="hidden" name="registrar" value="ok"/>

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<input type="text" class="form-control" name="procedimientoecografia" id="procedimientoecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Procedimiento Ecográfico" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>

          <div class="col-md-3">
                              <div class="form-group has-feedback"> <br>             
<button type="button" class="btn btn-info waves-effect waves-light w-xs m-b-5" data-href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-placement="left" data-backdrop="static" data-keyboard="false" data-id="" rel="tooltip" title="Ver" onClick="BuscaPlantillaEcografia('<?php echo $pa[0]["codmedico"] ?>')"><span class="fa fa-paste"></span> Usar Plantilla Ecográfica</button>
                              </div>
          </div>
                    

                    </div>

  
             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Descripción Ecográfica: <span class="symbol required"></span></label> 
<textarea name="observacionecografia" class="form-control" id="observacionecografia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripción Ecográfica" rows="12" required="" aria-required="true"></textarea> 
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
      </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('archivos').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR ECOGRAFIAS ############################
?>

<?php 
###################### BUSQUEDA DE PLANTILLAS ECOGRAFIAS Y MOSTRAR EN VENTANA MODAL ########################
if (isset($_GET['BuscaPlantillaEcografia']) && isset($_GET['codmedico'])) { 

$codmedico = $_GET['codmedico'];

$tri = new Login();
$reg = $tri->BuscarPlantillasEcograficasModal();
?>

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                              <tr>
<td colspan="6"><center><label>PLANTILLAS ASIGNADAS PARA <?php echo $reg[0]['moduloespec']; ?> DE EL (LA) <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></label></center></td>
                                              </tr>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Nombre de Plantilla</th>
                                                    <th>Procedimiento de Plantilla</th>
                                                    <th>Descripción de Plantilla</th>
                                                    <th>Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
                                                <tr>
                <td><?php echo $a++; ?></td>
                <td><?php echo $reg[$i]['nombreplantillaecografia']; ?></td>
                <td><?php echo $reg[$i]['procedimientoecografia']; ?></td>
<td><abbr title="<?php echo $reg[$i]['descripcionecografia']; ?>"><?php echo getSubString($reg[$i]['descripcionecografia'], 22); ?></abbr></td>
<td>
<button class="btn btn-icon btn-primary" data-dismiss="modal" title="Cargar" 
onClick="CargaPlantillaEcografica('<?php echo $reg[$i]['nombreplantillaecografia']; ?>','<?php echo $reg[$i]['procedimientoecografia']; ?>','<?php echo $reg[$i]['descripcionecografia']; ?>')"> <i class="fa fa-mail-forward"></i> </button>
</td>
                                                </tr>
                        <?php  }  ?>
                                            </tbody>
                    </table>
             </div>
      </div>
</div>                               
<?php
  } 
###################### BUSQUEDA DE PLANTILLAS ECOGRAFIAS Y MOSTRAR EN VENTANA MODAL ########################
?>




<?php 
############################# BUSQUEDA DE REPORTE GINECOLOGIA ##################################
if (isset($_GET['BuscaReporteGinecologia']) && isset($_GET['optradio']) && isset($_GET['codpaciente'])) { 

$codpaciente = $_GET['codpaciente'];
$optradio = $_GET['optradio'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE </div></center>";
exit;
    
} else {

$con = new Login();
$reg = $con->BuscarReportesGinecologia();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-tasks"></i> 
<?php if($optradio == '1') { ?> Aperturas de Historias Médicas 
<?php } elseif($optradio == '2') { ?> Hojas Evolutivas 
<?php } elseif($optradio == '3') { ?> Remisiones 
<?php } elseif($optradio == '4') { ?> Fórmulas Médicas 
<?php } elseif($optradio == '5') { ?> Órdenes Médicas 
<?php } elseif($optradio == '6') { ?> Criocauterización 
<?php } elseif($optradio == '7') { ?> Colposcopias 
<?php } elseif($optradio == '8') { ?> Ecografías 
<?php } ?> del Paciente <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></h3>
                                    </div>
             <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Medico</th>
                                  <th>Procedimiento</th>
                                  <th>Fecha/Hora</th>
                                  <th>Imprimir</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
<td><?php echo $a++; ?></td>
<td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
<td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>

<td>
<?php 
if($optradio == '1') { echo "APERTURAS DE HISTORIAS"; } 
elseif($optradio == '7') { echo "COLPOSCOPIAS"; } 
elseif($optradio == '8') { echo "ECOGRAFÍAS"; } 
else { echo $reg[$i]['procedimiento']; } ?></td>

<td>
<?php 
if($optradio == '1') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaapertura'])); } 
elseif($optradio == '2') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechagenerahoja'])); } 
elseif($optradio == '3') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fecharemision'])); } 
elseif($optradio == '4') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaformula'])); } 
elseif($optradio == '5') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaorden'])); } 
elseif($optradio == '6') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechagenerahoja'])); }
elseif($optradio == '7') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechacolposcopia'])); }
elseif($optradio == '8') { echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaecografia'])); } ?></td>

<td><?php if($optradio == '1') { ?> 
<a href="reportepdf?a=<?php echo base64_encode($reg[$i]['codapertura']); ?>&tipo=<?php echo base64_encode("APERTURAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '2') { ?> 
<a href="reportepdf?h=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("HOJAEVOLUTIVA") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '3') { ?> 
<a href="reportepdf?r=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("REMISIONES") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '4') { ?> 
<a href="reportepdf?fm=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("FORMULASMEDICAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '5') { ?> 
<a href="reportepdf?om=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("ORDENESMEDICAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '6') { ?> 
<a href="reportepdf?c=<?php echo base64_encode($reg[$i]['codprocedimiento']); ?>&tipo=<?php echo base64_encode("CRIOCAUTERIZACION") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '7') { ?> 
<a href="reportepdf?co=<?php echo base64_encode($reg[$i]['codcolposcopia']); ?>&tipo=<?php echo base64_encode("COLPOSCOPIAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } elseif($optradio == '8') { ?> 
<a href="reportepdf?ec=<?php echo base64_encode($reg[$i]['codecografia']); ?>&tipo=<?php echo base64_encode("ECOGRAFIAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>  <?php } ?></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REPORTE GINECOLOGIA ################################
?>


























<?php 
############################# BUSQUEDA DE EXAMEN LABORATORIO #####################################
if (isset($_GET['BuscaLaboratorio']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td><button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearLaboratorio('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-plus-square"></span> Procesar Exámen</button></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE EXAMEN LABORATORIO ##########################################
?>

<?php
############################# CREAR EXAMEN LABORATORIO ############################
if (isset($_GET['CreaLaboratorio']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();

$valor = new Login();
$valor = $valor->ValorLaboratorioPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Exámenes de Laboratorio</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">

    <div class="col-lg-12"> 
        <ul class="nav nav-tabs tabs" style="font-size: 14px"> 
              <li class="active"> 
                    <a href="#home" data-toggle="tab" aria-expanded="true"> 
                      <span class="hidden-xs"><abbr title="HEMATOLOGIA">HEMATOLOGÍA</abbr></span>
                    </a>                  
              </li> 
                   
              <li class=""> 
                    <a href="#profile" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="QUIMICA SANGUINEA">QUIMICA SANG.</abbr></span>
                    </a>                  
              </li> 
              
              <li class=""> 
                    <a href="#messages" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="UROANÁLISIS">UROANÁLISIS</abbr></span>
                    </a>                  
              </li> 
              
              <li class=""> 
                    <a href="#settings" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="FLUJO VAGINAL">FLUJO VAGINAL</abbr></span>
                    </a>                  
              </li> 
              
              <li class=""> 
                    <a href="#cinco" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="INMUNOLOGÍA">INMUNOLOGÍA</abbr></span
                    </a>                  
              </li> 
              
              <li class="">                                      
                    <a href="#seis" data-toggle="tab" aria-expanded="false"> 
                      <span class="hidden-xs"><abbr title="PARASITO-MICROBIOLOGÍA">PARASITO-MICROBIOLOGÍA</abbr></span> 
                    </a>                 
              </li>
        </ul> 
                
    
    <div class="tab-content"> 
                                
                <div class="tab-pane active" id="home"> 
                               
<div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                           <thead>
                                                <tr>
<th colspan="5"><label><center>HEMATOLOGÍA</center></label></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
<td width="353"><label>EXÁMEN</span></td>
<td colspan="2"><label>RESULTADO</label></td>
<td colspan="2"><label>VALOR NORMAL</label></td>
                                                </tr>
                                                <tr>
<td>HEMATOCRITO</td>
<td width="250"><div class="form-group has-feedback"><input name="hematocrito" type="text" class="form-control" id="hematocrito" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado"><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="190"><div align="right">%</div></td>
<td width="210"><div align="right"><?php echo $valor[0]['hematocritov']; ?></div></td>
<td width="170"><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>HEMOGLOBINA</td>
<td><div class="form-group has-feedback"><input name="hemoglobina" type="text" class="form-control" id="hemoglobina" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">gr/dl</div></td>
<td><div align="right"><?php echo $valor[0]['hemoglobinav']; ?></div></td>
<td><div align="right">gr/dl</div></td>
                                                </tr>
                                                <tr>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input name="leucocitos" type="text" class="form-control" id="leucocitos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mm3</div></td>
<td><div align="right"><?php echo $valor[0]['leucocitosv']; ?></div></td>
<td><div align="right">mm3</div></td>
                                                </tr>
                                                <tr>
<td>NEUTROFILOS</td>
<td><div class="form-group has-feedback"><input name="neutrofilos" type="text" class="form-control" id="neutrofilos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['neutrofilosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>LINFOCITOS</td>
<td><div class="form-group has-feedback"><input name="linfocitos" type="text" class="form-control" id="linfocitos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['linfocitosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>EOSINOFILOS</td>
<td><div class="form-group has-feedback"><input name="eosinofilos" type="text" class="form-control" id="eosinofilos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['eosinofilosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>MONOCITOS</td>
<td><div class="form-group has-feedback"><input name="monositos" type="text" class="form-control" id="monositos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['monositosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>BASOFILOS</td>
<td><div class="form-group has-feedback"><input name="basofilos" type="text" class="form-control" id="basofilos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['basofilosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>CAYADOS</td>
<td><div class="form-group has-feedback"><input name="cayados" type="text" class="form-control" id="cayados" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['cayadosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>PLAQUETAS</td>
<td><div class="form-group has-feedback"><input name="plaquetas" type="text" class="form-control" id="plaquetas" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mm3</div></td>
<td><div align="right"><?php echo $valor[0]['plaquetasv']; ?></div></td>
<td><div align="right">mm3</div></td>
                                                </tr>
                                                <tr>
<td>RETICULOCITOS</td>
<td><div class="form-group has-feedback"><input name="reticulositos" type="text" class="form-control" id="reticulositos" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">%</div></td>
<td><div align="right"><?php echo $valor[0]['reticulositosv']; ?></div></td>
<td><div align="right">%</div></td>
                                                </tr>
                                                <tr>
<td>V.S.G</td>
<td><div class="form-group has-feedback"><input name="vsg" type="text" class="form-control" id="vsg" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mm/hr</div></td>
<td><div align="right"><?php echo $valor[0]['vsgv']; ?></div></td>
<td><div align="right">mm/hr</div></td>
                                                </tr>
                                                <tr>
<td>PT</td>
<td><div class="form-group has-feedback"><input name="pt" type="text" class="form-control" id="pt" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">seg. CD</div></td>
<td><div align="right"><?php echo $valor[0]['ptv']; ?></div></td>
<td><div align="right">seg. CD</div></td>
                                                </tr>
                                                <tr>
<td>PTT</td>
<td><div class="form-group has-feedback"><input name="ptt" type="text" class="form-control" id="ptt" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">seg. CD</div></td>
<td><div align="right"><?php echo $valor[0]['pttv']; ?></div></td>
<td><div align="right">seg. CD</div></td>
                                                </tr>
                                                <tr>
<td><label>HEMOCLASIFICACIÓN</label></td>
<td><label>GRUPO</label></td>
<td><div class="form-group has-feedback"><input name="clasifgrupo" type="text" class="form-control" id="clasifgrupo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>RH:</td>
<td><div class="form-group has-feedback"><input name="clasifrh" type="text" class="form-control" id="clasifrh" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                                </tr>
                                                <tr>
<td colspan="5"><label>OBSERVACIONES:</label></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacioneshematologia" cols="80" rows="2" onKeyUp="this.value=this.value.toUpperCase();" class="form-control" id="observacioneshematologia" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"></textarea><i class="fa fa-pencil form-control-feedback"></i>                                             </td>
                                                </tr>
                                        </tbody>
                                   </table>  
                                </div>
                           </div> 
                
<div class="tab-pane" id="profile"> 
             <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
<th colspan="5"><label>QUÍMICA SANGUÍNEA </label></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
<td width="353"><label>EXÁMEN</label></td>
<td colspan="2"><label>RESULTADO</label></td>
<td colspan="2"><label>VALOR NORMAL</label></td>
                                              </tr>
                                                <tr>
<td width="353">GLUCOSA</td>
<td width="268"><div class="form-group has-feedback"><input name="glucosa" type="text" class="form-control" id="glucosa" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="192"><div align="right">mg/dl</div></td>
<td width="222"><div align="right"><?php echo $valor[0]['glucosav']; ?></div></td>
<td width="167"><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>COLESTEROL TOTAL</td>
<td><div class="form-group has-feedback"><input name="colesteroltotal" type="text" class="form-control" id="colesteroltotal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['colesteroltotalv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>COLESTEROL HDL</td>
<td><div class="form-group has-feedback"><input name="colesterolhdl" type="text" class="form-control" id="colesterolhdl" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['colesterolhdlv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>COLESTEROL LDL</td>
<td><div class="form-group has-feedback"><input name="colesterolldl" type="text" class="form-control" id="colesterolldl" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['colesterolldlv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>TRIGLICERIDOS</td>
<td><div class="form-group has-feedback"><input name="trigliceridos" type="text" class="form-control" id="trigliceridos" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['trigliceridosv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>ACIDO ÚRICO</td>
<td><div class="form-group has-feedback"><input name="acidourico" type="text" class="form-control" id="acidourico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['acidouricov']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>NITROGENO UREICO</td>
<td><div class="form-group has-feedback"><input name="nitrogenoureico" type="text" class="form-control" id="nitrogenoureico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['nitrogenoureicov']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>CREATININA</td>
<td><div class="form-group has-feedback"><input name="creatinina" type="text" class="form-control" id="creatinina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['creatininav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>PROTEINAS TOTALES</td>
<td><div class="form-group has-feedback"><input name="proteinastotales" type="text" class="form-control" id="proteinastotales" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['proteinastotalesv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>ALBÚMINA</td>
<td><div class="form-group has-feedback"><input name="albumina" type="text" class="form-control" id="albumina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['albuminav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>GLOBULINAS</td>
<td><div class="form-group has-feedback"><input name="globulina" type="text" class="form-control" id="globulina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['globulinav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>BILIRRUBINA TOTAL</td>
<td><div class="form-group has-feedback"><input name="bilirrubinatotal" type="text" class="form-control" id="bilirrubinatotal" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['bilirrubinatotalv']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>BILIRRUBINA DIRECTA</td>
<td><div class="form-group has-feedback"><input name="bilirrubinadirecta" type="text" class="form-control" id="bilirrubinadirecta" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['bilirrubinadirectav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>BILIRRUBINA INDIRECTA</td>
<td><div class="form-group has-feedback"><input name="bilirrubinaindirecta" type="text" class="form-control" id="bilirrubinaindirecta" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">mg/dl</div></td>
<td><div align="right"><?php echo $valor[0]['bilirrubinaindirectav']; ?></div></td>
<td><div align="right">mg/dl</div></td>
                                                </tr>
                                                <tr>
<td>FOSFATASA ALCALINA</td>
<td><div class="form-group has-feedback"><input name="fosfatasaalcalina" type="text" class="form-control" id="fosfatasaalcalina" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['fosfatasaalcalinav']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td>TGO/AST</td>
<td><div class="form-group has-feedback"><input name="tgo" type="text" class="form-control" id="tgo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['tgov']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td>TGP/ALT</td>
<td><div class="form-group has-feedback"><input name="tgp" type="text" class="form-control" id="tgp" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['tgpv']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td>AMILASA</td>
<td><div class="form-group has-feedback"><input name="amilasa" type="text" class="form-control" id="amilasa" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td><div align="right">UI/L</div></td>
<td><div align="right"><?php echo $valor[0]['amilasav']; ?></div></td>
<td><div align="right">UI/L</div></td>
                                                </tr>
                                                <tr>
<td colspan="5"><label>OBSERVACIONES:</label></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacionesquimica" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="observacionesquimica" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"></textarea><i class="fa fa-pencil form-control-feedback"></i>                                                </td>
                                                </tr>
                                          </tbody>
                                    </table>
                                </div> 
                            </div>

                  
  <div class="tab-pane" id="messages"> 
          <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                          <tr>
<th colspan="5"><label>UROANÁLISIS</label></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
<td colspan="2"><label>EXÁMEN QUIMICO </label></td>
<td colspan="2"><label >EXÁMEN MICROCOSPICO </label></td>
<td><label>XC</label></td>
                                          </tr>
                                          <tr>
<td width="256">COLOR</td>
<td width="336"><div class="form-group has-feedback"><input name="colorquimico" type="text" class="form-control" id="colorquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td colspan="2" height="25">CELULAS EPITELIALES BAJAS</td>
<td width="227"><div class="form-group has-feedback"><input name="celulasepibajas" type="text" class="form-control" id="celulasepibajas" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>ASPECTO</td>
<td><div class="form-group has-feedback"><input name="aspectoquimico" type="text" class="form-control" id="aspectoquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td colspan="2" height="20">CELULAS EPITELIALES ALTAS</td>
<td><div class="form-group has-feedback"><input name="celulasepialtas" type="text" class="form-control" id="celulasepialtas" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>PH</td>
<td><div class="form-group has-feedback"><input name="phquimico" type="text" class="form-control" id="phquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="166">BACTERIAS</span></td>
<td width="217"><div class="form-group has-feedback"><input class="form-control" type="text" name="bacteriasmicroscopico" id="bacteriasmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>DENSIDAD</td>
<td><div class="form-group has-feedback"><input name="densidadquimico" type="text" class="form-control" id="densidadquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="leucocitosmicroscopico" id="leucocitosmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>PROTEINA</td>
<td><div class="form-group has-feedback"><input name="proteinaquimico" type="text" class="form-control" id="proteinaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HEMATIES</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="hematiesmicroscopico" id="hematiesmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>GLUCOSA</td>
<td><div class="form-group has-feedback"><input name="glucosaquimico" type="text" class="form-control" id="glucosaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>CRISTALES</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cristalesmicroscopico" id="cristalesmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>CETONAS</td>
<td><div class="form-group has-feedback"><input name="cetonaquimico" type="text" class="form-control" id="cetonaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td>BILIRRUBINAS</td>
<td><div class="form-group has-feedback"><input name="bilirrubinaquimico" type="text" class="form-control" id="bilirrubinaquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>CILINDROS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cilindrosmicroscopico" id="cilindrosmicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>UROBILINOGENO</td>
<td><div class="form-group has-feedback"><input name="urobilinogenoquimico" type="text" class="form-control" id="urobilinogenoquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>&nbsp;</td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td>SANGRE</td>
<td><div class="form-group has-feedback"><input name="sangrequimico" type="text" class="form-control" id="sangrequimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>MOCO</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="mocomicroscopico" id="mocomicroscopico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
                                          </tr>
                                          <tr>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input name="leucocitosquimico" type="text" class="form-control" id="leucocitosquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td>NITRITOS</td>
<td><div class="form-group has-feedback"><input name="nitritosquimico" type="text" class="form-control" id="nitritosquimico" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td></td>
<td></td>
<td></td>
                                          </tr>
                                          <tr>
<td colspan="5"><label>OBSERVACIONES:</label></td>
                                          </tr>
                                          <tr>
                                            <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacionessanguinea" cols="80" onkeyup="this.value=this.value.toUpperCase();" rows="2" class="form-control" id="observacionessanguinea" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"></textarea><i class="fa fa-pencil form-control-feedback"></i>                                            </td>
                                             </tr>
                                        </tbody>
                                    </table>
                            </div> 
                      </div> 


                                    
    <div class="tab-pane" id="settings"> 
            <div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        
                                        <tbody>
                                          <tr>
<td colspan="5"><label>FROTIS DE FLUJO VAGINAL </label></td>
                                          </tr>
                                          <tr>
<td colspan="2"><label>EX&Aacute;MEN FRESCO </label></td>
<td colspan="2"><label>GRAM</label></td>
                                          </tr>
                                          <tr>
<td width="256">PH</td>
<td width="144"><div class="form-group has-feedback"><input name="phfresco" type="text" class="form-control" id="phfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>BACILOS GRAM POSITIVO</td>
<td width="144"><div class="form-group has-feedback"><input name="basilosgranpositivo" type="text" class="form-control" id="basilosgranpositivo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>CELULAS GUIA</td>
<td><div class="form-group has-feedback"><input name="celulasfresco" type="text" class="form-control" id="celulasfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>BACILOS GRAM NEGATIVO</td>
<td><div class="form-group has-feedback"><input name="basilosgrannegativo" type="text" class="form-control" id="basilosgrannegativo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>TEST AMINAS</td>
<td><div class="form-group has-feedback"><input name="testaminafresco" type="text" class="form-control" id="testaminafresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>COCOBACILO GRAM VARIABLE</td>
<td><div class="form-group has-feedback"><input name="cocobacilogran" type="text" class="form-control" id="cocobacilogran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>HONGOS</td>
<td><div class="form-group has-feedback"><input name="hongosfresco" type="text" class="form-control" id="hongosfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>DIPLOCOCO GRAM NEGATIVO</td>
<td><div class="form-group has-feedback"><input name="diplococogran" type="text" class="form-control" id="diplococogran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>TRICHOMONAS</td>
<td><div class="form-group has-feedback"><input name="trichomonafresco" type="text" class="form-control" id="trichomonafresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>BLASTOCONIDIAS</td>
<td><div class="form-group has-feedback"><input name="blastoconidiasgran" type="text" class="form-control" id="blastoconidiasgran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>LEUCOCITOS</td>
<td><div class="form-group has-feedback"><input name="leucitofresco" type="text" class="form-control" id="leucitofresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>PSEUDOMICELIO</td>
<td><div class="form-group has-feedback"><input name="pseudomiceliogran" type="text" class="form-control" id="pseudomiceliogran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>HEMATIES</td>
<td><div class="form-group has-feedback"><input name="hematiesfresco" type="text" class="form-control" id="hematiesfresco" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>PMN</td>
<td><div class="form-group has-feedback"><input name="pmngran" type="text" class="form-control" id="pmngran" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td colspan="5"><label>OBSERVACIONES</label></td>
                                          </tr>
                                          <tr>
                                            <td colspan="5">
<div class="form-group has-feedback"><textarea name="observacionesfrotis" cols="80" rows="2" onkeyup="this.value=this.value.toUpperCase();" class="form-control" id="observacionesfrotis" style="font-size: 14px" placeholder="Ingrese Observaciones de Resultado"></textarea><i class="fa fa-pencil form-control-feedback"></i>                                            </td>
                                               </tr>
                                        </tbody>
                                    </table>
                              </div> 
                      </div> 
                
      <div class="tab-pane" id="cinco"> 
              <div class="table-responsive" data-pattern="priority-columns">
                         <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                          <tr>
<th colspan="3"><label>INMUNOLOGÍA</label></th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                          <tr>
<td><label>EXÁMEN</label></td>
<td><label>RESULTADO</label></td>
                                          </tr>
                                          <tr>
<td width="336">PRUEBA DE EMBARAZO</td>
<td width="238"><div class="form-group has-feedback"><input name="pruebaembarazo" type="text" class="form-control" id="pruebaembarazo" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>RPR-SISFILIS</td>
<td><div class="form-group has-feedback"><input name="rprsisfilis" type="text" class="form-control" id="rprsisfilis" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>RA TEST</td>
<td><div class="form-group has-feedback"><input name="ratest" type="text" class="form-control" id="ratest" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>ASTOS</td>
<td><div class="form-group has-feedback"><input name="astos" type="text" class="form-control" id="astos" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>                                          </tr>
                                          <tr>
<td colspan="3"><label>OBSERVACIONES:</label></td>
                                          </tr>
                                          <tr>
<td colspan="3"><div class="form-group has-feedback"><textarea name="observacionesinmunologia" onkeyup="this.value=this.value.toUpperCase();" cols="80" class="form-control" id="observacionesinmunologia" placeholder="Ingrese Observaciones de Resultado" rows="2"></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                        </tbody>
                                  </table>
                            </div> 
                      </div> 
                

    <div class="tab-pane" id="seis"> 
            <div class="table-responsive" data-pattern="priority-columns">
                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <tbody>
                                          <tr>
<td colspan="5"><label>COPROPARASITOLOGÍA</label></td>
                                          </tr>
                                          <tr>
<td width="330">COLOR</td>
<td width="260"><div class="form-group has-feedback"><input class="form-control" type="text" name="colorparasitologia" id="colorparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td width="60">QUISTE</span></td>
<td width="350">Blastocystis hominis</td>
                                          </tr>
                                          <tr>
<td>CONSISTENCIA</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="consistenciaparasitologia" id="consistenciaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td>Endolimax nana</td>
                                          </tr>
                                          <tr>
<td>PH</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="phparasitologia" id="phparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td>Entamoeba coli</td>
                                          </tr>
                                          <tr>
<td>SANGRE OCULTA</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="sangreocultaparasitologia" id="sangreocultaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td>Entamoeba hitolytica</td>
                                          </tr>
                                          <tr>
<td>AZUCARES REDUCTORES</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="azucaresparasitologia" id="azucaresparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>QUISTE</td>
<td><span style="font-size: 12px">Giardia lamblia</span></td>
                                          </tr>
                                          <tr>
<td>ALMIDONES SIN DIGERIR</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="almidonesparasitologia" id="almidonesparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Ascaris lumbricoides</td>
                                          </tr>
                                          <tr>
<td>HONGOS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="hongosparasitologia" id="hongosparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td><span style="font-size: 12px">Uncinaria</span></td>
                                          </tr>
                                          <tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>HUEVO</td>
<td>Tricocefalo</td>
                                          </tr>
                                          <tr>
<td>TRICHOMONAS HOMINIS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="trichomonaparasitologia" id="trichomonaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Tenia sp</td>
                                          </tr>
                                          <tr>
<td>IODAMOEBA BUTSLLI</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="iodamoebaparasitologia" id="iodamoebaparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Hymenolepis nana</td>
                                          </tr>
                                          <tr>
<td>OTROS</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="otrosparasitologia" id="otrosparasitologia" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
<td>HUEVO</td>
<td>Strongyloides</td>
                                          </tr>
                                        </tbody>
                                      </table>
                               </div>
                    
           <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <tbody>
                                          <tr>
<td colspan="3"><label>MICROBIOLOGÍA</label></td>
                                          </tr>
                                          <tr>
<td width="467">KOH</td>
<td width="338"><div class="form-group has-feedback"><input class="form-control" type="text" name="kohmicro" id="kohmicro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                          <tr>
<td>BACILOSOCOPIA</td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="baciloscopiamicro" id="baciloscopiamicro" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Resultado" /><i class="fa fa-pencil form-control-feedback"></i></td>
                                          </tr>
                                    </tbody>
                              </table>
                          </div>
                      </div> 
                  </div> 
              </div> 
          </div> 
      </div>         

  </div><br>

  <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="reset" onclick="
document.getElementById('desde').value = '<?php echo $desde ?>',
document.getElementById('hasta').value = '<?php echo $hasta ?>',
document.getElementById('codmedico').value = '<?php echo $codmedico ?>'"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

  <?php
      }
 } 
############################# CREAR EXAMEN LABORATORIO ############################
?>

<?php 
############################# BUSQUEDA DE REPORTE LABORATORIO ##################################
if (isset($_GET['BuscaReporteLaboratorio']) && isset($_GET['codpaciente'])) { 

$codpaciente = $_GET['codpaciente'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE </div></center>";
exit;
    
} else {

$con = new Login();
$reg = $con->BuscarReportesLaboratorio();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-tasks"></i> Exámen de Laboratorio del Paciente <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></h3>
                                    </div>
             <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Medico</th>
                                  <th>Fecha/Hora</th>
                                  <th>Imprimir</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
<td><?php echo $a++; ?></td>
<td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
<td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>

<td><?php echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechalaboratorio'])); ?></td>

<td> 
<a href="reportepdf?l=<?php echo base64_encode($reg[$i]['codlaboratorio']); ?>&tipo=<?php echo base64_encode("LABORATORIO") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REPORTE LABORATORIO ################################
?>



































<?php 
############################# BUSQUEDA DE LECTURA RX #####################################
if (isset($_GET['BuscaRadiologia']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td>
<?php if($reg[$i]["lectura"]=='SI') { ?>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearRadiologia('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-clipboard"></span> Procesar Lectura Rx</button>
<?php } else { ?>
<input type="hidden" name="procesar" value="ok"/>
<input type="hidden" name="codcita" id="codcita" value="<?php echo $reg[$i]['codcita']; ?>">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-danger waves-effect waves-light"><span class="fa fa-clipboard"></span> Procesar sin Lectura</button>
<?php } ?>
</td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE LECTURA RX ##########################################
?>

<?php
############################# CREAR LECTURA RX ############################
if (isset($_GET['CreaRadiologia']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">
<input type="hidden" name="registrar" value="ok"/>

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Procedimientos <label id="nombreplantillalecturarx" name="nombreplantillalecturarx"></label> para Lectura Rx</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Motivo de Cita: <span class="symbol required"></span></label> 
<textarea name="motivocita" class="form-control" id="motivocita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de Cita" rows="2" readonly="readonly" aria-required="true"><?php echo $pa[0]['motivocita']; ?></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>

               <div class="col-md-6"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Observación de Cita: <span class="symbol required"></span></label> 
<textarea name="observacionescita" class="form-control" id="observacionescita" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observación de Cita" rows="2" readonly="readonly" aria-required="true"><?php echo $pa[0]['observacionescita']; ?></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div>


            <div class="row"> 

                        <div class="col-md-9"> 
                              <div class="form-group has-feedback"> 
  <label class="control-label">Tipo de Estudio: <span class="symbol required"></span></label> 
<input type="text" class="form-control" name="tipoestudiorx" id="tipoestudiorx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Tipo de Estudio" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>  
                              </div> 
                        </div>

          <div class="col-md-3">
                              <div class="form-group has-feedback"> <br>             
<button type="button" class="btn btn-info waves-effect waves-light w-xs m-b-5" data-href="#" data-toggle="modal" data-target=".bs-example-modal-lg" data-placement="left" data-backdrop="static" data-keyboard="false" data-id="" rel="tooltip" title="Ver" onClick="BuscaPlantillaRx('<?php echo $pa[0]["codmedico"] ?>')"><span class="fa fa-paste"></span> Usar Plantilla Lectura Rx</button>
                              </div>
          </div>
                    

                    </div>

  
             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Diagnóstico de Lectura RX: <span class="symbol required"></span></label> 
<textarea name="diagnosticorx" class="form-control" id="diagnosticorx" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Diagnóstico de Lectura RX" rows="12" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div> <br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('tipoestudiorx').value = '',
    document.getElementById('diagnosticorx').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR LECTURA RX ############################
?>

<?php 
###################### BUSQUEDA DE PLANTILLAS LECTURA RX Y MOSTRAR EN VENTANA MODAL ########################
if (isset($_GET['BuscaPlantillaRx']) && isset($_GET['codmedico'])) { 

$codmedico = $_GET['codmedico'];

$tri = new Login();
$reg = $tri->BuscarPlantillasLecturaRxModal();
?>

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                              <tr>
<td colspan="6"><center><label>PLANTILLAS ASIGNADAS PARA <?php echo $reg[0]['moduloespec']; ?> DE EL (LA) <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></label></center></td>
                                              </tr>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Nombre de Plantilla</th>
                                                    <th>Procedimiento de Plantilla</th>
                                                    <th>Descripción de Plantilla</th>
                                                    <th>Agregar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
                                                <tr>
                <td><?php echo $a++; ?></td>
                <td><?php echo $reg[$i]['nombreplantillalecturarx']; ?></td>
                <td><?php echo $reg[$i]['procedimientolecturarx']; ?></td>
<td><abbr title="<?php echo $reg[$i]['descripcionlecturarx']; ?>"><?php echo getSubString($reg[$i]['descripcionlecturarx'], 22); ?></abbr></td>
<td>
<button class="btn btn-icon btn-primary" data-dismiss="modal" title="Cargar" 
onClick="CargaPlantilla('<?php echo $reg[$i]['nombreplantillalecturarx']; ?>','<?php echo $reg[$i]['procedimientolecturarx']; ?>','<?php echo $reg[$i]['descripcionlecturarx']; ?>')"> <i class="fa fa-mail-forward"></i> </button>
</td>
                                                </tr>
                        <?php  }  ?>
                                            </tbody>
                    </table>
             </div>
      </div>
</div>                               
<?php
  } 
###################### BUSQUEDA DE PLANTILLAS LECTURA RX Y MOSTRAR EN VENTANA MODAL ########################
?>



<?php 
############################# BUSQUEDA DE REPORTE LECTURA RX ##################################
if (isset($_GET['BuscaReporteRadiologia']) && isset($_GET['codpaciente'])) { 

$codpaciente = $_GET['codpaciente'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE </div></center>";
exit;
    
} else {

$con = new Login();
$reg = $con->BuscarReportesLecturaRx();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-tasks"></i> Lectura Rx del Paciente <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></h3>
                                    </div>
             <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Medico</th>
                                  <th>Fecha/Hora</th>
                                  <th>Imprimir</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
<td><?php echo $a++; ?></td>
<td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
<td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>

<td><?php echo date("Y-m-d h:i:s", strtotime($reg[$i]['fecharx'])); ?></td>

<td> 
<a href="reportepdf?le=<?php echo base64_encode($reg[$i]['codrx']); ?>&tipo=<?php echo base64_encode("LECTURARX") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REPORTE LECTURA RX ################################
?>


































<?php 
############################# BUSQUEDA DE TERAPIAS #####################################
if (isset($_GET['BuscaTerapia']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td>

<button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearTerapia('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-folder-open-o"></span> Procesar Terapias</button>
</td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE TERAPIAS ##########################################
?>

<?php
############################# CREAR TERAPIAS ############################
if (isset($_GET['CreaTerapia']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();

$t = new Login();
$t = $t->BusquedaTerapiasAbiertas();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codpaciente" id="codpaciente" value="<?php echo $pa[0]['codpaciente']; ?>">
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

<?php if (isset($t[0]['codterapia'])) { ?>
<input type="hidden" name="codterapia" id="codterapia" value="<?php echo $t[0]['codterapia']; ?>">
<input type="hidden" name="update" value="okk">
<?php } else { ?>
<input type="hidden" name="registrar" value="ok"/>
<?php } ?>

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Procedimientos de Terapias</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Diagnóstico: <span class="symbol required"></span></label> 
<?php if (isset($t[0]['diagnosticoterapia'])) { ?><textarea name="diagnosticoterapia" class="form-control" id="diagnosticoterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Diagnóstico" rows="3" readonly="" aria-required="true"><?php echo $t[0]['diagnosticoterapia']; ?></textarea><?php } else { ?><textarea name="diagnosticoterapia" class="form-control" id="diagnosticoterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Diagnóstico" rows="3" required="required" aria-required="true"></textarea><?php } ?> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div>



<?php if (strip_tags(isset($t[0]['terapias']))) { ?> 

      <div class="row">
               <div class="col-md-12"> 
<div class="table-responsive" data-pattern="priority-columns">
      <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
  <tr>
    <td colspan="4"><h3 class="panel-title"><label>Terapias Registradas</label></h3></td>
  </tr>
  <tr>
    <td><label>Nº</label></td>
    <td><label>Atención/Actividad y/o Tratamiento</label></td>
    <td><label>Fecha Terapia</label></td>
    <td><label>Hora de Terapia</label></td>
  </tr>
  <tr>
    <?php $explode = explode(",,",$t[0]['terapias']);
    $a=1;
    # Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
    for($cont=0; $cont<COUNT($explode); $cont++):
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idterapia,$tratamientoterapia,$fechacicloterapia) = explode("/",$explode[$cont]);
    ?>  
    <td><?php echo $a++; ?></td>
    <td><?php echo $tratamientoterapia; ?></td>
    <td><?php echo date("d-m-Y", strtotime($fechacicloterapia)); ?></td>
    <td><?php echo date("h:i:s", strtotime($fechacicloterapia)); ?></td>
  </tr><?php endfor; ?>
</table></div>
              </div>
            </div>
<?php } ?>


      <div class="row">
               <div class="col-md-12"> 
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Terapia</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Terapia</button>
              </div>
            </div>


        <div class="row">

  <table width="100%" id="tabla">

<tr>

    <td width="50%"><div class="col-md-12">
            <div class="form-group has-feedback">
    <label class="control-label">Atención/Actividad y/o Tratamiento: <span class="symbol required"></span></label>
<textarea name="tratamientoterapia[]" class="form-control" id="tratamientoterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención/Actividad y/o Tratamiento de Terapia" rows="3" title="Ingrese Tratamiento de Terapias" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div></td>

    <td width="25%"><div class="col-md-12"> 
            <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Terapia: <span class="symbol required"></span></label> 
<input class="form-control calendario" type="text" name="fechaterapia[]" id="fechaterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"  value="<?php echo date('d-m-Y'); ?>" title="Ingrese Fecha de Terapia" required="" aria-required="true"><i class="fa fa-calendar form-control-feedback"></i></div></div></td>

    <td width="25%"><div class="col-md-12"> 
            <div class="form-group has-feedback"> 
    <label class="control-label">Hora de Terapia: <span class="symbol required"></span></label> 
<input id="horaterapia" name="horaterapia[]" type="text" value="<?php echo date("h:i:s"); ?>" class="form-control hour" onKeyUp="this.value=this.value.toUpperCase();" title="Ingrese Hora de Terapia" autocomplete="off" required="" aria-required="true"><i class="fa fa-clock-o form-control-feedback"></i></div></div></td></tr>
  <input type="hidden" name="var_cont">
</table>     

        </div>

  
             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
          <label class="control-label">Observaciones de Terapias: <span class="symbol required"></span></label> 
<textarea name="observacionesterapia" class="form-control" id="observacionesterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observaciones de Terapias" rows="4" required="" aria-required="true"></textarea><small> <p style="font-size:14px">La observaciones deberán de ser escritos al culminar el ciclo de terapias, una vez registrada las observaciones no se podrá agregar mas terapias al paciente y deberá de comenzar un nuevo Ciclo</p> </small> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div> <br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('tratamientoterapia').value = '',
    document.getElementById('fechaterapia').value = '<?php echo date('d-m-Y'); ?>',
    document.getElementById('horaterapia').value = '<?php echo date("h:i:s"); ?>',
    document.getElementById('observacionesterapia').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  <?php
      }
 } 
############################# CREAR TERAPIAS ############################
?>

<?php
############################# FUNCION BUSQUEDA CICLO TERAPIAS ############################
if (isset($_GET['BuscaCicloTerapias']) && isset($_GET['t'])) { 

$reg = $new->TerapiasPorId();


    $explode = explode(",,",$reg[0]['terapias']);
    $a=1;
    # Recorremos el array para despues separar en 3 epa espera aqui hay un errro ya jejejjevariables lo que se requiere.
    for($cont=0; $cont<COUNT($explode); $cont++):
    # Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
    list($idterapia,$tratamientoterapia,$fechacicloterapia) = explode("/",$explode[$cont]);
?>

            <div class="row">

<input type="hidden" name="idterapia[]" id="idterapia" value="<?php echo $idterapia; ?>">

  <div class="col-md-5">
            <div class="form-group has-feedback">
    <label class="control-label">Atención/Actividad y/o Tratamiento: <span class="symbol required"></span></label>
<textarea name="tratamientoterapia[]" class="form-control" id="tratamientoterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención/Actividad y/o Tratamiento de Terapia" rows="3" title="Ingrese Tratamiento de Terapias" required="" aria-required="true"><?php echo $tratamientoterapia; ?></textarea><i class="fa fa-pencil form-control-feedback"></i></div></div>

    <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Terapia: <span class="symbol required"></span></label> 
<input class="form-control calendario" type="text" name="fechaterapia[]" id="fechaterapia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off"  value="<?php echo date("d-m-Y", strtotime($fechacicloterapia)); ?>" title="Ingrese Fecha de Terapia" required="" aria-required="true"><i class="fa fa-calendar form-control-feedback"></i></div></div>

    <div class="col-md-3"> 
            <div class="form-group has-feedback"> 
    <label class="control-label">Hora de Terapia: <span class="symbol required"></span></label> 
<input id="horaterapia" name="horaterapia[]" type="text" value="<?php echo date("h:i:s", strtotime($fechacicloterapia)); ?>" class="form-control hour" onKeyUp="this.value=this.value.toUpperCase();" title="Ingrese Hora de Terapia" autocomplete="off" required="" aria-required="true"><i class="fa fa-clock-o form-control-feedback"></i></div></div>

<div class="col-md-1"><br></br> 
 <a class="btn btn-danger btn-xs" data-placement="left" data-toggle="tooltip" data-original-title="Eliminar" onClick="EliminarCiclo('<?php echo base64_encode($idterapia); ?>','<?php echo base64_encode("CICLOTERAPIAS") ?>','<?php echo base64_encode($reg[0]['codterapia']) ?>')"><i class="fa fa-trash-o"></i></a>
</div>
     

        </div>

<?php endfor; ?>

  <?php
   } 
############################# FUNCION BUSQUEDA CICLO TERAPIAS ############################
?>

<?php 
############################# BUSQUEDA DE REPORTE TERAPIAS ##################################
if (isset($_GET['BuscaReporteTerapia']) && isset($_GET['codpaciente'])) { 

$codpaciente = $_GET['codpaciente'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE </div></center>";
exit;
    
} else {

$con = new Login();
$reg = $con->BuscarReportesTerapias();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-tasks"></i> Terapias del Paciente <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></h3>
                                    </div>
             <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Medico</th>
                                  <th>Fecha/Hora</th>
                                  <th>Imprimir</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
<td><?php echo $a++; ?></td>
<td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
<td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>

<td><?php echo date("Y-m-d h:i:s", strtotime($reg[$i]['fechaterapia'])); ?></td>

<td> 
<a href="reportepdf?t=<?php echo base64_encode($reg[$i]['codterapia']); ?>&tipo=<?php echo base64_encode("TERAPIAS") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REPORTE TERAPIAS ################################
?>





































<?php 
############################# BUSQUEDA DE ODONTOLOGIA #####################################
if (isset($_GET['BuscaOdontologia']) && isset($_GET['codmedico']) && isset($_GET['desde']) && isset($_GET['hasta'])) { 

$codmedico = $_GET['codmedico'];
$desde = $_GET['desde'];
$hasta = $_GET['hasta'];

if($desde=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA DE INICIO PARA TU BÚSQUEDA</div></center>";
  exit;
    

} else if($hasta=="") {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> POR FAVOR INGRESE FECHA FINAL PARA TU BÚSQUEDA</div></center>";
  exit;

    } elseif($desde>$hasta) {

  echo "<center><div class='alert alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
  echo "<span class='fa fa-info-circle'></span> LA FECHA DE INICIO NO PUEDE SER MAYOR QUE LA FECHA DE FIN</div></center>";
  exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$ci = new Login();
$reg = $ci->BuscarCitasMedicas();

?>

                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
  <h3 class="panel-title"><i class="fa fa-tasks"></i> Citas Médicas para el Especialista <?php echo $reg[0]['especmedico']." ".$reg[0]['nommedico']." ".$reg[0]['apemedico']; ?></h3>
                                    </div>
                                    <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Paciente</th>
                                  <th>Fecha</th>
                                  <th>Hora</th>
                                  <th>Status</th>
                                  <th>Acciones</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
  <td><?php echo $a++; ?></td>
  <td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
  <td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedpaciente']; ?>"><?php echo $reg[$i]['pnompaciente']." ".$reg[$i]['snompaciente']." ".$reg[$i]['papepaciente']." ".$reg[$i]['sapepaciente']; ?></abbr></td>
  <td><?php echo date("d-m-Y", strtotime($reg[$i]['fechacita'])); ?></td>
  <td><?php echo $reg[$i]['horacita']; ?></td>
  <td><?php if($reg[$i]['statuscita']=='VERIFICADA') { echo "<span class='label label-primary'><i class='fa fa-check'></i> ".$reg[$i]['statuscita']."</span>"; } elseif($reg[$i]['statuscita']=='EN PROCESO') {   echo "<span class='label label-success '><i class='fa fa-history'></i> ".$reg[$i]['statuscita']."</span>";   } else { echo "<span class='label label-danger'><i class='fa fa-times'></i> ".$reg[$i]['statuscita']."</span>"; } ?></td>

<td>

<button type="button" class="btn btn-info waves-effect waves-light" onClick="CrearOdontologia('<?php echo base64_encode($reg[$i]["codcita"]); ?>','<?php echo base64_encode($reg[$i]["codpaciente"]); ?>','<?php echo base64_encode($reg[$i]['moduloespec']); ?>')"><span class="fa fa-diamond"></span> Procesar Odontología</button>
</td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE ODONTOLOGIA ##########################################
?>

<?php
############################# CREAR ODONTOLOGIA ############################
if (isset($_GET['CreaOdontologia']) && isset($_GET['codcita']) && isset($_GET['codpaciente']) && isset($_GET['modulo'])) {
  
$codpaciente = $_GET['codpaciente'];
$modulo = base64_decode($_GET['modulo']);

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA B&Uacute;SQUEDA DEL PACIENTE</div></center>";
    exit;
    
} else {

$pa = new Login();
$pa = $pa->CitasPorId();

$reg = new Login();
$reg = $reg->ReferenciaOdontogramaPorId();

$odon = new Login();
$odon = $odon->VerificaOdontologia();
  ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Datos del Paciente</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
<input type="hidden" name="codcita" id="codcita" value="<?php echo $pa[0]['codcita']; ?>">
<input type="hidden" name="codsucursal" id="codsucursal" value="<?php echo $pa[0]['codsucursal']; ?>">
<input type="hidden" name="codsede" id="codsede" value="<?php echo $pa[0]['codsede']; ?>">
<input type="hidden" name="especialidad" id="especialidad" value="<?php echo $modulo; ?>">

<?php if (isset($odon[0]['codpaciente'])) { ?>
<input type="hidden" name="procedimiento" id="procedimiento" value="1">
<?php } else { ?>
<input type="hidden" name="procedimiento" id="procedimiento" value="0">
<?php } ?>

        <div class="row"> 
                            <div class="col-md-3"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Nº de Identificación: <span class="symbol required"></span></label>
<br /><abbr title="Nº de Identificación de Paciente"><?php echo $pa[0]['cedpaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Nombres del Paciente: <span class="symbol required"></span></label> 
<br /><abbr title="Nombres del Paciente"><?php echo $pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-3"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Fecha de Nacimiento: <span class="symbol required"></span></label> 
<br /><abbr title="Fecha de Nacimiento del Paciente"><?php echo date("d-m-Y",strtotime($pa[0]['fnacpaciente'])); ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Edad: <span class="symbol required"></span></label> 
<br /><abbr title="Edad de Paciente"><?php echo edad($pa[0]['fnacpaciente'])." AÑOS"; ?></abbr>
                                                                </div> 
                                                            </div>   
                    </div>
          

        <div class="row"> 
                            <div class="col-md-2"> 
                              <div class="form-group has-feedback"> 
<label class="control-label">Grupo Sanguineo: <span class="symbol required"></span></label>
<br /><abbr title="Grupo Sanguineo de Paciente"><?php echo $pa[0]['gruposapaciente']; ?></abbr>
                          
                                                                </div> 
                                                            </div>
                              
              <div class="col-md-4"> 
                               <div class="form-group has-feedback"> 
   <label class="control-label">Eps: <span class="symbol required"></span></label> 
<br /><abbr title="Eps del Paciente"><?php echo $pa[0]['nomcontabilidad']; ?></abbr>
                                                                </div> 
                                                            </div>
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label> 
<br /><abbr title="Nº de Teléfono del Paciente"><?php echo $pa[0]['tlfpaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Estado Civil: <span class="symbol required"></span></label> 
<br /><abbr title="Estado Civil de Paciente"><?php echo $pa[0]['estadopaciente']; ?></abbr>
                                                                </div> 
                                                            </div>  
                            <div class="col-md-2"> 
                               <div class="form-group has-feedback"> 
    <label class="control-label">Ocupación Laboral: <span class="symbol required"></span></label> 
<br /><abbr title="Ocupación Laboral de Paciente"><?php echo $pa[0]['ocupacionpaciente']; ?></abbr>
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


<?php if (isset($odon[0]['codpaciente'])) { ?>

<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Atención Actividad y/o Procedimiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

             <div class="row">
               <div class="col-md-12"> 
                 <div class="form-group has-feedback">
  <label class="control-label">Atención Actividad y/o Procedimiento: <span class="symbol required"></span></label>
<input type="hidden" id="codpaciente" name="codpaciente" value="<?php echo base64_decode($_GET["codpaciente"]); ?>"> 
<textarea name="plantratamiento" class="form-control" id="plantratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Atención Actividad y/o Procedimiento" rows="5" required="" aria-required="true"></textarea> 
                  <i class="fa fa-comment form-control-feedback"></i>
                </div> 
              </div>
            </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
document.getElementById('plantratamiento').value = '''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<?php } else { ?>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-diamond"></i> Odontograma</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  

<div id="seccionDientes" class="sombraFormulario">

<input type="hidden" id="hiddenEstados" name="estados" value="<?php echo $reg[0]['estados']; ?>">
<input type="hidden" id="codpaciente" name="codpaciente" value="<?php echo base64_decode($_GET["codpaciente"]); ?>">
  
  <section id="odontogramaSuperior" class="textAlignCenter">
      <input type="text" id="txtD18" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD17" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD16" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD15" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD14" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD13" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD12" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD11" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD21" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD22" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD23" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD24" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD25" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD26" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD27" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD28" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    
    <br>
        
    <div class="diente" id="D18"><div id="D18-C1"></div><div id="D18-C2"></div><div id="D18-C3"></div><div id="D18-C4"></div><div id="D18-C5"></div><div onclick="seleccionarDiente('D18');">D18</div></div>
    <div class="diente" id="D17"><div id="D17-C1"></div><div id="D17-C2"></div><div id="D17-C3"></div><div id="D17-C4"></div><div id="D17-C5"></div><div onclick="seleccionarDiente('D17');">D17</div></div>
    <div class="diente" id="D16"><div id="D16-C1"></div><div id="D16-C2"></div><div id="D16-C3"></div><div id="D16-C4"></div><div id="D16-C5"></div><div onclick="seleccionarDiente('D16');">D16</div></div>
    <div class="diente" id="D15"><div id="D15-C1"></div><div id="D15-C2"></div><div id="D15-C3"></div><div id="D15-C4"></div><div id="D15-C5"></div><div onclick="seleccionarDiente('D15');">D15</div></div>
    <div class="diente" id="D14"><div id="D14-C1"></div><div id="D14-C2"></div><div id="D14-C3"></div><div id="D14-C4"></div><div id="D14-C5"></div><div onclick="seleccionarDiente('D14');">D14</div></div>
    <div class="diente" id="D13"><div id="D13-C1"></div><div id="D13-C2"></div><div id="D13-C3"></div><div id="D13-C4"></div><div id="D13-C5"></div><div onclick="seleccionarDiente('D13');">D13</div></div>
    <div class="diente" id="D12"><div id="D12-C1"></div><div id="D12-C2"></div><div id="D12-C3"></div><div id="D12-C4"></div><div id="D12-C5"></div><div onclick="seleccionarDiente('D12');">D12</div></div>
    <div class="diente" id="D11"><div id="D11-C1"></div><div id="D11-C2"></div><div id="D11-C3"></div><div id="D11-C4"></div><div id="D11-C5"></div><div onclick="seleccionarDiente('D11');">D11</div></div>
    |-|
    <div class="diente" id="D21"><div id="D21-C1"></div><div id="D21-C2"></div><div id="D21-C3"></div><div id="D21-C4"></div><div id="D21-C5"></div><div onclick="seleccionarDiente('D21');">D21</div></div>
    <div class="diente" id="D22"><div id="D22-C1"></div><div id="D22-C2"></div><div id="D22-C3"></div><div id="D22-C4"></div><div id="D22-C5"></div><div onclick="seleccionarDiente('D22');">D22</div></div>
    <div class="diente" id="D23"><div id="D23-C1"></div><div id="D23-C2"></div><div id="D23-C3"></div><div id="D23-C4"></div><div id="D23-C5"></div><div onclick="seleccionarDiente('D23');">D23</div></div>
    <div class="diente" id="D24"><div id="D24-C1"></div><div id="D24-C2"></div><div id="D24-C3"></div><div id="D24-C4"></div><div id="D24-C5"></div><div onclick="seleccionarDiente('D24');">D24</div></div>
    <div class="diente" id="D25"><div id="D25-C1"></div><div id="D25-C2"></div><div id="D25-C3"></div><div id="D25-C4"></div><div id="D25-C5"></div><div onclick="seleccionarDiente('D25');">D25</div></div>
    <div class="diente" id="D26"><div id="D26-C1"></div><div id="D26-C2"></div><div id="D26-C3"></div><div id="D26-C4"></div><div id="D26-C5"></div><div onclick="seleccionarDiente('D26');">D26</div></div>
    <div class="diente" id="D27"><div id="D27-C1"></div><div id="D27-C2"></div><div id="D27-C3"></div><div id="D27-C4"></div><div id="D27-C5"></div><div onclick="seleccionarDiente('D27');">D27</div></div>
    <div class="diente" id="D28"><div id="D28-C1"></div><div id="D28-C2"></div><div id="D28-C3"></div><div id="D28-C4"></div><div id="D28-C5"></div><div onclick="seleccionarDiente('D28');">D28</div></div><br><hr>
    
    <input type="text" id="txtD55" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD54" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD53" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD52" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD51" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD61" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD62" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD63" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD64" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD65" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly"><br>
    
    <div class="diente" id="D55"><div id="D55-C1"></div><div id="D55-C2"></div><div id="D55-C3"></div><div id="D55-C4"></div><div id="D55-C5"></div><div onclick="seleccionarDiente('D55');">D55</div></div>

    <div class="diente" id="D54"><div id="D54-C1"></div><div id="D54-C2"></div><div id="D54-C3"></div><div id="D54-C4"></div><div id="D54-C5"></div><div onclick="seleccionarDiente('D54');">D54</div></div>

    <div class="diente" id="D53"><div id="D53-C1"></div><div id="D53-C2"></div><div id="D53-C3"></div><div id="D53-C4"></div><div id="D53-C5"></div><div onclick="seleccionarDiente('D53');">D53</div></div>
    <div class="diente" id="D52"><div id="D52-C1"></div><div id="D52-C2"></div><div id="D52-C3"></div><div id="D52-C4"></div><div id="D52-C5"></div><div onclick="seleccionarDiente('D52');">D52</div></div>
    <div class="diente" id="D51"><div id="D51-C1"></div><div id="D51-C2"></div><div id="D51-C3"></div><div id="D51-C4"></div><div id="D51-C5"></div><div onclick="seleccionarDiente('D51');">D51</div></div>
    |-|
    <div class="diente" id="D61"><div id="D61-C1"></div><div id="D61-C2"></div><div id="D61-C3"></div><div id="D61-C4"></div><div id="D61-C5"></div><div onclick="seleccionarDiente('D61');">D61</div></div>
    <div class="diente" id="D62"><div id="D62-C1"></div><div id="D62-C2"></div><div id="D62-C3"></div><div id="D62-C4"></div><div id="D62-C5"></div><div onclick="seleccionarDiente('D62');">D62</div></div>
    <div class="diente" id="D63"><div id="D63-C1"></div><div id="D63-C2"></div><div id="D63-C3"></div><div id="D63-C4"></div><div id="D63-C5"></div><div onclick="seleccionarDiente('D63');">D63</div></div>
    <div class="diente" id="D64"><div id="D64-C1"></div><div id="D64-C2"></div><div id="D64-C3"></div><div id="D64-C4"></div><div id="D64-C5"></div><div onclick="seleccionarDiente('D64');">D64</div></div>
    <div class="diente" id="D65"><div id="D65-C1"></div><div id="D65-C2"></div><div id="D65-C3"></div><div id="D65-C4"></div><div id="D65-C5"></div><div onclick="seleccionarDiente('D65');">D65</div></div>
  </section>
  <br><br>
  <section id="odontogramaInferior" class="textAlignCenter">
    <div class="diente" id="D85"><div id="D85-C1"></div><div id="D85-C2"></div><div id="D85-C3"></div><div id="D85-C4"></div><div id="D85-C5"></div><div onclick="seleccionarDiente('D85');">D85</div></div>
    <div class="diente" id="D84"><div id="D84-C1"></div><div id="D84-C2"></div><div id="D84-C3"></div><div id="D84-C4"></div><div id="D84-C5"></div><div onclick="seleccionarDiente('D84');">D84</div></div>
    <div class="diente" id="D83"><div id="D83-C1"></div><div id="D83-C2"></div><div id="D83-C3"></div><div id="D83-C4"></div><div id="D83-C5"></div><div onclick="seleccionarDiente('D83');">D83</div></div>
    <div class="diente" id="D82"><div id="D82-C1"></div><div id="D82-C2"></div><div id="D82-C3"></div><div id="D82-C4"></div><div id="D82-C5"></div><div onclick="seleccionarDiente('D82');">D82</div></div>
    <div class="diente" id="D81"><div id="D81-C1"></div><div id="D81-C2"></div><div id="D81-C3"></div><div id="D81-C4"></div><div id="D81-C5"></div><div onclick="seleccionarDiente('D81');">D81</div></div>
    |-|
    <div class="diente" id="D71"><div id="D71-C1"></div><div id="D71-C2"></div><div id="D71-C3"></div><div id="D71-C4"></div><div id="D71-C5"></div><div onclick="seleccionarDiente('D71');">D71</div></div>
    <div class="diente" id="D72"><div id="D72-C1"></div><div id="D72-C2"></div><div id="D72-C3"></div><div id="D72-C4"></div><div id="D72-C5"></div><div onclick="seleccionarDiente('D72');">D72</div></div>
    <div class="diente" id="D73"><div id="D73-C1"></div><div id="D73-C2"></div><div id="D73-C3"></div><div id="D73-C4"></div><div id="D73-C5"></div><div onclick="seleccionarDiente('D73');">D73</div></div>
    <div class="diente" id="D74"><div id="D74-C1"></div><div id="D74-C2"></div><div id="D74-C3"></div><div id="D74-C4"></div><div id="D74-C5"></div><div onclick="seleccionarDiente('D74');">D74</div></div>
    <div class="diente" id="D75"><div id="D75-C1"></div><div id="D75-C2"></div><div id="D75-C3"></div><div id="D75-C4"></div><div id="D75-C5"></div><div onclick="seleccionarDiente('D75');">D75</div></div><br><br>
    
    
    
    <input type="text" id="txtD85" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD84" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD83" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD82" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD81" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD71" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD72" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD73" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD74" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD75" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">      
    <br><hr>

    <div class="diente" id="D48"><div id="D48-C1"></div><div id="D48-C2"></div><div id="D48-C3"></div><div id="D48-C4"></div><div id="D48-C5"></div><div onclick="seleccionarDiente('D48');">D48</div></div>
    <div class="diente" id="D47"><div id="D47-C1"></div><div id="D47-C2"></div><div id="D47-C3"></div><div id="D47-C4"></div><div id="D47-C5"></div><div onclick="seleccionarDiente('D47');">D47</div></div>
    <div class="diente" id="D46"><div id="D46-C1"></div><div id="D46-C2"></div><div id="D46-C3"></div><div id="D46-C4"></div><div id="D46-C5"></div><div onclick="seleccionarDiente('D46');">D46</div></div>
    <div class="diente" id="D45"><div id="D45-C1"></div><div id="D45-C2"></div><div id="D45-C3"></div><div id="D45-C4"></div><div id="D45-C5"></div><div onclick="seleccionarDiente('D45');">D45</div></div>
    <div class="diente" id="D44"><div id="D44-C1"></div><div id="D44-C2"></div><div id="D44-C3"></div><div id="D44-C4"></div><div id="D44-C5"></div><div onclick="seleccionarDiente('D44');">D44</div></div>
    <div class="diente" id="D43"><div id="D43-C1"></div><div id="D43-C2"></div><div id="D43-C3"></div><div id="D43-C4"></div><div id="D43-C5"></div><div onclick="seleccionarDiente('D43');">D43</div></div>
    <div class="diente" id="D42"><div id="D42-C1"></div><div id="D42-C2"></div><div id="D42-C3"></div><div id="D42-C4"></div><div id="D42-C5"></div><div onclick="seleccionarDiente('D42');">D42</div></div>
    <div class="diente" id="D41"><div id="D41-C1"></div><div id="D41-C2"></div><div id="D41-C3"></div><div id="D41-C4"></div><div id="D41-C5"></div><div onclick="seleccionarDiente('D41');">D41</div></div>
    |-|
    <div class="diente" id="D31"><div id="D31-C1"></div><div id="D31-C2"></div><div id="D31-C3"></div><div id="D31-C4"></div><div id="D31-C5"></div><div onclick="seleccionarDiente('D31');">D31</div></div>
    <div class="diente" id="D32"><div id="D32-C1"></div><div id="D32-C2"></div><div id="D32-C3"></div><div id="D32-C4"></div><div id="D32-C5"></div><div onclick="seleccionarDiente('D32');">D32</div></div>
    <div class="diente" id="D33"><div id="D33-C1"></div><div id="D33-C2"></div><div id="D33-C3"></div><div id="D33-C4"></div><div id="D33-C5"></div><div onclick="seleccionarDiente('D33');">D33</div></div>
    <div class="diente" id="D34"><div id="D34-C1"></div><div id="D34-C2"></div><div id="D34-C3"></div><div id="D34-C4"></div><div id="D34-C5"></div><div onclick="seleccionarDiente('D34');">D34</div></div>
    <div class="diente" id="D35"><div id="D35-C1"></div><div id="D35-C2"></div><div id="D35-C3"></div><div id="D35-C4"></div><div id="D35-C5"></div><div onclick="seleccionarDiente('D35');">D35</div></div>
    <div class="diente" id="D36"><div id="D36-C1"></div><div id="D36-C2"></div><div id="D36-C3"></div><div id="D36-C4"></div><div id="D36-C5"></div><div onclick="seleccionarDiente('D36');">D36</div></div>
    <div class="diente" id="D37"><div id="D37-C1"></div><div id="D37-C2"></div><div id="D37-C3"></div><div id="D37-C4"></div><div id="D37-C5"></div><div onclick="seleccionarDiente('D37');">D37</div></div>
    <div class="diente" id="D38"><div id="D38-C1"></div><div id="D38-C2"></div><div id="D38-C3"></div><div id="D38-C4"></div><div id="D38-C5"></div><div onclick="seleccionarDiente('D38');">D38</div></div><br><br>
    
    <input type="text" id="txtD48" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD47" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD46" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD45" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD44" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD43" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD42" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD41" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD31" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD32" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD33" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD34" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD35" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD36" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD37" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD38" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
  </section>
</div>

<script src="assets/script/jsTratamiento.js"></script>


<hr>


        <div id="delete-referencia" style="display:none;"></div>
        <section id="seccionPaginaAjax"></section>


    <div class="row">


  <section class="displayInlineBlockMiddle">
        
        <div class="dienteGeneral" id="dienteGeneral">
        
        <div id="C1" onClick="seleccionarCara(this.id);"></div>
        <div id="C2" onClick="seleccionarCara(this.id);"></div>
        <div id="C3" onClick="seleccionarCara(this.id);"></div>
        <div id="C4" onClick="seleccionarCara(this.id);"></div>
        <div id="C5" onClick="seleccionarCara(this.id);"></div>
        
<input type="text" id="txtIdentificadorDienteGeneral" name="txtIdentificadorDienteGeneral" value="DXX" readonly="readonly">
        </div>
        
</section>

<section class="displayInlineBlockMiddle">

 <div id="odontograma" class="formulario sombraFormulario labelPequenio">

 <!-- <form id="odontograma" class="formulario sombraFormulario labelPequenio" method="post">-->

          <div class="tituloFormulario">DATOS DEL TRATAMIENTO</div>
          <div class="contenidoInterno">
            <label for=""><b>Diente Tratado:</b></label>
            <input type="text" id="txtDienteTratado" name="txtDienteTratado" class="textAlignCenter" size="4" readonly="readonly">
            <br>
            <label for=""><b>Cara Tratada:</b></label>
            <input type="text" id="txtCaraTratada" name="txtCaraTratada" class="textAlignCenter" size="4" readonly="readonly">
            <br>
            <label for=""><b>Referencias:</b></label>
            <select id="cbxEstado" name="cbxEstado" style="white">
              <option value="">SELECCIONE REFERENCIA</option>
              <option value="1-DO: EN AZUL DIENTE OBTURADO">DO: EN AZUL DIENTE OBTURADO</option>
              <option value="2-C: EN ROJO CARIADO">C: EN ROJO CARIADO</option>
              <option value="3--: EN AZUL AUSENTE">-: EN AZUL AUSENTE</option>
              <option value="4-X: EN ROJO EXODONCIA">X: EN ROJO EXODONCIA</option>
              <option value="5-CP: EN ROJO CARIES PENETRANTE">CP: EN ROJO CARIES PENETRANTE</option>
              <option value="6-R: EN ROJO RETENIDO">R: EN ROJO RETENIDO</option>
              <option value="7-EN AZUL PIEZA DE PUENTE">FP: EN AZUL PIEZA DE PUENTE</option>
              <option value="8-CO: EN AZUL CORONA">CO: EN AZUL CORONA</option>
              <option value="9-PR: EN AZUL PROTESIS REMOVIBLE">PR: EN AZUL PROTESIS REMOVIBLE</option>
              <option value="10-INC: INSCRUSTACION">INC: INSCRUSTACIÓN</option>
              <option value="11-EP: EN ROJO ENFERMEDAD PERIODONTAL">EP: EN ROJO ENFERMEDAD PERIODONTAL</option>
              <option value="12-FD: EN ROJO FRACTURA DENTARIA">FD: EN ROJO FRACTURA DENTARIA</option>
              <option value="13-MPD: EN ROJO MAL POSICION DENTARIA">MPD: EN ROJO MAL POSICION DENTARIA</option>
              <option value="14-PM: EN AZUL PERNO MUÑON">PM: EN AZUL PERNO MUÑON</option>
              <option value="15-TC: EN AZUL TRATAMIENTO DE CONDUCTO">TC: EN AZUL TRATAMIENTO DE CONDUCTO</option>
              <option value="16-F: EN ROJO FLUOROSIS">F: EN ROJO FLUOROSIS</option>
              <option value="17-IMP: EN AZUL IMPLANTE DENTAL">IMP: EN AZUL IMPLANTE DENTAL</option>
              <option value="18-MB: EN ROJO MANCHA BLANCA">MB: EN ROJO MANCHA BLANCA</option>
              <option value="19-SC: EN AZUL SELLADOR">SC: EN AZUL SELLADOR</option>
              <option value="20-SP SR: EN AZUL SURCO PROFUNDO">SP SR: EN AZUL SURCO PROFUNDO</option>
              <option value="21-HP: EN AZUL HIPOPLASIA DE ESMALTE">HP: EN AZUL HIPOPLASIA DE ESMALTE</option>
            </select>
            <br></br>
            
  <div class="modal-footer">
            
<button type="button" class="btn btn-primary waves-effect waves-light" onClick="guardarTratamiento();"><span class="fa fa-check-square-o"></span> Registrar</button>
  
<button type="button" class="btn btn-success waves-effect waves-light" onClick="agregarTratamiento($('#txtDienteTratado').val(), $('#txtCaraTratada').val(), $('#cbxEstado').val());"><span class="fa fa-plus"></span> Agregar</button>
                </div>
          </div>
        </div><!--form--->
      </section>



<section class="displayInlineBlockTop">
<div id="divTratamiento" class="displayInlineBlockTop sombraFormulario" style="width: 440px;height:216px;overflow-y: scroll;">
<table id="tablaTratamiento" class="table table-small-font table-bordered table-striped" border="1" cellspacing="0" width="100%">
          <thead>
                    <tr align="center">
                        <th><label>DIENTE</label></th>
                        <th><label>CARA</label></th>
                        <th><label>REFERENCIAS</label></th>
                    </tr>
                    </thead>
            <tbody>
            
            <?php 
if($reg[0]['estados']==""){

echo "";

} else {

$explode = explode("__",$reg[0]['estados']);
$listaSimple = array_values(array_unique($explode));

for($cont=0; $cont<COUNT($listaSimple); $cont++):
# Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
list($diente,$caradiente,$referencias) = explode("_",$listaSimple[$cont]);
?>
  <tr>
<td align="center"><?php echo $diente; ?></td>
<td align="center"><?php echo $caradiente; ?></td>
<td align="center"><?php echo $referencias; ?></td>
  
<td><a class="btn btn-danger btn-xs" data-placement="left" data-toggle="tooltip" data-original-title="Eliminar" onClick="EliminarReferencia('<?php echo $cont ?>','<?php echo base64_encode($reg[0]['codpaciente']); ?>','<?php echo base64_encode("REFERENCIAS") ?>')"><i class="fa fa-trash-o"></i></a></td>
</tr><?php endfor; } ?>
            
            </tbody>
        </table>
      </div>

  </section>

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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Antecedentes Médicos</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
              
               <div class="col-md-12"> 


      <div class="table-responsive" data-pattern="priority-columns">
                      <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Tratamiento M&eacute;dico: </label></td>
<td><div class="radio radio-primary"><input name="tratamientomedico" id="tratamientomedico1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="tratamientomedico1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="tratamientomedico" id="tratamientomedico2" class="radio" value="NO" required="" aria-required="true"><label for="tratamientomedico2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="tratamientomedico" id="tratamientomedico3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="tratamientomedico3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualestratamiento" id="cualestratamiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuales Tratamiento" ><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Ingesta de Medicamentos: </label></td>
<td> <div class="radio radio-primary"><input name="ingestamedicamentos" id="ingestamedicamentos1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="ingestamedicamentos1">SI</label></div> </td>
<td>&nbsp;</td>
<td> <div class="radio radio-primary"><input type="radio" name="ingestamedicamentos" id="ingestamedicamentos2" class="radio" value="NO"  required="" aria-required="true"><label for="ingestamedicamentos2">NO</label></div> </td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="ingestamedicamentos" id="ingestamedicamentos3" class="radio" value="NO SABE"  required="" aria-required="true" /><label for="ingestamedicamentos3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualesingesta" id="cualesingesta" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuales Medicamentos"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Reacciones Alérgicas: </label></td>
<td><div class="radio radio-primary"><input name="alergias" id="alergias1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="alergias1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="alergias" id="alergias2" class="radio" value="NO" required="" aria-required="true"><label for="alergias2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="alergias" id="alergias3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="alergias3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualesalergias" id="cualesalergias" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuales Alergias"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Hemorragia:</label></td>
<td><div class="radio radio-primary"><input name="hemorragias" id="hemorragias1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="hemorragias1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hemorragias" id="hemorragias2" class="radio" value="NO" required="" aria-required="true"><label for="hemorragias2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hemorragias" id="hemorragias3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="hemorragias3">NO SABE</label></div></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="cualeshemorragias" id="cualeshemorragias" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuales Hemorragias"/><i class="fa fa-pencil form-control-feedback"></i></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Sinositis:</label></td>
<td><div class="radio radio-primary"><input name="sinositis" id="sinositis1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="sinositis1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sinositis" id="sinositis2" class="radio" value="NO" required="" aria-required="true"><label for="sinositis2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sinositis" id="sinositis3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="sinositis3">NO SABE</label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Enfermedad Respiratoria: </span></td>
<td><div class="radio radio-primary"><input name="enfermedadrespiratoria" id="enfermedadrespiratoria1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="enfermedadrespiratoria1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="enfermedadrespiratoria" id="enfermedadrespiratoria2" class="radio" value="NO" required="" aria-required="true" /><label for="enfermedadrespiratoria2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="enfermedadrespiratoria" id="enfermedadrespiratoria3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="enfermedadrespiratoria3">NO SABE</label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Diabetes: </label></td>
<td><div class="radio radio-primary"><input name="diabetes" id="diabetes1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="diabetes1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="diabetes" id="diabetes2" class="radio" value="NO"  required="" aria-required="true" /><label for="diabetes2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="diabetes" id="diabetes3" class="radio" value="NO SABE"  required="" aria-required="true" /><label for="diabetes3">NO SABE</label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Cardiopatia:</label></td>
<td><div class="radio radio-primary"><input name="cardiopatia" id="cardiopatia1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="cardiopatia1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cardiopatia" id="cardiopatia2" class="radio" value="NO" required="" aria-required="true" /><label for="cardiopatia2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cardiopatia" id="cardiopatia3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="cardiopatia3">NO SABE</label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Hepatitis:</label></td>
<td><div class="radio radio-primary"><input name="hepatitis" id="hepatitis1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="hepatitis1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepatitis" id="hepatitis2" class="radio" value="NO" required="" aria-required="true" /><label for="hepatitis2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepatitis" id="hepatitis3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="hepatitis3">NO SABE</label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Hipertensión Arterial:</label></td>
<td><div class="radio radio-primary"><input name="hepertension" id="hepertension1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="hepertension1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepertension" id="hepertension2" class="radio" value="NO" required="" aria-required="true" /><label for="hepertension2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="hepertension" id="hepertension3" class="radio" value="NO SABE" required="" aria-required="true" /><label for="hepertension3">NO SABE</label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                        </table>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Hábitos de Salud Oral</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
                
      <div class="table-responsive" data-pattern="priority-columns">
                      <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Asistencia a Odontología: </label></td>
<td><div class="radio radio-primary"><input name="asistenciaodontologica" id="asistenciaodontologica1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="asistenciaodontologica1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="asistenciaodontologica" id="asistenciaodontologica2" class="radio" value="NO" required="" aria-required="true"><label for="asistenciaodontologica2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Fecha Ultima visita: </label></td>
<td><div class="form-group has-feedback"> <input class="form-control calendario" type="text" name="ultimavisitaodontologia" id="ultimavisitaodontologia" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Fecha Ultima Visita"><i class="fa fa-calendar form-control-feedback"></i>
                                                        </div> </td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Cepillado:</label></td>
<td><div class="radio radio-primary"><input name="cepillado" id="cepillado1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="cepillado1">SI</label></div> </td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cepillado" id="cepillado2" class="radio" value="NO"  required="" aria-required="true"><label for="cepillado2">NO</label></div> </td>
<td>&nbsp;</td>
<td><label>Cuantas Veces al día: </span></td>
<td><div class="form-group has-feedback"> <input class="form-control" type="text" name="cuantoscepillados" id="cuantoscepillados" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuantos Cepillados"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Seda Dental: </label></td>
<td><div class="radio radio-primary"><input name="sedadental" id="sedadental1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="sedadental1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sedadental" id="sedadental2" class="radio" value="NO" required="" aria-required="true"><label for="sedadental2">NO</label></div> </td>
<td>&nbsp;</td>
<td><label>Cuantas Veces al día:</label></td>
<td><div class="form-group has-feedback"> <input class="form-control" type="text" name="cuantascedasdetal" id="cuantascedasdetal" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cuanta Seda Dental"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Crema Dental:</label></td>
<td><div class="radio radio-primary"><input name="cremadental" id="cremadental1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="cremadental1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="cremadental" id="cremadental2" class="radio" value="NO" required="" aria-required="true"><label for="cremadental2">NO</label></div></td>
<td>&nbsp;</td>
<td></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Enjuague:</label></td>
<td><div class="radio radio-primary"><input name="enjuague" id="enjuague1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="enjuague1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="enjuague" id="enjuague2" class="radio" value="NO" required="" aria-required="true"><label for="enjuague2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Otros:</label></td>
<td><div class="form-group has-feedback"><input class="form-control" type="text" name="otros" id="otros" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Otros"><i class="fa fa-pencil form-control-feedback"></i></div></td>
                                                                  </tr>
                                                             </table>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Estado Periodontal</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
         
        <div class="table-responsive" data-pattern="priority-columns">
                        <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Sangran Encias al Cepillar: </label></td>
<td><div class="radio radio-primary"><input name="sangranencias" id="sangranencias1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="sangranencias1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="sangranencias" id="sangranencias2" class="radio" value="NO" required="" aria-required="true"><label for="sangranencias2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Toma Agua de la Llave:</label></td>
<td><div class="radio radio-primary"><input name="tomaaguallave" id="tomaaguallave1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="tomaaguallave1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="tomaaguallave" id="tomaaguallave2" class="radio" value="NO"  required="" aria-required="true"><label for="tomaaguallave2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Le Aplican elementos que contienen Fluor: </label></td>
<td><div class="radio radio-primary"><input name="elementosconfluor" id="elementosconfluor1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="elementosconfluor1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="elementosconfluor" id="elementosconfluor2" class="radio" value="NO" required="" aria-required="true"><label for="elementosconfluor2">NO</label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Aparatos de Ortodoncia:</label></td>
<td><div class="radio radio-primary"><input name="aparatosortodoncia" id="aparatosortodoncia1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="aparatosortodoncia1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="aparatosortodoncia" id="aparatosortodoncia2" class="radio" value="NO" required="" aria-required="true"><label for="aparatosortodoncia2">NO</label></div></td>
<td>&nbsp;</td>
<td></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Protésis:</label></td>
<td><div class="radio radio-primary"><input name="protesis" id="protesis1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="protesis1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="protesis" id="protesis2" class="radio" value="NO" required="" aria-required="true"><label for="protesis2">NO</label></div></td>
<td>&nbsp;</td>
<td><div class="checkbox checkbox-primary"><input name="protesisfija" id="protesisfija" type="checkbox" value="Fija"><label for="protesisfija">Fija</label></div></td>
<td><div class="checkbox checkbox-primary"><input name="protesisremovible" id="protesisremovible" type="checkbox" value="Removible"><label for="protesisremovible">Removible</label> </div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                  </table>


    <table width="100%">
                                                                    <tr>
<td height="24">&nbsp;</td>
<td colspan="4"><label>ARTICULACIÓN TEMPORO-MANDIBULAR</label></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td width="1" height="24">&nbsp;</td>
<td width="157"><label>Labios: </label></td>
<td width="104"><div class="radio radio-primary"><input name="labios" id="labios1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true"><label for="labios1">NORMAL</label></div></td>
<td width="10">&nbsp;</td>
<td width="120"><div class="radio radio-primary"><input type="radio" name="labios" id="labios2" class="radio" value="ANORMAL" required="" aria-required="true"><label for="labios2">ANORMAL</label></div></td>
<td width="10">&nbsp;</td>
<td width="181"><label>Senos Maxilares:</label></td>
<td width="103"><div class="radio radio-primary"><input name="senosmaxilares" id="senosmaxilares1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="senosmaxilares1">NORMAL</label></div></td>
<td width="118"><div class="radio radio-primary"><input type="radio" name="senosmaxilares" id="senosmaxilares2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="senosmaxilares2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Lengua:</label></td>
<td><div class="radio radio-primary"><input name="lengua" id="lengua1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true"><label for="lengua1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="lengua" id="lengua2" class="radio" value="ANORMAL"  required="" aria-required="true"><label for="lengua2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Musculos Masticadores:</label></td>
<td><div class="radio radio-primary"><input name="musculosmasticadores" id="musculosmasticadores1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="musculosmasticadores1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="musculosmasticadores" id="musculosmasticadores2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="musculosmasticadores2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Paladar: </span></td>
<td><div class="radio radio-primary"><input name="paladar" id="paladar1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true"><label for="paladar1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="paladar" id="paladar2" class="radio" value="ANORMAL" required="" aria-required="true"><label for="paladar2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Sistema Nervioso:</label></td>
<td><div class="radio radio-primary"><input name="sistemanervioso" id="sistemanervioso1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="sistemanervioso1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="sistemanervioso" id="sistemanervioso2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="sistemanervioso2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Piso de la Boca:</label></td>
<td><div class="radio radio-primary"><input name="pisoboca" id="pisoboca1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true"><label for="pisoboca1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="pisoboca" id="pisoboca2" class="radio" value="ANORMAL" required="" aria-required="true"><label for="pisoboca2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Vascular:</label></td>
<td><div class="radio radio-primary"><input name="sistemavascular" id="sistemavascular1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="sistemavascular1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="sistemavascular" id="sistemavascular2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="sistemavascular2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Carrillos:</label></td>
<td><div class="radio radio-primary"><input name="carrillos" id="carrillos1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true"><label for="carrillos1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="carrillos" id="carrillos2" class="radio" value="ANORMAL" required="" aria-required="true"><label for="carrillos2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Linfático Regional:</span></td>
<td><div class="radio radio-primary"><input name="sistemalinfatico" id="sistemalinfatico1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="sistemalinfatico1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="sistemalinfatico" id="sistemalinfatico2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="sistemalinfatico2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Glandulas Salivales:</label></td>
<td><div class="radio radio-primary"><input name="glandulasalivales" id="glandulasalivales1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="glandulasalivales1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="glandulasalivales" id="glandulasalivales2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="glandulasalivales2">ANORMAL</label></div></td>
<td>&nbsp;</td>
<td><label>Función Oclusal:</label></td>
<td><div class="radio radio-primary"><input name="funcionoclusal" id="funcionoclusal1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="funcionoclusal1">NORMAL</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="funcionoclusal" id="funcionoclusal2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="funcionoclusal2">ANORMAL</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Maxilar:</span></td>
<td><div class="radio radio-primary"><input name="maxilar" id="maxilar1" type="radio" class="radio" value="NORMAL" checked="checked" required="" aria-required="true" /><label for="maxilar1">NORMAL</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="maxilar" id="maxilar2" class="radio" value="ANORMAL" required="" aria-required="true" /><label for="maxilar2">ANORMAL</label></div></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td><label>Observaciones:</label></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td colspan="8"><div class="form-group has-feedback"><textarea name="observacionperiodontal" class="form-control" id="observacionperiodontal" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observacion de Estado Periodontal" rows="4" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                                                    </tr>
                                                                  </table>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Exámen Dental</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12">

          <div class="table-responsive" data-pattern="priority-columns">
                        <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Supernumerarios: </label></td>
<td><div class="radio radio-primary"><input name="supernumerarios" id="supernumerarios1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="supernumerarios1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="supernumerarios" id="supernumerarios2" class="radio" value="NO" required="" aria-required="true"><label for="supernumerarios2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Placa Blanda: </label></td>
<td><div class="radio radio-primary"><input name="placablanda" id="placablanda1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="placablanda1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="placablanda" id="placablanda2" class="radio" value="NO" required="" aria-required="true" /><label for="placablanda2">NO</label></div></td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Adración:</label></td>
<td> <div class="radio radio-primary"><input name="adracion" id="adracion1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="adracion1">SI</label></div> </td>
<td>&nbsp;</td>
<td> <div class="radio radio-primary"><input type="radio" name="adracion" id="adracion2" class="radio" value="NO"  required="" aria-required="true"><label for="adracion2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Placa Calificada: </label></td>
<td><div class="radio radio-primary"><input name="placacalificada" id="placacalificada1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true" /><label for="placacalificada1">SI</label></div></td>
<td><div class="radio radio-primary"><input type="radio" name="placacalificada" id="placacalificada2" class="radio" value="NO" required="" aria-required="true" /><label for="placacalificada2">NO</label></div> </td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Manchas: </label></td>
<td><div class="radio radio-primary"><input name="manchas" id="manchas1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="manchas1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="manchas" id="manchas2" class="radio" value="NO" required="" aria-required="true"><label for="manchas2">NO</label></div></td>
<td>&nbsp;</td>
<td><label>Otros:</label></td>
<td colspan="2"><div class="form-group has-feedback"><input class="form-control" type="text" name="otrosdental" id="otrosdental" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Otros"/><i class="fa fa-pencil form-control-feedback"></i></div></td></tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Patología Pulpar:</label></td>
<td><div class="radio radio-primary"><input name="patologiapulpar" id="patologiapulpar1" type="radio" class="radio" value="SI" checked="checked" required="" aria-required="true"><label for="patologiapulpar1">SI</label></div></td>
<td>&nbsp;</td>
<td><div class="radio radio-primary"><input type="radio" name="patologiapulpar" id="patologiapulpar2" class="radio" value="NO" required="" aria-required="true"><label for="patologiapulpar2">NO</label></div></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td><label>Observaciones:</label></td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                      <td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td>&nbsp;</td>
<td colspan="8"><div class="form-group has-feedback"><textarea name="observacionexamendental" class="form-control" id="observacionexamendental" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observacion de Examen Dental" rows="4" required="" aria-required="true"></textarea><i class="fa fa-pencil form-control-feedback"></i></td>
                                                                    </tr>
                                                                  </table>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Diagnóstico y Pronóstico</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">

  
            <div class="row">
           <div class="col-md-6"> 
               <div class="form-group has-feedback">

          <table width="100%" id="tabla"><tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar()"><span class="fa fa-times"></span> Eliminar Dx</button>  

<div class="form-group has-feedback"> 
      <label class="control-label">Dx Presuntivo: <span class="symbol required"></span></label>
<input name="idciepresuntivo[]" type="hidden" id="idciepresuntivo"/>
<input type="text" id="presuntivo" name="presuntivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" title="Ingrese Dx Presuntivo" required="" aria-required="true"><i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>


         <div class="col-md-6"> 
            <div class="form-group has-feedback"> 
        <table width="100%" id="tabla2">
  <tr>
    <td><div class="col-md-13">  
<button type="button" class="btn btn-info waves-effect waves-light" onClick="addRowX2()"><span class="fa fa-plus"></span> Agregar Dx</button>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="borrar2()"><span class="fa fa-times"></span> Eliminar Dx</button> 

<div class="form-group has-feedback"> 
      <label class="control-label">Dx Definitivo: <span class="symbol required"></span></label>
<input name="idciedefinitivo[]" type="hidden" id="idciedefinitivo"/>
<input type="text" id="definitivo" name="definitivo[]" onKeyUp="this.value=this.value.toUpperCase(); autocompletar2(this.name);" class="form-control" placeholder="Ingrese Nombre de Dx para tu Busqueda" title="Ingrese Dx Definitivo" required="" aria-required="true">
                  <i class="fa fa-pencil form-control-feedback"></i>
                  </div> 
           </div></td>
    </tr><input type="hidden" name="var_cont">
</table>
                </div> 
              </div>
  </div>



   <div class="row">

        <div class="col-md-12"> 
                 <div class="form-group has-feedback">
<label class="control-label">Pronóstico: <span class="symbol required"></span></label> 
<textarea name="pronostico" class="form-control" id="pronostico" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Pronóstico" rows="3" required="" aria-required="true"></textarea>
                  <i class="fa fa-comment form-control-feedback"></i>
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
<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-edit"></i> Plan de Tratamiento</h3></div>
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
            <div class="box-body">
  
             <div class="row">
               <div class="col-md-12"> 
               
         <div class="table-responsive" data-pattern="priority-columns">
                          <table width="100%">
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Operatorio: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento1" type="checkbox" class="checkbox" value="Operatorio" /><label for="plantratamiento1"></label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>Cirug&iacute;a Oral: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento2" type="checkbox" class="checkbox" value="Cirugia Oral" /><label for="plantratamiento2"></label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Periodoncia:</label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento3" type="checkbox" value="Periodoncia" /><label for="plantratamiento3"></label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>Endodoncia: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento4" type="checkbox" value="Endodoncia"/><label for="plantratamiento4"></label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Ortodoncia: </label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento5" type="checkbox" value="Ortodoncia"/><label for="plantratamiento5"></label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><label>Prótesis:</label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento6" type="checkbox" value="Protesis"/><label for="plantratamiento6"></label></div></td>
<td>&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
<td>&nbsp;</td>
<td><label>Medicina Oral:</label></td>
<td><div class="checkbox checkbox-primary"><input name="plantratamiento[]" id="plantratamiento7" type="checkbox" value="Medicina Oral"/><label for="plantratamiento7"> </label></div></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td colspan="2"></td>
                                                                    </tr>
                                                      </table>
                                            </div> 
                         </div>
              </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('observacionperiodontal').value = '',
    document.getElementById('observacionexamendental').value = '',
    document.getElementById('idciepresuntivo').value = '',
    document.getElementById('presuntivo').value = '',
    document.getElementById('idciedefinitivo').value = '',
    document.getElementById('definitivo').value = '',
    document.getElementById('pronostico').value = '''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>

                  </div><!-- /.box-body -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

  <?php  
          }
      }
 } 
############################# CREAR ODONTOLOGIA ############################
?>

<?php
############################# FUNCION TABLA TRATAMIENTOS ############################
if (isset($_GET['BuscaTablaTratamiento']) && isset($_GET['codpaciente'])) { 

$codpaciente=$_GET['codpaciente'];

$tra = new Login();
$reg = $tra->ReferenciaOdontogramaPorId();
?>

<table id="tablaTratamiento" class="table table-small-font table-bordered table-striped" border="1" cellspacing="0" width="100%">
          <thead>
                    <tr align="center">
                        <th><label>DIENTE</label></th>
                        <th><label>CARA</label></th>
                        <th><label>REFERENCIAS</label></th>
                    </tr>
                    </thead>
            <tbody>
            
            <?php 
if($reg[0]['estados']==""){

echo "";

} else {

$explode = explode("__",$reg[0]['estados']);
$listaSimple = array_values(array_unique($explode));

for($cont=0; $cont<COUNT($listaSimple); $cont++):
# Listo 3 variables donde guardare lo que me retorne el explode de cada posicion del array.
list($diente,$caradiente,$referencias) = explode("_",$listaSimple[$cont]);
?>
  <tr>
<td align="center"><?php echo $diente; ?></td>
<td align="center"><?php echo $caradiente; ?></td>
<td align="center"><?php echo $referencias; ?></td>
  
<td><a class="btn btn-danger btn-xs" data-placement="left" data-toggle="tooltip" data-original-title="Eliminar" onClick="EliminarReferencia('<?php echo $cont ?>','<?php echo base64_encode($reg[0]['codpaciente']); ?>','<?php echo base64_encode("REFERENCIAS") ?>')"><i class="fa fa-trash-o"></i></a></td>
</tr><?php endfor; } ?>
            
            </tbody>
        </table>
<?php
   } 
############################# FUNCION TABLA TRATAMIENTOS ############################
?>



<?php
############################# FUNCION BUSQUEDA ODONTOGRAMA ############################
if (isset($_GET['BuscaOdontograma']) && isset($_GET['codpaciente'])) { 

$codpaciente=$_GET['codpaciente'];

$tra = new Login();
$reg = $tra->ReferenciaOdontogramaPorId();
?>

 <div>
<input type="hidden" id="hiddenEstados" name="estados" value="<?php echo $reg[0]['estados']; ?>">
<input type="hidden" id="codpaciente" name="codpaciente" value="<?php echo $reg[0]['codpaciente']; ?>">
  <section id="odontogramaSuperior" class="textAlignCenter">
      <input type="text" id="txtD18" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD17" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD16" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD15" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD14" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD13" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD12" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD11" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD21" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD22" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD23" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD24" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD25" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD26" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD27" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD28" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    
    <br>
        
    <div class="diente" id="D18"><div id="D18-C1"></div><div id="D18-C2"></div><div id="D18-C3"></div><div id="D18-C4"></div><div id="D18-C5"></div><div onclick="seleccionarDiente('D18');">D18</div></div>
    <div class="diente" id="D17"><div id="D17-C1"></div><div id="D17-C2"></div><div id="D17-C3"></div><div id="D17-C4"></div><div id="D17-C5"></div><div onclick="seleccionarDiente('D17');">D17</div></div>
    <div class="diente" id="D16"><div id="D16-C1"></div><div id="D16-C2"></div><div id="D16-C3"></div><div id="D16-C4"></div><div id="D16-C5"></div><div onclick="seleccionarDiente('D16');">D16</div></div>
    <div class="diente" id="D15"><div id="D15-C1"></div><div id="D15-C2"></div><div id="D15-C3"></div><div id="D15-C4"></div><div id="D15-C5"></div><div onclick="seleccionarDiente('D15');">D15</div></div>
    <div class="diente" id="D14"><div id="D14-C1"></div><div id="D14-C2"></div><div id="D14-C3"></div><div id="D14-C4"></div><div id="D14-C5"></div><div onclick="seleccionarDiente('D14');">D14</div></div>
    <div class="diente" id="D13"><div id="D13-C1"></div><div id="D13-C2"></div><div id="D13-C3"></div><div id="D13-C4"></div><div id="D13-C5"></div><div onclick="seleccionarDiente('D13');">D13</div></div>
    <div class="diente" id="D12"><div id="D12-C1"></div><div id="D12-C2"></div><div id="D12-C3"></div><div id="D12-C4"></div><div id="D12-C5"></div><div onclick="seleccionarDiente('D12');">D12</div></div>
    <div class="diente" id="D11"><div id="D11-C1"></div><div id="D11-C2"></div><div id="D11-C3"></div><div id="D11-C4"></div><div id="D11-C5"></div><div onclick="seleccionarDiente('D11');">D11</div></div>
    |-|
    <div class="diente" id="D21"><div id="D21-C1"></div><div id="D21-C2"></div><div id="D21-C3"></div><div id="D21-C4"></div><div id="D21-C5"></div><div onclick="seleccionarDiente('D21');">D21</div></div>
    <div class="diente" id="D22"><div id="D22-C1"></div><div id="D22-C2"></div><div id="D22-C3"></div><div id="D22-C4"></div><div id="D22-C5"></div><div onclick="seleccionarDiente('D22');">D22</div></div>
    <div class="diente" id="D23"><div id="D23-C1"></div><div id="D23-C2"></div><div id="D23-C3"></div><div id="D23-C4"></div><div id="D23-C5"></div><div onclick="seleccionarDiente('D23');">D23</div></div>
    <div class="diente" id="D24"><div id="D24-C1"></div><div id="D24-C2"></div><div id="D24-C3"></div><div id="D24-C4"></div><div id="D24-C5"></div><div onclick="seleccionarDiente('D24');">D24</div></div>
    <div class="diente" id="D25"><div id="D25-C1"></div><div id="D25-C2"></div><div id="D25-C3"></div><div id="D25-C4"></div><div id="D25-C5"></div><div onclick="seleccionarDiente('D25');">D25</div></div>
    <div class="diente" id="D26"><div id="D26-C1"></div><div id="D26-C2"></div><div id="D26-C3"></div><div id="D26-C4"></div><div id="D26-C5"></div><div onclick="seleccionarDiente('D26');">D26</div></div>
    <div class="diente" id="D27"><div id="D27-C1"></div><div id="D27-C2"></div><div id="D27-C3"></div><div id="D27-C4"></div><div id="D27-C5"></div><div onclick="seleccionarDiente('D27');">D27</div></div>
    <div class="diente" id="D28"><div id="D28-C1"></div><div id="D28-C2"></div><div id="D28-C3"></div><div id="D28-C4"></div><div id="D28-C5"></div><div onclick="seleccionarDiente('D28');">D28</div></div><br><hr>
    
    <input type="text" id="txtD55" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD54" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD53" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD52" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD51" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD61" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD62" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD63" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD64" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD65" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly"><br>
    
    <div class="diente" id="D55"><div id="D55-C1"></div><div id="D55-C2"></div><div id="D55-C3"></div><div id="D55-C4"></div><div id="D55-C5"></div><div onclick="seleccionarDiente('D55');">D55</div></div>
    <div class="diente" id="D54"><div id="D54-C1"></div><div id="D54-C2"></div><div id="D54-C3"></div><div id="D54-C4"></div><div id="D54-C5"></div><div onclick="seleccionarDiente('D54');">D54</div></div>
    <div class="diente" id="D53"><div id="D53-C1"></div><div id="D53-C2"></div><div id="D53-C3"></div><div id="D53-C4"></div><div id="D53-C5"></div><div onclick="seleccionarDiente('D53');">D53</div></div>
    <div class="diente" id="D52"><div id="D52-C1"></div><div id="D52-C2"></div><div id="D52-C3"></div><div id="D52-C4"></div><div id="D52-C5"></div><div onclick="seleccionarDiente('D52');">D52</div></div>
    <div class="diente" id="D51"><div id="D51-C1"></div><div id="D51-C2"></div><div id="D51-C3"></div><div id="D51-C4"></div><div id="D51-C5"></div><div onclick="seleccionarDiente('D51');">D51</div></div>
    |-|
    <div class="diente" id="D61"><div id="D61-C1"></div><div id="D61-C2"></div><div id="D61-C3"></div><div id="D61-C4"></div><div id="D61-C5"></div><div onclick="seleccionarDiente('D61');">D61</div></div>
    <div class="diente" id="D62"><div id="D62-C1"></div><div id="D62-C2"></div><div id="D62-C3"></div><div id="D62-C4"></div><div id="D62-C5"></div><div onclick="seleccionarDiente('D62');">D62</div></div>
    <div class="diente" id="D63"><div id="D63-C1"></div><div id="D63-C2"></div><div id="D63-C3"></div><div id="D63-C4"></div><div id="D63-C5"></div><div onclick="seleccionarDiente('D63');">D63</div></div>
    <div class="diente" id="D64"><div id="D64-C1"></div><div id="D64-C2"></div><div id="D64-C3"></div><div id="D64-C4"></div><div id="D64-C5"></div><div onclick="seleccionarDiente('D64');">D64</div></div>
    <div class="diente" id="D65"><div id="D65-C1"></div><div id="D65-C2"></div><div id="D65-C3"></div><div id="D65-C4"></div><div id="D65-C5"></div><div onclick="seleccionarDiente('D65');">D65</div></div>
  </section>
  <br><br>
  <section id="odontogramaInferior" class="textAlignCenter">
    <div class="diente" id="D85"><div id="D85-C1"></div><div id="D85-C2"></div><div id="D85-C3"></div><div id="D85-C4"></div><div id="D85-C5"></div><div onclick="seleccionarDiente('D85');">D85</div></div>
    <div class="diente" id="D84"><div id="D84-C1"></div><div id="D84-C2"></div><div id="D84-C3"></div><div id="D84-C4"></div><div id="D84-C5"></div><div onclick="seleccionarDiente('D84');">D84</div></div>
    <div class="diente" id="D83"><div id="D83-C1"></div><div id="D83-C2"></div><div id="D83-C3"></div><div id="D83-C4"></div><div id="D83-C5"></div><div onclick="seleccionarDiente('D83');">D83</div></div>
    <div class="diente" id="D82"><div id="D82-C1"></div><div id="D82-C2"></div><div id="D82-C3"></div><div id="D82-C4"></div><div id="D82-C5"></div><div onclick="seleccionarDiente('D82');">D82</div></div>
    <div class="diente" id="D81"><div id="D81-C1"></div><div id="D81-C2"></div><div id="D81-C3"></div><div id="D81-C4"></div><div id="D81-C5"></div><div onclick="seleccionarDiente('D81');">D81</div></div>
    |-|
    <div class="diente" id="D71"><div id="D71-C1"></div><div id="D71-C2"></div><div id="D71-C3"></div><div id="D71-C4"></div><div id="D71-C5"></div><div onclick="seleccionarDiente('D71');">D71</div></div>
    <div class="diente" id="D72"><div id="D72-C1"></div><div id="D72-C2"></div><div id="D72-C3"></div><div id="D72-C4"></div><div id="D72-C5"></div><div onclick="seleccionarDiente('D72');">D72</div></div>
    <div class="diente" id="D73"><div id="D73-C1"></div><div id="D73-C2"></div><div id="D73-C3"></div><div id="D73-C4"></div><div id="D73-C5"></div><div onclick="seleccionarDiente('D73');">D73</div></div>
    <div class="diente" id="D74"><div id="D74-C1"></div><div id="D74-C2"></div><div id="D74-C3"></div><div id="D74-C4"></div><div id="D74-C5"></div><div onclick="seleccionarDiente('D74');">D74</div></div>
    <div class="diente" id="D75"><div id="D75-C1"></div><div id="D75-C2"></div><div id="D75-C3"></div><div id="D75-C4"></div><div id="D75-C5"></div><div onclick="seleccionarDiente('D75');">D75</div></div><br><br>
    
    
    
    <input type="text" id="txtD85" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD84" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD83" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD82" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD81" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD71" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD72" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD73" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD74" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD75" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">      
    <br><hr>

    <div class="diente" id="D48"><div id="D48-C1"></div><div id="D48-C2"></div><div id="D48-C3"></div><div id="D48-C4"></div><div id="D48-C5"></div><div onclick="seleccionarDiente('D48');">D48</div></div>
    <div class="diente" id="D47"><div id="D47-C1"></div><div id="D47-C2"></div><div id="D47-C3"></div><div id="D47-C4"></div><div id="D47-C5"></div><div onclick="seleccionarDiente('D47');">D47</div></div>
    <div class="diente" id="D46"><div id="D46-C1"></div><div id="D46-C2"></div><div id="D46-C3"></div><div id="D46-C4"></div><div id="D46-C5"></div><div onclick="seleccionarDiente('D46');">D46</div></div>
    <div class="diente" id="D45"><div id="D45-C1"></div><div id="D45-C2"></div><div id="D45-C3"></div><div id="D45-C4"></div><div id="D45-C5"></div><div onclick="seleccionarDiente('D45');">D45</div></div>
    <div class="diente" id="D44"><div id="D44-C1"></div><div id="D44-C2"></div><div id="D44-C3"></div><div id="D44-C4"></div><div id="D44-C5"></div><div onclick="seleccionarDiente('D44');">D44</div></div>
    <div class="diente" id="D43"><div id="D43-C1"></div><div id="D43-C2"></div><div id="D43-C3"></div><div id="D43-C4"></div><div id="D43-C5"></div><div onclick="seleccionarDiente('D43');">D43</div></div>
    <div class="diente" id="D42"><div id="D42-C1"></div><div id="D42-C2"></div><div id="D42-C3"></div><div id="D42-C4"></div><div id="D42-C5"></div><div onclick="seleccionarDiente('D42');">D42</div></div>
    <div class="diente" id="D41"><div id="D41-C1"></div><div id="D41-C2"></div><div id="D41-C3"></div><div id="D41-C4"></div><div id="D41-C5"></div><div onclick="seleccionarDiente('D41');">D41</div></div>
    |-|
    <div class="diente" id="D31"><div id="D31-C1"></div><div id="D31-C2"></div><div id="D31-C3"></div><div id="D31-C4"></div><div id="D31-C5"></div><div onclick="seleccionarDiente('D31');">D31</div></div>
    <div class="diente" id="D32"><div id="D32-C1"></div><div id="D32-C2"></div><div id="D32-C3"></div><div id="D32-C4"></div><div id="D32-C5"></div><div onclick="seleccionarDiente('D32');">D32</div></div>
    <div class="diente" id="D33"><div id="D33-C1"></div><div id="D33-C2"></div><div id="D33-C3"></div><div id="D33-C4"></div><div id="D33-C5"></div><div onclick="seleccionarDiente('D33');">D33</div></div>
    <div class="diente" id="D34"><div id="D34-C1"></div><div id="D34-C2"></div><div id="D34-C3"></div><div id="D34-C4"></div><div id="D34-C5"></div><div onclick="seleccionarDiente('D34');">D34</div></div>
    <div class="diente" id="D35"><div id="D35-C1"></div><div id="D35-C2"></div><div id="D35-C3"></div><div id="D35-C4"></div><div id="D35-C5"></div><div onclick="seleccionarDiente('D35');">D35</div></div>
    <div class="diente" id="D36"><div id="D36-C1"></div><div id="D36-C2"></div><div id="D36-C3"></div><div id="D36-C4"></div><div id="D36-C5"></div><div onclick="seleccionarDiente('D36');">D36</div></div>
    <div class="diente" id="D37"><div id="D37-C1"></div><div id="D37-C2"></div><div id="D37-C3"></div><div id="D37-C4"></div><div id="D37-C5"></div><div onclick="seleccionarDiente('D37');">D37</div></div>
    <div class="diente" id="D38"><div id="D38-C1"></div><div id="D38-C2"></div><div id="D38-C3"></div><div id="D38-C4"></div><div id="D38-C5"></div><div onclick="seleccionarDiente('D38');">D38</div></div><br><br>
    
    <input type="text" id="txtD48" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD47" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD46" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD45" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD44" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD43" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD42" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD41" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    |-|
    <input type="text" id="txtD31" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD32" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD33" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD34" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD35" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD36" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD37" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
    <input type="text" id="txtD38" class="textDiente" size="1" onmouseover="hoverTxtDiente(this.id);" onmouseout="outTxtDiente(this.id);" readonly="readonly">
  </section>
</div>
<script src="assets/script/jsTratamiento.js"></script>           

  <?php
   } 
############################# FUNCION BUSQUEDA ODONTOGRAMA ############################
?>


<?php 
############################# BUSQUEDA DE REPORTE ODONTOLOGIA ##################################
if (isset($_GET['BuscaReporteOdontologia']) && isset($_GET['codpaciente'])) { 

$codpaciente = $_GET['codpaciente'];

if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE </div></center>";
exit;
    
} else {

$con = new Login();
$reg = $con->BuscarReportesOdontologia();

?>

  
                <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-tasks"></i> Odontologías del Paciente <?php echo $reg[0]['pnompaciente']." ".$reg[0]['snompaciente']." ".$reg[0]['papepaciente']." ".$reg[0]['sapepaciente']; ?></h3>
                                    </div>
             <div class="panel-body">

<div id="div"><div class="table-responsive" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">                                            <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Sede</th>
                                  <th>Nombre del Medico</th>
                                  <th>Procedimiento</th>
                                  <th>Fecha/Hora</th>
                                  <th>Imprimir</th>
                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$a=1;
for($i=0;$i<sizeof($reg);$i++){  
?>
<tr>
<td><?php echo $a++; ?></td>
<td><abbr title="<?php echo "Sucursal : ".$reg[$i]['nombresucursal']; ?>"><?php echo $reg[$i]['nombresede']; ?></abbr></td>
<td><abbr title="<?php echo "Nº de Identificación : ".$reg[$i]['cedmedico']; ?>"><?php echo $reg[$i]['nommedico']." ".$reg[$i]['apemedico']; ?></abbr></td>

<td><?php echo $procedimiento = ( $reg[$i]['procedimiento'] == '0' ? "NUEVA HISTORIA" : "HOJA EVOLUTIVA"); ?></td>

                  <td><?php echo date("d-m-Y h:i:s", strtotime($reg[$i]['fechadentagrama'])); ?></td>

<td><?php if($reg[$i]['procedimiento'] == "0") { ?>

<a href="reportepdf?od=<?php echo base64_encode($reg[$i]['cododontologia']); ?>&tipo=<?php echo base64_encode("ODONTOLOGIA") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>

<?php } else { ?>

<a href="reportepdf?od=<?php echo base64_encode($reg[$i]['cododontologia']); ?>&tipo=<?php echo base64_encode("HOJAODONTOLOGIA") ?>" target="_black" rel="noopener noreferrer" class="btn btn-info btn-xs" title="Imprimir"><i class="fa fa-print"></i></a>          
     
<?php } ?></td>
                  </tr>
                        <?php  }  ?>
                                            </tbody>
                                        </table>
       
                             </div>
                          </div>
                      </div>
                   </div>
                </div>
             </div>
         </div> <!-- End Row -->
<?php
     }
} 
############################# BUSQUEDA DE REPORTE ODONTOLOGIA ################################
?>






































<?php
############################# BUSQUEDA DE CONSENTIMIENTO INFORMADO ##################################
if (isset($_GET['BuscaConsentimiento']) && isset($_GET['codpaciente']) && isset($_GET['codmedico']) && isset($_GET['especialidad']) && isset($_GET['tipom'])) { 
  
  $codpaciente = $_GET['codpaciente'];
  $codmedico = $_GET['codmedico'];
  $modulo = $_GET['especialidad'];
  $tipo = $_GET['tipom'];


if($codpaciente=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR REALICE LA BÚSQUEDA DEL PACIENTE CORRECTAMENTE</div></center>";
exit;
   
   } elseif($codmedico=="") {

echo "<center><div class='alert alert-danger'>";
echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
echo "<span class='fa fa-info-circle'></span> POR FAVOR SELECCIONE MEDICO PARA TU BÚSQUEDA </div></center>";
exit;
    
} else {

$pa = new Login();
$pa = $pa->PacPorId();

$med = new Login();
$med = $med->MedicosPorId();

if($modulo=="RADIOLOGO") {
$esp ="CONSENTIMIENTO INFORMADO DE RADIOGRAFIAS";
$espec ="RADIOLOGO"; 

} elseif($modulo=="TERAPEUTA") {
$esp ="CONSENTIMIENTO INFORMADO DE TERAPIAS";
$espec ="TERAPEUTA"; 

} elseif($modulo=="BACTERIOLOGO") {
$esp ="CONSENTIMIENTO INFORMADO DE EXAMEN DE LABORATORIO";
$espec ="BACTERIOLOGO"; 

} elseif($modulo=="ODONTOLOGIA") {
$esp ="CONSENTIMIENTO INFORMADO DE ODONTOLOGIA";
$espec ="ODONTOLOGO"; 

} elseif($modulo=="MEDICO GENERAL") {
$esp ="CONSENTIMIENTO INFORMADO DE APERTURAS DE HISTORIAS MEDICAS";
$espec ="MEDICO GENERAL";
 
} elseif($modulo=="GINECOLOGIA") {
if($tipo=="1") {
$esp ="CONSENTIMIENTO INFORMADO DE APERTURAS DE HISTORIAS MEDICAS";
} elseif($tipo=="2") {
$esp ="CONSENTIMIENTO INFORMADO DE ECOGRAFIAS";
} elseif($tipo=="3") {
$esp ="CONSENTIMIENTO INFORMADO DE MAMOGRAFIAS";
} elseif($tipo=="4") {
$esp ="CONSENTIMIENTO INFORMADO DE TOMOGRAFIAS";
}
$espec ="GINECOLOGO"; 
}

  ?>
                
              
  <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-border panel-primary">
                            <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-edit"></i> Consentimiento Informado del Paciente</h3>
                            </div>
          <div class="panel-body">

                  
        <div class="row">
                  
          <div class="col-md-3"> 
               <div class="form-group has-feedback"> 
                 <label class="control-label">Sucursal: <span class="symbol required"></span></label> 
 <select name="codsucursal" id="codsucursal" class='form-control' onChange="CargaSedes(this.form.codsucursal.value);" required="" aria-required="true">
             <option value="">SELECCIONE </option>
      <?php
      for($i=0;$i<sizeof($su);$i++){
                  ?> 
<option value="<?php echo base64_encode($su[$i]['codsucursal']); ?>"><?php echo $su[$i]['nombresucursal']; ?></option>
               <?php } ?>
              </select>
                       </div>  
               </div>

 <div class="col-md-3"> 
   <div class="form-group has-feedback"> 
    <label class="control-label">Sedes: <span class="symbol required"></span></label> 
<div id="sede"><select name="codsede" id="codsede" disabled="disabled" class='form-control'>
                              <option value="">SELECCIONE</option>
             </select></div>
                    </div>  
          </div>

                
                <div class="col-md-6"> 
                                     <div class="form-group"> 
              <label class="control-label">Servicio al que realiza el procedimiento:</label> 
<input class="form-control" type="text" name="procedimiento" id="procedimiento" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" value="<?php echo $esp; ?>" readonly="readonly">
<input class="form-control" type="hidden" name="fechaconsentimiento" id="fechaconsentimiento" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                                       </div> 
                               </div>     
        </div>
        
        <hr />
        
        <div class="row">
                <div class="col-md-12">
        
<p align="justify">Yo: <?php echo "<strong>".$pa[0]['pnompaciente']." ".$pa[0]['snompaciente']." ".$pa[0]['papepaciente']." ".$pa[0]['sapepaciente']."</strong>"; ?> <?php echo $variable = ( edad($pa[0]['fnacpaciente']) >= '18' ? " mayor de edad" : " menor de edad");  ?>, identificado con <?php echo "<strong>".$pa[0]['idenpaciente']." N&deg; ".$pa[0]['cedpaciente']."</strong>"; ?> de <?php echo "<strong>".$pa[0]['ciudad']."</strong>"; ?> y como paciente o como responsable del paciente autorizó al Dr.(a) <?php echo "<strong>".$med[0]['cedmedico']." ".$med[0]['nommedico']." ".$med[0]['apemedico']."</strong>"; ?>

<?php if($esp=="CONSENTIMIENTO INFORMADO DE APERTURAS DE HISTORIAS MEDICAS") { ?> con profesión o especialidad <?php echo "<strong>".$espec."</strong>"; ?>, para la Apertura de Historias Médicas.
<?php } else { ?> con profesión o especialidad <?php echo "<strong>".$espec."</strong>"; ?>, para la realización del procedimiento</p>

 <p align="justify"><textarea name="procedimientotextual" class="form-control" id="procedimientotextual" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Procedimiento" rows="1" required="" aria-required="true"></textarea>

 teniendo en cuenta que he sido informado claramente sobre los riesgos que se pueden presentar, siendo estos:  </p>

 <p align="justify">
  <textarea name="observacionprocedimiento" class="form-control" id="observacionprocedimiento" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Observaciones" rows="3" required="" aria-required="true"></textarea> <?php } ?>
</p>
<p align="justify">Comprendo y acepto que durante el procedimiento pueden aparecer   circunstancias imprevisibles o inesperadas, que puedan requerir una extensión del procedimiento original o la realización de otro procedimiento no mencionado arriba.</p>

<p align="justify">Al firmar este documento reconozco que los he leído o que me ha sido leído y explicado y que comprendo perfectamente su contenido.</p>

<p align="justify">Se me han dado amplias oportunidades de formular preguntas y que todas las preguntas que he formulado han sido respondidas o explicadas en forma satisfactoria. </p>

<p align="justify">Acepto que la medicina no es una ciencia exacta y que no se me han   garantizado los resultados que se esperan de la intervención quirúrgica o procedimientos diagnósticos, terapèuticos u odontológicos, en el sentido de que la   práctica de la intervención o procedimientos que requiero compromete una   actividad de medio, pero no de resultados.</p>

<p>Comprendiendo estas limitaciones, doy mi consentimiento para la realización del procedimiento y firmo a continuación:</p>
        </div></div><hr />
        
        <div class="row"> 
                  <div class="col-md-4"> 
                      <div class="form-group has-feedback"> 
             <label class="control-label">Cédula de Testigo:</label> 
<input class="form-control" type="text" name="doctestigo" id="doctestigo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cedula" required="" aria-required="true">  
                        <i class="fa fa-pencil form-control-feedback"></i>                  
                          </div> 
                     </div>
                                     
                  <div class="col-md-8"> 
                        <div class="form-group has-feedback"> 
        <label class="control-label">Nombre del Testigo o Responsable del Paciente:</label> 
<input class="form-control" type="text" name="nombretestigo" id="nombretestigo" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de Testigo">
                        <i class="fa fa-pencil form-control-feedback"></i>
                               </div> 
                          </div>
                     </div>  
              
              <div class="row"> 
                      <div class="col-md-12"> 
                           <div class="form-group has-feedback"> 
      <label class="control-label">El Paciente no puede firmar por:</label> 
    <textarea name="nofirmapaciente" class="form-control" id="nofirmapaciente" onkeyup="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Motivo de no firmar el Paciente"></textarea>     
                        <i class="fa fa-pencil form-control-feedback"></i>                                                           
                              </div>
                        </div>   
                  </div><br> 
        
            <div class="modal-footer"> 
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
<button class="btn btn-danger waves-effect waves-light" type="button" onclick="
    document.getElementById('procedimientotextual').value = '',
    document.getElementById('observacionprocedimiento').value = '',
    document.getElementById('nofirmapaciente').value = ''"><span class="fa fa-trash-o"></span> Limpiar</button>  
            </div>
      
                      </div>
                 </div>
           </div>
    </div> <!-- End Row -->
  <?php
    }
 } 
############################# BUSQUEDA DE CONSENTIMIENTO INFORMADO ##################################
?>

















<?php 
########################## MUESTRA ASIGNACION DE PLANTILLAS GINECOLOGICAS ###########################
if (isset($_GET['muestraplantillaecografia']) && isset($_GET['codplantillaecografia'])) { 
  
  $codplantillaecografia = $_GET['codplantillaecografia'];
  
  ?>
  
<!-- Horizontal form -->
                           
<div id="delete-ok" style="display:none;">&nbsp;</div>                                               
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>C&oacute;digo</th>
                                                    <th>Nombres de M&eacute;dicos</th>
                                                    <th>Especialidad</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$tro = new Login();
$rog = $tro->MostrarPlantillasEcografiaAsignadas();

if($rog==""){

    echo "";      
    
} else {

for($i=0;$i<sizeof($rog);$i++){  
?>
                                                <tr>
                                                    <td><div align="center"><?php echo $rog[$i]['cedmedico']; ?></div></td>
                                                    <td><div align="center"><?php echo $rog[$i]['nommedico']." ".$rog[$i]['apemedico']; ?></div></td>
                                                    <td><div align="center"><?php echo $rog[$i]['especmedico']; ?></div></td>
                          <td class="actions"><div align="center">
<a class="btn btn-danger btn-xs" title="Eliminar" onClick="EliminarPlantillaG('<?php echo base64_encode($rog[$i]["codasigplantilla"]); ?>','<?php echo base64_encode($rog[$i]["codplantilla"]); ?>','<?php echo base64_encode("ASIGNACIONPLANTILLASECOGRAFICAS") ?>')"><i class="fa fa-trash-o"></i></a></div>                                            </td>
                                                </tr>
                        <?php } } ?>
                                            </tbody>
</table>
              
    <?php 
  }
########################### MUESTRA ASIGNACION DE PLANTILLAS GINECOLOGICAS ##########################
?>  

<?php 
########################### MUESTRA ASIGNACION DE PLANTILLAS GINECOLOGICAS ###########################
if (isset($_GET['muestraplantillalecturarx']) && isset($_GET['codplantillalecturarx'])) { 
  
  $codplantillalecturarx = $_GET['codplantillalecturarx'];
  
  ?>
  
<!-- Horizontal form -->
                           
<div id="delete-ok" style="display:none;">&nbsp;</div>                                               
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>C&oacute;digo</th>
                                                    <th>Nombres de M&eacute;dicos</th>
                                                    <th>Especialidad</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
$tro = new Login();
$rog = $tro->MostrarPlantillasLecturarxAsignadas();

if($rog==""){

    echo "";      
    
} else {

for($i=0;$i<sizeof($rog);$i++){  
?>
                                                <tr>
                                                    <td><div align="center"><?php echo $rog[$i]['cedmedico']; ?></div></td>
                                                    <td><div align="center"><?php echo $rog[$i]['nommedico']." ".$rog[$i]['apemedico']; ?></div></td>
                                                    <td><div align="center"><?php echo $rog[$i]['especmedico']; ?></div></td>
                          <td class="actions"><div align="center">
<a class="btn btn-danger btn-xs" title="Eliminar" onClick="EliminarPlantillaL('<?php echo base64_encode($rog[$i]["codasigplantilla"]); ?>','<?php echo base64_encode($rog[$i]["codplantilla"]); ?>','<?php echo base64_encode("ASIGNACIONPLANTILLASLECTURARX") ?>')"><i class="fa fa-trash-o"></i></a></div>                                            </td>
                                                </tr>
                        <?php } } ?>
                                            </tbody>
</table>
                        
    <?php 
  }
########################### MUESTRA ASIGNACION DE PLANTILLAS GINECOLOGICAS ############################
?>


 <?php 
############################# BUSCA MUNICIPIOS #############################################
if (isset($_GET['BuscaMunicipios']) && isset($_GET['departamento'])) {
  
   $mun = $new->ListarMunicipiosD();
  ?>
    </div>
  </div>
<option value="">SELECCIONE</option>
  <?php
   for($i=0;$i<sizeof($mun);$i++){
    ?>
<option value="<?php echo $mun[$i]['id']; ?>" ><?php echo $mun[$i]['nombre_municipio']; ?></option>
    <?php 
  }
  

}
############################# FIN DE BUSCA MUNICIPIOS ######################################
?>  



<?php 
############################# BUSCA SEDES #############################################
if (isset($_GET['BuscaSedes']) && isset($_GET['codsucursal'])) {
  
   $se = $new->ListarSedesD();
  ?>
    </div>
  </div>
 <select name="codsede" id="codsede" class='form-control' title="Seleccione Sede" required="" aria-required="true">
       <option value="">SELECCIONE</option>
  <?php
   for($i=0;$i<sizeof($se);$i++){
    ?>
<option value="<?php echo base64_encode($se[$i]['codsede']); ?>" ><?php echo $se[$i]['nombresede']; ?></option>
    <?php 
  }
  ?>
</select> 
<?php
}
############################# FIN DE BUSCA SEDES ######################################
?>  
    
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
        <script language="javascript">
function cargaContextoCanvas(idCanvas){
   var elemento = document.getElementById(idCanvas);
   if(elemento && elemento.getContext){
      var contexto = elemento.getContext('2d');
      if(contexto){
         return contexto;
      }
   }
   return FALSE;
}


window.onload = function(){
   //Recibimos el elemento canvas
   var ctx = cargaContextoCanvas('micanvas');
   if(ctx){
      //Creo una imagen conun objeto Image de Javascript
      var img = new Image();
      //indico la URL de la imagen
      img.src = 'fotos/img_colpos.png';
      //defino el evento onload del objeto imagen
      img.onload = function(){
         //incluyo la imagen en el canvas
         ctx.drawImage(img, 10, 10);
      }
   }
}

</script>