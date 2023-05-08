<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Klinik;
use App\Models\Jadwal;
use Illuminate\Support\Facades\File;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['coba_data'] = 'INI ADALAH DASHBOARD';
        $this->art = new Article();
        $this->jadwal = new Jadwal();
        $this->klinik = new Klinik();
    }

    public function index()
    {
        $diagram_fix = [
            [
                'bln' => 1,
                'nama' => 'Januari',
                'total' => 0,
            ],
            [
                'bln' => 2,
                'nama' => 'Februari',
                'total' => 0,
            ],
            [
                'bln' => 3,
                'nama' => 'Maret',
                'total' => 0,
            ],
            [
                'bln' => 4,
                'nama' => 'April',
                'total' => 0,
            ],
            [
                'bln' => 5,
                'nama' => 'Mei',
                'total' => 0,
            ],
            [
                'bln' => 6,
                'nama' => 'Juni',
                'total' => 0,
            ],
            [
                'bln' => 7,
                'nama' => 'Juli',
                'total' => 0,
            ],
            [
                'bln' => 8,
                'nama' => 'Agustus',
                'total' => 0,
            ],
            [
                'bln' => 9,
                'nama' => 'September',
                'total' => 0,
            ],
            [
                'bln' => 10,
                'nama' => 'Oktober',
                'total' => 0,
            ],
            [
                'bln' => 11,
                'nama' => 'November',
                'total' => 0,
            ],
            [
                'bln' => 12,
                'nama' => 'Desember',
                'total' => 0,
            ],
        ];
        $id_user = Auth::user()->id;
        $role = Auth::user()->type;
        $agenda = $this->klinik::where('user_id', $id_user)->get();
        $agenda_offline = $this->jadwal::where('tipe', 'offline')->get();
        $agenda_online = $this->jadwal::where('tipe', 'online')->get();
        $article_publish = $this->art->lastest_article($id_user, $role)->where('status', 'Accepted');
        $diagram_publish = $this->art->diagram_article($id_user, $role)->where('status', 'Accepted');
        $jadwal_user = $this->klinik->show_jadwal(Auth::user()->id);
        // input data artikel secara manual ke variabel objek diagram biar bisa dipake di diagram garis
        foreach ($diagram_publish as $d) {
            for ($i = 0; $i < count($diagram_fix); $i++) {
                if ($d->bulan == $diagram_fix[$i]['bln']) {
                    $diagram_fix[$i]['total'] += 1;
                }
            }
        }
        // debug
        // echo '<pre>';
        // var_dump($diagram_fix);
        // echo '</pre>';
        // echo count($diagram_fix);
        $article_progress = $this->art->lastest_article($id_user, $role)->whereNotIn('status', ['Accepted']);

        return view('user.dashboard-fix', compact(['article_publish', 'article_progress', 'role', 'agenda', 'agenda_offline', 'agenda_online', 'diagram_publish', 'diagram_fix', 'jadwal_user']));
    }

    public function adminDashboard()
    {
        $article = Article::all();
        return view('user.dashboard', compact(['article']));
    }

    public function editorDashboard()
    {
        $article = Article::all();
        return view('user.dashboard', compact(['article']));
    }

    public function vendorDashboard()
    {
        $article = Article::all();
        return view('user.dashboard', compact(['article']));
    }
    public function klinik()
    {
        $article = Article::all();
        $data_calendar = [
            [
                "id" => "1",
                "title" => "Pelatihan 1",
                "start" => "2023-03-01",
                "end" => "2023-03-02",
                "url" => "#modalCenter" . "1",
                "desc" => "Pelatihan tentang menulis artikel",
            ],
            [
                "id" => "2",
                "title" => "Pelatihan 2",
                "start" => "2023-03-12",
                "end" => "2023-03-12",
                "url" => "#modalCenter" . "2",
                "desc" => "Pelatihan tentang menulis jurnal",
            ],
            [
                "id" => "3",
                "title" => "Pelatihan 3",
                "start" => "2023-03-20",
                "end" => "2023-03-25",
                "url" => "#modalCenter" . "3",
                "desc" => "Pelatihan tentang kepenulisan",
            ]
        ];
        return view('admin.klinik', compact(['article'], ['data_calendar']), $this->data);
    }
    public function klinik_user()
    {
        $article = Article::all();
        $data_calendar = [
            [
                "id" => "1",
                "title" => "Pelatihan 1",
                "start" => "2023-03-01",
                "end" => "2023-03-02",
                "url" => "#modalCenter" . "1",
                "desc" => "Pelatihan tentang menulis artikel",
            ],
            [
                "id" => "2",
                "title" => "Pelatihan 2",
                "start" => "2023-03-12",
                "end" => "2023-03-12",
                "url" => "#modalCenter" . "2",
                "desc" => "Pelatihan tentang menulis jurnal",
            ],
            [
                "id" => "3",
                "title" => "Pelatihan 3",
                "start" => "2023-03-20",
                "end" => "2023-03-25",
                "url" => "#modalCenter" . "3",
                "desc" => "Pelatihan tentang kepenulisan",
            ]
        ];
        return view('user.klinik', compact(['article'], ['data_calendar']), $this->data);
    }
}
