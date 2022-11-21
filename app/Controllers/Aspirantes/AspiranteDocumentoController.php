<?php namespace App\Controllers\Aspirantes;

use App\Controllers\BaseController;
use App\Models\Aspirante\AspiranteModel;
use App\Models\EscolaridadeModel;
use App\Models\InstituicaoModel;

class AspiranteDocumentoController extends BaseController
{
    private $rota = 'aspirante-documentos';
    private $tituloPage = 'Envio de Documentos para comissão ministerial- Aspirantes';
    private $templatePage = 'Aspirante';
    
    public function index()
    {
        $model = new AspiranteModel();
        $data['aspirante'] = $model->find(['cpf'=> $this->usuario['cpf']]);
                               
        
        $data['rota'] = $this->rota;
        $data['titlePage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;

        return view( $this->templatePage . '/list', $data);
    }
    
    public function new()
    {
        $data['titlePage'] = $this->tituloPage;
        $data['dirView'] = $this->templatePage;
        $data['route'] = $this->rota;

       

        return view($this->templatePage . '/new',$data);
    }
    
    private function getDados(){
        $data = [
            'aspiranteId'          => $this->request->getPost('aspiranteId'),
            'ano'          => $this->request->getPost('ano'),
            'arquivoEBD'          => $this->request->getPost('arquivoEBD'),
            'arquivoDizimo'          => $this->request->getPost('arquivoDizimo'),
            'arquivoRecomendacaoPastor'          => $this->request->getPost('arquivoRecomendacaoPastor'),
            'arquivoDeclaracaoConviccaoChamado'          => $this->request->getPost('arquivoDeclaracaoConviccaoChamado'),
            'arquivoMembro4anos'          => $this->request->getPost('arquivoMembro4anos'),
            'arquivoAprovacaoProbatorioConselhoLocal'          => $this->request->getPost('arquivoAprovacaoProbatorioConselhoLocal'),
            'arquivoConclusaoTeologia'          => $this->request->getPost('arquivoConclusaoTeologia'),
            'arquivoConclusaoTeologiaHistorico'          => $this->request->getPost('arquivoConclusaoTeologiaHistorico'),
            'arquivoComplementacaoTeologica'          => $this->request->getPost('arquivoComplementacaoTeologica'),
            'arquivoNascimentoCasamento'          => $this->request->getPost('arquivoNascimentoCasamento'),
            'arquivoSPC'          => $this->request->getPost('arquivoSPC'),
            'arquivoSerasa'          => $this->request->getPost('arquivoSerasa'),
            'arquivoInss'          => $this->request->getPost('arquivoInss'),
            'arquivoSubmissaoRegimeItinerante'          => $this->request->getPost('arquivoSubmissaoRegimeItinerante'),
            'arquivoProcessoJudicial'          => $this->request->getPost('arquivoProcessoJudicial'),
            'arquivoAposentado'          => $this->request->getPost('arquivoAposentado'),
            'arquivoDoenca'          => $this->request->getPost('arquivoDoenca'),
            'arquivoPsicotecnico'          => $this->request->getPost('arquivoPsicotecnico'),
            'arquivoEsposaNoiva'          => $this->request->getPost('arquivoEsposaNoiva'),
            'arquivoRG'          => $this->request->getPost('arquivoRG'),
            'arquivoCPF'          => $this->request->getPost('arquivoCPF'),
            'arquivoTituloEleitor'          => $this->request->getPost('arquivoTituloEleitor'),
            'arquivoCetificadoEscolar'          => $this->request->getPost('arquivoCetificadoEscolar'),
            'arquivoFotoPessoal'          => $this->request->getPost('arquivoFotoPessoal'),
            'arquivoFotoFamiliar'          => $this->request->getPost('arquivoFotoFamiliar'),
            'arquivoQuitacaoIWE'          => $this->request->getPost('arquivoQuitacaoIWE'),
            'arquivoEndereco'          => $this->request->getPost('arquivoEndereco'),
            'arquivoEntrevistaMinisterial'          => $this->request->getPost('arquivoEntrevistaMinisterial'),
            'criadoPor'     => $this->usuario['id'],
            'alteradoPor'   => $this->usuario['id'],
        ];

        return $data;
    }
    
    public function create()
    {
        helper(['form', 'url']);
        
        $model = new AspiranteModel();
        $data = $this->getDados();
        $save = $model->insert($data);	
        
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro realizado com Sucesso!') );

        
    }
    

    public function edit($id = null)
    {
        $model = new AspiranteModel();
        $data['entidade'] = $model->where('id', $id)->first();
        $data['rota'] = $this->rota;
        $data['titlePage'] = $this->tituloPage;
        $data['templatePage'] = $this->templatePage;
 
        return view($this->templatePage . '/edit', $data);
    }
    
    public function update($id = null)
    {
        helper(['form', 'url']);

        $model = new AspiranteModel();
        $data = $this->getDados();
        $save = $model->update($id, $data);
            
        return redirect()->to( base_url($this->rota . '/?msg=Cadastro alterado com Sucesso!') );
    }
    

    public function delete($id = null)
    {
        $model = new AspiranteModel();
        $model->delete($id); 

        return redirect()->to( base_url($this->rota . '/?msg=Cadastro removido com Sucesso!') );
    }

}