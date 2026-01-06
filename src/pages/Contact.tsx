import { useState } from 'react';
import { motion } from 'framer-motion';
import { Layout } from '@/components/layout/Layout';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { useToast } from '@/hooks/use-toast';
import { Phone, Mail, MessageCircle, MapPin, Clock, Send, Building2 } from 'lucide-react';

const services = [
  'Air Freight',
  'Sea Freight',
  'Land Transportation',
  'Customs Clearance',
  'Warehousing & 3PL',
  'Control Tower',
  'General Inquiry',
];

const offices = [
  {
    city: 'Riyadh',
    address: 'King Fahd Road, Al Olaya District',
    phone: '+966 11 XXX XXXX',
    email: 'riyadh@scls.sa',
  },
  {
    city: 'Jeddah',
    address: 'Near Jeddah Islamic Port',
    phone: '+966 12 XXX XXXX',
    email: 'jeddah@scls.sa',
  },
  {
    city: 'Dammam',
    address: 'King Abdulaziz Seaport Area',
    phone: '+966 13 XXX XXXX',
    email: 'dammam@scls.sa',
  },
];

const Contact = () => {
  const { toast } = useToast();
  const [formData, setFormData] = useState({
    name: '',
    company: '',
    email: '',
    phone: '',
    service: '',
    message: '',
  });

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    toast({
      title: 'Message Sent!',
      description: 'Thank you for contacting us. We\'ll respond within 24 hours.',
    });
    setFormData({ name: '', company: '', email: '', phone: '', service: '', message: '' });
  };

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
              Contact Us
            </span>
            <h1 className="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
              Let's Discuss Your Logistics Needs
            </h1>
            <p className="text-xl text-primary-foreground/80 leading-relaxed">
              Our team is ready to help you optimize your supply chain. Get in touch today 
              for a free consultation.
            </p>
          </motion.div>
        </div>
      </section>

      {/* Quick Contact Buttons */}
      <section className="py-8 bg-surface-sunken border-b border-border">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="flex flex-wrap justify-center gap-4">
            <a
              href="tel:+966XXXXXXXX"
              className="flex items-center gap-2 px-6 py-3 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors"
            >
              <Phone className="w-5 h-5 text-accent" />
              <span className="font-medium">Call Us</span>
            </a>
            <a
              href="mailto:info@scls.sa"
              className="flex items-center gap-2 px-6 py-3 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors"
            >
              <Mail className="w-5 h-5 text-accent" />
              <span className="font-medium">Email Us</span>
            </a>
            <a
              href="https://wa.me/966XXXXXXXX"
              target="_blank"
              rel="noopener noreferrer"
              className="flex items-center gap-2 px-6 py-3 rounded-xl bg-card border border-border hover:border-accent/30 transition-colors"
            >
              <MessageCircle className="w-5 h-5 text-accent" />
              <span className="font-medium">WhatsApp</span>
            </a>
          </div>
        </div>
      </section>

      {/* Contact Form & Info */}
      <section className="py-20 bg-background">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="grid lg:grid-cols-2 gap-12">
            {/* Contact Form */}
            <motion.div
              initial={{ opacity: 0, x: -30 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.6 }}
            >
              <h2 className="text-2xl font-bold text-foreground mb-6">Send Us a Message</h2>
              <form onSubmit={handleSubmit} className="p-8 rounded-2xl bg-card border border-border shadow-card">
                <div className="grid sm:grid-cols-2 gap-4 mb-4">
                  <div>
                    <label className="block text-sm font-medium text-foreground mb-2">Full Name *</label>
                    <Input
                      required
                      value={formData.name}
                      onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                      placeholder="John Smith"
                    />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-foreground mb-2">Company</label>
                    <Input
                      value={formData.company}
                      onChange={(e) => setFormData({ ...formData, company: e.target.value })}
                      placeholder="Your company name"
                    />
                  </div>
                </div>
                <div className="grid sm:grid-cols-2 gap-4 mb-4">
                  <div>
                    <label className="block text-sm font-medium text-foreground mb-2">Email *</label>
                    <Input
                      type="email"
                      required
                      value={formData.email}
                      onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                      placeholder="john@company.com"
                    />
                  </div>
                  <div>
                    <label className="block text-sm font-medium text-foreground mb-2">Phone</label>
                    <Input
                      type="tel"
                      value={formData.phone}
                      onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
                      placeholder="+966 XX XXX XXXX"
                    />
                  </div>
                </div>
                <div className="mb-4">
                  <label className="block text-sm font-medium text-foreground mb-2">Service Interested In</label>
                  <select
                    value={formData.service}
                    onChange={(e) => setFormData({ ...formData, service: e.target.value })}
                    className="w-full h-11 px-3 rounded-lg border border-input bg-background text-foreground focus:ring-2 focus:ring-ring focus:border-transparent"
                  >
                    <option value="">Select a service</option>
                    {services.map((service) => (
                      <option key={service} value={service}>{service}</option>
                    ))}
                  </select>
                </div>
                <div className="mb-6">
                  <label className="block text-sm font-medium text-foreground mb-2">Message *</label>
                  <Textarea
                    required
                    value={formData.message}
                    onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                    placeholder="Tell us about your logistics requirements, shipment volumes, or any specific questions..."
                    rows={5}
                  />
                </div>
                <Button type="submit" variant="accent" size="lg" className="w-full">
                  <Send className="w-5 h-5 mr-2" /> Send Message
                </Button>
              </form>
            </motion.div>

            {/* Contact Info */}
            <motion.div
              initial={{ opacity: 0, x: 30 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ duration: 0.6, delay: 0.2 }}
            >
              <h2 className="text-2xl font-bold text-foreground mb-6">Our Offices</h2>
              <div className="space-y-6 mb-10">
                {offices.map((office) => (
                  <div
                    key={office.city}
                    className="p-6 rounded-2xl bg-card border border-border"
                  >
                    <div className="flex items-start gap-4">
                      <div className="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center shrink-0">
                        <Building2 className="w-6 h-6 text-accent" />
                      </div>
                      <div>
                        <h3 className="font-semibold text-foreground mb-2">{office.city} Office</h3>
                        <p className="text-muted-foreground text-sm mb-2">{office.address}</p>
                        <div className="space-y-1">
                          <a
                            href={`tel:${office.phone.replace(/\s/g, '')}`}
                            className="block text-sm text-accent hover:underline"
                          >
                            {office.phone}
                          </a>
                          <a
                            href={`mailto:${office.email}`}
                            className="block text-sm text-accent hover:underline"
                          >
                            {office.email}
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                ))}
              </div>

              {/* Business Hours */}
              <div className="p-6 rounded-2xl bg-card border border-border">
                <div className="flex items-start gap-4">
                  <div className="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center shrink-0">
                    <Clock className="w-6 h-6 text-accent" />
                  </div>
                  <div>
                    <h3 className="font-semibold text-foreground mb-2">Business Hours</h3>
                    <div className="space-y-1 text-sm text-muted-foreground">
                      <p>Sunday – Thursday: 8:00 AM – 6:00 PM</p>
                      <p>Friday – Saturday: Closed</p>
                      <p className="text-accent font-medium mt-2">24/7 Emergency Support Available</p>
                    </div>
                  </div>
                </div>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      {/* Map Section */}
      <section className="py-20 bg-surface-sunken">
        <div className="container mx-auto px-4 lg:px-8">
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
          >
            <h2 className="text-2xl font-bold text-foreground mb-6 text-center">Find Us</h2>
            <div className="aspect-[21/9] rounded-2xl bg-muted overflow-hidden border border-border">
              <div className="w-full h-full flex items-center justify-center text-muted-foreground">
                <MapPin className="w-8 h-8 mr-2" />
                <span className="text-lg">Map Integration Placeholder</span>
              </div>
            </div>
          </motion.div>
        </div>
      </section>
    </Layout>
  );
};

export default Contact;
