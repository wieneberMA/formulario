<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('user_form', $data);
    }

    public function store()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        $this->userModel->save($data);
        return redirect()->to('user_form')->with('message', 'Usuario guardado correctamente');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('user_edit', $data);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        $this->userModel->update($id, $data);
        return redirect()->to('user_form')->with('message', 'Usuario actualizado correctamente');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('user_form')->with('message', 'Usuario eliminado correctamente');
    }
}