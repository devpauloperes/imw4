<?php

namespace App\Models;

use CodeIgniter\Model;

class InstituicaoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Instituicao';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        
        'nome', 'cnpj', 'email', 'dataAbertura', 'dataFechamento', 'tipoInstituicaoId', 'instituicaoId', 'cep', 'endereco', 
        'numero', 'complemento', 'bairro', 'cidade', 'estado', 'pais', 'telefone', 'pastorId', 'tesoureiroId', 
        'isAtivo', 'created_by', 'updated_by'
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
