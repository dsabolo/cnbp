<?php 
		//preparando el contenido
	$head=str_replace('v=2.115','v=3.8',$head);


	$content=str_replace('width: 300px; height: 200px;','width: 100%; height: 100%;',$content);
	
	
	$scripts=str_replace('"controltype": "Small"','"controltype": "Large"',$scripts);
	$scripts= str_replace('"zoom": 3', '"zoom": 12',$scripts);
	$scripts=str_replace('"autozoom": 0','"autozoom": 1',$scripts);
	
	
	drupal_set_title("Buscador de BPs");
	print $head;
	print $styles;
	print $scripts; 
	
	
	
	print '<link rel="stylesheet" type="text/CSS" href="'.base_path().path_to_theme().'/css/override.css" media="all">';
	print '<div id="appMapaBPS">'.$content.'</div>';
	?>
	<script>
	$(function(){
	var $write = $('#write'),
		shift = false,
		capslock = false;
	
	$('#keyboard li').click(function(){
		var $this = $(this),
			character = $this.html(); // If it's a lowercase letter, nothing happens to this variable
		
		// Shift keys
		if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
			$('.letter').toggleClass('uppercase');
			$('.symbol span').toggle();
			
			shift = (shift === true) ? false : true;
			capslock = false;
			return false;
		}
		
		// Caps lock
		if ($this.hasClass('capslock')) {
			$('.letter').toggleClass('uppercase');
			capslock = true;
			return false;
		}
		
		// Delete
		if ($this.hasClass('delete')) {
			var html = $write.html();
			var value = $('#edit-field-nombre-bp-value').val();
			
			
			$write.html(html.substr(0, html.length - 1));
			$('#edit-field-nombre-bp-value').val(value.substr(0, value.length - 1));
			return false;
		}
		
		// Special characters
		if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
		if ($this.hasClass('space')) character = ' ';
		if ($this.hasClass('tab')) character = "\t";
		if ($this.hasClass('return')) {character = "";}
		
		// Uppercase letter
		if ($this.hasClass('uppercase')) character = character.toUpperCase();
		
		// Remove shift once a key is clicked.
		if (shift === true) {
			$('.symbol span').toggle();
			if (capslock === false) $('.letter').toggleClass('uppercase');
			
			shift = false;
		}
		
		// Add the character
		$write.html($write.html() + character);
		$('#edit-field-nombre-bp-value').val($('#edit-field-nombre-bp-value').val() + character);
		
	});
});



$(document).ready(function(){
	$('#kbcontainer').hide();
	$('#edit-field-nombre-bp-value-wrapper').click(function(){
		$('#kbcontainer').show();
	});

		$('.return').click(
			function(){
					$('#kbcontainer').hide();
					$('#views-exposed-form-directorio-bibliotecas-populares-page-7').submit();
			}
		);
		

		
		
		$('#gmap-auto1map-gmap0').click(
			function(){
					$('#kbcontainer').hide();
			}
		);


});
	</script>
	
	<style>
	#appMapaBPS{
	width: 100%;
	height:100%;
	background: lightblue;
	overflow: hidden;
}
#appMapaBPS #gmap-auto1map-gmap0  {
		width: 100%;
	height:100%;
	top:140px;
	overflow: hidden !important;
	}

#appMapaBPS #views-exposed-form-directorio-bibliotecas-populares-page-7 {
	position: absolute;
	z-index:99999 !important;
	font-size:25px;
	bottom: 0;
	padding:18px;
	left:0;
	right:0;
	background: #fff url(http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/css/images/body-bg.png) repeat-x;
}
#appMapaBPS #views-exposed-form-directorio-bibliotecas-populares-page-7 * {
	font-size:18px;
}
#appMapaBPS #views-exposed-form-directorio-bibliotecas-populares-page-7 input , #appMapaBPS #views-exposed-form-directorio-bibliotecas-populares-page-7 select, #appMapaBPS #views-exposed-form-directorio-bibliotecas-populares-page-7 option {
	font-size:22px;
}


#view-id-directorio_bibliotecas_populares-page_7 .gmap-popup label {
		font-weight: bold !important;
}
#view-id-directorio_bibliotecas_populares-page_7 .view-empty {
	text-align: center;
	font-size: 25px;
	position: absolute;
	top:40%;
	width:100%;
}


#appMapaBPS #edit-field-nombre-bp-value {background: url('http://cdn3.iconfinder.com/data/icons/discovery/24x24/apps/preferences-desktop-keyboard-shortcuts.png') top right no-repeat;}


#appMapaBPS  #edit-submit-directorio-bibliotecas-populares {
	margin-top:16px;
}
	
		#write {display: none;}
		
		#kbcontainer {
			position: absolute;
			bottom:200px;
			width: 950px;
			background: #111;
			padding:10px;
			left:50%;
			margin-left: -475px;
		}
	
		#keyboard {
