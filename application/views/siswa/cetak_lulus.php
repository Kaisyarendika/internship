<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url();?>"/>
  	<link rel="icon" type="image/png" href="img/logo_bsp.png"/>
    <style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 2px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
    }
    </style>
  </head>
  <body onload="window.print();">
    <?php $this->load->view('kop_lap'); ?>
    <br>
    <h4 align="center" style="margin:0px;font-size:19px;"><u><b>SURAT PENERIMAAN</b></u></h4>
      <center>
        No :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/HCM/II/<?php echo $thn_ppdb; ?>
      </center>

    <br>
    <table width="100%" border="0">
      <tr>
        <td colspan="3">Dapartemen HCM dengan ini menyatakan bahwa :</td>
      </tr>
      <tr>
        <td width="200">NO. PENDAFTARAN</td>
        <td width="1">:</td>
        <td><?php echo $user->no_pendaftaran; ?></td>
      </tr>
      <tr>
        <td>TANGGAL PENDAFTARAN </td>
        <td>:</td>
        <td><?php echo date('d-m-Y', strtotime($user->tgl_siswa)); ?></td>
      </tr>
      <tr>
      <td>NAMA LENGKAP</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_lengkap); ?></td>
      </tr>
      <tr>
        <td>NIM</td>
        <td>:</td>
        <td><?php echo $user->nis; ?></td>
      </tr>
       
      <tr>
        <td>JENIS KELAMIN</td>
        <td>:</td>
        <td><?php echo $user->jk; ?></td>
      </tr>
      <tr>
        <td>TEMPAT, TANGGAL LAHIR</td>
        <td>:</td>
        <td><?php echo "$user->tempat_lahir, ".$this->Model_data->tgl_id($user->tgl_lahir); ?></td>
      </tr>
      <tr>
        <td>AGAMA</td>
        <td>:</td>
        <td><?php echo $user->agama; ?></td>
      </tr>
      <tr>
        <td>ASAL Kampus</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_sekolah); ?></td>
      </tr>
      <tr>
        <td>Fakultas</td>
        <td>:</td>
        <td><?php echo ucwords($user->fakultas); ?></td>
      </tr>
      <tr>
        <td>Jurusan</td>
        <td>:</td>
        <td><?php echo ucwords($user->jurusan); ?></td>
      </tr>
      <tr>
        <td>NO. HANDPHONE (HP)</td>
        <td>:</td>
        <td><?php echo $user->no_hp_siswa; ?></td>
      </tr>
      
    </table>
    <br>

    <center>
      <div style="border:1px solid black; color:green;width:50%;padding:10px;">
        <b style="font-size:20px;"><u>Diterima</u></b>
      </div>
    </center>
    <br>

    <br><br>

    <div style="float:right;">
    Pekanbaru, <?php echo $this->Model_data->tgl_id(date('d-m-Y')); ?> <br>
			HCM Manager,  <br>
      <img src="#" alt="" width="100"><br>
      <b><u>Rahmah Selviawati</u></b><br>
    </div>
    <br><br><br><br><br><br>

    <!-- <?php echo $v_ket->ket_pengumuman; ?> -->

  </body>
</html>
