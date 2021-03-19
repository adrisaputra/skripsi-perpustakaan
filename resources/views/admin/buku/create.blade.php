@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Tambah Buku</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									<form action="{{ url('/buku') }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> ISBN</label>
											<div class="col-sm-10">
												<input type="text" name="isbn" class="form-control @if ($errors->has('isbn')) is-invalid @endif " placeholder="ISBN" value="{{ old('isbn') }}">
												@if ($errors->has('isbn')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('isbn') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('kategori') }}</label>
											<div class="col-sm-10">
												<select class="form-control @if ($errors->has('kategori_id')) is-invalid @endif " name="kategori_id">
													<option value="">- Pilih -</option>
													@foreach ($kategori as $v)
														<option value="{{ $v->id }}">{{ $v->nama_kategori }}</option>
													@endforeach
												</select>
												@if ($errors->has('kategori_id')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('kategori_id') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Judul</label>
											<div class="col-sm-10">
												<input type="text" name="judul" class="form-control @if ($errors->has('judul')) is-invalid @endif " placeholder="Judul" value="{{ old('judul') }}">
												@if ($errors->has('judul')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('judul') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama Penulis</label>
											<div class="col-sm-10">
												<input type="text" name="nama_penulis" class="form-control @if ($errors->has('nama_penulis')) is-invalid @endif " placeholder="Nama Penulis" value="{{ old('nama_penulis') }}">
												@if ($errors->has('nama_penulis')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('nama_penulis') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama Penerbit</label>
											<div class="col-sm-10">
												<input type="text" name="nama_penerbit" class="form-control @if ($errors->has('nama_penerbit')) is-invalid @endif " placeholder="Nama Penerbit" value="{{ old('nama_penerbit') }}">
												@if ($errors->has('nama_penerbit')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('nama_penerbit') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Tahun Terbit</label>
											<div class="col-sm-10">
												<input type="text" name="tahun_terbit" class="form-control @if ($errors->has('tahun_terbit')) is-invalid @endif " placeholder="Tahun Terbit" value="{{ old('tahun_terbit') }}">
												@if ($errors->has('tahun_terbit')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('tahun_terbit') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Jumlah Buku</label>
											<div class="col-sm-10">
												<input type="text" name="jumlah_buku" class="form-control @if ($errors->has('jumlah_buku')) is-invalid @endif " placeholder="Jumlah Buku" value="{{ old('jumlah_buku') }}">
												@if ($errors->has('jumlah_buku')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('jumlah_buku') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Rak Buku</label>
											<div class="col-sm-10">
												<input type="text" name="rak_buku" class="form-control @if ($errors->has('rak_buku')) is-invalid @endif " placeholder="Rak Buku" value="{{ old('rak_buku') }}">
												@if ($errors->has('rak_buku')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('rak_buku') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Deskripsi</label>
											<div class="col-sm-10">
												<textarea id="konten" name="deskripsi" class="form-control @if ($errors->has('deskripsi')) is-invalid @endif " rows="3">{{ old('deskripsi') }}</textarea>
												@if ($errors->has('deskripsi')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('deskripsi') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Cover Buku</label>
											<div class="col-sm-10">
												<i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb</i><br>
												<input type="file" name="cover" >
												@if ($errors->has('cover'))<label id="validation-file-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-file" style="display: inline-block;">{{ $errors->first('cover') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">File PDF</label>
											<div class="col-sm-10">
												<input type="file" name="file" >
												@if ($errors->has('file'))<label id="validation-file-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-file" style="display: inline-block;">{{ $errors->first('file') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
												<a href="{{ url('/buku') }}" class="btn btn-warning">kembali</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>			<script src="{{asset('assets2/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection