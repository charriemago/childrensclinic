$(function(){
    // $('.form-control-standard').focusin(function(){  
    //     $(this).siblings('div').find('.input-group-text').css({
    //         'border-bottom': '1px solid rgba(0,123,123,.6)',
    //         'transition': '.2s',
    //         'color': '#007b7b'
    //     });
    // }).focusout(function(){  
    //     $(this).siblings('div').find('.input-group-text').css({
    //         'border-bottom': '1px solid #ced4da',
    //         'transition': '.2s',
    //         'color': '#495057'
    //     });
    // });

    $('#loginForm').submit(function(){
        let form = $(this).serialize();
        $.post(`${ URL }user/login`, form)
            .done( data => {
                let { msg } = JSON.parse(data);
                if(msg == 'success') {
                    location.reload();
                }
            })
            .fail ( err_data => {
                let err = JSON.parse(err_data.responseText);
                if(err.msg != undefined){
                    alert('Error: ' + err.msg);
                }
            });
        return false;
    });

})