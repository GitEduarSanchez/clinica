/*Author: Ing. Ruben D. Chirinos R.
URL: http://asesoramientopc.hol.es/*/


/* FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS*/
$('document').ready(function() {
						   
	 $("#loginform").validate({
      rules:
	  {
			select: { required: true, },
			usuario: { required: true, },
			password: { required: true, },
	   },
       messages:
	   {
            select:{ required: "Por favor Seleccione Tipo de Usuario" },
		    usuario:{ required: "Por favor ingrese su Nombre de Usuario" },
			password:{ required: "Por favor ingrese su Clave de Acceso" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#loginform").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'index.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<i class="fa fa-refresh"></i> Verificando...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');
						setTimeout(' window.location.href = "panel"; ',4000);
					}
					else{
				
				$("#error").fadeIn(1000, function(){	
				$("#error").html('<center> '+response+' </center>');
				setTimeout(function() { $("#error").html(""); }, 5000);
				$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});





/* FUNCION JQUERY PARA VALIDAR ACCESO DE USUARIOS*/
$('document').ready(function()
{ 
						   
	 $("#lockscreen").validate({
      rules:
	  {
			usuario: { required: true, },
			password: { required: true, },
	   },
       messages:
	   {
		    usuario:{  required: "Por favor ingrese su Usuario" },
			password:{  required: "Por favor ingrese su Clave de Acceso" },
       },
	   errorElement: "span",
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#lockscreen").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'lockscreen.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<i class="fa fa-refresh"></i> Verificando...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');
						setTimeout(' window.location.href = "panel"; ',4000);
					}
					else{
				
				$("#error").fadeIn(1000, function(){	
				$("#error").html('<center> '+response+' </center>');
				setTimeout(function() { $("#error").html(""); }, 30000);
				$("#btn-login").html('<i class="fa fa-sign-in"></i> Acceder');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});

 


/* FUNCION JQUERY PARA RECUPERAR CONTRASEÑA DE USUARIOS */	 	 
$('document').ready(function()
{ 
     /* validation */
	$("#recuperarpassword").validate({
      rules:
	  {
			select: { required: true, },
			email: { required: true,  email: true  },
	   },
       messages:
 	   {
            select:{  required: "Por favor Seleccione Tipo de Usuario" },
			email:{  required: "Ingrese su Correo Electronico", email: "Ingrese un Correo Electronico Valido" },
       },
	   errorElement: "span",
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	    /* form submit */
	  function submitForm()
	   {		
				var data = $("#recuperarpassword").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'index.php',
				data : data,
				beforeSend: function()
				{	
					$("#errorr").fadeOut();
					$("#btn-recuperar").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error2").fadeIn(1000, function(){
											
											
	$("#errorr").html('<center><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
				$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');
										
									});
																				
								}
								else if(data==2)
								{
									
					$("#errorr").fadeIn(1000, function(){
											
											
	$("#errorr").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> EL CORREO INGRESADO NO FUE ENCONTRADO ACTUALMENTE !</div></center>');
												
							$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');
										
									});
								}
								else{
										
									$("#errorr").fadeIn(1000, function(){
											
						$("#errorr").html('<center> '+data+' </center>');
						$("#recuperarpassword")[0].reset();
						setTimeout(function() { $("#errorr").html(""); }, 15000);	
						$("#btn-recuperar").html('<span class="fa fa-check-square-o"></span> Recuperar Password');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA RECUPERAR CONTRASEÑA DE USUARIOS */
 
 
/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONTRASEÑA */	  
$('document').ready(function()
{ 
								
     /* validation */
	 $("#updatepassword").validate({
      rules:
	  {
			usuario: {required: true },
			password: {required: true, minlength: 8},  
            password2:   {required: true, minlength: 8, equalTo: "#password"}, 
	   },
       messages:
	   {
            usuario:{  required: "Ingrese Usuario de Acceso" },
            password:{ required: "Ingrese su Nuevo Password", minlength: "Ingrese 8 caracteres como m&iacute;nimo" },
		    password2:{ required: "Repita su Nuevo Password", minlength: "Ingrese 8 caracteres como m&iacute;nimo", equalTo: "Este Password no coincide" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatepassword").serialize();
				var id= $("#updatepassword").attr("data-id");
		        var codigo = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'password.php?codigo='+codigo,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#updatepassword")[0].reset();
						setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONTRASEÑA */
 
  
 
 
 
 
 
 
 
 
 












 
 
 






/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONFIGURACION GENERAL */	  
$('document').ready(function()
{ 
     /* validation */
	 $("#configuracion").validate({
      rules:
	  {
			nitsucursal: { required: true, digits : true },
			div: { required: true, digits : true },
			nombresucursal: { lettersonly: true, },
			direccionsucursal: { required: true, },
			departamentosucursal: { required: true, },
			ciudadsucursal: { required: true, },
			emailsucursal:{  required: true, email: true },
			telefonosucursal: { required: true, digits : true },
			identdirecsucursal: { required: true, digits : true  },
			nomdirecsucursal : { lettersonly: true, },
			apedirecsucursal: { lettersonly: true, },
			telefdirecsucursal: { required: true, digits : true },
	   },
       messages:
	   {
            nitsucursal:{  required: "Ingrese Nit", digits: "Ingrese solo digitos" },
			div:{  required: "Ingrese Div", digits: "digitos" },
			nombresucursal:{ required: "Ingrese Nombre Sucursal" },
			direccionsucursal:{ required: "Ingrese Direcci&oacute;n Sucursal" },
			departamentosucursal:{ required: "Seleccione Departamento" },
			ciudadsucursal:{ required: "Ingrese Ciudad Sucursal" },
			emailsucursal:{  required: "Ingrese Email Sucursal", email: "Ingrese un Email Valido" },
			telefonosucursal:{ required: "Ingrese Tel&eacute;fono Sucursal", digits: "Ingrese solo digitos" },
            identdirecsucursal:{  required: "Ingrese Identificacion", digits: "Ingrese solo digitos"  },
			nomdirecsucursal : { required : "Ingrese Nombre Completo"  },
			apedirecsucursal:{  required: "Ingrese Apellido Completo"  },
			telefdirecsucursal:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#configuracion").serialize();
				var id= $("#configuracion").attr("data-id");
		        var id = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'configuracion.php?id='+id,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');

									});
																				
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA SUCURSAL YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						setTimeout(function() { $("#error").html(""); }, 30000);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');				
			                       	});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONFIGURACION GENERAL */
 
 

 
 
 
 
 
 
 
 
 












 
 
 










/* FUNCION JQUERY PARA VALIDAR REGISTRO DE USUARIOS */	  
$('document').ready(function()
{ 
     /* validation */
	 $("#usuario").validate({
      rules:
	  {
			tipoidentificacion: { required: true, },
			cedula: { required: true, digits : true },
			nombres: { lettersonly: true, },
			sexo: { required: true, },
			cargo: { required: true, },
			email: { required: true, email: true },
			usuario: { required: true, },
			password: {required: true, minlength: 8},  
            password2:   {required: true, minlength: 8, equalTo: "#password"}, 
			nivel: { required: true, },
			status: { required: true, },
	   },
       messages:
	   {
            tipoidentificacion:{ required: "Por favor Seleccione" },
			cedula:{ required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"},
			nombres:{ required: "Ingrese su Nombre Completo" },
            sexo:{ required: "Seleccione su Sexo" },
			cargo: { required: "Ingrese su Cargo" },
			email:{  required: "Ingrese su Email", email: "Ingrese un Email Valido" },
			usuario:{ required: "Ingrese su Usuario" },
			password:{ required: "Ingrese su Password", minlength: "Ingrese 8 caracteres como minimo" },
		    password2:{ required: "Repita su Password", minlength: "Ingrese 8 caracteres como minimo", equalTo: "Este Password no coincide" },
			nivel:{ required: "Seleccione su Nivel" },
			status:{ required: "Seleccione su Status" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#usuario").serialize();
				var formData = new FormData($("#usuario")[0]);
				
				$.ajax({
				type : 'POST',
				url  : 'forusuario.php',
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UN USUARIO CON ESTE NUMERO DE C&Eacute;DULA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE CORREO ELECTRONICO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==4)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE USUARIO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#usuario")[0].reset();		
						setTimeout(function() { $("#error").html(""); }, 15000);		
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE USUARIOS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE USUARIOS */	 	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateusuario").validate({
      rules:
	  {
			tipoidentificacion: { required: true, },
			cedula: { required: true, digits : true },
			nombres: { lettersonly: true, },
			sexo: { required: true, },
			cargo: { required: true, },
			email: { required: true, email: true },
			usuario: { required: true, },
			password: {required: true, minlength: 8},  
            password2:   {required: true, minlength: 8, equalTo: "#password"}, 
			nivel: { required: true, },
			status: { required: true, },
	   },
       messages:
	   {
            tipoidentificacion:{ required: "Por favor Seleccione" },
			cedula:{ required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"},
			nombres:{ required: "Ingrese su Nombre Completo" },
            sexo:{ required: "Seleccione su Sexo" },
			cargo: { required: "Ingrese su Cargo" },
			email:{  required: "Ingrese su Email", email: "Ingrese un Email Valido" },
			usuario:{ required: "Ingrese su Usuario" },
			password:{ required: "Ingrese su Password", minlength: "Ingrese 8 caracteres como minimo" },
		    password2:{ required: "Repita su Password", minlength: "Ingrese 8 caracteres como minimo", equalTo: "Este Password no coincide" },
			nivel:{ required: "Seleccione su Nivel" },
			status:{ required: "Seleccione su Status" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateusuario").serialize();
				var formData = new FormData($("#updateusuario")[0]);
				var id= $("#updateusuario").attr("data-id");
		        var codigo = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'forusuario.php?codigo='+codigo,
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UN USUARIO CON ESTE NUMERO DE C&Eacute;DULA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE CORREO ELECTRONICO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==4)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE USUARIO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
						$("#error").fadeIn(1000, function(){
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='usuarios'", 15000);
						
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE USUARIOS */
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
/* FUNCION JQUERY PARA VALIDAR REGISTRO DE SUCURSALES */	  
$('document').ready(function()
{ 
     /* validation */
	 $("#sucursal").validate({
      rules:
	  {
			nitsucursal: { required: true, digits : true },
			divv: { required: true, digits : true },
			nombresucursal: { lettersonly: true, },
			direccionsucursal: { required: true, },
			departamentosucursal: { required: true, },
			ciudadsucursal: { required: true, },
			emailsucursal:{  required: true, email: true },
			telefonosucursal: { required: true, digits : true },
			identdirecsucursal: { required: true, digits : true  },
			nomdirecsucursal : { lettersonly: true, },
			apedirecsucursal: { lettersonly: true, },
			telefdirecsucursal: { required: true, digits : true },
	   },
       messages:
	   {
            nitsucursal:{  required: "Ingrese Nit", digits: "Ingrese solo digitos" },
			divv:{  required: "Ingrese Div", digits: "digitos" },
			nombresucursal:{ required: "Ingrese Nombre Sucursal" },
			direccionsucursal:{ required: "Ingrese Direcci&oacute;n Sucursal" },
			departamentosucursal:{ required: "Seleccione Departamento" },
			ciudadsucursal:{ required: "Ingrese Ciudad Sucursal" },
			emailsucursal:{  required: "Ingrese Email Sucursal", email: "Ingrese un Email Valido" },
			telefonosucursal:{ required: "Ingrese Tel&eacute;fono Sucursal", digits: "Ingrese solo digitos" },
            identdirecsucursal:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			nomdirecsucursal : { required : "Ingrese Nombre Completo"  },
			apedirecsucursal:{  required: "Ingrese Apellido Completo"  },
			telefdirecsucursal:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#sucursal").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forsucursal.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA SUCURSAL YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> &nbsp; '+data+' </center>');
						$("#sucursal")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);					
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */ 
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE SUCURSALES */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE SUCURSALES */	 	 
     $('document').ready(function()
{ 
     /* validation */
	 $("#updatesucursal").validate({
      rules:
	  {
			nitsucursal: { required: true, digits : true },
			divv: { required: true, digits : true },
			nombresucursal: { lettersonly: true, },
			direccionsucursal: { required: true, },
			departamentosucursal: { required: true, },
			ciudadsucursal: { required: true, },
			emailsucursal:{  required: true, email: true },
			telefonosucursal: { required: true, digits : true },
			identdirecsucursal: { required: true, digits : true  },
			nomdirecsucursal : { lettersonly: true, },
			apedirecsucursal: { lettersonly: true, },
			telefdirecsucursal: { required: true, digits : true },
	   },
       messages:
	   {
            nitsucursal:{  required: "Ingrese Nit", digits: "Ingrese solo digitos" },
			divv:{  required: "Ingrese Div", digits: "digitos" },
			nombresucursal:{ required: "Ingrese Nombre Sucursal" },
			direccionsucursal:{ required: "Ingrese Direcci&oacute;n Sucursal" },
			departamentosucursal:{ required: "Seleccione Departamento" },
			ciudadsucursal:{ required: "Ingrese Ciudad Sucursal" },
			emailsucursal:{  required: "Ingrese Email Sucursal", email: "Ingrese un Email Valido" },
			telefonosucursal:{ required: "Ingrese Tel&eacute;fono Sucursal", digits: "Ingrese solo digitos" },
            identdirecsucursal:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			nomdirecsucursal : { required : "Ingrese Nombre Completo"  },
			apedirecsucursal:{  required: "Ingrese Apellido Completo"  },
			telefdirecsucursal:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatesucursal").serialize();
				var id= $("#updatesucursal").attr("data-id");
		        var codsucursal = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'forsucursal.php?codsucursal='+codsucursal,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');

									});
																				
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA SUCURSAL YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='sucursales'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE SUCURSALES */
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
/* FUNCION JQUERY PARA VALIDAR REGISTRO DE SEDES */	 
	 
$('document').ready(function()
{ 
     /* validation */
	 $("#sedes").validate({
      rules:
	  {
			codsucursal: { required: true, },
			nombresede: { lettersonly: true, },
			departamentosede: { required: true, },
			ciudadsede: { required: true, },
			direccionsede: { required: true, },
			emailsede:{  required: true, email: true },
			telefonosede: { required: true, digits : true },
			identdirecsede: { required: true, digits : true  },
			nomdirecsede : { lettersonly: true, },
			apedirecsede: { lettersonly: true, },
			telefdirecsede: { required: true, digits : true },
	   },
       messages:
	   {
            codsucursal:{  required: "Seleccione Sucursal" },
			nombresede:{ required: "Ingrese Nombre Sede" },
			departamentosede:{ required: "Seleccione Departamento" },
			ciudadsede:{ required: "Ingrese Ciudad" },
			direccionsede:{ required: "Ingrese Direcci&oacute;n Sede" },
			emailsede:{  required: "Ingrese Email Sede", email: "Ingrese un Email Valido" },
			telefonosede:{ required: "Ingrese Tel&eacute;fono Sede", digits: "Ingrese solo digitos" },
            identdirecsede:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			nomdirecsede : { required : "Ingrese Nombre Completo"  },
			apedirecsede:{  required: "Ingrese Apellido Completo"  },
			telefdirecsede:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#sedes").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forsedes.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA SEDE YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#sedes")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);					
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE SEDES */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE SEDES */	 
     $('document').ready(function()
{ 
     /* validation */
	 $("#updatesedes").validate({
      rules:
	  {
			codsucursal: { required: true, },
			nombresede: { lettersonly: true, },
			departamentosede: { required: true, },
			ciudadsede: { required: true, },
			direccionsede: { required: true, },
			emailsede:{  required: true, email: true },
			telefonosede: { required: true, digits : true },
			identdirecsede: { required: true, digits : true  },
			nomdirecsede : { lettersonly: true, },
			apedirecsede: { lettersonly: true, },
			telefdirecsede: { required: true, digits : true },
	   },
       messages:
	   {
            codsucursal:{  required: "Seleccione Sucursal" },
			nombresede:{ required: "Ingrese Nombre Sede" },
			departamentosede:{ required: "Seleccione Departamento" },
			ciudadsede:{ required: "Ingrese Ciudad" },
			direccionsede:{ required: "Ingrese Direcci&oacute;n Sede" },
			emailsede:{  required: "Ingrese Email Sede", email: "Ingrese un Email Valido" },
			telefonosede:{ required: "Ingrese Tel&eacute;fono Sede", digits: "Ingrese solo digitos" },
            identdirecsede:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			nomdirecsede : { required : "Ingrese Nombre Completo"  },
			apedirecsede:{  required: "Ingrese Apellido Completo"  },
			telefdirecsede:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatesedes").serialize();
				var id= $("#updatesedes").attr("data-id");
		        var codsede = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'forsedes.php?codsede='+codsede,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA SEDE YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='sedes'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE SEDES */
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /* FUNCION JQUERY PARA VALIDAR REGISTRO DE EPS */	  
$('document').ready(function()
{ 
     /* validation */
	 $("#eps").validate({
      rules:
	  {
			codigo: { required: true, },
			nomentidad: { required: true, },
			nit: { required: true, },
			tipo: { required: true, },
			dv: { required: true, },
			expedida: { required: true, },
			nomcontabilidad: { required: true, },
	   },
       messages:
	   {
            codigo:{  required: "Ingrese C&oacute;digo de Eps" },
			nomentidad:{  required: "Ingrese Nombre de Entidad" },
			nit:{  required: "Ingrese Nit de Eps" },
			tipo:{  required: "Ingrese Tipo de Eps" },
			dv:{  required: "Ingrese Dv de Eps" },
			expedida:{  required: "Ingrese Nombre de Expedida" },
			nomcontabilidad:{  required: "Ingrese Nombre de Contabilidad" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#eps").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'foreps.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> EL CODIGO DE ESTE EPS YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#eps")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);
                        $("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
   
	   
});

/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE EPS */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE EPS */	 
	 
     $('document').ready(function()
{ 
     /* validation */
	 $("#updateeps").validate({
        rules:
	  {
			codigo: { required: true, },
			nomentidad: { required: true, },
			nit: { required: true, },
			tipo: { required: true, },
			dv: { required: true, },
			expedida: { required: true, },
			nomcontabilidad: { required: true, },
	   },
       messages:
	   {
            codigo:{  required: "Ingrese C&oacute;digo de Eps" },
			nomentidad:{  required: "Ingrese Nombre de Entidad" },
			nit:{  required: "Ingrese Nit de Eps" },
			tipo:{  required: "Ingrese Tipo de Eps" },
			dv:{  required: "Ingrese Dv de Eps" },
			expedida:{  required: "Ingrese Nombre de Expedida" },
			nomcontabilidad:{  required: "Ingrese Nombre de Contabilidad" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateeps").serialize();
				var id= $("#updateeps").attr("data-id");
		        var codeps = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'foreps.php?codeps='+codeps,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE CODIGO DE EPS YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='eps'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE EPS */
 
 
 
 
 
 
 
 
 
 
 
 
 
/* FUNCION JQUERY PARA VALIDAR REGISTRO DE VALORES DE EXAMENES DE LABORATORIO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#valoresexamenes").validate({
      rules:
	  {
			hematocritov: { required: true, },
			hemoglobinav: { required: true, },
			leucocitosv: { required: true, },
			neutrofilosv: { required: true, },
			linfocitosv: { required: true, },
			eosinofilosv: { required: true, },
			monositosv: { required: true, },
			basofilosv: { required: true, },
			cayadosv: { required: true, },
			plaquetasv: { required: true, },
			reticulositosv: { required: true, },
			vsgv: { required: true, },
			ptv: { required: true, },
			pttv: { required: true, },
			glucosav: { required: true, },
			colesteroltotalv: { required: true, },
			colesterolhdlv: { required: true, },
			colesterolldlv: { required: true, },
			trigliceridosv: { required: true, },
			acidouricov: { required: true, },
			nitrogenoureicov: { required: true, },
			creatininav: { required: true, },
			proteinastotalesv: { required: true, },
			albuminav: { required: true, },
			globulinav: { required: true, },
			bilirrubinatotalv: { required: true, },
			bilirrubinadirectav: { required: true, },
			bilirrubinaindirectav: { required: true, },
			fosfatasaalcalinav: { required: true, },
			tgov: { required: true, },
			tgpv: { required: true, },
			amilasav: { required: true, },
	   },
       messages:
	   {
            hematocritov:{ required: "Ingrese Valor normal" },
			hemoglobinav: { required: "Ingrese Valor normal" },
			leucocitosv: { required: "Ingrese Valor normal" },
			neutrofilosv: { required: "Ingrese Valor normal" },
			linfocitosv: { required: "Ingrese Valor normal" },
			eosinofilosv: { required: "Ingrese Valor normal" },
			monositosv: { required: "Ingrese Valor normal" },
			basofilosv: { required: "Ingrese Valor normal" },
			cayadosv: { required: "Ingrese Valor normal" },
			plaquetasv: { required: "Ingrese Valor normal" },
			reticulositosv: { required: "Ingrese Valor normal" },
			vsgv: { required: "Ingrese Valor normal" },
			ptv: { required: "Ingrese Valor normal" },
			pttv: { required: "Ingrese Valor normal" },
			glucosav: { required: "Ingrese Valor normal" },
			colesteroltotalv: { required: "Ingrese Valor normal" },
			colesterolhdlv: { required: "Ingrese Valor normal" },
			colesterolldlv: { required: "Ingrese Valor normal" },
			trigliceridosv: { required: "Ingrese Valor normal" },
			acidouricov: { required: "Ingrese Valor normal" },
			nitrogenoureicov: { required: "Ingrese Valor normal" },
			creatininav: { required: "Ingrese Valor normal" },
			proteinastotalesv: { required: "Ingrese Valor normal" },
			albuminav: { required: "Ingrese Valor normal" },
			globulinav: { required: "Ingrese Valor normal" },
			bilirrubinatotalv: { required: "Ingrese Valor normal" },
			bilirrubinadirectav: { required: "Ingrese Valor normal" },
			bilirrubinaindirectav: { required: "Ingrese Valor normal" },
			fosfatasaalcalinav: { required: "Ingrese Valor normal" },
			tgov: { required: "Ingrese Valor normal" },
			tgpv: { required: "Ingrese Valor normal" },
			amilasav: { required: "Ingrese Valor normal" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#valoresexamenes").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'valorexamenes.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR LOS CAMPOS NO PUEDEN IR EN BLANCO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
   
	   
});

/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE VALORES DE EXAMENES DE LABORATORIO */ 
 
 
 
 
 /* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE VALORES DE EXAMENES DE LABORATORIO */	 

$('document').ready(function()
{ 
     /* validation */
	 $("#updatevaloresexamenes").validate({
         rules:
	  {
			hematocritov: { required: true, },
			hemoglobinav: { required: true, },
			leucocitosv: { required: true, },
			neutrofilosv: { required: true, },
			linfocitosv: { required: true, },
			eosinofilosv: { required: true, },
			monositosv: { required: true, },
			basofilosv: { required: true, },
			cayadosv: { required: true, },
			plaquetasv: { required: true, },
			reticulositosv: { required: true, },
			vsgv: { required: true, },
			ptv: { required: true, },
			pttv: { required: true, },
			glucosav: { required: true, },
			colesteroltotalv: { required: true, },
			colesterolhdlv: { required: true, },
			colesterolldlv: { required: true, },
			trigliceridosv: { required: true, },
			acidouricov: { required: true, },
			nitrogenoureicov: { required: true, },
			creatininav: { required: true, },
			proteinastotalesv: { required: true, },
			albuminav: { required: true, },
			globulinav: { required: true, },
			bilirrubinatotalv: { required: true, },
			bilirrubinadirectav: { required: true, },
			bilirrubinaindirectav: { required: true, },
			fosfatasaalcalinav: { required: true, },
			tgov: { required: true, },
			tgpv: { required: true, },
			amilasav: { required: true, },
	   },
       messages:
	   {
            hematocritov:{ required: "Ingrese Valor normal" },
			hemoglobinav: { required: "Ingrese Valor normal" },
			leucocitosv: { required: "Ingrese Valor normal" },
			neutrofilosv: { required: "Ingrese Valor normal" },
			linfocitosv: { required: "Ingrese Valor normal" },
			eosinofilosv: { required: "Ingrese Valor normal" },
			monositosv: { required: "Ingrese Valor normal" },
			basofilosv: { required: "Ingrese Valor normal" },
			cayadosv: { required: "Ingrese Valor normal" },
			plaquetasv: { required: "Ingrese Valor normal" },
			reticulositosv: { required: "Ingrese Valor normal" },
			vsgv: { required: "Ingrese Valor normal" },
			ptv: { required: "Ingrese Valor normal" },
			pttv: { required: "Ingrese Valor normal" },
			glucosav: { required: "Ingrese Valor normal" },
			colesteroltotalv: { required: "Ingrese Valor normal" },
			colesterolhdlv: { required: "Ingrese Valor normal" },
			colesterolldlv: { required: "Ingrese Valor normal" },
			trigliceridosv: { required: "Ingrese Valor normal" },
			acidouricov: { required: "Ingrese Valor normal" },
			nitrogenoureicov: { required: "Ingrese Valor normal" },
			creatininav: { required: "Ingrese Valor normal" },
			proteinastotalesv: { required: "Ingrese Valor normal" },
			albuminav: { required: "Ingrese Valor normal" },
			globulinav: { required: "Ingrese Valor normal" },
			bilirrubinatotalv: { required: "Ingrese Valor normal" },
			bilirrubinadirectav: { required: "Ingrese Valor normal" },
			bilirrubinaindirectav: { required: "Ingrese Valor normal" },
			fosfatasaalcalinav: { required: "Ingrese Valor normal" },
			tgov: { required: "Ingrese Valor normal" },
			tgpv: { required: "Ingrese Valor normal" },
			amilasav: { required: "Ingrese Valor normal" },
           
       },
	   submitHandler: submitForm	
       });
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
	
	var data = $("#updatevaloresexamenes").serialize();
	var id= $("#updatevaloresexamenes").attr("data-id");
	var codvalores = id;	
				
				$.ajax({
				
				type : 'POST',
				url  : 'valorexamenes.php?codvalores='+codvalores,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR LOS CAMPOS NO PUEDEN IR EN BLANCO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}  
								
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */   
}); 
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE VALORES DE EXAMENES DE LABORATORIO */

 
 
 
 
 
 
 
 
 
 
 
 /* FUNCION JQUERY PARA VALIDAR REGISTRO DE PLANTILLAS ECOGRAFICAS */	  
  $('document').ready(function()
{ 
     /* validation */
	 $("#plantillaecografia").validate({
      rules:
	  {
			codmedico: { required: true, },
			nombreplantillaecografia: { required: true, },
			procedimientoecografia: { required: true, },
			descripcionecografia: { required: true, },
	   },
       messages:
	   {
            codmedico:{  required: "Seleccione M&eacute;dico" },
			nombreplantillaecografia:{ required: "Ingrese Nombre Plantilla" },
			procedimientoecografia:{ required: "Ingrese Procedimiento Plantilla" },
			descripcionecografia:{ required: "Ingrese Plantilla Ecografica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#plantillaecografia").serialize();

      if ($('input[type=checkbox]:checked').length === 0) {
	 
	            alert('POR FAVOR DEBE DE SELECCIONAR AL MENOS UN MEDICO');
         
                return false;
	 
	  } else {
				
				$.ajax({
				
				type : 'POST',
				url  : 'forplantillaginecologica.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UNA PLANTILLA CON ESTE NOMBRE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA PLANTILLA ECOGRAFICA YA SE ENCUENTRA REGISTRADA PARA ESTE MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#plantillaecografia")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
			   }
		}
	   /* form submit */	   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PLANTILLAS ECOGRAFICAS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE PLANTILLAS ECOGRAFICAS */	 	 
   $('document').ready(function()
{ 
     /* validation */
	 $("#updateplantillaecografia").validate({
      rules:
	  {
			codmedico: { required: true, },
			nombreplantillaecografia: { required: true, },
			procedimientoecografia: { required: true, },
			descripcionecografia: { required: true, },
	   },
       messages:
	   {
            codmedico:{  required: "Seleccione M&eacute;dico" },
			nombreplantillaecografia:{ required: "Ingrese Nombre Plantilla" },
			procedimientoecografia:{ required: "Ingrese Procedimiento Plantilla" },
			descripcionecografia:{ required: "Ingrese Plantilla Ecografica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateplantillaecografia").serialize();
				var id= $("#updateplantillaecografia").attr("data-id");
		        var codplantillaecografia = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'forplantillaginecologica.php?codplantillaecografia='+codplantillaecografia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UNA PLANTILLA CON ESTE NOMBRE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA PLANTILLA ECOGRAFICA YA SE ENCUENTRA REGISTRADA PARA ESTE MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
    					setTimeout("location.href='plantillasginecologia'", 15000);
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */
	});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE PLANTILLAS ECOGRAFICAS */
 
 
   /* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PLANTILLAS ECOGRAFICAS */	 
	 
   $('document').ready(function()
{ 
     /* validation */
	 $("#asignarplantillaecografia").validate({
      rules:
	  {
			codmedico: { required: true, },
	   },
       messages:
	   {
            codmedico:{  required: "Seleccione Medico" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#asignarplantillaecografia").serialize();
				var id = $("#asignarplantillaecografia").attr("data-id");
		        var codplantillaecografia = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'asigplantillaginecologica.php?codplantillaecografia='+codplantillaecografia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-play"></span> Asignar');
										
									});
																				
								}
								
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA PLANTILLA ECOGRAFICA YA SE ENCUENTRA ASIGNADA PARA ESTE MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-play"></span> Asignar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#asignarplantillaecografia")[0].reset();
						$("#asignacionplantillaecografia").load("funciones?muestraplantillaecografia=si&codplantillaecografia="+btoa(codplantillaecografia));
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-update").html('<span class="fa fa-play"></span> Asignar');
					
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
});

/*  FIN DE FUNCION PARA VALIDAR ASIGNACION DE PLANTILLAS ECOGRAFICAS */



















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE PLANTILLAS LECTURA RX */	 
	 
  $('document').ready(function()
{ 
     /* validation */
	 $("#plantillalecturarx").validate({
      rules:
	  {
			codmedico: { required: true, },
			nombreplantillalecturarx: { required: true, },
			procedimientolecturarx: { required: true, },
			descripcionlecturarx: { required: true, },
	   },
       messages:
	   {
            codmedico:{  required: "Seleccione M&eacute;dico" },
			nombreplantillalecturarx:{ required: "Ingrese Nombre Plantilla" },
			procedimientolecturarx:{ required: "Ingrese Procedimiento Plantilla" },
			descripcionlecturarx:{ required: "Ingrese Plantilla Lectura Rx" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#plantillalecturarx").serialize();

      if ($('input[type=checkbox]:checked').length === 0) {
	 
	            alert('POR FAVOR DEBE DE SELECCIONAR AL MENOS UN MEDICO');
         
                return false;
	 
	  } else {
				
				$.ajax({
				
				type : 'POST',
				url  : 'forplantillalecturarx.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UNA PLANTILLA CON ESTE NOMBRE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA PLANTILLA DE LECTURA RX YA SE ENCUENTRA REGISTRADA PARA ESTE MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#plantillalecturarx")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
			  }
		}
	   /* form submit */
   
	   
});

/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PLANTILLAS LECTURA RX */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE PLANTILLAS LECTURA RX */	 
	 
   $('document').ready(function()
{ 
     /* validation */
	 $("#updateplantillalecturarx").validate({
      rules:
	  {
			codmedico: { required: true, },
			nombreplantillalecturarx: { required: true, },
			procedimientolecturarx: { required: true, },
			descripcionlecturarx: { required: true, },
	   },
       messages:
	   {
            codmedico:{  required: "Seleccione M&eacute;dico" },
			nombreplantillalecturarx:{ required: "Ingrese Nombre Plantilla" },
			procedimientolecturarx:{ required: "Ingrese Procedimiento Plantilla" },
			descripcionlecturarx:{ required: "Ingrese Plantilla Lectura Rx" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateplantillalecturarx").serialize();
				var id= $("#updateplantillalecturarx").attr("data-id");
		        var codplantillalecturarx = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'forplantillalecturarx.php?codplantillalecturarx='+codplantillalecturarx,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UNA PLANTILLA CON ESTE NOMBRE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA PLANTILLA DE LECTURA RX YA SE ENCUENTRA REGISTRADA PARA ESTE MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='plantillasradiologia'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE PLANTILLAS LECTURA RX */
 
 
   /* FUNCION JQUERY PARA VALIDAR ASIGNACION DE PLANTILLAS LECTURA RX */	 
	 
   $('document').ready(function()
{ 
     /* validation */
	 $("#asignarplantillalecturarx").validate({
      rules:
	  {
			codmedico: { required: true, },
	   },
       messages:
	   {
            codmedico:{  required: "Seleccione M&eacute;dico" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#asignarplantillalecturarx").serialize();
				var id = $("#asignarplantillalecturarx").attr("data-id");
		        var codplantillalecturarx = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'asigplantillalecturarx.php?codplantillalecturarx='+codplantillalecturarx,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-play"></span> Asignar');
										
									});
																				
								}
								
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA PLANTILLA DE LECTURA RX YA SE ENCUENTRA ASIGNADA PARA ESTE MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-play"></span> Asignar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#asignarplantillalecturarx")[0].reset();
						$("#asignacionplantillalecturarx").load("funciones?muestraplantillalecturarx=si&codplantillalecturarx="+btoa(codplantillalecturarx));
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-update").html('<span class="fa fa-play"></span> Asignar');
					
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
	   
	   
});

/*  FIN DE FUNCION PARA VALIDAR ASIGNACION DE PLANTILLAS LECTURA RX */

















 
 /* FUNCION JQUERY PARA VALIDAR REGISTRO DE PACIENTES */	 
	 
     $('document').ready(function()
{ 
     /* validation */
	 $("#paciente").validate({
      rules:
	  {
			idenpaciente: { required: true, },
			cedpaciente: { required: true, digits : true  },
			pnompaciente: { lettersonly: true, },
			snompaciente : { lettersonly: true, },
			papepaciente: { lettersonly: true, },
			sapepaciente: { lettersonly: true, },
			fnacpaciente: { required: true, },
			tlfpaciente: { required: true, digits : true },
			gruposapaciente: { required: true, },
			eps: { required: true, },
			vinculacion: { required: true, },
			estadopaciente: { required: true, },
			ocupacionpaciente: { required: true, },
			sexopaciente: { required: true, },
			enfoquepaciente: { required: true, },
			departamento: { required: true, },
			municipio: { required: true, },
			ciudad: { required: false, },
			direcpaciente: { required: true, },
			nomacompana: { lettersonly: true, },
			direcacompana: { required: true, },
			tlfacompana: { required: true, digits : true },
			parentescoacompana: { required: true, },
			nomresponsable: { required: false, lettersonly: true, },
			direcresponsable: { required: false, },
			tlfresponsable: { required: false, digits : true },
			parentescoresponsable: { required: false, },
	   },
       messages:
	   {
            idenpaciente:{ required: "Por favor Seleccione" },
			cedpaciente:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			pnompaciente:{ required: "Ingrese Primer Nombre" },
			snompaciente : { required : "Ingrese Segundo Nombre"  },
			papepaciente:{  required: "Ingrese Primer Apellido"  },
			sapepaciente:{ required: "Ingrese Segundo Apellido" },
			fnacpaciente:{ required: "Ingrese Fecha Nacimiento", date: "Ingrese fecha Valida"  },
			tlfpaciente:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			gruposapaciente:{ required: "Seleccione Grupo Sanguineo" },
			eps:{ required: "Seleccione Eps" },
			vinculacion:{ required: "Ingrese Vinculaci&oacute;n" },
			estadopaciente:{ required: "Seleccione Estado Civil"  },
			ocupacionpaciente:{ required: "Ingrese Ocupaci&oacute;n" },
			sexopaciente:{  required: "Seleccione Sexo" },
			enfoquepaciente:{ required: "Seleccione Enfoque" },
			departamento: { required: "Seleccione Departamento" },
			municipio: { required: "Seleccione Municipio" },
			ciudadpaciente:{ required: "Ingrese Ciudad" },
			direcpaciente:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			nomacompana:{ required: "Ingrese Nombre Completo" },
		    direcacompana:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			tlfacompana:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			parentescoacompana:{ required: "Ingrese Parentesco" },
			nomresponsable:{ required: "Ingrese Nombre Completo" },
		    direcresponsable:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			tlfresponsable:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			parentescoresponsable:{ required: "Ingrese Parentesco" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#paciente").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forpaciente.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#paciente")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);					
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE PACIENTES */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE PACIENTES */	 	 
     $('document').ready(function()
{ 
     /* validation */
	 $("#updatepaciente").validate({
      rules:
	  {
			idenpaciente: { required: true, },
			cedpaciente: { required: true, digits : true  },
			pnompaciente: { lettersonly: true, },
			snompaciente : { lettersonly: true, },
			papepaciente: { lettersonly: true, },
			sapepaciente: { lettersonly: true, },
			fnacpaciente: { required: true, },
			tlfpaciente: { required: true, digits : true },
			gruposapaciente: { required: true, },
			eps: { required: true, },
			vinculacion: { required: true, },
			estadopaciente: { required: true, },
			ocupacionpaciente: { required: true, },
			sexopaciente: { required: true, },
			enfoquepaciente: { required: true, },
			departamento: { required: true, },
			municipio: { required: true, },
			ciudad: { required: false, },
			direcpaciente: { required: true, },
			nomacompana: { lettersonly: true, },
			direcacompana: { required: true, },
			tlfacompana: { required: true, digits : true },
			parentescoacompana: { required: true, },
			nomresponsable: { required: false, lettersonly: true, },
			direcresponsable: { required: false, },
			tlfresponsable: { required: false, digits : true },
			parentescoresponsable: { required: false, },
	   },
       messages:
	   {
            idenpaciente:{ required: "Por favor Seleccione" },
			cedpaciente:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			pnompaciente:{ required: "Ingrese Primer Nombre" },
			snompaciente : { required : "Ingrese Segundo Nombre"  },
			papepaciente:{  required: "Ingrese Primer Apellido"  },
			sapepaciente:{ required: "Ingrese Segundo Apellido" },
			fnacpaciente:{ required: "Ingrese Fecha Nacimiento", date: "Ingrese fecha Valida"  },
			tlfpaciente:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			gruposapaciente:{ required: "Seleccione Grupo Sanguineo" },
			eps:{ required: "Seleccione Eps" },
			vinculacion:{ required: "Ingrese Vinculaci&oacute;n" },
			estadopaciente:{ required: "Seleccione Estado Civil"  },
			ocupacionpaciente:{ required: "Ingrese Ocupaci&oacute;n" },
			sexopaciente:{  required: "Seleccione Sexo" },
			enfoquepaciente:{ required: "Seleccione Enfoque" },
			departamento: { required: "Seleccione Departamento" },
			municipio: { required: "Seleccione Municipio" },
			ciudadpaciente:{ required: "Ingrese Ciudad" },
			direcpaciente:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			nomacompana:{ required: "Ingrese Nombre Completo" },
		    direcacompana:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			tlfacompana:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			parentescoacompana:{ required: "Ingrese Parentesco" },
			nomresponsable:{ required: "Ingrese Nombre Completo" },
		    direcresponsable:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			tlfresponsable:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			parentescoresponsable:{ required: "Ingrese Parentesco" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatepaciente").serialize();
				var id= $("#updatepaciente").attr("data-id");
		        var codpaciente = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'forpaciente.php?codpaciente='+codpaciente,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
						 setTimeout("location.href='pacientes'", 15000);
						
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE PACIENTES */
 
 
 
 /* FUNCION JQUERY PARA VALIDAR REGISTRO DE MEDICOS */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#medico").validate({
      rules:
	  {
			identmedico: { required: true, },
			cedmedico: { required: true, digits : true  },
			tpmedico: { required: true,  },
			nommedico: { required: true, lettersonly: true, },
			apemedico : { required: true, lettersonly: true, },
			tlfmedico: { required: true, digits : true },
			sexomedico: { required: true, },
			correomedico: { required: true, email: true },
			direcmedico: { required: true, },
			moduloespec: { required: true, },
			especmedico: { required: true, },
			fnacmedico: { required: true, },
	   },
       messages:
	   {
            identmedico:{ required: "Seleccione Tipo de Identificaci&oacute;n" },
			cedmedico:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			tpmedico:{  required: "Ingrese Tarjeta Profesional" },
			nommedico:{ required: "Ingrese su Nombre", lettersonly: "Ingrese solo letras para Nombres" },
			apemedico : { required : "Ingrese su Apellido", lettersonly: "Ingrese solo letras para Apllidos" },
			tlfmedico:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			sexomedico:{  required: "Seleccione Sexo" },
			correomedico:{  required: "Ingrese su Email", email: "Ingrese un Email Valido" },
			direcmedico:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			moduloespec: { required: "Seleccione M&oacute;dulo de Acceso" },
			especmedico: { required: "Seleccione Especialidad" },
			fnacmedico:{ required: "Ingrese Fecha Nacimiento", date: "Ingrese fecha Valida"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#medico").serialize();
				var formData = new FormData($("#medico")[0]);
				
				$.ajax({
				type : 'POST',
				url  : 'formedico.php',
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE CORREO YA SE ENCUENTRA REGISTRADO ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE MEDICO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#medico")[0].reset();
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
   
	   
});

/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE MEDICOS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE MEDICOS */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updatemedico").validate({
      rules:
	  {
			identmedico: { required: true, },
			cedmedico: { required: true, digits : true  },
			tpmedico: { required: true,  },
			nommedico: { required: true, lettersonly: true, },
			apemedico : { required: true, lettersonly: true, },
			tlfmedico: { required: true, digits : true },
			sexomedico: { required: true, },
			correomedico: { required: true, email: true },
			direcmedico: { required: true, },
			moduloespec: { required: true, },
			especmedico: { required: true, },
			fnacmedico: { required: true, },
	   },
       messages:
	   {
            identmedico:{ required: "Seleccione Tipo de Identificaci&oacute;n" },
			cedmedico:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			tpmedico:{  required: "Ingrese Tarjeta Profesional" },
			nommedico:{ required: "Ingrese su Nombre", lettersonly: "Ingrese solo letras para Nombres" },
			apemedico : { required : "Ingrese su Apellido", lettersonly: "Ingrese solo letras para Apllidos" },
			tlfmedico:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			sexomedico:{  required: "Seleccione Sexo" },
			correomedico:{  required: "Ingrese su Email", email: "Ingrese un Email Valido" },
			direcmedico:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			moduloespec: { required: "Seleccione M&oacute;dulo de Acceso" },
			especmedico: { required: "Seleccione Especialidad" },
			fnacmedico:{ required: "Ingrese Fecha Nacimiento", date: "Ingrese fecha Valida"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatemedico").serialize();
				var formData = new FormData($("#updatemedico")[0]);
				var id= $("#updatemedico").attr("data-id");
		        var codmedico = id;
				
				$.ajax({
				type : 'POST',
				url  : 'formedico.php?codmedico='+codmedico,
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE CORREO YA SE ENCUENTRA REGISTRADO ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE MEDICO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='medicos'", 15000);
				
						
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE MEDICOS */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE MEDICOS EN SESSION */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updatemedicosession").validate({
      rules:
	  {
			identmedico: { required: true, },
			cedmedico: { required: true, digits : true  },
			tpmedico: { required: true,  },
			nommedico: { lettersonly: true, },
			apemedico : { lettersonly: true, },
			tlfmedico: { required: true, digits : true },
			sexomedico: { required: true, },
			correomedico: { required: true, email: true },
			direcmedico: { required: true, },
			moduloespec: { required: true, },
			especmedico: { required: true, },
			fnacmedico: { required: true, },
	   },
       messages:
	   {
            identmedico:{ required: "Por favor Seleccione" },
			cedmedico:{  required: "Ingrese N&deg; de Identificaci&oacute;n", digits: "Ingrese solo digitos"  },
			tpmedico:{  required: "Ingrese Tarjeta Profesional" },
			nommedico:{ required: "Ingrese su Nombre" },
			apemedico : { required : "Ingrese su Apellido"  },
			tlfmedico:{ required: "Ingrese Tel&eacute;fono", digits: "Ingrese solo digitos" },
			sexomedico:{  required: "Seleccione Sexo" },
			correomedico:{  required: "Ingrese su Email", email: "Ingrese un Email Valido" },
			direcmedico:{ required: "Ingrese Direcci&oacute;n Domiciliaria" },
			moduloespec: { required: "Seleccione M&oacute;dulo de Acceso" },
			especmedico: { required: "Seleccione Especialidad" },
			fnacmedico:{ required: "Ingrese Fecha Nacimiento", date: "Ingrese fecha Valida"  },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatemedicosession").serialize();
				var formData = new FormData($("#updatemedicosession")[0]);
				var id= $("#updatemedicosession").attr("data-id");
		        var codmedico = id;
				
				$.ajax({
				type : 'POST',
				url  : 'datos.php?codmedico='+codmedico,
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE CORREO YA SE ENCUENTRA REGISTRADO ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==3)

								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE MEDICO YA SE ENCUENTRA REGISTRADO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');						
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE MEDICOS EN SESSION */















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE CITAS MEDICAS */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#citas").validate({
      rules:
	  {
			valor: { required: true, },
			medicos: { required: true, },
			codsucursal: { required: true, },
			codmedico: { required: true, },
			motivocita: { required: true, },
			observacionescita: { required: true, },
			lectura: { required: true, },
			fechacita: { required: true, date : false },
			hour: { required: true },
	   },
       messages:
	   {
            valor:{ required: "Por favor realice la busqueda del Paciente" },
			medicos:{ required: "Por favor Seleccione M&eacute;dico" },
			codsucursal:{ required: "Por favor Seleccione Sucursal" },
			codmedico:{ required: "Por favor Seleccione M&eacute;dico" },
			motivocita:{ required: "Ingrese Motivo de Cita Medica" },
			observacionescita : { required : "Ingrese Observaciones de Cita Medica"  },
			lectura : { required : "Seleccione Lectura Rx"  },
			fechacita:{ required: "Ingrese Fecha de Cita", date: "Ingrese Fecha Valida"  },
			hour:{ required: "Ingrese Hora de Cita" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#citas").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forcitas.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL PACIENTE CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LA FECHA PARA LA CITA MEDICA NO PUEDE SER MENOR QUE LA ACTUAL, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LA HORA PARA LA CITA MEDICA NO PUEDE SER MENOR QUE LA ACTUAL, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==4)
								{
									
					    $("#error").fadeIn(1000, function(){
				
	                  $("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE MEDICO TIENE UNA CITA ASIGNADA PARA ESTA FECHA Y HORA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
								     });
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#citas")[0].reset();
						document.getElementById('codpaciente').value="";
						$("#muestrapacientecitas").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
										
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE CITAS MEDICAS */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CITAS MEDICAS */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updatecita").validate({
      rules:
	  {
			codmedico: { required: true, },
			codsucursal: { required: true, },
			motivocita: { required: true, },
			observacionescita: { required: true, },
			lectura: { required: true, },
			fechacita: { required: true, },
			horacita: { required: true, time : true },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor Seleccione M&eacute;dico" },
			codsucursal:{ required: "Por favor Seleccione Sucursal" },
			motivocita:{ required: "Ingrese Motivo de Cita M&eacute;dica" },
			observacionescita : { required : "Ingrese Observaciones de Cita Medica"  },
			lectura : { required : "Seleccione Lectura Rx"  },
			fechacita:{ required: "Ingrese Fecha de Cita", date: "Ingrese Fecha Valida"  },
			horacita:{ required: "Ingrese Hora de Cita", time: " Ingrese Hora Valida" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatecita").serialize();
		        var codcita = $('input#codcita').val();
		        var medico = $('input#medico').val();
		        var desde = $('input#desde').val();
		        var hasta = $('input#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'citasmedicas.php?codcita='+codcita,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL PACIENTE CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LA FECHA PARA LA CITA MEDICA NO PUEDE SER MENOR QUE LA FECHA DE INGRESO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LA HORA PARA LA CITA MEDICA NO PUEDE SER MENOR QUE LA ACTUAL, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==4)
								{
									
					    $("#error").fadeIn(1000, function(){
				
	                  $("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE MEDICO TIENE UNA CITA ASIGNADA PARA ESTA FECHA Y HORA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
								     });
								}
								
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
$("#muestracitasmedicas").load("funciones.php?BuscaCitasMedicas=si&codmedico="+medico+'&desde='+desde+'&hasta='+hasta);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
 					   setTimeout(function() { $("#update").html(""); }, 5000);
 				                       });
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CITAS MEDICAS */




















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE APERTURA DE HISTORIA CLINICA POR MEDICO GENERAL */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#apertura").validate({
      rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			enfermedadpaciente: { required: true,},
			antecedentepaciente: { required: true,},
			antecedentefamiliares: { required: true,},
			antecedentealergico: { required: true,},
			antecedentepatologico: { required: true,},
			antecedentequirurgico: { required: true,},
			antecedentefarmacologico: { required: true,},
			antecedenteginecologico: { required: true,},
			historialgestacional: { required: true,},
			planificacionfamiliar: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			enfermedadpaciente:{ required: "Ingrese Enfermedad del Paciente" },
			antecedentepaciente:{ required: "Ingrese Antecedentes Personales" },
			antecedentefamiliares:{ required: "Ingrese Antecedentes Familiares" },
			antecedentealergico:{ required: "Ingrese Antecedentes Alergicos" },
			antecedentepatologico:{ required: "Ingrese Antecedentes Patologicos" },
			antecedentequirurgico:{ required: "Ingrese Antecedentes Quirurgicos" },
			antecedentefarmacologico: { required: "Ingrese Antecedentes Farmacologicos" },
			antecedenteginecologico: { required: "Ingrese Antecedentes Ginecologicos" },
			historialgestacional: { required: "Ingrese Historial Gestacional" },
			planificacionfamiliar: { required: "Ingrese Planificaci&oacute;n Familiar" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#apertura").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forapertura.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else if(data==6)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA APERTURA MEDICA YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
$("#muestraapertura").load("funciones.php?BuscaApertura=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						//$("#apertura")[0].reset();
						//$("#muestraapertura").html(""); 
						$("#crearapertura").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */  
});

/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE APERTURA DE HISTORIA CLINICA POR MEDICO GENERAL */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE APERTURA DE HISTORIA CLINICA POR MEDICO GENERAL*/	 
	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateapertura").validate({
       rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			enfermedadpaciente: { required: true,},
			antecedentepaciente: { required: true,},
			antecedentefamiliares: { required: true,},
			antecedentealergico: { required: true,},
			antecedentepatologico: { required: true,},
			antecedentequirurgico: { required: true,},
			antecedentefarmacologico: { required: true,},
			antecedenteginecologico: { required: true,},
			historialgestacional: { required: true,},
			planificacionfamiliar: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			enfermedadpaciente:{ required: "Ingrese Enfermedad del Paciente" },
			antecedentepaciente:{ required: "Ingrese Antecedentes Personales" },
			antecedentefamiliares:{ required: "Ingrese Antecedentes Familiares" },
			antecedentealergico:{ required: "Ingrese Antecedentes Alergicos" },
			antecedentepatologico:{ required: "Ingrese Antecedentes Patologicos" },
			antecedentequirurgico:{ required: "Ingrese Antecedentes Quirurgicos" },
			antecedentefarmacologico: { required: "Ingrese Antecedentes Farmacologicos" },
			antecedenteginecologico: { required: "Ingrese Antecedentes Ginecologicos" },
			historialgestacional: { required: "Ingrese Historial Gestacional" },
			planificacionfamiliar: { required: "Ingrese Planificaci&oacute;n Familiar" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateapertura").serialize();
				var id= $("#updateapertura").attr("data-id");
		        var codapertura = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editapertura.php?a='+codapertura,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								} 
								
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
    					setTimeout("location.href='aperturas'", 15000);
				
				                     });
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE APERTURA DE HISTORIA CLINICA POR MEDICO GENERAL */

























/* FUNCION JQUERY PARA VALIDAR REGISTRO DE APERTURA DE HISTORIA CLINICA POR MEDICO GINECOLOGO */	  
	 $('document').ready(function()
{ 
     /* validation */
	 $("#aperturag").validate({
      rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			enfermedadpaciente: { required: true,},
			antecedentepaciente: { required: true,},
			antecedentefamiliares: { required: true,},
			antecedentealergico: { required: true,},
			antecedentepatologico: { required: true,},
			antecedentequirurgico: { required: true,},
			antecedentefarmacologico: { required: true,},
			antecedenteginecologico: { required: true,},
			historialgestacional: { required: true,},
			planificacionfamiliar: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			enfermedadpaciente:{ required: "Ingrese Enfermedad del Paciente" },
			antecedentepaciente:{ required: "Ingrese Antecedentes Personales" },
			antecedentefamiliares:{ required: "Ingrese Antecedentes Familiares" },
			antecedentealergico:{ required: "Ingrese Antecedentes Alergicos" },
			antecedentepatologico:{ required: "Ingrese Antecedentes Patologicos" },
			antecedentequirurgico:{ required: "Ingrese Antecedentes Quirurgicos" },
			antecedentefarmacologico: { required: "Ingrese Antecedentes Farmacologicos" },
			antecedenteginecologico: { required: "Ingrese Antecedentes Ginecologicos" },
			historialgestacional: { required: "Ingrese Historial Gestacional" },
			planificacionfamiliar: { required: "Ingrese Planificaci&oacute;n Familiar" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#aperturag").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'foraperturag.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else if(data==6)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA APERTURA MEDICA YA SE ENCUENTRA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
$("#muestraapertura").load("funciones.php?BuscaApertura=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearapertura").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */  
});

/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE APERTURA DE HISTORIA CLINICA POR MEDICO GINECOLOGO */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE APERTURA DE HISTORIA CLINICA POR MEDICO GINECOLOGO*/	 
	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateaperturag").validate({
       rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			enfermedadpaciente: { required: true,},
			antecedentepaciente: { required: true,},
			antecedentefamiliares: { required: true,},
			antecedentealergico: { required: true,},
			antecedentepatologico: { required: true,},
			antecedentequirurgico: { required: true,},
			antecedentefarmacologico: { required: true,},
			antecedenteginecologico: { required: true,},
			historialgestacional: { required: true,},
			planificacionfamiliar: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			enfermedadpaciente:{ required: "Ingrese Enfermedad del Paciente" },
			antecedentepaciente:{ required: "Ingrese Antecedentes Personales" },
			antecedentefamiliares:{ required: "Ingrese Antecedentes Familiares" },
			antecedentealergico:{ required: "Ingrese Antecedentes Alergicos" },
			antecedentepatologico:{ required: "Ingrese Antecedentes Patologicos" },
			antecedentequirurgico:{ required: "Ingrese Antecedentes Quirurgicos" },
			antecedentefarmacologico: { required: "Ingrese Antecedentes Farmacologicos" },
			antecedenteginecologico: { required: "Ingrese Antecedentes Ginecologicos" },
			historialgestacional: { required: "Ingrese Historial Gestacional" },
			planificacionfamiliar: { required: "Ingrese Planificaci&oacute;n Familiar" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateaperturag").serialize();
				var id= $("#updateaperturag").attr("data-id");
		        var codapertura = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editaperturag.php?a='+codapertura,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA APERTURAS MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA APERTURA MEDICAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								} 
								
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
    					setTimeout("location.href='aperturasg'", 15000);
				
				                     });
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE APERTURA DE HISTORIA CLINICA POR MEDICO GINECOLOGO */
















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE HOJA EVOLUTIVA POR MEDICO GENERAL */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#hojasevolutivas").validate({
      rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			atenproced: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			atenproced:{ required: "Ingrese Atencion o Procedimiento del Paciente" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#hojasevolutivas").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forhojaevolutiva.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestrahojaevolutiva").load("funciones.php?BuscaHojaEvolutiva=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearhojaevolutiva").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE HOJA EVOLUTIVA POR MEDICO GENERAL */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE HOJA EVOLUTIVA POR MEDICO GENERAL*/	
$('document').ready(function()
{ 
     /* validation */
	 $("#updatehojaev").validate({
       rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			atenproced: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			atenproced:{ required: "Ingrese Atencion o Procedimiento del Paciente" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatehojaev").serialize();
				var id= $("#updatehojaev").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'edithojaevolutiva.php?h='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								} 
								else {
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
    					setTimeout("location.href='hojaevolutiva'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE HOJA EVOLUTIVA POR MEDICO GENERAL */


















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE HOJA EVOLUTIVA POR MEDICO GINECOLOGO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#hojasevolutivasg").validate({
      rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			atenproced: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			atenproced:{ required: "Ingrese Atencion o Procedimiento del Paciente" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#hojasevolutivasg").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forhojaevolutivag.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestrahojaevolutiva").load("funciones.php?BuscaHojaEvolutiva=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearhojaevolutiva").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE HOJA EVOLUTIVA POR MEDICO GINECOLOGO */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE HOJA EVOLUTIVA POR MEDICO GINECOLOGO*/	
$('document').ready(function()
{ 
     /* validation */
	 $("#updatehojaevg").validate({
       rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			examenfisico: { required: true, },
			fechamestruacion: { required: true, },
			fechacitologia: { required: false, },
			embarazada: { required: true, },
			ta: { required: true, },
			temperatura: { required: true, },
			fc: { required: true, },
			fr: { required: true, },
			peso: { required: true, },
			atenproced: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			examenfisico:{ required: "Por favor Ingrese Examen Fisico" },
			fechamestruacion:{ required: "Ingrese Fecha Ultima Mestruaci&oacute;n", date: "Ingrese fecha Valida"  },
			fechacitologia:{ required: "Ingrese Fecha Ultima Citologia", date: "Ingrese fecha Valida"  },
			embarazada: { required: "Por favor Seleccione Embarazada" },
			ta:{ required: "Ingrese TA" },
			temperatura : { required : "Ingrese Temp"  },
			fc : { required : "Ingrese FC"  },
			fr:{ required: "Ingrese FR" },
			peso: { required: "Ingrese Peso" },
			atenproced:{ required: "Ingrese Atencion o Procedimiento del Paciente" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remision del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatehojaevg").serialize();
				var id= $("#updatehojaevg").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'edithojaevolutivag.php?h='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA HOJAS EVOLUTIVAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								} 
								else {
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
    					setTimeout("location.href='hojaevolutivag'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE HOJA EVOLUTIVA POR MEDICO GINECOLOGO */
















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE REMISIONES POR MEDICO GENERAL */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#remisiones").validate({
      rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#remisiones").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forremision.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								} 
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else {
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraremision").load("funciones.php?BuscaRemisiones=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearremisiones").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE REMISIONES POR MEDICO GENERAL */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE REMISIONES POR MEDICO GENERAL*/	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateremision").validate({
       rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateremision").serialize();
				var id= $("#updateremision").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editremision.php?r='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								} 
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});
								}   
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='remisiones'", 15000);
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});	 
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE REMISIONES POR MEDICO GENERAL */


















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE REMISIONES POR MEDICO GINECOLOGO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#remisionesg").validate({
      rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#remisionesg").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forremisiong.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								} 
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else {
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraremision").load("funciones.php?BuscaRemisiones=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearremisiones").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');

									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE REMISIONES POR MEDICO GINECOLOGO */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE REMISIONES POR MEDICO GINECOLOGO*/	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateremisiong").validate({
       rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateremisiong").serialize();
				var id= $("#updateremisiong").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editremisiong.php?r='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								} 
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA REMISIONES, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});
								}   
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='remisionesg'", 15000);
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});	 
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE REMISIONES POR MEDICO GINECOLOGO */












/* FUNCION JQUERY PARA VALIDAR REGISTRO DE FORMULAS MEDICAS POR MEDICO GENERAL */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#formulasmedicas").validate({
      rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#formulasmedicas").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forfmedica.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraformulamedica").load("funciones.php?BuscaFormulasMedicas=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearformulamedica").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */ 
});
/* FIN DE FUNCION PARA VALIDAR REGISTRO DE FORMULAS MEDICAS POR MEDICO GENERAL */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE FORMULAS MEDICAS POR MEDICO GENERAL*/
 $('document').ready(function()
{ 
     /* validation */
	 $("#updateformulamedica").validate({
       rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateformulamedica").serialize();
				var id= $("#updateformulamedica").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editfmedica.php?fm='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='formulasmedicas'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE FORMULAS MEDICAS POR MEDICO GENERAL */


















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE FORMULAS MEDICAS POR MEDICO GINECOLOGO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#formulasmedicasg").validate({
      rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#formulasmedicasg").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forfmedicag.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraformulamedica").load("funciones.php?BuscaFormulasMedicas=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearformulamedica").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */ 
});
/* FIN DE FUNCION PARA VALIDAR REGISTRO DE FORMULAS MEDICAS POR MEDICO GINECOLOGO */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE FORMULAS MEDICAS POR MEDICO GINECOLOGO*/
 $('document').ready(function()
{ 
     /* validation */
	 $("#updateformulamedicag").validate({
       rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateformulamedicag").serialize();
				var id= $("#updateformulamedicag").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editfmedicag.php?fm='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});

								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='formulasmedicasg'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE FORMULAS MEDICAS POR MEDICO GINECOLOGO */














/* FUNCION JQUERY PARA VALIDAR REGISTRO DE ORDENES MEDICAS POR MEDICO GENERAL */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#ordenesmedicas").validate({
      rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#ordenesmedicas").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'foromedica.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}   
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraordenmedica").load("funciones.php?BuscaOrdenesMedicas=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearordenmedica").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */ 
});
/* FIN DE FUNCION PARA VALIDAR REGISTRO DE ORDENES MEDICAS POR MEDICO GENERAL */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE ORDENES MEDICAS POR MEDICO GENERAL*/
 $('document').ready(function()
{ 
     /* validation */
	 $("#updateordenmedica").validate({
       rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateordenmedica").serialize();
				var id= $("#updateordenmedica").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editomedica.php?om='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});
								} 
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});

								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='ordenesmedicas'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE ORDENES MEDICAS POR MEDICO GENERAL */
















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE ORDENES MEDICAS POR MEDICO GINECOLOGO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#ordenesmedicasg").validate({
      rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#ordenesmedicasg").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'foromedicag.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}   
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraordenmedica").load("funciones.php?BuscaOrdenesMedicas=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearordenmedica").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */ 
});
/* FIN DE FUNCION PARA VALIDAR REGISTRO DE ORDENES MEDICAS POR MEDICO GINECOLOGO */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE ORDENES MEDICAS POR MEDICO GINECOLOGO*/
 $('document').ready(function()
{ 
     /* validation */
	 $("#updateordenmedicag").validate({
       rules:
	  {
			codmedico: { required: true, },
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para Orden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de Orden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateordenmedicag").serialize();
				var id= $("#updateordenmedicag").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editomedicag.php?om='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});
								} 
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-save"></span> Actualizar');
									});

								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='ordenesmedicasg'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE ORDENES MEDICAS POR MEDICO GINECOLOGO */











/* FUNCION JQUERY PARA VALIDAR REGISTRO DE FORMULAS DE TERAPIAS A PACIENTES */	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#formulasterapias").validate({
      rules:
	  {
			codmedico: { required: true, },
			terapiasrespiratorias: { required: false, digits : true },
			terapiasfisicas: { required: false, digits : true },
			micronebulizaciones: { required: false, digits : true },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor realice la b&uacute;squeda del M&eacute;dico" },
			terapiasrespiratorias:{ required: "", digits: "Ingrese solo digitos"},
			terapiasfisicas:{ required: "", digits: "Ingrese solo digitos"},
			micronebulizaciones:{ required: "", digits: "Ingrese solo digitos"},
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		

	   	        var data = $("#formulasterapias").serialize();
	   	        var valor1 = $('#terapiasrespiratorias').val();
	   	        var valor2 = $('#terapiasfisicas').val();
	   	        var valor3 = $('#micronebulizaciones').val();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
	
	 if (valor1=="" && valor2=="" && valor3=="") {
	 
	 alert('DEBE DE INGRESAR AL MENOS UN TIPO DE TERAPIA');
         
        return false;
	 
	  } else {      
				 
				$.ajax({
				
				type : 'POST',
				url  : 'forfterapia.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR DEBE DE REALIZAR LA BUSQUEDA DEL MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE UN REGISTRO EN EL DIA DE HOY, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}
								else{
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraformulaterapia").load("funciones.php?BuscaFormulasTerapias=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearformulaterapia").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									 	
									});
								}		
						   }
				});
				return false;
				}
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE FORMULAS DE TERAPIAS A PACIENTES */

/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE FORMULAS DE TERAPIAS A PACIENTES */	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateformulasterapias").validate({
       rules:
	  {
			codmedico: { required: true, },
			terapiasrespiratorias: { required: false, digits : true },
			terapiasfisicas: { required: false, digits : true },
			micronebulizaciones: { required: false, digits : true },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor realice la b&uacute;squeda del M&eacute;dico" },
			terapiasrespiratorias:{ required: "", digits: "Ingrese solo digitos"},
			terapiasfisicas:{ required: "", digits: "Ingrese solo digitos"},
			micronebulizaciones:{ required: "", digits: "Ingrese solo digitos"},
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
	
	var data = $("#updateformulasterapias").serialize();
	var id= $("#updateformulasterapias").attr("data-id");
	var codfterapia = id;		
	var valor1 = $('#terapiasrespiratorias').val();
	var valor2 = $('#terapiasfisicas').val();
	var valor3 = $('#micronebulizaciones').val();
	
	 if (valor1=="" && valor2=="" && valor3=="") {
	 
	 alert('DEBE DE INGRESAR AL MENOS UN TIPO DE TERAPIA');
         
        return false;
	 
	  } else {      
				
				$.ajax({
				
				type : 'POST',
				url  : 'editfterapia.php?ft='+codfterapia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR DEBE DE REALIZAR LA BUSQUEDA DEL MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else{
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
    					setTimeout("location.href='formulasterapias'", 15000);
				});
								}
						   }
				});
				return false;
				}
		}
	   /* form submit */ 
});	 
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE FORMULAS DE TERAPIAS A PACIENTES */















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE SOLICITUD DE EXAMENES POR MEDICO GENERAL */	  
	 $('document').ready(function()
{ 
     /* validation */
	 $("#examenes").validate({
      rules:
	  {
			codmedico: { required: true, },
			examen: { required: true, },
	   },
       messages:
	   {
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			examen:{ required: "Por favor realice la b&uacute;squeda del Dx" },           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
	var data = $("#examenes").serialize();
	var codmedico = $('#codmedico').val();
	var desde = $('#desde').val();
	var hasta = $('#hasta').val();
	var idcie = $('#idcie').val();
				
	 if (idcie=="") {
	            
				$("#examen").focus();
				$('#examen').val("");
				$('#examen').css('border-color','#0D89F1');
				alert('POR FAVOR REALICE LA BUSQUEDA DE DX CORRECTAMENTE');
         
        return false;
	
	//if ($('input[type=checkbox]').is(':checked')) { // Se puede cambiar por una clase $(".checks").is(":checked")
	} else if ($('input[type=checkbox]:checked').length === 0) {
	 
	 alert('DEBE DE SELECCIONAR AL MENOS UN TIPO DE EXAMEN A SOLICITAR');
         
        return false;
	 
	  } else {      
				 
				$.ajax({
				
				type : 'POST',
				url  : 'forexamenes.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}   
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DE DX CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA REALIZO UNA SOLICITUD PARA EXAMENES MEDICOS EL DIA DE HOY, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}
								else{
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestrasolicitudexamen").load("funciones.php?BuscaSolicitudExamen=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearsolicitudexamen").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								}		
						   }
				});
				return false;
				}
		}
	   /* form submit */ 
});
/* FIN DE FUNCION PARA VALIDAR REGISTRO DE SOLICITUD DE EXAMENES POR MEDICO GENERAL */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE SOLICITUD DE EXAMENES POR MEDICO GENERAL*/	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updateexamen").validate({
       rules:
	  {
			codmedico: { required: true, },
			examen: { required: true, },
	   },
       messages:
	   {
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			examen:{ required: "Por favor realice la b&uacute;squeda del Dx" },           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateexamen").serialize();
				var id= $("#updateexamen").attr("data-id");
		        var codexamen = id;
				var idcie = $('#idcie').val();
				
	 if (idcie=="") {
	            
				$("#examen").focus();
				$('#examen').val("");
				$('#examen').css('border-color','#0D89F1');
				alert('POR FAVOR REALICE LA BUSQUEDA DE DX CORRECTAMENTE');
         
        return false;
	
	//if ($('input[type=checkbox]').is(':checked')) { // Se puede cambiar por una clase $(".checks").is(":checked")
	} else if ($('input[type=checkbox]:checked').length === 0) {
	 
	 alert('DEBE DE SELECCIONAR AL MENOS UN TIPO DE EXAMEN A SOLICITAR');
         
        return false;
	 
	  } else {
				
				$.ajax({
				
				type : 'POST',
				url  : 'editexamenes.php?se='+codexamen,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
								$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DE DX CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA REALIZO UNA SOLICITUD PARA EXAMENES MEDICOS EL DIA DE HOY, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else{
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					   setTimeout("location.href='examenes'", 15000);
				                    });
							  }
						   }
				});
				return false;
				}
		}
	   /* form submit */   
});	 
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE SOLICITUD DE EXAMENES POR MEDICO GENERAL */



































/* FUNCION JQUERY PARA VALIDAR REGISTRO DE CRIOCAUTERIZACION */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#criocauterizacion").validate({
      rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			atenproced: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			atenproced:{ required: "Ingrese Atenci&oacute;n o Procedimiento del Paciente" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#criocauterizacion").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forcriocauterizacion.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								} 
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});

								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestracriocauterizacion").load("funciones.php?BuscaCriocauterizacion=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearcriocauterizacion").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE CRIOCAUTERIZACION */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CRIOCAUTERIZACION*/	
$('document').ready(function()
{ 
     /* validation */
	 $("#updatecriocauterizacion").validate({
       rules:
	  {
			codmedico: { required: true, },
			motivoconsulta: { required: true, },
			atenproced: { required: true,},
			presuntivo: { required: true,},
			observacionpresuntivo: { required: true,},
			origenenfermedad: { required: true,},
			definitivo: { required: true,},
			observaciondefinitivo: { required: true,},
			tratamiento: { required: true,},
			remision: { required: true,},
			formula: { required: true,},
			formulamedica: { required: true,},
			ordenes: { required: true,},
			ordenmedica: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			motivoconsulta:{ required: "Por favor Ingrese Motivo de Consulta" },
			atenproced:{ required: "Ingrese Atenci&oacute;n o Procedimiento del Paciente" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			observacionpresuntivo: { required: "Ingrese Observaci&oacute;n de Dx Presuntivo" },
			origenenfermedad: { required: "Seleccione Origen de Enfermedad" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			observaciondefinitivo: { required: "Ingrese Observaci&oacute;n de Dx Definitivo" },
			tratamiento: { required: "Ingrese Conducta o Tratamiento" },
			remision: { required: "Ingrese Remisi&oacute;n del Paciente" },
			formula: { required: "Ingrese Dx para F&oacute;rmula M&eacute;dica" },
			formulamedica: { required: "Ingrese Observaci&oacute;n de F&oacute;rmula M&eacute;dica" },
			ordenes: { required: "Ingrese Dx para &Oacute;rden M&eacute;dica" },
			ordenmedica: { required: "Ingrese Observaci&oacute;n de &Oacute;rden M&eacute;dica" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatecriocauterizacion").serialize();
				var id= $("#updatecriocauterizacion").attr("data-id");
		        var codprocedimiento = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editcriocauterizacion.php?c='+codprocedimiento,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}  
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR FORMULAS MEDICAS REPETIDAS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR ORDENES MEDICAS REPETIDAS PARA CRIOCAUTERIZACION, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								} 
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='criocauterizacion'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CRIOCAUTERIZACION */















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE COLPOSCOPIAS DE PACIENTES */	 
    $('document').ready(function()
{ 
     /* validation */
	 $("#colposcopias").validate({
      rules:
	  {
			codmedico: { required: true, },
			impresiondiagnostica: { required: true, },
			observacionesimpresion:{  required: true, },
			otros: { required: true, },
			biopsia: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			impresiondiagnostica:{ required: "Requerido" },
			observacionesimpresion : { required : "Ingrese Observaci&oacute;n"  },
			otros:{  required: "Ingrese Otros"  },
			biopsia:{  required: "Ingrese Sitio de la Biopsia"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#colposcopias").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forcolposcopia.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> EL PACIENTE TIENE UNA COLPOSCOPIA ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestracolposcopias").load("funciones.php?BuscaColposcopia=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearcolposcopias").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE COLPOSCOPIAS DE PACIENTES */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE COLPOSCOPIAS DE PACIENTES */	 
     $('document').ready(function()
{ 
     /* validation */
	 $("#updatecolposcopia").validate({
      rules:
	  {
			codmedico: { required: true, },
			impresiondiagnostica: { required: true, },
			observacionesimpresion:{  required: true, },
			otros: { required: true, },
			biopsia: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			impresiondiagnostica:{ required: "Requerido" },
			observacionesimpresion : { required : "Ingrese Observaci&oacute;n"  },
			otros:{  required: "Ingrese Otros"  },
			biopsia:{  required: "Ingrese Sitio de la Biopsia"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatecolposcopia").serialize();
				var id= $("#updatecolposcopia").attr("data-id");
		        var codcolposcopia = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editcolposcopia.php?co='+codcolposcopia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='colposcopias'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
 /* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE COLPOSCOPIAS DE PACIENTES */

















/* FUNCION JQUERY PARA VALIDAR REGISTRO DE ECOGRAFIAS DE PACIENTES */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#ecografias").validate({
      rules:
	  {
			codmedico: { required: true, },
			procedimientoecografia: { required: true, },
			observacionecografia: { required: true, },
			imagenes: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			procedimientoecografia:{  required: "Ingrese Procedimiento de Ecograf&iacute;a" },
			observacionecografia:{  required: "Ingrese Observaci&eacute;n de Ecograf&iacute;a" },
			imagenes:{  required: "Por favor seleccione imagen" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#ecografias").serialize();
				var formData = new FormData($("#ecografias")[0]);
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				type : 'POST',
				url  : 'forecografia.php',
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS ARCHIVOS CARGADOS NO SON IMAGENES ACEPTADAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE TIENE UNA ECOGRAFIA REGISTRADA ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraecografia").load("funciones.php?BuscaEcografia=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearecografia").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE ECOGRAFIAS DE PACIENTES */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE ECOGRAFIAS DE PACIENTES */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updateecografia").validate({
      rules:
	  {
			codmedico: { required: true, },
			procedimientoecografia: { required: true, },
			observacionecografia: { required: true, },
			imagenes: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			procedimientoecografia:{  required: "Ingrese Procedimiento de Ecograf&iacute;a" },
			observacionecografia:{  required: "Ingrese Observaci&eacute;n de Ecograf&iacute;a" },
			imagenes:{  required: "Por favor seleccione imagen" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateecografia").serialize();
				var formData = new FormData($("#updateecografia")[0]);
				var id= $("#updateecografia").attr("data-id");
		        var codecografia = id;
				
				$.ajax({
				type : 'POST',
				url  : 'editecografia.php?ec='+codecografia,
				data : formData,
				//necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS ARCHIVOS CARGADOS NO SON IMAGENES ACEPTADAS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								
								else if(data==3)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE TIENE UNA ECOGRAFIA REGISTRADA ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='ecografias'", 15000);
				
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE ECOGRAFIAS DE PACIENTES */








































/* FUNCION JQUERY PARA VALIDAR REGISTRO DE EXAMENES DE LABORATORIO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#laboratorio").validate({
      rules:
	  {
			codmedico: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
	var data = $("#laboratorio").serialize();
	
	var valor1 = $('#hematocrito').val();
	var valor2 = $('#hemoglobina').val();
	var valor3 = $('#leucocitos').val();
	var valor4 = $('#neutrofilos').val();
	var valor5 = $('#linfocitos').val();
	var valor6 = $('#eosinofilos').val();
	var valor7 = $('#monositos').val();
	var valor8 = $('#basofilos').val();
	var valor9 = $('#cayados').val();
	var valor10 = $('#plaquetas').val();
	var valor11 = $('#reticulositos').val();
	var valor12 = $('#vsg').val();
	var valor13 = $('#pt').val();
	var valor14 = $('#ptt').val();
	var valor15 = $('#clasifgrupo').val();
	var valor16 = $('#clasifrh').val();
	var valor17 = $('#observacioneshematologia').val();
	var valor18 = $('#glucosa').val();
	var valor19 = $('#colesteroltotal').val();
	var valor20 = $('#colesterolhdl').val();
	var valor21 = $('#colesterolldl').val();
	var valor22 = $('#trigliceridos').val();
	var valor23 = $('#acidourico').val();
	var valor24 = $('#nitrogenoureico').val();
	var valor25 = $('#creatinina').val();
	var valor26 = $('#proteinastotales').val();
	var valor27 = $('#albumina').val();
	var valor28 = $('#globulina').val();
	var valor29 = $('#bilirrubinatotal').val();
	var valor30 = $('#bilirrubinadirecta').val();
	var valor31 = $('#bilirrubinaindirecta').val();
	var valor32 = $('#fosfatasaalcalina').val();
	var valor33 = $('#tgo').val();
	var valor34 = $('#tgp').val();
	var valor35 = $('#amilasa').val();
	var valor36 = $('#observacionesquimica').val();
	var valor37 = $('#colorquimico').val();
	var valor38 = $('#aspectoquimico').val();
	var valor39 = $('#phquimico').val();
	var valor40 = $('#densidadquimico').val();
	var valor41 = $('#proteinaquimico').val();
	var valor42 = $('#glucosaquimico').val();
	var valor43 = $('#cetonaquimico').val();
	var valor44 = $('#bilirrubinaquimico').val();
	var valor45 = $('#urobilinogenoquimico').val();
	var valor46 = $('#sangrequimico').val();
	var valor47 = $('#leucocitosquimico').val();
	var valor48 = $('#nitritosquimico').val();
	var valor49 = $('#celulasepibajas').val();
	var valor50 = $('#celulasepialtas').val();
	var valor51 = $('#bacteriasmicroscopico').val();
	var valor52 = $('#leucocitosmicroscopico').val();
	var valor53 = $('#hematiesmicroscopico').val();
	var valor54 = $('#cristalesmicroscopico').val();
	var valor55 = $('#cilindrosmicroscopico').val();
	var valor56 = $('#mocomicroscopico').val();
	var valor57 = $('#observacionessanguinea').val();
	var valor58 = $('#pruebaembarazo').val();
	var valor59 = $('#rprsisfilis').val();
	var valor60 = $('#ratest').val();
	var valor61 = $('#astos').val();
	var valor62 = $('#observacionesinmunologia').val();
	var valor63 = $('#phfresco').val();
	var valor64 = $('#celulasfresco').val();
	var valor65 = $('#testaminafresco').val();
	var valor66 = $('#hongosfresco').val();
	var valor67 = $('#trichomonafresco').val();
	var valor68 = $('#leucitofresco').val();
	var valor69 = $('#hematiesfresco').val();
	var valor70 = $('#basilosgranpositivo').val();
	var valor71 = $('#basilosgrannegativo').val();
	var valor72 = $('#cocobacilogran').val();
	var valor73 = $('#diplococogran').val();
	var valor74 = $('#blastoconidiasgran').val();
	var valor75 = $('#pseudomiceliogran').val();
	var valor76 = $('#pmngran').val();
	var valor77 = $('#observacionesfrotis').val();
	var valor78 = $('#colorparasitologia').val();
	var valor79 = $('#consistenciaparasitologia').val();
	var valor80 = $('#phparasitologia').val();
	var valor81 = $('#sangreocultaparasitologia').val();
	var valor82 = $('#azucaresparasitologia').val();
	var valor83 = $('#almidonesparasitologia').val();
	var valor84 = $('#hongosparasitologia').val();
	var valor85 = $('#trichomonaparasitologia').val();
	var valor86 = $('#iodamoebaparasitologia').val();
	var valor87 = $('#otrosparasitologia').val();
	var valor88 = $('#kohmicro').val();
	var valor89 = $('#baciloscopiamicro').val();
	var codmedico = $('#codmedico').val();
	var desde = $('#desde').val();
	var hasta = $('#hasta').val();
	
	
 if (valor1=="" && valor2=="" && valor3=="" && valor4=="" && valor5=="" && valor6=="" && valor7=="" && valor8=="" && valor9=="" && valor10=="" && valor11=="" && valor12=="" && valor13=="" && valor14=="" && valor15=="" && valor16=="" && valor17=="" && valor18=="" && valor19=="" && valor20=="" && valor21=="" && valor22=="" && valor23=="" && valor24=="" && valor25=="" && valor26=="" && valor27=="" && valor28=="" && valor29=="" && valor30=="" && valor31=="" && valor32=="" && valor33=="" && valor34=="" && valor35=="" && valor36=="" && valor37=="" && valor38=="" && valor39=="" && valor40=="" && valor41=="" && valor42=="" && valor43=="" && valor44=="" && valor45=="" && valor46=="" && valor47=="" && valor48=="" && valor49=="" && valor50=="" && valor51=="" && valor52=="" && valor53=="" && valor54=="" && valor55=="" && valor56=="" && valor57=="" && valor58=="" && valor59=="" && valor60=="" && valor61=="" && valor62=="" && valor63=="" && valor64=="" && valor65=="" && valor66=="" && valor67=="" && valor68=="" && valor69=="" && valor70=="" && valor71=="" && valor72=="" && valor73=="" && valor74=="" && valor75=="" && valor76=="" && valor77=="" && valor78=="" && valor79=="" && valor80=="" && valor81=="" && valor82=="" && valor83=="" && valor84=="" && valor85=="" && valor86=="" && valor87=="" && valor88=="" && valor89=="") {
	 
	 alert('DEBE DE INGRESAR AL MENOS UN TIPO DE EXAMEN DE LABORATORIO');
         
        return false;
	 
	  } else {      
				 
				$.ajax({
				
				type : 'POST',
				url  : 'forlaboratorio.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR DEBE DE REALIZAR LA BUSQUEDA DEL MEDICO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE UN REGISTRO EN EL DIA DE HOY, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestralaboratorio").load("funciones.php?BuscaLaboratorio=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearlaboratorio").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
								}		
						   }
				});
				return false;
				}
		}
	   /* form submit */	 
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE EXAMENES DE LABORATORIO */



/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE EXAMENES DE LABORATORIO */	 
$('document').ready(function()
{ 
     /* validation */
	 $("#updatelaboratorio").validate({
       rules:
	  {
			codpaciente: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
	
	var data = $("#updatelaboratorio").serialize();
	var id= $("#updatelaboratorio").attr("data-id");
	var codlaboratorio = id;	
	
	
	var valor1 = $('#hematocrito').val();
	var valor2 = $('#hemoglobina').val();
	var valor3 = $('#leucocitos').val();
	var valor4 = $('#neutrofilos').val();
	var valor5 = $('#linfocitos').val();
	var valor6 = $('#eosinofilos').val();
	var valor7 = $('#monositos').val();
	var valor8 = $('#basofilos').val();
	var valor9 = $('#cayados').val();
	var valor10 = $('#plaquetas').val();
	var valor11 = $('#reticulositos').val();
	var valor12 = $('#vsg').val();
	var valor13 = $('#pt').val();
	var valor14 = $('#ptt').val();
	var valor15 = $('#clasifgrupo').val();
	var valor16 = $('#clasifrh').val();
	var valor17 = $('#observacioneshematologia').val();
	var valor18 = $('#glucosa').val();
	var valor19 = $('#colesteroltotal').val();
	var valor20 = $('#colesterolhdl').val();
	var valor21 = $('#colesterolldl').val();
	var valor22 = $('#trigliceridos').val();
	var valor23 = $('#acidourico').val();
	var valor24 = $('#nitrogenoureico').val();
	var valor25 = $('#creatinina').val();
	var valor26 = $('#proteinastotales').val();
	var valor27 = $('#albumina').val();
	var valor28 = $('#globulina').val();
	var valor29 = $('#bilirrubinatotal').val();
	var valor30 = $('#bilirrubinadirecta').val();
	var valor31 = $('#bilirrubinaindirecta').val();
	var valor32 = $('#fosfatasaalcalina').val();
	var valor33 = $('#tgo').val();
	var valor34 = $('#tgp').val();
	var valor35 = $('#amilasa').val();
	var valor36 = $('#observacionesquimica').val();
	var valor37 = $('#colorquimico').val();
	var valor38 = $('#aspectoquimico').val();
	var valor39 = $('#phquimico').val();
	var valor40 = $('#densidadquimico').val();
	var valor41 = $('#proteinaquimico').val();
	var valor42 = $('#glucosaquimico').val();
	var valor43 = $('#cetonaquimico').val();
	var valor44 = $('#bilirrubinaquimico').val();
	var valor45 = $('#urobilinogenoquimico').val();
	var valor46 = $('#sangrequimico').val();
	var valor47 = $('#leucocitosquimico').val();
	var valor48 = $('#nitritosquimico').val();
	var valor49 = $('#celulasepibajas').val();
	var valor50 = $('#celulasepialtas').val();
	var valor51 = $('#bacteriasmicroscopico').val();
	var valor52 = $('#leucocitosmicroscopico').val();
	var valor53 = $('#hematiesmicroscopico').val();
	var valor54 = $('#cristalesmicroscopico').val();
	var valor55 = $('#cilindrosmicroscopico').val();
	var valor56 = $('#mocomicroscopico').val();
	var valor57 = $('#observacionessanguinea').val();
	var valor58 = $('#pruebaembarazo').val();
	var valor59 = $('#rprsisfilis').val();
	var valor60 = $('#ratest').val();
	var valor61 = $('#astos').val();
	var valor62 = $('#observacionesinmunologia').val();
	var valor63 = $('#phfresco').val();
	var valor64 = $('#celulasfresco').val();
	var valor65 = $('#testaminafresco').val();
	var valor66 = $('#hongosfresco').val();
	var valor67 = $('#trichomonafresco').val();
	var valor68 = $('#leucitofresco').val();
	var valor69 = $('#hematiesfresco').val();
	var valor70 = $('#basilosgranpositivo').val();
	var valor71 = $('#basilosgrannegativo').val();
	var valor72 = $('#cocobacilogran').val();
	var valor73 = $('#diplococogran').val();
	var valor74 = $('#blastoconidiasgran').val();
	var valor75 = $('#pseudomiceliogran').val();
	var valor76 = $('#pmngran').val();
	var valor77 = $('#observacionesfrotis').val();
	var valor78 = $('#colorparasitologia').val();
	var valor79 = $('#consistenciaparasitologia').val();
	var valor80 = $('#phparasitologia').val();
	var valor81 = $('#sangreocultaparasitologia').val();
	var valor82 = $('#azucaresparasitologia').val();
	var valor83 = $('#almidonesparasitologia').val();
	var valor84 = $('#hongosparasitologia').val();
	var valor85 = $('#trichomonaparasitologia').val();
	var valor86 = $('#iodamoebaparasitologia').val();
	var valor87 = $('#otrosparasitologia').val();
	var valor88 = $('#kohmicro').val();
	var valor89 = $('#baciloscopiamicro').val();
	
	
 if (valor1=="" && valor2=="" && valor3=="" && valor4=="" && valor5=="" && valor6=="" && valor7=="" && valor8=="" && valor9=="" && valor10=="" && valor11=="" && valor12=="" && valor13=="" && valor14=="" && valor15=="" && valor16=="" && valor17=="" && valor18=="" && valor19=="" && valor20=="" && valor21=="" && valor22=="" && valor23=="" && valor24=="" && valor25=="" && valor26=="" && valor27=="" && valor28=="" && valor29=="" && valor30=="" && valor31=="" && valor32=="" && valor33=="" && valor34=="" && valor35=="" && valor36=="" && valor37=="" && valor38=="" && valor39=="" && valor40=="" && valor41=="" && valor42=="" && valor43=="" && valor44=="" && valor45=="" && valor46=="" && valor47=="" && valor48=="" && valor49=="" && valor50=="" && valor51=="" && valor52=="" && valor53=="" && valor54=="" && valor55=="" && valor56=="" && valor57=="" && valor58=="" && valor59=="" && valor60=="" && valor61=="" && valor62=="" && valor63=="" && valor64=="" && valor65=="" && valor66=="" && valor67=="" && valor68=="" && valor69=="" && valor70=="" && valor71=="" && valor72=="" && valor73=="" && valor74=="" && valor75=="" && valor76=="" && valor77=="" && valor78=="" && valor79=="" && valor80=="" && valor81=="" && valor82=="" && valor83=="" && valor84=="" && valor85=="" && valor86=="" && valor87=="" && valor88=="" && valor89=="") {
	 
	 alert('DEBE DE INGRESAR AL MENOS UN TIPO DE EXAMEN DE LABORATORIO');
         
        return false;
	 
	  } else {      
				
				$.ajax({
				
				type : 'POST',
				url  : 'editlaboratorio.php?l='+codlaboratorio,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR LOS CAMPOS NO PUEDEN IR EN BLANCO, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
																				
								}  
								
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
 					    setTimeout("location.href='laboratorio'", 15000);
				
				});
								}
						   }
				});
				return false;
				}
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE EXAMENES DE LABORATORIO */




































/* FUNCION JQUERY PARA VALIDAR REGISTRO DE LECTURAS RX */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#radiologia").validate({
      rules:
	  {
			codmedico: { required: true, },
			tipoestudiorx: { required: true, },
			diagnosticorx: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			tipoestudiorx:{ required: "Ingrese Tipo de Estudio" },
			diagnosticorx:{ required: "Ingrese Diagn&oacute;stico para Lectura Rx" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#radiologia").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forlecturarx.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR DEBE DE SELECCIONAR EL PACIENTE PARA CREAR LECTURA RX </div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
																				
								}  
								
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA LECTURA RX YA SE ENCUENTA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraradiologia").load("funciones.php?BuscaRadiologia=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearradiologia").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE LECTURAS RX */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE LECTURAS RX */	 

	 $('document').ready(function()
{ 
     /* validation */
	 $("#updatelecturarx").validate({
       rules:
	  {
			codmedico: { required: true, },
			tipoestudiorx: { required: true, },
			diagnosticorx: { required: true, },
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			tipoestudiorx:{ required: "Ingrese Tipo de Estudio" },
			diagnosticorx:{ required: "Ingrese Diagn&oacute;stico para Lectura Rx" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatelecturarx").serialize();
				var id= $("#updatelecturarx").attr("data-id");
		        var codrx = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editlecturarx.php?le='+codrx,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}  
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA LECTURA RX YA SE ENCUENTA REGISTRADA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
									});
								}
								else{
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
     					setTimeout("location.href='lecturasrx'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */
});
/* FIN DE  FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE LECTURAS RX */





























/* FUNCION JQUERY PARA VALIDAR REGISTRO DE NUEVAS TERAPIAS A PACIENTES */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#terapias").validate({
      rules:
	  {
			codmedico: { required: true, },
			diagnosticoterapia: { required: true,},
			tratamientoterapia: { required: true,},
			fechaterapia: { required: true, date: false },
			horaterapia: { required: true, time : true },
			atencionterapia: { required: true,},
			observacionesterapia: { required: false,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			diagnosticoterapia: { required: "Ingrese Diagn&oacute;stico de Terapias" },
			tratamientoterapia: { required: "Ingrese Tratamiento de Terapias" },
			fechaterapia:{ required: "Ingrese Fecha de Terapia", date: "Ingrese Fecha Valida"  },
			horaterapia:{ required: "Ingrese Hora de Terapia", time: " Ingrese Hora Valida" },
			atencionterapia: { required: "Ingrese Atenci&oacute;n o Tratamiento de Terapias" },
			observacionesterapia: { required: "Ingrese Observaci&oacute;n de Terapias" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#terapias").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forterapias.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LAS FECHAS ASIGNADAS A TERAPIAS NO DEBEN DE COINCIDIR, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA TERAPIA YA EXISTE REGISTRADA ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UNA TERAPIA ASIGNADA A ESTA FECHA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
									$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
					    $("#muestraterapia").load("funciones.php?BuscaTerapia=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearterapia").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE NUEVAS TERAPIAS A PACIENTES */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE TERAPIAS A PACIENTES */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updateterapia").validate({
      rules:
	  {
			codmedico: { required: true, },
			diagnosticoterapia: { required: true,},
			tratamientoterapia: { required: true,},
			fechaterapia: { required: true, date: false },
			horaterapia: { required: true, time : true },
			atencionterapia: { required: true,},
			observacionesterapia: { required: false,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			diagnosticoterapia: { required: "Ingrese Diagn&oacute;stico de Terapias" },
			tratamientoterapia: { required: "Ingrese Tratamiento de Terapias" },
			fechaterapia:{ required: "Ingrese Fecha de Terapia", date: "Ingrese Fecha Valida"  },
			horaterapia:{ required: "Ingrese Hora de Terapia", time: " Ingrese Hora Valida" },
			atencionterapia: { required: "Ingrese Atenci&oacute;n o Tratamiento de Terapias" },
			observacionesterapia: { required: "Ingrese Observaci&oacute;n de Terapias" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateterapia").serialize();
				var id= $("#updateterapia").attr("data-id");
		        var codterapia = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editterapia.php?t='+codterapia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								} 
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LAS FECHAS ASIGNADAS A TERAPIAS NO DEBEN DE COINCIDIR, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTA TERAPIA YA EXISTE REGISTRADA ACTUALMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EXISTE UNA TERAPIA ASIGNADA A ESTA FECHA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
									$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}  
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					     setTimeout("location.href='terapias'", 15000);
				
				});
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE TERAPIAS A PACIENTES */

































/* FUNCION JQUERY PARA VALIDAR REGISTRO DE CONSULTAS ODONTOLOGICAS A PACIENTES */	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#odontologia").validate({
      rules:
	  {
			codmedico: { required: true, },
			ultimavisitaodontologia: { required: false, date: false },
			observacionperiodontal: { required: true,},
			observacionexamendental: { required: true,},
			presuntivo: { required: true,},
			definitivo: { required: true,},
			pronostico: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			ultimavisitaodontologia:{ required: "Ingrese Fecha Ultima Odontologia", date: "Ingrese fecha Valida"  },
			observacionperiodontal: { required: "Ingrese Observaciones de Estado Periodontal" },
			observacionexamendental: { required: "Ingrese Observaciones de Examen Dental" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			pronostico: { required: "Ingrese Pron&oacute;stico de Paciente" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#odontologia").serialize();
				var codmedico = $('#codmedico').val();
				var desde = $('#desde').val();
				var hasta = $('#hasta').val();
				var estados = $('#estados').val();
				var procedimiento = $('#procedimiento').val();
	
	       if (estados=="" && procedimiento=="0") {
	            
				alert("DEBE DE AGREGAR REFERENCIAS DE ODONTOGRAMA AL PACIENTE");
         
        return false;
	 
	  } else {
				
				$.ajax({
				
				type : 'POST',
				url  : 'forodontologia.php',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> POR FAVOR REALICE LA BUSQUEDA DEL MEDICO CORRECTAMENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> DEBE DE SELECCIONAR ALGUNA DE LAS OPCIONES PARA EL PLAN DE TRATAMIENTO AL PACIENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}  
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> DEBE DE AGREGAR REFERENCIAS AL ODONTOGRAMA PARA LA NUEVA HISTORIA ODONTOLOGICA !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA ODONTOLOGIA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA ODONTOLOGIA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==6){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> YA EL PACIENTE TIENE UNA CONSULTA ODONTOLOGICA PARA LA FECHA ACTUAL, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
$("#muestraodontologia").load("funciones.php?BuscaOdontologia=si&codmedico="+codmedico+'&desde='+desde+'&hasta='+hasta);
						$("#crearodontologia").html("");
						setTimeout(function() { $("#error").html(""); }, 25000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
						
									});
								}
						   }
				});
				return false;
			  }
		}
	   /* form submit */	   
});
/*  FIN DE FUNCION PARA VALIDAR REGISTRO DE CONSULTAS ODONTOLOGICAS A PACIENTES */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONSULTAS ODONTOLOGICAS A PACIENTES */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updateodontologia").validate({
     rules:
	  {
			codmedico: { required: true, },
			ultimavisitaodontologia: { required: false, date: false },
			observacionperiodontal: { required: true,},
			observacionexamendental: { required: true,},
			presuntivo: { required: true,},
			definitivo: { required: true,},
			pronostico: { required: true,},
			plantratamiento: { required: true,},
	   },
       messages:
	   {
            codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			ultimavisitaodontologia:{ required: "Ingrese Fecha Ultima Odontologia", date: "Ingrese fecha Valida"  },
			observacionperiodontal: { required: "Ingrese Observaciones de Estado Periodontal" },
			observacionexamendental: { required: "Ingrese Observaciones de Examen Dental" },
			presuntivo: { required: "Ingrese Dx Presuntivo" },
			definitivo: { required: "Ingrese Dx Definitivo" },
			pronostico: { required: "Ingrese Pron&oacute;stico de Paciente" },
			plantratamiento: { required: "Ingrese Atenci&oacute;n/Actividad y/o Procedimiento de Paciente" },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updateodontologia").serialize();
				var id= $("#updateodontologia").attr("data-id");
		        var cododontologia = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editodontologia.php?od='+cododontologia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-update").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}  
								else if(data==2){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> DEBE DE SELECCIONAR ALGUNA DE LAS OPCIONES PARA EL PLAN DE TRATAMIENTO AL PACIENTE, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==3){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> DEBE DE AGREGAR REFERENCIAS AL ODONTOGRAMA PARA LA NUEVA HISTORIA ODONTOLOGICA !</div></center>');
											
										$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==4){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX PRESUNTIVOS REPETIDOS PARA ODONTOLOGIA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else if(data==5){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> NO DEBE DE EXISTIR DX DEFINITIVOS REPETIDOS PARA ODONTOLOGIA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
											$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='odontologia'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE CONSULTAS ODONTOLOGICAS A PACIENTES */


/* FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE HOJAS EVOLUTIVAS DE CONSULTAS ODONTOLOGICAS A PACIENTES */	 
	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#updatehojaodontologia").validate({
     rules:
	  {
			plantratamiento: { required: true,},
	   },
       messages:
	   {
            plantratamiento: { required: "Ingrese Atenci&oacute;n/Actividad y/o Procedimiento de Paciente" },
           
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				var data = $("#updatehojaodontologia").serialize();
				var id= $("#updatehojaodontologia").attr("data-id");
		        var cododontologia = id;
				
				$.ajax({
				
				type : 'POST',
				url  : 'editdentagrama.php?cododontologia='+cododontologia,
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-updatehoja").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR </div></center>');
											
											$("#btn-updatehoja").html('<span class="fa fa-edit"></span> Actualizar');
										
									});
								}  
							    else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$('#btn-update').attr("disabled", true);
						$("#btn-update").html('<span class="fa fa-edit"></span> Actualizar');
					    setTimeout("location.href='odontologia'", 15000);
				
				});
											
								}
						   }
				});
				return false;
		}
	   /* form submit */	   
});
/* FIN DE FUNCION JQUERY PARA VALIDAR ACTUALIZACION DE HOJAS EVOLUTIVAS DE CONSULTAS ODONTOLOGICAS A PACIENTES */

































/* FUNCION JQUERY PARA VALIDAR CONSENTIMIENTO GENERAL */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#consentimientogeneral").validate({
      rules:
	  {
			codpaciente: { required: true, },
			codmedico: { required: true, },
			codsucursal: { required: true, },
			procedimientotextual: { required: true,},
			observacionprocedimiento: { required: true,},
			doctestigo:{ required: false, digits : true  },
			nombretestigo: { required: false, lettersonly : true  },
	   },
       messages:
	   {
            codpaciente:{ required: "Por favor realice la b&uacute;squeda del paciente" },
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			codsucursal:{ required: "Por favor seleccione Sucursal" },
			procedimientotextual: { required: "Ingrese Procedimiento" },
			observacionprocedimiento: { required: "Ingrese Observaci&uacute;n de Procedimiento" },
            doctestigo:{  required: "Ingrese Cedula", digits: "Ingrese solo digitos"  },
			nombretestigo:{  required: "Ingrese Nombre", lettersonly: "Ingrese solo letras"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#consentimientogeneral").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forconsentimiento.php',
				data : data,
				beforeSend: function()

				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE REGISTRADO UN CONSENTIMIENTO INFORMADO PARA APERTURA DE HISTORIA MEDICA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#consentimientogeneral")[0].reset();
						$("#muestraconsentimiento").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR CONSENTIMIENTO GENERAL */


/* FUNCION JQUERY PARA VALIDAR CONSENTIMIENTO GINECOLOGO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#consentimientogin").validate({
      rules:
	  {
			codpaciente: { required: true, },
			codmedico: { required: true, },
			codsucursal: { required: true, },
			procedimientotextual: { required: true,},
			observacionprocedimiento: { required: true,},
			doctestigo:{ required: false, digits : true  },
			nombretestigo: { required: false, lettersonly : true  },
	   },
       messages:
	   {
            codpaciente:{ required: "Por favor realice la b&uacute;squeda del paciente" },
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			codsucursal:{ required: "Por favor seleccione Sucursal" },
			procedimientotextual: { required: "Ingrese Procedimiento" },
			observacionprocedimiento: { required: "Ingrese Observaci&uacute;n de Procedimiento" },
            doctestigo:{  required: "Ingrese Cedula", digits: "Ingrese solo digitos"  },
			nombretestigo:{  required: "Ingrese Nombre", lettersonly: "Ingrese solo letras"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#consentimientogin").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forconsentimientogin.php',
				data : data,
				beforeSend: function()

				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE REGISTRADO UN CONSENTIMIENTO INFORMADO PARA APERTURA DE HISTORIA MEDICA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#consentimientogin")[0].reset();
						$("#muestraconsentimiento").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR CONSENTIMIENTO GINECOLOGO */


/* FUNCION JQUERY PARA VALIDAR CONSENTIMIENTO LABORATORIO */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#consentimientolab").validate({
      rules:
	  {
			codpaciente: { required: true, },
			codmedico: { required: true, },
			codsucursal: { required: true, },
			procedimientotextual: { required: true,},
			observacionprocedimiento: { required: true,},
			doctestigo:{ required: false, digits : true  },
			nombretestigo: { required: false, lettersonly : true  },
	   },
       messages:
	   {
            codpaciente:{ required: "Por favor realice la b&uacute;squeda del paciente" },
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			codsucursal:{ required: "Por favor seleccione Sucursal" },
			procedimientotextual: { required: "Ingrese Procedimiento" },
			observacionprocedimiento: { required: "Ingrese Observaci&uacute;n de Procedimiento" },
            doctestigo:{  required: "Ingrese Cedula", digits: "Ingrese solo digitos"  },
			nombretestigo:{  required: "Ingrese Nombre", lettersonly: "Ingrese solo letras"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#consentimientolab").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forconsentimientolab.php',
				data : data,
				beforeSend: function()

				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE REGISTRADO UN CONSENTIMIENTO INFORMADO PARA APERTURA DE HISTORIA MEDICA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#consentimientolab")[0].reset();
						$("#muestraconsentimiento").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR CONSENTIMIENTO LABORATORIO */


/* FUNCION JQUERY PARA VALIDAR CONSENTIMIENTO LECTURA RX */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#consentimientolec").validate({
      rules:
	  {
			codpaciente: { required: true, },
			codmedico: { required: true, },
			codsucursal: { required: true, },
			procedimientotextual: { required: true,},
			observacionprocedimiento: { required: true,},
			doctestigo:{ required: false, digits : true  },
			nombretestigo: { required: false, lettersonly : true  },
	   },
       messages:
	   {
            codpaciente:{ required: "Por favor realice la b&uacute;squeda del paciente" },
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			codsucursal:{ required: "Por favor seleccione Sucursal" },
			procedimientotextual: { required: "Ingrese Procedimiento" },
			observacionprocedimiento: { required: "Ingrese Observaci&uacute;n de Procedimiento" },
            doctestigo:{  required: "Ingrese Cedula", digits: "Ingrese solo digitos"  },
			nombretestigo:{  required: "Ingrese Nombre", lettersonly: "Ingrese solo letras"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#consentimientolec").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forconsentimientolec.php',
				data : data,
				beforeSend: function()

				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE REGISTRADO UN CONSENTIMIENTO INFORMADO PARA APERTURA DE HISTORIA MEDICA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#consentimientolec")[0].reset();
						$("#muestraconsentimiento").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR CONSENTIMIENTO LECTURA RX */


/* FUNCION JQUERY PARA VALIDAR CONSENTIMIENTO TERAPIA */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#consentimientoter").validate({
      rules:
	  {
			codpaciente: { required: true, },
			codmedico: { required: true, },
			codsucursal: { required: true, },
			procedimientotextual: { required: true,},
			observacionprocedimiento: { required: true,},
			doctestigo:{ required: false, digits : true  },
			nombretestigo: { required: false, lettersonly : true  },
	   },
       messages:
	   {
            codpaciente:{ required: "Por favor realice la b&uacute;squeda del paciente" },
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			codsucursal:{ required: "Por favor seleccione Sucursal" },
			procedimientotextual: { required: "Ingrese Procedimiento" },
			observacionprocedimiento: { required: "Ingrese Observaci&uacute;n de Procedimiento" },
            doctestigo:{  required: "Ingrese Cedula", digits: "Ingrese solo digitos"  },
			nombretestigo:{  required: "Ingrese Nombre", lettersonly: "Ingrese solo letras"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#consentimientoter").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forconsentimientoter.php',
				data : data,
				beforeSend: function()

				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE REGISTRADO UN CONSENTIMIENTO INFORMADO PARA APERTURA DE HISTORIA MEDICA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#consentimientoter")[0].reset();
						$("#muestraconsentimiento").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR CONSENTIMIENTO TERAPIA */






/* FUNCION JQUERY PARA VALIDAR CONSENTIMIENTO ODONTOLOGIA */	 	 
	 $('document').ready(function()
{ 
     /* validation */
	 $("#consentimientodo").validate({
      rules:
	  {
			codpaciente: { required: true, },
			codmedico: { required: true, },
			codsucursal: { required: true, },
			procedimientotextual: { required: true,},
			observacionprocedimiento: { required: true,},
			doctestigo:{ required: false, digits : true  },
			nombretestigo: { required: false, lettersonly : true  },
	   },
       messages:
	   {
            codpaciente:{ required: "Por favor realice la b&uacute;squeda del paciente" },
			codmedico:{ required: "Por favor seleccione el M&eacute;dico" },
			codsucursal:{ required: "Por favor seleccione Sucursal" },
			procedimientotextual: { required: "Ingrese Procedimiento" },
			observacionprocedimiento: { required: "Ingrese Observaci&uacute;n de Procedimiento" },
            doctestigo:{  required: "Ingrese Cedula", digits: "Ingrese solo digitos"  },
			nombretestigo:{  required: "Ingrese Nombre", lettersonly: "Ingrese solo letras"  },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* form submit */
	  function submitForm()
	   {		
				
				var data = $("#consentimientodo").serialize();
				
				$.ajax({
				
				type : 'POST',
				url  : 'forconsentimientodo.php',
				data : data,
				beforeSend: function()

				{	
					$("#error").fadeOut();
					$("#btn-submit").html('<i class="fa fa-refresh"></i> Verificando...');
				},
				success :  function(data)
						   {						
								if(data==1){
									
									$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> LOS CAMPOS NO PUEDEN IR VACIOS, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else if(data==2)
								{
									
					$("#error").fadeIn(1000, function(){
											
											
	$("#error").html('<center><div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span class="fa fa-warning"></span> ESTE PACIENTE YA TIENE REGISTRADO UN CONSENTIMIENTO INFORMADO PARA APERTURA DE HISTORIA MEDICA, VERIFIQUE NUEVAMENTE POR FAVOR !</div></center>');
											
										$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
								else{
										
									$("#error").fadeIn(1000, function(){
											
						$("#error").html('<center> '+data+' </center>');
						$("#consentimientodo")[0].reset();
						$("#muestraconsentimiento").html(""); 
						 setTimeout(function() { $("#error").html(""); }, 15000);
						$("#btn-submit").html('<span class="fa fa-save"></span> Guardar');
										
									});
								}
						   }
				});
				return false;
		}
	   /* form submit */   
});
/*  FIN DE FUNCION PARA VALIDAR CONSENTIMIENTO ODONTOLOGIA */



