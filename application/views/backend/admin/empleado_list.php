<?php echo form_open(base_url() . 'index.php?admin/empleado/filter'); ?>
    
    <div class="row">

        <div class="col-md-offset-2 col-md-2" style="text-align: right; margin-top: 5px;">
            <label class="control-label" style="font-weight: unset;"><?php echo get_phrase('Seleccione Dependencia') . ' :'; ?></label>
        </div>

        <div class="col-md-6">
            <select name="department_id" class="form-control selectboxit">
                <option value="all" <?php if($department_id == 'all') echo 'selected'; ?>>
                    <?php echo get_phrase('all_employees'); ?>
                </option>
                <?php
                $departments = $this->db->get('dependencia')->result_array();
                foreach ($departments as $row2): ?>
                    <option value="<?php echo $row2['DEP_CODIGO_DEPEN']; ?>"
                        <?php if($row2['DEP_CODIGO_DEPEN'] == $department_id) echo 'selected'; ?>>
                        <?php echo $row2['DEP_NOMBRE_DEPEN'] . ' ' . get_phrase('department'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-1">
            <button type="submit" class="btn btn-info">
                <?php echo get_phrase('filter'); ?>
            </button>
        </div>

    </div>

<?php echo form_close(); ?>

<br>

<table class="table table-bordered datatable" id="table_export">
    <thead>
        <tr>
            <th><div><?php echo get_phrase('Tipo Doc'); ?></div></th>
			<th><div><?php echo get_phrase('Numero'); ?></div></th>
            <th><div><?php echo get_phrase('Apellidos'); ?></div></th>
            <th><div><?php echo get_phrase('Nombres'); ?></div></th>
			<th><div><?php echo get_phrase('Dependencia'); ?></div></th>
            <th><div><?php echo get_phrase('email'); ?></div></th>
			<th><div><?php echo get_phrase('Opciones'); ?></div></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('EMP_APELLIDOS', 'asc');
        if($department_id == 'all')
            $employee = $this->db->get_where('EMPLEADO',array('PAIS_CODIGO' => 1))->result_array();
        else
             $employee = $this->db->get_where('EMPLEADO',array('PAIS_CODIGO' => 1))->result_array();
        foreach ($employee as $row):
            ?>
            <tr>
                <td><b><?php echo $row['EMP_TIPO_CEDULA']; ?></b></td>
				<td><b><?php echo $row['EMP_CEDULA']; ?></b></td>
				<td><b><?php echo $row['EMP_APELLIDOS']; ?></b></td>
				<td><b><?php echo $row['EMP_NOMBRES']; ?></b></td>
				<td><b>
				<?php
                    echo   $this->db->get_where('dependencia', array('DEP_CODIGO_DEPEN' => $row['EMP_DEPENDENCIA']))->row()->DEP_NOMBRE_DEPEN . '</b>';
                    echo '<br>';
                 ?>
				
				</b></td>
				<td><b><?php echo $row['EMAIL']; ?></b></td>

                <td>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                            Acción <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                            <!-- teacher EDITING LINK -->
                            <li>
                                <a href="<?php echo base_url() ?>index.php?admin/empleado/empleado_edit/<?php echo $row['EMP_CEDULA'] ?>" >
                                    <i class="entypo-pencil"></i>
                                    <?php echo get_phrase('edit'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>index.php?admin/empleado/empleado_profile/<?php echo $row['EMP_CEDULA'] ?>" >
                                    <i class="entypo-user"></i>
                                    <?php echo get_phrase('profile'); ?>
                                </a>
                            </li>
                            <li class="divider"></li>

                            <!-- teacher DELETION LINK -->
                            <li>
                                <a href="#" onclick="confirm_modal_hard_reload('<?php echo base_url(); ?>index.php?admin/empleado/delete/<?php echo $row['EMP_CEDULA']; ?>');">
                                    <i class="entypo-trash"></i>
                                    <?php echo get_phrase('Eliminar'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">

    $(document).ready(function () {

        // SelectBoxIt Dropdown replacement
        if ($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function (i, el)
            {
                var $this = $(el),
                        opts = {
                            showFirstOption: attrDefault($this, 'first-option', true),
                            'native': attrDefault($this, 'native', false),
                            defaultText: attrDefault($this, 'text', ''),
                        };

                $this.addClass('visible');
                $this.selectBoxIt(opts);
            });
        }

    });

</script>


<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function ($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "xls",
                        "mColumns": [1, 2]
                    },
                    {
                        "sExtends": "pdf",
                        "mColumns": [1, 2]
                    },
                    {
                        "sExtends": "print",
                        "fnSetText": "Press 'esc' to return",
                        "fnClick": function (nButton, oConfig) {
                            datatable.fnSetColumnVis(0, false);
                            datatable.fnSetColumnVis(3, false);

                            this.fnPrint(true, oConfig);

                            window.print();

                            $(window).keyup(function (e) {
                                if (e.which == 27) {
                                    datatable.fnSetColumnVis(0, true);
                                    datatable.fnSetColumnVis(3, true);
                                }
                            });
                        },
                    },
                ]
            },
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });

</script>






