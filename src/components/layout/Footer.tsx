import { Link } from 'react-router-dom';
import { MapPin, Phone, Mail, Linkedin, Twitter, Facebook, Instagram } from 'lucide-react';

const footerLinks = {
  about: [
    { label: 'About SCLS', href: '/#about' },
    { label: 'Why Choose Us', href: '/#why-scls' },
    { label: 'Industries', href: '/#industries' },
    { label: 'Accreditations', href: '/#accreditations' },
  ],
  services: [
    { label: 'Air Freight', href: '/services/air-freight' },
    { label: 'Sea Freight', href: '/services/sea-freight' },
    { label: 'Land Transportation', href: '/services/land-transportation' },
    { label: 'Customs Clearance', href: '/services/customs-clearance' },
    { label: 'Warehousing & 3PL', href: '/services/warehousing' },
    { label: 'Control Tower', href: '/services/control-tower' },
  ],
  resources: [
    { label: 'Blog', href: '/blog' },
    { label: 'News', href: '/news' },
    { label: 'Contact Us', href: '/contact' },
  ],
};

const socialLinks = [
  { icon: Linkedin, href: '#', label: 'LinkedIn' },
  { icon: Twitter, href: '#', label: 'Twitter' },
  { icon: Facebook, href: '#', label: 'Facebook' },
  { icon: Instagram, href: '#', label: 'Instagram' },
];

export const Footer = () => {
  return (
    <footer className="bg-primary text-primary-foreground">
      {/* Main Footer */}
      <div className="container mx-auto px-4 lg:px-8 py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          {/* Company Info */}
          <div className="lg:col-span-1">
            <div className="font-bold text-2xl mb-4">
              <span className="text-accent">SCLS</span>
            </div>
            <p className="text-primary-foreground/70 text-sm leading-relaxed mb-6">
              Speed & Creativity for Logistics Services — Your strategic partner in freight and logistics excellence across Saudi Arabia and global trade corridors.
            </p>
            <div className="flex gap-3">
              {socialLinks.map((social) => (
                <a
                  key={social.label}
                  href={social.href}
                  aria-label={social.label}
                  className="w-10 h-10 rounded-lg bg-white/10 hover:bg-accent flex items-center justify-center transition-colors"
                >
                  <social.icon className="w-5 h-5" />
                </a>
              ))}
            </div>
          </div>

          {/* About Links */}
          <div>
            <h4 className="font-semibold text-sm uppercase tracking-wider mb-4">About</h4>
            <ul className="space-y-3">
              {footerLinks.about.map((link) => (
                <li key={link.label}>
                  <Link
                    to={link.href}
                    className="text-primary-foreground/70 hover:text-accent transition-colors text-sm"
                  >
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Services Links */}
          <div>
            <h4 className="font-semibold text-sm uppercase tracking-wider mb-4">Services</h4>
            <ul className="space-y-3">
              {footerLinks.services.map((link) => (
                <li key={link.label}>
                  <Link
                    to={link.href}
                    className="text-primary-foreground/70 hover:text-accent transition-colors text-sm"
                  >
                    {link.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>

          {/* Contact Info */}
          <div>
            <h4 className="font-semibold text-sm uppercase tracking-wider mb-4">Contact</h4>
            <ul className="space-y-4">
              <li className="flex items-start gap-3">
                <MapPin className="w-5 h-5 text-accent shrink-0 mt-0.5" />
                <span className="text-primary-foreground/70 text-sm">
                  Riyadh, Saudi Arabia
                </span>
              </li>
              <li className="flex items-center gap-3">
                <Phone className="w-5 h-5 text-accent shrink-0" />
                <a
                  href="tel:+966XXXXXXXX"
                  className="text-primary-foreground/70 hover:text-accent transition-colors text-sm"
                >
                  +966 XX XXX XXXX
                </a>
              </li>
              <li className="flex items-center gap-3">
                <Mail className="w-5 h-5 text-accent shrink-0" />
                <a
                  href="mailto:info@scls.sa"
                  className="text-primary-foreground/70 hover:text-accent transition-colors text-sm"
                >
                  info@scls.sa
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-white/10">
        <div className="container mx-auto px-4 lg:px-8 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
          <p className="text-primary-foreground/60 text-sm">
            © {new Date().getFullYear()} Speed & Creativity for Logistics Services. All rights reserved.
          </p>
          <div className="flex gap-6">
            <Link to="/privacy" className="text-primary-foreground/60 hover:text-accent text-sm transition-colors">
              Privacy Policy
            </Link>
            <Link to="/terms" className="text-primary-foreground/60 hover:text-accent text-sm transition-colors">
              Terms of Service
            </Link>
          </div>
        </div>
      </div>
    </footer>
  );
};
