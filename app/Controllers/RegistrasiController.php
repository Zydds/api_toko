<?php

namespace App\Controllers;

use App\Models\MRegistrasi;
use CodeIgniter\RESTful\ResourceController;

class RegistrasiController extends ResourceController
{
    public function options()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        $this->response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
        return $this->response->setStatusCode(200);
    }
    public function registrasi()
    {

        $nama = $this->request->getVar('nama');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new MRegistrasi();
        $model->save([
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return $this->respond(['status' => 200, 'success' => true, 'message' => 'Registrasi Berhasil']);
    }
}