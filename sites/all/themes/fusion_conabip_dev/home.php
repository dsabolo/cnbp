<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

<head>
<?php 

//Titles en panels
if(drupal_is_front_page()){
	$nodo=node_load(arg(2));
	print '<title>CONABIP :: Comisión Nacional de Bibliotecas Populares</title>';
}
else { print  '<title>'.$head_title.'</title>';}
?>

  <?php print $head; ?>
  
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
  <link rel="stylesheet" type="text/CSS" href="<?php print base_path().path_to_theme();?>/css/override.css?timess=<?=time();?>" media="all">
  
  <script language="javascript" type="text/javascript" src="<?= base_path().path_to_theme()?>/equalheight.js"></script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>


</head>
<?php 
	if($sidebar_last || $sidebar_last2){
		$extraClass="bodychico";
	}
?>
<body id="<?php print $body_id; ?>" class="front <?php print $body_classes.' '.$extraClass; ?>">


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
          
          
          <div class="bannernav"><a href="#" id="bannerprev2">Anterior</a> <a href="#" id="bannernext2">Siguiente</a></div>
    <table id="homev2Header">
      	<tr>
      		<td id="homev2_bannerHome">
      		
      		<?php 
      		/*$banners=db_query('SELECT nid FROM node WHERE type="banner" AND status=1');
      		if(db_affected_rows()){
      			while($result=db_fetch_array($banners)){
      				$banner=node_load($result['nid']);
      				$bannerImage=node_load($banner->iids[0]);
//print_r($bannerImage->images['_original']);
      				print '<div class="slide"><a href="'.$banner->field_link_ver_mas[0]['url'].'"><div class="bannerTXT"><h2>'.$banner->title.'</h2><p>'.$banner->teaser.'</p></div>'.theme('imagecache','bannerFull',$bannerImage->images['_original']).'</a></div>';
      			}
      		}
      			*/
      		?>
      		
      		<?php 
      		$banners=db_query('SELECT nid FROM node WHERE type="banner" AND status=1 ORDER BY created DESC');
      		if(db_affected_rows()){
      			while($result=db_fetch_array($banners)){
      				$banner=node_load($result['nid']);
      				//print_r($banner);
      				$bannerImage=$banner->field_bannergrande[0]['filepath'];
//print_r($bannerImage->images['_original']);
      				print '<div class="slide"><a href="'.$banner->field_link_ver_mas[0]['url'].'"><div class="bannerTXT"><h2>'.$banner->title.'</h2><p>'.$banner->teaser.'</p></div>'.theme('imagecache','bannerFull',$bannerImage).'</a></div>';
      			}
      		}
      			
      		?>
      	
      		
      		<?php print $homeBanners; ?></td>
      	</tr>
      	<tr>
      		<td>
      			<table id="bloquesLNK">
      				<tr>
      					<td id="homev2_area1" class="homebox"><?php print $area1; ?></td>
      					<td id="homev2_area2" class="homebox"><?php print $area2; ?></td>
      					<td id="homev2_area3" class="homebox"><?php print $area3; ?></td>
      					<td id="homev2_area4" class="homebox last"><?php print $area4; ?></td>
      				</tr>
      			</table>
      		</td>
      	</tr>
      </table>
      <script>
      	$(document).ready(
      		function(){
      			$('#homev2_bannerHome').cycle(
      			{
      				  fx:     'fade', 
    speed:  'slow', 
    timeout: 5000, 
    next:   '#bannernext2', 
    prev:   '#bannerprev2' 
      			}
      			);
      		}
      	);
      </script>
		<div class="clear"></div>
		<style>
		/*NuevaHome */

#homev2_bannerHome {
	height: 400px;

}


.pane-banner-slideshow, .view-vista-destacados {
	display: none;
}
 .pane-noticias-panel-pane-1 {
	margin-top:-40px !important;
}
#homev2Header, #homev2Header table, #homev2Header td, #homev2Header tr, #homev2Header th, tbody {
	border-top: 0 !important;
	vertical-align: top;
	padding:0;
	margin:0;
}

