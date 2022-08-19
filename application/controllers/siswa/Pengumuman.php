<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Pengumuman extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $currentUrl = current_url();

        handle(Constant::USER_ROLE_SISWA, $currentUrl);

        $this->load->model('Pengumuman_model');

        $this->load->model('File_Pengumuman_model');
    }



    public function index()
    {

        $pengumumans = $this->Pengumuman_model->orderBy('updated_at', 'DESC')->get();

        $data = [

            'title' => 'Pengumuman - List',

            'content' => 'layouts/user/pengumuman/list',

            'pengumumans' => $pengumumans

        ];



        $this->load->view('layouts/user/wrapper', $data);
    }



    public function detail($id)
    {

        $pengumuman = $this->Pengumuman_model->find($id);

        $data = [

            'title' => 'Pengumuman - Detail',

            'content' => 'layouts/user/pengumuman/detail',

            'pengumuman' => $pengumuman

        ];



        $this->load->view('layouts/user/wrapper', $data);
    }
}
