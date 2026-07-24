import type { MetadataRoute } from "next";
import { getPostsNewestFirst } from "@/data/posts";

const base = "https://homerenovationae.com";

const services = [
  "home-decorations-dubai",
  "painting-dubai",
  "furniture-dubai",
  "flooring-dubai",
  "curtains-dubai",
  "office-decorations-dubai",
];

export default function sitemap(): MetadataRoute.Sitemap {
  const posts = getPostsNewestFirst();
  const now = new Date(posts[0]?.date ?? "2026-07-24");
  return [
    { url: `${base}/`, lastModified: now, changeFrequency: "weekly", priority: 1 },
    { url: `${base}/blog`, lastModified: now, changeFrequency: "weekly", priority: 0.9 },
    ...services.map((slug) => ({
      url: `${base}/${slug}`,
      lastModified: now,
      changeFrequency: "monthly" as const,
      priority: 0.85,
    })),
    ...posts.map((post) => ({
      url: `${base}/blog/${post.slug}`,
      lastModified: new Date(post.date),
      changeFrequency: "monthly" as const,
      priority: 0.8,
    })),
  ];
}
