<?php

if (!defined('ABSPATH')) {
  exit;
}

$is_home = is_front_page();
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
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

        <nav class="hidden lg:flex items-center gap-1" aria-label="<?php esc_attr_e('Primary', 'scls-logistics'); ?>">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'scls-nav-menu',
            'fallback_cb' => false,
            'depth' => 3,
            'walker' => new Scls_Logistics_Nav_Walker('desktop'),
          ));
          ?>
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
      <nav class="container mx-auto px-4 py-4 flex flex-col gap-1" aria-label="<?php esc_attr_e('Primary', 'scls-logistics'); ?>">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'scls-nav-menu scls-nav-menu-mobile',
          'fallback_cb' => false,
          'depth' => 3,
          'walker' => new Scls_Logistics_Nav_Walker('mobile'),
        ));
        ?>

        <div class="mt-4">
          <a href="<?php echo esc_url($contact_url); ?>" class="scls-button scls-button-accent w-full">
            <?php esc_html_e('Request Quote', 'scls-logistics'); ?>
          </a>
        </div>
      </nav>
    </div>
  </header>
