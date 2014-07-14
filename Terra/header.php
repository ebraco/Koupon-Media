<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php	     
	    // Page or Single Post
	    if ( is_page() or is_single() ) {
	        the_title();	 
	    // Category Archive
	    } elseif ( is_category() ) {
	        echo single_cat_title('', false);	 
	    // Tag Archive
	    } elseif ( function_exists('is_tag') and function_exists('single_tag_title') and is_tag() ) {
	        printf( __('Tag: %s','Terra'), single_tag_title('', false) );	 
	    // General Archive
	    } elseif ( is_archive() ) {
	        printf( __('Archive: %s','Terra'), wp_title('', false) );	 
	    // Search Results
	    } elseif ( is_search() ) {
	        printf( __('Search: %s','Terra'), get_query_var('s') );
	    }	 
	    // Insert separator for the titles above
	    if ( !is_home() and !is_404() and !is_front_page() ) {
	        echo " - ";
	    }	     
	    // Insert separator for the Home pages
	    if ( is_home() or is_front_page() ) {
	        echo " - ";
	    }	     
	    // Finally the blog name
	    bloginfo('name');	 
	    ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/x-icon" href="<?php echo ot_get_option('favicon_uploaded', get_template_directory_uri().'/images/favicon.png')?>">	


  	<?php
	//Inline Styles
	?>


  	<?php 	$animated_containers = ot_get_option('animated_containers');
  			if($animated_containers){
			     wp_enqueue_script('anim-script', get_template_directory_uri().'/js/anims.js',array('jquery','jquery.easing','terra.common'));
			     wp_localize_script( 'anim-script', 'template_dir_uri', get_template_directory_uri() );
  			}
	?>		
		
	<?php wp_head(); ?>	
	
</head>

<body <?php body_class(); ?>>

  <?php $page_heading_style = ot_get_option('page_heading_style') ? ot_get_option('page_heading_style') : '';?>	

  <div id="wrapper" class="<?php echo (ot_get_option('wrapper_style')=='full_width'? 'full_wrapper' : '');?> <?php echo $page_heading_style;?>">
  
  	<!-- Container -->
	<div class="container">

		<?php $nav_top_block_style = ot_get_option('nav_top_block_style');?>	
				
		<div style="margin-top:-17px;" class="header <?php echo ($nav_top_block_style ? 'block_header' : '');?> fluid columns">

			<div id="logo">
				<?php  $logo = ot_get_option('logo_upload');
					   $top_margin = ot_get_option('logo_top_margin');
					   $left_margin = ot_get_option('logo_left_margin');
					   if(isset($top_margin) && is_array($top_margin)){
					   		$logo_extra_style = ($top_margin[0] || $left_margin[0]) ? 1 : 0;
					   }else{
					   		$logo_extra_style ='';
					   }
					   
				if($logo) { ?>
				<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
					<img src="<?php echo $logo; ?>" <?php echo $logo_extra_style ? "style='". ($top_margin[0] ? 'margin-top: '.$top_margin[0].$top_margin[1].';' : '') . ($left_margin[0] ? 'margin-left: '.$left_margin[0].$left_margin[1].';' : '')."'" : ""; ?> alt="<?php bloginfo('name'); ?>"/>
				</a>
				<?php } else { ?>
				<h1 <?php echo $logo_extra_style ? "style='". ($top_margin[0] ? 'margin-top: '.$top_margin[0].$top_margin[1].';' : '') . ($left_margin[0] ? 'margin-left: '.$left_margin[0].$left_margin[1].';' : '')."'" : ""; ?>>
					<a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					<div class="tagline"><?php echo get_bloginfo ( 'description' ); ?></div>
				</h1>
				<?php } ?>
			</div>

			 
			<!-- Main Navigation -->			
			<?php	$nav_top_margin = ot_get_option('nav_top_margin');
					if(isset($nav_top_margin) && is_array($nav_top_margin) && !empty($nav_top_margin[0])){
					   	$nav_extra_style = " style='margin-top: ".$nav_top_margin[0].$nav_top_margin[1].";'";
					}else{
					   	$nav_extra_style ='';
					}
			?>		   

			<div <?php echo $nav_extra_style; ?>  class="<?php echo get_theme_mod('main_menu_style'); ?>">	
			<?php wp_nav_menu( array(
					'theme_location'=> 'main_navigation',
					'container_id' 	=> 'menu', 
					'menu_class' 	=> '', 
					'walker' 		=> new boc_Menu_Walker,
					'fallback_cb'   => 'menuFallBack',
					'items_wrap' => '<ul>%3$s</ul>',
			));?>
			</div>
			
			<?php wp_nav_menu( array(
					'theme_location'=> 'main_navigation', 
					'container' 	=> '', 
					'menu_class' 	=> '', 
					'walker' 		=> new boc_Menu_Select_Walker,
					'fallback_cb'   => 'menuSelectFallBack',
					'items_wrap' => '<select id="select_menu" onchange="location = this.value"><option value="">'.__('Select Page', 'Terra').'</option>%3$s</select>',
			));?>							
			<!-- Main Navigation::END -->
		</div>
	</div>