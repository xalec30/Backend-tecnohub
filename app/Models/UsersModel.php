<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','name','middle_name','last_name','email','password','role_id','created_at','updated_at'];
    protected $dateFormat    = 'datetime';
    protected $allowCallbacks = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected bool $allowEmptyInserts = true;

    protected $beforeInsert = ['addCreatedAt'];
    protected $beforeUpdate = ['addUpdatedAt'];

    protected function addCreatedAt(array $data){

        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function addUpdatedAt(array $data){

        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}