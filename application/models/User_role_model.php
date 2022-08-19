<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class User_Role_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user_role';
    }

    public function users()
    {
        return $this->hasMany('User_model', 'user_id');
    }

    public function roles()
    {
        return $this->belongsTo('Role_model', 'role_id');
    }

    public function user()
    {
        return $this->belongsTo('User_model', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('Role_model', 'role_id');
    }
}