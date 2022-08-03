<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstituicaoModel;
use App\Models\MembroCapacitacaoModel;
use App\Models\MembroHistoricoModel;
use App\Models\MembroModel;
use DateTime;
use Exception;

class MembroTransferenciaController extends BaseController
{

    private $route = 'membro-transferencia';
    private $titlePage = 'Transferir Membro';
    private $dirView = 'MembroTransferencia';

    public function index()
    {
        return "";
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $data["Boleano"] = [
            ["id" => 0,"nome" => "Não"],
            ["id" => 1,"nome" => "Sim"],
        ];

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->where("tipoInstituicaoId", 8)->where("id <>", $this->instituicao["id"])->orderBy("nome")->findAll();
        
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["membroId"] = $this->request->getPost("membroId");
        
        if ($this->request->getPost('dataHistorico') != "") {
            $dataHistorico = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataHistorico'));
            $data["dataHistorico"] = date_format($dataHistorico, "Y-m-d");
        }

        $data["tipoHistorico"] = 1;
        $data["instituicaoOrigemId"] = $this->instituicao["id"];
        $data["instituicaoDestinoId"] = $this->request->getPost("instituicaoDestinoId");
        $data["descricao"] = "Transferência solicitada pelo usuário " . $this->usuario["nome"] . " em " . date("d/m/Y H:m");                

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new MembroHistoricoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        //atualizar estado do membro
        $modelMembro = new MembroModel();
        $membro = $modelMembro->find($data["membroId"]);
        $membro["situacao"] = 5;        
        $membro["instituicaoTransferenciaId"] = $data["instituicaoDestinoId"];

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
