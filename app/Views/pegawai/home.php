<?=$this->extend('pegawai/templates/index.php');?>
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
    <div class="row">
        <div class="col">
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto mw-100 navbar-search">
                <div class="input-group" method="post">
                    <div class="col">
                        <input type="date" class="form-control bg-light border-0 small" aria-label="Search"
                            aria-describedby="basic-addon2" name="start_date">
                        <input type="date" class="form-control bg-light border-0 small" aria-label="Search"
                            aria-describedby="basic-addon2" name="end_date">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-paper-plane fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h1 class="h3 mb-2 text-gray-800 mt-3">Table Data Surat</h1>
    <p class="mb-4">Table ini menampilkan data surat keputusan yang terdiri dari Nomor Surat, Unit Pengelola, Tanggal
        Tentang, File, Edit, Delete.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Surat Keputusan Gubernur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Unit Pengelola</th>
                            <th>Tanggal</th>
                            <th>Tentang</th>
                            <th>File</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <?php $i=1 + (5 * ($currentPage - 1)) ?>
                            <?php foreach($data_surat as $row):?>
                            <td><?= $i++?></td>
                            <td><?= $row['nomor_surat'] ?></td>
                            <td><?= $row['unit_pengelola'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['tentang'] ?></td>
                            <td>
                                <a href="<?=base_url()?>/surat/<?= $row['file_surat'] ?>" target="_blank">
                                    <?=$row['file_surat'] ?>
                                </a>
                            </td>

                        </tr>
                        <!-- Logout Modal-->
                        <div class="modal fade" id="hapus" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus File?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">??</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Tekan Tombol Delete Untuk Menghapus Secara Permanent.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="home/hapus/<?=$row['id']?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?= $pager->links('data_surat', 'surat_pagination'); ?>
            </div>


        </div>
    </div>

</div>

<!-- /.container-fluid -->

<?=$this->endSection();?>