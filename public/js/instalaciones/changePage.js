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

// Agrega la opción "SELECCIONE UNA OPCIÓN" al cargar la página
const defaultOption = document.createElement("option");
defaultOption.value = "";
defaultOption.text = "SELECCIONE UNA OPCIÓN";
select3.add(defaultOption);

// Reinicia el select a la opción predeterminada después de redireccionar
select3.addEventListener("blur", function () {
  select3.selectedIndex = 0;
});
