<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = ['judul_artikel', 'kategori_artikel', 'id_user', 'nama_file', 'file_revisi', 'status', 'komentar_editor', 'komentar_vendor', 'id_vendor', 'jurnal', 'cv_file', 'cover_file'];
    // protected $guarded = [];
    // for ID
    public function show_all($id_user = NULL)
    {
        if ($id_user == 1) {
            $result = Article::selectRaw('article.*,users.name')
                ->leftJoin('users', 'users.id', '=', 'article.id_user');
        } elseif ($id_user == 2) {
            $result = Article::selectRaw('article.*,users.name')
                ->leftJoin('users', 'users.id', '=', 'article.id_user')
                ->whereIn('status',  ['Dalam Proses', 'Revisi (E)', 'Verifikasi (E)', 'Pembayaran', 'Menunggu Verifikasi']);
        } elseif ($id_user == 3) {
            $result = Article::selectRaw('article.*,users.name')
                ->leftJoin('users', 'users.id', '=', 'article.id_user')
                ->whereIn('status',  ['Verifikasi (E)', 'Revisi (V)', 'Verifikasi (V)', 'Sudah Revisi']);
        } else {
            $result = Article::where('id_user', $id_user);
        }
        return $result->get();
    }
    // for type
    public function show_all_vendor($bidang = NULL)
    {
        // if ($bidang == 'umum') {
        //     $result = Article::selectRaw('article.*,users.name')
        //         ->leftJoin('users', 'users.id', '=', 'article.id_user')
        //         ->whereIn('status',  ['Verifikasi (E)', 'Proses', 'Sudah Revisi']);
        // } else {
        $result = Article::selectRaw('article.*,users.name')
            ->leftJoin('users', 'users.id', '=', 'article.id_user')
            ->whereIn('status',  ['Verifikasi (E)', 'Proses', 'Sudah Revisi', 'Under Review', 'Accepted', 'Rejected'])
            ->where('vendor', $bidang);
        // }

        return $result->get();
    }
    public function view_data($id)
    {
        $result = Article::selectRaw('article.*, users.name, users.email,payments.file_bukti,payments.nominal, payments.verified')
            ->leftJoin('users', 'users.id', '=', 'article.id_user')
            ->leftJoin('payments', 'payments.id_artikel', '=', 'article.id')
            ->where('article.id', $id);
        return $result->get();
    }
    public function lastest_article($id_user = NULL, $role = NULL)
    {
        if ($role != 'user') {
            $result = Article::selectRaw('*')
                ->orderBy('created_at', 'desc');
        } else {
            $result = Article::selectRaw('*')
                ->where('id_user', $id_user)
                ->orderBy('created_at', 'desc');
        }

        return $result->get();
    }
    // public function diagram_article($id_user = null, $role = null)
    // {
    //     $result = Article::select('*')
    //         ->when($role === 'user', function ($query) use ($id_user) {
    //             return $query->where('id_user', $id_user);
    //         })
    //         ->whereYear('updated_at', now()->year)
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return $result;
    // }
    public function diagram_article($id_user = NULL, $role = NULL)
    {
        if ($role != 'user') {
            $result = Article::selectRaw('*, (MONTH(updated_at)) as bulan')
                ->whereRaw('YEAR(updated_at) = YEAR(NOW())')
                ->orderBy('created_at', 'desc');
        } else {
            $result = Article::selectRaw('*, (MONTH(updated_at)) as bulan')
                ->where('id_user', $id_user)
                ->whereRaw('YEAR(updated_at) = YEAR(NOW())')
                ->orderBy('created_at', 'desc');
            // ->groupBy('asu');
        }
        return $result->get();
    }
}
