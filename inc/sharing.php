<?php
$current_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$current_title = single_post_title('', FALSE);
$twitter_text = urlencode($current_title . ' ' . $current_url . ' via @guanyem');
?>
<div class="sharing-buttons">
  <h2><?php _e('Share', 'guanyem'); ?></h2>
  <ul>
    <li>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" data-action="share-facebook"><i class="fa fa-facebook-square"></i><span>facebook</span></a>
    </li>
    <li>
      <a href="http://twitter.com/home?status=<?php echo $twitter_text; ?>" data-action="share-twitter"><i class="fa fa-twitter-square"></i><span>twitter</span></a>
    </li>
  </ul>
</div>