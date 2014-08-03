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
  
  <!-- Start: Sharing Buttons -->
  <ul class="rrssb-buttons clearfix">
      <li class="facebook">
          <a href="https://www.facebook.com/sharer/sharer.php?u=" class="popup">
              <span class="icon">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                      <path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
                          c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
                          c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
                  </svg>
              </span>
              <span class="text">facebook</span>
          </a>
      </li>
      <li class="twitter">
          <a href="http://twitter.com/home?status=" class="popup">
              <span class="icon">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                  <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                      c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                      C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                      C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                      c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                      C26.275,7.229,25.39,8.196,24.253,8.756z"/>
                  </svg>
              </span>
              <span class="text">twitter</span>
          </a>
      </li>
  </ul>
  <!-- End: Sharing Buttons -->

<?php 
if (is_front_page()) {
	if (ICL_LANGUAGE_CODE=='ca') : ?>

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
    

<?php elseif(ICL_LANGUAGE_CODE=='es'): ?>

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
        

<?php endif;
}
?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">

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