<script>
    $(document).ready(function() {
        $('#category_form').submit(function(event) {
            event.preventDefault();

            $('.validation-error').remove();

            let category_name = $('input[name="category_name"]').val();
            let errors = false;

            if (category_name === '') {
                $('input[name="category_name"]').after('<span class="validation-error">* This field is required.</span>');
                errors = true;
            }

            if (!errors) {
                $(this).unbind('submit').submit(); // Unbind the current submit event and trigger a JavaScript submission
            }
        });
    });
</script>
