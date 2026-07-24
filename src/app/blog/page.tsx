import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { getPostsNewestFirst } from "@/data/posts";
import { formatPostDate } from "@/lib/formatDate";

export const metadata: Metadata = {
  title: "Blog — Home Renovation & Interior Tips Dubai",
  description:
    "Practical guides on home renovation, painting, flooring, curtains and interior design for Dubai villas and apartments from Home Renovation AE.",
  alternates: { canonical: "/blog" },
};

export default function BlogIndexPage() {
  const posts = getPostsNewestFirst();

  return (
    <div className="pb-20">
      <section className="border-b border-[rgba(196,165,116,0.16)] py-16">
        <div className="container">
          <nav className="mb-6 flex items-center gap-2 text-sm text-cream/55" aria-label="Breadcrumb">
            <Link href="/" className="hover:text-gold">
              Home
            </Link>
            <span aria-hidden>/</span>
            <span className="text-cream/80">Blog</span>
          </nav>
          <p className="eyebrow">Insights</p>
          <h1 className="mb-4 max-w-3xl text-4xl font-bold tracking-tight text-cream md:text-5xl">
            Dubai home renovation blog
          </h1>
          <p className="max-w-2xl text-lg text-cream/70">
            Human, practical advice for villas and apartments — budgets, bathrooms, painting, flooring, curtains and more.
          </p>
        </div>
      </section>

      <section className="container py-14">
        <div className="grid gap-8 md:grid-cols-2">
          {posts.map((post) => (
            <Link
              key={post.slug}
              href={`/blog/${post.slug}`}
              className="group overflow-hidden border border-[rgba(196,165,116,0.2)] bg-[rgba(255,255,255,0.02)] transition hover:border-gold/45"
            >
              <div className="relative aspect-[16/9] overflow-hidden">
                <Image
                  src={post.image}
                  alt={post.title}
                  fill
                  className="object-cover transition duration-500 group-hover:scale-105"
                  sizes="(max-width:768px) 100vw, 50vw"
                />
              </div>
              <div className="p-6">
                <div className="mb-3 flex flex-wrap items-center gap-3 text-xs uppercase tracking-[0.14em] text-gold">
                  <span>{post.categories[0]}</span>
                  <span className="text-cream/35">·</span>
                  <time dateTime={post.date}>{formatPostDate(post.date)}</time>
                </div>
                <h2 className="mb-3 text-2xl font-semibold leading-snug text-cream group-hover:text-gold-bright">
                  {post.title}
                </h2>
                <p className="text-cream/65">{post.excerpt}</p>
              </div>
            </Link>
          ))}
        </div>
      </section>
    </div>
  );
}
