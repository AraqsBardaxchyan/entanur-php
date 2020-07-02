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
                var err = []
                $("#error").html(res.email_error)
                err.push(res);
                console.log(err);
                if(err.length > 0) {
                    $("#disable").attr('disabled', true);
                }

            }
        })
    })
})