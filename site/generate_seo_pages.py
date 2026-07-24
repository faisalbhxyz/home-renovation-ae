#!/usr/bin/env python3
"""Generate SEO service pages + sitemap for static Vercel site."""
from pathlib import Path
from datetime import date

ROOT = Path(__file__).resolve().parent
BASE = "https://homerenovationae.com"
TODAY = date.today().isoformat()

SERVICES = [
    {
        "slug": "home-decorations-dubai",
        "title": "Home Decorations",
        "meta_title": "Home Decorations Dubai | Interior Décor & Styling — Home Renovation AE",
        "meta_desc": "Professional home decorations in Dubai for villas & apartments. Luxury styling, feature walls & finishes. Free consultation. Call +971 56 288 9635.",
        "h1": "Home Decorations in Dubai",
        "lead": "Transform your villa or apartment with premium home decorations in Dubai — curated styling, feature finishes and calm luxury designed for UAE living.",
        "body": [
            "Home Renovation AE delivers end-to-end home decorations across Dubai: living rooms, bedrooms, reception areas and full-villa refreshes that look expensive and feel effortless.",
            "We plan colour, lighting, textiles, décor objects and statement walls so every room feels intentional — not overdone. Ideal for Marina, JVC, Arabian Ranches, Palm and Downtown homes.",
        ],
        "bullets": ["Full décor concepts for villas & apartments", "Feature walls, lighting & styling layers", "Furniture & accessory coordination", "WhatsApp quotes with clear scope"],
    },
    {
        "slug": "painting-dubai",
        "title": "Painting",
        "meta_title": "Painting Services Dubai | Wall & Feature Painting — Home Renovation AE",
        "meta_desc": "Expert painting services in Dubai: premium wall paint, feature finishes & colour advice for homes and offices. Fast, clean work. Call +971 56 288 9635.",
        "h1": "Painting Services in Dubai",
        "lead": "Flawless painting services in Dubai for homes and offices — smooth walls, durable finishes and colour consultation tailored to Dubai light.",
        "body": [
            "From single rooms to full property repaints, our Dubai painting team focuses on prep, clean edges and premium paint systems that hold up in the UAE climate.",
            "Need a feature wall, ceiling refresh or full villa repaint? We coordinate colours with your décor so the finish looks designed, not rushed.",
        ],
        "bullets": ["Interior painting for villas & apartments", "Feature walls & accent finishes", "Surface prep for a smooth result", "Colour consultation included"],
    },
    {
        "slug": "furniture-dubai",
        "title": "Furniture Sale",
        "meta_title": "Furniture Dubai | Curated Home Furniture — Home Renovation AE",
        "meta_desc": "Buy curated furniture in Dubai matched to your interior concept. Sofas, dining, bedroom & statement pieces. Free design advice. Call +971 56 288 9635.",
        "h1": "Furniture Sale in Dubai",
        "lead": "Curated furniture in Dubai selected for scale, comfort and style — so every piece fits your room and your renovation plan.",
        "body": [
            "We help Dubai homeowners source furniture that matches the interior concept: living room sets, dining tables, beds and statement pieces that look designed together.",
            "Whether you are furnishing a new apartment or upgrading a villa, we keep proportions right for Dubai layouts and finish quality high.",
        ],
        "bullets": ["Concept-matched furniture selection", "Living, dining & bedroom packages", "Scale guidance for Dubai apartments", "Coordinated with décor & curtains"],
    },
    {
        "slug": "flooring-dubai",
        "title": "Flooring Work",
        "meta_title": "Flooring Dubai | Tile, Wood & Luxury Floors — Home Renovation AE",
        "meta_desc": "Professional flooring in Dubai: tiles, wood, herringbone & luxury surfaces for villas and apartments. Expert install. Call +971 56 288 9635.",
        "h1": "Flooring Work in Dubai",
        "lead": "Professional flooring installation in Dubai — tiles, wood looks, herringbone patterns and luxury surfaces finished with precision.",
        "body": [
            "Upgrade floors across your Dubai property with materials chosen for durability, comfort underfoot and a premium look that photographs well.",
            "We handle preparation, layout and installation so transitions between rooms feel seamless and the final surface is clean and level.",
        ],
        "bullets": ["Tile, wood & luxury surface installs", "Herringbone & feature patterns", "Prep & levelling done properly", "Matched to full renovation scope"],
    },
    {
        "slug": "office-decorations-dubai",
        "title": "Office Decorations",
        "meta_title": "Office Decorations Dubai | Office Fit-Out & Interiors — Home Renovation AE",
        "meta_desc": "Office decorations & fit-out in Dubai that look professional and work hard. Reception, meeting rooms & workspaces. Call +971 56 288 9635.",
        "h1": "Office Decorations in Dubai",
        "lead": "Office decorations in Dubai that impress clients and support your team — reception, meeting rooms and workspaces designed with clarity.",
        "body": [
            "We create office interiors across Dubai that balance brand presence with practical layout: lighting, finishes, furniture and décor that feel modern and efficient.",
            "From small studios to larger suites, you get a cohesive look without the chaos of managing multiple contractors.",
        ],
        "bullets": ["Reception & meeting room styling", "Workspace furniture & finishes", "Brand-aligned colour & materials", "Fast WhatsApp consultation"],
    },
    {
        "slug": "curtains-dubai",
        "title": "Curtains Service",
        "meta_title": "Curtains Dubai | Custom Curtains & Window Treatments — Home Renovation AE",
        "meta_desc": "Custom curtains in Dubai: sheers, blackout & elegant window treatments for villas and apartments. Measure & install. Call +971 56 288 9635.",
        "h1": "Curtains Service in Dubai",
        "lead": "Custom curtains and window treatments in Dubai — sheers, blackout and elegant drapery tailored for light, privacy and a finished interior.",
        "body": [
            "Window treatments make Dubai interiors feel complete. We measure, recommend fabrics and install curtains that control glare while elevating the room.",
            "Pair curtains with your décor and furniture plan for a layered look that works day and night across apartments and villas.",
        ],
        "bullets": ["Custom measure & install", "Sheers, blackout & layered looks", "Fabric advice for Dubai light", "Matched to full décor projects"],
    },
]

