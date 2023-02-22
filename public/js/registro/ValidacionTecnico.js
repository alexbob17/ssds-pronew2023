fetch("../Json/CodigoTecnico.json")
  .then((response) => response.json())
  .then((datos) => {
    var inputCodigo = document.getElementById("codigo_tecnico");
    var inputTecnico = document.getElementById("tecnico");
    var inputTelefono = document.getElementById("telefono");
    var btnBusqueda = document.getElementById("btn_busqueda");

    btnBusqueda.addEventListener("click", function () {
      buscarTecnico();
    });

    inputCodigo.addEventListener("keydown", function (event) {
      if (event.key === "Enter") {
        buscarTecnico();
      }
    });

    function buscarTecnico() {
      if (inputCodigo.value === "") {
        Swal.fire({
          icon: "warning",
          title: "Ingresa un codigo de tecnico",
          showConfirmButton: false,
          timer: 3000,
        });
        window.location.href = window.location.href;
        return;
      }
      Swal.fire({
        icon: "success",
        title: "Tecnico Encontrado",
        showConfirmButton: false,
        timer: 1200,
      });
      var codigoBuscado = inputCodigo.value.toUpperCase();
      var tecnicoEncontrado = false;
      for (var i = 0; i < datos.length; i++) {
        if (datos[i].CODIGO == codigoBuscado) {
          tecnicoEncontrado = true;
          inputTecnico.value = datos[i].NOMBRE;
          inputTelefono.value = datos[i].NUMERO;
          inputCodigo.setAttribute("readonly", "readonly");
          inputCodigo.setAttribute("disabled", "disabled");
          inputTelefono.setAttribute("disabled", "disabled");
          inputTecnico.setAttribute("disabled", "disabled");

          break;
        }
      }
      if (!tecnicoEncontrado) {
        // inputCodigo.value = "";
        // inputTecnico.value = "";
        // inputTelefono.value = "";
        // btnBusqueda.disabled = false;
        // alert("TECNICO NO REGISTRADO");

        Swal.fire({
          icon: "error",
          title: "Opss...",
          text: "Tecnico No Encontrado",
          showConfirmButton: false,
          timer: 2000,
        });
      }
    }
    btn_reiniciar.disabled = false;
  });

btn_reiniciar.addEventListener("click", function () {
  window.location.href = window.location.href;
});
