import { motion } from 'framer-motion';
import { useInView } from 'framer-motion';
import { useRef, useState, useEffect } from 'react';
import { Package, Clock, MapPin, ThumbsUp } from 'lucide-react';

const kpis = [
  { icon: Package, value: 10000, suffix: '+', label: 'Shipments Handled' },
  { icon: Clock, value: 24, suffix: 'hrs', label: 'Average Clearance Time' },
  { icon: MapPin, value: 50, suffix: '+', label: 'Countries Covered' },
  { icon: ThumbsUp, value: 98, suffix: '%', label: 'Client Satisfaction' },
];

const accreditations = [
  'IATA Cargo Agent Accreditation',
  'FIATA Membership',
  'ISO 9001',
  'IATA DGR Certified Staff',
  'Dangerous Goods Transport License',
  'Cargo Insurance Provider Registration',
];

const regulatory = ['GACA', 'TGA', 'WASHAJ', 'FASAH', 'SABER', 'SFDA'];

const partners = ['KCTC', 'DHL', 'Aramex', 'Maersk', 'CMA', 'MSC', 'Turkish Airlines', 'Uzbekistan Airways', 'Akasa Air', 'Solitaire'];

function Counter({ value, suffix }: { value: number; suffix: string }) {
  const [count, setCount] = useState(0);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true });

  useEffect(() => {
    if (isInView) {
      const duration = 2000;
      const steps = 60;
      const increment = value / steps;
      let current = 0;
      const timer = setInterval(() => {
        current += increment;
        if (current >= value) {
          setCount(value);
          clearInterval(timer);
        } else {
          setCount(Math.floor(current));
        }
      }, duration / steps);
      return () => clearInterval(timer);
    }
  }, [isInView, value]);

  return (
    <span ref={ref} className="text-4xl md:text-5xl font-bold text-foreground">
      {count}{suffix}
    </span>
  );
}

export const Performance = () => {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-100px' });

  return (
    <section id="accreditations" className="py-24 bg-surface-sunken" ref={ref}>
      <div className="container mx-auto px-4 lg:px-8">
        {/* KPI Counters */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.6 }}
          className="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-16"
        >
          {kpis.map((kpi, index) => (
            <motion.div
              key={kpi.label}
              initial={{ opacity: 0, y: 30 }}
              animate={isInView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              className="p-8 rounded-2xl bg-card border border-border shadow-card text-center"
            >
              <div className="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center mx-auto mb-4">
                <kpi.icon className="w-6 h-6 text-accent" />
              </div>
              <Counter value={kpi.value} suffix={kpi.suffix} />
              <p className="text-muted-foreground text-sm mt-2">{kpi.label}</p>
            </motion.div>
          ))}
        </motion.div>

        {/* Digital Integration Strip */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.6, delay: 0.3 }}
          className="p-6 rounded-2xl bg-primary mb-16"
        >
          <p className="text-center text-primary-foreground font-medium text-lg">
            ✨ Digital Integration with Customs Single Window & EDI Systems
          </p>
        </motion.div>

        {/* Accreditations & Compliance */}
        <div className="grid lg:grid-cols-2 gap-8 mb-16">
          <motion.div
            initial={{ opacity: 0, x: -30 }}
            animate={isInView ? { opacity: 1, x: 0 } : {}}
            transition={{ duration: 0.6, delay: 0.4 }}
            className="p-8 rounded-2xl bg-card border border-border shadow-card"
          >
            <h3 className="text-xl font-semibold text-foreground mb-6">Accreditations</h3>
            <div className="flex flex-wrap gap-3">
              {accreditations.map((item) => (
                <span
                  key={item}
                  className="px-4 py-2 rounded-full bg-secondary text-secondary-foreground text-sm font-medium"
                >
                  {item}
                </span>
              ))}
            </div>
          </motion.div>

          <motion.div
            initial={{ opacity: 0, x: 30 }}
            animate={isInView ? { opacity: 1, x: 0 } : {}}
            transition={{ duration: 0.6, delay: 0.4 }}
            className="p-8 rounded-2xl bg-card border border-border shadow-card"
          >
            <h3 className="text-xl font-semibold text-foreground mb-6">Regulatory Compliance</h3>
            <div className="flex flex-wrap gap-3">
              {regulatory.map((item) => (
                <span
                  key={item}
                  className="px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium"
                >
                  {item}
                </span>
              ))}
            </div>
          </motion.div>
        </div>

        {/* Partner Logos */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.6, delay: 0.5 }}
          className="text-center"
        >
          <h3 className="text-xl font-semibold text-foreground mb-8">Our Partners</h3>
          <div className="flex flex-wrap justify-center gap-6">
            {partners.map((partner) => (
              <div
                key={partner}
                className="px-8 py-4 rounded-xl bg-card border border-border text-muted-foreground font-medium hover:border-accent/30 transition-colors"
              >
                {partner}
              </div>
            ))}
          </div>
        </motion.div>
      </div>
    </section>
  );
};
