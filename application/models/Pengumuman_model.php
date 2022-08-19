<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Pengumuman_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'pengumuman';
    }

    public function admin()
    {
        return $this->belongsTo('Admin_model', 'author');
    }

    public function files()
    {
        return $this->hasMany('File_Pengumuman_model', 'pengumuman_id');
    }

    public function file()
    {
        return $this->hasMany('File_Pengumuman_model', 'pengumuman_id');
    }
}