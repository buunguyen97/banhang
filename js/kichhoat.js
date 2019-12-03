$(document).ready(function () {

    $('#kichhoat').click(function() {
        //kiểm tra email


        var checkformUrl = "kichhoat.php";




        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $("#makh"),
            success: function (result) {


                if (result.result == 'co') {
                    $("#contenttc").addClass("an");
                    $("#contentdk").addClass("an");
                    $("#kh").removeClass("an");

                }
                else {
                    alert("loi roai");
                    return false;
                }


            },
            error: function () {
                console.log('aaaaaaaaaaaaaa')
            }
        });
    });
});