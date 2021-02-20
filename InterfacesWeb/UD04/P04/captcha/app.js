function iniciar(event) {
    event.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfyOeoZAAAAAO-_COIImF8i6h37787L5J6z-mLr', {action: 'registro'}).then(function(token) {
              // Add your logic to submit to your backend server here.
              let input = document.createElement("input");
              input.value = token;
              input.name = "token";
              input.id = "token";
              console.log(input);
              let formulario = document.getElementById("registro");
              formulario.appendChild(input);
              let inputNuevo = document.createElement("input");
              inputNuevo.value = "registro";
              inputNuevo.name = "action";
              inputNuevo.id = "action";
              formulario.appendChild(inputNuevo);
              formulario.submit();
          });
        });
}