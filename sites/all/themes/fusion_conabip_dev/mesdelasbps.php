<?php
// $Id: page.tpl.php,v 1.1.2.5 2010/04/08 07:02:59 sociotech Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

<head>
<?php 

//Titles en panels
if(drupal_is_front_page()){
	$nodo=node_load(arg(2));
	print '<title>CONABIP :: Comisión Nacional de Bibliotecas Populares</title>';
}
//Titles en panels
elseif(arg(0)=='noticias' && arg(1)=='noticia' && is_numeric(arg(2))){
	$nodo=node_load(arg(2));
	print '<title>'.$nodo->title.' ::  CONABIP</title>';
}


elseif((arg(0)=='pseccion3' OR arg(0)=='psubhome3' OR arg(0)=='psubhome2' OR arg(0)=='pseccion2' OR arg(0)=='vpes' OR arg(0)=='hoja') && is_numeric(arg(1))){
	$nodo=node_load(arg(1));
	print '<title>'.$nodo->title.' ::  CONABIP</title>';
}


else { print  '<title>'.$head_title.'</title>';}
?>

  <?php print $head; ?>
  
  <?php 
  /*No chache en RADIO BP*/
		if(arg(0)=='node' && arg(1)==19131){
			print '<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">';
		}	
	?>
  <?php print $styles; ?>
  <?php print $setting_styles; ?>
  
  
 
  <?php print $local_styles; ?>
  <?php print $scripts; ?>
   <!--[if IE 8]>
  <?php print $ie8_styles; ?>
  <![endif]-->
  <!--[if IE 7]>
  <?php print $ie7_styles; ?>
  <link rel="stylesheet" type="text/CSS" href="<?php print base_path().path_to_theme();?>/css/ie7.css" media="all">

  <![endif]-->
  <!--[if lte IE 6]>
  <?php print $ie6_styles; ?>
  <![endif]-->
  <link rel="stylesheet" type="text/CSS" href="<?php print base_path().path_to_theme();?>/css/override.css" media="all">
  
  <script language="javascript" type="text/javascript" src="<?= base_path().path_to_theme()?>/equalheight.js"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	
</head>

<body id="<?php print $body_id; ?>" class="<?php print $body_classes.' '.$extraClass; ?>">



  <div id="page" class="page">
    <div id="page-inner" class="page-inner">
      <div id="skip">
        <a href="#main-content-area"><?php print t('Skip to Main Content Area'); ?></a>
      </div>

      <!-- header-top row: width = grid_width -->
      <?php print theme('grid_row', $header_top, 'header-top', 'full-width', $grid_width); ?>

      <!-- header-group row: width = grid_width -->
      <div id="header-group-wrapper" class="header-group-wrapper full-width">
        <div id="header-group" class="header-group row <?php print $grid_width; ?>">
          <div id="header-group-inner" class="header-group-inner inner clearfix">
            <?php print theme('grid_block', theme('links', $secondary_links), 'secondary-menu'); ?>
            <?php print theme('grid_block', $search_box, 'search-box'); ?>

            <?php if ($logo || $site_name || $site_slogan): ?>
            <div id="header-site-info" class="header-site-info block">
              <div id="header-site-info-inner" class="header-site-info-inner inner">
                <?php if ($logo): ?>
                <div id="logo">
                  <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><img width="281" height="113" src="<?php print base_path().path_to_theme(); ?>/logo2011.png" alt="<?php print t('Home'); ?>" /></a>
                </div>
                <?php endif; ?>
                <?php if ($site_name || $site_slogan): ?>
                <div id="site-name-wrapper" class="clearfix">
                  <?php if ($site_name): ?>
                  <span id="site-name"><a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></span>
                  <?php endif; ?>
                  <?php if ($site_slogan): ?>
                  <span id="slogan"><?php print $site_slogan; ?></span>
                  <?php endif; ?>
                </div><!-- /site-name-wrapper -->
                <?php endif; ?>
              </div><!-- /header-site-info-inner -->
            </div><!-- /header-site-info -->
            <?php endif; ?>

            <?php print $header; ?>
            <?php print theme('grid_block', $primary_links_tree, 'primary-menu'); ?>
          </div><!-- /header-group-inner -->
        </div><!-- /header-group -->
      </div><!-- /header-group-wrapper -->

      <!-- preface-top row: width = grid_width -->
      <?php print theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width); ?>

      <!-- main row: width = grid_width -->
      <div id="main-wrapper" class="main-wrapper full-width">
        <div id="main" class="main row <?php print $grid_width; ?>">
          <div id="main-inner" class="main-inner inner clearfix">
            
						
						<!-- div id="share">
