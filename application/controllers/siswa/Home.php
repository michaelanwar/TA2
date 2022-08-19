<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$currentUrl = current_url();
		handle(Constant::USER_ROLE_SISWA, $currentUrl);
		$this->load->model('Mapel_model');
		$this->load->model('Guru_model');
		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
		$this->load->model('Pengumuman_model');
		$this->load->model('Assign_Mapel_Kelas_model');
		$this->load->model('Assign_Mapel_Kelas_Guru_model');
		$this->load->model('Assign_Kelas_Guru_model');
		$this->load->model('Assign_Kelas_Siswa_model');
	}

	public function index()
	{
		$myUserId = $this->session->userdata('user')['id'];
		$myKelasAssign = Assign_Kelas_Siswa_model::where('siswa_id', $myUserId)->first();

		$myKelasId = $myKelasAssign->kelas_id;
		$title = $this->session->userdata('user')['nama'];

		$pengumumans = Pengumuman_model::orderBy('updated_at', 'DESC')->limit(3)->get();
		$mapelList = Assign_Mapel_Kelas_model::where('kelas_id', $myKelasId)->get();

		// echo $myKelasId;
		// return;
		$this->load->view('layouts/user/wrapper', compact('title', 'pengumumans', 'mapelList'));
	}

	public function profile()
	{
		$data = [
			'title' => 'Profil',
			'content' => 'layouts/user/profile/detail',
			'siswa' => Siswa_model::find($this->session->userdata('user')['id'])
		];
		$this->load->view('layouts/user/wrapper', $data);
	}

	public function updateProfile()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Data tidak boleh kosong');
			redirect('siswa/home/profile');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat')
			];
			$siswa = Siswa_model::find($this->session->userdata('user')['id']);
			$siswa->nama = $data['nama'];
			$siswa->tanggal_lahir = $data['tanggal_lahir'];
			$siswa->alamat = $data['alamat'];
			$siswa->save();
			$this->session->set_flashdata('success', 'Data Profile Siswa berhasil diperbaharui');
			redirect('siswa/home/profile');
		}
	}

	public function updateImage()
	{
		$config['upload_path'] = FCPATH . './assets/siswa/profile';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = '5120';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			redirect('siswa/home/profile');
		} else {
			$data = array('upload_data' => $this->upload->data());
			$siswa = Siswa_model::find($this->session->userdata('user')['id']);
			$siswa->gambar = $data['upload_data']['file_name'];
			$siswa->save();
			$this->session->set_flashdata('success', 'Gambar berhasil di perbaharui');
			redirect('siswa/home/profile');
		}
	}
}
