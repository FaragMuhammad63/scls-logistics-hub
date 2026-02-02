<?php

if (!defined('ABSPATH')) {
  exit;
}

function scls_logistics_get_pattern_definitions() {
  return array(
    'section-hero' => array(
      'title' => __('Hero', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-hero.php',
    ),
    'section-about' => array(
      'title' => __('About', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-about.php',
    ),
    'section-services' => array(
      'title' => __('Services', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-services.php',
    ),
    'section-industries' => array(
      'title' => __('Industries', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-industries.php',
    ),
    'section-why-scls' => array(
      'title' => __('Why SCLS', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-why-scls.php',
    ),
    'section-kpis' => array(
      'title' => __('KPIs & Accreditations', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-kpis.php',
    ),
    'section-contact-cta' => array(
      'title' => __('Contact CTA', 'scls-logistics'),
      'categories' => array('originative-sections'),
      'file' => 'patterns/section-contact-cta.php',
    ),
    'page-home' => array(
      'title' => __('Home Page', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-home.php',
    ),
    'page-services' => array(
      'title' => __('Services Page', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-services.php',
    ),
    'page-contact' => array(
      'title' => __('Contact Page', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-contact.php',
    ),
    'page-service-air-freight' => array(
      'title' => __('Service Detail: Air Freight', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-service-air-freight.php',
    ),
    'page-service-sea-freight' => array(
      'title' => __('Service Detail: Sea Freight', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-service-sea-freight.php',
    ),
    'page-service-land-transportation' => array(
      'title' => __('Service Detail: Land Transportation', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-service-land-transportation.php',
    ),
    'page-service-customs-clearance' => array(
      'title' => __('Service Detail: Customs Clearance', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-service-customs-clearance.php',
    ),
    'page-service-warehousing' => array(
      'title' => __('Service Detail: Warehousing', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-service-warehousing.php',
    ),
    'page-service-control-tower' => array(
      'title' => __('Service Detail: Control Tower', 'scls-logistics'),
      'categories' => array('originative-pages'),
      'file' => 'patterns/page-service-control-tower.php',
    ),
  );
}

function scls_logistics_get_pattern_content($slug) {
  $patterns = scls_logistics_get_pattern_definitions();
  if (!isset($patterns[$slug])) {
    return '';
  }

  $path = get_template_directory() . '/' . $patterns[$slug]['file'];
  if (!file_exists($path)) {
    return '';
  }

  ob_start();
  include $path;
  return trim(ob_get_clean());
}

function scls_logistics_register_block_patterns() {
  if (!function_exists('register_block_pattern')) {
    return;
  }

  if (function_exists('register_block_pattern_category')) {
    register_block_pattern_category('originative-sections', array(
      'label' => __('Originative Sections', 'scls-logistics'),
    ));
    register_block_pattern_category('originative-pages', array(
      'label' => __('Originative Pages', 'scls-logistics'),
    ));
  }

  $patterns = scls_logistics_get_pattern_definitions();
  foreach ($patterns as $slug => $pattern) {
    $content = scls_logistics_get_pattern_content($slug);
    if ($content === '') {
      continue;
    }

    register_block_pattern('originative/' . $slug, array(
      'title' => $pattern['title'],
      'categories' => $pattern['categories'],
      'content' => $content,
    ));
  }
}
add_action('init', 'scls_logistics_register_block_patterns');
