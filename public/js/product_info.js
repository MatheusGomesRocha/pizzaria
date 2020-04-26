$('#formCart button').click(function(e) {
    e.preventDefault();

    var qtd = parseInt($('#qtd').val());
    var action = $(this).attr('data-action');

    if (action == 'decrease') {
        if (qtd - 1 >= 1) {
            qtd = qtd - 1;
        }
    }
    else if (action == 'increase') {
        qtd = qtd + 1;
    }

    $('#qtd').val(qtd);
    $('input[name=qtd_hidden]').val(qtd);
});
