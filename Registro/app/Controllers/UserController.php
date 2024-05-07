<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('user_form');
    }

    public function store()
    {
        $validation = service('validation');
        $validation->setRules([
            'name' => 'required|min_length[3]'
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $model = new UserModel();
            $model->save([
                'name' => $this->request->getVar('name'),
            ]);
            return redirect()->to('/user_form')->with('message', 'Usuario agregado correctamente.');
        } else {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    }
}
