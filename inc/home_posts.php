  <div class="home-posts">
    <ul>
    <?php query_posts('cat=' . icl_object_id(296, 'category', true)); ?>
    <?php if (have_posts()){ ?>
      <?php while (have_posts()){ ?>
      <li class="article-excerpt">
        <?php the_post(); ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry-meta">
          <?php the_time('j F, Y') ?> <?php _e("by"); ?> <?php the_author_posts_link(); ?>
        </div>
        <?php the_excerpt(); ?>
      </li>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>
  <?php wp_reset_query(); ?>