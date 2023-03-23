// Obtener los elementos del primer formulario
const codigo_tecnico = document.getElementById("codigo_tecnico");
const telefono = document.getElementById("telefono");
const tecnico = document.getElementById("tecnico");

// Obtener el elemento select del primer formulario
const motivo_llamada = document.getElementById("motivo_llamadaform1");

motivo_llamada.addEventListener("change", function () {
  // Obtener el valor seleccionado del select
  const selectedOption =
    motivo_llamada.options[motivo_llamada.selectedIndex].value;

  // Verificar si la opción seleccionada es "INSTALACION"
  if (selectedOption === "INSTALACION") {
    // Guardar los valores en el LocalStorage
    localStorage.setItem("codigo_tecnico", codigo_tecnico.value);
    localStorage.setItem("telefono", telefono.value);
    localStorage.setItem("tecnico", tecnico.value);
  }
  if (selectedOption === "POSTVENTA") {
    // Guardar los valores en el LocalStorage
    localStorage.setItem("codigo_tecnico", codigo_tecnico.value);
    localStorage.setItem("telefono", telefono.value);
    localStorage.setItem("tecnico", tecnico.value);
  }

  window.addEventListener("beforeunload", function () {
    localStorage.clear();
  });
});
