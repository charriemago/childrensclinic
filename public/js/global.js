function validateForm(msg, submit) {
    $('#save_confirm_modal').modal({
        backdrop: 'static',
        keyboard: false,
        toggle: true
    });

    $('#save_confirm_modal .modal-dialog .modal-content .modal-body .padx').html(msg);
    $('#btn-confirmSave').unbind('click');
    $('#btn-confirmSave').bind('click', function () {
        $(this).prop('disabled', true);
        $(this).append(' <i class="pe-7s-refresh-2 pe-va pe-lg pe-spin"></i>');
        return submit();
    });

    $('.btn-cancel-modal').click(function () {
        $('#save_confirm_modal').modal('toggle');
    });

}

function removeSpinner(button) {
    $(button).find('i.pe-7s-refresh-2').addClass('d-none');
    $(button).prop('disabled', false);
}

function fnExcelReport(filename, data) {
	var ua = window.navigator.userAgent;
	var msie = ua.indexOf("MSIE ");
	if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { // IE
		txtArea1.document.open("txt/html", "replace");
		txtArea1.document.write(tab_text);
		txtArea1.document.close();
		txtArea1.focus();
		sa = txtArea1.document.execCommand("SaveAs", true, filename + ".xls");
	} else {
		let a = $("<a />", {
			href: 'data:application/vnd.ms-excel,' + encodeURIComponent(data),
			download: filename + ".xls"
		})
		.appendTo("body")
		.get(0)
		.click();
	}
}
