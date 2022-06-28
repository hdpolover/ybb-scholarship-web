<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dekripsi Berkas</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form method="POST" action="" enctype='multipart/form-data'>
                                <?php if ($this->session->flashdata('message')) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo $this->session->flashdata('message'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="form-group">
                                    <label for="tanggal">Email</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['email']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Pesan Encrypt</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['message']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Nama Sumber Berkas</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['file_name_source']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Nama Berkas Enkripsi</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['file_name_finish']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Ukuran Berkas</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['file_size']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Enkripsi</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['tgl_upload']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Keterangan</label>
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?= $data_file['keterangan']?>" readonly>
                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">

                                    <?= form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Dekripsi Berkas
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>