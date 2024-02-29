<script>
    $(document).ready(function() {
        $('#submitSpecies').click(function(event) {
            event.preventDefault();

            $('.validation-error').remove();

            let name = $('#species_name').val();
            let title = $('#species_title').val(); 
            let image = $('#image').val();

            let errors = false;

            if (name.trim() === '') {
                $('#species_name').after('<span class="validation-error">* This field is required.</span>'); 
                errors = true;
            }

            if (title === null) { 
                $('#species_title').parent().append('<span class="validation-error">           * This field is required</span>'); 
                errors = true;
            }

            if (image.trim() === '') {
                $('#image').parent().append('<span class="validation-error">* Please choose an image.</span>');
                errors = true;
            }

            if (!errors) {
                $('#wildSpecies_form').unbind('submit').submit();
            }
        });
    });
</script>
