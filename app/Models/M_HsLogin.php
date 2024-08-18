<?php

namespace App\Models;

use CodeIgniter\Model;

class M_HsLogin extends Model
{
    protected $table = 'hs_login';
    protected $primaryKey = 'id_hs';
    protected $allowedFields = ['id_users', 'login_time', 'logout_time'];
    protected $useTimestamps = false; // if you want to manually handle timestamps

    // Function to add login record
    public function insertLogin($data)
    {
        return $this->insert($data);
    }

    // Function to update logout time
    public function updateLogout($userId)
    {
        return $this->where('id_users', $userId)
                    ->where('logout_time', null)
                    ->set('logout_time', date('Y-m-d H:i:s'))
                    ->update();
    }
}
