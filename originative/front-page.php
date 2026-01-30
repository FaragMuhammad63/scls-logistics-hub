<?php

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>
<main class="site-main">
  <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 gradient-hero"></div>
    <div class="absolute inset-0 pattern-grid opacity-50"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-primary/50"></div>
    <div class="absolute top-1/4 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 left-0 w-80 h-80 bg-accent/5 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10 pt-20">
      <div class="max-w-4xl mx-auto text-center">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/20 text-accent text-sm font-medium mb-6">
          <?php esc_html_e('Premier Logistics Partner in Saudi Arabia', 'scls-logistics'); ?>
        </span>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary-foreground leading-tight mb-6">
          <?php esc_html_e('Your Strategic Partner in', 'scls-logistics'); ?>
          <span class="text-accent"> <?php esc_html_e('Freight & Logistics', 'scls-logistics'); ?></span>
          <?php esc_html_e('Excellence', 'scls-logistics'); ?>
        </h1>
        <p class="text-lg md:text-xl text-primary-foreground/80 max-w-3xl mx-auto mb-10 leading-relaxed">
          <?php esc_html_e('Integrated freight forwarding, customs clearance, warehousing, and control tower operations across Saudi Arabia, the GCC, and global trade corridors.', 'scls-logistics'); ?>
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="scls-button scls-button-accent px-8 py-3 text-base">
            <?php esc_html_e('Request Quote', 'scls-logistics'); ?>
          </a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="scls-button px-8 py-3 text-base">
            <?php esc_html_e('Contact Us', 'scls-logistics'); ?>
          </a>
          <a href="tel:+966XXXXXXXX" class="flex items-center gap-2 px-6 py-3 text-primary-foreground/80 hover:text-primary-foreground transition-colors">
            <?php echo scls_logistics_render_icon('phone', 20, 'is-current'); ?>
            <span class="font-medium"><?php esc_html_e('Call Us', 'scls-logistics'); ?></span>
          </a>
        </div>
          <div class="flex flex-wrap items-center justify-center gap-4">
            <div class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10">
              <?php echo scls_logistics_render_icon('zap', 16); ?>
              <span class="text-sm font-medium text-primary-foreground"><?php esc_html_e('Fast Clearance', 'scls-logistics'); ?></span>
            </div>
            <div class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10">
              <?php echo scls_logistics_render_icon('eye', 16); ?>
              <span class="text-sm font-medium text-primary-foreground"><?php esc_html_e('End-to-End Visibility', 'scls-logistics'); ?></span>
            </div>
            <div class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10">
              <?php echo scls_logistics_render_icon('shield', 16); ?>
              <span class="text-sm font-medium text-primary-foreground"><?php esc_html_e('Saudi Compliance', 'scls-logistics'); ?></span>
            </div>
          </div>
      </div>
    </div>
  </section>

  <section id="about" class="py-24 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <div>
          <span class="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
            <?php esc_html_e('About SCLS', 'scls-logistics'); ?>
          </span>
          <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-6">
            <?php esc_html_e('Who We Are', 'scls-logistics'); ?>
          </h2>
          <p class="text-muted-foreground text-lg leading-relaxed mb-6">
            <?php esc_html_e('Speed & Creativity for Logistics Services (SCLS) is a Saudi-based logistics provider specializing in seamless freight movement, customs clearance, and supply chain execution for enterprises, government entities, and high-growth businesses.', 'scls-logistics'); ?>
          </p>
          <p class="text-muted-foreground text-lg leading-relaxed">
            <?php esc_html_e('We operate as a single-point logistics control tower, integrating freight forwarding, regulatory compliance, domestic distribution, and real-time visibility.', 'scls-logistics'); ?>
          </p>
        </div>
        <div class="relative">
          <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-navy to-navy-light overflow-hidden shadow-xl">
            <div class="absolute inset-0 pattern-dots opacity-30"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-center text-primary-foreground/80 p-8">
                <div class="mb-4"><?php echo scls_logistics_render_icon('globe', 64); ?></div>
                <p class="text-lg font-medium"><?php esc_html_e('Global Logistics Excellence', 'scls-logistics'); ?></p>
              </div>
            </div>
          </div>
          <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-accent/20 rounded-2xl -z-10"></div>
        </div>
      </div>

      <div class="grid md:grid-cols-3 gap-6 mt-16">
        <div class="group p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1">
          <div class="w-14 h-14 rounded-xl bg-accent/10 flex items-center justify-center mb-5 group-hover:bg-accent/20 transition-colors">
            <?php echo scls_logistics_render_icon('target', 28); ?>
          </div>
          <h3 class="text-xl font-semibold text-foreground mb-3"><?php esc_html_e('Our Mission', 'scls-logistics'); ?></h3>
          <p class="text-muted-foreground leading-relaxed"><?php esc_html_e('Deliver seamless, reliable logistics solutions that empower businesses to move goods efficiently across borders.', 'scls-logistics'); ?></p>
        </div>
        <div class="group p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1">
          <div class="w-14 h-14 rounded-xl bg-accent/10 flex items-center justify-center mb-5 group-hover:bg-accent/20 transition-colors">
            <?php echo scls_logistics_render_icon('eye', 28); ?>
          </div>
          <h3 class="text-xl font-semibold text-foreground mb-3"><?php esc_html_e('Our Vision', 'scls-logistics'); ?></h3>
          <p class="text-muted-foreground leading-relaxed"><?php esc_html_e('To be the leading logistics partner in the GCC, known for innovation, integrity, and operational excellence.', 'scls-logistics'); ?></p>
        </div>
        <div class="group p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1">
          <div class="w-14 h-14 rounded-xl bg-accent/10 flex items-center justify-center mb-5 group-hover:bg-accent/20 transition-colors">
            <?php echo scls_logistics_render_icon('globe', 28); ?>
          </div>
          <h3 class="text-xl font-semibold text-foreground mb-3"><?php esc_html_e('Our Coverage', 'scls-logistics'); ?></h3>
          <p class="text-muted-foreground leading-relaxed"><?php esc_html_e('Saudi Arabia, GCC, Middle East, and global trade corridors spanning Asia, Europe, Africa, and the Americas.', 'scls-logistics'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="py-24 bg-surface-sunken">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
          <?php esc_html_e('What We Offer', 'scls-logistics'); ?>
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4"><?php esc_html_e('Core Services', 'scls-logistics'); ?></h2>
        <p class="text-muted-foreground text-lg"><?php esc_html_e('Comprehensive logistics solutions tailored to your business needs, from freight forwarding to supply chain visibility.', 'scls-logistics'); ?></p>
      </div>

      <div class="grid md:grid-cols-2 gap-6">
        <a href="<?php echo esc_url(home_url('/services/air-freight')); ?>" class="group block p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
          <div class="flex items-start gap-5">
            <div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:bg-navy-light transition-colors">
              <?php echo scls_logistics_render_icon('plane', 32); ?>
            </div>
            <div class="flex-1">
              <h3 class="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors"><?php esc_html_e('Freight Forwarding', 'scls-logistics'); ?></h3>
              <p class="text-muted-foreground leading-relaxed mb-4"><?php esc_html_e('Air, sea, and land freight solutions optimized for speed, cost, and regulatory compliance.', 'scls-logistics'); ?></p>
              <span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                <?php esc_html_e('Learn More', 'scls-logistics'); ?>
                <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
              </span>
            </div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/services/customs-clearance')); ?>" class="group block p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
          <div class="flex items-start gap-5">
            <div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:bg-navy-light transition-colors">
              <?php echo scls_logistics_render_icon('file-check', 32); ?>
            </div>
            <div class="flex-1">
              <h3 class="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors"><?php esc_html_e('Customs Clearance & Compliance', 'scls-logistics'); ?></h3>
              <p class="text-muted-foreground leading-relaxed mb-4"><?php esc_html_e('Licensed Saudi customs brokerage with full integration into FASAH, SABER, SFDA, GACA, and TGA.', 'scls-logistics'); ?></p>
              <span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                <?php esc_html_e('Learn More', 'scls-logistics'); ?>
                <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
              </span>
            </div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/services/warehousing')); ?>" class="group block p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
          <div class="flex items-start gap-5">
            <div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:bg-navy-light transition-colors">
              <?php echo scls_logistics_render_icon('warehouse', 32); ?>
            </div>
            <div class="flex-1">
              <h3 class="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors"><?php esc_html_e('Warehousing & Fulfillment', 'scls-logistics'); ?></h3>
              <p class="text-muted-foreground leading-relaxed mb-4"><?php esc_html_e('Strategically located storage, 3PL services, and value-added logistics.', 'scls-logistics'); ?></p>
              <span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                <?php esc_html_e('Learn More', 'scls-logistics'); ?>
                <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
              </span>
            </div>
          </div>
        </a>

        <a href="<?php echo esc_url(home_url('/services/control-tower')); ?>" class="group block p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 h-full">
          <div class="flex items-start gap-5">
            <div class="w-16 h-16 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:bg-navy-light transition-colors">
              <?php echo scls_logistics_render_icon('bar-chart-3', 32); ?>
            </div>
            <div class="flex-1">
              <h3 class="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors"><?php esc_html_e('Supply Chain Control Tower', 'scls-logistics'); ?></h3>
              <p class="text-muted-foreground leading-relaxed mb-4"><?php esc_html_e('End-to-end visibility, exception management, and SLA-driven performance reporting.', 'scls-logistics'); ?></p>
              <span class="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                <?php esc_html_e('Learn More', 'scls-logistics'); ?>
                <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
              </span>
            </div>
          </div>
        </a>
      </div>

      <div class="text-center mt-12">
        <a href="<?php echo esc_url(home_url('/services/')); ?>" class="scls-button scls-button-accent px-8 py-3">
          <?php esc_html_e('Explore All Services', 'scls-logistics'); ?>
          <?php echo scls_logistics_render_icon('arrow-right', 16); ?>
        </a>
      </div>
    </div>
  </section>

  <section id="industries" class="py-24 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
          <?php esc_html_e('Sector Expertise', 'scls-logistics'); ?>
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4"><?php esc_html_e('Industries We Serve', 'scls-logistics'); ?></h2>
        <p class="text-muted-foreground text-lg"><?php esc_html_e('Tailored logistics solutions for diverse sectors, each with unique regulatory requirements and operational challenges.', 'scls-logistics'); ?></p>
      </div>

          <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        <?php
          $industries = array(
            array('label' => 'Manufacturing & Industrial', 'icon' => 'factory'),
            array('label' => 'Retail & Consumer Goods', 'icon' => 'shopping-bag'),
            array('label' => 'Pharmaceuticals & Healthcare', 'icon' => 'heart-pulse'),
            array('label' => 'Aviation & Aerospace', 'icon' => 'plane'),
            array('label' => 'Automotive', 'icon' => 'car'),
            array('label' => 'Energy & Petrochemicals', 'icon' => 'zap'),
            array('label' => 'Construction & Infrastructure', 'icon' => 'building-2'),
            array('label' => 'Food & Agriculture', 'icon' => 'wheat'),
            array('label' => 'Technology & Electronics', 'icon' => 'cpu'),
            array('label' => 'Textiles & Fashion', 'icon' => 'shirt'),
            array('label' => 'Government & Defense', 'icon' => 'shield'),
            array('label' => 'Education & Non-Profit', 'icon' => 'graduation-cap'),
            array('label' => 'SMEs & Startups', 'icon' => 'briefcase'),
          );
          foreach ($industries as $industry) :
        ?>
          <div class="group p-5 rounded-xl bg-card border border-border hover:border-accent/30 hover:shadow-card transition-all duration-300 text-center">
            <div class="w-12 h-12 rounded-lg bg-secondary mx-auto mb-3 flex items-center justify-center group-hover:bg-accent/10 transition-colors text-muted-foreground group-hover:text-accent">
              <?php echo scls_logistics_render_icon($industry['icon'], 24, 'is-current'); ?>
            </div>
            <p class="text-sm font-medium text-foreground"><?php echo esc_html($industry['label']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="why-scls" class="py-24 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 pattern-grid opacity-20"></div>
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/20 text-accent text-sm font-medium mb-4">
          <?php esc_html_e('Our Advantage', 'scls-logistics'); ?>
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-primary-foreground mb-4"><?php esc_html_e('Why Choose SCLS', 'scls-logistics'); ?></h2>
        <p class="text-primary-foreground/70 text-lg"><?php esc_html_e('We combine global expertise with local knowledge to deliver logistics excellence that drives your business forward.', 'scls-logistics'); ?></p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
          $reasons = array(
            array('title' => 'Global Reach', 'desc' => 'Extensive network spanning Saudi Arabia, GCC, Middle East, and major global trade corridors.', 'icon' => 'globe'),
            array('title' => 'Technology-Driven Efficiency', 'desc' => 'Advanced tracking systems, EDI integration, and real-time visibility platforms.', 'icon' => 'cpu'),
            array('title' => 'Client-Centric Solutions', 'desc' => 'Customized logistics strategies designed around your specific business requirements.', 'icon' => 'users'),
            array('title' => 'Regulatory Expertise', 'desc' => 'Deep knowledge of Saudi and international trade regulations, customs procedures, and compliance requirements.', 'icon' => 'file-check'),
            array('title' => 'Vision 2030 Alignment', 'desc' => "Supporting Saudi Arabia's economic transformation through world-class logistics infrastructure.", 'icon' => 'landmark'),
          );
          foreach ($reasons as $reason) :
        ?>
          <div class="group p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-all duration-300">
            <div class="w-14 h-14 rounded-xl bg-accent/20 flex items-center justify-center mb-5 group-hover:bg-accent/30 transition-colors">
              <?php echo scls_logistics_render_icon($reason['icon'], 28); ?>
            </div>
            <h3 class="text-xl font-semibold text-primary-foreground mb-3"><?php echo esc_html($reason['title']); ?></h3>
            <p class="text-primary-foreground/70 leading-relaxed"><?php echo esc_html($reason['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="accreditations" class="py-24 bg-surface-sunken">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        <div class="p-8 rounded-2xl bg-card border border-border shadow-card text-center">
          <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
            <?php echo scls_logistics_render_icon('package', 24); ?>
          </div>
          <span class="text-4xl md:text-5xl font-bold text-foreground" data-scls-counter data-value="10000">0</span>
          <span class="text-4xl md:text-5xl font-bold text-foreground">+</span>
          <p class="text-muted-foreground text-sm mt-2"><?php esc_html_e('Shipments Handled', 'scls-logistics'); ?></p>
        </div>
        <div class="p-8 rounded-2xl bg-card border border-border shadow-card text-center">
          <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
            <?php echo scls_logistics_render_icon('clock', 24); ?>
          </div>
          <span class="text-4xl md:text-5xl font-bold text-foreground" data-scls-counter data-value="24">0</span>
          <span class="text-4xl md:text-5xl font-bold text-foreground">hrs</span>
          <p class="text-muted-foreground text-sm mt-2"><?php esc_html_e('Average Clearance Time', 'scls-logistics'); ?></p>
        </div>
        <div class="p-8 rounded-2xl bg-card border border-border shadow-card text-center">
          <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
            <?php echo scls_logistics_render_icon('map-pin', 24); ?>
          </div>
          <span class="text-4xl md:text-5xl font-bold text-foreground" data-scls-counter data-value="50">0</span>
          <span class="text-4xl md:text-5xl font-bold text-foreground">+</span>
          <p class="text-muted-foreground text-sm mt-2"><?php esc_html_e('Countries Covered', 'scls-logistics'); ?></p>
        </div>
        <div class="p-8 rounded-2xl bg-card border border-border shadow-card text-center">
          <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
            <?php echo scls_logistics_render_icon('thumbs-up', 24); ?>
          </div>
          <span class="text-4xl md:text-5xl font-bold text-foreground" data-scls-counter data-value="98">0</span>
          <span class="text-4xl md:text-5xl font-bold text-foreground">%</span>
          <p class="text-muted-foreground text-sm mt-2"><?php esc_html_e('Client Satisfaction', 'scls-logistics'); ?></p>
        </div>
      </div>

      <div class="p-6 rounded-2xl bg-primary mb-16">
        <p class="text-center text-primary-foreground font-medium text-lg">
          <?php echo scls_logistics_render_icon('sparkles', 18); ?>
          <?php esc_html_e('Digital Integration with Customs Single Window & EDI Systems', 'scls-logistics'); ?>
        </p>
      </div>

      <div class="grid lg:grid-cols-2 gap-8 mb-16">
        <div class="p-8 rounded-2xl bg-card border border-border shadow-card">
          <h3 class="text-xl font-semibold text-foreground mb-6"><?php esc_html_e('Accreditations', 'scls-logistics'); ?></h3>
          <div class="flex flex-wrap gap-3">
            <?php
              $accreditations = array(
                'IATA Cargo Agent Accreditation',
                'FIATA Membership',
                'ISO 9001',
                'IATA DGR Certified Staff',
                'Dangerous Goods Transport License',
                'Cargo Insurance Provider Registration',
              );
              foreach ($accreditations as $item) :
            ?>
              <span class="px-4 py-2 rounded-full bg-secondary text-secondary-foreground text-sm font-medium"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="p-8 rounded-2xl bg-card border border-border shadow-card">
          <h3 class="text-xl font-semibold text-foreground mb-6"><?php esc_html_e('Regulatory Compliance', 'scls-logistics'); ?></h3>
          <div class="flex flex-wrap gap-3">
            <?php
              $regulatory = array('GACA', 'TGA', 'WASHAJ', 'FASAH', 'SABER', 'SFDA');
              foreach ($regulatory as $item) :
            ?>
              <span class="px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="text-center">
        <h3 class="text-xl font-semibold text-foreground mb-8"><?php esc_html_e('Our Partners', 'scls-logistics'); ?></h3>
        <div class="flex flex-wrap justify-center gap-6">
          <?php
            $partners = array('KCTC', 'DHL', 'Aramex', 'Maersk', 'CMA', 'MSC', 'Turkish Airlines', 'Uzbekistan Airways', 'Akasa Air', 'Solitaire');
            foreach ($partners as $partner) :
          ?>
            <div class="px-8 py-4 rounded-xl bg-card border border-border text-muted-foreground font-medium hover:border-accent/30 transition-colors">
              <?php echo esc_html($partner); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="py-24 bg-background">
    <div class="container mx-auto px-4 lg:px-8">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
          <?php esc_html_e('Get Started', 'scls-logistics'); ?>
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-foreground mb-4"><?php esc_html_e('Ready to move your supply chain with confidence?', 'scls-logistics'); ?></h2>
        <p class="text-muted-foreground text-lg"><?php esc_html_e("Let's discuss how SCLS can optimize your logistics operations.", 'scls-logistics'); ?></p>
      </div>

      <div class="grid lg:grid-cols-2 gap-12">
        <div>
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

        <div class="flex flex-col justify-center">
          <div class="space-y-6 mb-8">
            <a href="tel:+966XXXXXXXX" class="flex items-center gap-4 p-5 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors group">
            <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center group-hover:bg-accent/20 transition-colors">
              <?php echo scls_logistics_render_icon('phone', 24); ?>
            </div>
              <div>
                <p class="text-sm text-muted-foreground"><?php esc_html_e('Call Us', 'scls-logistics'); ?></p>
                <p class="font-semibold text-foreground">+966 XX XXX XXXX</p>
              </div>
            </a>
            <a href="mailto:info@scls.sa" class="flex items-center gap-4 p-5 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors group">
            <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center group-hover:bg-accent/20 transition-colors">
              <?php echo scls_logistics_render_icon('mail', 24); ?>
            </div>
              <div>
                <p class="text-sm text-muted-foreground"><?php esc_html_e('Email Us', 'scls-logistics'); ?></p>
                <p class="font-semibold text-foreground">info@scls.sa</p>
              </div>
            </a>
            <a href="https://wa.me/966XXXXXXXX" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 p-5 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors group">
            <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center group-hover:bg-accent/20 transition-colors">
              <?php echo scls_logistics_render_icon('message-circle', 24); ?>
            </div>
              <div>
                <p class="text-sm text-muted-foreground"><?php esc_html_e('WhatsApp', 'scls-logistics'); ?></p>
                <p class="font-semibold text-foreground"><?php esc_html_e('Chat with Us', 'scls-logistics'); ?></p>
              </div>
            </a>
            <div class="flex items-center gap-4 p-5 rounded-xl bg-card border border-border">
              <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center">
                <?php echo scls_logistics_render_icon('map-pin', 24); ?>
              </div>
              <div>
                <p class="text-sm text-muted-foreground"><?php esc_html_e('Visit Us', 'scls-logistics'); ?></p>
                <p class="font-semibold text-foreground"><?php esc_html_e('Riyadh, Saudi Arabia', 'scls-logistics'); ?></p>
              </div>
            </div>
          </div>

          <div class="aspect-video rounded-2xl bg-muted overflow-hidden border border-border">
            <div class="w-full h-full flex items-center justify-center text-muted-foreground">
              <?php echo scls_logistics_render_icon('map-pin', 32, 'is-current'); ?>
              <span><?php esc_html_e('Map Integration', 'scls-logistics'); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
get_footer();
