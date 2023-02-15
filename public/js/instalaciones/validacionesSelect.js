const btn_save = document.getElementById("btn-submit");

btn_save.style.display = "none";

// VALIDACIONES OCULTAR FORM EN BASE A TECNOLOGIA

document.addEventListener("DOMContentLoaded", function () {
  const form1 = document.getElementById("form1");
  const form2 = document.getElementById("form2");
  const form3 = document.getElementById("form3");
  const form4 = document.getElementById("form4");
  const form5 = document.getElementById("form5");
  const form6 = document.getElementById("form6");

  const select = document.querySelector("select[name='tecnologia']");

  form2.style.display = "none";
  form3.style.display = "none";
  form4.style.display = "none";
  form5.style.display = "none";
  form6.style.display = "none";

  form1.style.display = "block";

  select.addEventListener("change", function () {
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";

    switch (select.value) {
      case "HFC":
        form2.style.display = "block";
        break;
      case "ADSL":
        form3.style.display = "block";
        break;
      case "DTH":
        form4.style.display = "block";
        break;
      case "COBRE":
        form5.style.display = "block";
        break;
      case "GPON":
        form6.style.display = "block";
        break;
    }
  });
});

const technologySelect = document.getElementById("tecnologia");
const optionSelect = document.getElementById("select_orden");

const technologyOptions = {
  HFC: [
    { value: "", label: "SELECCIONA UNA OPCION" },
    { value: "TV BASICA", label: "TV BASICA" },
    { value: "TV DIGITAL", label: "TV DIGITAL" },
    { value: "INTERNET", label: "INTERNET" },
    { value: "LINEA", label: "LINEA" },
    { value: "CASA CLARO TRIPLE", label: "CASA CLARO TRIPLE" },
    {
      value: "CASA CLARO DOBLE - TV + INTERNET",
      label: "CASA CLARO DOBLE - TV + INTERNET",
    },
    {
      value: "CASA CLARO DOBLE - INTERNET + LINEA",
      label: "CASA CLARO DOBLE - INTERNET + LINEA",
    },
  ],
  GPON: [
    { value: "", label: "SELECCIONA UNA OPCION" },
    { value: "INDIVIDUAL INTERNET", label: "INDIVIDUAL INTERNET" },
    { value: "GPON IPTV", label: "GPON IPTV" },
    { value: "LINEA GPON", label: "LINEA GPON" },
  ],
  ADSL: [
    { value: "", label: "SELECCIONA UNA OPCION" },
    { value: "INDIVIDUAL INTERNET", label: "INDIVIDUAL INTERNET" },
    { value: "INDIVIDUAL", label: "INDIVIDUAL" },
    { value: "REACTIVACION", label: "REACTIVACION" },
  ],
  COBRE: [
    { value: "", label: "SELECCIONA UNA OPCION" },
    { value: "", label: "SELECCIONA UNA OPCION" },
  ],
};

// VALIDACIONES TIPO ORDEN

const select_orden = document.getElementById("select_orden");

const orden_tv_hfc = document.getElementById("orden_tv_hfc");
const orden_internet_hfc = document.getElementById("orden_internet_hfc");
const orden_linea_hfc = document.getElementById("orden_linea_hfc");

const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon");
const OrdenInternet_Gpon = document.getElementById("OrdenInternet_Gpon");
const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon");

orden_tv_hfc.disabled = true;
orden_internet_hfc.disabled = true;
orden_linea_hfc.disabled = true;
OrdenTv_Gpon.disabled = true;
OrdenInternet_Gpon.disabled = true;
OrdenLinea_Gpon.disabled = true;

btn_save.disabled = true;
btn_save.style.display = "none";

select_orden.addEventListener("change", function () {
  var selectedOption = this.value;
  var options = {
    "TV BASICA": [false, true, true],
    "TV DIGITAL": [false, true, true],
    INTERNET: [true, false, true],
    "CASA CLARO DOBLE - TV + INTERNET": [false, false, true],
    "CASA CLARO DOBLE - INTERNET + LINEA": [true, false, false],
    "CASA CLARO TRIPLE": [false, false, false],
    LINEA: [true, true, false],
    "INDIVIDUAL INTERNET": [false, true, true],
    "GPON IPTV": [true, false, true],
    "LINEA GPON": [true, true, false],
  };
  var disabledOptions = options[selectedOption] || [true, true, true];
  orden_tv_hfc.disabled = disabledOptions[0];
  orden_internet_hfc.disabled = disabledOptions[1];
  orden_linea_hfc.disabled = disabledOptions[2];

  OrdenInternet_Gpon.disabled = disabledOptions[0];
  OrdenTv_Gpon.disabled = disabledOptions[1];
  OrdenLinea_Gpon.disabled = disabledOptions[2];
});

// FETCH LOCALIZACIONES

