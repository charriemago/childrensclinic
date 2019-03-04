$(function(){
    $('#addForm').submit(function(){
        let form = $(this).serialize();

        validateForm("Are you sure you want to add this data?" , function() { 
            $.post(URL+'billing/saveBill', form)
            .done(function(returnData){
                alert('Bill successfully saved');
                location.href=URL+'billing';
            })    
        })
        return false;
    });
})