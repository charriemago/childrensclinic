$(function(){
    $('#addPatientForm').submit(function(){
        let form = $(this).serialize();
        $.post(URL+'patient/save', form)
            .done( data => {
                console.log(data);
            })
            .fail ( err_data => {
                console.log(err_data);
            });
        // console.log(form);
        return false;
    });
})