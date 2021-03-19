@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Denda</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/denda/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/denda') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Denda...">
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
													<th style="width:20%;">Nama Anggota</th>
													<th style="width:15%;">Nama Buku</th>
													<th style="width:10%;">Tanggal Peminjaman</th>
													<th style="width:10%;">Tanggal Harus Kembali</th>
													<th style="width:10%;">Tanggal Pengembalian</th>
													<th style="width:10%;">Terlambat (Hari) </th>
													<th style="width:10%;">Total Denda (Rp)</th>
													<th style="width:30%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($denda as $v)
												<tr>
													<td>{{ ($denda ->currentpage()-1) * $denda ->perpage() + $loop->index + 1 }}</td>
													<td>{{ $v->anggota->nama }}</td>
													<td>{{ $v->buku->judul }}</td>
													<td>{{ $v->tanggal_pinjam }}</td>
													<td>{{ $v->tanggal_hrs_kembali }}</td>
													<td>{{ $v->tanggal_kembali }}</td>
													<td>{{ $v->hari }}</td>
													<td>{{ $v->denda }}</td>
													<td>
														<a href="{{ url('/peminjaman/show/'.$v->id ) }}"><i class="align-middle" data-feather="eye"></i></a> |
														<a href="{{ url('/denda/hapus/'.$v->id ) }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $denda->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection