// FUNCION AUTOCOMPLETE PARA BUSQUEDA DE CIE10

//AUTOCOMPLETO BUSQUEDA DE PACIENTES
$(function() {
        $("#valor").autocomplete({
            source: "class/buscapacientes.php",
			minLength: 1,
             select: function(event, ui) { 
			    $('#codpaciente').val(ui.item.codpaciente); 
           }  
        });
     });


//AUTOCOMPLETO PRESUNTIVO
$(function() {
        $("#presuntivo").autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
             select: function(event, ui) {  
				$('#idciepresuntivo').val(ui.item.idcie);
           }  
        });
    });
function autocompletar(contador){
			contador = contador.replace("presuntivo[]", "");
			 $("#presuntivo"+contador).autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
				 select: function(event, ui) {  
					$('#idciepresuntivo'+contador).val(ui.item.idcie);
			}  
	});
}
		


//AUTOCOMPLETO DEFINITIVO
$(function() {
        $("#definitivo").autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
             select: function(event, ui) {  
				$('#idciedefinitivo').val(ui.item.idcie);
           }  
        });
    });
function autocompletar2(contador){
			contador = contador.replace("definitivo[]", "");
			 $("#definitivo"+contador).autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
				 select: function(event, ui) {  
					//$('#cod_material').val(ui.item.cod_material);
					$('#idciedefinitivo'+contador).val(ui.item.idcie);
			}  
		});
}




//AUTOCOMPLETO FORMULAS MEDICAS
$(function() {
        $("#formula").autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
             select: function(event, ui) {  
				$('#idcieformula').val(ui.item.idcie);
           }  
        });
    });
function autocompletar3(contador){
			contador = contador.replace("formula[]", "");
			 $("#formula"+contador).autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
				 select: function(event, ui) {  
					//$('#cod_material').val(ui.item.cod_material);
					$('#idcieformula'+contador).val(ui.item.idcie);
			}  
	});
}


//AUTOCOMPLETO ORDENES MEDICAS
$(function() {
        $("#ordenes").autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
             select: function(event, ui) {  
				$('#idcieorden').val(ui.item.idcie);
           }  
        });
    });
function autocompletar4(contador){
			contador = contador.replace("ordenes[]", "");
			 $("#ordenes"+contador).autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
				 select: function(event, ui) {  
					//$('#cod_material').val(ui.item.cod_material);
					$('#idcieorden'+contador).val(ui.item.idcie);
			}  
	});
}	


$(function() {
        $("#examen").autocomplete({
            source: "class/buscacie10.php",
			minLength: 1,
             select: function(event, ui) { 
			    $('#idcie').val(ui.item.idcie); 
            }  
       });
 });