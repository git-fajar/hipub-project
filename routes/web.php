<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlinikController;
use App\Models\Jadwal;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$this->jadwal = new Jadwal();


Route::get('/', function () {
    $blog_posts = [
        [
            "title" => "Tips Kepenulisan Yang Wajib Penulis Pemula Tahu",
            "slug" => "artikel-pertama",
            "author" => "Andi Firmansyah",
            "date" => "20 Maret 2022",
            "image" => "/blog1.jpg",
            "body" => "Menjadi seorang penulis pemula bisa menjadi tantangan besar..."
        ],
        [
            "title" => "Cara jitu menulis artikel yang baik dan benar sesuai kaidah",
            "slug" => "artikel-kedua",
            "author" => "Charles Gunawan",
            "image" => "/blog2.jpg",
            "date" => "14 Mei 2022",
            "body" => "Menulis artikel yang baik dan benar memerlukan pemahaman..."
        ],
        [
            "title" => "Cara membuat sebuah artikel SEO Friendly",
            "slug" => "artikel-ketiga",
            "author" => "John Doe",
            "image" => "/blog3.jpg",
            "date" => "5 Agustus 2022",
            "body" => "Membuat artikel SEO friendly adalah salah satu strategi..."
        ]
    ];

    $data_calendar = $this->jadwal->show_all();
    return view('landing-page', [
        "title" => "Posts",
        "posts" => $blog_posts,
        "data_calendar" => $data_calendar
    ]);
});

Route::get('/help', function () {
    return view('/help');
});

Route::get('/home', [DashboardController::class, 'index'])->name('home');


Auth::routes();

// ROUTE USER
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/{id}/artikel/', [ArticleController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/revisi/', [ArticleController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}/update/', [ArticleController::class, 'update'])->name('user.update');
    Route::get('/user/{id}/revisi_vendor/', [ArticleController::class, 'edit_vendor'])->name('user.edit_vendor');
    Route::put('/user/{id}/update_vendor/', [ArticleController::class, 'update_vendor'])->name('user.update_vendor');
    Route::get('/user/{id}/payment/', [ArticleController::class, 'payment'])->name('user.payment');
    Route::post('/user/{id}/submit_payment/', [ArticleController::class, 'submit_payment'])->name('user.submit_payment');
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.home');
    Route::get('/user/artikel', [ArticleController::class, 'index'])->name('user.artikel');
    Route::get('/user/log', [LogController::class, 'index'])->name('user.log');
    Route::get('/user/klinik', [KlinikController::class, 'index_user'])->name('user.klinik');
    Route::get('/user/{id}/show_agenda', [KlinikController::class, 'show_agenda'])->name('user.show_agenda');
    Route::post('/user/{id}/add_jadwal', [KlinikController::class, 'add_jadwal'])->name('user.add_jadwal');
});

// ROUTE ADMIN
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/{id}/artikel/', [ArticleController::class, 'show']);
    Route::get('/admin/{id}/payment/', [ArticleController::class, 'payment_verification'])->name('admin.payment_verification');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::get('/admin/artikel', [ArticleController::class, 'index'])->name('admin.artikel');
    Route::get('/admin/log', [LogController::class, 'index'])->name('admin.log');
    Route::get('/admin/download/{nama_file}', [ArticleController::class, 'download_file'])->name('admin.download');
    Route::get('/admin/download_payment/{nama_file}', [ArticleController::class, 'download_file_payment'])->name('admin.download_payment');
    Route::get('/admin/klinik', [KlinikController::class, 'index'])->name('admin.klinik');
    Route::put('/admin/{id}/update_payment/', [ArticleController::class, 'update_payment'])->name('admin.update_payment');
    Route::get('/admin/add_agenda', [KlinikController::class, 'add_agenda'])->name('admin.add_agenda');
    Route::get('/admin/{id}/edit_agenda', [KlinikController::class, 'edit_agenda'])->name('admin.edit_agenda');
    Route::post('/admin/save_agenda', [KlinikController::class, 'save_agenda'])->name('admin.save_agenda');
    Route::put('/admin/{id}/update_agenda/', [KlinikController::class, 'update_agenda'])->name('admin.update_agenda');
});

