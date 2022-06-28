    <div class="main-content">

      <section class="section">

        <div class="section-header">

          <h1>Dashboard</h1>

        </div>



        <div class="section-body">

          <div class="row">

            <?php if ($this->session->userdata('hak_akses') == 'admin') { ?>

              <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                <div class="card card-statistic-1">

                  <div class="card-icon bg-primary">

                    <i class="far fa-user"></i>

                  </div>

                  <div class="card-wrap">

                    <div class="card-header">

                      <h4>Jumlah Admin</h4>

                    </div>

                    <div class="card-body">

                      <?= $total_admin ?>

                    </div>

                  </div>

                </div>

              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                <div class="card card-statistic-1">

                  <div class="card-icon bg-info">

                    <i class="far fa-user"></i>

                  </div>

                  <div class="card-wrap">

                    <div class="card-header">

                      <h4>Jumlah Pengguna</h4>

                    </div>

                    <div class="card-body">

                      <?= $total_pengguna ?>

                    </div>

                  </div>

                </div>

              </div>

            <?php } ?>
            <?php if ($this->session->userdata('hak_akses') == 'pengguna') { ?>

              <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                <div class="card card-statistic-1">

                  <div class="card-icon bg-warning">

                    <i class="far fa-file"></i>

                  </div>

                  <div class="card-wrap">

                    <div class="card-header">

                      <h4>Data Enkripsi</h4>

                    </div>

                    <div class="card-body">

                      <?= $total_encrypt ?>

                    </div>

                  </div>

                </div>

              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                <div class="card card-statistic-1">

                  <div class="card-icon bg-success">

                    <i class="far fa-file"></i>

                  </div>

                  <div class="card-wrap">

                    <div class="card-header">

                      <h4>Data Dekripsi</h4>

                    </div>

                    <div class="card-body">

                      <?= $total_decrypt ?>

                    </div>

                  </div>

                </div>

              </div>

            <?php } ?>

          </div>

          <?php if ($this->session->userdata('hak_akses') == 'pengguna') { ?>
            <div class="row">



              <div class="col-md-12">

                <h2>Petunjuk Penggunaan</h2>

                <div class="card table-responsive">

                  <div class="card-body">

                    <ul>

                      <li>Menu Dashboard menampilkan jumlah data proses yang ada di aplikasi ini.</li>

                      <li>Pilih Menu Enkripsi untuk melakukan enkripsi berkas</li>

                      <li>Pilih Button Dekripsi untuk melakukan Dekripsi berkas</li>

                      <li>Menu Berkas merupakan menu yang menampilkan data berkas yang telah di enkripsi</li>

                    </ul>

                  </div>

                </div>

              </div>

            </div>

          <?php } ?>

        </div>

      </section>

    </div>