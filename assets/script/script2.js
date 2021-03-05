// FUNCION PARA PERMITIR CAMPOS NUMEROS
function NumberFormat(num, numDec, decSep, thousandSep){
    var arg;
    var Dec;
    Dec = Math.pow(10, numDec); 
    if (typeof(num) == 'undefined') return; 
    if (typeof(decSep) == 'undefined') decSep = ',';
    if (typeof(thousandSep) == 'undefined') thousandSep = '.';
    if (thousandSep == '.')
     arg=/./g;
    else
     if (thousandSep == ',') arg=/,/g;
    if (typeof(arg) != 'undefined') num = num.toString().replace(arg,'');
    num = num.toString().replace(/,/g, '.'); 
    if (isNaN(num)) num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * Dec + 0.50000000001);
    cents = num % Dec;
    num = Math.floor(num/Dec).toString(); 
    if (cents < (Dec / 10)) cents = "0" + cents; 
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
     num = num.substring(0, num.length - (4 * i + 3)) + thousandSep + num.substring(num.length - (4 * i + 3));
    if (Dec == 1)
     return (((sign)? '': '-') + num);
    else
     return (((sign)? '': '-') + num + decSep + cents);
   } 

   function EvaluateText(cadena, obj){
    opc = false; 
    if (cadena == "%d")
     if (event.keyCode > 47 && event.keyCode < 58)
      opc = true;
    if (cadena == "%f"){ 
     if (event.keyCode > 47 && event.keyCode < 58)
      opc = true;
     if (obj.value.search("[.*]") == -1 && obj.value.length != 0)
      if (event.keyCode == 46)
       opc = true;
    }
    if(opc == false)
     event.returnValue = false; 
   }
   
   $(document).ready(function(){ 
$(".number").keydown(function(event) {
   if(event.shiftKey)
   {
        event.preventDefault();
   }
 
   if (event.keyCode == 46 || event.keyCode == 8)    {
   }
   else {
        if (event.keyCode < 95) {
          if (event.keyCode < 48 || event.keyCode > 57) {
                event.preventDefault();
          }
        } 
        else {
              if (event.keyCode < 96 || event.keyCode > 105) {
                  event.preventDefault();
              }
        }
      }
   });
});
   
  
function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            var num = new Array ("01","02","03","04","05","06","07","08","09","10","11","12");
      var mt = "AM";

         // Pongo el formato 12 horas
      if (h> 12) {
      mt = "PM";
      h = h - 12;
      }
      if (h == 0) h = 12;
      // Pongo minutos y segundos con dos digitos
      //if (m <= 9) m = "0" + m;
      //if (s <= 9) s = "0" + s;
      
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
document.getElementById('fecharegistro').value= today.getDate() + "-" + num[today.getMonth()] + "-" + today.getFullYear() + " " + h+":"+m+":"+s;
$('#result3').html(today.getDate() + "-" + num[today.getMonth()] + "-" + today.getFullYear() + " " + h+":"+m+":"+s);
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }

function muestraReloj()
{
// Compruebo si se puede ejecutar el script en el navegador del usuario
if (!document.layers && !document.all && !document.getElementById) return;
// Obtengo la hora actual y la divido en sus partes
var num = new Array ("01","02","03","04","05","06","07","08","09","10","11","12");
var fechacompleta = new Date();
var horas = fechacompleta.getHours();
var minutos = fechacompleta.getMinutes();
var segundos = fechacompleta.getSeconds();

var day = fechacompleta.getDate();
var mes = fechacompleta.getMonth(); 
var year = fechacompleta.getFullYear();

var mt = "AM";

// Pongo el formato 12 horas
if (horas> 12) {
mt = "PM";
horas = horas - 12;
}
if (horas == 0) horas = 12;
// Pongo minutos y segundos con dos digitos
if (minutos <= 9) minutos = "0" + minutos;
if (segundos <= 9) segundos = "0" + segundos;
// En la variable 'cadenareloj' puedes cambiar los colores y el tipo de fuente
//cadenareloj = "<font size='-1' face='verdana'>" + horas + ":" + minutos + ":" + segundos + " " + mt + "</font>";
cadenareloj = "<i class='fa fa-calendar'></i> " + day + "-" + num[mes]  + "-" + year + "     " + horas + ":" + minutos + ":" + segundos + " " + mt;

// Escribo el reloj de una manera u otra, segun el navegador del usuario
if (document.layers) {
document.layers.spanreloj.document.write(cadenareloj);
document.layers.spanreloj.document.close();
}
else if (document.all) spanreloj.innerHTML = cadenareloj;
else if (document.getElementById) document.getElementById("spanreloj").innerHTML = cadenareloj;
// Ejecuto la funcion con un intervalo de un segundo
setTimeout("muestraReloj()", 1000);
}



$('document').ready(function(){
   $("#checkTodos").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
});





//////// FUNCIONES PARA MOSTRAR MENSAJES DE ALERTA DE ACTUALIZAR, ELIMINAR Y PAGAR REGISTROS
function actualizar(url)
{
  if(confirm('ESTA SEGURO DE ACTUALIZAR ESTE REGISTRO ?'))
  {
    window.location=url;
  }
}

function eliminar(url)
{
  if(confirm('ESTA SEGURO DE ELIMINAR ESTE REGISTRO ?'))
  {
    window.location=url;
  }
}


