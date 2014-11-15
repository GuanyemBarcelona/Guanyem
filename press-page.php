<?php
/*
Template Name: Press Page
*/

$is_press_home = ($post->post_parent == 0);
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

                <div class="span3 left tc-sidebar">
                  <div id="left" class="widget-area" role="complementary">
                    <aside id="press-tags" class="widget widget_tag_cloud">
                      <h3 class="widget-title"><?php _e("Press tag cloud", "guanyem"); ?></h3>
                      <?php wp_tag_cloud(array('taxonomy'=>'press_tag')); ?>
                    </aside>
                  </div><!-- #left -->
                </div>

                <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> span6 article-container press-list-container">

                    <?php// include 'inc/sharing.php'; ?>

                    <nav class="submenu">
                      <ul>
                        <li><a href="/sala-de-premsa" class="small-button smallred">Notes de premsa</a></li>
                        <li><a href="/sala-de-premsa/portaveus" class="small-button smallred">Portaveus</a></li>
                        <li><a href="/sala-de-premsa/recursos" class="small-button smallred">Recursos de premsa</a></li>
                      </ul>
                    </nav>

                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                    <?php if ($is_press_home){ ?>
                      <?php query_posts( 'post_type=press'); ?>
                      <?php if ( have_posts() ) : ?>
                          <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                              
                              <?php the_post(); ?>

                              <?php do_action ('__before_article') ?>
                                  <article <?php tc__f('__article_selectors') ?>>
                                      <?php do_action( '__loop' ); ?>
                                  </article>
                              <?php do_action ('__after_article') ?>

                          <?php endwhile; ?>

                      <?php endif; ##end if have posts ?>
                    <?php }else{ ?>
                    <?php the_content(); ?>
                    <?php } ?>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

                <div class="span3 right tc-sidebar">
                  <div id="right" role="complementary">
                    <aside id="press-contact-info">
                      <h3><?php _e("Contact Press", "guanyem"); ?></h3>
                      <p>Si ets periodista posa’t en contacte amb l’equip de premsa en el correu electrònic:</p>
                      <p><a href="mailto:<?php echo antispambot('premsa@guanyembarcelona.cat'); ?>" class="email">premsa@guanyembarcelona.cat</a><br>
                      <span class="telephone">Telèfon: 695 189 196</span></p>
                    </aside>
                  </div>
                </div>

                <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>