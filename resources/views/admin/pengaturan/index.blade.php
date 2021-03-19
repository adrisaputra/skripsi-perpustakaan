@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data Pengaturan</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/pengaturan/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/pengaturan') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Pengaturan...">
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
													<th style="width:10%;">Nama Pengaturan</th>
													<th style="width:20%;">Jumlah Per Hari (Rp)</th>
													<th style="width:10%;">Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pengaturan as $v)
												<tr>
													<td>{{ ($pengaturan ->currentpage()-1) * $pengaturan ->perpage() + $loop->index + 1 }}</td>
													<td>{{ $v->nama }}</td>
													<td>{{ number_format($v->jumlah,0,",",".") }}</td>
													<td>
														<a href="{{ url('/pengaturan/edit/'.$v->id ) }}"><i class="align-middle" data-feather="edit-2"></i></a>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $pengaturan->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection