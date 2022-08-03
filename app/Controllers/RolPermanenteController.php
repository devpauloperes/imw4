<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MembroCapacitacaoModel;
use App\Models\MembroHistoricoModel;
use App\Models\MembroModel;
use App\Models\PessoaModel;
use App\Models\TipoMembroModel;
use DateTime;
use Exception;

class RolPermanenteController extends BaseController
{

    private $route = 'rol-permanente';
    private $titlePage = 'Rol Permanente';
    private $dirView = 'RolPermanente';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new MembroModel();
        $data['registros'] = $model
            ->select("Pessoa.*, Membro.numeroRolPermanente, Membro.dataRecepcao, Membro.dataSaida")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId")
            ->where("Membro.instituicaoId", $this->instituicao["id"])
            ->orderBy('Pessoa.nome', 'ASC');

            

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('Pessoa.nome', $this->request->getGet("nome"));

        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        

        return view($this->dirView . '/list', $data);
    }

}
