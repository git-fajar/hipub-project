<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'jadwal_id'];
    public function show_jadwal($user_id)
    {
        $result = Klinik::selectRaw('(kliniks.id) as id_klinik, jadwals.*')
            ->leftJoin('jadwals', 'jadwals.id', '=', 'kliniks.jadwal_id')
            ->where('kliniks.user_id', $user_id);
        return $result->get();
    }
    public function cek_jadwal($jadwal_id, $user_id)
    {
        $result = Klinik::selectRaw('(kliniks.id) as id_klinik, jadwals.*')
            ->leftJoin('jadwals', 'jadwals.id', '=', 'kliniks.jadwal_id')
            ->where('kliniks.user_id', $user_id)
            ->where('kliniks.jadwal_id', $jadwal_id);
        return $result->get();
    }
}
