@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Peminjaman</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/peminjaman/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/peminjaman/create') }}" class="btn btn-success btn-flat">Tambah Data</a>
											<a href="{{ url('/peminjaman') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Peminjaman...">
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
													<th style="width:10%;">Nama Anggota</th>
													<th style="width:10%;">Nama Buku</th>
													<th style="width:10%;">Tanggal Pinjam</th>
													<th style="width:10%;">Tanggal Kembali</th>
													<th style="width:10%;">Terlambat (hari)</th>
													<th style="width:10%;">Denda (Rp.)</th>
													<th style="width:10%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($peminjaman as $v)
												<tr>
													<td>{{ ($peminjaman ->currentpage()-1) * $peminjaman ->perpage() + $loop->index + 1 }}</td>
													<td>{{ $v->anggota->nama }}</td>
													<td>{{ $v->buku->judul }}</td>
													<td>{{ $v->tanggal_pinjam }}</td>
													<td>{{ $v->tanggal_kembali }}</td>
													<?php 
															$t = date_create($v->tanggal_kembali);
															$n = date_create(date('Y-m-d'));
															$terlambat = date_diff($t, $n);
															$hari = $terlambat->format("%a");

															// menghitung denda
															$total_denda = $hari * $pengaturan[0]->jumlah;
														?>
													<td>{{ $hari }}</td>
													<td>{{ $total_denda }}</td>
													<td>
														<a href="{{ url('/peminjaman/show/'.$v->id ) }}"><i class="align-middle" data-feather="eye"></i></a> |
														<a href="{{ url('/peminjaman/edit/'.$v->id ) }}"><i class="align-middle" data-feather="edit-2"></i></a> |
														<a href="{{ url('/peminjaman/hapus/'.$v->id ) }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $peminjaman->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection