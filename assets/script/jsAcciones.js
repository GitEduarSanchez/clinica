function eliminateDuplicates(arr) {
 var i,
     len=arr.length,
     out=[],
     obj={};

 for (i=0;i<len;i++) {
    obj[arr[i]]=0;
 }
 for (i in obj) {
    out.push(i);
 }
 return out;
}

function hoverTxtDiente(idTxtDiente)
{
	var idDiente=idTxtDiente.substring(3, 6);
	var css=
	{
		"box-shadow": "0px 0px 10px blue"
	}
	$("#"+idDiente).css(css);
}

function outTxtDiente(idTxtDiente)
{
	var idDiente=idTxtDiente.substring(3, 6);
	var css=
	{
		"box-shadow": "none"
	}
	$("#"+idDiente).css(css);
}

function seleccionarCara(idCaraDiente)
{
	
	$("#txtCaraTratada").val(idCaraDiente);

}

function seleccionarDiente(idDiente)
{
	$("#txtIdentificadorDienteGeneral").val(idDiente);
	$("#txtDienteTratado").val(idDiente);
}

function agregarTratamiento(diente, cara, estado)
{
	if(diente=="")
	{
		alert("DEBE DE SELECCIONAR EL DIENTE A TRATAR");
		return false;
	} 
	else if(cara=="")
	{
		alert("DEBE DE SELECCIONAR LA CARA DEL DIENTE A TRATAR");
		return false;
	} 
	
	else if(estado=="")
	{
		alert("DEBE DE SELECCIONAR UNA REFERENCIA PARA AGREGAR");
		return false;
	} 

	var agregarFila=true;

	$("#tablaTratamiento").find("tr").each(function(index, elemento) 
    {
    	var dienteAsignado;

    	if(!agregarFila)
    	{
    		return false;
    	}

        $(elemento).find("td").each(function(index2, elemento2)
        {
        	if(index2==0)
        	{
        		dienteAsignado=$(elemento2).text();
        	}
        	switch(index2)
        	{
					
				case 2:
        			var partesEstado=$(elemento2).text().split("-");
        			if((partesEstado[1]==estado.split("-")[1]) && dienteAsignado==diente && cara!=cara)
        			{
        				if((partesEstado[1]==estado.split("-")[1]) && dienteAsignado==diente)
        				{
        					alert("El tratamiento ya fue asignado "+diente+" "+$(elemento2).text());
        					agregarFila=false;
        				}
        			}
        		break;
        	}
        });
    });

	if(agregarFila)
	{
		var filaHtml="<tr><td align='center'>"+diente+"</td><td align='center'>"+cara+"</td><td align='center'>"+estado+"</td><td class='widthEditarTable'><a class='btn btn-danger btn-xs' onclick='quitarTratamiento(this);'><i class='fa fa-trash-o'></i></a></td></tr>";
		$("#tablaTratamiento > tbody").append(filaHtml);
		$("#divTratamiento").scrollTop($("#tablaTratamiento").height());
		limpiarDatosTratamiento();
		//$("#odontograma")[0].reset();
	}
}

function quitarTratamiento(elemento)
{
	$(elemento).parent().parent().remove();
}

function recuperarDatosTratamiento(callback)
{
	var codpaciente;
	var estados="";

	codpaciente=$("#codpaciente").val();

	$("#tablaTratamiento").find("tr").each(function(index, elemento) 
    {
        $(elemento).find("td").each(function(index2, elemento2)
        {
        	estados+=$(elemento2).text()+"_";
        });
    });

    //descripcion=$("#txtDescripcion").val();
    estados=estados.substring(0, estados.length-2);

    callback(codpaciente, estados);
}

var urlBase = function () {
        var loc = window.location;
        var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search).length - pathName.length));
        //return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
    };


function guardarTratamiento()
{
	
	recuperarDatosTratamiento(function(codpaciente, estados)
	{
		var s = estados.split("__");
		var d = eliminateDuplicates(s);
		
		if(estados=="")
		{
			alert("DEBE DE AGREGAR REFERENCIAS DE ODONTOGRAMA AL PACIENTE");
			return false;
		}

		$.post("registrareferencias.php",
	    {
	    	
			codpaciente: codpaciente,
	    	estados: d
	    }, 
														  
														  
	    function(pagina)
	    {
			limpiarDatosTratamiento();
	    	$("#seccionPaginaAjax").html(pagina);
	    	setTimeout(function()
	    	{
	    		$("#seccionPaginaAjax").html("");
	    	}, 7000);
			
	    }).done(function(){ 
       $("#divTratamiento").load("funciones.php?BuscaTablaTratamiento=si&codpaciente="+btoa(codpaciente));
	   $("#seccionDientes").load("funciones.php?BuscaOdontograma=si&codpaciente="+btoa(codpaciente));
	    });

	    setTimeout(function() { 
  
            //INICIO PARA REGISTRO DE IMAGEN  
            html2canvas($("#seccionDientes"), {
        
                      onrendered: function(canvas) {
                      theCanvas = canvas;
                      // document.body.appendChild(canvas);
                      var codpaciente = $("#codpaciente").val();
                      var dataString = $("#odontologia").serialize();
                      var imagen = canvas.toDataURL();
                      var url = urlBase() + "operacionesOdontograma.php?accion=5";
                      var post = "codigo=" + codpaciente +"&img_val=" + imagen;
            
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
	});
}

		
function limpiarDatosTratamiento()
{
	$("#txtIdentificadorDienteGeneral").val("DXX");
	$("#txtDienteTratado").val("");
	$("#txtCaraTratada").val("");
	$("#cbxEstado").val("");
	//$("#odontograma")[0].reset();
	/*$("#tablaTratamiento").find("tr").each(function(index, row)
	{
		//$(row).remove();
	});*/
}


/*function cargarDientes(idSeccion, url, estados, codpaciente)
{
	$.ajax(
    {
        url: url,
        type: "POST",
        data: {codpaciente: codpaciente, estados: estados},
        cache: true
    }).done(function(pagina) 
    {
		
		$("#"+idSeccion).html(pagina);
		
		//INICIO PARA REGISTRO DE IMAGEN	
		html2canvas($("#seccionDientes"), {
                  onrendered: function(canvas) {
                      theCanvas = canvas;
                     // document.body.appendChild(canvas);
					  var imagen = canvas.toDataURL();
					  
					  var url = urlBase() + "operacionesOdontograma.php?accion=5";
                      var post = "codigo=" + codpaciente +"&img_val=" + imagen;
					  
					   $.ajax({
                        type: 'POST',
                        url: url,
                        data: post,
                        success: function (msg) {
                            //alert('Imagen guardada correctamente...');
                        }
                    }); 
                     
                  }
              })	
		//FIN PARA REGISTRO DE IMAGEN
    });
}

function cargarTratamientos(idSeccion, url, codpaciente)
{
	$.ajax(
    {
        url: url,
        type: "POST",
        data: {codpaciente: codpaciente},
        cache: true
    }).done(function(pagina) 
    {
        $("#"+idSeccion).html(pagina);
    });
}

function prepararImpresion()
{
	$("body #seccionTablaTratamientos").css({"display": "none"});
	$("body #seccionRegistrarTratamiento").css({"display": "none"});
}

function terminarImpresion()
{
	$("body #seccionTablaTratamientos").css({"display": "inline-block"});
	$("body #seccionRegistrarTratamiento").css({"display": "inline-block"});
}*/