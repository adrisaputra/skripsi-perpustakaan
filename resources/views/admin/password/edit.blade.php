@extends('admin.layout')
@section('konten')

        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12 col-xl-12">
							<div class="card">
								<div class="card-header">
									<h3>Ganti Password</h3>
									<!--h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6-->
								</div>
								<div class="card-body">
									 <form method="POST" action="{{ route('user.password.update') }}">
                            @method('patch')
                            @csrf
										
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
											<label class="col-form-label col-sm-2 text-sm-right"> Password Lama</label>
											<div class="col-sm-10">
												<input class="form-control @if ($errors->has('current_password')) is-invalid @endif " type="password" name="current_password">
												@if ($errors->has('current_password')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email">{{ $errors->first('current_password') }}</label>@endif
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