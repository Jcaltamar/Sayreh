<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo base_url(); ?>">
                <img src="uploads/logo.png"  style="max-height:60px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>	
    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>

		<!---------BASICOS--------->
        <li class="<?php
        if ($page_name == 'employee_add' ||
                $page_name == 'employee_list' || $page_name == 'employee_edit'|| $page_name == 'employee_profile')
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="entypo-layout"></i>
                <span><?php echo get_phrase('Datos Basicos'); ?></span>
            </a>
            <ul>
                <!-- Porcentajes Arl -->
                <li class="<?php if ($page_name == 'arl_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/arl/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Arl'); ?></span>
                    </a>
                </li>
                <!-- BANCOS -->
                <li class="<?php if ($page_name == 'employee_list' || $page_name == 'employee_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/banco/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Banco'); ?></span>
                    </a>
                </li>					
                <!-- CARGOS -->
                <li class="<?php if ($page_name == 'employee_list' || $page_name == 'cargo_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/cargo/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Cargo'); ?></span>
                    </a>
                </li>					
	

                <!-- Conceptos -->
                <li class="<?php if ($page_name == 'employee_list' || $page_name == 'employee_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/concepto/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Concepto'); ?></span>
                    </a>
                </li>				
                <!-- Dependencias -->
                <li class="<?php if ($page_name == 'employee_add') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>index.php?admin/dependencia/list">
						<i class="entypo-archive"></i>
						<span><?php echo get_phrase('Dependencia'); ?></span>
					</a>
                </li>
                <!-- Festivos -->
                <li class="<?php if ($page_name == 'employee_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/employee/employee_add">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Festivo'); ?></span>
                    </a>
                </li>				
                <!-- Fondos -->
                <li class="<?php if ($page_name == 'employee_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/fondo/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Fondo'); ?></span>
                    </a>
                </li>
                <!-- Proyecto -->
                <li class="<?php if ($page_name == 'proyecto_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/proyecto/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Proyectos'); ?></span>
                    </a>
                </li>
                <!-- Terceros -->
                <li class="<?php if ($page_name == 'employee_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/tercero/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Tercero'); ?></span>
                    </a>
                </li>				
				
            </ul>			
				
			</li>
		
        <!---------EMPLOYEE--------->
        <li class="<?php
        if ($page_name == 'employee_add' ||
                $page_name == 'employee_list' || $page_name == 'employee_edit'|| $page_name == 'employee_profile')
            echo 'opened active has-sub';
        ?> ">
            <a href="#">
                <i class="entypo-users"></i>
                <span><?php echo get_phrase('employee'); ?></span>
            </a>
            <ul>
                <!-- EMPLOYEE ADD -->
                <li class="<?php if ($page_name == 'employee_add') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/empleado/empleado_add">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Adicionar Empleado'); ?></span>
                    </a>
                </li>
                <!-- EMPLOYEE LIST -->
                <li class="<?php if ($page_name == 'employee_list' || $page_name == 'employee_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/empleado/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('employee_list'); ?></span>
                    </a>
                </li>
                <!-- SALARIOS -->
                <li class="<?php if ($page_name == 'cargo_list' || $page_name == 'cargo_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/cargo/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Salarios'); ?></span>
                    </a>
                </li>	
				
                <!-- ENCARGOS -->
                <li class="<?php if ($page_name == 'employee_list' || $page_name == 'employee_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/encargo/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Encargo'); ?></span>
                    </a>
                </li>				

                <!-- SOLICITUD DE VACACIONES -->
                <li class="<?php if ($page_name == 'employee_list' || $page_name == 'employee_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/encargo/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Solicitud de Vacaciones'); ?></span>
                    </a>
                </li>
			</ul>
        </li>


        <!-- RECRUITMENT -->
        <li class="<?php if($page_name == 'vacancy' || $page_name == 'application') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-user-add"></i>
                <span><?php echo 'Proceso de Reclutamiento' ; ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'vacancy') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>index.php?admin/vacancy">
                        <span>
                            <i class="entypo-dot"></i>
                            <?php echo 'Manejo de Vancantes'; ?>
                        </span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="<?php if ($page_name == 'application') echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>index.php?admin/application">
                        <span>
                            <i class="entypo-dot"></i>
                            <?php echo 'Proceso de Postulación'; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- DAILY ATTENDANCE -->
        <li class="<?php if($page_name == 'manage_attendance' ||
            $page_name == 'manage_attendance_view' || $page_name == 'attendance_report' ||
            $page_name == 'attendance_report_view') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-chart-area"></i>
                <span><?php echo 'Control de Asistencia'; ?></span>
            </a>
            <ul>
                <li class="<?php if(($page_name == 'manage_attendance' || $page_name == 'manage_attendance_view')) echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_attendance">
                        <span>
                            <i class="entypo-dot"></i>
                            <?php echo 'Registro Permisos'; ?>
                        </span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="<?php if (( $page_name == 'attendance_report' || $page_name == 'attendance_report_view')) echo 'active'; ?>">
                    <a href="<?php echo base_url(); ?>index.php?admin/attendance_report">
                        <span>
                            <i class="entypo-dot"></i>
                            <?php echo get_phrase('attendance_report'); ?>
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        


        <!---------NOMINA--------->
        <li class="<?php
            if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view'
                || $page_name == 'payroll_list')
                echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="entypo-doc-text"></i>
                <span><?php echo get_phrase('payroll'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/nomina">
                        <span><i class="entypo-dot"></i> <?php echo 'Generar Nomina Prueba'; ?></span>
                    </a>
                </li>
				
				<li class="<?php if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/payroll">
                        <span><i class="entypo-dot"></i> <?php echo 'Generar Nomina Oficial'; ?></span>
                    </a>
                </li>
				
				<li class="<?php if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view') echo 'active'; ?> ">
                     <a href="<?php echo base_url(); ?>index.php?admin/novedad">
                        <span><i class="entypo-dot"></i> <?php echo 'Manejo de Novedades'; ?></span>
                    </a>
                </li>

				<li class="<?php if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view') echo 'active'; ?> ">
                     <a href="<?php echo base_url(); ?>index.php?admin/libranza">
                        <span><i class="entypo-dot"></i> <?php echo 'Manejo de Libranzas'; ?></span>
                    </a>
                </li>
				

				<li class="<?php if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view') echo 'active'; ?> ">
                     <a href="<?php echo base_url(); ?>index.php?admin/vacacion">
                        <span><i class="entypo-dot"></i> <?php echo 'Manejo de Vacaciones'; ?></span>
                    </a>
                </li>
				
				<li class="<?php if ($page_name == 'payroll_add' || $page_name == 'payroll_add_view') echo 'active'; ?> ">
                    <a href="">
                        <span><i class="entypo-dot"></i> <?php echo 'Archivos Planos'; ?></span>
                    </a>
                </li>
				
                <li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?> ">
                    <a href="">
                        <span><i class="entypo-dot"></i> <?php echo 'Informes Nomina'; ?></span>
                    </a>
                </li>
				
				
				
				
				
				
            </ul>
        </li>
		
		<!---------INFORMES--------->
        <li class="<?php if ($page_name == 'system_settings' || $page_name == 'manage_language') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-print"></i>
                <span><?php echo 'Informes'; ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Prenomina'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Pagos a Terceros'); ?></span>
                    </a>
                </li>				
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Listado de Pago'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Novedades'); ?></span>
                    </a>
                </li>

                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Resumen de Nomina'); ?></span>
                    </a>
                </li>
			    
				<li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin">
                        <span><i class="entypo-dot"></i> <?php echo 'Otros'; ?></span>
                    </a>
				
                </li>	
				
            </ul>
        </li>
		

        <!-- NOTICIAS -->
        <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/noticeboard">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MENSAJES -->
        <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/message">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>

        <!-- COFIGURACION -->
        <li class="<?php if ($page_name == 'system_settings' || $page_name == 'manage_language') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-tools"></i>
                <span><?php echo 'Configuración'; ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/establecer_nomina">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Asignar nomina actual'); ?></span>
                    </a>
                </li>			
			
			
                <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('general_settings'); ?></span>
                    </a>
                </li>

				
                <li class="<?php if ($page_name == 'configuracion_general') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/configuraciongeneral">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('General'); ?></span>
                    </a>
                </li>				
				
										    
				<li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/manage_language">
                        <span><i class="entypo-dot"></i> <?php echo 'Parametros Ley 100'; ?></span>
                    </a>
				
                </li>	
				
		        <!-- TIPO DE NOMINA -->
                <li class="<?php if ($page_name == 'tiponomina_list' || $page_name == 'tiponomina_edit' || $page_name == 'employee_profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?admin/tiponomina/list">
                        <span><i class="entypo-dot"></i> <?php echo get_phrase('Tipo de Nomina'); ?></span>
                    </a>
                </li>	
				
            </ul>
        </li>
		
		
        <!-- USUARIOS -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?admin/perfil_usuario">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li>
    </ul>

</div>