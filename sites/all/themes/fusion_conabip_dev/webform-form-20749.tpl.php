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
    
 
	


    
   
   
   

   
  
});'
  ,'inline'
);


  // If editing or viewing submissions, display the navigation at the top.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    
   
    print drupal_render($form['navigation']);
    print drupal_render($form['submission_info']);
   
  }


  print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  print drupal_render($form);

  // Print out the navigation again at the bottom.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    unset($form['navigation']['#printed']);
    print drupal_render($form['navigation']);
  }




