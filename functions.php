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