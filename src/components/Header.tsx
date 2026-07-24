"use client";

import Image from "next/image";
import Link from "next/link";
import { useEffect, useState } from "react";

const WA =
  "https://wa.me/971562889635?text=Hello%20Home%20Renovation%20AE%2C%20I%20would%20like%20a%20free%20consultation%20for%20my%20property%20in%20Dubai.";

const links = [
  { href: "/#services", label: "Services" },
  { href: "/#portfolio", label: "Portfolio" },
  { href: "/blog", label: "Blog" },
  { href: "/#about", label: "About" },
  { href: "/#contact", label: "Contact" },
];

export default function Header() {
  const [scrolled, setScrolled] = useState(false);
  const [open, setOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  return (
    <header
      className={`fixed inset-x-0 top-0 z-50 h-[78px] border-b transition-all duration-300 ${
        scrolled
          ? "border-[rgba(196,165,116,0.2)] bg-[rgba(16,16,16,0.88)] backdrop-blur-md"
          : "border-transparent bg-transparent"
      }`}
    >
      <div className="container flex h-full items-center justify-between gap-4">
        <Link href="/" aria-label="Home Renovation AE" className="shrink-0">
          <Image
            src="/images/home-renovation-ae-dubai-logo.webp"
            alt="Home Renovation AE"
            width={180}
            height={45}
            className="header-logo h-[42px] w-auto"
            priority
          />
        </Link>

        <nav className="hidden items-center gap-7 text-sm text-cream/85 lg:flex" aria-label="Primary">
          {links.map((l) => (
            <Link key={l.href} href={l.href} className="transition hover:text-gold-bright">
              {l.label}
            </Link>
          ))}
        </nav>

        <div className="flex items-center gap-3">
          <a href="tel:+971562889635" className="hidden text-sm text-cream/90 md:inline">
            +971 56 288 9635
          </a>
          <a className="btn btn-gold btn-sm hidden sm:inline-flex" href={WA} target="_blank" rel="noopener noreferrer">
            Free Quote
          </a>
          <button
            type="button"
            className="flex h-10 w-10 flex-col items-center justify-center gap-1.5 lg:hidden"
            aria-expanded={open}
            aria-controls="mobile-nav"
            aria-label="Open menu"
            onClick={() => setOpen((v) => !v)}
          >
            <span className="block h-0.5 w-5 bg-cream" />
            <span className="block h-0.5 w-5 bg-cream" />
            <span className="block h-0.5 w-5 bg-cream" />
          </button>
        </div>
      </div>

      {open && (
        <div id="mobile-nav" className="border-t border-[rgba(196,165,116,0.2)] bg-[#12110f] px-4 py-5 lg:hidden">
          <div className="flex flex-col gap-4">
            {links.map((l) => (
              <Link
                key={l.href}
                href={l.href}
                className="text-cream/90"
                onClick={() => setOpen(false)}
              >
                {l.label}
              </Link>
            ))}
            <a className="btn btn-gold" href={WA} target="_blank" rel="noopener noreferrer">
              WhatsApp Free Quote
            </a>
          </div>
        </div>
      )}
    </header>
  );
}
