# Home Renovation AE

Marketing site for **Home Renovation AE**, a Dubai studio for luxury home renovation and interior décor.

**Production:** [homerenovationae.com](https://homerenovationae.com)

## Stack

- [Next.js](https://nextjs.org/) 16 (App Router) and React 19
- TypeScript (strict)
- Tailwind CSS 4
- Deployed on [Vercel](https://vercel.com)

## Requirements

- Node.js 22 (see `.nvmrc`)
- npm 10+

## Local development

```bash
npm ci
npm run dev
```

Open [http://localhost:3000](http://localhost:3000).

| Script | Purpose |
| --- | --- |
| `npm run dev` | Development server |
| `npm run lint` | ESLint |
| `npm run typecheck` | TypeScript (`tsc --noEmit`) |
| `npm run build` | Production build |
| `npm start` | Serve the production build |

## Project structure

```
src/app/            Pages, metadata, sitemap, robots
src/components/     Shared Header and Footer
src/data/           Blog posts
src/lib/            JSON-LD and date helpers
public/images/      Portfolio and brand assets (WebP / JPEG)
```

Service landing pages live under `src/app/[slug]/page.tsx`:

- `/home-decorations-dubai`
- `/painting-dubai`
- `/furniture-dubai`
- `/flooring-dubai`
- `/curtains-dubai`
- `/office-decorations-dubai`

## Deployment

Vercel builds from the `main` branch. After changing environment variables, trigger a new deployment — `NEXT_PUBLIC_*` values are baked in at build time.

The previous WordPress export is preserved on the `archive/wordpress` branch and is not part of the live app.

## License

Proprietary. See [LICENSE](LICENSE).
