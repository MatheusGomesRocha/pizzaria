function verify_select() {
    var select = document.getElementById('select').value;

    /*
        tamanhoLabel == Label para selecionar tamanho das pizzas
        tamanho1 == Div que contém o size_sm, size_md, size_lg
        tamanho2 == Div do price_sm para pizzas
        tamanho3 == Div do price_md para pizzas
        tamanho4 == Div do price_lg para pizzas
        tamanho5 == Div do price para outros produtos
     */

    if (select == 'bebida' || select == 'salgado') {
        document.getElementById('labelImg').style.display = "block";
        document.getElementById('image').style.display = "none";
        document.getElementById('ing').style.display = "none";
        document.getElementById('tamanhoLabel').style.display = "none";
        document.getElementById('tamanho').style.display = "block";
        document.getElementById('tamanho1').style.display = "none";
        document.getElementById('tamanho2').style.display = "none";
        document.getElementById('tamanho3').style.display = "none";
        document.getElementById('tamanho4').style.display = "none";
        document.getElementById('tamanho5').style.display = "block";
        document.getElementById('inlineRadio1').checked = false;
        document.getElementById('inlineRadio2').checked = false;
        document.getElementById('inlineRadio3').checked = false;
        document.getElementById('inlineRadio1').style.display = "none";
        document.getElementById('inlineRadio2').style.display = "none";
        document.getElementById('inlineRadio3').style.display = "none";
        document.getElementById('price_sm').disabled = true;
        document.getElementById('price_md').disabled = true;
        document.getElementById('price_lg').disabled = true;
        document.getElementById('price_sm').style.display = "none";
        document.getElementById('price_md').style.display = "none";
        document.getElementById('price_lg').style.display = "none";
        document.getElementById('price').style.display = "block";
        document.getElementById('price').disabled = false;
        document.getElementById('inlineRadio1').disabled = true;
        document.getElementById('inlineRadio2').disabled = true;
        document.getElementById('inlineRadio3').disabled = true;
    }

    if (select == 'sanduiche') {
        document.getElementById('labelImg').style.display = "block";
        document.getElementById('image').style.display = "block";
        document.getElementById('ing').style.display = "block";
        document.getElementById('tamanhoLabel').style.display = "none";
        document.getElementById('tamanho').style.display = "block";
        document.getElementById('tamanho1').style.display = "none";
        document.getElementById('tamanho2').style.display = "none";
        document.getElementById('tamanho3').style.display = "none";
        document.getElementById('tamanho4').style.display = "none";
        document.getElementById('tamanho5').style.display = "block";
        document.getElementById('inlineRadio1').checked = false;
        document.getElementById('inlineRadio2').checked = false;
        document.getElementById('inlineRadio3').checked = false;
        document.getElementById('inlineRadio1').style.display = "none";
        document.getElementById('inlineRadio2').style.display = "none";
        document.getElementById('inlineRadio3').style.display = "none";
        document.getElementById('price_sm').disabled = true;
        document.getElementById('price_md').disabled = true;
        document.getElementById('price_lg').disabled = true;
        document.getElementById('price_sm').style.display = "none";
        document.getElementById('price_md').style.display = "none";
        document.getElementById('price_lg').style.display = "none";
        document.getElementById('price').disabled = false;
        document.getElementById('price').style.display = "block";
        document.getElementById('inlineRadio1').disabled = true;
        document.getElementById('inlineRadio2').disabled = true;
        document.getElementById('inlineRadio3').disabled = true;
    }
    if (select == 'pizza') {
        document.getElementById('labelImg').style.display = "block";
        document.getElementById('image').style.display = "block";
        document.getElementById('ing').style.display = "block";
        document.getElementById('tamanhoLabel').style.display = "block";
        document.getElementById('tamanho').style.display = "block";
        document.getElementById('tamanho1').style.display = "block";
        document.getElementById('tamanho2').style.display = "block";
        document.getElementById('tamanho3').style.display = "block";
        document.getElementById('tamanho4').style.display = "block";
        document.getElementById('tamanho5').style.display = "none";
        document.getElementById('inlineRadio1').style.display = "block";
        document.getElementById('inlineRadio2').style.display = "block";
        document.getElementById('inlineRadio3').style.display = "block";
        document.getElementById('price_sm').style.display = "block";
        document.getElementById('price_md').style.display = "block";
        document.getElementById('price_lg').style.display = "block";
        document.getElementById('price').disabled = true;
        document.getElementById('price').style.display = "none";
        document.getElementById('inlineRadio1').disabled = false;
        document.getElementById('inlineRadio2').disabled = false;
        document.getElementById('inlineRadio3').disabled = false;
    }
}

function verify_sm() {
    if(document.getElementById('inlineRadio1').checked){
        document.getElementById('price_sm').disabled = false;
    } else {
        document.getElementById('price_sm').disabled = true;
    }
}
function verify_md() {
    if(document.getElementById('inlineRadio2').checked){
        document.getElementById('price_md').disabled = false;
    } else {
        document.getElementById('price_md').disabled = true;
    }
}
function verify_lg() {
    if(document.getElementById('inlineRadio3').checked){
        document.getElementById('price_lg').disabled = false;
    } else {
        document.getElementById('price_lg').disabled = true;
    }
}

$(document).ready(function(){
    el_select = $("select[id=selectIng]");
    el_select.hide();
    $.each(el_select.find("option"), function(){
        $("#novo_select_container ul").append(
            '<li><input type="checkbox" value="'+$(this).val()+'" />'+$(this).text()+'</li>'
        );
    });

    $("#novo_select input[type=checkbox]").on("click",function(){
        if($(this).is(":checked")){
            $("select[id=selectIng] option[value="+$(this).val()+"]").attr("selected","selected");
        }else{
            $("select[id=selectIng] option[value="+$(this).val()+"]").removeAttr("selected");
        }
    });

    $("#novo_select li:not(:eq(0))").on("click",function(){
        $(this).find("input").trigger("click");
    });

    $("#novo_select_container li:eq(0)").on("click", function(){
        if($("#novo_select").hasClass("novo_select_fechado")){
            $("#novo_select").removeClass("novo_select_fechado").addClass("novo_select_aberto");
            $("#novo_select_container").css("height","auto");
        }else{
            $("#novo_select").removeClass("novo_select_aberto").addClass("novo_select_fechado");
            $("#novo_select_container").css("height","21px");
        }
    });

    $("#novo_select_container li input, #novo_select_container li").on("click", function(e){
        e.stopPropagation();
    });

    $(document).on('click',function(){
        if($("#novo_select").hasClass("novo_select_aberto")){
            $("#novo_select").removeClass("novo_select_aberto").addClass("novo_select_fechado");
            $("#novo_select_container").css("height","21px");
        }
    });
});

document.getElementById("fileImg").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
