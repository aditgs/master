Sekilas Tentang Codeigniter Framework 

Codeigniter Basic Project 2014 merupakan sebuah paket framework CI + Bootstrap + jQUery dan beberapa Library yang telah disusun dan dikembangkan oleh Roniwahyu.web.id. Didalamnya termasuk beberapa komponen: 
- jQUery
- Bootstrap 3.3.2
- Template Library 
- Datatables Library
- Ajax CRUD Generator yang telah diimprovisasi,dll.

Dukungan template dan themes bootstrap, dan HMVC yang lebih modular sehingga Anda dapat memisahkan modul-modul untuk Backend, Frontend dan sebagainya. Termasuk didalamnya adalah permalink helper yang mirip dengan Wordpress, karena pengembang adalah orang yang Wordpress Minded. Tentunya paket ini jauh dari kesempurnaan, jadi saya mengundang Anda untuk bergabung dan dapat berkontribusi untuk masa depan Indonesia yang lebih baik. 

--------------------------------

CI Kinerja SAW (Simple Additive Weighting) + Rating Scale

Merupakan aplikasi sederhana yang digunakan untuk melakukan penilaian kinerja karyawan. Performance Appraisal dengan menggunakan metode SAW (Simple Additive Weighting). Penilaian Kinerja dilakukan pada karyawan tidak tetap pada sebuah perusahaan.

----------------------------------

Petunjuk Penggunaan

1. Download dan ekstrak semua pada folder htdocs/ci-kinerja-saw, Anda dapat mengganti nama folder sesuai kebutuhan. Misal: ci-kinerja-saw --> penilaian-saw
2. Lakukan import database dari file sql yang telah disediakan ke Server MySQL lokal
3. Lakukan penyesuaian database pada file database.php di folder ./apps/config/
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root'; <--- sesuaikan dengan username anda
$db['default']['password'] = ''; <--- sesuaikan dengan password anda
$db['default']['database'] = 'ci-rekom-spp'; <--- sesuaikan dengan nama database anda
$db['default']['dbdriver'] = 'mysql'; 
4. Lakukan penyesuaian pada file assets.php di folder ./apps/config/
$config['assets_url'] = "http://".$_SERVER['HTTP_HOST']."/penilaian-saw/assets/"; <--- sesuaikan dengan nama folder yang sudah ditentukan dari awal, Misal: penilaian-saw
5. Aplikasi Siap digunakan.


Silakan Hubungi kami:
Syahroni Wahyu Iriananda, S.Kom
roniwahyu@gmail.com
085 649 555 925