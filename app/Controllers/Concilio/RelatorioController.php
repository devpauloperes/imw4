<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioRelatoriosModel;
use App\Models\Concilio\ConcilioModel;
use App\Models\Concilio\ConcilioPastaRelatoriosModel;
use DateTime;
use Exception;

class RelatorioController extends BaseController
{

    private $route = 'concilio-relatorio';
    private $titlePage = 'Relatórios';
    private $dirView = 'Concilio/Relatorios';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new ConcilioRelatoriosModel();
        $data['registros'] = $model
            ->select("concilio_relatorio.id, concilio_relatorio.nome, concilio_relatorio.ordem, concilio_pasta_relatorio.nome as pasta, count(concilio_contador_click_relatorio.id) as visualizacoes")
            ->join("concilio_pasta_relatorio", "concilio_pasta_relatorio.id = concilio_relatorio.pastaId")
            ->join("concilio_contador_click_relatorio", "concilio_contador_click_relatorio.relatorioId = concilio_relatorio.id")
            ->groupBy("concilio_relatorio.id, concilio_relatorio.nome, concilio_relatorio.ordem, concilio_pasta_relatorio.nome")
            ->orderBy('concilio_relatorio.nome, concilio_pasta_relatorio.ordem, concilio_pasta_relatorio.nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('concilio_pasta_relatorio.nome', $this->request->getGet("nome"));

        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view($this->dirView . '/list', $data);
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $model = new ConcilioPastaRelatoriosModel();
        $data["Pasta"] = $model->findAll();




        return view($this->dirView . '/new', $data);
    }

    private function getDados()
    {

        //``, `nome`, ``, `arquivo`, `ordem`

        $data["pastaId"] = $this->request->getPost("pastaId");
        $data["nome"] = $this->request->getPost("nome");
        $data["descricao"] = $this->request->getPost("descricao");
        $data["ordem"] = $this->request->getPost("ordem");

        $img = $this->request->getFile('arquivo');
        if ($img != null &&  $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Relatorio/', $newName);
            $data["arquivo"] = $newName;
        }


        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ConcilioRelatoriosModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro realizado com Sucesso!"));
            } else {
                return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao salvar."));
            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }
    }


    public function edit($id = null)
    {
        helper(['form', 'url']);
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $model = new ConcilioPastaRelatoriosModel();
        $data["Pasta"] = $model->findAll();





        $model = new ConcilioRelatoriosModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view($this->dirView . '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ConcilioRelatoriosModel();
        $data = $this->getDados();
        $data["updated_by"] = $this->usuario["id"];

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro alterado com Sucesso!"));
            } else {
                return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao alterar."));
            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }
    }


    public function delete($id = null)
    {
        $model = new ConcilioRelatoriosModel();

        try {

            if ($model->delete($id)) {
                return redirect()->to(base_url($this->route . "?msg=Cadastro removido com Sucesso!"));
            } else {
                return redirect()->to(base_url($this->route . "?erro=Houve uma falha ao remover."));
            }
        } catch (Exception $ex) {
            return redirect()->to(base_url($this->route . "?erro=" . $ex->getMessage()));
        }
    }
}
