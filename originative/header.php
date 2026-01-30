<?php

if (!defined('ABSPATH')) {
  exit;
}

$is_home = is_front_page();
$posts_page_id = get_option('page_for_posts');
$blog_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/blog/');
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
$services_url = home_url('/services/');
$news_url = home_url('/news/');
$service_slugs = array('air-freight', 'sea-freight', 'land-transportation', 'customs-clearance', 'warehousing', 'control-tower');
$current_slug = is_page() ? get_post_field('post_name', get_queried_object_id()) : '';
$is_services = is_page('services') || is_page_template('page-services.php') || is_page_template('page-service-detail.php') || in_array($current_slug, $service_slugs, true);
$is_blog = is_home() || is_singular('post') || is_category() || is_tag() || is_date();
$is_news = is_post_type_archive('news') || is_singular('news');
$is_contact = is_page('contact') || is_page_template('page-contact.php');
$primary_links = array(
  array('label' => __('Services', 'scls-logistics'), 'href' => $services_url, 'active' => $is_services),
  array('label' => __('Blog', 'scls-logistics'), 'href' => $blog_url, 'active' => $is_blog),
  array('label' => __('News', 'scls-logistics'), 'href' => $news_url, 'active' => $is_news),
  array('label' => __('Contact', 'scls-logistics'), 'href' => $contact_url, 'active' => $is_contact),
);
$home_anchors = array(
  array('label' => __('About', 'scls-logistics'), 'href' => '#about'),
  array('label' => __('Services', 'scls-logistics'), 'href' => '#services'),
  array('label' => __('Industries', 'scls-logistics'), 'href' => '#industries'),
  array('label' => __('Why SCLS', 'scls-logistics'), 'href' => '#why-scls'),
  array('label' => __('Accreditations', 'scls-logistics'), 'href' => '#accreditations'),
);
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site">
  <header class="scls-header<?php echo $is_home ? ' is-home' : ''; ?>" data-scls-header>
    <div class="container mx-auto px-4 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
          <div class="font-bold text-xl tracking-tight scls-logo">
            <span class="text-accent">SCLS</span>
          </div>
        </a>

        <nav class="hidden lg:flex items-center gap-1">
          <?php if ($is_home) : ?>
            <?php foreach ($home_anchors as $anchor) : ?>
              <button
                type="button"
                class="scls-nav-button"
                data-scroll-target="<?php echo esc_attr($anchor['href']); ?>"
              >
                <?php echo esc_html($anchor['label']); ?>
              </button>
            <?php endforeach; ?>
          <?php endif; ?>

          <?php foreach ($primary_links as $link) : ?>
            <?php $active_class = $link['active'] ? ' is-active' : ''; ?>
            <a class="scls-nav-link<?php echo esc_attr($active_class); ?>" href="<?php echo esc_url($link['href']); ?>">
              <?php echo esc_html($link['label']); ?>
            </a>
          <?php endforeach; ?>
        </nav>

        <div class="hidden lg:flex items-center gap-3">
          <a href="tel:+966XXXXXXXX" class="scls-call-link">
            <?php echo scls_logistics_render_icon('phone', 16, 'is-current'); ?>
            <span><?php esc_html_e('Call Us', 'scls-logistics'); ?></span>
          </a>
          <a href="<?php echo esc_url($contact_url); ?>" class="scls-button scls-button-accent">
            <?php esc_html_e('Request Quote', 'scls-logistics'); ?>
          </a>
        </div>

        <button class="lg:hidden scls-menu-toggle" type="button" aria-expanded="false" data-scls-menu-toggle>
          <span class="scls-menu-icon"><?php echo scls_logistics_render_icon('menu', 24, 'is-current'); ?></span>
          <span class="scls-menu-close"><?php echo scls_logistics_render_icon('x', 24, 'is-current'); ?></span>
        </button>
      </div>
    </div>

    <div class="scls-mobile-menu" data-scls-mobile-menu>
      <nav class="container mx-auto px-4 py-4 flex flex-col gap-1">
        <?php if ($is_home) : ?>
          <?php foreach ($home_anchors as $anchor) : ?>
            <button
              type="button"
              class="scls-nav-button scls-nav-button-mobile"
              data-scroll-target="<?php echo esc_attr($anchor['href']); ?>"
            >
              <?php echo esc_html($anchor['label']); ?>
            </button>
          <?php endforeach; ?>
          <div class="h-px bg-border my-2"></div>
        <?php endif; ?>

        <?php foreach ($primary_links as $link) : ?>
          <?php $active_class = $link['active'] ? ' is-active' : ''; ?>
          <a class="scls-nav-link scls-nav-link-mobile<?php echo esc_attr($active_class); ?>" href="<?php echo esc_url($link['href']); ?>">
            <?php echo esc_html($link['label']); ?>
          </a>
        <?php endforeach; ?>

        <div class="mt-4">
          <a href="<?php echo esc_url($contact_url); ?>" class="scls-button scls-button-accent w-full">
            <?php esc_html_e('Request Quote', 'scls-logistics'); ?>
          </a>
        </div>
      </nav>
    </div>
  </header>
