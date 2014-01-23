<?php
	if(arg(0)=='node' && arg(1)==19131){
			header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
			header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
		}	

	if(arg(0)=='node' && arg(1)==20942){
				include('home.php'); die();
		}	
		
//Redirect photos
if(arg(0)=='galerias_de_fotos'){
	$coleccion=$_GET['field_coleccion_value'];
	header('Location: http://www.conabip.gob.ar/conabip/comunicacion_y_prensa/fotos/'.$coleccion);
}


//MensajeGracias DDJJ
if($_GET['sid'] && arg(0) == 'node' && arg(1)==20749 && arg(2)=='submission'){
	drupal_set_message("Gracias, has completado el trámite de Declaración Jurada.");
}

//Custom
if($_GET['custom_modal']){
	print $head;
	print $styles;
	print $scripts; 
	print '<link rel="stylesheet" type="text/CSS" href="'.base_path().path_to_theme().'/css/override.css?time='.time().'" media="all">';
	print '<div id="custommodal">'.$content.'</div>';

	 die();
}
//AJAX
if($_GET['myajax']){
	print $head;
	print $scripts; 
	print $content;
	print $closure;

	 die();
}
//AJAX
if($_GET['myajax2']){
	print $styles;
 print '<h2>'.$title.'</h2>';
	print $content;
print '<style>
	.meta , .links {display:none;}
	body { background:#fff; padding:20px !important;}
	</style>';
	 die();
}

//Mes de las BPs
if($node->nid == 20899) {
	include ("mesdelasbps.php"); die();
}
//Cronograma Bibliomoviles
if(($node->nid == 21417) && (arg(2)!='edit')) {

	include ("crono_bibliomoviles.php"); die();
}

//Feria

if(arg(0)=='feria2012' && arg(1)=='mapaBps'){
	include('feria_mapaBPS.app.php');
}
if(arg(0)=='cons_ccbp2'){
	include('feria_catalogo.app.php');
}

//Errores
if(strpos(drupal_get_headers(), '404 Not Found') !== FALSE) {
  include('error.html'); die();
}
if(strpos(drupal_get_headers(), '403 Forbidden') !== FALSE) {
  include('error403.html'); die();
}

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
  
  <meta property="og:image" content="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/logo2011.png"/>
 
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
  <link rel="stylesheet" type="text/CSS" href="<?php print base_path().path_to_theme();?>/css/override.css?sassa=<?php echo time();?>" media="all">
  
  <script language="javascript" type="text/javascript" src="<?= base_path().path_to_theme()?>/equalheight.js"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	
</head>
<?php 
	if($sidebar_last || $sidebar_last2){
		$extraClass="bodychico";
	}
	
	/*Clases para los path (pathclass_xxx)*/
	$extras = 0;
	for($i=0;$i<=2;$i++){
		if(arg($i)!=''){
			$argsClases[]='pathclass_'.arg($i);
			$extras++;
		}
	}
	
	
	
		/*Clases para los nodetypes (typeclass_xxx)*/	
	
	if(arg(0)=='node' && is_numeric(arg(1))){
		
		$argsClases[] = 'typeclass_'.$node->type;
	}
	
	if($extras >0 ) {	$bodyExtraClasess = implode(' ', $argsClases);}
	
	
?>
<body id="<?php print $body_id; ?>" class="<?php print $body_classes.' '.$extraClass.' '.$bodyExtraClasess; ?>">
<?php
	if($_GET['mostrarModal']){
		print '<div id="modalTecnopolisWrapper"><iframe id="modalTecnopolis" style="width:1000px; height:600px;" src="http://www.conabip.gob.ar/cnbpTecnopolis"></iframe><p><a href="http://www.conabip.gob.ar">CERRAR</a></p></div>';
	}
?>


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
            <?php print theme('grid_row', $sidebar_first, 'sidebar-first', 'nested', $sidebar_first_width); ?>
						
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
                                <?php if ($title): ?>
                                <h1 class="title"><?php print $title; ?></h1>
                                <?php endif; ?>
                                
                                <?php if ($content): ?>
                                <?php print theme('grid_row', $sidebar_last, 'sidebar-last', 'nested', $sidebar_last_width); ?>
                                                              <?php print theme('grid_row', $sidebar_last2, 'sidebar-last2', 'nested', $sidebar_last_width); ?>
 
 
 			                               
                                
                                <div id="content-content" class="content-content">
                                  <?php print $content; ?>
                                  <?php print $feed_icons; ?>
                                </div><!-- /content-content -->
                                <?php endif; ?>
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
  
  


<?php if(!drupal_is_front_page()) : ?>
<script>
	$(".panel-3col-33 .inside .rinterna").equalHeights();
	$(".panel-3col-33 .inside .views-field-field-copete-value").equalHeights();
	$(".pane-view-subhome  #view-id-view_subhome-page_3  .rinterna").equalHeights();
	$(".rinternaNOTICIASPRENSA").equalHeights();
		$(".panel1_3").equalHeights();
</script>
<?php endif; ?>

<?php if(drupal_is_front_page()): ?>
<script>

	$('#block-block-45 .content p').cycle();
		

	
	
	/*$('#block-block-45 .content p a').attr('rel','lightframe[|width: 1020px; height: 630px; scrolling: auto;]');
	$('#block-block-45 .content p a').attr('title','Conabip en TECNOPOLIS');*/
		$(".view-id-noticias .rinterna").equalHeights();
	$(".views-field-field-copete-value").equalHeights();

	
	$(".view-video-home img").before('<div class="similPlayer">PLAY</div>');	

</script>
<?php endif; ?>

	<script>
    
    $('#block-block-45 a').click(function(){
    	window.open('http://www.conabip.gob.ar/cnbpTecnopolis/',"Conabip en TECNOPOLIS","width=1000,height=620,scrollbars=NO") 
    	return false;
    });
		$('#block-block-45 a img').attr('height','160');
		
		$('a.lightframe').attr('rel','lightframe');
		$('a.lightframe').attr('title',$('a.lightframe').attr('alt'));

		$(".panel-2col .rinterna").equalHeights();		
		
		$('#pid-conabip-en-los-medios .view-VistaConabipEnLosMedios .views-field-view-node a').attr('rel','lightframe');
		
		
		
		$('.view-menu-pestania a[href$="<?=$_GET['q']?>"]').addClass('active');
		$('.views-field-field-menu-sic-vname a[href$="<?=$_GET['q']?>"]').addClass('active');
		
			//$(".panel-2col .rinterna").equalHeights();
			
	<?php if(arg(0)=='archivo_historico'):?>	
		
	$('#pid-archivo-historico .faceted-search-facet--field_bp_historica--1 h3').click(
		function(){
			$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--field_bp_historica--1 .item-list').show();
		}
	);
	
		$('#pid-archivo-historico .faceted-search-facet--field_ah_periodo--1 h3').click(
		function(){
			$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--field_ah_periodo--1 .item-list').show();
		}
	);
	
		$('#pid-archivo-historico .faceted-search-facet--field_nombre_bp--1 h3').click(
		function(){
			$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--field_nombre_bp--1 .item-list').show();
		}
	);
	
		$('#pid-archivo-historico .faceted-search-facet--field_partido--1 h3').click(
		function(){
		$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--field_partido--1 .item-list').show();
		}
	);
	
		$('#pid-archivo-historico .faceted-search-facet--field_provincia--1 h3').click(
		function(){
		$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--field_provincia--1 .item-list').show();
		}
	);
	
	$('#pid-archivo-historico .faceted-search-facet--field_tipo_elemento--1 h3').click(
		function(){
			$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--field_tipo_elemento--1 .item-list').show();
		}
	);
	
	$('#pid-archivo-historico .faceted-search-facet--taxonomy--18 h3').click(
		function(){
			$('#pid-archivo-historico h3').removeClass("active");
			$(this).addClass("active");
			$('#pid-archivo-historico .faceted-search-facet .item-list').hide();
			$('#pid-archivo-historico .faceted-search-facet--taxonomy--18 .item-list').show();
		}
	);
	
	
	
		$('#pid-archivo-historico .faceted-search-facet--field_nombre_bp--1 h3').addClass("active");
		$('#pid-archivo-historico .faceted-search-facet--field_nombre_bp--1 .item-list').show();
	
	
	<?php endif;?>
	$('#pid-content-informaci-n-para-bibliotecas-afectadas-por-el-paro-de-micros-larga-distancia #edit-submit').val("CONTINUAR");

	</script>

<?php print $closure; ?>
</body>
</html>
