<div id="success_message" class="alert alert-success mt-5" style="display:none;"></div>
<form id="inquery">
  <div class="form-group mt-5">
    <label for="first-name">First Name:</label>
    <input type="text" class="form-control" id="first-name" required>
  </div>
  <div class="form-group">
    <label for="last-name">Last Name:</label>
    <input type="text" class="form-control" id="last-name" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number:</label>
    <input type="tel" class="form-control" id="phone" required>
  </div>
  <div class="form-group">
    <label for="message">Message:</label>
    <textarea class="form-control" id="message" rows="5" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<script>
    (function($){

        $('form').submit(function(e) {
        e.preventDefault();
        
        var formData = {
            'first_name': $('#first-name').val(),
            'last_name': $('#last-name').val(),
            'email': $('#email').val(),
            'phone': $('#phone').val(),
            'message': $('#message').val(),
            'action': 'my_ajax_endpoint',
            'nonce': <?php echo wp_create_nonce('ajax_nonce')?>
        };
        
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: formData,
            success: function(response) {
                console.log(response);
                $('#inquery').fadeOut(200);
                $('#success_message').text('thanks, your enquiry is sent').show();
                // Handle the response here
            },
            error:function(er){
                alert(er.response.JSON.data);
            }
        });
    });

    })(jQuery)
</script>




