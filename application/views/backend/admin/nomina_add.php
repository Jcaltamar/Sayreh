<hr />

<?php echo form_open(base_url() . 'index.php?admin/create_nomina'); ?>
    
    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('Dependencia'); ?></label>
                <select name="department_id" class="form-control" onchange="get_empleados(this.value);" >
                    <option value=""><?php echo get_phrase('Seleccione Una Dependencia'); ?></option>
                    <?php
                    $departments = $this->db->get('dependencia')->result_array();
                    foreach($departments as $row): ?>
                        <option value="<?php echo $row['DEP_CODIGO_DEPEN']; ?>">
                            <?php echo $row['DEP_NOMBRE_DEPEN'] . ' ' . get_phrase('department'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        

        <div class="col-md-2" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">
                <?php echo get_phrase('Liquidar'); ?></button>
        </div>

    </div>

<?php echo form_close(); ?>