FAQS = [
    ("How much does home renovation cost in Dubai?", "Costs depend on scope — décor-only refreshes, painting, flooring, furniture and curtains each price differently. Share photos and room sizes on WhatsApp for a clear, transparent quotation from Home Renovation AE."),
    ("Which areas in Dubai do you serve?", "We serve homes and offices across Dubai, including Marina, JBR, Downtown, Business Bay, JVC, JLT, Arabian Ranches, Palm Jumeirah and surrounding communities."),
    ("Can you handle painting, flooring and curtains together?", "Yes. Home Renovation AE coordinates décor, painting, flooring, furniture and curtains as one project so finishes match and timelines stay simple."),
    ("How do I get a free consultation?", "Message us on WhatsApp at +971 56 288 9635 or call the same number. Send photos of your space and we reply with next steps and options."),
    ("Do you work on villas and apartments?", "Yes — we renovate and decorate Dubai villas, apartments and offices, from single-room upgrades to full-property makeovers."),
]

HEADER = '''<!DOCTYPE html>
<html lang="en-AE">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1a1a1a">
	<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	<title>{meta_title}</title>
	<meta name="description" content="{meta_desc}">
	<meta name="keywords" content="home renovation Dubai, {title} Dubai, interior décor Dubai, Home Renovation AE">
	<meta name="author" content="Home Renovation AE">
	<meta name="geo.region" content="AE-DU">
	<meta name="geo.placename" content="Dubai">
	<meta name="geo.position" content="25.2048;55.2708">
	<meta name="ICBM" content="25.2048, 55.2708">
	<link rel="canonical" href="{canonical}">
	<meta property="og:locale" content="en_AE">
	<meta property="og:type" content="article">
	<meta property="og:site_name" content="Home Renovation AE">
	<meta property="og:title" content="{meta_title}">
	<meta property="og:description" content="{meta_desc}">
	<meta property="og:url" content="{canonical}">
	<meta property="og:image" content="{base}/images/luxury-marble-tv-feature-wall-dubai.jpg">
	<meta property="og:image:secure_url" content="{base}/images/luxury-marble-tv-feature-wall-dubai.jpg">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="1079">
	<meta property="og:image:height" content="1239">
	<meta property="og:image:alt" content="Luxury marble TV feature wall with wood slats and LED lighting — home renovation Dubai by Home Renovation AE">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="{meta_title}">
	<meta name="twitter:description" content="{meta_desc}">
	<meta name="twitter:image" content="{base}/images/luxury-marble-tv-feature-wall-dubai.jpg">
	<meta name="twitter:image:alt" content="Luxury marble TV feature wall with wood slats and LED lighting — home renovation Dubai by Home Renovation AE">
	<link rel="icon" href="../images/home-renovation-ae-dubai-logo.png" type="image/png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/main.css">
	<script type="application/ld+json">{schema}</script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" id="site-header">
	<div class="container header-inner">
		<a class="brand" href="../" aria-label="Home Renovation AE">
			<img class="brand-logo" src="../images/home-renovation-ae-dubai-logo.png" alt="Home Renovation AE" width="220" height="56" decoding="async">
		</a>
		<nav class="nav-desktop" aria-label="Primary">
			<a href="../#services">Services</a>
			<a href="../#portfolio">Portfolio</a>
			<a href="../#process">Process</a>
			<a href="../#about">About</a>
			<a href="../#contact">Contact</a>
		</nav>
		<div class="header-actions">
			<a class="header-phone" href="tel:+971562889635">+971 56 288 9635</a>
			<a class="btn btn-gold btn-sm" href="https://wa.me/971562889635?text=Hello%20Home%20Renovation%20AE%2C%20I%20would%20like%20a%20free%20consultation%20for%20my%20property%20in%20Dubai." target="_blank" rel="noopener">Free Quote</a>
			<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="Open menu">
				<span></span><span></span><span></span>
			</button>
		</div>
	</div>
	<div class="mobile-nav" id="mobile-nav" hidden>
		<a href="../#services">Services</a>
		<a href="../#portfolio">Portfolio</a>
		<a href="../#process">Process</a>
		<a href="../#about">About</a>
		<a href="../#contact">Contact</a>
	</div>
</header>
'''

