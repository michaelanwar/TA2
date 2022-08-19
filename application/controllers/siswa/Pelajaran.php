<?php

use Illuminate\Support\Debug\Dumper;

defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $currentUrl = current_url();
        handle(Constant::USER_ROLE_SISWA, $currentUrl);
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Mapel_model');
        $this->load->model('Guru_model');
        $this->load->model('Kelas_model');
        $this->load->model('Assign_Mapel_Kelas_model');
        $this->load->model('Assign_Mapel_Kelas_Guru_model');
        $this->load->model('Assign_Mapel_Kelas_Guru_Bab_model');
        $this->load->model('Assign_Kelas_Guru_model');
        $this->load->model('Assign_Kelas_Siswa_model');
        $this->load->model('Bab_model');
        $this->load->model('Materi_model');
        $this->load->model('Materi_Tugas_model');
        $this->load->model('Materi_Tugas_Submit_model');
        $this->load->model('Course_Bab_model');
        $this->load->model('Siswa_model');
    }

    public function index()
    {
        $myKelasId = $this->session->userdata('user')['class']['kelas_id'];
        $mapelList = Assign_Mapel_Kelas_model::where('kelas_id', $myKelasId)->get();
        if (!$mapelList) {
            redirect('siswa/home');
        }

        $mapels = $this->Assign_Mapel_Kelas_model->where('kelas_id', $this->session->userdata('user')['class']['kelas_id'])->get();
        $data = [
            'title' => 'Pelajaran',
            'content' => 'layouts/user/pelajaran/list',
            'mapels' => $mapels,
            'mapelList' => $mapelList
        ];

        $this->load->view('layouts/user/wrapper', $data);
    }

    public function detail($courseId)
    {
        $course = Assign_Mapel_Kelas_model::find($courseId);
        if (!$course) {
            redirect('siswa/home');
        }
        $this->session->set_userdata('currentCourseId', $courseId);

        $data = [
            'title' => 'Pelajaran - Detail',
            'content' => 'layouts/user/pelajaran/detail',
            'course' => $course,
        ];

        $this->load->view('layouts/user/wrapper', $data);
    }

    public function materi($materiId)
    {
        $currentCourseId = $this->session->userdata('currentCourseId');
        $materi = Materi_model::find($materiId);
        if (!$materi) {
            redirect('siswa/pelajaran/detail/' . $currentCourseId);
        }

        $currentCourse = $materi->course;
        $tugas = $materi->materi_tugas->first();
        $submitTugas = null;
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

        $data = [
            'title' => 'Pelajaran - Materi',
            'content' => 'layouts/user/pelajaran/materi',
            'currentCourse' => $currentCourse,
            'materi' => $materi,
            'tugas' => $tugas,
            'submitTugas' => $submitTugas,
            'tugasPath' => $tugasPath
        ];
        $this->load->view('layouts/user/wrapper', $data);
    }

    public function kirimTugas()
    {
        $materi_tugas_id = $this->input->post('materiTugasId');
        $materi_tugas = $this->Materi_Tugas_model->find($materi_tugas_id);
        $endDeadline1 = $materi_tugas->deadline_1;
        $endDeadline2 = $materi_tugas->deadline_2;
        $now = date('Y-m-d H:i:s');
        $distanceDeadline1 = strtotime($endDeadline1) - strtotime($now);
        $distanceDeadline2 = strtotime($endDeadline2) - strtotime($now);
        if ($distanceDeadline2 < 0) {
            $this->session->set_flashdata('warning', 'Maaf tugas sudah tidak bisa dikumpulkan lagi');
            $next = $this->session->userdata('next');
            redirect($next);
        }

        $tugas = Materi_Tugas_model::find($materi_tugas_id);
        if (!$tugas) {
            echo "tugas not found";
            return;
        }

        // PATH
        $tugas = $materi_tugas;
        $kelasName = $tugas->materi->course->kelas->nama;
        $mapelName = $tugas->materi->course->mapel->nama;
        $materiName = $tugas->materi->judul;

        $tugasPath = 'assets/guru/tugas/tugas_siswa/'
            . $kelasName . '/'
            . $mapelName . '/'
            . $materiName . '/';
        $tugasPath = $this->formatText($tugasPath);
        $tugasPath = FCPATH . $tugasPath;

        if (!file_exists($tugasPath)) {
            mkdir($tugasPath, 0777, true);
        }

        if (empty($_FILES['nama_file']['name'])) {
            $this->session->set_flashdata('message', 'Gagal mengumpulkan tugas, tidak ada file');
            redirect('siswa/pelajaran/materi/' . $tugas->materi->id);
        }

        $config['upload_path'] = $tugasPath;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp';
        $config['max_size'] = '50000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('nama_file')) {
            $this->session->set_flashdata('message', 'Gagal mengumpulkan tugas');
            redirect('siswa/pelajaran/materi/' . $tugas->materi->id);
        }
        $data =  $this->upload->data();
        $fileName = $data['file_name'];
        $this->Materi_Tugas_Submit_model->insert([
            'materi_tugas_id' => $materi_tugas_id,
            'siswa_id' => $this->session->userdata('user')['id'],
            'nama_file' => $fileName
        ]);
        $this->session->set_flashdata('message', 'Tugas berhasil di kumpulkan');
        $next = $this->session->userdata('next');
        redirect($next);
    }

    public function updatetugas($materi_tugas_submit_id)
    {
        $submission = Materi_Tugas_Submit_model::find($materi_tugas_submit_id);

        $materi_tugas = $this->Materi_Tugas_model->find($submission->materi_tugas_id);

        $endDeadline1 = $materi_tugas->deadline_1;
        $endDeadline2 = $materi_tugas->deadline_2;
        $now = date('Y-m-d H:i:s');
        $distanceDeadline1 = strtotime($endDeadline1) - strtotime($now);
        $distanceDeadline2 = strtotime($endDeadline2) - strtotime($now);

        if ($distanceDeadline2 < 0) {
            $this->session->set_flashdata('warning', 'Maaf tugas sudah tidak bisa dikumpulkan lagi');
            $next = $this->session->userdata('next');
            redirect($next);
        }

        // PATH
        $tmpTugas = $materi_tugas;
        $kelasName = $tmpTugas->materi->course->kelas->nama;
        $mapelName = $tmpTugas->materi->course->mapel->nama;
        $materiName = $tmpTugas->materi->judul;

        $tugasPath = 'assets/guru/tugas/tugas_siswa/'
            . $kelasName . '/'
            . $mapelName . '/'
            . $materiName . '/';
        $tugasPath = $this->formatText($tugasPath);

        $tugasPath = FCPATH . $tugasPath;

        if (!file_exists($tugasPath)) {
            mkdir($tugasPath, 0777, true);
        }

        if (file_exists($tugasPath . '/' . $submission->nama_file)) {
            unlink($tugasPath . '/' . $submission->nama_file);
        }

        if (empty($_FILES['nama_file']['name'])) {
            $this->session->set_flashdata('message', 'Gagal mengumpulkan tugas, tidak ada file');
            redirect('siswa/pelajaran/materi/' . $materi_tugas->materi->id);
        }


        $config['upload_path'] = $tugasPath;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|ppt|pptx|xls|xlsx|zip|rar|mp4|3gp|mp3|wav|txt|csv|odt|ods|odp';
        $config['max_size'] = '50000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('nama_file')) {
            $this->session->set_flashdata('error', 'Gagal mengupload file');
            redirect('siswa/pelajaran/materi' . $materi_tugas->materi->id);
        }
        $data = $this->upload->data();
        $fileName = $data['file_name'];
        $submission->nama_file = $fileName;
        
        // update $tugas->updated_at with current time asia/jakarta
        $submission->updated_at = date('Y-m-d H:i:s');

        $submission->save();
        $this->session->set_flashdata('message', 'Tugas berhasil di ubah');
        $next = $this->session->userdata('next');
        redirect($next);
    }

    public static function formatText($text)
    {
        $text = strtolower($text);
        return str_replace(' ', '_', $text);
    }
}
