$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

// OBTENEMOS LOS FORMS GENERALES A OCULTAR DE POSVENTA TRASLADOS
const reparacionesHfc = document.getElementById("reparacionesHfc");
// const reparacionesGpon = document.getElementById("reparacionesGpon");
// const reparacionesDth = document.getElementById("reparacionesDth");
// const reparacionesAdsl = document.getElementById("reparacionesAdsl");
// const reparacionesCobre = document.getElementById("reparacionesCobre");

// OBTENEMOS EL BOTON DEL FORM Y LO OCULTAMOS
const btn_submit = document.getElementById("btn-submitForm");
btn_submit.style.display = "none";

// FORMS GENERALES A OCULTAR
const elementsToHide = [
  reparacionesHfc,
  //   reparacionesGpon,
  //   reparacionesDth,
  //   reparacionesAdsl,
  //   reparacionesCobre,
  btn_submit,
];

// OBTENEMOS LOS TIPO ACTIVIDAD

const tiposActividad = [
  "TipoActividadReparacionHfc",
  //   "TipoActividadReparacionGpon",
  //   "TipoActividadReparacionAdsl",
  //   "TipoActividadReparacionCobre",
  //   "TipoActividadReparacionDth",
];

// OBTENEMOS EL SELECT POSTVENTA
const selectPostventa = document.querySelector(
  "select[name='Select_Postventa']"
);

const selectTecnologia = document.querySelector("select[name='tecnologia']");

function ocultarElementos(elementos) {
  for (let i = 0; i < elementos.length; i++) {
    elementos[i].style.display = "none";
  }
}

// POSTVENTAS TRASLADOS
const elementosReparaciones = [
  ...document.querySelectorAll(".ReparacionHiddenHfc"),
  //   ...document.querySelectorAll(".ReparacionHiddenGpon"),
  //   ...document.querySelectorAll(".ReparacionHiddenDth"),
  //   ...document.querySelectorAll(".ReparacionHiddenAdsl"),
  //   ...document.querySelectorAll(".ReparacionHiddenCobre"),
];

function mostrarElementos() {
  // OCULTANDO TODOS LOS ELEMENTOS
  elementsToHide.forEach((element) => {
    element.style.display = "none";
  });

  // DESHABILITA EL SELECT DE TECNOLOGIA HASTA QUE SE SELECCIONE UNA OPCION DEL PRIMERO

  switch (selectTecnologia.value) {
    case "HFC":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesHfc.style.display = "block";

      //RESET VALUE SELECT
      //   for (let i = 0; i < tiposActividad.length; i++) {
      //     const elemento = document.getElementById(tiposActividad[i]);
      //     elemento.value = "SELECCIONE UNA OPCION";
      //   }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      //   ocultarElementos(elementosReparaciones);

      break;
    default:
      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      // OCULTANDO TODOS LOS ELEMENTOS
      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //   selectTecnologia.value = "SELECCIONE";

      break;
  }
}

// SE MUESTRAN LOS ELEMENTOS
document.addEventListener("DOMContentLoaded", mostrarElementos);
selectTecnologia.addEventListener("change", mostrarElementos);

// Seleccionar correspondiente al tipo actividad
const formTypes = [
  {
    select: document.querySelector("select[name='TipoActividadReparacionHfc']"),
    forms: [
      document.getElementById("RealizadaReparacionHfc"),
      document.getElementById("ObjetadaReparacionHfc"),
      document.getElementById("AnuladaReparacionHfc"),
      document.getElementById("TransferidoReparacionHfc"),
    ],
  },
];

formTypes.forEach(({ select, forms }) => {
  forms.forEach((form) => {
    form.style.display = "none";
  });

  select.addEventListener("change", () => {
    forms.forEach((form) => {
      form.style.display = "none";
    });

    if (!select.value) {
      // si no se ha seleccionado ninguna opción
      forms.forEach((form) => {
        form.disabled = true;
      });
      btn_submit.style.display = "none";
    } else {
      // si se ha seleccionado una opción válida
      const selectedOption = select.value;
      let selectedForm = null;

      if (selectedOption === "REALIZADA") {
        selectedForm = forms[0];
      } else if (selectedOption === "OBJETADA") {
        selectedForm = forms[1];
      } else if (selectedOption === "ANULACION") {
        selectedForm = forms[2];
      } else if (selectedOption === "TRANSFERIDA") {
        selectedForm = forms[3];
      }

      if (selectedForm) {
        selectedForm.style.display = "block";
        selectedForm.disabled = false;
        btn_submit.style.display = "block";
      } else {
        btn_submit.style.display = "none";
      }
    }
  });
});
