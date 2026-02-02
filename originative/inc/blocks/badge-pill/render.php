<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_badge_pill($attributes) {
  $text = isset($attributes['text']) ? trim((string) $attributes['text']) : '';
  if ($text === '') {
    return '';
  }

  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $variant = isset($attributes['variant']) ? sanitize_text_field($attributes['variant']) : 'accent-soft';
  $size = isset($attributes['size']) ? sanitize_text_field($attributes['size']) : 'md';

  $variant_classes = array(
    'accent-soft' => 'bg-accent/10 text-accent',
    'accent-strong' => 'bg-accent/20 text-accent',
    'secondary' => 'bg-secondary text-secondary-foreground',
    'glass' => 'bg-white/10 backdrop-blur-sm border border-white/10 text-primary-foreground',
  );

  $size_classes = array(
    'sm' => 'px-3 py-1 text-xs',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-5 py-2.5 text-sm',
  );

  if (!isset($variant_classes[$variant])) {
    $variant = 'accent-soft';
  }
  if (!isset($size_classes[$size])) {
    $size = 'md';
  }

  $display_class = $variant === 'glass' ? 'flex' : 'inline-flex';
  $classes = trim(
    $display_class .
    ' items-center gap-2 rounded-full font-medium ' .
    $size_classes[$size] . ' ' .
    $variant_classes[$variant]
  );

  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => $classes,
  ));

  $icon_html = '';
  if ($icon_name !== '') {
    $icon_size = $size === 'sm' ? 14 : 16;
    $icon_html = scls_logistics_render_icon($icon_name, $icon_size, '');
  }

  return sprintf(
    '<span %1$s>%2$s<span>%3$s</span></span>',
    $wrapper_attributes,
    $icon_html,
    esc_html($text)
  );
}
