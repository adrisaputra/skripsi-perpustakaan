@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Data User</h3>
								</div>
								<div class="card-body">
									<form action="{{ url('/user/search') }}" method="GET">
									<div class="row">
										<div class="col-md-9">
											<a href="{{ url('/user/create') }}" class="btn btn-success btn-flat">Tambah Data</a>
											<a href="{{ url('/user') }}" class="btn btn-warning btn-flat">Refresh</a>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="search" placeholder="Nama user...">
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
													<th style="width:30%;">Nama User</th>
													<th style="width:30%;">Email</th>
													<th style="width:10%;">Group</th>
													<th style="width:10%;">Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($user as $v)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{ $v->name }}</td>
													<td>{{ $v->email }}</td>
													<td>@if($v->group==1)
														<span class="badge badge-danger">Administrator</span>
														@elseif($v->group==2)
														<span class="badge badge-warning">Operator</span>
														@elseif($v->group==3)
														<span class="badge badge-info">Anggota</span>
														@endif
													</td>
													<td>@if($v->status==0)
														<span class="badge badge-danger">Tidak Aktif</span>
														@elseif($v->status==1)
														<span class="badge badge-success">Aktif</span>
														@endif
													</td>
													<td>
														<a href="{{ url('/user/edit/'.$v->id) }}"><i class="align-middle" data-feather="edit-2"></i></a> 
														
														@if($v->id !=1 )
														|
														<a href="{{ url('/user/hapus/'.$v->id) }}" onclick="return confirm('Anda Yakin ?');"><i class="align-middle" data-feather="trash"></i></a>
														@endif
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div><br>
									<div align="right">{{ $user->appends(Request::only('search'))->links() }}</div>
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection