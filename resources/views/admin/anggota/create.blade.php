@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Tambah Anggota</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									<form action="{{ url('/anggota') }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> NIS</label>
											<div class="col-sm-10">
												<input type="text" name="nis" class="form-control @if ($errors->has('nis')) is-invalid @endif " placeholder="NIS" value="{{ old('nis') }}">
												@if ($errors->has('nis')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('nis') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama</label>
											<div class="col-sm-10">
												<input type="text" name="nama" class="form-control @if ($errors->has('nama')) is-invalid @endif " placeholder="Nama" value="{{ old('nama') }}">
												@if ($errors->has('nama')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('nama') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Jenis Kelamin</label>
											<div class="col-sm-10">
												<select class="form-control @if ($errors->has('jenis_kelamin')) is-invalid @endif " name="jenis_kelamin">
													<option value="">- Pilih -</option>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
												@if ($errors->has('jenis_kelamin')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('jenis_kelamin') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Kelas</label>
											<div class="col-sm-10">
												<input type="text" name="kelas" class="form-control @if ($errors->has('kelas')) is-invalid @endif " placeholder="Kelas" value="{{ old('kelas') }}">
												@if ($errors->has('kelas')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('kelas') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Telepon</label>
											<div class="col-sm-10">
												<input type="text" name="telepon" class="form-control @if ($errors->has('telepon')) is-invalid @endif " placeholder="Telepon" value="{{ old('telepon') }}">
												@if ($errors->has('telepon')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('telepon') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Email</label>
											<div class="col-sm-10">
												<input type="text" name="email" class="form-control @if ($errors->has('email')) is-invalid @endif " placeholder="Email" value="{{ old('email') }}">
												@if ($errors->has('email')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('email') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Alamat</label>
											<div class="col-sm-10">
												<textarea id="konten" name="alamat" class="form-control @if ($errors->has('alamat')) is-invalid @endif " rows="3">{{ old('alamat') }}</textarea>
												@if ($errors->has('alamat')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('alamat') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Foto</label>
											<div class="col-sm-10">
												<i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 300 Kb</i><br>
												<input type="file" name="foto" >
												@if ($errors->has('foto'))<label id="validation-file-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-file" style="display: inline-block;">{{ $errors->first('foto') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
												<a href="{{ url('/anggota') }}" class="btn btn-warning">kembali</a>
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