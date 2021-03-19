@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Anggota</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/anggota/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/anggota/create') }}" class="btn btn-success btn-flat">Tambah Data</a>
											<a href="{{ url('/anggota') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Anggota...">
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
													<th style="width:10%;">NIS</th>
													<th style="width:20%;">Nama Siswa</th>
													<th style="width:20%;">Kelas</th>
													<th style="width:20%;">Tanggal dibuat</th>
													<th style="width:10%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($anggota as $v)
												<tr>
													<td>{{ ($anggota ->currentpage()-1) * $anggota ->perpage() + $loop->index + 1 }}</td>
													<td>{{ $v->nis }}</td>
													<td>{{ $v->nama }}</td>
													<td>{{ $v->kelas }}</td>
													<td>{{ $v->tanggal_buat }}</td>
													<td>
														<a href="{{ url('/anggota/edit/'.$v->id ) }}"><i class="align-middle" data-feather="edit-2"></i></a> |
														<a href="{{ url('/anggota/hapus/'.$v->id ) }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $anggota->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection