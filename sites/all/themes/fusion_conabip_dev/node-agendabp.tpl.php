<?php 

//Valores a utilizarse;

$fecha 		= $node->field_fechaevento[0]['view'];
$nidBP 		= $node->field_bp[0]['nid'];
$nodoBP		= node_load($nidBP);
$lugar[] = $nodoBP->field_localidad[0]['value'];
$lugar[] = $nodoBP->field_provincia[0]['value'];
$lugar = implode(', ',$lugar);
$lugar	= (strlen($lugar)>2)?$lugar:'';
$fotoURL 	=	$node->field_fotoevento[0]['filepath'];
$titulo		= $node->title;

//Teasers
if($page==0): ?>
	<div class="teaser teaserAgendaBP">
		<div class="thumb">
			<?php 
				print theme('imagecache','short',$fotoURL);
			?>	
		</div>
		
		<h4><?php print $lugar;?></h4>
		<h1><?=l($titulo,'node/'.$node->nid);?></h1>
		
		<?php 
			print substr($node->content['body']['#value'],0,220).'…';
			print '<p class="more">'.l('Ver Más','node/'.$node->nid).'</p>';
		?>
	</div>
<?php endif;?>
<?php 
//Detalle

	if($page==1):
	
	
	print theme('imagecache','FotosGrande',$fotoURL);
	?>
	<h4><?php print $lugar;?></h4>
	<h1><?=$titulo;?></h1>
	<h5><?=$fechas;?></h5>

	<?php
	print $node->content['body']['#value'];
	
	?>
	<fieldset>
		<legend>Ubicación del evento</legend>
		<?php 
			print node_view($nodoBP);
		?>
	</fieldset>
	
	<?
	endif;
	?>


