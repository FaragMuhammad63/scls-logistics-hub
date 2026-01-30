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
          <?php esc_html_e('Blog', 'scls-logistics'); ?>
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
          <?php esc_html_e('Insights & Resources', 'scls-logistics'); ?>
        </h1>
        <p class="text-xl text-primary-foreground/80 leading-relaxed">
          <?php esc_html_e('Stay updated with the latest trends, best practices, and insights in logistics and supply chain management.', 'scls-logistics'); ?>
        </p>
      </div>
    </div>
  </section>

  <section class="py-8 bg-surface-sunken border-b border-border">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="flex flex-wrap gap-3">
        <a class="px-4 py-2 rounded-full text-sm font-medium bg-accent text-accent-foreground" href="<?php echo esc_url(get_post_type_archive_link('post')); ?>">
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

  <?php
    $featured_query = new WP_Query(array(
      'posts_per_page' => 1,
    ));
    $featured_post = $featured_query->have_posts() ? $featured_query->posts[0] : null;
    $featured_id = $featured_post ? $featured_post->ID : 0;
    if ($featured_post) :
      setup_postdata($featured_post);
  ?>
    <section class="py-16 bg-background">
      <div class="container mx-auto px-4 lg:px-8">
        <article class="group">
          <a href="<?php echo esc_url(get_permalink($featured_id)); ?>" class="block p-8 md:p-12 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300">
            <div class="flex flex-col lg:flex-row gap-8">
              <div class="lg:w-1/2">
                <div class="aspect-[16/10] rounded-xl bg-gradient-to-br from-navy to-navy-light overflow-hidden">
                  <?php if (has_post_thumbnail($featured_id)) : ?>
                    <?php echo get_the_post_thumbnail($featured_id, 'large', array('class' => 'w-full h-full object-cover')); ?>
                  <?php else : ?>
                    <div class="w-full h-full flex items-center justify-center text-primary-foreground/50">
                      <?php esc_html_e('Featured Image', 'scls-logistics'); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="lg:w-1/2 flex flex-col justify-center">
                <?php $cats = get_the_category($featured_id); ?>
                <?php if (!empty($cats)) : ?>
                  <span class="inline-block px-3 py-1 rounded-full bg-accent/10 text-accent text-xs font-medium mb-4 w-fit">
                    <?php echo esc_html($cats[0]->name); ?>
                  </span>
                <?php endif; ?>
                <h2 class="text-2xl md:text-3xl font-bold text-foreground mb-4 group-hover:text-accent transition-colors">
                  <?php echo esc_html(get_the_title($featured_id)); ?>
                </h2>
                <p class="text-muted-foreground leading-relaxed mb-6">
                  <?php echo esc_html(get_the_excerpt($featured_id)); ?>
                </p>
                <div class="flex flex-wrap items-center gap-4 text-sm text-muted-foreground mb-6">
                  <span class="flex items-center gap-1"><?php echo scls_logistics_render_icon('calendar', 16, 'is-current'); ?> <?php echo esc_html(get_the_date('', $featured_id)); ?></span>
                  <span class="flex items-center gap-1"><?php echo scls_logistics_render_icon('user', 16, 'is-current'); ?> <?php echo esc_html(get_the_author_meta('display_name', $featured_post->post_author)); ?></span>
                </div>
                <span class="inline-flex items-center gap-2 text-accent font-medium group-hover:gap-3 transition-all">
                  <?php esc_html_e('Read Article', 'scls-logistics'); ?>
                  <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
                </span>
              </div>
            </div>
          </a>
        </article>
      </div>
    </section>
  <?php
      wp_reset_postdata();
    endif;
  ?>

  <section class="py-16 bg-surface-sunken">
    <div class="container mx-auto px-4 lg:px-8">
      <h2 class="text-2xl font-bold text-foreground mb-8"><?php esc_html_e('Latest Articles', 'scls-logistics'); ?></h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
          $posts_query = new WP_Query(array(
            'posts_per_page' => 9,
            'post__not_in' => $featured_id ? array($featured_id) : array(),
          ));
          if ($posts_query->have_posts()) :
            while ($posts_query->have_posts()) :
              $posts_query->the_post();
        ?>
          <article>
            <a href="<?php the_permalink(); ?>" class="group block h-full p-6 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1">
              <div class="aspect-[16/10] rounded-xl bg-gradient-to-br from-secondary to-muted mb-6 overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                <?php else : ?>
                  <div class="w-full h-full flex items-center justify-center text-muted-foreground">
                    <?php esc_html_e('Image', 'scls-logistics'); ?>
                  </div>
                <?php endif; ?>
              </div>
              <?php $post_cats = get_the_category(); ?>
              <?php if (!empty($post_cats)) : ?>
                <span class="inline-block px-3 py-1 rounded-full bg-accent/10 text-accent text-xs font-medium mb-3">
                  <?php echo esc_html($post_cats[0]->name); ?>
                </span>
              <?php endif; ?>
              <h3 class="text-lg font-semibold text-foreground mb-3 group-hover:text-accent transition-colors line-clamp-2">
                <?php the_title(); ?>
              </h3>
              <p class="text-muted-foreground text-sm leading-relaxed mb-4 line-clamp-2">
                <?php echo esc_html(get_the_excerpt()); ?>
              </p>
              <div class="flex items-center gap-4 text-xs text-muted-foreground">
                <span class="flex items-center gap-1"><?php echo scls_logistics_render_icon('calendar', 12, 'is-current'); ?> <?php echo esc_html(get_the_date()); ?></span>
              </div>
            </a>
          </article>
        <?php
            endwhile;
            wp_reset_postdata();
          else :
        ?>
          <p class="text-muted-foreground"><?php esc_html_e('No posts found.', 'scls-logistics'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
