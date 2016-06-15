<?php

/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {


  
  wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array(), '' );
  wp_enqueue_style( 'first-style', get_stylesheet_directory_uri() . '/styles/first-style.css', array(), '' );

  wp_enqueue_style( 'fraynework-style', get_stylesheet_directory_uri() . '/styles/fraynework.css', array(), '' );
  wp_enqueue_style( 'skeleton-style', get_stylesheet_directory_uri() . '/styles/skeleton.css', array(), '' );

  wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );

  wp_enqueue_script( 'popup-script', get_template_directory_uri() . '/js/popup.js', array(), '' );
  wp_enqueue_style( 'popup-style', get_stylesheet_directory_uri() . '/styles/popup-new.css', array(), '' );




}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts', 15 );


add_filter('sensei_single_title', 'custom_single_title_prepend');

/**
 * Filter the sensei single titles ( singular course, lesson and quiz )
 *
 * @param $title
 * @return string
 */
function custom_single_title_prepend( $title  ){

    if( is_singular( 'course' ) ){

        return '';

    }elseif( is_singular( 'lesson' ) ){

        return ''. $title;

    }elseif( is_singular( 'quiz' ) ){

        return ''. $title;

    }else{

        return $title;

    }

} // end custom_single_title_prepend