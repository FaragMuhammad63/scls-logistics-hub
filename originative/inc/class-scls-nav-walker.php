<?php

if (!defined('ABSPATH')) {
  exit;
}

class Scls_Logistics_Nav_Walker extends Walker_Nav_Menu {
  private $variant = 'desktop';
  private $pending_submenu_id = '';

  public function __construct($variant = 'desktop') {
    $this->variant = $variant === 'mobile' ? 'mobile' : 'desktop';
  }

  private function is_item_active($classes) {
    $active_classes = array(
      'current-menu-item',
      'current-menu-ancestor',
      'current-menu-parent',
      'current_page_parent',
      'current_page_ancestor',
      'current_page_item',
    );
    return (bool) array_intersect($classes, $active_classes);
  }

  public function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $submenu_classes = array('scls-submenu');
    if ($depth > 0) {
      $submenu_classes[] = 'scls-submenu-nested';
    }
    $submenu_id = $this->pending_submenu_id ? ' id="' . esc_attr($this->pending_submenu_id) . '"' : '';
    $output .= "\n{$indent}<ul{$submenu_id} class=\"" . esc_attr(implode(' ', $submenu_classes)) . "\" data-scls-submenu>\n";
    $this->pending_submenu_id = '';
  }

  public function end_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $output .= "{$indent}</ul>\n";
  }

  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $indent = $depth ? str_repeat("\t", $depth) : '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $has_children = !empty($args->has_children) || in_array('menu-item-has-children', $classes, true);
    $is_active = $this->is_item_active($classes);

    $classes[] = 'scls-nav-item';
    if ($has_children) {
      $classes[] = 'scls-nav-item-parent';
    }
    if ($this->variant === 'mobile') {
      $classes[] = 'scls-nav-item-mobile';
    }

    $classes = apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth);
    $class_names = $classes ? ' class="' . esc_attr(implode(' ', $classes)) . '"' : '';
    $item_id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
    $id_attribute = $item_id ? ' id="' . esc_attr($item_id) . '"' : '';
    $output .= $indent . '<li' . $id_attribute . $class_names . '>';

    $atts = array();
    $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
    $atts['target'] = !empty($item->target) ? $item->target : '';
    $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
    $atts['href'] = !empty($item->url) ? $item->url : '';

    if ($atts['target'] === '_blank' && $atts['rel'] === '') {
      $atts['rel'] = 'noopener noreferrer';
    }

    $link_classes = array('scls-nav-link');
    if ($this->variant === 'mobile') {
      $link_classes[] = 'scls-nav-link-mobile';
    }
    if ($is_active) {
      $link_classes[] = 'is-active';
    }
    $atts['class'] = implode(' ', $link_classes);

    if ($has_children) {
      $atts['aria-haspopup'] = 'true';
    }
    if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
      $atts['aria-current'] = 'page';
    }

    if ($item->type === 'custom' && isset($atts['href']) && strpos($atts['href'], '#') === 0) {
      $atts['data-scroll-target'] = $atts['href'];
    }

    $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
    $attributes = '';
    foreach ($atts as $attr => $value) {
      if ($value === '' || $value === null) {
        continue;
      }
      $value = $attr === 'href' ? esc_url($value) : esc_attr($value);
      $attributes .= ' ' . $attr . '="' . $value . '"';
    }

    $title = apply_filters('the_title', $item->title, $item->ID);
    $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
    $aria_label = wp_strip_all_tags($title);

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';

    if ($has_children) {
      $submenu_id = 'scls-submenu-' . $item->ID;
      $this->pending_submenu_id = $submenu_id;
      $item_output .= '<button class="scls-submenu-toggle" type="button" aria-expanded="false" aria-controls="' . esc_attr($submenu_id) . '" data-scls-submenu-toggle aria-label="' . esc_attr(sprintf(__('Toggle submenu for %s', 'scls-logistics'), $aria_label)) . '">';
      $item_output .= '<span class="scls-submenu-toggle-icon" aria-hidden="true"></span>';
      $item_output .= '</button>';
    }

    $item_output .= $args->after;
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  public function end_el(&$output, $item, $depth = 0, $args = null) {
    $output .= "</li>\n";
  }
}
