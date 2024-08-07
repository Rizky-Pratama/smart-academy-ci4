<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
   protected $table            = 'user';
   protected $primaryKey       = 'id';
   protected $returnType       = 'object';
   protected $allowedField     = ['email', 'username', 'user_level', 'password'];
   protected $useTimestamps    = true;
   protected $useSoftDeletes   = false;

   public function findUserByEmail($email)
   {
      return $this->db->table('user')->where('email', $email)->get()->getRowArray();
   }

   public function hapus($id)
   {
      return $this->db->table('user')->where('user_id', $id)->delete();
   }

   public function addUser($data)
   {
      return $this->db->table('user')->insert($data);
   }
}
