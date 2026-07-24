import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { buildServiceJsonLd } from "@/lib/businessSchema";

type Service = {
  slug: string;
  title: string;
  meta: string;
  lead: string;
  intro: string;
  sections: { heading: string; body: string }[];
  includes: string[];
  faqs: { q: string; a: string }[];
};

const services: Service[] = [
  {
    slug: "home-decorations-dubai",
    title: "Home Decorations in Dubai",
    meta: "Professional home decorations in Dubai for villas & apartments. Luxury styling, feature walls & finishes. Call +971 56 288 9635.",
    lead: "Transform your villa or apartment with premium home decorations in Dubai — curated styling and calm luxury designed for UAE living.",
    intro:
      "Home Renovation AE designs and installs complete home decorations across Dubai villas and apartments. From feature walls and soft furnishings to layered lighting and finishing touches, we create spaces that feel intentional — not staged overnight.",
    sections: [
      {
        heading: "What we decorate",
        body: "Living rooms, dining areas, bedrooms, corridors and entrance zones. We balance materials, colour and texture so each room feels connected to the rest of your home — while still working for Dubai light, AC and everyday living.",
      },
      {
        heading: "Our decoration process",
        body: "We start with a site visit and brief, then propose a clear concept with finishes and scope. Once approved, we coordinate installation, styling and final detailing so handover feels finished — not half-done.",
      },
    ],
    includes: [
      "Concept styling and finish selection",
      "Feature walls and decorative detailing",
      "Soft furnishings and accessories coordination",
      "Lighting layering advice",
      "Villa and apartment projects across Dubai",
    ],
    faqs: [
      {
        q: "Do you decorate villas and apartments?",
        a: "Yes. We work across Dubai villas, townhouses and apartments — adapting scale, materials and install logistics to each property type.",
      },
      {
        q: "Can decorations be done with other renovation work?",
        a: "Absolutely. Many clients combine decorations with painting, flooring, curtains and furniture so the whole space lands together.",
      },
    ],
  },
  {
    slug: "painting-dubai",
    title: "Painting Services in Dubai",
    meta: "Expert painting services in Dubai: premium wall paint, feature finishes & colour advice. Call +971 56 288 9635.",
    lead: "Flawless painting for homes and offices — smooth walls, durable finishes and colour consultation tailored to Dubai light.",
    intro:
      "Our painting services in Dubai focus on prep first: filling, sanding and priming so the final coat looks smooth and lasts. We select finishes that handle UAE humidity, dust and strong sunlight without looking tired after a season.",
    sections: [
      {
        heading: "Interior and feature painting",
        body: "Full-room repaints, accent walls, ceilings and feature finishes. We help you choose colours that work with your flooring, furniture and natural light — not just a swatch on a white wall.",
      },
      {
        heading: "Prep that protects the finish",
        body: "Dubai properties often hide cracks, patch repairs and dusty surfaces. We correct those before colour goes on, so you get a clean, even result instead of paint that highlights every flaw.",
      },
    ],
    includes: [
      "Surface prep, filling and priming",
      "Premium interior wall and ceiling paint",
      "Feature and accent wall finishes",
      "Colour consultation for Dubai light",
      "Homes and offices across Dubai",
    ],
    faqs: [
      {
        q: "How long does a typical painting job take?",
        a: "A standard apartment room set often completes within a few days, depending on prep and drying. Villas and full-property repaints are scheduled after a site assessment.",
      },
      {
        q: "Do you advise on colours?",
        a: "Yes. We recommend tones that suit your lighting, finishes and furniture so the paint feels part of the design — not an afterthought.",
      },
    ],
  },
  {
    slug: "furniture-dubai",
    title: "Furniture Sale in Dubai",
    meta: "Buy curated furniture in Dubai matched to your interior concept. Free design advice. Call +971 56 288 9635.",
    lead: "Curated furniture selected for scale, comfort and style — so every piece fits your room and renovation plan.",
    intro:
      "We supply and coordinate curated furniture for Dubai homes and offices. Instead of random showroom pieces, we select items that match your layout, traffic flow and interior concept — so the room feels designed, not filled.",
    sections: [
      {
        heading: "Furniture matched to your space",
        body: "Sofas, dining sets, beds, storage and statement pieces sized for your rooms. We consider doorways, elevator access and villa layouts so delivery and placement stay practical.",
      },
      {
        heading: "Design-led selection",
        body: "Furniture works best when it supports the finishes around it. We coordinate fabrics, woods and metals with your painting, flooring and décor so everything reads as one scheme.",
      },
    ],
    includes: [
      "Curated furniture selection",
      "Scale and layout advice",
      "Coordination with your renovation plan",
      "Delivery and placement support",
      "Residential and office projects",
    ],
    faqs: [
      {
        q: "Can I buy individual pieces or a full package?",
        a: "Both. Some clients need a few key items; others want a full room package coordinated with décor and curtains.",
      },
      {
        q: "Do you help with layouts?",
        a: "Yes. We advise on placement and proportions so furniture improves flow instead of blocking it.",
      },
    ],
  },
  {
    slug: "flooring-dubai",
    title: "Flooring Work in Dubai",
    meta: "Professional flooring in Dubai: tiles, wood & luxury surfaces for villas and apartments. Call +971 56 288 9635.",
    lead: "Professional flooring installation — tiles, wood looks and luxury surfaces finished with precision.",
    intro:
      "Flooring sets the tone for every room. Home Renovation AE installs tiles, wood-look surfaces and luxury finishes for Dubai villas and apartments — with attention to levels, transitions and edges that make the whole renovation feel polished.",
    sections: [
      {
        heading: "Flooring options we install",
        body: "Porcelain and ceramic tiles, wood-look systems and selected luxury surfaces. We recommend materials based on room use, moisture exposure and the look you want long-term — not just the trend of the month.",
      },
      {
        heading: "Installation that lasts",
        body: "Good flooring is as much about substrate prep and detailing as the product itself. We plan transitions between rooms, protect adjacent finishes and leave clean skirting and threshold lines.",
      },
    ],
    includes: [
      "Tile and wood-look flooring installation",
      "Substrate prep and leveling",
      "Room-to-room transitions",
      "Villa and apartment projects",
      "Coordination with painting and décor",
    ],
    faqs: [
      {
        q: "Which flooring works best in Dubai?",
        a: "It depends on the room. High-traffic and wet areas often favour quality tiles; living spaces may suit warmer wood-look finishes. We recommend after seeing your property.",
      },
      {
        q: "Can flooring be done with painting?",
        a: "Yes — and sequencing matters. We plan the order so floors and walls finish clean without damaging each other.",
      },
    ],
  },
  {
    slug: "curtains-dubai",
    title: "Curtains Service in Dubai",
    meta: "Custom curtains in Dubai: sheers, blackout & elegant window treatments. Measure & install. Call +971 56 288 9635.",
    lead: "Custom curtains and window treatments — sheers, blackout and elegant drapery tailored for light and privacy.",
    intro:
      "Custom curtains transform how a Dubai room feels — managing harsh sun, privacy and soft luxury in one layer. We measure, supply and install sheers, blackout and layered treatments that fit your windows and interior style.",
    sections: [
      {
        heading: "Sheer, blackout and layered treatments",
        body: "Daytime sheers soften glare without killing natural light. Blackout layers support bedrooms and media rooms. Layered systems give you both — practical for Dubai apartments and villas with large glazing.",
      },
      {
        heading: "Measured for your windows",
        body: "Off-the-shelf lengths rarely suit villa openings or floor-to-ceiling apartment windows. We measure on site, advise on tracks and fabric weight, then install for clean hangs and smooth operation.",
      },
    ],
    includes: [
      "On-site measuring",
      "Sheer and blackout curtains",
      "Layered window treatments",
      "Track and installation",
      "Fabric coordination with your décor",
    ],
    faqs: [
      {
        q: "Do you install tracks as well as curtains?",
        a: "Yes. We supply and install tracks or poles suited to your window type and curtain weight.",
      },
      {
        q: "Can curtains match my furniture and paint?",
        a: "That’s the goal. We coordinate fabrics with your colour palette and finishes so windows feel part of the design.",
      },
    ],
  },
  {
    slug: "office-decorations-dubai",
    title: "Office Decorations in Dubai",
    meta: "Office decorations & fit-out in Dubai that look professional and work hard. Call +971 56 288 9635.",
    lead: "Office interiors that impress clients and support your team — reception, meeting rooms and workspaces.",
    intro:
      "Office decorations in Dubai should look professional and still work hard day to day. We design and deliver reception areas, meeting rooms and workspaces that reflect your brand — with practical layouts, durable finishes and a calm, finished look.",
    sections: [
      {
        heading: "Spaces that support work",
        body: "Reception sets first impressions. Meeting rooms need focus and presence. Open workspaces need comfort without visual noise. We balance brand, acoustics, lighting and materials for each zone.",
      },
      {
        heading: "Fit-out coordination",
        body: "Office projects often mix painting, flooring, furniture and décor. We coordinate scope so install days stay efficient and the handover looks complete — ready for clients and staff.",
      },
    ],
    includes: [
      "Reception and lobby styling",
      "Meeting room interiors",
      "Workspace décor and finishes",
      "Furniture and layout advice",
      "Brand-aligned material selection",
    ],
    faqs: [
      {
        q: "Do you work on small offices or only large fit-outs?",
        a: "Both. We handle compact studio offices and larger multi-room fit-outs — scoped to your budget and timeline.",
      },
      {
        q: "Can work happen outside business hours?",
        a: "Where needed, we plan install windows to reduce disruption. Share your constraints and we’ll propose a practical schedule.",
      },
    ],
  },
];

type Props = { params: Promise<{ slug: string }> };

export function generateStaticParams() {
  return services.map((s) => ({ slug: s.slug }));
}

export async function generateMetadata({ params }: Props): Promise<Metadata> {
  const { slug } = await params;
  const service = services.find((s) => s.slug === slug);
  if (!service) return {};
  return {
    title: service.title,
    description: service.meta,
    alternates: { canonical: `/${service.slug}` },
    openGraph: {
      title: service.title,
      description: service.meta,
      url: `/${service.slug}`,
      type: "website",
    },
    twitter: {
      card: "summary_large_image",
      title: service.title,
      description: service.meta,
    },
  };
}

export default async function ServicePage({ params }: Props) {
  const { slug } = await params;
  const service = services.find((s) => s.slug === slug);
  if (!service) notFound();

  const related = services.filter((s) => s.slug !== service.slug).slice(0, 3);
  const wa = `https://wa.me/971562889635?text=Hi%2C%20I%20am%20interested%20in%20your%20${encodeURIComponent(service.title)}%20service.`;
  const jsonLd = buildServiceJsonLd({
    slug: service.slug,
    title: service.title,
    description: service.meta,
    faqs: service.faqs,
  });

  return (
    <div className="pb-20">
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd) }}
      />

      <section className="border-b border-[rgba(196,165,116,0.16)] py-16">
        <div className="container">
          <nav aria-label="Breadcrumb" className="mb-6 flex items-center gap-2 text-sm text-cream/55">
            <Link href="/" className="hover:text-gold">
              Home
            </Link>
            <span>/</span>
            <span className="text-cream/80">{service.title}</span>
          </nav>
          <p className="eyebrow">Dubai Service</p>
          <h1 className="mb-4 max-w-3xl text-4xl font-bold tracking-tight text-cream md:text-5xl">
            {service.title}
          </h1>
          <p className="mb-8 max-w-2xl text-lg text-cream/70">{service.lead}</p>
          <div className="flex flex-wrap gap-3">
            <a className="btn btn-gold btn-lg" href={wa} target="_blank" rel="noopener noreferrer">
              Get Free Quote
            </a>
            <a className="btn btn-outline-light btn-lg" href="tel:+971562889635">
              +971 56 288 9635
            </a>
          </div>
        </div>
      </section>

      <section className="container py-14">
        <div className="grid gap-12 lg:grid-cols-[1.4fr_0.8fr]">
          <div className="max-w-3xl space-y-10">
            <p className="text-lg text-cream/75">{service.intro}</p>

            {service.sections.map((section) => (
              <div key={section.heading}>
                <h2 className="mb-3 text-2xl font-semibold tracking-tight text-cream">
                  {section.heading}
                </h2>
                <p className="text-cream/70">{section.body}</p>
              </div>
            ))}

            <div>
              <h2 className="mb-4 text-2xl font-semibold tracking-tight text-cream">
                What&apos;s included
              </h2>
              <ul className="space-y-2 text-cream/75">
                {service.includes.map((item) => (
                  <li key={item} className="flex gap-3">
                    <span className="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-gold" />
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </div>

            <div>
              <h2 className="mb-4 text-2xl font-semibold tracking-tight text-cream">
                Frequently asked questions
              </h2>
              <div className="space-y-5">
                {service.faqs.map((faq) => (
                  <div key={faq.q}>
                    <h3 className="mb-1 text-lg font-medium text-cream">{faq.q}</h3>
                    <p className="text-cream/70">{faq.a}</p>
                  </div>
                ))}
              </div>
            </div>

            <p className="text-cream/75">
              Browse our{" "}
              <Link href="/blog" className="text-gold-bright underline-offset-4 hover:underline">
                renovation blog
              </Link>{" "}
              for practical Dubai guidance, or WhatsApp us for a free consultation.
            </p>
          </div>

          <aside className="h-fit border border-[rgba(196,165,116,0.22)] bg-[rgba(255,255,255,0.02)] p-6 lg:sticky lg:top-28">
            <p className="eyebrow">Related services</p>
            <h2 className="mb-4 text-xl font-semibold text-cream">Also popular in Dubai</h2>
            <ul className="space-y-3">
              {related.map((item) => (
                <li key={item.slug}>
                  <Link
                    href={`/${item.slug}`}
                    className="text-cream/75 underline-offset-4 hover:text-gold-bright hover:underline"
                  >
                    {item.title}
                  </Link>
                </li>
              ))}
            </ul>
            <div className="mt-6 border-t border-[rgba(196,165,116,0.16)] pt-6">
              <a className="btn btn-gold w-full" href={wa} target="_blank" rel="noopener noreferrer">
                WhatsApp Quote
              </a>
            </div>
          </aside>
        </div>
      </section>
    </div>
  );
}