function asignar(url)
{
  if(confirm('DESEA ASIGNAR ESTA PLANTILLA A OTRO MEDICO ?'))
  {
    window.location=url;
  }
}


function reiniciar(url)
{
  if(confirm('ESTA SEGURO DE REINICIAR LA CLAVE DEL MEDICO ?'))
  {
    window.location=url;
  }
}

function cancelar(url)
{
  if(confirm('ESTA SEGURO DE CANCELAR ESTA CITA MEDICA ?'))
  {
    window.location=url;
  }
}

//FUNCIONES PARA ACTIVAR-DESACTIVAR CAMPO
function Embarazada(){

          var valor = $("#embarazada").val();

          if (valor === "SI" || valor === true) {
         
          $("#fechamestruacion").attr('disabled', false);
          $('#calcular').attr('disabled', false);

          } else {

          // deshabilitamos
          $("#fechamestruacion").attr('disabled', true);
          $('#calcular').attr('disabled', true);
              }
  }

////FUNCION OARA CALCULAR SEMANAS Y DIAS DE EMBARAZO
function CalcularEmbarazo(){
                 
var dia1 = $("#di").val();
var dia2 = $("#sem").val();
var data =$('#fechamestruacion').val();
            
      var arr = data.split('-');
      
      var day = parseInt(arr[0]);
      var month = parseInt(arr[1]);
      var year = parseInt(arr[2]);
      
      var cycle = parseInt(dia1);
      var luteal = parseInt(dia2);      
                   
      if(isNaN(day) && isNaN(month) && isNaN(year))
      {
        $("#fechamestruacion").focus();
        $("#fechamestruacion").css('border-color', '#f0ad4e');
        alert("POR FAVOR INGRESE UNA FECHA VALIDA EN ULTIMA MESTRUACION");
        return false;

         } else {

        last_menstruation_day = new Date(month+'/'+day+'/'+year);
        
        ovulation = new Date();
        ovulation.setTime(last_menstruation_day.getTime() + (cycle*86400000) - (luteal*86400000));
        
        duedate = new Date();
        duedate.setTime(ovulation.getTime() + 266*86400000);
        
        today = new Date();
        var fetalage = 14 + 266 - ((duedate - today) / 86400000);
        var weeks = parseInt(fetalage / 7);
        var days = Math.floor(fetalage % 7);
        
        
        fechaparto = duedate.getDate()+'-'+(duedate.getMonth()+1)+'-'+duedate.getFullYear();
        fetalage = weeks + " semana" + (weeks > 1 ? "s" : "") + ", " + days + " dias";
          
        $('#result2').html('<div class="col-md-3"><div class="form-group has-feedback"><label class="control-label">Fecha Probable de Parto: <span class="symbol required"></span></label><input type="text" name="fechaparto" id="fechaparto" class="form-control" value="'+fechaparto+'" readonly="readonly"/><i class="fa fa-calendar form-control-feedback"></i></div></div>');
        $('#result3').html('<div class="col-md-3"><div class="form-group has-feedback"><label class="control-label">Semanas de Gestaci&oacute;n: <span class="symbol required"></span></label><input type="text" name="semanas" id="semanas" class="form-control" value="'+fetalage+'" readonly="readonly"/><i class="fa fa-calendar form-control-feedback"></i></div></div>');
                
      }
      
  }


////FUNCION MUESTRA CAMPO PARA REMISION
function mostrar(){

     var botonAccion =  document.getElementById('boton');
     var div = document.getElementById('remision');

     if(div.style.display==='block'){

       div.style.display = "none";
       //Actualizamos el nombre del botón
       botonAccion.value = "SI";

       } else {

       div.style.display = "block";
       //Actualizamos el nombre del botón
       botonAccion.value= "NO";

         }
  }

////////////////////////////////////////////// FUNCIONES PARA PROCESAR DATOS ///////////////////////////////////////////


/////FUNCION PARA ELIMINAR ASIGNACION DE PLANTILLA DE ECOGRAFIAS  
function EliminarPlantillaG(codasigplantilla,codplantilla,tipo) {
  
        var dataString = 'codasigplantilla='+codasigplantilla+'&tipo='+tipo;
        
    var eliminar = confirm("ESTA SEGURO DE ELIMINAR ESTA ASIGNACION DE PLANTILLA?")
  
      if ( eliminar ) { 
        
    $.ajax({
            type: "GET",
      url: "eliminar.php",
            data: dataString,
            success: function(response) {            
                $('#delete-ok').empty();
                $('#delete-ok').append('<center> '+response+' </center>').fadeIn("slow");
        $("#asignacionplantillaecografia").load("funciones.php?muestraplantillaecografia=si&codplantillaecografia="+codplantilla);
                $('#'+parent).remove();
            }
        });
      }
}

