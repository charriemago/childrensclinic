$(function(){
    
    $('#addPatientForm').submit(function(){
        let form = $(this).serialize();
        validateForm("Are you sure you want to add this data?" , function() {
            $.post(URL+'patient/save', form)
            .done( data => {
                let {msg} = JSON.parse(data);
                alert(msg);
                location.href = URL+'patient';
            })
            .fail ( err_data => {
                let err = JSON.parse(err_data.responseText);
                if(err.msg != undefined){
                    alert('Error: ' + err.msg);
                    $('#save_confirm_modal').modal('toggle');
                    removeSpinner('button[type="button"]');
                }
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
                    location.href = URL+'patient';
                })
                .fail ( err_data => {
                    let err = JSON.parse(err_data.responseText);
                    if(err.msg != undefined){
                        alert('Error: ' + err.msg);
                        $('#save_confirm_modal').modal('toggle');
                        removeSpinner('button[type="button"]');
                    }
                });
        });
        return false;
    });

    $('.update-trigger').click(function(){
        $('input, textarea').prop('disabled', false);
        $('.btn-update').removeClass('d-none');
    })
})