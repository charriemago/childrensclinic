$(function(){
    //** post-form scripts ***/
    $(".post-form textarea").keyup(function(e) {
        while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
            $(this).height($(this).height()+1);
        };
    });
    $('.btn-add').click(function(){
        $('.addModal').modal('toggle');
    });
})

