<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_admin extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			$this->load->view('404_content');
		}else {
			$data['user']   	 = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
			$data['judul_web'] = "Dashboard";

			$thn							 = date('Y');
			$data['v_thn']		 = $thn;
			foreach($this->Model_data->statistik($thn)->result_array() as $row)
			 {
				$data['grafik'][]=(float)$row['Januari'];
				$data['grafik'][]=(float)$row['Februari'];
				$data['grafik'][]=(float)$row['Maret'];
				$data['grafik'][]=(float)$row['April'];
				$data['grafik'][]=(float)$row['Mei'];
				$data['grafik'][]=(float)$row['Juni'];
				$data['grafik'][]=(float)$row['Juli'];
				$data['grafik'][]=(float)$row['Agustus'];
				$data['grafik'][]=(float)$row['September'];
				$data['grafik'][]=(float)$row['Oktober'];
				$data['grafik'][]=(float)$row['Nopember'];
				$data['grafik'][]=(float)$row['Desember'];
			 }

			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnnonaktif'])){
				$data = array(
					'status_ppdb'	=> 'tutup',
					'tgl_diubah'  => $this->Model_data->date('waktu_default')
				);
				$this->db->update('tbl_web', $data, array('id_web' => '1'));
				redirect('panel_admin');
			}
			if (isset($_POST['btnaktif'])){
				$data = array(
					'status_ppdb'	=> 'buka',
					'tgl_diubah'  => $this->Model_data->date('waktu_default')
				);
				$this->db->update('tbl_web', $data, array('id_web' => '1'));
				redirect('panel_admin');
			}

		}
	}

	public function log_in()
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

				if (isset($_POST['btnlogin'])){
						 $username = $_POST['username'];
						 $pass	   = $_POST['password'];

						 $query  = $this->db->get_where('tbl_admin', "username='$username'");
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('panel_admin/log_in');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('panel_admin/log_in');
										 } else {

																$this->session->set_userdata('un@sman1_belitang', "$cekun");
																$this->session->set_userdata('id_user@sman1_belitang', "$row->id_user");

												 			 	redirect('panel_admin');
										 }
						 }
				}
		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "Profile";

					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$username	 		= $this->input->post('username');
						$nama_lengkap	= $this->input->post('nama_lengkap');

									$data = array(
										'username'	   => $username,
										'nama_lengkap' => $nama_lengkap
									);
									$this->db->update('tbl_admin', $data, array('username' => $ceks));

									$this->session->has_userdata('un@sman1_belitang');
									$this->session->set_userdata('un@sman1_belitang', "$username");

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Profile berhasil diperbarui.
										</div>'
									);

						redirect('panel_admin/profile');

					}

		}
	}

	public function ubah_pass()
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "Ubah Password";

					$this->load->view('admin/header', $data);
					$this->load->view('admin/ubah_pass', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate2'])) {
						$password_lama 	= $this->input->post('password_lama');
						$password 	= $this->input->post('password');
						$password2 	= $this->input->post('password2');

						if ($data['user']->row()->password != $password_lama) {
							$this->session->set_flashdata('msg2',
								'
								<div class="alert alert-warning alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Gagal!</strong> Password Lama tidak cocok.
								</div>'
							);
						}elseif ($password != $password2) {
								$this->session->set_flashdata('msg2',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Password Baru & Ulangi Password Baru tidak cocok.
									</div>'
								);
						}else{
									$data = array(
										'password'	=> $password
									);
									$this->db->update('tbl_admin', $data, array('username' => $ceks));

									$this->session->set_flashdata('msg2',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Password berhasil diperbarui.
										</div>'
									);
						}
									redirect('panel_admin/ubah_pass');
					}

		}
	}


	public function verifikasi($aksi='', $id='')
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "Verifikasi";

			if ($aksi == 'cek') {
				$cek_status = $this->db->get_where('tbl_user', "no_pendaftaran='$id'")->row();
				if ($cek_status->status_verifikasi == 1) {
					$sv = 0;
				}else {
					$sv = 1;
				}
				$data = array(
					'status_verifikasi'	=> $sv
				);
				$this->db->update('tbl_user', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/verifikasi');
			}elseif ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id_siswa', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_user');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/verifikasi/verifikasi', $data);
					$this->load->view('admin/footer');
		}
	}


	public function edit_materi($aksi='', $id='')
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "Edit Materi & Jadwal Ujian";

			$data['v_materi']  		= $this->db->get_where('tbl_verifikasi', "id_verifikasi='1'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/verifikasi/verifikasi_edit_materi&jadwal', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$data = array(
							'isi'	=> $this->input->post('isi')
						);
						$this->db->update('tbl_verifikasi', $data, array('id_verifikasi' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Meteri & Jadwal Ujian berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/verifikasi');
					}
		}
	}

	

	public function export($aksi='', $id='')
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "EXPORT KE EXEL HASIL FORMULIR PENDAFTARAN Peserta Magang ";

			if ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id_siswa', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_user');
			$data['v_thn']				= $thn;

					$this->load->view('admin/export', $data);
		}
	}


	public function set_pengumuman($aksi='', $id='')
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "Setting Pengumuman";

			if ($aksi == 'lulus') {
				$data = array(
					'status_pendaftaran'	=> 'lulus'
				);
				$this->db->update('tbl_user', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'tdk_lulus') {
				$data = array(
					'status_pendaftaran'	=> 'tidak lulus'
				);
				$this->db->update('tbl_user', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'batal') {
				$data = array(
					'status_pendaftaran'	=> null
				);
				$this->db->update('tbl_user', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id_siswa', 'DESC');
			$data['v_siswa']  		= $this->db->get('tbl_user');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/set_pengumuman/set_pengumuman', $data);
					$this->load->view('admin/footer');
		}
	}

	public function edit_ket($aksi='', $id='')
	{
		$ceks = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web'] 		= "Edit Keterangan Lulus";

			$data['v_ket']	  		= $this->db->get_where('tbl_pengumuman', "id_pengumuman='1'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/set_pengumuman/set_keterangan', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$data = array(
							'ket_pengumuman'	=> $this->input->post('ket_pengumuman')
						);
						$this->db->update('tbl_pengumuman', $data, array('id_pengumuman' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Keterangan Pengumuman berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/set_pengumuman');
					}
		}
	}

	public function statistik($aksi='',$id='') {
		$ceks 	 = $this->session->userdata('un@sman1_belitang');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			    = $this->db->get_where('tbl_admin', "username='$ceks'");
			$data['judul_web']			= "Statistik Pendaftaran Siswa";

			if ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$data['v_thn']				= $thn;

			foreach($this->Model_data->statistik($thn)->result_array() as $row)
		   {
		    $data['grafik'][]=(float)$row['Januari'];
		    $data['grafik'][]=(float)$row['Februari'];
		    $data['grafik'][]=(float)$row['Maret'];
		    $data['grafik'][]=(float)$row['April'];
		    $data['grafik'][]=(float)$row['Mei'];
		    $data['grafik'][]=(float)$row['Juni'];
		    $data['grafik'][]=(float)$row['Juli'];
		    $data['grafik'][]=(float)$row['Agustus'];
		    $data['grafik'][]=(float)$row['September'];
		    $data['grafik'][]=(float)$row['Oktober'];
		    $data['grafik'][]=(float)$row['Nopember'];
		    $data['grafik'][]=(float)$row['Desember'];
		   }

			 foreach($this->Model_data->statistik($thn, 'diverifikasi')->result_array() as $row)
 		   {
 		    $data['grafik2'][]=(float)$row['Januari'];
 		    $data['grafik2'][]=(float)$row['Februari'];
 		    $data['grafik2'][]=(float)$row['Maret'];
 		    $data['grafik2'][]=(float)$row['April'];
 		    $data['grafik2'][]=(float)$row['Mei'];
 		    $data['grafik2'][]=(float)$row['Juni'];
 		    $data['grafik2'][]=(float)$row['Juli'];
 		    $data['grafik2'][]=(float)$row['Agustus'];
 		    $data['grafik2'][]=(float)$row['September'];
 		    $data['grafik2'][]=(float)$row['Oktober'];
 		    $data['grafik2'][]=(float)$row['Nopember'];
 		    $data['grafik2'][]=(float)$row['Desember'];
 		   }

			 foreach($this->Model_data->statistik($thn, 'diterima')->result_array() as $row)
 		   {
 		    $data['grafik3'][]=(float)$row['Januari'];
 		    $data['grafik3'][]=(float)$row['Februari'];
 		    $data['grafik3'][]=(float)$row['Maret'];
 		    $data['grafik3'][]=(float)$row['April'];
 		    $data['grafik3'][]=(float)$row['Mei'];
 		    $data['grafik3'][]=(float)$row['Juni'];
 		    $data['grafik3'][]=(float)$row['Juli'];
 		    $data['grafik3'][]=(float)$row['Agustus'];
 		    $data['grafik3'][]=(float)$row['September'];
 		    $data['grafik3'][]=(float)$row['Oktober'];
 		    $data['grafik3'][]=(float)$row['Nopember'];
 		    $data['grafik3'][]=(float)$row['Desember'];
 		   }

			 foreach($this->Model_data->statistik($thn, 'tidak diterima')->result_array() as $row)
 		   {
 		    $data['grafik4'][]=(float)$row['Januari'];
 		    $data['grafik4'][]=(float)$row['Februari'];
 		    $data['grafik4'][]=(float)$row['Maret'];
 		    $data['grafik4'][]=(float)$row['April'];
 		    $data['grafik4'][]=(float)$row['Mei'];
 		    $data['grafik4'][]=(float)$row['Juni'];
 		    $data['grafik4'][]=(float)$row['Juli'];
 		    $data['grafik4'][]=(float)$row['Agustus'];
 		    $data['grafik4'][]=(float)$row['September'];
 		    $data['grafik4'][]=(float)$row['Oktober'];
 		    $data['grafik4'][]=(float)$row['Nopember'];
 		    $data['grafik4'][]=(float)$row['Desember'];
 		   }

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_pendaftar'] 		 = $this->db->get("tbl_user")->num_rows();

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_diverifikasi'] 	 = $this->db->get_where("tbl_user", "status_verifikasi='1'")->num_rows();

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_diterima'] 			 = $this->db->get_where("tbl_user", "status_pendaftaran='lulus'")->num_rows();

			 																 $this->db->like('tgl_siswa', "$thn", 'after');
			 $data['total_tidak_diterima'] = $this->db->get_where("tbl_user", "status_pendaftaran='tidak lulus'")->num_rows();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/statistik/index', $data);
					$this->load->view('admin/footer');
		}
	}


	public function logout() {
     if ($this->session->has_userdata('un@sman1_belitang') != '' AND $this->session->has_userdata('id_user@sman1_belitang') != '') {
         $this->session->sess_destroy();
     }
		 redirect('panel_admin/log_in');
  }

}
