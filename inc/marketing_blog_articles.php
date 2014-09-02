          <h2><?php _e("Blog articles", "guanyem"); ?></h2>
          <div class="article-list">
            <a data-action="see-all" href="/bloc/"><?php _e("Read all", "guanyem"); ?></a>
            <ul>
            <?php
            $args = array('numberposts' => 2, 'suppress_filters' => 0);
            $recent_posts = wp_get_recent_posts($args);
            foreach($recent_posts as $post){ ?>
              <li class="article-excerpt">
                <h3><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></h3>
                <p><?php echo g_excerpt(12); ?> <a data-action="read-more" href="<?php echo get_permalink($post['ID']); ?>"><?php _e("Read more", "guanyem"); ?></a></p>
              </li>
            <?php } ?>
            </ul>
          </div>