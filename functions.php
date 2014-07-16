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