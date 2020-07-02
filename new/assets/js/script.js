$(document).ready(function () {
    $(".delete").on('click',function (e) {
        e.preventDefault();
        var user = $(this).data('index');
        var id = $(this).next().data('index');
        var div = $("<div class='custom_modal'>");
        div.html("<div><span class='d-block'>Are You Sure</span><button class='btn btn-danger' id='yes'>Yes</button ><button class='btn btn-info' id='no'>No</button></div>");
        $('body').append(div);
        $("#yes").on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var yes = $(this)
            $imagefile = 'images/' + id;
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: {
                    action: 'deleteimage',
                    imagefile: $imagefile,
                    id:id,
                    user:user,
                },
                success: function () {
                    $(".custom_modal").remove();
                    window.location.reload();
                },
                error: function () {
                    console.log('errrorrrr')
                }
            })
        })
        $("#no").on('click', function (e) {
            $(".custom_modal").remove();


        })
    })
});