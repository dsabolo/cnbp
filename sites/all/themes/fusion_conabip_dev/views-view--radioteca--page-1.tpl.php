
<?php 
	drupal_set_title("Radioteca");

	if($_GET['term_node_tid_depth']==3046){drupal_set_title('Radio BePé Nacional');
	
		print '<img src="'.base_path().path_to_theme().'/css/images/LOGO_RADIO_N-CHICO.gif" style="margin-left:-25px !important">';
		print '<p>Para conocer la grilla de programación con el día y horario de “Radio Bepé Nacional” en las distintas zonas hace <a target="_blank" href="http://www.conabip.gob.ar/sites/default/files/grilla_radio_bepe-provincia.pdf">clic aquí</a>.</p><p>Si quieres contactarnos, puedes escribirnos a <a href="mailto:radio@bepe.ar">radio@bepe.ar</a></p>';
	
		
		print '<style>
			#views-exposed-form-radioteca-page-1, h1.title {display:none !important}
		</style>';
	}
	elseif($_GET['term_node_tid_depth']==2893){drupal_set_title('Programas Conabip');
		print '<img src="'.base_path().path_to_theme().'/css/images/LOGO_RADIO-CHICO.gif" style="margin-left:-25px !important">';
		print '<!--p>Transmite los miercoles de 16 a 17 horas. Y los jueves a las 11 horas podés escuchar la repetición.</p --><p>Si quieres contactarnos, puedes escribirnos a <a href="mailto:radio@bepe.ar">radio@bepe.ar</a></p>';
				print '<style>
			#views-exposed-form-radioteca-page-1,h1.title {display:none !important}
		</style>';
	}
	else {
		print '<p>Si quieres contactarnos, puedes escribirnos a <a href="mailto:radio@bepe.ar">radio@bepe.ar</a></p>';
		/*Radioteca Menu*/
		print '<div id="menuradioteca">
				<a id="lradioteca2896" href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=2896">Entrevistas a Bibliotecas Populares</a>
			  <a id="lradioteca2897" href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=2897">Entrevistas a Personalidades de la Cultura</a>
			  <a id="lradioteca2898" href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=2898">La Colectiva</a>
			  <a id="lradioteca3087" href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=3087">Libros Contados</a>
			  <a id="lradioteca2899" href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=2899">Spots Institucionales</a>
			</div>';
	}
?>
<br>
<?php 

//$view_args = array( $node->nid );
$display_id = 'Page_1';
//$view = views_get_view('view_full');
if (!empty($view)) {
print $view->execute_display($display_id , $view_args);
print $pager;

}
?>

<br><br><br><br><br>

<!-- div class="panel1_3 panel1_3_1">
		<a href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=3046"><img src="<?php print base_path().path_to_theme(); ?>/css/images/LOGO_RADIO_N-CHICO.gif"> </a>
	</div>
	<div class="panel1_3 panel1_3_2">
		<a href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=2893"><img src="<?php print base_path().path_to_theme(); ?>/css/images/LOGO_RADIO-CHICO.gif"> </a>
	</div>
	<div class="panel1_3 panel1_3_3 last">
		<a href="http://www.conabip.gob.ar/radio/archivo?term_node_tid_depth=2895"><img src="<?php print base_path().path_to_theme(); ?>/css/images/LOGOS_RADIOTECA-CHICO-2012.jpg"> </a>

	</div -->
<style>
.panel1_3 , .panel1_3 * {
	border:0 !important;
	background: transparent !important;
	box-shadow: none !important
}
</style>
<script>
	$('.views-exposed-widgets').hide();
	$('#lradioteca<?php echo $_GET['term_node_tid_depth'];?>').addClass('active');
</script>	