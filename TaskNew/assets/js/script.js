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

    $("#edit_btn").on('click', function () {
        var id = $(this).next().val();
        var key = {
            userId: id,
        }

        $.ajax({
            url: "../../gender.php",
            method: "POST",
            dataType: "json",
            data: key,
            success:function (data) {
               if (data.gender == 'male') {
                   $("#male").attr('checked', true)
               } else {
                   $("#female").attr('checked', true)
               }
            }
        })
    })

    $(".delete").on('click',function (e) {
        e.preventDefault();
        $(this).prev().style.visibility='hidden';



        // var id = $(this).next().data('index');
        // var imgId = {
        //     id: id,
        // };
        // $.ajax({
        //     url: "../../gallery/delete.php",
        //     method: "POST",
        //     dataType: "json",
        //     data: imgId,
        //     success: function (res) {
        //         console.log(res);
        //     }
        // })

    })
    $("#mySearch").on('keyup', function () {

        $.ajax({
            url: "../../search/action_page.php",
            method: "GET",
            dataType: 'json',
            success: function (response) {
                $("#mySearch").autocomplete({
                    source: response
                })
            }
        })
    })


})