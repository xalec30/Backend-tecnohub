<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table      = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['resource_id','comment','status','user_id','created_at','updated_at'];
    protected $dateFormat    = 'datetime';
    protected $allowCallbacks = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $beforeInsert = ['addCreatedAt','addStatus'];
    protected $beforeUpdate = ['addUpdatedAt'];

    protected function addStatus(array $data){

        $data['data']['status'] = 0;
        return $data;
    }

    protected function addCreatedAt(array $data){

        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function addUpdatedAt(array $data){

        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}