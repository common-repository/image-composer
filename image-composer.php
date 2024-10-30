<?php
/**
* Plugin Name: Image Composer

* Description: Image Composer is a complete and feature-reach  plugin for media WordPress..

* Author: Prozoned Technologies
* Author URI: https://www.prozoned.com/
*Version: 1.0
* License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

* This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

**/
add_action( 'admin_menu', 'icomp_admin_menu' );
function icomp_admin_menu() {
	add_media_page( 'Image Composer', 'Image Composer', 'manage_options', 'slug_img_composer', 'icomp_admin_page', 'dashicons-format-image', 2  );
}
function icomp_admin_page(){
	?>
	
<div class="whl_cont">

<div class="cst_container">
    <div class="row">    
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 cst_col">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled" value="Upload Backgound Image Here"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                       <input type="file" name="image" id="img1" onchange="readURL(this);"> 
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
        </div>
    </div>
</div>
<div class="cst_container">
    <div class="row">    
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 cst_col">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled" value="Upload Logo Image Here"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                       <input type="file" name="logo" id="img2" onchange="viewURL(this);">
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
        </div>
    </div>
</div>
<div class="cst_container_btn">
    <div class="row">    
        <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 cst_col">  
		<button id="clcik" class="btn btn-default">EDIT</button>
		<button id="output" class="btn btn-default">UPDATE</button>
		</div>
	</div>
</div>

</div>

<img src="#"id="bgimg">
<img src="#" id="logoimg">


<div id="canvacvr">
<canvas id="bg" width="917" height="917"></canvas>
<canvas id="cst_logo" width="917" height="917"></canvas>
<img id="result" >
<div id="overlay"></div>
</div>
<script>

 </script>

<?php
}
function icomp_custom_wp_admin_style(){
	if(isset($_GET['page']) && $_GET['page'] == 'slug_img_composer'){
    
	
	if($_GET['page']=="slug_img_composer"){
		wp_enqueue_style( 'cst_wp_admin_css', plugins_url('assets/css/admin_styles.css', __FILE__), false, '1.0.0' );
	}
		wp_enqueue_script( 'custom_wp_admin_js', plugins_url('assets/js/bootstrap.bundle.min.js',__FILE__), array('jquery'));

		
wp_enqueue_script( 'custom_js', plugins_url('assets/js/custom.js', __FILE__));
	
	// Localize the script with new data
	$translation_array = array(
	'rest_url' => esc_url_raw( rest_url() ),
	'nonce' => wp_create_nonce('wp_rest')
	);
	wp_localize_script( 'custom_js', 'myajax', $translation_array );
 
    wp_enqueue_style( 'custom_wp_admin_css' );
	}
}
add_action('admin_enqueue_scripts', 'icomp_custom_wp_admin_style');
    
    
  