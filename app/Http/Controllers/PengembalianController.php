<?php

namespace App\Http\Controllers;

use App\Models\Anggota;   //nama model
use App\Models\Buku;   //nama model
use App\Models\Pengembalian;   //nama model
use App\Models\Denda;   //nama model
use App\Models\Pengaturan;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
        $pengembalian = Pengembalian::select('*', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))->where('status',0)->orderBy('id','DESC')->paginate(25);
		return view('admin.pengembalian.index',compact('pengembalian','pengaturan'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $search = $request->get('search');
        $pengembalian = Pengembalian::select('*', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
                ->where('tanggal_pinjam', 'LIKE', '%'.$search.'%')
                ->orWhere('tanggal_kembali', 'LIKE', '%'.$search.'%')
                ->orwhereHas('buku', function ($query) use ($search) {
                    $query->where('judul', 'LIKE', '%'. $search .'%');
                })
                ->orWhereHas('anggota', function ($query) use ($search) {
                    $query->where('nama', 'LIKE', '%'. $search .'%');
                })
                ->orderBy('id','DESC')->paginate(25);
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
		return view('admin.pengembalian.index',compact('pengembalian','pengaturan'));
    }
	
    ## Tampilkan Detail
    public function show(Pengembalian $pengembalian)
    {
        $anggota = DB::table('anggota_tbl')->where('id',$pengembalian->anggota_id)->get()->toArray();
        $buku = DB::table('buku_tbl')->where('id',$pengembalian->buku_id)->get()->toArray();
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
        $hari = DB::table('peminjaman_tbl')
                ->select(DB::raw("DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
                ->where('id',$pengembalian->id)
                ->get()->toArray();
        $view=view('admin.pengembalian.show', compact('pengembalian','anggota','buku','pengaturan','hari'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update2(Request $request, Pengembalian $pengembalian)
    {
        
        $pengembalian->fill($request->all());
        
		$pengembalian->status = 1;
		$pengembalian->user_id = Auth::user()->id;
    	$pengembalian->save();
        
        if($request->hari>0){
            $input['anggota_id'] = $request->anggota_id;
            $input['buku_id'] = $request->buku_id;
            $input['tanggal_pinjam'] = $request->tanggal_pinjam;
            $input['tanggal_hrs_kembali'] = $request->tanggal_hrs_kembali;
            $input['tanggal_kembali'] = date('Y-m-d');
            $input['hari'] = $request->hari;
            $input['denda'] = $request->denda;
            
            $input['user_id'] = Auth::user()->id;
            
            Denda::create($input);
        }

		return redirect('/pengembalian')->with('status', 'Data Berhasil Diubah');
    }

}
