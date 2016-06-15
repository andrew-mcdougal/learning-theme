<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script src="https://use.typekit.net/lwf0vnj.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php
	do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="six columns">
					<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); // Link to the home page ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
						<img width="50" height="50" src="<?php echo get_stylesheet_directory_uri(); ?>/img/header-logo.png" />
						<div class="headings">
							<h2><?php bloginfo( 'name' ); // Display the blog name ?></h2>
							<h3><?php bloginfo( 'description' ); // Display the blog description, found in General Settings ?></h3>
						</div>
					</a>
				</div>
				<div class="six columns">
					<nav class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); // Display the user-defined menu in Appearance > Menus ?>
					</nav><!-- .site-navigation .main-navigation -->
				</div>
			</div>
			<div class="clear"></div>
		</div><!--/container -->
			
	</header><!-- #masthead .site-header -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div class="under-header">
    <?php //sb_view_breadcrumb(); ?>
  </div>

	<!-- Banner image -->
  <div class="top-bg">
  
  <?php 
  $banner_image = get_field( 'banner_image' ) ;
  $size = "banner"; // custom banner size of 1400 x 320
  $image = wp_get_attachment_image_src( $banner_image, $size );
  
  if ( !$banner_image) {
    $parentID = array_reverse(get_post_ancestors($post->ID)); 
    $image = get_field( 'banner_image', $parentID[0]);
  } 
  ?>

    <div class="page-banner" style="background-image: url(<?php echo $image[0]; ?>)"></div>
    <div class="page-banner-overlay"></div>

    <!-- banner logo -->
    <div class="banner-logo">
    <?php 
    $banner_logo = get_field('banner_logo');
      if( !empty($banner_logo) ): ?>
      <img width="115" height="115" src="<?php echo $banner_logo['url']; ?>" />
    <?php endif; ?>
    </div>
    <!-- Page-title -->
   <?php the_field('page_title'); ?>
    
    

  </div><!-- Banner image -->