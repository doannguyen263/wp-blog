<?php

/**
 * Template part for displaying posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category();
if (! empty($categories)) {
    $cat      = $categories[0];
    $cat_name = $cat->name;
    $cat_link = get_category_link($cat->term_id);
}
?>
<div class="single__wrap">
  <div class="page__header mb-3">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
  </div>
  <div class="entry-content">
    <?php the_content() ?>
  </div>
</div>


<?php
related_category_fix(
  array(
    'posts_per_page'    => 6,
    'related_title'     => __('Bài viết liên quan', 'dntheme'),
    'template_type'     => '', // slider , widget
    'template'          => 'content-archive-full',
    'set_taxonomy'      => null,
    'class_item'        => 'col-md-4',
  )
);
?>