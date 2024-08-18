<?php

namespace App\Models;
use CodeIgniter\Model;

class M_burger extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id'; // Adjust if needed
    protected $allowedFields = ['id_makanan', 'jumlah', 'id_user'];

    public function getUserCount()
{
    return $this->db->table('user')->countAllResults();
}

    public function getWherepol($table, $conditions)
    {
        // Ensure the table is valid
        if (!$this->db->tableExists($table)) {
            throw new \Exception("Table does not exist: $table");
        }

        // Build the query with the given conditions
        return $this->db->table($table)->where($conditions)->get()->getResult();
    }
    
public function tampil($org)
    {
        return $this->db->table($org)->get()->getResult();
    }
    public function tambah($table,$where)
    {
        return $this->db->table($table)->insert($where);
    }
    public function hapus($kolom,$where)
    {
        return $this->db->table($kolom)->delete($where);
    }
    public function hapus2($tabel, $where)
{
    // Debugging: Tampilkan query yang akan dijalankan
    $query = $this->db->table($tabel)->where($where)->getCompiledDelete();
    log_message('info', 'Query hapus: ' . $query);

    // Hapus data dari tabel sesuai kondisi
    return $this->db->table($tabel)->delete($where);
}
public function getWherecon($table, $conditions)
{
    return $this->db->table($table)->where($conditions)->get()->getResult();
}
    public function edit($kin,$isi,$where)
    {
        return $this->db->table($kin)->update($isi,$where);
    }
    public function join($kin,$tabel2,$on,$where)
    {
        return $this->db->table($kin)
                        ->join($tabel2,$on,"left")
                        ->getWhere($where)->getRow();
    }
    public function joinn($tabel, $tabel2, $tabel3, $on){
     return $this->db->table($tabel)
     ->join($tabel2, $on,'left')
    ->join($tabel3, $on,'left')
     ->get()
     ->getResult();

 }
public function tampil_join($table1,$tabel2,$on)
    {
        return $this->db->table($table1)
                        ->join($tabel2,$on,"left")
                        ->get()->getResult();
    }
public function tampil_join3($table1,$tabel2,$tabel3,$on)
    {
        return $this->db->table($table1)
                        ->join($tabel2,$on,"left")
                        ->join($tabel3,$on)
                        ->get()->getResult();
    }
    public function joinWhere($table,$tabel2,$on,$where)
    {
        return $this->db->table($tabel2)
                        ->join($tabel2,$on,"right")
                        ->getWhere($where)->getRow();
    }

    public function upload($file)
{
    $imageName = $file->getName();
    $file->move(ROOTPATH . 'public/img', $imageName);

    // Optionally log the upload operation
    log_message('debug', 'Uploaded file: ' . $imageName);
}


public function updateByKodeTransaksi($kode_transaksi, $data)
{
    return $this->db->table('transaksi')
                    ->where('kode_transaksi', $kode_transaksi)
                    ->update($data);
}



public function getTransactionById($id_transaksi)
{
    return $this->db->table('transaksi')->where('id_transaksi', $id_transaksi)->get()->getRow();
}

public function jointigawhere($tabel, $tabel2, $tabel3, $on, $on2, $id, $where){
     return $this->db->table($tabel)
                    ->join($tabel2, $on,'left')
                    ->join($tabel3, $on2,'left')
                    ->orderby($id,'desc')
                    ->getWhere($where)
                    ->getResult();

}
public function joinduawhere($tabel, $tabel2, $on, $id, $where){
     return $this->db->table($tabel)
                    ->join($tabel2, $on,'left')
                    ->orderby($id,'desc')
                    ->getWhere($where)
                    ->getResult();

}


public function getwherejoin($tabel, $tabel2,$on,$id){
  return $this->db->table($tabel)
  ->join($tabel2, $on,'left')
  ->getWhere($where)
  ->getRow();

}

public function getWhere($tabel,$where){
    return $this->db->table($tabel)
             ->getWhere($where)
             ->getRow();
             
}





//bagian multilogin

