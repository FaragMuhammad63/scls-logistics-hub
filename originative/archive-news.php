<?php

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <section class="relative pt-32 pb-20 bg-primary overflow-hidden">
    <div class="absolute inset-0 pattern-grid opacity-20"></div>
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
      <div class="max-w-3xl">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/20 text-accent text-sm font-medium mb-4">
          <?php esc_html_e('News', 'scls-logistics'); ?>
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
          <?php esc_html_e('Company Updates', 'scls-logistics'); ?>
        </h1>
        <p class="text-xl text-primary-foreground/80 leading-relaxed">
          <?php esc_html_e('Stay informed about the latest developments, partnerships, and achievements at SCLS.', 'scls-logistics'); ?>
        </p>
      </div>
    </div>
  </section>

  <section class="py-8 bg-surface-sunken border-b border-border">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="flex flex-wrap gap-3">
        <a class="px-4 py-2 rounded-full text-sm font-medium bg-accent text-accent-foreground" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">
          <?php esc_html_e('All', 'scls-logistics'); ?>
        </a>
        <?php foreach (get_categories() as $category) : ?>
          <a class="px-4 py-2 rounded-full text-sm font-medium bg-card text-muted-foreground hover:text-foreground hover:bg-muted" href="<?php echo esc_url(get_category_link($category)); ?>">
            <?php echo esc_html($category->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="py-16 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="space-y-6">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <article>
              <a href="<?php the_permalink(); ?>" class="group block p-6 md:p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300">
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                  <div class="flex-1">
                    <?php $cats = get_the_category(); ?>
                    <div class="flex flex-wrap items-center gap-3 mb-3">
                      <?php if (!empty($cats)) : ?>
                        <span class="inline-block px-3 py-1 rounded-full bg-accent/10 text-accent text-xs font-medium">
                          <?php echo esc_html($cats[0]->name); ?>
                        </span>
                      <?php endif; ?>
                      <span class="flex items-center gap-1 text-sm text-muted-foreground"><?php echo scls_logistics_render_icon('calendar', 16, 'is-current'); ?> <?php echo esc_html(get_the_date()); ?></span>
                    </div>
                    <h2 class="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors">
                      <?php the_title(); ?>
                    </h2>
                    <p class="text-muted-foreground leading-relaxed">
                      <?php echo esc_html(get_the_excerpt()); ?>
                    </p>
                  </div>
                  <div class="shrink-0">
                    <span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                      <?php esc_html_e('Read More', 'scls-logistics'); ?>
                      <?php echo scls_logistics_render_icon('arrow-right', 14); ?>
                    </span>
                  </div>
                </div>
              </a>
            </article>
          <?php endwhile; ?>
        <?php else : ?>
          <p class="text-muted-foreground"><?php esc_html_e('No news items found.', 'scls-logistics'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="py-16 bg-accent">
    <div class="container mx-auto px-4 lg:px-8 text-center">
      <h2 class="text-2xl md:text-3xl font-bold text-accent-foreground mb-4">
        <?php esc_html_e('Stay Updated', 'scls-logistics'); ?>
      </h2>
      <p class="text-accent-foreground/80 mb-8 max-w-2xl mx-auto">
        <?php esc_html_e('Subscribe to our newsletter for the latest news, insights, and industry updates.', 'scls-logistics'); ?>
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
        <input type="email" placeholder="<?php esc_attr_e('Enter your email', 'scls-logistics'); ?>" class="flex-1 h-12 px-4 rounded-lg border-0 bg-accent-foreground/10 text-accent-foreground placeholder:text-accent-foreground/50 focus:ring-2 focus:ring-accent-foreground/30" />
        <button class="scls-button px-6 py-3"><?php esc_html_e('Subscribe', 'scls-logistics'); ?></button>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