/////FUNCION PARA ELIMINAR ASIGNACION DE PLANTILLA DE LECTURA RX
function EliminarPlantillaL(codasigplantilla,codplantilla,tipo) {
  
        var dataString = 'codasigplantilla='+codasigplantilla+'&tipo='+tipo;
        
    var eliminar = confirm("ESTA SEGURO DE ELIMINAR ESTA ASIGNACION DE PLANTILLA?")
  
      if ( eliminar ) { 
        
    $.ajax({
            type: "GET",
      url: "eliminar.php",
            data: dataString,
            success: function(response) {            
                $('#delete-ok').empty();
                $('#delete-ok').append('<center> '+response+' </center>').fadeIn("slow");
        $("#asignacionplantillalecturarx").load("funciones.php?muestraplantillalecturarx=si&codplantillalecturarx="+codplantilla);
                $('#'+parent).remove();
            }
        });
      }
}



////FUNCION PARA MOSTRAR MUNICIPIOS POR DEPARTAMENTOS
function CargaMunicipios(departamento){

$('#municipio').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaMunicipios=si&departamento='+departamento;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#municipio').empty();
                $('#municipio').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}


////FUNCION PARA MOSTRAR MUNICIPIOS POR DEPARTAMENTOS
function CargaSedes(codsucursal){

$('#sede').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaSedes=si&codsucursal='+codsucursal;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#sede').empty();
                $('#sede').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA MOSTRAR USUARIOS EN VENTANA MODAL
