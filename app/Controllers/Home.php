<?php

namespace App\Controllers;
use App\Models\SuratModel;
class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Aplikasi | SK Gubernur - Home'
        ];
        $model = new SuratModel();
        if(empty(session()->get('nama'))){
            session()->setFlashdata('error', 'Terdeteksi Serangan');
            return redirect()->to(base_url('login'));
        }else if(!empty(session()->get('nama'))){
            $data['data_surat'] = $model->getDataSurat();
            return view('admin/home', $data);
        }
    }
    public function halaman_tambah(){
        $data = [
            'title' => 'Aplikasi | SK Gubernur - Tambah Data'
        ];
        return view('admin/tambah_data', $data);
    }

    public function tambah_surat(){
        $model = new SuratModel();

        $validation = $this->validate([
            'file_surat' => 'uploaded[file_surat]|mime_in[file_surat,application/pdf,application/zip,application/msword,application/x-tar]|max_size[file_surat,5000]'
        ]);
 
        if ($validation == FALSE) {
            return redirect()->to(base_url('tambah_data'))->with('gagal', 'Data Format Salah');
        } else {
            $upload = $this->request->getFile('file_surat');
            $upload->move(WRITEPATH . '../public/surat/');
        $data = array(
            'unit_pengelola'  => $this->request->getPost('unit_pengelola'),
            'tanggal' => $this->request->getPost('tanggal'),
            'tentang' => $this->request->getPost('tentang'),
            'file_surat' => $upload->getName()
        );
        }
        $model->SimpanSurat($data);
        return redirect()->to(base_url('home'))->with('sukses', 'Data Berhasil di Simpan');
       
    }

    public function edit_surat()
    {
        $model = new SuratModel();
       

            $id = $this->request->getPost('id');
            $validation = $this->validate([
                'file_surat' => 'uploaded[file_surat]|mime_in[file_surat,application/pdf,application/zip,application/msword,application/x-tar]|max_size[file_surat,5000]'
            ]);
            if ($validation == FALSE) {
            $data = array(
                'unit_pengelola'  => $this->request->getPost('unit_pengelola'),
                'tanggal' => $this->request->getPost('tanggal'),
                'tentang'  => $this->request->getPost('tentang'),
            );
            } else {
            $dt = $model->PilihSurat($id)->getRow();
            $file_surat = $dt->file_surat;
            $path = '../public/surat/';
            @unlink($path.$file_surat);
                $upload = $this->request->getFile('file_surat');
                $upload->move(WRITEPATH . '../public/surat/');
            $data = array(
                'unit_pengelola'  => $this->request->getPost('unit_pengelola'),
                'tanggal' => $this->request->getPost('tanggal'),
                'tentang'  => $this->request->getPost('tentang'),
                'file_surat' => $upload->getName()
            );
            }
            $model->editData($id,$data);
            return redirect()->to(base_url('home'))->with('sukses', 'Data Berhasil di edit');
    }

    public function hapus($id)
    {
        $model = new SuratModel();
        $dt = $model ->PilihSurat($id)->getRow();
        $model->HapusSurat($id);
        $file_surat = $dt->file_surat;
        $path = '../public/surat/';
        @unlink($path.$file_surat);
        return redirect()->to(base_url('home'))->with('sukses', 'Data Berhasil Dihapus');

    }

}