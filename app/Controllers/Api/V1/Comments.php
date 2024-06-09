<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Comments extends ResourceController{

    protected $modelName = 'App\Models\CommentsModel';
    protected $format    = 'json';

    public function index(){

        return $this->respond($this->model->findAll(),200);
    }

    public function create(){
        
        $data = $this->request->getJSON();
        var_dump($data);
    }

    public function show($id = null){

    
    }

    public function update($id){

    }

    public function destroy($id){

    }
}