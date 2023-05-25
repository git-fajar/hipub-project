Nama : Muhammad Fajar Ali Shodiq
NIM : 170535629539

Link Github: https://github.com/git-fajar/hipub-project.git

Clone Project Laravel dari Github
- git clone link_github
- rename .env dan buat database
- install composer (composer install / composer update)
- jika menggunakan nodeJS (npm install)
- php artisan key:generate
- php artisan migrate
- php artisan db:seed nama_file (CreateUsersSeeder)
- php artisan serve
- npm run dev (jika menggunakan npm nodeJS)


Create Tailwind 
- install (terminal)
  npm install -D tailwindcss
  npx tailwindcss init
- konfigurasi lokasi tailwind.config.js
  ... content: ["./src/**/*.{html,js}"], ...
- tambah pada src/input.css
  @tailwind base;
  @tailwind components;
  @tailwind utilities;
- copy paste di head html
  <link href="/dist/output.css" rel="stylesheet">
- run (terminal)
  npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch
