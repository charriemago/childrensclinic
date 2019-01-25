$(function(){
    
    $('#addPatientForm').submit(function(){
        let form = $(this).serialize();
        validateForm("Are you sure you want to add this data?" , function() {
            $.post(URL+'patient/save', form)
            .done( data => {
                let {msg} = JSON.parse(data);
                alert(msg);
            })
            .fail ( err_data => {
                console.log(err_data);
            });
        });
        return false;
    });

    $('#updatePatientForm').submit(function(){
        let form = $(this).serialize();
        validateForm("Are you sure you want to add this data?" , function() {
            $.post(URL+'patient/update', form)
                .done( data => {
                    let {msg} = JSON.parse(data);
                    alert(msg);
                })
                .fail ( err_data => {
                    console.log(err_data);
                });
        });
        return false;
    });

    $('.update-trigger').click(function(){
        $('input, textarea').prop('disabled', false);
        $('.btn-update').removeClass('d-none');
    })
})