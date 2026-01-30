<?php
/*
Template Name: Contact
*/

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <section class="relative pt-32 pb-20 bg-primary overflow-hidden">
    <div class="absolute inset-0 pattern-grid opacity-20"></div>
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
      <div class="max-w-3xl">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/20 text-accent text-sm font-medium mb-4">
          <?php esc_html_e('Contact Us', 'scls-logistics'); ?>
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
          <?php esc_html_e("Let's Discuss Your Logistics Needs", 'scls-logistics'); ?>
        </h1>
        <p class="text-xl text-primary-foreground/80 leading-relaxed">
          <?php esc_html_e('Our team is ready to help you optimize your supply chain. Get in touch today for a free consultation.', 'scls-logistics'); ?>
        </p>
      </div>
    </div>
  </section>

  <section class="py-8 bg-surface-sunken border-b border-border">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="flex flex-wrap justify-center gap-4">
        <a href="tel:+966XXXXXXXX" class="flex items-center gap-2 px-6 py-3 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors">
          <?php echo scls_logistics_render_icon('phone', 20); ?>
          <span class="font-medium"><?php esc_html_e('Call Us', 'scls-logistics'); ?></span>
        </a>
        <a href="mailto:info@scls.sa" class="flex items-center gap-2 px-6 py-3 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors">
          <?php echo scls_logistics_render_icon('mail', 20); ?>
          <span class="font-medium"><?php esc_html_e('Email Us', 'scls-logistics'); ?></span>
        </a>
        <a href="https://wa.me/966XXXXXXXX" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-6 py-3 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors">
          <?php echo scls_logistics_render_icon('message-circle', 20); ?>
          <span class="font-medium"><?php esc_html_e('WhatsApp', 'scls-logistics'); ?></span>
        </a>
      </div>
    </div>
  </section>

  <section class="py-20 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12">
        <div>
          <h2 class="text-2xl font-bold text-foreground mb-6"><?php esc_html_e('Send Us a Message', 'scls-logistics'); ?></h2>
          <div class="p-8 rounded-2xl bg-card border border-border shadow-card">
            <?php
              $cf7_shortcode = scls_logistics_get_cf7_shortcode();
              if (class_exists('WPCF7') && $cf7_shortcode) {
                echo do_shortcode($cf7_shortcode);
              } else {
                echo '<p class="text-muted-foreground">' . esc_html__('Add your Contact Form 7 shortcode in the Customizer -> SCLS Integrations.', 'scls-logistics') . '</p>';
              }
            ?>
          </div>
        </div>

        <div>
          <h2 class="text-2xl font-bold text-foreground mb-6"><?php esc_html_e('Our Offices', 'scls-logistics'); ?></h2>
          <div class="space-y-6 mb-10">
            <?php
              $offices = array(
                array('city' => 'Riyadh', 'address' => 'King Fahd Road, Al Olaya District', 'phone' => '+966 11 XXX XXXX', 'email' => 'riyadh@scls.sa'),
                array('city' => 'Jeddah', 'address' => 'Near Jeddah Islamic Port', 'phone' => '+966 12 XXX XXXX', 'email' => 'jeddah@scls.sa'),
                array('city' => 'Dammam', 'address' => 'King Abdulaziz Seaport Area', 'phone' => '+966 13 XXX XXXX', 'email' => 'dammam@scls.sa'),
              );
              foreach ($offices as $office) :
            ?>
              <div class="p-6 rounded-2xl bg-card border border-border">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center shrink-0">
                    <?php echo scls_logistics_render_icon('building-2', 24); ?>
                  </div>
                  <div>
                    <h3 class="font-semibold text-foreground mb-2"><?php echo esc_html($office['city']); ?> <?php esc_html_e('Office', 'scls-logistics'); ?></h3>
                    <p class="text-muted-foreground text-sm mb-2"><?php echo esc_html($office['address']); ?></p>
                    <div class="space-y-1">
                      <a class="block text-sm text-accent hover:underline" href="tel:<?php echo esc_attr(str_replace(' ', '', $office['phone'])); ?>">
                        <?php echo esc_html($office['phone']); ?>
                      </a>
                      <a class="block text-sm text-accent hover:underline" href="mailto:<?php echo esc_attr($office['email']); ?>">
                        <?php echo esc_html($office['email']); ?>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="p-6 rounded-2xl bg-card border border-border">
            <div class="flex items-start gap-4">
              <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center shrink-0">
                <?php echo scls_logistics_render_icon('clock', 24); ?>
              </div>
              <div>
                <h3 class="font-semibold text-foreground mb-2"><?php esc_html_e('Business Hours', 'scls-logistics'); ?></h3>
                <div class="space-y-1 text-sm text-muted-foreground">
                  <p><?php esc_html_e('Sunday - Thursday: 8:00 AM - 6:00 PM', 'scls-logistics'); ?></p>
                  <p><?php esc_html_e('Friday - Saturday: Closed', 'scls-logistics'); ?></p>
                  <p class="text-accent font-medium mt-2"><?php esc_html_e('24/7 Emergency Support Available', 'scls-logistics'); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 bg-surface-sunken">
    <div class="container mx-auto px-4 lg:px-8">
      <h2 class="text-2xl font-bold text-foreground mb-6 text-center"><?php esc_html_e('Find Us', 'scls-logistics'); ?></h2>
      <div class="aspect-[21/9] rounded-2xl bg-muted overflow-hidden border border-border">
        <div class="w-full h-full flex items-center justify-center text-muted-foreground">
          <?php echo scls_logistics_render_icon('map-pin', 32, 'is-current'); ?>
          <span class="text-lg"><?php esc_html_e('Map Integration Placeholder', 'scls-logistics'); ?></span>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
