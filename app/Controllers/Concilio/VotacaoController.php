<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioModel;
use App\Models\Concilio\ConcilioVotacaoModel;
use Exception;

class VotacaoController extends BaseController
{

    private $route = 'concilio-votacao';
    private $titlePage = 'Votações';
    private $dirView = 'Concilio/Votacao';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioVotacaoModel();
        $data['votos'] = $model
        ->select("concilio_votacao.id votacaoId, concilio_votacao_opcao.nome candidato, count(concilio_votacao_voto.id) votos ")
        ->join("concilio_votacao_opcao", "concilio_votacao_opcao.votacaoId = concilio_votacao.id")
        ->join("concilio_votacao_voto", "concilio_votacao_voto.votacaoOpcaoId = concilio_votacao_opcao.id")
        ->groupBy("concilio_votacao.id, concilio_votacao.nome, concilio_votacao.isVotacaoAberta , concilio_votacao_opcao.nome")

        ->orderBy('concilio_votacao.nome', 'ASC')
        ->findAll();

        $data['registros'] = $model->orderby("nome");

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('concilio_votacao.nome', $this->request->getGet("nome"));
            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        //var_dump($data['registros']);

        return view( $this->dirView. '/list', $data);
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $concilioModel = new ConcilioModel();
        $data["Concilio"] = $concilioModel->findAll();

        $data["votacaoAberta"] = [
            [
                "id" => 0,
                "nome" => "Não",
            ],
            [
                "id" => 1,
                "nome" => "Sim",
            ],
        ];

       
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {
        //``, `nome`, ``, ``, ``

        $data["concilioId"] = $this->request->getPost("concilioId");
        $data["nome"] = $this->request->getPost("nome");
        $data["descricao"] = $this->request->getPost("descricao");
        $data["corun"] = $this->request->getPost("corun");
        $data["isVotacaoAberta"] = $this->request->getPost("isVotacaoAberta");

      
        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioVotacaoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url( $this->route . "?msg=Cadastro realizado com Sucesso!"));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao salvar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }
        
    }


    public function edit($id = null)
    {
        helper(['form', 'url']);
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $concilioModel = new ConcilioModel();
        $data["Concilio"] = $concilioModel->findAll();

        $data["votacaoAberta"] = [
            [
                "id" => 0,
                "nome" => "Não",
            ],
            [
                "id" => 1,
                "nome" => "Sim",
            ],
        ];

      

        $model = new ConcilioVotacaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioVotacaoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro alterado com Sucesso!"));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new ConcilioVotacaoModel();        

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro removido com Sucesso!"));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }        
    }
}
