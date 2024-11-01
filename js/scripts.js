
jQuery(document).ready(function($)
	{
		
		
		$(document).on('click', '.tab-nav li', function()
			{
				$(".active").removeClass("active");
				$(this).addClass("active");
				
				var nav = $(this).attr("nav");
				
				$(".box li.tab-box").css("display","none");
				$(".box"+nav).css("display","block");
		
			})
		
		
		
		
		$(document).on('click', '.pro_accordions_content_source', function()
			{	
				var source = $(this).val();
				var source_id = $(this).attr("id");
				
				$(".content-source-box.active").removeClass("active");
				$(".content-source-box."+source_id).addClass("active");
				
			})
		
		
		

		$(document).on('click', '.pro_accordions-content-buttons .add-pro_accordions', function()
			{	
				
				var row = $(".pro_accordions-content tr:last-child").attr("index");
				
				
				if($.isNumeric(row))
					{
						var row = parseInt(row)+1;
						
					}

				else
					{
						var row = 0;
					}
				
				
				$(".pro_accordions-content").append('<tr index="'+row+'" valign="top"><td class="tab-new" style="vertical-align:middle;"><span class="removepro_accordions">X</span><br/><br/><input width="100%" placeholder="pro_accordions Header" type="text" name="pro_accordions_content_title['+row+']" value="" /><br /><br /><textarea placeholder="pro_accordions Content" name="pro_accordions_content_body['+row+']" ></textarea></td></tr>');
				
				
				
				setTimeout(function(){
					
					$(".pro_accordions-content tr:last-child td").removeClass("tab-new");
					
					}, 300);
				
				
				
			})	
		
		
		
		$(document).on('click', '#pro_accordions_metabox .removepro_accordions', function()
			{	
				
				if (confirm('Do you really want to delete this tab ?')) {
					
					$(this).parent().parent().remove();
				}
				
				
				
			})	
	
 		

	});	







