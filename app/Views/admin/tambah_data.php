<?=$this->extend('admin/templates/index.php');?>
<?=$this->section('content');?>

<!-- Begin Page Content -->
<div class="container-fluid">
<?php if (!empty(session()->getFlashdata('gagal'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo session()->getFlashdata('gagal'); ?>
    </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url();?>/home/tambah_surat" enctype="multipart/form-data">
    <div class="form-group">
            <label for="exampleInputEmail1">Nomor Surat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Masukan Nomor Surat" name="nomor_surat">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Unit Pengelola</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Masukan Data Unit Pengelola" name="unit_pengelola">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tanggal</label>
            <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Masukan Tanggal"
                name="tanggal">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tentang</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukan Tentang"
                name="tentang">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">File Surat</label>
            <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Masukan Tentang"
                name="file_surat">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<!-- /.container-fluid -->
<?=$this->endSection();?>