#homev2Header{
	margin-bottom: 20px !important;
}

#homev2_area1 {
	padding-left: 6px !important;
}
.homebox {
	border-right:7px solid rgb(217,217,217) !important;
	width:249px !important;
	vertical-align: top;
	border-top:0 !important;
	margin-top:0px!important;
	padding-top:6px !important;
}
.homebox.last {
	border-right: 0 !important;
	padding-right:6px !important;
}
.bannerTXT {
	position: absolute;
	padding:0px;
	margin-top:282px;
	background: url(<?= base_path().path_to_theme();?>/css/images/transparent.png) !important;
	width:975px;
	padding-top:10px;
	padding-bottom:4px;
	height: 70px
}
.bannerTXT  * {
	text-decoration: none;
	color:#fff !important;
	border:0;

}
.bannerTXT h2 , .bannerTXT p{
	padding-left: 15px;
	padding-right: 15px;
	font-weight: 100
}
.bannerTXT h2 {
	margin-bottom:0 !important;
	font-weight: normal !important;
	font-size: 20px !important;
	text-transform: none !important;
	
}
.bannerTXT p {
	padding-top: 3px;
	font-size:13px;
}

#bannernext2 {
	width:39px;
	height:71px;
	background:transparent url(<?= base_path().path_to_theme();?>/css/images/next-prev-slideshow.png) -40px -71px no-repeat !important ;
	text-indent: -99999px;
	position: absolute;
	z-index: 9999 !important;
	display: block;
	margin-left:958px;
	margin-top:160px;
}
#bannernext2:hover {
	background:transparent url(<?= base_path().path_to_theme();?>/css/images/next-prev-slideshow.png) -40px 0 no-repeat !important ;
}
#pid-inicio-new .feed-icon {
	display: none;
}
#bannerprev2 {
	width:39px;
	height:71px;
	background:transparent url(<?= base_path().path_to_theme();?>/css/images/next-prev-slideshow.png) 0 -71px no-repeat !important ;
	text-indent: -99999px;
	position: absolute;
	z-index: 9999 !important;
	display: block;
	margin-left:7px;
	margin-top:160px;
}
#bannerprev2:hover {
	background:transparent url(<?= base_path().path_to_theme();?>/css/images/next-prev-slideshow.png) top left no-repeat !important ;
}
.bannerTXT h2 {
	text-transform:uppercase;
	font-size: 22px;
}
.slide {
	width:975px;
	background:  url(<?= base_path().path_to_theme();?>/css/images/bgBannersV2.png) no-repeat;
	overflow: hidden;
	padding:15px !important;
	
	border:0px solid #ccc;
	margin-top: 20px;
	margin-left:15px;
	
}
.slide img {
		width: 975px !important;
		height:auto !important;

}

#content-region .rinterna {
	margin-bottom:20px !important;
	 width:220px !important; 
	 float:left !important; 
	 margin-right:10px;   
	 padding-bottom: 10px; 
	 border-bottom: 4px solid #E6E6E6;
	 border:0 !important;
	
	 
	 
	 }
	 
.panel-panel  { 
	width:220px !important; 
	overflow: hidden !important; 
	margin-bottom:10px; 
	position:relative; 
	background: #fff !important; 
	float:left !important; 
	border: 0 !important;
	margin-right:32px !important;
	  }
	  .panel-panel.panel-col-last {
		margin-right:0px !important;	  
	  }
	
	.view-noticias, .view-noticias .view-content, .view-noticias .view-content .panel-3col-33 {
	padding: 0 !important;
	margin: 0 !important;
		width: 730px !important;
}

.view-noticias {
	width: 730px !important;

}
.panel-display.panel-3col-33  {
	margin-left:-20px !important;
}
.view-noticias .view-content .panel-3col-33 .rinterna {
	background: #fff !important;
	margin-bottom:20px !important;
	 width:220px !important; 
	 float:left !important; 
	 margin-right:10px;   
	 padding:0 !important;
	 padding-bottom: 10px !important; 
	 border-bottom: 4px solid #E6E6E6;
	 border:0 !important;
	 border-top:0 !important;
	 
}
.view-noticias .imagecache-short.imagecache-default {
	border:6px solid rgb(217,217,217);
	width: 208px;
	height:auto;
}

