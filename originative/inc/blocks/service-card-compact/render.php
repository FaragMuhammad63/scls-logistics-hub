<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_service_card_compact($attributes) {
  $title = isset($attributes['title']) ? trim((string) $attributes['title']) : '';
  $body = isset($attributes['body']) ? trim((string) $attributes['body']) : '';
  $url = isset($attributes['url']) ? trim((string) $attributes['url']) : '';
  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $link_label = isset($attributes['linkLabel']) ? trim((string) $attributes['linkLabel']) : 'Learn More';

  if ($title === '' && $body === '') {
    return '';
  }

  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => 'group block p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 h-full',
  ));

  $icon_html = $icon_name !== '' ? scls_logistics_render_icon($icon_name, 32, '') : '';

  $card_inner = sprintf(
    '<div class="flex items-start gap-5">' .
      '<div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:bg-navy-light transition-colors">%1$s</div>' .
      '<div class="flex-1">' .
        '<h3 class="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors">%2$s</h3>' .
        '<p class="text-muted-foreground leading-relaxed mb-4">%3$s</p>' .
        '<span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">%4$s %5$s</span>' .
      '</div>' .
    '</div>',
    $icon_html,
    esc_html($title),
    esc_html($body),
    esc_html($link_label),
    scls_logistics_render_icon('arrow-right', 16, '')
  );

  if ($url !== '') {
    return sprintf(
      '<a href="%1$s" %2$s>%3$s</a>',
      esc_url($url),
      $wrapper_attributes,
      $card_inner
    );
  }

  return sprintf(
    '<div %1$s>%2$s</div>',
    $wrapper_attributes,
    $card_inner
  );
}
