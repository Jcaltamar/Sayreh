


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Dependencia'); ?></label>

    <div class="col-sm-5">
        <select name="dependencia_id" class="form-control"  required>
            <option value=""><?php echo get_phrase('Seleccione ...'); ?></option>
            <?php
            $department = $this->db->get('dependencia')->result_array();
            foreach ($department as $row1): ?>
			   <option value="<?php echo $row1['DEP_CODIGO_DEPEN']; ?>"  <?php if($row['EMP_DEPENDENCIA'] == $row1['DEP_CODIGO_DEPEN']) echo 'selected'; ?> >
                    <?php echo $row1['DEP_NOMBRE_DEPEN']; ?>
                </option>
	           <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Proyecto'); ?></label>

    <div class="col-sm-5">
        <select name="proyecto_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_CUADRO_PLANTA']; ?>"</option>
            <?php
            $department = $this->db->get('planta')->result_array();
            foreach ($department as $row2): ?>
                <option value="<?php echo $row2['PLANTA_CODIGO']; ?>" <?php if($row['EMP_CUADRO_PLANTA'] == $row2['PLANTA_CODIGO']) echo 'selected'; ?> >
                    <?php echo $row2['PLANTA_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Cargo'); ?></label>

    <div class="col-sm-5">
        <select name="cargo_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_CARGO']; ?>"</option>
            <?php
            $department = $this->db->get('cargo')->result_array();
            foreach ($department as $row3): ?>
                <option value="<?php echo $row3['CARGO_COMPLETO']; ?>" <?php if($row['EMP_CARGO'] == $row3['CARGO_COMPLETO']) echo 'selected'; ?>>
                    <?php echo $row3['CAD_NOMBRE_CARGO']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Eps'); ?></label>

    <div class="col-sm-5">
        <select name="eps_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_SALUD']; ?>"</option>
            <?php
            $department = $this->db->get('fondo')->result_array();
            foreach ($department as $row4): ?>
                <option value="<?php echo $row4['ENT_CODIGO']; ?>" <?php if($row['EMP_SALUD'] == $row4['ENT_CODIGO']) echo 'selected'; ?>>
                    <?php echo $row4['ENT_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Pension'); ?></label>

    <div class="col-sm-5">
        <select name="pension_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_PENSION']; ?>"</option>
            <?php
            $department = $this->db->get('fondo')->result_array();
            foreach ($department as $row5): ?>
                <option value="<?php echo $row5['ENT_CODIGO']; ?>" <?php if($row['EMP_PENSION'] == $row5['ENT_CODIGO']) echo 'selected'; ?>>
                    <?php echo $row5['ENT_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Cesantia'); ?></label>
    <div class="col-sm-5">
        <select name="cesantia_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_CESANTIA']; ?>"</option>
            <?php
            $department = $this->db->get('fondo')->result_array();
            foreach ($department as $row6): ?>
                <option value="<?php echo $row6['ENT_CODIGO']; ?>" <?php if($row['EMP_CESANTIA'] == $row6['ENT_CODIGO']) echo 'selected'; ?>>
                    <?php echo $row6['ENT_NOMBRE']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Arl'); ?></label>
    <div class="col-sm-5">
        <select name="arl_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_ARL']; ?>"</option>
            <?php
            $department = $this->db->get('arl')->result_array();
            foreach ($department as $row6): ?>
                <option value="<?php echo $row6['codigo_riesgo']; ?>" <?php if($row['EMP_ARL'] == $row6['codigo_riesgo']) echo 'selected'; ?>>
                    <?php echo $row6['nombre_riesgo']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo de nomina'); ?></label>
    <div class="col-sm-5">
        <select name="tiponomina_id" class="form-control"  required>
            <option value="><?php echo $row['EMP_TIPO_HV']; ?>"</option>
            <?php
            $department = $this->db->get('tipo_nomina')->result_array();
            foreach ($department as $row7): ?>
                <option value="<?php echo $row7['codigo_nomina']; ?>" <?php if($row['EMP_TIPO_HV'] == $row7['codigo_nomina']) echo 'selected'; ?>>
                    <?php echo $row7['nombre_nomina']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo de Vinculación'); ?></label>
    <div class="col-sm-5">
        <select name="tipovinculacion_id" class="form-control"  required>
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
        <input type="text" class="form-control datepicker" name="fechaentrada" value="<?php echo $row['EMP_FECHA_INGRESO']; ?>"
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
