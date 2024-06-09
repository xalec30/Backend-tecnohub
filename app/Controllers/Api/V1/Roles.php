<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Roles extends ResourceController{

    protected $modelName = 'App\Models\RolesModel';
    protected $format    = 'json';

    public function index(){
        return $this->respond($this->model->findAll(),200);
    }

    public function show($id = null){
        $data = ['id' => $id];

        if(!$this->validateData($data,'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $tag = $this->model->find($id);
        return $this->respond($tag,200);
    }

    public function create(){
        
        $data = [
            'name' => $this->request->getPost('name'),
        ];

        if(!$this->validateData($data,'role')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $result = $this->model->insert($data);
        $role_id = $this->model->getInsertID();
        return $this->respond(['message' => 'rol created','id' => $role_id],200);
    }

    public function update($id = null){

        $request = $this->request->getJSON();

        $data = [
            'name' => $request->name,
        ];

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        if(!$this->validateData($data,'role')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->update($id,$data);

        return $this->respond(['message' => 'rol updated'],200);
    }

    public function delete($id = null){

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->delete($id);
        return $this->respond(['message' => 'rol deleted'],200);
    }
}