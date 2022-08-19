<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Assign_Mapel_Kelas_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'assign_mapel_kelas';
    }

    public function assign_mapel_kelas_guru($mapel_kelas_id)
    {
        return Assign_Mapel_Kelas_Guru_model::find($mapel_kelas_id);
    }

    public function kelas()
    {
        return $this->belongsTo('Kelas_model', 'kelas_id');
    }

    public function mapel()
    {
        return $this->belongsTo('Mapel_model', 'mapel_id');
    }

    public function guru()
    {
        return $this->belongsTo('Guru_model', 'guru_id');
    }

    public function bab()
    {
        return Course_Bab_model::where('course_id', $this->id)->get();
    }

    public function materi()
    {
        return $this->hasMany('Materi_model', 'course_id');
    }
}
