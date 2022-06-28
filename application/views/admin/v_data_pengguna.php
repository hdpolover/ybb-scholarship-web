<div class="main-content">

    <section class="section">

        <div class="section-header">

            <h1><?= $title ?></h1>

        </div>

        <div class="section-body">

            <div class="section-body">

                <div class="card table-responsive">

                    <div class="card-body">

                        <table class="table table-hover table-striped">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Username</th>

                                    <th>Nama Lengkap</th>

                                    <th>Last Acitivty</th>

                                    <th>Email</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php $no = 1;
                                foreach ($data_pengguna as $dt) : ?>

                                    <tr>

                                        <td><?= $no++ ?></td>

                                        <td><?= $dt->username ?></td>

                                        <td><?= $dt->nama_lengkap ?></td>

                                        <td><?= $dt->last_activity ?></td>

                                        <td><?= $dt->email ?></td>

                                        <td>

                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatedata<?= $dt->id_user ?>">

                                                <i class="fas fa-edit"></i>

                                            </button>

                                            <a href="<?= base_url('admin/data_pengguna/delete/' . $dt->id_user) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>



                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<?php $no = 1;

foreach ($data_pengguna as $key => $value) : ?>

    <div class="modal fade" id="updatedata<?= $value->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <form action="<?= base_url('admin/data_pengguna/update') ?>" method="post" enctype='multipart/form-data'>

                    <div class="modal-body">

                        <input type="hidden" name="id_user" id="" class="form-control" value="<?= $value->id_user ?>">

                        <div class="form-group">

                            <label for="">Nama</label>

                            <input type="text" name="nama_lengkap" id="" class="form-control" value="<?= $value->nama_lengkap ?>">

                        </div>

                        <div class="form-group">

                            <label for="">Username</label>

                            <input type="text" name="username" id="" class="form-control" value="<?= $value->username ?>">

                        </div>

                        <div class="form-group">

                            <label for="">Email</label>

                            <input type="email" name="email" id="" class="form-control" value="<?= $value->email ?>">

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>

            </div>

            </form>

        </div>

    </div>

<?php endforeach; ?>