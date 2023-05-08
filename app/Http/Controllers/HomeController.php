<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->usr = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile($id, User $data)
    {
        $profile = $this->usr->find($id);
        return view('profile', compact('profile'));
    }
    public function save_profile($id, Request $request)
    {
        $berhasil = $request->validate(
            [
                'name' => ['required', 'string', 'max:25'],
                'email' => ['required', 'string', 'email', 'max:100', Rule::unique('users')->ignore($id)],
                'password' => ['nullable', 'required_with:another_field', 'string', 'min:8'],
            ]
        );
        $usr = User::find($id);
        // cari file lama
        $path_lama = Storage::url('public/user_images', $usr->display_picture_link);
        if (!$request->filled('password')) {
            $input = $request->except('_token', 'submit', '_method', 'password');
        } else {
            $input = $request->except('_token', 'submit', '_method');
            $input['password'] = Hash::make($request->input('password'));
        }
        if ($berhasil) {
            $insert_data = User::where('id', $id)
                ->update($input);
            var_dump($input);
            return redirect()->back()->with('success', 'Data has been updated successfully.');
        } else {
            return redirect()->back()->with('failed', 'Data update failed.');
        }
    }
}
