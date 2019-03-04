$(function(){
    $('.btn-add').click(function(){
        $('#addVaccineModal').modal('toggle');
    })
    $('table').on('click', '.btn-edit', function(){
        var id = $(this).attr('data-id');
        var vaccine = $(this).closest('tr').find('td:nth-child(1)').text();
        $('#updateVaccineForm').find('input[name="vaccine"]').val(vaccine);
        $('#updateVaccineForm').find('input[name="id"]').val(id);
        $('#updateVaccineModal').modal('toggle');
    })
    $('table').on('click', '.btn-delete', function(){
        var id = $(this).attr('data-id');
        validateForm("Are you sure you want to delete this data?" , function(){
            $.post(URL+'vaccine/delete', {'id': id})
            .done(function(returnData){
                alert('Vaccine Successfully Deleted.')
                location.reload();
            })
        })
        return false;
    })
    $('#addVaccineForm').submit(function(){
        var form = $(this).serialize();
        validateForm("Are you sure you want to submit this data?" , function(){
            $.post(URL+'vaccine/add', form)
            .done(function(returnData){
                alert('Vaccine Successfully Added.')
                location.reload();
            })
        })
        return false;
    })
    $('#updateVaccineForm').submit(function(){
        var form = $(this).serialize();
        validateForm("Are you sure you want to update this data?" , function(){
            $.post(URL+'vaccine/update', form)
            .done(function(returnData){
                alert('Vaccine Successfully Updated.')
                location.reload();
            })
        })
        return false;
    })
})