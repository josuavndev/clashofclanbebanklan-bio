# CLASHOFCLANBEBANKLAN Bio — Laravel

Laravel 13 version of the original Neo-Brutalism + Dopamine + Kinetic Typography bio hub.

## Struktur utama

- `resources/views/home.blade.php` — tampilan utama. Desain demo dipertahankan.
- `routes/web.php` — route halaman utama.
- `config/` — konfigurasi Laravel.
- `public/` — entry point dan asset publik.
- `api/index.php` + `vercel.json` — adapter deployment Vercel.

## Edit tampilan

Untuk mengubah teks, section, warna, tombol, animasi, atau layout, edit:

`resources/views/home.blade.php`

Source ini sengaja mempertahankan markup dan JavaScript demo supaya migrasi tidak mengubah tampilan.

## Jalankan lokal

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Buka `http://127.0.0.1:8000`.

## Catatan Vercel

Project memakai community PHP runtime `vercel-php` melalui `vercel.json`. Composer dependency di-install oleh runtime saat deployment.
