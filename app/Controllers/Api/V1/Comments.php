<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Comments extends ResourceController{

    protected $modelName = 'App\Models\CommentsModel';
    protected $format    = 'json';

    public function index(){
        return $this->respond($this->model->findAll(),200);
    }

    public function show($id = null){

        $data = ['id' => $id];

        if(!$this->validateData($data,'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $comment = $this->model->find($id);
        return $this->respond($comment,200);
    }

    public function create(){
        
        $data = [
            'resource_id' => $this->request->getPost('resource_id'),
            'comment' => $this->request->getPost('comment'),
            'user_id' => $this->request->getPost('user_id'),
        ];

        if(!$this->validateData($data,'comment')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $result = $this->model->insert($data);
        $user_id = $this->model->getInsertID();
        return $this->respond(['message' => 'comment created','id' => $user_id],200);
    }

    public function update($id = null){

        $request = $this->request->getJSON();

        $data = [
            'resource_id' => $request->resource_id,
            'comment' => $request->comment,
            'user_id' => $request->user_id
        ];

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        if(!$this->validateData($data,'comment')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->update($id,$data);

        return $this->respond(['message' => 'comment updated'],200);
    }

    public function delete($id = null){

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->delete($id);
        return $this->respond(['message' => 'comment deleted'],200);
    }
}