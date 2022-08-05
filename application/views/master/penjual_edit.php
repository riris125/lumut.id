<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('master/penjual_edit/') . $penjual['id']; ?>" method="post">
                <div class="form-group">
                    <label for="nama_penjual">Nama Penjual/Supplier</label>
                    <input type="text" class="form-control" id="nama_penjual" name="nama_penjual" value="<?= $penjual['nama_penjual']; ?>">
                    <?= form_error('nama_penjual', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $penjual['keterangan']; ?>">
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <a href="<?= base_url('master/penjual'); ?>" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->