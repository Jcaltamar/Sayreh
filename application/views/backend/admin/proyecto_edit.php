<?php
$edit_data = $this->db->get_where('planta', array('PLANTA_CODIGO' => $param2))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('Editar Proyecto'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(base_url().'index.php?admin/proyecto/update/' . $param2, array('class' => 'form-horizontal form-groups-bordered validate',
                        'enctype' => 'multipart/form-data')); ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Nombre'); ?></label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" required value="<?php echo $row['PLANTA_NOMBRE']; ?>" autofocus />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Sigla'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="number_of_vacancies"  required value="<?php echo $row['PLANTA_SIGLA']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
                            </div>
                        </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
