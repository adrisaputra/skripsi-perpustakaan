@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Ubah Status User</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/user/edit/'.$user->id) }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="PUT">
										<input type="hidden" name="group"  value="{{ $user->group }}" placeholder="group">
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('Nama') }}</label>
											<div class="col-sm-10">
												<input type="text" name="name" class="form-control @if ($errors->has('name')) is-invalid @endif " placeholder="Nama" value="{{ $user->name }}">
												@if ($errors->has('name')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('name') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('Alamat Email') }}</label>
											<div class="col-sm-10">
												<input type="text" name="email" class="form-control @if ($errors->has('email')) is-invalid @endif " placeholder="Alamat Email" value="{{ $user->email }}">
												@if ($errors->has('email')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('email') }}</label>@endif
											</div>
										</div>
										@if($user->group != 3)
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('Password') }}</label>
											<div class="col-sm-10">
												<input type="password" name="password" class="form-control @if ($errors->has('password')) is-invalid @endif " placeholder="Password">
												@if ($errors->has('password')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('password') }}</label>@endif
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> {{ __('Konfirmasi Password') }}</label>
											<div class="col-sm-10">
												<input type="password" name="password_confirmation" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif " placeholder="Konfirmasi Password">
												@if ($errors->has('password_confirmation')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('password_confirmation') }}</label>@endif
											</div>
										</div>
										@endif
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right">Status</label>
											<div class="col-sm-10">
												<select class="form-control mb-3" name="status">
													@if($user->status==0)
														<option value="0" selected>Tidak Aktif</option>
													@else
														<option value="0">Tidak Aktif</option>
													@endif
													
													@if($user->status==1)
														<option value="1" selected>Aktif</option>
													@else
														<option value="1">Aktif</option>
													@endif
												</select>
											</div>
										</div>
										
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
												<a href="{{ url('/user') }}" class="btn btn-warning">kembali</a>
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
@endsection