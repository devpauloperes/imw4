<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipoInstituicaoModel;
use Exception;

class NomeacaoController extends BaseController
{

    private $route = 'nomeacao';
    private $titlePage = 'Nomeações';
    private $dirView = 'Nomeacao';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new TipoInstituicaoModel();
        $data['registros'] = $model->orderBy('hierarquia', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('nome', $this->request->getGet("nome"));
            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

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

        $data["nome"] = $this->request->getPost("nome");
        $data["cor"] = $this->request->getPost("cor");
        $data["sigla"] = $this->request->getPost("sigla");
        $data["hierarquia"] = $this->request->getPost("hierarquia");

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new TipoInstituicaoModel();
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

        

        $model = new TipoInstituicaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new TipoInstituicaoModel();
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
        $model = new TipoInstituicaoModel();        

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
