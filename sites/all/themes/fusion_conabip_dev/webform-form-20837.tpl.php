<script type="text/javascript" src="http://conabip.gob.ar/jquery.numeric.js"></script>

<?php
// $Id: webform-form.tpl.php,v 1.1.2.4 2009/01/11 23:09:35 quicksketch Exp $
include_once( '/var/www/drupal/sites/all/themes/fusion_conabip/form-formatting-helpers.php' );

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
$personal_info_header = array( '', 'De', 'Hasta', 'De', 'Hasta' );
$empleado = array( '', 'Tipo', 'Tareas', 'Dedicacion Horaria', 'Nivel de Formacion Maximo' );
?>
<?php
global $user;




$ultimoFormEnviadoPorElUsuario =  db_query('SELECT sid FROM webform_submissions WHERE uid = '.$user->uid.' AND nid=87 ORDER BY submitted DESC LIMIT 1');
if(db_affected_rows()){
	while($ultimoFormEnviadoPorElUsuario = db_fetch_array($ultimoFormEnviadoPorElUsuario)){
		$sid = $ultimoFormEnviadoPorElUsuario['sid'];
	}


$anioFund = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=550;'));
$habiantes = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=5;'));
$dir = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=6;'));
$barrio = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=7;'));
$loc = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=8;'));
$dpto = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=9;'));
$cp = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=11;'));
$prov = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=10;'));
$tel = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=429;'));
$fax = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=430;'));
$mail = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=12;'));
$web = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=13;'));
$tel1 = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=14;'));
$tel2 = db_fetch_array(db_query('SELECT data FROM webform_submitted_data WHERE nid=87 AND sid='.$sid.' AND cid=15;'));

}

