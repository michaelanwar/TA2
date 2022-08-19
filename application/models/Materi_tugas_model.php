<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Materi_Tugas_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'materi_tugas';
    }

    public function materi()
    {
        return $this->belongsTo('Materi_model', 'materi_id');
    }

    public function materi_tugas_submit()
    {
        return $this->hasMany('Materi_Tugas_Submit_model', 'materi_tugas_id');
    }
}