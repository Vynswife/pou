<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model {
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $allowedFields = ['id_makanan', 'jumlah', 'total_harga'];
}
