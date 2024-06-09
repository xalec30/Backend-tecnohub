<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Categories extends ResourceController{

    protected $modelName = 'App\Models\CategoriesModel';
    protected $format    = 'json';

    public function index(){
        return $this->respond($this->model->findAll(),200);
    }

    public function show($id = null){

        $data = ['id' => $id];

        if(!$this->validateData($data,'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $category = $this->model->find($id);
        return $this->respond($category,200);
    }

    public function create(){

        $data = [
            'name' => $this->request->getPost('name'),
            'is_new' => $this->request->getPost('is_new'),
            'hidden' => $this->request->getPost('hidden'),
        ];

        if(!$this->validateData($data,'category')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $result = $this->model->insert($data);
        $user_id = $this->model->getInsertID();
        return $this->respond(['message' => 'category created','id' => $user_id],200);
    }

    public function update($id = null){

        $request = $this->request->getJSON();
        
        $data = [
            'name' => $request->name,
            'is_new' => $request->is_new,
            'hidden' => $request->hidden,
        ];
        
        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        if(!$this->validateData($data,'category')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->update($id,$data);

        return $this->respond(['message' => 'category updated'],200);
    }

    public function delete($id = null){

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->delete($id);
        return $this->respond(['message' => 'category deleted'],200);
    }
}