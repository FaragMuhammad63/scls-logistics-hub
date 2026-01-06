import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import { Layout } from '@/components/layout/Layout';
import { Button } from '@/components/ui/button';
import { Calendar, ArrowRight } from 'lucide-react';

const newsItems = [
  {
    title: 'SCLS Expands Air Freight Network with New Charter Partnerships',
    excerpt: 'We are excited to announce new strategic partnerships with major charter operators to enhance our air freight capabilities across the Middle East and beyond.',
    date: 'January 4, 2026',
    category: 'Partnership',
    slug: 'air-freight-charter-partnerships',
  },
  {
    title: 'SCLS Achieves ISO 9001:2015 Recertification',
    excerpt: 'Our commitment to quality management has been recognized with successful ISO 9001:2015 recertification, reinforcing our dedication to operational excellence.',
    date: 'December 30, 2025',
    category: 'Certification',
    slug: 'iso-9001-recertification',
  },
  {
    title: 'New Warehouse Facility Opens in Jeddah Islamic Port',
    excerpt: 'SCLS has opened a state-of-the-art warehouse facility near Jeddah Islamic Port, expanding our bonded storage and fulfillment capabilities.',
    date: 'December 22, 2025',
    category: 'Expansion',
    slug: 'jeddah-warehouse-opening',
  },
  {
    title: 'SCLS Partners with Saudi Customs on FASAH Integration',
    excerpt: 'We have completed full integration with the FASAH single window system, enabling faster and more efficient customs clearance for our clients.',
    date: 'December 15, 2025',
    category: 'Technology',
    slug: 'fasah-integration-complete',
  },
  {
    title: 'SCLS Sponsors Saudi Logistics Summit 2025',
    excerpt: 'As a platinum sponsor of the Saudi Logistics Summit, SCLS showcased innovative supply chain solutions and connected with industry leaders.',
    date: 'December 8, 2025',
    category: 'Event',
    slug: 'saudi-logistics-summit-sponsorship',
  },
  {
    title: 'Enhanced Temperature-Controlled Fleet for Pharmaceutical Logistics',
    excerpt: 'SCLS has invested in new GDP-compliant vehicles to strengthen our pharmaceutical and healthcare logistics capabilities.',
    date: 'December 1, 2025',
    category: 'Investment',
    slug: 'pharma-fleet-expansion',
  },
  {
    title: 'SCLS Team Achieves IATA DGR Certification',
    excerpt: 'Our operations team has successfully completed IATA Dangerous Goods Regulations training, ensuring safe handling of hazardous materials.',
    date: 'November 25, 2025',
    category: 'Certification',
    slug: 'iata-dgr-certification',
  },
  {
    title: 'Launch of Real-Time Tracking Portal for Customers',
    excerpt: 'We are proud to launch our new customer portal featuring real-time shipment tracking, document management, and analytics dashboards.',
    date: 'November 18, 2025',
    category: 'Technology',
    slug: 'customer-portal-launch',
  },
];

const categories = ['All', 'Partnership', 'Certification', 'Expansion', 'Technology', 'Event', 'Investment'];

const News = () => {
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
              News
            </span>
            <h1 className="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
              Company Updates
            </h1>
            <p className="text-xl text-primary-foreground/80 leading-relaxed">
              Stay informed about the latest developments, partnerships, and achievements at SCLS.
            </p>
          </motion.div>
        </div>
      </section>

      {/* Categories */}
      <section className="py-8 bg-surface-sunken border-b border-border">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="flex flex-wrap gap-3">
            {categories.map((category, index) => (
              <button
                key={category}
                className={`px-4 py-2 rounded-full text-sm font-medium transition-colors ${
                  index === 0
                    ? 'bg-accent text-accent-foreground'
                    : 'bg-card text-muted-foreground hover:text-foreground hover:bg-muted'
                }`}
              >
                {category}
              </button>
            ))}
          </div>
        </div>
      </section>

      {/* News List */}
      <section className="py-16 bg-background">
        <div className="container mx-auto px-4 lg:px-8">
          <div className="space-y-6">
            {newsItems.map((item, index) => (
              <motion.article
                key={item.slug}
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5, delay: index * 0.05 }}
              >
                <Link
                  to={`/news/${item.slug}`}
                  className="group block p-6 md:p-8 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300"
                >
                  <div className="flex flex-col md:flex-row md:items-center gap-4">
                    <div className="flex-1">
                      <div className="flex flex-wrap items-center gap-3 mb-3">
                        <span className="inline-block px-3 py-1 rounded-full bg-accent/10 text-accent text-xs font-medium">
                          {item.category}
                        </span>
                        <span className="flex items-center gap-1 text-sm text-muted-foreground">
                          <Calendar className="w-4 h-4" />
                          {item.date}
                        </span>
                      </div>
                      <h2 className="text-xl font-semibold text-foreground mb-2 group-hover:text-accent transition-colors">
                        {item.title}
                      </h2>
                      <p className="text-muted-foreground leading-relaxed">
                        {item.excerpt}
                      </p>
                    </div>
                    <div className="shrink-0">
                      <span className="inline-flex items-center gap-2 text-accent font-medium text-sm group-hover:gap-3 transition-all">
                        Read More <ArrowRight className="w-4 h-4" />
                      </span>
                    </div>
                  </div>
                </Link>
              </motion.article>
            ))}
          </div>

          {/* Load More */}
          <div className="text-center mt-12">
            <Button variant="outline" size="lg">
              Load More News
            </Button>
          </div>
        </div>
      </section>

      {/* Newsletter CTA */}
      <section className="py-16 bg-accent">
        <div className="container mx-auto px-4 lg:px-8 text-center">
          <h2 className="text-2xl md:text-3xl font-bold text-accent-foreground mb-4">
            Stay Updated
          </h2>
          <p className="text-accent-foreground/80 mb-8 max-w-2xl mx-auto">
            Subscribe to our newsletter for the latest news, insights, and industry updates.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
            <input
              type="email"
              placeholder="Enter your email"
              className="flex-1 h-12 px-4 rounded-lg border-0 bg-accent-foreground/10 text-accent-foreground placeholder:text-accent-foreground/50 focus:ring-2 focus:ring-accent-foreground/30"
            />
            <Button variant="default" size="lg">
              Subscribe
            </Button>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default News;
