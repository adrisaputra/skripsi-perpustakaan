<?php

namespace App\Http\Controllers;

use App\Models\Buku;   //nama model
use App\Models\Kategori;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $buku = Buku::orderBy('id','DESC')->paginate(25);
		return view('admin.buku.index',compact('buku'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $buku = $request->get('search');
        $buku = Buku::
                where('isbn', 'LIKE', '%'.$buku.'%')
                ->orWhere('judul', 'LIKE', '%'.$buku.'%')
                ->orWhere('nama_penulis', 'LIKE', '%'.$buku.'%')
                ->orWhere('nama_penerbit', 'LIKE', '%'.$buku.'%')
                ->orWhere('tahun_terbit', 'LIKE', '%'.$buku.'%')
                ->orwhereHas('kategori', function ($query) use ($buku) {
                    $query->where('nama_kategori', 'LIKE', '%'. $buku .'%');
                })->orderBy('id','DESC')->paginate(25);
		return view('admin.buku.index',compact('buku'));
    }
	
    ## Tampilkan Form Create
    public function create()
    {
        $kategori = Kategori::get();
		$view=view('admin.buku.create',compact('kategori'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_id' => 'required',
            'judul' => 'required',
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'deskripsi' => 'required',
            'cover' => 'mimes:jpg,jpeg,png|max:500'
        ]);

		$input['isbn'] = $request->isbn;
		$input['kategori_id'] = $request->kategori_id;
		$input['judul'] = $request->judul;
		$input['nama_penulis'] = $request->nama_penulis;
		$input['nama_penerbit'] = $request->nama_penerbit;
		$input['tahun_terbit'] = $request->tahun_terbit;
		$input['jumlah_buku'] = $request->jumlah_buku;
		$input['rak_buku'] = $request->rak_buku;
        $input['deskripsi'] = $request->deskripsi;
        
        if($request->file('cover')){
            $input['cover'] = time().'.'.$request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('upload/cover'), $input['cover']);
        }	
        
        if($request->file('file')){
            $input['file'] = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/file'), $input['file']);
        }	
        
		$input['user_id'] = Auth::user()->id;
		
        Buku::create($input);
		
		return redirect('/buku')->with('status','Data Tersimpan');
    }

    ## Tampilkan Detail
    public function show($id)
    {
        //
    }

    ## Tampilkan Form Edit
    public function edit(Buku $buku)
    {
        $kategori = Kategori::get();
        $view=view('admin.buku.edit', compact('buku','kategori'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
            'kategori_id' => 'required',
            'judul' => 'required',
            'nama_penulis' => 'required',
            'nama_penerbit' => 'required',
            'tahun_terbit' => 'required|numeric|digits:4',
            'deskripsi' => 'required',
            'cover' => 'mimes:jpg,jpeg,png|max:500'
        ]);

        $buku->fill($request->all());
        
		if($request->file('cover') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('upload/cover'), $filename);
            $buku->cover = $filename;
		}
		
		if($request->file('file') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/file'), $filename);
            $buku->file = $filename;
		}
		
		$buku->user_id = Auth::user()->id;
    	$buku->save();
		
		return redirect('/buku')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Buku $buku)
    {
        $id = $buku->id;
		$buku->delete();
		
        return redirect('/buku')->with('status', 'Data Berhasil Dihapus');
    }
}
