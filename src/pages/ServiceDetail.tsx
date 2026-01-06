import { useParams, Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { Layout } from '@/components/layout/Layout';
import { Button } from '@/components/ui/button';
import { 
  Plane, Ship, Truck, FileCheck, Warehouse, BarChart3, 
  ArrowRight, CheckCircle2, Globe, Shield, Clock, Users 
} from 'lucide-react';

const servicesData: Record<string, {
  icon: React.ElementType;
  title: string;
  subtitle: string;
  overview: string;
  servicesOffered: string[];
  whySCLS: string[];
  ctaText: string;
}> = {
  'air-freight': {
    icon: Plane,
    title: 'Air Freight Services',
    subtitle: 'Fast, reliable air cargo solutions for time-sensitive shipments worldwide.',
    overview: 'SCLS provides comprehensive air freight services designed to meet your most demanding delivery timelines. Our IATA-certified operations ensure safe handling of all cargo types, including dangerous goods and temperature-sensitive pharmaceuticals. From express shipments to full charter flights, we optimize every route for speed and cost efficiency.',
    servicesOffered: [
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
    ],
    whySCLS: [
      'Priority uplift & space protection',
      'Regulatory-ready documentation',
      '24/7 shipment monitoring',
      'Zero-delay execution for mission-critical cargo',
    ],
    ctaText: 'Request Air Freight Quote',
  },
  'sea-freight': {
    icon: Ship,
    title: 'Sea Freight Services',
    subtitle: 'Cost-effective ocean freight solutions for global trade.',
    overview: 'Our sea freight services provide reliable and cost-efficient ocean cargo solutions for businesses of all sizes. Whether you need FCL or LCL shipments, reefer cargo for temperature-sensitive goods, or specialized project logistics, our carrier-neutral approach ensures optimal routing and competitive rates.',
    servicesOffered: [
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
    ],
    whySCLS: [
      'Carrier-neutral routing for best rates',
      'Optimized cost & transit times',
      'Full port compliance expertise',
      'Dedicated account management',
    ],
    ctaText: 'Request Sea Freight Quote',
  },
  'land-transportation': {
    icon: Truck,
    title: 'Land Transportation Services',
    subtitle: 'Comprehensive ground logistics across Saudi Arabia and the GCC.',
    overview: 'SCLS offers end-to-end land transportation services covering all of Saudi Arabia and the wider GCC region. Our fleet and partner network ensure reliable FTL and LTL deliveries, temperature-controlled transport, and specialized handling for oversized and dangerous goods cargo.',
    servicesOffered: [
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
    ],
    whySCLS: [
      'Regulatory-compliant routes',
      'Transit time optimization',
      'SLA-driven delivery performance',
      'Real-time GPS tracking',
    ],
    ctaText: 'Request Land Transport Quote',
  },
  'customs-clearance': {
    icon: FileCheck,
    title: 'Customs Clearance & Trade Compliance',
    subtitle: 'Licensed Saudi customs brokerage with full government platform integration.',
    overview: 'Navigate the complexities of Saudi customs regulations with confidence. Our licensed customs brokers are fully integrated with FASAH, SABER, SFDA, GACA, TGA, and WASHAJ systems, ensuring smooth and compliant clearance for all your imports and exports.',
    servicesOffered: [
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
    ],
    whySCLS: [
      'Deep regulatory expertise',
      'Direct government portal access',
      'Minimal clearance delays',
      'Proactive compliance monitoring',
    ],
    ctaText: 'Request Clearance Support',
  },
  'warehousing': {
    icon: Warehouse,
    title: 'Warehousing & 3PL Services',
    subtitle: 'Strategic storage solutions with value-added logistics.',
    overview: 'Our warehousing and 3PL services provide flexible, scalable storage solutions integrated with transport and customs operations. From bonded warehousing to temperature-controlled facilities, we offer comprehensive inventory management and fulfillment services.',
    servicesOffered: [
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
    ],
    whySCLS: [
      'Strategic locations across KSA',
      'Scalable capacity on demand',
      'Integrated with transport & customs',
      'Real-time inventory visibility',
    ],
    ctaText: 'Request Warehousing Solution',
  },
  'control-tower': {
    icon: BarChart3,
    title: 'Supply Chain Control Tower',
    subtitle: 'End-to-end visibility and proactive exception management.',
    overview: 'Our Supply Chain Control Tower provides a single point of visibility and control across your entire logistics operation. Real-time tracking, proactive exception management, and SLA-driven performance reporting ensure predictable outcomes and data-driven decision making.',
    servicesOffered: [
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
    ],
    whySCLS: [
      'Single point of accountability',
      'Data-driven decision support',
      'Predictable supply chain outcomes',
      'Proactive issue resolution',
    ],
    ctaText: 'Explore Control Tower Solutions',
  },
};

const benefitIcons = [Globe, Shield, Clock, Users];

const ServiceDetail = () => {
  const { slug } = useParams<{ slug: string }>();
  const service = slug ? servicesData[slug] : null;

  if (!service) {
    return (
      <Layout>
        <div className="min-h-screen flex items-center justify-center">
          <div className="text-center">
            <h1 className="text-2xl font-bold text-foreground mb-4">Service Not Found</h1>
            <Button asChild>
              <Link to="/services">View All Services</Link>
            </Button>
          </div>
        </div>
      </Layout>
    );
  }

  const ServiceIcon = service.icon;

  return (
    <Layout>
      {/* Hero Section */}
      <section className="relative pt-32 pb-20 bg-primary overflow-hidden">
        <div className="absolute inset-0 pattern-grid opacity-20" />
        <div className="container mx-auto px-4 lg:px-8 relative z-10">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
            className="max-w-3xl"
          >
            <Link
              to="/services"
              className="inline-flex items-center gap-2 text-primary-foreground/70 hover:text-primary-foreground mb-6 transition-colors"
            >
              ← Back to Services
            </Link>
            <div className="flex items-center gap-4 mb-6">
              <div className="w-16 h-16 rounded-xl bg-accent/20 flex items-center justify-center">
                <ServiceIcon className="w-8 h-8 text-accent" />
              </div>
              <h1 className="text-4xl md:text-5xl font-bold text-primary-foreground">
                {service.title}
              </h1>
            </div>
            <p className="text-xl text-primary-foreground/80 leading-relaxed mb-8">
              {service.subtitle}
            </p>
            <Button variant="hero" size="lg" asChild>
              <Link to="/contact">{service.ctaText}</Link>
            </Button>
          </motion.div>
        </div>
      </section>

      {/* Overview Section */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="max-w-3xl">
            <motion.div
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6 }}
            >
              <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-6">Overview</h2>
              <p className="text-lg text-muted-foreground leading-relaxed">
                {service.overview}
              </p>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Services Offered Section */}
      <section className="py-20 bg-surface-sunken">
        <div className="container mx-auto px-4 lg:px-8">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
          >
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-10">Services Offered</h2>
            <div className="grid md:grid-cols-2 gap-4">
              {service.servicesOffered.map((item, index) => (
                <motion.div
                  key={item}
                  initial={{ opacity: 0, x: -20 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true }}
                  transition={{ duration: 0.4, delay: index * 0.05 }}
                  className="flex items-start gap-3 p-4 rounded-xl bg-card border border-border"
                >
                  <CheckCircle2 className="w-5 h-5 text-accent mt-0.5 shrink-0" />
                  <span className="text-foreground">{item}</span>
                </motion.div>
              ))}
            </div>
          </motion.div>
        </div>
      </section>

      {/* Why SCLS Section */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 lg:px-8">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
          >
            <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-10">Why Choose SCLS</h2>
            <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
              {service.whySCLS.map((item, index) => {
                const Icon = benefitIcons[index % benefitIcons.length];
                return (
                  <motion.div
                    key={item}
                    initial={{ opacity: 0, y: 20 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true }}
                    transition={{ duration: 0.4, delay: index * 0.1 }}
                    className="p-6 rounded-2xl bg-card border border-border shadow-card text-center"
                  >
                    <div className="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
                      <Icon className="w-6 h-6 text-accent" />
                    </div>
                    <p className="font-medium text-foreground">{item}</p>
                  </motion.div>
                );
              })}
            </div>
          </motion.div>
        </div>
      </section>

      {/* CTA Band */}
      <section className="py-16 bg-accent">
        <div className="container mx-auto px-4 lg:px-8 text-center">
          <h2 className="text-2xl md:text-3xl font-bold text-accent-foreground mb-4">
            Ready to Get Started?
          </h2>
          <p className="text-accent-foreground/80 mb-8 max-w-2xl mx-auto">
            Contact our team today to discuss your {service.title.toLowerCase()} requirements.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button variant="default" size="lg" asChild>
              <Link to="/contact">{service.ctaText}</Link>
            </Button>
            <Button variant="outline" size="lg" className="border-accent-foreground/30 text-accent-foreground hover:bg-accent-foreground/10" asChild>
              <Link to="/services">View All Services</Link>
            </Button>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default ServiceDetail;
