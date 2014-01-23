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
    
    
    //Permitir solo valores numericos
    $("#edit-submitted-asociados-actuales-cantidad-inscriptos").numeric();
    $("#edit-submitted-asociados-actuales-cuantos-de-estos-asociados-poseen-la-cuota-al-dia").numeric();
    $("#edit-submitted-usuarios-ninios").numeric();
    $("#edit-submitted-usuarios-jovenes").numeric();
    $("#edit-submitted-usuarios-adultos").numeric();
    $("#edit-submitted-usuarios-ninos-participantes").numeric();
    $("#edit-submitted-usuarios-jovenes-participantes").numeric();
    $("#edit-submitted-usuarios-adultos-participantes").numeric();
    $("#edit-submitted-libros-cantidad-total-de-ejemplares").numeric();
		$("#edit-submitted-libros-total-de-ejemplares-inventariados").numeric();
    $("#edit-submitted-libros-total-de-ejemplares-clasificados").numeric();
    $("#edit-submitted-material-multimedia-total-de-videos").numeric();
    $("#edit-submitted-material-multimedia-total-de-dvd").numeric();
    $("#edit-submitted-material-multimedia-total-de-cd-rom").numeric();
    $("#edit-submitted-material-multimedia-total-ebooks").numeric();
    $("#edit-submitted-equipamiento-en-uso-computador").numeric();
    $("#edit-submitted-equipamiento-en-uso-de-estas-computadoras-cuantas-son-para-uso-externo-o-publico").numeric();
    $("#edit-submitted-equipamiento-en-uso-de-estas-computadoras-cuantas-son-para-uso-interno").numeric();
    $("#edit-submitted-equipamiento-en-uso-de-estas-computadoras-cuantas-son-para-uso-compartido").numeric();
    $("#edit-submitted-equipamiento-en-uso-impresora").numeric();
    $("#edit-submitted-equipamiento-en-uso-televisor").numeric();
    $("#edit-submitted-equipamiento-en-uso-videocassetera").numeric();
    $("#edit-submitted-equipamiento-en-uso-dvd").numeric();
    $("#edit-submitted-equipamiento-en-uso-equipo-de-audio").numeric();
    $("#edit-submitted-equipamiento-en-uso-fotocopiadora").numeric();
    $("#edit-submitted-equipamiento-en-uso-canon--proyector").numeric();
    $("#edit-submitted-equipamiento-en-uso-camara-para-videoconferencia").numeric();
    $("#edit-submitted-equipamiento-en-uso-camara-filmadora").numeric();
    $("#edit-submitted-equipamiento-en-uso-camara-fotografica-digital").numeric();
    $("#edit-submitted-equipamiento-en-uso-grabador-de-voz").numeric();
    $("#edit-submitted-equipamiento-en-uso-matafuegos").numeric();
    $("#edit-submitted-7recursos-humanos-cuantos-miembros-componen-la-comision-directiva-actualmente").numeric();
    $("#edit-submitted-7recursos-humanos-de-las-personas-que-desempenan-tareas-en-la-bibliotecas-cuantas-reciben-una-remuneracion-por-su-trabajo").numeric();
    $("#edit-submitted-7recursos-humanos-de-las-personas-que-desempenan-tareas-regulares-en-la-biblioteca-cuantas-lo-hacen-de-manera-voluntaria").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-primario-incompleto").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-primario-completo").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-secundario-incompleto").numeric();
    
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-secundario-completo").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-terciario-incompleto").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-terciario-completo").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-terciario-incompleto").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-terciario-completo").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-universitario-incompleto").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecario-universitario-completo").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-universitario-incompleto").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-universitario-completo").numeric();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-indicar-cantidad").numeric();
    
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-estudiantes-menores").numeric();
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-adultos").numeric();
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-jubilados").numeric();
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-grupo-familiar").numeric();
    $("#edit-submitted-cuostas-asociados-monto-de-la-cuota-socio-protector").numeric();
    $("#edit-submitted-servicio-de-prestamos-en-otros-soportes-prestamos-en-sala-otros").numeric();
    $("#edit-submitted-servicio-de-prestamos-en-otros-soportes-prestamos-a-domicilio-otros").numeric();
 
    
    
    
    $("#edit-submitted-equipamiento-en-uso-camara-fotografica-analogica-wrapper").hide();
    
    //Autocompletar Punto #1



	

$("#edit-submitted-datos-generales-ano-de-fundacion-de-la-biblioteca").val("'.$anioFund['data'].'");
//$("#edit-submitted-datos-generales-cantidad-de-habitantes-localidad-2").click();

