// SELECCION DE MOTIVO LLAMADA Y LLAMADA A LA RUTA DE LA PAGINA

const select3 = document.getElementById("motivo_llamadaform1");
const input_tecnologia = document.getElementById("tec_input");
const input_orden = document.getElementById("select_ordenhide");

const pages = {
  POSTVENTA: "postventa",
  INSTALACION: "instalaciones",
};

function redirectToPage(page) {
  window.location.href = page;
}

select3.addEventListener("change", function () {
  const selectedValue = select3.value;
  const page = pages[selectedValue];
  if (page) {
    redirectToPage(page);
  }
});
