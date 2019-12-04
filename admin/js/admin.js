$(document).ready(function () {
    $('.AH3').change(function() {

        var checkformUrl = "anhien.php";

        // var idDT = $(".idDT",this).html();
        var idDT = $(this).parent().parent().parent().find('.idDT').html();
        console.log(idDT);
        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: {'ketqua':$(this).prop('checked'),'idDT':idDT},
            success: function (result) {

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