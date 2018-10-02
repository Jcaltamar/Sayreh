<ol class="breadcrumb" style="margin-bottom: 0px;">
    <li>
        <a href="<?php echo base_url() ?>index.php?admin/dashboard">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>index.php?admin/empleado/list">
            <?php echo get_phrase('empleado_list') ?>
        </a>
    </li>
    <li><?php echo get_phrase('edit_employee') ?></li>
</ol>
<br>

<?php
$employee = $this->db->get_where('empleado',array('EMP_CEDULA'=>$user_code))->result_array();
foreach ($employee as $row):

    echo form_open(base_url() . 'index.php?admin/empleado/edit/' . $row['EMP_CEDULA'], array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

    <div class="row">
        <div class="col-md-12">

            <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
                <li class="active">
                    <a href="#tab1" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-user"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('personal_details'); ?></span>
                    </a>
                </li>
                <li class="">
                    <a href="#tab2" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-suitcase"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('Datos Laborales'); ?></span>
                    </a>
                </li>
                <li class="">
                    <a href="#tab3" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-database"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('bank_account_details'); ?></span>
                    </a>
                </li>
                <li class="">
                    <a href="#tab4" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-lock"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('login_info'); ?></span>
                    </a>
                </li>
                <li class="">
                    <a href="#tab5" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-docs"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('Historial laboral'); ?></span>
                    </a>
                </li>
                <li class="">
                    <a href="#tab6" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-docs"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('Familiares'); ?></span>
                    </a>
                </li>
				
                <li class="">
                    <a href="#tab7" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-docs"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('Formación'); ?></span>
                    </a>
                </li>
	
				<li class="">
                    <a href="#tab8" data-toggle="tab">
                        <span class="visible-xs"><i class="entypo-docs"></i></span>
                        <span class="hidden-xs"><?php echo get_phrase('documents'); ?></span>
                    </a>
                </li>
            </ul>

            <div class="tab-content" style="padding: 40px;">

                <div class="tab-pane active" id="tab1">
                    <?php include 'empleado_datos_personales_edit.php'; ?>
                </div>

                <div class="tab-pane" id="tab2">
                    <?php include 'empleado_datos_laborales_edit.php'; ?>
                </div>

                <div class="tab-pane" id="tab3">
                    <?php include 'empleado_datos_cuenta_edit.php'; ?>
                </div>

                <div class="tab-pane" id="tab4">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" />
                        </div>
                    </div>
                </div>
				
                <div class="tab-pane" id="tab5">
                    <?php include 'empleado_historia_laboral_edit.php'; ?>
                </div>

                <div class="tab-pane" id="tab6">
                    <?php include 'empleado_datos_familiares_edit.php'; ?>
                </div>

                <div class="tab-pane" id="tab7">
                    <?php include 'empleado_datos_academicos_edit.php'; ?>
                </div>
				
                <div class="tab-pane" id="tab8">
                    <?php include 'empleado_documento_edit.php'; ?>
                    <br>
                    <label class="col-sm-3 control-label"></label>
                    <button type="submit" class="btn btn-info">
                        <i class="entypo-check"></i> &nbsp; <?php echo get_phrase('update'); ?>
                    </button>
                </div>
            </div>


        </div>
    </div>

<?php echo form_close();

endforeach; ?>

<script type="text/javascript">

    $( document ).ready(function() {

        // SelectBoxIt Dropdown replacement
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
            {
                var $this = $(el),
                    opts = {
                        showFirstOption: attrDefault($this, 'first-option', true),
                        'native': attrDefault($this, 'native', false),
                        defaultText: attrDefault($this, 'text', ''),
                    };

                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }

    });

</script>
