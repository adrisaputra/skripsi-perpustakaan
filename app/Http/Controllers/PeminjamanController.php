<?php

namespace App\Http\Controllers;

use App\Models\Anggota;   //nama model
use App\Models\Buku;   //nama model
use App\Models\Peminjaman;   //nama model
use App\Models\Denda;   //nama model
use App\Models\Pengaturan;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
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
            $anggota = DB::table('anggota_tbl')->where('nis',Auth::user()->name)->get()->toArray();
            $peminjaman = Peminjaman::select('peminjaman_tbl.*','users.name')
                        ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
                        ->where('peminjaman_tbl.status',0)->where('anggota_id',$anggota[0]->id)->orderBy('id','DESC')->paginate(25);
        } else {
            $peminjaman = Peminjaman::select('peminjaman_tbl.*','users.name')
                        ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
                        ->where('peminjaman_tbl.status',0)->orderBy('id','DESC')->paginate(25);
        }
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
		return view('admin.peminjaman.index',compact('peminjaman','pengaturan'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        if(Auth::user()->group == 3){
            $search = $request->get('search');
            $anggota = DB::table('anggota_tbl')->where('nis',Auth::user()->name)->get()->toArray();
            $peminjaman = Peminjaman::select('peminjaman_tbl.*','users.name')
                    ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
                    ->where('peminjaman_tbl.status',0)
                    ->where('anggota_id',$anggota[0]->id)
                    ->where(function ($query) use ($search) {
                        $query->where(function ($query) use ($search) {
                            $query->where('tanggal_pinjam', 'LIKE', '%'.$search.'%')
                                ->orWhere('tanggal_kembali', 'LIKE', '%'.$search.'%');
                        })
                        ->orwhereHas('buku', function ($query) use ($search) {
                            $query->where('judul', 'LIKE', '%'. $search .'%');
                        })
                        ->orWhereHas('anggota', function ($query) use ($search) {
                            $query->where('nama', 'LIKE', '%'. $search .'%');
                        });
                     })
                    ->orderBy('id','DESC')->paginate(25);
        } else {
            $search = $request->get('search');
            $peminjaman = Peminjaman::select('peminjaman_tbl.*','users.name')
                    ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
                    ->where('peminjaman_tbl.status',0)
                    ->where(function ($query) use ($search) {
                        $query->where('tanggal_pinjam', 'LIKE', '%'.$search.'%')
                            ->orWhere('tanggal_kembali', 'LIKE', '%'.$search.'%');
                    })
                    ->orwhereHas('buku', function ($query) use ($search) {
                        $query->where('judul', 'LIKE', '%'. $search .'%');
                    })
                    ->orWhereHas('anggota', function ($query) use ($search) {
                        $query->where('nama', 'LIKE', '%'. $search .'%');
                    })
                    ->orderBy('id','DESC')->paginate(25);
        }
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
		return view('admin.peminjaman.index',compact('peminjaman'));
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $anggota = Anggota::get();
        $buku = Buku::get();
		$view=view('admin.peminjaman.create',compact('anggota','buku'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'daterange' => 'required'
        ]);

		
        $total = count($request->buku_id);
        for($i=0;$i<$total;$i++){
            $input['anggota_id'] = $request->anggota_id;
            $input['buku_id'] = $request->buku_id[$i];
            $tgl_pinjam = substr($request->daterange,3,2);
            $bln_pinjam = substr($request->daterange,0,2);
            $thn_pinjam = substr($request->daterange,6,4);
            $input['tanggal_pinjam'] = $thn_pinjam.'-'.$bln_pinjam.'-'.$tgl_pinjam;
            
            $tgl_kembali = substr($request->daterange,16,2);
            $bln_kembali = substr($request->daterange,13,2);
            $thn_kembali = substr($request->daterange,19,4);
            $input['tanggal_kembali'] = $thn_kembali.'-'.$bln_kembali.'-'.$tgl_kembali;
            $input['user_id'] = Auth::user()->id;
            
            Peminjaman::create($input);
        }
       
		return redirect('/peminjaman')->with('status','Data Tersimpan');
    }

    ## Tampilkan Detail
    public function show(Peminjaman $peminjaman)
    {
        $anggota = DB::table('anggota_tbl')->where('id',$peminjaman->anggota_id)->get()->toArray();
        $buku = DB::table('buku_tbl')->where('id',$peminjaman->buku_id)->get()->toArray();
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
        $view=view('admin.peminjaman.show', compact('peminjaman','anggota','buku','pengaturan'));
        $view=$view->render();
        return $view;
    }

    ## Tampilkan Form Edit
    public function edit(Peminjaman $peminjaman)
    {
        $anggota = Anggota::get();
        $buku = Buku::get();
        $view=view('admin.peminjaman.edit', compact('peminjaman','anggota','buku'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $this->validate($request, [
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'daterange' => 'required'
        ]);

        $peminjaman->fill($request->all());
        
        $tgl_pinjam = substr($request->daterange,3,2);
        $bln_pinjam = substr($request->daterange,0,2);
        $thn_pinjam = substr($request->daterange,6,4);
		$peminjaman->tanggal_pinjam = $thn_pinjam.'-'.$bln_pinjam.'-'.$tgl_pinjam;
        
        $tgl_kembali = substr($request->daterange,16,2);
        $bln_kembali = substr($request->daterange,13,2);
        $thn_kembali = substr($request->daterange,19,4);
		$peminjaman->tanggal_kembali = $thn_kembali.'-'.$bln_kembali.'-'.$tgl_kembali;
        
		$peminjaman->user_id = Auth::user()->id;
    	$peminjaman->save();
		
		return redirect('/peminjaman')->with('status', 'Data Berhasil Diubah');
    }

    ## Edit Data
    public function update2(Request $request, Peminjaman $peminjaman)
    {
        
        $peminjaman->fill($request->all());
        
		$peminjaman->status = 1;
		$peminjaman->user_id = Auth::user()->id;
    	$peminjaman->save();
        
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

		return redirect('/peminjaman')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Peminjaman $peminjaman)
    {
        $id = $peminjaman->id;
		$peminjaman->delete();
		
        return redirect('/peminjaman')->with('status', 'Data Berhasil Dihapus');
    }
}
