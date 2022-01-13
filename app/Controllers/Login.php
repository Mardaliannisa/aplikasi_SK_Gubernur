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
        $dataUser = $users->cek_user($username);
    
        if ($dataUser) {
                if ($password == $dataUser->password) {
                    if($dataUser->id_user_level == 1){
                        session()->set([
                            'username' => $dataUser->username,
                            'nama' => $dataUser->nama,
                            'user_level_name' => $dataUser->user_level_name,
                            'sukses' => 'Berhasil',
                            'logged_in' => TRUE
                        ]);
                        session()->setFlashdata('sukses', 'Berhasil Login, Selamat Datang');
                        return redirect()->to(base_url('home/admin'));
                    }else if($dataUser->id_user_level == 2){
                        session()->set([
                            'username' => $dataUser->username,
                            'nama' => $dataUser->nama,
                            'user_level_name' => $dataUser->user_level_name,
                            'sukses' => 'Berhasil',
                            'logged_in' => TRUE
                        ]);
                        session()->setFlashdata('sukses', 'Berhasil Login, Selamat Datang');
                        return redirect()->to(base_url('home/pegawai'));
                    }else{
                        session()->setFlashdata('error', 'Anda belum memiliki hak akses !');
                    return redirect()->back();
                    }
                    
                } else {
                    session()->setFlashdata('error', 'Username & Password Salah');
                    return redirect()->back();
                } 
        } else {
            session()->setFlashdata('error', 'Anda Belum Terdaftar !');
            return redirect()->back();
        }
    }
 
    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}
