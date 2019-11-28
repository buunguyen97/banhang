$(document).ready(function () {
    $('#mail').blur(function() {

        var checkformUrl = "checkmail.php";
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#mail"),
            success: function (result) {


                if (result == 1) {
                    $("#notim").html("Bạn cần nhập email ");
                    $("#notim").addClass("thongbao");
                    return false;
                 }
                 else   if (result == 2) {
                    $("#notim").html("Bạn nhập email không đúng ");
                    $("#notim").addClass("thongbao");
                    return false;
                }
                else   if (result == 3) {
                    $("#notim").html("Email này đã có người dùng ");
                    $("#notim").addClass("thongbao");
                    return false;
                }
                else {
                    $("#notim").html("Email này có thể sử dụng");
                    $("#notim").addClass("alert-success");
                    setTimeout(function(){
                        $("#notim").html("");
                        $("#notim").removeClass("alert-success");
                    }, 3000);
                }

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });

    });
});