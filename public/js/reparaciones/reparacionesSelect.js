$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

// OBTENEMOS LOS FORMS GENERALES A OCULTAR DE POSVENTA TRASLADOS
const reparacionesHfc = document.getElementById("reparacionesHfc");
const reparacionesGpon = document.getElementById("reparacionesGpon");
const reparacionesDth = document.getElementById("reparacionesDth");
const reparacionesAdsl = document.getElementById("reparacionesAdsl");
const reparacionesCobre = document.getElementById("reparacionesCobre");

// OBTENEMOS EL BOTON DEL FORM Y LO OCULTAMOS
const btn_submit = document.getElementById("btn-submitForm");
btn_submit.style.display = "none";

// FORMS GENERALES A OCULTAR
const elementsToHide = [
  reparacionesHfc,
  reparacionesGpon,
  reparacionesDth,
  reparacionesAdsl,
  reparacionesCobre,
  btn_submit,
];

// OBTENEMOS LOS TIPO ACTIVIDAD

const tiposActividad = [
  "TipoActividadReparacionHfc",
  "TipoActividadReparacionGpon",
  "TipoActividadReparacionAdsl",
  "TipoActividadReparacionCobre",
  "TipoActividadReparacionDth",
];

// OBTENEMOS EL SELECT POSTVENTA
const selectPostventa = document.querySelector(
  "select[name='Select_Postventa']"
);

const selectTecnologia = document.querySelector("select[name='tecnologia']");
const select_orden = document.getElementById("select_orden");
function ocultarElementos(elementos) {
  for (let i = 0; i < elementos.length; i++) {
    elementos[i].style.display = "none";
  }
}

// POSTVENTAS TRASLADOS
const elementosReparaciones = [
  ...document.querySelectorAll(".ReparacionHiddenHfc"),
  ...document.querySelectorAll(".ReparacionHiddenGpon"),
  ...document.querySelectorAll(".ReparacionHiddenDth"),
  ...document.querySelectorAll(".ReparacionHiddenAdsl"),
  ...document.querySelectorAll(".ReparacionHiddenCobre"),
];

