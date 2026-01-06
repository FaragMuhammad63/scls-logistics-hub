import { motion } from 'framer-motion';
import { useInView } from 'framer-motion';
import { useRef } from 'react';
import { 
  Factory, 
  ShoppingBag, 
  HeartPulse, 
  Plane, 
  Car, 
  Zap, 
  Building2, 
  Wheat, 
  Cpu, 
  Shirt, 
  Shield, 
  GraduationCap, 
  Briefcase 
} from 'lucide-react';

const industries = [
  { icon: Factory, name: 'Manufacturing & Industrial' },
  { icon: ShoppingBag, name: 'Retail & Consumer Goods' },
  { icon: HeartPulse, name: 'Pharmaceuticals & Healthcare' },
  { icon: Plane, name: 'Aviation & Aerospace' },
  { icon: Car, name: 'Automotive' },
  { icon: Zap, name: 'Energy & Petrochemicals' },
  { icon: Building2, name: 'Construction & Infrastructure' },
  { icon: Wheat, name: 'Food & Agriculture' },
  { icon: Cpu, name: 'Technology & Electronics' },
  { icon: Shirt, name: 'Textiles & Fashion' },
  { icon: Shield, name: 'Government & Defense' },
  { icon: GraduationCap, name: 'Education & Non-Profit' },
  { icon: Briefcase, name: 'SMEs & Startups' },
];

export const Industries = () => {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-100px' });

  return (
    <section id="industries" className="py-24 bg-background" ref={ref}>
      <div className="container mx-auto px-4 lg:px-8">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={isInView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.6 }}
          className="text-center max-w-3xl mx-auto mb-16"
        >
          <span className="inline-block px-4 py-2 rounded-full bg-accent/10 text-accent text-sm font-medium mb-4">
            Sector Expertise
          </span>
          <h2 className="text-3xl md:text-4xl font-bold text-foreground mb-4">
            Industries We Serve
          </h2>
          <p className="text-muted-foreground text-lg">
            Tailored logistics solutions for diverse sectors, each with unique regulatory 
            requirements and operational challenges.
          </p>
        </motion.div>

        <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
          {industries.map((industry, index) => (
            <motion.div
              key={industry.name}
              initial={{ opacity: 0, scale: 0.9 }}
              animate={isInView ? { opacity: 1, scale: 1 } : {}}
              transition={{ duration: 0.4, delay: index * 0.05 }}
              className="group p-5 rounded-xl bg-card border border-border hover:border-accent/30 hover:shadow-card transition-all duration-300 text-center"
            >
              <div className="w-12 h-12 rounded-lg bg-secondary mx-auto mb-3 flex items-center justify-center group-hover:bg-accent/10 transition-colors">
                <industry.icon className="w-6 h-6 text-muted-foreground group-hover:text-accent transition-colors" />
              </div>
              <p className="text-sm font-medium text-foreground">{industry.name}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};
