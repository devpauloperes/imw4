<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstituicaoModel;
use App\Models\MembroCapacitacaoModel;
use App\Models\MembroHistoricoModel;
use App\Models\MembroModel;
use DateTime;
use Exception;

class MembroCancelarTransferenciaController extends BaseController
{

    private $route = 'membro-cancelar-transferencia';
    private $titlePage = 'Cancelar Transferência Membro';
    private $dirView = 'MembroCancelarTransferencia';

    public function index()
    {
        helper(['form', 'url']);

        $membroId = $this->request->getGet("membroId");

        //altera o status para ativo
        //atualizar estado do membro
        $modelMembro = new MembroModel();
        $membro = $modelMembro->find($membroId);
        $membro["situacao"] = 1;        

        //gera o histórico de cancelamento


        $model = new MembroHistoricoModel();
        $data["membroId"] = $membroId;
        
        if ($this->request->getPost('dataHistorico') != "") {
            $dataHistorico = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataHistorico'));
            $data["dataHistorico"] = date_format($dataHistorico, "Y-m-d");
        }

        $data["dataHistorico"] = date("Y-m-d");
        $data["tipoHistorico"] = 6;
        $data["instituicaoOrigemId"] = $this->instituicao["id"];
        $data["instituicaoDestinoId"] = $this->instituicao["id"];
        $data["descricao"] = "Transferência cancelada pelo usuário " . $this->usuario["nome"] . " em " . date("d/m/Y H:m");                
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                $modelMembro->update($membro["id"], $membro);
                return redirect()->to(base_url( "membro/". $data["membroId"] ."?msg=Cadastro realizado com Sucesso!#capacitacoes"));
            } else {
                return redirect()->to(base_url("membro/". $data["membroId"] ."?erro=Houve uma falha ao salvar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( "membro/". $data["membroId"] ."?erro=" . $ex->getMessage()));
        }
    }

    public function new()
    {
        return "not implemented";
    }

    

    public function create()
    {
        return "not implemented";
        
    }


    public function edit($id = null)
    {
        return "Not implemented";
    }

    public function update($id = null)
    {
        return "Not implemented";

        
    }


    public function delete($id = null)
    {
        return "Not implemented";      
    }
}
