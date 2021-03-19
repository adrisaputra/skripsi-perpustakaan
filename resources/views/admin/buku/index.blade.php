@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Buku</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/buku/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/buku/create') }}" class="btn btn-success btn-flat">Tambah Data</a>
											<a href="{{ url('/buku') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Buku...">
												<span class="input-group-btn">
													<input type="submit" name="submit" class="btn btn-info btn-flat" value="Go">
												</span>
											</div>
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
													<th style="width:10%;">Cover</th>
													<th style="width:20%;">ISBN</th>
													<th style="width:20%;">Judul Buku</th>
													<th style="width:20%;">Penulis</th>
													<th style="width:10%;">Kategori</th>
													<th style="width:10%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($buku as $v)
												<tr>
													<td>{{ ($buku ->currentpage()-1) * $buku ->perpage() + $loop->index + 1 }}</td>
													<td>	@if($v->cover)
															<img src="{{ asset('/upload/cover/'.$v->cover) }}" width="100px" height="130px">
														@endif
													</td>
													<td>{{ $v->isbn }}</td>
													<td>{{ $v->judul }}</td>
													<td>{{ $v->nama_penulis }}</td>
													<td>{{ $v->nama_kategori }}</td>
													<td>
														<a href="{{ url('/buku/edit/'.$v->id ) }}"><i class="align-middle" data-feather="edit-2"></i></a> |
														<a href="{{ url('/buku/hapus/'.$v->id ) }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $buku->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection