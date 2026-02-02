<?php

if (!defined('ABSPATH')) {
  exit;
}

function scls_logistics_demo_import_log($message) {
  if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
    error_log('[SCLS Demo Import] ' . $message);
  }
}

function scls_logistics_demo_import_capability() {
  return 'edit_theme_options';
}

function scls_logistics_demo_import_admin_menu_debug() {
  scls_logistics_demo_import_log('admin_menu hook fired');
}
add_action('admin_menu', 'scls_logistics_demo_import_admin_menu_debug', 1);

function scls_logistics_demo_import_menu() {
  scls_logistics_demo_import_log('registering demo import page');
  add_submenu_page(
    'themes.php',
    __('Originative Demo Import', 'scls-logistics'),
    __('Originative Demo Import', 'scls-logistics'),
    scls_logistics_demo_import_capability(),
    'scls-demo-import',
    'scls_logistics_demo_import_page'
  );
}
add_action('admin_menu', 'scls_logistics_demo_import_menu');

function scls_logistics_demo_import_page() {
  scls_logistics_demo_import_log('rendering demo import page');
  if (!current_user_can(scls_logistics_demo_import_capability())) {
    return;
  }

  $results = get_transient('scls_demo_import_results');
  if ($results) {
    delete_transient('scls_demo_import_results');
  }
  ?>
  <div class="wrap">
    <h1><?php esc_html_e('Originative Demo Import', 'scls-logistics'); ?></h1>
    <p><?php esc_html_e('This will create or update demo pages and assign the primary menu. Existing user-created pages will not be overwritten.', 'scls-logistics'); ?></p>

    <?php if (!empty($results)) : ?>
      <div class="notice notice-success">
        <p><strong><?php esc_html_e('Import completed.', 'scls-logistics'); ?></strong></p>
        <?php if (!empty($results['created'])) : ?>
          <p><?php esc_html_e('Created:', 'scls-logistics'); ?> <?php echo esc_html(implode(', ', $results['created'])); ?></p>
        <?php endif; ?>
        <?php if (!empty($results['updated'])) : ?>
          <p><?php esc_html_e('Updated:', 'scls-logistics'); ?> <?php echo esc_html(implode(', ', $results['updated'])); ?></p>
        <?php endif; ?>
        <?php if (!empty($results['skipped'])) : ?>
          <p><?php esc_html_e('Skipped (existing user content):', 'scls-logistics'); ?> <?php echo esc_html(implode(', ', $results['skipped'])); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <?php wp_nonce_field('scls_demo_import'); ?>
      <input type="hidden" name="action" value="scls_demo_import" />
      <?php submit_button(__('Import Demo Content', 'scls-logistics')); ?>
    </form>
  </div>
  <?php
}

function scls_logistics_upsert_demo_page($args, &$results) {
  $defaults = array(
    'title' => '',
    'slug' => '',
    'path' => '',
    'content' => '',
    'template' => '',
    'parent' => 0,
  );
  $args = wp_parse_args($args, $defaults);
  $path = $args['path'] ? $args['path'] : $args['slug'];

  $existing = get_page_by_path($path);
  if ($existing) {
    $is_demo = (bool) get_post_meta($existing->ID, '_scls_demo_content', true);
    if (!$is_demo) {
      $results['skipped'][] = $args['title'];
      return (int) $existing->ID;
    }

    $updated = wp_update_post(array(
      'ID' => $existing->ID,
      'post_title' => $args['title'],
      'post_name' => $args['slug'],
      'post_content' => $args['content'],
      'post_status' => 'publish',
      'post_parent' => (int) $args['parent'],
    ), true);

    if (is_wp_error($updated)) {
      $results['skipped'][] = $args['title'];
      return 0;
    }

    update_post_meta($existing->ID, '_scls_demo_content', 1);
    if ($args['template'] !== '') {
      update_post_meta($existing->ID, '_wp_page_template', $args['template']);
    }
    $results['updated'][] = $args['title'];
    return (int) $existing->ID;
  }

  $created = wp_insert_post(array(
    'post_type' => 'page',
    'post_title' => $args['title'],
    'post_name' => $args['slug'],
    'post_content' => $args['content'],
    'post_status' => 'publish',
    'post_parent' => (int) $args['parent'],
  ), true);

  if (is_wp_error($created)) {
    $results['skipped'][] = $args['title'];
    return 0;
  }

  update_post_meta($created, '_scls_demo_content', 1);
  if ($args['template'] !== '') {
    update_post_meta($created, '_wp_page_template', $args['template']);
  }
  $results['created'][] = $args['title'];
  return (int) $created;
}