// ROUTE EDITOR
Route::middleware(['auth', 'user-access:editor'])->group(function () {
    Route::get('/editor/{id}/artikel/', [ArticleController::class, 'show_editor']);
    Route::get('/editor/dashboard', [DashboardController::class, 'index'])->name('editor.home');
    Route::get('/editor/artikel', [ArticleController::class, 'index_editor'])->name('editor.artikel');
    Route::get('/editor/download/{nama_file}', [ArticleController::class, 'download_file'])->name('editor.download');
    Route::put('/editor/{id}/save', [ArticleController::class, 'save_log'])->name('editor.save_log');
    // Route::get('/editor/log', [LogController::class, 'index'])->name('editor.log');
    // Route::get('/editor/klinik', [DashboardController::class, 'klinik'])->name('editor.klinik');
});

// ROUTE VENDOR
Route::middleware(['auth', 'user-access:vendor'])->group(function () {
    Route::get('/vendor/{id}/artikel/', [ArticleController::class, 'show_vendor']);
    Route::get('/vendor/dashboard', [DashboardController::class, 'index'])->name('vendor.home');
    Route::get('/vendor/artikel', [ArticleController::class, 'index_vendor'])->name('vendor.artikel');
    Route::get('/vendor/download/{nama_file}', [ArticleController::class, 'download_file'])->name('vendor.download');
    Route::put('/vendor/{id}/save', [ArticleController::class, 'save_log'])->name('vendor.save_log');
    // Route::get('/vendor/log', [LogController::class, 'index'])->name('vendor.log');
    // Route::get('/vendor/klinik', [DashboardController::class, 'klinik'])->name('vendor.klinik');
});

