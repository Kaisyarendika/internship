<style>
  #tbl_input{width:50px;text-align: center;}
  #tbl_input2{width:100px;text-align: center;}
  #th_center > th {text-align: center;}
</style>

<?php
error_reporting(0);
$user = $user->row();?>
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3">
      <div class="panel panel-flat">
          <div class="panel-body">
              <center>
                <img src="img/logo_bsp.png" alt="<?php echo $user->nama_lengkap; ?>" class="" width="176">
              </center>
            <br>
            <fieldset class="content-group">
              <hr style="margin-top:0px;">
              <i class="icon-calendar"></i> <b>Tanggal Daftar</b> :
              <?php echo $this->Model_data->tgl_id(date('d-m-Y H:i:s', strtotime($user->tgl_siswa))); ?>
              <hr>
            </fieldset>
          </form>
          </div>
      </div>
      </div>

      <div class="col-md-9">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Biodata Peserta</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">NO. PENDAFTARAN</th>
                      <th width="1%">:</th>
                      <td><?php echo $user->no_pendaftaran; ?></td>
                    </tr>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->nama_lengkap); ?></td>
                    </tr>
                    <tr>
                      <th>NIM</th>
                      <th>:</th>
                      <td><?php echo $user->nis; ?></td>
                    </tr>
                    <tr>
                      <th>E-Mail</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->email); ?></td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin</th>
                      <th>:</th>
                      <td><?php echo $user->jk; ?></td>
                    </tr>
                    <tr>
                      <th>Tempat, Tgl Lahir</th>
                      <th>:</th>
                      <td><?php echo "$user->tempat_lahir, ". $this->Model_data->tgl_id($user->tgl_lahir); ?></td>
                    </tr>
                    <tr>
                      <th>Agama</th>
                      <th>:</th>
                      <td><?php echo $user->agama; ?></td>
                    </tr>
                      <th>Alamat</th>
                      <th>:</th>
                      <td><?php echo $user->alamat_siswa; ?></td>
                    </tr>
                    <tr>
                      <th>No. Handphone</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp_siswa; ?></td>
                    </tr>
                    <tr>
                      <th>Nama Kampus</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->nama_sekolah); ?></td>
                    </tr>
                    <tr>
                      <th>Status Kampus</th>
                      <th>:</th>
                      <td><?php echo $user->status_sekolah; ?></td>
                    </tr>
                    <tr>
                      <th>Fakultas</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->fakultas); ?></td>
                    </tr>
                    <tr>
                      <th>Jurusan</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->jurusan); ?></td>
                    </tr>
                    <tr>
                      <th>Alamat Kampus</th>
                      <th>:</th>
                      <td><?php echo $user->alamat_sekolah; ?></td>
                    </tr>
                    <tr>
                      <th>Link CV dan Surat Pengantar</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->cv_sp); ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>


    </div>
    <!-- /dashboard content -->
