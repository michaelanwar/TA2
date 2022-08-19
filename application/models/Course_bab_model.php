<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Course_Bab_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'course_bab';
    }

    public function materiList()
    {
        return $this->hasMany('Materi_model', 'bab_id');
    }

    public function course()
    {
        return $this->belongsTo('Assign_Mapel_Kelas_model', 'course_id');
    }
}