Route::get('/akun/{id}', [HomeController::class, 'profile'])->name('profile');
Route::put('/save_profile/{id}', [HomeController::class, 'save_profile'])->name('save_profile');
Route::get('/article', [ArticleController::class, 'index']);
Route::get('/add_article', [ArticleController::class, 'create']);
Route::post('/store_article', [ArticleController::class, 'store']);
Route::get('/show_article/{id}', [ArticleController::class, 'show']);
Route::get('/edit_article/{id}', [ArticleController::class, 'edit']);
Route::put('/update_article/{id}', [ArticleController::class, 'update']);
Route::get('/hapus_article/{id}', [ArticleController::class, 'delete']);

Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Tips Kepenulisan Yang Wajib Penulis Pemula Tahu",
            "slug" => "artikel-pertama",
            "author" => "Andi Firmansyah",
            "date" => "20 Maret 2022",
            "image" => "/blog1.jpg",
            "body" => "Menjadi seorang penulis pemula bisa menjadi tantangan besar, terutama jika Anda tidak tahu tips kepenuilisan yang wajib diketahui. Namun, dengan mengetahui beberapa tips dan trik yang dapat membantu Anda menulis dengan lebih baik, Anda dapat meningkatkan keterampilan menulis dan menghasilkan tulisan yang lebih baik. Berikut adalah delapan tips kepenuilisan yang wajib diketahui oleh penulis pemula.
            
            Pertama, cari tahu topik yang ingin Anda tulis. Sebelum mulai menulis, carilah topik yang ingin Anda tulis. Jika Anda tidak memiliki ide, cobalah mencari inspirasi dari sumber yang berbeda, seperti membaca buku, artikel, atau mengikuti tren terbaru. Dengan menemukan topik yang menarik, Anda akan lebih termotivasi untuk menulis dan mempertahankan fokus dalam tulisan Anda.
            
            Kedua, buat outline atau kerangka tulisan. Setelah menemukan topik, buatlah outline atau kerangka tulisan Anda. Hal ini akan membantu Anda mempertahankan alur tulisan dan membuat tulisan Anda lebih mudah dipahami. Cobalah mengatur urutan ide dan gagasan Anda sehingga mudah diikuti oleh pembaca.
            
            Ketiga, gunakan bahasa yang mudah dipahami. Saat menulis, gunakan bahasa yang mudah dipahami oleh pembaca. Hindari penggunaan kata-kata teknis atau terlalu formal kecuali jika memang diperlukan dalam konteks tulisan. Bahasa yang mudah dipahami akan membuat pembaca lebih tertarik dan membuat tulisan Anda lebih efektif.
            
            Keempat, perhatikan tata bahasa dan ejaan. Sebuah tulisan yang baik harus memiliki tata bahasa dan ejaan yang benar. Pastikan Anda memperhatikan tata bahasa dan ejaan yang digunakan dalam tulisan, dan periksa kembali sebelum mengirimkan tulisan tersebut. Kesalahan dalam tata bahasa dan ejaan dapat mempengaruhi kredibilitas tulisan Anda.
            Kelima, gunakan referensi dan sumber yang akurat. Saat menulis artikel, pastikan Anda menggunakan referensi dan sumber yang akurat dan terpercaya. Hal ini penting untuk menjaga kredibilitas artikel yang Anda tulis. Gunakan sumber-sumber yang dapat dipertanggungjawabkan dan sesuai dengan topik yang sedang dibahas.
            
            Keenam, tulis dengan gaya Anda sendiri. Salah satu kelebihan menulis adalah Anda dapat mengekspresikan ide dan gagasan Anda dengan gaya Anda sendiri. Gunakan gaya Anda sendiri dalam menulis dan jangan mencoba meniru gaya penulisan orang lain. Gaya penulisan yang unik dan orisinal akan membuat tulisan Anda lebih menarik dan membantu Anda membangun identitas sebagai penulis.
            
            Ketujuh, jangan takut untuk mengedit tulisan Anda. Setelah menyelesaikan tulisan, jangan takut untuk mengedit kembali tulisan Anda. Cek kembali alur tulisan, tata bahasa, ejaan, dan kesesuaian dengan topik yang Anda bahas. Hal ini akan membantu Anda memastikan tulisan Anda sudah baik dan siap untuk dipublikasikan.
            
            Kedelapan, baca dan revisi tulisan Anda. Setelah melakukan pengeditan, baca kembali tulisan Anda untuk memastikan tulisan sudah terlihat baik. Baca secara perlahan dan teliti, dan periksa kembali kesesuaian topik dengan alur tulisan. Dengan membaca kembali tulisan Anda, Anda dapat menemukan kesalahan kecil yang mungkin terlewatkan selama proses pengeditan.
            
            Terakhir, jangan pernah takut untuk mencoba. Menjadi penulis yang baik membutuhkan latihan dan pengalaman. Jangan pernah takut untuk mencoba menulis tentang topik yang berbeda atau menggunakan gaya penulisan yang berbeda. Semakin sering Anda menulis, semakin baik keterampilan menulis Anda. Jangan lupa untuk selalu memperhatikan umpan balik dan kritik yang Anda terima dari pembaca atau editor, dan gunakan hal tersebut untuk terus meningkatkan kemampuan menulis Anda.
            
            Itulah delapan tips kepenuilisan yang wajib diketahui oleh penulis pemula. Dengan mengikuti tips tersebut, Anda dapat meningkatkan kemampuan menulis dan menghasilkan tulisan yang lebih baik dan efektif. Ingatlah untuk selalu mencari inspirasi, menulis dengan gaya sendiri, dan jangan takut untuk mencoba hal-hal baru. Semoga tips ini dapat membantu Anda dalam perjalanan menjadi penulis yang lebih baik."
        ],
        [
            "title" => "Cara jitu menulis artikel yang baik dan benar sesuai kaidah",
            "slug" => "artikel-kedua",
            "author" => "Charles Gunawan",
            "image" => "/blog2.jpg",
            "date" => "14 Mei 2022",
            "body" => "Menulis artikel yang baik dan benar memerlukan pemahaman yang baik mengenai kaidah-kaidah penulisan yang berlaku. Hal ini penting dilakukan agar tulisan yang dihasilkan dapat disampaikan dengan jelas dan mudah dipahami oleh pembaca. Berikut adalah lima tips dan trik yang dapat membantu Anda menulis artikel yang baik dan benar sesuai kaidah.
            
            Pertama, tentukan topik dan tujuan dari artikel Anda. Sebelum menulis, pastikan Anda sudah memiliki ide jelas mengenai topik yang ingin Anda bahas dan tujuan yang ingin dicapai melalui artikel tersebut. Dengan menentukan topik dan tujuan yang jelas, tulisan yang dihasilkan akan memiliki fokus dan terstruktur dengan baik.
            
            Kedua, buat kerangka tulisan. Setelah menentukan topik dan tujuan artikel, buatlah kerangka tulisan yang akan membantu Anda menyusun gagasan dan ide-ide yang ingin disampaikan dengan lebih terstruktur. Kerangka tulisan yang baik dapat membantu Anda menentukan alur tulisan dan membuat tulisan Anda lebih mudah dipahami oleh pembaca.
            
            Ketiga, gunakan bahasa yang mudah dipahami. Saat menulis artikel, pastikan Anda menggunakan bahasa yang mudah dipahami oleh pembaca. Hindari penggunaan bahasa yang terlalu formal atau teknis, kecuali jika memang diperlukan dalam konteks tulisan. Tulisan yang mudah dipahami akan membuat pembaca lebih tertarik untuk membaca artikel Anda secara keseluruhan.
            
            Keempat, perhatikan tata bahasa dan ejaan. Sebuah tulisan yang baik harus memiliki tata bahasa dan ejaan yang benar. Pastikan Anda memperhatikan tata bahasa dan ejaan yang digunakan dalam tulisan, dan periksa kembali sebelum mengirimkan tulisan tersebut. Tulisan yang berbahasa baik dan benar dapat memberikan kesan yang lebih profesional dan dapat meningkatkan kredibilitas Anda sebagai penulis.
            
            Kelima, gunakan referensi dan sumber yang akurat. Saat menulis artikel, pastikan Anda menggunakan referensi dan sumber yang akurat dan terpercaya. Hal ini penting untuk menjaga kredibilitas artikel yang Anda tulis. Gunakan sumber-sumber yang dapat dipertanggungjawabkan dan sesuai dengan topik yang sedang dibahas.
            
            Dengan mengikuti lima tips dan trik di atas, diharapkan Anda dapat menulis artikel yang baik dan benar sesuai kaidah. Selain itu, Anda juga dapat meningkatkan keterampilan menulis Anda dan dapat membuat tulisan yang lebih profesional dan terstruktur dengan baik. Ingatlah bahwa menulis adalah proses yang terus-menerus, jadi teruslah berlatih dan memperbaiki keterampilan menulis Anda!"
        ],
        [
            "title" => "Cara membuat sebuah artikel SEO Friendly",
            "slug" => "artikel-ketiga",
            "author" => "John Doe",
            "image" => "/blog3.jpg",
            "date" => "5 Agustus 2022",
            "body" => "Membuat artikel SEO friendly adalah salah satu strategi yang penting dalam membangun dan meningkatkan visibilitas situs web atau blog Anda di mesin pencari seperti Google. Artikel SEO friendly akan membantu situs web atau blog Anda muncul di peringkat atas hasil pencarian mesin pencari sehingga dapat meningkatkan jumlah lalu lintas ke situs web atau blog Anda. Berikut adalah tips yang dapat membantu Anda membuat artikel SEO friendly.
            
            Pertama, Pilih kata kunci yang tepat.
            Kata kunci adalah kunci sukses dalam membuat artikel SEO friendly. Pilih kata kunci yang sesuai dengan topik yang akan dibahas dalam artikel. Gunakan alat pencari kata kunci untuk membantu Anda menemukan kata kunci yang paling relevan dan populer. Jangan lupa untuk menggunakan kata kunci secara alami dalam artikel Anda.
            
            Kedua, Puat judul yang menarik.
            Judul artikel Anda harus menarik dan relevan dengan topik yang akan dibahas. Pastikan judul Anda mengandung kata kunci yang dipilih dan dapat menarik perhatian pembaca. Judul yang baik akan membantu meningkatkan visibilitas artikel Anda di mesin pencari.
            
            Ketiga, Buat isi artikel yang berkualitas.
            Isi artikel Anda harus berkualitas dan memberikan informasi yang bermanfaat bagi pembaca. Pastikan artikel Anda mudah dipahami dan terstruktur dengan baik. Selain itu, gunakan kata kunci secara alami dan hindari penggunaan kata kunci berlebihan atau pengulangan yang berlebihan.
            
            Keempat, Gunakan subheading yang tepat.
            Gunakan subheading untuk memecah isi artikel menjadi beberapa bagian yang terstruktur dengan baik. Subheading membantu pembaca memahami isi artikel dengan lebih mudah dan membantu mesin pencari memahami struktur artikel Anda. Pastikan subheading yang Anda gunakan mengandung kata kunci yang relevan.
            
            Kelima, Gunakan link internal dan eksternal.
            Menggunakan link internal dan eksternal dapat membantu meningkatkan visibilitas artikel Anda di mesin pencari. Gunakan link internal untuk menghubungkan artikel baru dengan artikel yang telah ada di situs web atau blog Anda. Sedangkan, gunakan link eksternal untuk menghubungkan artikel Anda dengan sumber yang relevan dan bermanfaat bagi pembaca.
            
            Membuat artikel SEO friendly adalah langkah penting dalam membangun dan meningkatkan visibilitas situs web atau blog Anda di mesin pencari. Dengan mengikuti tips tersebut, Anda dapat meningkatkan kemampuan dalam menulis artikel yang SEO friendly dan meningkatkan jumlah lalu lintas ke situs web atau blog Anda."
        ]
    ];
    $blog_posts2 = [
        [
            "title2" => "Tips Kepenulisan Yang Wajib Penulis Pemula Tahu",
            "slug2" => "artikel-pertama",
            "author2" => "Andi Firmansyah",
            "date2" => "20 Maret 2022",
            "image2" => "/blog1.jpg",
            "body2" => "Menjadi seorang penulis pemula bisa menjadi tantangan besar..."
        ],
        [
            "title2" => "Cara jitu menulis artikel yang baik dan benar sesuai kaidah",
            "slug2" => "artikel-kedua",
            "author2" => "Charles Gunawan",
            "image2" => "/blog2.jpg",
            "date2" => "14 Mei 2022",
            "body2" => "Menulis artikel yang baik dan benar memerlukan pemahaman..."
        ],
        [
            "title2" => "Cara membuat sebuah artikel SEO Friendly",
            "slug2" => "artikel-ketiga",
            "author2" => "John Doe",
            "image2" => "/blog3.jpg",
            "date2" => "5 Agustus 2022",
            "body2" => "Membuat artikel SEO friendly adalah salah satu strategi..."
        ]
    ];

    $new_post = [];
    foreach ($blog_posts as $post) {
        if ($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    $data_calendar = $this->jadwal->show_all();
    return view('post', [
        "title" => "Single Post",
        "post" => $new_post,
        "title2" => "Posts2",
        "posts2" => $blog_posts2,
        "data_calendar" => $data_calendar
    ]);
});
