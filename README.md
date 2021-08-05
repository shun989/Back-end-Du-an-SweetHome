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
 
