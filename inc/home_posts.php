  <div class="home-posts">
    <a data-action="see-all" href="/bloc/"><?php _e("Read all", "guanyem"); ?></a>
    <ul>
    <?php /*
    $args = array('posts_per_page' => 5, 'post_status' => 'publish', 'category' => icl_object_id(296, 'category', true));
    $home_posts = get_posts($args);
    foreach($home_posts as $post){ ?>
      <li class="article-excerpt">
        <?php the_excerpt(); ?> 
      </li>
    <?php }*/ ?>
    <?php query_posts('cat=' . icl_object_id(296, 'category', true)); ?>
    <?php if (have_posts()){ ?>
      <?php while (have_posts()){ ?>
        <?php the_post(); ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
  <?php wp_reset_query(); ?>