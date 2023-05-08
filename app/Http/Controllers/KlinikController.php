<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use App\Models\Article;
use App\Models\Jadwal;
use App\Models\Klinik;
use Illuminate\Support\Facades\File;


class KlinikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['coba_data'] = 'INI ADALAH DASHBOARD';
        $this->jadwal = new Jadwal();
        $this->klinik = new Klinik();
    }

    public function index()
    {
        $data_calendar = $this->jadwal->show_all();
        return view('admin.klinik', compact(['data_calendar']), $this->data);
    }
    public function index_user()
    {
        // $data_calendar = [
        //     [
        //         "id" => "1",
        //         "title" => "Pelatihan 1",
        //         "start" => "2023-03-01",
        //         "end" => "2023-03-02",
        //         "url" => "#modalCenter" . "1",
        //         "desc" => "Pelatihan tentang menulis artikel",
        //     ],
        //     [
        //         "id" => "2",
        //         "title" => "Pelatihan 2",
        //         "start" => "2023-03-12",
        //         "end" => "2023-03-12",
        //         "url" => "#modalCenter" . "2",
        //         "desc" => "Pelatihan tentang menulis jurnal",
        //     ],
        //     [
        //         "id" => "3",
        //         "title" => "Pelatihan 3",
        //         "start" => "2023-03-20",
        //         "end" => "2023-03-25",
        //         "url" => "#modalCenter" . "3",
        //         "desc" => "Pelatihan tentang kepenulisan",
        //     ]
        // ];
        $data_calendar = $this->jadwal->show_all();
        $jadwal_user = $this->klinik->show_jadwal(Auth::user()->id);
        return view('user.klinik', compact(['jadwal_user'], ['data_calendar']), $this->data);
    }

    public function add_agenda()
    {
        return view('admin.add_agenda');
    }
    public function edit_agenda($id)
    {
        $agenda = $this->jadwal::find($id);
        // var_dump($agenda);
        return view('admin.edit_agenda', compact(['agenda']));
    }
    public function update_agenda($id, Request $request)
    {
        $berhasil = $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'desc' => 'required',
            'tipe' => 'required',
        ]);
        $input = $request->except('_token', 'submit', '_method');
        if ($berhasil) {

            // update database artikel
            $update_data = Jadwal::where('id', $id)
                ->update($input);
            // nambah log

            if ($update_data) {
                return redirect(Auth::user()->type . '/klinik')->with('success', 'Data berhasil diupdate !');
            } else {
                return redirect()->back()->withErrors(['message' => 'Input failed. Please check your connection.']);
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Validation failed. Please check the form again.']);
            // echo 'Validation fail';
        }
    }
    public function save_agenda(Request $request)
    {

        $berhasil = $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'desc' => 'required',
            'tipe' => 'required',
        ]);
        $input = $request->except('_token', 'submit', '_method');
        if ($berhasil) {
            $insert_data = Jadwal::create($input)->id;
            if ($insert_data) {
                return redirect(Auth::user()->type . '/klinik')->with('success', 'Data berhasil ditambahkan !');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Validation Failed!');
        }
    }
    public function add_jadwal($id, Request $request)
    {
        // cek apakah jadwal sudah ada
        $cek_jadwal = $this->klinik->cek_jadwal($id, Auth::user()->id);
        if (count($cek_jadwal) > 0) {
            return redirect()->back()->withInput()->with('error', 'Data Exist');
        } else {
            $input = [
                'user_id' => Auth::user()->id,
                'jadwal_id' => $id,
            ];
            $insert_data = Klinik::create($input)->id;
            if ($insert_data) {
                return redirect(Auth::user()->type . '/klinik')->with('success', 'Data berhasil ditambahkan !');
            } else {
                return redirect()->back()->withInput()->with('error', 'Input Failed!');
            }
        }
    }
    public function show_agenda($id)
    {
        $cek_jadwal = $this->klinik->cek_jadwal($id, Auth::user()->id);
        if (count($cek_jadwal) > 0) {
            $data['listed'] = true;
        } else {
            $data['listed'] = false;
        }
        $agenda = $this->jadwal::find($id);
        return view('user.show_agenda', compact(['agenda'], ['cek_jadwal']), $data);
    }
}
