<?php
  $cek    = $user->row();
  $id_user = $cek->id_siswa;
  $nama    = $cek->nama_lengkap;

  $tgl = date('m-Y');
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat bg-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>Selamat Datang Calon Peserta Magang PT. Bumi Siak Pusako, <?php echo ucwords($nama); ?></center>
          </h3>
        </div>
      </div>
      <!-- /basic datatable -->

      <div class="row">
        <div class="col-lg-12">
          <?php if ($cek->status_pendaftaran == 'lulus') {?>
            <div class="panel panel-flat bg-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <center>
                    <i class="glyphicon glyphicon-bullhorn"></i> Selamat <b><?php echo $nama; ?></b> <span class="label label-info" style="font-size:20px;">Diterima</span> Sebagai Peserta Magang <b>PT. Bumi Siak Pusako</b>, Silahkan Cetak Surat Pengumuman Sebagai Bukti Diterima.
                    <hr style="margin:0px;margin-bottom:10px;">
                    <a href="panel_user/cetak_lulus" class="btn btn-default btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Bukti Diterima</a>
                  </center>
                </h4>
              </div>
            </div>
          <?php }elseif ($cek->status_pendaftaran == 'tidak lulus') {?>
            <div class="panel panel-flat bg-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <center>
                    <i class="glyphicon glyphicon-bullhorn"></i> Mohon Maaf <b><?php echo $nama; ?></b>
                     <span class="label label-danger" style="font-size:20px;">Tidak Diterima</span> 
                    Sebagai Calon Peserta Magang di <b>PT. Bumi Siak Pusako</b>.
                  </center>
                </h4>
              </div>
            </div>
          <?php } ?>
          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-3">
              <!-- Current server load -->
            <center>
              <a href="panel_user/biodata">
              <div class="panel bg-green">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h1 class="no-margin">
                    <i class="icon-file-check2" style="font-size:200px;"></i>
                  </h1>
                  Biodata Pendaftaran
                </div>
              </div>
              </a>
            </center>
              <!-- /current server load -->
            </div>

            <div class="col-lg-3">
              <!-- Current server load -->
            <center>
              <a href="panel_user/cetak" target="_blank">
              <div class="panel bg-teal-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h1 class="no-margin">
                    <i class="icon-printer2" style="font-size:200px;"></i>
                  </h1>
                  Cetak Bukti Pendaftaran
                </div>
              </div>
              </a>
            </center>
              <!-- /current server load -->
            </div>


            <div class="col-lg-3">
              <!-- Current server load -->
            <center>
              <a href="files/Mohd Azhima.pdf">
              <div class="panel bg-orange-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h1 class="no-margin">
                    <i class="icon-file-download2" style="font-size:200px;"></i>
                  </h1>
                  Download Panduan
                </div>
              </div>
              </a>
            </center>
              <!-- /current server load -->
            </div>

          </div>
          <!-- /quick stats boxes -->


        </div>

      </div>

    </div>
    <!-- /dashboard content -->