Compartir
<span class="st_facebook"></span>
<span class="st_twitter"></span>
<span class="st_email" ></span>
<span class="st_sharethis"></span>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
        stLight.options({
                publisher:'f7254c80-8f2f-4323-ab5a-2790005f867c'
        });
</script>
          </div -->



            <!-- main group: width = grid_width - sidebar_first_width -->
            <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
              <div id="main-group-inner" class="main-group-inner inner">
                <?php print theme('grid_row', $preface_bottom, 'preface-bottom', 'nested'); ?>

                <div id="main-content" class="main-content row nested">
                  <div id="main-content-inner" class="main-content-inner inner">
                    <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                    <div id="content-group" class="content-group row nested <?php print $content_group_width; ?>">
                      <div id="content-group-inner" class="content-group-inner inner">
                        <?php print theme('grid_block', $breadcrumb, 'breadcrumbs'); ?>

                        <?php if ($content_top || $help || $messages): ?>
                        <div id="content-top" class="content-top row nested">
                          <div id="content-top-inner" class="content-top-inner inner">
                            <?php print theme('grid_block', $help, 'content-help'); ?>
                            <?php print theme('grid_block', $messages, 'content-messages'); ?>
                            <?php print $content_top; ?>
                          </div><!-- /content-top-inner -->
                        </div><!-- /content-top -->
                        <?php endif; ?>

                        <div id="content-region" class="content-region row nested">
                          <div id="content-region-inner" class="content-region-inner inner">
                            <a name="main-content-area" id="main-content-area"></a>
                            <?php print theme('grid_block', $tabs, 'content-tabs'); ?>
                            <div id="content-inner" class="content-inner block">
                              <div id="content-inner-inner" class="content-inner-inner inner">
                              
                              <img src="http://www.conabip.gob.ar/sites/default/files/BANNER-MES-DE-LAS-BP.jpg"/>
                              
                                <?php if ($title): ?>
                                <!--h1 class="title"><?php print $title; ?></h1 -->
                                <?php endif; ?>
                                
                                <div id="content-content" class="content-content">
                                
                                
                                
                                <style type="text/css">
/* Styling for the title (Month and Year) of the calendar */
#calendar div.title {
    font: x-large Verdana, Arial, Helvetica, sans-serif;
    text-align: center;
    height: 40px;
    background-color: white;
    color: black;
    }
/* Styling for the footer */
#calendar div.footer {
    font: small Verdana, Arial, Helvetica, sans-serif;
    text-align: center;
    }
/* Styling for the overall table */
#calendar table {
    font: 100% Verdana, Arial, Helvetica, sans-serif;
    table-layout: fixed;
    border-collapse: collapse;
    width: 990px;
    }
/* Styling for the column headers (days of the week) */
#calendar th {
    padding: 0 0.5em;
    text-align: center;
    background-color:gray;
    color:white;
    }
/* Styling for the individual cells (days) */
#calendar td  {     
    font-size: medium;
    padding: 0.25em 0.25em;   
    width: 14%; 
    height: 120px;
    text-align: left;
    vertical-align: top;
    }
/* Styling for the date numbers */
#calendar .date  {     
    font-size: large;
    padding: 0.25em 0.25em;   
    text-align: left;
    vertical-align: top;
    }
/* Class for individual days (coming in future release) */
#calendar .sun {
     color:red;
     }
/* Hide the month element (coming in future release) */
#calendar th.month {
    visibility: hidden;
    display:none;
    }
   
  .infoEvento a {
  	clear:both;
  	display: block;
  	font-size: 10px !important;
  	padding:3px;
  	border:1px solid #ddd;
  	background: #f4f4f4;
  	margin-bottom:4px;
  } 
   
