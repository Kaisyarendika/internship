<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		$this->load->view('web/index', $data);
	}

	public function pendaftaran()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}else{
			$this->db->order_by('id_pdd', 'ASC');
			$data['v_pdd'] = $this->db->get('tbl_pdd')->result();


			$this->load->view('web/pendaftaran', $data);

			if (isset($_POST['btndaftar'])) {
				$this->db->order_by('id_siswa', 'DESC');
				$sql 		= $this->db->get('tbl_user');
				if ($sql->num_rows() == 0) {
				$no_pendaftaran   = "PSB18004001";
				}else{
				$noUrut 	 	= substr($sql->row()->no_pendaftaran, 8, 3);
				$noUrut++;
				$no_pendaftaran	  = "PSB18004".sprintf("%03s", $noUrut);
				}
				$cv_sp							=$this->input->post('cv_sp');
				$nis							= $this->input->post('nis');
				$email							= $this->input->post('email');
				$nama_lengkap					= $this->input->post('nama_lengkap');
				$jk								= $this->input->post('jk');
				$tempat_lahir			= $this->input->post('tempat_lahir');
				$tgl_lahir				= $this->input->post('tgl_lahir')."-".$this->input->post('bln_lahir')."-".$this->input->post('thn_lahir');
				$agama						= $this->input->post('agama');
				$alamat_siswa			= $this->input->post('alamat_siswa');
				$no_hp_siswa			= $this->input->post('no_hp_siswa');
				$nama_sekolah			= $this->input->post('nama_sekolah');
				$status_sekolah			= $this->input->post('status_sekolah');
				$fakultas				= $this->input->post('fakultas');
				$jurusan				= $this->input->post('jurusan');
				$alamat_sekolah				= $this->input->post('alamat_sekolah');
				$tgl_siswa				= $this->Model_data->date('waktu_default');

				

						$data = array(
							'no_pendaftaran'		=> $no_pendaftaran,
							'password'				  => $nis,
							'nis'					  		=> $nis,
							'email'					  		=> $email,
							'cv_sp'					  		=> $cv_sp,
							'nama_lengkap'			=> $nama_lengkap,
							'jk'				  			=> $jk,
							'tempat_lahir'			=> $tempat_lahir,
							'tgl_lahir'				  => $tgl_lahir,
							'agama'				  	  => $agama,
							'alamat_siswa'			=> $alamat_siswa,
							'no_hp_siswa'				=> $no_hp_siswa,
							'nama_sekolah'			=> $nama_sekolah,
							'status_sekolah'		=> $status_sekolah,
							'fakultas'				=> $fakultas,
							'jurusan'				=> $jurusan,
							'alamat_sekolah'		=> $alamat_sekolah,
							'tgl_siswa'				  => $tgl_siswa
						);
						$this->db->insert('tbl_user',$data);


							// $this->session->set_flashdata('msg',
							// 	'
							// 	<div class="alert alert-success alert-dismissible" role="alert">
							// 		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							// 			 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							// 		 </button>
							// 		 <strong>Sukses!</strong> Berhasil ditambahkan.
							// 	</div>'
							// );
							$this->session->set_userdata('no_pendaftaran', "$no_pendaftaran");
							redirect('panel_user');

			}

		}

		


	}

	public function logcs()
	{
		$data['web_ppdb']	 = $this->db->get_where('tbl_web', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}
		$ceks = $this->session->userdata('no_pendaftaran');
		if(isset($ceks)) {
			redirect('panel_user');
		}else{
			$this->load->view('web/index', $data);

				if (isset($_POST['btnlogin'])){
						 $username = $_POST['username'];
						 $pass	   = $_POST['password'];

						 $this->db->like('tgl_siswa', date('Y'), "after");
						 $query  = $this->db->get_where('tbl_user', "no_pendaftaran='$username'");
						 $cek    = $query->result();
						 $cekun  = $cek[0]->no_pendaftaran;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>No. Pendaftaran "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('logcs');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>No. Pendaftaran atau NIM Salah!</strong>.
													 </div>'
												);
												redirect('logcs');
										 } else {

																$this->session->set_userdata('no_pendaftaran', "$cekun");

												 			 	redirect('panel_user');
										 }
						 }
				}
		}
	}


	function error_not_found(){
		$this->load->view('404_content');
	}

}
