<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_kpi_counter_card($attributes) {
  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $value = isset($attributes['value']) ? absint($attributes['value']) : 0;
  $suffix = isset($attributes['suffix']) ? trim((string) $attributes['suffix']) : '';
  $label = isset($attributes['label']) ? trim((string) $attributes['label']) : '';

  if ($label === '') {
    return '';
  }

  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => 'p-8 rounded-2xl bg-card border border-border shadow-card text-center',
  ));

  $icon_html = $icon_name !== '' ? scls_logistics_render_icon($icon_name, 24, '') : '';

  $suffix_html = '';
  if ($suffix !== '') {
    $suffix_html = sprintf(
      '<span class="text-4xl md:text-5xl font-bold text-foreground">%s</span>',
      esc_html($suffix)
    );
  }

  return sprintf(
    '<div %1$s>' .
      '<div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">%2$s</div>' .
      '<span class="text-4xl md:text-5xl font-bold text-foreground" data-scls-counter data-value="%3$d">0</span>' .
      '%4$s' .
      '<p class="text-muted-foreground text-sm mt-2">%5$s</p>' .
    '</div>',
    $wrapper_attributes,
    $icon_html,
    $value,
    $suffix_html,
    esc_html($label)
  );
}
