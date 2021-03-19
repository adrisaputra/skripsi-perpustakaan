<?php

namespace App\Http\Controllers;

use App\Models\Anggota;   //nama model
use App\Models\Buku;   //nama model
use App\Models\Denda;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class DendaController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $denda = Denda::orderBy('id','DESC')->paginate(25);
		return view('admin.denda.index',compact('denda'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $search = $request->get('search');
        $denda = Denda::
                where('tanggal_pinjam', 'LIKE', '%'.$search.'%')
                ->orWhere('tanggal_hrs_kembali', 'LIKE', '%'.$search.'%')
                ->orWhere('tanggal_kembali', 'LIKE', '%'.$search.'%')
                ->orWhere('hari', 'LIKE', '%'.$search.'%')
                ->orWhere('denda', 'LIKE', '%'.$search.'%')
                ->orwhereHas('buku', function ($query) use ($search) {
                    $query->where('judul', 'LIKE', '%'. $search .'%');
                })
                ->orWhereHas('anggota', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', '%'. $search .'%');
                })
                ->orderBy('id','DESC')->paginate(25);

        return view('admin.denda.index',compact('denda'));

    }

    ## Tampilkan Detail
    public function show(Denda $denda)
    {
        $anggota = DB::table('anggota_tbl')->where('id',$denda->anggota_id)->get()->toArray();
        $buku = DB::table('buku_tbl')->where('id',$denda->buku_id)->get()->toArray();
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
        $view=view('admin.denda.show', compact('denda','anggota','buku','pengaturan'));
        $view=$view->render();
        return $view;
    }

}
