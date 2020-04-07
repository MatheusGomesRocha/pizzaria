$('#btn').click(function() {
    if($('#p').prop('checked')) {
        $('#labelP').css('background-color', '#d7dadd');
        $('#labelM').css('background-color', '#f6f9fc');
        $('#labelG').css('background-color', '#f6f9fc');
        $('#price_sm').css('display', 'block');
        $('#price_md').css('display', 'none');
        $('#price_lg').css('display', 'none');
        $('#input_sm').prop('disabled', false);
        $('#input_md').prop('disabled', true);
        $('#input_lg').prop('disabled', true);
    }
    if($('#m').prop('checked')) {
        $('#labelM').css('background-color', '#d7dadd');
        $('#labelP').css('background-color', '#f6f9fc');
        $('#labelG').css('background-color', '#f6f9fc');
        $('#price_sm').css('display', 'none');
        $('#price_md').css('display', 'block');
        $('#price_lg').css('display', 'none');
        $('#input_sm').prop('disabled', true);
        $('#input_md').prop('disabled', false);
        $('#input_lg').prop('disabled', true);
    }
    if($('#g').prop('checked')) {
        $('#labelG').css('background-color', '#d7dadd');
        $('#labelP').css('background-color', '#f6f9fc');
        $('#labelM').css('background-color', '#f6f9fc');
        $('#price_sm').css('display', 'none');
        $('#price_md').css('display', 'none');
        $('#price_lg').css('display', 'block');
        $('#input_sm').prop('disabled', true);
        $('#input_md').prop('disabled', true);
        $('#input_lg').prop('disabled', false);
    }
});

$('#btnFraction').click(function() {
    if($('#meia').prop('checked')) {
        $('#labelMeia').css('background-color', '#d7dadd');
        $('#labelInteira').css('background-color', '#f6f9fc');
    }
    if($('#inteira').prop('checked')) {
        $('#labelMeia').css('background-color', '#f6f9fc');
        $('#labelInteira').css('background-color', '#d7dadd');
    }
});

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
