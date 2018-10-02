<hr />
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-folder"></i> 
					<?php echo get_phrase('Establecer Nomina a Liquidar');?>
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
        <br>
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content">
					<?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(base_url() . 'index.php?admin/establecer_nomina/update_profile_info' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
                            
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo De Nomina'); ?></label>

							<div class="col-sm-5">
								<select name="tiponomina" class="form-control"  required>
									<option value=""><?php echo get_phrase('Seleccione una nomina'); ?></option>
									<?php
									$department = $this->db->get('tipo_nomina')->result_array();
									$tipoactual= $this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_TIPO_NOMINA;
									foreach ($department as $row1): ?>
																<option value="<?php echo $row1['codigo_nomina']; ?>" 
										    <?php if( $row1['codigo_nomina']==$tipoactual ) echo 'selected'; ?>>
											<?php echo $row1['nombre_nomina']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						
						
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('Vigencia');?></label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="vigencia" value="<?php echo $this->db->get_where('parametro' , array('PA_REGISTRO_NUMERO' =>'1'))->row()->PA_ANO;?>"/>
                                </div>
                            </div>

						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Periodo'); ?></label>

							<div class="col-sm-5">
								<select name="periodo" class="form-control"  required>
									<option value=""><?php echo get_phrase('Seleccione ...'); ?></option>
									<?php
									$department = $this->db->get('meses')->result_array();
									$tipoliq= $this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_PERIODO;
									foreach ($department as $row): ?>
										<option value="<?php echo $row['codigo_mes']; ?>" <?php if($tipoliq == $row['codigo_mes']) echo 'selected'; ?>>
											<?php echo $row['nombre_mes']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						
							
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('Tipo De Liquidación'); ?></label>

							<div class="col-sm-5">
								<select name="tipoliquidacion" class="form-control"  required>
									<option value=""><?php echo get_phrase('Seleccione ...'); ?></option>
									<?php
									$department = $this->db->get('tipo_liquidacion')->result_array();
									$tipoliq= $this->db->get_where('parametro', array('PA_REGISTRO_NUMERO' => '1'))->row()->PA_ESTADO_NOMINA;
									foreach ($department as $row): ?>
										<option value="<?php echo $row['EST_CODIGO']; ?>" <?php if($tipoliq == $row['EST_CODIGO']) echo 'selected'; ?>>
											<?php echo $row['EST_NOMBRE']; ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
                            
							<div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('Guardar Cambios');?></button>
                              </div>
							</div>
                        </form>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS-->
            
		</div>
	</div>
</div>

<br>


</div>