<?php

if (!defined('ABSPATH')) {
  exit;
}

$scls_theme_dir = get_template_directory();
$scls_walker_expected = $scls_theme_dir . '/inc/class-scls-nav-walker.php';
$scls_walker_path = $scls_walker_expected;

if (!file_exists($scls_walker_path)) {
  $scls_inc_dir = $scls_theme_dir . '/inc';
  if (is_dir($scls_inc_dir)) {
    $scls_target = strtolower(basename($scls_walker_expected));
    foreach (new DirectoryIterator($scls_inc_dir) as $scls_file) {
      if (!$scls_file->isFile()) {
        continue;
      }
      if (strtolower($scls_file->getFilename()) === $scls_target) {
        $scls_walker_path = $scls_file->getPathname();
        break;
      }
    }
  }
}

if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
  error_log(sprintf(
    '[SCLS] Theme dir: %s | Walker expected: %s | Exists: %s',
    $scls_theme_dir,
    $scls_walker_expected,
    file_exists($scls_walker_path) ? 'yes' : 'no'
  ));
}

if (file_exists($scls_walker_path)) {
  require_once $scls_walker_path;
} else {
  error_log('[SCLS] Missing nav walker file. Falling back to core walker.');
}

if (!class_exists('Scls_Logistics_Nav_Walker')) {
  class Scls_Logistics_Nav_Walker extends Walker_Nav_Menu {}
}

function scls_logistics_enqueue_assets() {
  $theme_version = wp_get_theme()->get('Version');
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

  $css_path = $theme_dir . '/style.css';
  $js_path = $theme_dir . '/assets/js/main.js';
  $css_version = file_exists($css_path) ? filemtime($css_path) : $theme_version;
  $js_version = file_exists($js_path) ? filemtime($js_path) : $theme_version;

  wp_enqueue_style('scls-main', $theme_uri . '/style.css', array(), $css_version);

  wp_register_script('scls-main', '', array(), $js_version, true);
  wp_enqueue_script('scls-main');

  $inline_js = '';
  if (file_exists($js_path)) {
    $inline_js = file_get_contents($js_path);
  } else {
    $inline_js = "(function(){function r(e){\"loading\"!==document.readyState?e():document.addEventListener(\"DOMContentLoaded\",e)}r(function(){var e=document.querySelector(\"[data-scls-header]\"),t=document.querySelector(\"[data-scls-menu-toggle]\"),n=document.querySelector(\"[data-scls-mobile-menu]\");if(e){var o=function(){window.scrollY>50?e.classList.add(\"is-scrolled\"):e.classList.remove(\"is-scrolled\")};window.addEventListener(\"scroll\",o),o()}t&&n&&t.addEventListener(\"click\",function(){var e=t.classList.toggle(\"is-open\");n.classList.toggle(\"is-open\",e),t.setAttribute(\"aria-expanded\",e?\"true\":\"false\")}),document.querySelectorAll(\"[data-scroll-target]\").forEach(function(o){o.addEventListener(\"click\",function(){var t=o.getAttribute(\"data-scroll-target\");if(t){var n=document.querySelector(t);if(n){var r=e?e.offsetHeight:0,a=n.getBoundingClientRect().top+window.scrollY-r;window.scrollTo({top:a,behavior:\"smooth\"})}t&&n&&(t=t),t&&n}t&&n&& (t.classList.remove(\"is-open\"),n.classList.remove(\"is-open\"),t.setAttribute(\"aria-expanded\",\"false\"))})});var r=document.querySelectorAll(\"[data-scls-counter]\");if(r.length){var a=new IntersectionObserver(function(e){e.forEach(function(e){if(e.isIntersecting){var t=e.target;if(\"true\"!==t.getAttribute(\"data-counted\")){t.setAttribute(\"data-counted\",\"true\");var n=parseFloat(t.getAttribute(\"data-value\")||\"0\"),o=2000,r=null;function a(e){r||(r=e);var s=Math.min((e-r)/o,1),i=Math.floor(n*s);t.textContent=i,s<1&&window.requestAnimationFrame(a)}window.requestAnimationFrame(a)}}})},{threshold:.6});r.forEach(function(e){a.observe(e)})}})})();";
  }

  if ($inline_js) {
    wp_add_inline_script('scls-main', $inline_js);
  }
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
    'air-freight' => 'plane',
    'plane' => 'plane',
    'ship' => 'ship',
    'truck' => 'truck',
    'file-check' => 'file-check',
    'warehouse' => 'warehouse',
    'bar-chart-3' => 'bar-chart-3',
    'arrow-right' => 'arrow-right',
    'arrow-left' => 'arrow-left',
    'zap' => 'zap',
    'eye' => 'eye',
    'shield' => 'shield',
    'phone' => 'phone',
    'mail' => 'mail',
    'message-circle' => 'message-circle',
    'map-pin' => 'map-pin',
    'globe' => 'globe',
    'target' => 'target',
    'factory' => 'factory',
    'shopping-bag' => 'shopping-bag',
    'heart-pulse' => 'heart-pulse',
    'car' => 'car',
    'building-2' => 'building-2',
    'wheat' => 'wheat',
    'cpu' => 'cpu',
    'shirt' => 'shirt',
    'graduation-cap' => 'graduation-cap',
    'briefcase' => 'briefcase',
    'sparkles' => 'sparkles',
    'package' => 'package',
    'clock' => 'clock',
    'thumbs-up' => 'thumbs-up',
    'check-circle-2' => 'check-circle-2',
    'star' => 'star',
    'calendar' => 'calendar',
    'user' => 'user',
    'linkedin' => 'linkedin',
    'twitter' => 'twitter',
    'facebook' => 'facebook',
    'instagram' => 'instagram',
    'users' => 'users',
    'landmark' => 'landmark',
    'menu' => 'menu',
    'x' => 'x',
  );
}

