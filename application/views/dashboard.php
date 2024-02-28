<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<h1>dashboard</h1>
<?php
// Accessing user data
echo "User ID: " . $userData['user_id'];
echo "User Name: " . $userData['user_name'];
echo "User Email: " . $userData['user_email'];

?>
<br><br><br>
<br><br><br>

<button id="logout">log out </button>

    <script>
    $(document).ready(function() {

        $('#logout').click(function() {
            $.ajax({
                url: "<?php echo base_url('logout'); ?>",
                method: "POST",
                success: function(response) {

                    if (response.status === 'success') {
                        window.location.href = "<?php echo base_url(); ?>";
                    } else if(response.status === 'error'){
                        console.error('Logout failed: ' + response.message);
                    }
                    else {
                        // Handle any error cases if needed
                        console.error('Logout failed: ' + response.message);
                    }
                }
            });
        });
    });
</script>


</body>
</html>