<?php

defined('BASEPATH') or exit('No direct script access allowed');



use Illuminate\Database\Eloquent\Model as Eloquent;



/**

 *

 */

class Guru_model extends Eloquent

{

    protected $table;

    public function __construct()

    {

        parent::__construct();

        $this->table = 'guru';
    }



    public function guru_login($user_id)

    {

        $guru = Guru_model::where(array(

            'user_id' => $user_id

        ))->first();

        return $guru;
    }



    public function available($ids)

    {

        return Guru_model::whereNotIn('id', $ids)->get();
    }



    public function assignedKelas()

    {

        return $this->hasMany('Assign_Kelas_Guru_model', 'guru_id');
    }



    public function user()

    {

        return $this->belongsTo('User_model', 'user_id');
    }
}
