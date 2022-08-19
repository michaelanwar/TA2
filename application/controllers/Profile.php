<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Profile extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $currentUrl = current_url();

        handle(Constant::USER_ROLE_SISWA, $currentUrl);
    }



    public function visiMisi()

    {
        $this->load->model('Visimisi_sekolah_model');
        $visiMisi = Visimisi_sekolah_model::first();

        $data = [

            'title' => $visiMisi->judul,

            'content' => 'layouts/user/monograf/visimisi',

            'visiMisi' => $visiMisi

        ];

        $this->load->view('layouts/user/wrapper', $data);
    }



    public function sejarah()

    {
        $this->load->model('Sejarah_sekolah_model');
        $sejarah = Sejarah_sekolah_model::first();


        $data = [

            'title' => 'Sejarah Sekolah',

            'content' => 'layouts/user/monograf/sejarah',

            'sejarah' => $sejarah
        ];

        $this->load->view('layouts/user/wrapper', $data);
    }
}
