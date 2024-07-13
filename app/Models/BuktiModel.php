<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiModel extends Model
{
  protected $table            = 'bukti_pembayaran';
  protected $primaryKey       = 'id';
  protected $returnType       = 'array';
  protected $allowedFields     = ['transaksi_id', 'file_path', 'upload_time'];

}
