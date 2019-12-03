$(document).ready(function () {
    $('.AH3').change(function() {
        console.log($(this).prop('checked'));
        var checkformUrl = "anhien.php";

        $.ajax({
            url: checkformUrl,
            type: 'POST',
            data: $(this).prop('checked'),
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