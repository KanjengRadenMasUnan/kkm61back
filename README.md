
```
backend-kkm
├─ .editorconfig
├─ .npmrc
├─ app
│  ├─ Http
│  │  └─ Controllers
│  │     ├─ ApiController.php
│  │     └─ Controller.php
│  ├─ Models
│  │  ├─ Admin.php
│  │  ├─ Anggota.php
│  │  ├─ Berita.php
│  │  ├─ Kegiatan.php
│  │  ├─ ProgramKerja.php
│  │  └─ User.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ cacert.pem
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ cors.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ sanctum.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_07_20_103618_create_personal_access_tokens_table.php
│  │  ├─ 2026_07_20_103909_create_anggotas_table.php
│  │  ├─ 2026_07_20_103910_create_program_kerjas_table.php
│  │  ├─ 2026_07_20_103911_create_beritas_table.php
│  │  ├─ 2026_07_20_103912_create_kegiatans_table.php
│  │  ├─ 2026_07_20_133921_create_admins_table.php
│  │  └─ 2026_07_21_173347_change_foto_column_type_in_anggota_table.php
│  └─ seeders
│     └─ DatabaseSeeder.php
├─ Dockerfile
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  └─ app.js
│  └─ views
│     └─ welcome.blade.php
├─ routes
│  ├─ api.php
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  │     └─ uploads
│  │        ├─ anggota
│  │        │  ├─ 0jcdR4DpJasjOuhZgOOtdo2veAJfx5ePUQqd2ALm.png
│  │        │  ├─ 1TtxpZwFtKIG9dqPIkp54HoBNVrVfE8f8Z4A841k.png
│  │        │  ├─ 2lBtbeqTzwp27V9nKM6b4Tr1MpjKqfGkPBoEDTPn.png
│  │        │  ├─ 3pvH24R6yu46dldC83MXnpL0SGKy9Fn5dTpCoFGP.png
│  │        │  ├─ 7c2Px8oMqq7Ktz4KkQfFZK6UwDMBY2lwgbEv727a.png
│  │        │  ├─ 7mAu3qQxz0rF9kCNwKO7c9BV88FuswQcQJ4BJXW4.png
│  │        │  ├─ CYZi0SvyYQKNAWyFWXtaVjmmaQxRINQCWMukvzes.png
│  │        │  ├─ Ip8gxQFVhI7kn1sn6mHEqsC8p6euLXRd8Pg3DG89.png
│  │        │  ├─ JwIhFhaS0MCJ9ebSa5g5zJmPZmKX1FOfyduC86QL.png
│  │        │  ├─ KXub4VaRDYO6acen7GEp3vrI16PlQEE5aVTmDMYe.png
│  │        │  ├─ OobQ4yWRXAYFyelXZBWTb7EHikH0nmuOHHi2UIh0.png
│  │        │  ├─ P0bmZVWLd4aNhnjgrHkleKqt9JJQ5TQqxCYc7biM.png
│  │        │  ├─ PVknq00pEIKAQaYyNEkH2vN93iavZgNwIzm8p77w.png
│  │        │  ├─ S5z3jHXisozfa2U95ogqxZjFU3dh0dwTigmD4jH0.png
│  │        │  ├─ UqPmlGXqS3LgEeukWCvV7OVWkH0csFSkSI6mkapA.png
│  │        │  ├─ uu0Wa6jWqTQf2zO96cKJE5uMi2O4t11Mlw96xRwl.png
│  │        │  ├─ UxBA82uZzbKm0yYHB45I8ns4TaVYtBU4t7mM4uFn.png
│  │        │  ├─ w5Co5FF2qneISaofVfT4yWxsqfHXC323FKBhOC8a.jpg
│  │        │  └─ Y8H61XGcCHR5m0FITKB6Rw7yF3SAECk2ZIgvVMIP.png
│  │        └─ berita
│  │           ├─ 1784558978_WhatsApp Image 2026-07-19 at 11.24.57.jpeg
│  │           ├─ 1784559203_WhatsApp Image 2026-07-19 at 11.24.57.jpeg
│  │           ├─ 1784559260_WhatsApp Image 2026-07-19 at 11.24.57.jpeg
│  │           ├─ 1784562290_6264530408099746166.jpg
│  │           ├─ 1784562474_6264896253414019133.jpg
│  │           ├─ 1784563379_6264530408099746166.jpg
│  │           ├─ 1784600071_WhatsApp Image 2026-07-19 at 11.24.57.jpeg
│  │           ├─ 1784625320_6264530408099746166.jpg
│  │           ├─ 1784625406_6264530408099746166.jpg
│  │           ├─ 1784630656_6264530408099746166.jpg
│  │           ├─ 1784630675_6264530408099746166.jpg
│  │           ├─ 1784630705_6264530408099746166.jpg
│  │           ├─ 1784630870_6264530408099746166.jpg
│  │           ├─ 1784630935_6264530408099746166.jpg
│  │           ├─ 1784640504_6264530408099746166.jpg
│  │           ├─ 1784642171_6264530408099746166.jpg
│  │           ├─ 1784642328_6264530408099746166.jpg
│  │           ├─ canvas
│  │           │  └─ 1784562290_1_6264530408099746166.jpg
│  │           └─ ydp6Tddk3IcdHZAJM6uIVEsGOXykDb3blWnv1BRg.jpg
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  └─ logs
├─ tests
│  ├─ Feature
│  │  └─ ExampleTest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```