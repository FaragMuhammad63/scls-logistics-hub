import { motion } from 'framer-motion';
import { useInView } from 'framer-motion';
import { useRef } from 'react';
import { Target, Eye, Globe } from 'lucide-react';

const cards = [
  {
    icon: Target,
    title: 'Our Mission',
    description: 'Deliver seamless, reliable logistics solutions that empower businesses to move goods efficiently across borders.',
  },
  {
    icon: Eye,
    title: 'Our Vision',
    description: 'To be the leading logistics partner in the GCC, known for innovation, integrity, and operational excellence.',
  },
  {
    icon: Globe,
    title: 'Our Coverage',
    description: 'Saudi Arabia, GCC, Middle East, and global trade corridors spanning Asia, Europe, Africa, and the Americas.',
  },
];

export const About = () => {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-100px' });

  return (
    <section id="about" className="py-24 bg-background" ref={ref}>
      <div className="container mx-auto px-4 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          {/* Text Content */}
          <motion.div
            initial={{ opacity: 0, x: -40 }}
            animate={isInView ? { opacity: 1, x: 0 } : {}}
            transition={{ duration: 0.6 }}
          >
            <span className="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
              About SCLS
            </span>
            <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-6">
              Who We Are
            </h2>
            <p className="text-muted-foreground text-lg leading-relaxed mb-6">
              Speed & Creativity for Logistics Services (SCLS) is a Saudi-based logistics provider 
              specializing in seamless freight movement, customs clearance, and supply chain execution 
              for enterprises, government entities, and high-growth businesses.
            </p>
            <p className="text-muted-foreground text-lg leading-relaxed">
              We operate as a single-point logistics control tower, integrating freight forwarding, 
              regulatory compliance, domestic distribution, and real-time visibility.
            </p>
          </motion.div>

          {/* Image Placeholder */}
          <motion.div
            initial={{ opacity: 0, x: 40 }}
            animate={isInView ? { opacity: 1, x: 0 } : {}}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="relative"
          >
            <div className="aspect-[4/3] rounded-2xl bg-gradient-to-br from-navy to-navy-light overflow-hidden shadow-xl">
              <div className="absolute inset-0 pattern-dots opacity-30" />
              <div className="absolute inset-0 flex items-center justify-center">
                <div className="text-center text-primary-foreground/80 p-8">
                  <Globe className="w-16 h-16 mx-auto mb-4 text-accent" />
                  <p className="text-lg font-medium">Global Logistics Excellence</p>
                </div>
              </div>
            </div>
            {/* Decorative element */}
            <div className="absolute -bottom-6 -right-6 w-32 h-32 bg-accent/20 rounded-2xl -z-10" />
          </motion.div>
        </div>

        {/* Mission/Vision/Coverage Cards */}
        <div className="grid md:grid-cols-3 gap-6 mt-16">
          {cards.map((card, index) => (
            <motion.div
              key={card.title}
              initial={{ opacity: 0, y: 30 }}
              animate={isInView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: 0.3 + index * 0.1 }}
              className="group p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1"
            >
              <div className="w-14 h-14 rounded-xl bg-accent/10 flex items-center justify-center mb-5 group-hover:bg-accent/20 transition-colors">
                <card.icon className="w-7 h-7 text-accent" />
              </div>
              <h3 className="text-xl font-semibold text-foreground mb-3">{card.title}</h3>
              <p className="text-muted-foreground leading-relaxed">{card.description}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};
