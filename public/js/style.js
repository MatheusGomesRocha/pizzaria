$(window).scroll(function(){ // função para pegar o movimento do scroll (barra de rolagem)
    var top = $(window).scrollTop(); // aqui vc pega a posição da página
    if(top > 0){ // verifica a posição da página
        $('#textRestaurant').css('visibility', 'visible');
        $('#textRestaurant').addClass('fadeInUp');
    }

    if(top > 100) {
        $('#title').css('visibility', 'visible');
        $('#title').addClass('fadeInUp');
    }
    if(top > 150) {

    }
    if(top > 400) {
        $('#servTitle').css('visibility', 'visible');
        $("#servTitle").addClass('fadeInUp'); // aqui vc aplica o fade no menu
        $('#servText').css('visibility', 'visible');
        $("#servText").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
    if(top > 700) {
        $('.content1').css('visibility', 'visible');
        $(".content1").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }

    if(top > 1000) {
        $('#home3Title').css('visibility', 'visible');
        $("#home3Title").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
    if(top > 1050) {
        $('#home3Text').css('visibility', 'visible');
        $("#home3Text").addClass('fadeInUp'); // aqui vc aplica o fade no menu
    }
});



function pizza() {
    document.getElementById('btnPizza').style.color = "#fff";
    document.getElementById('btnPizza').style.backgroundColor = "#F03A47";
    document.getElementById('btnBurger').style.color = "#F03A47";
    document.getElementById('btnBurger').style.backgroundColor = "transparent";
    document.getElementById('btnDrink').style.color = "#F03A47";
    document.getElementById('btnDrink').style.backgroundColor = "transparent";
    document.getElementById('divPizza').style.display = "block";
    document.getElementById('divBurger').style.display = "none";
    document.getElementById('divDrink').style.display = "none";
}

function burger() {
    document.getElementById('btnPizza').style.color = "#F03A47";
    document.getElementById('btnBurger').style.backgroundColor = "#F03A47";
    document.getElementById('btnBurger').style.color = "#fff";
    document.getElementById('btnPizza').style.backgroundColor = "transparent";
    document.getElementById('btnDrink').style.color = "#F03A47";
    document.getElementById('btnDrink').style.backgroundColor = "transparent";
    document.getElementById('divPizza').style.display = "none";
    document.getElementById('divBurger').style.display = "block";
    document.getElementById('divDrink').style.display = "none";
}


function drink() {
    document.getElementById('btnPizza').style.color = "#F03A47";
    document.getElementById('btnPizza').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.color = "#F03A47";
    document.getElementById('btnBurger').style.backgroundColor = "transparent";
    document.getElementById('btnDrink').style.color = "#fff";
    document.getElementById('btnDrink').style.backgroundColor = "#F03A47";
    document.getElementById('divPizza').style.display = "none";
    document.getElementById('divBurger').style.display = "none";
    document.getElementById('divDrink').style.display = "block";
}
