<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstituicaoModel;
use App\Models\UsuarioInstituicaoModel;
use Exception;

class UsuarioInstituicaoController extends BaseController
{

    private $route = 'usuarios-instituicao';
    private $titlePage = 'Permissões de Acesso a Instituições';
    private $dirView = 'UsuarioInstituicao';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new UsuarioInstituicaoModel();
        $data['registros'] = $model->orderBy('instituicaoId', 'ASC');

            
        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view( $this->dirView. '/list', $data);
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $data["Perfil"] = [
            [
                "id" => 1,
                "nome" => "Administrador",
            ],

            [
                "id" => 2,
                "nome" => "Tesoureiro",
            ],

            [
                "id" => 3,
                "nome" => "Secretaria",
            ],

            [
                "id" => 4,
                "nome" => "Pastor",
            ],

        ];

        $instituicaoModel = new InstituicaoModel();
        $data["Instituicao"] = $instituicaoModel->orderby("nome")->findAll();

        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["usuarioId"] = $this->request->getPost("usuarioId");
        $data["instituicaoId"] = $this->request->getPost("instituicaoId");
        $data["perfilId"] = $this->request->getPost("perfilId");
        $data["isCadastraUsuario"] = ($this->request->getPost("isCadastraUsuario") != "") ? 1 : 0;

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new UsuarioInstituicaoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url( "usuarios/". $data["usuarioId"] ."?msg=Cadastro realizado com Sucesso!"));
            } else {
                return redirect()->to(base_url( "usuarios/". $data["usuarioId"] ."?erro=Houve uma falha ao salvar."));
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

        $data["Perfil"] = [
            [
                "id" => 1,
                "nome" => "Administrador",
            ],

            [
                "id" => 2,
                "nome" => "Tesoureiro",
            ],

            [
                "id" => 3,
                "nome" => "Secretaria",
            ],

            [
                "id" => 4,
                "nome" => "Pastor",
            ],

        ];

        $model = new UsuarioInstituicaoModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new UsuarioInstituicaoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url("usuarios/". $data["usuarioId"] ."?msg=Cadastro alterado com Sucesso!"));
            } else {
                return redirect()->to(base_url( "usuarios/". $data["usuarioId"] ."?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( $this->route . "?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new UsuarioInstituicaoModel();  
        $data = $model->find($id);      

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url("usuarios/". $data["usuarioId"] ."?msg=Cadastro removido com Sucesso!"));
            } else {
                return redirect()->to(base_url( "usuarios/". $data["usuarioId"] ."?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( "usuarios/". $data["usuarioId"] ."?erro=" . $ex->getMessage()));
        }        
    }
}
