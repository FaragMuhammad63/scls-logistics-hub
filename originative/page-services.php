<?php
/*
Template Name: Services
*/

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
</main>
<?php
get_footer();
