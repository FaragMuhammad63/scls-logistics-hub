import { motion } from 'framer-motion';
import { useInView } from 'framer-motion';
import { useRef } from 'react';
import { Globe, Cpu, Users, FileCheck, Landmark } from 'lucide-react';

const reasons = [
  {
    icon: Globe,
    title: 'Global Reach',
    description: 'Extensive network spanning Saudi Arabia, GCC, Middle East, and major global trade corridors.',
  },
  {
    icon: Cpu,
    title: 'Technology-Driven Efficiency',
    description: 'Advanced tracking systems, EDI integration, and real-time visibility platforms.',
  },
  {
    icon: Users,
    title: 'Client-Centric Solutions',
    description: 'Customized logistics strategies designed around your specific business requirements.',
  },
  {
    icon: FileCheck,
    title: 'Regulatory Expertise',
    description: 'Deep knowledge of Saudi and international trade regulations, customs procedures, and compliance requirements.',
  },
  {
    icon: Landmark,
    title: 'Vision 2030 Alignment',
    description: 'Supporting Saudi Arabia\'s economic transformation through world-class logistics infrastructure.',
  },
];

export const WhySCLS = () => {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-100px' });

  return (
    <section id="why-scls" className="py-24 bg-primary relative overflow-hidden" ref={ref}>
      {/* Background pattern */}
      <div className="absolute inset-0 pattern-grid opacity-20" />
      
      <div className="container mx-auto px-4 lg:px-8 relative z-10">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.6 }}
          className="text-center max-w-3xl mx-auto mb-16"
        >
          <span className="inline-block px-4 py-2 rounded-full bg-accent/20 text-accent text-sm font-medium mb-4">
            Our Advantage
          </span>
          <h2 className="text-3xl md:text-4xl font-bold text-primary-foreground mb-4">
            Why Choose SCLS
          </h2>
          <p className="text-primary-foreground/70 text-lg">
            We combine global expertise with local knowledge to deliver logistics excellence 
            that drives your business forward.
          </p>
        </motion.div>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          {reasons.map((reason, index) => (
            <motion.div
              key={reason.title}
              initial={{ opacity: 0, y: 30 }}
              animate={isInView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              className="group p-8 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10 hover:bg-white/10 transition-all duration-300"
            >
              <div className="w-14 h-14 rounded-xl bg-accent/20 flex items-center justify-center mb-5 group-hover:bg-accent/30 transition-colors">
                <reason.icon className="w-7 h-7 text-accent" />
              </div>
              <h3 className="text-xl font-semibold text-primary-foreground mb-3">{reason.title}</h3>
              <p className="text-primary-foreground/70 leading-relaxed">{reason.description}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};
