<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/concepto_add');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo 'Adicionar Concepto'; ?>
</a> 
<br><br><br>

<table class="table table-bordered" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo 'Codigo'; ?></div></th>
            <th><div><?php echo 'Nombre'; ?></div></th>
            <th><div><?php echo 'Tipo'; ?></div></th>
			<th><div><?php echo 'Abreviatura'; ?></div></th>
            <th><div><?php echo 'Opciones'; ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('CON_NOMBRE', 'asc');
        $vacancies = $this->db->get('concepto')->result_array();
        foreach ($vacancies as $row):
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
				<td><?php echo $row['CON_CODIGO']; ?></td>
                <td><?php echo $row['CON_NOMBRE']; ?></td>
				 <td><?php echo $row['CON_TIPO']; ?></td>
                <td><?php echo $row['CON_SIGLA']; ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/concepto_edit/<?php echo $row['CON_CODIGO']; ?>');">
                                    <i class="entypo-pencil"></i>
                                <?php echo 'Editar'; ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo base_url(); ?>index.php?admin/concepto/delete/<?php echo $row['CON_CODIGO']; ?>');">
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