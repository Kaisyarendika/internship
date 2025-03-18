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
    <?php if ($cek->status_pendaftaran == 'lulus') {?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body">
          <h3>
            <center>
              Selamat <b><?php echo $nama; ?></b> <span class="label label-success" style="font-size:20px;">Diterima</span>Sebagai Peserta Magang Di <b>PT. Bumi Siak Pusako</b>, Silahkan Cetak Surat Pengumuman Sebagai Bukti Diterima.
              <hr>
              <a href="panel_user/cetak_lulus" class="btn btn-success btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Bukti Diterima</a>
            </center>
          </h3>
        </div>
      </div>
    <?php }elseif ($cek->status_pendaftaran == 'tidak lulus') { ?>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body" style="color:red">
          <h3>
            <center>
              Mohon Maaf <b><?php echo $nama; ?></b>
               <span class="label label-danger" style="font-size:20px;">Tidak Diterima</span> <br>
              Sebagai Calon Peserta Magang <b>PT. Bumi Siak Pusako</b>.
            </center>
            <br>
          </h3>
        </div>
      </div>
    <?php }else{ ?>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body">
          <h3>
            <center>~ Belum ada Pengumuman dari PT. Bumi Siak Pusako ~</center>
          </h3>
        </div>
      </div>
    <?php } ?>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
