.htaccess merupakan file untuk mengkofigurasi dari server apache
Options -Indexs = kalau ada user membuka folder dan folder2 yg didlm nya selama tidak ada file indexnmaka jangan tampilkan isinya blok aksesnya.

Options -Multiviews = untuk menghindari kesalahan atau ambigu ketika memanggil folder/file didalam public.

RewriteEngine On = atau menulis ulang URL yang ada di browser.

berikut konfigursi RewriteEngine :

RewriteCond %{REQUEST_FILENAME} !-d / yang merupakan folder abaikan
RewriteCond %{REQUEST_FILENAME} !-f / yang merupakan file abaikan
RewriteRule ^(.\*)$ index.php?url=$1 [L] / menulis ulang URLnya

REGEKS = regular exspesion
^ = membaca apapun yang ditulis url mulai dari awal
(._)$ = ambil apapun ".", "_" ambil karkternya satu persatu ,sampai karakternya selesai "$" kecuali enter, lalu arahkan ke file index.php yang "?" mengirimkan "url=" "$1" placholder. [L] kalau ada rule yang terpenuhi jangan jalankan rule lain setelah ini.