$("#edit-submitted-datos-generales-direccion").val("'.$dir['data'].'");
$("#edit-submitted-datos-generales-barrio").val("'.$barrio['data'].'");
$("#edit-submitted-datos-generales-localidad").val("'.$loc['data'].'");
$("#edit-submitted-datos-generales-departamento-o-partido").val("'.$dpto['data'].'");
$("#edit-submitted-datos-generales-codigo-postal").val("'.$cp['data'].'");
$("#edit-submitted-datos-generales-provincia").val("'.$prov['data'].'");
$("#edit-submitted-datos-generales-telefono").val("'.$tel['data'].'");
$("#edit-submitted-datos-generales-fax").val("'.$fax['data'].'");
$("#edit-submitted-datos-generales-pagina-web").val("'.$web['data'].'");
$("#edit-submitted-datos-generales-telcel-presidentae-de-la-bp").val("'.$tel1['data'].'");
$("#edit-submitted-datos-generales-telcel-bibliotecariao-de-la-bp").val("'.$tel2['data'].'");

    
    
    
   $("#edit-submitted-datos-generales-nombre-completo-de-la-biblioteca-segun-el-estatuto-social-wrapper").hide(); 
   $("#edit-submitted-horario-horarios-sabados-wrapper").hide();
   $("#edit-submitted-horario-horarios-domingos-wrapper").hide();
   $("#edit-submitted-horario-horarios-feriados-wrapper").hide();
         
   $("#edit-submitted-horario-la-biblioteca-esta-abierta-1").click(function(){
   	  	  if(this.checked) { $("#edit-submitted-horario-horarios-sabados-wrapper").show(); 
   	  	  	 $("#edit-submitted-horario-la-biblioteca-esta-abierta-4").attr("checked", false);
   	  	  }
   	  	  else {$("#edit-submitted-horario-horarios-sabados-wrapper").hide(); }
   }); 
   
    $("#edit-submitted-horario-la-biblioteca-esta-abierta-2").click(function(){
   	  	  if(this.checked) { $("#edit-submitted-horario-horarios-domingos-wrapper").show();
   	  	  	 $("#edit-submitted-horario-la-biblioteca-esta-abierta-4").attr("checked", false);
   	  	   }
   	  	  else {$("#edit-submitted-horario-horarios-domingos-wrapper").hide(); }
   }); 
   
    $("#edit-submitted-horario-la-biblioteca-esta-abierta-3").click(function(){
   	  	  if(this.checked) { 
   	  	  		$("#edit-submitted-horario-horarios-feriados-wrapper").show();
   	  	  	 $("#edit-submitted-horario-la-biblioteca-esta-abierta-4").attr("checked", false);
   	  	  }
   	  	  else {$("#edit-submitted-horario-horarios-feriados-wrapper").hide(); }
   });  
      
      $("#edit-submitted-horario-la-biblioteca-esta-abierta-4").click(function(){
   	  	  if(this.checked) { 
   	  	  	$("#edit-submitted-horario-la-biblioteca-esta-abierta-1").attr("checked", false);
   	  	  	$("#edit-submitted-horario-la-biblioteca-esta-abierta-2").attr("checked", false);
   	  	  	$("#edit-submitted-horario-la-biblioteca-esta-abierta-3").attr("checked", false);
   	  	  	$("#edit-submitted-horario-horarios-sabados").val("");
   	  	  	$("#edit-submitted-horario-horarios-domingos").val("");
   	  	  	$("#edit-submitted-horario-horarios-feriados").val("");
   	  	  	$("#edit-submitted-horario-horarios-sabados-wrapper").hide();
					  
					  $("#edit-submitted-horario-horarios-domingos-wrapper").hide();
	   				$("#edit-submitted-horario-horarios-feriados-wrapper").hide();
   	  	  
   	  	   }
   	  	  
   });  
      
     
     
     $("#webform-component-libros--a-traves-de-que-software-se-informatizo-el-catalogo").hide();
     $("#edit-submitted-libros-utiliza-sw-bibliografico-1").click(
     		function(){
     			 if(this.checked) { 
     			 	   $("#webform-component-libros--a-traves-de-que-software-se-informatizo-el-catalogo").show();
     			 }
     		}
     );
     
     $("#edit-submitted-libros-utiliza-sw-bibliografico-2").click(
     		function(){
     			 if(this.checked) { 
     			 	   $("#webform-component-libros--a-traves-de-que-software-se-informatizo-el-catalogo").hide();
     			 }
     		}
     );
     
     
      
   
    //Tipo de Edificio
    $("#webform-component-cc").hide();
    $("#edit-submitted-infraestructura-edilicia-indicar-con-que-entidad-comparte-el-edificio-1-wrapper").hide();
    $("#webform-component-infraestructura-edilicia--indicar-con-que-entidad-comparte-el-edificio").hide();
    $("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-1").click(function(){
       if(this.checked) {
                $("#edit-submitted-infraestructura-edilicia-indicar-con-que-entidad-comparte-el-edificio-wrapper").hide();
                $("#webform-component-infraestructura-edilicia--indicar-con-que-entidad-comparte-el-edificio").hide();
	}
    })
    $("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-2").click(function(){
         if(this.checked) {
                $("#edit-submitted-infraestructura-edilicia-indicar-con-que-entidad-comparte-el-edificio-wrapper").show();
                $("#webform-component-infraestructura-edilicia--indicar-con-que-entidad-comparte-el-edificio").show();         
	}
    })
    $("#webform-component-libros--otro-software-de-catalogacion").hide();
    $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").hide();
    $("#webform-component-libros--digibepe").hide();
    $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").hide();
    
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-1").click(function(){
         if(this.checked) {
                $("#webform-component-libros--otro-software-de-catalogacion").hide();
                 $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").hide();
                 $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").hide();
                 $("#webform-component-libros--digibepe").show();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-2").click(function(){
         if(this.checked) {
                $("#webform-component-libros--otro-software-de-catalogacion").hide();
                 $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").show();
                 $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").show();
                 $("#webform-component-libros--digibepe").hide();
                
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-3").click(function(){
         if(this.checked) {
                $("#webform-component-libros--otro-software-de-catalogacion").hide();
                $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").show();
                $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").show();
                $("#webform-component-libros--digibepe").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-4").click(function(){
         if(this.checked) {
                $("#webform-component-libros--otro-software-de-catalogacion").hide();
                $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").show();
                $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").show();
                $("#webform-component-libros--digibepe").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-5").click(function(){
         if(this.checked) {
                $("#webform-component-libros--otro-software-de-catalogacion").hide();
                $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").show();
                $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").show();
                $("#webform-component-libros--digibepe").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-6").click(function(){
         if(this.checked) {
                $("#webform-component-libros--otro-software-de-catalogacion").show();
                $("#webform-component-libros--usted-conoce-el-sistema-de-gestion-digibe-que-propone-la-conabip").show();
                $("#webform-component-libros--le-interesaria-incorporase-a-la-red-digital-biblioteca-popular-a-traves-del--uso-de-digibpe-en-la-biblioteca").show();
                $("#webform-component-libros--digibepe").hide();
        }
    })
    $("#edit-submitted-articulacion-actividades-con-otras-instituciones-1").click(function(){
         if(this.checked) {
    		$("#edit-submitted-articulacion-marque-con-una-cruz-wrapper").show();
    		$("#webform-component-articulacion--marque-con-una-cruz").show();
	}
    })
    $("#edit-submitted-articulacion-actividades-con-otras-instituciones-2").click(function(){
         if(this.checked) {
                $("#edit-submitted-articulacion-marque-con-una-cruz-wrapper").hide();
                $("#webform-component-articulacion--marque-con-una-cruz").hide();
        }
    })

    $("#edit-submitted-articulacion-marque-con-una-cruz-wrapper").hide();
    $("#webform-component-articulacion--marque-con-una-cruz").hide();
    $("#webform-component-especifique-servicio").hide();

    $("#edit-submitted-otro-tipo-de-servicios-marque-con-una-cruz-21").click(function(){
         if(this.checked) {
		$("#webform-component-especifique-servicio").show();
        }
	else {
		$("#webform-component-especifique-servicio").hide();
	}
    })

    $("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").hide();
    $("#webform-component-comunicacion--nombre-proveedor-de-internet").hide();
    $("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").hide();
    $("#webform-component-comunicacion--velocidad-de-conexion").hide();
    $("#webform-component-comunicacion--tipo-de-conexion-a-internet").hide();

    $("#edit-submitted-comunicacion-la-biblioteca-tiene-conexion-a-internet-1").click(function(){
         if(this.checked) {
                $("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").show();
                $("#webform-component-comunicacion--nombre-proveedor-de-internet").show();
                $("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").show();
                $("#webform-component-comunicacion--velocidad-de-conexion").show();
                $("#webform-component-comunicacion--tipo-de-conexion-a-internet").show();
        }
    })

    $("#edit-submitted-comunicacion-la-biblioteca-tiene-conexion-a-internet-2").click(function(){
         if(this.checked) {
    		$("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").hide();
    		$("#webform-component-comunicacion--nombre-proveedor-de-internet").hide();
    		$("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").hide();
    		$("#webform-component-comunicacion--velocidad-de-conexion").hide();
    		$("#webform-component-comunicacion--tipo-de-conexion-a-internet").hide();
        }
    })


 $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-municipal-especificar-wrapper").hide();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-provincial-wrapper").hide();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-nacional-especificar-wrapper").hide();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-internacional-especificar-wrapper").hide();

    $("#edit-submitted-8-recursos-economicos-2-la-biblioteca-recibe-algun-tipo-de-subsidio-2").click(function(){
         if(this.checked) {
    		$("#edit-submitted-8-recursos-economicos-2-subsidio-municipal-wrapper").hide();
    		$("#webform-component-8-recursos-economicos-2--subsidio-municipal").hide();
    		 $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-municipal-especificar-wrapper").hide();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-provincial-wrapper").hide();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-nacional-especificar-wrapper").hide();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-internacional-especificar-wrapper").hide();
    		
    		$("#edit-submitted-8-recursos-economicos-2-subsidio-provincial-wrapper").hide();
    		$("#webform-component-8-recursos-economicos-2--subsidio-provincial").hide();
    		$("#edit-submitted-8-recursos-economicos-2-subsidio-nacional-wrapper").hide();
    		$("#webform-component-8-recursos-economicos-2--subsidio-nacional").hide();
    		$("#webform-component-8-recursos-economicos-2--subsidio-internacional").hide();
    		$("#edit-submitted-8-recursos-economicos-2-subsidio-internacional-wrapper").hide();
    		$("#edit-submitted-8-recursos-economicos-2-otro-subsidio-wrapper").hide();
    		$("#webform-component-8-recursos-economicos-2--otro-subsidio").hide();
        }
    })

    $("#edit-submitted-8-recursos-economicos-2-la-biblioteca-recibe-algun-tipo-de-subsidio-1").click(function(){
         if(this.checked) {
                $("#edit-submitted-8-recursos-economicos-2-subsidio-municipal-wrapper").show();
                $("#webform-component-8-recursos-economicos-2--subsidio-municipal").show();
                $("#edit-submitted-8-recursos-economicos-2-subsidio-provincial-wrapper").show();
                $("#webform-component-8-recursos-economicos-2--subsidio-provincial").show();
                $("#edit-submitted-8-recursos-economicos-2-subsidio-nacional-wrapper").show();
                $("#webform-component-8-recursos-economicos-2--subsidio-nacional").show();
                $("#webform-component-8-recursos-economicos-2--subsidio-internacional").show();
                $("#edit-submitted-8-recursos-economicos-2-subsidio-internacional-wrapper").show();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-wrapper").show();
                $("#webform-component-8-recursos-economicos-2--otro-subsidio").show();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-municipal-especificar-wrapper").show();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-provincial-wrapper").show();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-nacional-especificar-wrapper").show();
                $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-internacional-especificar-wrapper").show();
                
        }
    })


    $("#edit-submitted-8-recursos-economicos-2-subsidio-municipal-wrapper").hide();
    $("#webform-component-8-recursos-economicos-2--subsidio-municipal").hide();
    $("#edit-submitted-8-recursos-economicos-2-subsidio-provincial-wrapper").hide();
    $("#webform-component-8-recursos-economicos-2--subsidio-provincial").hide();
    $("#edit-submitted-8-recursos-economicos-2-subsidio-nacional-wrapper").hide();
    $("#webform-component-8-recursos-economicos-2--subsidio-nacional").hide();
    $("#webform-component-8-recursos-economicos-2--subsidio-internacional").hide();
    $("#edit-submitted-8-recursos-economicos-2-subsidio-internacional-wrapper").hide();
    $("#edit-submitted-8-recursos-economicos-2-otro-subsidio-wrapper").hide();
    $("#webform-component-8-recursos-economicos-2--otro-subsidio").hide();

    $("#webform-component-acciones-y-proyectos--otro").hide();
    $("#edit-submitted-acciones-y-proyectos-otro-wrapper").hide();


    $("#edit-submitted-acciones-y-proyectos-marque-con-una-cruz-5").click(function(){
         if(this.checked) {
		$("#edit-submitted-acciones-y-proyectos-otro-wrapper").show();
                $("#webform-component-acciones-y-proyectos--otro").show();
        }
        else {
                $("#webform-component-acciones-y-proyectos--otro").hide();
                $("#edit-submitted-acciones-y-proyectos-otro-wrapper").hide();

        }
    })

	$("#webform-component-horario--en-caso-afirmativo-especificar-meses-y-horarios").hide();

    $("#edit-submitted-horario-cierra-periodo-anio-1").click(function(){
         if(this.checked) {
        $("#webform-component-horario--en-caso-afirmativo-especificar-meses-y-horarios").show();
        }
    })

    $("#edit-submitted-horario-cierra-periodo-anio-2").click(function(){
         if(this.checked) {
        $("#webform-component-horario--en-caso-afirmativo-especificar-meses-y-horarios").hide();
        }
    })


    $("#webform-component-acciones-y-proyectos--marque-con-una-cruz").hide();

    $("#edit-submitted-acciones-y-proyectos-actividades-con-otras-instituciones-1").click(function(){
         if(this.checked) {
        $("#webform-component-acciones-y-proyectos--marque-con-una-cruz").show();
        }
    })

    $("#edit-submitted-acciones-y-proyectos-actividades-con-otras-instituciones-2").click(function(){
         if(this.checked) {
        $("#webform-component-acciones-y-proyectos--marque-con-una-cruz").hide();
        }
    })

    $("#webform-component-fondos-propios--estos-fondos-provienen-de").hide();
    $("#webform-component-fondos-propios--especifique-otros").hide();

    $("#edit-submitted-fondos-propios-la-biblioteca-genera-fondos-propios-1").click(function(){
         if(this.checked) {
    		//$("#webform-component-fondos-propios--estos-fondos-provienen-de").show();
        }
    })

    $("#edit-submitted-fondos-propios-la-biblioteca-genera-fondos-propios-2").click(function(){
         if(this.checked) {
                $("#webform-component-fondos-propios--estos-fondos-provienen-de").hide();
        }
    })

    $("#edit-submitted-fondos-propios-estos-fondos-provienen-de-3").click(function(){
         if(this.checked) {
    		$("#webform-component-fondos-propios--especifique-otros").show();
        }
        else {
    		$("#webform-component-fondos-propios--especifique-otros").hide();
        }
    })


   $("#webform-component-aninacion-a-la-lectura--destinatarios").hide();
   $("#webform-component-aninacion-a-la-lectura--lugar").hide();

    if ($("#edit-submitted-aninacion-a-la-lectura-frecuencia-2:checked").val() == "diaria") {
        $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
        $("#webform-component-aninacion-a-la-lectura--lugar").show();
    }
    if ($("#edit-submitted-aninacion-a-la-lectura-frecuencia-3:checked").val() == "semanal") {
        $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
        $("#webform-component-aninacion-a-la-lectura--lugar").show();
    }
    if ($("#edit-submitted-aninacion-a-la-lectura-frecuencia-4:checked").val() == "mensual") {
        $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
        $("#webform-component-aninacion-a-la-lectura--lugar").show();
    }
    if ($("#edit-submitted-aninacion-a-la-lectura-frecuencia-5:checked").val() == "anual") {
        $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
        $("#webform-component-aninacion-a-la-lectura--lugar").show();
    }


    $("#edit-submitted-aninacion-a-la-lectura-frecuencia-1").click(function(){
         if(this.checked) {
    		$("#webform-component-aninacion-a-la-lectura--destinatarios").hide();
    		$("#webform-component-aninacion-a-la-lectura--lugar").hide();
        }
    })
    $("#edit-submitted-aninacion-a-la-lectura-frecuencia-2").click(function(){
         if(this.checked) {
                $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
                $("#webform-component-aninacion-a-la-lectura--lugar").show();
        }
    })
    $("#edit-submitted-aninacion-a-la-lectura-frecuencia-3").click(function(){
         if(this.checked) {
                $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
                $("#webform-component-aninacion-a-la-lectura--lugar").show();
        }
    })
    $("#edit-submitted-aninacion-a-la-lectura-frecuencia-4").click(function(){
         if(this.checked) {
                $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
                $("#webform-component-aninacion-a-la-lectura--lugar").show();
        }
    })
    $("#edit-submitted-aninacion-a-la-lectura-frecuencia-5").click(function(){
         if(this.checked) {
                $("#webform-component-aninacion-a-la-lectura--destinatarios").show();
                $("#webform-component-aninacion-a-la-lectura--lugar").show();
        }
    })



    $("#webform-component-participacion-ciudadana--destinatarios-participacion-ciudadana").hide();
    $("#webform-component-participacion-ciudadana--lugar-participacion-ciudadana").hide();

    $("#edit-submitted-participacion-ciudadana-frecuencia-participacion-ciudadana-1").click(function(){
         if(this.checked) {
    		$("#webform-component-participacion-ciudadana--destinatarios-participacion-ciudadana").hide();
    		$("#webform-component-participacion-ciudadana--lugar-participacion-ciudadana").hide();
        }
    })
    $("#edit-submitted-participacion-ciudadana-frecuencia-participacion-ciudadana-2").click(function(){
         if(this.checked) {
                $("#webform-component-participacion-ciudadana--destinatarios-participacion-ciudadana").show();
                $("#webform-component-participacion-ciudadana--lugar-participacion-ciudadana").show();
        }
    })
    $("#edit-submitted-participacion-ciudadana-frecuencia-participacion-ciudadana-3").click(function(){
         if(this.checked) {
                $("#webform-component-participacion-ciudadana--destinatarios-participacion-ciudadana").show();
                $("#webform-component-participacion-ciudadana--lugar-participacion-ciudadana").show();
        }
    })
    $("#edit-submitted-participacion-ciudadana-frecuencia-participacion-ciudadana-4").click(function(){
         if(this.checked) {
                $("#webform-component-participacion-ciudadana--destinatarios-participacion-ciudadana").show();
                $("#webform-component-participacion-ciudadana--lugar-participacion-ciudadana").show();
        }
    })
    $("#edit-submitted-participacion-ciudadana-frecuencia-participacion-ciudadana-5").click(function(){
         if(this.checked) {
                $("#webform-component-participacion-ciudadana--destinatarios-participacion-ciudadana").show();
                $("#webform-component-participacion-ciudadana--lugar-participacion-ciudadana").show();
        }
    })

    $("#webform-component-eventos-artisticos--destinatarios-eventos-artisticos").hide();
    $("#webform-component-eventos-artisticos--lugar-eventos-artisticos").hide();

    $("#edit-submitted-eventos-artisticos-frecuencia-eventos-artisticos-1").click(function(){
         if(this.checked) {
    		$("#webform-component-eventos-artisticos--destinatarios-eventos-artisticos").hide();
    		$("#webform-component-eventos-artisticos--lugar-eventos-artisticos").hide();
        }
    })
    $("#edit-submitted-eventos-artisticos-frecuencia-eventos-artisticos-2").click(function(){
         if(this.checked) {
                $("#webform-component-eventos-artisticos--destinatarios-eventos-artisticos").show();
                $("#webform-component-eventos-artisticos--lugar-eventos-artisticos").show();
        }
    })
    $("#edit-submitted-eventos-artisticos-frecuencia-eventos-artisticos-3").click(function(){
         if(this.checked) {
                $("#webform-component-eventos-artisticos--destinatarios-eventos-artisticos").show();
                $("#webform-component-eventos-artisticos--lugar-eventos-artisticos").show();
        }
    })
    $("#edit-submitted-eventos-artisticos-frecuencia-eventos-artisticos-4").click(function(){
         if(this.checked) {
                $("#webform-component-eventos-artisticos--destinatarios-eventos-artisticos").show();
                $("#webform-component-eventos-artisticos--lugar-eventos-artisticos").show();
        }
    })
    $("#edit-submitted-eventos-artisticos-frecuencia-eventos-artisticos-5").click(function(){
         if(this.checked) {
                $("#webform-component-eventos-artisticos--destinatarios-eventos-artisticos").show();
                $("#webform-component-eventos-artisticos--lugar-eventos-artisticos").show();
        }
    })

    $("#webform-component-capacitacion--destinatarios-capacitacion").hide();
    $("#webform-component-capacitacion--lugar-capacitacion").hide();

    $("#edit-submitted-capacitacion-frecuencia-capacitacion-1").click(function(){
         if(this.checked) {
    		$("#webform-component-capacitacion--destinatarios-capacitacion").hide();
    		$("#webform-component-capacitacion--lugar-capacitacion").hide();
        }
    })
    $("#edit-submitted-capacitacion-frecuencia-capacitacion-2").click(function(){
         if(this.checked) {
                $("#webform-component-capacitacion--destinatarios-capacitacion").show();
                $("#webform-component-capacitacion--lugar-capacitacion").show();
        }
    })
    $("#edit-submitted-capacitacion-frecuencia-capacitacion-3").click(function(){
         if(this.checked) {
                $("#webform-component-capacitacion--destinatarios-capacitacion").show();
                $("#webform-component-capacitacion--lugar-capacitacion").show();
        }
    })
    $("#edit-submitted-capacitacion-frecuencia-capacitacion-4").click(function(){
         if(this.checked) {
                $("#webform-component-capacitacion--destinatarios-capacitacion").show();
                $("#webform-component-capacitacion--lugar-capacitacion").show();
        }
    })
    $("#edit-submitted-capacitacion-frecuencia-capacitacion-5").click(function(){
         if(this.checked) {
                $("#webform-component-capacitacion--destinatarios-capacitacion").show();
                $("#webform-component-capacitacion--lugar-capacitacion").show();
        }
    })



    $("#webform-component-promocion-bp--lugar-promocion-bp").hide();
    $("#webform-component-promocion-bp--destinatarios-promocion-bp").hide();
    $("#webform-component-promocion-bp--especificar-destinatarios").hide();
    $("#webform-component-promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").hide();


    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-1").click(function(){
         if(this.checked) {
    		$("#webform-component-promocion-bp--lugar-promocion-bp").hide();
    		$("#webform-component-promocion-bp--destinatarios-promocion-bp").hide();
    		$("#webform-component-promocion-bp--especificar-destinatarios").hide();
    		$("#webform-component-promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").hide();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-2").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
                $("#webform-component-promocion-bp--especificar-destinatarios").show();
                 $("#webform-component-promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-3").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
                $("#webform-component-promocion-bp--especificar-destinatarios").show();
                 $("#webform-component-promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-4").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
                $("#webform-component-promocion-bp--especificar-destinatarios").show();
                 $("#webform-component-promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-5").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
                $("#webform-component-promocion-bp--especificar-destinatarios").show();
                 $("#webform-component-promocion-bp--que-medios-utiliza-para-la-promocion-y-difusion").show();
        }
    })

    $("#webform-component-alfabetizacion--destinatarios-alfabetizacion").hide();
    $("#webform-component-alfabetizacion--lugar-alfabetizacion").hide();

    $("#edit-submitted-alfabetizacion-frecuencia-alfabetizacion-1").click(function(){
         if(this.checked) {
    		$("#webform-component-alfabetizacion--destinatarios-alfabetizacion").hide();
    		$("#webform-component-alfabetizacion--lugar-alfabetizacion").hide();
        }
    })
    $("#edit-submitted-alfabetizacion-frecuencia-alfabetizacion-2").click(function(){
         if(this.checked) {
                $("#webform-component-alfabetizacion--destinatarios-alfabetizacion").show();
                $("#webform-component-alfabetizacion--lugar-alfabetizacion").show();
        }
    })
    $("#edit-submitted-alfabetizacion-frecuencia-alfabetizacion-3").click(function(){
         if(this.checked) {
                $("#webform-component-alfabetizacion--destinatarios-alfabetizacion").show();
                $("#webform-component-alfabetizacion--lugar-alfabetizacion").show();
        }
    })
    $("#edit-submitted-alfabetizacion-frecuencia-alfabetizacion-4").click(function(){
         if(this.checked) {
                $("#webform-component-alfabetizacion--destinatarios-alfabetizacion").show();
                $("#webform-component-alfabetizacion--lugar-alfabetizacion").show();
        }
    })
    $("#edit-submitted-alfabetizacion-frecuencia-alfabetizacion-5").click(function(){
         if(this.checked) {
                $("#webform-component-alfabetizacion--destinatarios-alfabetizacion").show();
                $("#webform-component-alfabetizacion--lugar-alfabetizacion").show();
        }
    })

    $("#webform-component-apoyo-escolar--destinatarios-apoyo-escolar").hide();
    $("#webform-component-apoyo-escolar--lugar-apoyo-escolar").hide();

    $("#edit-submitted-apoyo-escolar-frecuencia-apoyo-escolar-1").click(function(){
         if(this.checked) {
    		$("#webform-component-apoyo-escolar--destinatarios-apoyo-escolar").hide();
    		$("#webform-component-apoyo-escolar--lugar-apoyo-escolar").hide();
        }
    })
    $("#edit-submitted-apoyo-escolar-frecuencia-apoyo-escolar-2").click(function(){
         if(this.checked) {
                $("#webform-component-apoyo-escolar--destinatarios-apoyo-escolar").show();
                $("#webform-component-apoyo-escolar--lugar-apoyo-escolar").show();
        }
    })
    $("#edit-submitted-apoyo-escolar-frecuencia-apoyo-escolar-3").click(function(){
         if(this.checked) {
                $("#webform-component-apoyo-escolar--destinatarios-apoyo-escolar").show();
                $("#webform-component-apoyo-escolar--lugar-apoyo-escolar").show();
        }
    })
    $("#edit-submitted-apoyo-escolar-frecuencia-apoyo-escolar-4").click(function(){
         if(this.checked) {
                $("#webform-component-apoyo-escolar--destinatarios-apoyo-escolar").show();
                $("#webform-component-apoyo-escolar--lugar-apoyo-escolar").show();
        }
    })
    $("#edit-submitted-apoyo-escolar-frecuencia-apoyo-escolar-5").click(function(){
         if(this.checked) {
                $("#webform-component-apoyo-escolar--destinatarios-apoyo-escolar").show();
                $("#webform-component-apoyo-escolar--lugar-apoyo-escolar").show();
        }
    })

    $("#webform-component-8-recursos-economicos-2--desde-que-ano").hide();

    $("#edit-submitted-8-recursos-economicos-2-subsidio-conabip-1").click(function(){
         if(this.checked) {
    		$("#webform-component-8-recursos-economicos-2--desde-que-ano").show();
        }
    })

    $("#edit-submitted-8-recursos-economicos-2-subsidio-conabip-2").click(function(){
         if(this.checked) {
    		$("#webform-component-8-recursos-economicos-2--desde-que-ano").hide();
        }
    })
    
    
    //Ocultar cosas que ya no van
    
    $("#edit-submitted-equipamiento-en-uso-seguro-patrimonial-wrapper").hide();
    $("#edit-submitted-equipamiento-en-uso-sistema-electronico-antirrobo-para-materiales-wrapper").hide();
    $("#edit-submitted-equipamiento-en-uso-sistema-de-alarma-de-edificio-wrapper ").hide();
    
    $("#webform-component-nivel-de-capacitacion-bibliotecologia").hide();
    
    $("#webform-component-7recursos-humanos--bibliotecarios-profesionales").hide();
    $("#edit-submitted-7recursos-humanos-la-biblioteca-cuenta-con-bibliotecarios-profesionales-desempenandose-en-la-misma-2").click(
    	function(){
    		 if(this.checked) {
    		 $("#webform-component-7recursos-humanos--bibliotecarios-profesionales").show();
        }

    	}
    );
    
    $("#edit-submitted-7recursos-humanos-la-biblioteca-cuenta-con-bibliotecarios-profesionales-desempenandose-en-la-misma-1").click(
    	function(){
    		 if(this.checked) {
    		 $("#webform-component-7recursos-humanos--bibliotecarios-profesionales").hide();
        }

    	}
    );
    
    
    $("#webform-component-nivel-de-capacitacion-bibliotecologia--bibliotecarios-profesionales--esta-remuneracion-proviene").hide();
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-especificar-wrapper").hide();
    
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-percibe-en--una-remuneracion-mensual-por-su-trabajo-1").click(function(){
    			 if(this.checked) {
    			 $("#webform-component-nivel-de-capacitacion-bibliotecologia--bibliotecarios-profesionales--esta-remuneracion-proviene").show();
    			   $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-especificar-wrapper").hide();
    			 }
    });
    
     $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-percibe-en--una-remuneracion-mensual-por-su-trabajo-2").click(function(){
    			 if(this.checked) {
    			 $("#webform-component-nivel-de-capacitacion-bibliotecologia--bibliotecarios-profesionales--esta-remuneracion-proviene").hide();
    			   $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-especificar-wrapper").hide();
    			 }
    });
    
    $("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-esta-remuneracion-proviene-5").click(
    	function(){
    			if(this.checked){
    				$("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-especificar-wrapper").show();
    			}
    			else{
    				$("#edit-submitted-nivel-de-capacitacion-bibliotecologia-bibliotecarios-profesionales-especificar-wrapper").hide();
    			}
    	}
    );
    
    
    $("#edit-submitted-cuostas-asociados-monto-de-cuota-por-mes-wrapper").hide();
    $("#edit-submitted-cuostas-asociados-observaciones-wrapper").hide();
    
    
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
