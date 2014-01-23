<?php
$view_args = array( $node->nid );
$display_id = 'Page_1';
$view = views_get_view('view_full');
if (!empty($view)) {
print $view->execute_display($display_id , $view_args);
}
?>
