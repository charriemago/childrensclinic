$(function(){
    $('#addForm').submit(function(){
        let form = $(this).serialize();

        $.post(URL+'billing/saveBill', form)
        .done(function(returnData){
            alert('Bill successfully saved');
            location.href=URL+'billing';
        })    
        return false;
    });
})