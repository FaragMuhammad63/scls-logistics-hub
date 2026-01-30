<?php

if (!defined('ABSPATH')) {
  exit;
}

$posts_page_id = get_option('page_for_posts');
$blog_url = $posts_page_id ? get_permalink($posts_page_id) : home_url('/blog/');
$contact_page = get_page_by_path('contact');
$contact_url = $contact_page ? get_permalink($contact_page) : home_url('/contact/');
$services_url = home_url('/services/');
$news_url = home_url('/news/');
?>
  <footer class="scls-footer">
    <div class="container mx-auto px-4 lg:px-8 py-16">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <div class="lg:col-span-1">
          <div class="font-bold text-2xl mb-4">
            <span class="text-accent">SCLS</span>
          </div>
          <p class="text-primary-foreground/70 text-sm leading-relaxed mb-6">
            <?php esc_html_e('Speed & Creativity for Logistics Services - Your strategic partner in freight and logistics excellence across Saudi Arabia and global trade corridors.', 'scls-logistics'); ?>
          </p>
          <div class="flex gap-3">
            <a href="#" aria-label="<?php esc_attr_e('LinkedIn', 'scls-logistics'); ?>" class="scls-social-link"><?php echo scls_logistics_render_icon('linkedin', 20, 'is-current'); ?></a>
            <a href="#" aria-label="<?php esc_attr_e('Twitter', 'scls-logistics'); ?>" class="scls-social-link"><?php echo scls_logistics_render_icon('twitter', 20, 'is-current'); ?></a>
            <a href="#" aria-label="<?php esc_attr_e('Facebook', 'scls-logistics'); ?>" class="scls-social-link"><?php echo scls_logistics_render_icon('facebook', 20, 'is-current'); ?></a>
            <a href="#" aria-label="<?php esc_attr_e('Instagram', 'scls-logistics'); ?>" class="scls-social-link"><?php echo scls_logistics_render_icon('instagram', 20, 'is-current'); ?></a>
          </div>
        </div>

        <div>
          <h4 class="font-semibold text-sm uppercase tracking-wider mb-4"><?php esc_html_e('About', 'scls-logistics'); ?></h4>
          <ul class="space-y-3">
            <li><a class="scls-footer-link" href="<?php echo esc_url(home_url('/#about')); ?>"><?php esc_html_e('About SCLS', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url(home_url('/#why-scls')); ?>"><?php esc_html_e('Why Choose Us', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url(home_url('/#industries')); ?>"><?php esc_html_e('Industries', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url(home_url('/#accreditations')); ?>"><?php esc_html_e('Accreditations', 'scls-logistics'); ?></a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-semibold text-sm uppercase tracking-wider mb-4"><?php esc_html_e('Services', 'scls-logistics'); ?></h4>
          <ul class="space-y-3">
            <li><a class="scls-footer-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Air Freight', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Sea Freight', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Land Transportation', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Customs Clearance', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Warehousing & 3PL', 'scls-logistics'); ?></a></li>
            <li><a class="scls-footer-link" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('Control Tower', 'scls-logistics'); ?></a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-semibold text-sm uppercase tracking-wider mb-4"><?php esc_html_e('Contact', 'scls-logistics'); ?></h4>
          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <span class="scls-footer-icon"><?php echo scls_logistics_render_icon('map-pin', 20); ?></span>
              <span class="text-primary-foreground/70 text-sm"><?php esc_html_e('Riyadh, Saudi Arabia', 'scls-logistics'); ?></span>
            </li>
            <li class="flex items-center gap-3">
              <span class="scls-footer-icon"><?php echo scls_logistics_render_icon('phone', 20); ?></span>
              <a class="scls-footer-link" href="tel:+966XXXXXXXX">+966 XX XXX XXXX</a>
            </li>
            <li class="flex items-center gap-3">
              <span class="scls-footer-icon"><?php echo scls_logistics_render_icon('mail', 20); ?></span>
              <a class="scls-footer-link" href="mailto:info@scls.sa">info@scls.sa</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="border-t border-white/10">
      <div class="container mx-auto px-4 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-primary-foreground/60 text-sm">
          &copy; <?php echo esc_html(date_i18n('Y')); ?> <?php esc_html_e('Speed & Creativity for Logistics Services. All rights reserved.', 'scls-logistics'); ?>
        </p>
        <div class="flex gap-6">
          <a class="scls-footer-link" href="<?php echo esc_url(home_url('/privacy')); ?>"><?php esc_html_e('Privacy Policy', 'scls-logistics'); ?></a>
          <a class="scls-footer-link" href="<?php echo esc_url(home_url('/terms')); ?>"><?php esc_html_e('Terms of Service', 'scls-logistics'); ?></a>
        </div>
      </div>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
