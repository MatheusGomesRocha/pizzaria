$('#adressUser').change(function() {        // SCRIPT PARA ADICIONAR A BORDA
    if($('input[type=radio]').prop('checked')) {
        $('#label').css('border', '2px solid #a02020');
    }
    else {
        $('#label').css('border', 'none');
    }

});

$(document).ready(function () {     // SCRIPT PARA SELECIONAR APENAS UMA OPÇÃO (SEM ELE ERA POSSÍVEL SELECIONAR TODAS AS OPÇÕES)
    $('input[type=radio]').click(function() {
        $('input[type=radio]:checked').not(this).prop('checked', false);
    });
});

$(document).ready(function () {
    $("#cepInput").focusout(function () {
        if (this.value) {
            $.ajax({
                url: 'http://api.postmon.com.br/v1/cep/' + this.value,
                dataType: 'json',
                crossDomain: true,
                statusCode: {
                    200: function (data) {
                        $('#ruaInput').val(data.logradouro);
                        $('#ruaHidden').val(data.logradouro);
                        $('#bairroInput').val(data.bairro);
                        $('#bairroHidden').val(data.bairro);
                    },
                    400: function (msg) {
                        alert(msg);
                    },
                    404: function (msg) {
                        alert(msg);

                    },
                }
            });
        }

    });
});

