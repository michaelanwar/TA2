<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Kelas_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'kelas';
    }

    public function guru()
    {
        return $this->hasMany('Assign_Kelas_Guru_model', 'kelas_id');
    }

    public function siswa()
    {
        return $this->hasMany('Assign_Kelas_Siswa_model', 'kelas_id');
    }

    public function mapelList()
    {
        return $this->hasMany('Assign_Mapel_Kelas_model', 'kelas_id');
    }


    public function kelas()
    {
        return $this->hasOne('Kelas_model', 'id');
    }

    public function getMapelsOfGuru($guru_id)
    {
        return Assign_Mapel_Kelas_model::where('guru_id', $guru_id)->where('kelas_id', $this->id)->get();
    }
}
