# Back-end-Du-an-SweetHome (Run Laravel)
<br>
1. Chạy lệnh composer i 
<br>
2, Chạy lệnh cp .env.example .env để tạo file .env mới
<br>
3. Đổi DB_USERNAME và DB_PASSWORD trong file .env
<br>
4. Import file job_portal_2021_06_28.sql vào database
<br>
5. Chạy lệnh php artisan serve để khởi động server
<br>
6. chạy testing: sudo apt-get install php-sqlite3


# Back-end-Du-an-SweetHome

 Chạy các lệnh sau để project hoạt động.
 
- 1.1: composer install.
- 1.2: npm install.
- 1.3: cp .env.example .env
- 1.4: Vào file .env thay đổi các thông tin database của mình:
 -     DB_DATABASE= (db name)
 -     DB_USERNAME=root
 -     DB_PASSWORD=(root password.)
- 1.5: php artisan jwt:secret
- 1.6: php artisan migrate .
- 1.7: composer require staudenmeir/eloquent-has-many-deep:"^1.12"
- 2: php artisan serve để chạy api.
 
