<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 *
 */
class Role_model extends Eloquent
{
    protected $table;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'role';
    }

    public function user_role(){
        return $this->belongsTo('User_Role_model', 'role_id');
    }

    public function getBy($key, $value)
    {
        return Role_model::where($key, $value)->first();
    }
}