<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Siswa_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'siswa';
    }

    public function siswa_login($user_id)
    {
        $siswa = Siswa_model::where(array(
            'user_id' => $user_id
        ))->first();
        return $siswa;
    }

    public function available($ids)
    {
        return Siswa_model::whereNotIn('id', $ids)->get();
    }

    public function submission($materi_tugas_id, $siswa_id)
    {
        return Materi_Tugas_Submit_Model::where(array(
            'materi_tugas_id' => $materi_tugas_id,
            'siswa_id' => $siswa_id
        ))->first();
    }

    public function getClass($siswa_id)
    {
        $kelas_siswa = Assign_Kelas_Siswa_Model::where(array(
            'siswa_id' => $siswa_id
        ))->first();
        if ($kelas_siswa) {
            return $kelas_siswa->kelas;
        }
        return false;
    }

    public function isMemberOfKelas($idKelas)
    {
        $search = Assign_Kelas_Siswa_model::where('kelas_id', $idKelas)->where('siswa_id', $this->id)->first();
        return $search;
    }

    public function getWhichClassMembered()
    {
        $search =  Assign_Kelas_Siswa_model::where('siswa_id', $this->id)->first();
        if ($search) {
            return $search->kelas;
        }
        return false;
    }
}
