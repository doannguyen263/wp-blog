<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo', 'option');
// $zalo = get_field('zalo','option');
$phone = get_field('hotline', 'option');
?>

<footer class="footer">
  <div class="container position-relative">
    <div class="sc__wrap">
      <div class="footer__intro text-center">
        <div class="footer__logo">
          <a href="/">
            <?php echo wp_get_attachment_image($logo_img, 'full'); ?>
          </a>
        </div>
        <div class="footer__content mb-3">
          <?php the_field('com_excerpt', 'option') ?>
        </div>
        <div class="social__box -s1">
          <a href="<?php the_field('fb', 'option'); ?>" class="ic--fb"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
          <a href="<?php the_field('tw', 'option'); ?>" class="ic--tw"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="<?php the_field('ytb', 'option'); ?>" class="ic--ytb"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
        </div>

      </div>
      <hr class="my-5">
      <div class="row text-center justify-content-center">
        <div class="col-md-6 order-3">
          <div class="address__title address__title--main">HEAD OFFICE</div>
          <ul>
            <li><span>Address:</span> <?php the_field('address_address', 'option') ?></li>
            <li><span>Phone:</span> <?php the_field('address_phone', 'option') ?></li>
            <li><span>Email:</span> <?php the_field('address_email', 'option') ?></li>
            <li><span>Website:</span> <?php the_field('address_website', 'option') ?></li>
          </ul>
        </div>
      </div>
      <div class="row text-center">
        <?php
        if (have_rows('address_sub', 'option')): $i = 0; ?>

          <?php while (have_rows('address_sub', 'option')) : the_row();
            $i++;
            $title = get_sub_field('title'); ?>
            <div class="col-md-4 <?= ($i === 1) ? 'order-3' : 'order-3' ?>">
              <div class="address__title mt-2"><?= $title ?></div>
              <?= get_sub_field('content') ?>
            </div>
          <?php endwhile; ?>
        <?php endif;
        ?>
      </div>
    </div>
  </div>
</footer>

<div class="copyright text-center">
  <div class="container"><?php the_field('copyright', 'option'); ?></div>
</div>

<nav id="menu__mobile" class="nav__mobile">
  <div class="nav__mobile__header">
    <div class="nav__mobile__logo">

      <?php
      $logo_img = get_field('logo', 'option'); ?>
      <a href="<?php echo site_url(); ?>">
        <?php echo wp_get_attachment_image($logo_img, 'full'); ?>
      </a>
    </div>
    <div class="ms-auto">
      <a href="#menu__mobile" class="mburger">
        <span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></span>
      </a>
    </div>
  </div>
  <?php
  wp_nav_menu(
    array(
      'theme_location'  => 'primary',
      'container_class' => 'nav__mobile__menu',
      'menu_class'      => 'nav__mobile--ul',
    )
  );
  ?>
</nav>

<div class="fixed-btn  bottom b-static animated fadeInUpShort go show">
  <div class="fixed-social-btn">
    <a class="hotline" href="tel:<?php echo dntheme_remove_space($phone) ?>" target="_blank" rel="noopener">
      <i class="tada infinite animated"><img class="svg" src="<?= get_theme_file_uri('/assets/img/icon-phone.svg') ?>" /></i>
      <span class="d-none d-xl-block"><?= $phone ?></span>
    </a>
  </div>
</div>

</div><!-- End wrapper -->

<?php wp_footer(); ?>
</body>

</html>