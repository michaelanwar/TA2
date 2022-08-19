<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */

class Assign_Kelas_Siswa_model extends Eloquent
{
    protected $table;

    public function __construct()

    {
        parent::__construct();
        $this->table = 'assign_kelas_siswa';
    }

    public function kelas()
    {
        return $this->belongsTo('Kelas_model', 'kelas_id');
    }

    public function siswa()
    {
        return $this->belongsTo('Siswa_model', 'siswa_id');
    }
}
