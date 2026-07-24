import type { BlogPost } from "@/data/posts";
import { BASE, businessSchema } from "@/lib/businessSchema";

function extractFaqs(html: string): { question: string; answer: string }[] {
  const faqs: { question: string; answer: string }[] = [];
  const re = /<p><strong>([\s\S]*?)<\/strong><br\s*\/?>([\s\S]*?)<\/p>/gi;
  let match: RegExpExecArray | null;
  while ((match = re.exec(html)) !== null) {
    const question = match[1].replace(/<[^>]+>/g, "").trim();
    const answer = match[2].replace(/<[^>]+>/g, "").trim();
    if (question && answer) faqs.push({ question, answer });
  }
  return faqs;
}

export function buildBlogJsonLd(post: BlogPost) {
  const url = `${BASE}/blog/${post.slug}`;
  const image = post.image.startsWith("http") ? post.image : `${BASE}${post.image}`;
  const faqs = extractFaqs(post.content);

  const graph: Record<string, unknown>[] = [
    {
      "@type": "BlogPosting",
      "@id": `${url}#article`,
      headline: post.title,
      description: post.meta,
      keywords: [post.focus, ...post.secondaryKeywords].join(", "),
      datePublished: post.date,
      dateModified: post.date,
      inLanguage: "en-AE",
      isAccessibleForFree: true,
      mainEntityOfPage: {
        "@type": "WebPage",
        "@id": url,
      },
      image: {
        "@type": "ImageObject",
        url: image,
      },
      author: {
        "@type": "Organization",
        name: "Home Renovation AE",
        url: BASE,
      },
      publisher: {
        "@id": `${BASE}/#business`,
      },
      about: {
        "@type": "Service",
        name: post.focus,
        areaServed: "Dubai",
        provider: { "@id": `${BASE}/#business` },
      },
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
          name: "Blog",
          item: `${BASE}/blog`,
        },
        {
          "@type": "ListItem",
          position: 3,
          name: post.title,
          item: url,
        },
      ],
    },
    businessSchema,
  ];

  if (faqs.length) {
    graph.push({
      "@type": "FAQPage",
      "@id": `${url}#faq`,
      mainEntity: faqs.map((faq) => ({
        "@type": "Question",
        name: faq.question,
        acceptedAnswer: {
          "@type": "Answer",
          text: faq.answer,
        },
      })),
    });
  }

  return {
    "@context": "https://schema.org",
    "@graph": graph,
  };
}
