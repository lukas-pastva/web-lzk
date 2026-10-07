# web-lzk – Ludia Z Konca (lzk.tronic.sk)

Moja prvá webstránka (2006): skate, BMX, graffiti a hip-hop portál našich "crews" z Kysúc.

Od 2026-10-07 je to **statický archív** na Cloudflare Pages. Pôvodný PHP + MySQL kód
(články, fórum, bleskovky, admin) je v histórii gitu; obsah bol vyrenderovaný z DB do `public/`.

- `public/` – hotové HTML + obrázky. `/` články, `/clanok/<id>/`, `/forum/` (len na čítanie),
  galérie `/sk8/`, `/bike/`, `/write/`, … Triedenie galérií robí JS v `public/script.js`.
- `functions/_middleware.js` – 301 zo starých URL `site.php?x=..&id=..` na nové cesty.
- `db/db.sql` – posledný dump databázy (archív, web ho nepoužíva).
- Nasadenie: push do `main` → `.gitlab-ci.yml` → `wrangler pages deploy public`.

Lokálne: `npx wrangler@4 pages dev public`.
