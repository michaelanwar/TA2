<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Materi_Tugas_Submit_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'materi_tugas_submit';
    }

    public function materi_tugas()
    {
        return $this->belongsTo('Materi_Tugas_model', 'materi_tugas_id');
    }

    public function siswa()
    {
        return $this->belongsTo('Siswa_model', 'siswa_id');
    }
}