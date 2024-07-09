<?php

namespace App\Models;

use CodeIgniter\Model;

class materiModel extends Model
{
    protected $table            = 'materi';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedField     = ['judul', 'deskripsi', 'tipe', 'video','thumbnail','harga'];

    public function getAllData()
    {
        return $this->db->table('materi')->get()->getResult();
    }

    public function getData($id)
    {
        return $this->db->table('materi')->where('id', $id)->get()->getRow();
    }

    public function insertData($data)
    {
        return $this->db->table('materi')->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->db->table('materi')->update($data, ['id' => $id]);
    }

    public function deleteData($id)
    {
        return $this->db->table('materi')->where('id', $id)->delete();
    }
}
