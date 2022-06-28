<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proses Enkripsi dan Deskripsi</h1>
        </div>
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
            Proses Enkripsi
        </button>
        <div class="section-body">
            <div class="card table-responsive">
                <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Nama Sumber Berkas</th>
                        <th>Nama Berkas Enkeripsi</th>
                        <th>Path Berkas</th>
                        <th class = "text-center">Status</th>
                        <th class = "text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $no =1;  foreach($data_file as $dt) :?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $dt->email?></td>
                                <td><?= $dt->message?></td>
                                <td><?= $dt->file_name_source;?></td>
                                <td><?= $dt->file_name_finish?></td>
                                <td><?= $dt->file_url?></td>
                                <td>
                                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                        <?php if ($dt->status == 1) { ?>
                                        <div class="badge badge-success">Enkripsi</div>
                                            <!-- echo '<a href="#" class="btn btn-success btn-block"></a>'; -->
                                        <?php } elseif ($dt->status == 2) { ?>
                                            <div class="badge badge-info">Deskripsi</div>
                                        <?php }else { ?>
                                            <div class="badge badge-danger">Uncknow</div>
                                        <?php } ?>
                                    </div>
                                </td>
                                <td class = "text-center">
                                    <?php if ($dt->status == 1) { ?>
                                        <a href="<?= base_url('admin/decrypt/detail/'.$dt->id_file)?>" class = "btn btn-sm btn-primary">Deskripsi</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    
                    </tbody>
                </table>
                </div>
            </div>
          </div>
    </section>
</div>

<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Proses Enkripsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/encrypt') ?>" method="post"  enctype='multipart/form-data'>
        <div class="modal-body">
        
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input id="tanggal" type="text" class="form-control" name="tanggal" value="<?php echo date("Y-m-d");?>" readonly>
            <?php echo form_error('tanggal', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" class="form-control" name="email" value = "<?= $this->session->userdata('email')?>">
            <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>
        <div class="form-group">
            <label for="message">Pesan</label>
            <input id="message" type="text" class="form-control" name="message">
            <?php echo form_error('message', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>
        <div class="form-group">
            <label for="inputFile" class="form-label">Upload Berkas</label>
            <input class="form-control-file" type="file" id="inputFile" name="file" required>
        </div>

        <div class="form-group">
            <label for="password" class="d-block">Password/Key Encrypt</label>
            <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">

            <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input id="keterangan" type="text" class="form-control" name="keterangan">

            <?php echo form_error('keterangan', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>
                             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Enkripsi Berkas</button>
        </div>
      </form>
    </div>
  </div>
</div>