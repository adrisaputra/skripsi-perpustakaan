@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Detail Pengembalian</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									<form action="{{ url('/pengembalian/edit2/'.$pengembalian->id) }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">
										
										<div class="form-group row">
											<div class="col-sm-12">
												<center>DATA BUKU</center>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> ISBN</label>
											<div class="col-sm-10">
												<input type="hidden" class="form-control" value="{{ $pengembalian->buku_id }}" name="buku_id">
												<input type="text" class="form-control @if ($errors->has('isbn')) is-invalid @endif " value="{{ $buku[0]->isbn }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Judul</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('judul')) is-invalid @endif " value="{{ $buku[0]->judul }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama Penulis</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('nama_penulis')) is-invalid @endif " value="{{ $buku[0]->nama_penulis }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama Penerbit</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('nama_penerbit')) is-invalid @endif "  value="{{ $buku[0]->nama_penerbit }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Tahun terbit</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('tahun_terbit')) is-invalid @endif "  value="{{ $buku[0]->tahun_terbit }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Jumlah Buku</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('jumlah_buku')) is-invalid @endif "  value="{{ $buku[0]->jumlah_buku }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Rak Buku</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('rak_buku')) is-invalid @endif "  value="{{ $buku[0]->rak_buku }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Deskripsi</label>
											<div class="col-sm-10">
											<textarea id="konten" class="form-control @if ($errors->has('deskripsi')) is-invalid @endif " rows="10" disabled>{{ $buku[0]->deskripsi }}</textarea>
											</div>
										</div><br>
										
										<div class="form-group row">
											<div class="col-sm-12">
												<center>DATA PEMINJAM</center>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> NIS</label>
											<div class="col-sm-10">
												<input type="hidden" class="form-control" value="{{ $pengembalian->anggota_id }}" name="anggota_id">
												<input type="text" class="form-control @if ($errors->has('nis')) is-invalid @endif "  value="{{ $anggota[0]->nis }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('nama')) is-invalid @endif "  value="{{ $anggota[0]->nama }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Jenis Kelamin</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('jenis_kelamin')) is-invalid @endif "  value="{{ $anggota[0]->jenis_kelamin }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Kelas</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('kelas')) is-invalid @endif "  value="{{ $anggota[0]->kelas }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Telepon</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('telepon')) is-invalid @endif "  value="{{ $anggota[0]->telepon }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Alamat</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('alamat')) is-invalid @endif "  value="{{ $anggota[0]->alamat }}" disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Email</label>
											<div class="col-sm-10">
												<input type="text" class="form-control @if ($errors->has('email')) is-invalid @endif "  value="{{ $anggota[0]->email }}" disabled>
											</div>
										</div><br>
										
										<div class="form-group row">
											<div class="col-sm-12">
												<center>WAKTU MEMINJAM</center>
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Tanggal Pinjam</label>
											<div class="col-sm-10">
												<input type="hidden" class="form-control" value="{{ $pengembalian->tanggal_pinjam }}" name="tanggal_pinjam">
												<input type="text" class="form-control @if ($errors->has('email')) is-invalid @endif " value="{{ $pengembalian->tanggal_pinjam }}" disabled>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Tanggal Kembali</label>
											<div class="col-sm-10">
												<input type="hidden" class="form-control" value="{{ $pengembalian->tanggal_kembali }}" name="tanggal_hrs_kembali">
												<input type="text" class="form-control @if ($errors->has('email')) is-invalid @endif " value="{{ $pengembalian->tanggal_kembali }}" disabled>
											</div>
										</div>
										
										<?php $total_denda =  $hari[0]->hari * $pengaturan[0]->jumlah; ?>

										@if($hari[0]->hari>0)
											<div class="form-group row">
												<label class="col-form-label col-sm-2 text-sm-right"> Terlambat (hari)</label>
												<div class="col-sm-10">
													<input type="hidden" class="form-control" value="{{ $hari[0]->hari }}" name="hari">
													<input type="text" class="form-control" value="{{ $hari[0]->hari }}" disabled>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-form-label col-sm-2 text-sm-right"> Denda (Rp)</label>
												<div class="col-sm-10">
													<input type="hidden" class="form-control" value="{{ $total_denda }}" name="denda">
													<input type="text" class="form-control" value="{{ number_format($total_denda,0,",",".") }}" disabled>
												</div>
											</div>
										@endif
										
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success" onclick="return confirm('Anda Yakin ?');">Buku Di Kembalikan</button>
												<a href="{{ url('/pengembalian') }}" class="btn btn-warning">kembali</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
			<script src="{{asset('assets2/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection