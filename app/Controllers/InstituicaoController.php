<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstituicaoModel;
use App\Models\TipoInstituicaoModel;
use DateTime;
use Exception;

class InstituicaoController extends BaseController
{

    private $route = 'instituicao';
    private $titlePage = 'Instituições';
    private $dirView = 'Instituicao';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new InstituicaoModel();
        $data['registros'] = $model->select("Instituicao.*, TipoInstituicao.nome tipoInstituicaoNome")->join("TipoInstituicao", "TipoInstituicao.id = Instituicao.tipoInstituicaoId")->orderBy('nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('Instituicao.nome', $this->request->getGet("nome"));
            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view( $this->dirView. '/list', $data);
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;
        
        $tipoInstituicaoModel = new TipoInstituicaoModel();
        $data["TipoInstituicao"] = $tipoInstituicaoModel->findAll();

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->findAll();

        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["nome"] = $this->request->getPost("nome");
        $data["cnpj"] = preg_replace('/[^0-9]/', '', $this->request->getPost("cnpj")); 
        $data["email"] = $this->request->getPost("email");

        if ($this->request->getPost('dataAbertura') != "") {
            $dataAdmisao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataAbertura'));
            $data["dataAbertura"] = date_format($dataAdmisao, "Y-m-d");
        }

        if ($this->request->getPost('dataFechamento') != "") {
            $dataFechamento = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataFechamento'));
            $data["dataFechamento"] = date_format($dataFechamento, "Y-m-d");
        }
        
        $data["tipoInstituicaoId"] = $this->request->getPost("tipoInstituicaoId");
        $data["instituicaoId"] = $this->request->getPost("instituicaoId");
        $data["cep"] = $this->request->getPost("cep");
        $data["endereco"] = $this->request->getPost("endereco");
        $data["numero"] = $this->request->getPost("numero");
        $data["complemento"] = $this->request->getPost("complemento");
        $data["bairro"] = $this->request->getPost("bairro");
        $data["cidade"] = $this->request->getPost("cidade");
        $data["estado"] = $this->request->getPost("estado");
        $data["pais"] = $this->request->getPost("pais");
        $data["telefone"] = $this->request->getPost("telefone");
        $data["pastorId"] = $this->request->getPost("pastorId");
        $data["tesoureiroId"] = $this->request->getPost("tesoureiroId");
        
        $data["isAtivo"] = ($this->request->getPost("isAtivo") != null) ? 1 : 0;        

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new InstituicaoModel();
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

        $tipoInstituicaoModel = new TipoInstituicaoModel();
        $data["TipoInstituicao"] = $tipoInstituicaoModel->findAll();

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->findAll();

        $model = new InstituicaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new InstituicaoModel();
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
        $model = new InstituicaoModel();        

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
