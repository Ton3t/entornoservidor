function mostrarCiudades(e) {
    var texto = e.target.value;
    if(texto. length == 0) {
        document.getElementById("sugerencia").innerHTML = "";
    }
    else {
        ajax();
    }
}

function ajax() {
    let texto = document.getElementById("nombre").value;
    let ajax = new XMLHttpRequest();
    var datos = new FormData();
    datos.append("nombre", texto);
    ajax.addEventListener("load", mostrar, false);
    ajax.responseType = "text";
    ajax.open("POST", "documento2.php", true);
    ajax.send(datos);
}

function mostrar(e) {
    let resultado = document.getElementById("sugerencia");
    resultado.innerHTML = e.target.responseText;
}

function list() {
    document.getElementById("nombre").addEventListener("keyup", mostrarCiudades);
}

window.addEventListener = list();