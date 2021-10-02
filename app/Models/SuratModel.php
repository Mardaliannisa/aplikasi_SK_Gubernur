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
}
