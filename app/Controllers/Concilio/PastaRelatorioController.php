<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioPastaRelatoriosModel;
use App\Models\Concilio\ConcilioModel;
use DateTime;
use Exception;

class PastaRelatorioController extends BaseController
{

    private $route = 'concilio-pasta-relatorio';
    private $titlePage = 'Pasta dos Relatórios';
    private $dirView = 'Concilio/Pasta';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioPastaRelatoriosModel();
        $data['registros'] = $model
                                    ->select("concilio_pasta_relatorio.id, concilio_pasta_relatorio.nome, concilio_pasta_relatorio.ordem, count(concilio_relatorio.id) totalArquivos")
                                    ->join("concilio_relatorio", "concilio_relatorio.pastaId = concilio_pasta_relatorio.id")
                                    ->groupBy("concilio_pasta_relatorio.id, concilio_pasta_relatorio.nome, concilio_pasta_relatorio.ordem")
                                    ->orderBy('concilio_pasta_relatorio.ordem, concilio_pasta_relatorio.nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('concilio_pasta_relatorio.nome', $this->request->getGet("nome"));
            
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

        $data["concilioId"] = $this->request->getPost("concilioId");
        $data["nome"] = $this->request->getPost("nome");
        $data["ordem"] = $this->request->getPost("ordem");
        

      
        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioPastaRelatoriosModel();
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

       

      

        $model = new ConcilioPastaRelatoriosModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioPastaRelatoriosModel();
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
        $model = new ConcilioPastaRelatoriosModel();        

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