function VerUsuario(codigo){
$('#muestrausuariomodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
var dataString = 'BuscaUsuarioModal=si&codigo='+codigo;
$.ajax({
            type: "GET",
			url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestrausuariomodal').empty();
                $('#muestrausuariomodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
      });
}


// FUNCION PARA MOSTRAR SUCURSAL EN VENTANA MODAL
function VerSucursal(codsucursal){

$('#muestrasucursalmodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaSucursalModal=si&codsucursal='+codsucursal;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestrasucursalmodal').empty();
                $('#muestrasucursalmodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA MOSTRAR SEDE EN VENTANA MODAL
function VerSede(codsede){

$('#muestrasedemodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaSedeModal=si&codsede='+codsede;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestrasedemodal').empty();
                $('#muestrasedemodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA MOSTRAR EPS EN VENTANA MODAL
function VerEps(codeps){

$('#muestraepsmodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaEpsModal=si&codeps='+codeps;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestraepsmodal').empty();
                $('#muestraepsmodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA MOSTRAR PACIENTE EN VENTANA MODAL
function VerPaciente(codpaciente){

$('#muestrapacientemodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaPacienteModal=si&codpaciente='+codpaciente;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestrapacientemodal').empty();
                $('#muestrapacientemodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA MOSTRAR MEDICO EN VENTANA MODAL
function VerMedico(codmedico){

$('#muestramedicomodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'BuscaMedicoModal=si&codmedico='+codmedico;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestramedicomodal').empty();
                $('#muestramedicomodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}


// FUNCION PARA BUSCAR CITAS MEDICAS PARA PACIENTES
function BuscarPacientes(){
                        
$('#muestrapacientecitas').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var codpaciente = btoa($("#codpaciente").val());
var dataString = $("#citas").serialize();
var url = 'funciones.php?BuscaPacienteCitas=si';


$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrapacientecitas').empty();
                $('#muestrapacientecitas').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
             }
      });
}






















// FUNCION PARA BUSCAR CITAS MEDICAS POR FECHA Y MEDICO
function BuscaCitasMedicas() {
                                                
$('#muestracitasmedicas').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = btoa($("#codmedico").val());
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#citasmedicas").serialize();
var url = 'funciones.php?BuscaCitasMedicas=si';

$.ajax({
            type: "GET",
            url: url,
            data: dataString,
            success: function(response) {            
                $('#muestracitasmedicas').empty();
                $('#muestracitasmedicas').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
      });
}


// FUNCION MUESTRA CITAS MEDICAS EN VENTANA MODAL
function VerCitaModal(codcita) {
$('#muestracitasmedicasmodal').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
var dataString = 'BuscaCitaModal=si&codcita='+codcita;

$.ajax({
            type: "GET",
            url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestracitasmedicasmodal').empty();
                $('#muestracitasmedicasmodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
      });
} 


//FUNCION PARA MOSTRAR BOTON Y COMBOBOX DE CITAS MEDICAS POR MEDICOS
function VerBotonMedico(codmedico) {

var codmedico = $("#codmedico").val();
var dataString = 'BuscaCitasMedicos=si&codmedico='+btoa(codmedico);
var dataString2 = 'BuscaComboboxLectura=si&codmedico='+btoa(codmedico);

$.ajax({
            type: "GET",
            url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestracitas').empty();
                $('#muestracitas').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
    });
                                
$.ajax({
            type: "GET",
            url: "funciones.php",
            data: dataString2,
            success: function(response) {            
                $('#muestracomboboxlectura').empty();
                $('#muestracomboboxlectura').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
      });
}


//FUNCION PARA MOSTRAR BOTON EN CITAS MEDICAS POR MEDICOS
function BotonCitasModal(codmedico) {

var codmedico = $("#codmedico").val();
var dataString = 'BuscaCitasModal=si&codmedico='+btoa(codmedico);

$.ajax({
            type: "GET",
            url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestracitasmedicosmodal').empty();
                $('#muestracitasmedicosmodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
    });
 }



// FUNCION PARA CARGAR LOS DATOS DE CLIENTES
function CargaCitas (codcita,codpaciente,cedpaciente,pnompaciente,papepaciente,fnacpaciente,eps,gruposapaciente,tlfpaciente,
  especialidad,motivocita,observacionescita,fechacita,hour,codsucursal,codsede,statuscita,lectura,medico,codmedico,desde,hasta) 
{
    // aqui asigno cada valor a los campos correspondientes
  $("#updatecita #codcita").val( codcita );
  $("#updatecita #codpaciente").val( codpaciente );
  $("#updatecita #cedpaciente").val( cedpaciente );
  $("#updatecita #pnompaciente").val( pnompaciente );
  $("#updatecita #papepaciente").val( papepaciente );
  $("#updatecita #fnacpaciente").val( fnacpaciente );
  $("#updatecita #eps").val( eps );
  $("#updatecita #gruposapaciente").val( gruposapaciente );
  $("#updatecita #tlfpaciente").val( tlfpaciente );
  $("#updatecita #especialidad").val( especialidad );
  $("#updatecita #motivocita").val( motivocita );
  $("#updatecita #observacionescita").val( observacionescita );
  $("#updatecita #fechacita").val( fechacita );
  $("#updatecita #hour").val( hour );
  $("#updatecita #codsucursal").val( codsucursal );
  $("#updatecita #codsede").val( codsede );
  $("#updatecita #statuscita").val( statuscita );
  $("#updatecita #lectura").val( lectura );
  $("#updatecita #medico").val( medico );
  $("#updatecita #codmedico").val( codmedico );
  $("#updatecita #desde2").val( desde );
  $("#updatecita #hasta2").val( hasta );
}


/////FUNCION PARA CANCELAR CITAS MEDICAS 
function CancelarCita(codcita,tipo,codmedico,desde,hasta) {

var dataString = 'codcita='+codcita+'&tipo='+tipo;
var cancelarcita = confirm("ESTA SEGURO DE CANCELAR ESTA CITA MEDICA?")
    
        if ( cancelarcita ) { 
        
        $.ajax({
            type: "GET",
            url: "eliminar.php",
            data: dataString,
            success: function(response) {            
                $('#cancela-ok').empty();
                $('#cancela-ok').append('<center>'+response+'</center>').fadeIn("slow");
$("#muestracitasmedicas").load("funciones.php?BuscaCitasMedicas=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
                setTimeout(function() { $("#cancela-ok").html(""); }, 5000);
                $("#delete-ok").html("");
                $('#'+parent).remove();
            }
        });
      }
}


/////FUNCION PARA ELIMINAR CITAS MEDICAS 
function EliminarCita(codcita,tipo,codmedico,desde,hasta) {

var dataString = 'codcita='+codcita+'&tipo='+tipo;
var eliminarcita = confirm("ESTA SEGURO DE ELIMINAR ESTA CITA MEDICA?")
    
        if ( eliminarcita ) { 
        
        $.ajax({
            type: "GET",
            url: "eliminar.php",
            data: dataString,
            success: function(response) {            
                $('#delete-ok').empty();
                $('#delete-ok').append('<center>'+response+'</center>').fadeIn("slow");
$("#muestracitasmedicas").load("funciones.php?BuscaCitasMedicas=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
                $("#cancela-ok").html("");
                setTimeout(function() { $("#delete-ok").html(""); }, 5000);
                $('#'+parent).remove();
            }
        });
      }
}


// FUNCION PARA BUSCAR CITAS MEDICAS POR FECHAS PARA REPORTES
function BuscaCitasFechas() {
                        
$('#muestracitasmedicasreportes').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var desde = $("#desde").val();
var hasta = $("#hasta").val();
var codsucursal = $("#codsucursal").val();
var codsede = $("#codsede").val();
var especialidad = $("#especialidad").val();
var dataString = $("#buscacitasreportes").serialize();
var url = 'funciones.php?BuscaCitasMedicasReportes=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestracitasmedicasreportes').empty();
                $('#muestracitasmedicasreportes').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
   });
}


// FUNCION PARA BUSCAR CITAS MEDICAS POR MEDICOS PARA REPORTES
function BuscaCitasMedicos() {
                        
$('#muestracitasmedicaspormedicosreportes').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = btoa($("#codmedico").val());
var dataString = $("#buscacitasmedicosreportes").serialize();
var url = 'funciones.php?BuscaCitasMedicasPorMedicosReportes=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestracitasmedicaspormedicosreportes').empty();
                $('#muestracitasmedicaspormedicosreportes').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
      });
}





























///////////////////////////////////// FUNCIONES PARA PROCESAR CONSULTORIO MEDICO //////////////////////////////////////////////////

// FUNCION PARA BUSQUEDA DE APERTURA DE HISTORIA  
function BuscarApertura() {
                        
$('#muestraapertura').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#apertura").serialize();
var url = 'funciones.php?BuscaApertura=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraapertura').empty();
                $('#muestraapertura').append(''+response+'').fadeIn("slow");         
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA BUSQUEDA DE APERTURA DE HISTORIA  
function BuscarAperturaG() {
                        
$('#muestraapertura').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#aperturag").serialize();
var url = 'funciones.php?BuscaApertura=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraapertura').empty();
                $('#muestraapertura').append(''+response+'').fadeIn("slow");         
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR APERTURA DE HISTORIA
function CrearApertura(codcita,codpaciente,modulo){

$('#crearapertura').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaApertura=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearapertura').empty();
                $('#crearapertura').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}


// FUNCION PARA BUSQUEDA DE HOJA EVOLUTIVA  
function BuscarHojaEvolutiva() {
                        
$('#muestrahojaevolutiva').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#hojasevolutivas").serialize();
var url = 'funciones.php?BuscaHojaEvolutiva=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrahojaevolutiva').empty();
                $('#muestrahojaevolutiva').append(''+response+'').fadeIn("slow");     
                $('#crearhojaevolutiva').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA BUSQUEDA DE HOJA EVOLUTIVA  
function BuscarHojaEvolutivaG() {
                        
$('#muestrahojaevolutiva').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#hojasevolutivasg").serialize();
var url = 'funciones.php?BuscaHojaEvolutiva=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrahojaevolutiva').empty();
                $('#muestrahojaevolutiva').append(''+response+'').fadeIn("slow");     
                $('#crearhojaevolutiva').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR HOJA EVOLUTIVA
function CrearHojaEvolutiva(codcita,codpaciente,modulo){

$('#crearhojaevolutiva').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaHojaEvolutiva=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearhojaevolutiva').empty();
                $('#crearhojaevolutiva').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}



// FUNCION PARA BUSQUEDA DE REMISIONES  
function BuscarRemisiones() {
                        
$('#muestraremision').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#remisiones").serialize();
var url = 'funciones.php?BuscaRemisiones=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraremision').empty();
                $('#muestraremision').append(''+response+'').fadeIn("slow");     
                $('#crearremisiones').html("");
                $('#'+parent).remove();
            }
      });
}



// FUNCION PARA BUSQUEDA DE REMISIONES  
function BuscarRemisionesG() {
                        
$('#muestraremision').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#remisionesg").serialize();
var url = 'funciones.php?BuscaRemisiones=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraremision').empty();
                $('#muestraremision').append(''+response+'').fadeIn("slow");     
                $('#crearremisiones').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR REMISIONES
function CrearRemisiones(codcita,codpaciente,modulo){

$('#crearremisiones').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaRemisiones=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearremisiones').empty();
                $('#crearremisiones').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}



// FUNCION PARA BUSQUEDA DE FORMULAS MEDICAS  
function BuscarFormulasMedicas() {
                        
$('#muestraformulamedica').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#formulasmedicas").serialize();
var url = 'funciones.php?BuscaFormulasMedicas=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraformulamedica').empty();
                $('#muestraformulamedica').append(''+response+'').fadeIn("slow");     
                $('#crearformulamedica').html("");
                $('#'+parent).remove();
            }
      });
}



// FUNCION PARA BUSQUEDA DE FORMULAS MEDICAS  
function BuscarFormulasMedicasG() {
                        
$('#muestraformulamedica').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#formulasmedicasg").serialize();
var url = 'funciones.php?BuscaFormulasMedicas=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraformulamedica').empty();
                $('#muestraformulamedica').append(''+response+'').fadeIn("slow");     
                $('#crearformulamedica').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR FORMULAS MEDICAS
function CrearFormulasMedicas(codcita,codpaciente,modulo){

$('#crearformulamedica').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaFormulasMedicas=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearformulamedica').empty();
                $('#crearformulamedica').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}




// FUNCION PARA BUSQUEDA DE ORDENES MEDICAS  
function BuscarOrdenesMedicas() {
                        
$('#muestraordenmedica').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#ordenesmedicas").serialize();
var url = 'funciones.php?BuscaOrdenesMedicas=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraordenmedica').empty();
                $('#muestraordenmedica').append(''+response+'').fadeIn("slow");     
                $('#crearordenmedica').html("");
                $('#'+parent).remove();
            }
      });
}



// FUNCION PARA BUSQUEDA DE ORDENES MEDICAS  
function BuscarOrdenesMedicasG() {
                        
$('#muestraordenmedica').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#ordenesmedicasg").serialize();
var url = 'funciones.php?BuscaOrdenesMedicas=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraordenmedica').empty();
                $('#muestraordenmedica').append(''+response+'').fadeIn("slow");     
                $('#crearordenmedica').html("");
                $('#'+parent).remove();
            }
      });
}


