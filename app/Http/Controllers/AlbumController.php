<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\User;
use App\Models\album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //Menampilkan Dalem Album
     public function dalemalbum($id)
    {
        $album =album::with('foto')->FindOrFail($id);
       return view('/dalemalbum' , compact('album'));
    }

    public function album(){
        $tampilUpload = foto::with('album')->where('users_id', auth()->user()->id)->get();
        $tampilAlbum = album::with('foto')->orderBy('id', 'DESC')->where('users_id', auth()->user()->id)->get();
        $profile = User::where('id', auth()->user()->id)->first();
        return view('/album', compact('tampilUpload', 'tampilAlbum','profile'));
    } 
}
