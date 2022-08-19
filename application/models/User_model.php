<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class User_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
    }

    public function login($email, $password)
    {
        $user = User_model::where(array(
            'email' => $email,
            'password' => sha1($password)
        ))->first();
        return $user;
    }

    public function user_role()
    {
        return $this->belongsTo('User_Role_model', 'id', 'user_id');
    }

    public function admin()
    {
        return $this->hasMany('Admin_model', 'user_id');
    }

    public function guru()
    {
        return $this->hasMany('Guru_model', 'user_id');
    }
}