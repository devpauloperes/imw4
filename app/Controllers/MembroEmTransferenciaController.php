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

class MembroEmTransferenciaController extends BaseController
{

    private $route = 'membro-em-transferencia';
    private $titlePage = 'Membros em situação de transferência';
    private $dirView = 'MembroEmTransferencia';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new MembroModel();
        $data['registros'] = $model
            ->select("Pessoa.*, Membro.numeroRolPermanente, Instituicao.nome destino, Membro.updated_at dataPedido")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId")
            ->join("Instituicao", "Instituicao.id = Membro.instituicaoTransferenciaId")
            ->where("Membro.instituicaoId", $this->instituicao["id"])
            ->where("Membro.situacao", 5)
            ->orderBy('Pessoa.nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('Pessoa.nome', $this->request->getGet("nome"));

        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view($this->dirView . '/list', $data);
    }

}
