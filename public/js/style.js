$(window).scroll(function(){ // função para pegar o movimento do scroll (barra de rolagem)
    var top = $(window).scrollTop(); // aqui vc pega a posição da página
    if(top > 200){ // verifica a posição da página
        $('#texts').css('visibility', 'visible');
        $("#texts").addClass('fadeInUp'); // aqui vc aplica o fade no menu
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
    if(top > 800) {
        $('#servTitle').css('visibility', 'visible');
        $("#servTitle").addClass('fadeInUp'); // aqui vc aplica o fade no menu
        $('#servText').css('visibility', 'visible');
        $("#servText").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
    if(top > 1100) {
        $('.content1').css('visibility', 'visible');
        $(".content1").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }

    if(top > 1400) {
        $('#home3Title').css('visibility', 'visible');
        $("#home3Title").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
    if(top > 1350) {
        $('#home3Text').css('visibility', 'visible');
        $("#home3Text").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
});



function pizza() {
    document.getElementById('btnPizza').style.color = "#000";
    document.getElementById('btnPizza').style.backgroundColor = "#FAC564";
    document.getElementById('btnBurger').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.color = "#FAC564";
    document.getElementById('btnDrink').style.backgroundColor = "transparent";
    document.getElementById('btnDrink').style.color = "#FAC564";
    document.getElementById('divPizza').style.display = "block";
    document.getElementById('divBurger').style.display = "none";
    document.getElementById('divDrink').style.display = "none";
}

function burger() {
    document.getElementById('btnPizza').style.color = "#FAC564";
    document.getElementById('btnPizza').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.backgroundColor = "#FAC564";
    document.getElementById('btnBurger').style.color = "#000";
    document.getElementById('btnDrink').style.color = "#FAC564";
    document.getElementById('btnDrink').style.backgroundColor = "transparent";
    document.getElementById('divPizza').style.display = "none";
    document.getElementById('divBurger').style.display = "block";
    document.getElementById('divDrink').style.display = "none";
}


function drink() {
    document.getElementById('btnPizza').style.color = "#FAC564";
    document.getElementById('btnPizza').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.color = "#FAC564";
    document.getElementById('btnDrink').style.color = "#000";
    document.getElementById('btnDrink').style.backgroundColor = "#FAC564";
    document.getElementById('divPizza').style.display = "none";
    document.getElementById('divBurger').style.display = "none";
    document.getElementById('divDrink').style.display = "block";
}

