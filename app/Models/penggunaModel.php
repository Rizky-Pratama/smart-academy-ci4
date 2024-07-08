<?php

namespace App\Models;

use CodeIgniter\Model;

class penggunaModel extends Model
{
   protected $table            = 'user';
   protected $primaryKey       = 'id';
   protected $returnType       = 'object';
   protected $allowedField     = ['email', 'password', 'username', 'user_level', 'status'];
   public function getData()
   {
      return $this->db->table('user')->get()->getResult();
   }

   public function insertData($data)
   {
      return $this->db->table('user')->insert($data);
   }
}
