<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\album;
use Illuminate\Http\Request;

class UploadController extends Controller
{
          //Proses Upload Foto
          public function unggah_foto(Request $request)
          {
              $filename  = pathinfo($request->filefoto,PATHINFO_FILENAME);
              $extensi =  $request->filefoto->getClientOriginalExtension();
              $namafoto = 'gallery'.time().'.'.$extensi;
              $request->filefoto->move('gallery',$namafoto);

              $dataSimpan = [
                  'url' => $namafoto,
                  'users_id' => auth()->user()->id,
                  'album_id' => $request->album,
                  'judul_foto' => $request->judul_foto,
                  'deskripsi_foto' => $request->deskripsi_foto
              ];
              foto::create($dataSimpan);
              return redirect('/home');
          }

          //Menampilkan Upload Foto
          public function upload_foto(Request $request)
          {
            if ($request->album_id = 0) {
                $datasimpan = [
                    'users_id' => auth()->user()->id,
                    'nama_album' => $request->nama_album,
                ];
                album::create($datasimpan);
            }
            $album = album::with('user')->where('users_id', auth()->user()->id)->get();
            return view('/upload_foto', compact('album'));
          }

          //Menampilkan Tambah Album
          public function tambah_album(){
            return view('/tambah_album');
          }

          //Proses Tambah Album
          public function add_album(Request $request)
          {
                $datasimpan = [
                    'users_id' => auth()->user()->id,
                    'nama_album' => $request->nama_album,
                ];
                album::create($datasimpan);
                return redirect('/upload_foto');
            }

            //Menampilkan Album
            public function album()
            {
                return view('album');
            }
            }



