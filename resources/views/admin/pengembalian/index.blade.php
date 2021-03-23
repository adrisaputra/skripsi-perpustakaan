@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Pengembalian</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/pengembalian/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/pengembalian') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Pengembalian...">
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
													<th style="width:10%;">Terlambat (Hari)</th>
													<th style="width:10%;">Denda (Rp)</th>
													<th style="width:10%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pengembalian as $v)
												<tr>
													<td>{{ ($pengembalian ->currentpage()-1) * $pengembalian ->perpage() + $loop->index + 1 }}</td>
													<td>{{ $v->anggota->nama }}</td>
													<td>{{ $v->buku->judul }}</td>
													<td>{{ date('d-m-Y', strtotime($v->tanggal_pinjam)) }}</td>
													<td>{{ date('d-m-Y', strtotime($v->tanggal_kembali)) }}</td>
													<?php $total_denda = $v->hari * $pengaturan[0]->jumlah; ?>
													<td>@if($v->hari>0)
															{{ $v->hari }} Hari
														@endif
													</td>
													<td>@if($v->hari>0)
															{{ number_format($total_denda,0,",",".") }}
														@endif</td>
													<td>
														<a href="{{ url('/pengembalian/show/'.$v->id ) }}"><i class="align-middle" data-feather="eye"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $pengembalian->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection