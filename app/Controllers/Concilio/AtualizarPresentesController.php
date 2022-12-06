<?php

namespace App\Controllers\Concilio;

use App\Controllers\BaseController;
use App\Models\Concilio\ConcilioConciliaresModel;
use App\Models\Concilio\ConcilioVotacaoModel;
use DateTime;
use Exception;

class AtualizarPresentesController extends BaseController
{

    private $route = 'concilio-lista-presentes';
    private $titlePage = 'Conciliares Presentes para votação';
    private $dirView = 'Concilio/Presentes';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $client = \Config\Services::curlrequest();

       //$resp = $client->request('GET', 'https://imw.azurewebsites.net/concilio/4/api/participantes', ['Ispresente_IsLike' => 1]);
       $resp = $client->request('GET', 'https://imw.azurewebsites.net/concilio/4/api/participantes?Ispresente_IsLike=1', []);

       $presentes = json_decode($resp->getBody());

       $model = new ConcilioVotacaoModel();
       $votacoesAbertas = $model->where('isVotacaoAberta', 1)->findAll();

       foreach ($votacoesAbertas as $v) {
            $v["corun"] =  $presentes->totalResults;
            $model->update($v["id"], $v);
       }

       $data["Presentes"] = $presentes->totalResults;

        return view( $this->dirView. '/list', $data);
    }

    

    
}
