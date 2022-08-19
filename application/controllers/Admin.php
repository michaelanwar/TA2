<?php

use Illuminate\Support\Arr;

defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        handle(Constant::USER_ROLE_ADMIN, current_url());
        $this->load->model('Assign_Kelas_Guru_model');
        $this->load->model('Assign_Kelas_Siswa_model');
        $this->load->model('Assign_Mapel_Kelas_model');
        $this->load->model('Assign_Mapel_Kelas_Guru_Bab_Model');
        $this->load->model('Assign_Mapel_Kelas_Guru_model');
        $this->load->model('Bab_model');
        $this->load->model('File_Pengumuman_model');
        $this->load->model('Guru_model');
        $this->load->model('Kelas_model');
        $this->load->model('Mapel_model');
        $this->load->model('Materi_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Role_model');
        $this->load->model('Siswa_model');
        $this->load->model('User_model');
        $this->load->model('User_Role_model');
        $this->filePengumumanAllowedTypes = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp';
        $this->filePengumumanPath = FCPATH . './assetsAdmin/files/uploads/pengumuman';
        $this->bannerPengumumanAllowedTypes = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp';
        $this->bannerPengumumanPath = FCPATH . './assetsAdmin/img/upload/pengumuman';
    }

    public function index()
    {
        $title = 'Beranda';
        $siswa = Siswa_model::all();
        $guru = Guru_model::all();
        $kelas = Kelas_model::all();
        $materi = Materi_model::all();
        $this->load->view(
            'layouts/admin/wrapper',
            compact(
                'title',
                'siswa',
                'guru',
                'kelas',
                'materi'
            )
        );
    }


    // ADMIN SECTION
    public function admin()
    {
        $admin = Admin_model::all();
        $title = 'Admin';
        $isi = 'admin/admin';
        $this->load->view(
            'layouts/admin/wrapper',
            compact(
                'title',
                'admin',
                'isi'
            )
        );
    }

    public function createAdmin()
    {
        $user = new User_model();
        $user->email = $this->input->post('email');
        $user->password = sha1($this->input->post('password'));
        $user->save();

        $userRole = new User_Role_model();
        $userRole->user_id = $user->id;
        $userRole->role_id = 1;
        $userRole->save();

        $admin = new Admin_model();
        $admin->nama = $this->input->post('nama');
        $admin->user_id = $user->id;
        $admin->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan! </div>');
        redirect('admin/admin');
    }

    public function editAdmin($email)
    {
        $email = urldecode($email);
        $user = User_model::where('email', $email)->first();
        $user->password = sha1($this->input->post('password'));
        $user->admin->first()->nama = $this->input->post('nama');
        $user->admin->first()->save();
        $user->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! </div>');
        redirect('admin/admin');
    }

    public function deleteAdmin($email)
    {
        $email = urldecode($email);
        $user = User_model::where('email', $email)->first();
        $user->delete();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Admin berhasil dihapus! </div>');
        redirect('admin/admin');
    }
    // END OF ADMIN SECTION


    // GURU SECTION 
    public function guru()
    {
        $guru = Guru_model::orderBy('created_at', 'DESC')->get();
        $title = 'Guru';
        $isi = 'admin/guru';
        $this->load->view(
            'layouts/admin/wrapper',
            compact(
                'title',
                'guru',
                'isi'
            )
        );
    }

    public function createGuru()
    {
        $user = new User_model();
        $user->email = $this->input->post('email');
        $user->password = sha1($this->input->post('password'));
        $user->save();

        $userRole = new User_Role_model();
        $userRole->user_id = $user->id;
        $userRole->role_id = 2;
        $userRole->save();

        $guru = new Guru_model();
        $guru->nama = $this->input->post('nama');
        $guru->user_id = $user->id;
        $guru->alamat = $this->input->post('alamat');
        if ($_FILES['gambar']['name'] != '') {
            $config['upload_path'] = FCPATH . './assetsAdmin/img/upload/profil/guru/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $file = array('uploads' => $this->upload->data());
            $fileName = $file['uploads']['file_name'];
            $guru->gambar = $fileName;
        }
        $guru->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Guru berhasil ditambahkan! </div>');
        redirect('admin/guru');
    }

    public function editGuru($idUser)
    {
        $user = User_model::find($idUser);
        if (!$user) {
            $this->session->set_flashdata('error', 'Guru tidak ditemukan');
            redirect('admin/guru');
        }

        if ($this->input->post('check') == 'on') {
            $newPassword = $this->input->post('password');
            // check length password bigger than 6 or not
            if (strlen($newPassword) < 6) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password minimal 6 karakter! </div>');
                redirect('admin/guru');
            } else {
                $user->password = sha1($newPassword);
            }
        }
        $user->guru->first()->nama = $this->input->post('nama');
        $user->guru->first()->alamat = $this->input->post('alamat');
        if ($_FILES['gambar']['name'] != '') {
            if ($user->guru->first()->gambar != '') {
                $file = FCPATH . './assetsAdmin/img/upload/profil/guru/' . $user->guru->first()->gambar;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            $config['upload_path'] = FCPATH . './assetsAdmin/img/upload/profil/guru/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/guru');
            }
            $file = array('uploads' => $this->upload->data());
            $fileName = $file['uploads']['file_name'];
            $user->guru->first()->gambar = $fileName;
        }
        $user->guru->first()->save();
        $user->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! </div>');
        redirect('admin/guru');
    }

    public function deleteGuru($idUser)
    {
        $user = User_model::find($idUser);
        if (!$user) {
            $this->session->set_flashdata('error', 'Guru tidak ditemukan');
            redirect('admin/guru');
        }
        if ($user->guru->first()->gambar != '') {
            $file = FCPATH . './assetsAdmin/img/upload/profil/guru/' . $user->guru->first()->gambar;
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $gurus = $user->guru;
        if ($gurus->count() > 0) {
            foreach ($gurus as $key => $guruItem) {
                $tmpKelasGuru = Assign_Mapel_Kelas_Guru_model::where('assign_kelas_guru_id', $guruItem->id)->get();
                if ($tmpKelasGuru->count() > 0) {
                    foreach ($tmpKelasGuru as $key => $tmpKelasGuruItem) {
                        $tmpKelasGuruItem->delete();
                    }
                }

                $courses = Assign_Mapel_Kelas_model::where('guru_id', $user->guru()->first()->id)->get();
                if ($courses->count() > 0) {
                    foreach ($courses as $key => $courseItem) {
                        $courseItem->delete();
                    }
                }

                $guruItem->delete();
            }
        }

        $user->delete();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Guru berhasil dihapus! </div>');
        redirect('admin/guru');
    }
    // END OF GURU SECTION


    // SISWA SECTION
    public function siswa()
    {
        $this->session->set_flashdata('menu', 'siswa');
        $title = 'Siswa';
        $isi = 'admin/list-siswa/index';
        $this->db->from("siswa");
        $this->db->order_by("created_at", "desc");
        $query = $this->db->get();
        $siswa = $query->result();
        $kelas = Kelas_model::all();
        $materi = Materi_model::all();
        $this->load->view(
            'layouts/admin/wrapper',
            compact(
                'title',
                'isi',
                'siswa',
                'kelas',
                'materi'
            )
        );
    }

    public function createSiswa()
    {
        $user = new User_model();
        $user->email = $this->input->post('email');
        $user->password = sha1($this->input->post('password'));
        $user->save();

        $userRole = new User_Role_model();
        $userRole->user_id = $user->id;
        $userRole->role_id = 3;
        $userRole->save();

        $siswa = new Siswa_model();
        $siswa->user_id = $user->id;
        $siswa->nama = $this->input->post('nama');
        $siswa->alamat = $this->input->post('alamat');
        $siswa->tanggal_lahir = $this->input->post('tanggal_lahir');
        if ($_FILES['gambar']['name'] != '') {
            $config['upload_path'] = FCPATH . './assets/siswa/profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $file = array('uploads' => $this->upload->data());
            $fileName = $file['uploads']['file_name'];
            $siswa->gambar = $fileName;
        }
        $siswa->save();
        $this->Assign_Kelas_Siswa_model->insert([
            'kelas_id' => $this->input->post('kelas'),
            'siswa_id' => $siswa->id
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data siswa berhasil ditambahkan! </div>');
        redirect('admin/siswa');
    }

    public function editSiswa($id)
    {
        $siswa = Siswa_model::find($id);

        $user = User_model::find($siswa->user_id);

        if ($this->input->post('check') == 'on') {
            $newPassword = $this->input->post('password');
            // check length password bigger than 6 or not
            if (strlen($newPassword) < 6) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password minimal 6 karakter! </div>');
                redirect('admin/siswa');
            } else {
                $user->password = sha1($newPassword);
            }
        }

        $siswa->nama = $this->input->post('nama');
        $siswa->alamat = $this->input->post('alamat');

        if ($_FILES['gambar']['name'] != '') {
            if ($user->guru->first()->gambar != '') {
                $file = FCPATH . './assets/siswa/profile/' . $user->guru->first()->gambar;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            $config['upload_path'] = FCPATH . './assets/siswa/profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('gambar');
            $file = array('uploads' => $this->upload->data());
            $fileName = $file['uploads']['file_name'];
            $siswa->gambar = $fileName;
        }

        $siswa->save();
        if (!empty($this->input->post('kelas'))) {
            $kelassiswa = Assign_Kelas_Siswa_model::where('siswa_id', $id)->first();
            $kelassiswa->kelas_id = $this->input->post('kelas');
            $kelassiswa->updated_at = date('Y-m-d H:i:s');

            $kelassiswa->save();
        }
        $user->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil diubah! </div>');
        redirect('admin/siswa');
    }
    public function deleteSiswa($user_id)
    {
        $user = User_model::where('id', $user_id)->first();
        $siswa = Siswa_model::where('user_id', $user_id)->first();

        if ($siswa->gambar != '') {
            $file = FCPATH . './assets/siswa/profile/' . $siswa->gambar;
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $kelassiswa = Assign_Kelas_Siswa_model::where('siswa_id', $siswa->id)->first();
        if ($kelassiswa) {
            $kelassiswa->delete();
        }
        $siswa->delete();
        $user->delete();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Siswa berhasil dihapus! </div>');
        redirect('admin/siswa');
        //         $kelassiswa = Assign_Kelas_Siswa_model::where('siswa_id', $id)->first();
        //         // $kelassiswa->delete();
        //         // // $user = User_model::find($id);
        //         // // $user->delete();

        //         $siswa = Siswa_model::find($id);
        //         // $siswa->delete();

        //         // $this->db->where('assign_kelas_siswa.siswa_id=siswa.id');
        //         // $this->db->where('user.id=siswa.user_id');
        //         // $this->db->where('siswa.id',$id);
        //         // $this->db->delete(array('assign_kelas_siswa','user','siswa'));

        //         $user = User_model::where('id', $id)->first();
        //         if ($siswa->gambar != '') {
        //             $file = FCPATH . './assets/siswa/profile/' . $siswa->gambar;
        //             if (file_exists($file)) {
        //                 unlink($file);
        //             }
        //         }
        //         if ($kelassiswa) {
        //                     $kelassiswa->delete();

        //         }
        //         if ($user) {
        //             $user->delete();

        // }
        //         $siswa->delete();


        //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Siswa berhasil dihapus! </div>');
        //         redirect('admin/siswa');
    }
    // END OF SISWA SECTION


    // SISWA KELAS SECTION
    public function siswaKelas()
    {
        $kelasList = Kelas_model::all();
        $allSiswaList = Siswa_model::all();

        // echo ($allSiswaList[2]->getWhichClassMembered()->id);
        // return;

        $data = [
            'title' => 'Siswa per Kelas',
            'isi' => 'admin/siswaKelasIndex',
            'kelasList' => $kelasList,
            'allSiswaList' => $allSiswaList
        ];

        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function updateSiswaInKelas()
    {
        $idKelas = $this->input->post('idKelas');

        $this->form_validation->set_rules(
            'idKelas',
            'ID Kelas',
            'required',
            array(
                'required' => 'Error %s'
            )
        );

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', $this->form_validation->error_string());
            redirect('admin/siswaKelas');
        }

        $this->db->trans_begin();

        // clean first by class
        $tmpSiswaList = Assign_Kelas_Siswa_model
            ::where('kelas_id', $idKelas)
            ->get();
        if ($tmpSiswaList->count() > 0) {
            $deleteAllSucces = true;
            foreach ($tmpSiswaList as $key => $tmpSiswaItem) {
                if (!$tmpSiswaItem->delete()) {
                    $deleteAllSucces = false;
                    break;
                }
            }
            if (!$deleteAllSucces) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Failed clearing the list');
                redirect('admin/siswaKelas');
            }
        }

        // clean by siswa
        $listBaru = $this->input->post('siswaKelasNewList');
        $deleteAllSucces = true;
        foreach ($listBaru as $key => $siswaIdItem) {
            $tmpSiswaList = Assign_Kelas_Siswa_model::where('siswa_id', $siswaIdItem)->get();

            if ($tmpSiswaList->count() > 0) {
                foreach ($tmpSiswaList as $tmpSiswaItem) {
                    if (!$tmpSiswaItem->delete()) {
                        $deleteAllSucces = false;
                        break;
                    }
                }
                if (!$deleteAllSucces) break;
            }
        }
        if (!$deleteAllSucces) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Failed clearing the list');
            redirect('admin/siswaKelas');
        }

        $listBaru = $this->input->post('siswaKelasNewList');
        $insertAllSuccess = true;
        foreach ($listBaru as $key => $siswaIdItem) {
            $tmpSiswa = Siswa_model::find($siswaIdItem);
            if ($tmpSiswa) {
                if (!Assign_Kelas_Siswa_model::insert([
                    'kelas_id' => $idKelas,
                    'siswa_id' => $tmpSiswa->id,
                ])) {
                    $this->db->trans_rollback();
                    break;
                }
            }
        }

        $this->db->trans_commit();
        $this->session->set_flashdata('message', 'Berhasil mengubah daftar siswa!');
        redirect('admin/siswaKelas');
    }

    // END OF SISWA KELAS SECTION


    // KELAS SECTION
    public function kelas()
    {
        $kelasList = Kelas_model::orderBy('updated_at', 'DESC')->get();

        foreach ($kelasList as $key => $kelasItem) {
            $kelasItem->siswaCount = Assign_Kelas_Siswa_model::where('kelas_id', $kelasItem->id)->count();
        }

        $isi = 'admin/kelasIndex';
        $title = 'Daftar Kelas';
        $this->load->view('layouts/admin/wrapper', compact('title', 'isi', 'kelasList'));
    }

    public function createKelas()
    {
        $this->form_validation->set_rules(
            'txtNamaKelas',
            'Mata Pelajaran',
            'required',
            array(
                'required' => 'Pilih %s!',
            )
        );

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Data tidak lengkap');
            redirect('admin/kelas');
        }

        $kelas = new Kelas_model();
        $kelas->nama = $this->input->post('txtNamaKelas');
        if (!$kelas->save()) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data kelas');
            redirect('admin/kelas');
        }


        $this->session->set_flashdata('message', 'Berhasil membuat kelas baru!');
        redirect('admin/kelas');
    }

    public function updateKelas($idKelas)
    {
        $this->form_validation->set_rules(
            'txtNamaKelas',
            'Mata Pelajaran',
            'required',
            array(
                'required' => 'Pilih %s!',
            )
        );

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Data tidak lengkap');
            redirect('admin/kelas');
        }

        $kelas = Kelas_model::find($idKelas);
        if (!$kelas) {
            $this->session->set_flashdata('error', 'Kelas tidak ditemukan!');
            redirect('admin/kelas');
        }

        $kelas->nama = $this->input->post('txtNamaKelas');

        if (!$kelas->save()) {
            $this->session->set_flashdata('error', 'Gagal menghapus kelas!');
            redirect('admin/kelas');
        }

        $this->session->set_flashdata('message', 'Berhasil memperbarui kelas!');
        redirect('admin/kelas');
    }

    public function deleteKelas($idKelas)
    {
        $kelas = Kelas_model::find($idKelas);
        if (!$kelas) {
            $this->session->set_flashdata('error', 'Kelas tidak ditemukan!');
            redirect('admin/kelas');
        }

        if (!$kelas->delete()) {
            $this->session->set_flashdata('error', 'Gagal menghapus kelas!');
            redirect('admin/kelas');
        }

        $this->session->set_flashdata('message', 'Berhasil menghapus kelas!');
        redirect('admin/kelas');
    }
    // END OF KELAS SECTION


    // PENGUMUMAN SECTION
    public function pengumuman()
    {
        $isi = 'admin/pengumuman';
        $title = 'Pengumuman';

        $pengumumans = Pengumuman_model::orderBy('created_at', 'DESC')->get();
        foreach ($pengumumans as $key => $value) {
            $value->files = File_Pengumuman_model::where('pengumuman_id', $value->id)->get();
        }

        $this->load->view('layouts/admin/wrapper', compact('title', 'isi', 'pengumumans'));
    }

    public function createPengumuman()
    {
        $pengumuman = new Pengumuman_model();
        $pengumuman->author = $this->session->userdata('user')['id'];
        $pengumuman->judul = $this->input->post('judul');
        $pengumuman->deskripsi = $this->input->post('deskripsi');
        $pengumuman->save();

        if (!is_dir($this->filePengumumanPath)) {
            mkdir($this->filePengumumanPath, 0777, true);
        }

        if (!is_dir(FCPATH . './assetsAdmin/img/upload/pengumuman')) {
            mkdir(FCPATH . './assetsAdmin/img/upload/pengumuman', 0777, true);
        }

        // file
        if ($_FILES['filePengumuman']['name']) {
            $config['upload_path'] = $this->filePengumumanPath;
            $config['allowed_types'] = $this->filePengumumanAllowedTypes;
            $this->load->library('upload', $config);
            $config['file_name'] = $_FILES['filePengumuman']['name'];
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('filePengumuman')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/pengumuman');
            }
            $data = $this->upload->data();

            $file = new File_Pengumuman_model();
            $file->pengumuman_id = $pengumuman->id;
            $file->file_name = $data['file_name'];
            $file->display_name = $_FILES['filePengumuman']['name'];
            $file->save();
        }

        // banner
        if ($_FILES['banner']['name']) {
            $config['upload_path'] = $this->bannerPengumumanPath;
            $config['allowed_types'] = $this->bannerPengumumanAllowedTypes;
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $config['file_name'] = $_FILES['banner']['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('banner')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/pengumuman');
            }
            $data = $this->upload->data();
            $pengumuman->banner = $data['file_name'];
        }

        $pengumuman->save();
        $this->session->set_flashdata('message', 'Pengumuman berhasil ditambah');
        redirect('admin/pengumuman');
    }

    public function editPengumuman($id)
    {
        $this->load->library('upload');

        // pengumuman itself
        $pengumuman = Pengumuman_model::find($id);
        $pengumuman->judul = $this->input->post('judul');
        $pengumuman->deskripsi = $this->input->post('deskripsi');

        if ($_FILES['banner']['name'] != '') {
            $config['upload_path'] = $this->bannerPengumumanPath;
            $config['allowed_types'] = $this->bannerPengumumanAllowedTypes;
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $config['file_name'] = $_FILES['banner']['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('banner')) {
                $this->session->set_flashdata('error', 'Gagal!' . $this->upload->display_errors());
                redirect('admin/pengumuman');
                return;
            }
            if (file_exists(FCPATH . './assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner)) {
                unlink(FCPATH . './assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner);
            }
            $data = $this->upload->data();
            $pengumuman->banner = $data['file_name'];
        }

        if (!$pengumuman->save()) {
            $this->session->set_flashdata('error', 'Gagal mengubah pengumuman.');
            redirect('admin/pengumuman');
        }
        $this->session->set_flashdata('message', 'Pengumuman berhasil diubah');
        redirect('admin/pengumuman');
    }

    public function deletePengumuman($id)
    {
        $pengumuman = Pengumuman_model::find($id);
        $filePengumuman = File_Pengumuman_model::where('pengumuman_id', $id)->get();

        // delete all file pengumuman
        foreach ($filePengumuman as $file) {
            if (file_exists($this->filePengumumanPath . '/' . $file->file_name)) {
                unlink($this->filePengumumanPath . '/' . $file->file_name);
            }
            $file->delete();
        }
        if ($pengumuman->banner != '') {
            if (file_exists(FCPATH . './assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner)) {
                unlink(FCPATH . './assetsAdmin/img/upload/pengumuman/' . $pengumuman->banner);
            }
        }
        $pengumuman->delete();
        $this->session->set_flashdata('message', 'Pengumuman telah dihapus');
        redirect('admin/pengumuman');
    }
    // END OF PENGUMUMAN SECTION


    // FILE PENGUMUMAN SECTION
    public function addFilePengumuman()
    {
        $pengumumanId = $this->input->post('pengumuman_id');

        if ($_FILES['filePengumuman']['name']) {
            $config['upload_path'] = $this->filePengumumanPath;
            $config['allowed_types'] = $this->filePengumumanAllowedTypes;
            $this->load->library('upload', $config);
            $config['file_name'] = $_FILES['filePengumuman']['name'];
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('filePengumuman')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/pengumuman');
            }
            $data = $this->upload->data();

            $file = new File_Pengumuman_model();
            $file->pengumuman_id = $pengumumanId;
            $file->file_name = $data['file_name'];
            $file->display_name = $_FILES['filePengumuman']['name'];
            $file->save();
        } else

            $this->session->set_flashdata('message', 'File berhasil ditambahkan...');
        redirect('admin/pengumuman');
    }

    function deleteFilePengumuman($id)
    {
        $file = File_Pengumuman_model::find($id);
        // check file exist or not 
        if (!file_exists($this->filePengumumanPath . '/' . $file->file_name)) {
            $file->delete();
            $this->session->set_flashdata('message', 'File tidak ditemukan! Data telah dihapus!');
            redirect('admin/pengumuman');
        }

        // delete
        if (!unlink($this->filePengumumanPath . '/' . $file->file_name)) {
            $this->session->set_flashdata('error', 'File gagal dihapus!');
            redirect('admin/pengumuman');
        }

        $file->delete();
        $this->session->set_flashdata('error', 'File telah berhasil dihapus...');
        redirect('admin/pengumuman');
    }
    // END OF FILE PENGUMUMAN SECTION


    // Assign Kelas Siswa [start]
    public function assignKelasSiswa()
    {
        $classes = Kelas_model::all();
        $siswas = Assign_Kelas_Siswa_model::all();
        $idsiswas = [];
        foreach ($siswas as $siswa) {
            array_push($idsiswas, $siswa->siswa->id);
        }
        $data = [
            'title' => 'Tetapkan Kelas Siswa',
            'isi' => 'admin/aks/list',
            'classes' => $classes,
            'idsiswas' => $idsiswas
        ];

        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function insertAssignKelasSiswa()
    {
        $kelas_id = $this->input->post('kelas_id');
        $siswa_id = $this->input->post('siswa_id');

        if ($kelas_id != '' && $siswa_id != '') {
            $this->Assign_Kelas_Siswa_model->insert([
                'kelas_id' => $kelas_id,
                'siswa_id' => $siswa_id
            ]);
            $this->session->set_flashdata('message', 'Siswa berhasil di tambahkan');
            redirect('admin/assignKelasSiswa');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data, terjadi error');
            redirect('admin/assignKelasSiswa');
        }
    }

    public function deleteAKS($id)
    {
        $aks = Assign_Kelas_Siswa_model::find($id);
        $aks->delete();
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect('admin/assignKelasSiswa');
    }
    // Assign Kelas Siswa [end]


    // Assign Kelas Guru [start]
    public function assignKelasGuru()
    {
        $allkelas = Kelas_model::all();
        $data = [
            'title' => 'Tetapkan Kelas Guru',
            'isi' => 'admin/akg/list',
            'allkelas' => $allkelas
        ];

        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function insertAssignKelasGuru()
    {
        $kelas_id = $this->input->post('kelas_id');
        $guru_id = $this->input->post('guru_id');

        if ($kelas_id != '' && $guru_id != '') {
            $this->Assign_Kelas_Guru_model->insert([
                'kelas_id' => $kelas_id,
                'guru_id' => $guru_id
            ]);
            $this->session->set_flashdata('message', 'Guru berhasil di tambahkan');
            redirect('admin/assignKelasGuru');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data, terjadi error');
            redirect('admin/assignKelasGuru');
        }
    }

    public function deleteAKG($id)
    {
        // explode id to get kelas_id and guru_id
        $id = explode('-', $id);
        $guru_id = $id[0];
        $kelas_id = $id[1];
        // find AKG by kelas_id and guru_id
        $akg = Assign_Kelas_Guru_model::where('kelas_id', $kelas_id)->where('guru_id', $guru_id)->first();
        $amkId = $akg->assign_mapel_kelas_guru;
        if (count($amkId) != 0) {
            $amk = Assign_Mapel_Kelas_model::find($amkId[0]->assign_mapel_kelas_id);
            $amk->delete();
        }
        $akg->delete();
        $this->session->set_flashdata('message', 'Data berhasil dihapus');
        redirect('admin/assignKelasGuru');
    }
    // Assign Kelas Guru [end]



    // Assign Mapel Guru [start]
    public function assignMapelGuru()
    {
        $gurus = Guru_model::all();
        $data = [
            'title' => 'Tetapkan Mapel Guru',
            'isi' => 'admin/amkg/list',
            'gurus' => $gurus
        ];

        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function insertAssignMapelKelasGuru()
    {
        $mapel_id = $this->input->post('mapel_id');
        $kelas_id = $this->input->post('kelas_id');
        $assign_mapel_kelas_id = $this->Assign_Mapel_Kelas_model->insertGetId([
            'mapel_id' => $mapel_id,
            'kelas_id' => $kelas_id
        ]);
        $assign_kelas_guru_id = $this->input->post('assign_kelas_guru_id');
        $this->Assign_Mapel_Kelas_Guru_model->insert([
            'assign_mapel_kelas_id' => $assign_mapel_kelas_id,
            'assign_kelas_guru_id' => $assign_kelas_guru_id
        ]);
        $this->session->set_flashdata('message', 'Mapel berhasil di tambahkan');
        redirect('admin/assignmapelguru');
    }
    // Assign Mapel Guru [end]


    // NEW
    // KELAS-MAPEL SECTION
    public function assignMapelToKelas()
    {
        $kelasList = Kelas_model::all();
        $mapelList = Mapel_model::all();
        $guruList = Guru_model::all();

        $data = [
            'title' => 'Mata Pelajaran Kelas',
            'isi' => 'admin/assignMapelToKelas/list',
            'guruList' => $guruList,
            'kelasList' => $kelasList,
            'mapelList' => $mapelList
        ];
        // kelas        -> assignmapelkelas 
        // $kelasList[0]-> mapelList[0]->id 

        $this->load->view('layouts/admin/wrapper', $data);
    }

    public function addMapelToKelas()
    {
        $this->form_validation->set_rules(
            'optGuru',
            'Guru',
            'required',
            array(
                'required' => 'Pilih %s!',
            )
        );

        $this->form_validation->set_rules(
            'optMapel',
            'Mata Pelajaran',
            'required',
            array(
                'required' => 'Pilih %s!',
            )
        );

        if (!$this->form_validation->run()) {
            $msg = $this->form_validation->error_string();
            $this->session->set_flashdata('error', $msg ? $msg : 'Anda memilih data yang salah');
            redirect('admin/assignMapelToKelas');
        }

        $msg = null;
        $idKelas = $this->input->post('idKelas');
        $idMapel = $this->input->post('optMapel');
        $idGuru = $this->input->post('optGuru');

        $mapelKelas = Assign_Mapel_Kelas_model::where('kelas_id', $idKelas)
            ->where('mapel_id', $idMapel)
            ->first();

        if ($mapelKelas) {
            // if this pair has been available
            $msg = 'Mapel '
                . $mapelKelas->mapel->nama
                . ' untuk '
                . $mapelKelas->kelas->nama
                . ' sudah ada!';

            $this->session->set_flashdata('error', $msg ? $msg : 'Kelas sudah ada!');
            redirect('admin/assignMapelToKelas');
        }

        $newMapelKelas = new Assign_Mapel_Kelas_model();
        $newMapelKelas->kelas_id = $idKelas;
        $newMapelKelas->mapel_id = $idMapel;
        $newMapelKelas->guru_id = $idGuru;

        if (!$newMapelKelas->save()) {
            $this->session->set_flashdata('error', $msg ? $msg : 'Gagal menambahkan mapel');
            redirect('admin/assignMapelToKelas');
        }

        $this->session->set_flashdata('message', $msg ? $msg : 'Berhasil menambahkan kelas');
        redirect('admin/assignMapelToKelas');
    }

    public function editAssignedMapel($id)
    {
        $msg = "";
        $this->form_validation->set_rules(
            'optGuru',
            'Guru',
            'required',
            array(
                'required' => 'Pilih %s!',
            )
        );

        if (!$this->form_validation->run()) {
            $msg = $this->form_validation->error_string();
            $this->session->set_flashdata('error', $msg ? $msg : 'Pilih guru pengganti!');
            redirect('admin/assignMapelToKelas');
        }
        $optGuru = $this->input->post('optGuru');
        $guru = Guru_model::find($optGuru);
        if (!$guru) {
            $this->session->set_flashdata('error', $msg ? $msg : 'Guru tidak valid!');
            redirect('admin/assignMapelToKelas');
        }

        $course = Assign_Mapel_Kelas_model::find($id);
        if (!$course) {
            $this->session->set_flashdata('error', $msg ? $msg : 'Course tidak ditemukan!');
            redirect('admin/assignMapelToKelas');
        }
        $course->guru_id = $guru->id;

        if (!$course->save()) {
            $this->session->set_flashdata('error', $msg ? $msg : 'Gagal memperbarui data course!');
            redirect('admin/assignMapelToKelas');
        }

        $msg = 'Berhasil mengganti guru untuk mapel '
            . $course->mapel->nama
            . ' pada '
            . $course->kelas->nama;
        $this->session->set_flashdata('message', $msg ? $msg : '');
        redirect('admin/assignMapelToKelas');
    }

    public function deleteAssignedMapel($id)
    {
        $assignedMapel = Assign_Mapel_Kelas_model::find($id);
        if (!$assignedMapel) {
            $this->session->set_flashdata('error', 'Course tidak ditemukan!');
            redirect('admin/assignMapelToKelas');
        }

        if (!$assignedMapel->delete()) {
            $this->session->set_flashdata('error', 'Gagal menghapus course!');
            redirect('admin/assignMapelToKelas');
        }

        $this->session->set_flashdata('message', 'Berhasil menghapus course!');
        redirect('admin/assignMapelToKelas');
    }
    // END OF NEW


    // GENERALS
    public function sejarah()
    {
        $this->load->model('Sejarah_sekolah_model');
        $sejarahs = Sejarah_sekolah_model::all();
        $title = 'sejarah sekolah';
        $isi = 'admin/sejarah';
        $this->load->view('layouts/admin/wrapper', compact('title', 'isi', 'sejarahs'));
    }

    public function updateSejarah($id)
    {
        $this->load->model('Sejarah_sekolah_model');
        $newJudul = $this->input->post('txtJudul');
        $newIsi = $this->input->post('txtIsi');

        $sejarah = Sejarah_sekolah_model::find($id);
        if (!$sejarah) {
            $this->session->set_flashdata('message', 'Error');
            redirect('/admin/sejarah');
        }

        $sejarah->judul = $newJudul;
        $sejarah->isi = $newIsi;

        if (!$sejarah->save()) {
            $this->session->set_flashdata('error', 'Error');
            redirect('/admin/sejarah');
        }

        $this->session->set_flashdata('message', 'Berhasil memperbarui sejarah!');
        redirect('/admin/sejarah');
    }

    public function viewSejarah($id)
    {
        $this->load->model('Sejarah_sekolah_model');
        $sejarah = Sejarah_sekolah_model::find($id);

        if (!$sejarah) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin/sejarah');
        }

        $title = 'Sejarah Sekolah';
        $isi = 'viewSejarah';
        $this->load->view('layouts/admin/wrapper', compact('title', 'isi', 'sejarah'));
    }

    public function visimisi()
    {
        $this->load->model('Visimisi_sekolah_model');

        $visimisis = Visimisi_sekolah_model::all();
        $title = 'sejarah sekolah';
        $isi = 'admin/visimisi';
        $this->load->view('layouts/admin/wrapper', compact('title', 'isi', 'visimisis'));
    }

    public function updateVisiMisi($id)
    {
        $this->load->model('Visimisi_sekolah_model');

        $newJudul = $this->input->post('txtJudul');
        $newIsi = $this->input->post('txtIsi');

        $visiMisi = Visimisi_sekolah_model::find($id);
        if (!$visiMisi) {
            $this->session->set_flashdata('error', 'Error!');
            redirect('admin/visimisi');
        }

        $visiMisi->judul = $newJudul;
        $visiMisi->isi = $newIsi;

        if (!$visiMisi->save()) {
            $this->session->set_flashdata('error', 'Gagal memperbarui visi misi.');
            redirect('admin/visimisi');
        }

        $this->session->set_flashdata('message', 'Berhasil memperbarui visi misi.');
        redirect('admin/visimisi');
    }

    public function viewVisiMisi($id)
    {
        $this->load->model('Visimisi_sekolah_model');

        $visiMisi = Visimisi_sekolah_model::find($id);
        if (!$visiMisi) {
            $this->session->set_flashdata('error', 'Error!');
            redirect('admin/visimisi');
        }

        $title = $visiMisi->judul;
        $isi = 'viewVisimisi';
        $this->load->view('layouts/admin/wrapper', compact('title', 'isi', 'visiMisi'));
    }
}
