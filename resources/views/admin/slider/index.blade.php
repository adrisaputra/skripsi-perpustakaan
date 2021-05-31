@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Slider</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/slider/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/slider/create') }}" class="btn btn-success btn-flat">Tambah Data</a>
											<a href="{{ url('/slider') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
									</div>
									</form><br>
									
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
									<div class="table-responsive table-bordered">
										<table class="table mb-0">
											<thead>
												<tr>
													<th style="width:5%;">#</th>
													<th style="width:88%;">gambar</th>
													<th style="width:20%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($slider as $v)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>
													<?php if($v->gambar) { ?>
														<img src="{{ url('/upload/slider/'.$v->gambar) }}" width="300px" height="100px"></td>
													<?php } else { ?>
														<img src="{{ url('/upload/no_image.png') }}" width="150px" height="100px">
													<?php } ?>
													</td>
													<td>
														<a href="{{ url('/slider/edit/'.$v->id) }}"><i class="align-middle" data-feather="edit-2"></i></a> |
														<a href="{{ url('/slider/hapus/'.$v->id) }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection