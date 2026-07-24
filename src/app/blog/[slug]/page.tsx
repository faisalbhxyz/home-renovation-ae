import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { notFound } from "next/navigation";
import { getAllSlugs, getPost, getPostsNewestFirst } from "@/data/posts";
import { buildBlogJsonLd } from "@/lib/blogSchema";
import { formatPostDate } from "@/lib/formatDate";

type Props = { params: Promise<{ slug: string }> };

export async function generateStaticParams() {
  return getAllSlugs().map((slug) => ({ slug }));
}

export async function generateMetadata({ params }: Props): Promise<Metadata> {
  const { slug } = await params;
  const post = getPost(slug);
  if (!post) return {};
  return {
    title: post.title,
    description: post.meta,
    keywords: [
      post.focus,
      ...post.secondaryKeywords,
      "home renovation Dubai",
      "Home Renovation AE",
    ],
    alternates: { canonical: `/blog/${post.slug}` },
    openGraph: {
      type: "article",
      title: post.title,
      description: post.meta,
      url: `/blog/${post.slug}`,
      images: [post.image],
      publishedTime: post.date,
      modifiedTime: post.date,
    },
    twitter: {
      card: "summary_large_image",
      title: post.title,
      description: post.meta,
      images: [post.image],
    },
  };
}

export default async function BlogPostPage({ params }: Props) {
  const { slug } = await params;
  const post = getPost(slug);
  if (!post) notFound();

  const related = getPostsNewestFirst()
    .filter((p) => p.slug !== post.slug)
    .slice(0, 3);

  const jsonLd = buildBlogJsonLd(post);

  return (
    <article className="pb-20" itemScope itemType="https://schema.org/BlogPosting">
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(jsonLd) }}
      />

      <header className="relative min-h-[52vh] overflow-hidden">
        <Image
          src={post.image}
          alt={`${post.focus} — ${post.title}`}
          fill
          priority
          className="object-cover"
          sizes="100vw"
        />
        <div className="absolute inset-0 bg-[linear-gradient(180deg,rgba(10,10,10,0.45)_0%,rgba(10,10,10,0.82)_100%)]" />
        <div className="container relative z-10 flex min-h-[52vh] flex-col justify-end pb-12 pt-24">
          <nav className="mb-5 flex flex-wrap items-center gap-2 text-sm text-cream/60" aria-label="Breadcrumb">
            <Link href="/" className="hover:text-gold">
              Home
            </Link>
            <span aria-hidden>/</span>
            <Link href="/blog" className="hover:text-gold">
              Blog
            </Link>
            <span aria-hidden>/</span>
            <span className="text-cream/85">{post.categories[0]}</span>
          </nav>
          <p className="eyebrow">{post.categories.join(" · ")}</p>
          <h1
            className="mb-4 max-w-4xl text-3xl font-bold tracking-tight text-cream md:text-5xl"
            itemProp="headline"
          >
            {post.title}
          </h1>
          <p className="mb-3 text-sm text-cream/60">
            <time dateTime={post.date} itemProp="datePublished">
              {formatPostDate(post.date)}
            </time>
          </p>
          <p className="max-w-2xl text-lg text-cream/75" itemProp="description">
            {post.excerpt}
          </p>
        </div>
      </header>

      <div className="container grid gap-12 py-14 lg:grid-cols-[minmax(0,1fr)_280px]">
        <div
          className="prose-blog max-w-3xl"
          itemProp="articleBody"
          dangerouslySetInnerHTML={{ __html: post.content }}
        />
        <aside className="h-fit border border-[rgba(196,165,116,0.22)] bg-[rgba(255,255,255,0.02)] p-6 lg:sticky lg:top-28">
          <h2 className="mb-3 text-lg font-semibold text-cream">
            Get a free Dubai renovation quote
          </h2>
          <p className="mb-5 text-sm text-cream/65">
            Villa renovation, apartment makeover, painting, flooring, curtains and office fit-out — WhatsApp for pricing.
          </p>
          <a
            className="btn btn-gold w-full"
            href="https://wa.me/971562889635?text=Hi%2C%20I%20want%20a%20quote%20for%20home%20renovation%20in%20Dubai."
            target="_blank"
            rel="noopener noreferrer"
          >
            WhatsApp Quote
          </a>
          <a className="btn btn-outline-light mt-3 w-full" href="tel:+971562889635">
            +971 56 288 9635
          </a>
        </aside>
      </div>

      <section className="container border-t border-[rgba(196,165,116,0.14)] pt-14">
        <h2 className="mb-8 text-2xl font-bold text-cream">More Dubai renovation guides</h2>
        <div className="grid gap-5 md:grid-cols-3">
          {related.map((p) => (
            <Link
              key={p.slug}
              href={`/blog/${p.slug}`}
              className="border border-[rgba(196,165,116,0.2)] p-5 transition hover:border-gold/45"
            >
              <p className="mb-2 text-xs uppercase tracking-[0.14em] text-gold">{p.focus}</p>
              <h3 className="text-lg font-semibold leading-snug text-cream">{p.title}</h3>
            </Link>
          ))}
        </div>
      </section>
    </article>
  );
}
