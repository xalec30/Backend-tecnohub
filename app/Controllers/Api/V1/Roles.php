<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Roles extends ResourceController{

    protected $modelName = 'App\Models\RolesModel';
    protected $format    = 'json';

    public function index(){

        return $this->respond($this->model->findAll(),200);
    }

    public function create(){
        
    }

    public function show($id){

    }

    public function update($id){

    }

    public function destroy($id){

    }
}