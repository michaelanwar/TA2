<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class File_Pengumuman_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'file_pengumuman';
    }

    public function pengumuman()
    {
        return $this->belongsTo('Pengumuman_model', 'id_pengumuman');
    }
}