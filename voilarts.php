<?php
/*
Plugin Name: Voilarts
Plugin URI:
Description: Street and circus show
Version: 1.0
Author: Hector Ovalles
Author URI:
Plugin Type: Piklist
License: GNU
Text Domain: voilarts
*/


    // Localisation Support
    //load_theme_textdomain('voilarts', get_template_directory() . '/languages');

/**
   * Register a book post type, with REST API support
   *
   * Based on example at: http://codex.wordpress.org/Function_Reference/register_post_type
   */
  add_action( 'init', 'my_artist_cpt' );
  function my_artist_cpt() {
  	$labels = array(
  		'name'               => _x( 'Artists', 'post type general name', 'voilarts' ),
  		'singular_name'      => _x( 'Artist', 'post type singular name', 'voilarts' ),
  		'menu_name'          => _x( 'Artist', 'admin menu', 'voilarts' ),
  		'name_admin_bar'     => _x( 'Artist', 'add new on admin bar', 'voilarts' ),
  		'add_new'            => _x( 'Add New', 'artist', 'voilarts' ),
  		'add_new_item'       => __( 'Add New Artista', 'voilarts' ),
  		'new_item'           => __( 'New Artist', 'voilarts' ),
  		'edit_item'          => __( 'Edit Artist', 'voilarts' ),
  		'view_item'          => __( 'View Artist', 'voilarts' ),
  		'all_items'          => __( 'All Artist', 'voilarts' ),
  		'search_items'       => __( 'Search Artists', 'voilarts' ),
  		'parent_item_colon'  => __( 'Parent Artists:', 'voilarts' ),
  		'not_found'          => __( 'No artists found.', 'voilarts' ),
  		'not_found_in_trash' => __( 'No artists found in Trash.', 'voilarts' )
  	);

  	$args = array(
  		'labels'             => $labels,
  		'description'        => __( 'Description.', 'voilarts' ),
  		'public'             => true,
  		'publicly_queryable' => true,
  		'show_ui'            => true,
  		'show_in_menu'       => true,
  		'query_var'          => true,
  		'rewrite'            => array( 'slug' => 'artist' ),
  		'capability_type'    => 'post',
  		'has_archive'        => true,
        'hierarchical'       => true,
  		'menu_position'      => null,
        'edit_columns' => array(
          'title' => 'Demo',
          'author' => 'Assigned to'
            ),
  		'show_in_rest'       => true,
  		'rest_base'          => 'artists-api',
  		'rest_controller_class' => 'WP_REST_Posts_Controller',
  		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes' ),
        'taxonomies' => array(
            ''
        ) // Add Category and Post Tags support
  	);

  	register_post_type( 'artist', $args );
}
  //add_filter('piklist_post_types', 'artist_cpt_pk');
  function artist_cpt_pk($post_types)
  {
  	$labels_art = array(
  		'name'               => _x( 'Artists', 'post type general name', 'voilarts' ),
  		'singular_name'      => _x( 'Artist', 'post type singular name', 'voilarts' ),
  		'menu_name'          => _x( 'Artist', 'admin menu', 'voilarts' ),
  		'name_admin_bar'     => _x( 'Artist', 'add new on admin bar', 'voilarts' ),
  		'add_new'            => _x( 'Add New', 'artist', 'voilarts' ),
  		'add_new_item'       => __( 'Add New Artista', 'voilarts' ),
  		'new_item'           => __( 'New Artist', 'voilarts' ),
  		'edit_item'          => __( 'Edit Artist', 'voilarts' ),
  		'view_item'          => __( 'View Artist', 'voilarts' ),
  		'all_items'          => __( 'All Artist', 'voilarts' ),
  		'search_items'       => __( 'Search Artists', 'voilarts' ),
  		'parent_item_colon'  => __( 'Parent Artists:', 'voilarts' ),
  		'not_found'          => __( 'No artists found.', 'voilarts' ),
  		'not_found_in_trash' => __( 'No artists found in Trash.', 'voilarts' )
  	);
    $post_types['artist'] = array(
      //'labels' => $labels_art
      //,'title' => __('Enter a new Artist')
      //,'menu_icon' => piklist('url', 'piklist') . '/parts/img/piklist-menu-icon.svg'
      //,'page_icon' => piklist('url', 'piklist') . '/parts/img/piklist-page-icon-32.png'
      'edit_columns' => array(
      )
      //,'hide_meta_box' => array(
        //'author'
      //)
      //,'status' => array(
        //'new' => array(
          //'label' => 'New'
          //,'public' => false
        //)
        //,'pending' => array(
          //'label' => 'Pending Review'
          //,'public' => false
        //)
        //,'demo' => array(
          //'label' => 'Demo'
          //,'public' => true
          //,'exclude_from_search' => true
          //,'show_in_admin_all_list' => true
          //,'show_in_admin_status_list' => true
       //)
        //,'lock' => array(
          //'label' => 'Lock'
          //,'public' => true
        //)
      //)
    );
    return $post_types;
  }



//add_filter('piklist_admin_pages', 'artist_ex');
  function artist_ex($pages)
  {
     $pages[] = array(
      'page_title' => __('')
      ,'menu_title' => __('Slider', 'artist')
      ,'sub_menu' => 'edit.php?post_type=artist'
      ,'capability' => 'manage_options'
      ,'menu_slug' => 'custom_settings'
      ,'setting' => 'voilarts_settings'
      ,'menu_icon' => plugins_url('piklist/parts/img/piklist-icon.png')
      ,'page_icon' => plugins_url('piklist/parts/img/piklist-page-icon-32.png')
      ,'single_line' => true
      ,'default_tab' => 'Basic'
      ,'save_text' => 'Save Demo Settings'
    );

    return $pages;
  }

//wp_enqueue_script('bxSlider');
add_action('init','register_my_scripts');
add_action('init','register_my_styles');

function register_my_scripts(){
wp_register_script('bxSlider', plugin_dir_url(__FILE__) . 'bower_components/bxslider-4/dist/jquery.bxslider.js', array('jquery'));
wp_enqueue_script('bxSlider');
}
function register_my_styles(){
    wp_register_script('bxStyle', plugin_dir_url(__FILE__) . 'bower_components/bxslider-4/dist/jquery.bxslider.css', array('jquery'));
    wp_enqueue_script('bxStyle');
}
