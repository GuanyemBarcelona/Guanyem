<?php
/*
Template Name: Donations Page
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">
                
            <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> span9 article-container press-list-container">

                <h1 class="entry-title"><?php the_title(); ?></h1>

                <nav class="submenu">
                  <a href="/colabora-periodica" class="small-button smallred">Donació periòdica</a>
                  <a href="/colabora-puntual" class="small-button smallred">Donació puntual</a>
                  <a href="/colabora-domiciliacio" class="small-button smallred">Domiciliació bancària</a>
                </nav>

                <?php the_content(); ?>

            </div><!--.article-container -->

            <div class="span3 right tc-sidebar">
              <div id="right" role="complementary">
                
              </div>
            </div>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>