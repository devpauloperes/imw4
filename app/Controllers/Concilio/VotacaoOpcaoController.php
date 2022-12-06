<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioVotacaoModel;
use App\Models\Concilio\ConcilioVotacaoOpcaoModel;
use Exception;

class VotacaoOpcaoController extends BaseController
{

    private $route = 'concilio-votacao-opcao';
    private $titlePage = 'Opções de Votações';
    private $dirView = 'Concilio/VotacaoOpcao';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioVotacaoOpcaoModel();
        $data['registros'] = $model->where("votacaoId", $this->request->getGet("votacaoId"))->orderBy('ordem, nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('nome', $this->request->getGet("nome"));
            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        $votacaoModel = new ConcilioVotacaoModel();
        $data["Votacao"] = $votacaoModel->find($this->request->getGet("votacaoId"));


        return view( $this->dirView. '/list', $data);
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        

       
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {
       

        $data["votacaoId"] = $this->request->getPost("votacaoId");
        $data["nome"] = $this->request->getPost("nome");
        $data["ordem"] = $this->request->getPost("ordem");
        
        $img = $this->request->getFile('foto');
        if ( $img != null &&  $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Voto/', $newName);
            $data["foto"] = $newName;
        }

      
        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioVotacaoOpcaoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url( $this->route . "?msg=Cadastro realizado com Sucesso!&votacaoId=" . $data["votacaoId"]));
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

        $model = new ConcilioVotacaoOpcaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioVotacaoOpcaoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro alterado com Sucesso!&votacaoId=" . $data["votacaoId"]));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new ConcilioVotacaoOpcaoModel();   
        $data = $model->where('id', $id)->first();     

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro removido com Sucesso!&votacaoId=" . $data["votacaoId"]));
            } else {
                return redirect()->to(base_url( $this->route . "?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }        
    }
}
