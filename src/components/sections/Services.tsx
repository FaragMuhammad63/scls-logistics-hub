import { motion } from 'framer-motion';
import { useInView } from 'framer-motion';
import { useRef } from 'react';
import { Link } from 'react-router-dom';
import { Plane, Ship, Truck, FileCheck, Warehouse, BarChart3, ArrowRight } from 'lucide-react';
import { Button } from '@/components/ui/button';

const services = [
  {
    icon: Plane,
    title: 'Freight Forwarding',
    description: 'Air, sea, and land freight solutions optimized for speed, cost, and regulatory compliance.',
    href: '/services/air-freight',
  },
  {
    icon: FileCheck,
    title: 'Customs Clearance & Compliance',
    description: 'Licensed Saudi customs brokerage with full integration into FASAH, SABER, SFDA, GACA, and TGA.',
    href: '/services/customs-clearance',
  },
  {
    icon: Warehouse,
    title: 'Warehousing & Fulfillment',
    description: 'Strategically located storage, 3PL services, and value-added logistics.',
    href: '/services/warehousing',
  },
  {
    icon: BarChart3,
    title: 'Supply Chain Control Tower',
    description: 'End-to-end visibility, exception management, and SLA-driven performance reporting.',
    href: '/services/control-tower',
  },
];

export const Services = () => {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-100px' });

  return (
    <section id="services" className="py-24 bg-surface-sunken" ref={ref}>
      <div className="container mx-auto px-4 lg:px-8">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.6 }}
          className="text-center max-w-3xl mx-auto mb-16"
        >
          <span className="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
            What We Offer
          </span>
          <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4">
            Core Services
          </h2>
          <p className="text-muted-foreground text-lg">
            Comprehensive logistics solutions tailored to your business needs, from freight forwarding 
            to supply chain visibility.
          </p>
        </motion.div>

        <div className="grid md:grid-cols-2 gap-6">
          {services.map((service, index) => (
            <motion.div
              key={service.title}
              initial={{ opacity: 0, y: 30 }}
              animate={isInView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: index * 0.1 }}
            >
              <Link
                to={service.href}
                className="group block p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1 h-full"
              >
                <div className="flex items-start gap-5">
                  <div className="w-16 h-16 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:bg-navy-light transition-colors">
                    <service.icon className="w-8 h-8 text-accent" />
                  </div>
                  <div className="flex-1">
                    <h3 className="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors">
                      {service.title}
                    </h3>
                    <p className="text-muted-foreground leading-relaxed mb-4">
                      {service.description}
                    </p>
                    <span className="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                      Learn More <ArrowRight className="w-4 h-4" />
                    </span>
                  </div>
                </div>
              </Link>
            </motion.div>
          ))}
        </div>

        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.5, delay: 0.5 }}
          className="text-center mt-12"
        >
          <Button variant="accent" size="lg" asChild>
            <Link to="/services">
              Explore All Services <ArrowRight className="w-5 h-5 ml-1" />
            </Link>
          </Button>
        </motion.div>
      </div>
    </section>
  );
};
