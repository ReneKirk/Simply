
var $ = jQuery;

$(document).ready(function(){

    $('.registerDownload').click(function(e){

        var destinationUrl = $(this).attr('href');
        var theme_id = $(this).attr('data-theme-id');

        $.ajax({
            url: '/?registerDownload=' + theme_id,
            dataType: 'json',
            type: 'post',
            data: {
                theme_id: theme_id
            },
            success:function(){
                window.open(destinationUrl);
            }
        });

    });

});