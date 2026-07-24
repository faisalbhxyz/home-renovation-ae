export const BASE = "https://homerenovationae.com";
export const LOGO = `${BASE}/images/home-renovation-ae-dubai-logo.png`;

export const businessSchema = {
  "@type": "HomeAndConstructionBusiness" as const,
  "@id": `${BASE}/#business`,
  name: "Home Renovation AE",
  url: `${BASE}/`,
  telephone: "+971 56 288 9635",
  image: LOGO,
  logo: LOGO,
  priceRange: "$$",
  description:
    "Premium home renovation and interior décor in Dubai — painting, flooring, furniture, curtains, home decorations and office interiors.",
  areaServed: {
    "@type": "City",
    name: "Dubai",
  },
  address: {
    "@type": "PostalAddress",
    addressLocality: "Dubai",
    addressRegion: "Dubai",
    addressCountry: "AE",
  },
  contactPoint: {
    "@type": "ContactPoint",
    telephone: "+971 56 288 9635",
    contactType: "customer service",
    areaServed: "AE",
    availableLanguage: ["English", "Arabic"],
  },
  hasOfferCatalog: {
    "@type": "OfferCatalog",
    name: "Home Renovation AE Services",
    itemListElement: [
      { "@type": "Offer", itemOffered: { "@type": "Service", name: "Home Decorations in Dubai" } },
      { "@type": "Offer", itemOffered: { "@type": "Service", name: "Painting Services in Dubai" } },
      { "@type": "Offer", itemOffered: { "@type": "Service", name: "Furniture in Dubai" } },
      { "@type": "Offer", itemOffered: { "@type": "Service", name: "Flooring Work in Dubai" } },
      { "@type": "Offer", itemOffered: { "@type": "Service", name: "Curtains Service in Dubai" } },
      { "@type": "Offer", itemOffered: { "@type": "Service", name: "Office Decorations in Dubai" } },
    ],
  },
};

export function buildHomeJsonLd() {
  return {
    "@context": "https://schema.org",
    "@graph": [
      businessSchema,
      {
        "@type": "WebSite",
        "@id": `${BASE}/#website`,
        url: `${BASE}/`,
        name: "Home Renovation AE",
        description:
          "Dubai's premium home renovation and interior décor company.",
        publisher: { "@id": `${BASE}/#business` },
        inLanguage: "en-AE",
      },
    ],
  };
}

export function buildServiceJsonLd(opts: {
  slug: string;
  title: string;
  description: string;
  faqs?: { q: string; a: string }[];
}) {
  const url = `${BASE}/${opts.slug}`;
  const graph: Record<string, unknown>[] = [
    businessSchema,
    {
      "@type": "Service",
      "@id": `${url}#service`,
      name: opts.title,
      description: opts.description,
      provider: { "@id": `${BASE}/#business` },
      areaServed: {
        "@type": "City",
        name: "Dubai",
      },
      url,
    },
    {
      "@type": "BreadcrumbList",
      "@id": `${url}#breadcrumb`,
      itemListElement: [
        {
          "@type": "ListItem",
          position: 1,
          name: "Home",
          item: `${BASE}/`,
        },
        {
          "@type": "ListItem",
          position: 2,
          name: opts.title,
          item: url,
        },
      ],
    },
  ];

  if (opts.faqs?.length) {
    graph.push({
      "@type": "FAQPage",
      "@id": `${url}#faq`,
      mainEntity: opts.faqs.map((faq) => ({
        "@type": "Question",
        name: faq.q,
        acceptedAnswer: {
          "@type": "Answer",
          text: faq.a,
        },
      })),
    });
  }

  return {
    "@context": "https://schema.org",
    "@graph": graph,
  };
}
