# SCLS Logistics Theme

This theme mirrors the SCLS React site and uses Tailwind CSS for styling.

## Build CSS
From the theme directory:

```
npm install
npm run build:css
```

For development:

```
npm run watch:css
```

The build outputs to `assets/css/main.css` which is enqueued by WordPress.

## WordPress setup
- Set a static front page (Home) in Settings -> Reading.
- Set the Posts page to your Blog page for the blog listing.
- Use the "Services" template for the Services page.
- Use the "Contact" template for the Contact page.
- Create Service detail pages with the "Service Detail" template and slugs matching:
  - `air-freight`
  - `sea-freight`
  - `land-transportation`
  - `customs-clearance`
  - `warehousing`
  - `control-tower`
- The News section uses a custom post type `News` (slug `/news`). Do not create a page with the same slug.

## Plugins
- Install and activate the "RIACO Icon Block" plugin. The theme uses its Lucide icon block for icon rendering.
- Install and activate Contact Form 7, then set the shortcode in Customizer -> SCLS Integrations.