function mostrarElementos() {
  // OCULTANDO TODOS LOS ELEMENTOS
  elementsToHide.forEach((element) => {
    element.style.display = "none";
  });

  // DESHABILITA EL SELECT DE TECNOLOGIA HASTA QUE SE SELECCIONE UNA OPCION DEL PRIMERO

  switch (tecnologia.value + "|" + select_orden.value) {
    case "HFC|TV":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesHfc.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "HFC|INTERNET":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesHfc.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "HFC|LINEA":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesHfc.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "GPON|TV":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesGpon.style.display = "block";
      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);
      break;
    case "GPON|INTERNET":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesGpon.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "GPON|LINEA":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesGpon.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "DTH|TV":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesDth.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "ADSL|INTERNET":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesAdsl.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

      break;
    case "COBRE|LINEA":
      //  MUESTRA EL DIV CORRESPONDIENTE
      reparacionesCobre.style.display = "block";

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      //OCULTA LOS ELEMENTOS (REALIZADA/OBJETADA/TRANSFERIDA)
      ocultarElementos(elementosReparaciones);

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
select_orden.addEventListener("change", mostrarElementos);

// Seleccionar correspondiente al tipo actividad
const formTypes = [
  {
    select: document.querySelector("select[name='TipoActividadReparacionHfc']"),
    forms: [
      document.getElementById("RealizadaReparacionHfc"),
      document.getElementById("ObjetadaReparacionHfc"),
      //   document.getElementById("AnuladaReparacionHfc"),
      document.getElementById("TransferidoReparacionHfc"),
    ],
  },
  {
    select: document.querySelector(
      "select[name='TipoActividadReparacionGpon']"
    ),
    forms: [
      document.getElementById("RealizadaReparacionGpon"),
      document.getElementById("ObjetadaReparacionGpon"),
      //   document.getElementById("AnuladaReparacionGpon"),
      document.getElementById("TransferidoReparacionGpon"),
    ],
  },
  {
    select: document.querySelector("select[name='TipoActividadReparacionDth']"),
    forms: [
      document.getElementById("RealizadaReparacionDth"),
      document.getElementById("ObjetadaReparacionDth"),
      //   document.getElementById("AnuladaReparacionGpon"),
      document.getElementById("TransferidoReparacionDth"),
    ],
  },

  {
    select: document.querySelector(
      "select[name='TipoActividadReparacionAdsl']"
    ),
    forms: [
      document.getElementById("RealizadaReparacionAdsl"),
      document.getElementById("ObjetadaReparacionAdsl"),
      //   document.getElementById("AnuladaReparacionGpon"),
      document.getElementById("TransferidoReparacionAdsl"),
    ],
  },

  {
    select: document.querySelector(
      "select[name='TipoActividadReparacionCobre']"
    ),
    forms: [
      document.getElementById("RealizadaReparacionCobre"),
      document.getElementById("ObjetadaReparacionCobre"),
      document.getElementById("TransferidoReparacionCobre"),
      // document.getElementById("AnuladaReparacionCobre"),
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

// FETCH LOCALIZACIONES

fetch("../Json/Localizaciones.json")
  .then((response) => response.json())
  .then((datos) => {
    var select_dpto = document.getElementById("dpto_colonia");
    select_dpto.innerHTML = "<option value=''>SELECCIONE UNA OPCION</option>";
    for (var i = 0; i < datos.length; i++) {
      var option = document.createElement("option");
      option.value = datos[i].DEPTO + datos[i].COLONIA;
      option.text = datos[i].DEPTO + datos[i].COLONIA;
      select_dpto.add(option);
    }
  });

document.addEventListener("DOMContentLoaded", function () {
  tecnologia.addEventListener("change", function () {
    if (tecnologia.value === "HFC") {
      const TvOption = select_orden.querySelector('option[value="TV"]');
      const LineaOption = select_orden.querySelector('option[value="LINEA"]');
      const InternetOption = select_orden.querySelector(
        'option[value="INTERNET"]'
      );
      select_orden.value = "";

      TvOption.style.display = "block";
      LineaOption.style.display = "block";
      InternetOption.style.display = "block";

      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      ResetValueHfc();
      ResetValueGeneralGpon();
    } else if (tecnologia.value === "GPON") {
      const TvOption = select_orden.querySelector('option[value="TV"]');
      const LineaOption = select_orden.querySelector('option[value="LINEA"]');
      const InternetOption = select_orden.querySelector(
        'option[value="INTERNET"]'
      );
      select_orden.value = "";

      TvOption.style.display = "block";
      LineaOption.style.display = "block";
      InternetOption.style.display = "block";

      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      ResetValueHfc();
      ResetValueGeneralGpon();
    } else if (tecnologia.value === "ADSL") {
      const TvOption = select_orden.querySelector('option[value="TV"]');
      const LineaOption = select_orden.querySelector('option[value="LINEA"]');
      const InternetOption = select_orden.querySelector(
        'option[value="INTERNET"]'
      );
      select_orden.value = "";

      TvOption.style.display = "none";
      LineaOption.style.display = "none";
      InternetOption.style.display = "block";

      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      ResetValueHfc();
      ResetValueGeneralGpon();
    } else if (tecnologia.value === "DTH") {
      const TvOption = select_orden.querySelector('option[value="TV"]');
      const LineaOption = select_orden.querySelector('option[value="LINEA"]');
      const InternetOption = select_orden.querySelector(
        'option[value="INTERNET"]'
      );
      select_orden.value = "";

      TvOption.style.display = "block";
      LineaOption.style.display = "none";
      InternetOption.style.display = "none";

      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      ResetValueHfc();
      ResetValueGeneralGpon();
    } else if (tecnologia.value === "COBRE") {
      const TvOption = select_orden.querySelector('option[value="TV"]');
      const LineaOption = select_orden.querySelector('option[value="LINEA"]');
      const InternetOption = select_orden.querySelector(
        'option[value="INTERNET"]'
      );
      select_orden.value = "";

      TvOption.style.display = "none";
      LineaOption.style.display = "block";
      InternetOption.style.display = "none";

      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      ResetValueHfc();
      ResetValueGeneralGpon();
    } else {
      const TvOption = select_orden.querySelector('option[value="TV"]');
      const LineaOption = select_orden.querySelector('option[value="LINEA"]');
      const InternetOption = select_orden.querySelector(
        'option[value="INTERNET"]'
      );
      select_orden.value = "";

      TvOption.style.display = "none";
      LineaOption.style.display = "none";
      InternetOption.style.display = "none";

      elementsToHide.forEach((element) => {
        element.style.display = "none";
      });

      //RESET VALUE SELECT
      for (let i = 0; i < tiposActividad.length; i++) {
        const elemento = document.getElementById(tiposActividad[i]);
        elemento.value = "SELECCIONE UNA OPCION";
      }

      ResetValueHfc();
      ResetValueGeneralGpon();
    }
  });
});

function ResetValueHfc() {
  const CodigoCausaHfc = document.getElementById("CodigoCausaHfc");
  const CodigoTipoDañoHfc = document.getElementById("CodigoTipoDañoHfc");
  const CodigoUbicacionDañoHfc = document.getElementById(
    "CodigoUbicacionDañoHfc"
  );

  const DescripcionCausaDañoHfc = document.getElementById(
    "DescripcionCausaDañoHfc"
  );
  const DescripcionTipoDañoHfc = document.getElementById(
    "DescripcionTipoDañoHfc"
  );
  const DescripcionUbicacionHfc = document.getElementById(
    "DescripcionUbicacionHfc"
  );

  CodigoCausaHfc.removeAttribute("readonly");

  CodigoCausaHfc.value = "";

  const optionDefault = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoTipoDañoHfc.innerHTML = optionDefault;

  const optionDefaultUbiDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoUbicacionDañoHfc.innerHTML = optionDefaultUbiDaño;

  const optionDefaultDesDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDañoHfc.innerHTML = optionDefaultDesDaño;

  const optionDefaultDesTipoDaño = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoHfc.innerHTML = optionDefaultDesTipoDaño;

  const optionDefaultDescUbicacion = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionHfc.innerHTML = optionDefaultDescUbicacion;

  CodigoTipoDañoHfc.value = "";
  CodigoUbicacionDañoHfc.value = "";
  DescripcionCausaDañoHfc.value = "";
  DescripcionTipoDañoHfc.value = "";
  DescripcionUbicacionHfc.value = "";
}

function ResetValueGeneralGpon() {
  //   GPON
  const CodigoCausaGpon = document.getElementById("CodigoCausaGpon");

  const CodigoTipoDañoGpon = document.getElementById("CodigoTipoDañoGpon");
  const CodigoUbicacionDañoGpon = document.getElementById(
    "CodigoUbicacionDañoGpon"
  );

  const DescripcionCausaDañoGpon = document.getElementById(
    "DescripcionCausaDañoGpon"
  );
  const DescripcionTipoDañoGpon = document.getElementById(
    "DescripcionTipoDañoGpon"
  );
  const DescripcionUbicacionGpon = document.getElementById(
    "DescripcionUbicacionGpon"
  );

  CodigoCausaGpon.removeAttribute("readonly");

  CodigoCausaGpon.value = "";

  const optionDefaultGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoTipoDañoGpon.innerHTML = optionDefaultGpon;

  const optionDefaultUbiDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  CodigoUbicacionDañoGpon.innerHTML = optionDefaultUbiDañoGpon;

  const optionDefaultDesDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionCausaDañoGpon.innerHTML = optionDefaultDesDañoGpon;

  const optionDefaultDesTipoDañoGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionTipoDañoGpon.innerHTML = optionDefaultDesTipoDañoGpon;

  const optionDefaultDescUbicacionGpon = `<option value="" selected disabled>SELECCIONE UNA OPCION</option>`;
  DescripcionUbicacionGpon.innerHTML = optionDefaultDescUbicacionGpon;

  CodigoTipoDañoGpon.value = "";
  CodigoUbicacionDañoGpon.value = "";
  DescripcionCausaDañoGpon.value = "";
  DescripcionTipoDañoGpon.value = "";
  DescripcionUbicacionGpon.value = "";
}
