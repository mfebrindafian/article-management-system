<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterStatusModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_status';
    protected $allowedFields = ['status'];

    public function getListStatus()
    {
        return $this
            ->table($this->table)
            ->select('id')
            ->select('status')
            ->get()
            ->getResultArray();
    }
}
