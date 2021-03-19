<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;


class PengaturanController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $pengaturan = Pengaturan::orderBy('id','DESC')->paginate(25);
		return view('admin.pengaturan.index',compact('pengaturan'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $pengaturan = $request->get('search');
        $pengaturan = Pengaturan::where('nama', 'LIKE', '%'.$pengaturan.'%')->orderBy('id','DESC')->paginate(25);
		return view('admin.pengaturan.index',compact('pengaturan'));
    }
	
    ## Tampilkan Form Edit
    public function edit(Pengaturan $pengaturan)
    {
        $view=view('admin.pengaturan.edit', compact('pengaturan'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Pengaturan $pengaturan)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jumlah' => 'required'
        ]);

        $pengaturan->fill($request->all());
        
		$pengaturan->user_id = Auth::user()->id;
    	$pengaturan->save();
		
		return redirect('/pengaturan')->with('status', 'Data Berhasil Diubah');
    }

}
