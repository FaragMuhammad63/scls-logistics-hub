<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_contact_method_card($attributes) {
  $label = isset($attributes['label']) ? trim((string) $attributes['label']) : '';
  $value = isset($attributes['value']) ? trim((string) $attributes['value']) : '';
  $url = isset($attributes['url']) ? trim((string) $attributes['url']) : '';
  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $open_in_new = !empty($attributes['openInNew']);

  if ($label === '' && $value === '') {
    return '';
  }

  $is_link = $url !== '';
  $wrapper_class = $is_link
    ? 'flex items-center gap-4 p-5 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors group'
    : 'flex items-center gap-4 p-5 rounded-xl bg-card border border-border';

  $icon_class = 'w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center';
  if ($is_link) {
    $icon_class .= ' group-hover:bg-accent/20 transition-colors';
  }

  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => $wrapper_class,
  ));

  $icon_html = $icon_name !== '' ? scls_logistics_render_icon($icon_name, 24, '') : '';

  $inner = sprintf(
    '<div class="%1$s">%2$s</div>' .
    '<div><p class="text-sm text-muted-foreground">%3$s</p><p class="font-semibold text-foreground">%4$s</p></div>',
    esc_attr($icon_class),
    $icon_html,
    esc_html($label),
    esc_html($value)
  );

  if ($is_link) {
    $link_attributes = $wrapper_attributes;
    if ($open_in_new) {
      $link_attributes .= ' target="_blank" rel="noopener noreferrer"';
    }
    return sprintf(
      '<a href="%1$s" %2$s>%3$s</a>',
      esc_url($url),
      $link_attributes,
      $inner
    );
  }

  return sprintf(
    '<div %1$s>%2$s</div>',
    $wrapper_attributes,
    $inner
  );
}
