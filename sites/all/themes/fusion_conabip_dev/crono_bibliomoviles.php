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
                              
                              <img src="http://www.conabip.gob.ar/sites/default/files/BANNER_CRONO_BIBLIO.jpg"/>
                              
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
    width: 984px;
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
  	margin-bottom:5px;
  	
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
#filtro a {
	padding-left:10px;
	padding-right:10px;
	border:1px solid #ccc;
	transition:  0.2s;
-moz-transition: 0.2s; /* Firefox 4 */
-webkit-transition: 0.2s; /* Safari and Chrome */
-o-transition:  0.2s; /* Opera */
text-decoration: none;
}
#filtro a.active {
	background: #ccc;
}
#filtro a:hover {
	background: #cecece;
	text-decoration: none;
}
</style>                                
                                
   
   <?php 
   
   function get_events_of_the_day($day,$mes,$anio){
   
   	
   
   
   $queryStr="SELECT node.title, node.nid AS nid,
   node_data_field_fechaevento.field_fechaevento_value AS node_data_field_fechaevento_field_fechaevento_value,
   node_data_field_fechaevento.field_fechaevento_value2 AS node_data_field_fechaevento_field_fechaevento_value2,
node_data_field_fechaevento.field_fechaevento_rrule AS node_data_field_fechaevento_field_fechaevento_rrule
 FROM node node 
 LEFT JOIN content_field_fechaevento node_data_field_fechaevento ON node.vid = node_data_field_fechaevento.vid
 WHERE ((node.status <> 0) AND (node.type in ('agenda_bibliomovil')))
   
   ORDER BY node_data_field_fechaevento_field_fechaevento_value ASC";
   
   
   
   if($_GET['debug']){
   	print_r($queryStr);
   }
   
   	$queryEventos = db_query($queryStr);
   	
   	$fecha = strtotime($anio.'-'.$mes.'-'.$day);
   	
   
   	while($resultado = db_fetch_array($queryEventos)) {
   		
   		$fechaDesde = strtotime($resultado['node_data_field_fechaevento_field_fechaevento_value']);
   
   		$fechaHasta = strtotime($resultado['node_data_field_fechaevento_field_fechaevento_value2']);
   		
   	
   		
   		$nodoEvento = node_load($resultado['nid']);
   		$lugar = $nodoEvento->field_lugareventobiblio[0]['value'];
   		
   		
   
   	
   	
   						// Cond no repeat ($resultado['node_data_field_fechaevento_field_fechaevento_rrule']=='')
   		  if(($fecha>=  strtotime(date('Y-m-d',$fechaDesde))) && ($fecha<=$fechaHasta) ){
   		  
   					$salida.= '<div style="background:'.setearColor($lugar).'"><a href="'.base_path().'node/'.$resultado['nid'].'?myajax2=1" rel="lightframe" style="color:'.setearColor($lugar).'" class="'.str_replace('#','class',setearColor($lugar)).'">'.$nodoEvento->title.'</a></div>';	
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
   	
   	
   	return '<br><div class="infoEvento">'.$salida.'</div>';
   }
   
   

function setearColor($string)
{

    
    $color['Tucumán'] = 'SaddleBrown';
    $color['San Juan'] = 'DarkOliveGreen';
    $color['Costa Atlántica'] = 'DodgerBlue';
	  $color['CABA'] = 'MediumVioletRed';
   	$color['Córdoba'] = 'SlateBlue';
   	  
    $color['Chaco'] = 'blue';
    $color['Neuquén'] = 'darkgreen';
		$color['Mendoza'] = 'red';
    $color['Delta'] = 'oreangered';
    
    
    if(isset($color[$string])){
    	return $color[$string];
    }
    else {
    	$hex='';
    	for ($i=0; $i < strlen($string); $i++)
    		{
        	$hex .= dechex(ord($string[$i]));
    		}
    	return substr($hex,3,3);
   	 }
    
    
    
}

   
   ?>
  
   
                                
              <div id="calendar">
 <?php 
 $anio = date('Y');
if($_GET['anio']){$anio=$_GET['anio'];}
$anio=2013; //Eliminar esta linea para habilitar paginado por fecha
$mes = date('m');
if($_GET['mes']){$mes=$_GET['mes'];}
$mes =2; //Eliminar esta linea para habilitar paginado por fecha
$diasDelMes = cal_days_in_month(CAL_GREGORIAN,$mes,$anio);

$primer_dia_mes = date("N", mktime(0,0,0,$mes,1,$anio));
$semanas_del_mes = ceil(($diasDelMes + $primer_dia_mes) / 7);
date_default_timezone_set('UTC');


$mesStr[1]='Enero';
$mesStr[2]='Febrero';
$mesStr[3]='Marzo';
$mesStr[4]='Abril';
$mesStr[5]='Mayo';
$mesStr[6]='Junio';
$mesStr[7]='Julio';
$mesStr[8]='Agosto';
$mesStr[9]='Septiembre';
$mesStr[10]='Octubre';
$mesStr[11]='Noviembre';
$mesStr[12]='Diciembre';



$mesAnterior = $mes -1;
if($mes==1){$mesAnterior=12; $anioAnterior = $anio -1;}

$mesSiguiente = $mes + 1;
if($mes==12){$mesSiguiente=1; $anioSiguiente=$anio+1;}

 ?><br/><br/>
 <!-- a style="position:absolute; left:50%; margin-left:-120px; font-size:30px;" href="http://www.conabip.gob.ar/cronograma_bibliomoviles?mes=<?php echo $mesAnterior; ?>&anio=<?php echo $anioAnterior; ?>"><</a --> 
 <!--a style="position:absolute; left:50%; margin-left:110px; font-size:30px; "  href="http://www.conabip.gob.ar/cronograma_bibliomoviles?mes=<?php echo $mesSiguiente; ?>&anio=<?php echo $anioSiguiente; ?>">></a -->
 <h1 style="display:block; text-align:center; font-size:25px; line-height:30px"><?php echo $mesStr[number_format($mes,0)].' '.$anio?></h1>    

<?php 
//Lugares
$query = db_query('SELECT DISTINCT (field_lugareventobiblio_value) FROM content_type_agenda_bibliomovil WHERE  field_lugareventobiblio_value!=""');

if(db_affected_rows()>0){
	while($result=db_fetch_array($query)){
		
		$lnkLugar.='<a href="#" onclick="$(\'#filtro a\').removeClass(\'active\');$(this).addClass(\'active\');  $(\'#calendar table a\').hide(); $(\'.'.str_replace('#','class',setearColor($result['field_lugareventobiblio_value'])).'\').show();return false" style="color:'.setearColor($result['field_lugareventobiblio_value']).'; border:1px solid '.setearColor($result['field_lugareventobiblio_value']).'">'.$result['field_lugareventobiblio_value'].'</a>&nbsp;&nbsp;';
	}
}


?>

         

<p id="filtro"> Lugar: <a href="" class="active" onclick="$('#filtro a').removeClass('active');$(this).addClass('active'); $('#calendar table a').show(); return false" style="color:#222; border:1px solid #222;">Todos</a>&nbsp;&nbsp;<?php echo $lnkLugar;?></p>
<table border="1">
<tr><th>Lun</th><th>Mar</th><th>Mi&eacute;</th><th>Jue</th><th>Vie</th><th>S&aacute;b</th><th>Dom</th></tr>
<?php 


for($i=1;$i<=5;$i++){
	print '<tr>';
		
		for($td = 1; $td <=7; $td++){
			$rowCount = $rowCount + 1;
				if($rowCount >= $primer_dia_mes){
					$dayCount = $dayCount +1;
					if($dayCount<=$diasDelMes){
						print '<td><span class="date">'.$dayCount.'</span>'.get_events_of_the_day($dayCount,$mes,$anio).'</td>';
					} 
					else {
						print '<td>&nbsp;</td>';
					}
				}
				else { print '<td>&nbsp;</td>';}
			 
		}
		
	print '</tr>';
}

?>
</table>  
<br/><br/>            
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
