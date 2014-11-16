<?php
/*
Template Name: Transparency Page
*/
// submenu
$submenu_ids = array('ca' => 1109, 'es' => 1110);

// thank you page
$current_id = icl_object_id(get_the_ID(), 'page', FALSE, 'ca');
$is_thankyou_page = ($current_id == 3182); // 2207 in DEV
$donations_post_id = icl_object_id(3184, 'page'); // 2077 in DEV
$donations_url = get_permalink($donations_post_id);
$twitter_text = urlencode(__("I have already supported financially @guanyem", "guanyem") . " #THIS-IS-OUR-CAUSE-HASHTAG");
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">
                
            <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container donations-page-container">

                <nav class="submenu">
                  <?php wp_nav_menu(array('menu' => $submenu_ids[ICL_LANGUAGE_CODE])); ?>
                </nav>

                <h1 class="entry-title"><?php the_title(); ?></h1>

                <?php the_content(); ?>

                <?php if ($is_thankyou_page){ ?>
                <div class="sharing-buttons">
                  <ul>
                    <li>
                      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $donations_url; ?>" data-action="share-facebook"><i class="fa fa-facebook-square"></i><span>facebook</span></a>
                    </li>
                    <li>
                      <a href="http://twitter.com/home?status=<?php echo $twitter_text; ?>" data-action="share-twitter"><i class="fa fa-twitter-square"></i><span>twitter</span></a>
                    </li>
                  </ul>
                </div>
                <?php } ?>

            </div><!--.article-container -->

            <?php /*<div class="span3 right tc-sidebar">
              <div id="right" role="complementary">
                
              </div>
            </div>*/ ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>