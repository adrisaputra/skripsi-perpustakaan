<?php

namespace App\Http\Controllers;

use App\Models\Anggota;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        if(Auth::user()->group == 3){
            $anggota = Anggota::select('anggota_tbl.*','status')
                        ->where('anggota_tbl.nis',Auth::user()->name)
                        ->leftjoin('users', 'users.nis', '=', 'anggota_tbl.nis')
                        ->orderBy('anggota_tbl.id','DESC')->paginate(25);
        } else {
            $anggota = Anggota::select('anggota_tbl.*','status')
                        ->leftjoin('users', 'users.nis', '=', 'anggota_tbl.nis')
                        ->orderBy('anggota_tbl.id','DESC')->paginate(25);
        }
       
		return view('admin.anggota.index',compact('anggota'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $anggota =  $request->get('search');
        $anggota =  Anggota::select('anggota_tbl.*','status')
                    ->leftjoin('users', 'users.nis', '=', 'anggota_tbl.nis')
                    ->where(function ($query) use ($anggota) {
                        $query->where('nis', 'LIKE', '%'.$anggota.'%')
                            ->orWhere('nama', 'LIKE', '%'.$anggota.'%')
                            ->orWhere('jenis_kelamin', 'LIKE', '%'.$anggota.'%')
                            ->orWhere('kelas', 'LIKE', '%'.$anggota.'%')
                            ->orWhere('telepon', 'LIKE', '%'.$anggota.'%')
                            ->orWhere('alamat', 'LIKE', '%'.$anggota.'%')
                            ->orWhere('email', 'LIKE', '%'.$anggota.'%');
                    })->orderBy('anggota_tbl.id','DESC')->paginate(25);
		return view('admin.anggota.index',compact('anggota'));
    }
	
    ## Tampilkan Form Create
    public function create()
    {
		$view=view('admin.anggota.create');
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required|numeric',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:300'
        ]);

		$input['nis'] = $request->nis;
		$input['nama'] = $request->nama;
		$input['jenis_kelamin'] = $request->jenis_kelamin;
		$input['kelas'] = $request->kelas;
		$input['telepon'] = $request->telepon;
		$input['alamat'] = $request->alamat;
		$input['tanggal_buat'] = date('d-m-Y');
        
        if($request->file('foto')){
            $input['foto'] = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/foto'), $input['foto']);
        }
        
		$input['user_id'] = Auth::user()->id;
		
        Anggota::create($input);
		
		return redirect('/anggota')->with('status','Data Tersimpan');
    }

    ## Tampilkan Detail
    public function show($id)
    {
        //
    }

    ## Tampilkan Form Edit
    public function edit(Anggota $anggota)
    {
        $view=view('admin.anggota.edit', compact('anggota'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Anggota $anggota)
    {
        $this->validate($request, [
            'nis' => 'required|numeric',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:300'
        ]);

        $anggota->fill($request->all());
        
		if($request->file('foto') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('upload/foto'), $filename);
            $anggota->foto = $filename;
		}
		
		$anggota->user_id = Auth::user()->id;
    	$anggota->save();
		
		return redirect('/anggota')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Anggota $anggota)
    {
        $id = $anggota->id;
		$anggota->delete();
		
        return redirect('/anggota')->with('status', 'Data Berhasil Dihapus');
    }
}