// FUNCION PARA CREAR ORDENES MEDICAS
function CrearOrdenesMedicas(codcita,codpaciente,modulo){

$('#crearordenmedica').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaOrdenesMedicas=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearordenmedica').empty();
                $('#crearordenmedica').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}





// FUNCION PARA BUSQUEDA DE FORMULAS PARA TERAPIAS 
function BuscarFormulasTerapias() {
                        
$('#muestraformulaterapia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#formulasterapias").serialize();
var url = 'funciones.php?BuscaFormulasTerapias=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraformulaterapia').empty();
                $('#muestraformulaterapia').append(''+response+'').fadeIn("slow");     
                $('#crearformulaterapia').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR FORMULAS PARA TERAPIAS
function CrearFormulaTerapia(codcita,codpaciente,modulo){

$('#crearformulaterapia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaFormulasTerapias=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearformulaterapia').empty();
                $('#crearformulaterapia').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}




// FUNCION PARA BUSQUEDA DE FORMULAS PARA TERAPIAS 
function BuscarSolicitud() {
                        
$('#muestrasolicitudexamen').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#examenes").serialize();
var url = 'funciones.php?BuscaSolicitudExamen=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrasolicitudexamen').empty();
                $('#muestrasolicitudexamen').append(''+response+'').fadeIn("slow");     
                $('#crearsolicitudexamen').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR FORMULAS PARA TERAPIAS
function CrearSolicitud(codcita,codpaciente,modulo){

$('#crearsolicitudexamen').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaSolicitudExamen=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearsolicitudexamen').empty();
                $('#crearsolicitudexamen').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}


// FUNCION PARA BUSQUEDA DE REPORTE EN CONSULTORIO
function BuscarReporteConsultorio() {
                        
$('#muestrareporteconsultorio').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var optradio = $("input[name='optradio']:checked").val();
var dataString = $("#buscareporteconsultorio").serialize();
var url = 'funciones.php?BuscaReporteConsultorio=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrareporteconsultorio').empty();
                $('#muestrareporteconsultorio').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}













