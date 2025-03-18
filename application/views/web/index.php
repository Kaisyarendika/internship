<?php $ceks = $this->session->userdata('no_pendaftaran'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Internship | PT. BUMI SIAK PUSAKO</title>
		<base href="<?php echo base_url();?>"/>

		<link rel="icon" href="img/logo_bsp.png" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/faa.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top"><img src="img\logo_bsp.png" alt="Logo" width="40" style="position:absolute;margin-top:-10px;margin-left:-100px;"> <span style="margin-left:-50px;">Internship Management system</span> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio"><img src="img\logo_bsp.png" alt="Logo" width="15"> Tentang Perusahaan</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-info-circle"></i> Informasi</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Kontak Kami</a>
                    </li>
                    <li class="page-scroll">
                        <a href="panel_admin/log_in"><i class='fa fa-user'></i> Admin</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
      <?php
      if (strtolower($this->uri->segment(1)) == 'logcs') {
        $this->load->view('web/login');
      } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <img class="img-responsive" src="img\logo_bsp.png" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <div class="intro-text"><br>
                        <span class="name shad" style="font-size:35px"> Selamat Datang <br> PT. BUMI SIAK PUSAKO</span>

                        <br>
                      <?php if ($web_ppdb->status_ppdb == 'buka') {?>
                        <span class="skills">
                        	<a href="files/Mohd Azhima.pdf" class="btn btn-danger btn-lg"><i class="fa fa-file-pdf-o faa-pulse animated"></i> &nbsp;Download Panduan Pendaftaran</a>
                        </span>
                        <br> <br>
                        <hr class="star-light">
												<br>
                        <!-- <h3>Login Calon Siswa Terdaftar di PPDB Online SMK Plus Al-Maftuh</h3> -->
                        <span>
                         <a href="pendaftaran" class="btn btn-success btn-lg" style="width:300px;margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran Magang</a>
												 <a href="logcs" class="btn btn-success btn-lg" style="width:300px;margin:5px;"><i class="fa fa-users faa-pulse animated"></i> &nbsp;<?php if($ceks==''){echo "Login";}else{echo "Panel";} ?> Calon Peserta Magang</a>
												 <br>
											  </span>
                      <?php }else{ ?>
                        <span class="skills">
                        </span>
                        <br> <br>
                        <hr class="star-light">
												<br>
                        <!-- <h3>Login Calon Siswa Terdaftar di PPDB Online SMK Plus Al-Maftuh</h3> -->
                        <span>
                         <a href="javascript:void(0);" class="btn btn-success btn-lg" style="margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;Pendaftaran ditutup</a>
												 <br>
											  </span>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Tentang Perusahaan</h2>
                    <hr class="star-primary">

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 portfolio-item">
                    <a href="https://www.bsp.co.id/" target="_blank" class="portfolio-link">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img\logo_bsp.png" width="200" class="img-thumbnail" alt=""><br><br>
                        <span class="btn btn-success btn-block">https://www.bsp.co.id/</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Informasi Penerimaan Peserta magang</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify">
                    <p>PT. Bumi Siak Pusako menyediakan portal pendaftaran magang secara <i>online</i> diharapkan proses pendaftaran dapat berjalan cepat
                    dan bisa dilakukan dimanapun dan kapanpun selama sesi pendaftaran Online dibuka. Proses pendaftaran calon peserta magang tidak menggunakan formulir konvensional hanya dengan mengakses website PORTAL PENDAFTARAN MAGANG PT. BUMI SIAK PUSAKO . </p>
                </div>
                <div class="col-lg-4" style="text-align:justify">
                    <p>Pengisian form Pendaftaran magang secara Online mohon diperhatikan data yang dibutuhkan, nantinya akan dipakai dalam proses validasi. Setelah proses pengisian form secara online berhasil dilakukan, calon peserta magang akan mendapat bukti daftar dengan nomor pendaftaran dan harus disimpan yang akan digunakan untuk proses selanjutnya.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                    <a href="#page-top" class="btn btn-md btn-outline">
                        <i class="fa fa-pencil-square-o "></i> HOME
                    </a> &nbsp;&nbsp;
                    <a href="#prosedur" class="btn btn-md btn-outline">
                        <i class="fa fa-tasks"></i> Prosedur Pendaftaran
                    </a>&nbsp;&nbsp;
                    <a href="logcs" class="btn btn-md btn-outline">
                        <i class="fa fa-sign-in"></i> <?php if($ceks==''){echo "Login";}else{echo "Panel";} ?> Calon Peserta Magang
                    </a>&nbsp;&nbsp;

                </div>
            </div>
        </div>
    </section>

     <section id="prosedur">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Prosedur Pendaftaran</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:-10px;">
                    
                    <div class="col-md-2"></div>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="col-lg-18 text-center">
                                
                                <hr class="star-primary">
                                <ol style="font-size:18px;text-align:justify">
                                    <li>Calon Peserta Magang mendaftarkan diri atau melakukan <b><a href="pendaftaran">Pendaftaran secara <i>online</i></a></b> melalui website <b><a href="">PORTAL PENDAFTARAN MAGANG PT. BUMI SIAK PUSAKO</a></b>.</li>
                                    <li>Setelah calon peserta magang berhasil melakukan pendaftaran silahkan cek secara berkala di web apakah sudah <b>diterima atau ditolak</b>.</li>
                                    <li>Jika Calon peserta magang dinyatakan <b>diterima</b> silahkan menunggu telpon dari pihak <strong>BSP</strong> .</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
		<section class="success" id="contact">
        <!-- <div class="container"> -->
            <div class="row" style="margin-top:-100px;margin-bottom:-105px;">
                <div class="col-lg-4 text-center">
                  <br><br>
                    <h2>Kontak Kami</h2>
                    <hr class="star-light">
                    <h4>
                    Jl. Jend. Sudirman Utama, Simpang Tiga, Kec. Bukit Raya, Kota Pekanbaru, Riau 28282 <br><br>
                    </h4>
                    <span style="color:#222;"><b><i class="fa fa-phone-square"></i> 0800-0000-0000</b> </span>
										&nbsp;
                    <span class="eml" style="color:#222;"><i class="fa fa-envelope"></i> https://www.bsp.co.id/</span>
                    <br>
                    <a href="http://www.smkplusalmaftuh.com/" target="_blank"><h4 class="btn btn-success">PT. Bumi Siak Pusako</h4> </h4></a>
                </div>
                <div class="col-lg-8 text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.65907809722!2d101.44652987491604!3d0.5119076994830963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aea486eeed63%3A0xd5072d3d378e3f1f!2sGedung%20Surya%20Dumai!5e0!3m2!1sid!2sid!4v1687310186376!5m2!1sid!2sid" width="100%" height="465" frameborder="0" style="border:0;" allowfullscreen=></iframe>
                  
              	</div>
            </div>
        <!-- </div> -->
    </section>



    <!-- Footer -->
    <footer class="text-center">

        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <a href="https://www.bsp.co.id/d" target="_blank">PT. Bumi Siak </a> <?php echo date('Y'); ?> | KAISYARENDIKA-AZHIMA
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>

</body>
</html>
