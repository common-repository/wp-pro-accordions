<?php


function pro_wp_pro_accordions_posttype_register() {
 
        $labels = array(
                'name' => _x('pro_accordions', 'pro_accordions'),
                'singular_name' => _x('pro_accordions', 'pro_accordions'),
                'add_new' => _x('New pro_accordions', 'pro_accordions'),
                'add_new_item' => __('New pro_accordions'),
                'edit_item' => __('Edit pro_accordions'),
                'new_item' => __('New pro_accordions'),
                'view_item' => __('View pro_accordions'),
                'search_items' => __('Search pro_accordions'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'pro_accordions' , $args );

}

add_action('init', 'pro_wp_pro_accordions_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function pro_wp_meta_boxes_pro_accordions()
	{
		$screens = array( 'pro_accordions' );
		foreach ( $screens as $screen )
			{
				add_meta_box('pro_accordions_metabox',__( 'pro_accordions Options','pro_accordions' ),'pro_meta_boxes_pro_accordions_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'pro_wp_meta_boxes_pro_accordions' );


function pro_meta_boxes_pro_accordions_input( $post ) {
	
	global $post;
	wp_nonce_field( 'pro_meta_boxes_pro_accordions_input', 'pro_meta_boxes_pro_accordions_input_nonce' );
	
	
	$pro_accordions_bg_img = get_post_meta( $post->ID, 'pro_accordions_bg_img', true );
	$pro_accordions_themes = get_post_meta( $post->ID, 'pro_accordions_themes', true );
	$pro_accordions_icons = get_post_meta( $post->ID, 'pro_accordions_icons', true );	
	
	$pro_accordions_default_bg_color = get_post_meta( $post->ID, 'pro_accordions_default_bg_color', true );	
	$pro_accordions_active_bg_color = get_post_meta( $post->ID, 'pro_accordions_active_bg_color', true );
	
	$pro_accordions_items_title_color = get_post_meta( $post->ID, 'pro_accordions_items_title_color', true );	
	$pro_accordions_items_title_font_size = get_post_meta( $post->ID, 'pro_accordions_items_title_font_size', true );
	
	$pro_accordions_items_content_color = get_post_meta( $post->ID, 'pro_accordions_items_content_color', true );	
	$pro_accordions_items_content_font_size = get_post_meta( $post->ID, 'pro_accordions_items_content_font_size', true );		
	
	$pro_accordions_content_title = get_post_meta( $post->ID, 'pro_accordions_content_title', true );	
	$pro_accordions_content_body = get_post_meta( $post->ID, 'pro_accordions_content_body', true );
	
	
 






		$pro_pro_accordions_customer_type = get_option('pro_pro_accordions_customer_type');

		if($pro_pro_accordions_customer_type=="free")
			{
				echo '';
      
			}
		elseif($pro_pro_accordions_customer_type=="pro")
			{
				//premium customer support.
			}

?>




    <div class="para-settings">

        <div class="option-box">
            <p class="option-title">Shortcode</p>
            <p class="option-info">Copy this shortcode and paste on page or post where you want to display pro_accordions, Use PHP code to your themes file to display pro_accordions.</p>
        <br /> 
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[pro_accordions <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[pro_accordions id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
        </div>
        
        
        <ul class="tab-nav"> 
            <li nav="2" class="nav2 active">Style</li>
            <li nav="3" class="nav3">Content</li>
            
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            <li style="display: block;" class="box2 tab-box active">
				<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
                    <select name="pro_accordions_themes"  >
                    <option class="pro_accordions_themes_flat" value="flat" <?php if($pro_accordions_themes=="flat")echo "selected"; ?>>Flat</option>
                  
                    </select>
                </div>
                
				<div class="option-box">
                    <p class="option-title">Background Image</p>
                    <p class="option-info"></p>
					<script>
                    jQuery(document).ready(function(jQuery)
                        {
                                jQuery(".pro_accordions_bg_img_list li").click(function()
                                    { 	
                                        jQuery('.pro_accordions_bg_img_list li.bg-selected').removeClass('bg-selected');
                                        jQuery(this).addClass('bg-selected');
                                        
                                        var pro_accordions_bg_img = jQuery(this).attr('data-url');
                    
                                        jQuery('#pro_accordions_bg_img').val(pro_accordions_bg_img);
                                        
                                    })	
                    
                                        
                        })
                    
                    </script> 
                    
            
					<?php
                    
                    
                    
                        $dir_path = pro_accordions_plugin_dir."css/bg/";
                        $filenames=glob($dir_path."*.png*");
                    
                    
                        $pro_accordions_bg_img = get_post_meta( $post->ID, 'pro_accordions_bg_img', true );
                        
                        if(empty($pro_accordions_bg_img))
                            {
                            $pro_accordions_bg_img = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<ul class='pro_accordions_bg_img_list' >";
                    
                        while($i<$count)
                            {
                                $filelink= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= pro_pro_pro_accordions_plugin_url."css/bg/".$filelink;
                                
                                
                                if($pro_accordions_bg_img==$filelink)
                                    {
                                        echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                                    }
                                else
                                    {
                                        echo '<li   data-url="'.$filelink.'">';
                                    }
                                
                                
                                echo "<img  width='70px' height='50px' src='".$filelink."' />";
                                echo "</li>";
                                $i++;
                            }
                            
                        echo "</ul>";
                        
                        echo "<input style='width:100%;' value='".$pro_accordions_bg_img."'    placeholder='Please select image or left blank' id='pro_accordions_bg_img' name='pro_accordions_bg_img'  type='text' />";
                    
                    
                    
                    ?>
                    
                    
                    
                    
                    
                    
                </div>                
                
				<div class="option-box">
                    <p class="option-title">Icon set</p>
                    <p class="option-info"></p>
                    <?php
					
                        $dir_path = pro_accordions_plugin_dir."css/icons/";
                        $filenames=glob($dir_path."*.png*");
                        
                        
                    
                        $pro_accordions_icons = get_post_meta( $post->ID, 'pro_accordions_icons', true );
                        
                        if(empty($pro_accordions_icons))
                            {
                            $pro_accordions_icons = "";
                            }
                    
                    
                        $count=count($filenames);
                        
                    
                        $i=0;
                        echo "<select class='pro_accordions_icons_list' name='pro_accordions_icons' >";
                    
                        while($i<$count)
                            {
                                $filelink_name= str_replace($dir_path,"",$filenames[$i]);
                                
                                $filelink= pro_pro_pro_accordions_plugin_url."css/icons/".$filelink_name;
                                
                                $icon_name = str_replace('.png', '', $filelink_name);
                                
                                if($pro_accordions_icons==$icon_name)
                                    {
                                        echo '<option style="background:url('.$filelink.') no-repeat scroll 0 0 rgba(0, 0, 0, 0); padding-left:20px;" selected value="'.$icon_name.'">';
                                    }
                                else
                                    {
                                        echo '<option style="background:url('.$filelink.') no-repeat scroll 0 0 rgba(0, 0, 0, 0); padding-left:20px;" value="'.$icon_name.'">';
                                    }
                                
                                
        
                                echo $icon_name."</option>";
                                $i++;
                            }
                            
                        echo "</select>";
                        
        
                    
                    
                    
                    ?>
                   
				</div>
                
                
				<div class="option-box">
                    <p class="option-title">Default Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="pro_accordions_default_bg_color" id="pro_accordions_default_bg_color" value="<?php if(!empty($pro_accordions_default_bg_color)) echo $pro_accordions_default_bg_color; else echo "#1FB5AD"; ?>" />                </div>
                
				<div class="option-box">
                    <p class="option-title">Active Background Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="pro_accordions_active_bg_color" id="pro_accordions_active_bg_color" value="<?php if(!empty($pro_accordions_active_bg_color)) echo $pro_accordions_active_bg_color; else echo "#7A5AAD"; ?>" />                </div>


				<div class="option-box">
                    <p class="option-title">Pro Accordions Header Font Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="pro_accordions_items_title_color" id="pro_accordions_items_title_color" value="<?php if(!empty($pro_accordions_items_title_color)) echo $pro_accordions_items_title_color; else echo "#E88E37"; ?>" />                </div>


				<div class="option-box">
                    <p class="option-title">Pro Accordions Header Font Size</p>
                    <p class="option-info"></p>
                    
                    <input type="text" name="pro_accordions_items_title_font_size" placeholder="ex:14px number with px" id="pro_accordions_items_title_font_size" value="<?php if(!empty($pro_accordions_items_title_font_size)) echo $pro_accordions_items_title_font_size; else echo "14px"; ?>" />
                    
                </div>


				<div class="option-box">
                    <p class="option-title">Pro Accordions Content Font Color</p>
                    <p class="option-info"></p>
                    <input type="text" name="pro_accordions_items_content_color" id="pro_accordions_items_content_color" value="<?php if(!empty($pro_accordions_items_content_color)) echo $pro_accordions_items_content_color; else echo "#000"; ?>" />
                </div>
                

				<div class="option-box">
                    <p class="option-title">Pro Accordions Content Font Size</p>
                    <p class="option-info"></p>
                    <input type="text" name="pro_accordions_items_content_font_size" id="pro_accordions_items_content_font_size" value="<?php if(!empty($pro_accordions_items_content_font_size)) echo $pro_accordions_items_content_font_size; else echo "13px"; ?>" />
                </div>                
                
                
                
                            
            </li>
            <li style="display: none;" class="box3 tab-box ">
				<div class="option-box">
                    <p class="option-title">Content</p>
                    <p class="option-info"></p>
                    
                    <div class="pro_accordions-content-buttons" >
                        <div class="button add-pro_accordions">Add</div>
                        <br />
                    </div>
                <table width="100%" class="pro_accordions-content">
                
                <?php
                $total_row = count($pro_accordions_content_title);
				
				if(empty($pro_accordions_content_title))
					{
						$pro_accordions_content_title = array(0);
					}
				
				foreach ($pro_accordions_content_title as $index => $pro_accordions_title)
					{

					
					?>
                    <tr index='<?php echo $index; ?>' valign="top">

                        <td style="vertical-align:middle;">
                        <span class="removepro_accordions">X</span>
                        <br/><br/>
                        <input width="100%" placeholder="pro_accordions Header" type="text" name="pro_accordions_content_title[<?php echo $index; ?>]" value="<?php if(!empty($pro_accordions_title)) echo $pro_accordions_title; ?>" />
                        <br /><br />
                        <textarea placeholder="pro_accordions Content" name="pro_accordions_content_body[<?php echo $index; ?>]" ><?php if(!empty($pro_accordions_content_body[$index])) echo $pro_accordions_content_body[$index]; ?></textarea>
                        </td>           
                    </tr>
                    <?php
					
					
					}
				
				?>
                
                
                
                
                
                
                


                     
                 </table>
                    

                </div>  
            </li>
        
        </ul>
        


    </div> <!-- para-settings -->



<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_pro_accordions_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['pro_meta_boxes_pro_accordions_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['pro_meta_boxes_pro_accordions_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'pro_meta_boxes_pro_accordions_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$pro_accordions_bg_img = sanitize_text_field( $_POST['pro_accordions_bg_img'] );	
	$pro_accordions_themes = sanitize_text_field( $_POST['pro_accordions_themes'] );
	$pro_accordions_icons = sanitize_text_field( $_POST['pro_accordions_icons'] );

	$pro_accordions_default_bg_color = sanitize_text_field( $_POST['pro_accordions_default_bg_color'] );	
	$pro_accordions_active_bg_color = sanitize_text_field( $_POST['pro_accordions_active_bg_color'] );


	$pro_accordions_items_title_color = sanitize_text_field( $_POST['pro_accordions_items_title_color'] );	
	$pro_accordions_items_title_font_size = sanitize_text_field( $_POST['pro_accordions_items_title_font_size'] );	

	$pro_accordions_items_content_color = sanitize_text_field( $_POST['pro_accordions_items_content_color'] );	
	$pro_accordions_items_content_font_size = sanitize_text_field( $_POST['pro_accordions_items_content_font_size'] );	
	
	$pro_accordions_content_title = stripslashes_deep( $_POST['pro_accordions_content_title'] );	
	$pro_accordions_content_body = stripslashes_deep( $_POST['pro_accordions_content_body'] );		
	

	
			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'pro_accordions_bg_img', $pro_accordions_bg_img );	
	update_post_meta( $post_id, 'pro_accordions_themes', $pro_accordions_themes );
	update_post_meta( $post_id, 'pro_accordions_icons', $pro_accordions_icons );

	update_post_meta( $post_id, 'pro_accordions_default_bg_color', $pro_accordions_default_bg_color );
	update_post_meta( $post_id, 'pro_accordions_active_bg_color', $pro_accordions_active_bg_color );


	update_post_meta( $post_id, 'pro_accordions_items_title_color', $pro_accordions_items_title_color );
	update_post_meta( $post_id, 'pro_accordions_items_title_font_size', $pro_accordions_items_title_font_size );

	update_post_meta( $post_id, 'pro_accordions_items_content_color', $pro_accordions_items_content_color );
	update_post_meta( $post_id, 'pro_accordions_items_content_font_size', $pro_accordions_items_content_font_size );
	
	update_post_meta( $post_id, 'pro_accordions_content_title', $pro_accordions_content_title );
	update_post_meta( $post_id, 'pro_accordions_content_body', $pro_accordions_content_body );	

}

add_action( 'save_post', 'meta_boxes_pro_accordions_save' );