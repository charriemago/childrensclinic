$(function(){
    $('#addMessage').submit(function(){
        let form = $(this).serialize();

        validateForm("Are you sure you want to submit this data?" , function() { 
            $.post(URL+'sms/addMessage', form)
            .done(function(returnData){
                alert('Message successfully sent');
                location.href=URL+'sms';
            })    
        })
        return false;
    });
})