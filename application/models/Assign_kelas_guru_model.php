<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Assign_Kelas_Guru_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'assign_kelas_guru';
    }

    public function kelas()
    {
        return $this->belongsTo('Kelas_model', 'kelas_id');
    }

    public function guru()
    {
        return $this->belongsTo('Guru_model', 'guru_id');
    }

    public function assign_mapel_kelas_guru()
    {
        return $this->hasMany('Assign_Mapel_Kelas_Guru_model', 'assign_kelas_guru_id');
    }

    public function available_maple($kelas_id)
    {
        $curAMK =  Assign_Mapel_Kelas_model::where('kelas_id', $kelas_id)->get();
        $mapel_ids = [];
        foreach ($curAMK as $amk) {
            $mapel_ids[] = $amk->mapel->id;
        }
        return Mapel_model::whereNotIn('id', $mapel_ids)->get();
    }
}