public function edituser($table, $data, $where)
    {
        // Check if the 'pw' field exists in the $data array
        if (isset($data['pw'])) {
            // Encrypt the password before saving
            $data['pw'] = password_hash($data['pw'], PASSWORD_DEFAULT);
        }

        $this->db->table($table)->update($data, $where);
    }

 // public function editpw($tabel, $isi, $where){
 //    return $this->db->table($tabel)
 //    ->update($isi, $where);
 // }
public function editpw($table, $data, $where)
    {
        return $this->db->table($table)->update($data, $where);
    }

    public function updateuser($id, $data)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $id]);
    }

    public function deleteUser($id)
    {
        return $this->db->table($this->table)->delete(['id_user' => $id]);
    }

public function tambahpass($table, $data)
    {
        // Encrypt password if it exists in the data
        if (isset($data['pw'])) {
            $data['pw'] = password_hash($data['pw'], PASSWORD_DEFAULT);
        }

        return $this->db->table($table)->insert($data);
    }

    public function editpass($table, $data, $where)
    {
        // Encrypt password if it exists in the data
        if (isset($data['pw'])) {
            $data['pw'] = password_hash($data['pw'], PASSWORD_DEFAULT);
        }

        return $this->db->table($table)->update($data, $where);
    }



    public function encryptPasswordMD5($password)
{
    return md5($password); // Enkripsi password menggunakan MD5
}




// Di dalam model M_burger
public function tambahTransaksi($data)
{
    return $this->db->table('transaksi')->insert($data);
}


public function tambah1($table, $data)
{
    if ($this->db->table($table)->insert($data)) {
        return true;
    } else {
        log_message('error', 'Database error: ' . $this->db->error());
        return false;
    }
}

public function upload2($file)
{
    if ($file->isValid() && !$file->hasMoved())
    {
        $newName = $file->getRandomName();
        $file->move('./uploads', $newName);
    }
}
public function hapus1($tabel, $where)
{
    return $this->db->table($tabel)->delete($where);
}





//untuk mengubah logo menu
public function updateSetting2($field, $data)
    {
        $this->db->table('setting')->update($data, ['id_setting' => 1]);
    }


public function getReportData()
    {
        return $this->db->table($this->table)
                        ->select('id_transaksi, tgl_transaksi, kode_transaksi, id_user, id_makanan, jumlah, total_harga')
                        ->get()
                        ->getResult();
    }

public function uploadgambar($file)
{
    $targetPath = ROOTPATH . 'public/images/logo.png';

    // Hapus file lama jika ada
    if (file_exists($targetPath)) {
        unlink($targetPath);
    }

    // Simpan file baru
    $file->move(ROOTPATH . 'public/images', 'logo.png');
    
    return 'logo.png'; // Mengembalikan nama file baru
}


public function editgambar($table, $data, $where)
{
    return $this->db->table($table)->update($data, $where);
}

public function tampilgambar($table)
{
    return $this->db->table($table)->get()->getResult(); // Mengambil semua data dari tabel
}



//untuk laporan print
// protected $table = 'transaksi';
//     protected $primaryKey = 'id_transaksi';

    public function getTransactionsByDate($start_date, $end_date)
    {
        return $this->where('tgl_transaksi >=', $start_date)
                    ->where('tgl_transaksi <=', $end_date)
                    ->findAll();
    }

public function getLaporanByDate($start_date, $end_date)
{
    return $this->db->table('transaksi')
    ->where('tgl_transaksi >=', $start_date)
    ->where('tgl_transaksi <=', $end_date)
    ->get()
    ->getResult();
}

public function getLaporanByDateForExcel($start_date, $end_date)
{
    $query = $this->db->table('transaksi')
    ->where('tgl_transaksi >=', $start_date)
    ->where('tgl_transaksi <=', $end_date)
    ->get();

    return $query->getResultArray();
}


    public function upload1($file)
{
    $targetPath = ROOTPATH . 'public/images/logo.png';
    
    // Hapus file lama jika ada
    if (file_exists($targetPath)) {
        unlink($targetPath);
    }

    // Simpan file baru
    $file->move(ROOTPATH . 'public/images', 'logo.png');
    
    return 'logo.png'; // Mengembalikan nama file baru
}


    // Mendapatkan gambar dari tabel toko
    public function tampilgambarnota($table)
    {
        return $this->db->table($table)->get()->getResultArray();
    }

