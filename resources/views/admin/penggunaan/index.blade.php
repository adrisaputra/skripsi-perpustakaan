@extends('admin.layout')
@section('konten')
        <main class="content">
				<div class="container-fluid p-0">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3>Cara Penggunaan Aplikasi</h3>
								</div>
								<div class="card-body">
								Administrator/Operator<br>
								1. Menu buku digunakan Untuk mengelola data buku<br>
								2. Ketika ada siswa yang akan meminjam buku, Administrator/Operator harus membuka menu peminjaman untuk memasukkan data siswa dan buku yang akan dipinjam.<br>
								3. Untuk melihat tanggal kembali peminjaman dapat membuka menu pengembalian. Dalam menu ini dapat di lihat jumlah denda jika ada yang terlambat mengembalikan buku.<br>
								4. Untuk mengelola data anggota dapat membuka menu anggota.<br>
								5. Untuk mengelola data kategori buku dapat membuka menu kategori.<br>
								6. Untuk mengatur jumlah besaran denda keterlambatan dapat membuka menu pengaturan.<br>
								7. Menu slider digunakan untuk mengganti gambar pada dashboard utama.<br>
								8. Menu user digunakan untuk megelola data akun user baik itu administrator, operator maupun anggota.<br><br>

								Anggota Perpustakaan<br>
								1. Untuk bisa meminjam buku di perpustakaan, siswa harus melakukan registrasi terlebih dahulu.<br>
								2. Setelah melakukan registrasi, akun siswa akan terlebih dahulu dikonfirmasi oleh admin/operator perpustakaan.<br>
								3. Setelah akun siswa dikonfirmasi/diaktifkan maka siswa sudah bisa login menggunakan nisnya sebagai nama user dan password.<br>
								4. Untuk melihat data peminjaman dapat membuka menu peminjaman<br>
								5. Untuk melihat data pengembalian dapat membuka menu pengembalian<br>
								6. Menu Anggota berisi data keanggotaan. Anggota dapat merubah data pribadinya pada menu ini<br>
								
								</div>
							</div>
						</div>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				</div>
			</main>
@endsection