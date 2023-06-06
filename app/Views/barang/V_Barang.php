<?= $this->extend('template') ?>

<?= $this->section('content') ?>
    <form class="mb-3" action="<?= base_url('/barang/search') ?>" method="post">
        <div class="input-group">
            <input type="text" name="nama" placeholder="Masukkan Nama Product" class="form-control" />
            <button type="submit" class="btn btn-dark">Cari</button>
        </div>
    </form>
    <a href="/cart"  class="btn btn-outline-secondary">Keranjang</a>
    <h2>Daftar Product</h2>
    <div class="row">
        <?php foreach ($barang as $item) : ?>
            <div class="col-md-3">
                <div class=" card mb-3">
                    <img src="<?= base_url('Assets'). '/' . $item->FileBarang ?> " style="width: 100%; height:255"  alt="...." >
                    <div class="card-body">
                        <h5 class="card-title"><?= $item->NamaBarang ?></h5>
                        <p class="card-text">Harga: <?= $item->HargaBarang ?></p>
                        <p class="card-text">Stok: <?= $item->StokBarang ?></p>
                        <!-- <a href="/barang/detail/" class="btn btn-outline-info">Detail</a> -->
                    <form method="post" action="<?=base_url('/cart/savecart');?>">
                    <input type="hidden" name="KodeBarang" value="<?= $item->KodeBarang?>">
                    <button type="submit" class="btn btn-outline-dark btn-sm text-center"> Add </button>    
                </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <style>
        .card:hover{
            box-shadow: 0 0 11px rgba(33,33,33,.2);
            scale: 1.05;
            transition:0.5s
        }
    </style>
<?= $this->endSection() ?>
