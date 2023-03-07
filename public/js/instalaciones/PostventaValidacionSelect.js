$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

// Obtenemos los elementos a ocultar o mostrar
const postventaTrasladosHfc = document.getElementById("PostventaTrasladosHfc");
const postventaTrasladosGpon = document.getElementById(
  "PostventaTrasladosGpon"
);

const btn_submit = document.getElementById("btn-submit");
btn_submit.style.display = "none";

const postventaAdicionHfc = document.getElementById("PostventaAdicionHfc");

// Actividad Realizada PostVenta HFC

const RealizadaTrasladoHfc = document.getElementById("RealizadaTrasladoHfc");
const ObjetadaTrasladoHfc = document.getElementById("ObjetadaTrasladoHfc");
const AnuladaTrasladoHfc = document.getElementById("AnuladaTrasladoHfc");
const TipoActividadTrasladoHfc = document.getElementById(
  "TipoActividadTrasladoHfc"
);

const TipoActividadHiddenHfc = document.getElementById(
  "TipoActividadHiddenHfc"
);

// Los ocultamos al principio
postventaTrasladosHfc.style.display = "none";
postventaTrasladosGpon.style.display = "none";
postventaAdicionHfc.style.display = "none";

RealizadaTrasladoHfc.style.display = "none";
ObjetadaTrasladoHfc.style.display = "none";
AnuladaTrasladoHfc.style.display = "none";

// Obtenemos los selects
const selectPostventa = document.querySelector(
  "select[name='Select_Postventa']"
);
const selectTecnologia = document.querySelector("select[name='tecnologia']");

// Obtenemos los divs RealizadoObjetadoAnulado de cada Postventa
const TrasladoHfcHidden = document.querySelectorAll("TrasladoHfcHidden");

// Creamos una función que muestre u oculte los elementos según los valores de los selects
function mostrarElementos() {
  btn_submit.style.display = "none";

  if (
    selectPostventa.value === "POSTVENTA TRASLADO" &&
    selectTecnologia.value === "HFC"
  ) {
    postventaTrasladosHfc.style.display = "block";
    btn_submit.style.display = "none";
  } else if (
    selectPostventa.value === "POSTVENTA TRASLADO" &&
    selectTecnologia.value === "GPON"
  ) {
    for (let i = 0; i < TrasladoHfcHidden.length; i++) {
      TrasladoHfcHidden[i].style.display = "none";
    }
    btn_submit.style.display = "none";
    postventaTrasladosHfc.style.display = "none";
  } else if (
    selectPostventa.value === "POSTVENTA ADICION" &&
    selectTecnologia.value === "HFC"
  ) {
    for (let i = 0; i < TrasladoHfcHidden.length; i++) {
      TrasladoHfcHidden[i].style.display = "none";
    }
    btn_submit.style.display = "none";
    postventaTrasladosHfc.style.display = "none";
  } else {
    for (let i = 0; i < TrasladoHfcHidden.length; i++) {
      TrasladoHfcHidden[i].style.display = "none";
    }
    btn_submit.style.display = "none";
    postventaTrasladosHfc.style.display = "none";
  }
}

// Llamamos la función para que se ejecute al inicio y cada vez que cambie un select
document.addEventListener("DOMContentLoaded", mostrarElementos);
selectPostventa.addEventListener("change", mostrarElementos);
selectTecnologia.addEventListener("change", mostrarElementos);

// Seleccionar correspondiente al tipo actividad
const formTypes = [
  {
    select: document.querySelector("select[name='TipoActividadTrasladoHfc']"),
    forms: [
      document.getElementById("RealizadaTrasladoHfc"),
      document.getElementById("ObjetadaTrasladoHfc"),
      document.getElementById("PostventaTrasladosGpon"),
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
      } else if (selectedOption === "TRANSFERIDA") {
        selectedForm = forms[2];
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
