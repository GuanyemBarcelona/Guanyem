<?php $terms = get_terms('press_tag'); ?>
<ul class="press-tags-list">
<?php foreach ($terms as $term){ 
    $term_link = get_term_link($term);
    if (is_wp_error($term_link)) continue;
  ?>
    <li><a href="<?php echo esc_url($term_link) ?>"><?php echo $term->name ?></a></li>
<?php } ?>
</ul>