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

 
    <li class="sidebar-item active">
        <a data-bs-target="#administrativo" data-bs-toggle="collapse"  class="sidebar-link collapsed">
            <i class="align-middle me-2 fas fa-fw fa-building"></i> <span class="align-middle">Aspirantes</span>
        </a>
        <ul id="administrativo" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo base_url(); ?>/aspirante-documentos">Enviar Documentações</a></li>
        </ul>
    </li>

    

    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo base_url(); ?>/logoff"><i class="align-middle me-2 fas fa-fw fa-arrow-alt-circle-right"></i> Sair do Sistema</a>
    </li>
</ul>