drupal_add_js ('
$(document).ready(function(){
    
    jQuery("body").addClass("DDJJ");
    

    //Limitar caracteres
    $("#webform-component-usuarios input.form-text").attr("MaxLength",6);
    $("#webform-component-equipamiento-en-uso input.form-text").attr("MaxLength",5);
    $("#webform-component-7recursos-humanos input.form-text").attr("MaxLength",2);
    $("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-observaciones").attr("MaxLength",140);
    $("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar").attr("MaxLength",140);
  
    
    
    //Permitir solo valores numericos
    $("#edit-submitted-asociados-actuales-cantidad-inscriptos").numeric({ negative: false });
    $("#edit-submitted-asociados-actuales-cuantos-de-estos-asociados-poseen-la-cuota-al-dia").numeric({ negative: false });
    $("#edit-submitted-usuarios-ninios").numeric({ negative: false });
    $("#edit-submitted-usuarios-ninios-1").numeric({ negative: false });
    $("#edit-submitted-usuarios-jovenes-1").numeric({ negative: false });
    $("#edit-submitted-usuarios-adultos-1").numeric({ negative: false });
    $("#edit-submitted-usuarios-ninos-participantes-1").numeric({ negative: false });
    $("#edit-submitted-usuarios-jovenes-participantes-1").numeric({ negative: false });
    $("#edit-submitted-usuarios-adultos-participantes-1").numeric({ negative: false });
    
    $("#edit-submitted-usuarios-jovenes").numeric({ negative: false });
    $("#edit-submitted-usuarios-adultos").numeric({ negative: false });
    $("#edit-submitted-usuarios-ninos-participantes").numeric({ negative: false });
    $("#edit-submitted-usuarios-jovenes-participantes").numeric({ negative: false });
    $("#edit-submitted-usuarios-adultos-participantes").numeric({ negative: false });
    $("#edit-submitted-libros-cantidad-total-de-ejemplares").numeric({ negative: false });
		$("#edit-submitted-libros-total-de-ejemplares-inventariados").numeric({ negative: false });
    $("#edit-submitted-libros-total-de-ejemplares-clasificados").numeric({ negative: false });
    $("#edit-submitted-libros-material-multimedia-total-de-videos").numeric({ negative: false });
    $("#edit-submitted-libros-material-multimedia-total-de-dvd").numeric({ negative: false });
    $("#edit-submitted-libros-material-multimedia-total-de-cd-rom").numeric({ negative: false });
    $("#edit-submitted-libros-material-multimedia-total-ebooks").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-computador").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-de-estas-computadoras-cuantas-son-para-uso-externo-o-publico").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-de-estas-computadoras-cuantas-son-para-uso-interno").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-de-estas-computadoras-cuantas-son-para-uso-compartido").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-impresora").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-televisor").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-videocassetera").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-dvd").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-equipo-de-audio").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-fotocopiadora").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-canon--proyector").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-camara-para-videoconferencia").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-camara-filmadora").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-camara-fotografica-digital").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-grabador-de-voz").numeric({ negative: false });
    $("#edit-submitted-equipamiento-en-uso-matafuegos").numeric({ negative: false });
    $("#edit-submitted-7recursos-humanos-cuantos-miembros-componen-la-comision-directiva-actualmente").numeric({ negative: false });
    $("#edit-submitted-7recursos-humanos-de-las-personas-que-desempenan-tareas-en-la-bibliotecas-cuantas-reciben-una-remuneracion-por-su-trabajo").numeric({ negative: false });
    $("#edit-submitted-7recursos-humanos-de-las-personas-que-desempenan-tareas-regulares-en-la-biblioteca-cuantas-lo-hacen-de-manera-voluntaria").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-primario-incompleto").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-primario-completo").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-secundario-incompleto").numeric({ negative: false });
    
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-secundario-completo").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-terciario-incompleto").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-terciario-completo").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-terciario-incompleto").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-terciario-completo").numeric({ negative: false });
    
    $("#edit-submitted-equipamiento-en-uso-computadora").numeric({ negative: false });
    
    $("#edit-submitted-equipamiento-en-uso-a-cuantas-de-estas-computadoras-tiene-acceso-el-publico").numeric({ negative: false });
   	$("#edit-submitted-equipamiento-en-uso-ebooks-readers").numeric({ negative: false });

		
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-universitario-incompleto").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-universitario-completo").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-universitario-incompleto").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-universitario-completo").numeric({ negative: false });
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-indicar-cantidad").numeric({ negative: false });
    
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-estudiantes-menores").numeric({ negative: false });
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-adultos").numeric({ negative: false });
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-jubilados").numeric({ negative: false });
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-grupo-familiar").numeric({ negative: false });
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-socio-protector").numeric({ negative: false });
    $("#edit-submitted-servicio-de-prestamos-en-otros-soportes-prestamos-en-sala-otros").numeric({ negative: false });
    $("#edit-submitted-servicio-de-prestamos-en-otros-soportes-prestamos-a-domicilio-otros").numeric({ negative: false });
 
    

    $("#webform-component-7recursos-humanos--comision-directiva .form-text").numeric({ negative: false });
    $("#webform-component-7recursos-humanos--personas-desempenando-tareas-regulares .form-text").numeric({ negative: false });
    $("#webform-component-7recursos-humanos--voluntarios .form-text").numeric({ negative: false });
    $("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-indicar-cantidad").numeric({ negative: false });
    
    $("#edit-submitted-14-servicios-servicios-de-prestamos-libros-cantidad-de-libros-prestados-en-sala").numeric({ negative: false });
    $("#edit-submitted-14-servicios-servicios-de-prestamos-libros-cantidad-de-libros-prestados-a-domicilio").numeric({ negative: false });
    $("#edit-submitted-14-servicios-servicio-de-prestamos-en-otros-soportes-prestamos-en-sala-otros").numeric({ negative: false });
    $("#edit-submitted-14-servicios-servicio-de-prestamos-en-otros-soportes-prestamos-a-domicilio-otros").numeric({ negative: false });
    
    
    
    
    
    
    
    $("#edit-submitted-asociados-actuales-cantidad-inscriptos").numeric({ negative: false });
    $("#edit-submitted-asociados-actuales-cuantos-de-estos-asociados-poseen-la-cuota-al-dia").numeric({ negative: false });
    //$("#edit-submitted-asociados-actuales-cantidad-inscriptos").val("");
    //$("#edit-submitted-asociados-actuales-cuantos-de-estos-asociados-poseen-la-cuota-al-dia").val("");
    

    
    
    
    
    $("#edit-submitted-equipamiento-en-uso-camara-fotografica-analogica-wrapper").hide();
    
    //Autocompletar Punto #1



	

