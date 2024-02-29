<script>
    $(document).ready(function() {
        $('#submit_activity').click(function() {
          
            $('.validation-error').remove();

            // Validate Activity Name
            let activity_name = $('#activity_name').val();
            if (activity_name === '') {
                $('#activity_name').after('<label class="validation-error" for="inputError"><i class="fa fa-times-circle-o"></i>* This field is required</label>');
                return false;
            }

            
            $.ajax({
                type: 'POST',
                url: $('#activity_form').attr('action'),
                data: $('#activity_form').serialize(), 
                success: function(response) {
                    
                    console.log(response);
                    window.location.href = "{{ route('activity.index') }}";
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
