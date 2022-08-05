<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-plus"></i> Tambah Penjual</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penjual/Supplier</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data_penjual as $penjual) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $penjual['nama_penjual']; ?></td>
                            <td><?= $penjual['keterangan']; ?></td>

                            <td>
                                <a href="<?= base_url('master/penjual_edit/') . $penjual['id']; ?>" class="badge badge-success">Ubah</a>
                                <a href="<?= base_url('master/penjual_hapus/') . $penjual['id']; ?>" class="badge badge-danger" onclick="javascript:return confirm('Yakin akan hapus data ?');">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Penjual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master/penjual'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Penjual/Supplier</label>
                        <input type="text" class="form-control" id="nama_penjual" name="nama_penjual">
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>