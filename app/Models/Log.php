<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'id_artikel', 'keterangan', 'status'];

    public function show_all($id = NULL)
    {
        if ($id < 4) {
            $result = Log::leftJoin('article', 'article.id', '=', 'logs.id_artikel');
        } else {
            $result = Log::selectRaw('logs.keterangan,logs.id,logs.id_user,(logs.created_at) AS tanggal')
                ->leftJoin('article', 'article.id', '=', 'logs.id_artikel')
                ->where('logs.id_user', $id)
                ->orderBy('logs.created_at', 'desc');
        }

        return $result->paginate(10);
    }
}
