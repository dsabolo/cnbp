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
    $("#webform-component-cc").hide();
    $("#webform-component-propio").hide();
    if ($("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-1:checked").val() == "propio") {
	$("#webform-component-propio").show();
    }
    $("#webform-component-en_comodato").hide();
    if ($("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-2:checked").val() == "comodato") {
	$("#webform-component-en_comodato").show();
    }
    $("#webform-component-alquilado").hide();
    if ($("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-3:checked").val() == "alquilado") {
	$("#webform-component-alquilado").show();
    }
    $("#webform-component-prestado").hide();
    if ($("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-4:checked").val() == "prestado") {
	$("#webform-component-prestado").show();
    }

    //Edificio compartido
    $("#webform-component-edificio_compartido").hide();
    if ($("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-2:checked").val() == "compartido") {
        $("#webform-component-edificio_compartido").show(400);
    }

    //Otro SW de catalogacion
    $("#webform-component-otro_software_de_catalogacion").hide();
    if ($("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-4:checked").val() == "otro") {
        $("#webform-component-otro_software_de_catalogacion").show(400);
    }

    //Otros servicios
    $("#webform-component-especifique_servicio").hide();
    if ($("#edit-submitted-otro-tipo-de-servicios-marque-con-una-cruz-11:checked").val() == "otros") {
        $("#webform-component-especifique_servicio").show(400);
    }
    
    //Detalle Financiamiento externo
    $("#webform-component-detalle_financiamiento_externo").hide();
    if ($("#edit-submitted-personal-rentado-cantidad-con-financiamiento-externo-a-la-biblioteca").val() != "" ) {
        $("#webform-component-detalle_financiamiento_externo").show();
    }

        // Persona 1 Oculto los campos
    $("#webform-component-otra_tarea_persona_1").hide();
    $("#edit-submitted-persona-uno-otra-tarea-persona-1-wrapper").hide();
    $("#webform-component-titulo_persona_1").hide();
    $("#edit-submitted-persona-uno-titulo-persona-1-wrapper").hide();
    if ($("#edit-submitted-persona-uno-tareas-que-desempena-persona-1-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_1").show();
        $("#edit-submitted-persona-uno-otra-tarea-persona-1-wrapper").show();
    }
    if ($("#edit-submitted-persona-uno-maximo-nivel-alcanzado-persona-1").val() == "terciario" || $("#edit-submitted-persona-uno-maximo-nivel-alcanzado-persona-1").val() == "universitario") {
        $("#webform-component-titulo_persona_1").show();
        $("#edit-submitted-persona-uno-titulo-persona-1-wrapper").show();
    }

        // Persona 2 Oculto los campos
    $("#webform-component-otra_tarea_persona_2").hide();
    $("#edit-submitted-persona-dos-otra-tarea-persona-2-wrapper").hide();
    $("#webform-component-titulo_persona_2").hide();
    $("#edit-submitted-persona-dos-titulo-persona-2-wrapper").hide();
    if ($("#edit-submitted-persona-dos-tareas-que-desempena-persona-2-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_2").show();
        $("#edit-submitted-persona-dos-otra-tarea-persona-2-wrapper").show();
    }
    if ($("#edit-submitted-persona-dos-maximo-nivel-alcanzado-persona-2").val() == "terciario" || $("#edit-submitted-persona-dos-maximo-nivel-alcanzado-persona-2").val() == "universitario") {
        $("#webform-component-titulo_persona_2").show();
        $("#edit-submitted-persona-dos-titulo-persona-2-wrapper").show();
    }

        // Persona 3 Oculto los campos
    $("#webform-component-otra_tarea_persona_3").hide();
    $("#edit-submitted-persona-tres-otra-tarea-persona-3-wrapper").hide();
    $("#webform-component-titulo_persona_3").hide();
    $("#edit-submitted-persona-tres-titulo-persona-3-wrapper").hide();
    if ($("#edit-submitted-persona-tres-tareas-que-desempena-persona-3-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_3").show();
        $("#edit-submitted-persona-tres-otra-tarea-persona-3-wrapper").show();
    }
    if ($("#edit-submitted-persona-tres-maximo-nivel-alcanzado-persona-3").val() == "terciario" || $("#edit-submitted-persona-tres-maximo-nivel-alcanzado-persona-3").val() == "universitario") {
        $("#webform-component-titulo_persona_3").show();
        $("#edit-submitted-persona-tres-titulo-persona-3-wrapper").show();
    }

        // Persona 4 Oculto los campos
    $("#webform-component-otra_tarea_persona_4").hide();
    $("#webform-component-titulo_persona_4").hide();
    $("#edit-submitted-persona-cuatro-otra-tarea-persona-4-wrapper").hide();
    $("#edit-submitted-persona-cuatro-titulo-persona-4-wrapper").hide();
    if ($("#edit-submitted-persona-cuatro-tareas-que-desempena-persona-4-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_4").show();
        $("#edit-submitted-persona-cuatro-otra-tarea-persona-4-wrapper").show();
    }
    if ($("#edit-submitted-persona-cuatro-maximo-nivel-alcanzado-persona-4").val() == "terciario" || $("#edit-submitted-persona-cuatro-maximo-nivel-alcanzado-persona-4").val() == "universitario") {
        $("#webform-component-titulo_persona_4").show();
        $("#edit-submitted-persona-cuatro-titulo-persona-4-wrapper").show();
    }

        // Persona 5 Oculto los campos
    $("#webform-component-otra_tarea_persona_5").hide();
    $("#webform-component-titulo_persona_5").hide();
    $("#edit-submitted-persona-cinco-otra-tarea-persona-5-wrapper").hide();
    $("#edit-submitted-persona-cinco-titulo-persona-5-wrapper").hide();
    if ($("#edit-submitted-persona-cinco-tareas-que-desempena-persona-5-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_5").show();
        $("#edit-submitted-persona-cinco-otra-tarea-persona-5-wrapper").show();
    }
    if ($("#edit-submitted-persona-cinco-maximo-nivel-alcanzado-persona-5").val() == "terciario" || $("#edit-submitted-persona-cinco-maximo-nivel-alcanzado-persona-5").val() == "universitario") {
        $("#webform-component-titulo_persona_5").show();
        $("#edit-submitted-persona-cinco-titulo-persona-5-wrapper").show();
    }

        // Persona 6 Oculto los campos
    $("#webform-component-otra_tarea_persona_6").hide();
    $("#webform-component-titulo_persona_6").hide();
    $("#edit-submitted-persona-seis-otra-tarea-persona-6-wrapper").hide();
    $("#edit-submitted-persona-seis-titulo-persona-6-wrapper").hide();
    if ($("#edit-submitted-persona-seis-tareas-que-desempena-persona-6-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_6").show();
        $("#edit-submitted-persona-seis-otra-tarea-persona-6-wrapper").show();
    }
    if ($("#edit-submitted-persona-seis-maximo-nivel-alcanzado-persona-6").val() == "terciario" || $("#edit-submitted-persona-seis-maximo-nivel-alcanzado-persona-6").val() == "universitario") {
        $("#webform-component-titulo_persona_6").show();
        $("#edit-submitted-persona-seis-titulo-persona-6-wrapper").show();
    }

        // Persona 7 Oculto los campos
    $("#webform-component-otra_tarea_persona_7").hide();
    $("#webform-component-titulo_persona_7").hide();
    $("#edit-submitted-persona-siete-otra-tarea-persona-7-wrapper").hide();
    $("#edit-submitted-persona-siete-titulo-persona-7-wrapper").hide();
    if ($("#edit-submitted-persona-siete-tareas-que-desempena-persona-7-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_7").show();
        $("#edit-submitted-persona-siete-otra-tarea-persona-7-wrapper").show();
    }
    if ($("#edit-submitted-persona-siete-maximo-nivel-alcanzado-persona-7").val() == "terciario" || $("#edit-submitted-persona-siete-maximo-nivel-alcanzado-persona-7").val() == "universitario") {
        $("#webform-component-titulo_persona_7").show();
        $("#edit-submitted-persona-siete-titulo-persona-7-wrapper").show();
    }

        // Persona 8 Oculto los campos
    $("#webform-component-otra_tarea_persona_8").hide();
    $("#webform-component-titulo_persona_8").hide();
    $("#edit-submitted-persona-ocho-otra-tarea-persona-8-wrapper").hide();
    $("#edit-submitted-persona-ocho-titulo-persona-8-wrapper").hide();
    if ($("#edit-submitted-persona-ocho-tareas-que-desempena-persona-8-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_8").show();
        $("#edit-submitted-persona-ocho-otra-tarea-persona-8-wrapper").show();
    }
    if ($("#edit-submitted-persona-ocho-maximo-nivel-alcanzado-persona-8").val() == "terciario" || $("#edit-submitted-persona-ocho-maximo-nivel-alcanzado-persona-8").val() == "universitario") {
        $("#webform-component-titulo_persona_8").show();
        $("#edit-submitted-persona-ocho-titulo-persona-8-wrapper").show();
    }


        // Persona 9 Oculto los campos
    $("#webform-component-otra_tarea_persona_9").hide();
    $("#webform-component-titulo_persona_9").hide();
    $("#edit-submitted-persona-nueve-otra-tarea-persona-9-wrapper").hide();
    $("#edit-submitted-persona-nueve-titulo-persona-9-wrapper").hide();
    if ($("#edit-submitted-persona-nueve-tareas-que-desempena-persona-9-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_9").show();
        $("#edit-submitted-persona-nueve-otra-tarea-persona-9-wrapper").show();
    }
    if ($("#edit-submitted-persona-nueve-maximo-nivel-alcanzado-persona-9").val() == "terciario" || $("#edit-submitted-persona-nueve-maximo-nivel-alcanzado-persona-9").val() == "universitario") {
        $("#webform-component-titulo_persona_9").show();
        $("#edit-submitted-persona-nueve-titulo-persona-9-wrapper").show();
    }

        // Persona 10 Oculto los campos
    $("#webform-component-otra_tarea_persona_10").hide();
    $("#webform-component-titulo_persona_10").hide();
    $("#edit-submitted-persona-diez-otra-tarea-persona-10-wrapper").hide();
    $("#edit-submitted-persona-diez-titulo-persona-10-wrapper").hide();
    if ($("#edit-submitted-persona-diez-tareas-que-desempena-persona-10-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_10").show();
        $("#edit-submitted-persona-diez-otra-tarea-persona-10-wrapper").show();
    }
    if ($("#edit-submitted-persona-diez-maximo-nivel-alcanzado-persona-10").val() == "terciario" || $("#edit-submitted-persona-diez-maximo-nivel-alcanzado-persona-10").val() == "universitario") {
        $("#webform-component-titulo_persona_10").show();
        $("#edit-submitted-persona-diez-titulo-persona-10-wrapper").show();
    }


        // Persona 11 Oculto los campos
    $("#webform-component-otra_tarea_persona_11").hide();
    $("#webform-component-titulo_persona_11").hide();
    $("#edit-submitted-persona-once-otra-tarea-persona-11-wrapper").hide();
    $("#edit-submitted-persona-once-titulo-persona-11-wrapper").hide();
    if ($("#edit-submitted-persona-once-tareas-que-desempena-persona-11-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_11").show();
        $("#edit-submitted-persona-once-otra-tarea-persona-11-wrapper").show();
    }
    if ($("#edit-submitted-persona-once-maximo-nivel-alcanzado-persona-11").val() == "terciario" || $("#edit-submitted-persona-once-maximo-nivel-alcanzado-persona-11").val() == "universitario") {
        $("#webform-component-titulo_persona_11").show();
        $("#edit-submitted-persona-once-titulo-persona-11-wrapper").show();
    }

        // Persona 12 Oculto los campos
    $("#webform-component-otra_tarea_persona_12").hide();
    $("#webform-component-titulo_persona_12").hide();
    $("#edit-submitted-persona-doce-otra-tarea-persona-12-wrapper").hide();
    $("#edit-submitted-persona-doce-titulo-persona-12-wrapper").hide();
    if ($("#edit-submitted-persona-doce-tareas-que-desempena-persona-12-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_12").show();
        $("#edit-submitted-persona-doce-otra-tarea-persona-12-wrapper").show();
    }
    if ($("#edit-submitted-persona-doce-maximo-nivel-alcanzado-persona-12").val() == "terciario" || $("#edit-submitted-persona-doce-maximo-nivel-alcanzado-persona-12").val() == "universitario") {
        $("#webform-component-titulo_persona_12").show();
        $("#edit-submitted-persona-doce-titulo-persona-12-wrapper").show();
    }

        // Persona 13 Oculto los campos
    $("#webform-component-otra_tarea_persona_13").hide();
    $("#webform-component-titulo_persona_13").hide();
    $("#edit-submitted-persona-trece-otra-tarea-persona-13-wrapper").hide();
    $("#edit-submitted-persona-trece-titulo-persona-13-wrapper").hide();
    if ($("#edit-submitted-persona-trece-tareas-que-desempena-persona-13-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_13").show();
        $("#edit-submitted-persona-trece-otra-tarea-persona-13-wrapper").show();
    }
    if ($("#edit-submitted-persona-trece-maximo-nivel-alcanzado-persona-13").val() == "terciario" || $("#edit-submitted-persona-trece-maximo-nivel-alcanzado-persona-13").val() == "universitario") {
        $("#webform-component-titulo_persona_13").show();
        $("#edit-submitted-persona-trece-titulo-persona-13-wrapper").show();
    }

        // Persona 14 Oculto los campos
    $("#webform-component-otra_tarea_persona_14").hide();
    $("#webform-component-titulo_persona_14").hide();
    $("#edit-submitted-persona-catorce-otra-tarea-persona-14-wrapper").hide();
    $("#edit-submitted-persona-catorce-titulo-persona-14-wrapper").hide();
    if ($("#edit-submitted-persona-catorce-tareas-que-desempena-persona-14-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_14").show();
        $("#edit-submitted-persona-catorce-otra-tarea-persona-14-wrapper").show();
    }
    if ($("#edit-submitted-persona-catorce-maximo-nivel-alcanzado-persona-14").val() == "terciario" || $("#edit-submitted-persona-catorce-maximo-nivel-alcanzado-persona-14").val() == "universitario") {
        $("#webform-component-titulo_persona_14").show();
        $("#edit-submitted-persona-catorce-titulo-persona-14-wrapper").show();
    }

        // Persona 15 Oculto los campos
    $("#webform-component-otra_tarea_persona_15").hide();
    $("#webform-component-titulo_persona_15").hide();
    $("#edit-submitted-persona-15-otra-tarea-persona-15-wrapper").hide();
    $("#edit-submitted-persona-15-titulo-persona-15-wrapper").hide();
    if ($("#edit-submitted-persona-15-tareas-que-desempena-persona-15-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_15").show();
        $("#edit-submitted-persona-15-otra-tarea-persona-15-wrapper").show();
    }
    if ($("#edit-submitted-persona-15-maximo-nivel-alcanzado-persona-15").val() == "terciario" || $("#edit-submitted-persona-15-maximo-nivel-alcanzado-persona-15").val() == "universitario") {
        $("#webform-component-titulo_persona_15").show();
        $("#edit-submitted-persona-16-titulo-persona-16-wrapper").show();
    }

        // Persona 16 Oculto los campos
    $("#webform-component-otra_tarea_persona_16").hide();
    $("#webform-component-titulo_persona_16").hide();
    $("#edit-submitted-persona-16-otra-tarea-persona-16-wrapper").hide();
    $("#edit-submitted-persona-16-titulo-persona-16-wrapper").hide();
    if ($("#edit-submitted-persona-16-tareas-que-desempena-persona-16-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_16").show();
        $("#edit-submitted-persona-16-otra-tarea-persona-16-wrapper").show();
    }
    if ($("#edit-submitted-persona-16-maximo-nivel-alcanzado-persona-16").val() == "terciario" || $("#edit-submitted-persona-16-maximo-nivel-alcanzado-persona-16").val() == "universitario") {
        $("#webform-component-titulo_persona_16").show();
        $("#edit-submitted-persona-16-titulo-persona-16-wrapper").show();
    }

        // Persona 17 Oculto los campos
    $("#webform-component-otra_tarea_persona_17").hide();
    $("#webform-component-titulo_persona_17").hide();
    $("#edit-submitted-persona-17-otra-tarea-persona-17-wrapper").hide();
    $("#edit-submitted-persona-17-titulo-persona-17-wrapper").hide();
    if ($("#edit-submitted-persona-17-tareas-que-desempena-persona-17-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_17").show();
        $("#edit-submitted-persona-17-otra-tarea-persona-17-wrapper").show();
    }
    if ($("#edit-submitted-persona-17-maximo-nivel-alcanzado-persona-17").val() == "terciario" || $("#edit-submitted-persona-17-maximo-nivel-alcanzado-persona-17").val() == "universitario") {
        $("#webform-component-titulo_persona_17").show();
        $("#edit-submitted-persona-17-titulo-persona-17-wrapper").show();
    }

        // Persona 18 Oculto los campos
    $("#webform-component-otra_tarea_persona_18").hide();
    $("#webform-component-titulo_persona_18").hide();
    $("#edit-submitted-persona-18-otra-tarea-persona-18-wrapper").hide();
    $("#edit-submitted-persona-18-titulo-persona-18-wrapper").hide();
    if ($("#edit-submitted-persona-18-tareas-que-desempena-persona-18-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_18").show();
        $("#edit-submitted-persona-18-otra-tarea-persona-18-wrapper").show();
    }
    if ($("#edit-submitted-persona-18-maximo-nivel-alcanzado-persona-18").val() == "terciario" || $("#edit-submitted-persona-18-maximo-nivel-alcanzado-persona-18").val() == "universitario") {
        $("#webform-component-titulo_persona_18").show();
        $("#edit-submitted-persona-18-titulo-persona-18-wrapper").show();
    }

        // Persona 19 Oculto los campos
    $("#webform-component-otra_tarea_persona_19").hide();
    $("#webform-component-titulo_persona_19").hide();
    $("#edit-submitted-persona-19-otra-tarea-persona-19-wrapper").hide();
    $("#edit-submitted-persona-19-titulo-persona-19-wrapper").hide();
    if ($("#edit-submitted-persona-19-tareas-que-desempena-persona-19-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_19").show();
        $("#edit-submitted-persona-19-otra-tarea-persona-19-wrapper").show();
    }
    if ($("#edit-submitted-persona-19-maximo-nivel-alcanzado-persona-19").val() == "terciario" || $("#edit-submitted-persona-19-maximo-nivel-alcanzado-persona-19").val() == "universitario") {
        $("#webform-component-titulo_persona_19").show();
        $("#edit-submitted-persona-19-titulo-persona-19-wrapper").show();
    }

        // Persona 20 Oculto los campos
    $("#webform-component-otra_tarea_persona_20").hide();
    $("#webform-component-titulo_persona_20").hide();
    $("#edit-submitted-persona-20-otra-tarea-persona-20-wrapper").hide();
    $("#edit-submitted-persona-20-titulo-persona-20-wrapper").hide();
    if ($("#edit-submitted-persona-20-tareas-que-desempena-persona-20-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_20").show();
        $("#edit-submitted-persona-20-otra-tarea-persona-20-wrapper").show();
    }
    if ($("#edit-submitted-persona-20-maximo-nivel-alcanzado-persona-20").val() == "terciario" || $("#edit-submitted-persona-20-maximo-nivel-alcanzado-persona-20").val() == "universitario") {
        $("#webform-component-titulo_persona_20").show();
        $("#edit-submitted-persona-20-titulo-persona-20-wrapper").show();
    }

        // Persona 21 Oculto los campos
    $("#webform-component-otra_tarea_persona_21").hide();
    $("#webform-component-titulo_persona_21").hide();
    $("#edit-submitted-persona-21-otra-tarea-persona-21-wrapper").hide();
    $("#edit-submitted-persona-21-titulo-persona-21-wrapper").hide();
    if ($("#edit-submitted-persona-21-tareas-que-desempena-persona-21-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_21").show();
        $("#edit-submitted-persona-21-otra-tarea-persona-21-wrapper").show();
    }
    if ($("#edit-submitted-persona-21-maximo-nivel-alcanzado-persona-21").val() == "terciario" || $("#edit-submitted-persona-21-maximo-nivel-alcanzado-persona-21").val() == "universitario") {
        $("#webform-component-titulo_persona_21").show();
        $("#edit-submitted-persona-21-titulo-persona-21-wrapper").show();
    }

        // Persona 22 Oculto los campos
    $("#webform-component-otra_tarea_persona_22").hide();
    $("#webform-component-titulo_persona_22").hide();
    $("#edit-submitted-persona-22-otra-tarea-persona-22-wrapper").hide();
    $("#edit-submitted-persona-22-titulo-persona-22-wrapper").hide();
    if ($("#edit-submitted-persona-22-tareas-que-desempena-persona-22-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_22").show();
        $("#edit-submitted-persona-22-otra-tarea-persona-22-wrapper").show();
    }
    if ($("#edit-submitted-persona-22-maximo-nivel-alcanzado-persona-22").val() == "terciario" || $("#edit-submitted-persona-22-maximo-nivel-alcanzado-persona-22").val() == "universitario") {
        $("#webform-component-titulo_persona_22").show();
        $("#edit-submitted-persona-22-titulo-persona-22-wrapper").show();
    }

        // Persona 23 Oculto los campos
    $("#webform-component-otra_tarea_persona_23").hide();
    $("#webform-component-titulo_persona_23").hide();
    $("#edit-submitted-persona-23-otra-tarea-persona-23-wrapper").hide();
    $("#edit-submitted-persona-23-titulo-persona-23-wrapper").hide();
    if ($("#edit-submitted-persona-23-tareas-que-desempena-persona-23-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_23").show();
        $("#edit-submitted-persona-23-otra-tarea-persona-23-wrapper").show();
    }
    if ($("#edit-submitted-persona-23-maximo-nivel-alcanzado-persona-23").val() == "terciario" || $("#edit-submitted-persona-23-maximo-nivel-alcanzado-persona-23").val() == "universitario") {
        $("#webform-component-titulo_persona_23").show();
        $("#edit-submitted-persona-23-titulo-persona-23-wrapper").show();
    }

        // Persona 24 Oculto los campos
    $("#webform-component-otra_tarea_persona_24").hide();
    $("#webform-component-titulo_persona_24").hide();
    $("#edit-submitted-persona-24-otra-tarea-persona-24-wrapper").hide();
    $("#edit-submitted-persona-24-titulo-persona-24-wrapper").hide();
    if ($("#edit-submitted-persona-24-tareas-que-desempena-persona-24-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_24").show();
        $("#edit-submitted-persona-24-otra-tarea-persona-24-wrapper").show();
    }
    if ($("#edit-submitted-persona-24-maximo-nivel-alcanzado-persona-24").val() == "terciario" || $("#edit-submitted-persona-24-maximo-nivel-alcanzado-persona-24").val() == "universitario") {
        $("#webform-component-titulo_persona_24").show();
        $("#edit-submitted-persona-24-titulo-persona-24-wrapper").show();
    }

        // Persona 25 Oculto los campos
    $("#webform-component-otra_tarea_persona_25").hide();
    $("#webform-component-titulo_persona_25").hide();
    $("#edit-submitted-persona-25-otra-tarea-persona-25-wrapper").hide();
    $("#edit-submitted-persona-25-titulo-persona-25-wrapper").hide();
    if ($("#edit-submitted-persona-25-tareas-que-desempena-persona-25-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_25").show();
        $("#edit-submitted-persona-25-otra-tarea-persona-25-wrapper").show();
    }
    if ($("#edit-submitted-persona-25-maximo-nivel-alcanzado-persona-25").val() == "terciario" || $("#edit-submitted-persona-25-maximo-nivel-alcanzado-persona-25").val() == "universitario") {
        $("#webform-component-titulo_persona_25").show();
        $("#edit-submitted-persona-25-titulo-persona-25-wrapper").show();
    }

        // Persona 26 Oculto los campos
    $("#webform-component-otra_tarea_persona_26").hide();
    $("#webform-component-titulo_persona_26").hide();
    $("#edit-submitted-persona-26-otra-tarea-persona-26-wrapper").hide();
    $("#edit-submitted-persona-26-titulo-persona-26-wrapper").hide();
    if ($("#edit-submitted-persona-26-tareas-que-desempena-persona-26-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_26").show();
        $("#edit-submitted-persona-26-otra-tarea-persona-26-wrapper").show();
    }
    if ($("#edit-submitted-persona-26-maximo-nivel-alcanzado-persona-26").val() == "terciario" || $("#edit-submitted-persona-26-maximo-nivel-alcanzado-persona-26").val() == "universitario") {
        $("#webform-component-titulo_persona_26").show();
        $("#edit-submitted-persona-26-titulo-persona-26-wrapper").show();
    }

        // Persona 27 Oculto los campos
    $("#webform-component-otra_tarea_persona_27").hide();
    $("#webform-component-titulo_persona_27").hide();
    $("#edit-submitted-persona-27-otra-tarea-persona-27-wrapper").hide();
    $("#edit-submitted-persona-27-titulo-persona-27-wrapper").hide();
    if ($("#edit-submitted-persona-27-tareas-que-desempena-persona-27-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_27").show();
        $("#edit-submitted-persona-27-otra-tarea-persona-27-wrapper").show();
    }
    if ($("#edit-submitted-persona-27-maximo-nivel-alcanzado-persona-27").val() == "terciario" || $("#edit-submitted-persona-27-maximo-nivel-alcanzado-persona-27").val() == "universitario") {
        $("#webform-component-titulo_persona_27").show();
        $("#edit-submitted-persona-27-titulo-persona-27-wrapper").show();
    }

        // Persona 28 Oculto los campos
    $("#webform-component-otra_tarea_persona_28").hide();
    $("#webform-component-titulo_persona_28").hide();
    $("#edit-submitted-persona-28-otra-tarea-persona-28-wrapper").hide();
    $("#edit-submitted-persona-28-titulo-persona-28-wrapper").hide();
    if ($("#edit-submitted-persona-28-tareas-que-desempena-persona-28-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_28").show();
        $("#edit-submitted-persona-28-otra-tarea-persona-28-wrapper").show();
    }
    if ($("#edit-submitted-persona-28-maximo-nivel-alcanzado-persona-28").val() == "terciario" || $("#edit-submitted-persona-28-maximo-nivel-alcanzado-persona-28").val() == "universitario") {
        $("#webform-component-titulo_persona_28").show();
        $("#edit-submitted-persona-28-titulo-persona-28-wrapper").show();
    }

        // Persona 29 Oculto los campos
    $("#webform-component-otra_tarea_persona_29").hide();
    $("#webform-component-titulo_persona_29").hide();
    $("#edit-submitted-persona-29-otra-tarea-persona-29-wrapper").hide();
    $("#edit-submitted-persona-29-titulo-persona-29-wrapper").hide();
    if ($("#edit-submitted-persona-29-tareas-que-desempena-persona-29-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_29").show();
        $("#edit-submitted-persona-29-otra-tarea-persona-29-wrapper").show();
    }
    if ($("#edit-submitted-persona-29-maximo-nivel-alcanzado-persona-29").val() == "terciario" || $("#edit-submitted-persona-29-maximo-nivel-alcanzado-persona-29").val() == "universitario") {
        $("#webform-component-titulo_persona_29").show();
        $("#edit-submitted-persona-29-titulo-persona-29-wrapper").show();
    }

        // Persona 30 Oculto los campos
    $("#webform-component-otra_tarea_persona_30").hide();
    $("#webform-component-titulo_persona_30").hide();
    $("#edit-submitted-persona-30-otra-tarea-persona-30-wrapper").hide();
    $("#edit-submitted-persona-30-titulo-persona-30-wrapper").hide();
    if ($("#edit-submitted-persona-30-tareas-que-desempena-persona-30-12:checked").val() == "otras") {
        $("#webform-component-otra_tarea_persona_30").show();
        $("#edit-submitted-persona-30-otra-tarea-persona-30-wrapper").show();
    }
    if ($("#edit-submitted-persona-30-maximo-nivel-alcanzado-persona-30").val() == "terciario" || $("#edit-submitted-persona-30-maximo-nivel-alcanzado-persona-30").val() == "universitario") {
        $("#webform-component-titulo_persona_30").show();
        $("#edit-submitted-persona-30-titulo-persona-30-wrapper").show();
    }

        $("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-1").click(function(){
            if(this.checked) {
		$("#webform-component-alquilado").hide(400);
		$("#webform-component-prestado").hide(400);
                $("#webform-component-en_comodato").hide(400);
                $("#webform-component-propio").show(400);
            }
        })
        $("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-2").click(function(){
            if(this.checked) {
		$("#webform-component-alquilado").hide(400);
		$("#webform-component-prestado").hide(400);
                $("#webform-component-propio").hide(400);
                $("#webform-component-en_comodato").show(400);                
            }
        })
        $("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-3").click(function(){
            if(this.checked) {
		$("#webform-component-prestado").hide(400);
                $("#webform-component-en_comodato").hide(400);
                $("#webform-component-propio").hide(400);
		$("#webform-component-alquilado").show(400);                
            }
        })
        $("#edit-submitted-edificio-el-edificio-en-que-funciona-la-biblioteca-es-4").click(function(){
            if(this.checked) {
		$("#webform-component-alquilado").hide(400);
                $("#webform-component-en_comodato").hide(400);
                $("#webform-component-propio").hide(400);
		$("#webform-component-prestado").show(400);                
            }
        })
        $("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-2").click(function(){
            if(this.checked) {
                $("#webform-component-edificio_compartido").show(400);
            }
        })
        $("#edit-submitted-infraestructura-edilicia-seleccionar-segun-corresponda-1").click(function(){
            if(this.checked) {
                $("#webform-component-edificio_compartido").hide(400);
            }
        })
	// Campo para agregar otro SW de catalogacion
        $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-1").click(function(){
            if(this.checked) {
                $("#webform-component-otro_software_de_catalogacion").hide(400);
            }
        })
        $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-2").click(function(){
            if(this.checked) {
                $("#webform-component-otro_software_de_catalogacion").hide(400);
            }
        })
        $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-3").click(function(){
            if(this.checked) {
                $("#webform-component-otro_software_de_catalogacion").hide(400);
            }
        })
        $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-4").click(function(){
            if(this.checked) {
                $("#webform-component-otro_software_de_catalogacion").show(400);
            }
        })
	// Campo de otros servicios
        $("#edit-submitted-otro-tipo-de-servicios-marque-con-una-cruz-11").click(function(){
            if(this.checked) {
		$("#webform-component-especifique_servicio").show(400);
            }
	    else {
                $("#webform-component-especifique_servicio").hide(400);
		}
        })
        // Persona 1 Otra tarea 
        $("#edit-submitted-persona-uno-tareas-que-desempena-persona-1-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_1").show();
                $("#edit-submitted-persona-uno-otra-tarea-persona-1-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_1").hide();
		$("#edit-submitted-persona-uno-otra-tarea-persona-1-wrapper").hide();
            }
        })
	// Persona 1 Titulo
        $("#edit-submitted-persona-uno-maximo-nivel-alcanzado-persona-1").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_1").show();
                $("#edit-submitted-persona-uno-titulo-persona-1-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_1").hide();
		$("#edit-submitted-persona-uno-titulo-persona-1-wrapper").hide();
            }
        })
        // Persona 2 Titulo
        $("#edit-submitted-persona-dos-maximo-nivel-alcanzado-persona-2").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_2").show();
                $("#edit-submitted-persona-dos-titulo-persona-2-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_2").hide();
                $("#edit-submitted-persona-dos-titulo-persona-2-wrapper").hide();
            }
        })
        // Persona 2 Otra tarea
        $("#edit-submitted-persona-dos-tareas-que-desempena-persona-2-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_2").show();
                $("#edit-submitted-persona-dos-otra-tarea-persona-2-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_2").hide();
                $("#edit-submitted-persona-dos-otra-tarea-persona-2-wrapper").hide();
            }
        })
        // Persona 3 Titulo
        $("#edit-submitted-persona-tres-maximo-nivel-alcanzado-persona-3").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_3").show();
                $("#edit-submitted-persona-tres-titulo-persona-3-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_3").hide();
                $("#edit-submitted-persona-tres-titulo-persona-3-wrapper").hide();
            }
        })
        // Persona 3 Otra tarea
        $("#edit-submitted-persona-tres-tareas-que-desempena-persona-3-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_3").show();
                $("#edit-submitted-persona-tres-otra-tarea-persona-3-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_3").hide();
                $("#edit-submitted-persona-tres-otra-tarea-persona-3-wrapper").hide();
            }
        })
        // Persona 4 Titulo
        $("#edit-submitted-persona-cuatro-maximo-nivel-alcanzado-persona-4").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_4").show();
                $("#edit-submitted-persona-cuatro-titulo-persona-4-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_4").hide();
                $("#edit-submitted-persona-cuatro-titulo-persona-4-wrapper").hide();
            }
        })
        // Persona 4 Otra tarea
        $("#edit-submitted-persona-cuatro-tareas-que-desempena-persona-4-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_4").show();
                $("#edit-submitted-persona-cuatro-otra-tarea-persona-4-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_4").hide();
                $("#edit-submitted-persona-cuatro-otra-tarea-persona-4-wrapper").hide();
            }
        })
        // Persona 5 Titulo
        $("#edit-submitted-persona-cinco-maximo-nivel-alcanzado-persona-5").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_5").show();
                $("#edit-submitted-persona-cinco-titulo-persona-5-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_5").hide();
                $("#edit-submitted-persona-cinco-titulo-persona-5-wrapper").hide();
            }
        })
        // Persona 5 Otra tarea
        $("#edit-submitted-persona-cinco-tareas-que-desempena-persona-5-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_5").show();
                $("#edit-submitted-persona-cinco-otra-tarea-persona-5-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_5").hide();
                $("#edit-submitted-persona-cinco-otra-tarea-persona-5-wrapper").hide();
            }
        })
        // Persona 6 Titulo
        $("#edit-submitted-persona-seis-maximo-nivel-alcanzado-persona-6").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_6").show();
                $("#edit-submitted-persona-seis-titulo-persona-6-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_6").hide();
                $("#edit-submitted-persona-seis-titulo-persona-6-wrapper").hide();
            }
        })
        // Persona 6 Otra tarea
        $("#edit-submitted-persona-seis-tareas-que-desempena-persona-6-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_6").show();
                $("#edit-submitted-persona-seis-otra-tarea-persona-6-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_6").hide();
                $("#edit-submitted-persona-seis-otra-tarea-persona-6-wrapper").hide();
            }
        })
        // Persona 7 Titulo
        $("#edit-submitted-persona-siete-maximo-nivel-alcanzado-persona-7").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_7").show();
                $("#edit-submitted-persona-siete-titulo-persona-7-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_7").hide();
                $("#edit-submitted-persona-siete-titulo-persona-7-wrapper").hide();
            }
        })
        // Persona 7 Otra tarea
        $("#edit-submitted-persona-siete-tareas-que-desempena-persona-7-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_7").show();
                $("#edit-submitted-persona-siete-otra-tarea-persona-7-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_7").hide();
                $("#edit-submitted-persona-siete-otra-tarea-persona-7-wrapper").hide();
            }
        })
        // Persona 8 Titulo
        $("#edit-submitted-persona-ocho-maximo-nivel-alcanzado-persona-8").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_8").show();
                $("#edit-submitted-persona-ocho-titulo-persona-8-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_8").hide();
                $("#edit-submitted-persona-ocho-titulo-persona-8-wrapper").hide();
            }
        })
        // Persona 8 Otra tarea
        $("#edit-submitted-persona-ocho-tareas-que-desempena-persona-8-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_8").show();
                $("#edit-submitted-persona-ocho-otra-tarea-persona-8-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_8").hide();
                $("#edit-submitted-persona-ocho-otra-tarea-persona-8-wrapper").hide();
            }
        })
        // Persona 9 Titulo
        $("#edit-submitted-persona-nueve-maximo-nivel-alcanzado-persona-9").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_9").show();
                $("#edit-submitted-persona-nueve-titulo-persona-9-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_9").hide();
                $("#edit-submitted-persona-nueve-titulo-persona-9-wrapper").hide();
            }
        })
        // Persona 9 Otra tarea
        $("#edit-submitted-persona-nueve-tareas-que-desempena-persona-9-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_9").show();
                $("#edit-submitted-persona-nueve-otra-tarea-persona-9-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_9").hide();
                $("#edit-submitted-persona-nueve-otra-tarea-persona-9-wrapper").hide();
            }
        })
        // Persona 10 Titulo
        $("#edit-submitted-persona-diez-maximo-nivel-alcanzado-persona-10").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_10").show();
                $("#edit-submitted-persona-diez-titulo-persona-10-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_10").hide();
                $("#edit-submitted-persona-diez-titulo-persona-10-wrapper").hide();
            }
        })
        // Persona 10 Otra tarea
        $("#edit-submitted-persona-diez-tareas-que-desempena-persona-10-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_10").show();
                $("#edit-submitted-persona-diez-otra-tarea-persona-10-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_10").hide();
                $("#edit-submitted-persona-diez-otra-tarea-persona-10-wrapper").hide();
            }
        })
        // Persona 11 Titulo
        $("#edit-submitted-persona-once-maximo-nivel-alcanzado-persona-11").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_11").show();
                $("#edit-submitted-persona-once-titulo-persona-11-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_11").hide();
                $("#edit-submitted-persona-once-titulo-persona-11-wrapper").hide();
            }
        })
        // Persona 11 Otra tarea
        $("#edit-submitted-persona-once-tareas-que-desempena-persona-11-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_11").show();
                $("#edit-submitted-persona-once-otra-tarea-persona-11-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_11").hide();
                $("#edit-submitted-persona-once-otra-tarea-persona-11-wrapper").hide();
            }
        })
        // Persona 12 Titulo
        $("#edit-submitted-persona-doce-maximo-nivel-alcanzado-persona-12").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_12").show();
                $("#edit-submitted-persona-doce-titulo-persona-12-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_12").hide();
                $("#edit-submitted-persona-doce-titulo-persona-12-wrapper").hide();
            }
        })
        // Persona 12 Otra tarea
        $("#edit-submitted-persona-doce-tareas-que-desempena-persona-12-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_12").show();
                $("#edit-submitted-persona-doce-otra-tarea-persona-12-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_12").hide();
                $("#edit-submitted-persona-doce-otra-tarea-persona-12-wrapper").hide();
            }
        })
        // Persona 13 Titulo
        $("#edit-submitted-persona-trece-maximo-nivel-alcanzado-persona-13").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_13").show();
                $("#edit-submitted-persona-trece-titulo-persona-13-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_13").hide();
                $("#edit-submitted-persona-trece-titulo-persona-13-wrapper").hide();
            }
        })
        // Persona 13 Otra tarea
        $("#edit-submitted-persona-trece-tareas-que-desempena-persona-13-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_13").show();
                $("#edit-submitted-persona-trece-otra-tarea-persona-13-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_13").hide();
                $("#edit-submitted-persona-trece-otra-tarea-persona-13-wrapper").hide();
            }
        })
        // Persona 14 Titulo
        $("#edit-submitted-persona-catorce-maximo-nivel-alcanzado-persona-14").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_14").show();
                $("#edit-submitted-persona-catorce-titulo-persona-14-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_14").hide();
                $("#edit-submitted-persona-catorce-titulo-persona-14-wrapper").hide();
            }
        })
        // Persona 14 Otra tarea
        $("#edit-submitted-persona-catorce-tareas-que-desempena-persona-14-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_14").show();
                $("#edit-submitted-persona-catorce-otra-tarea-persona-14-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_14").hide();
                $("#edit-submitted-persona-catorce-otra-tarea-persona-14-wrapper").hide();
            }
        })
        // Persona 15 Titulo
        $("#edit-submitted-persona-15-maximo-nivel-alcanzado-persona-15").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_15").show();
                $("#edit-submitted-persona-15-titulo-persona-15-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_15").hide();
                $("#edit-submitted-persona-15-titulo-persona-15-wrapper").hide();
            }
        })
        // Persona 15 Otra tarea
        $("#edit-submitted-persona-15-tareas-que-desempena-persona-15-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_15").show();
                $("#edit-submitted-persona-15-otra-tarea-persona-15-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_15").hide();
                $("#edit-submitted-persona-15-otra-tarea-persona-15-wrapper").hide();
            }
        })
        // Persona 16 Titulo
        $("#edit-submitted-persona-16-maximo-nivel-alcanzado-persona-16").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_16").show();
                $("#edit-submitted-persona-16-titulo-persona-16-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_16").hide();
                $("#edit-submitted-persona-16-titulo-persona-16-wrapper").hide();
            }
        })
        // Persona 16 Otra tarea
        $("#edit-submitted-persona-16-tareas-que-desempena-persona-16-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_16").show();
                $("#edit-submitted-persona-16-otra-tarea-persona-16-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_16").hide();
                $("#edit-submitted-persona-16-otra-tarea-persona-16-wrapper").hide();
            }
        })
        // Persona 17 Titulo
        $("#edit-submitted-persona-17-maximo-nivel-alcanzado-persona-17").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_17").show();
                $("#edit-submitted-persona-17-titulo-persona-17-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_17").hide();
                $("#edit-submitted-persona-17-titulo-persona-17-wrapper").hide();
            }
        })
        // Persona 17 Otra tarea
        $("#edit-submitted-persona-17-tareas-que-desempena-persona-17-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_17").show();
                $("#edit-submitted-persona-17-otra-tarea-persona-17-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_17").hide();
                $("#edit-submitted-persona-17-otra-tarea-persona-17-wrapper").hide();
            }
        })
        // Persona 18 Titulo
        $("#edit-submitted-persona-18-maximo-nivel-alcanzado-persona-18").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_18").show();
                $("#edit-submitted-persona-18-titulo-persona-18-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_18").hide();
                $("#edit-submitted-persona-18-titulo-persona-18-wrapper").hide();
            }
        })
        // Persona 18 Otra tarea
        $("#edit-submitted-persona-18-tareas-que-desempena-persona-18-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_18").show();
                $("#edit-submitted-persona-18-otra-tarea-persona-18-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_18").hide();
                $("#edit-submitted-persona-18-otra-tarea-persona-18-wrapper").hide();
            }
        })
        // Persona 19 Titulo
        $("#edit-submitted-persona-19-maximo-nivel-alcanzado-persona-19").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_19").show();
                $("#edit-submitted-persona-19-titulo-persona-19-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_19").hide();
                $("#edit-submitted-persona-19-titulo-persona-19-wrapper").hide();
            }
        })
        // Persona 19 Otra tarea
        $("#edit-submitted-persona-19-tareas-que-desempena-persona-19-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_19").show();
                $("#edit-submitted-persona-19-otra-tarea-persona-19-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_19").hide();
                $("#edit-submitted-persona-19-otra-tarea-persona-19-wrapper").hide();
            }
        })
        // Persona 20 Titulo
        $("#edit-submitted-persona-20-maximo-nivel-alcanzado-persona-20").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_20").show();
                $("#edit-submitted-persona-20-titulo-persona-20-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_20").hide();
                $("#edit-submitted-persona-20-titulo-persona-20-wrapper").hide();
            }
        })
        // Persona 20 Otra tarea
        $("#edit-submitted-persona-20-tareas-que-desempena-persona-20-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_20").show();
                $("#edit-submitted-persona-20-otra-tarea-persona-20-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_20").hide();
                $("#edit-submitted-persona-20-otra-tarea-persona-20-wrapper").hide();
            }
        })
        // Persona 21 Titulo
        $("#edit-submitted-persona-21-maximo-nivel-alcanzado-persona-21").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_21").show();
                $("#edit-submitted-persona-21-titulo-persona-21-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_21").hide();
                $("#edit-submitted-persona-21-titulo-persona-21-wrapper").hide();
            }
        })
        // Persona 21 Otra tarea
        $("#edit-submitted-persona-21-tareas-que-desempena-persona-21-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_21").show();
                $("#edit-submitted-persona-21-otra-tarea-persona-21-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_21").hide();
                $("#edit-submitted-persona-21-otra-tarea-persona-21-wrapper").hide();
            }
        })
        // Persona 22 Titulo
        $("#edit-submitted-persona-22-maximo-nivel-alcanzado-persona-22").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_22").show();
                $("#edit-submitted-persona-22-titulo-persona-22-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_22").hide();
                $("#edit-submitted-persona-22-titulo-persona-22-wrapper").hide();
            }
        })
        // Persona 22 Otra tarea
        $("#edit-submitted-persona-22-tareas-que-desempena-persona-22-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_22").show();
                $("#edit-submitted-persona-22-otra-tarea-persona-22-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_22").hide();
                $("#edit-submitted-persona-22-otra-tarea-persona-22-wrapper").hide();
            }
        })
        // Persona 23 Titulo
        $("#edit-submitted-persona-23-maximo-nivel-alcanzado-persona-23").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_23").show();
                $("#edit-submitted-persona-23-titulo-persona-23-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_23").hide();
                $("#edit-submitted-persona-23-titulo-persona-23-wrapper").hide();
            }
        })
        // Persona 23 Otra tarea
        $("#edit-submitted-persona-23-tareas-que-desempena-persona-23-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_23").show();
                $("#edit-submitted-persona-23-otra-tarea-persona-23-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_23").hide();
                $("#edit-submitted-persona-23-otra-tarea-persona-23-wrapper").hide();
            }
        })
        // Persona 24 Titulo
        $("#edit-submitted-persona-24-maximo-nivel-alcanzado-persona-24").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_24").show();
                $("#edit-submitted-persona-24-titulo-persona-24-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_24").hide();
                $("#edit-submitted-persona-24-titulo-persona-24-wrapper").hide();
            }
        })
        // Persona 24 Otra tarea
        $("#edit-submitted-persona-24-tareas-que-desempena-persona-24-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_24").show();
                $("#edit-submitted-persona-24-otra-tarea-persona-24-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_24").hide();
                $("#edit-submitted-persona-24-otra-tarea-persona-24-wrapper").hide();
            }
        })
        // Persona 25 Titulo
        $("#edit-submitted-persona-25-maximo-nivel-alcanzado-persona-25").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_25").show();
                $("#edit-submitted-persona-25-titulo-persona-25-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_25").hide();
                $("#edit-submitted-persona-25-titulo-persona-25-wrapper").hide();
            }
        })
        // Persona 25 Otra tarea
        $("#edit-submitted-persona-25-tareas-que-desempena-persona-25-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_25").show();
                $("#edit-submitted-persona-25-otra-tarea-persona-25-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_25").hide();
                $("#edit-submitted-persona-25-otra-tarea-persona-25-wrapper").hide();
            }
        })
        // Persona 26 Titulo
        $("#edit-submitted-persona-26-maximo-nivel-alcanzado-persona-26").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_26").show();
                $("#edit-submitted-persona-26-titulo-persona-26-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_26").hide();
                $("#edit-submitted-persona-26-titulo-persona-26-wrapper").hide();
            }
        })
        // Persona 26 Otra tarea
        $("#edit-submitted-persona-26-tareas-que-desempena-persona-26-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_26").show();
                $("#edit-submitted-persona-26-otra-tarea-persona-26-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_26").hide();
                $("#edit-submitted-persona-26-otra-tarea-persona-26-wrapper").hide();
            }
        })
        // Persona 27 Titulo
        $("#edit-submitted-persona-27-maximo-nivel-alcanzado-persona-27").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_27").show();
                $("#edit-submitted-persona-27-titulo-persona-27-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_27").hide();
                $("#edit-submitted-persona-27-titulo-persona-27-wrapper").hide();
            }
        })
        // Persona 27 Otra tarea
        $("#edit-submitted-persona-27-tareas-que-desempena-persona-27-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_27").show();
                $("#edit-submitted-persona-27-otra-tarea-persona-27-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_27").hide();
                $("#edit-submitted-persona-27-otra-tarea-persona-27-wrapper").hide();
            }
        })
        // Persona 28 Titulo
        $("#edit-submitted-persona-28-maximo-nivel-alcanzado-persona-28").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_28").show();
                $("#edit-submitted-persona-28-titulo-persona-28-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_28").hide();
                $("#edit-submitted-persona-28-titulo-persona-28-wrapper").hide();
            }
        })
        // Persona 28 Otra tarea
        $("#edit-submitted-persona-28-tareas-que-desempena-persona-28-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_28").show();
                $("#edit-submitted-persona-28-otra-tarea-persona-28-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_28").hide();
                $("#edit-submitted-persona-28-otra-tarea-persona-28-wrapper").hide();
            }
        })
        // Persona 29 Titulo
        $("#edit-submitted-persona-29-maximo-nivel-alcanzado-persona-29").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_29").show();
                $("#edit-submitted-persona-29-titulo-persona-29-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_29").hide();
                $("#edit-submitted-persona-29-titulo-persona-29-wrapper").hide();
            }
        })
        // Persona 29 Otra tarea
        $("#edit-submitted-persona-29-tareas-que-desempena-persona-29-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_29").show();
                $("#edit-submitted-persona-29-otra-tarea-persona-29-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_29").hide();
                $("#edit-submitted-persona-29-otra-tarea-persona-29-wrapper").hide();
            }
        })
        // Persona 30 Titulo
        $("#edit-submitted-persona-30-maximo-nivel-alcanzado-persona-30").click(function(){
            if(this.value == "terciario" || this.value == "universitario" ) {
                $("#webform-component-titulo_persona_30").show();
                $("#edit-submitted-persona-30-titulo-persona-30-wrapper").show();
            }
            else {
                $("#webform-component-titulo_persona_30").hide();
                $("#edit-submitted-persona-30-titulo-persona-30-wrapper").hide();
            }
        })
        // Persona 30 Otra tarea
        $("#edit-submitted-persona-30-tareas-que-desempena-persona-30-12").click(function(){
            if(this.checked) {
                $("#webform-component-otra_tarea_persona_30").show();
                $("#edit-submitted-persona-30-otra-tarea-persona-30-wrapper").show();
            }
            else {
                $("#webform-component-otra_tarea_persona_30").hide();
                $("#edit-submitted-persona-30-otra-tarea-persona-30-wrapper").hide();
            }
        })
        // Personal Rentado
        $("#edit-submitted-personal-rentado-cantidad-con-financiamiento-externo-a-la-biblioteca").change(function() {
            if(this.value != "") {
                $("#webform-component-detalle_financiamiento_externo").show();
            }
            else {
                $("#webform-component-detalle_financiamiento_externo").hide();
            }
        })

//edit-submitted-persona-uno-maximo-nivel-alcanzado-persona-1


});'
  ,'inline'
);


  // If editing or viewing submissions, display the navigation at the top.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    print drupal_render($form['navigation']);
    print drupal_render($form['submission_info']);
  }

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
fieldset_subfieldsets_to_table( $form['submitted']['manana'], $personal_info_header );
fieldset_labels_on_left_table( $form['submitted']['aninacion_a_la_lectura'], true, -10 );
//#fieldset_subfieldsets_to_table( $form['submitted']['horarios_biblioteca_verano'], $personal_info_header );
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
fieldset_labels_on_left_table( $form['submitted']['persona_uno'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_dos'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_tres'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_cuatro'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_cinco'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_seis'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_siete'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_ocho'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_nueve'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_diez'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_once'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_doce'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_trece'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_catorce'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_15'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_16'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_17'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_18'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_19'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_20'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_21'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_22'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_23'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_24'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_25'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_26'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_27'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_28'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_29'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['persona_30'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['personal_rentado'], true, -10 );
fieldset_labels_on_left_table( $form['submitted']['detalle_financiamiento_externo'], true, -10 );

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
