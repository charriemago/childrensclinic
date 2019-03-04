$(function() {
    addVisits();
    addNewLine();
});


function addNewLine() {
    $('.btn-add-line').unbind('click');
    $('.btn-add-line').bind('click', function () {
        var newLine = `
            <tr>
                <td><input class="form-control" type="date" name="date_visit[]" required="required"></td>      
                <td><input class="form-control" type="number" name="age[]" required="required"></td>      
                <td><input class="form-control" type="text" name="weight[]" required="required"></td>      
                <td><input class="form-control" type="text" name="height[]" required="required"></td>      
                <td><input class="form-control" type="text" name="diagnosis[]" required="required"></td>
            </tr>
        `;
        $('#table-visits tbody').append(newLine);

    });
}
function addVisits() {
    $('.form-add-visit').submit(function(){
        let form = $(this).serialize();
        
        validateForm("Are you sure you want to add this data?" , function() {
            $.post(URL + 'followup/save', form)
            .done(function(result) {
                if(result === '1') {
                    alert('Follow up Successfully Saved.');
                    location.reload();
                } else if(result === '0') {
                    alert('Follow up already exist!');
                    $('#save_confirm_modal').modal('toggle');
                    removeSpinner('button[type="button"]');

                }
            });
            return false;
        });
        return false;
       
    });
}

