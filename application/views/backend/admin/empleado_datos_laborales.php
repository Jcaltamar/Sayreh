


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Dependencia'); ?></label>

    <div class="col-sm-5">
        <select name="dependencia_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione una dependencia'); ?></option>
            <?php
            $department = $this->db->get('dependencia')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['DEP_CODIGO_DEPEN']; ?>">
                    <?php echo $row['DEP_NOMBRE_DEPEN']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Proyecto'); ?></label>

    <div class="col-sm-5">
        <select name="proyecto_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione una proyecto'); ?></option>
            <?php
            $department = $this->db->get('planta')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['PLANTA_CODIGO']; ?>">
                    <?php echo $row['PLANTA_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Cargo'); ?></label>

    <div class="col-sm-5">
        <select name="cargo_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione un cargo'); ?></option>
            <?php
            $department = $this->db->get('cargo')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['CARGO_COMPLETO']; ?>">
                    <?php echo $row['CAD_NOMBRE_CARGO']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Eps'); ?></label>

    <div class="col-sm-5">
        <select name="eps_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione una eps'); ?></option>
            <?php
            $department = $this->db->get('fondo')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['ENT_CODIGO']; ?>">
                    <?php echo $row['ENT_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Pension'); ?></label>

    <div class="col-sm-5">
        <select name="pension_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione un fondo'); ?></option>
            <?php
            $department = $this->db->get('fondo')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['ENT_CODIGO']; ?>">
                    <?php echo $row['ENT_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Cesantia'); ?></label>
    <div class="col-sm-5">
        <select name="cesantia_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione un fondo'); ?></option>
            <?php
            $department = $this->db->get('fondo')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['ENT_CODIGO']; ?>">
                    <?php echo $row['ENT_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Arl'); ?></label>
    <div class="col-sm-5">
        <select name="arl_id" class="form-control"  required>
            <option value=""><?php echo get_phrase('Seleccione un Porcentaje'); ?></option>
            <?php
            $department = $this->db->get('arl')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['codigo_riesgo']; ?>">
                    <?php echo $row['nombre_riesgo']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo de nomina'); ?></label>
    <div class="col-sm-5">
        <select name="tiponomina_id" class="form-control" onchange="get_designation_val(this.value)" required>
            <option value=""><?php echo get_phrase('Seleccione un tipo de nomina'); ?></option>
            <?php
            $department = $this->db->get('tipo_nomina')->result_array();
            foreach ($department as $row): ?>
                <option value="<?php echo $row['codigo_nomina']; ?>">
                    <?php echo $row['nombre_nomina']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo de Vinculación'); ?></label>
    <div class="col-sm-5">
        <select name="tiponomina_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_EXTENSION']; ?>"</option>
            <?php
            $department = $this->db->get('tipo_nombramiento')->result_array();
            foreach ($department as $row7): ?>
                <option value="<?php echo $row7['TNOM_CODIGO']; ?>" <?php if($row['EMP_EXTENSION'] == $row7['TNOM_CODIGO']) echo 'selected'; ?>>
                    <?php echo $row7['TNOM_DESCRIPCION']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo 'Fecha de Entrada'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="fechaentrada" value=""
            data-start-view="2" required data-format="dd-mm-yyyy" />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>

    <div class="col-sm-5">
        <select name="status" class="form-control selectboxit">
            <option value="1"><?php echo get_phrase('active'); ?></option>
            <option value="2"><?php echo get_phrase('inactive'); ?></option>
        </select>
    </div>
</div>

<script type="text/javascript">

    function get_designation_val(department_id) {
        if(department_id != '')
            $.ajax({
                url: '<?php echo base_url();?>index.php?admin/get_designation/' + department_id,
                success: function(response)
                {
                    console.log(response);
                    jQuery('#designation_holder').html(response);
                }
            });
        else
            jQuery('#designation_holder').html('<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
    }

</script>