#block-block-7 {
	display: none;
}



.front .panel-3col-33 .panel-panel .views-field-field-cintillo-value {
    color: rgb(0, 128, 187);
    font-size: 10px;
    text-transform: uppercase;
    float:left;
}

.front .panel-3col-33 .panel-panel .views-field-field-fecha-publicaciones-value {
    color: rgb(77, 77, 77);
    font-size: 10px;
    float:right;
}
.front  .panel-3col-33 .panel-panel .views-field-title a {
    color: rgb(77, 77, 77);
    font-size: 15px;
    font-weight: 800;
    text-align: left;
    margin: 10px 0px 5px;
    line-height: 120%;
    display: block;
    height: 60px;
    overflow: hidden !important;
}

.front .panel-3col-33 .panel-panel .home_ver_noticia {
    font-size: 11px;
    float:right
}
#content-region .view-footer {
	width:710px !important;
}
#content-region h2.block-title {
    font-size: 16px;
    color: rgb(0, 0, 0);
    border-left: 3px solid rgb(0, 128, 187);
    font-weight: 800;
    padding: 0px 0px 5px 10px;
    background: url("<?= base_path().path_to_theme();?>/css/images/h2-bg.png") repeat-x scroll left bottom transparent;
    margin-bottom: 30px;
}

#content-region .views-field-field-copete-value {
	height:100px !important;
}
#bloquesLNK, #bloquesLNK td, #bloquesLNK * {
	background: rgb(217,217,217) !important;
	margin:0;
	padding:0;
	
}

@media screen and (-webkit-min-device-pixel-ratio:0) {
	#homev2_bannerHome {
		height: 405px;
	}
		#homev2_bannerHome  .slide {
			margin-left:3px !important;
			margin-top: 0px !important;
		}
	#bloquesLNK {
		margin-left:2px !important;
	}
}


.Explorer10	#homev2_bannerHome {
		height: 415px !important;
	}
		.Explorer10 #homev2_bannerHome  .slide {
			margin-left:3px !important;
			margin-top: 0px !important;
		}
	.Explorer10 #bloquesLNK {
		margin-left:2px !important;
	}
	
	.feed-icon {
		display: none !important;
	}
	
	#block-views-video_home-block_1  span.field-content , #block-views-video_home-block_1  span.field-content  a {
	line-height: 12px !important
}

	
	
	#main-group	{
		margin-left: 4px !important
	}
	#sidebar-first {
		margin-right:-10px !important
	}
	
	#homev2_bannerHome .slide {
		height:371px !important
	}
		</style>
         
         
         
     <!--[if IE]>
     <style>
     	#homev2_bannerHome   {
			height: 405px;
			
		}
		#homev2_bannerHome  .slide {
			margin-left:3px !important;
			margin-top: 0px !important;
		}
	#bloquesLNK {
		margin-left:2px !important;
	}
     </style>     
      <![endif]-->  
          
          
          
          
          
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
                                   <h2 class="pane-title block-title">ÚLTIMAS NOTICIAS</h2>
<?php
$viewName = 'noticias';
$display_id = 'panel_pane_1';

print views_embed_view($viewName, $display_id);
?>

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
$(".view-video-home img").before('<div class="similPlayer">PLAY</div>');	
	$("#content-region .rinterna").equalHeights();
	$(".views-field-field-copete-value").equalHeights();
	
	$(".pane-view-subhome  #view-id-view_subhome-page_3  .rinterna").equalHeights();
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
		




var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera",
			versionSearch: "Version"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();

$('body').addClass(BrowserDetect.browser+BrowserDetect.version);
	
	</script>

<?php print $closure; ?>
</body>
</html>