function scls_logistics_svg_icons() {
  static $icons = null;
  if ($icons !== null) {
    return $icons;
  }

  $icons = array(
    'arrow-left' => array(
      array('path', array('d' => 'm12 19-7-7 7-7')),
      array('path', array('d' => 'M19 12H5')),
    ),
    'arrow-right' => array(
      array('path', array('d' => 'M5 12h14')),
      array('path', array('d' => 'm12 5 7 7-7 7')),
    ),
    'bar-chart-3' => array(
      array('path', array('d' => 'M3 3v16a2 2 0 0 0 2 2h16')),
      array('path', array('d' => 'M18 17V9')),
      array('path', array('d' => 'M13 17V5')),
      array('path', array('d' => 'M8 17v-3')),
    ),
    'briefcase' => array(
      array('path', array('d' => 'M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16')),
      array('rect', array('width' => '20', 'height' => '14', 'x' => '2', 'y' => '6', 'rx' => '2')),
    ),
    'building-2' => array(
      array('path', array('d' => 'M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z')),
      array('path', array('d' => 'M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2')),
      array('path', array('d' => 'M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2')),
      array('path', array('d' => 'M10 6h4')),
      array('path', array('d' => 'M10 10h4')),
      array('path', array('d' => 'M10 14h4')),
      array('path', array('d' => 'M10 18h4')),
    ),
    'calendar' => array(
      array('path', array('d' => 'M8 2v4')),
      array('path', array('d' => 'M16 2v4')),
      array('rect', array('width' => '18', 'height' => '18', 'x' => '3', 'y' => '4', 'rx' => '2')),
      array('path', array('d' => 'M3 10h18')),
    ),
    'car' => array(
      array('path', array('d' => 'M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2')),
      array('circle', array('cx' => '7', 'cy' => '17', 'r' => '2')),
      array('path', array('d' => 'M9 17h6')),
      array('circle', array('cx' => '17', 'cy' => '17', 'r' => '2')),
    ),
    'check-circle-2' => array(
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '10')),
      array('path', array('d' => 'm9 12 2 2 4-4')),
    ),
    'clock' => array(
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '10')),
      array('polyline', array('points' => '12 6 12 12 16 14')),
    ),
    'cpu' => array(
      array('rect', array('width' => '16', 'height' => '16', 'x' => '4', 'y' => '4', 'rx' => '2')),
      array('rect', array('width' => '6', 'height' => '6', 'x' => '9', 'y' => '9', 'rx' => '1')),
      array('path', array('d' => 'M15 2v2')),
      array('path', array('d' => 'M15 20v2')),
      array('path', array('d' => 'M2 15h2')),
      array('path', array('d' => 'M2 9h2')),
      array('path', array('d' => 'M20 15h2')),
      array('path', array('d' => 'M20 9h2')),
      array('path', array('d' => 'M9 2v2')),
      array('path', array('d' => 'M9 20v2')),
    ),
    'eye' => array(
      array('path', array('d' => 'M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0')),
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '3')),
    ),
    'facebook' => array(
      array('path', array('d' => 'M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z')),
    ),
    'factory' => array(
      array('path', array('d' => 'M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z')),
      array('path', array('d' => 'M17 18h1')),
      array('path', array('d' => 'M12 18h1')),
      array('path', array('d' => 'M7 18h1')),
    ),
    'file-check' => array(
      array('path', array('d' => 'M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z')),
      array('path', array('d' => 'M14 2v4a2 2 0 0 0 2 2h4')),
      array('path', array('d' => 'm9 15 2 2 4-4')),
    ),
    'globe' => array(
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '10')),
      array('path', array('d' => 'M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20')),
      array('path', array('d' => 'M2 12h20')),
    ),
    'graduation-cap' => array(
      array('path', array('d' => 'M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z')),
      array('path', array('d' => 'M22 10v6')),
      array('path', array('d' => 'M6 12.5V16a6 3 0 0 0 12 0v-3.5')),
    ),
    'heart-pulse' => array(
      array('path', array('d' => 'M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z')),
      array('path', array('d' => 'M3.22 12H9.5l.5-1 2 4.5 2-7 1.5 3.5h5.27')),
    ),
    'instagram' => array(
      array('rect', array('width' => '20', 'height' => '20', 'x' => '2', 'y' => '2', 'rx' => '5', 'ry' => '5')),
      array('path', array('d' => 'M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z')),
      array('line', array('x1' => '17.5', 'x2' => '17.51', 'y1' => '6.5', 'y2' => '6.5')),
    ),
    'landmark' => array(
      array('line', array('x1' => '3', 'x2' => '21', 'y1' => '22', 'y2' => '22')),
      array('line', array('x1' => '6', 'x2' => '6', 'y1' => '18', 'y2' => '11')),
      array('line', array('x1' => '10', 'x2' => '10', 'y1' => '18', 'y2' => '11')),
      array('line', array('x1' => '14', 'x2' => '14', 'y1' => '18', 'y2' => '11')),
      array('line', array('x1' => '18', 'x2' => '18', 'y1' => '18', 'y2' => '11')),
      array('polygon', array('points' => '12 2 20 7 4 7')),
    ),
    'linkedin' => array(
      array('path', array('d' => 'M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z')),
      array('rect', array('width' => '4', 'height' => '12', 'x' => '2', 'y' => '9')),
      array('circle', array('cx' => '4', 'cy' => '4', 'r' => '2')),
    ),
    'mail' => array(
      array('rect', array('width' => '20', 'height' => '16', 'x' => '2', 'y' => '4', 'rx' => '2')),
      array('path', array('d' => 'm22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7')),
    ),
    'map-pin' => array(
      array('path', array('d' => 'M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0')),
      array('circle', array('cx' => '12', 'cy' => '10', 'r' => '3')),
    ),
    'menu' => array(
      array('line', array('x1' => '4', 'x2' => '20', 'y1' => '12', 'y2' => '12')),
      array('line', array('x1' => '4', 'x2' => '20', 'y1' => '6', 'y2' => '6')),
      array('line', array('x1' => '4', 'x2' => '20', 'y1' => '18', 'y2' => '18')),
    ),
    'message-circle' => array(
      array('path', array('d' => 'M7.9 20A9 9 0 1 0 4 16.1L2 22Z')),
    ),
    'package' => array(
      array('path', array('d' => 'M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z')),
      array('path', array('d' => 'M12 22V12')),
      array('path', array('d' => 'm3.3 7 7.703 4.734a2 2 0 0 0 1.994 0L20.7 7')),
      array('path', array('d' => 'm7.5 4.27 9 5.15')),
    ),
    'phone' => array(
      array('path', array('d' => 'M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z')),
    ),
    'plane' => array(
      array('path', array('d' => 'M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z')),
    ),
    'shield' => array(
      array('path', array('d' => 'M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z')),
    ),
    'ship' => array(
      array('path', array('d' => 'M12 10.189V14')),
      array('path', array('d' => 'M12 2v3')),
      array('path', array('d' => 'M19 13V7a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v6')),
      array('path', array('d' => 'M19.38 20A11.6 11.6 0 0 0 21 14l-8.188-3.639a2 2 0 0 0-1.624 0L3 14a11.6 11.6 0 0 0 2.81 7.76')),
      array('path', array('d' => 'M2 21c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1s1.2 1 2.5 1c2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1')),
    ),
    'shirt' => array(
      array('path', array('d' => 'M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z')),
    ),
    'shopping-bag' => array(
      array('path', array('d' => 'M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z')),
      array('path', array('d' => 'M3 6h18')),
      array('path', array('d' => 'M16 10a4 4 0 0 1-8 0')),
    ),
    'sparkles' => array(
      array('path', array('d' => 'M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z')),
      array('path', array('d' => 'M20 3v4')),
      array('path', array('d' => 'M22 5h-4')),
      array('path', array('d' => 'M4 17v2')),
      array('path', array('d' => 'M5 18H3')),
    ),
    'star' => array(
      array('path', array('d' => 'M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z')),
    ),
    'target' => array(
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '10')),
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '6')),
      array('circle', array('cx' => '12', 'cy' => '12', 'r' => '2')),
    ),
    'thumbs-up' => array(
      array('path', array('d' => 'M7 10v12')),
      array('path', array('d' => 'M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z')),
    ),
    'truck' => array(
      array('path', array('d' => 'M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2')),
      array('path', array('d' => 'M15 18H9')),
      array('path', array('d' => 'M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14')),
      array('circle', array('cx' => '17', 'cy' => '18', 'r' => '2')),
      array('circle', array('cx' => '7', 'cy' => '18', 'r' => '2')),
    ),
    'twitter' => array(
      array('path', array('d' => 'M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z')),
    ),
    'user' => array(
      array('path', array('d' => 'M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2')),
      array('circle', array('cx' => '12', 'cy' => '7', 'r' => '4')),
    ),
    'users' => array(
      array('path', array('d' => 'M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2')),
      array('circle', array('cx' => '9', 'cy' => '7', 'r' => '4')),
      array('path', array('d' => 'M22 21v-2a4 4 0 0 0-3-3.87')),
      array('path', array('d' => 'M16 3.13a4 4 0 0 1 0 7.75')),
    ),
    'warehouse' => array(
      array('path', array('d' => 'M22 8.35V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.35A2 2 0 0 1 3.26 6.5l8-3.2a2 2 0 0 1 1.48 0l8 3.2A2 2 0 0 1 22 8.35Z')),
      array('path', array('d' => 'M6 18h12')),
      array('path', array('d' => 'M6 14h12')),
      array('rect', array('width' => '12', 'height' => '12', 'x' => '6', 'y' => '10')),
    ),
    'wheat' => array(
      array('path', array('d' => 'M2 22 16 8')),
      array('path', array('d' => 'M3.47 12.53 5 11l1.53 1.53a3.5 3.5 0 0 1 0 4.94L5 19l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z')),
      array('path', array('d' => 'M7.47 8.53 9 7l1.53 1.53a3.5 3.5 0 0 1 0 4.94L9 15l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z')),
      array('path', array('d' => 'M11.47 4.53 13 3l1.53 1.53a3.5 3.5 0 0 1 0 4.94L13 11l-1.53-1.53a3.5 3.5 0 0 1 0-4.94Z')),
      array('path', array('d' => 'M20 2h2v2a4 4 0 0 1-4 4h-2V6a4 4 0 0 1 4-4Z')),
      array('path', array('d' => 'M11.47 17.47 13 19l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L5 19l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z')),
      array('path', array('d' => 'M15.47 13.47 17 15l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L9 15l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z')),
      array('path', array('d' => 'M19.47 9.47 21 11l-1.53 1.53a3.5 3.5 0 0 1-4.94 0L13 11l1.53-1.53a3.5 3.5 0 0 1 4.94 0Z')),
    ),
    'x' => array(
      array('path', array('d' => 'M18 6 6 18')),
      array('path', array('d' => 'm6 6 12 12')),
    ),
    'zap' => array(
      array('path', array('d' => 'M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z')),
    ),
  );

  return $icons;
}

