
CREATE TABLE Escolaridade #ClerigoTipoFormacao Escolaridade?
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(100),
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TipoPrebenda
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(100) not null,
    qtdePrebenda numeric(12,1) NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ValorPrebenda
(
    id int primary key AUTO_INCREMENT NOT NULL,
    anoPrebenda varchar(4) not null,
    mesPrebenda varchar(2) NOT NULL,
    valorPrebenda decimal(9,2) NOT NULL,    

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE TipoInstituicao
(
    id int(11) primary key AUTO_INCREMENT NOT NULL,    
    nome varchar(100) NOT NULL,
    cor varchar(7),
    sigla varchar(1) not null,
    hierarquia smallint NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL

    #, CONSTRAINT FOREIGN KEY (siglaTipoInstituicaoId) REFERENCES SiglaTipoInstituicao (id) ON DELETE NO ACTION ON UPDATE NO ACTION

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Curso
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(50) not null,
    descricao text,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE FuncaoIgrejaLocal #membresia_funcaoeclesiastica
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100) not null,
    titulo varchar(10) not null,
    ordem smallint NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IgrejaSetor #membresia_setor
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100) not null,
    sigla varchar(10) not null,
    ordem smallint NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE SituacaoMembro #membresia_situacao
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(30) not null,    
    tipo varchar(1) not null,
    descricao varchar(100) not null,
    
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#parecida com a anterior
CREATE TABLE TipoAtuacaoMembro #membresia_tipoatuacao
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100),
    ordem smallint NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE Instituicao
(

    id int(11) primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100) NOT NULL,
    cnpj varchar(14),
    email varchar(255),
    nomeFantasia varchar(100),
    dataAbertura date,

    tipoInstituicaoId int NOT NULL,
    instituicaoId int,    
    
    endereco varchar(255),
    numero varchar(20),
    complemento varchar(255),
    bairro varchar(255),
    cidade varchar(255),
    cep varchar(20),
    estado varchar(2),
    pais varchar(30),
    telefone varchar(20),
    
    site varchar(200),
    
    pastor varchar(100),
    tesoureiro varchar(100),

    isInss boolean NOT NULL,
    isCaw boolean NOT NULL,
    isAtivo boolean NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL

    #, CONSTRAINT FOREIGN KEY (tipoInstituicaoId) REFERENCES TipoInstituicao (id) ON DELETE NO ACTION ON UPDATE NO ACTION
    #, CONSTRAINT FOREIGN KEY (instituicaoId) REFERENCES Instituicao (id) ON DELETE NO ACTION ON UPDATE NO ACTION

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE ClerigoCargo
(
    id int(11) primary key AUTO_INCREMENT NOT NULL,
    nome varchar(100) NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ClerigoStatus
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(100),
    codigo smallint NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#fazer upload dos ducmentos?
CREATE TABLE Clerigo
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100) NOT NULL,
    dataNascimento date,
    sexo varchar(1) NOT NULL,
    raca varchar(1),
    escolaridadeId int,
    nacionalidade varchar(2),
    naturalCidade varchar(50),
    naturalEstado varchar(2),
    estadoCivil varchar(1),
    nomeConjuge varchar(50),
    mae varchar(50),
    pai varchar(50),
    foto varchar(100),
    
    
    endereco varchar(255),
    numero varchar(20),
    complemento varchar(255),
    bairro varchar(255),
    cidade varchar(255),
    cep varchar(20),
    estado varchar(2),
    pais varchar(30),
    email varchar(255),
    
    
    telefoneAlternativo varchar(20),
    telefonePreferencial varchar(20),

    identidade varchar(30),
    identidadeOrgaoEmissor varchar(50),
    identidadeDataEmissao date,
    identidadeUf varchar(2),
    identidadeUpload varchar(255),

    cpf varchar(11),    

    inss varchar(30),
    inssUpload varchar(255),

    certidaoCivil varchar(30),
    certidaoCivilUpload varchar(255),

    ctps varchar(10),
    ctpsEmissao date,
    ctpsSerie varchar(6),
    ctpsUpload varchar(255),

    habilitacao varchar(15),
    habilitacaoCategoria varchar(2),
    habilitacaoEmissor varchar(30),
    habilitacaoUf varchar(2),
    habilitacaoUpload varchar(255),
    
    pispasep varchar(11),
    pispasepEmissao date,
    pispasepUpload varchar(255),

    reservista varchar(15),
    reservistaSecao varchar(15),
    reservistaSerie varchar(15),
    reservistaUpload varchar(255),

    tituloEleitor varchar(15),
    tituloEleitorSecao varchar(5),
    tituloEleitorZona varchar(5),
    tituloEleitorUpload varchar(255),

    isResidenciaPropria boolean NOT NULL,
    isResidenciaPropriaFgts boolean NOT NULL,
    
    isFichaCompletaOk boolean NOT NULL,

    status varchar(20), #ativo, inativo
    
    clerigoStatusId int,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE ClerigoDependente
