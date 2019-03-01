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
    $('#allMessage').click(function(){
        let message = $('textarea[name="message"]').val();
        if(message != ''){
            validateForm("Are you sure you want to submit this data?" , function() { 
                $.post(URL+'sms/allMessage', {'message':message})
                .done(function(returnData){
                    alert('Message successfully sent');
                    location.href=URL+'sms';
                })    
            })
        } else {
            alert('Please input your message.');
        }
        return false;
    });
})