function scls_logistics_build_primary_menu($page_ids) {
  $menu_name = 'Primary Menu';
  $menu = wp_get_nav_menu_object($menu_name);
  $menu_id = $menu ? (int) $menu->term_id : 0;
  if (!$menu_id) {
    $menu_id = wp_create_nav_menu($menu_name);
  }

  if (!$menu_id) {
    return 0;
  }

  $existing_items = wp_get_nav_menu_items($menu_id);
  $existing_page_ids = array();
  $existing_urls = array();
  if ($existing_items) {
    foreach ($existing_items as $item) {
      if ($item->type === 'post_type' && $item->object === 'page') {
        $existing_page_ids[] = (int) $item->object_id;
      }
      if ($item->type === 'custom') {
        $existing_urls[] = $item->url;
      }
    }
  }

  $home_url = home_url('/');
  $about_url = home_url('/#about');
  $industries_url = home_url('/#industries');
  $news_url = function_exists('get_post_type_archive_link') ? get_post_type_archive_link('news') : '';

  $items = array(
    array(
      'type' => 'custom',
      'title' => __('Home', 'scls-logistics'),
      'url' => $home_url,
    ),
    array(
      'type' => 'custom',
      'title' => __('About', 'scls-logistics'),
      'url' => $about_url,
    ),
    array(
      'type' => 'page',
      'title' => __('Services', 'scls-logistics'),
      'id' => isset($page_ids['services']) ? (int) $page_ids['services'] : 0,
    ),
    array(
      'type' => 'custom',
      'title' => __('Industries', 'scls-logistics'),
      'url' => $industries_url,
    ),
    array(
      'type' => 'custom',
      'title' => __('News', 'scls-logistics'),
      'url' => $news_url,
    ),
    array(
      'type' => 'page',
      'title' => __('Contact', 'scls-logistics'),
      'id' => isset($page_ids['contact']) ? (int) $page_ids['contact'] : 0,
    ),
  );

  foreach ($items as $item) {
    if ($item['type'] === 'page') {
      if (!$item['id'] || in_array($item['id'], $existing_page_ids, true)) {
        continue;
      }
      wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => $item['title'],
        'menu-item-object' => 'page',
        'menu-item-object-id' => $item['id'],
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish',
      ));
      continue;
    }

    if (!$item['url'] || in_array($item['url'], $existing_urls, true)) {
      continue;
    }

    wp_update_nav_menu_item($menu_id, 0, array(
      'menu-item-title' => $item['title'],
      'menu-item-url' => $item['url'],
      'menu-item-type' => 'custom',
      'menu-item-status' => 'publish',
    ));
  }

  $locations = get_theme_mod('nav_menu_locations', array());
  $locations['primary'] = $menu_id;
  set_theme_mod('nav_menu_locations', $locations);

  return $menu_id;
}

function scls_logistics_handle_demo_import() {
  if (!current_user_can(scls_logistics_demo_import_capability())) {
    wp_die(__('You do not have permission to import demo content.', 'scls-logistics'));
  }

  check_admin_referer('scls_demo_import');

  $results = array(
    'created' => array(),
    'updated' => array(),
    'skipped' => array(),
  );

  $home_content = scls_logistics_get_pattern_content('page-home');
  $services_content = scls_logistics_get_pattern_content('page-services');
  $contact_content = scls_logistics_get_pattern_content('page-contact');

  $home_id = scls_logistics_upsert_demo_page(array(
    'title' => 'Home',
    'slug' => 'home',
    'path' => 'home',
    'content' => $home_content,
  ), $results);

  $services_id = scls_logistics_upsert_demo_page(array(
    'title' => 'Services',
    'slug' => 'services',
    'path' => 'services',
    'content' => $services_content,
    'template' => 'page-services.php',
  ), $results);

  $contact_id = scls_logistics_upsert_demo_page(array(
    'title' => 'Contact',
    'slug' => 'contact',
    'path' => 'contact',
    'content' => $contact_content,
    'template' => 'page-contact.php',
  ), $results);

  $blog_content = '<!-- wp:paragraph {"className":"text-muted-foreground"} --><p class="text-muted-foreground">' .
    esc_html__('This page is managed by WordPress as the Posts page.', 'scls-logistics') .
    '</p><!-- /wp:paragraph -->';

  $blog_id = scls_logistics_upsert_demo_page(array(
    'title' => 'Blog',
    'slug' => 'blog',
    'path' => 'blog',
    'content' => $blog_content,
  ), $results);

  $service_parent = $services_id ? $services_id : 0;
  $service_pages = array(
    array(
      'title' => 'Air Freight Services',
      'slug' => 'air-freight',
      'path' => 'services/air-freight',
      'pattern' => 'page-service-air-freight',
    ),
    array(
      'title' => 'Sea Freight Services',
      'slug' => 'sea-freight',
      'path' => 'services/sea-freight',
      'pattern' => 'page-service-sea-freight',
    ),
    array(
      'title' => 'Land Transportation Services',
      'slug' => 'land-transportation',
      'path' => 'services/land-transportation',
      'pattern' => 'page-service-land-transportation',
    ),
    array(
      'title' => 'Customs Clearance & Trade Compliance',
      'slug' => 'customs-clearance',
      'path' => 'services/customs-clearance',
      'pattern' => 'page-service-customs-clearance',
    ),
    array(
      'title' => 'Warehousing & 3PL Services',
      'slug' => 'warehousing',
      'path' => 'services/warehousing',
      'pattern' => 'page-service-warehousing',
    ),
    array(
      'title' => 'Supply Chain Control Tower',
      'slug' => 'control-tower',
      'path' => 'services/control-tower',
      'pattern' => 'page-service-control-tower',
    ),
  );

  foreach ($service_pages as $service_page) {
    $content = scls_logistics_get_pattern_content($service_page['pattern']);
    scls_logistics_upsert_demo_page(array(
      'title' => $service_page['title'],
      'slug' => $service_page['slug'],
      'path' => $service_page['path'],
      'content' => $content,
      'template' => 'page-service-detail.php',
      'parent' => $service_parent,
    ), $results);
  }

  if ($home_id) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home_id);
  }

  if ($blog_id) {
    update_option('page_for_posts', $blog_id);
  }

  scls_logistics_build_primary_menu(array(
    'services' => $services_id,
    'contact' => $contact_id,
  ));

  set_transient('scls_demo_import_results', $results, 60);
  wp_safe_redirect(admin_url('themes.php?page=scls-demo-import'));
  exit;
}
add_action('admin_post_scls_demo_import', 'scls_logistics_handle_demo_import');
