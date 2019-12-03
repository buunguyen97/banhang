$(document).ready(function () {
    $("#loading").addClass('loading1');
    $("#mail").focus(function () {
        $("#notim").html("");
        $("#notim").removeClass("thongbao");
    });
    $("#pass").focus(function () {
        $("#notip").html("");
        $("#notip").removeClass("thongbao");
    });
    $("#repass").focus(function () {
        $("#notirp").html("");
        $("#notirp").removeClass("thongbao");
    });
    $("#hoten").focus(function () {
        $("#notih").html("");
        $("#notih").removeClass("thongbao");
    });
    $("#dc").focus(function () {
        $("#notidc").html("");
        $("#notidc").removeClass("thongbao");
    });
    $("#dt").focus(function () {
        $("#notidt").html("");
        $("#notidt").removeClass("thongbao");
    });
    $("#capcha").focus(function () {
        $("#noticap").html("");
        $("#noticap").removeClass("thongbao");
    });
    $('#repass').blur(function() {
        if (($("#repass").val()) == ($("#pass").val())) {
            $("#notirp").html('\t&#10004; Đúng rồi nhé !!!');
            $("#notirp").addClass(" alert-success");
            setTimeout(function(){
                $("#notirp").html("");
                $("#notirp").removeClass("alert-success");
            }, 3000);
        }else {
            $("#notirp").html("nhập lại mật khẩu k đúng");
            $("#notirp").addClass("thongbao");
            return false;
        }
        if(($("#repass").val()) == "" ){
            $("#notirp").html("");
            $("#notirp").removeClass("alert-success");
        }

    });
    $('#dt').blur(function() {
        var dt = $("#dt").val();
        if((($("#dt").val()).length)>0 && (($("#dt").val()).length)<10){
            $("#notidt").html("Số điện thoại k đúng");
            $("#notidt").addClass("thongbao");
            return false;
        }

    });
    $('#pass').blur(function() {
        var pass = $("#pass").val();
        if((pass.length)<6 ){
            $("#notip").html("Mật khẩu nhiều hơn 5 chữ số");
            $("#notip").addClass("thongbao");
            return false;
        }

    });
    $('#dangki').click(function() {

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        var mail = $("#mail").val();
        var pass = $("#pass").val();
        var repass = $("#repass").val();
        var hoten = $("#hoten").val();
        var dc = $("#dc").val();
        var dt = $("#dt").val();
        var cap = $("#capcha").val();
        if (mail == "") {
            $("#notim").html("Bạn cần nhập email ");
            $("#notim").addClass("thongbao");
            return false;
        }
        else if( !isEmail(mail)) {
            $("#notim").html("Email không hợp lệ");
            $("#notim").addClass("thongbao");
            return false;
        }else if (pass == "") {
            $("#notip").html("Ban chưa nhập mật khẩu");
            $("#notip").addClass("thongbao");
            return false;
        }else if (repass == "") {
            $("#notirp").html("Ban chưa nhập lại mật khẩu");
            $("#notirp").addClass("thongbao");
            return false;
        }else if (hoten == "") {
            $("#notih").html("Ban chưa nhập họ tên");
            $("#notih").addClass("thongbao");
            return false;
        }else if (dc == "") {
            $("#notidc").html("Ban chưa nhập địa chỉ");
            $("#notidc").addClass("thongbao");
            return false;
        }else if (dt == "") {
            $("#notidt").html("Ban chưa nhập số điện thoai");
            $("#notidt").addClass("thongbao");
            return false;
        }else if (cap == "") {
            $("#noticap").html("Ban chưa nhập mã");
            $("#noticap").addClass("thongbao");
            return false;
        }
        $("#loading").removeClass('loading1');
        var checkformUrl = "checkdangky.php";
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#dangky").serialize(),
            success: function (result) {

                if (result == 'loi') {

                    $("#noticap").html("Mã không đúng");
                    $("#noticap").addClass("thongbao");
                    return false;

                }
                if (result.result == 'co') {

                    $("#contentdk").addClass("an");
                    $("#contenttc").removeClass("an");
                    $("#loading").addClass('loading1');
                }
                

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });
});