<?php

namespace App\Models\Clerigo;

use CodeIgniter\Model;

class ClerigoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clerigo_clerigo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tipoClerigoId', 'dataConsagracao', 'dataOrdenacao', 'nome', 'dataNascimento', 'email', 'nacionalidade', 'escolaridadeId', 
        'sexo', 'foto', 'racaId', 'isPne', 'estadoCivil', 'nomeConjuge', 'conjugeCPF', 'conjugeRg', 'conjugeRgDataEmissao', 
        'conjugeRegimeBens', 'nomePai', 'nomeMae', 'cpf', 'rg', 'dataEmissaoRg', 'ctps', 'dataEmissaoCtps', 'pis', 'tituloEleitoral', 
        'tituloEleitoralZona', 'tituloEleitoralSecao', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'pais', 
        'telefone', 'celular', 'isFilhos', 'isAtivo', 'dataInativo', 'arquivoCtps', 'arquivoPis', 'arquivoRg', 'arquivoCpf', 
        'arquivoTituloEleitor', 'arquivoCertidaoNascimentoCasamento', 'arquivoComprovanteResidencia', 'arquivoExtratoPrevidenciario',  
        'created_by', 'updated_by'
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
