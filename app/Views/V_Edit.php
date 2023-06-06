<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Input Data Mahasiswa">
        <title>Edit Mahasiswa</title>
    </head>
    <body>
    <h2> Data Mahasiswa</h2>
    <?php
    foreach ($mahasiswa as $data) {
    }
    ?>
    <form method="post" action="<?= base_url('/update')?>">
        <table>
            <tr>
                <td>Nama</td>
                <input type="hidden" name="Nim" value="<?= $data['Nim'] ?>">
                <td><input type="text" name="Nama" value="<?= $data['Nama'] ?>"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="number" name="Umur" value= <?= $data['Umur'] ?>></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="SIMPAN"></td>
            </tr>
        </table>    
    </form>
    <br>
    <a href="<?= base_url('/mahasiswa')?>">
        <button>Kembali</button>
    </a>
    </body>
</html>