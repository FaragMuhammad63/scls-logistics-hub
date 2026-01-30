<?php

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <section class="pt-32 pb-20 bg-background">
    <div class="container mx-auto px-4 lg:px-8 text-center">
      <h1 class="text-4xl font-bold text-foreground mb-4"><?php esc_html_e('Page not found', 'scls-logistics'); ?></h1>
      <p class="text-muted-foreground mb-6"><?php esc_html_e('Sorry, we could not find the page you were looking for.', 'scls-logistics'); ?></p>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="scls-button scls-button-accent"><?php esc_html_e('Back to Home', 'scls-logistics'); ?></a>
    </div>
  </section>
</main>
<?php
get_footer();
