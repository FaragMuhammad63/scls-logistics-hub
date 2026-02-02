<?php

if (!defined('ABSPATH')) {
  exit;
}

if (!function_exists('originative_sanitize_css_color')) {
  function originative_sanitize_css_color($color, $fallback) {
    $color = trim((string) $color);
    if ($color === '') {
      return $fallback;
    }

    $color = sanitize_text_field($color);

    if (strpos($color, 'var:preset|color|') === 0) {
      $slug = sanitize_title(substr($color, strlen('var:preset|color|')));
      if ($slug !== '') {
        return 'var(--wp--preset--color--' . $slug . ')';
      }
    }

    if (strpos($color, 'var(--wp--preset--color--') === 0) {
      return $color;
    }

    $hex = sanitize_hex_color($color);
    if (!empty($hex)) {
      return $hex;
    }

    if (preg_match('/^rgba?\([0-9\s\.,%]+\)$/', $color)) {
      return $color;
    }

    if (preg_match('/^hsla?\([0-9\s\.,%]+\)$/', $color)) {
      return $color;
    }

    return $fallback;
  }
}

function originative_render_hero_background($attributes) {
  $mode = isset($attributes['mode']) ? sanitize_text_field($attributes['mode']) : 'color';
  if (!in_array($mode, array('color', 'image'), true)) {
    $mode = 'color';
  }

  $image_id = isset($attributes['imageId']) ? absint($attributes['imageId']) : 0;
  $image_url = isset($attributes['imageUrl']) ? trim((string) $attributes['imageUrl']) : '';
  $image_alt = isset($attributes['imageAlt']) ? sanitize_text_field($attributes['imageAlt']) : '';

  if ($image_id && $image_url === '') {
    $image_url = wp_get_attachment_url($image_id);
  }

  $overlay_opacity = isset($attributes['overlayOpacity']) ? (int) $attributes['overlayOpacity'] : 40;
  if ($overlay_opacity < 0) {
    $overlay_opacity = 0;
  }
  if ($overlay_opacity > 80) {
    $overlay_opacity = 80;
  }
  $overlay_alpha = number_format($overlay_opacity / 100, 2, '.', '');

  $overlay_color = isset($attributes['overlayColor']) ? $attributes['overlayColor'] : 'var(--wp--preset--color--primary)';
  $overlay_color = originative_sanitize_css_color($overlay_color, 'var(--wp--preset--color--primary)');

  $pattern_opacity = isset($attributes['patternOpacity']) ? (int) $attributes['patternOpacity'] : 50;
  if ($pattern_opacity < 0) {
    $pattern_opacity = 0;
  }
  if ($pattern_opacity > 100) {
    $pattern_opacity = 100;
  }

  $show_blobs = true;
  if (isset($attributes['showBlobs'])) {
    $show_blobs = (bool) $attributes['showBlobs'];
  }

  $custom_class = '';
  if (!empty($attributes['className'])) {
    $raw_classes = preg_split('/\s+/', (string) $attributes['className']);
    $raw_classes = array_filter($raw_classes);
    if (!empty($raw_classes)) {
      $sanitized_classes = array();
      foreach ($raw_classes as $class) {
        $sanitized_class = sanitize_html_class($class);
        if ($sanitized_class !== '') {
          $sanitized_classes[] = $sanitized_class;
        }
      }
      if (!empty($sanitized_classes)) {
        $custom_class = ' ' . implode(' ', $sanitized_classes);
      }
    }
  }

  $layers = array();

  $layers[] = '<div class="absolute inset-0 gradient-hero' . esc_attr($custom_class) . '"></div>';

  $has_image = $mode === 'image' && $image_url !== '';
  if ($has_image) {
    $layers[] = sprintf(
      '<img class="absolute inset-0 w-full h-full object-cover%3$s" src="%1$s" alt="%2$s" loading="lazy" decoding="async" />',
      esc_url($image_url),
      esc_attr($image_alt),
      esc_attr($custom_class)
    );

    $overlay_style = sprintf(
      'background-color: %s; opacity: %s;',
      esc_attr($overlay_color),
      esc_attr($overlay_alpha)
    );
    $layers[] = sprintf('<div class="absolute inset-0%1$s" style="%2$s"></div>', esc_attr($custom_class), $overlay_style);
  }

  $pattern_style = '';
  if ($pattern_opacity !== 50) {
    $pattern_style = ' style="opacity: ' . esc_attr(number_format($pattern_opacity / 100, 2, '.', '')) . ';"';
  }
  $layers[] = '<div class="absolute inset-0 pattern-grid opacity-50' . esc_attr($custom_class) . '"' . $pattern_style . '></div>';

  $layers[] = '<div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/50' . esc_attr($custom_class) . '"></div>';

  if ($show_blobs) {
    $layers[] = '<div class="absolute top-1/4 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl' . esc_attr($custom_class) . '"></div>';
    $layers[] = '<div class="absolute bottom-1/4 left-0 w-80 h-80 bg-accent/5 rounded-full blur-3xl' . esc_attr($custom_class) . '"></div>';
  }

  return implode('', $layers);
}
