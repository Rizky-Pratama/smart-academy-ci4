<?php

namespace App\Models;

use CodeIgniter\Model;

class MembershipModel extends Model
{
    protected $table            = 'membership';
    protected $primaryKey       = 'id_membership';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_membership', 'nama_membership', 'durasi_keanggotaan', 'harga_keanggotaan'];

    public function getAllData()
    {
        return $this->db->table('membership')->get()->getResult();
    }

    public function getData($id)
    {
        return $this->db->table('membership')->where('id_membership', $id)->get()->getRow();
    }

    public function insertData($data)
    {
        return $this->db->table('membership')->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->db->table('membership')->where('id_membership', $id)->update($data);
    }

    public function deleteData($id)
    {
        return $this->db->table('membership')->where('id_membership', $id)->delete();
    }
    
}
