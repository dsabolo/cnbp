<?php 
	drupal_set_title('Mes de las Bibliotecas Populares');
	
	
	if($_REQUEST['field_fechaevento_value']['value']['day']>1){
	$diaPrevio = $_REQUEST['field_fechaevento_value']['value']['day'] - 1;
	$diaPrevio = '<a class="mesPREV" href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]='.$diaPrevio.'&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]='.$diaPrevio.'">Anterior</a>';
	}
	
		if($_REQUEST['field_fechaevento_value']['value']['day']<30){
	$diaSiguiente = $_REQUEST['field_fechaevento_value']['value']['day'] + 1;
	$diaSiguiente = '<a class="mesNEXT"  href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]='.$diaSiguiente.'&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]='.$diaSiguiente.'">Siguiente</a>';
	}
	

print $diaPrevio.$diaSiguiente;
	
?>
<br><h1 class="titleMes"><span><?php print $_REQUEST['field_fechaevento_value']['value']['day'];?></span> de Septiembre</h1>
<?php 



	//$view_args = array( $node->nid );
$display_id = 'Page_1';
//$view = views_get_view('view_full');
if (!empty($view)) {
print $view->execute_display($display_id , $view_args);
}
print $diaPrevio.$diaSiguiente;
	
?>
<br><h1 class="titleMes"><span><?php print $_REQUEST['field_fechaevento_value']['value']['day'];?></span> de Septiembre</h1>