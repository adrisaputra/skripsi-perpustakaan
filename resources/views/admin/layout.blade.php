<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Sistem Informasi Perpustakaan</title>

    	<!-- Favicons -->
	<link href="{{ asset('/assets/img/Lambang_Kabupaten_Kolaka_Timur.png') }}" rel="icon">
    	<link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
	
	<link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">

	<!-- PICK ONE OF THE STYLES BELOW -->
	<link href="{{ asset('/assets/css/classic.css') }}" rel="stylesheet">
	<!-- <link href="css/corporate.css" rel="stylesheet"> -->
	<!-- <link href="css/modern.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		}
	</style>
	<!-- END SETTINGS -->
	
	<script>
			
			function formatRupiah(objek, separator) {
                  a = objek.value;
                  b = a.replace(/[^\d]/g,"");
                  c = "";
                  panjang = b.length;
                  j = 0;
                  for (i = panjang; i > 0; i--) {
                    j = j + 1;
                    if (((j % 3) == 1) && (j != 1)) {
                      c = b.substr(i-1,1) + separator + c;
                    } else {
                      c = b.substr(i-1,1) + c;
                    }
                  }
                  objek.value = c;
            }
                
  </script>
  
  
<!-- Global site tag (gtag.js) - Google Analytics --></head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content ">
				<a class="sidebar-brand" href="{{ url('/') }}">
				  <img src="{{ asset('/assets/img/logo.png') }}" height="55" width="240">
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						MAIN
					</li>
					<li class="sidebar-item {{ (request()->is('dashboard*')) ? 'active' : '' }}">
						<a href="{{ url('/dashboard') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="home"></i> <span>Beranda</span>
						</a>
					</li>
					@if(Auth::user()->group == 1)
					<li class="sidebar-item {{ (request()->is('buku*')) ? 'active' : '' }}">
						<a href="{{ url('/buku') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Buku</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('peminjaman*')) ? 'active' : '' }}">
						<a href="{{ url('/peminjaman') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Peminjaman</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('pengembalian*')) ? 'active' : '' }}">
						<a href="{{ url('/pengembalian') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Pengembalian</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('anggota*')) ? 'active' : '' }}">
						<a href="{{ url('/anggota') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Anggota</span>
						</a>
					</li>
					<li class="sidebar-header">
						SETTING
					</li>
					<li class="sidebar-item {{ (request()->is('kategori*')) ? 'active' : '' }}">
						<a href="{{ url('/kategori') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Kategori</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('pengaturan*')) ? 'active' : '' }}">
						<a href="{{ url('/pengaturan') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Pengaturan</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('slider*')) ? 'active' : '' }}">
						<a href="{{ url('/slider') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Slider</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('user*')) ? 'active' : '' }}">
						<a href="{{ url('/user') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="user"></i> <span>User</span>
						</a>
					</li>
					@elseif(Auth::user()->group == 2)
					<li class="sidebar-item {{ (request()->is('buku*')) ? 'active' : '' }}">
						<a href="{{ url('/buku') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Buku</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('peminjaman*')) ? 'active' : '' }}">
						<a href="{{ url('/peminjaman') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Peminjaman</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('pengembalian*')) ? 'active' : '' }}">
						<a href="{{ url('/pengembalian') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Pengembalian</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('anggota*')) ? 'active' : '' }}">
						<a href="{{ url('/anggota') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Anggota</span>
						</a>
					</li>
					<li class="sidebar-header">
						SETTING
					</li>
					<li class="sidebar-item {{ (request()->is('kategori*')) ? 'active' : '' }}">
						<a href="{{ url('/kategori') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Kategori</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('pengaturan*')) ? 'active' : '' }}">
						<a href="{{ url('/pengaturan') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Pengaturan</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('slider*')) ? 'active' : '' }}">
						<a href="{{ url('/slider') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Slider</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('user*')) ? 'active' : '' }}">
						<a href="{{ url('/user') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="user"></i> <span>User</span>
						</a>
					</li>
					@elseif(Auth::user()->group == 3)
					<li class="sidebar-item {{ (request()->is('peminjaman*')) ? 'active' : '' }}">
						<a href="{{ url('/peminjaman') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Peminjaman</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('pengembalian*')) ? 'active' : '' }}">
						<a href="{{ url('/pengembalian') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Pengembalian</span>
						</a>
					</li>
					<li class="sidebar-item {{ (request()->is('anggota*')) ? 'active' : '' }}">
						<a href="{{ url('/anggota') }}" class="sidebar-link">
						  <i class="align-middle" data-feather="list"></i> <span>Anggota</span>
						</a>
					</li>
					@endif
				<div class="sidebar-bottom d-none d-lg-block">
					<div class="media">
						<img class="rounded-circle mr-3" src="{{ asset('/assets/img/avatars/15.jpg') }}" alt="Chris Wood" width="40" height="40">
						<div class="media-body">
							<h5 class="mb-1">{{ Auth::user()->name }} </h5>
							<div>
								<i class="fas fa-circle text-success"></i> Online
							</div>
						</div>
					</div>
				</div>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light bg-white">
			<a class="sidebar-toggle d-flex mr-2">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ml-auto">
		  				
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
						    </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
							`<img src="{{ asset('/assets/img/avatars/15.jpg') }}" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood"> <span class="text-dark">{{ Auth::user()->name }} </span>
						    </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{ url('/password') }}">Ganti Password</a>
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign out') }}</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			@yield('konten')
			
			<!--footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms of Service</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-right">
							<p class="mb-0">
								&copy; 2019 - <a href="index.html" class="text-muted">AppStack</a>
							</p>
						</div>
					</div>
				</div>
			</footer-->
		</div>
	</div>

	<script src="{{ asset('/assets/js/app.js') }}"></script>

	<script>
		$(function() {
			// Select2
			$(".select2").each(function() {
				$(this)
					.wrap("<div class=\"position-relative\"></div>")
					.select2({
						placeholder: "Select value",
						dropdownParent: $(this).parent()
					});
			})
			// Daterangepicker
			$("input[name=\"daterange\"]").daterangepicker({
				opens: "left"
			});
			$("input[name=\"datetimes\"]").daterangepicker({
				timePicker: true,
				opens: "left",
				startDate: moment().startOf("hour"),
				endDate: moment().startOf("hour").add(32, "hour"),
				locale: {
					format: "M/DD hh:mm A"
				}
			});
			$("input[name=\"datesingle\"]").daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});
			// Datetimepicker
			$('#datetimepicker-minimum').datetimepicker();
			$('#datetimepicker-view-mode').datetimepicker({
				viewMode: 'years'
			});
			$('#datetimepicker-time').datetimepicker({
				format: 'LT'
			});
			$('#datetimepicker-date').datetimepicker({
				format: 'L'
			});
			var start = moment().subtract(29, "days");
			var end = moment();

			function cb(start, end) {
				$("#reportrange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
			}
			$("#reportrange").daterangepicker({
				startDate: start,
				endDate: end,
				ranges: {
					"Today": [moment(), moment()],
					"Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
					"Last 7 Days": [moment().subtract(6, "days"), moment()],
					"Last 30 Days": [moment().subtract(29, "days"), moment()],
					"This Month": [moment().startOf("month"), moment().endOf("month")],
					"Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
				}
			}, cb);
			cb(start, end);
		});
	</script>

</body>

</html>
