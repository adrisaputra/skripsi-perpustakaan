@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Edit Pengaturan</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									<form action="{{ url('/pengaturan/edit/'.$pengaturan->id) }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama</label>
											<div class="col-sm-10">
												<input type="text" name="nama" class="form-control @if ($errors->has('nama')) is-invalid @endif " placeholder="Nama" value="{{ $pengaturan->nama }}">
												@if ($errors->has('nama')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('nis') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Jumlah</label>
											<div class="col-sm-10">
												<input type="text" name="jumlah" class="form-control @if ($errors->has('jumlah')) is-invalid @endif " placeholder="Jumlah" value="{{ $pengaturan->jumlah }}">
												@if ($errors->has('jumlah')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('nama') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
												<a href="{{ url('/pengaturan') }}" class="btn btn-warning">kembali</a>
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