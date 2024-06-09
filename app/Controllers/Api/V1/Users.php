<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController{

    protected $modelName = 'App\Models\UsersModel';
    protected $format    = 'json';
    
    public function index(){

        return $this->respond($this->model->findAll(),200);
    }

    public function create(){
  
        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'last_name' => $this->request->getPost('last_name'),
            'password' => $this->request->getPost('password'),
            'role_id' => $this->request->getPost('role_id')
        ];
        

        
    }

    public function show($id = null){

    }

    public function update($id = null){

    }

    public function destroy($id = null){

    }
}
