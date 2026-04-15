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
          <header class="page__header  --page">
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
            if (is_post_type_archive('service')) :
                $service_cats = get_terms(array(
                    'taxonomy'   => 'service_cat',
                    'hide_empty' => true,
                ));

                if (! is_wp_error($service_cats) && ! empty($service_cats)) :
                    echo '<div class="row">';
                    foreach ($service_cats as $term) {
                        $link = get_term_link($term);
                        $thumbnail = get_field('thumbnail', $term);
                        if (is_wp_error($link)) {
                            continue;
                        }
                        ?>
                <div class="col-md-6 col-lg-6">
                  <article class="archive__item service-cat-archive__item">
                    <div class="item__thumb mb-3">
                      <a href="<?php echo esc_url($link); ?>" class="dnfix__thumb">
                        <?php echo wp_get_attachment_image($thumbnail, 'medium', false, array('class' => 'img-fluid', 'alt' => $term->name)); ?>
                      </a>
                    </div>
                    <h3 class="entry-title item__title">
                      <a href="<?php echo esc_url($link); ?>" rel="bookmark"><?php echo esc_html($term->name); ?></a>
                    </h3>
                        <?php if (! empty($term->description)) : ?>
                    <div class="entry-summary d-none d-md-block">
                      <div class="text__truncate -n2">
                            <?php echo wp_kses_post(wp_trim_words($term->description, 40)); ?>
                      </div>
                    </div>
                        <?php endif; ?>
                  </article>
                </div>
                        <?php
                    }
                    echo '</div>';
                else :
                    get_template_part('template-parts/content', 'none');
                endif;

            else :
                if (have_posts()) :
                    echo '<div class="row">';
                    while (have_posts()) :
                        the_post();
                        ?>
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
            endif;
            ?>

            </div><!-- .archive__content -->
          </div><!-- .container -->
        </div><!-- .page__content -->
      </div><!-- .wrap__page -->
<?php get_footer();
