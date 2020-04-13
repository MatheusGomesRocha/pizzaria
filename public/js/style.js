$(window).scroll(function(){ // função para pegar o movimento do scroll (barra de rolagem)
    var top = $(window).scrollTop(); // aqui vc pega a posição da página
    if(top > 200){ // verifica a posição da página
        $('#texts').css('visibility', 'visible');
        $("#texts").addClass('fadeInUp'); // aqui vc aplica o fade no menu$
        $('#textSocial').css('visibility', 'visible');
        $("#textSocial").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
    if(top > 300) {
        $('#textRestaurant').css('visibility', 'visible');
        $('#textRestaurant').addClass('fadeInUp');
    }
    if(top > 350) {
        $('#title').css('visibility', 'visible');
        $('#title').addClass('fadeInUp');
    }
});

