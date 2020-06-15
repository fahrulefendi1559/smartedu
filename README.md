# smartedu
berikut cara install file laravel kedalam komputer anda di jaringan lokal
pertama clone terlebih dahulu project laravel ini, setelah masuk selesai clone project maka lakukan tahapan berikut
cp .env.example .env //melakukan rename file env.example menjadi env
php artisan key:generate
sebelum anda melakukan migrasi database setting di file .env untuk database, username dan password kemudian anda buat database berdasarkan nama database yang anda masukkan kedalam file .env
kemudian jalankan perintah ini php artisan migrate
jika sudah selesai anda bisa menghidupkan server local anda dengan perintah php artisan serve