#main-group, #main-content, #content-group, #content-group-inner, #content-region, #content-region-inner, #content-inner, #content-inner-inner, #content-content {
	width: 990px !important;
	
}   
#main-group, #main-group * {
	overflow: hidden !important
}
a.mas {
	font-size: 10px;
	text-transform: uppercase;
}
</style>                                
                                
   
   <?php 
   
   function get_events_of_the_day($day){
   
   	$queryStr = "SELECT node.title , node.nid AS nid,
   node_data_field_fechaevento.field_fechaevento_value AS node_data_field_fechaevento_field_fechaevento_value
 FROM node node 
 LEFT JOIN content_field_fechaevento node_data_field_fechaevento ON node.vid = node_data_field_fechaevento.vid
 WHERE ((node.status =1)AND(node.status <> 0) AND (node.type in ('agendabp')))
    AND (((DATE_FORMAT(ADDTIME(node_data_field_fechaevento.field_fechaevento_value, SEC_TO_TIME(-10800)), '%Y-%m-%d') <= '2012-09-".$day."' AND DATE_FORMAT(ADDTIME(node_data_field_fechaevento.field_fechaevento_value2, SEC_TO_TIME(-10800)), '%Y-%m-%d') >= '2012-09-".$day."')))
   ORDER BY node_data_field_fechaevento_field_fechaevento_value ASC LIMIT 2";
   
   
   $queryStr="SELECT node.title, node.nid AS nid,
   node_data_field_fechaevento.field_fechaevento_value AS node_data_field_fechaevento_field_fechaevento_value,
   node_data_field_fechaevento.field_fechaevento_value2 AS node_data_field_fechaevento_field_fechaevento_value2,
node_data_field_fechaevento.field_fechaevento_rrule AS node_data_field_fechaevento_field_fechaevento_rrule
 FROM node node 
 LEFT JOIN content_field_fechaevento node_data_field_fechaevento ON node.vid = node_data_field_fechaevento.vid
 WHERE ((node.status <> 0) AND (node.type in ('agendabp')))
   
   ORDER BY node_data_field_fechaevento_field_fechaevento_value ASC";
   
   
   
   if($_GET['debug']){
   	print_r($queryStr);
   }
   
   	$queryEventos = db_query($queryStr);
   
   	while($resultado = db_fetch_array($queryEventos)) {
   		
   		$fechaDesde = date('d',strtotime($resultado['node_data_field_fechaevento_field_fechaevento_value']));
   		$fechaHasta = date('d',strtotime($resultado['node_data_field_fechaevento_field_fechaevento_value2']));
   		
   		$nodoEvento = node_load($resultado['nid']);
   		$nidBP= $nodoEvento->field_bp[0]['nid'];
   		$nodoBP		= node_load($nidBP);
   		$lugar = $nodoBP->field_provincia[0]['value'];
   		//print_r($nodoEvento);die();
   		if($lugar){
   			$lugar = ' en '.$lugar;
   		}
   
   	
   	
   						// Cond no repeat ($resultado['node_data_field_fechaevento_field_fechaevento_rrule']=='')
   		  if(($day>=$fechaDesde) && ($day<=$fechaHasta) ){
   					$salida.= '<div style="background:#'.substr($nodoEvento->created,-3).'">'.l('BP '.$nodoBP->title.$lugar,'node/'.$resultado['nid'], array('attributes'=>array('style'=>'color:#'.substr($nodoEvento->created,-3),'title'=>$resultado['title']))).'</div>';	
   		}
   	
   	}
   	
   	$dia['01']=1;
   	$dia['02']=2;
   	$dia['03']=3;
   	$dia['04']=4;
   	$dia['05']=5;
   	$dia['06']=6;
   	$dia['07']=7;
   	$dia['08']=8;
   	$dia['09']=9;
   	
   	
   	if($day<10){
   		$day = $dia[$day];
   	}
   	
   	
   	return '<br><div class="infoEvento">'.$salida.'</div><a class="mas" href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]='.$day.'&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]='.$day.'">Ver más</a>';
   }
   
   
   ?>
  
   
                                
              <div id="calendar">
             
<table border="1">
<tr><th>Lun</th><th>Mar</th><th>Mi&eacute;</th><th>Jue</th><th>Vie</th><th>S&aacute;b</th><th>Dom</th></tr>
<tr><td><span class="date">&nbsp;</span></td><td><span class="date">&nbsp;</span></td><td><span class="date">&nbsp;</span></td><td><span class="date">&nbsp;</span></td><td><span class="date">&nbsp;</span></td>



		<td>
			<span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=1&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=1">1</a></span>
			
				<?= get_events_of_the_day('1'); ?>
			</td>
			
			
			<td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=2&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=2">2</a></span>
		<?= get_events_of_the_day('02'); ?>
		</td></tr>
