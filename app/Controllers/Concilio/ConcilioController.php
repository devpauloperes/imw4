<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioModel;
use DateTime;
use Exception;

class ConcilioController extends BaseController
{

    private $route = 'concilios';
    private $titlePage = 'Concílios';
    private $dirView = 'Concilio/Concilio';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioModel();
        $data['registros'] = $model->orderBy('nome', 'ASC');

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

        $data["numero"] = $this->request->getPost("numero");
        $data["nome"] = $this->request->getPost("nome");
        $data["descricao"] = $this->request->getPost("descricao");

        if ($this->request->getPost('dataInicio') != "") {
            $dataOrdenacao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataInicio'));
            $data["dataInicio"] = date_format($dataOrdenacao, "Y-m-d");
        }

        if ($this->request->getPost('dataFim') != "") {
            $dataOrdenacao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataFim'));
            $data["dataFim"] = date_format($dataOrdenacao, "Y-m-d");
        }

      
        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioModel();
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
      

        $model = new ConcilioModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioModel();
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
        $model = new ConcilioModel();        

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
