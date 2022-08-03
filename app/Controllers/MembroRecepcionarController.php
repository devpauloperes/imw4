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

class MembroRecepcionarController extends BaseController
{

    private $route = 'membro-recepcionar';
    private $titlePage = 'Recepcionar membros em situação de transferência';
    private $dirView = 'MembroRecepcionar';

    public function index()
    {
        $data["titlePage"]  = $this->titlePage;
        $data["route"]      = $this->route;

        $model = new MembroModel();
        $data['registros'] = $model
            ->select("Pessoa.*, Membro.numeroRolPermanente, Instituicao.nome destino, Membro.updated_at dataPedido")
            ->join("Pessoa", "Pessoa.id = Membro.pessoaId")
            ->join("Instituicao", "Instituicao.id = Membro.instituicaoTransferenciaId")
            ->where("Membro.instituicaoTransferenciaId", $this->instituicao["id"])
            ->where("Membro.situacao", 5)
            ->orderBy('Pessoa.nome', 'ASC');

        //caso seja necessário pesquisar por nome
        if ($this->request->getGet("nome"))
            $data['registros'] = $data['registros']->like('Pessoa.nome', $this->request->getGet("nome"));

        $data['registros']  =  $data['registros']->paginate(env('registros.por.pagina'));
        $data['pager'] = $model->pager;

        return view($this->dirView . '/list', $data);
    }

    public function edit($id)
    {

        $membroModel = new MembroModel();
        $membro = $membroModel->find($id);

        if ($membro != null) {
            //criar um histórico
            $model = new MembroHistoricoModel();
            $data["membroId"] = $id;
            $data["tipoHistorico"] = 5;
            $data["dataHistorico"] = date("Y-m-d");
            $data["instituicaoOrigemId"] = $membro["instituicaoId"];
            $data["instituicaoDestinoId"] = $membro["instituicaoTransferenciaId"];
            $data["descricao"] = "Transferência efetivada pelo usuário " . $this->usuario["nome"] . " em " . date("d/m/Y H:m");                
            $data["created_by"] = $this->usuario["id"];

            //atualizar estado do membro
            $modelMembro = new MembroModel();
            $membro = $modelMembro->find($data["membroId"]);
            $membro["situacao"] = 1;
            $membro["instituicaoId"] = $this->instituicao["id"];
            $membro["instituicaoTransferenciaId"] = null;

            $membro["updated_by"] = $this->usuario["id"];

            try {
                if ($model->insert($data)) {
                    $modelMembro->update($membro["id"], $membro);
                    return redirect()->to(base_url( $this->route ."/". "?msg=Membro recepcionado com sucesso"));
                } else {
                    return redirect()->to(base_url($this->route ."/". "?erro=Houve uma falha ao salvar."));
                }
                
            } catch (Exception $ex) {
                return redirect()->to(base_url( $this->route . "/". "?erro=" . $ex->getMessage()));
            }
                       
        }
    }
}