//utk pesanan
public function joinAndGroupByTransaction() {
        $query = $this->db->table('transaksi')
                          ->select('kode_transaksi, user.username, transaksi.tgl_transaksi, SUM(transaksi.total_harga) as total_harga, GROUP_CONCAT(makanan.nama SEPARATOR ", ") as nama, GROUP_CONCAT(transaksi.jumlah SEPARATOR ", ") as jumlah, transaksi.status')
                          ->join('makanan', 'transaksi.id_makanan = makanan.id_makanan')
                          ->join('user', 'transaksi.id_user = user.id_user')
                          ->groupBy('kode_transaksi, user.username, transaksi.tgl_transaksi, transaksi.status')
                          ->orderBy('transaksi.tgl_transaksi', 'desc')
                          ->get();
        return $query->getResult();
    }


public function edit2($table, $data, $where)
{
    return $this->db->table($table)->update($data, $where);
}

public function insert($data = NULL, bool $returnID = true)
{
    if ($data === NULL) {
        throw new \InvalidArgumentException('Data cannot be NULL.');
    }

    $this->db->table('keranjang')->insert($data);

    // Optionally, return the ID of the inserted row
    if ($returnID) {
        return $this->db->insertID();
    }

    return true;
}

public function logActivity($user_id, $activity, $description) {
    date_default_timezone_set('Asia/Jakarta'); // Set timezone ke WIB
    $timestamp = date('Y-m-d H:i:s'); // Waktu dalam WIB

    $data = [
        'user_id' => $user_id,
        'activity' => $activity,
        'description' => $description,
        'timestamp' => $timestamp, // Tambahkan timestamp ke data
    ];

    $this->db->table('activity_logs')->insert($data);
}


public function getActivityLogs() {
    $query = $this->db->table('activity_logs')
                      ->join('user', 'activity_logs.user_id = user.id_user', 'left')
                      ->select('user.username, activity_logs.activity, activity_logs.description, activity_logs.timestamp')
                      ->orderBy('activity_logs.timestamp', 'DESC')
                      ->get();

    $results = $query->getResultArray();
    return $results;
}

public function getLoginHistoryByUserId($userId)
    {
        $loginModel = new \App\Models\HsLoginModel();
        return $loginModel->where('id_users', $userId)->orderBy('login_time')->findAll();
    }
    
public function history_edit($user_id, $activity, $description) {
    date_default_timezone_set('Asia/Jakarta'); // Set timezone ke WIB
    $timestamp = date('Y-m-d H:i:s'); // Waktu dalam WIB

    $data = [
        'user_id' => $user_id, // Pastikan nama kolom sesuai dengan tabel
        'activity' => $activity,
        'description' => $description,
        'timestamp' => $timestamp, // Tambahkan timestamp ke data
    ];

    if (!$this->db->table('history_edit')->insert($data)) {
        // Log error untuk debugging
        log_message('error', 'Failed to insert history_edit data: ' . $this->db->error());
    }
}

public function gethistoryedit() {
    // Define the query
    $builder = $this->db->table('history_edit');
    $builder->join('user', 'history_edit.user_id = user.id_user', 'left');
    $builder->select('user.username, history_edit.activity, history_edit.description, history_edit.timestamp');
    $builder->orderBy('history_edit.timestamp', 'DESC');

    $query = $builder->get();

    // Cek apakah query berhasil
    if ($query === false) {
        // Log error untuk debugging
        log_message('error', 'Query Error: ' . $this->db->getLastQuery());
        return []; // Atau handle error sesuai kebutuhan
    }

    // Retrieve results
    $results = $query->getResultArray();
    return $results;
}

public function updateRating($kode_transaksi, $data)
{
    return $this->db->table('transaksi')
                    ->where('kode_transaksi', $kode_transaksi)
                    ->update($data);
}


public function getUserById($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }


public function fetchCounts()
    {
        $model = new M_burger();

        // Fetch user count
        $userCount = $model->db->table('users')->countAllResults();

        // Fetch transaction count
        $transactionCount = $model->db->table('transaksi')->countAllResults();

        // Return counts as JSON
        return $this->response->setJSON(['users' => $userCount, 'transactions' => $transactionCount]);
    }
}