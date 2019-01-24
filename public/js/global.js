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
        $(this).append(' <i class="fa fa-refresh fa-spin"></i>');
        return submit();
    });

    $('.btn-cancel-modal').click(function () {
        $('#save_confirm_modal').modal('toggle');
    });

}

function removeSpinner(button) {
    $(button).find('.fa-spin').addClass('hidden');
    $(button).prop('disabled', false);
}
