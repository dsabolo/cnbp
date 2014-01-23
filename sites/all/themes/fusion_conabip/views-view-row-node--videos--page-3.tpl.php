<?php 
$query=db_query('SELECT node.nid FROM node, content_field_prensa  WHERE content_field_prensa.nid = node.nid AND content_field_prensa.field_prensa_value = 1 AND node.type="video" AND node.status=1 ORDER BY node.created DESC LIMIT 1');
if(db_affected_rows()>0){
	while($result=db_fetch_array($query)){
		$nodoVideo=node_load($result['nid']);
	}
	print '<h1 class="title">'.$nodoVideo->title.'</h1>';

	print node_view($nodoVideo, false, true);
	
	
}

?>