$(document).ready(function($) {
    $('#registrationForm').submit(function(e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: 'php/register.php',
            data: {
                username: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function(response) {
                window.location.href = "./login.html";
                console.log(response);
            },
            error: function(error) {
                // alert("error");
                console.error(error);
            }
        });
    });
});