$("#edit-submitted-datos-generales-ano-de-fundacion-de-la-biblioteca").val("'.$anioFund['data'].'");
//$("#edit-submitted-datos-generales-cantidad-de-habitantes-localidad-2").click();

//$("#edit-submitted-datos-generales-direccion").val("'.$dir['data'].'");
//$("#edit-submitted-datos-generales-barrio").val("'.$barrio['data'].'");
//$("#edit-submitted-datos-generales-localidad").val("'.$loc['data'].'");
//$("#edit-submitted-datos-generales-departamento-o-partido").val("'.$dpto['data'].'");
//$("#edit-submitted-datos-generales-codigo-postal").val("'.$cp['data'].'");
//$("#edit-submitted-datos-generales-provincia").val("'.$prov['data'].'");
//$("#edit-submitted-datos-generales-telefono").val("'.$tel['data'].'");
//$("#edit-submitted-datos-generales-fax").val("'.$fax['data'].'");
//$("#edit-submitted-datos-generales-pagina-web").val("'.$web['data'].'");
//$("#edit-submitted-datos-generales-telcel-presidentae-de-la-bp").val("'.$tel1['data'].'");
//$("#edit-submitted-datos-generales-telcel-bibliotecariao-de-la-bp").val("'.$tel2['data'].'");

    
   
   
   

   
   
      jQuery("#edit-submitted-horario-especificar-periodo-y-horarios-wrapper").hide();
    jQuery("#edit-submitted-horario-la-biblioteca-tiene-horarios-especiales-en-algun-periodo-del-ano-1").click(
    	function(){
    		if(this.checked){
    		jQuery("#edit-submitted-horario-especificar-periodo-y-horarios-wrapper").show();
    		}
    		    	}
    );
    jQuery("#edit-submitted-horario-la-biblioteca-tiene-horarios-especiales-en-algun-periodo-del-ano-2").click(
    	function(){
    		if(this.checked){
    		jQuery("#edit-submitted-horario-especificar-periodo-y-horarios-wrapper").hide();
    		}
    		    	}
    );
   
   
   
   
      
     
   
 
   
   

  
 
 

   //jQuery(".required").attr("required",true);
   
   
   
   jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").hide();
   
   
   jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-lugar-2").click(
   	function(){
   			if(this.checked){jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").show();}
   	else{jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").hide();}
   	}
   );
   
   
       
       
    
    jQuery("#webform-component-comunicacion--tipo-de-conexion-a-internet").hide();
    jQuery("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").hide();
    jQuery("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").hide();
    jQuery("#edit-submitted-comunicacion-la-biblioteca-tiene-conexion-a-internet-1").click(
    	   function(){
    	   	jQuery("#webform-component-comunicacion--tipo-de-conexion-a-internet").show();
    			jQuery("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").show();
			    jQuery("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").show();
			    
			    jQuery("#webform-component-comunicacion--tipo-de-conexion-a-internet input").attr("required",true);
			    jQuery("#edit-submitted-comunicacion-velocidad-de-conexion").attr("required",true);
			    jQuery("#edit-submitted-comunicacion-nombre-proveedor-de-internet").attr("required",true);
    	   }
    	   
    	    );
    
    jQuery("#edit-submitted-comunicacion-la-biblioteca-tiene-conexion-a-internet-2").click(
    	function(){
    	   	jQuery("#webform-component-comunicacion--tipo-de-conexion-a-internet").hide();
    jQuery("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").hide();
    jQuery("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").hide();
    
    			jQuery("#webform-component-comunicacion--tipo-de-conexion-a-internet input").attr("required",false);
			    jQuery("#edit-submitted-comunicacion-velocidad-de-conexion").attr("required",false);
			    jQuery("#edit-submitted-comunicacion-nombre-proveedor-de-internet").attr("required",false);
    	   }
    );
    
    
    
    jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene").hide();
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").hide();
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-indicar-cantidad-wrapper").hide();
    jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--percibe-en--una-remuneracion-mensual-por-su-trabajo").hide();
   	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-observaciones-wrapper").hide();
   	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").hide();
   
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-la-biblioteca-cuenta-con-bibliotecarios-profesionales-desempenandose-en-la-misma-2").click(
    	function(){
    	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-indicar-cantidad-wrapper").show();
    	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-observaciones-wrapper").show();
    	 jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--percibe-en--una-remuneracion-mensual-por-su-trabajo").show();
    	 
    	 jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-indicar-cantidad").attr("required",true);
    	 jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--percibe-en--una-remuneracion-mensual-por-su-trabajo input").attr("required",true);
    	 
    	}
    );
      jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-la-biblioteca-cuenta-con-bibliotecarios-profesionales-desempenandose-en-la-misma-1").click(
    	function(){
    		  jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene").hide();
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").hide();
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-indicar-cantidad-wrapper").hide();
    jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--percibe-en--una-remuneracion-mensual-por-su-trabajo").hide();
   	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-observaciones-wrapper").hide();
   	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").hide();
   	
   	jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-indicar-cantidad").attr("required",false);
    jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--percibe-en--una-remuneracion-mensual-por-su-trabajo input").attr("required",false);
    	 
   
    	}
    );
   
   jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-esta-remuneracion-proviene-5").click(
   	function(){
   		if(this.checked){
   			jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").show();
   		}
   		else {
   			jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").hide();
   		}
   	}
   );
    
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-percibe-en--una-remuneracion-mensual-por-su-trabajo-1").click(
    	function(){
    		jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene").show();
 				 jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").show();
    	}
    );
    jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-percibe-en--una-remuneracion-mensual-por-su-trabajo-2").click(
    	function(){
    		jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene").hide();
 				 jQuery("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-especificar-wrapper").hide();
    	}
    );
    
    
    
    jQuery("#webform-component-fondos-economicos--cuostas-asociados").hide();
    jQuery("#webform-component-fondos-economicos--otros-fondos-provienen-de").hide();
    jQuery("#edit-submitted-fondos-economicos-la-biblioteca-genera-fondos-propios-1").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados").show();
    		jQuery("#webform-component-fondos-economicos--otros-fondos-provienen-de").show();
    		
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota  input").attr("required",true);
    		
    		
    	}
    );
    jQuery("#edit-submitted-fondos-economicos-la-biblioteca-genera-fondos-propios-2").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados").hide();
    		jQuery("#webform-component-fondos-economicos--otros-fondos-provienen-de").hide();
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota  input").attr("required",false);
    	}
    );
    
    
    jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").hide();
    jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    
    jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-1").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").hide();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    	}
    );
    jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-2").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").show();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    	}
    );
    jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-3").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").show();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    	}
    );
    jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-4").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").show();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    	}
    );
     jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-5").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").show();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    	}
    );
     jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-6").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").show();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").hide();
    	}
    );
     jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-marcar-categoria-segun-corresponda-e-indicar-monto-de-la-cuota-7").click(
    	function(){
    		jQuery("#webform-component-fondos-economicos--cuostas-asociados--monto-de-la-cuota").show();
    		jQuery("#edit-submitted-fondos-economicos-cuostas-asociados-tipoCuota-otro-wrapper").show();
    	}
    );
    
    jQuery("#edit-submitted-fondos-economicos-otros-fondos-provienen-de-especificar-origen-otros-fondos-wrapper").hide();
    jQuery("#edit-submitted-fondos-economicos-otros-fondos-provienen-de-origen-de-otros-fondos-12").click(
    	function(){
    	if(this.checked){
    			jQuery("#edit-submitted-fondos-economicos-otros-fondos-provienen-de-especificar-origen-otros-fondos-wrapper").show();
    		}
    		else{
    			jQuery("#edit-submitted-fondos-economicos-otros-fondos-provienen-de-especificar-origen-otros-fondos-wrapper").hide();
    		}
    	}
    );
    
   
    
    jQuery("#edit-submitted-horario-en-caso-afirmativo-especificar-meses-y-horarios-wrapper").hide();
    jQuery("#edit-submitted-horario-cierra-periodo-anio-1").click(
    	function(){
			    jQuery("#edit-submitted-horario-en-caso-afirmativo-especificar-meses-y-horarios-wrapper").show();
    	}
    );
    jQuery("#edit-submitted-horario-cierra-periodo-anio-2").click(
    	function(){
			    jQuery("#edit-submitted-horario-en-caso-afirmativo-especificar-meses-y-horarios-wrapper").hide();
    	}
    );
    
    jQuery("#webform-component-acciones-y-proyectos--marque-con-una-cruz").hide();
    jQuery("#edit-submitted-acciones-y-proyectos-otro-wrapper").hide();
    jQuery("#edit-submitted-acciones-y-proyectos-actividades-con-otras-instituciones-1").click(
    	function(){
    		 jQuery("#webform-component-acciones-y-proyectos--marque-con-una-cruz").show();
    	}
    );
    jQuery("#edit-submitted-acciones-y-proyectos-actividades-con-otras-instituciones-2").click(
    	function(){
    		 jQuery("#webform-component-acciones-y-proyectos--marque-con-una-cruz").hide();
    		 jQuery("#edit-submitted-acciones-y-proyectos-otro-wrapper").hide();
    	}
    );
    jQuery("#edit-submitted-acciones-y-proyectos-marque-con-una-cruz-5").click(
    	function(){
    		if(this.checked){
    			jQuery("#edit-submitted-acciones-y-proyectos-otro-wrapper").show();
    		}
    		else {
    			jQuery("#edit-submitted-acciones-y-proyectos-otro-wrapper").hide();
    		}
    	}
    );
    
    jQuery("#webform-component-14-servicios--otro-tipo-de-servicios--especifique-servicio legend").hide();
    jQuery("#webform-component-14-servicios--otro-tipo-de-servicios--especifique-servicio").hide();
    jQuery("#edit-submitted-14-servicios-otro-tipo-de-servicios-marque-con-una-cruz-21").click(
    	function(){
    			if(this.checked){
    				jQuery("#webform-component-14-servicios--otro-tipo-de-servicios--especifique-servicio").show();
    			}
    			else {jQuery("#webform-component-14-servicios--otro-tipo-de-servicios--especifique-servicio").hide();}
    	}
    );
    
    
    
    
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").hide();
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-1").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").hide();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").hide();
    });
    
     jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-2").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-3").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-4").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-5").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").show();
    });
    
    
    
    jQuery("#webform-component-7--sistemas-y-servicios-automatizados--digibepe--los-socios-de-la-biblioteca-utilizan-el-servicio-de-opac").hide();
    
    jQuery("#edit-submitted-7--sistemas-y-servicios-automatizados-digibepe-estan-al-tanto-del-servicio-opac-que-dispone-digibepe-1").click(
    	function(){
    		jQuery("#webform-component-7--sistemas-y-servicios-automatizados--digibepe--los-socios-de-la-biblioteca-utilizan-el-servicio-de-opac").show()
    	}
    );
    jQuery("#edit-submitted-7--sistemas-y-servicios-automatizados-digibepe-estan-al-tanto-del-servicio-opac-que-dispone-digibepe-2").click(
    	function(){
    		jQuery("#webform-component-7--sistemas-y-servicios-automatizados--digibepe--los-socios-de-la-biblioteca-utilizan-el-servicio-de-opac").hide()
    	}
    );
    
    
    
    
    
    
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").hide();
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-1").click(function(){
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").hide();
    });
    
     jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-2").click(function(){
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").show();
    });
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-3").click(function(){
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").show();
    });
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-4").click(function(){
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").show();
    });
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-5").click(function(){
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").show();
    });
    
    
    
    
    
    
    
    
    
     jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").hide();
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-1").click(function(){
    		 jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").hide();
    });
    
     jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-2").click(function(){
    		 jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-3").click(function(){
    		 jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-4").click(function(){
    		 jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-5").click(function(){
    		 jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").show();
    });
    
    
    
    
    
    
    
      jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").hide();
    
    	
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-1").click(function(){
    		 
    		  jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").hide();
    		 
    });
    
     jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-2").click(function(){
    		 
    		  jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").show();
    		 
    });
    
    
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-3").click(function(){
    		 
    		  jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").show();
    		 
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-4").click(function(){
    		 
    		  jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").show();
    		 
    });
    
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-5").click(function(){
    		 
    		  jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").show();
    		 
    });
    
    
    
    
    
    
    
    
    
       jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").hide();
    	jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-otros-lugares-que-usa-para-animacion-a-la-lectura-wrapper").hide();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura").hide();
    		jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-indique-cual-wrapper").hide();
    
    	
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-1").click(function(){
    		 
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").hide();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").hide();
    	jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-otros-lugares-que-usa-para-animacion-a-la-lectura-wrapper").hide();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura").hide();
    		jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-indique-cual-wrapper").hide();
    		 
    });
    
     jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-2").click(function(){
    		 
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").show();
    		 
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").show();
    	//jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").show();
    	jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-otros-lugares-que-usa-para-animacion-a-la-lectura-wrapper").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura").show();
    		
    		 
    });
       jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-3").click(function(){
    		 
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").show();
    	//jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").show();
    	jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-otros-lugares-que-usa-para-animacion-a-la-lectura-wrapper").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura").show();
    		
    		 
    });
    
       jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-4").click(function(){
    		 
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").show();
    	//jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").show();
    	jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-otros-lugares-que-usa-para-animacion-a-la-lectura-wrapper").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura").show();
    		
    		 
    });
       jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-5").click(function(){
    		 
    		 jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").show();
    	jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").show();
    	//jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").show();
    	jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-otros-lugares-que-usa-para-animacion-a-la-lectura-wrapper").show();
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura").show();
    		
    		 
    });
    
    
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura-1").click(
    		function(){
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-indique-cual-wrapper").show();
    });
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-las-actividades-de-promocion-han-sido-realizadas-realizadas-en-el-marco-de-alguna-politica-plan-o-programa-de-lectura-2").click(
    		function(){
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-indique-cual-wrapper").hide();
    });
    
    
    
    
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").hide();
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-1").click(function(){
    		jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").hide();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").hide();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-2").click(function(){
    		jQuery(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").show();
    });
    
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-3").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").show();
    });
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-4").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").show();
    });
    jQuery("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-5").click(function(){
    		jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").show();
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").show();
    });
    
    
     jQuery("#edit-submitted-infraestructura-edilicia-indicar-con-que-entidad-comparte-el-edificio-wrapper").hide();
     jQuery("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-1").click(
     		function(){jQuery("#edit-submitted-infraestructura-edilicia-indicar-con-que-entidad-comparte-el-edificio-wrapper").hide();}
     ); 
     jQuery("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-2").click(
     		function(){jQuery("#edit-submitted-infraestructura-edilicia-indicar-con-que-entidad-comparte-el-edificio-wrapper").show();}
     ); 
    
    jQuery("#edit-submitted-horario-horarios-sabados-wrapper").hide();
    jQuery("#edit-submitted-horario-horarios-domingos-wrapper").hide()
    jQuery("#edit-submitted-horario-horarios-feriados-wrapper").hide()
    $("#edit-submitted-horario-la-biblioteca-esta-abierta-1").click(
    	function(){
    		if(this.checked){
    			jQuery("#edit-submitted-horario-horarios-sabados-wrapper").show();
    		}
    		else {
    			jQuery("#edit-submitted-horario-horarios-sabados-wrapper").hide();
    		}
    	}
    );
    $("#edit-submitted-horario-la-biblioteca-esta-abierta-2").click(
    	function(){
    		if(this.checked){
    			jQuery("#edit-submitted-horario-horarios-domingos-wrapper").show();
    		}
    		else {
    			jQuery("#edit-submitted-horario-horarios-domingos-wrapper").hide();
    		}
    	}
    );
    $("#edit-submitted-horario-la-biblioteca-esta-abierta-3").click(
    	function(){
    		if(this.checked){
    			jQuery("#edit-submitted-horario-horarios-feriados-wrapper").show();
    		}
    		else {
    			jQuery("#edit-submitted-horario-horarios-feriados-wrapper").hide();
    		}
    	}
    );
    
    
    
    jQuery("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene").before("<a name=\"options1\" id=\"options1\"></a>");
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").before("<a name=\"optionsAlfabetizacion\" id=\"optionsAlfabetizacion\"></a>");
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").before("<a name=\"optionsTalleres\" id=\"optionsTalleres\"></a>");   
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").before("<a name=\"optionsDifuBP\" id=\"optionsDifuBP\"></a>");
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").before("<a name=\"optionsEventosArtisticos\" id=\"optionsEventosArtisticos\"></a>");
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").before("<a name=\"optionsPromoDchos\" id=\"optionsPromoDchos\"></a>");
    jQuery("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").before("<a name=\"optionsAnim\" id=\"optionsAnim\"></a>");
    
    
    jQuery("#edit-submit").click(
    	function(){
    			if($("#edit-submitted-7recursos-humanos-bibliotecarios-profesionales-percibe-en--una-remuneracion-mensual-por-su-trabajo-1").is(":checked")){
    				
    				if($("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene input:checkbox:checked").size() == 0){
    					window.location="#options1";
    					$("#webform-component-7recursos-humanos--bibliotecarios-profesionales--esta-remuneracion-proviene").css("border","1px dotted red");
    					alert("Debes declarar de donde proviene la remuneración.");
    					return false;
    				}
    				
    			}
    			
    			
    			
    			
    			
    			if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-2").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-3").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-4").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-frecuencia-5").is(":checked")){
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios input:checkbox:checked").size() == 0){
    					window.location="#optionsAnim";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--destinatarios").css("border","1px dotted red");
    					alert("Debes declarar los destinatarios.");
    					return false;
    				}
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar input:checkbox:checked").size() == 0){
    					window.location="#optionsAnim";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--lugar").css("border","1px dotted red");
    					alert("Debes declarar el lugar.");
    					return false;
    				}
    				
    				if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-aninacion-a-la-lectura-lugar-2").is(":checked")){
    					
    					if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca input:checkbox:checked").size() == 0){
    					window.location="#optionsAnim";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--aninacion-a-la-lectura--que-lugar-utilizan-con-mayor-frecuencia-para-la-animacion-de-la-lectura-fuera-de-la-biblioteca").css("border","1px dotted red");
    					alert("Debes especificar los lugares que usan fuera de la biblioteca.");
    					return false;
    				}
    				
    				
    				}
    				
    				
    			}
    			
    			
    			
    			
    			
    			
    			
    			
    			
    				if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-2").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-3").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-4").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-participacion-ciudadana-frecuencia-participacion-ciudadana-5").is(":checked")){
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana input:checkbox:checked").size() == 0){
    					window.location="#optionsPromoDchos";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--destinatarios-participacion-ciudadana").css("border","1px dotted red");
    					alert("Debes declarar los destinatarios.");
    					return false;
    				}
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana input:checkbox:checked").size() == 0){
    					window.location="#optionsPromoDchos";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--participacion-ciudadana--lugar-participacion-ciudadana").css("border","1px dotted red");
    					alert("Debes declarar el lugar.");
    					return false;
    				}
    				
    			}
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    					if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-2").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-3").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-4").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-eventos-artisticos-frecuencia-eventos-artisticos-5").is(":checked")){
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos input:checkbox:checked").size() == 0){
    					window.location="#optionsEventosArtisticos";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--destinatarios-eventos-artisticos").css("border","1px dotted red");
    					alert("Debes declarar los destinatarios.");
    					return false;
    				}
    				if($(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos input:checkbox:checked").size() == 0){
    					window.location="#optionsEventosArtisticos";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--eventos-artisticos--lugar-eventos-artisticos").css("border","1px dotted red");
    					alert("Debes declarar el lugar.");
    					return false;
    				}
    				
    			}
    			
    			
    			
    			
    			
    			
    			
    			if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-2").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-3").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-4").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-capacitacion-frecuencia-capacitacion-5").is(":checked")){
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion input:checkbox:checked").size() == 0){
    					window.location="#optionsTalleres";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--destinatarios-capacitacion").css("border","1px dotted red");
    					alert("Debes declarar los destinatarios.");
    					return false;
    				}
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion input:checkbox:checked").size() == 0){
    					window.location="#optionsTalleres";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--capacitacion--lugar-capacitacion").css("border","1px dotted red");
    					alert("Debes declarar el lugar.");
    					return false;
    				}
    				
    			}
    			
    			
    			
    			
    			
    			
    				if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-2").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-3").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-4").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-promocion-bp-frecuencia-promocion-bp-5").is(":checked")){
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp input:checkbox:checked").size() == 0){
    					window.location="#optionsDifuBP";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--destinatarios-promocion-bp").css("border","1px dotted red");
    					alert("Debes declarar los destinatarios.");
    					return false;
    				}
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios input:checkbox:checked").size() == 0){
    					window.location="#optionsDifuBP";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--especificar-destinatarios").css("border","1px dotted red");
    					alert("Debes especificar los destinatarios.");
    					return false;
    				}
    				
    				
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp input:checkbox:checked").size() == 0){
    					window.location="#optionsDifuBP";
    					$(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--lugar-promocion-bp").css("border","1px dotted red");
    					alert("Debes declarar el lugar.");
    					return false;
    				}
    				
    				
    				if($(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion input:checkbox:checked").size() == 0){
    					window.location="#optionsDifuBP";
    					$(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").css("border","1px dotted red");
    					alert("Debes declarar el o los medios utilizados para promoción y difusión.");
    					return false;
    				}
    					
    				
    			}
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			
    			if($("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-2").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-3").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-4").is(":checked") || $("#edit-submitted-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca-alfabetizacion-frecuencia-alfabetizacion-5").is(":checked")){
    				
    				if($(" #webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion input:checkbox:checked").size() == 0){
    					window.location="#optionsAlfabetizacion";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--destinatarios-alfabetizacion").css("border","1px dotted red");
    					alert("Debes declarar los destinatarios.");
    					return false;
    				}
    				if($("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion input:checkbox:checked").size() == 0){
    					window.location="#optionsAlfabetizacion";
    					$("#webform-component-proyectos-y-actividades-regulares-y-permanentes-de-la-biblioteca--alfabetizacion--lugar-alfabetizacion").css("border","1px dotted red");
    					alert("Debes declarar el lugar.");
    					return false;
    				}
    				
    			}
    			
    			
    			
    	
    		
    			
    		
    	}
    );
    
    
    $("#edit-submitted-otros-fondos-provienen-de-especificar-origen-otros-fondos-wrapper").hide();
    $("#edit-submitted-otros-fondos-provienen-de-origen-de-otros-fondos-12").click(
    	function(){
    		if(this.checked){
    			$("#edit-submitted-otros-fondos-provienen-de-especificar-origen-otros-fondos-wrapper").show();
    		}
    		else {
    			$("#edit-submitted-otros-fondos-provienen-de-especificar-origen-otros-fondos-wrapper").hide();
    		}
    	}
    );
    

});'
  ,'inline'
);


  // If editing or viewing submissions, display the navigation at the top.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    
   
    print drupal_render($form['navigation']);
    print drupal_render($form['submission_info']);
   
  }

