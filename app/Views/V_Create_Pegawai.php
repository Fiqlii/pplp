<?= $this->extend('V_template') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" width="100%">
        <tr>
            <td>
                <h1 style="text-align: Left;">Tambah Pegawai</h1>
                <?php if (isset($errors)) { ?>
                    <?php echo implode(", ", $errors); ?>
                <?php } ?>
                <?php
                    $validation = \Config\Services::validation();
                    helper('form');
                ?>
                <form method="post" id="create_mahasiswa" name="create_pegawai" action="<?= base_url('/pegawai/V_create') ?>">
                    <p> NIP: <input type="number" size="10" name="NIP" value="<?= set_value('NIP')?>" /></p>
                    <p> Nama: <input type="text" size="65" name="Nama" value="<?= set_value('Nama')?>"/></p>
                    <p>
                        Gender
                        <select type="text" value="Pilih Gender" name="Gender">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </p>
                    <p> Telpon: <input type="number" size="65" name="Telp" value="<?= set_value('Telp')?>"/></p>
                    <p> Email: <input type="text" size="65" name="Email" value="<?= set_value('Email')?>"/></p>
                    <p>
                        Sekolah terakhir
                        <select type="text" value="Pilih pendidikan terakhir anda" name="Pendidikan">
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA</option>
                        </select>
                    </p>
                    
                    <button type="submit" class="btn btn-danger btn-block">Save Data</button>
                </form>
            </td>
        </tr>
    </table>
</body>

</html>
<?= $this->endSection() ?>