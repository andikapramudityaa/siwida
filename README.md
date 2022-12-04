# Sistem Informasi Wisata Desa

## Latar Belakang
Sistem Informasi Wisata Desa (Siwida) adalah Sistem yang dibuat dengan tujuan memberi informasi wisata desa yang ada di Kecamatan Leuwiliang.

## ✅ Requirements
- XAMPP (Local Dev)
- Composer

## Instalasi
- Clone Repository
```console
git clone https://github.com/rReyvn/siwida.git
```
- Migrate Database
```console
php artisan migrate:fresh --seed
```
- Membuat Akses Storage menjadi Publik
```console
php artisan storage:link
```
- Jalankan
```console
php artisan serve
```
