<?php

namespace App\Controllers\Clerigo;

use App\Controllers\BaseController;
use App\Models\Clerigo\ClerigoModel;
use App\Models\Clerigo\TipoClerigoModel;
use DateTime;
use Exception;

class ClerigoCarteiraMinisterialController extends BaseController
{

    private $route = 'clerigo-carteira-ministerial';
    private $titlePage = 'Carteira Ministerial';
    private $dirView = 'Clerigo/CarteiraMinisterial';

    public function index($id = 0)
    {

        $model = new ClerigoModel();
        $data['clerigo'] = $model
                            ->where('id', $id)->first();

        $tipoModel = new TipoClerigoModel();
        $data["cargo"] = $tipoModel->find($data['clerigo']["tipoClerigoId"]);



        return view( $this->dirView. '/list', $data);
    }

    
}