(
    id int primary key AUTO_INCREMENT NOT NULL,
    clerigoId int references Clerigo(id),

    nome varchar(100) NOT NULL,
    parentesco varchar(1) NOT NULL,
    cpf varchar(11),
    nascimento date NOT NULL,

    isTrabalha boolean NOT NULL,
    isDeclara boolean NOT NULL,
    isEstuda boolean NOT NULL,
    
    genero varchar(1) not null,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ClerigoFuncaoMinisterial
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100) not null, #ex. Superintendente Geral
    ordem smallint NOT NULL,
    titulo varchar(20), #ex. Bp.
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE ClerigoNomeacao
(
    id int primary key AUTO_INCREMENT NOT NULL,
    clerigoId int NOT NULL,
    funcaoMinisterialId int not null,
    dataNomeacao date NOT NULL,
    dataTermino date,

    distritoId int,
    geralId int,
    igrejaId int,
    orgaoId int,
    regiaoId int,
    secretariaId int,
    instituicaoId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE ClerigoPrebenda
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    ano varchar(4),
    mes smallint,
    valor decimal(9,2) NOT NULL,
    clerigoId int NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
#contra-cheque
CREATE TABLE ClerigoRendaEclesiastica
(
    id int primary key AUTO_INCREMENT NOT NULL,
    ano smallint NOT NULL,
    mes smallint NOT NULL,
    clerigoId int NOT NULL,
    distritoId int NOT NULL,
    igrejaId int NOT NULL,
    regiaoId int NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE ClerigoRendaEclesiasticaPlanoConta
(
    id int primary key AUTO_INCREMENT NOT NULL, 
    valor decimal(9,2),
    planoContaId int NOT NULL,
    clerigoRendaEclesiasticaId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE Clerigo_ClerigoStatus
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    dataStatus date NOT NULL,
    clerigoId int NOT NULL,
    clerigoStatusId int NOT NULL,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# nao necessario
CREATE TABLE ClerigoTelefone
(
    id int primary key AUTO_INCREMENT NOT NULL,
    telefone varchar(20),
    tipo varchar(3), #fix, cel
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE ClerigoTransferencia
(
    id int primary key AUTO_INCREMENT NOT NULL,
    dataTransferencia date NOT NULL,
    deRegiaoId int NOT NULL,
    paraRegiaoId int NOT NULL,
    clerigoId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE Membro
(
    id int primary key AUTO_INCREMENT NOT NULL,
    #id uuid NOT NULL,
    nome varchar(100) not null,
    cpf varchar(11),
    documento varchar(30),
    documentoComplemento varchar(50),
    tipoDocumento varchar(3),
    sexo varchar(1) not null,
    dataNascimento date,
    nacionalidade varchar(2),
    naturalidade varchar(50),
    naturalidadeEstado varchar(2),
    mae varchar(100),
    pai varchar(100),
    senha varchar(30),

    estadoCivil varchar(1),
    conjugeNome varchar(100),
    dataCasamento date,
    filhos text,
    historicoFamiliar text,


    telefonePreferencial varchar(11),
    telefoneAlternativo varchar(11),
    telefoneWhatsapp varchar(11),
    emailPreferencial varchar(254),
    emailAlternativo varchar(254),

    cep varchar(8),
    endereco varchar(100),
    numero varchar(20),
    complemento varchar(100),
    bairro varchar(100),
    cidade varchar(100),
    estado varchar(2),
    pais varchar(50),
    

    foto varchar(100),
    historico text,
    observacoes text,
    
    escolaridadeId int,
    profissao varchar(100),    

    
    funcaoEclesiasticaId int,
    dataConversao date,
    dataBatismo date,
    dataBatismoEspirito date,
    
    vinculo varchar(1), #o que é esse vinculo?

    regiaoId int,
    distritoId int,
    igrejaId int,
    congregacaoId int,
    rolAtual int,

    status varchar(1),
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE MembroFormacaoEclesiastica #membros_formacaoeclesiastica
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    inicio date,
    termino date,
    cargaHoraria varchar(10),
    observacao varchar(256),
    cursoId int NOT NULL,
    membroId int references Membro (id),
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE MembroMinisterial #membros_ministerial
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    dataNomeacao date not null,
    dataExoneracao date,
    membroId int references Membro (id),
    igrejaSetorId int NOT NULL,
    tipoAtuacaoId int NOT NULL, #lider, vogal, vice-lider etc..
    observacao text,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE MembroRolPermanente #membros_rolpermanente
(
    id int primary key AUTO_INCREMENT NOT NULL,
    membroId int references Membro (id),
    
    status varchar(1), #A ativo, i Inativo
    numeroRol int,
    dataRecepcao date NOT NULL,
    dataExclusao date,

    clerigoId int,
    distritoId int NOT NULL,
    igrejaId int NOT NULL,
    
    modoExclusaoId int,
    modoRecepcaoId int NOT NULL,
    regiaoId int NOT NULL,
    congregacaoId int,

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
#daqui em dante, financeiro
#

CREATE TABLE FinanceiroPlanoConta #financeiro_planoconta
(
    id int primary key AUTO_INCREMENT NOT NULL,

    nome varchar(100) not null,
    posicao smallint NOT NULL,
    numeracao varchar(50) not null,
    tipo varchar(1),
    financeiroPlanoContaId int,
    isSelecionavel boolean NOT NULL,
    isEssencial boolean NOT NULL, #conta consulta do excencial = conta de luz
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE FinanceiroBanco #financeiro_banco
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(100),

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE FinanceiroCaixa #financeiro_caixa
(
    id int primary key AUTO_INCREMENT NOT NULL,
    nome varchar(100) not null,
    instituicaoId int references Instituicao (id),
    tipo varchar(1), #B = banco, S = subcaixa, P = principal, C = congregacao

    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Relatório de consolidação do caixa 
CREATE TABLE FinanceiroCotaConsolidadaMensal #financeiro_cotaconsolidadamensal
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    dataHora datetime NOT NULL, #data da consolidação
    ano smallint NOT NULL,
    mes smallint NOT NULL,
    valor decimal(9,2) NOT NULL,
    financeiroCaixaId int NOT NULL,
    financeiroCotaOrcamentariaId int NOT NULL,

    distritoId int,
    geralId int,
    igrejaId int,
    orgaoId int,
    regiaoId int,
    secretariaId int,
    instituicaoId int,

    financeiroPlanoContaId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE FinanceiroCotaOrcamentaria #financeiro_cotaorcamentaria
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    nome varchar(100) not null,
    percentual decimal(9,2) NOT NULL,
    instituicaoCredoraId int NOT NULL, 
    instituicaoPaiId int NOT NULL, #recursivo pra montar a árvore
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#uma mesma cota pode estar em várias contas do plano de conta?
CREATE TABLE FinanceiroCotaOrcamentariaPlanoConta #financeiro_cotaorcamentaria_plano_conta
(
    id int primary key AUTO_INCREMENT NOT NULL,
    financeiroCotaOrcamentariaId int NOT NULL,
    financeiroPlanocontaId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#não há lancamento futuro? De contas a vencer ou receber. Ou contas parcelas?
CREATE TABLE FinanceiroLancamento #financeiro_lancamento
(
    id int primary key AUTO_INCREMENT NOT NULL,

    paganteFavorecido varchar(200),
    
    tipoLancamento varchar(1), #E:Entrada,S:Saida
    financeiroPlanoContaId int NOT NULL,
    dataLancamento datetime NOT NULL,
    valor decimal(9,2) NOT NULL,
    dataVencimento date,
    dataPagamento date,

    #parcelado
    isParcelado boolean not null,
    parcelaNumero int,
    parcelaValorTotal decimal(9,2),


    #vinculo do lancamento
    membroId int,
    clerigoId int,
    
    descricao text,
    
    isConciliado boolean NOT NULL,
    dataConciliacao datetime,
    
    #transferencia
    dataMovimento date,
    caixaId int NOT NULL,
    financeiroLancamentoPaiId int,
    isEstornado boolean NOT NULL,
    instituicaoDestinoOrigemId int, 

    #arquivos
    arquivoFatura varchar(255),
    arquivoComprovante varchar(255),

    #vinculos
    geralId int,
    regiaoId int,
    distritoId int,
    igrejaId int,
    orgaoId int, #o que é esse orgão?
    secretariaId int,
    instituicaoId int,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE FinanceiroPlanoConta_TipoInstituicao #financeiro_planoconta_tipo_instituicao
(
    id int primary key AUTO_INCREMENT NOT NULL,
    financeiroPlanoContaId int NOT NULL,
    tipoInstituicaoId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE FinanceiroPlanoContabil #financeiro_planocontabil
(
    id int primary key AUTO_INCREMENT NOT NULL,
    numeracao varchar(50) not null,
    nome varchar(100),
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#os planos contábeis nao são iguais?
CREATE TABLE FinanceiroPlanocontabil_Instituicao #financeiro_planocontabil_instituicoes
(
    id int primary key AUTO_INCREMENT NOT NULL,
    financeiroPlanoContabilId int NOT NULL,
    instituicaoId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

#exite a necessidade do muitos para muitos?
CREATE TABLE FinanceiroPlanoContabil_PlanoConta #financeiro_planocontabil_plano_conta
(
    id int primary key AUTO_INCREMENT NOT NULL,
    financeiroPlanoContabilId int NOT NULL,
    financeiroPlanoContaId int NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE FinanceiroSaldoConsolidadoMensal 
(
    id int primary key AUTO_INCREMENT NOT NULL,
    
    dataHora datetime,
    totalEntradas decimal(12,2) NOT NULL,
    totalSaidas decimal(12,2) NOT NULL,
    saldoAnterior decimal(12,2) NOT NULL,
    saldoFinal decimal(12,2) NOT NULL,
    estorno boolean NOT NULL,
    auditado boolean NOT NULL,
    caixaId int NOT NULL,
    instituicaoId int NOT NULL,
    ano smallint NOT NULL,
    mes smallint NOT NULL,
    totalTransferenciaEntradas decimal(12,2) NOT NULL,
    totalTransferenciaSaidas decimal(12,2) NOT NULL,

    #o que significa esse aux
    aux_dataHora datetime,
    aux_saldoAnterior decimal(12,2) NOT NULL,
    aux_saldoFinal decimal(12,2) NOT NULL,
    aux_totalEntradas decimal(12,2) NOT NULL,
    aux_totalSaidas decimal(12,2) NOT NULL,
    aux_totalTransferenciaEntradas decimal(12,2) NOT NULL,
    aux_totalTransferenciaSaidas decimal(12,2) NOT NULL,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*

CREATE TABLE visitantes_visitante
(
    id int primary key AUTO_INCREMENT,
    nome varchar(100),
    distritoId int,
    igrejaId int,
    regiaoId int,
    
    isExcluido boolean NOT NULL,
    criadoPor int(11) NOT NULL,
    criadoEm datetime NOT NULL,
    alteradoPor int(11) NOT NULL,
    alteradoEm datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;*/




ALTER TABLE `ClerigoTelefone` ADD `ddi` VARCHAR(10) NULL AFTER `alteradoEm`, ADD `ddd` INT(10) NULL AFTER `ddi`;

select i.usuario_id,  i.instituicao_id 
from usuarios_usuario_instituicoes  i 
inner join usuarios_usuario_perfis pp
on i.usuario_id = pp.usuario_id
group by i.usuario_id, i.instituicao_id
having count(*) = 1)
--order by i.usuario_id, i.instituicao_id, pp.perfil_id


