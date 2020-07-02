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
        var id = $(this).next().data('index');
        var div = $("<div class='custom_modal'>");
        div.html("<div><span class='d-block'>Are You Sure</span><button class='btn btn-danger' id='yes'>Yes</button ><button class='btn btn-info' id='no'>No</button></div>");
        $('body').append(div);
        $("#yes").on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var yes = $(this);
            var imgId = {
                id:id,
            };
            $.ajax({
                url:"../../gallery/deleteImg.php",
                method:"POST",
                dataType: "json",
                data: imgId,
                success:function (res) {
                    var images =  $(".for-id")
                    for (var i = 0; i < images.length; i++){
                        if (res.id == images.eq(i).data('index')){
                            var img = images.eq(i);
                            img.parent().remove();
                        }
                    }
                    $(".custom_modal").remove();
                }
            })

        });
        $("#no").on('click', function (e) {
            $(".custom_modal").remove();
        });

    })
})