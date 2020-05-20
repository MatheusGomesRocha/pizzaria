function pizza() {
    document.getElementById('btnPizza').style.color = "#000";
    document.getElementById('btnPizza').style.backgroundColor = "#FAC564";
    document.getElementById('btnBurger').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.color = "#FAC564";
    document.getElementById('btnDrink').style.backgroundColor = "transparent";
    document.getElementById('btnDrink').style.color = "#FAC564";
    document.getElementById('divPaiCardapio').style.display = "block";
    document.getElementById('divPaiCardapio1').style.display = "none";
    document.getElementById('divPaiCardapio2').style.display = "none";
}

function burger() {
    document.getElementById('btnPizza').style.color = "#FAC564";
    document.getElementById('btnPizza').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.backgroundColor = "#FAC564";
    document.getElementById('btnBurger').style.color = "#000";
    document.getElementById('btnDrink').style.color = "#FAC564";
    document.getElementById('btnDrink').style.backgroundColor = "transparent";
    document.getElementById('divPaiCardapio').style.display = "none";
    document.getElementById('divPaiCardapio1').style.display = "block";
    document.getElementById('divPaiCardapio2').style.display = "none";
}


function drink() {
    document.getElementById('btnPizza').style.color = "#FAC564";
    document.getElementById('btnPizza').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.backgroundColor = "transparent";
    document.getElementById('btnBurger').style.color = "#FAC564";
    document.getElementById('btnDrink').style.color = "#000";
    document.getElementById('btnDrink').style.backgroundColor = "#FAC564";
    document.getElementById('divPaiCardapio').style.display = "none";
    document.getElementById('divPaiCardapio1').style.display = "none";
    document.getElementById('divPaiCardapio2').style.display = "block";
}
