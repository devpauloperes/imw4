<?php

namespace App\Controllers\Clerigo;

use App\Controllers\BaseController;
use App\Models\Clerigo\ClerigoCurriculoAreaCapacitacaoModel;
use App\Models\Clerigo\ClerigoCurriculoModel;
use App\Models\Clerigo\ClerigoCurriculoTipoCapacitacaoModel;
use DateTime;
use Exception;

class ClerigoCurriculoController extends BaseController
{

    private $route = 'clerigo-curriculo';
    private $titlePage = 'Currículo';
    private $dirView = 'Clerigo/Curriculo';

    public function index()
    {
        return "";
    }

    public function new()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;
        $data["dirView"]      = $this->dirView;

        $areaModel = new ClerigoCurriculoAreaCapacitacaoModel();
        $data["area"] = $areaModel->findAll();

        $tipoModel = new ClerigoCurriculoTipoCapacitacaoModel();
        $data["tipo"] = $tipoModel->findAll();
        
        return view( $this->dirView. '/new', $data);
    }

    private function getDados()
    {

        $data["clerigoId"] = $this->request->getPost("clerigoId");
        $data["tipoCapacitacaoId"] = $this->request->getPost("tipoCapacitacaoId");
        $data["areaCapacitacaoId"] = $this->request->getPost("areaCapacitacaoId");
        $data["nome"] = $this->request->getPost("nome");
        $data["cargaHoraria"] = $this->request->getPost("cargaHoraria");
        
        $img = $this->request->getFile('certificado');
        if ($img != null && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'public/uploads/Certificado/', $newName);
            $data["certificado"] = $newName;
        }
        

        return $data;
    }

    public function create()
    {
        helper(['form', 'url']);

        $model = new ClerigoCurriculoModel();
        $data = $this->getDados();
        $data["created_by"] = $this->usuario["id"];

        try {
            if ($model->insert($data)) {
                return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?msg=Cadastro realizado com Sucesso!#curriculo"));
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


        $areaModel = new ClerigoCurriculoAreaCapacitacaoModel();
        $data["area"] = $areaModel->findAll();

        $tipoModel = new ClerigoCurriculoTipoCapacitacaoModel();
        $data["tipo"] = $tipoModel->findAll();


        $model = new ClerigoCurriculoModel();
        $data['entidade'] = $model->where('id', $id)->first();


        return view( $this->dirView. '/edit', $data);
    }

    public function update($id = null)
    {
        $model = new ClerigoCurriculoModel();
        $data = $this->getDados(); 
        $data["updated_by"] = $this->usuario["id"];       

        try {

            if ($model->update($id, $data)) {
                return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?msg=Cadastro alterado com Sucesso!#curriculo"));
            } else {
                return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?erro=Houve uma falha ao alterar."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?erro=" . $ex->getMessage()));
        }

        
    }


    public function delete($id = null)
    {
        $model = new ClerigoCurriculoModel(); 
        $data = $model->find($id);       

        try {
            
            if ($model->delete($id)) {
                return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?msg=Cadastro removido com Sucesso!#curriculo"));
            } else {
                return redirect()->to(base_url( "clerigos/". $data["clerigoId"] ."?erro=Houve uma falha ao remover."));
            }
            
        } catch (Exception $ex) {
            return redirect()->to(base_url("clerigos/". $data["clerigoId"] ."?erro=" . $ex->getMessage()));
        }        
    }
}
