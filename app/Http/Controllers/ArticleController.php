<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Payment;
use App\Models\Log;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['coba_data'] = 'INI ADALAH DASHBOARD';
        $this->art = new Article();
    }
    public function index()
    {
        $id_user = Auth::user()->id;
        $article = $this->art->show_all($id_user);
        return view('user.artikel', compact(['article']));
    }
    public function create()
    {
        return view('user.upload');
    }
    public function store(Request $request)
    {
        $berhasil = $request->validate([
            'id_user' => 'required',
            'status' => 'required',
            'judul_artikel' => 'required',
            'kategori_artikel' => 'required',
            'nama_file' => 'required|mimes:pdf|max:100000',
        ]);

        $input = $request->except('_token', 'submit');
        if ($req = $request->file('nama_file')) {
            $destinationPath = public_path('article_files');
            $nama_file =  Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $nama_file);
            $input['nama_file'] = "$nama_file";
        }

        if ($berhasil) {
            $insert_data = Article::create($input)->id;
            $input_log = [
                'id_user' => Auth::user()->id,
                'id_artikel' => $insert_data,
                'keterangan' => 'Artikel dengan judul (' . $request->input('judul_artikel') . ') Telah di upload oleh ' . Auth::user()->name,
                'status' => 1
            ];
            $log_data = Log::create($input_log);
        }

        if ($insert_data && $log_data) {
            return redirect(Auth::user()->type . '/artikel');
        } else {
            echo 'gagal';
        }
    }
    public function show($id, Article $data)
    {
        $article = $data::find($id);
        return view('user.details', compact('article'));
    }
    //pembayaran
    public function payment($id, Article $data)
    {
        $article = $data::find($id);
        $payment_check = Payment::where('id_artikel', $id)->get();
        return view('user.pembayaran', compact('article', 'payment_check'));
    }
    public function payment_verification($id, Article $data)
    {
        $article = $this->art->view_data($id);
        $payment_check = Payment::where('id_artikel', $id)->get();
        return view('admin.details', compact('article', 'payment_check'));
    }
    public function download_file($nama_file)
    {
        $file = public_path() . "/article_files/" . $nama_file;
        $headers = array('Content-Type: application/pdf',);
        $fileName = time() . '.pdf';
        return response()->download($file, $fileName, $headers);
    }
    // public function download_file_payment($test)
    // {
    //     $file = public_path() . "/payment_files/" . $test;
    //     $headers = array('Content-Type: image/png',);
    //     $fileName = time() . '.png';
    //     return response()->download($file);
    // }
    public function edit($id)
    {
        $data['link_form'] = 'update';
        $data['status_value'] = 'Dalam Proses';
        $article = Article::find($id);
        return view('user.revisi', compact(['article']), $data);
    }
    public function update($id, Request $request)
    {
        $berhasil = $request->validate([
            'id_user' => 'required',
            'status' => 'required',
            'judul_artikel' => 'required',
            'kategori_artikel' => 'required',
            'nama_file' => 'required|mimes:pdf|max:10000',
        ]);
        // hapus file lama dulu
        $article = Article::find($id);
        $file_lama = public_path("article_files/{$article->nama_file}");

        $input = $request->except('_token', 'submit', '_method');
        if ($req = $request->file('nama_file')) {
            $destinationPath = public_path('article_files');
            $nama_file =  Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $nama_file);
            $input['nama_file'] = "$nama_file";
        }
        $input['komentar_editor'] = "Belum ada komentar";

        if ($berhasil) {

            // update database artikel
            $insert_data = Article::where('id', $id)
                ->update($input);
            // nambah log
            $input_log = [
                'id_user' => Auth::user()->id,
                'id_artikel' => $id,
                'keterangan' => 'Artikel dengan judul (' . $request->input('judul_artikel') . ') Telah di revisi oleh ' . Auth::user()->name,
                'status' => 1
            ];
            $log_data = Log::create($input_log);
        }
        if ($insert_data && $log_data) {
            File::delete($file_lama);
            return redirect(Auth::user()->type . '/artikel');
        } else {
            echo 'gagal';
        }
    }
    public function delete($id)
    {
        $article = Article::find($id);
        $file_article = public_path("article_files/{$article->nama_file}");
        File::delete($file_article);
    }


    // FOR EDITOR
    public function index_editor()
    {
        $id_user = Auth::user()->id;
        $article = $this->art->show_all($id_user);
        return view('editor.artikel', compact(['article']));
    }
    public function show_editor($id)
    {
        $article = $this->art->view_data($id);
        return view('editor.details', compact('article'));
    }
    // FOR VENDOR
    public function index_vendor()
    {
        $id_user = Auth::user();
        $article = $this->art->show_all_vendor($id_user->bidang)->where('status', '!=', 'Revisi (E)');
        return view('vendor.artikel', compact(['article']));
    }
    public function show_vendor($id)
    {
        $article = $this->art->view_data($id);
        return view('vendor.details', compact('article'));
    }
    public function edit_vendor($id)
    {
        $data['link_form'] = 'update_vendor';
        $data['status_value'] = 'Proses';
        $article = Article::find($id);
        $data['vendors'] = User::where('type', 3)->get();
        return view('user.revisi_vendor', compact(['article']), $data);
    }
    public function update_vendor($id, Request $request)
    {
        // mengambil data artikel
        $article = Article::find($id);
        $cover_lama = public_path("cover_files/{$article->cover_file}");
        $cv_lama = public_path("cv_files/{$article->cv_file}");

        $berhasil = $request->validate([
            'vendor' => 'required',
            'jurnal' => 'required',
            'cover_file' => 'mimes:pdf|max:100000',
            'cv_file' => 'mimes:pdf|max:100000',
        ]);
        // cek apakah file cover dan cv sudah ada sebelumnya & hapus file ketika file sudah pernah ada dan di upload ulang
        if ($cover_lama == NULL) {
            $berhasil = $request->validate([
                'cover_file' => 'required|mimes:pdf|max:100000',
            ]);
        }
        if ($cv_lama == NULL) {
            $berhasil = $request->validate([
                'cv_file' => 'required|mimes:pdf|max:100000',
            ]);
        }
        $input = $request->except('_token', 'submit', '_method');
        // untuk cover file
        if ($req = $request->file('cover_file')) {
            $destinationPath = public_path('cover_files');
            $cover_file =  Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $cover_file);
            File::delete($cover_lama);
            $input['cover_file'] = "$cover_file";
        }
        // untuk cv file
        if ($req = $request->file('cv_file')) {
            $destinationPath = public_path('cv_files');
            $cv_file =  Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $cv_file);
            File::delete($cv_lama);
            $input['cv_file'] = "$cv_file";
        }
        // $input['komentar_vendor'] = "Belum ada komentar";
        // echo var_dump($input);
        if ($berhasil) {

            // update database artikel
            $update_data = Article::where('id', $id)
                ->update($input);
            // nambah log
            $input_log = [
                'id_user' => Auth::user()->id,
                'id_artikel' => $id,
                'keterangan' => 'File cover dan CV artikel dengan judul (' . $request->input('judul_artikel') . ') Telah di update oleh ' . Auth::user()->name,
                'status' => 1
            ];
            $log_data = Log::create($input_log);
            if ($update_data && $log_data) {
                // File::delete($file_lama);
                return redirect(Auth::user()->type . '/artikel');
                // echo 'succes input';
            } else {
                return redirect()->back()->withErrors(['message' => 'Input failed. Please check your connection.']);
                // echo 'failed input';
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Validation failed. Please check the form again.']);
            // echo 'Validation fail';
        }
    }
    public function save_log($id, Request $request)
    {
        $judul = Article::find($id);
        // cek file revisi lama
        if ($request->input('status') == "Revisi (E)") {
            $keterangan = 'Masih Perlu Revisi (E)';
            $status = 2;
        } elseif ($request->input('status') == "Verifikasi (E)") {
            $keterangan = 'Telah diverifikasi (E)';
            $status = 2;
        } elseif ($request->input('status') == "Under Review") {
            $keterangan = 'Dalam Proses Under Review Vendor';
            $status = 3;
        } elseif ($request->input('status') == "Accepted") {
            $keterangan = 'Telah disetujui Vendor';
            $status = 3;
        } elseif ($request->input('status') == "Rejected") {
            $keterangan = 'Telah ditolak Vendor';
            $status = 3;
        } elseif ($request->input('status') == "Proses") {
            $keterangan = 'Telah diupdate ' . $judul->name;
            $status = 3;
        }

        $input = $request->except(['_token', 'submit', 'judul_artikel', '_method']);
        // cek dan hapus file revisi lama
        $revisi_lama = public_path("revisi_files/{$judul->file_revisi}");
        if ($request->hasFile('file_revisi')) {
            $req = $request->file('file_revisi');
            $destinationPath = public_path('revisi_files');
            $file_revisi =  Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $file_revisi);
            $input['file_revisi'] = "$file_revisi";
            if ($revisi_lama) {
                File::delete($revisi_lama);
            }
        }
        // cek dan hapus LOA lama
        $loa_lama = public_path("loa_files/{$judul->loa_file}");
        if ($request->hasFile('loa_file')) {
            $req = $request->file('loa_file');
            $destinationPath = public_path('loa_files');
            $loa_file =  Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $loa_file);
            $input['loa_file'] = "$loa_file";
            if ($loa_lama) {
                File::delete($loa_lama);
            }
        }
        $input_log = [
            'id_user' => $judul->id_user,
            'id_artikel' => $id,
            'keterangan' => 'Artikel dengan judul (' . $judul->judul_artikel . ') ' . $keterangan,
            'status' => $status
        ];

        $update_artikel = Article::where('id', $id)
            ->update($input);
        if ($update_artikel) {
            Log::create($input_log);
        }
        return redirect(Auth::user()->type . '/artikel');
    }
    public function submit_payment($id, Request $request)
    {
        $article = Article::find($id);
        $payment_check = Payment::where('id_artikel', $id)->first();
        $berhasil = $request->validate([
            'file_bukti' => 'required|mimes:jpeg,png,gif,jpeg|max:10000',
        ]);
        $input = $request->except('_token', 'submit');
        if ($req = $request->file('file_bukti')) {
            $destinationPath = public_path('payment_files');
            $nama_file =  "payment_" . Auth::user()->id . "_" . date('Y-m-d-h-i-s') . "_" . $req->getClientOriginalName();
            $req->move($destinationPath, $nama_file);
            $input = [
                'id_user' => Auth::user()->id,
                'id_artikel' => $id,
                'file_bukti' => "$nama_file",
                'nominal' => 5000567,
                'verified' => 0
            ];
            $status_article = [
                'status' => 'Menunggu Verifikasi'
            ];
        }
        if ($berhasil) {
            if ($payment_check) {
                $file_payment = public_path("payment_files/{$payment_check->file_bukti}");
                File::delete($file_payment);
                Payment::where('id_artikel', $id)->delete();
            }

            // debug
            // echo '<pre>';
            // var_dump($input);
            // echo '</pre>';


            $insert_data = Payment::create($input)->id;
            $update_article = Article::where('id', $id)
                ->update($status_article);
            $input_log = [
                'id_user' => Auth::user()->id,
                'id_artikel' => $id,
                'keterangan' => 'Pembayaran Artikel dengan judul (' . $article->judul_artikel . ') oleh ' . Auth::user()->name,
                'status' => 4
            ];
            $log_data = Log::create($input_log);
        }

        if ($insert_data && $log_data && $update_article) {
            return redirect(Auth::user()->type . '/artikel');
        } else {
            echo 'gagal';
        }
    }
    public function update_payment($id, Request $request)
    {
        $article = Article::find($id);
        // $payment_check = Payment::where('id_artikel', $id)->get();
        $berhasil = $request->validate([
            'verified' => 'required',
        ]);
        $input = $request->except('_token', 'submit', '_method');

        if ($berhasil) {
            $update_data = Payment::where('id_artikel', $id)
                ->update($input);
            if ($request->input('verified') == 1) {
                $status_article = [
                    'status' => 'Dalam Proses'
                ];
                $keterangan = 'diterima';
            } else {
                $status_article = [
                    'status' => 'Pembayaran Ditolak'
                ];
                $keterangan = 'ditolak';
            }
            $update_article = Article::where('id', $id)
                ->update($status_article);
            $input_log = [
                'id_user' => Auth::user()->id,
                'id_artikel' => $id,
                'keterangan' => 'Pembayaran Artikel dengan judul (' . $article->judul_artikel . ') ' . $keterangan . ' oleh ' . Auth::user()->name,
                'status' => 4
            ];
            $log_data = Log::create($input_log);
        }

        if ($update_data && $log_data && $update_article) {
            return redirect(Auth::user()->type . '/artikel');
        } else {
            echo 'gagal';
        }
    }
}
