<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authenticateusers
{
    protected $CI;
    protected $role;
    public function __construct()
    {
        $this->CI = &get_instance();
        // load user model
        $this->CI->load->library('Constant');
        $this->CI->load->model('siswa_model');
        $this->CI->load->model('guru_model');
        $this->CI->load->model('admin_model');
        $this->CI->load->model('assign_kelas_siswa_model');
        $this->CI->load->model('kelas_model');
        $this->CI->load->model('user_model');
        $this->CI->load->model('role_model');
        $this->CI->load->model('user_role_model');
    }

    public function login($username, $password)
    {
        $user_login = $this->CI->user_model->login($username, $password);
        if ($user_login) {
            $user_role = $user_login->user_role;
            $role = $user_role->role;
            // print_r($user_role);
            // echo  Constant::USER_ROLE_SISWA;
            // echo $role->nama;
            // die();
            switch($role->nama){
                case Constant::USER_ROLE_ADMIN:
                    $admin_login = $this->CI->admin_model->admin_login($user_login->id);
                    $admin_login = $admin_login->toArray();
                    $admin_login = array_merge($admin_login, array('role' => $role->nama));
                    $this->CI->session->set_userdata('user', $admin_login);
                    $this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
                    redirect(base_url('admin'), 'refresh');
                    break;
                case Constant::USER_ROLE_GURU:
                    $guru_login = $this->CI->guru_model->guru_login($user_login->id);
                    if ($guru_login) {
                        $guru_login = $guru_login->toArray();
                        $guru_login = array_merge($guru_login, array('role' => $role->nama));
                        $this->CI->session->set_userdata('user', $guru_login);
                        $this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
                        redirect(base_url('guru'), 'refresh');
                    }
                    $this->CI->session->set_flashdata('warning', 'Email / Password salah');
                    redirect(base_url('auth'));
                    break;
                case Constant::USER_ROLE_SISWA:
                    $siswa_login = $this->CI->siswa_model->siswa_login($user_login->id);
                    $siswa_login = $siswa_login->toArray();
                    if(!$this->getClass($siswa_login['id'])){
                        $this->CI->session->set_flashdata('warning', 'Kamu belum terdaftar di kelas manapun!. Silahkan hubungin adminstrasi untuk mendaftarkan mu ke data kelas');
                        redirect(base_url('auth'));
                        return;
                    }
                    $class = $this->getClass($siswa_login['id'])->toArray();
                    $siswa_login = array_merge(
                        $siswa_login,
                        array('role' => $role->nama, 'class' => $class)
                    );
                    // die(var_dump($this->getClass($siswa_login['id'])));
                    $this->CI->session->set_userdata('user', $siswa_login);
                    $this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
                    if($this->CI->session->userdata('next') !== null){
                        redirect($this->CI->session->userdata('next'));
                    }
                    redirect(base_url('siswa/home'), 'refresh');
                    break;
            }
        }
        // $this->CI->session->set_flashdata('warning', 'Email/password salah');
        // redirect(base_url('auth'));
        // break;
        //     case 'guru':
        //         $guru_login = $this->CI->guru_model->login($username, $password);
        //         if ($guru_login) {
        //             $guru_login = $guru_login->toArray();
        //             $guru_login = array_merge($guru_login, array('role' => $role));
        //             $this->CI->session->set_userdata('user', $guru_login);
        //             $this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
        //             redirect(base_url('guru'), 'refresh');
        //         }
        //         $this->CI->session->set_flashdata('warning', 'Email / Password salah');
        //         redirect(base_url('auth'));
        //         break;
        //     case 'admin':
        //         $admin_login = $this->CI->admin_model->login($username, $password);
        //         if ($admin_login) {
        //             $admin_login = $admin_login->toArray();
        //             $admin_login = array_merge($admin_login, array('role' => $role));
        //             $this->CI->session->set_userdata('user', $admin_login);
        //             $this->CI->session->set_flashdata('sukses', 'Anda berhasil login');
        //             redirect(base_url('admin'), 'refresh');
        //         }
        $this->CI->session->set_flashdata('warning', 'Email/password salah');
        redirect(base_url('auth'));
    }

    public function getClass($siswa_id){
        $kelas = $this->CI->assign_kelas_siswa_model->where('siswa_id',$siswa_id)->first();
        return $kelas;
    }
}