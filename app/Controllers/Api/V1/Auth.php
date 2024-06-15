<?php

namespace App\Controllers\Api\V1;
use CodeIgniter\RESTful\ResourceController;

class Auth extends ResourceController{

    protected $modelName = 'App\Models\AuthModel';
    protected $format    = 'json';

    public function index(){
       
    }

    public function show($id = null){
        
    }

    public function create($id = null){
        
        $request = $this->request->getJSON();
     
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(!$this->validateData($data,'auth')){
            return $this->fail($this->validator->getErrors(),400);
        }

        $user = $this->model->where('username',$data['username'])->first();
        
        if(!$user){
            return $this->fail(['error' => 'Usuario no registrado'],400);
        }
       
        if($user['password'] != $data['password']){
            return $this->fail(['error' => 'Contraseña incorrecta'],400);
        }

        return $this->respond(['user_data' => $user,'message' => 'user auth'],200);
    }
}