<?php

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <section class="pt-32 pb-20 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('mb-10'); ?>>
            <h2 class="entry-title text-2xl font-semibold text-foreground mb-3">
              <a href="<?php the_permalink(); ?>" class="hover:text-accent transition-colors"><?php the_title(); ?></a>
            </h2>
            <div class="entry-content prose">
              <?php the_content(); ?>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p class="text-muted-foreground"><?php esc_html_e('No posts found.', 'scls-logistics'); ?></p>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php
get_footer();
