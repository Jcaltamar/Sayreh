<div id="company_entry">
    <div class="row">
        <hr>
        <div class="col-sm-3">
            <strong><?php echo 'Nombre'; ?></strong>
            <input type="text" name="company_name[]" class="form-control" value=""
                placeholder="" >
        </div>
        <div class="col-sm-2">
            <strong><?php echo get_phrase('Sexo'); ?></strong>
            <input type="text" name="department[]" class="form-control" value=""
                placeholder="">
        </div>
        <div class="col-sm-2">
            <strong><?php echo 'Edad'; ?></strong>
            <input type="text" name="designation[]" class="form-control" value=""
                placeholder="" >
        </div>
        <a href="#" style="margin-top: 20px;" onclick="delete_entry(this)"
            class="btn btn-default btn-sm">
            <i class="entypo-trash"></i>
        </a>
    </div>
</div>

<div id="new_entry">

</div>

<hr>
<button type="button" class="btn btn-info btn-sm" id="add_button" style="margin-top: 20px;">
    <?php echo 'Adicionar Otra Hijo'; ?>
</button>

<script type="text/javascript">

    var company_entry_count = 1;
    var blank_entry_html = $('#company_entry').html();

    $('#add_button').click(function() {
        $('#new_entry').append(blank_entry_html);
        company_entry_count++;
    });

    function delete_entry(n) {
        if (company_entry_count > 1) {
            n.parentNode.parentNode.removeChild(n.parentNode);
            company_entry_count = company_entry_count - 1;
        }
    }

</script>
