$(function(){
    searchTable('.search-box-input','.table-standard');
});

function searchTable(textbox,table,pagination){
	$(textbox).keyup(function(){
        var value = this.value.toLowerCase().trim();
        var count = 0;
	    $(table+" tr").each(function(index){
            if (!index) return;
	        $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                if(!not_found){
                    count++;
                }
                $(this).closest('tr').toggle(!not_found);
	            return not_found;
            });
        });
        var length = $(table+' tbody').find('tr.no_matches').length;

        if(count == 0){
            var th = $(table+' th').length;
            var append= '<tr class="no_matches">'+
                            '<td colspan="'+th+'" class="text-center"> No matching records found. </td>'+
                        '</tr>';
             $(table+' tbody').append(append);
        } else {
            $('.no_matches').remove();
        }
        $('.pagination-box span.rows').text((count==0 ? 0 :count-length));
        $('.pagination-box span.first_row').text((count==0 ? 0 : 1));
	});
}