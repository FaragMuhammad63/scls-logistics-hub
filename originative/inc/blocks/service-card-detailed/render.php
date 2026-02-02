<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_render_service_card_detailed($attributes) {
  $title = isset($attributes['title']) ? trim((string) $attributes['title']) : '';
  $body = isset($attributes['body']) ? trim((string) $attributes['body']) : '';
  $url = isset($attributes['url']) ? trim((string) $attributes['url']) : '';
  $icon_name = isset($attributes['iconName']) ? sanitize_key($attributes['iconName']) : '';
  $link_label = isset($attributes['linkLabel']) ? trim((string) $attributes['linkLabel']) : 'Learn More';
  $tags = isset($attributes['tags']) && is_array($attributes['tags']) ? $attributes['tags'] : array();

  if ($title === '' && $body === '') {
    return '';
  }

  $wrapper_attributes = get_block_wrapper_attributes(array(
    'class' => 'group block h-full p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-2',
  ));

  $icon_html = $icon_name !== '' ? scls_logistics_render_icon($icon_name, 32, '') : '';

  $tag_html = '';
  if (!empty($tags)) {
    $tag_items = array();
    foreach ($tags as $tag) {
      $tag = trim(sanitize_text_field($tag));
      if ($tag === '') {
        continue;
      }
      $tag_items[] = sprintf(
        '<span class="px-3 py-1 rounded-full bg-secondary text-secondary-foreground text-xs font-medium">%s</span>',
        esc_html($tag)
      );
    }

    if (!empty($tag_items)) {
      $tag_html = '<div class="flex flex-wrap gap-2 mb-6">' . implode('', $tag_items) . '</div>';
    }
  }

  $card_inner = sprintf(
    '<div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center mb-6 group-hover:bg-navy-light transition-colors">%1$s</div>' .
    '<h3 class="text-xl font-semibold text-foreground mb-3 group-hover:text-accent transition-colors">%2$s</h3>' .
    '<p class="text-muted-foreground leading-relaxed mb-6">%3$s</p>' .
    '%4$s' .
    '<span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">%5$s %6$s</span>',
    $icon_html,
    esc_html($title),
    esc_html($body),
    $tag_html,
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
