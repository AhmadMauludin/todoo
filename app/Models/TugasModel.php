<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table = 'tugas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tugas', 'tanggal', 'waktu', 'status', 'foto'];

    public function search($keyword, $perPage)
    {
        return $this->like('tugas', $keyword)
            ->orLike('tanggal', $keyword)
            ->orLike('status', $keyword)
            ->paginate($perPage);
    }
}
