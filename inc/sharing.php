<div class="sharing-buttons">
  <h2><?php //_('Share','Guanyem'); ?>Compartir</h2>
  <ul>
    <li>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($post->ID); ?>" data-action="share-facebook"><i class="fa fa-facebook-square"></i><span>facebook</span></a>
    </li>
    <li>
      <a href="http://twitter.com/home?status=<?php echo get_the_title($post->ID) . '%20' . get_permalink($post->ID); ?>" data-action="share-twitter"><i class="fa fa-twitter-square"></i><span>twitter</span></a>
    </li>
  </ul>
</div>