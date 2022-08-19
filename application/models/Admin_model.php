<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Admin_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'admin';
    }

    public function admin_login($user_id){
        $admin = Admin_model::where(array(
            'user_id' => $user_id
        ))->first();
        return $admin;
    }

    public function user()
    {
        return $this->belongsTo('User_model', 'user_id');
    }
}