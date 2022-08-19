<?php
defined('BASEPATH') or exit('No direct script access allowed');


function handle($what, $next) {
    $CI =& get_instance();
    $user = $CI->session->userdata('user');
    switch ($what) {
        case USER_ROLE_ADMIN:
            if (!isset($user)) {
                if(isset($next)){
                    $CI->session->set_userdata('next', $next);
                }
                $CI->session->set_flashdata('warning', 'Anda Belum Login');
                return redirect(base_url('auth'));
            }
            if ($user['role'] != USER_ROLE_ADMIN) {
                $CI->session->set_flashdata('warning', 'Anda tidak memiliki akses ke halaman ini');
                return redirect(base_url('auth'));
            }
            break;
        case USER_ROLE_GURU:
            if (!isset($user)) {
                if(isset($next)){
                    $CI->session->set_userdata('next', $next);
                }
                $CI->session->set_flashdata('warning', 'Anda Belum Login');
                return redirect(base_url('auth'));
            }
            if ($user['role'] != USER_ROLE_GURU) {
                $CI->session->set_flashdata('warning', 'Anda tidak memiliki akses ke halaman ini');
                return redirect(base_url('auth'));
            }
            break;
        case USER_ROLE_SISWA:
            if (!isset($user)) {
                if(isset($next)){
                    $CI->session->set_userdata('next', $next);
                }
                $CI->session->set_flashdata('warning', 'Anda Belum Login');
                return redirect(base_url('auth'));
            }
            if ($user['role'] != USER_ROLE_SISWA) {
                $CI->session->set_flashdata('warning', 'Anda tidak memiliki akses ke halaman ini');
                return redirect(base_url('auth'));
            }
            break;
        default:
            return redirect(base_url('auth'));
            break;
    }
}