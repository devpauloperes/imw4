<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstituicaoModel;
use App\Models\MembroCapacitacaoModel;
use DateTime;
use Exception;

class MembroCapacitacaoController extends BaseController
{

    private $route = 'membro-capacitacao';
    private $titlePage = 'Capacitação do Membro';
    private $dirView = 'MembroCapacitacao';

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
        $data["Instituicao"] = $instituicaoModel->orderBy("nome")->findAll();
        
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["membroId"] = $this->request->getPost("membroId");
        
        if ($this->request->getPost('dataCapacitacao') != "") {
            $dataCapacitacao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataCapacitacao'));
            $data["dataCapacitacao"] = date_format($dataCapacitacao, "Y-m-d");
        }
        $data["nome"] = $this->request->getPost("nome");
        $data["cargaHoraria"] = $this->request->getPost("cargaHoraria");
        $data["isIWE"] = $this->request->getPost("isIWE");

        $img = $this->request->getFile('certificado');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Certificado/', $newName);
            $data["certificado"] = $newName;
        }
        

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new MembroCapacitacaoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
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
        helper(['form', 'url']);
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $data["Boleano"] = [
            ["id" => 0,"nome" => "Não"],
            ["id" => 1,"nome" => "Sim"],
        ];

        

        $model = new MembroCapacitacaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->orderBy("nome")->findAll();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new MembroCapacitacaoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url("membro/". $data["membroId"] ."?msg=Cadastro alterado com Sucesso!#capacitacoes"));
            } else {
                return redirect()->to(base_url( "membro/". $data["membroId"] ."?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("membro/". $data["membroId"] ."?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new MembroCapacitacaoModel(); 
        $data = $model->find($id);       

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url("membro/". $data["membroId"] ."?msg=Cadastro removido com Sucesso!#capacitacoes"));
            } else {
                return redirect()->to(base_url( "membro/". $data["membroId"] ."?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("membro/". $data["membroId"] ."?erro=" . $ex->getMessage()));
        }        
    }
}
