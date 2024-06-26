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

        $request = $this->request->getJSON();

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'password' => $request->password,
            'email' => $request->email,
            'role_id' => 2
        ];
        
        if(!$this->validateData($data,'user')){
            return $this->fail($this->validator->getErrors(),400);
        }
        
        $username_existent = $this->model->where('username',$data['username'])->findAll();

        if($username_existent){
            return $this->fail(['message' => "nombre de usuario no disponible."],400);
        }

        $email_existent = $this->model->where('email',$data['email'])->findAll();

        if($email_existent){
            return $this->fail(['message' => "correo ya registrado."],400);
        }

        $result = $this->model->insert($data);
        $user_id = $this->model->getInsertID();
        return $this->respond(['message' => 'user created'],200);
    }

    public function show($id = null){

        $data = ['id' => $id];

        if(!$this->validateData($data,'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $user = $this->model->find($id);
        return $this->respond($user,200);
    }

    public function update($id = null){

        $request = $this->request->getJSON();

        $data = [
            'username' => $request->username,
            'name' => $request->name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'password' => $request->password,
            'email' => $request->email,
        ];

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        if(!$this->validateData($data,'user')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->update($id,$data);

        $user = $this->model->find($id);
        return $this->respond(['user' => $user,'message' => 'user updated'],200);
    }

    public function delete($id = null){

        if(!$this->validateData(['id' => $id],'id')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $this->model->delete($id);
        return $this->respond(['message' => 'user deleted'],200);
    }
}
