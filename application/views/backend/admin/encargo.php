<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/encargo_add/');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('Adicionar Nuevo Encargo'); ?>
</a> 
<br><br><br>

<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('Cedula'); ?></div></th>
            <th><div><?php echo get_phrase('Cargo Actual'); ?></div></th>
            <th><div><?php echo get_phrase('Encargo'); ?></div></th>
			<th><div><?php echo get_phrase('Fecha Inicial'); ?></div></th>
			<th><div><?php echo get_phrase('Fecha Final'); ?></div></th>
            <th><div><?php echo get_phrase('Opciones'); ?></div></th>
        </tr>
</thead>
<tbody>
    <?php
    $count = 1;
    $this->db->order_by('EMP_CEDULA', 'asc');
    $department = $this->db->get('encargo')->result_array();
    foreach ($department as $row):
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
			<td><?php echo $row['EMP_CEDULA']; ?></td>
			<td>
				<?php
                    echo   $this->db->get_where('cargo', array('CARGO_COMPLETO' => $row['CARGO_ACTUAL']))->row()->CAD_NOMBRE_CARGO . '</b>';
                    echo '<br>';
                 ?>
			</td>
			<td>
				<?php
                    echo   $this->db->get_where('cargo', array('CARGO_COMPLETO' => $row['CARGO_ASIGNADO']))->row()->CAD_NOMBRE_CARGO . '</b>';
                    echo '<br>';
                 ?>
			</td>			
            <td><?php echo $row['FECHA_INICIO']; ?></td>
			<td><?php echo $row['FECHA_FIN']; ?></td>			
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Acción <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                        <!-- teacher EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/encargo_edit/<?php echo $row['CARGO_ASIGNADO']; ?>');">
                                <i class="entypo-pencil"></i>
                            <?php echo get_phrase('edit'); ?>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <!-- teacher DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal_hard_reload('<?php echo base_url(); ?>index.php?admin/encargo/delete/<?php echo $row['EMP_CEDULA']; ?>');">
                                <i class="entypo-trash"></i>
    <?php echo get_phrase('delete'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

            </td>
        </tr>
<?php endforeach; ?>
</tbody>
</table>
