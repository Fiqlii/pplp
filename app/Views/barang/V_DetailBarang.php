<?= $this->extend('template') ?>

<?= $this->section('content') ?>

    <div class="card shadow-sm">
        <?php foreach ($barang as $barang) : ?>
            <img clas="bd-placeholder-img card-img-top" width="100%" height="255" src="<?=base_url($barang->FileBarang);?>">
        <div class="card-body">
            <h5 class="card-title"><?= $barang->NamaBarang ?></h5>
            <p class="card-text">Harga: <?= $barang->HargaBarang ?></p>
            <p class="card-text">Stok: <?= $barang->StokBarang ?></p>
            <a href="/barang/edit/<?= $barang->KodeBarang ?>" class="btn btn-outline-primary">Edit</a>
            <a href="/barang/delete/<?= $barang->KodeBarang ?>" class="btn btn-outline-danger">Hapus</a>
            <a href="/barang" class="btn btn-outline-info">Kembali</a>
        </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>

