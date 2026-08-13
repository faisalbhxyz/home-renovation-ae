# Contributing

This repository is the production codebase for [homerenovationae.com](https://homerenovationae.com). Keep changes small, typed, and ready to deploy.

## Setup

1. Use Node.js 22 (`.nvmrc`).
2. Install dependencies with `npm ci`.
3. Run `npm run dev` for local work.

Do not commit `.env` files, secrets, or original unoptimized assets under `public/images/_originals/`.

## Before opening a pull request

```bash
npm run lint
npm run typecheck
npm run build
```

All three must pass. GitHub Actions runs the same checks on `main` and on pull requests.

## Pull requests

- Target `main`.
- Describe **why** the change exists, not only what files moved.
- Include screenshots for visible UI changes.
- Keep the public site in English; do not mix in placeholder copy.

## Code notes

- Reuse `Header`, `Footer`, and existing button/layout classes. Do not add a second button or input primitive.
- Every page needs unique metadata (title, description, canonical, Open Graph).
- Prefer `next/image` with WebP/AVIF. Mark the LCP image with `priority`.
- Validate user input on the server if you add forms or API routes.
