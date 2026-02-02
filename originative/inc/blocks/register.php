<?php

if (!defined('ABSPATH')) {
  exit;
}

function originative_register_block_category($categories, $post) {
  foreach ($categories as $category) {
    if (!empty($category['slug']) && $category['slug'] === 'originative') {
      return $categories;
    }
  }

  $categories[] = array(
    'slug' => 'originative',
    'title' => __('Originative', 'scls-logistics'),
    'icon' => null,
  );

  return $categories;
}
add_filter('block_categories_all', 'originative_register_block_category', 10, 2);

function originative_register_blocks() {
  $base_dir = get_theme_file_path('/inc/blocks');
  $base_uri = get_theme_file_uri('/inc/blocks');

  $badge_dir = $base_dir . '/badge-pill';
  $badge_json = $badge_dir . '/block.json';
  if (file_exists($badge_json)) {
    require_once $badge_dir . '/render.php';
    $badge_script = 'originative-badge-pill-editor';
    $badge_script_path = $badge_dir . '/index.js';
    $badge_script_uri = $base_uri . '/badge-pill/index.js';
    $badge_version = file_exists($badge_script_path) ? filemtime($badge_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $badge_script,
      $badge_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $badge_version,
      true
    );

    register_block_type($badge_dir, array(
      'editor_script' => $badge_script,
      'render_callback' => 'originative_render_badge_pill',
    ));
  }

  $cta_dir = $base_dir . '/cta-button';
  $cta_json = $cta_dir . '/block.json';
  if (file_exists($cta_json)) {
    require_once $cta_dir . '/render.php';
    $cta_script = 'originative-cta-button-editor';
    $cta_script_path = $cta_dir . '/index.js';
    $cta_script_uri = $base_uri . '/cta-button/index.js';
    $cta_version = file_exists($cta_script_path) ? filemtime($cta_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $cta_script,
      $cta_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $cta_version,
      true
    );

    register_block_type($cta_dir, array(
      'editor_script' => $cta_script,
      'render_callback' => 'originative_render_cta_button',
    ));
  }

  $compact_dir = $base_dir . '/service-card-compact';
  $compact_json = $compact_dir . '/block.json';
  if (file_exists($compact_json)) {
    require_once $compact_dir . '/render.php';
    $compact_script = 'originative-service-card-compact-editor';
    $compact_script_path = $compact_dir . '/index.js';
    $compact_script_uri = $base_uri . '/service-card-compact/index.js';
    $compact_version = file_exists($compact_script_path) ? filemtime($compact_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $compact_script,
      $compact_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $compact_version,
      true
    );

    register_block_type($compact_dir, array(
      'editor_script' => $compact_script,
      'render_callback' => 'originative_render_service_card_compact',
    ));
  }

  $kpi_dir = $base_dir . '/kpi-counter-card';
  $kpi_json = $kpi_dir . '/block.json';
  if (file_exists($kpi_json)) {
    require_once $kpi_dir . '/render.php';
    $kpi_script = 'originative-kpi-counter-card-editor';
    $kpi_script_path = $kpi_dir . '/index.js';
    $kpi_script_uri = $base_uri . '/kpi-counter-card/index.js';
    $kpi_version = file_exists($kpi_script_path) ? filemtime($kpi_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $kpi_script,
      $kpi_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $kpi_version,
      true
    );

    register_block_type($kpi_dir, array(
      'editor_script' => $kpi_script,
      'render_callback' => 'originative_render_kpi_counter_card',
    ));
  }

  $contact_dir = $base_dir . '/contact-method-card';
  $contact_json = $contact_dir . '/block.json';
  if (file_exists($contact_json)) {
    require_once $contact_dir . '/render.php';
    $contact_script = 'originative-contact-method-card-editor';
    $contact_script_path = $contact_dir . '/index.js';
    $contact_script_uri = $base_uri . '/contact-method-card/index.js';
    $contact_version = file_exists($contact_script_path) ? filemtime($contact_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $contact_script,
      $contact_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $contact_version,
      true
    );

    register_block_type($contact_dir, array(
      'editor_script' => $contact_script,
      'render_callback' => 'originative_render_contact_method_card',
    ));
  }

  $feature_dir = $base_dir . '/feature-card';
  $feature_json = $feature_dir . '/block.json';
  if (file_exists($feature_json)) {
    require_once $feature_dir . '/render.php';
    $feature_script = 'originative-feature-card-editor';
    $feature_script_path = $feature_dir . '/index.js';
    $feature_script_uri = $base_uri . '/feature-card/index.js';
    $feature_version = file_exists($feature_script_path) ? filemtime($feature_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $feature_script,
      $feature_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $feature_version,
      true
    );

    register_block_type($feature_dir, array(
      'editor_script' => $feature_script,
      'render_callback' => 'originative_render_feature_card',
    ));
  }

  $detailed_dir = $base_dir . '/service-card-detailed';
  $detailed_json = $detailed_dir . '/block.json';
  if (file_exists($detailed_json)) {
    require_once $detailed_dir . '/render.php';
    $detailed_script = 'originative-service-card-detailed-editor';
    $detailed_script_path = $detailed_dir . '/index.js';
    $detailed_script_uri = $base_uri . '/service-card-detailed/index.js';
    $detailed_version = file_exists($detailed_script_path) ? filemtime($detailed_script_path) : wp_get_theme()->get('Version');

    wp_register_script(
      $detailed_script,
      $detailed_script_uri,
      array('wp-blocks', 'wp-element', 'wp-i18n', 'wp-block-editor', 'wp-components', 'wp-server-side-render'),
      $detailed_version,
      true
    );

    register_block_type($detailed_dir, array(
      'editor_script' => $detailed_script,
      'render_callback' => 'originative_render_service_card_detailed',
    ));
  }
}
add_action('init', 'originative_register_blocks');
