import Link from "next/link";

const WA =
  "https://wa.me/971562889635?text=Hi%2C%20I%20want%20a%20free%20consultation%20for%20my%20Dubai%20renovation%20project.";

const footerServices = [
  { href: "/home-decorations-dubai", label: "Home Decorations" },
  { href: "/painting-dubai", label: "Painting" },
  { href: "/furniture-dubai", label: "Furniture" },
  { href: "/flooring-dubai", label: "Flooring" },
  { href: "/curtains-dubai", label: "Curtains" },
  { href: "/office-decorations-dubai", label: "Office Interiors" },
];

export default function Footer() {
  return (
    <>
      <footer className="mt-auto border-t border-[rgba(196,165,116,0.18)]" id="contact">
        <div className="bg-[linear-gradient(180deg,rgba(196,165,116,0.12),transparent)] py-16">
          <div className="container flex flex-col items-start justify-between gap-8 md:flex-row md:items-center">
            <div>
              <p className="eyebrow">Ready to transform your space?</p>
              <h2 className="mb-3 max-w-xl text-3xl font-bold tracking-tight text-cream md:text-4xl">
                Get a free Dubai consultation today
              </h2>
              <p className="max-w-lg text-cream/75">
                Tell us about your villa, apartment or office — we reply fast on WhatsApp.
              </p>
            </div>
            <div className="flex flex-wrap gap-3">
              <a className="btn btn-gold btn-lg" href={WA} target="_blank" rel="noopener noreferrer">
                WhatsApp Now
              </a>
              <a className="btn btn-outline-light btn-lg" href="tel:+971562889635">
                +971 56 288 9635
              </a>
            </div>
          </div>
        </div>

        <div className="container grid gap-8 border-t border-[rgba(196,165,116,0.12)] py-10 md:grid-cols-3">
          <div>
            <p className="mb-3 text-sm font-semibold uppercase tracking-[0.14em] text-gold">
              Services
            </p>
            <ul className="space-y-2 text-sm text-cream/65">
              {footerServices.map((item) => (
                <li key={item.href}>
                  <Link href={item.href} className="hover:text-gold">
                    {item.label}
                  </Link>
                </li>
              ))}
            </ul>
          </div>
          <div>
            <p className="mb-3 text-sm font-semibold uppercase tracking-[0.14em] text-gold">
              Explore
            </p>
            <ul className="space-y-2 text-sm text-cream/65">
              <li>
                <Link href="/" className="hover:text-gold">
                  Home
                </Link>
              </li>
              <li>
                <Link href="/blog" className="hover:text-gold">
                  Blog
                </Link>
              </li>
              <li>
                <Link href="/#portfolio" className="hover:text-gold">
                  Portfolio
                </Link>
              </li>
              <li>
                <Link href="/#about" className="hover:text-gold">
                  About
                </Link>
              </li>
            </ul>
          </div>
          <div>
            <p className="mb-3 text-sm font-semibold uppercase tracking-[0.14em] text-gold">
              Contact
            </p>
            <ul className="space-y-2 text-sm text-cream/65">
              <li>
                <a href="tel:+971562889635" className="hover:text-gold">
                  +971 56 288 9635
                </a>
              </li>
              <li>
                <a href={WA} target="_blank" rel="noopener noreferrer" className="hover:text-gold">
                  WhatsApp
                </a>
              </li>
              <li>Dubai, United Arab Emirates</li>
            </ul>
          </div>
        </div>

        <div className="container flex flex-col gap-2 border-t border-[rgba(196,165,116,0.12)] py-6 text-sm text-cream/55 sm:flex-row sm:items-center sm:justify-between">
          <p>© 2026 Home Renovation AE. All rights reserved.</p>
          <a
            href="https://wa.me/8801310790697"
            target="_blank"
            rel="noopener noreferrer"
            className="hover:text-gold"
          >
            Developed by Adstryker
          </a>
        </div>
      </footer>

      <a
        className="fixed bottom-5 right-5 z-50 inline-flex items-center gap-2 rounded-full bg-[#25D366] px-4 py-3 text-sm font-semibold text-white shadow-lg transition hover:scale-[1.03]"
        href="https://wa.me/971562889635?text=Hello%20Home%20Renovation%20AE%2C%20I%20would%20like%20a%20free%20consultation%20for%20my%20property%20in%20Dubai."
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat on WhatsApp"
      >
        WhatsApp
      </a>
    </>
  );
}
