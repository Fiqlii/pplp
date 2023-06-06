<?= $this->extend('v_Template'); ?>
<?= $this->section('content'); ?>
<!doctype html>
<html lang="en">

<head>
    <title>PKB.net</title>

    <!-- <style>
        body {
            padding-top: 5rem;
        }
    </style> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <main role="main" class="container-fluid">
        <center>
        <h1>CRUD Mahasiswa</h1>
        <a href="<?= base_url('/mahasiswa/create')?>" class="btn btn-success">Tambah Data Mahasiswwa</a>
        </center>
        <hr>
        <form  action="<?php echo base_url('/mahasiswa')?>" action="GET">
          <div class="mb-3">
            <input placeholder="search" type="text"  name="cari">
            <button type="submit"  value="Cari" class="btn btn-primary">Submit</button>
          </div>
        </form>
        <table border="1" class="table table-success table-striped" >
                <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Aksi</th>
                </tr>

                <?php
                foreach ($data as $mahasiswa) {
                ?>
                    <tr>
                        <td><?php echo $mahasiswa->Nim; ?></td>
                        <td><?php echo $mahasiswa->Nama; ?></td>
                        <td><?php echo $mahasiswa->Umur; ?></td>
                        <td>
                            <a href ="<?= base_url('/edit/mahasiswa').'/'. $mahasiswa->Nim?> " class="btn btn-warning">Edit</a>
                            <a href="<?= base_url("/mahasiswa/Detail/$mahasiswa->Nim") ?>" class="btn btn-primary">Detail</a>
                            <a href="<?= base_url("/mahasiswa/delete/$mahasiswa->Nim") ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
        </table>
        <?= $pager->links('mahasiswa', 'bootstrap_template') ?>
    </main><!-- /.container -->
</body>
<form method="post" action="/exportfile" enctype="multipart/form-data">
            <div class="form-group">
                <label>File Excel</label>
                <input type="file" name="fileexcel" class="form-control w-50" id="file" required accept=".xls, .xlsx" /></p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Unggah Excel</button>
            </div>
        </form>


</html>
<?= $this->endsection(); ?>