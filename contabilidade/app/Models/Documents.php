<?php

namespace App\Models;

use CodeIgniter\Model;

class Documents extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'documents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'social_registrado', 'certificado_digital', 'senha_certificado_digital', 'posto_fiscal', 'simples_nacional',
        'prefeitura_nfse', 'prefeitura_pf', 'previdencia_social', 'ctps', 'convencao_coletiva', 'alvara_funcionamento',
        'balancete_ultimo', 'balanco_patrimonial', 'livro_corrente', 'livro_encerrado',

        'empresa_id',
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
