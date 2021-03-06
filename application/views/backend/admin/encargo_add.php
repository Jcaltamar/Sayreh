<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Adicionar Encargo'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/encargo/create',
                    array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

				<div class="form-group" >
				<label for="field-1" class="col-sm-3 control-label"><?php echo 'Empleado'; ?></label>
					<div class="col-sm-8">
					
						<select name="empleado_id" class="form-control " onchange="show()">
							<?php
							$query=$this->db->order_by('EMP_NOMBRES,EMP_APELLIDOS');
							$query = $this->db->get_where('empleado');
							if($query->num_rows() >0){
								$employee = $query->result_array();
							foreach ($employee as $row2):
								
							?>
							<option value="<?php echo $row2['EMP_CEDULA'] ?>"><?php echo $row2['EMP_NOMBRES']." ".$row2['EMP_APELLIDOS']; ?></option>   
							<?php
							
							endforeach;
							}
							?>
						</select>
					</div>
				</div>	

				<div class="form-group" >
				<label for="field-1" class="col-sm-3 control-label"><?php echo 'Encargo'; ?></label>
					<div class="col-sm-8">
					
						<select name="encargo" class="form-control " onchange="show()">
							<?php
							$querye=$this->db->order_by('CAD_NOMBRE_CARGO');
							$querye = $this->db->get_where('cargo');
							if($querye->num_rows() >0){
								$lencargo = $querye->result_array();
							foreach ($lencargo as $rowe):
								
							?>
							<option value="<?php echo $rowe['CARGO_COMPLETO'] ?>"><?php echo $rowe['CAD_NOMBRE_CARGO']; ?></option>  
							<?php
							
							endforeach;
							}
							?>
						</select>
					</div>
				</div>	
				
                  <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Fecha de Inicio'); ?></label>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="fechai" value="<?php echo date('d/M/Y')?>"/>
                    </div>
                </div>
				
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Fecha de Fin'); ?></label>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="fechaf" />
                    </div>
                </div>	
				
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('submit'); ?></button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

