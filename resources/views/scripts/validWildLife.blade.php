<script>
    $(document).ready(function() {
        $('#submitWildLifeForm').click(function(event) {
            event.preventDefault();

            $('.validation-error').remove();

            let title = $('#wildLife_title').val();
            let image = $('#images').val();

            let errors = false;

            if (title.trim() === '') {
                $('#wildLife_title').after('<span class="validation-error">* This field is required.</span>');
                errors = true;
            }

            if (image.trim() === '') {
                $('#images').parent().append('<span class="validation-error">* Please choose an image.</span>');
                errors = true;
            }

            if (!errors) {
                $('#wildLife_form').unbind('submit').submit();
            }
        });
    });
   
</script>



