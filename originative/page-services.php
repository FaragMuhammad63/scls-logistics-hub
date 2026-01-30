<?php
/*
Template Name: Services
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
          <?php esc_html_e('Our Services', 'scls-logistics'); ?>
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
          <?php esc_html_e('Comprehensive Logistics Solutions', 'scls-logistics'); ?>
        </h1>
        <p class="text-xl text-primary-foreground/80 leading-relaxed">
          <?php esc_html_e('From freight forwarding to supply chain visibility, we provide end-to-end logistics services tailored to your business needs.', 'scls-logistics'); ?>
        </p>
      </div>
    </div>
  </section>

  <section class="py-24 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
          $services = array(
            array('title' => 'Air Freight Services', 'slug' => 'air-freight', 'desc' => 'Fast, reliable air cargo solutions for time-sensitive shipments. IATA-certified handling for dangerous goods and pharmaceutical cold chain logistics.', 'features' => array('Express Shipments', 'Cold Chain', 'Charter Flights', 'DG Handling'), 'icon' => 'plane'),
            array('title' => 'Sea Freight Services', 'slug' => 'sea-freight', 'desc' => 'Cost-effective ocean freight for FCL and LCL shipments. Full container services, reefer cargo, and project logistics worldwide.', 'features' => array('FCL/LCL', 'Reefer Cargo', 'Project Cargo', 'Consolidation'), 'icon' => 'ship'),
            array('title' => 'Land Transportation', 'slug' => 'land-transportation', 'desc' => 'Comprehensive ground logistics across Saudi Arabia and the GCC. FTL, LTL, and specialized transport for oversized cargo.', 'features' => array('KSA Nationwide', 'GCC Cross-Border', 'Temperature Control', 'Project Cargo'), 'icon' => 'truck'),
            array('title' => 'Customs Clearance & Compliance', 'slug' => 'customs-clearance', 'desc' => 'Licensed Saudi customs brokerage with seamless integration into all government platforms for efficient and compliant clearance.', 'features' => array('FASAH Integration', 'SABER Certified', 'SFDA Compliance', 'HS Classification'), 'icon' => 'file-check'),
            array('title' => 'Warehousing & 3PL', 'slug' => 'warehousing', 'desc' => 'Strategic warehousing solutions with value-added services. Bonded and non-bonded storage with inventory management.', 'features' => array('Bonded Storage', 'Fulfillment', 'Pick & Pack', 'Distribution'), 'icon' => 'warehouse'),
            array('title' => 'Supply Chain Control Tower', 'slug' => 'control-tower', 'desc' => 'End-to-end supply chain visibility with real-time tracking, exception management, and SLA-driven performance reporting.', 'features' => array('Real-Time Tracking', 'KPI Dashboards', 'Exception Mgmt', 'Dedicated Support'), 'icon' => 'bar-chart-3'),
          );
          foreach ($services as $service) :
        ?>
          <a href="<?php echo esc_url(home_url('/services/' . $service['slug'])); ?>" class="group block h-full p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-2">
            <div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center mb-6 group-hover:bg-navy-light transition-colors">
              <?php echo scls_logistics_render_icon($service['icon'], 32); ?>
            </div>
            <h3 class="text-xl font-semibold text-foreground mb-3 group-hover:text-accent transition-colors">
              <?php echo esc_html($service['title']); ?>
            </h3>
            <p class="text-muted-foreground leading-relaxed mb-6">
              <?php echo esc_html($service['desc']); ?>
            </p>
            <div class="flex flex-wrap gap-2 mb-6">
              <?php foreach ($service['features'] as $feature) : ?>
                <span class="px-3 py-1 rounded-full bg-secondary text-secondary-foreground text-xs font-medium">
                  <?php echo esc_html($feature); ?>
                </span>
              <?php endforeach; ?>
            </div>
            <span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
              <?php esc_html_e('Learn More', 'scls-logistics'); ?>
              <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="py-16 bg-accent">
    <div class="container mx-auto px-4 lg:px-8 text-center">
      <h2 class="text-2xl md:text-3xl font-bold text-accent-foreground mb-4">
        <?php esc_html_e('Need a Custom Logistics Solution?', 'scls-logistics'); ?>
      </h2>
      <p class="text-accent-foreground/80 mb-8 max-w-2xl mx-auto">
        <?php esc_html_e('Our team of experts will work with you to design a tailored solution that meets your specific requirements.', 'scls-logistics'); ?>
      </p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="scls-button px-8 py-3">
        <?php esc_html_e('Request a Consultation', 'scls-logistics'); ?>
      </a>
    </div>
  </section>
</main>
<?php
get_footer();
