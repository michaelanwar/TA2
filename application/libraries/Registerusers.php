<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registerusers
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('Constant');
        $this->CI->load->model('user_model');
        $this->CI->load->model('role_model');
        $this->CI->load->model('user_role_model');
        $this->CI->load->model('siswa_model');
    }

    public function register($data)
    {
        $user_id = $this->CI->user_model->insertGetId([
            'email' => $data['email'],
            'password' => sha1($data['password']),
        ]);
        $assignRole = $this->assignRole($user_id, Constant::USER_ROLE_SISWA);
        $this->CI->siswa_model->insert([
            'user_id' => $user_id,
            'gambar' => 'no-image.png',
            'nama' => $data['nama']
        ]);
    }

    public function assignRole($user_id, $role)
    {
        $role = $this->CI->role_model->getBy('nama', $role);
        return $this->CI->user_role_model->insertGetId([
            'user_id' => $user_id,
            'role_id' => $role->id,
        ]);
    }
}