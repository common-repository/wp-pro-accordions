<?php

function pro_accordions_themes_flat($post_id)
	{
		
		
		$pro_accordions_themes = get_post_meta( $post_id, 'pro_accordions_themes', true );		
		$pro_accordions_bg_img = get_post_meta( $post_id, 'pro_accordions_bg_img', true );
		$pro_accordions_icons = get_post_meta( $post_id, 'pro_accordions_icons', true );


		
		$pro_accordions_default_bg_color = get_post_meta( $post_id, 'pro_accordions_default_bg_color', true );	
		$pro_accordions_active_bg_color = get_post_meta( $post_id, 'pro_accordions_active_bg_color', true );
		
		$pro_accordions_items_title_color = get_post_meta( $post_id, 'pro_accordions_items_title_color', true );			
		$pro_accordions_items_title_font_size = get_post_meta( $post_id, 'pro_accordions_items_title_font_size', true );		

		$pro_accordions_items_content_color = get_post_meta( $post_id, 'pro_accordions_items_content_color', true );
		$pro_accordions_items_content_font_size = get_post_meta( $post_id, 'pro_accordions_items_content_font_size', true );

		
		$pro_accordions_items_thumb_size = get_post_meta( $post_id, 'pro_accordions_items_thumb_size', true );
		$pro_accordions_items_thumb_max_hieght = get_post_meta( $post_id, 'pro_accordions_items_thumb_max_hieght', true );
		
		$pro_accordions_ribbon_name = get_post_meta( $post_id, 'pro_accordions_ribbon_name', true );		
		
		$pro_accordions_content_title = get_post_meta( $post_id, 'pro_accordions_content_title', true );	
		$pro_accordions_content_body = get_post_meta( $post_id, 'pro_accordions_content_body', true );
		
		
		$pro_accordions_body = '';
		$pro_accordions_body = '<style type="text/css"></style>';
		
		
		
		$pro_accordions_body .= '
		<div id="pro_accordions-'.$post_id.'"  class="pro_accordions-container pro_accordions-'.$pro_accordions_themes.'" style="background-image:url('.$pro_accordions_bg_img.')">';
		
		

		$pro_accordions_body.= '<ul class="responsive-accordion responsive-accordion-default">';
		
		
		
		foreach ($pro_accordions_content_title as $index => $pro_accordions_title)
		{
				$pro_accordions_body.= '<li>';
				$pro_accordions_body.= '<div class="responsive-accordion-head">'.$pro_accordions_title.'<i class="responsive-accordion-icons responsive-accordion-plus '.$pro_accordions_icons.'"></i><i class="responsive-accordion-icons responsive-accordion-minus '.$pro_accordions_icons.'"></i></div>';
				$pro_accordions_body.= '<div style="font-size:'.$pro_accordions_items_content_font_size.';color:'.$pro_accordions_items_content_color.'" class="responsive-accordion-panel">'.$pro_accordions_content_body[$index];

				$pro_accordions_body.= '</div>';	
				$pro_accordions_body.= '</li>';
			}
			
								
		$pro_accordions_body.= '</ul>';

		$pro_accordions_body .= '</div>';
		
		
		$pro_accordions_body .= '<style type="text/css">
		
		#pro_accordions-'.$post_id.' .responsive-accordion-head{
			color:'.$pro_accordions_items_title_color.';
			font-size:'.$pro_accordions_items_title_font_size.';
			background:'.$pro_accordions_default_bg_color.';
			border-bottom: 1px solid'.pro_accordions_paratheme_dark_color($pro_accordions_default_bg_color).';
			}		
		
		#pro_accordions-'.$post_id.' .responsive-accordion-head.active{
			background: '.$pro_accordions_active_bg_color.';

			}
		
		
		</style>';		
		
		
		
		$pro_accordions_body .= "<script type='text/javascript'>
		
		</script>";		

		
		
		return $pro_accordions_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}