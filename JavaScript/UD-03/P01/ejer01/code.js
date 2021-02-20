function archivo() {
    let archivo = document.getElementById("recurso").value;
    return archivo;
}

function estado() {
    let estado = document.getElementById("estados");
    return estado;
}

function codigo() {
    let zonaCodigo = document.getElementById("codigo");
    return zonaCodigo;
}

function ajax() {
        let texto = archivo();
        let ajax = new XMLHttpRequest();
        ajax.addEventListener("load", mostrar, false);
        ajax.addEventListener("loadend", final, false);
        ajax.addEventListener("readystatechange", cambio, false);
        ajax.open("GET", texto, true);
        ajax.send();
}

function mostrar(e) {
    let v_resultado = document.getElementById("contenidos");
    v_resultado.innerText = e.target.responseText;
}

function cambio(e) {
    let zona = estado();
    let mensaje = "";
    if (e.target.readyState == 1) {
        mensaje += e.target.readyState + ". Cambio de estado: " + "Opened --> El metodo open() ha sido llamado.<br>";
    } else if (e.target.readyState == 2) {
        mensaje += e.target.readyState + ". Cambio de estado:  " + "Headers-received --> El método send() ha sido llamado y las cabeceras y los estados están disponibles.<br>";
    } else if (e.target.readyState == 3) {
        mensaje += e.target.readyState + ". Cambio de estado:  " + "Loading --> bajando, responseText contiene datos parciales.<br>";
    } else if (e.target.readyState == 4) {
        mensaje += e.target.readyState + ". Cambio de estado:  " + "done --> La operación ha terminado.";
    }
    zona.innerHTML += mensaje;

    let zona2 = codigo();

    if (e.target.readyState == 4 && e.target.status == 200) {
        zona2.innerHTML = e.target.status;
    }
}

function final() {
    alert("Peticion ajax finalizada");
}

document.getElementById("enviar").addEventListener("click", ajax);