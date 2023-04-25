const NordenBusqueda = document.getElementById("NordenBusqueda");
const btn_busqueda = document.getElementById("btn_busqueda");
const form1 = document.getElementById("form1");

document.addEventListener("DOMContentLoaded", function () {
  form1.addEventListener("submit", function (event) {
    if (NordenBusqueda.value === "") {
      Swal.fire({
        icon: "error",
        title: "Debes ingresar un valor",
        showConfirmButton: false,
        timer: 1900,
      });
      event.preventDefault();
      return false;
    }
    if (NordenBusqueda.value.length !== 8) {
      Swal.fire({
        icon: "error",
        title: "N° Orden debe tener 8 digitos",
        showConfirmButton: false,
        timer: 1900,
      });
      event.preventDefault();
      return false;
    }
  });
});
