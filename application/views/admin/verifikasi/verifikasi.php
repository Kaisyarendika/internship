<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <?php
    echo $this->session->flashdata('msg');
    ?>
    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title"> Data Verifikasi</h5>
          <hr style="margin:0px;">
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                    <br>
                    <a href="panel_admin/edit_materi" class="btn btn-primary" style="background-color: transparent;"></a>
                    <div class="col-md-3" style="float:right;margin-right:25px;">
                      <div class="input-group">
                        <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                        <select class="form-control" name="thn" onchange="thn()">
                          <?php for ($i=date('Y'); $i >=2018 ; $i--) {?>
                            <option value="<?php echo $i; ?>" <?php if($v_thn==$i){echo "selected";} ?>>Tahun <?php echo $i; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

        </div>
        <div class="table-responsive">
        <table class="table datatable-basic table-bordered" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>No. Pendaftaran</th>
              <th>Nama Lengkap</th>
              <th>NIM</th>
              <th>Universitas</th>
              <th>Jurusan</th>
              <th>NO HP</th>
              <th>E-Mail</th>
              <th>CV dan Surat Pengantar</th>
              <th>Status Verifikasi</th>
              <th class="text-center" width="130">Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_siswa->result() as $baris) {?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $baris->no_pendaftaran; ?></td>
                  <td><?php echo $baris->nama_lengkap; ?></td>
                  <td><?php echo $baris->nis; ?></td>
                  <td><?php echo $baris->nama_sekolah; ?></td>
                  <td><?php echo $baris->jurusan; ?></td>
                  <td><?php echo $baris->no_hp_siswa; ?></td>
                  <td><?php echo $baris->email; ?></td>
                  <td><?php echo $baris->cv_sp; ?></td>
                  <td align="center">
                    <?php if ($baris->status_verifikasi == 1) {?>
                      <label class="label label-success">Terverifikasi</label>
                    <?php }else{ ?>
                      <label class="label label-warning">Belum diVerifikasi</label>
                    <?php } ?>
                  </td>
                  <td align="center">
                    
                    <?php if ($baris->status_verifikasi == 0) {?>
                      <a href="panel_admin/verifikasi/cek/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-info btn-xs" title="Verifikasi" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-checkmark4"></i></a>
                    <?php }else{ ?>
                      <a href="panel_admin/verifikasi/cek/<?php echo $baris->no_pendaftaran; ?>" class="btn btn-danger btn-xs" title="Batal Verifikasi" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-cross3"></i></a>
                    <?php } ?>
                  </td>
                </tr>
              <?php
              } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->

<script type="text/javascript">
  function thn()
  {
    var thn = $('[name="thn"]').val();
      window.location = "panel_admin/verifikasi/thn/"+thn;
  }

  $('[name="thn"]').select2({
      placeholder: "- Tahun -"
  });

</script>
