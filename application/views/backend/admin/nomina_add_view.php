<hr />

<?php echo form_open(base_url() . 'index.php?admin/nomina_selector'); ?>
    
	<a href="<?php echo base_url();?>index.php?admin/pdf"  
		class="btn btn-primary pull-right" target="">
		<i class="entypo-plus-circled"></i>
		<?php echo get_phrase('PDF'); ?>
   </a> 

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('department'); ?></label>
                <select name="department_id" class="form-control" onchange="get_employees(this.value);" required>
                    <option value=""><?php echo get_phrase('select_a_department'); ?></option>
                    <?php
                    $departments = $this->db->get('department')->result_array();
                    foreach($departments as $row): ?>
                        <option value="<?php echo $row['department_id']; ?>"
                            <?php if($row['department_id'] == $department_id) echo 'selected'; ?>>
                                <?php echo $row['name'] . ' ' . get_phrase('department'); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('employee'); ?></label>
                <select name="employee_id" class="form-control" id="employee_holder" required>
                    <?php
                    $employees = $this->db->get_where('user',
                        array('type' => 2, 'department_id' => $department_id))->result_array();
                    foreach($employees as $row): ?>
                        <option value="<?php echo $row['user_id']; ?>"
                            <?php if($row['user_id'] == $employee_id) echo 'selected'; ?>>
                                <?php echo $row['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('month'); ?></label>
                <select name="month" class="form-control" required>
                    <option value=""><?php echo get_phrase('select_a_month'); ?></option>
                    <?php
                    for ($i = 1; $i <= 12; $i++):
                        if ($i == 1)
                            $m = get_phrase('january');
                        else if ($i == 2)
                            $m = get_phrase('february');
                        else if ($i == 3)
                            $m = get_phrase('march');
                        else if ($i == 4)
                            $m = get_phrase('april');
                        else if ($i == 5)
                            $m = get_phrase('may');
                        else if ($i == 6)
                            $m = get_phrase('june');
                        else if ($i == 7)
                            $m = get_phrase('july');
                        else if ($i == 8)
                            $m = get_phrase('august');
                        else if ($i == 9)
                            $m = get_phrase('september');
                        else if ($i == 10)
                            $m = get_phrase('october');
                        else if ($i == 11)
                            $m = get_phrase('november');
                        else if ($i == 12)
                            $m = get_phrase('december'); ?>
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $month) echo 'selected'; ?>>
                                <?php echo $m; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label class="control-label" style="margin-bottom: 5px;"><?php echo get_phrase('year'); ?></label>
                <select name="year" class="form-control" required>
                    <option value=""><?php echo get_phrase('select_a_year'); ?></option>
                    <?php
                    for($i = 2016; $i <= 2026; $i++): ?>
                        <option value="<?php echo $i; ?>"
                            <?php if($i == $year) echo 'selected'; ?>>
                                <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2" style="margin-top: 20px;">
            <button type="submit" class="btn btn-info" style="width: 100%;">
                <?php echo get_phrase('submit'); ?></button>
        </div>

    </div>

<?php echo form_close(); ?>

<hr />

