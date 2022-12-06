<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioConciliaresModel;
use App\Models\Concilio\ConcilioModel;
use DateTime;
use Exception;

class ConciliaresController extends BaseController
{

    private $route = 'concilio-conciliares';
    private $titlePage = 'Conciliares';
    private $dirView = 'Concilio/Conciliares';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioConciliaresModel();
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

        $model = new ConcilioModel();
        $data["Concilio"] = $model->findAll();

       

       
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {
        //`concilioId`, `nome`, ``, ``, `email`, `cidade`, `estado`, `Distrito`, `Igreja`, `senha`

        $data["concilioId"] = $this->request->getPost("concilioId");
        $data["nome"] = $this->request->getPost("nome");
        $data["cpf"] = preg_replace('/[^0-9]/', '', $this->request->getPost("cpf"));
        $data["celular"] = $this->request->getPost("celular");
        $data["email"] = $this->request->getPost("email");
        $data["cidade"] = $this->request->getPost("cidade");
        $data["estado"] = $this->request->getPost("estado");
        $data["distrito"] = $this->request->getPost("distrito");
        $data["igreja"] = $this->request->getPost("igreja");
        
        if ($this->request->getPost("senha") != ""){
            $data["senha"] = $this->request->getPost("senha");
        }

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioConciliaresModel();
        $data = $this->getDados();
        $data["senha"] = $this->request->getPost("senha");
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
        $data["Concilio"] = $model->findAll();

       

      

        $model = new ConcilioConciliaresModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioConciliaresModel();
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
        $model = new ConcilioConciliaresModel();        

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
