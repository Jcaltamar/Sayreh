<?php

?>

<div class="form-group">
    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Numero de cuenta'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="numero_cuenta" value="<?php echo $row['EMP_NUM_CUENTA'] ?>"  />
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Banco'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="banco" value="<?php echo $row['EMP_BANCO'] ?>" >
    </div>
</div>
<div class="form-group">
    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo De Cuenta'); ?></label>

    <div class="col-sm-5">
        <input type="text" class="form-control" name="tipo_cuenta" value="<?php echo $row['EMP_TIPO_CUENTA'] ?>" >
    </div>
</div>

