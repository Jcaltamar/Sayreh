<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/novedad_add');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo 'Adicionar Novedad'; ?>
</a> 
<br><br><br>

<table class="table table-bordered" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo 'Codigo'; ?></div></th>
			<th><div><?php echo 'Concepto'; ?></div></th>
            <th><div><?php echo 'Empleado'; ?></div></th>
            <th><div><?php echo 'Fecha Inicio'; ?></div></th>
			<th><div><?php echo 'Fecha Fin'; ?></div></th>
			<th><div><?php echo 'Valor'; ?></div></th>
            <th><div><?php echo 'Opciones'; ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('EMP_CEDULA', 'desc');
		$this->db->where('LIQ_TIPO_CONCEPTO', 'N');
        $novedades = $this->db->get('novedad')->result_array();
        foreach ($novedades as $row):
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['CON_CODIGO']; ?></td>
				<td><?php echo $this->db->get_where('concepto' , array('CON_CODIGO' =>$row['CON_CODIGO']))->row()->CON_NOMBRE; ?> </td>
				<?php $nombreempleado=$this->db->get_where('empleado' , array('EMP_CEDULA' =>$row['EMP_CEDULA']))->row()->EMP_NOMBRES . " " .$this->db->get_where('empleado' , array('EMP_CEDULA' =>$row['EMP_CEDULA']))->row()->EMP_APELLIDOS; ?>
				<td><?php echo $nombreempleado;    ?></td>
				<td><?php echo $row['LIQ_FECHA_INI']; ?></td>
				<td><?php echo $row['LIQ_FECHA_FIN']; ?></td>
				<td><?php echo number_format($row['LIQ_CANTIDAD'],2,'.',','); ?></td>
               
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/novedad_edit/<?php echo $row['vacancy_id']; ?>');">
                                    <i class="entypo-pencil"></i>
                                <?php echo 'Editar'; ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo base_url(); ?>index.php?admin/novedad/delete/<?php echo $row['vacancy_id']; ?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo 'Borrar'; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>