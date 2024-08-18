<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model {
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $allowedFields = ['nama', 'harga', 'gambar'];
}
