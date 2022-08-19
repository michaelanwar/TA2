<?php

defined('BASEPATH') or exit('No direct script access allowed');





class Auth extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        // load library authenticateusers

        $this->load->library(['Authenticateusers', 'Registerusers']);

        // load model

        $this->load->model('Assign_Kelas_Siswa_model');

        $this->load->model('Assign_Mapel_Kelas_model');

        $this->load->model('Assign_Mapel_Kelas_Guru_model');

        $this->load->model('Assign_Kelas_Guru_model');

        $this->load->model('Guru_model');

        $this->load->model('Kelas_model');

        $this->load->model('User_model');

        // $_SESSION['nama'] = 'Rizki';

    }



    public function index()

    {

        $title = '';

        $this->form_validation->set_rules(

            'email',

            'Email',

            'required|trim|valid_email|max_length[50]',

            array(

                'required' => '%s tidak boleh kosong',

                'valid_email' => '%s tidak valid, Contoh: amel@gmail.com',

                'max_length' => '%s tidak boleh lebih dari 50 karakter',

            )

        );



        $this->form_validation->set_rules(

            'password',

            'Kata Sandi',

            'required|trim|min_length[6]|max_length[20]',

            array(

                'required' => '%s tidak boleh kosong',

                'min_length' => '%s minimal 6 karakter',

                'max_length' => '%s tidak boleh lebih dari 20 karakter',

            )

        );

        if ($this->form_validation->run()) {



            $email = strip_tags($this->input->post('email'));

            $password = strip_tags($this->input->post('password'));

            $this->authenticateusers->login($email, $password);
        }

        $title = 'Login';

        $this->load->view('layouts/auth/header', compact('title'));

        $this->load->view('auth/login');

        $this->load->view('layouts/auth/footer');
    }



    public function check()

    {

        $userdata = $this->session->userdata('user');

        if (!empty($userdata)) {

            echo json_encode(array('status' => 'success', 'data' => $userdata));
        } else {

            echo json_encode(array('status' => 'failed'));
        }
    }



    public function helper()
    {

        // $mapelKelas = $this->Assign_Mapel_Kelas_model->where('kelas_id', $this->session->userdata('user')[0]['class']['kelas_id'])->get();

        $this->load->model('Mapel_model');

        $kelas_id = 2;

        $curAMK =  Assign_Mapel_Kelas_model::where('kelas_id', $kelas_id)->get();

        $mapel_ids = [];

        foreach ($curAMK as $amk) {

            $mapel_ids[] = $amk->mapel->id;
        }

        $mapelKelas =  Mapel_model::whereNotIn('id', $mapel_ids)->get();

        if (!empty($mapelKelas)) {

            echo '<pre>';

            foreach ($mapelKelas as $key => $value) {

                echo $value->nama . '<br>';
            }

            echo "</pre>";

            // echo json_encode(array('status' => 'success', 'data' => $mapelKelas));

        } else {

            echo json_encode(array('status' => 'failed'));
        }
    }



    public function register()

    {

        $this->form_validation->set_rules(

            'nama',

            'Nama',

            'required|trim|max_length[50]',

            array(

                'required' => '%s tidak boleh kosong',

                'max_length' => '%s tidak boleh lebih dari 50 karakter',

            )

        );



        $this->form_validation->set_rules(

            'email',

            'Email',

            'required|trim|valid_email|is_unique[user.email]|max_length[50]',

            array(

                'required' => '%s tidak boleh kosong',

                'is_unique' => '%s sudah digunakan',

                'valid_email' => '%s tidak valid, Contoh: amel@gmail.com',

                'max_length'  => '%s tidak boleh lebih dari 50 karakter',

            )

        );



        $this->form_validation->set_rules(

            'password',

            'Kata Sandi',

            'required|trim|min_length[6]|max_length[20]',

            array(

                'required'    => '%s tidak boleh kosong',

                'min_length' => '%s minimal 6 karakter',

                'max_length' => '%s tidak boleh lebih dari 20 karakter',

            )

        );



        if ($this->form_validation->run()) {

            $data = array(

                'nama' => $this->input->post('nama'),

                'email' => $this->input->post('email'),

                'password' => $this->input->post('password'),

            );

            $this->registerusers->register($data);

            $this->session->set_flashdata('success', 'Berhasil mendaftar. Silahkan Login');

            redirect('auth');
        }

        $title = 'Daftar';

        // return view auth

        $this->load->view('layouts/auth/header', compact('title'));

        $this->load->view('auth/register');

        $this->load->view('layouts/auth/footer');
    }



    public function logout()

    {

        $this->session->sess_destroy();

        redirect('auth');
    }
}
