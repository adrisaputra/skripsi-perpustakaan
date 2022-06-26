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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

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
        if(Auth::user()->group == 3){
            $anggota = DB::table('anggota_tbl')->where('nis',Auth::user()->name)->get()->toArray();
            $pengembalian = Pengembalian::select('peminjaman_tbl.*','users.name', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
                        ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
                        ->where('peminjaman_tbl.status',0)->where('anggota_id',$anggota[0]->id)->orderBy('id','DESC')->paginate(25);
        } else {
            $pengembalian = Pengembalian::select('peminjaman_tbl.*','users.name', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
            ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
            ->where('peminjaman_tbl.status',0)->orderBy('id','DESC')->paginate(25);
        }
        $pengaturan = DB::table('pengaturan_tbl')->where('id',1)->get()->toArray();
		return view('admin.pengembalian.index',compact('pengembalian','pengaturan'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $search = $request->get('search');

        if(Auth::user()->group == 3){ 
            $anggota = DB::table('anggota_tbl')->where('nis',Auth::user()->name)->get()->toArray();
            $pengembalian = Pengembalian::select('peminjaman_tbl.*','users.name', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
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
            $pengembalian = Pengembalian::select('peminjaman_tbl.*','users.name', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
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
		$pengembalian->user_id2 = Auth::user()->id;
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

    public function print()
	{
		$spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(10);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(40);
		$sheet->getColumnDimension('D')->setWidth(20);
		$sheet->getColumnDimension('E')->setWidth(20);
		$sheet->getColumnDimension('F')->setWidth(20);
		$sheet->getColumnDimension('G')->setWidth(20);

        $sheet->setCellValue('A1', 'DATA PEMINJAMAN'); $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $sheet->setCellValue('A3', 'NO');
        $sheet->setCellValue('B3', 'Nama Anggota');
        $sheet->setCellValue('C3', 'Nama Buku');
        $sheet->setCellValue('D3', 'Tanggal Pinjam');
        $sheet->setCellValue('E3', 'Tanggal Kembali');
        $sheet->setCellValue('F3', 'Terlambat (Hari)');
        $sheet->setCellValue('G3', 'Denda (Rp)');
        $rows = 4;
        $no = 1;

        $pengaturan = Pengaturan::first();
        if(Auth::user()->group == 3){
            $anggota = DB::table('anggota_tbl')->where('nis',Auth::user()->name)->get()->toArray();
            $pengembalian = Pengembalian::select('peminjaman_tbl.*','users.name', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
                        ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
                        ->where('peminjaman_tbl.status',0)->where('anggota_id',$anggota[0]->id)->orderBy('id','DESC')->get();
        } else {
            $pengembalian = Pengembalian::select('peminjaman_tbl.*','users.name', DB::raw(" DATEDIFF(CURDATE(),tanggal_kembali) as hari"))
            ->leftJoin('users', 'peminjaman_tbl.user_id', '=', 'users.id')
            ->where('peminjaman_tbl.status',0)->orderBy('id','DESC')->get();
        }

        foreach($pengembalian as $v){
            $sheet->setCellValue('A' . $rows, $no++);
            $sheet->setCellValue('B' . $rows, $v->anggota->nama);
            $sheet->setCellValue('C' . $rows, $v->buku->judul);
            $sheet->setCellValue('D' . $rows, date('d-m-Y', strtotime($v->tanggal_pinjam)));
            $sheet->setCellValue('E' . $rows, date('d-m-Y', strtotime($v->tanggal_kembali)));
            $total_denda = $v->hari * $pengaturan->jumlah;
            if($v->hari>0){
                $sheet->setCellValue('F' . $rows, $v->hari." Hari");
            }
			
            if($v->hari>0){
                $sheet->getStyle('G' . $rows)->getNumberFormat() ->setFormatCode('#,##0');
                $sheet->setCellValue('G' . $rows, $total_denda);
            }
            $rows++;
        }
        
        $sheet->getStyle('A3:G'.($rows-1))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A3:G'.($rows-1))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $type = 'xlsx';
        $fileName = "DATA PENGEMBALIAN.".$type;

        if($type == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
        } else if($type == 'xls') {
            $writer = new Xls($spreadsheet);			
        }		
        $writer->save("public/upload/report/".$fileName);
        header("Content-Type: application/vnd.ms-excel");
        return redirect(url('/')."/public/upload/report/".$fileName);    
	}

}
