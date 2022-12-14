<?php

namespace App\Models\Clerigo;

use CodeIgniter\Model;

class ClerigoDependenteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clerigo_clerigo_dependente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'clerigoId', 'nome', 'dataNascimento', 'cpf', 'arquivoCertidaoNascimento', 'arquivoRg', 'arquivoCpf', 
        'arquivoTituloEleitor', 
        'arquivoCarteiraVacina',  'created_by', 'updated_by'
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
