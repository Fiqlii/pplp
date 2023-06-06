<?= $this->extend('V_Template') ?>
<?= $this->section('content') ?>

<head>
    <title>Halaman Detail</title>
</head>
<center>
    <h1>DETAIL MAHASISWA</h1>
    <h3>Mata Kuliah PPL Fiqli 211511036</h3>
    <hr>
</center>
<?php
foreach ($mahasiswa as $mahasiswa) {
    // var_dump($user);
?>
    <a href="<?= base_url('/mahasiswa') ?>">Kembali</a>

    <table style="margin:20px auto;">
        <tr>
            <td>NIM</td>
            <td>
                <input disabled type="number" name="Nim" value="<?php echo $mahasiswa['Nim']; ?>">
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>
                <input disabled type="text" name="Nama" value="<?php echo $mahasiswa['Nama']; ?>">
            </td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>
                <input disabled type="text" name="Umur" value="<?php echo $mahasiswa['Umur'] ?>">
            </td>
        </tr>
    </table>
<?php
}
?>
<?= $this->endSection('') ?>