<tr><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=3&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=3">3</a></span><?= get_events_of_the_day('03'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=4&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=4">4</a></span><?= get_events_of_the_day('04'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=5&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=5">5</a></span><?= get_events_of_the_day('05'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=6&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=6">6</a></span><?= get_events_of_the_day('06'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=7&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=7">7</a></span><?= get_events_of_the_day('07'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=8&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=8">8</a></span><?= get_events_of_the_day('08'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=9&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=9">9</a></span><?= get_events_of_the_day('09'); ?></td></tr>
<tr><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=10&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=10">10</a></span><?= get_events_of_the_day('10'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=11&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=11">11</a></span><?= get_events_of_the_day('11'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=12&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=12">12</a></span><?= get_events_of_the_day('12'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=13&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=13">13</a></span><?= get_events_of_the_day('13'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=14&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=14">14</a></span><?= get_events_of_the_day('14'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=15&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=15">15</a></span><?= get_events_of_the_day('15'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=16&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=16">16</a></span><?= get_events_of_the_day('16'); ?></td></tr>
<tr><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=17&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=17">17</a></span><?= get_events_of_the_day('17'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=18&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=18">18</a></span><?= get_events_of_the_day('18'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=19&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=19">19</a></span><?= get_events_of_the_day('19'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=20&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=20">20</a></span><?= get_events_of_the_day('20'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=21&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=21">21</a></span><?= get_events_of_the_day('21'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=22&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=22">22</a></span><?= get_events_of_the_day('22'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=23&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=23">23</a></span><?= get_events_of_the_day('23'); ?></td></tr>
<tr><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=24&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=24">24</a></span><?= get_events_of_the_day('24'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=25&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=25">25</a></span><?= get_events_of_the_day('25'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=26&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=26">26</a></span><?= get_events_of_the_day('26'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=27&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=27">27</a></span><?= get_events_of_the_day('27'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=28&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=28">28</a></span><?= get_events_of_the_day('28'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=29&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=29">29</a></span><?= get_events_of_the_day('29'); ?></td><td><span class="date"><a href="http://www.conabip.gob.ar/mes_de_las_bibliotecas_populares?field_fechaevento_value2[value][year]=2012&field_fechaevento_value2[value][month]=9&field_fechaevento_value2[value][day]=30&field_fechaevento_value[value][year]=2012&field_fechaevento_value[value][month]=9&field_fechaevento_value[value][day]=30">30</a></span><?= get_events_of_the_day('30'); ?></td></tr>
</table>              
              </div>                  
                                
                                
                                
                                </div><!-- /content-content -->
                                
                              </div><!-- /content-inner-inner -->
                            </div><!-- /content-inner -->
                          </div><!-- /content-region-inner -->
                        </div><!-- /content-region -->

                        <?php print theme('grid_row', $content_bottom, 'content-bottom', 'nested'); ?>
                      </div><!-- /content-group-inner -->
                    </div><!-- /content-group -->

                    
                  </div><!-- /main-content-inner -->
                </div><!-- /main-content -->

                <?php print theme('grid_row', $postscript_top, 'postscript-top', 'nested'); ?>
              </div><!-- /main-group-inner -->
            </div><!-- /main-group -->
          </div><!-- /main-inner -->
        </div><!-- /main -->
      </div><!-- /main-wrapper -->

      <!-- postscript-bottom row: width = grid_width -->
      <?php print theme('grid_row', $postscript_bottom, 'postscript-bottom', 'full-width', $grid_width); ?>

      <!-- footer row: width = grid_width -->
      <?php print theme('grid_row', $footer, 'footer', 'full-width', $grid_width); ?>

      <!-- footer-message row: width = grid_width -->
      <div id="footer-message-wrapper" class="footer-message-wrapper full-width">
        <div id="footer-message" class="footer-message row <?php print $grid_width; ?>">
          <div id="footer-message-inner" class="footer-message-inner inner clearfix">
            <?php print theme('grid_block', $footer_message, 'footer-message-text'); ?>
            
                     
          </div><!-- /footer-message-inner -->
     
     
     			    <div id="footlinks">
		   	<a id="lnkCONABIP" href="http://www.cobabip.gov.ar">CONABIP</a>
       	<a id="lnkCULTURA" href="http://www.cultura.gov.ar">SECRETARIA CULTURA DE LA NACION</a>
			</div>
     
        </div><!-- /footer-message -->
        
     
      </div><!-- /footer-message-wrapper -->
		  
    </div><!-- /page-inner -->
  </div><!-- /page -->
  
 
<?php print $closure; ?>
</body>
</html>
