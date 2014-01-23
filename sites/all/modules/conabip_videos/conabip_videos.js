$('document').ready(
	function(){ 
				$("#filter a").removeClass("current");
				$("#destacado	").addClass("current");
				$(".canalBP_video").slideUp();
				$(".destacado").slideDown();
	
	
	
		 $(".filter").click(function(){
        		var thisFilter = $(this).attr("id");
        		$(".canalBP_video").slideUp();
        		$("."+ thisFilter).slideDown();
        		$("#filter a").removeClass("current");
        		$(this).addClass("current");
		        return false;
   				});
			
				
				 
				 $('.canalBP_video').hover(
				 	 function () {
    					$(this).addClass('current');
    				  }, 
				  function () {
   						$(this).removeClass('current');
     				}

				 );
	
		
		
	}
);
