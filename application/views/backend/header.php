<?php
global  $tiponomina,$nominaperiodo;

$logged_in_user = $this->db->get_where('user', array('user_id' => $this->session->userdata('login_user_id')))->row();
$tiponomina  = $this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_TIPO_NOMINA;
$nominaperiodo  = $this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_PERIODO;
$tipoliquidacion=$this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_ESTADO_NOMINA;
$nombrenomina=$this->db->get_where('tipo_nomina', array('codigo_nomina' => $tiponomina))->row()->nombre_nomina;
$nombreliq=$this->db->get_where('tipo_liquidacion', array('EST_CODIGO' => $tipoliquidacion))->row()->EST_NOMBRE;
$nombremes=$this->db->get_where('meses', array('codigo_mes' => $nominaperiodo))->row()->nombre_mes;
?>

<div class="row">

    <div class="col-md-12 col-sm-12 clearfix" style="text-align:center;">
        <h2 style="font-weight:200; margin:0px;">
            <?php echo $system_name; ?>
        </h2>
	     
		 
	  	<h4 style="font-weight:100; margin:0px;">
            <?php echo 'Nomina De : ' . $nombrenomina;?>
        </h4>
	  
	  
	   <h4 style="font-weight:100; margin:0px;">
            <?php echo 'Vigencia : 2018' . ''; ?>
			<?php echo '	- Mes : ' . $nombremes;?>
        </h4>

		<h4 style="font-weight:100; margin:0px;">
           <?php echo 'Tipo De Nomina : ' . $nombreliq;?>
        </h4>
		
    </div>
    <!-- Raw Links -->
    <div class="col-md-12 col-sm-12 clearfix ">

        <ul class="list-inline links-list pull-left">
            <!-- Language Selector -->			
            <li class="dropdown language-selector">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                    <i class="entypo-user"></i>
                    <?php echo $logged_in_user->name . ' (' . get_phrase($logged_in_user_type) . ')'; ?>
                </a>

                <ul class="dropdown-menu pull-left">
                    <?php
                    if($logged_in_user_type == 'admin') {
                        $edit_profile_link      = 'admin/manage_profile';
                        $change_password_link   = 'admin/manage_profile';
                    } else {
                        $edit_profile_link      = 'employee/profile';
                        $change_password_link   = 'employee/change_password';
                    }
                    ?>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php?<?php echo $edit_profile_link; ?>">
                            <i class="entypo-info"></i>
                            <span><?php echo get_phrase('edit_profile'); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php?<?php echo $change_password_link; ?>">
                            <i class="entypo-key"></i>
                            <span><?php echo get_phrase('change_password'); ?></span>
                        </a>
                    </li>
                </ul>
				
				
				
            </li>
        </ul>

        <ul class="list-inline links-list pull-right">
            <li>
                <a href="<?php echo base_url(); ?>index.php?login/logout">
                    <?php echo get_phrase('log_out'); ?>
                    <i class="entypo-logout right"></i>
                </a>
            </li>
        </ul>
    </div>

</div>

<hr style="margin-top:0px;" />