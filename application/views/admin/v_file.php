<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Daftar Berkas Proses Enkripsi</h1>
        </div>

        <div class="section-body">
        <div class="section-body">
            <div class="card table-responsive">
                <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Sumber Berkas</th>
                        <th>Nama Berkas Enkeripsi</th>
                        <th>Ukuran Berkas</th>
                        <th>Tanggal</th>
                        <th class = "text-center">Status</th>
                        <th class = "text-center">Cek File</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no =1;  foreach($data_file as $dt) :?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $dt->username?></td>
                                <td><?= $dt->file_name_source ?></td>
                                <td><?= $dt->file_name_finish?></td>
                                <td><?= $dt->file_size . ' KB'?></td>
                                <td><?= $dt->tgl_upload?></td>
                                <td>
                                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                            <?php if ($dt->status == 1) { ?>
                                            <div class="badge badge-success">Enkripsi</div>
                                            <?php } elseif ($dt->status == 2) { ?>
                                                <div class="badge badge-info">Deskripsi</div>
                                            <?php }else { ?>
                                                <div class="badge badge-danger">Uncknow</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                                <td class = "text-center">
                                <?php if ($dt->status == 1) {
                                                ?><a href="<?= base_url('assets/uploads/encrypt/'.$dt->file_name_finish)?>" class = "btn btn-sm btn-primary" download><i class = "fas fa-download"></i> Download</a><?php
                                            } elseif ($dt->status == 2) {
                                                ?><a href="<?= base_url(''.$dt->file_name_source)?>" class = "btn btn-sm btn-primary" download><i class = "fas fa-download"></i> Download</a><?php
                                            }
                                        ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach;?>
                    
                    </tbody>
                </table>
                </div>
            </div>
          </div>
        </div>
    </section>
</div>