
	<?php if($page==0){
	if($node->field_ah_descripcion[0]['value']==''){$node->field_ah_descripcion[0]['value']=$node->title;}
		?>
			<div class="teaser teaserAgendaBP teaserAH" style="">
				<div class="thumb" style="border:1px solid #ccc; padding:0px !important; padding-top:2px !important">
				<?php print l(theme('imagecache','short',$node->field_ah_adjunto[0]['filepath']),'node/'.$node->nid, array('html'=>true)) ?>
				</div>
				<h3 class="title"><?php print l($node->field_ah_descripcion[0]['value'],'node/'.$node->nid);?></h3>
			
			<?php print $content; ?>
			<?php 
			$bp = node_load($node->field_bp_historica[0]['nid']);
			print '<div class="field-item odd"><b class="nameBP">Nro de registro de la Biblioteca: </b>'.$bp->title.' | '.$bp->field_nombre_bp[0]['value'].'</div>';
	                           
			//print node_view($bp);
		
		?>
			
			
				<div class="clear"></div>
			</div>
		<?php

		} ?>

	<?php if ($page==1): 
				drupal_set_title($node->field_ah_descripcion[0]['value']);
				$nidBP= $node->field_bp_historica[0]['nid'];
				$tipo= $node->field_tipo_elemento[0]['value'];
				$peso= $node->field_peso[0]['value'];

				$queryNext = db_query('SELECT nid FROM content_type_archivo_historico WHERE field_bp_historica_nid='.$nidBP.' AND field_peso_value > '.$peso);
				$queryPrev = db_query('SELECT nid FROM content_type_archivo_historico WHERE field_bp_historica_nid='.$nidBP.' AND field_peso_value < '.$peso);
				$result = db_fetch_array($queryNext);
				

				
				if(!empty($result['nid'])){
					$next= '<a  id="ahNext" href="'.base_path().'node/'.$result['nid'].'">Siguiente</a>';
				}

				$result2 = db_fetch_array($queryPrev);
				if(!empty($result2['nid'])){
					$prev= '<a  id="ahPrev" href="'.base_path().'node/'.$result2['nid'].'">Anterior</a>';
				}

				

			
				

				
			
	?>



	<div style="text-align:center"><?php print $node->field_ah_adjunto[0]['view'];?>	</div>
	<div style="float:right; margin-right:50px;"><?php echo $next;?></div>
	<div style="float:left;"><?php echo $prev;?></div>
	<br/><br/>
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
	#sb-container {
		display: none !important
	}
	</style>


	<?php endif; ?>
