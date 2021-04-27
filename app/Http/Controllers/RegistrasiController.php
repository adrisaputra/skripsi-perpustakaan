<?php

namespace App\Http\Controllers;

use App\Models\Anggota;   //nama model
use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required|numeric|unique:users,name',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'telepon' => 'required',
        ]);

		$input['name'] = $request->nis;
        $input['email'] = $request->nis."@gmail.com";
        $input['password'] = Hash::make($request->nis);
        $input['nis'] = $request->nis;
        $input['group'] = 3;
        
        User::create($input);

        $input2['nis'] = $request->nis;
		$input2['nama'] = $request->nama;
		$input2['jenis_kelamin'] = $request->jenis_kelamin;
		$input2['kelas'] = $request->kelas;
		$input2['telepon'] = $request->telepon;
		$input2['tanggal_buat'] = date('d-m-Y');

        Anggota::create($input2);
		
		return redirect('/login')->with('status','Menunggu Konfirmasi Admin !');
    }
}
