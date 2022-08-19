<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Assign_Mapel_Kelas_Guru_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'assign_mapel_kelas_guru';
    }
    public function assign_mapel_kelas()
    {
        return $this->belongsTo('Assign_Mapel_Kelas_model', 'assign_mapel_kelas_id');
    }
    public function assign_kelas_guru()
    {
        return $this->belongsTo('Assign_Kelas_Guru_model', 'assign_kelas_guru_id');
    }
    public function bab()
    {
        return $this->hasMany('Assign_Mapel_Kelas_Guru_Bab_Model', 'assign_mapel_kelas_guru_id');
    }
}