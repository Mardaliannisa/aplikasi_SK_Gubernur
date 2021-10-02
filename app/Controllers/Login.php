<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Aplikasi | SK Gubernur'
        ];
        return view('login/login', $data);
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if ($password == $dataUser->password) {
                session()->set([
                    'username' => $dataUser->username,
                    'nama' => $dataUser->nama,
                    'sukses' => 'Berhasil',
                    'logged_in' => TRUE
                ]);
                session()->setFlashdata('sukses', 'Berhasil Login, Selamat Datang');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }
 
    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}
