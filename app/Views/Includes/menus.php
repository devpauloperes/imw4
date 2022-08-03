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
            <i class="align-middle me-2 fas fa-fw fa-building"></i> <span class="align-middle">Gestão Administrativa</span>
        </a>
        <ul id="administrativo" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/tipo-instituicao">Tipos Instituições</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/instituicao">Instituições</a></li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-user-friends"></i> <span class="align-middle">Gestão de Pessoas</span>
        </a>
        <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">


            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/promotores">Pastores</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro">Membros</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/congregados">Congregados</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro-em-transferencia">Membros em Transferência</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/membro-recepcionar">Receber Membros</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/rol-permanente">Rol Permanente</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/rol-atual">Rol Atual</a></li>

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