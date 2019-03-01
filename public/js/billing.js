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
    $('.bill-vacc').change(function(){
        var value = $(this).val();
        $(this).closest('tr').find('td.totalVaccineBill span').append('P '+value);
        $(this).closest('tr').find('td.totalVaccineBill .inputTotalVaccineBill').val(value);

        var total = 0;
        $('.inputTotalVaccineBill').each(function(){
            var value = $(this).val();
            total += parseInt(value); 
        });
        var fee = $('input[name="doc_fee"]').val();
        var add = $('input[name="add_fee"]').val();
        let superTotal = total+parseInt(fee)+parseInt(add);
        $('#superTotal').text('P '+superTotal.toFixed(2));


    })
    $('input[name="add_fee"]').blur(function(){
        var total = 0;
        $('.inputTotalVaccineBill').each(function(){
            var value = $(this).val();
            total += parseInt(value); 
        });
        var fee = $('input[name="doc_fee"]').val();
        var add = $('input[name="add_fee"]').val();
        let superTotal = total+parseInt(fee)+parseInt(add);
        $('#superTotal').text('P '+superTotal.toFixed(2));


    })
    $('.btn-export').click(function(){
        let tabledata = `
			<style>
				table {
				  border-collapse: collapse;
				}

				table, th, td {
				  border: 1px solid black;
				}

				table th {
					background: #0d47a1;
					color: white;
				}
			<style>`+
			$("table").clone().wrap('<div>').parent().html()
        ;
        fnExcelReport('Billing_Report', tabledata);
    })
})