<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/vacancy_add');" 
   class="btn btn-primary pull-right">
    <i class="entypo-plus-circled"></i>
    <?php echo 'Adicionar Vacantes'; ?>
</a> 
<br><br><br>

<table class="table table-bordered" id="table_export">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo 'Cargo'; ?></div></th>
            <th><div><?php echo 'Cantidad de Vacantes'; ?></div></th>
            <th><div><?php echo 'Ultima Fecha'; ?></div></th>
            <th><div><?php echo 'Opciones'; ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('vacancy_id', 'desc');
        $vacancies = $this->db->get('vacancy')->result_array();
        foreach ($vacancies as $row):
            ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['number_of_vacancies']; ?></td>
                <td><?php echo date('d/m/Y', $row['last_date']); ?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <li>
                                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/vacancy_edit/<?php echo $row['vacancy_id']; ?>');">
                                    <i class="entypo-pencil"></i>
                                <?php echo 'Editar'; ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo base_url(); ?>index.php?admin/vacancy/delete/<?php echo $row['vacancy_id']; ?>');">
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