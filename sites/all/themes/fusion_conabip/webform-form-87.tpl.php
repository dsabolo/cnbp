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
    $("#webform-component-otro-software-de-catalogacion").hide();
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-1").click(function(){
         if(this.checked) {
                $("#webform-component-otro-software-de-catalogacion").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-2").click(function(){
         if(this.checked) {
                $("#webform-component-otro-software-de-catalogacion").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-3").click(function(){
         if(this.checked) {
                $("#webform-component-otro-software-de-catalogacion").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-4").click(function(){
         if(this.checked) {
                $("#webform-component-otro-software-de-catalogacion").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-5").click(function(){
         if(this.checked) {
                $("#webform-component-otro-software-de-catalogacion").hide();
        }
    })
    $("#edit-submitted-libros-a-traves-de-que-software-se-informatizo-el-catalogo-6").click(function(){
         if(this.checked) {
                $("#webform-component-otro-software-de-catalogacion").show();
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

    $("#edit-submitted-otro-tipo-de-servicios-marque-con-una-cruz-11").click(function(){
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

    $("#edit-submitted-comunicacion-la-biblioteca-tiene-conexion-a-internet-1").click(function(){
         if(this.checked) {
                $("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").show();
                $("#webform-component-comunicacion--nombre-proveedor-de-internet").show();
                $("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").show();
                $("#webform-component-comunicacion--velocidad-de-conexion").show();
        }
    })

    $("#edit-submitted-comunicacion-la-biblioteca-tiene-conexion-a-internet-2").click(function(){
         if(this.checked) {
    		$("#edit-submitted-comunicacion-nombre-proveedor-de-internet-wrapper").hide();
    		$("#webform-component-comunicacion--nombre-proveedor-de-internet").hide();
    		$("#edit-submitted-comunicacion-velocidad-de-conexion-wrapper").hide();
    		$("#webform-component-comunicacion--velocidad-de-conexion").hide();
        }
    })


    $("#edit-submitted-8-recursos-economicos-2-la-biblioteca-recibe-algun-tipo-de-subsidio-2").click(function(){
         if(this.checked) {
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


    $("#edit-submitted-acciones-y-proyectos-marque-con-una-cruz-7").click(function(){
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
    		$("#webform-component-fondos-propios--estos-fondos-provienen-de").show();
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


    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-1").click(function(){
         if(this.checked) {
    		$("#webform-component-promocion-bp--lugar-promocion-bp").hide();
    		$("#webform-component-promocion-bp--destinatarios-promocion-bp").hide();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-2").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-3").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-4").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
        }
    })
    $("#edit-submitted-promocion-bp-frecuencia-promocion-bp-5").click(function(){
         if(this.checked) {
                $("#webform-component-promocion-bp--lugar-promocion-bp").show();
                $("#webform-component-promocion-bp--destinatarios-promocion-bp").show();
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
