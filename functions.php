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
  wp_enqueue_script('guanyem_init', get_stylesheet_directory_uri() . '/js/init.js', array(), '1.0.2', true);
}
add_action( 'wp_enqueue_scripts', 'g_scripts');

/*
* create taxonomies
*/
function g_create_taxonomies() {
  // Add press tags taxonomy
  $labels = array(
    'name'                       => _x('Press tags', 'taxonomy general name'),
    'singular_name'              => _x('Press tag', 'taxonomy singular name'),
    'search_items'               => __('Search Press tags'),
    'popular_items'              => __('Popular Press tags'),
    'all_items'                  => __('All Press tags'),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __('Edit Press tag'),
    'update_item'                => __('Update Press tag'),
    'add_new_item'               => __('Add New Press tag'),
    'new_item_name'              => __('New Press tag'),
    'separate_items_with_commas' => __('Separate tags with commas'),
    'add_or_remove_items'        => __('Add or remove tags'),
    'choose_from_most_used'      => __('Choose from the most used Press tags'),
    'not_found'                  => __('No Press tags found.'),
    'menu_name'                  => __('Press tags'),
  );
  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array('slug' => 'press-tag'),
  );
  register_taxonomy('press_tag', 'press', $args);
}
add_action('init', 'g_create_taxonomies', 0);

/*
TODO: Trying to make a link like /press-tag/sometag/ to work
*/
/*function g_query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if ($post_type == '') $post_type = array('post', 'press');
    $query->set('post_type', $post_type);
    return $query;
  }
}
add_filter('pre_get_posts', 'g_query_post_type');*/

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

/*
* Creates an excerpt with custom length
*/
function g_excerpt($limit = 55) {
  return wp_trim_words(get_the_excerpt(), $limit);
}

/*
* Returns a list of other social links not included in the Theme's config. That means two places to edit this stuff. Annoying, not my fault :S
*/
function g_get_other_social_links(){
  $other_social_links = array(
    'tumblr' => array(
      'name' => 'Tumblr',
      'link' => 'http://guanyembarcelona.tumblr.com/',
    ),
  );
  return $other_social_links;
}

/*
* Returns html for all extra social links
*/
function g_html_other_social_links() {
  $links = g_get_other_social_links();
  $html = '';
  foreach ($links as $key => $link) {
    $html .= '<a class="social-icon icon-' . $key . '" href="' . $link['link'] . '" title="' . __("Follow me on", "guanyem") . ' ' . $link['name'] . '" rel="external"></a>';
  }
  return $html;
}

/* custom social links in header */
function g_custom_social_in_header($resp) {
  $class = ('resp' == $resp) ? '':'span5'; 
  ?>
  <div class="social-block <?php echo $class ?>">
    <?php if (0 != tc__f('__get_option', 'tc_social_in_header')){ ?>
       <?php echo tc__f('__get_socials') ?>
       <?php echo g_html_other_social_links(); ?>
    <?php } ?>
  </div><!--.social-block-->
  <?php
}
add_filter('tc_social_in_header', 'g_custom_social_in_header');

/* Html5 search form */
function g_add_search_form_to_menu($items, $args) {
  if( !($args->theme_location == 'main')) return $items;
  return $items . '<li class="my-nav-menu-search">' . get_search_form(false) . '</li>';
}
add_theme_support('html5', array('search-form'));
add_filter('wp_nav_menu_items', 'g_add_search_form_to_menu', 10, 2);