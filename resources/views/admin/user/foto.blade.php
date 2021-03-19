@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Foto "{{ $wisata[0]->nama_wisata }}"</h3>
								</div>
								<div class="card-body">
									<form action="/foto/search" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="/foto/create/{{ $wisata[0]->id }}" class="btn btn-success btn-flat">Tambah Data</a>
											<a href="/foto/{{ $wisata[0]->id }}" class="btn btn-warning btn-flat">Refresh</a>
											<a href="/foto" class="btn btn-danger btn-flat">Kembali</a>
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
													<th style="width:88%;">Gambar</th>
													<th style="width:10%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($foto as $v)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>
													<?php if($v->gambar) { ?>
														<img src="/upload/foto/{{ $v->gambar }}" width="150px" height="100px"></td>
													<?php } else { ?>
														<img src="/upload/no_image.png" width="150px" height="100px">
													<?php } ?>
													</td>
													<td>
														<!--a href="/foto/edit/{{ request()->segment(2) }}/{{ $v->id }}"><i class="align-middle" data-feather="edit-2"></i></a> | -->
														<a href="/foto/hapus/{{ $v->id }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $foto->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection