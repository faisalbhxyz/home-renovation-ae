import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { getPostsNewestFirst } from "@/data/posts";
import { buildHomeJsonLd } from "@/lib/businessSchema";

export const metadata: Metadata = {
  alternates: { canonical: "/" },
  openGraph: {
    url: "/",
  },
};

const WA =
  "https://wa.me/971562889635?text=Hello%20Home%20Renovation%20AE%2C%20I%20would%20like%20a%20free%20consultation%20for%20my%20property%20in%20Dubai.";

const services = [
  { href: "/home-decorations-dubai", title: "Home Decorations", desc: "Calm luxury styling for villas and apartments." },
  { href: "/painting-dubai", title: "Painting", desc: "Prep-first painting that lasts in Dubai climate." },
  { href: "/furniture-dubai", title: "Furniture", desc: "Curated pieces matched to your interior concept." },
  { href: "/flooring-dubai", title: "Flooring", desc: "Tiles, wood looks and luxury surfaces, installed right." },
  { href: "/curtains-dubai", title: "Curtains", desc: "Custom sheers and blackout treatments." },
  { href: "/office-decorations-dubai", title: "Office Interiors", desc: "Workspaces that feel professional and usable." },
];

const portfolio = [
  {
    src: "/images/arched-media-wall-living-room-dubai.jpg",
    alt: "Arched media wall living room renovation in Dubai villa",
  },
  {
    src: "/images/modern-bathroom-renovation-dubai.jpg",
    alt: "Modern bathroom renovation with luxury finishes in Dubai",
  },
  {
    src: "/images/custom-sheer-curtains-living-room-dubai.jpg",
    alt: "Custom sheer curtains in a Dubai living room",
  },
];

export default function HomePage() {
  const latest = getPostsNewestFirst().slice(0, 3);
  const jsonLd = buildHomeJsonLd();

  return (
    <>
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd) }}
      />

      <section className="relative min-h-[88vh] overflow-hidden">
        <Image
          src="/images/luxury-marble-tv-feature-wall-dubai-hero.webp"
          alt="Luxury home renovation Dubai — marble TV feature wall"
          fill
          priority
          className="object-cover"
          sizes="100vw"
        />
        <div className="absolute inset-0 bg-[linear-gradient(90deg,rgba(10,10,10,0.88)_0%,rgba(10,10,10,0.55)_55%,rgba(10,10,10,0.35)_100%)]" />
        <div className="container relative z-10 flex min-h-[88vh] flex-col justify-center py-20">
          <p className="eyebrow">Dubai · Home Renovation AE</p>
          <h1 className="mb-5 max-w-3xl text-4xl font-bold tracking-tight text-cream md:text-6xl">
            Luxury Home Renovation in Dubai
          </h1>
          <p className="mb-8 max-w-xl text-lg text-cream/80">
            Premium home décor, painting, flooring, furniture, curtains and office interiors — finished with calm luxury and clear communication.
          </p>
          <div className="flex flex-wrap gap-3">
            <a className="btn btn-gold btn-lg" href={WA} target="_blank" rel="noopener noreferrer">
              Free Consultation
            </a>
            <Link className="btn btn-outline-light btn-lg" href="/blog">
              Read Our Blog
            </Link>
          </div>
        </div>
      </section>

      <section id="services" className="section py-20">
        <div className="container">
          <p className="eyebrow">Services</p>
          <h2 className="mb-10 max-w-2xl text-3xl font-bold tracking-tight text-cream md:text-4xl">
            Everything your Dubai home needs to feel finished
          </h2>
          <div className="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            {services.map((s) => (
              <Link
                key={s.href}
                href={s.href}
                className="border border-[rgba(196,165,116,0.22)] bg-[rgba(255,255,255,0.02)] p-6 transition hover:border-gold/50 hover:bg-[rgba(196,165,116,0.06)]"
              >
                <h3 className="mb-2 text-xl font-semibold text-cream">{s.title}</h3>
                <p className="text-cream/70">{s.desc}</p>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section id="portfolio" className="border-y border-[rgba(196,165,116,0.14)] py-20">
        <div className="container">
          <p className="eyebrow">Portfolio</p>
          <h2 className="mb-10 text-3xl font-bold tracking-tight text-cream md:text-4xl">
            Recent Dubai interiors
          </h2>
          <div className="grid gap-4 md:grid-cols-3">
            {portfolio.map((item) => (
              <div key={item.src} className="relative aspect-[4/5] overflow-hidden">
                <Image
                  src={item.src}
                  alt={item.alt}
                  fill
                  className="object-cover"
                  sizes="(max-width:768px) 100vw, 33vw"
                />
              </div>
            ))}
          </div>
        </div>
      </section>

      <section id="about" className="py-20">
        <div className="container max-w-3xl">
          <p className="eyebrow">About</p>
          <h2 className="mb-5 text-3xl font-bold tracking-tight text-cream md:text-4xl">
            Calm luxury. Clear communication. Finished spaces.
          </h2>
          <p className="text-lg text-cream/75">
            Home Renovation AE delivers premium home décor, painting, flooring, furniture, curtains and office interiors across Dubai. We focus on finishes that feel complete — and a process you can trust.
          </p>
        </div>
      </section>

      <section className="border-t border-[rgba(196,165,116,0.14)] py-20">
        <div className="container">
          <div className="mb-10 flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
            <div>
              <p className="eyebrow">Blog</p>
              <h2 className="text-3xl font-bold tracking-tight text-cream md:text-4xl">
                Guides for Dubai homeowners
              </h2>
            </div>
            <Link href="/blog" className="text-gold-bright underline-offset-4 hover:underline">
              View all articles →
            </Link>
          </div>
          <div className="grid gap-6 md:grid-cols-3">
            {latest.map((post) => (
              <Link
                key={post.slug}
                href={`/blog/${post.slug}`}
                className="group overflow-hidden border border-[rgba(196,165,116,0.2)] bg-[rgba(255,255,255,0.02)]"
              >
                <div className="relative aspect-[16/10] overflow-hidden">
                  <Image
                    src={post.image}
                    alt={post.title}
                    fill
                    className="object-cover transition duration-500 group-hover:scale-105"
                    sizes="(max-width:768px) 100vw, 33vw"
                  />
                </div>
                <div className="p-5">
                  <p className="mb-2 text-xs uppercase tracking-[0.14em] text-gold">{post.categories[0]}</p>
                  <h3 className="mb-2 text-lg font-semibold leading-snug text-cream group-hover:text-gold-bright">
                    {post.title}
                  </h3>
                  <p className="line-clamp-3 text-sm text-cream/65">{post.excerpt}</p>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>
    </>
  );
}
