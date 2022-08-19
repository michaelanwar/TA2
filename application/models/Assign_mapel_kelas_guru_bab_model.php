<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Assign_Mapel_Kelas_Guru_Bab_Model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'assign_mapel_kelas_guru_bab';
    }
    public function assign_mapel_kelas_guru()
    {
        return $this->belongsTo('Assign_Mapel_Kelas_Guru_Model', 'assign_mapel_kelas_guru_id');
    }
    public function bab()
    {
        return $this->belongsTo('Bab_Model', 'bab_id');
    }
  
    public function materis(){
        return $this->hasMany('Materi_model', 'assign_mapel_kelas_guru_bab_id');
    }
  
    public function materi()
    {
        return $this->hasMany('Materi_Model', 'assign_mapel_kelas_guru_bab_id');
    }
}