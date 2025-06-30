How to run FoundIt on Local
---
**Requirement**
- Composer setup
- Node.js

1.  Server:
    - Jika memakai Xampp, buka dan nyalakan XAMPP
    - Jika memakai MySQL: 1) start mysql, 2) klik "admin"

2.  Buat database foundit_db
3.  Jalankan :
    - composer install
    - cp .env.example .env
    - php artisan key:generate 
    - php artisan migrate:fresh
    - php artisan serve
    - php artisan storage:link (upload gambar)
    - npm install
    - npm run dev dan klik link bagian APP_URL
