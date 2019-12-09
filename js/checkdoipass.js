$(document).ready(function () {
    $("#passcu").focus(function () {
        $("#notipasscu").html("");
        $("#notipasscu").removeClass("thongbao");
    });
    $("#passmoi").focus(function () {
        $("#notipassmoi").html("");
        $("#notipassmoi").removeClass("thongbao");
    });
    $("#passlai").focus(function () {
        $("#notipasslai").html("");
        $("#notipasslai").removeClass("thongbao");
    });
    $('#passmoi').blur(function() {
        var pass = $("#passmoi").val();
        if((pass.length)<6 ){
            $("#notipassmoi").html("Mật khẩu nhiều hơn 5 chữ số");
            $("#notipassmoi").addClass("thongbao");
            return false;
        }

    });
    $('#passlai').blur(function() {
        if (($("#passlai").val()) == ($("#passmoi").val())) {

        }else {
            $("#notipasslai").html("nhập lại mật khẩu k đúng");
            $("#notipasslai").addClass("thongbao");
            return false;
        }
        if(($("#passlai").val()) == "" ){
            $("#notipasslai").html("");
            $("#notipasslai").removeClass("alert-success");
        }

    });
    $('#doipass').click(function () {

        var checkformUrl = "checkdoipass.php";

        var passcu = $("#passcu").val();
        var passmoi = $("#passmoi").val();
        var passlai = $("#passlai").val();
        if (passcu == "") {
            $("#notipasscu").html("Ban chưa nhập mật khẩu cũ ");
            $("#notipasscu").addClass("thongbao");
            return false;
        }
        if (passmoi == "") {
            $("#notipassmoi").html("Ban chưa nhập mật khẩu mới");
            $("#notipassmoi").addClass("thongbao");
            return false;
        }
        if (passlai == "") {
            $("#notipasslai").html("Ban chưa nhập mật khẩu mới");
            $("#notipasslai").addClass("thongbao");
            return false;
        }
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#formdoipass").serialize(),
            success: function (result) {


                if (result == 'ok') {
                    $("#notipasslai").html('Đổi mật khẩu thành công');
                    $("#notipasslai").addClass(" alert-success");
                    setTimeout(function(){
                        document.location='index.php';
                    }, 2000);

                }
                else if(result == 'ko') {

                    $("#notipasscu").html("Mật khẩu cũ không đúng");
                    $("#notipasscu").addClass("thongbao");
                    return false;
                }


            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });
});