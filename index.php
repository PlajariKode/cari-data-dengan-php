<?php
// koneksi
$conn = mysqli_connect("localhost", "root", "", "test");

if (!$conn) {
	echo "Koneksi gagal " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cari data dengan PHP</title>
</head>
<body>
	<h1>Data Produk</h1>
	
	<form method="get" action="">
		<label for="cari">Cari Produk</label>
		<input type="text" name="cari">
	</form>
	<br/>
	
	<table border="1">
		<thead>
			<tr>
				<td>No.</td>
				<td>Nama Produk</td>
				<td>Harga</td>
				<td>Stok</td>
			</tr>
		</thead>
		<tbody>
			
			<?php
			$no = 1;
			// tampilkan data tb_produk
			$query = mysqli_query($conn, "SELECT * FROM tb_produk");

			if (isset($_GET['cari'])) {
				$query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama_produk LIKE '%".$_GET['cari']."%'");
			}

			while ($dt = mysqli_fetch_assoc($query)) {
			?>

			<tr>
				<td><?= $no++; ?></td>
				<td><?= $dt['nama_produk']; ?></td>
				<td><?= $dt['harga']; ?></td>
				<td><?= $dt['stok']; ?></td>
			</tr>

			<?php
			}
			?>

		</tbody>
	</table>
</body>
</html>