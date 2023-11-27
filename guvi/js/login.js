$(document).ready(function() {
    $(document).on('submit', '#LoginForm', function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: 'php/login.php',
            data: {
                email: $('#email').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var username = response.username;
                    alert("Logined as " + username);
                    window.location.href = "./profile.html?username=" + encodeURIComponent(username);
                }
                console.log(response);
            },
            error: function(error) {

                console.error(error);
            }
        });
    })
});