<?php

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    <section class="pt-32 pb-20 bg-background">
      <div class="container mx-auto px-4 lg:px-8">
        <article <?php post_class(); ?>>
          <h1 class="entry-title text-4xl font-bold text-foreground mb-6"><?php the_title(); ?></h1>
          <div class="entry-content prose">
            <?php the_content(); ?>
          </div>
        </article>
      </div>
    </section>
  <?php endwhile; ?>
</main>
<?php
get_footer();
