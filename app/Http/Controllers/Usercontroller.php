<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    //Registrasi
    public function registrasi (Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'nama_lengkap' => 'required',
            'no_telepon' => 'required|numeric|min:7'
        ]);
         // Membuat profil otomatis
         $newProfile = 'users.png'; // Nama file gambar profil default

         // Membuat pengguna baru
         $user = User::create([
             'username' => $request->input('username'),
             'email' => $request->input('email'),
             'password' => bcrypt($request->input('password')),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'no_telepon' => $request->input('no_telepon'),
             'pictures' => $newProfile, // Simpan nama file gambar profil
         ]);

         // Menyimpan file profil default ke storage
         $defaultProfilePath = public_path('fotoprofile/' . $newProfile);
         copy(public_path('fotoprofile/users.png'), $defaultProfilePath);
        // $data = [
        //     'username' => $request->input('u     sername'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        //     'nama_lengkap' => $request->input('nama_lengkap'),
        //     'no_telepon' => $request->input('no_telepon')
        // ];
        // $p= User::create($data);
        if ($user==true) {
            echo "<script>alert('Berhasil Register'); window.location.href='/login';</script>";
     } else {
         echo "<script>alert('Gagal Register'); window.location.href='/registrasi';</script>";
            }
        }

        //Login
        public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            echo "<script>alert('Berhasil Login'); window.location.href='/home';</script>";
        } else {
            echo "<script>alert('Gagal Login Password Atau Email Salah'); window.location.href='/login';</script>";
        }
    }

        //Logout
        public function logout(Request $request){
            $request->session()->invalidate();
            $request->session()->regenerate();
            return redirect('/');
    }

}
