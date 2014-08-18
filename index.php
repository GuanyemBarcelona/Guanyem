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

<?php 
if (is_front_page()) {
  if (ICL_LANGUAGE_CODE=='ca'){ ?>

       <div class="container marketing">

        <div class="row widget-area" role="complementary">
          
          <div class="span4 fp-one">
          <div class="widget-front">
            <h2>Com puc participar?</h2>
            <p class="fp-text-one">Guanyem Barcelona és un procés de construcció col·lectiva en què s'hi pot implicar tothom. 
            Busquem el suport de la ciutadania, la complicitat dels barris i la col·laboració dels col·lectius. 
            Us expliquem com i quan.  </p>
            <a class="btn btn-primary fp-button" href="/participa/" title="Com puc participar?">Implica-t'hi </a>
          </div><!-- /.widget-front -->
          </div>
          
          <div class="span4 fp-two">
            <div class="widget-front">
            <h2>Per què volem guanyar Barcelona?</h2>
            <p class="fp-text-two">Estem  perdent Barcelona i volem recuperar-la. Per aconseguir-ho, cal que  arrenquem un procés que no parteixi 
            d'un programa electoral tancat i que ens permeti treballar a partir d'objectius concrets. Aquests són els  principis bàsics que defensem.  </p>
            <a class="btn btn-primary fp-button" href="/compromisos/" title="Per què volem guanyar Barcelona?">Llegeix </a>
          </div><!-- /.widget-front -->
          </div>
          
          <div class="span4 fp-three">
          <div class="widget-front">
            <h2>Finançament</h2>
            <p class="fp-text-three">També en l'àmbit econòmic cal una altra manera de fer política. Ens comprometem a fer públics els nostres comptes.
            Els processos d’organització ciutadana han de garantir la seva autonomia, això implica, però, que no podem renunciar al vostre ajut.</p>
            <a class="btn btn-primary fp-button" href="/financament/" title="Finançament">Col·labora</a>
          </div><!-- /.widget-front -->
          </div>
          </div>
          
        
    </div><!-- .container -->
    

<?php }elseif(ICL_LANGUAGE_CODE=='es'){ ?>

       <div class="container marketing">

        <div class="row widget-area" role="complementary">
        
        <div class="span4 fp-one">
          <div class="widget-front">
            <h2>¿Cómo puedo participar?</h2>
            <p class="fp-text-one">Guanyem Barcelona es un proceso de construcción colectiva en el que todos se pueden implicar. 
            Buscamos el apoyo de la ciudadanía, la complicidad de los barrios y la colaboración de los colectivos. Os explicamos cómo y cuándo.</p>
            <a class="btn btn-primary fp-button" href="/es/participa/" title="Com puc participar?">Implícate </a>
          </div><!-- /.widget-front -->
          </div>
          
            <div class="span4 fp-two">
            <div class="widget-front">
            <h2>¿Por qué queremos ganar Barcelona?</h2>
            <p class="fp-text-two">Estamos perdiendo Barcelona y queremos recuperarla. 
            Para conseguirlo, debemos  iniciar un proceso que no parta de un programa electoral cerrado y que nos permita trabajar a partir de objetivos concretos. 
            Éstos son los principios básicos que defendemos.  </p>
            <a class="btn btn-primary fp-button" href="/es/compromisos/" title="Per què volem guanyar Barcelona?">Lee </a>
            </div><!-- /.widget-front -->
          </div>
          
          <div class="span4 fp-three">
          <div class="widget-front">
            <h2>Financiación</h2>
            <p class="fp-text-three">También en el ámbito económico es necesaria otra forma de hacer política. 
            Nos comprometemos a hacer públicas nuestras cuentas. Esto implica, sin embargo, que no podemos renunciar a vuestra ayuda.</p>
            <a class="btn btn-primary fp-button" href="/es/financiacion/" title="Finançament">Colabora</a>
          </div><!-- /.widget-front -->
            </div>
            </div>
            
        </div><!-- .container -->
        
<?php 
  } 
} 
?>

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