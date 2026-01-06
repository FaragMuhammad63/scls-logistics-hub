import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import { Layout } from '@/components/layout/Layout';
import { Button } from '@/components/ui/button';
import { Calendar, User, ArrowRight, Clock } from 'lucide-react';

const featuredPost = {
  title: 'The Future of Logistics in Saudi Arabia: Vision 2030 and Beyond',
  excerpt: 'Explore how Saudi Arabia\'s Vision 2030 is transforming the logistics landscape and creating unprecedented opportunities for businesses across the Kingdom.',
  date: 'January 5, 2026',
  author: 'SCLS Team',
  readTime: '8 min read',
  category: 'Industry Insights',
  slug: 'future-of-logistics-saudi-arabia',
};

const posts = [
  {
    title: 'Understanding FASAH: A Complete Guide to Saudi Customs Single Window',
    excerpt: 'Learn how the FASAH system streamlines customs clearance and what it means for your import/export operations.',
    date: 'January 2, 2026',
    author: 'SCLS Team',
    readTime: '6 min read',
    category: 'Compliance',
    slug: 'understanding-fasah-customs',
  },
  {
    title: '5 Ways to Optimize Your Cold Chain Logistics',
    excerpt: 'Best practices for maintaining product integrity in temperature-sensitive supply chains.',
    date: 'December 28, 2025',
    author: 'SCLS Team',
    readTime: '5 min read',
    category: 'Best Practices',
    slug: 'optimize-cold-chain-logistics',
  },
  {
    title: 'Dangerous Goods Shipping: What You Need to Know',
    excerpt: 'A comprehensive overview of regulations and best practices for shipping hazardous materials.',
    date: 'December 20, 2025',
    author: 'SCLS Team',
    readTime: '7 min read',
    category: 'Compliance',
    slug: 'dangerous-goods-shipping-guide',
  },
  {
    title: 'The Rise of E-Commerce Fulfillment in the GCC',
    excerpt: 'How the e-commerce boom is reshaping warehousing and last-mile delivery across the region.',
    date: 'December 15, 2025',
    author: 'SCLS Team',
    readTime: '6 min read',
    category: 'Industry Insights',
    slug: 'ecommerce-fulfillment-gcc',
  },
  {
    title: 'Reducing Demurrage and Detention Costs',
    excerpt: 'Practical strategies to minimize container-related charges and improve supply chain efficiency.',
    date: 'December 10, 2025',
    author: 'SCLS Team',
    readTime: '5 min read',
    category: 'Cost Optimization',
    slug: 'reducing-demurrage-detention',
  },
];

const categories = ['All', 'Industry Insights', 'Compliance', 'Best Practices', 'Cost Optimization'];

const Blog = () => {
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
              Blog
            </span>
            <h1 className="text-4xl md:text-5xl font-bold text-primary-foreground mb-6">
              Insights & Resources
            </h1>
            <p className="text-xl text-primary-foreground/80 leading-relaxed">
              Stay updated with the latest trends, best practices, and insights in logistics and supply chain management.
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

      {/* Featured Post */}
      <section className="py-16 bg-background">
        <div className="container mx-auto px-4 lg:px-8">
          <motion.article
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
            className="group"
          >
            <Link
              to={`/blog/${featuredPost.slug}`}
              className="block p-8 md:p-12 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300"
            >
              <div className="flex flex-col lg:flex-row gap-8">
                <div className="lg:w-1/2">
                  <div className="aspect-[16/10] rounded-xl bg-gradient-to-br from-navy to-navy-light overflow-hidden">
                    <div className="w-full h-full flex items-center justify-center text-primary-foreground/50">
                      Featured Image
                    </div>
                  </div>
                </div>
                <div className="lg:w-1/2 flex flex-col justify-center">
                  <span className="inline-block px-3 py-1 rounded-full bg-accent/10 text-accent text-xs font-medium mb-4 w-fit">
                    {featuredPost.category}
                  </span>
                  <h2 className="text-2xl md:text-3xl font-bold text-foreground mb-4 group-hover:text-accent transition-colors">
                    {featuredPost.title}
                  </h2>
                  <p className="text-muted-foreground leading-relaxed mb-6">
                    {featuredPost.excerpt}
                  </p>
                  <div className="flex flex-wrap items-center gap-4 text-sm text-muted-foreground mb-6">
                    <span className="flex items-center gap-1">
                      <Calendar className="w-4 h-4" />
                      {featuredPost.date}
                    </span>
                    <span className="flex items-center gap-1">
                      <User className="w-4 h-4" />
                      {featuredPost.author}
                    </span>
                    <span className="flex items-center gap-1">
                      <Clock className="w-4 h-4" />
                      {featuredPost.readTime}
                    </span>
                  </div>
                  <span className="inline-flex items-center gap-2 text-accent font-medium group-hover:gap-3 transition-all">
                    Read Article <ArrowRight className="w-4 h-4" />
                  </span>
                </div>
              </div>
            </Link>
          </motion.article>
        </div>
      </section>

      {/* Posts Grid */}
      <section className="py-16 bg-surface-sunken">
        <div className="container mx-auto px-4 lg:px-8">
          <h2 className="text-2xl font-bold text-foreground mb-8">Latest Articles</h2>
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {posts.map((post, index) => (
              <motion.article
                key={post.slug}
                initial={{ opacity: 0, y: 30 }}
                animate={{ opacity: 1, y: 0 }}
                transition={{ duration: 0.5, delay: index * 0.1 }}
              >
                <Link
                  to={`/blog/${post.slug}`}
                  className="group block h-full p-6 rounded-2xl bg-card border border-border shadow-card hover:shadow-card-hover transition-all duration-300 hover:-translate-y-1"
                >
                  <div className="aspect-[16/10] rounded-xl bg-gradient-to-br from-secondary to-muted mb-6 overflow-hidden">
                    <div className="w-full h-full flex items-center justify-center text-muted-foreground">
                      Image
                    </div>
                  </div>
                  <span className="inline-block px-3 py-1 rounded-full bg-accent/10 text-accent text-xs font-medium mb-3">
                    {post.category}
                  </span>
                  <h3 className="text-lg font-semibold text-foreground mb-3 group-hover:text-accent transition-colors line-clamp-2">
                    {post.title}
                  </h3>
                  <p className="text-muted-foreground text-sm leading-relaxed mb-4 line-clamp-2">
                    {post.excerpt}
                  </p>
                  <div className="flex items-center gap-4 text-xs text-muted-foreground">
                    <span className="flex items-center gap-1">
                      <Calendar className="w-3 h-3" />
                      {post.date}
                    </span>
                    <span className="flex items-center gap-1">
                      <Clock className="w-3 h-3" />
                      {post.readTime}
                    </span>
                  </div>
                </Link>
              </motion.article>
            ))}
          </div>

          {/* Load More */}
          <div className="text-center mt-12">
            <Button variant="outline" size="lg">
              Load More Articles
            </Button>
          </div>
        </div>
      </section>
    </Layout>
  );
};

export default Blog;
