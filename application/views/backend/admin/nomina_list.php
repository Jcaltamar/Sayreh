<?php echo form_open(base_url() . 'index.php?admin/borrador_pdf'); ?>
        <div class="col-md-2" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info" style="width: 100%;"><?php echo get_phrase('Imprimir'); ?></button>
        </div>

    </div>

<?php echo form_close(); ?>
<br>

<?php
$payroll = $this->db->get_where('payroll', array('date' => $month . ',' . $year))->result_array();
if(empty($payroll)) { ?>
    <div class="alert alert-info">
        <?php echo get_phrase('no_available_data') . '!'; ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><div>#</div></th>
                <th><div>ID</div></th>
                <th><div><?php echo get_phrase('employee'); ?></div></th>
                <th><div><?php echo get_phrase('summary'); ?></div></th>
                <th><div><?php echo get_phrase('date'); ?></div></th>
                <th><div><?php echo get_phrase('status'); ?></div></th>
                <th><div><?php echo get_phrase('options'); ?></div></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $this->db->order_by('payroll_id', 'desc');
            $payroll = $this->db->get_where('payroll', array('date' => $month . ',' . $year))->result_array();
            foreach($payroll as $row): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['payroll_code']; ?></td>
                    <td>
                        <?php
                        $user = $this->db->get_where('user',
                            array('user_id' => $row['user_id']))->row();
                        echo $user->name; ?>
                    </td>
                    <td>
                        <?php
                        $total_allowance    = 0;
                        $total_deduction    = 0;
                        $allowances         = json_decode($row['allowances']);
                        $deductions         = json_decode($row['deductions']);
                        
                        foreach($allowances as $allowance)
                            $total_allowance += $allowance->amount;
                        foreach($deductions as $deduction)
                            $total_deduction += $deduction->amount;
                        
                        $net_salary = $user->joining_salary + $total_allowance - $total_deduction;
                        ?>
                        <div>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('basic_salary'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $user->joining_salary; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('total_allowance'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $total_allowance; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('total_deduction'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $total_deduction; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><hr style="margin: 5px 0px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;"><?php echo get_phrase('net_salary'); ?></td>
                                    <td style="width: 15%; text-align: right;"> : </td>
                                    <td style="text-align: right;"><?php echo $net_salary; ?></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <?php
                        $date = explode(',', $row['date']);
                        $month_list = array('january', 'february', 'march', 'april', 'may', 'june', 'july',
                            'august', 'september', 'october', 'november', 'december');
                        for($i = 1; $i <= 12; $i++)
                            if($i == $date[0])
                                $m = get_phrase($month_list[$i-1]);
                        echo $m . ', ' . $date[1];
                        ?>
                    </td>
                    <td>
                        <?php
                        if($row['status'] == 1)
                            echo '<div class="label label-success">' . get_phrase('paid').'</div>';
                        else
                            echo '<div class="label label-danger">' . get_phrase('unpaid').'</div>';
                        ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">

                                <li>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/payroll_details/<?php echo $row['payroll_id']; ?>');">
                                        <i class="entypo-eye"></i>
                                        <?php echo get_phrase('view_payslip_details'); ?>
                                    </a>
                                </li>

                                <?php if($row['status'] == 0) { ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php?admin/payroll_list/mark_paid/<?php echo $row['payroll_id']; ?>/<?php echo $month; ?>/<?php echo $year; ?>">
                                            <i class="entypo-target"></i>
                                            <?php echo get_phrase('mark_as_paid'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php } ?>

<script type="text/javascript">

    $( document ).ready(function()
    {
        // SelectBoxIt Dropdown replacement
        if($.isFunction($.fn.selectBoxIt))
        {
            $("select.selectboxit").each(function(i, el)
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