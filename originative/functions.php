<?php

if (!defined('ABSPATH')) {
  exit;
}

function scls_logistics_enqueue_assets() {
  $theme_version = wp_get_theme()->get('Version');
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

  $css_path = $theme_dir . '/assets/css/main.css';
  $js_path = $theme_dir . '/assets/js/main.js';
  $css_version = file_exists($css_path) ? filemtime($css_path) : $theme_version;
  $js_version = file_exists($js_path) ? filemtime($js_path) : $theme_version;

  wp_enqueue_style('scls-main', $theme_uri . '/assets/css/main.css', array(), $css_version);
  wp_enqueue_script('scls-main', $theme_uri . '/assets/js/main.js', array(), $js_version, true);
}
add_action('wp_enqueue_scripts', 'scls_logistics_enqueue_assets');

function scls_logistics_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

  register_nav_menus(array(
    'primary' => __('Primary Menu', 'scls-logistics'),
    'footer' => __('Footer Menu', 'scls-logistics'),
  ));
}
add_action('after_setup_theme', 'scls_logistics_setup');

function scls_logistics_customize_register($wp_customize) {
  $wp_customize->add_section('scls_integrations', array(
    'title' => __('SCLS Integrations', 'scls-logistics'),
    'priority' => 160,
  ));

  $wp_customize->add_setting('scls_cf7_shortcode', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('scls_cf7_shortcode', array(
    'label' => __('Contact Form 7 Shortcode', 'scls-logistics'),
    'description' => __('Paste the Contact Form 7 shortcode to render the form in SCLS templates.', 'scls-logistics'),
    'section' => 'scls_integrations',
    'type' => 'text',
  ));
}
add_action('customize_register', 'scls_logistics_customize_register');

function scls_logistics_register_news_cpt() {
  $labels = array(
    'name' => __('News', 'scls-logistics'),
    'singular_name' => __('News Item', 'scls-logistics'),
    'add_new' => __('Add News Item', 'scls-logistics'),
    'add_new_item' => __('Add New News Item', 'scls-logistics'),
    'edit_item' => __('Edit News Item', 'scls-logistics'),
    'new_item' => __('New News Item', 'scls-logistics'),
    'view_item' => __('View News Item', 'scls-logistics'),
    'search_items' => __('Search News', 'scls-logistics'),
    'not_found' => __('No news items found', 'scls-logistics'),
    'not_found_in_trash' => __('No news items found in Trash', 'scls-logistics'),
    'all_items' => __('All News', 'scls-logistics'),
  );

  register_post_type('news', array(
    'labels' => $labels,
    'public' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-megaphone',
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'news'),
    'show_in_rest' => true,
  ));

  register_taxonomy_for_object_type('category', 'news');
}
add_action('init', 'scls_logistics_register_news_cpt');

function scls_logistics_get_cf7_shortcode() {
  $shortcode = get_theme_mod('scls_cf7_shortcode', '');
  if (is_string($shortcode) && trim($shortcode) !== '') {
    return trim($shortcode);
  }

  if (!post_type_exists('wpcf7_contact_form')) {
    return '';
  }

  $forms = get_posts(array(
    'post_type' => 'wpcf7_contact_form',
    's' => 'Contact us',
    'numberposts' => 5,
    'fields' => 'ids',
  ));

  if (!empty($forms)) {
    foreach ($forms as $form_id) {
      if (get_the_title($form_id) === 'Contact us') {
        return '[contact-form-7 id="' . (int) $form_id . '" title="Contact us"]';
      }
    }
    return '[contact-form-7 id="' . (int) $forms[0] . '" title="Contact us"]';
  }

  return '';
}

function scls_logistics_icon_map() {
  return array(
    'air-freight' => 'Plane',
    'plane' => 'Plane',
    'ship' => 'Ship',
    'truck' => 'Truck',
    'file-check' => 'FileCheck',
    'warehouse' => 'Warehouse',
    'bar-chart-3' => 'BarChart3',
    'arrow-right' => 'ArrowRight',
    'arrow-left' => 'ArrowLeft',
    'zap' => 'Zap',
    'eye' => 'Eye',
    'shield' => 'Shield',
    'phone' => 'Phone',
    'mail' => 'Mail',
    'message-circle' => 'MessageCircle',
    'map-pin' => 'MapPin',
    'globe' => 'Globe',
    'target' => 'Target',
    'factory' => 'Factory',
    'shopping-bag' => 'ShoppingBag',
    'heart-pulse' => 'HeartPulse',
    'car' => 'Car',
    'building-2' => 'Building2',
    'wheat' => 'Wheat',
    'cpu' => 'Cpu',
    'shirt' => 'Shirt',
    'graduation-cap' => 'GraduationCap',
    'briefcase' => 'Briefcase',
    'sparkles' => 'Sparkles',
    'package' => 'Package',
    'clock' => 'Clock',
    'thumbs-up' => 'ThumbsUp',
    'check-circle-2' => 'CheckCircle2',
    'star' => 'Star',
    'calendar' => 'Calendar',
    'user' => 'User',
    'linkedin' => 'Linkedin',
    'twitter' => 'Twitter',
    'facebook' => 'Facebook',
    'instagram' => 'Instagram',
    'users' => 'Users',
    'landmark' => 'Landmark',
    'menu' => 'Menu',
    'x' => 'X',
  );
}

function scls_logistics_render_icon($icon, $size = 24, $class_name = '') {
  $block_name = 'riaco-icon-block/riaco-icon-block';
  $icon_key = sanitize_key($icon);
  $icon_map = scls_logistics_icon_map();
  $icon_name = isset($icon_map[$icon_key]) ? $icon_map[$icon_key] : ucfirst($icon_key);
  $class_name = $class_name ? $class_name : 'is-accent';

  $attrs = array(
    'icon' => $icon_name,
    'size' => (int) $size,
    'iconColor' => 'currentColor',
    'iconBackgroundColor' => 'transparent',
    'borderRadius' => 0,
    'borderWidth' => '0px',
    'borderColor' => 'transparent',
    'padding' => 0,
  );

  if (class_exists('WP_Block_Type_Registry') && WP_Block_Type_Registry::get_instance()->is_registered($block_name)) {
    $block = '<!-- wp:' . $block_name . ' ' . wp_json_encode($attrs) . ' /-->';
    return '<span class="scls-icon ' . esc_attr($class_name) . '">' . do_blocks($block) . '</span>';
  }

  $class_attr = $class_name ? ' class="scls-icon ' . esc_attr($class_name) . '"' : ' class="scls-icon"';
  return '<span' . $class_attr . ' aria-hidden="true"></span>';
}

function scls_logistics_body_classes($classes) {
  $classes[] = 'scls-theme';
  return $classes;
}
add_filter('body_class', 'scls_logistics_body_classes');

