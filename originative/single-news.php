<?php

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    <section class="relative pt-32 pb-20 bg-primary overflow-hidden">
      <div class="absolute inset-0 pattern-grid opacity-20"></div>
      <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-3xl">
          <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="inline-flex items-center gap-2 text-primary-foreground/70 hover:text-primary-foreground mb-6 transition-colors">
            <?php echo scls_logistics_render_icon('arrow-left', 16, 'is-current'); ?>
            <?php esc_html_e('Back to News', 'scls-logistics'); ?>
          </a>
          <h1 class="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
            <?php the_title(); ?>
          </h1>
          <div class="flex flex-wrap items-center gap-4 text-sm text-primary-foreground/70">
            <span class="flex items-center gap-1"><?php echo scls_logistics_render_icon('calendar', 16, 'is-current'); ?> <?php echo esc_html(get_the_date()); ?></span>
            <span class="flex items-center gap-1"><?php echo scls_logistics_render_icon('user', 16, 'is-current'); ?> <?php echo esc_html(get_the_author()); ?></span>
          </div>
        </div>
      </div>
    </section>

    <section class="py-16 bg-background">
      <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto">
          <?php if (has_post_thumbnail()) : ?>
            <div class="aspect-[16/10] rounded-2xl overflow-hidden mb-8">
              <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover')); ?>
            </div>
          <?php endif; ?>
          <div class="prose prose-lg max-w-none">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; ?>
</main>
<?php
get_footer();
