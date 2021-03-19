@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Edit Peminjaman</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									<form action="{{ url('/peminjaman/edit/'.$peminjaman->id) }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('Nama Anggota') }}</label>
											<div class="col-sm-10">
												<select class="form-control select2 @if ($errors->has('anggota_id')) is-invalid @endif " name="anggota_id">
													<option value="">- Pilih -</option>
													@foreach ($anggota as $v)
														<option value="{{ $v->id }}" @if($peminjaman->anggota_id==$v->id) selected @endif>{{ $v->nis }} || {{ $v->nama }} </option>
													@endforeach
												</select>
												@if ($errors->has('anggota_id')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('anggota_id') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('Buku') }}</label>
											<div class="col-sm-10">
												<select class="form-control select2 data-toggle="select2" @if ($errors->has('buku_id')) is-invalid @endif " name="buku_id">
													<option value="">- Pilih -</option>
													@foreach ($buku as $v)
														<option value="{{ $v->id }}"  @if($peminjaman->buku_id==$v->id) selected @endif>{{ $v->isbn }} || {{ $v->judul }} </option>
													@endforeach
												</select>
												@if ($errors->has('buku_id')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('buku_id') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Tanggal Pinjam</label>
											<div class="col-sm-10">
											<?php
												$tgl_pinjam = substr($peminjaman->tanggal_pinjam,8,2);
												$bln_pinjam = substr($peminjaman->tanggal_pinjam,5,2);
												$thn_pinjam = substr($peminjaman->tanggal_pinjam,0,4);

												$tgl_kembali = substr($peminjaman->tanggal_kembali,8,2);
												$bln_kembali = substr($peminjaman->tanggal_kembali,5,2);
												$thn_kembali = substr($peminjaman->tanggal_kembali,0,4);
												
											?>
												<input type="text" name="daterange" class="form-control @if ($errors->has('daterange')) is-invalid @endif " placeholder="Tanggal Pinjam" value="{{ $bln_pinjam }}/{{ $tgl_pinjam }}/{{ $thn_pinjam }} - {{ $bln_kembali }}/{{ $tgl_kembali }}/{{ $thn_kembali }}">
												@if ($errors->has('daterange')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('daterange') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
												<a href="{{ url('/peminjaman') }}" class="btn btn-warning">kembali</a>
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