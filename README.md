<!-- Setup Database -->

jalanin di local

-   Buka XAMPP / MySQL (start mysql -> klik "admin")
-   Buat database foundit_db
-   Config file .env:
    DB_CONNECTION=mysql
    DB_DATABASE=foundit_db
-   Jalankan :
    php artisan key:generate (Pembuatan tabel pada db)
    php artisan migrate --seed (untuk data dummy)
