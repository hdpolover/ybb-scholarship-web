<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1>Profil pengguna</h1>

        </div>



        <div class="section-body">

            <div class="row">

                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

                    <div class="card card-primary">

                        <div class="card-body">

                            <form method="POST" action="<?= site_url('admin/home/updateProfil');?>" enctype='multipart/form-data'>

                                <?php if ($this->session->flashdata('message')) : ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                        <?php echo $this->session->flashdata('message'); ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                            <span aria-hidden="true">&times;</span>

                                        </button>

                                    </div>

                                <?php endif; ?>





                                <div class="form-group">

                                    <label for="tanggal">Nama</label>

                                    <input id="tanggal" type="text" class="form-control" name="nama_lengkap" value="<?= $pengguna->nama_lengkap ?>" required>

                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>

                                </div>

                                <div class="form-group">

                                    <label for="tanggal">Username</label>

                                    <input id="tanggal" type="text" class="form-control" name="username" value="<?= $pengguna->username ?>" required>

                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>

                                </div>

                                <div class="form-group">

                                    <label for="tanggal">Email</label>

                                    <input id="tanggal" type="email" class="form-control" name="email" value="<?= $pengguna->email ?>" required>

                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>

                                </div>

                                <div class="form-group">

                                    <label for="tanggal">Password</label>

                                    <input id="tanggal" type="password" class="form-control" name="password" placeholder="masukkan password jika ingin diubah">

                                    <?= form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>

                                </div>

                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary btn-lg">

                                        Ubah profil

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