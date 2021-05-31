@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Edit Slider</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									<form action="{{ url('/slider/edit/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Judul</label>
											<div class="col-sm-10">
												<input class="form-control @if ($errors->has('judul')) is-invalid @endif " type="text" name="judul" value="{{ $slider->judul }}">
												@if ($errors->has('judul')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('judul') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Isi</label>
											<div class="col-sm-10">
												<textarea class="form-control @if ($errors->has('isi')) is-invalid @endif " type="text" name="isi" >{{ $slider->isi }}</textarea>
												@if ($errors->has('isi')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('isi') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Gambar</label>
											<div class="col-sm-10">
												<i style="font-size:10px">Ukuran File Tidak Boleh Lebih Dari 500 Kb</i><br>
												<input type="file" name="gambar" >
												@if ($errors->has('gambar'))<label id="validation-file-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-file" style="display: inline-block;">{{ $errors->first('gambar') }}</label>@endif
												<br><br>
												<?php if($slider->gambar) { ?>
													<img src="{{ url('/upload/slider/'.$slider->gambar) }}" width="150px" height="100px">
												<?php } ?>
											</div>
										</div>
										
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
												<a href="{{ url('/slider') }}" class="btn btn-warning">kembali</a>
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
			<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
@endsection