/*
fieldset_labels_on_left_table( $form['submitted']['datos_generales'], true, -50 );
fieldset_labels_on_left_table( $form['submitted']['horario'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['horarios_de_verano'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['asociados_actuales'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['usuarios'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['libros'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['edificio'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['biblioteca_y_material_multimedia'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['hemeroteca'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['comunicacion'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['eventos_artisticos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['capacitacion'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['promocion_bp'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['alfabetizacion'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['apoyo_escolar'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['sistemas_operativos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['equipamiento_en_uso'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['participacion_ciudadana'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['infraestructura_edilicia'], true, -10 );
//fieldset_subfieldsets_to_table( $form['submitted']['manana'], $personal_info_header );
fieldset_labels_on_left_table( $form['submitted']['aninacion_a_la_lectura'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['planificacion_y_evaluacion'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['articulacion'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['financiamiento'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['servicios_de_prestamos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['otro_tipo_de_servicios'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['municipal'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['provincial'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['nacional'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['internacional'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['otros_ingresos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['8_recursos_economicos_2'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['7recursos_humanos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['personal_rentado'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['acciones_y_proyectos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['de_estas_computadoras_cuantas_son_para'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['detalle_financiamiento_externo'], true, -10 );
*/
  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  
  print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  print drupal_render($form);

  // Print out the navigation again at the bottom.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    unset($form['navigation']['#printed']);
    print drupal_render($form['navigation']);
  }




