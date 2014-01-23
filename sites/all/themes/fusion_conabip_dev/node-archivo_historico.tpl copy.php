<?php if ($page==1){
		drupal_set_title($node->field_ah_descripcion[0]['value']);
	}
	?>
<div class="archivoHistorico">
	<div style="text-align:center"><?php print $node->field_ah_adjunto[0]['view'];?>	</div>
	<?php if($page==0){
	?>
		<div class="teaser teaserAgendaBP" style="width:720px !important; background:#e1e1e1;padding:8px!important">
			<div class="thumb" style="border:1px solid #ccc; padding:0px !important; padding-top:2px !important">
			</div>
			<h3 style="border: 0 !important; text-transform:none !important; color:#555 !important; font-size:16px !important"><?php print l($node->field_ah_descripcion[0]['value'],'node/'.$node->nid);?></h3>
		</div
	<?php

	} ?>
	
</div>


<?php if ($page==1):
	drupal_set_title($node->field_ah_descripcion[0]['value']);
print '<div class="volver">'.l('Volver al Archivo Histórico','archivo_historico').'</div><br><br>';
?>

<div style="text-align:center"><?php print $node->field_ah_adjunto[0]['view'];?>	</div>
<div class="teaser teaserAgendaBP" style="width:720px !important; background:#e1e1e1;padding:8px!important">
			<div class="thumb" style="border:1px solid #ccc; padding:0px !important; padding-top:2px !important">
			</div>
			
		</div
<div class="ahDesc">
<?php print $content; ?>
</div>

<div class="ahBP">
<h1>Sobre la Biblioteca</h1>
<?php 
		$bp = node_load($node->field_bp_historica[0]['nid']);
		print node_view($bp);
	
	?>
</div>

<style>
.field-field-ah-adjunto , field-field-bp-historica {
	display: none;
}
.ahBP {
	margin-top:20px;
}
.ahBP h1 {
	font-size: 14px;
}
.ahBP h2 {
	color:#222;
	border: 0 !important;
	margin:0 !important;
}
</style>
<?php endif; ?>