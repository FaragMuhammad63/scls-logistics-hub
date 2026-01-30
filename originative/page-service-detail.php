<?php
/*
Template Name: Service Detail
*/

if (!defined('ABSPATH')) {
  exit;
}

$slug = get_post_field('post_name', get_the_ID());
$services = array(
  'air-freight' => array(
    'title' => 'Air Freight Services',
    'subtitle' => 'Fast, reliable air cargo solutions for time-sensitive shipments worldwide.',
    'overview' => 'SCLS provides comprehensive air freight services designed to meet your most demanding delivery timelines. Our IATA-certified operations ensure safe handling of all cargo types, including dangerous goods and temperature-sensitive pharmaceuticals. From express shipments to full charter flights, we optimize every route for speed and cost efficiency.',
    'services' => array(
      'Import & export air freight',
      'Express and time-definite shipments',
      'Pharmaceutical & cold chain logistics',
      'Dangerous goods handling (IATA-certified)',
      'Aerospace & aviation components',
      'Charter flights (full & part)',
      'Airport-to-airport and door-to-door delivery',
      'Consolidation & deconsolidation',
      'Customs pre-clearance coordination',
      'Cargo insurance support',
    ),
    'why' => array(
      'Priority uplift & space protection',
      'Regulatory-ready documentation',
      '24/7 shipment monitoring',
      'Zero-delay execution for mission-critical cargo',
    ),
    'cta' => 'Request Air Freight Quote',
  ),
  'sea-freight' => array(
    'title' => 'Sea Freight Services',
    'subtitle' => 'Cost-effective ocean freight solutions for global trade.',
    'overview' => 'Our sea freight services provide reliable and cost-efficient ocean cargo solutions for businesses of all sizes. Whether you need FCL or LCL shipments, reefer cargo for temperature-sensitive goods, or specialized project logistics, our carrier-neutral approach ensures optimal routing and competitive rates.',
    'services' => array(
      'Full Container Load (FCL) shipments',
      'Less than Container Load (LCL) consolidation',
      'Reefer container services',
      'Project & breakbulk cargo',
      "Buyer's consolidation services",
      'Carrier contract optimization',
      'Demurrage & detention management',
      'Marine cargo insurance',
      'Port-to-port and door-to-door delivery',
      'Real-time container tracking',
    ),
    'why' => array(
      'Carrier-neutral routing for best rates',
      'Optimized cost & transit times',
      'Full port compliance expertise',
      'Dedicated account management',
    ),
    'cta' => 'Request Sea Freight Quote',
  ),
  'land-transportation' => array(
    'title' => 'Land Transportation Services',
    'subtitle' => 'Comprehensive ground logistics across Saudi Arabia and the GCC.',
    'overview' => 'SCLS offers end-to-end land transportation services covering all of Saudi Arabia and the wider GCC region. Our fleet and partner network ensure reliable FTL and LTL deliveries, temperature-controlled transport, and specialized handling for oversized and dangerous goods cargo.',
    'services' => array(
      'Domestic trucking (KSA nationwide)',
      'GCC cross-border transport',
      'Full Truckload (FTL) services',
      'Less than Truckload (LTL) services',
      'Temperature-controlled trucking',
      'Dangerous goods road transport',
      'Oversized & project cargo',
      'Port drayage & container haulage',
      'First/last mile delivery',
      'Border clearance coordination',
    ),
    'why' => array(
      'Regulatory-compliant routes',
      'Transit time optimization',
      'SLA-driven delivery performance',
      'Real-time GPS tracking',
    ),
    'cta' => 'Request Land Transport Quote',
  ),
  'customs-clearance' => array(
    'title' => 'Customs Clearance & Trade Compliance',
    'subtitle' => 'Licensed Saudi customs brokerage with full government platform integration.',
    'overview' => 'Navigate the complexities of Saudi customs regulations with confidence. Our licensed customs brokers are fully integrated with FASAH, SABER, SFDA, GACA, TGA, and WASHAJ systems, ensuring smooth and compliant clearance for all your imports and exports.',
    'services' => array(
      'Import & export customs clearance',
      'FASAH Single Window integration',
      'SABER product certification coordination',
      'SFDA food & drug clearance',
      'GACA aviation cargo compliance',
      'TGA transport authority coordination',
      'WASHAJ chemicals management',
      'HS classification & tariff advisory',
      'Customs valuation support',
      'Pre-clearance document review',
    ),
    'why' => array(
      'Deep regulatory expertise',
      'Direct government portal access',
      'Minimal clearance delays',
      'Proactive compliance monitoring',
    ),
    'cta' => 'Request Clearance Support',
  ),
  'warehousing' => array(
    'title' => 'Warehousing & 3PL Services',
    'subtitle' => 'Strategic storage solutions with value-added logistics.',
    'overview' => 'Our warehousing and 3PL services provide flexible, scalable storage solutions integrated with transport and customs operations. From bonded warehousing to temperature-controlled facilities, we offer comprehensive inventory management and fulfillment services.',
    'services' => array(
      'Bonded & non-bonded storage',
      'Temperature-controlled warehousing',
      'Inventory management systems',
      'Labeling, packing & kitting',
      'Order fulfillment services',
      'Distribution support',
      'Cross-docking operations',
      'Quality inspection services',
      'Reverse logistics handling',
      'Dedicated & shared warehouse options',
    ),
    'why' => array(
      'Strategic locations across KSA',
      'Scalable capacity on demand',
      'Integrated with transport & customs',
      'Real-time inventory visibility',
    ),
    'cta' => 'Request Warehousing Solution',
  ),
  'control-tower' => array(
    'title' => 'Supply Chain Control Tower',
    'subtitle' => 'End-to-end visibility and proactive exception management.',
    'overview' => 'Our Supply Chain Control Tower provides a single point of visibility and control across your entire logistics operation. Real-time tracking, proactive exception management, and SLA-driven performance reporting ensure predictable outcomes and data-driven decision making.',
    'services' => array(
      'Real-time shipment tracking',
      'Exception management & escalation',
      'KPI & SLA performance reporting',
      'Multi-vendor coordination',
      'Dedicated account management',
      'Customized dashboard access',
      'Predictive analytics',
      'Carrier performance benchmarking',
      'Cost optimization analysis',
      'Integration with client ERP/WMS',
    ),
    'why' => array(
      'Single point of accountability',
      'Data-driven decision support',
      'Predictable supply chain outcomes',
      'Proactive issue resolution',
    ),
    'cta' => 'Explore Control Tower Solutions',
  ),
);

