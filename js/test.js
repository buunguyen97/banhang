$(document).ready(function(){
    var dHtml = $('#tongsoluong').html();
    $('.them').html(dHtml);
    $('.them').css({'color':'red',"font-weight": "bold"});
    $('.thaydoi').change(function() {
            $('.capnhat').click();
    });
});