<?php

/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
get_header();
// $term = get_queried_object();
// $term_id = $term->term_id;
?>
<div class="wrap__page">
    <div class="page__content sc__wrap">
          <header class="page__header  --page"">
          <div class="page__header--content">
		<div class="container">
            <?php the_archive_title(); ?>
            <?php dntheme_archive_description('<div class="taxonomy-description">', '</div>'); ?>
            <div class="dn__breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
          </div>
          </div>
          </header><!-- .page-header -->
          <div class="container">

          <div class="archive__content">
            
            <?php
            if (have_posts()) :
                echo '<div class="row">';
              while (have_posts()) : the_post(); ?>
                <div class="col-md-6 col-lg-4">
                  <?php get_template_part('template-parts/content', 'archive-full'); ?>
                </div>
              <?php
                endwhile;
                echo '</div>';
                dntheme_paging_nav();
              else :
                get_template_part('template-parts/content', 'none');
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer();
