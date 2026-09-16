# Station Film

Custom WordPress theme for [Station Film](https://stationfilm.com), a film & TV production company site showcasing directors, original content, and social/branded work.

🔗 **Live site:** [stationfilm.com](https://stationfilm.com)

## What's in this repo

This is the theme folder of a WordPress install (goes inside `wp-content/themes/`):

- **Custom post templates** for directors (`single-director.php`, `page-directors.php`), originals (`page-originals.php`), social work (`page-social.php`), and general content (`single-more.php`, `single.php`).
- **`front-page.php`** — the homepage layout.
- **`inc/`** — theme setup helpers (custom header, customizer, Jetpack support, template tags).
- **`template-parts/`** — reusable content templates for loops, search results, and social posts.
- **`transform.js`** — custom scroll/transition interactions used across the site.

## Requirements

- WordPress (this theme doesn't include WordPress core)
- PHP 7.4+

## Note

This repo doesn't include WordPress core or media uploads — it's meant to sit inside an existing WordPress install's `wp-content/themes/` folder.
