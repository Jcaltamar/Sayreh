<?php
$edit_data = $this->db->get_where('banco', array('BCO_COD' => $param2))->result_array();
foreach($edit_data as $row) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('Editar Banco'); ?>
                    </div>
                </div>

                <div class="panel-body">

                    <?php echo form_open(base_url().'index.php?admin/banco/edit/' . $param2, array('class' => 'form-horizontal form-groups-bordered validate',
                        'enctype' => 'multipart/form-data')); ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Nombre'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nombre" required value="<?php echo $row['BCO_NOMBRE']; ?>" autofocus />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Nit'); ?></label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nit"  required value="<?php echo $row['BCO_NIT']; ?>" />
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
