<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('master/pembeli_edit/') . $editPembeli->id ?>" method="post">
                <div class="form-group">
                    <label for="nama_pembeli">Nama Pembeli/Customer</label>
                    <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?= $editPembeli->nama_pembeli ?>">
                    <?= form_error('nama_pembeli', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $editPembeli->keterangan ?>">
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <a href="<?= base_url('master/pembeli'); ?>" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->