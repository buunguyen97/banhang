$(document).ready(function () {
    $("#loading").addClass('loading1');
    $('#kichhoat').click(function() {
        //kiểm tra email
        $("#loading").removeClass('loading1');

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
                    $("#loading").addClass('loading1');
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