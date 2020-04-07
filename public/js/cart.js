$('#qtdCart button').click(function(e) {
    e.preventDefault();

    var qtd = parseInt($('#qtdEdit').val());
    var action = $(this).attr('data-action');

    if (action == 'decrease') {
        if (qtd - 1 >= 1) {
            qtd = qtd - 1;
        }
    }
    else if (action == 'increase') {
        qtd = qtd + 1;
    }

    $('#qtdEdit').val(qtd);
    $('input[name=qtdValue]').val(qtd);
});

