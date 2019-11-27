$(document).ready(function(){
    var dHtml = $('#tongsoluong').html();
    $('.them').html(dHtml);
    $('.them').css({'color':'red',"font-weight": "bold"});
    $('.thaydoi').change(function() {
            $('.capnhat').click();
    });





    $("#firstname").focus(function () {
        $("#noti").html("");
        $("#noti").removeClass("thongbao");
    });
    $("#lastname").focus(function () {
        $("#notiname").html("");
        $("#notiname").removeClass("thongbao");
    });
    $("#email").focus(function () {
        $("#notiemail").html("");
        $("#notiemail").removeClass("thongbao");
    });
    $("#subject").focus(function () {
        $("#notisub").html("");
        $("#notisub").removeClass("thongbao");
    });
    $("#message").focus(function () {
        $("#notinoidung").html("");
        $("#notinoidung").removeClass("thongbao");
    });
    $("#cap").focus(function () {
        $("#noticap").html("");
        $("#noticap").removeClass("thongbao");
    });
    $('#checklienhe').click(function() {


        var checkformUrl = "checklienhe.php";
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var emaillh = $("#email").val();
        var sublh = $("#subject").val();
        var messagelh = $("#message").val();
        var cap = $("#cap").val();
        if (firstname == "") {
            $("#noti").html("Ban chưa nhập tên ");
            $("#noti").addClass("thongbao");
            return false;
        }
        if (lastname == "") {
            $("#notiname").html("Ban chưa nhập họ");
            $("#notiname").addClass("thongbao");
            return false;
        }
        if (emaillh == "") {
            $("#notiemail").html("Ban chưa nhập email");
            $("#notiemail").addClass("thongbao");
            return false;
        }
        //kiểm tra email
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        if( !isEmail(emaillh)) {
            $("#notiemail").html("Email không hợp lệ");
            $("#notiemail").addClass("thongbao");
            return false;
        }
        if (sublh == "") {
            $("#notisub").html("Ban chưa nhập tiêu đề");
            $("#notisub").addClass("thongbao");
            return false;
        }
        if (messagelh == "") {
            $("#notinoidung").html("Ý kiến của bạn");
            $("#notinoidung").addClass("thongbao");
            return false;
        }
        if (cap == "") {
            $("#noticap").html("Bạn chưa nhập mã");
            $("#noticap").addClass("thongbao");
            return false;
        }

        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#lienhebh").serialize(),
            success: function (result) {


                if (result.result == 'co') {

                    // hiện thị thông báo khi cmt thành công
                    $("#thongbao").html("Cảm ơn bạn, ý kiến đã được ghi nhận.");
                    $("#thongbao").addClass("thongbao");
                    $("#firstname").val("");
                    $("#lastname").val("");
                    $("#email").val("");
                    $("#subject").val("");
                    $("#message").val("");
                    $("#cap").val("");

                }
                if (result == 'notind') {
                    $("#notinoidung").html("Nội dung quá ngắn");
                    $("#notinoidung").addClass("thongbao");
                    return false;
                }
                if (result == 'noticap') {
                    $("#noticap").html("Mã nhập không đúng !!");
                    $("#noticap").addClass("thongbao");
                    return false;
                }

            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });
});