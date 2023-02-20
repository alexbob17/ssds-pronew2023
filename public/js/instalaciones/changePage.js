// SELECCION DE MOTIVO LLAMADA

const select3 = document.getElementById("motivo_llamadaform1");
const input_tecnologia = document.getElementById("tec_input");
const input_orden = document.getElementById("select_ordenhide");

select3.addEventListener("change", function () {
  if (select3.value === "POSTVENTA") {
    window.location.href = "postventa";
  } else if (select3.value === "INSTALACION") {
    window.location.href = "instalaciones";
  }
});
