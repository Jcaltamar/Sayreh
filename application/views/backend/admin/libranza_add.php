<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Adicionar Libranza'); ?>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open(base_url().'index.php?admin/libranza/create', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
	
				<div class="form-group" >
				<label for="field-1" class="col-sm-3 control-label"><?php echo 'Documento Empleado'; ?></label>
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
				    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Concepto'; ?></label>
					<div class="col-sm-8">
						
						<select name="concepto_id" class="form-control " onchange="show()">
							<?php
							$query = $this->db->get_where('concepto',array('CON_OPERACION' => 'LIBRANZA'));
							if($query->num_rows() >0){
								$employee = $query->result_array();
							foreach ($employee as $row2):
								
							?>
							<option value="<?php echo $row2['CON_CODIGO'] ?>"><?php echo $row2['CON_NOMBRE']; ?></option>   
							<?php
							
							endforeach;
							}
							?>
						</select>
					</div>
				</div>

				
				<div class="form-group" >
				    <label for="field-1" class="col-sm-3 control-label"><?php echo 'Entidad'; ?></label>
					<div class="col-sm-8">
						
						<select name="tercero_id" class="form-control " onchange="show()">
							<?php
							$query = $this->db->get('tercero');
							if($query->num_rows() >0){
								$employee = $query->result_array();
							foreach ($employee as $row2):
								
							?>
							<option value="<?php echo $row2['ETB_CODIGO'] ?>"><?php echo $row2['ETB_NOMBRE']; ?></option>   
							<?php
							
							endforeach;
							}
							?>
						</select>
					</div>
				</div>			
				
				
                <div class="form-group">
                    <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('Número Libranza'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="numerolibranza" required value="" />
                    </div>
					
                    <label for="field-1" class="col-sm-5 control-label"><?php echo get_phrase('Valor Libranza'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="valor" required value="" />
                    </div>
					
				    <label for="field-2" class="col-sm-5 control-label"><?php echo get_phrase('Cuotas a descontar'); ?></label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="cuotas" required value="" />
                    </div>	
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('Fecha de Inicio'); ?></label>

                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="fechai" value="<?php echo date('m/d/Y')?>"/>
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