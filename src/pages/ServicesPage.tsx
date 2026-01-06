import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import { Layout } from '@/components/layout/Layout';
import { Button } from '@/components/ui/button';
import { Plane, Ship, Truck, FileCheck, Warehouse, BarChart3, ArrowRight } from 'lucide-react';

const services = [
  {
    icon: Plane,
    title: 'Air Freight Services',
    slug: 'air-freight',
    description: 'Fast, reliable air cargo solutions for time-sensitive shipments. IATA-certified handling for dangerous goods and pharmaceutical cold chain logistics.',
    features: ['Express Shipments', 'Cold Chain', 'Charter Flights', 'DG Handling'],
  },
  {
    icon: Ship,
    title: 'Sea Freight Services',
    slug: 'sea-freight',
    description: 'Cost-effective ocean freight for FCL and LCL shipments. Full container services, reefer cargo, and project logistics worldwide.',
    features: ['FCL/LCL', 'Reefer Cargo', 'Project Cargo', 'Consolidation'],
  },
  {
    icon: Truck,
    title: 'Land Transportation',
    slug: 'land-transportation',
    description: 'Comprehensive ground logistics across Saudi Arabia and the GCC. FTL, LTL, and specialized transport for oversized cargo.',
    features: ['KSA Nationwide', 'GCC Cross-Border', 'Temperature Control', 'Project Cargo'],
  },
  {
    icon: FileCheck,
    title: 'Customs Clearance & Compliance',
    slug: 'customs-clearance',
    description: 'Licensed Saudi customs brokerage with seamless integration into all government platforms for efficient and compliant clearance.',
    features: ['FASAH Integration', 'SABER Certified', 'SFDA Compliance', 'HS Classification'],
  },
  {
    icon: Warehouse,
    title: 'Warehousing & 3PL',
    slug: 'warehousing',
    description: 'Strategic warehousing solutions with value-added services. Bonded and non-bonded storage with inventory management.',
    features: ['Bonded Storage', 'Fulfillment', 'Pick & Pack', 'Distribution'],
  },
  {
    icon: BarChart3,
    title: 'Supply Chain Control Tower',
    slug: 'control-tower',
    description: 'End-to-end supply chain visibility with real-time tracking, exception management, and SLA-driven performance reporting.',
    features: ['Real-Time Tracking', 'KPI Dashboards', 'Exception Mgmt', 'Dedicated Support'],
  },
];

const ServicesPage = () => {
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
            <span className="inline-block px-4 py-2 rounded-full bg-accent/20 text-accent text-sm font-medium mb-4">
              Our Services
            </span>
            <h1 className="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
              Comprehensive Logistics Solutions
            </h1>
            <p className="text-xl text-primary-foreground/80 leading-relaxed">
              From freight forwarding to supply chain visibility, we provide end-to-end 
              logistics services tailored to your business needs.
            </p>
          </motion.div>
        </div>
      </section>

      {/* Services Grid */}
      <section className="py-24 bg-background">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {services.map((service, index) => (
              <motion.div
                key={service.slug}
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5, delay: index * 0.1 }}
              >
                <Link
                  to={`/services/${service.slug}`}
                  className="group block h-full p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-2"
                >
                  <div className="w-16 h-16 rounded-xl bg-primary flex items-center justify-center mb-6 group-hover:bg-navy-light transition-colors">
                    <service.icon className="w-8 h-8 text-accent" />
                  </div>
                  <h3 className="text-xl font-semibold text-foreground mb-3 group-hover:text-accent transition-colors">
                    {service.title}
                  </h3>
                  <p className="text-muted-foreground leading-relaxed mb-6">
                    {service.description}
                  </p>
                  <div className="flex flex-wrap gap-2 mb-6">
                    {service.features.map((feature) => (
                      <span
                        key={feature}
                        className="px-3 py-1 rounded-full bg-secondary text-secondary-foreground text-xs font-medium"
                      >
                        {feature}
                      </span>
                    ))}
                  </div>
                  <span className="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                    Learn More <ArrowRight className="w-4 h-4" />
                  </span>
                </Link>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Band */}
      <section className="py-16 bg-accent">
        <div className="container mx-auto px-4 lg:px-8 text-center">
          <h2 className="text-2xl md:text-3xl font-bold text-accent-foreground mb-4">
            Need a Custom Logistics Solution?
          </h2>
          <p className="text-accent-foreground/80 mb-8 max-w-2xl mx-auto">
            Our team of experts will work with you to design a tailored solution 
            that meets your specific requirements.
          </p>
          <Button variant="default" size="lg" asChild>
            <Link to="/contact">Request a Consultation</Link>
          </Button>
        </div>
      </section>
    </Layout>
  );
};

export default ServicesPage;
