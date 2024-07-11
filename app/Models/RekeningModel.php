<?php

namespace App\Models;

use CodeIgniter\Model;

class RekeningModel extends Model
{
  protected $table = 'rekening';
  protected $primaryKey = 'rekening_id';
  protected $allowedFields = ['nama_bank', 'nomor_rekening', 'nama_pemilik_rekening'];

  public function getRekening()
  {
    return $this->findAll();
  }

  public function addRekening($data)
  {
    return $this->insert($data);
  }

  public function getRekeningId($id)
  {
    return $this->find($id);
  }

  public function editRekening($data, $id)
  {
    return $this->update($id, $data);
  }

  public function deleteRekening($id)
  {
    return $this->delete($id);
  }
}