margin: 0;
padding: 0;
list-style: none;
}
	#keyboard li {
	float: left;
	margin: 0 5px 5px 0;
	width: 60px;
	height: 60px;
	line-height: 60px;
	text-align: center;
	background: #fff;
	border: 1px solid #f9f9f9;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	font-size: 19px;
	}
		.capslock, .tab, .left-shift {
		clear: left;
		}
			#keyboard .tab, #keyboard .delete {
			width: 70px;
			}
			#keyboard .capslock {
			width: 90px;
			}
			#keyboard .return {
			width: 104px;
			}
			#keyboard .left-shift {
			width: 135px;
			}
			#keyboard .right-shift {
			width: 130px;
			}
		.lastitem {
		margin-right: 0;
		}
		.uppercase {
		text-transform: uppercase;
		}
		#keyboard .space {
		clear: left;
		width: 675px;
		margin-left:140px;
		}
		.on {
		display: none;
		}
		#keyboard li:hover {
		position: relative;
		top: 1px;
		left: 1px;
		border-color: #e5e5e5;
		cursor: pointer;
		}
		
	#feriaHeader {
		position: absolute;
		top:0;
		left:0;
		right:0;
		height:140px;
		background: #fff;
		border-bottom: 4px rgb(96,170,223) solid;
	}
	#feriaHeader img {
		padding:10px;
		margin-left:30px;
	}
	#feriaHeader .feriaMenu {
		text-align: right;
		float:right;
		padding:30px;
			margin-top:30px;
	}
	#feriaHeader .feriaMenu a {
		padding:10px;
		text-transform: uppercase;
		font-weight: bold;
		font-size: 17px;
		background: rgb(96,170,223);
		margin:10px;
		color:#fff;
	}
	#feriaHeader .feriaMenu a:hover, #feriaHeader .feriaMenu a.active {
		text-decoration: none;
		background: rgb(57,110,169);
	}
	#resetSearch {
		position: absolute;
		z-index: 999999;
		bottom:40px;
		right:30px;
		font-size: 16px;
		color:rgb(57,110,169);
		padding-left:30px;
	}
#appMapaBPS .views-field-field-nombre-bp-value {
	text-transform: uppercase;
		background: rgb(96,170,223);
	padding:2px;
	color:#fff;
	display: inline;
	font-size: 10px;
	font-weight: bold;

}
#appMapaBPS .views-field-field-dir-calle-value {
	margin-top: 5px;
}
	</style>
	
	<div id="feriaHeader">
		<a href="http://www.conabip.gob.ar/appFeria2012/index.html"><img src="http://www.conabip.gob.ar/sites/all/themes/fusion_conabip_dev/logo2011.png" alt="CONABIP"/></a>
		<p class="feriaMenu">
			<a  class="active" href="http://www.conabip.gob.ar/feria2012/mapaBps">Buscador de Bibliotecas Populares</a>
			<a  href="http://www.conabip.gob.ar/cons_ccbp2">Catalogo Colectivo</a>
		</p>
	</div>
	
	<a  id="resetSearch" href="http://www.conabip.gob.ar/feria2012/mapaBps">Resetear Búsqueda</a>
	
	<?php
		
	print '
	<div id="kbcontainer">
	<textarea id="write" rows="6" cols="60"></textarea>
	<ul id="keyboard">
		<li class="symbol"><span class="off">`</span><span class="on">~</span></li>
		<li class="symbol"><span class="off">1</span><span class="on">!</span></li>
		<li class="symbol"><span class="off">2</span><span class="on">@</span></li>
		<li class="symbol"><span class="off">3</span><span class="on">#</span></li>
		<li class="symbol"><span class="off">4</span><span class="on">$</span></li>
		<li class="symbol"><span class="off">5</span><span class="on">%</span></li>
		<li class="symbol"><span class="off">6</span><span class="on">^</span></li>
		<li class="symbol"><span class="off">7</span><span class="on">&amp;</span></li>
		<li class="symbol"><span class="off">8</span><span class="on">*</span></li>
		<li class="symbol"><span class="off">9</span><span class="on">(</span></li>
		<li class="symbol"><span class="off">0</span><span class="on">)</span></li>
		<li class="symbol"><span class="off">-</span><span class="on">_</span></li>
		<li class="symbol"><span class="off">=</span><span class="on">+</span></li>
		<li class="delete lastitem">Borrar</li>
		<li class="tab">tab</li>
		<li class="letter">q</li>
		<li class="letter">w</li>
		<li class="letter">e</li>
		<li class="letter">r</li>
		<li class="letter">t</li>
		<li class="letter">y</li>
		<li class="letter">u</li>
		<li class="letter">i</li>
		<li class="letter">o</li>
		<li class="letter">p</li>
		<li class="symbol"><span class="off">[</span><span class="on">{</span></li>
		<li class="symbol"><span class="off">]</span><span class="on">}</span></li>
		<li class="symbol lastitem"><span class="off">\</span><span class="on">|</span></li>
		<li class="capslock">caps lock</li>
		<li class="letter">a</li>
		<li class="letter">s</li>
		<li class="letter">d</li>
		<li class="letter">f</li>
		<li class="letter">g</li>
		<li class="letter">h</li>
		<li class="letter">j</li>
		<li class="letter">k</li>
		<li class="letter">l</li>
		<li class="letter">ñ</li>
		<li class="symbol"><span class="off">\'</span><span class="on">&quot;</span></li>
		<li class="return lastitem">BUSCAR</li>
		<li class="left-shift">shift</li>
		<li class="letter">z</li>
		<li class="letter">x</li>
		<li class="letter">c</li>
		<li class="letter">v</li>
		<li class="letter">b</li>
		<li class="letter">n</li>
		<li class="letter">m</li>
		<li class="symbol"><span class="off">,</span><span class="on">&lt;</span></li>
		<li class="symbol"><span class="off">.</span><span class="on">&gt;</span></li>
		<li class="symbol"><span class="off">/</span><span class="on">?</span></li>
		<li class="right-shift lastitem">shift</li>
		<li class="space lastitem">&nbsp;</li>
	</ul>
</div>';
	
	//print $closure; 
	 die();

?>