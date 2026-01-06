import { Layout } from '@/components/layout/Layout';
import { Hero } from '@/components/sections/Hero';
import { About } from '@/components/sections/About';
import { Services } from '@/components/sections/Services';
import { Industries } from '@/components/sections/Industries';
import { WhySCLS } from '@/components/sections/WhySCLS';
import { Performance } from '@/components/sections/Performance';
import { ContactCTA } from '@/components/sections/ContactCTA';

const Index = () => {
  return (
    <Layout>
      <Hero />
      <About />
      <Services />
      <Industries />
      <WhySCLS />
      <Performance />
      <ContactCTA />
    </Layout>
  );
};

export default Index;
