<?php

namespace App\Controllers\Clerigo;

use App\Controllers\BaseController;
use App\Models\Clerigo\ClerigoDependenteModel;
use DateTime;
use Exception;

class ClerigoDependenteController extends BaseController
{

    private $route = 'clerigo-dependente';
    private $titlePage = 'Dependentes';
    private $dirView = 'Clerigo/Dependente';

    public function index()
    {
        return "";
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

        $data["clerigoId"] = $this->request->getPost("clerigoId");
        $data["nome"] = $this->request->getPost("nome");
        $data["cpf"] =  preg_replace('/[^0-9]/', '', $this->request->getPost("cpf"));
        
        if ($this->request->getPost('dataNascimento') != "") {
            $dataCapacitacao = DateTime::createFromFormat('d/m/Y', $this->request->getPost('dataNascimento'));
            $data["dataNascimento"] = date_format($dataCapacitacao, "Y-m-d");
        }

        $img = $this->request->getFile('arquivoCertidaoNascimento');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Dependente/', $newName);
            $data["arquivoCertidaoNascimento"] = $newName;
        }
        
        $img = $this->request->getFile('arquivoRg');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Dependente/', $newName);
            $data["arquivoRg"] = $newName;
        }
        
        $img = $this->request->getFile('arquivoCpf');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Dependente/', $newName);
            $data["arquivoCpf"] = $newName;
        }
        
        $img = $this->request->getFile('arquivoTituloEleitor');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Dependente/', $newName);
            $data["arquivoTituloEleitor"] = $newName;
        }
        
        
        $img = $this->request->getFile('arquivoCarteiraVacina');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Dependente/', $newName);
            $data["arquivoCarteiraVacina"] = $newName;
        }
        

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ClerigoDependenteModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?msg=Cadastro realizado com Sucesso!#dependentes"));
            } else {
                return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?erro=Houve uma falha ao salvar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?erro=" . $ex->getMessage()));
        }
        
    }


    public function edit($id = null)
    {
        helper(['form', 'url']);
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;


        $model = new ClerigoDependenteModel();
        $data['entidade'] = $model->where('id', $id)->first();


        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ClerigoDependenteModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?msg=Cadastro alterado com Sucesso!#dependentes"));
            } else {
                return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new ClerigoDependenteModel(); 
        $data = $model->find($id);       

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?msg=Cadastro removido com Sucesso!#dependentes"));
            } else {
                return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?erro=" . $ex->getMessage()));
        }        
    }
}
