<?php

if (!defined('ABSPATH')) {
  exit;
}

function scls_logistics_icon_shortcode($atts) {
  $atts = shortcode_atts(array(
    'name' => '',
    'size' => 24,
    'class' => '',
  ), $atts, 'scls_icon');

  $name = sanitize_key($atts['name']);
  $size = (int) $atts['size'];
  $size = $size > 0 ? $size : 24;
  $class_name = trim(sanitize_text_field($atts['class']));

  return scls_logistics_render_icon($name, $size, $class_name);
}
add_shortcode('scls_icon', 'scls_logistics_icon_shortcode');

function scls_logistics_cf7_shortcode() {
  $shortcode = scls_logistics_get_cf7_shortcode();
  if (class_exists('WPCF7') && $shortcode) {
    return do_shortcode($shortcode);
  }

  return '<p class="text-muted-foreground">' .
    esc_html__('Add your Contact Form 7 shortcode in the Customizer -> SCLS Integrations.', 'scls-logistics') .
    '</p>';
}
add_shortcode('scls_cf7', 'scls_logistics_cf7_shortcode');
