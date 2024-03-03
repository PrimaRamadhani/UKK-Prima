<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\User;
use App\Models\follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //Tampilan Data Profile
    public function editprofile(){
        $data = [
            'dataprofile' => User::where('id',auth()->user()->id)->first()
        ];
        return view('editprofile', $data);
    }

    //Proses Ubah Data Profile
    public function updateprofile(Request $request){
        $dataUpdate = [
            'username'          => $request->username,
            'nama_lengkap'      => $request->nama_lengkap,
            'no_telepon'        => $request->no_telepon,
            'bio'               => $request->bio,
            'alamat'            => $request->alamat,
        ];
        User::where('id',auth()->user()->id)->update($dataUpdate);
        return redirect('/profile');
    }

    //Proses Ubah Foto Profile
    public function fotoprofil(Request $request)
    {
        $filename  = pathinfo($request->foto,PATHINFO_FILENAME);
        $extensi =  $request->foto->getClientOriginalExtension();
        $namafoto = 'fotoprofile'.time().'.'.$extensi;
        $request->foto->move('fotoprofile',$namafoto);
        //data
        $dataupdate = [
            'pictures'          => $namafoto
        ];
        //proses update
        User::where('id', auth()->user()->id)->update($dataupdate);
        return redirect('/profile');
    }

    public function editpassword()
    {
        return view('editpassword');
    }

    //Update Ubah Password
    public function updatepassword(Request $request){
      $request->validate([
        'current_password' => 'required',
        'new_password'     => 'required|min:8'
      ]);
    $user = Auth::user();
    ($request->current_password);
    if(!Hash::check($request->current_password, $user-> password)){
        return back()->withErrors(['current_password' => 'Password Lama Tidak Sesuai']);
    }
    $user->update([
        'password' => bcrypt($request->new_password)
    ]);
    echo "<script>alert('Berhasil Ubah Password'); window.location.href='/editprofile';</script>";
}

    //Menampilkan Profile
    public function profile()    
    {
        $user = auth()->user();

        $userFollowers = DB::table('follow')->where('follow_id', $user->id)->count();
        $dataFollowCount = DB::table('follow')->where('users_id', $user->id)->count();

        return view('profile',compact('userFollowers','dataFollowCount'));
    }
    public function getdatapostingan(Request $request){
        $postinganuserid = auth()->user()->id;
        $explore = foto::with(['likefoto','album','user'])->orderBy('id', 'DESC')->withCount(['likefoto','komentar'])->whereHas('user', function($query) use($postinganuserid){ $query->where('users_id', $postinganuserid);})->paginate(4);
        return response()->json([
            'data' => $explore,
            'statuscode' => 200,
            'idUser'    => auth()->user()->id
        ]);
    }

    //Hapus Foto Di Profile
    public function deletefoto(Request $request, $id)
    {
        try {
            // Find the foto record
            $foto = foto::findOrFail($id);

            // Delete associated komen and like records
            $foto->komentar()->delete();
            $foto->likefoto()->delete();

            // Delete the file associated with the foto
            $filePath = ('gallery/' . $foto->filefoto); // Adjust the file path based on your actual structure

            // Check if the file exists
            if (File::exists($filePath)) {
                // Delete the file
                File::delete($filePath);
            }

            // Delete the foto record
            $foto->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus foto dan data terkait.'], 500);
        }
    }
}
