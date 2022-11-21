<?php

namespace App\Models\Aspirante;

use CodeIgniter\Model;

class AspiranteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aspirante_aspirante';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome', 'nomePai', 'nomeMae', 'dataNascimento', 'email', 'nacionalidade', 'escolaridadeId', 'sexo', 
        'estadoCivil', 'nomeConjuge', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 
        'pais', 'telefone', 'celular', 'igrejaId', 'cpf', 'created_by', 'updated_by'
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
