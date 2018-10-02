<?php


$department_id  = $this->db->get_where('dependencia', array('DEP_CODIGO_DEPEN' => $param2))->row()->DEP_CODIGO_DEPEN;
$department     = $this->db->get_where('dependencia', array('DEP_CODIGO_DEPEN' => $department_id))->result_array();

foreach ($department as $row):
?>    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('edit_department'); ?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(base_url() . 'index.php?admin/dependencia/edit/' . $row['DEP_CODIGO_DEPEN'],
                        array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('Nombre Dependencia');?></label>

                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $row['DEP_NOMBRE_DEPEN'] ?>" autofocus required />
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<script>
    
    $('#designation_input').hide();
    
    // CREATING BLANK DESIGNATION INPUT
    var blank_designation = '';
    $(document).ready(function () {
        blank_designation = $('#designation_input').html();
    });

    function add_designation()
    {
        $("#designation").append(blank_designation);
    }

    // REMOVING DESIGNATION INPUT
    function deleteParentElement(n, designation_id) {
        $.ajax({
            url     : '<?php echo base_url(); ?>index.php?admin/delete_designation/' + designation_id,
            success : function (response)
            {
                response = 'success';
            }
        });
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
    
    function deleteNewParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>

<script>
    $(document).ready(function () {
        var wrapper = $(".add-text-box"); //Fields wrapper
        var add_button = $(".add-designation"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-6"><input type="text" class="form-control" name="designation[]" value="" placeholder="designation" id="designation"></div>'); //add input box

        });


    });

</script>