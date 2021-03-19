@extends('admin/layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">
					
					<div class="row">
						<div class="col-12 col-sm-12 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="media-body">
											<h3 class="mb-2">Selamat Datang "
												Administrator
											"</h3>
											<div class="mb-0">
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
					@if(Auth::user()->group==2)
					<!--div class="row">
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-info" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Permohonan Masuk</div>
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
											<i class="feather-lg text-danger" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Diperbaiki</div>
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
											<i class="feather-lg text-warning" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Diterima</div>
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
											<i class="feather-lg text-success" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Selesai</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div-->
					@elseif(Auth::user()->group==3)
					<!--div class="row">
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-primary" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Jumlah Pendaftaran IUMK</div>
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
											<i class="feather-lg text-danger" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Diproses</div>
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
											<i class="feather-lg text-info" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Diperbaiki</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-sm-6 col-xl d-flex">
							<div class="card flex-fill">
								<div class="card-body py-4">
									<div class="media">
										<div class="d-inline-block mt-2 mr-3">
											<i class="feather-lg text-warning" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Diterima</div>
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
											<i class="feather-lg text-success" data-feather="list"></i>
										</div>
										<div class="media-body">
											<h3 class="mb-2"></h3>
											<div class="mb-0">Selesai</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div-->
					@endif
				</div>
			</main>
@endsection