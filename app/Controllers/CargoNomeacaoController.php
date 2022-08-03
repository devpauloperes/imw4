<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CargoNomeacaoModel;
use App\Models\InstituicaoModel;
use Exception;

class CargoNomeacaoController extends BaseController
{

    private $route = 'cargo-nomeacao';
    private $titlePage = 'Cargos para Nomeação';
    private $dirView = 'CargoNomeacao';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new CargoNomeacaoModel();
        $data['registros'] = $model->orderBy('nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('nome', $this->request->getGet("nome"));
            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view( $this->dirView. '/list', $data);
    }

    private function getInstituicao(){
        $instituicaoModel = new InstituicaoModel();
        return $instituicaoModel->findAll();
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $data["Instituicao"] = $this->getInstituicao();

        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["nome"] = $this->request->getPost("nome");
        $data["mandato"] = $this->request->getPost("mandato");
        $data["tipoInstituicaoId"] = $this->request->getPost("tipoInstituicaoId");
        $data["quemConcorre"] = $this->request->getPost("quemConcorre");

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new CargoNomeacaoModel();
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

        $data["Instituicao"] = $this->getInstituicao();

        $model = new CargoNomeacaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new CargoNomeacaoModel();
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
        $model = new CargoNomeacaoModel();        

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