// FUNCION PARA BUSQUEDA DE CRIOCAUTERIZACION  
function BuscarCriocauterizacion() {
                        
$('#muestracriocauterizacion').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#criocauterizacion").serialize();
var url = 'funciones.php?BuscaCriocauterizacion=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestracriocauterizacion').empty();
                $('#muestracriocauterizacion').append(''+response+'').fadeIn("slow");     
                $('#crearcriocauterizacion').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR CRIOCAUTERIZACION
function CrearCriocauterizacion(codcita,codpaciente,modulo){

$('#crearcriocauterizacion').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaCriocauterizacion=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearcriocauterizacion').empty();
                $('#crearcriocauterizacion').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}













// FUNCION PARA BUSQUEDA DE COLPOSCOPIAS  
function BuscarColposcopias() {
                        
$('#muestracolposcopias').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#colposcopias").serialize();
var url = 'funciones.php?BuscaColposcopia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestracolposcopias').empty();
                $('#muestracolposcopias').append(''+response+'').fadeIn("slow");     
                $('#crearcolposcopias').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR COLPOSCOPIAS
function CrearColposcopias(codcita,codpaciente,modulo){

$('#crearcolposcopias').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaColposcopia=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearcolposcopias').empty();
                $('#crearcolposcopias').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}





// FUNCION PARA BUSQUEDA DE ECOGRAFIA  
function BuscarEcografia() {
                        
$('#muestraecografia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#ecografias").serialize();
var url = 'funciones.php?BuscaEcografia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraecografia').empty();
                $('#muestraecografia').append(''+response+'').fadeIn("slow");     
                $('#crearecografia').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR ECOGRAFIA
function CrearEcografia(codcita,codpaciente,modulo){

$('#crearecografia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaEcografia=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearecografia').empty();
                $('#crearecografia').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

//FUNCION PARA MOSTRAR PLANTILLAS ECOGRAFICAS POR MEDICO
function BuscaPlantillaEcografia(codmedico) {

var codmedico = $("#codmedico").val();
var dataString = 'BuscaPlantillaEcografia=si&codmedico='+codmedico;

$.ajax({
            type: "GET",
            url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestraplantillaecograficamodal').empty();
                $('#muestraplantillaecograficamodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
    });
 }

// FUNCION PARA CARGAR PLANTILLA ECOGRAFICAS
function CargaPlantillaEcografica(nombreplantillaecografia,procedimientoecografia,descripcionecografia) {
    
  // aqui asigno cada valor a los campos correspondientes
  $('label[id*="nombreplantillaecografia"]').text(nombreplantillaecografia);
  $("#procedimientoecografia").val(procedimientoecografia);
  $("#observacionecografia").val(descripcionecografia);
}






// FUNCION PARA BUSQUEDA DE REPORTE EN GINCOLOGIA
function BuscarReporteGinecologia() {
                        
$('#muestrareporteginecologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var optradio = $("input[name='optradio']:checked").val();
var dataString = $("#buscareporteginecologia").serialize();
var url = 'funciones.php?BuscaReporteGinecologia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrareporteginecologia').empty();
                $('#muestrareporteginecologia').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}

















// FUNCION PARA BUSQUEDA DE LABORATORIO  
function BuscarLaboratorio() {
                        
$('#muestralaboratorio').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#laboratorio").serialize();
var url = 'funciones.php?BuscaLaboratorio=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestralaboratorio').empty();
                $('#muestralaboratorio').append(''+response+'').fadeIn("slow");     
                $('#crearlaboratorio').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR LABORATORIO
function CrearLaboratorio(codcita,codpaciente,modulo){

$('#crearlaboratorio').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaLaboratorio=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearlaboratorio').empty();
                $('#crearlaboratorio').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA BUSQUEDA DE REPORTE EN LABORATORIO
function BuscarReporteLaboratorio() {
                        
$('#muestrareportelaboratorio').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var dataString = $("#buscareportelaboratorio").serialize();
var url = 'funciones.php?BuscaReporteLaboratorio=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrareportelaboratorio').empty();
                $('#muestrareportelaboratorio').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}
























// FUNCION PARA BUSQUEDA DE RADIOLOGIA  
function BuscarRadiologia() {
                        
$('#muestraradiologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#radiologia").serialize();
var url = 'funciones.php?BuscaRadiologia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraradiologia').empty();
                $('#muestraradiologia').append(''+response+'').fadeIn("slow");     
                $('#crearradiologia').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR RADIOLOGIA
function CrearRadiologia(codcita,codpaciente,modulo){

$('#crearradiologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaRadiologia=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearradiologia').empty();
                $('#crearradiologia').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

//FUNCION PARA MOSTRAR PLANTILLAS LECTRUA RX POR MEDICO
function BuscaPlantillaRx(codmedico) {

var codmedico = $("#codmedico").val();
var dataString = 'BuscaPlantillaRx=si&codmedico='+codmedico;

$.ajax({
            type: "GET",
            url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#muestraplantillarxmodal').empty();
                $('#muestraplantillarxmodal').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
            }
    });
 }

// FUNCION PARA CARGAR PLANTILLA LECTURA RX
function CargaPlantilla(nombreplantillalecturarx,procedimientolecturarx,descripcionlecturarx) {
    
  // aqui asigno cada valor a los campos correspondientes
  $('label[id*="nombreplantillalecturarx"]').text(nombreplantillalecturarx);
  $("#tipoestudiorx").val(procedimientolecturarx);
  $("#diagnosticorx").val(descripcionlecturarx);
}



// FUNCION PARA BUSQUEDA DE REPORTE EN RADIOLOGIA
function BuscarReporteRadiologia() {
                        
$('#muestrareporteradiologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var dataString = $("#buscareporteradiologia").serialize();
var url = 'funciones.php?BuscaReporteRadiologia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrareporteradiologia').empty();
                $('#muestrareporteradiologia').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}

























// FUNCION PARA BUSQUEDA DE TERAPIAS  
function BuscarTerapia() {
                        
$('#muestraterapia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#terapias").serialize();
var url = 'funciones.php?BuscaTerapia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraterapia').empty();
                $('#muestraterapia').append(''+response+'').fadeIn("slow");     
                $('#crearterapia').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR TERAPIAS
function CrearTerapia(codcita,codpaciente,modulo){

$('#crearterapia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaTerapia=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearterapia').empty();
                $('#crearterapia').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}

// FUNCION PARA BUSQUEDA DE REPORTE EN TERAPIAS
function BuscarReporteTerapia() {
                        
$('#muestrareporteterapia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var dataString = $("#buscareporteterapia").serialize();
var url = 'funciones.php?BuscaReporteTerapia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrareporteterapia').empty();
                $('#muestrareporteterapia').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}




/////FUNCION PARA ELIMINAR CICLO TERAPIAS 
function EliminarCiclo(idterapia,tipo,codterapia) {

var dataString = 'idterapia='+idterapia+'&tipo='+tipo+'&codterapia='+codterapia;
var eliminarciclo = confirm("ESTA SEGURO DE ELIMINAR ESTE CICLO DE TERAPIA?")
    
        if ( eliminarciclo ) { 
        
        $.ajax({
            type: "GET",
            url: "eliminar.php",
            data: dataString,
            success: function(response) {            
                $('#delete-ciclo').empty();
                $('#delete-ciclo').append('<center>'+response+'</center>').fadeIn("slow");
$("#muestraciclo").load("funciones.php?BuscaCicloTerapias=si&t="+codterapia);
                setTimeout(function() { $("#delete-ciclo").html(""); }, 5000);
                $('#'+parent).remove();
            }
        });
      }
}



























// FUNCION PARA BUSQUEDA DE ODONTOLOGIA  
function BuscarOdontologia() {
                        
$('#muestraodontologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codmedico = $("#codmedico").val();
var desde = $("#desde").val();
var hasta = $("#hasta").val();
var dataString = $("#odontologia").serialize();
var url = 'funciones.php?BuscaOdontologia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraodontologia').empty();
                $('#muestraodontologia').append(''+response+'').fadeIn("slow");     
                $('#crearodontologia').html("");
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA CREAR ODONTOLOGIA
function CrearOdontologia(codcita,codpaciente,modulo){

$('#crearodontologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');
                
var dataString = 'CreaOdontologia=si&codcita='+codcita+'&codpaciente='+codpaciente+'&modulo='+modulo;

$.ajax({
            type: "GET",
      url: "funciones.php",
            data: dataString,
            success: function(response) {            
                $('#crearodontologia').empty();
                $('#crearodontologia').append(''+response+'').fadeIn("slow");
                $('#'+parent).remove();
           }
      });
}



/////FUNCION PARA ELIMINAR REFERENCIA ODONTOGRAMA 
function EliminarReferencia(codreferencia,codpaciente,tipo) {

var dataString = 'codreferencia='+codreferencia+'&codpaciente='+codpaciente+'&tipo='+tipo;
var eliminarciclo = confirm("ESTA SEGURO DE ELIMINAR ELIMINAR ESTA REFERENCIA?")
    
        if ( eliminarciclo ) { 
        
        $.ajax({
            type: "GET",
            url: "eliminar.php",
            data: dataString,
            success: function(response) {            
                $('#delete-referencia').empty();
                $('#delete-referencia').append('<center>'+response+'</center>').fadeIn("slow");
$("#seccionDientes").load("funciones.php?BuscaOdontograma=si&codpaciente="+codpaciente);
$("#divTratamiento").load("funciones.php?BuscaTablaTratamiento=si&codpaciente="+codpaciente);
                setTimeout(function() { $("#delete-referencia").html(""); }, 5000);
                $('#'+parent).remove();
            }
        });

      setTimeout(function() { 
  
            //INICIO PARA REGISTRO DE IMAGEN  
            html2canvas($("#seccionDientes"), {
        
                      onrendered: function(canvas) {
                      theCanvas = canvas;
                      // document.body.appendChild(canvas);
                      //var codpaciente = $("#codpaciente").val();
                      var dataString = $("#odontograma").serialize();
                      var imagen = canvas.toDataURL();
                      var url = urlBase() + "operacionesOdontograma.php?accion=5";
                      var post = "codigo=" + atob(codpaciente) +"&img_val=" + imagen;
            
             $.ajax({
                        type: 'POST',
                        url: url,
                        data: post,
                        success: function (msg) {
                        // alert('Imagen guardada correctamente...');
                        //$("#seccionDientes").load("dientes.php"); 
                        }
                    }); 
                     
                  }
              }); 
              //FIN PARA REGISTRO DE IMAGEN
    
      }, 2000);

      } else {

        // alert('No se ejecuto el proceso...');
                
            }
}






// FUNCION PARA BUSQUEDA DE REPORTE EN ODONTOLOGIA
function BuscarReporteOdontologia() {
                        
$('#muestrareporteodontologia').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var dataString = $("#buscareporteodontologia").serialize();
var url = 'funciones.php?BuscaReporteOdontologia=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestrareporteodontologia').empty();
                $('#muestrareporteodontologia').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}





/////FUNCION PARA ELIMINAR REFERENCIA ODONTOGRAMA 
$(document).ready(function(){
 $('a[data-confirm]').click(function(ev){
 var href = $(this).attr('href');
 if(!$('#confirm-delete').length){
 $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">ELIMINAR REGISTRO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">¿Está seguro de que desea eliminar el elemento seleccionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Borrar cliente</a></div></div></div></div>');
 }
 $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
 return false;
 
 });
});



























// FUNCION PARA BUSQUEDA DE CONSENTIEMIENTO INFORMADO GENERAL
function BuscarConsentimientoGeneral() {
                        
$('#muestraconsentimiento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var codmedico = $("#codmedico").val();
var modulo = $("#modulo").val();
var tipo = $("#tipom").val();
var dataString = $("#consentimientogeneral").serialize();
var url = 'funciones.php?BuscaConsentimiento=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraconsentimiento').empty();
                $('#muestraconsentimiento').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}

// FUNCION PARA BUSQUEDA DE CONSENTIEMIENTO INFORMADO GINECOLOGIA
function BuscarConsentimientoGin() {
                        
$('#muestraconsentimiento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var codmedico = $("#codmedico").val();
var modulo = $("#modulo").val();
var tipo = $("#tipom").val();
var dataString = $("#consentimientogin").serialize();
var url = 'funciones.php?BuscaConsentimiento=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraconsentimiento').empty();
                $('#muestraconsentimiento').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}



// FUNCION PARA BUSQUEDA DE CONSENTIEMIENTO INFORMADO LABORATORIO 
function BuscarConsentimientoLab() {
                        
$('#muestraconsentimiento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var codmedico = $("#codmedico").val();
var modulo = $("#modulo").val();
var tipo = $("#tipom").val();
var dataString = $("#consentimientolab").serialize();
var url = 'funciones.php?BuscaConsentimiento=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraconsentimiento').empty();
                $('#muestraconsentimiento').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}



// FUNCION PARA BUSQUEDA DE CONSENTIEMIENTO INFORMADO LECTURA RX 
function BuscarConsentimientoLec() {
                        
$('#muestraconsentimiento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var codmedico = $("#codmedico").val();
var modulo = $("#modulo").val();
var tipo = $("#tipom").val();
var dataString = $("#consentimientolec").serialize();
var url = 'funciones.php?BuscaConsentimiento=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraconsentimiento').empty();
                $('#muestraconsentimiento').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}


// FUNCION PARA BUSQUEDA DE CONSENTIEMIENTO INFORMADO TERAPIAS
function BuscarConsentimientoTer() {
                        
$('#muestraconsentimiento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var codmedico = $("#codmedico").val();
var modulo = $("#modulo").val();
var tipo = $("#tipom").val();
var dataString = $("#consentimientoter").serialize();
var url = 'funciones.php?BuscaConsentimiento=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraconsentimiento').empty();
                $('#muestraconsentimiento').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}


// FUNCION PARA BUSQUEDA DE CONSENTIEMIENTO INFORMADO ODONTOLOGIA
function BuscarConsentimientoDo() {
                        
$('#muestraconsentimiento').html('<center><img src="assets/images/loading.gif" width="30" height="30"/></center>');

var codpaciente = $("#codpaciente").val();
var codmedico = $("#codmedico").val();
var modulo = $("#modulo").val();
var tipo = $("#tipom").val();
var dataString = $("#consentimientodo").serialize();
var url = 'funciones.php?BuscaConsentimiento=si';

$.ajax({
            type: "GET",
      url: url,
            data: dataString,
            success: function(response) {            
                $('#muestraconsentimiento').empty();
                $('#muestraconsentimiento').append(''+response+'').fadeIn("slow");     
                $('#'+parent).remove();
            }
      });
}