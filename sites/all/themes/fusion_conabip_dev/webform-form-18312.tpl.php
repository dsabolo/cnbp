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
drupal_add_js ('
$(document).ready(function(){
    //Tipo de Edificio
    $("#webform-component-seleccion-del-material-bibliografico--en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci").hide();
    $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
    $("#edit-submitted-seleccion-del-material-bibliografico-el-material-bibliografico-adquirido-fue-seleccionado-anticipadamente-1").click(function(){
       if(this.checked) {
		$("#webform-component-seleccion-del-material-bibliografico--en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci").show();
	}
    })
    $("#edit-submitted-seleccion-del-material-bibliografico-el-material-bibliografico-adquirido-fue-seleccionado-anticipadamente-2").click(function(){
         if(this.checked) {
    		$("#webform-component-seleccion-del-material-bibliografico--en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci").hide();
    		$("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
	}
    })
/*
    $("#edit-submitted-seleccion-del-material-bibliografico-en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci-1").click(function(){
         if(this.checked) {
               $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
        }
    })
    $("#edit-submitted-seleccion-del-material-bibliografico-en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci-2").click(function(){
         if(this.checked) {
               $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
        }
    })
    $("#edit-submitted-seleccion-del-material-bibliografico-en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci-3").click(function(){
         if(this.checked) {
               $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
        }
    })
    $("#edit-submitted-seleccion-del-material-bibliografico-en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci-4").click(function(){
         if(this.checked) {
               $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
        }
    }) 
*/
    $("#edit-submitted-seleccion-del-material-bibliografico-en-el-caso-de-que-el-material-haya-sido-seleccionado-previamente-existieron-instancias-de-participacion-de-bibliotecarios-soci-5").click(function(){
         if(this.checked) {
               $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").show(); 
        }
	else {
               $("#webform-component-seleccion-del-material-bibliografico--especifique-otro").hide();
	}
    })
});'
  ,'inline'
);


  // If editing or viewing submissions, display the navigation at the top.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    print drupal_render($form['navigation']);
    print drupal_render($form['submission_info']);
  }

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