FOOTER = '''
<footer class="site-footer" id="contact">
	<div class="footer-cta">
		<div class="container footer-cta-inner">
			<div class="footer-cta-copy">
				<p class="eyebrow">Ready to transform your space?</p>
				<h2>Get a free Dubai consultation today</h2>
				<p>Tell us about your villa, apartment or office — we reply fast on WhatsApp.</p>
			</div>
			<div class="footer-cta-actions">
				<a class="btn btn-gold btn-lg" href="https://wa.me/971562889635?text=Hi%2C%20I%20want%20a%20free%20consultation%20for%20my%20Dubai%20renovation%20project." target="_blank" rel="noopener">WhatsApp Now</a>
				<a class="btn btn-outline-light btn-lg" href="tel:+971562889635">+971 56 288 9635</a>
			</div>
		</div>
	</div>
	<div class="footer-main">
		<div class="container footer-bottom" style="padding-top:2rem">
			<p>&copy; 2026 Home Renovation AE. All rights reserved.</p>
			<p><a href="../">Home</a> · <a href="../sitemap.xml">Sitemap</a></p>
		</div>
	</div>
</footer>
<a class="whatsapp-float" href="https://wa.me/971562889635?text=Hello%20Home%20Renovation%20AE%2C%20I%20would%20like%20a%20free%20consultation%20for%20my%20property%20in%20Dubai." target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
	<svg viewBox="0 0 32 32" aria-hidden="true"><path fill="currentColor" d="M19.11 17.53c-.28-.14-1.64-.81-1.89-.9-.25-.1-.43-.14-.62.14-.18.28-.71.9-.87 1.08-.16.18-.32.2-.6.07-.28-.14-1.17-.43-2.23-1.37-.82-.73-1.38-1.64-1.54-1.92-.16-.28-.02-.43.12-.57.12-.12.28-.32.42-.48.14-.16.18-.28.28-.46.09-.18.05-.35-.02-.49-.07-.14-.62-1.49-.85-2.04-.22-.53-.45-.46-.62-.47h-.53c-.18 0-.48.07-.73.35-.25.28-.96.94-.96 2.29s.98 2.65 1.12 2.83c.14.18 1.93 2.95 4.68 4.14.65.28 1.16.45 1.56.57.65.21 1.25.18 1.72.11.52-.08 1.64-.67 1.87-1.32.23-.65.23-1.21.16-1.32-.07-.11-.25-.18-.53-.32z"/><path fill="currentColor" d="M16.02 3C9.39 3 4 8.38 4 14.99c0 2.11.55 4.17 1.6 5.99L4 29l8.21-1.55c1.75.96 3.73 1.46 5.76 1.46h.01c6.62 0 12.01-5.38 12.01-11.99C29.99 8.38 24.64 3 16.02 3zm0 21.87h-.01c-1.79 0-3.54-.48-5.07-1.39l-.36-.22-4.87.92.93-4.75-.24-.38a9.86 9.86 0 0 1-1.51-5.26c0-5.45 4.45-9.89 9.93-9.89 2.65 0 5.14 1.03 7.01 2.91a9.8 9.8 0 0 1 2.9 6.99c0 5.45-4.45 9.87-9.91 9.87z"/></svg>
	<span>WhatsApp</span>
</a>
<script src="../assets/js/main.js"></script>
</body>
</html>
'''

