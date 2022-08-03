<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MembroCapacitacaoModel;
use App\Models\MembroHistoricoModel;
use App\Models\MembroModel;
use App\Models\PessoaModel;
use App\Models\ProfissaoModel;
use App\Models\TipoMembroModel;
use DateTime;
use Exception;

class CongregadosController extends BaseController
{

    private $route = 'membro';
    private $titlePage = 'Congregados';
    private $dirView = 'Congregado';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new PessoaModel();
        $data['registros'] = $model
            ->select("Pessoa.*")
            ->join("Membro", "Membro.pessoaId = Pessoa.id", "left")
            ->where("Pessoa.instituicaoId", $this->instituicao["id"])
            ->where("Pessoa.isAtivo", true)
            ->where("Membro.id", null)
            ->orderBy('Pessoa.nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('Pessoa.nome', $this->request->getGet("nome"));

        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view($this->dirView . '/list', $data);
    }

}
