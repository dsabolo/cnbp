
<?php 

/*
* Arbol de colecciones
*/
$colecciones= taxonomy_get_tree(8, $parent = 0, $depth = -1, $max_depth = NULL); //El termino 8 es el de "coleccion"


/*
*	Todas las colecciones
*/

foreach($colecciones as $key){
	//Foto Galeria
	
	$query=db_query('SELECT * FROM content_field_coleccion WHERE field_coleccion_value='.$key->tid.' LIMIT 1');
	if(db_affected_rows()>0){

		while($result = db_fetch_array($query)){
			$nodoImagen=node_load($result['nid']);
		}
		$imagen = false;
		if($nodoImagen->field_imagen[0]['filepath']){
			$imagen=theme('imagecache','FotosChica',$nodoImagen->field_imagen[0]['filepath']);
		}
		
		if($imagen){
				$coleccionesLNKS.='<div class="teaserColeccion">'.$imagen.l($key->name,'fotogaleria-content/'.$key->tid).'<br/>'.$key->description.'</div>';	
	} 
	}
	
	

}

print  $coleccionesLNKS.'';

?>
