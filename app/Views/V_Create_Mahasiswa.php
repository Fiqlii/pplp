<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<a href="<?= base_url('/mahasiswa')?>">Kembali</a>
	<h3>TAMBAH DATA MAHASISWA</h3>
	<form method="post" action="<?= base_url('/mahasiswa/save')?>">
		<table>
			<tr>			
				<td>Nama</td>
				<td><input type="text" name="Nama"></td>
			</tr>
			<tr>
				<td>Nim</td>
				<td><input type="number" name="Nim"></td>
			</tr>
			<tr>
				<td>Umur</td>
				<td><input type="number" name="Umur"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>