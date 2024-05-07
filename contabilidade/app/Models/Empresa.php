<?php

namespace App\Models;

use CodeIgniter\Model;

class Empresa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empresa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cnpj', 'nome', 'email', 'tel', 'fantasia', 'faturamento', 'funcionarios', 'tributacao', 'nfe', 'lancamento',
       
        'endereco_cep', 'endereco_rua', 'endereco_numero', 'endereco_complemento',
        'endereco_bairro', 'endereco_cidade', 'endereco_estado', 
        'natureza_juridica', 'atividade_principal_codigo', 'atividade_principal_texto', 'capital_social', 'abertura', 'tipo', 'porte',

        'cliente_id',
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
}
