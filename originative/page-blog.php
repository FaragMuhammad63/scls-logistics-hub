<?php
/*
Template Name: Blog
*/

if (!defined('ABSPATH')) {
  exit;
}

$posts_page_id = get_option('page_for_posts');
$posts_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/blog/');

get_header();
?>
<main class="site-main">
  <section class="py-24 bg-background">
    <div class="container mx-auto px-4 lg:px-8 text-center">
      <h1 class="text-3xl font-bold text-foreground mb-4"><?php esc_html_e('Blog', 'scls-logistics'); ?></h1>
      <p class="text-muted-foreground mb-6"><?php esc_html_e('This page is managed by WordPress as the Posts page.', 'scls-logistics'); ?></p>
      <a class="scls-button scls-button-accent" href="<?php echo esc_url($posts_url); ?>">
        <?php esc_html_e('Go to Blog', 'scls-logistics'); ?>
      </a>
    </div>
  </section>
</main>
<?php
get_footer();
