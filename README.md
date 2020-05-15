## project installation

Dalam test ini saya menggunakan php framework berupa laravel
1. cara installasi:
    - <code>git clone https://github.com/RaflyLesmana3003/test-dot</code>
    - setelah selesai pastikan di komputer anda sudah terinstall php dan composer
    - jika sudah lalu masuk ke folder test <code>cd test-dot</code>
    - lalu jalankan <code>composer install</code>
    - dan jangan lupa generate file <code>.env</code> dengan <code>cp .env.example .env</code>

2. cara menjalankan branch 1
    - pada branch 1 yaitu get database info, saya mengambil data dari <code>.env</code>
    - saya permudah dengan hanya membuka project, akan menampilkan database info
3. cara menjalankan branch 2
    - ambil data provinsi <code>{localhost}/provinces</code>
    - mencari provinsi <code>{localhost}/provinces/{code}</code>
     - ambil data kota <code>{localhost}/cities</code>
    - mencari kota <code>{localhost}/cities/{code}</code>
