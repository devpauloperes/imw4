<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'hash', 'nome', 'cpf', 'email', 'celular', 'senha', 'isAtivo', 'created_by', 'updated_by'
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

    public function login($email, $senha){

        $usuario = $this->where("cpf", $email)
                        ->where("senha", sha1($senha) )
                        ->first();


        if ($usuario == null)
            return null;
        else 
            return $usuario;
    }

    public function jaEstaCadastrado($cpf){
        $usuario = $this->where("cpf", $cpf)
                        ->first();
        if ($usuario ==null)
            return false;
        else 
            return true;
    }

    public function buscarPorHash($hash){

        $usuario = $this->where("hash", $hash)
                        ->first();
        if ($usuario == null)
            return null;
        else 
            return $usuario;
    }

    public function buscarPorCPF($cpf){

        $usuario = $this->where("cpf", $cpf)
                        ->first();
        if ($usuario == null)
            return null;
        else 
            return $usuario;
    }
}
