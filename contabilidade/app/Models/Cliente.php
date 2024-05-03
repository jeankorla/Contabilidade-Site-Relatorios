<?php

namespace App\Models;

use CodeIgniter\Model;

class Cliente extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cliente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id', 'motivo_contato', 'nome_contato', 'email_contato', 'tel_contato', 'cpf_contato', 'cnpj',
        'nome_empresa', 'faturamento', 'funcionarios', 'tributacao', 'nfe', 'lancamento',
        'endereco_empresa_estado', 'created_at', 'updated_at', 'deleted_at',
        'endereco_empresa_cep', 'endereco_empresa_rua', 'endereco_empresa_numero',
        'endereco_empresa_bairro', 'endereco_empresa_cidade', 'socio_nome',
        'socio_nacional', 'socio_idade', 'socio_rg', 'socio_cpf', 'socio_endereco_cep',
        'socio_endereco_estado', 'socio_endereco_cidade', 'socio_endereco_bairro',
        'socio_endereco_rua', 'socio_endereco_numero', 'honorario', 'honorario_texto',
        'inicio_contabilidade', 'competencia'
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
