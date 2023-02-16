const select_orden = document.getElementById("select_orden");
const btn_save = document.getElementById("btn-submit");
btn_save.style.display = "none";

const [
  orden_tv_hfc,
  orden_internet_hfc,
  orden_linea_hfc,
  OrdenTv_Gpon,
  OrdenInternet_Gpon,
  OrdenLinea_Gpon,
] = document.querySelectorAll(
  "#orden_tv_hfc, #orden_internet_hfc, #orden_linea_hfc, #OrdenTv_Gpon, #OrdenInternet_Gpon, #OrdenLinea_Gpon"
);

const hfchide_realizado = document.getElementById("formHfc_Realizada");
const hfchide_objetado = document.getElementById("formHfc_Objetada");
const hfchide_transferido = document.getElementById("formHfc_Transferida");

const gponhide_realizado = document.getElementById("formGpon_Realizada");
const gponhide_transferido = document.getElementById("formGpon_Objetada");
const gponhide_objetado = document.getElementById("formGpon_Transferida");

// SEGUIR CON LAS DEMAS HIDDEN FORMS

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
  // btn_save.style.display = "none";
  form1.style.display = "block";

  select.addEventListener("change", function () {
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    // btn_save.style.display = "none";

    switch (select.value) {
      case "HFC":
        btn_save.style.display = "none";
        form2.style.display = "block";

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        hfchide_realizado.disabled = true;
        hfchide_objetado.disabled = true;
        hfchide_transferido.disabled = true;

        break;
      case "ADSL":
        btn_save.style.display = "none";
        form3.style.display = "block";
        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;
        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        hfchide_realizado.disabled = true;
        hfchide_objetado.disabled = true;
        hfchide_transferido.disabled = true;

        break;
      case "DTH":
        btn_save.style.display = "none";

        hfchide_realizado.disabled = true;
        hfchide_objetado.disabled = true;
        hfchide_transferido.disabled = true;

        form4.style.display = "block";

        break;
      case "COBRE":
        form5.style.display = "block";

        hfchide_realizado.disabled = true;
        hfchide_objetado.disabled = true;
        hfchide_transferido.disabled = true;

        break;
      case "GPON":
        btn_save.style.display = "none";
        form6.style.display = "block";

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        hfchide_realizado.disabled = true;
        hfchide_objetado.disabled = true;
        hfchide_transferido.disabled = true;

        break;
      default:
      // btn_save.style.display = "none";
    }
  });
});

const select1 = document.getElementById("tecnologia");
const select2 = document.getElementById("select_orden");

// OPCIONES DE INPUTS EN BASE A LA SELECCION DE LA TECNOLOGIA

select1.addEventListener("change", function () {
  if (select1.value === "HFC") {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
    <option value="TV BASICA">TV BASICA</option>
    <option value="TV DIGITAL">TV DIGITAL</option>
    <option value="INTERNET">INTERNET</option>
    <option value="LINEA">LINEA</option>
    <option value="CASA CLARO TRIPLE">CASA CLARO TRIPLE</option>
    <option value="CASA CLARO DOBLE - TV + INTERNET">CASA CLARO DOBLE - TV + INTERNET</option>
    <option value="CASA CLARO DOBLE - INTERNET + LINEA">CASA CLARO DOBLE - INTERNET + LINEA</option>
    `;
  } else if (select1.value === "GPON") {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
    <option value="INDIVIDUAL INTERNET">INDIVIDUAL INTERNET</option>
    <option value="GPON IPTV">GPON IPTV</option>
    <option value="LINEA GPON">LINEA GPON</option>
    `;
  } else if (select1.value === "ADSL") {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
    <option value="INDIVIDUAL INTERNET">INDIVIDUAL INTERNET</option>
    <option value="INDIVIDUAL">INDIVIDUAL</option>
    <option value="REACTIVACION">REACTIVACION</option>
    `;
  } else if (select1.value === "COBRE") {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
    <option value="INDIVIDUAL INTERNET">INDIVIDUAL</option>
    `;
  } else if (select1.value === "DTH") {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
    <option value="REACTIVACION">REACTIVACION</option>
    `;
  } else {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
    `;
  }
});

// VALIDACIONES TIPO ORDEN

select_orden.addEventListener("change", function () {
  // deshabilitar todas las opciones
  orden_tv_hfc.disabled = true;
  orden_internet_hfc.disabled = true;
  orden_linea_hfc.disabled = true;
  OrdenInternet_Gpon.disabled = true;
  OrdenTv_Gpon.disabled = true;
  OrdenLinea_Gpon.disabled = true;

  // btn_save.disabled = true;
  // btn_save.style.display = "none";

  // resetFormFields(); // restablecer los campos

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

  // verificar si se ha seleccionado una opción
  if (selectedOption === "") {
    // deshabilitar todas las opciones si no se ha seleccionado una opción
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = true;
    // resetFormFields(); // restablecer los campos
  }
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

// SELECCION TIPO ACTIVIDAD

const formTypes = [
  {
    select: document.querySelector("select[name='tipo_actividad']"),
    forms: [
      document.getElementById("formHfc_Realizada"),
      document.getElementById("formHfc_Objetada"),
      document.getElementById("formHfc_Transferida"),
    ],
  },
  {
    select: document.querySelector("select[name='tipo_actividadGpon']"),
    forms: [
      document.getElementById("formGpon_Realizada"),
      document.getElementById("formGpon_Objetada"),
      document.getElementById("formGpon_Transferida"),
    ],
  },
  {
    select: document.querySelector("select[name='tipo_actividadAdsl']"),
    forms: [
      document.getElementById("formAdsl_Realizada"),
      document.getElementById("formAdsl_Objetada"),
      document.getElementById("formAdsl_Transferida"),
    ],
  },
  {
    select: document.querySelector("select[name='tipo_actividadCobre']"),
    forms: [
      document.getElementById("formCobre_Realizada"),
      document.getElementById("formCobre_Objetada"),
      document.getElementById("formCobre_Transferida"),
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
      btn_save.style.display = "none";
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
        btn_save.style.display = "block";
      } else {
        btn_save.style.display = "none";
      }
    }
  });
});
