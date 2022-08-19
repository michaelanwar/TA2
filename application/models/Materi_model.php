<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Materi_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'materi';
    }

    public function assign_mapel_kelas_guru_bab()
    {
        return $this->belongsTo('Assign_Mapel_Kelas_Guru_Bab_Model', 'assign_mapel_kelas_guru_bab_id');
    }

    public function materi_tugas()
    {
        return $this->hasMany('Materi_Tugas_model', 'materi_id');
    }

    // to up
    public function course()
    {
        return $this->belongsTo('Assign_Mapel_Kelas_model', 'course_id');
    }
}