$service = isset($services[$slug]) ? $services[$slug] : null;

get_header();
?>
<main class="site-main">
  <?php if (!$service) : ?>
    <section class="min-h-screen flex items-center justify-center">
      <div class="text-center">
        <h1 class="text-2xl font-bold text-foreground mb-4"><?php esc_html_e('Service Not Found', 'scls-logistics'); ?></h1>
        <a href="<?php echo esc_url(home_url('/services/')); ?>" class="scls-button scls-button-accent">
          <?php esc_html_e('View All Services', 'scls-logistics'); ?>
        </a>
      </div>
    </section>
  <?php else : ?>
    <section class="relative pt-32 pb-20 bg-primary overflow-hidden">
      <div class="absolute inset-0 pattern-grid opacity-20"></div>
      <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-3xl">
          <a href="<?php echo esc_url(home_url('/services/')); ?>" class="inline-flex items-center gap-2 text-primary-foreground/70 hover:text-primary-foreground mb-6 transition-colors">
            <?php echo scls_logistics_render_icon('arrow-left', 16, 'is-current'); ?>
            <?php esc_html_e('Back to Services', 'scls-logistics'); ?>
          </a>
          <h1 class="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
            <?php echo esc_html($service['title']); ?>
          </h1>
          <p class="text-xl text-primary-foreground/80 leading-relaxed mb-8">
            <?php echo esc_html($service['subtitle']); ?>
          </p>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="scls-button scls-button-accent px-8 py-3">
            <?php echo esc_html($service['cta']); ?>
          </a>
        </div>
      </div>
    </section>

    <section class="py-20 bg-background">
      <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl">
          <h2 class="text-2xl md:text-3xl font-bold text-foreground mb-6"><?php esc_html_e('Overview', 'scls-logistics'); ?></h2>
          <p class="text-lg text-muted-foreground leading-relaxed">
            <?php echo esc_html($service['overview']); ?>
          </p>
        </div>
      </div>
    </section>

    <section class="py-20 bg-surface-sunken">
      <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-foreground mb-10"><?php esc_html_e('Services Offered', 'scls-logistics'); ?></h2>
        <div class="grid md:grid-cols-2 gap-4">
          <?php foreach ($service['services'] as $item) : ?>
            <div class="flex items-start gap-3 p-4 rounded-xl bg-card border border-border">
              <?php echo scls_logistics_render_icon('check-circle-2', 20); ?>
              <span class="text-foreground"><?php echo esc_html($item); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="py-20 bg-background">
      <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-foreground mb-10"><?php esc_html_e('Why Choose SCLS', 'scls-logistics'); ?></h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <?php foreach ($service['why'] as $item) : ?>
            <div class="p-6 rounded-2xl bg-card border border-border shadow-card text-center">
              <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
                <?php echo scls_logistics_render_icon('star', 20); ?>
              </div>
              <p class="font-medium text-foreground"><?php echo esc_html($item); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="py-16 bg-accent">
      <div class="container mx-auto px-4 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-accent-foreground mb-4">
          <?php esc_html_e('Ready to Get Started?', 'scls-logistics'); ?>
        </h2>
        <p class="text-accent-foreground/80 mb-8 max-w-2xl mx-auto">
          <?php echo esc_html(sprintf(__('Contact our team today to discuss your %s requirements.', 'scls-logistics'), strtolower($service['title']))); ?>
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="scls-button px-8 py-3">
            <?php echo esc_html($service['cta']); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/services/')); ?>" class="scls-button px-8 py-3">
            <?php esc_html_e('View All Services', 'scls-logistics'); ?>
          </a>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>
<?php
get_footer();
