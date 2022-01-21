<?=$this->extend('admin/templates/index.php');?>
<?=$this->section('content');?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if (!empty(session()->getFlashdata('sukses'))) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo session()->getFlashdata('sukses'); ?>
    </div>
    <?php endif; ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Selamat Datang <?= session()->get('nama')?></h1>
            <p class="lead">Sistem Informasi Surat Keputusan Gubernur.</p>
        </div>
    </div>
    <!-- Page Heading -->

 

</div>

<!-- /.container-fluid -->

<?=$this->endSection();?>