<?php
// $Id: node.tpl.php,v 1.1.2.3 2010/01/11 00:08:12 sociotech Exp $
$queryArchivos = db_query('SELECT nid FROM content_type_archivo_historico WHERE field_bp_historica_nid = '.$node->nid);
$cantidadDocs = db_affected_rows();
if($page == 0) {
?>
<div class="teaser teaserAgendaBP teaserBPH" style="">
			<div class="thumb" style="border:1px solid #ccc; padding:0px !important; padding-top:2px !important">
			
			</div>
			<h3 style="border: 0 !important; text-transform:none !important; color:#555 !important; font-size:16px !important"><?php print l('BP:'.$node->title.'-'.$node->field_nombre_bp[0]['value'],'node/'.$node->nid);?> (<?php echo $cantidadDocs ?> Archivos)</h3>
		
		<?php print $content; ?>
		
		
		
			<div class="clear"></div>
		</div>
<?php
}
else {
drupal_set_title( $node->field_nombre_bp[0]['value']);
?>

<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
  <div class="inner">
    <?php 
    

    print $picture ?>

    <?php if ($page == 0): ?>
    <h2 class="title"><?php print $node->field_nombre_bp[0]['value'] ?></h2> <?php  endif; ?>
    <div class="content clearfix">
      <?php print $content ?>
    </div>

  </div><!-- /inner -->

  <?php if ($node_bottom && !$teaser): ?>
  <div id="node-bottom" class="node-bottom row nested">
    <div id="node-bottom-inner" class="node-bottom-inner inner">
      <?php print $node_bottom; ?>
    </div><!-- /node-bottom-inner -->
  </div><!-- /node-bottom -->
  <?php endif; ?>
</div>
<!-- /node-<?php print $node->nid; ?> -->

<?php 
	

if($cantidadDocs >0){
	print '<h3>Documentos de la Biblioteca ('.$cantidadDocs.')</h3>';
	while($result = db_fetch_array($queryArchivos)){
		$nodoArchivo = node_load($result['nid']);
		print node_view($nodoArchivo, $teaser = true);
	}
}
	
	
	
?>


<?php }?>