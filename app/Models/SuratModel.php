<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratModel extends Model
{
    protected $table = "data_surat";


    public function SimpanSurat($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getDataSurat()
    {
        return $this->findAll();  
    }

    public function editData($id, $data)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
    public function PilihSurat($id)
    {
         $query = $this->getWhere(['id' => $id]);
         return $query;
    }

    public function HapusSurat($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function search($keyword)
    {
        $query = $this->table('data_surat');
        $query->like('nomor_surat', $keyword);
        $query->orLike('unit_pengelola', $keyword);
        $query->orLike('tanggal', $keyword);
        $query->orLike('tentang', $keyword);
        $query->orLike('file_surat', $keyword);
        return $query;

    }

    public function order($order, $by)
    {
        $query = $this->table('data_surat');
        $query->orderBy($order, $by ? $by : 'ASC');
        return $query;
    }
}
