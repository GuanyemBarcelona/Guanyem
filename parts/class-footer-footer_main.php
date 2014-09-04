<?php
/**
* Footer actions
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC_footer_main {

    //Access any method or var of the class with classname::$instance -> var or method():
    static $instance;

    function __construct () {

        self::$instance =& $this;
        //html > footer actions
        add_action ( '__after_main_wrapper'		, 'get_footer');

        //footer actions
        add_action ( '__footer'					, array( $this , 'tc_widgets_footer' ), 10 );
        add_action ( '__footer'					, array( $this , 'tc_colophon_display' ), 20 );
        add_action ( '__colophon'				, array( $this , 'tc_colophon_left_block' ), 10 );
        add_action ( '__colophon'				, array( $this , 'tc_colophon_center_block' ), 20 );
        add_action ( '__colophon'				, array( $this , 'tc_colophon_right_block' ), 30 );
    }


   /**
	 * Displays the footer widgets areas
	 *
	 *
	 * @package Customizr
	 * @since Customizr 3.0.10
	 */
    function tc_widgets_footer() {
    	
    	//checks if there's at least one active widget area in footer.php.php
    	$status 					= false;
    	$footer_widgets 			= apply_filters( 'tc_footer_widgets', TC_init::$instance -> footer_widgets );
    	foreach ( $footer_widgets as $key => $area ) {
    		$status = is_active_sidebar( $key ) ? true : $status;
    	}
		if ( !$status )
			return;
		
		//hack to render white color icons if skin is grey or black
		$skin_class 	= ( in_array( tc__f('__get_option' , 'tc_skin') , array('grey.css' , 'black.css')) ) ? 'white-icons' : '';

		ob_start();
		?>
			<div class="container footer-widgets <?php echo $skin_class ?>">
				<div class="row widget-area" role="complementary">
					
					<?php foreach ( $footer_widgets as $key => $area )  : ?>

						<?php if ( is_active_sidebar( $key ) ) : ?>
							
							<div id="<?php echo $key; ?>" class="<?php echo apply_filters( "{$key}_widget_class", "span4" ) ?>">
								<?php do_action("__before_{$key}_widgets"); ?>
									<?php dynamic_sidebar( $key ); ?>
								<?php do_action("__after_{$key}_widgets"); ?>
							</div>

						<?php endif; ?>

					<?php endforeach; ?>
				</div><!-- .row.widget-area -->
			</div><!--.footer-widgets -->
		<?php
		$html = ob_get_contents();
        if ($html) ob_end_clean();
        echo apply_filters( 'tc_widgets_footer', $html , $footer_widgets );
	}//end of function


   /**
	 * Displays the colophon (block below the widgets areas).
	 *
	 *
	 * @package Customizr
	 * @since Customizr 3.0.10
	 */
  function tc_colophon_display() {
	  ob_start() ?>
	 <div class="colophon">
	 	<div class="container">
	 		<div class="<?php echo apply_filters( 'tc_colophon_class', 'row-fluid' ) ?>">
			    <?php 
				    //colophon blocks actions priorities
				    //renders blocks
				    do_action( '__colophon' ); 
			    ?>
    			</div><!-- .row-fluid -->
    		</div><!-- .container -->
    	</div><!-- .colophon -->
  	<?php
  	$html = ob_get_contents();
      if ($html) ob_end_clean();
      echo apply_filters( 'tc_colophon_display', $html );
  }

  /**
	* Left block: used for the Credits call back functions
	* Can be filtered using the $site_credits, $tc_credits parameters
	*
	*
	* @package Customizr
	* @since Customizr 3.0.6
	*/
  function tc_colophon_left_block() {
  	$license_uri = 'http://creativecommons.org/licenses/by-sa/3.0/deed.es_ES';
  	?>
  	<div class="span8 credits">
  		<p>
  			<a rel="license" href="<?php echo $license_uri; ?>" class="cc-logo"><img alt="Licencia de Creative Commons" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png"></a>
        <?php _e("This work is licensed under a", "guanyem"); ?> <a rel="license" href="<?php echo $license_uri; ?>"><?php _e("Creative Commons Attribution-ShareAlike 3.0 Unported License", "guanyem"); ?></a>.
  			 - <?php icl_link_to_element(382); ?>
  		</p>
  	</div>
  	
  	<?php
  	/*echo apply_filters(
  		'tc_credits_display',
  		sprintf('<div class="%1$s">%2$s</div>',
    		apply_filters( 'tc_colophon_left_block_class', 'span4 credits' ),
    		sprintf( '<p> <a href="/avis-legal/">Aviso legal</a> </p>',
				    esc_attr( date( 'Y' ) ),
				    esc_url( home_url() ),
				    esc_attr(get_bloginfo()),
				    '<a href="http://bambuser.com">Bambuser</a>'
			)
  		)
  	);*/
  }


	/**
	* Center block: used for the Social networks block
	*
	*
	* @package Customizr
	* @since Customizr 3.0.10
	*/
  function tc_colophon_center_block() {
    	echo apply_filters( 
    		'tc_colophon_center_block', 
    		sprintf('<div class="%1$s">%2$s</div>',
    			apply_filters( 'tc_colophon_center_block_class', 'span2 social-block' ),
    			0 != tc__f( '__get_option', 'tc_social_in_footer') ? tc__f( '__get_socials' ) : ''
    		)
    	);
  }


  /**
	* Right block: used for the Back to top link
	*
	*
	* @package Customizr
	* @since Customizr 3.0.10
	*/
	function tc_colophon_right_block() {
    	echo apply_filters(
    		'tc_colophon_right_block',
    		sprintf('<div class="%1$s"><p><a class="back-to-top" href="#" title="%2$s"><span>%2$s</span> <i class="fa fa-arrow-circle-up"></i></a></p></div>',
    			apply_filters( 'tc_colophon_right_block_class', 'span2 backtop' ),
    			__( 'Back to top' , 'customizr' )
    		)
    	);
	}

}//end of class


