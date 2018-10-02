<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Documento'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="documento" value="<?php echo $row['EMP_CEDULA']; ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Nombres'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="nombres" value="<?php echo $row['EMP_NOMBRES']; ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo 'Apellidos'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="apellidos" value="<?php echo $row['EMP_APELLIDOS']; ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Fecha De Nacimiento'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="fecnac" value="<?php echo $row['EMP_FECHA_NACIMIENTO']; ?>" data-start-view="2"
            placeholder="Seleccione..." data-format="D, dd MM yyyy" required />
    </div>
</div>

<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Departamento Nacimiento'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="depnac" value="<?php echo $row['EMP_DEPTO_NACIMIENTO']; ?>" required />
    </div>
</div>

<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Municipio de Nacimiento'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="munnac" value="<?php echo $row['EMP_MUNICIPIO_NACIMIENTO']; ?>" required />
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Sexo'); ?></label>

    <div class="col-sm-5">
        <select name="sexo" class="form-control selectboxit">
            <option value="Masculino" <?php if ($row['EMP_SEXO'] == 'M') echo 'selected'; ?>><?php echo get_phrase('Masculino'); ?></option>
            <option value="Femenino" <?php if ($row['EMP_SEXO'] == 'F') echo 'selected'; ?>><?php echo get_phrase('Femenino'); ?></option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="telefono" value="<?php echo $row['EMP_TELEFONOS_EMP']; ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Dirección Residencia'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="dirres" value="<?php echo $row['EMP_DIRECCION_EMP']; ?>" >
    </div>
</div>

<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Departamento Residencia'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="depres" value="<?php echo $row['EMP_DEPTO_RESIDENCIA']; ?>" required />
    </div>
</div>
<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Municipio Residencia'; ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="munres" value="<?php echo $row['EMP_MUNICIPIO_RESIDENCIA']; ?>" required />
    </div>
</div>


<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Telefono'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="telefono" value="<?php echo $row['EMP_TELEFONOS_EMP']; ?>" >
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Correo Electronico'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="email" value="<?php echo $row['EMAIL']; ?>" >
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo 'Estado Civil'; ?></label>

    <div class="col-sm-5">
        <select name="estadoc" class="form-control selectboxit">
            <option value="C" <?php if ($row['EMP_ESTADO_CIVIL'] == 'C') echo 'selected'; ?>><?php echo get_phrase('SOLTERO'); ?></option>
            <option value="S" <?php if ($row['EMP_ESTADO_CIVIL'] == 'S') echo 'selected'; ?>><?php echo get_phrase('CASADO'); ?></option>
            <option value="U" <?php if ($row['EMP_ESTADO_CIVIL'] == 'U') echo 'selected'; ?>><?php echo get_phrase('UNIONLIBRE'); ?></option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Etnia'); ?></label>

    <div class="col-sm-5">
        <select name="etnia_id" class="form-control"  required>
            <option value=""><?php echo get_phrase('Seleccione ...'); ?></option>
            <?php
            $department = $this->db->get('etnia')->result_array();
            foreach ($department as $row1): ?>
			   <option value="<?php echo $row1['etnia_codigo']; ?>"  <?php if($row['EMP_ETNIA'] == $row1['etnia_codigo']) echo 'selected'; ?> >
                    <?php echo $row1['etnia_nombre']; ?>
                </option>
	           <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo 'Discapacidad'; ?></label>

    <div class="col-sm-5">
        <select name="discapacidad" class="form-control selectboxit">
            <option value="N" <?php if ($row['EMP_DISCAPACIDAD'] == 'N') echo 'selected'; ?>><?php echo get_phrase('NO'); ?></option>
            <option value="S" <?php if ($row['EMP_DISCAPACIDAD'] == 'S') echo 'selected'; ?>><?php echo get_phrase('SI'); ?></option>
        </select>
    </div>
</div>


<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo'); ?></label>

    <div class="col-sm-5">
        <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom: 0px;">
            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                <img src="http://placehold.it/200x200" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
            <div>
                <span class="btn btn-white btn-file">
                    <span class="fileinput-new">Selecccione Foto</span>
                    <span class="fileinput-exists">Cambiar</span>
                    <input type="file" name="userfile" accept="image/*">
                </span>
                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
    </div>
</div>
