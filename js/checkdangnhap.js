$(document).ready(function () {

    $('#dangnhapchinh').click(function () {

        var checkformUrl = "checkdangnhap.php";

        var mail = $("#maildn").val();
        var pass = $("#passdn").val();
        if (mail == "") {
            $("#notimail").html("Ban chưa nhập email ");
            $("#notimail").addClass("thongbao");
            return false;
        }
        if (pass == "") {
            $("#notipass").html("Ban chưa nhập password");
            $("#notipass").addClass("thongbao");
            return false;
        }
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#formdangnhap").serialize(),
            success: function (result) {


                if (result.result == 'co') {
                    document.location='index.php';

                }
                else if(result.result == 'khong') {

                    $("#notipass").html("Email hoặc Password không đúng");
                    $("#notipass").addClass("thongbao");
                    return false;
                }


            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });
});