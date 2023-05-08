<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start', 'end', 'tipe', 'link', 'desc'];
    public function show_all($id_user = NULL)
    {
        $result = Jadwal::selectRaw('*');
        return $result->get();
    }
}
