@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Edit Profil</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
								<form action="{{ url('/'.Request::segment(1).'/edit_profil/'.$user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								
										
									@if ($message = Session::get('status'))
									  <div class="alert alert-primary alert-dismissible" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<div class="alert-message">
												{{ $message }}
											</div>
										</div>
									@endif
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Nama User</label>
											<div class="col-sm-10">
											@if(Auth::user()->group==2)
												<input type="text" class="form-control" placeholder="Nama User" value="{{ $user->name }}" disabled>
												<input type="hidden" class="form-control" placeholder="Nama User" name="name" value="{{ $user->name }}" >
											@else
												<input type="text" class="form-control" placeholder="Nama User" name="name" value="{{ $user->name }}" >
											@endif
											<input type="hidden" class="form-control" placeholder="Nama User" name="name2" value="{{ $user->name }}" >
												@if ($errors->has('name')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('name') }}</label>@endif
												</div>
										</div>	
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" >
												@if ($errors->has('email')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('email') }}</label>@endif
												</div>
										</div>	
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Foto User</label>
											<div class="col-sm-10">
												<input type="file" class="form-control" placeholder="Foto" name="foto" value="{{ $user->foto }}" >
												<span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 300 Kb (jpg,jpeg,png)</i></span>
												@if($user->foto)
												<br>
													<img src="{{ asset('upload/foto/'.$user->foto) }}" width="150px" height="150px">
												@endif
												@if ($errors->has('foto')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('foto') }}</label>@endif
												</div>
										</div>	
										
										<hr style="border-top: 1px solid #d4d8e0;">

										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Password Lama</label>
											<div class="col-sm-10">
												<input class="form-control @if ($errors->has('current-password')) is-invalid @endif " type="password" name="current-password">
												@if ($errors->has('current-password')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('current-password') }}</label>@endif
												</div>
										</div>	
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Password</label>
											<div class="col-sm-10">
												<input class="form-control @if ($errors->has('password')) is-invalid @endif " type="password" name="password">
												@if ($errors->has('password')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('password') }}</label>@endif
											</div>
										</div>	
										
										<div class="form-group row">
											<label class="col-form-label col-sm-2 text-sm-right"> Konfirmasi Password</label>
											<div class="col-sm-10">
												<input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif " type="password" name="password_confirmation">
												@if ($errors->has('password_confirmation')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('password_confirmation') }}</label>@endif
											</div>
										</div>	
										
										<div class="form-group row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-success">Simpan</button>
												<button type="reset" class="btn btn-danger">Reset</button>
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