<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/banco_add/');"  
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo get_phrase('Adicionar Nuevo Banco'); ?>
</a> 
<br><br><br>

<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('Codigo'); ?></div></th>
            <th><div><?php echo get_phrase('Nombre'); ?></div></th>
			<th><div><?php echo get_phrase('Nit'); ?></div></th>
            <th><div><?php echo get_phrase('Opciones'); ?></div></th>
        </tr>
</thead>
<tbody>
    <?php
    $count = 1;
    $this->db->order_by('BCO_NOMBRE', 'asc');
    $department = $this->db->get('banco')->result_array();
    foreach ($department as $row):
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
			<td><?php echo $row['BCO_COD']; ?></td>
            <td><?php echo $row['BCO_NOMBRE']; ?></td>
			<td><?php echo $row['BCO_NIT']; ?></td>

             <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                        Acción <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                        <!-- teacher EDITING LINK -->
                        <li>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/banco_edit/<?php echo $row['BCO_COD']; ?>');">
                                <i class="entypo-pencil"></i>
                            <?php echo get_phrase('edit'); ?>
                            </a>
                        </li>
                        <li class="divider"></li>

                        <!-- teacher DELETION LINK -->
                        <li>
                            <a href="#" onclick="confirm_modal_hard_reload('<?php echo base_url(); ?>index.php?admin/banco/delete/<?php echo $row['BCO_COD']; ?>');">
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