fetch("../Json/Localizaciones.json")
  .then((response) => response.json())
  .then((datos) => {
    var select_dpto = document.getElementById("dpto_colonia");
    select_dpto.innerHTML = "<option value=''>Seleccione una opción</option>";
    for (var i = 0; i < datos.length; i++) {
      var option = document.createElement("option");
      option.value = datos[i].DEPTO + datos[i].COLONIA;
      option.text = datos[i].DEPTO + datos[i].COLONIA;
      select_dpto.add(option);
    }
  });

const select = document.querySelector("select[name='tipo_actividad']");
const formHfc_Realizada = document.getElementById("formHfc_Realizada");
const formHfc_Objetada = document.getElementById("formHfc_Objetada");
const formHfc_Transferida = document.getElementById("formHfc_Transferida");
// const btn_save = document.getElementById("btn-submit");

formHfc_Realizada.style.display = "none";
formHfc_Objetada.style.display = "none";
formHfc_Transferida.style.display = "none";
btn_save.style.display = "none";

select.addEventListener("change", function () {
  formHfc_Realizada.style.display = "none";
  formHfc_Objetada.style.display = "none";
  formHfc_Transferida.style.display = "none";
  btn_save.disabled = true;

  if (!select.value) {
    // si no se ha seleccionado ninguna opción
    btn_save.disabled = true;
    btn_save.style.display = "none";
  } else {
    // si se ha seleccionado una opción
    btn_save.disabled = false;
    btn_save.style.display = "block";

    switch (select.value) {
      case "REALIZADA":
        formHfc_Realizada.style.display = "block";
        break;
      case "OBJETADA":
        formHfc_Objetada.style.display = "block";
        break;
      case "TRANSFERIDA":
        formHfc_Transferida.style.display = "block";
        break;
      default:
        btn_save.disabled = true;
    }
  }
});

// TIPO ACTIVIDAD (GPON-REALIZADA/TRANSFERIDA/OBJETADA)

const selectGpon = document.querySelector("select[name='tipo_actividadGpon']");
const formGpon_Realizada = document.getElementById("formGpon_Realizada");
const formGpon_Objetada = document.getElementById("formGpon_Objetada");
const formGpon_Transferida = document.getElementById("formGpon_Transferida");

formGpon_Realizada.style.display = "none";
formGpon_Objetada.style.display = "none";
formGpon_Transferida.style.display = "none";

selectGpon.addEventListener("change", function () {
  formGpon_Realizada.style.display = "none";
  formGpon_Transferida.style.display = "none";
  formGpon_Objetada.style.display = "none";
  btn_save.disabled = true;

  if (!selectGpon.value) {
    // si no se ha seleccionado ninguna opción
    formGpon_Realizada.disabled = true;
    formGpon_Transferida.disabled = true;
    formGpon_Objetada.disabled = true;
    btn_save.disabled = true;
    btn_save.style.display = "none";
  } else {
    // si se ha seleccionado una opción
    btn_save.disabled = false;
    btn_save.style.display = "block";

    switch (selectGpon.value) {
      case "REALIZADA":
        formGpon_Realizada.style.display = "block";
        formGpon_Realizada.disabled = false;
        break;
      case "OBJETADA":
        formGpon_Objetada.style.display = "block";
        formGpon_Objetada.disabled = false;
        break;
      case "TRANSFERIDA":
        formGpon_Transferida.style.display = "block";
        formGpon_Transferida.disabled = false;
        break;
      default:
        btn_save.disabled = true;
    }
  }
});

const selectAdsl = document.querySelector("select[name='tipoactividadAdsl']");
const formAdsl_Realizada = document.getElementById("formAdsl_Realizada");
const formAdsl_Objetada = document.getElementById("formAdsl_Objetada");
const formAdsl_Transferida = document.getElementById("formAdsl_Transferida");

formAdsl_Realizada.style.display = "none";
formAdsl_Objetada.style.display = "none";
formAdsl_Transferida.style.display = "none";

selectAdsl.addEventListener("change", function () {
  formAdsl_Realizada.style.display = "none";
  formAdsl_Transferida.style.display = "none";
  formAdsl_Objetada.style.display = "none";
  btn_save.disabled = true;

  if (!selectAdsl.value) {
    // si no se ha seleccionado ninguna opción
    formAdsl_Realizada.disabled = true;
    formAdsl_Transferida.disabled = true;
    formAdsl_Objetada.disabled = true;
    btn_save.disabled = true;
    btn_save.style.display = "none";
  } else {
    // si se ha seleccionado una opción
    btn_save.disabled = false;
    btn_save.style.display = "block";

    switch (selectAdsl.value) {
      case "REALIZADA":
        formAdsl_Realizada.style.display = "block";
        formAdsl_Realizada.disabled = false;
        break;
      case "OBJETADA":
        formAdsl_Objetada.style.display = "block";
        formAdsl_Objetada.disabled = false;
        break;
      case "TRANSFERIDA":
        formAdsl_Transferida.style.display = "block";
        formAdsl_Transferida.disabled = false;
        break;
      default:
        btn_save.disabled = true;
    }
  }
});
