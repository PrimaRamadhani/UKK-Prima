<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\User;
use App\Models\follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinController extends Controller
{
    //Menampilkan Profile Publik
    public function getdatapin(Request $request, $id){
        $dataUser = User::where('id', $id)->first();
        $dataJumlahFollower = DB::select('SELECT COUNT(users_id) as jmlfollower FROM follow where follow_id ='.$id);
        $dataJumlahFollow   = DB::select('SELECT COUNT(follow_id) as jmlfollow FROM follow where users_id ='.$id);
        $dataFollow         = follow::where('follow_id', $id)->where('users_id', auth()->user()->id)->first();
        return response()->json([
            'dataUser'         => $dataUser,
            'jumlahFollower'   => $dataJumlahFollower,
            'jumlahFollow'     => $dataJumlahFollow,
            'dataUserActive'   => auth()->user()->id,
            'dataFollow'       => $dataFollow
        ], 200);
    }
    public function getdatapostinganbaru(Request $request, $id){
        $explore = foto::with(['likefoto','album','user'])->withCount(['likefoto','komentar'])->where('users_id', $id)->paginate();
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
            'idUser'    => auth()->user()->id
        ]);
    }
    
}
