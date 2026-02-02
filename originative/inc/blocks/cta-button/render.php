<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_cta_button($attributes) {
  $text = isset($attributes['text']) ? trim((string) $attributes['text']) : '';
  if ($text === '') {
    return '';
  }

  $url = isset($attributes['url']) ? trim((string) $attributes['url']) : '';
  $variant = isset($attributes['variant']) ? sanitize_text_field($attributes['variant']) : 'default';
  $size = isset($attributes['size']) ? sanitize_text_field($attributes['size']) : 'default';
  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $icon_position = isset($attributes['iconPosition']) ? sanitize_text_field($attributes['iconPosition']) : 'right';
  $open_in_new_tab = !empty($attributes['openInNewTab']);

  $variant_classes = array(
    'default' => 'scls-button',
    'accent' => 'scls-button scls-button-accent',
  );

  $size_classes = array(
    'default' => '',
    'lg' => 'px-8 py-3',
    'lg-text' => 'px-8 py-3 text-base',
  );

  if (!isset($variant_classes[$variant])) {
    $variant = 'default';
  }
  if (!isset($size_classes[$size])) {
    $size = 'default';
  }

  $classes = trim($variant_classes[$variant] . ' ' . $size_classes[$size]);
  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => $classes,
  ));

  $icon_html = '';
  if ($icon_name !== '') {
    $icon_html = scls_logistics_render_icon($icon_name, 16, '');
  }

  $content = esc_html($text);
  if ($icon_html !== '') {
    if ($icon_position === 'left') {
      $content = $icon_html . ' ' . esc_html($text);
    } else {
      $content = esc_html($text) . ' ' . $icon_html;
    }
  }

  if ($url !== '') {
    $target = $open_in_new_tab ? ' target="_blank"' : '';
    $rel = $open_in_new_tab ? ' rel="noopener noreferrer"' : '';
    return sprintf(
      '<a href="%1$s" %2$s%3$s>%4$s</a>',
      esc_url($url),
      $wrapper_attributes,
      $rel . $target,
      $content
    );
  }

  return sprintf(
    '<span %1$s>%2$s</span>',
    $wrapper_attributes,
    $content
  );
}
