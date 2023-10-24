<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'login';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'password'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function getUser($username, $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password) // NOTA: Por favor, não armazene senhas em texto simples!
                    ->first();
    }
    public function updateUsername($id, $newUsername) {
        return $this->update($id, ['username' => $newUsername]);
    }
    
    public function updatePassword($id, $newPassword) {
        return $this->update($id, ['password' => $newPassword]);
    }
}