<?php echo form_open(base_url() . 'index.php?admin/create_payroll',
    array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('allowances'); ?>
                    </div>
                </div>
                <div class="panel-body ">
                    <span id="allowance">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="allowance_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="allowance_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="allowance_amount_1" />
                            </div>
                        </div>
                    </span>

                    <span id="allowance_input">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="allowance_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="allowance_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="allowance_amount" />
                            </div>

                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default"
                                    id="allowance_amount_delete" onclick="deleteAllowanceParentElement(this)">
                                    <i class="entypo-trash"></i>
                                </button>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                        <div class="col-sm-5" style="text-align: right;">
                            <button type="button" class="btn btn-default btn-sm btn-icon icon-left" onClick="add_allowance()">
                                <?php echo get_phrase('add_allowance'); ?>
                                <i class="entypo-plus"></i>
                            </button>
                        </div>
                        
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-info btn-sm" onClick="calculate_total_allowance()">
                                <?php echo get_phrase('calculate_total_allowance'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('deductions'); ?>
                    </div>
                </div>
                <div class="panel-body ">
                    <span id="deduction">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="deduction_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="deduction_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="deduction_amount_1" />
                            </div>
                        </div>
                    </span>

                    <span id="deduction_input">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="deduction_type[]"
                                    placeholder="<?php echo get_phrase('type'); ?>" />
                            </div>

                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="deduction_amount[]"
                                    placeholder="<?php echo get_phrase('amount'); ?>"
                                    id="deduction_amount" />
                            </div>

                            <div class="col-sm-2">
                                <button type="button" class="btn btn-default"
                                    id="deduction_amount_delete" onclick="deleteDeductionParentElement(this)">
                                    <i class="entypo-trash"></i>
                                </button>
                            </div>
                        </div>
                    </span>

                    <div class="form-group">
                        <div class="col-sm-5" style="text-align: right;">
                            <button type="button" class="btn btn-default btn-sm btn-icon icon-left" onClick="add_deduction()">
                                <?php echo get_phrase('add_deduction'); ?>
                                <i class="entypo-plus"></i>
                            </button>
                        </div>
                        
                        <div class="col-sm-5">
                            <button type="button" class="btn btn-info btn-sm" onClick="calculate_total_deduction()">
                                <?php echo get_phrase('calculate_total_deduction'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('summary'); ?>
                    </div>
                </div>
                
                <div class="panel-body ">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('basic'); ?></label>

                        <div class="col-sm-7">
                            <?php
                            $joining_salary = $this->db->get_where('user', array('user_id' => $employee_id))->row()->joining_salary; ?>
                            <input type="text" class="form-control" name="basic" id="basic"
                                value="<?php echo $joining_salary; ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('total_allowance'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="total_allowance"
                                id="total_allowance" value="0" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('total_deduction'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="total_deduction"
                                id="total_deduction" value="0" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('net_salary'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="net_salary"
                                id="net_salary" value="<?php echo $joining_salary; ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status'); ?></label>

                        <div class="col-sm-7">
                            <select name="status" class="form-control selectboxit">
                                <option value="1"><?php echo get_phrase('paid'); ?></option>
                                <option value="0"><?php echo get_phrase('unpaid'); ?></option>
                            </select>
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-success"><?php echo get_phrase('create_payslip'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <input type="hidden" name="user_id" value="<?php echo $employee_id; ?>" />
    <input type="hidden" name="month" value="<?php echo $month; ?>" />
    <input type="hidden" name="year" value="<?php echo $year; ?>" />

<?php echo form_close(); ?>

<script type="text/javascript">

    var allowance_count     = 1;
    var deduction_count     = 1;
    var total_allowance     = 0;
    var total_deduction     = 0;
    var deleted_allowances  = [];
    var deleted_deductions  = [];

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
    
    function get_employees(department_id)
    {
        if(department_id != '')
            $.ajax({
                url     : '<?php echo base_url(); ?>index.php?admin/get_employees/' + department_id,
                success : function(response)
                {
                    jQuery('#employee_holder').html(response);
                }
            });
        else
            jQuery('#employee_holder').html('<option value=""><?php echo get_phrase("select_a_department_first"); ?></option>');
    }
    
    $('#allowance_input').hide();
    
    // CREATING BLANK ALLOWANCE INPUT
    var blank_allowance = '';
    $(document).ready(function () {
        blank_allowance = $('#allowance_input').html();
    });

    function add_allowance()
    {
        allowance_count++;
        $("#allowance").append(blank_allowance);
        $('#allowance_amount').attr('id', 'allowance_amount_' + allowance_count);
        $('#allowance_amount_delete').attr('id', 'allowance_amount_delete_' + allowance_count);
        $('#allowance_amount_delete_' + allowance_count).attr('onclick', 'deleteAllowanceParentElement(this, ' + allowance_count + ')');
    }

    // REMOVING ALLOWANCE INPUT
    function deleteAllowanceParentElement(n, allowance_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_allowances.push(allowance_count);
    }
    
    function calculate_total_allowance()
    {
        var amount;
        for(i = 1; i <= allowance_count; i++) {
            if(jQuery.inArray(i, deleted_allowances) == -1)
            {
                amount = $('#allowance_amount_' + i).val();

                if(amount != '') {
                    amount = parseInt(amount);
                    total_allowance = amount + total_allowance;
                    $('#total_allowance').attr('value', total_allowance);
                }
            }
        }
        net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
        $('#net_salary').attr('value', net_salary);
        total_allowance = 0;
    }
    
    $('#deduction_input').hide();
    
    // CREATING BLANK DEDUCTION INPUT
    var blank_deduction = '';
    $(document).ready(function () {
        blank_deduction = $('#deduction_input').html();
    });

    function add_deduction()
    {
        deduction_count++;
        $("#deduction").append(blank_deduction);
        $('#deduction_amount').attr('id', 'deduction_amount_' + deduction_count);
        $('#deduction_amount_delete').attr('id', 'deduction_amount_delete_' + deduction_count);
        $('#deduction_amount_delete_' + deduction_count).attr('onclick', 'deleteDeductionParentElement(this, ' + deduction_count + ')');
    }

    // REMOVING DEDUCTION INPUT
    function deleteDeductionParentElement(n, deduction_count) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
        deleted_deductions.push(deduction_count);
    }
    
    function calculate_total_deduction()
    {
        var amount;
        for(i = 1; i <= deduction_count; i++) {
            if(jQuery.inArray(i, deleted_deductions) == -1)
            {
                amount = $('#deduction_amount_' + i).val();

                if(amount != '') {
                    amount = parseInt(amount);
                    total_deduction = amount + total_deduction;
                    $('#total_deduction').attr('value', total_deduction);
                }
            }
        }
        net_salary = parseInt($('#basic').val()) + parseInt($('#total_allowance').val()) - parseInt($('#total_deduction').val());
        $('#net_salary').attr('value', net_salary);
        total_deduction = 0;
    }

</script>