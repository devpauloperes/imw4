<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioInformativosModel;
use App\Models\Concilio\ConcilioModel;
use DateTime;
use Exception;

class ConcilioInformativoController extends BaseController
{

    private $route = 'concilio-informativos';
    private $titlePage = 'Informativos do Concílio';
    private $dirView = 'Concilio/Informativo';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioInformativosModel();
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
        //``, `nome`, ``, ``, ``

        $data["concilioId"] = $this->request->getPost("concilioId");
        $data["nome"] = $this->request->getPost("nome");
        $data["subtitulo"] = $this->request->getPost("subtitulo");
        $data["texto"] = $this->request->getPost("texto");
        

        if ($this->request->getPost('dataInforme') != "") {
            $dataAdmisao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataInforme'));
            $data["dataInforme"] = date_format($dataAdmisao, "Y-m-d");
        }

        $img = $this->request->getFile('arquivo');
        if ( $img != null &&  $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Informativo/', $newName);
            $data["arquivo"] = $newName;
        }

      
        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioInformativosModel();
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
        $data["Concilio"] = $model->findAll();

       

      

        $model = new ConcilioInformativosModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioInformativosModel();
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
        $model = new ConcilioInformativosModel();        

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
