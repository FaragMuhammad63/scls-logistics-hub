<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_feature_card($attributes) {
  $title = isset($attributes['title']) ? trim((string) $attributes['title']) : '';
  $body = isset($attributes['body']) ? trim((string) $attributes['body']) : '';
  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $variant = isset($attributes['variant']) ? sanitize_text_field($attributes['variant']) : 'light';

  if ($title === '' && $body === '') {
    return '';
  }

  $variants = array(
    'light' => array(
      'wrapper' => 'group p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1',
      'icon' => 'w-14 h-14 rounded-xl bg-accent/10 flex items-center justify-center mb-5 group-hover:bg-accent/20 transition-colors',
      'title' => 'text-xl font-semibold text-foreground mb-3',
      'body' => 'text-muted-foreground leading-relaxed',
    ),
    'dark' => array(
      'wrapper' => 'group p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-all duration-300',
      'icon' => 'w-14 h-14 rounded-xl bg-accent/20 flex items-center justify-center mb-5 group-hover:bg-accent/30 transition-colors',
      'title' => 'text-xl font-semibold text-primary-foreground mb-3',
      'body' => 'text-primary-foreground/70 leading-relaxed',
    ),
  );

  if (!isset($variants[$variant])) {
    $variant = 'light';
  }

  $config = $variants[$variant];
  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => $config['wrapper'],
  ));

  $icon_html = $icon_name !== '' ? scls_logistics_render_icon($icon_name, 28, '') : '';

  return sprintf(
    '<div %1$s>' .
      '<div class="%2$s">%3$s</div>' .
      '<h3 class="%4$s">%5$s</h3>' .
      '<p class="%6$s">%7$s</p>' .
    '</div>',
    $wrapper_attributes,
    esc_attr($config['icon']),
    $icon_html,
    esc_attr($config['title']),
    esc_html($title),
    esc_attr($config['body']),
    esc_html($body)
  );
}
