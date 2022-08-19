<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        handle(Constant::USER_ROLE_GURU, current_url());
        $this->load->model('Assign_Kelas_Guru_model');
        $this->load->model('Assign_Mapel_Kelas_model');
        $this->load->model('Assign_Mapel_Kelas_Guru_Bab_model');
        $this->load->model('Assign_Mapel_Kelas_Guru_model');
        $this->load->model('Assign_Mapel_Kelas_model');
        $this->load->model('Bab_model');
        $this->load->model('File_Pengumuman_model');
        $this->load->model('Guru_model');
        $this->load->model('Kelas_model');
        $this->load->model('Mapel_model');
        $this->load->model('Materi_model');
        $this->load->model('Materi_Tugas_model');
        $this->load->model('Materi_Tugas_Submit_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Siswa_model');
        $this->load->model('Course_Bab_model');

        $this->materiUploadPath = FCPATH . 'assetsAdmin/img/upload/modul/';
        $this->materiUploadallowedTypes = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp|zip|rar';

        $this->bannerUploadPath = 'assetsAdmin/img/upload/modul/';
        $this->bannerUploadAllowedTypes = 'gif|jpg|png|jpeg';
    }

    public function index()
    {
        $title = 'Beranda';
        $siswa = $this->Siswa_model->all();
        $guru = $this->Guru_model->all();
        $kelas = $this->Kelas_model->all();
        $materi = $this->Materi_model->all();
        $this->load->view(
            'layouts/guru/wrapper',
            compact(
                'title',
                'siswa',
                'guru',
                'kelas',
                'materi'
            )
        );
    }

    // KELAS SECTION
    public function kelas()
    {
        $myGuruId = $this->session->userdata('user')['id'];
        $myKelasList = Kelas_model::all();

        $title = 'Kelas Saya';
        $isi = 'guru/kelas';
        $this->load->view(
            'layouts/guru/wrapper',
            compact(
                'title',
                'isi',
                'myKelasList',
                'myGuruId'
            )
        );
    }
    // END OF KELAS SECTION


    // MAPEL SECTION
    public function kelasMapel($kelasId)
    {
        $myGuruId = $this->session->userdata('user')['id'];

        $currentKelas = Kelas_model::find($kelasId);
        $myMapelOfClassList =  $currentKelas->getMapelsOfGuru($myGuruId);

        $title = 'Kelas Saya';
        $isi = 'guru/assign_mapel_kelas';
        $this->load->view(
            'layouts/guru/wrapper',
            compact(
                'title',
                'isi',
                'myMapelOfClassList',
                'currentKelas',
            )
        );
    }
    // END OF MAPEL SECTION


    // BAB SECTION
    // public function mapelBab($kelasMapelId)
    // {
    //     $myGuruId = $this->session->userdata('user')['id'];
    //     $currentKelasMapel = Assign_Mapel_Kelas_model::find($kelasMapelId);
    //     $babList = Course_Bab_model::where('course_id', $kelasMapelId)->get();

    //     $this->session->set_userdata('currentCourseId', $currentKelasMapel->id);
    //     $title = 'Kelas Saya';
    //     $isi = 'guru/assign_mapel_bab';

    //     $this->load->view(
    //         'layouts/guru/wrapper',
    //         compact(
    //             'title',
    //             'isi',
    //             'currentKelasMapel',
    //             'babList',
    //         )
    //     );
    // }

    // public function tambahBab($courseId)
    // {
    //     $txtNamaBab = $this->input->get('txtNamaBab');

    //     $newBab = new Course_Bab_model();
    //     $newBab->name = $txtNamaBab;
    //     $newBab->course_id = $courseId;
    //     if (!$newBab->save()) {
    //         $this->session->set_flashdata('error', 'Gagal membuat bab baru');
    //         redirect('guru/mapelBab/' . $this->session->userdata('currentCourseId'));
    //     }

    //     $this->session->set_flashdata('message', 'Berhasil Menambah Bab...');
    //     redirect('guru/mapelBab/' . $this->session->userdata('currentCourseId'));
    // }

    // public function deleteBab($babId)
    // {
    //     $bab = Course_Bab_model::find($babId);

    //     if (!$bab) {
    //         $this->session->set_flashdata('error', 'Bab tidak ditemukan');
    //         redirect('guru/mapelBab/' . $this->session->userdata('currentCourseId'));
    //     }

    //     if (!$bab->delete()) {
    //         $this->session->set_flashdata('error', 'Gagal menghapus bab');
    //         redirect('guru/mapelBab/' . $this->session->userdata('currentCourseId'));
    //     }

    //     $this->session->set_flashdata('message', 'Berhasil Menghapus Bab...');
    //     redirect('guru/mapelBab/' . $this->session->userdata('currentCourseId'));
    // }
    // END OF BAB SECTION


    // MATERI SECTION
    public function myCourseMateri($courseId)
    {
        $this->session->set_userdata('currentCourseId', $courseId);

        $currentCourse = Assign_Mapel_Kelas_model::find($courseId);
        $materiList = Materi_model::where('course_id', $courseId)->get();

        $title = 'Kelas Saya';
        $isi = 'guru/materi';

        $this->load->view(
            'layouts/guru/wrapper',
            compact(
                'title',
                'isi',
                'materiList',
                'currentCourse',
            )
        );
    }

    public function createMateri()
    {
        $newMateri = new Materi_model();
        $newMateri->course_id = $this->session->userData('currentCourseId');
        $newMateri->judul = $this->input->post('txtJudul');
        $newMateri->link = $this->input->post('txtLink');
        $newMateri->deskripsi = $this->input->post('txtDeskripsi');
        $newMateri->assign_mapel_kelas = '0';

        $newMateri->banner = '';
        $newMateri->nama_file = '';

        if (!is_dir($this->materiUploadPath)) {
            mkdir($this->materiUploadPath, 0777, true);
        }

        if (!is_dir($this->bannerUploadPath)) {
            mkdir($this->bannerUploadPath, 0777, true);
        }

        // materi file
        if (!empty($_FILES['fileMateri']['name'])) {
            $config['upload_path'] = $this->materiUploadPath;
            $config['allowed_types'] = $this->materiUploadallowedTypes;
            $this->load->library('upload', $config);

            $config['max_size'] = '50000';
            $config['file_name'] = $_FILES['fileMateri']['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('fileMateri')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
            }
            $data = $this->upload->data();

            $newMateri->nama_file = $data['file_name'];
        }

        // banner file
        if (!empty($_FILES['banner']['name'])) {
            $config['upload_path'] = $this->bannerUploadPath;
            $config['allowed_types'] = $this->bannerUploadAllowedTypes;
            $this->load->library('upload', $config);

            $config['max_size'] = '50000';
            $config['file_name'] = $_FILES['banner']['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('banner')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
            }
            $data = $this->upload->data();

            $newMateri->banner = $data['file_name'];
        }

        $newMateri->save();
        $this->session->set_flashdata('message', 'Berhasil Menambah Materi...');
        redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
    }

    public function updateMateri($id)
    {
        $materi = Materi_model::find($id);
        $materi->judul = $this->input->post('txtJudul');
        $materi->deskripsi = $this->input->post('txtDeskripsi');
        $materi->link = $this->input->post('txtLink');

        if (!empty($_FILES['file']['name'])) {
            $config['upload_path'] = $this->$this->materiUploadPath;
            $config['allowed_types'] = $this->materiUploadallowedTypes;
            $config['max_size'] = '50000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', 'Error mengunggah file!');
                redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
            }

            if (file_exists($this->$this->materiUploadPath . '/' . $materi->nama_file)) {
                unlink($this->$this->materiUploadPath . '/' . $materi->nama_file);
            }
            $data = $this->upload->data();
            $materi->nama_file = $data['file_name'];
        }
        // banner
        if (!empty($_FILES['banner']['name'])) {
            $config['upload_path'] = $this->bannerUploadPath;
            $config['allowed_types'] = $this->bannerUploadAllowedTypes;
            $config['max_size'] = '5000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('banner')) {
                var_dump($this->upload->display_errors());
                return;
                $this->session->set_flashdata('error', 'Error mengunggah gambar!');
                redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
            }

            if ($materi->banner != '') {
                if (file_exists($this->bannerUploadPath . '/' . $materi->banner)) {
                    unlink($this->bannerUploadPath . '/' . $materi->banner);
                }
            }
            $data = $this->upload->data();
            $materi->banner = $data['file_name'];
        }

        $materi->save();

        $this->session->set_flashdata('message', 'Berhasil Mengubah Materi...');
        redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
    }

    public function deleteMateri($id)
    {
        $materi = Materi_model::find($id);
        if (!$materi) {
            $this->session->set_flashdata('error', 'Materi tidak ditemukan!');
            redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
        }
        if (!empty($materi->nama_file)) {
            unlink(FCPATH . 'assetsAdmin/img/upload/modul/' . $materi->nama_file);
        }
        if (!empty($materi->banner)) {
            unlink(FCPATH . 'assetsAdmin/img/upload/modul/' . $materi->banner);
        }
        $materi->delete();
        $this->session->set_flashdata('message', 'Berhasil Menghapus Materi...');
        redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
    }
    // END OF MATERI SECTION


    // PENGUMPULAN TUGAS SECTION
    public function pengumpulan_tugas($tugasId)
    {
        $cur_kelasNama = $this->session->userdata('cur_kelasNama');
        $cur_idAkgs = $this->session->userdata('cur_idAkgs');

        $cur_mapelName = $this->session->userdata('cur_mapelName');
        $cur_idAmkg = $this->session->userdata('cur_idAmkg');

        $cur_babName = $this->session->userdata('cur_babName');
        $cur_idAmkgb = $this->session->userdata('cur_idAmkgb');

        $mts = Materi_Tugas_model::find($tugasId);
        if (!$mts) {
            $this->session->set_flashdata('error', 'Tugas tidak ditemukan');
            redirect('guru/kelas');
        }
        $materiName = $mts->materi->judul;
        $folderName = explode(' ', $materiName);
        $folderNameMateri = "";
        foreach ($folderName as $value) {
            $folderNameMateri .= $value[0];
        }
        $folderNameMateri = strtoupper($folderNameMateri);

        $tugas = $mts;
        $tugasPath = "";
        if ($tugas) {
            $submitTugas = $this->Siswa_model->submission($tugas->id, $this->session->userdata('user')['id']);
            $kelasName = $tugas->materi->course->kelas->nama;
            $mapelName = $tugas->materi->course->mapel->nama;
            $materiName = $tugas->materi->judul;

            $tugasPath = 'assets/guru/tugas/tugas_siswa/'
                . $kelasName . '/'
                . $mapelName . '/'
                . $materiName . '/';
            $tugasPath = $this->formatText($tugasPath);
        }

        $title = 'Kelas Saya';
        $isi = 'guru/pengumpulan_tugas';
        $mtss = Materi_Tugas_Submit_model::where('materi_tugas_id', $tugasId)->get();
        $this->load->view(
            'layouts/guru/wrapper',
            compact(
                'title',
                'isi',
                'mtss',
                'tugasId',
                'cur_idAmkg',
                'cur_idAkgs',
                'cur_idAmkgb',
                'cur_kelasNama',
                'cur_mapelName',
                'cur_babName',
                'materiName',
                'folderNameMateri',
                'tugasPath'
            )
        );
    }

    public function downloadPengumpulan($tugasId)
    {
        $tugas = Materi_Tugas_model::find($tugasId);

        if (!$tugas) {
            $this->session->set_flashdata('error', 'Tugas tidak ditemukan');
            redirect('guru/kelas/' . $tugasId);
        }

        $tugasPath = "";
        $submitTugas = $this->Siswa_model->submission($tugas->id, $this->session->userdata('user')['id']);
        $kelasName = $tugas->materi->course->kelas->nama;
        $mapelName = $tugas->materi->course->mapel->nama;
        $materiName = $tugas->materi->judul;

        $tugasPath = 'assets/guru/tugas/tugas_siswa/'
            . $kelasName . '/'
            . $mapelName . '/'
            . $materiName . '/';
        $tugasPath = $this->formatText($tugasPath);
        $folderName = "Tugas " . $mapelName . " " . $kelasName . " - " . $materiName . "";
        $destFolderPath = FCPATH . $folderName;

        if (!is_dir($destFolderPath)) {
            mkdir($destFolderPath, 0777, true);
        }

        $submissionList = $tugas->materi_tugas_submit;

        foreach ($submissionList as $s => $submission) {
            $pathPart = pathinfo($tugasPath . $submission->nama_file);
            copy($tugasPath . $submission->nama_file, $destFolderPath . '/' . $submission->siswa->nama . '.' . $pathPart['extension']);
            # code...
        }

        $this->load->helper('url');
        $this->load->library('zip');

        $this->zip->read_dir($folderName);
        $this->rrmdir($folderName);
        $filename = "Tugas " . $mapelName . " " . $kelasName . " - " . $materiName . ".zip";
        $this->zip->download($filename);
    }
    // END OF PENGUMPULAN TUGAS SECTION

    public function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir")
                        $this->rrmdir($dir . "/" . $object);
                    else unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    // TUGAS SECTION
    public function createTugas($materiId)
    {
        $materiTugas = new Materi_tugas_model();
        $materiTugas->materi_id = $materiId;
        $materiTugas->deadline_1 = $this->input->post('deadline1');
        if ($this->input->post('deadline2') != null) {
            $materiTugas->deadline_2 = $this->input->post('deadline2');
        }

        // check banner post file exist or not
        $config['upload_path'] = FCPATH . 'assetsAdmin/img/upload/modul/tugas/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp|zip|rar';
        $config['max_size'] = '50000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('message', $this->upload->display_errors());
            redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
        }
        $file_upload = array('uploads' => $this->upload->data());
        $fileName = $file_upload['uploads']['file_name'];

        $materiTugas->nama_file = $fileName;
        $materiTugas->save();
        $this->session->set_flashdata('message', 'Berhasil Mengupload Tugas...');
        redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
    }

    public function updateMateriTugas($id)
    {
        $materiTugas = Materi_Tugas_model::find($id);
        if (!empty($_FILES['file']['name'])) {
            $file = $materiTugas->nama_file;
            if (file_exists(FCPATH . 'assetsAdmin/img/upload/modul/tugas/' . $file)) {
                unlink(FCPATH . 'assetsAdmin/img/upload/modul/tugas/' . $file);
            }
            $config['upload_path'] = FCPATH . 'assetsAdmin/img/upload/modul/tugas/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp|zip|rar';
            $config['max_size'] = '50000';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file');
            $file_upload = array('uploads' => $this->upload->data());
            $fileName = $file_upload['uploads']['file_name'];
            $materiTugas->nama_file = $fileName;
        }
        $materiTugas->deadline_1 = $this->input->post('deadline1');
        if ($this->input->post('deadline2') != null) {
            $materiTugas->deadline_2 = $this->input->post('deadline2');
        }
        $materiTugas->save();
        $this->session->set_flashdata('message', 'Berhasil Mengubah Tugas...');
        redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
    }

    public function deleteMateriTugas($id)
    {
        $materiTugas = Materi_Tugas_model::find($id);
        if (!empty($materiTugas->nama_file)) {
            unlink(FCPATH . 'assetsAdmin/img/upload/modul/tugas/' . $materiTugas->nama_file);
        }
        $materiTugas->delete();
        $this->session->set_flashdata('message', 'Berhasil Menghapus Tugas...');
        redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
    }
    // END OF TUGAS SECTION


    // PENGUMUMAN SECTION
    public function pengumuman()
    {
        $title = 'Pengumuman';
        $isi = 'guru/pengumuman';
        $pengumumanList = Pengumuman_model::orderBy('created_at', 'DESC')->get();
        $this->load->view('layouts/guru/wrapper', compact('title', 'isi', 'pengumumanList'));
    }
    // END OF PENGUMUMAN


    public function hapusBeberapaMateri()
    {
        // load checkbox form
        print_r(count($this->input->post('materi[]')));
        if (count($this->input->post('materi[]')) > 0) {
            foreach ($this->input->post('materi[]') as $id) {
                $materi = Materi_model::find($id);
                if (!empty($materi->nama_file)) {
                    unlink(FCPATH . 'assetsAdmin/img/upload/modul/' . $materi->nama_file);
                }
                if (!empty($materi->banner)) {
                    unlink(FCPATH . 'assetsAdmin/img/upload/modul/' . $materi->banner);
                }
                $materi->delete();
            }
            $this->session->set_flashdata('message', 'Berhasil Menghapus Materi...');
            redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
        } else {
            $this->session->set_flashdata('message', 'Tidak Ada Materi Yang Dipilih');
            redirect('guru/myCourseMateri/' . $this->session->userdata('currentCourseId'));
        }
        die;
    }

    // INFORMASI SECTION
    public function sejarah()
    {
        $this->load->model('Sejarah_sekolah_model');
        $sejarah = Sejarah_sekolah_model::first();

        if (!$sejarah) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('guru');
        }

        $title = 'Sejarah Sekolah';
        $isi = 'viewSejarah';
        $this->load->view('layouts/guru/wrapper', compact('title', 'isi', 'sejarah'));
    }

    public function visimisi()
    {
        $this->load->model('Visimisi_sekolah_model');
        $visiMisi = Visimisi_sekolah_model::first();

        if (!$visiMisi) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('guru');
        }

        $title = 'Visi Misi Sekolah';
        $isi = 'viewVisimisi';
        $this->load->view('layouts/guru/wrapper', compact('title', 'isi', 'visiMisi'));
    }
    // END OF INFORMASI SECTION


    public static function formatText($text)
    {
        $text = strtolower($text);
        return str_replace(' ', '_', $text);
    }
}