function scls_logistics_render_icon($icon, $size = 24, $class_name = '') {
  $icon_key = sanitize_key($icon);
  $icon_map = scls_logistics_icon_map();
  $icon_name = isset($icon_map[$icon_key]) ? $icon_map[$icon_key] : $icon_key;
  $class_name = $class_name ? $class_name : 'is-accent';
  $size = (int) $size;
  $size = $size > 0 ? $size : 24;
  $icons = scls_logistics_svg_icons();
  if (!isset($icons[$icon_name])) {
    return '<span class="scls-icon ' . esc_attr($class_name) . '" aria-hidden="true"></span>';
  }

  $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-' . esc_attr($icon_name) . '" aria-hidden="true">';
  foreach ($icons[$icon_name] as $node) {
    $tag = $node[0];
    $attrs = $node[1];
    $attr_string = '';
    foreach ($attrs as $key => $value) {
      $attr_string .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }
    $svg .= '<' . esc_attr($tag) . $attr_string . '></' . esc_attr($tag) . '>';
  }
  $svg .= '</svg>';

  return '<span class="scls-icon ' . esc_attr($class_name) . '">' . $svg . '</span>';
}

function scls_logistics_body_classes($classes) {
  $classes[] = 'scls-theme';
  return $classes;
}
add_filter('body_class', 'scls_logistics_body_classes');

