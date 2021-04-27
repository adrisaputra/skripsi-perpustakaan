@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">
                <div class="text-center">
                    <img src="{{ asset('/assets/img/logo.png') }}" alt="Chris Wood" class="img-fluid" style="max-width: 100%;">
                </div>
                @error('status')
                <br>
                
                  <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="alert-message">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
                <form action="{{ url('/registrasi') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
                    <div class="form-group">
                        <label>{{ __('NIS') }}</label>
                        <input type="text" class="form-control form-control-lg" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required autocomplete="email" autofocus placeholder="Masukkan NIS">
                        @if ($errors->has('nis')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email" style="display: block;">{{ $errors->first('nis') }}</label>@endif
                    </div>
                    <div class="form-group">
                        <label>{{ __('Nama Lengkap') }}</label>
                        <input type="text" class="form-control form-control-lg" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="email" autofocus placeholder="Masukkan Nama Lengkap">
                        @if ($errors->has('nama')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email" style="display: block;">{{ $errors->first('nama') }}</label>@endif
                    </div>
                    <div class="form-group">
                        <label>{{ __('Jenis Kelamin') }}</label>
                        <select class="form-control @if ($errors->has('jenis_kelamin')) is-invalid @endif " name="jenis_kelamin">
													<option value="">- Pilih -</option>
													<option value="Laki-laki" @if(old('jenis_kelamin')=="Laki-laki") selected @endif>Laki-laki</option>
													<option value="Perempuan" @if(old('jenis_kelamin')=="Perempuan") selected @endif>Perempuan</option>
												</select>
                                                
                        @if ($errors->has('jenis_kelamin')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email" style="display: block;">{{ $errors->first('jenis_kelamin') }}</label>@endif
                    </div>
                    <div class="form-group">
                        <label>{{ __('Kelas') }}</label>
                        <input type="text" class="form-control form-control-lg" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}" required autocomplete="email" autofocus placeholder="Masukkan Kelas">
                        @if ($errors->has('kelas')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email" style="display: block;">{{ $errors->first('kelas') }}</label>@endif
                    </div>
                    <div class="form-group">
                        <label>{{ __('Telepon') }}</label>
                        <input type="text" class="form-control form-control-lg" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="email" autofocus placeholder="Masukkan Telepon">
                        @if ($errors->has('telepon')) <label id="validation-email-error" class="error jquery-validation-error small form-text invalid-feedback" for="validation-email" style="display: block;">{{ $errors->first('telepon') }}</label>@endif
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('Registrasi') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection