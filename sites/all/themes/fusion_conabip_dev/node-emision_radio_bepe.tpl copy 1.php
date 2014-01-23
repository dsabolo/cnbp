<?php 

//Valores a utilizarse;

$fecha 		= $node->field_fecha_emision[0]['view'];
//$nidBP 		= $node->field_bp[0]['nid'];
//$nodoBP		= node_load($nidBP);
//$lugar[] = $nodoBP->field_localidad[0]['value'];
//$lugar[] = $nodoBP->field_provincia[0]['value'];
//$lugar = implode(', ',$lugar);
//$lugar	= (strlen($lugar)>2)?$lugar:'';
$audio = $node->field_audio[0]['view'];
$fotoURL 	=	$node->field_logo[0]['filepath'];
$titulo		= $node->title;


$linkAudio = l('<img alt="Reproducir" title="Reproducir" src="'.base_path().path_to_theme().'/css/images/video_play.png">','node/'.$node->nid,array('attributes'=>array('target'=>'_blan
k','onclick'=>'window.open(this.href,"Conabip Radio","directories=no, location=no, menubar=no, scrollbars=no, statusbar=no, tittlebar=no, width=220, height=140"); return false;'),'html'=>true, 'query'=>'myajax=1'));
$linkArchivo = l('<img alt="Obtener archivo de audio" title="Obtener archivo de audio" src="'.base_path().path_to_theme().'/css/images/arrow_down.png">',$node->field_audio[0]['filepath'],array('html'=>true));



if($page==1){
//print_r($node);

	print '<style>* { margin:0; padding:0} body { background:#111;}</style><div style="background:#111; height:140px !important; overflow:hidden;">';
	
print '<!--img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/0005.gif" style="position:absolute; z-index:999999; margin-top:100px; margin-left:70px"-->';		
	
 if($fotoURL): 
 
				print theme('imagecache','short',$fotoURL);
		
		endif;
		if(!$fotoURL){
		
			$terms = taxonomy_node_get_terms_by_vocabulary($node, 16, $key = 'tid');
			foreach($terms as $term) {
				$term = $term;
			}
			//print_r($term);
		
			if($term->tid==3046) {
					print '<img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/radioBPNAC.gif">';	
			}
			if($term->tid==2893) {
				print '<img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/radioBPCNBP.gif">';
			}
			if($term->tid!=2893 && $term->tid!=3046 ){
			print '<img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/RADIOTECA_IMAGEN_2.gif">';
			}
			}
	
	print '<div style="margin-top:12px ">'.$audio.'</div>';

	print '</div>';
}

if($page==0):
?>
	<div class="teaser teaserAgendaBP" style="width:720px !important; background:#e1e1e1;padding:8px!important">
		
		
		
		
		<div class="thumb" style="border:1px solid #ccc; padding:0px !important; padding-top:2px !important">
		<?php if($fotoURL){
				print theme('imagecache','short',$fotoURL);
			}
		
		if(!$fotoURL){
		
			$terms = taxonomy_node_get_terms_by_vocabulary($node, 16, $key = 'tid');
			foreach($terms as $term) {
				$term = $term;
			}
			//print_r($term);
		
			if($term->tid==3046) {
					print '<img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/radioBPNAC.gif">';	
			}
			if($term->tid==2893) {
				print '<img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/radioBPCNBP.gif">';
			}
			if($term->tid!=2893 && $term->tid!=3046 ){
			print '<img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/RADIOTECA_IMAGEN_2.gif">';
			}
			}
		?></div>
		
		
		
		
		
		
		
		<!--h4><?php print $fecha;?></h4 -->
		<h3 style="border: 0 !important; text-transform:none !important; color:#555 !important; font-size:16px !important"><?=$titulo;?></h3>
		
		
			
				<div style="text-align:justify; width:415px; float:left"><?php print $node->content['body']['#value']; ?>
					<div style="">	
		<?php 
			print $linkAudio;
			print $linkArchivo;
		?>
		</div>
				</div>
		
			
		
		
		<div class="clear"></div>
	</div>


<?php endif; ?>
