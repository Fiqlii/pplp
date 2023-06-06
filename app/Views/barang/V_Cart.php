<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<link href="your-project-dir/icon-font/lineicons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<div class="container mb-5">
    <div class ="row mt-5">


<?php
      $total = 0;
      
      foreach ($dataCart as $dataCart):?>
            <div class ="col-md-3">
            <div class=" card mb-3">
            <img src="<?= base_url('Assets'). '/' . $dataCart['FileBarang'] ?> " style="width: 100%; height:255" alt="....">
                    <div class="col-md-8 text-start ">
                        <div class="card-body">
                        <div class = "d-flex justify-content-between">
                        <H5>Rp. <?= $dataCart['HargaBarang']?></h5>
                        <H10><?= $dataCart['StokBarang']?> pcs</H10>
                        <?php $total += $dataCart['StokBarang']*$dataCart['HargaBarang'];?>
                    </div>
                    <center>
                    <a href="<?php echo base_url('/cart/deletecart/'.$dataCart['KodeBarang']) ?>" class="btn btn-danger">Hapus</a>
                    </center>    
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <br>
        <div class="row">
            <p class="col-md-10 mt-4 text-end fw-bold">Total Harga : </p>
            <p class="col-md-2  mt-4 text-start px-0 fw-bold">Rp <?=$total?></p>
        </div>
        <br>
      </div>
      <div class="footer">
        <a href="/barang"  class="btn btn-secondary">Batal</a>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
        <button type="button" class="btn btn-outline-dark">Checkout</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>