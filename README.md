# foundIT - Local Setup Guide

## Requirements
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)

## 1. Jalankan Server

Pilih salah satu metode:

- **XAMPP**  
  Buka XAMPP dan nyalakan Apache & MySQL

- **MySQL**  
  1. Start MySQL  
  2. Klik "Admin" untuk membuka phpMyAdmin

- **Docker**  
  Jika menggunakan Docker, gunakan `docker-compose` atau `Dockerfile`

## 2. Buat Database
  ```bash
  CREATE DATABASE IF NOT EXISTS `foundit_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
  ```

## 3. Install dan Jalankan Aplikasi
1. Install dependency PHP
```bash
  composer install 
```
2. Copy konfigurasi environment
```bash
  cp .env.example .env
```
3. Generate APP_KEY
```bash
  php artisan key:generate
```
4. Buat data dummy 
```bash
  php artisan migrate:fresh --seed
```
5. Aktifkan upload foto
```bash
  php artisan storage:link
```
6. Jalankan backend Laravel
```bash
  php artisan serve
```
7. Install dependency JS
```bash
  npm install
```
8. Jalankan frontend Vite
```bash
  npm run dev
``` 
