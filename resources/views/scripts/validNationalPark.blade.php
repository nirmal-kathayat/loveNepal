<script>
    $(document).ready(function() {
        $('#submitNationalPark').click(function(event) {
            event.preventDefault();

            $('.validation-error').remove();

            let title = $('#nationalPark_title').val();
            let image = $('#image').val();

            let errors = false;

            if (title.trim() === '') {
                $('#nationalPark_title').after('<span class="validation-error">* This field is required.</span>');
                errors = true;
            }

            if (image.trim() === '') {
                $('#image').parent().append('<span class="validation-error">* Please choose an image.</span>');
                errors = true;
            }

            if (!errors) {
                $('#nationalPark_form').unbind('submit').submit();
            }
        });
    });
</script>
