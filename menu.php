<?php 
if(isset($_SESSION['acceso'])) { 
if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="enfermera" || $_SESSION["acceso"]=="auditor" || $_SESSION["acceso"]=="tecnico" || $_SESSION['acceso'] == "general" || $_SESSION["acceso"]=="ginecologo" || $_SESSION["acceso"]=="laboratorio" || $_SESSION["acceso"]=="radiologo" || $_SESSION["acceso"]=="terapeuta" || $_SESSION["acceso"]=="odontologo") {
	
switch($_SESSION['acceso'])
                                 {
                  case 'administrador':  ?>

	<!----- INICIO DE MENU ----->
   <div id="sidebar-menu">
   <ul>
   <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
    <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="configuracion">Configuración</a></li>
    <li><a href="sucursales">Sucursales</a></li>
    <li><a href="sedes">Sedes</a></li>
    <li><a href="eps">EPS</a></li>
    <li><a href="valorexamenes">Valores Laboratorio</a></li>
    <li><a href="plantillasginecologia">Plantilla Ecograficas</a></li>
    <li><a href="plantillasradiologia">Plantilla Lecturas Rx</a></li>
    <li class="has_sub"><a href="javascript:void(0);"><span>Seguridad</span><i class="pull-right fa fa-angle-double-right"></i></a>
                                  <ul style="">
                                    <li><a href="usuarios">Usuarios</a></li>
									<li><a href="logs">Logs de Acceso</a></li>
                                  </ul>
                          </li>
	<li class="has_sub"><a href="javascript:void(0);"><span>Base de Datos</span><i class="pull-right fa fa-angle-double-right"></i></a>
                                  <ul style="">
                  <li><a href="backup">Respaldar</a></li>
                  <li><a href="restore">Restaurar</a></li>
                                  </ul>
                          </li>
   </ul>
   </li>

  <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="ion ion-person-stalker"></i><span> Personal </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="medicos">Médicos</a></li>
    <li><a href="pacientes">Pacientes</a></li>
   </ul>
   </li>
   
   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-calendar"></i><span> Citas Médicas </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="forcitas">Nuevas Citas</a></li>
    <li><a href="citasmedicas">Consultar Citas</a></li>
    <li><a href="buscacitasfechas">Reportes de Citas</a></li>
    <li><a href="buscacitasmedicos">Citas por Médicos</a></li>
   </ul>
   </li>

   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-user-md"></i><span> Consultorio </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="aperturas">Apertura de Historias</a></li>
    <li><a href="hojaevolutiva">Hoja de Evolución</a></li>
    <li><a href="remisiones">Remisiones</a></li>
    <li><a href="formulasmedicas">Fórmulas Médicas</a></li>
    <li><a href="ordenesmedicas">Órdenes Médicas</a></li>
    <li><a href="formulasterapias">Fórmulas Terapias</a></li>
    <li><a href="examenes">Solicitud Exámenes</a></li>
    <li><a href="consentimientogen">Consentimiento Infor.</a></li>
    <li><a href="buscaconsultorio">Reportes Consultorio</a></li>
   </ul>
   </li>

   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-hospital-o"></i><span> Ginecología </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="aperturasg">Apertura de Historias</a></li>
    <li><a href="hojaevolutivag">Hoja de Evolución</a></li>
    <li><a href="remisionesg">Remisiones</a></li>
    <li><a href="formulasmedicasg">Fórmulas Médicas</a></li>
    <li><a href="ordenesmedicasg">Órdenes Médicas</a></li>
    <li><a href="criocauterizacion">Criocauterización</a></li>
    <li><a href="colposcopias">Colposcopias</a></li>
    <li><a href="ecografias">Ecografías</a></li>
    <li><a href="consentimientogin">Consentimiento Infor.</a></li>
    <li><a href="buscaginecologia">Reportes Ginecología</a></li>
   </ul>
   </li>

   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-plus-square"></i><span> Laboratorio </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="forlaboratorio">Nuevo Exámenes</a></li>
    <li><a href="laboratorio">Exámen Laboratorio</a></li>
    <li><a href="consentimientolab">Consentimiento Infor.</a></li>
    <li><a href="buscalaboratorio">Reporte Laboratorios</a></li>
   </ul>
   </li>

   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-medkit"></i><span> Radiología </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="forlecturarx">Nueva Radiología</a></li>
    <li><a href="lecturasrx">Consultar Radiología</a></li>
    <li><a href="consentimientolec">Consentimiento Infor.</a></li>
    <li><a href="buscalecturarx">Reportes Radiología</a></li>
   </ul>
   </li>

   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-wheelchair"></i><span> Terapias </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="forterapias">Nueva Terapias</a></li>
    <li><a href="terapias">Terapias</a></li>
    <li><a href="consentimientoter">Consentimiento Infor.</a></li>
    <li><a href="buscaterapias">Reportes Terapias</a></li>
   </ul>
   </li>

   <li class="has_sub"> 
   <a href="javascript:void(0);" class="waves-effect">
   <i class="fa fa-diamond"></i><span> Odontología </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
   <ul class="list-unstyled" style="">
    <li><a href="forodontologia">Nueva Odontología</a></li>
    <li><a href="odontologia">Odontologías</a></li>
    <li><a href="consentimientodo">Consentimiento Infor.</a></li>
    <li><a href="buscaodontologia">Reporte Odontologíco</a></li>
   </ul>
   </li>
   
   <li> <a href="logout" class="waves-effect"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   
   </ul>
   </div>
   <!----- FIN DE MENU ----->
				
    <?php
         break;
         case 'secretaria': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="sucursales">Sucursales</a></li>
  <li><a href="sedes">Sedes</a></li>
  <li><a href="eps">EPS</a></li>
  <li><a href="valorexamenes">Valores Laboratorio</a></li>
  <li><a href="plantillasginecologia">Plantilla Ecograficas</a></li>
  <li><a href="plantillasradiologia">Plantilla Lecturas Rx</a></li>
  </ul>
  </li>

  <li><a href="pacientes"><i class="fa fa-users"></i>Pacientes</a></li>
  <li><a href="forcitas"><i class="fa fa-calendar"></i><span> Nuevas Citas </span></a></li>
  <li><a href="citasmedicas"><i class="fa fa-search"></i><span> Consultar Citas </span></a></li>
  <li><a href="buscacitasfechas"><i class="fa fa-file-pdf-o"></i><span> Reportes de Citas </span></a></li>
  <li><a href="buscacitasmedicos"><i class="fa fa-file-pdf-o"></i><span> Citas por Médicos</span></a></li>
  <li> <a href="logout" class="waves-effect"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   
  </ul>
  </div>
  <!----- FIN DE MENU ----->

   <?php
         break;
         case 'enfermera': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="valorexamenes">Valores Laboratorio</a></li>
  <li><a href="plantillasginecologia">Plantilla Ecograficas</a></li>
  <li><a href="plantillasradiologia">Plantilla Lecturas Rx</a></li>
  </ul>
  </li>

  <li><a href="pacientes"><i class="fa fa-users"></i>Pacientes</a></li>

  <li><a href="forcitas"><i class="fa fa-user-md"></i><span> Nuevas Citas </span></a></li>
  <li><a href="citasmedicas"><i class="fa fa-search"></i><span> Consultar Citas </span></a></li>
  <li><a href="buscacitasfechas"><i class="fa fa-file-pdf-o"></i><span> Reportes de Citas </span></a></li>
  <li><a href="buscacitasmedicos"><i class="fa fa-file-pdf-o"></i><span> Citas por Médicos</span></a></li>
  <li><a href="buscalecturarx"><i class="fa fa-file-pdf-o"></i><span> Reportes Radiología </span></a> </li>

  <li> <a href="logout" class="waves-effect"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   
  </ul>
  </div>
  <!----- FIN DE MENU ----->

   <?php
         break;
         case 'tecnico': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="valorexamenes">Valores Laboratorio</a></li>
  <li><a href="plantillasradiologia">Plantilla Lecturas Rx</a></li>
  </ul>
  </li>

  <li><a href="pacientes"><i class="fa fa-users"></i>Pacientes</a></li>

  <li><a href="forcitas"><i class="fa fa-calendar"></i><span> Nuevas Citas </span></a></li>
  <li><a href="citasmedicas"><i class="fa fa-search"></i><span> Consultar Citas </span></a></li>
  <li><a href="buscacitasfechas"><i class="fa fa-file-pdf-o"></i><span> Reportes de Citas </span></a></li>
  <li><a href="buscacitasmedicos"><i class="fa fa-file-pdf-o"></i><span> Citas por Médicos</span></a></li>
  <li><a href="buscalecturarx"><i class="fa fa-file-pdf-o"></i><span> Reportes Radiología </span></a> </li>

  <li> <a href="logout" class="waves-effect"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
   
  </ul>
  </div>
  <!----- FIN DE MENU ----->

   <?php
         break;
         case 'auditor': ?>

  <!----- INICIO DE MENU ----->
  
  <!----- FIN DE MENU ----->

   <?php
         break;
         case 'general': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="datos">Actualizar Mis Datos</a></li>
  <li><a href="pacientes">Pacientes</a></li>
  </ul>
  </li>
   
  <li><a href="aperturas"><i class="fa fa-folder-open"></i>Apertura de Historias</a></li>
  <li><a href="hojaevolutiva"><i class="fa fa-clipboard"></i>Hoja de Evolución</a></li>
  <li><a href="remisiones"><i class="fa fa-file-text"></i>Remisiones</a></li>
  <li><a href="formulasmedicas"><i class="fa fa-file-text"></i>Fórmulas Médicas</a></li>
  <li><a href="ordenesmedicas"><i class="fa fa-file-text"></i>Órdenes Médicas</a></li>
  <li><a href="formulasterapias"><i class="fa fa-file-text"></i>Fórmulas Terapias</a></li>
  <li><a href="examenes"><i class="fa fa-list-alt"></i>Solicitud Exámenes</a></li>
  <li><a href="consentimientogen"><i class="fa fa-compass"></i>Consentimiento Infor.</a></li>
  <li><a href="buscaconsultorio"><i class="fa fa-file-pdf-o"></i>Reportes Consultorio</a></li>
  <li><a href="logout" class="waves-effect"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
  </ul>
  </div>
   <!----- FIN DE MENU ----->

   <?php
         break;
         case 'ginecologo': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="datos">Actualizar Mis Datos</a></li>
  <li><a href="pacientes">Pacientes</a></li>
  </ul>
  </li>
   
  <li><a href="aperturasg"><i class="fa fa-folder-open"></i>Apertura de Historias</a></li>
  <li><a href="hojaevolutivag"><i class="fa fa-clipboard"></i>Hoja de Evolución</a></li>
  <li><a href="remisionesg"><i class="fa fa-file-text"></i>Remisiones</a></li>
  <li><a href="formulasmedicasg"><i class="fa fa-file-text"></i>Fórmulas Médicas</a></li>
  <li><a href="ordenesmedicasg"><i class="fa fa-file-text"></i>Órdenes Médicas</a></li>
  <li><a href="criocauterizacion"><i class="fa fa-stethoscope"></i>Criocauterización</a></li>
  <li><a href="colposcopias"><i class="fa fa-ambulance"></i>Colposcopias</a></li>
  <li><a href="ecografias"><i class="fa fa-medkit"></i>Ecografías</a></li>
  <li><a href="consentimientogin"><i class="fa fa-compass"></i>Consentimiento Infor.</a></li>
  <li><a href="buscaginecologia"><i class="fa fa-file-pdf-o"></i><span>Reportes Ginecología </span></a></li>
  <li><a href="logout" class="waves-effect"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
  </ul>
  </div>
   <!----- FIN DE MENU ----->

   <?php
         break;
         case 'laboratorio': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="datos">Actualizar Mis Datos</a></li>
  <li><a href="pacientes">Pacientes</a></li>
  </ul>
  </li>
   
  <li><a href="forlaboratorio"><i class="fa fa-user-md"></i>Nuevo Exámenes</a></li>
  <li><a href="laboratorio"><i class="fa fa-plus-square"></i>Exámen Laboratorio</a></li>
  <li><a href="consentimientolab"><i class="fa fa-compass"></i>Consentimiento Infor.</a></li>
  <li><a href="buscalaboratorio"><i class="fa fa-file-pdf-o"></i><span>Reportes Laboratorios </span></a></li>
  <li><a href="logout" class="waves-effect"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
  </ul>
  </div>
   <!----- FIN DE MENU ----->

   <?php
         break;
         case 'radiologo': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="datos">Actualizar Mis Datos</a></li>
  <li><a href="pacientes">Pacientes</a></li>
  </ul>
  </li>
   
  <li><a href="forlecturarx"><i class="fa fa-medkit"></i>Nueva Radiología</a></li>
  <li><a href="lecturasrx"><i class="fa fa-plus-square"></i>Consultar Radiología</a></li>
  <li><a href="consentimientolec"><i class="fa fa-compass"></i>Consentimiento Infor.</a></li>
  <li><a href="buscalecturarx"><i class="fa fa-file-pdf-o"></i><span>Reportes Radiología </span></a></li>
  <li><a href="logout" class="waves-effect"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
  </ul>
  </div>
   <!----- FIN DE MENU ----->

   <?php
         break;
         case 'terapeuta': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="datos">Actualizar Mis Datos</a></li>
  <li><a href="pacientes">Pacientes</a></li>
  </ul>
  </li>
   
  <li><a href="forterapias"><i class="fa fa-wheelchair"></i>Nueva Terapias</a></li>
  <li><a href="terapias"><i class="fa fa-plus-square"></i>Consultar Terapias</a></li>
  <li><a href="consentimientoter"><i class="fa fa-compass"></i>Consentimiento Infor.</a></li>
  <li><a href="buscaterapias"><i class="fa fa-file-pdf-o"></i><span>Reportes Terapias </span></a></li>
  <li><a href="logout" class="waves-effect"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
  </ul>
  </div>
   <!----- FIN DE MENU ----->

   <?php
         break;
         case 'odontologo': ?>

  <!----- INICIO DE MENU ----->
  <div id="sidebar-menu">
  <ul>
  <li> <a href="panel" class="waves-effect"><i class="fa fa-desktop"></i><span> Panel Principal </span></a></li>
   
  <li class="has_sub"> 
  <a href="javascript:void(0);" class="waves-effect">
  <i class="fa fa-cog"></i> <span> Administración </span><span class="pull-right"><i class="ion ion-plus"></i></span></a>
  <ul class="list-unstyled" style="">
  <li><a href="datos">Actualizar Mis Datos</a></li>
  <li><a href="pacientes">Pacientes</a></li>
  </ul>
  </li>
   
  <li><a href="forodontologia"><i class="fa fa-user-md"></i>Nueva Odontología</a></li>
  <li><a href="odontologia"><i class="fa fa-folder-open"></i>Odontologías</a></li>
  <li><a href="consentimientodo"><i class="fa fa-compass"></i>Consentimiento Infor.</a></li>
  <li><a href="buscaodontologia"><i class="fa fa-file-pdf-o"></i><span>Reportes Odontología </span></a></li>
  <li><a href="logout" class="waves-effect"><i class="fa fa-power-off"></i>Cerrar Sesión</a></li>
  </ul>
  </div>
   <!----- FIN DE MENU ----->
				
      <?php
        break; } 
      ?>

</body>
</html>
<?php } else { ?> 
    <script type='text/javascript' language='javascript'>
      alert('NO TIENES PERMISO PARA ACCEDER A ESTA PAGINA.\nCONSULTA CON EL ADMINISTRADOR PARA QUE TE DE ACCESO')  
    document.location.href='logout'   
        </script> 
<?php } } else { ?>
    <script type='text/javascript' language='javascript'>
      alert('NO TIENES PERMISO PARA ACCEDER AL SISTEMA.\nDEBERA DE INICIAR SESION')  
    document.location.href='logout'  
        </script> 
<?php } ?> 