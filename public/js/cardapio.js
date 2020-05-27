function pizza() {
    document.getElementById('btnPizzaCardapio').style.backgroundColor = "#F03A47";
    document.getElementById('btnPizzaCardapio').style.color = "#fff";
    document.getElementById('btnBurgerCardapio').style.backgroundColor = "transparent";
    document.getElementById('btnBurgerCardapio').style.color = "#F03A47";
    document.getElementById('btnDrinkCardapio').style.backgroundColor = "transparent";
    document.getElementById('btnDrinkCardapio').style.color = "#F03A47";
    document.getElementById('divPaiCardapio').style.display = "block";
    document.getElementById('divPaiCardapio1').style.display = "none";
    document.getElementById('divPaiCardapio2').style.display = "none";
}

function burger() {
    document.getElementById('btnPizzaCardapio').style.backgroundColor = "transparent";
    document.getElementById('btnPizzaCardapio').style.color = "#F03A47";
    document.getElementById('btnBurgerCardapio').style.backgroundColor = "#F03A47";
    document.getElementById('btnBurgerCardapio').style.color = "#fff";
    document.getElementById('btnDrinkCardapio').style.backgroundColor = "transparent";
    document.getElementById('btnDrinkCardapio').style.color = "#F03A47";
    document.getElementById('divPaiCardapio').style.display = "none";
    document.getElementById('divPaiCardapio1').style.display = "block";
    document.getElementById('divPaiCardapio2').style.display = "none";
}


function drink() {
    document.getElementById('btnPizzaCardapio').style.backgroundColor = "transparent";
    document.getElementById('btnPizzaCardapio').style.color = "#F03A47";
    document.getElementById('btnBurgerCardapio').style.backgroundColor = "transparent";
    document.getElementById('btnBurgerCardapio').style.color = "#F03A47";
    document.getElementById('btnDrinkCardapio').style.backgroundColor = "#F03A47";
    document.getElementById('btnDrinkCardapio').style.color = "#fff";
    document.getElementById('divPaiCardapio').style.display = "none";
    document.getElementById('divPaiCardapio1').style.display = "none";
    document.getElementById('divPaiCardapio2').style.display = "block";
}
