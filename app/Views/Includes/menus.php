<ul class="sidebar-nav">
    <li class="sidebar-header">
        Menu Principal
    </li>
    <!--
					<li class="sidebar-item active">
						<a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-default.html">Default</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="dashboard-analytics.html">Analytics</a></li>
							<li class="sidebar-item active"><a class="sidebar-link" href="dashboard-e-commerce.html">E-commerce</a></li>
						</ul>
					</li> -->


    <li class="sidebar-item">
        <a data-bs-target="#administrativo" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-building"></i> <span class="align-middle">Gestão da 4ª Região</span>
        </a>
        <ul id="administrativo" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/tipo-instituicao">Tipos Instituições</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/instituicao">Instituições</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/funcao-eclesiastica">Funções Eclesiasticas</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/comissao">Comissões</a></li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a data-bs-target="#clerigo" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Clérigos</span>
        </a>
        <ul id="clerigo" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">

            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Carteira Funcional</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Atualizar dados</a></li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-user-friends"></i> <span class="align-middle">Gestão de Pessoas</span>
        </a>
        <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">

            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Ministros</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Pastores</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Missionárias</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro">Aspirantes</a></li>

        </ul>
    </li>

    <li class="sidebar-item">
        <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-clipboard-list"></i> <span class="align-middle">Nomeações</span>
        </a>
        <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Sugerir Nomeções (SDs)</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Relatório de Sugestões de Nomeações</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro">Realizar Nomeações</a></li>

        </ul>
    </li>
    
    <li class="sidebar-item">
        <a data-bs-target="#concilio" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Concílios</span>
        </a>
        <ul id="concilio" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Gerenciar Concílios</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Candidatos</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Delegados</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro">Lista de Presenças</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro">Votações</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro">Votar</a></li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a data-bs-target="#financeiro" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-money-bill-wave"></i> <span class="align-middle">Financeiro</span>
        </a>
        <ul id="financeiro" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Contas a Pagar/Receber</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Conciliação de Pagamentos</a></li>
            
        </ul>
    </li>

    <li class="sidebar-item">
        <a data-bs-target="#seguranca" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-user-shield"></i> <span class="align-middle">Segurança</span>
        </a>
        <ul id="seguranca" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/usuarios">Gerenciar Usuários</a></li>

        </ul>
    </li>


    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo base_url(); ?>/logoff"><i class="align-middle me-2 fas fa-fw fa-arrow-alt-circle-right"></i> Sair do Sistema</a>
    </li>
</ul>