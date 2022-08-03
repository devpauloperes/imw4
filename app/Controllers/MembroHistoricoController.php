<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstituicaoModel;
use App\Models\MembroHistoricoModel;
use DateTime;
use Exception;

class MembroHistoricoController extends BaseController
{

    private $route = 'membro-historico';
    private $titlePage = 'Histórico do Membro';
    private $dirView = 'MembroHistorico';
    

    public function index()
    {
        return "";
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->where("tipoInstituicaoId", 8)->orderBy("nome")->findAll();

        $data["TipoHistorico"] = [
            ["id" => 1, "nome" => "Em Transferência"],
            ["id" => 2, "nome" => "Recebido por batismo"],
            ["id" => 3, "nome" => "Recebido por Adesão"],           
            ["id" => 4, "nome" => "Recebido por Reconciliação"],           
            ["id" => 5, "nome" => "Recebido por transferência"],           
            ["id" => 6, "nome" => "Desligado"],
        ];

        $data["MotivoExclusao"] = [
            ["id" => 1, "nome" => "I - A pedido"],
            ["id" => 2, "nome" => "II - Abandono"],
            ["id" => 3, "nome" => "III - Falecimento"],
            ["id" => 4, "nome" => "IV - Justa Causa"],
            ["id" => 5, "nome" => "V - Divórcio"],
        ];

        
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["membroId"] = $this->request->getPost("membroId");
        
        if ($this->request->getPost('dataHistorico') != "") {
            $dataHistorico = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataHistorico'));
            $data["dataHistorico"] = date_format($dataHistorico, "Y-m-d");
        }
        $data["instituicaoOrigemId"] = $this->request->getPost("instituicaoOrigemId");
        $data["instituicaoDestinoId"] = $this->request->getPost("instituicaoDestinoId");
        $data["descricao"] = $this->request->getPost("descricao");
        $data["motivoExclusaoId"] = $this->request->getPost("motivoExclusaoId");

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new MembroHistoricoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url( "membro/". $data["membroId"] ."?msg=Cadastro realizado com Sucesso!#historicos"));
            } else {
                return redirect()->to(base_url("membro/". $data["membroId"] ."?erro=Houve uma falha ao salvar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( "membro/". $data["membroId"] ."?erro=" . $ex->getMessage()));
        }
        
    }


    public function edit($id = null)
    {
        helper(['form', 'url']);
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        

        $model = new MembroHistoricoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->orderBy("nome")->findAll();

        $data["TipoHistorico"] = [
            ["id" => 1, "nome" => "Transferência"],
            ["id" => 2, "nome" => "Recebido por batismo"],
            ["id" => 3, "nome" => "Recebido por Adesão"],           
            ["id" => 4, "nome" => "Recebido por Reconciliação"],           
            ["id" => 5, "nome" => "Recebido por transferência"],           
            ["id" => 6, "nome" => "Desligado"],
        ];

        $data["MotivoExclusao"] = [
            ["id" => 1, "nome" => "I - A pedido"],
            ["id" => 2, "nome" => "II - Abandono"],
            ["id" => 3, "nome" => "III - Falecimento"],
            ["id" => 4, "nome" => "IV - Justa Causa"],
            ["id" => 5, "nome" => "V - Divórcio"],
        ];

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new MembroHistoricoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url("membro/". $data["membroId"] ."?msg=Cadastro alterado com Sucesso!#historicos"));
            } else {
                return redirect()->to(base_url( "membro/". $data["membroId"] ."?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("membro/". $data["membroId"] ."?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new MembroHistoricoModel(); 
        $data = $model->find($id);       

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url("membro/". $data["membroId"] ."?msg=Cadastro removido com Sucesso!#historicos"));
            } else {
                return redirect()->to(base_url( "membro/". $data["membroId"] ."?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("membro/". $data["membroId"] ."?erro=" . $ex->getMessage()));
        }        
    }
}
