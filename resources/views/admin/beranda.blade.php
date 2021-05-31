@extends('admin/layout')
@section('konten')

			<main class="content">
				<div class="container-fluid p-0">
				<div class="bd-example">
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach( $slider as $v )
							<li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->iteration }}"  @if($loop->iteration==1) class="active" @endif" ></li>
						@endforeach
					</ol>
					<div class="carousel-inner">
						@foreach( $slider as $v )
							<div class="carousel-item  @if($loop->iteration==1) active @endif">
								<img src="{{ asset('upload/slider/'.$v->gambar) }}" class="d-block w-100" alt="..." height="350px">
							</div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			
			<div class="row">
				<div class="col-12 col-sm-12 col-xl d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="media">
								<div class="media-body"><marquee>
									<h3 class="mb-2">Selamat Datang "
									@if(Auth::user()->group == 1)
										Administrator
									@elseif(Auth::user()->group == 2)
										Operator
									@elseif(Auth::user()->group == 3)
										Anggota
									@endif
									"</h3></marquee>
									<div class="mb-0">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if(Auth::user()->group==1)
			<div class="row">
				<div class="col-12 col-sm-6 col-xl d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i class="feather-lg text-info" data-feather="book"></i>
								</div>
								<div class="media-body">
									<h3 class="mb-2">{{ $buku }}</h3>
									<div class="mb-0">Jumlah Buku</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-xl d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i class="feather-lg text-success" data-feather="users"></i>
								</div>
								<div class="media-body">
									<h3 class="mb-2">{{ $anggota }}</h3>
									<div class="mb-0">Jumlah Anggota</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-xl d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i class="feather-lg text-danger" data-feather="users"></i>
								</div>
								<div class="media-body">
									<h3 class="mb-2">{{ $user }}</h3>
									<div class="mb-0">Jumlah User</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@elseif(Auth::user()->group==2)
			<div class="row">
				<div class="col-12 col-sm-6 col-xl d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i class="feather-lg text-info" data-feather="book"></i>
								</div>
								<div class="media-body">
									<h3 class="mb-2">{{ $buku }}</h3>
									<div class="mb-0">Jumlah Buku</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-xl d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i class="feather-lg text-success" data-feather="users"></i>
								</div>
								<div class="media-body">
									<h3 class="mb-2">{{ $anggota }}</h3>
									<div class="mb-0">Jumlah Anggota</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@elseif(Auth::user()->group==3)
			
			@endif
		</div>
	</main>
@endsection