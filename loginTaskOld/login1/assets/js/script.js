$(document).ready(function () {
    $("#email").on('blur', function () {
        var email = $(this).val();
        var obj = {
            key: email,
        };
        $.ajax({
            url: "../../registr/emailValidate.php",
            method: "POST",
            dataType: "json",
            data: obj,
            success: function (res) {
                $("#error").html(res.email_error)
            }
        })
    })
})