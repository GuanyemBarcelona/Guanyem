<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/


register_nav_menu( 'secundary', __( 'Top Menu', 'customizr' )  ); /* Second menu added by sinsistema */

function glanguages_widgets_init() {
	register_sidebar( array(
		'name' => 'Guanyem Languages',
		'id' => 'guanyem_languages',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'glanguages_widgets_init' );
add_editor_style('editor-style.css');

function gbloc_widgets_init() {
	register_sidebar( array(
		'name' => 'Guanyem Bloc',
		'id' => 'guanyem_bloc',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'gbloc_widgets_init' );
add_editor_style('editor-style.css');

/*
* enqueue scripts
*/
function g_scripts() {
  wp_enqueue_style('guanyem_plugins_css', get_stylesheet_directory_uri() . '/plugins.css', array(), '1.0.0', 'all');
  wp_enqueue_script('guanyem_plugins', get_stylesheet_directory_uri() . '/js/plugins.js', array(), '1.0.0', true);
  wp_enqueue_script('guanyem_init', get_stylesheet_directory_uri() . '/js/init.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'g_scripts');

/*
* init hook: create post type press
*/
function gcreate_post_type_press() {
  register_post_type('press',
    array(
      'labels' => array(
        'name' => _x('Press', 'press post type'),
        'singular_name' => _x('Press', 'press post type'),
        'add_new_item' => __('Add New Press article'),
      ),
    	'public' => true,
    	'menu_position' => 5,
    	'menu_icon' => 'dashicons-media-document',
    	'has_archive' => true,
    )
  );
}
add_action('init', 'gcreate_post_type_press');
add_post_type_support('press', 'author');

/*function add_custom_types_to_archive($query) {
  if ($query->is_archive()){
    $query->set('post_type', array('post', 'press'));
  }
  return $query;
}
add_action('pre_get_posts', 'add_custom_types_to_archive');*/

function move_the_slider() {
  //we unhook the slider
  remove_action('__after_header', array(TC_slider::$instance, 'tc_slider_display'));

  //we re-hook the slider. Check the priority here: set to 0 to be the first in the list of different actions hooked to this hook
  add_action('__starting_highlight', array(TC_slider::$instance, 'tc_slider_display'), 0);
}
add_action('wp_head', 'move_the_slider');
