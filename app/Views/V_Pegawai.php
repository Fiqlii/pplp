<?= $this->extend('V_template') ?>
<?= $this->section('content') ?>

<!doctype html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <main role="main" class="container-fluid">

        <h1>Data Pegawai</h1>
        <a href="/pegawai/V_create" class="btn btn-info btn-sm btn-tambah">Tambah</a>
        <a href="/logout" class="btn btn-danger btn-sm btn-logout">Logout</a>

        <table border="1" class="table table-success table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Pendidikan</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pegawai as $pegawai ) {?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $pegawai->NIP; ?></td>
                        <td><?= $pegawai->Nama; ?></td>
                        <td><?= $pegawai->Gender ?></td>
                        <td><?= $pegawai->Telp; ?></td>
                        <td><?= $pegawai->Email; ?></td>
                        <td><?= $pegawai->Pendidikan; ?></td>
                        <td>
                            <a href="<?= base_url('/pegawai/edit') . '/' . $pegawai->NIP ?>" class="btn btn-warning">Edit</a>
                            <a href="<?= base_url('/pegawai/delete') . '/' . $pegawai->NIP ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </main><!-- /.container -->
</body>
</html>
<?= $this->endSection() ?>
