<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\follow;
use App\Models\komentar;
use App\Models\likefoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Explore
    public function getdata(Request $request){
        if($request->cari !== 'null'){
            $explore = foto::with(['likefoto','album'])->where('judul_foto','like','%'.$request->cari.'%')->orderBy('id', 'DESC')->withCount(['likefoto','komentar'])->paginate();
        } else {
            $explore = foto::with(['likefoto','album'])->orderBy('id', 'DESC')->withCount(['likefoto','komentar'])->paginate();
        }
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
            'idUser'    => auth()->user()->id
        ]);
    }

    //Like dan Unlike
    public function likesfoto(Request $request)
    {
        try {
            $request->validate([
                'idfoto' => 'required'
            ]);
            $existingLike = likefoto::where('foto_id', $request->idfoto)->where('users_id', auth()->user()->id)->first();
            if(!$existingLike){
                $dataSimpan = [
                    'foto_id'   => $request->idfoto,
                    'users_id'   => auth()->user()->id
                ];
                likefoto::create($dataSimpan);
            } else {
                likefoto::where('foto_id', $request->idfoto)->where('users_id', auth()->user()->id)->delete();
            }

            return response()->json('Data berhasil di simpan', 200);
        } catch (\Throwable $th) {
            return response()->json('Something want wrong', 500,);
        }
    }

    //Detail
    public function getdatadetail(Request $request, $id){
        $dataDetailFoto     = foto::with(['user','album'])->where('id', $id)->firstOrFail();
        $dataJumlahPengikut = DB::table('follow')->selectRaw('count(follow_id) as jmlfolow')->where('follow_id', $dataDetailFoto->user->id)->first();
        $dataFollow         = follow::where('follow_id', $dataDetailFoto->user->id)->where('users_id', auth()->user()->id)->first();
        $ambilkomentar      = komentar::with('user')->where('foto_id', $id)->get();
        return response()->json([
            'dataDetailFoto'    => $dataDetailFoto,
            'dataJumlahFollow'  => $dataJumlahPengikut,
            'dataUser'          => auth()->user()->id,
            'dataFollow'        => $dataFollow
        ], 200);
    }

    //Ambil Komentar
    public function ambildatakomentar(Request $request, $id){
        $ambilkomentar = komentar::with('user')->orderBy('id', 'DESC')->where('foto_id', $id)->get();
        return response()->json([
            'data'  => $ambilkomentar,
        ], 200);
    }

    //Kirim Komentar
    public function kirimkomentar(Request $request){
        try {
            $request->validate([
                'idfoto'   => 'required',
                'isi_komentar'  => 'required',
            ]);
            $dataStoreKomentar = [
                'users_id'  => auth()->user()->id,
                'foto_id'   => $request->idfoto,
                'isi_komentar'  => $request->isi_komentar,
            ];
            komentar::create($dataStoreKomentar);
            return response()->json([
                'data'      => 'Data berhasil di simpan',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json('Data komentar  gagal di simpann', 500);
        }
    }

    //Follow Unfollow
    public function ikuti(Request $request){
        try {
            $request->validate([
                'idfollow'      => 'required'
            ]);

            $existingFollow = follow::where('users_id', auth()->user()->id)->where('follow_id', $request->idfollow)->first();
            if(!$existingFollow){
                $dataSimpan = [
                    'users_id'      => auth()->user()->id,
                    'follow_id'     => $request->idfollow,
                ];
                follow::create($dataSimpan);
            } else {
                follow::where('users_id', auth()->user()->id)->where('follow_id', $request->idfollow)->delete();
            }
            return response()->json('Data berhasil di eksekusi', 200);
        } catch (\Throwable $th) {
            return response()->json('Something went wrong', 500);
        }
    }
}

