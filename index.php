<?php
/**
 * The main template file. Includes the loop.
 *
 *
 * @package Customizr
 * @since Customizr 1.0
 */
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">
  
  <div id="highlight-zone">
    <?php do_action('__starting_highlight'); ?>

    <?php
    // the post video
    $video_id = get_field('video_youtube_id');
    $video_title = get_field('video_title');
    $video_lead = get_field('video_lead');
    if (isset($video_id) && $video_id != ''){ ?>
    <div class="video-zone">
      <div class="inner">
        <?php if (isset($video_title)){ ?>
        <h2><?php echo $video_title; ?></h2>
        <?php } ?>
        <iframe width="320" height="180" src="//www.youtube.com/embed/<?php echo $video_id; ?>?autoplay=0&amp;showinfo=0&amp;controls=0" frameborder="0" allowfullscreen></iframe>
        <?php if (isset($video_lead)){ ?>
        <p><?php echo $video_lead; ?></p>
        <?php } ?>
      </div>
    </div>
    <?php } ?>

    <?php 
    // streaming en la Home
    ?>
    <?php /*if (is_front_page()) { ?>
    <div class="video-zone">
      <div class="inner">
        <h2><?php echo __("En directe: Roda de premsa #QuerellaPujol", "guanyem"); ?></h2>
        <iframe src="https://embed.bambuser.com/channel/Guanyem" width="320" height="240" frameborder="0">Your browser does not support iframes.</iframe>
        <p></p>
      </div>
    </div>
    <?php }*/ ?>

  </div>

<?php if (is_front_page()) { ?>
  <?php if (ICL_LANGUAGE_CODE=='ca'){ ?>
  <div class="container marketing">
    <div class="row widget-area" role="complementary">

      <div class="span4 fp-one">
        <div class="content">
          <h2>Com puc participar?</h2>
          <p class="fp-text-one">Guanyem Barcelona és un procés de construcció col·lectiva en què s'hi pot implicar tothom. 
          Busquem el suport de la ciutadania, la complicitat dels barris i la col·laboració dels col·lectius. 
          Us expliquem com i quan.  </p>
          <a class="btn btn-primary fp-button" href="/participa/" title="Com puc participar?">Implica-t'hi </a>
        </div><!-- /.widget-front -->
      </div>
      
      <div class="span4 fp-two">
        <div class="content">
          <h2>Per què volem guanyar Barcelona?</h2>
          <p class="fp-text-two">Estem  perdent Barcelona i volem recuperar-la. Per aconseguir-ho, cal que  arrenquem un procés que no parteixi 
          d'un programa electoral tancat i que ens permeti treballar a partir d'objectius concrets. Aquests són els  principis bàsics que defensem.  </p>
          <a class="btn btn-primary fp-button" href="/compromisos/" title="Per què volem guanyar Barcelona?">Llegeix </a>
        </div><!-- /.widget-front -->
      </div>
      
      <div class="span4 fp-three">
        <div class="content">
          <?php include 'inc/marketing_blog_articles.php'; ?>
        </div><!-- /.widget-front -->
      </div>
    </div>
  </div><!-- .container -->

  <?php }elseif(ICL_LANGUAGE_CODE=='es'){ ?>
  <div class="container marketing">
    <div class="row widget-area" role="complementary">

      <div class="span4 fp-one">
        <div class="content">
          <h2>¿Cómo puedo participar?</h2>
          <p class="fp-text-one">Guanyem Barcelona es un proceso de construcción colectiva en el que todos se pueden implicar. 
          Buscamos el apoyo de la ciudadanía, la complicidad de los barrios y la colaboración de los colectivos. Os explicamos cómo y cuándo.</p>
          <a class="btn btn-primary fp-button" href="/es/participa/" title="Com puc participar?">Implícate </a>
        </div><!-- /.widget-front -->
      </div>
      
      <div class="span4 fp-two">
        <div class="content">
          <h2>¿Por qué queremos ganar Barcelona?</h2>
          <p class="fp-text-two">Estamos perdiendo Barcelona y queremos recuperarla. 
          Para conseguirlo, debemos  iniciar un proceso que no parta de un programa electoral cerrado y que nos permita trabajar a partir de objetivos concretos. 
          Éstos son los principios básicos que defendemos.  </p>
          <a class="btn btn-primary fp-button" href="/es/compromisos/" title="Per què volem guanyar Barcelona?">Lee </a>
        </div><!-- /.widget-front -->
      </div>
      
      <div class="span4 fp-three">
        <div class="content">
          <?php include 'inc/marketing_blog_articles.php'; ?>
        </div><!-- /.widget-front -->
      </div>
    </div>
  </div><!-- .container -->
  <?php } ?>
<?php } ?>

  <div class="container" role="main">
      <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

          <?php do_action( '__before_article_container'); ##hook of left sidebar?>
              
              <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">

                  <?php include 'inc/sharing.php'; ?>
                  
                  <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                      <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>

                          <article <?php tc__f('__article_selectors') ?>>
                              <?php do_action( '__loop' ); ?>
                          </article>
                          
                      <?php endif; ?>

                      <?php if ( have_posts() && !is_404() ) : ?>
                          <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                              <?php the_post(); ?>

                              <?php do_action ('__before_article') ?>
                                  <article <?php tc__f('__article_selectors') ?>>
                                      <?php do_action( '__loop' ); ?>
                                  </article>
                              <?php do_action ('__after_article') ?>

                          <?php endwhile; ?>

                      <?php endif; ##end if have posts ?>

                  <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

              </div><!--.article-container -->

         <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

      </div><!--.row -->
  </div><!-- .container role: main -->

  <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>