import json

def esc(s):
    return (s.replace('&', '&amp;').replace('<', '&lt;').replace('>', '&gt;').replace('"', '&quot;'))

def make_schema(svc, canonical):
    return json.dumps({
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Service",
                "name": svc["title"] + " Dubai",
                "description": svc["meta_desc"],
                "url": canonical,
                "areaServed": "Dubai",
                "provider": {
                    "@type": "HomeAndConstructionBusiness",
                    "name": "Home Renovation AE",
                    "telephone": "+971 56 288 9635",
                    "url": BASE + "/",
                },
            },
            {
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {"@type": "ListItem", "position": 1, "name": "Home", "item": BASE + "/"},
                    {"@type": "ListItem", "position": 2, "name": svc["title"], "item": canonical},
                ],
            },
        ],
    }, ensure_ascii=False)

def render_service(svc):
    canonical = f"{BASE}/{svc['slug']}"
    others = "".join(
        f'<li><a href="./{o["slug"]}">{esc(o["title"])}</a></li>'
        for o in SERVICES if o["slug"] != svc["slug"]
    )
    body = "".join(f"<p>{esc(p)}</p>" for p in svc["body"])
    bullets = "".join(f"<li>{esc(b)}</li>" for b in svc["bullets"])
    wa = f"https://wa.me/971562889635?text=Hi%2C%20I%20am%20interested%20in%20your%20{svc['title'].replace(' ', '%20')}%20service%20in%20Dubai."
    main = f'''
<main id="main">
	<section class="page-hero" style="--hero-image:url('/images/luxury-marble-tv-feature-wall-dubai-hero.webp')">
		<div class="page-hero-veil"></div>
		<div class="container page-hero-content">
			<nav class="breadcrumbs" aria-label="Breadcrumb">
				<a href="../">Home</a><span aria-hidden="true">/</span><span>{esc(svc["title"])}</span>
			</nav>
			<p class="eyebrow">Dubai Service</p>
			<h1>{esc(svc["h1"])}</h1>
			<p class="hero-lead">{esc(svc["lead"])}</p>
			<div class="hero-cta">
				<a class="btn btn-gold btn-lg" href="{wa}" target="_blank" rel="noopener">Get Free Quote</a>
				<a class="btn btn-outline-light btn-lg" href="tel:+971562889635">+971 56 288 9635</a>
			</div>
		</div>
	</section>
	<section class="section service-detail">
		<div class="container service-detail-grid">
			<div class="service-detail-copy">
				{body}
				<ul class="service-bullets">{bullets}</ul>
				<a class="btn btn-gold" href="{wa}" target="_blank" rel="noopener">WhatsApp for pricing</a>
			</div>
			<aside class="service-aside">
				<h2>Other Dubai services</h2>
				<ul>{others}</ul>
				<p class="service-aside-note">Serving villas, apartments and offices across Dubai.</p>
			</aside>
		</div>
	</section>
</main>
'''
    head = HEADER.format(
        meta_title=esc(svc["meta_title"]),
        meta_desc=esc(svc["meta_desc"]),
        title=esc(svc["title"]),
        canonical=canonical,
        base=BASE,
        schema=make_schema(svc, canonical),
    )
    return head + main + FOOTER

def main():
    for svc in SERVICES:
        path = ROOT / f"{svc['slug']}.html"
        path.write_text(render_service(svc), encoding="utf-8")
        print("wrote", path.name)

    # sitemap
    urls = [f"  <url>\n    <loc>{BASE}/</loc>\n    <lastmod>{TODAY}</lastmod>\n    <changefreq>weekly</changefreq>\n    <priority>1.0</priority>\n  </url>"]
    for svc in SERVICES:
        urls.append(f"  <url>\n    <loc>{BASE}/{svc['slug']}</loc>\n    <lastmod>{TODAY}</lastmod>\n    <changefreq>monthly</changefreq>\n    <priority>0.9</priority>\n  </url>")
    (ROOT / "sitemap.xml").write_text(
        '<?xml version="1.0" encoding="UTF-8"?>\n'
        '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'
        + "\n".join(urls)
        + "\n</urlset>\n",
        encoding="utf-8",
    )
    print("wrote sitemap.xml")

    # robots
    (ROOT / "robots.txt").write_text(
        f"User-agent: *\nAllow: /\n\nSitemap: {BASE}/sitemap.xml\n",
        encoding="utf-8",
    )
    print("wrote robots.txt")

if __name__ == "__main__":
    main()
