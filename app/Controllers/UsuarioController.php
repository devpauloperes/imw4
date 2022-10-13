<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioInstituicaoModel;
use App\Models\UsuarioModel;
use Exception;

class UsuarioController extends BaseController
{

    private $route = 'usuarios';
    private $titlePage = 'Usuários do Sistema';
    private $dirView = 'Usuario';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new UsuarioModel();
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

        $data["Perfil"] = [
            [
                "id" => 1,
                "nome" => "Administrador",
            ],

            [
                "id" => 2,
                "nome" => "SD",
            ],

            [
                "id" => 3,
                "nome" => "Pastor",
            ],
            
            [
                "id" => 4,
                "nome" => "Tesoureiro",
            ],

        

        ];

        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["perfilId"] = $this->request->getPost("perfilId");
        $data["hash"] = sha1($this->request->getPost("cpf"));
        $data["nome"] = $this->request->getPost("nome");
        $data["cpf"] = preg_replace('/[^0-9]/', '', $this->request->getPost("cpf")) ;
        $data["email"] = $this->request->getPost("email");
        $data["celular"] = $this->request->getPost("celular");
        $data["senha"] = sha1($this->request->getPost("senha"));
        $data["isAtivo"] = ($this->request->getPost("isAtivo") != null) ? 1 : 0;
        $data["isSuperUsuario"] = ($this->request->getPost("isSuperUsuario") != null) ? 1 : 0;


        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new UsuarioModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            $id = $model->insert($data);
            if ($id) {
                return redirect()->to(base_url( $this->route ."/". $id ."?msg=Cadastro realizado com Sucesso!"));
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

        $data["Perfil"] = [
            [
                "id" => 1,
                "nome" => "Administrador",
            ],

            [
                "id" => 2,
                "nome" => "SD",
            ],

            [
                "id" => 3,
                "nome" => "Pastor",
            ],
            
            [
                "id" => 4,
                "nome" => "Tesoureiro",
            ],        

        ];

        

        $usuarioInstituicaoModel = new UsuarioInstituicaoModel();
        $data["UsuarioInstituicao"] = $usuarioInstituicaoModel  ->where("usuarioId", $id)
                                                                ->join("Instituicao", "Instituicao.id = Usuario_Instituicao.instituicaoId")
                                                                ->select("Usuario_Instituicao.*, Instituicao.nome instituicaoNome")
                                                                ->findAll();

        $model = new UsuarioModel();
        $data['entidade'] = $model->where('id', $id)->first();

        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new UsuarioModel();
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
        $model = new UsuarioModel();        

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
