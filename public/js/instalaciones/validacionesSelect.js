$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

// const optionHfc = tecnologia.querySelector('option[value="HFC"]');
// const optionGpon = tecnologia.querySelector('option[value="GPON"]');
// const optionAdsl = tecnologia.querySelector('option[value="ADSL"]');
// const optionCobre = tecnologia.querySelector('option[value="COBRE"]');
// const optionDth = tecnologia.querySelector('option[value="DTH"]');
// optionHfc.style.display = "block";
// optionGpon.style.display = "block";
// optionAdsl.style.display = "block";
// optionCobre.style.display = "block";
// optionDth.style.display = "block";

const select_orden = document.getElementById("select_orden");
const btn_save = document.getElementById("btn-submitForm");
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

// HIDDEN TIPO ACTIVIDAD AL INICIAR FORMULARIO

const TipoActividad_Hidden = document.querySelectorAll(".TipoActividad_Hidden");

// DISABLED ORDENES AL CAMBIAR DE FORMULARIO

const OrdenHfc = document.querySelectorAll(".OrdenHfc");
const OrdenGpon = document.querySelectorAll(".OrdenGpon");
// AGREGAR EL RESTO DE ORDENES(ADSL/COBRE/DTH)

// HIDDEN FORMULARIOS DE TIPO ACTIVIDAD (REALIZADO/OBJETADO/TRANSFERIDO)

const FormHfc_Hidden = document.querySelectorAll(".FormHfc_Hidden");

const FormGpon_Hidden = document.querySelectorAll(".FormGpon_Hidden");

const FormCobre_Hidden = document.querySelectorAll(".FormCobre_Hidden");

const FormAdsl_Hidden = document.querySelectorAll(".FormAdsl_Hidden");

const FormDth_Hidden = document.querySelectorAll(".FormDth_Hidden");

// SEGUIR CON LAS DEMAS HIDDEN FORMS (-FALTA DTH)

const tipoActividad_ChangeName = document.getElementById("tipo_actividad");
const tipo_actividadAdsl = document.getElementById("tipo_actividadAdsl");
const tipo_actividadCobre = document.getElementById("tipo_actividadCobre");
const tipo_actividadGpon = document.getElementById("tipo_actividadGpon");
const tipo_actividadDth = document.getElementById("tipo_actividadDth");

const select = document.querySelector("select[name='tecnologia']");

// VALIDACIONES OCULTAR FORM EN BASE A TECNOLOGIA

document.addEventListener("DOMContentLoaded", function () {
  const form1 = document.getElementById("form1");
  const form2 = document.getElementById("form2");
  const form3 = document.getElementById("form3");
  const form4 = document.getElementById("form4");
  const form5 = document.getElementById("form5");
  const form6 = document.getElementById("form6");
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
    btn_save.style.display = "none";

    switch (select.value) {
      case "HFC":
        btn_save.style.display = "none";
        form2.style.display = "block";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }

        // DESHABILITA EL TIPO ORDEN AL CAMBIAR DE TECNOLOGIA

        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }

        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }

        // TIPO ACTIVIDAD HIDDEN AL CAMBIAR DE TECNOLOGIA

        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }

        break;
      case "ADSL":
        btn_save.style.display = "none";
        form3.style.display = "block";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }

        // DESHABILITA EL TIPO ORDEN AL CAMBIAR DE TECNOLOGIA

        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }

        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }

        // TIPO ACTIVIDAD HIDDEN AL CAMBIAR DE TECNOLOGIA

        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }

        break;
      case "DTH":
        break;
      case "COBRE":
        form5.style.display = "block";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }

        // TIPO ORDEN HIDDEN

        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }

        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }

        // TIPO ACTIVIDAD HIDDEN

        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }

        break;
      case "GPON":
        btn_save.style.display = "none";
        form6.style.display = "block";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }

        // TIPO ORDEN

        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }

        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }

        // TIPO ACTIVIDAD

        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }

        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }

        break;
    }
  });
});

// document.addEventListener("DOMContentLoaded", function () {
//   select_orden.addEventListener("change", function () {
//     switch (select_orden.value) {
//       case "SELECCIONA UNA OPCION":
//         form2.style.display = "none";
//         form3.style.display = "none";
//         form4.style.display = "none";
//         form5.style.display = "none";
//         form6.style.display = "none";
//         btn_save.style.display = "none";

//         for (let i = 0; i < TipoActividad_Hidden.length; i++) {
//           TipoActividad_Hidden[i].style.display = "none";
//         }

//         for (let i = 0; i < FormHfc_Hidden.length; i++) {
//           FormHfc_Hidden[i].style.display = "none";
//         }

//         for (let i = 0; i < FormGpon_Hidden.length; i++) {
//           FormGpon_Hidden[i].style.display = "none";
//         }
//         for (let i = 0; i < FormAdsl_Hidden.length; i++) {
//           FormAdsl_Hidden[i].style.display = "none";
//         }

//         for (let i = 0; i < FormCobre_Hidden.length; i++) {
//           FormCobre_Hidden[i].style.display = "none";
//         }

//         for (let i = 0; i < FormDth_Hidden.length; i++) {
//           FormDth_Hidden[i].style.display = "none";
//         }
//         break;
//     }
//   });
// });

const select1 = document.getElementById("tecnologia");
const select2 = document.getElementById("select_orden");

// OPCIONES DE INPUTS EN BASE A LA SELECCION DE LA TECNOLOGIA

select1.addEventListener("change", function () {
  if (select1.value === "HFC") {
    select2.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>
    <option value="INSTALACION DE CLARO HOGAR">INSTALACION DE CLARO HOGAR</option>
    <option value="DOBLE - TV + INTERNET">DOBLE - TV + INTERNET</option>
    <option value="DOBLE - INTERNET + LINEA">DOBLE - INTERNET + LINEA</option>
    <option value="TV - BASICO INDIVIDUAL">TV - BASICO INDIVIDUAL</option>
    <option value="TV - DIGITAL INDIVIDUAL">TV - DIGITAL INDIVIDUAL</option>
    <option value="INTERNET INDIVIDUAL">INTERNET INDIVIDUAL</option>
    <option value="LINEA INDIVIDUAL">LINEA INDIVIDUAL</option>
    <option value="REFRESH">REFRESH</option>
    <option value="REACTIVACION -DOBLE - TV + INTERNET">REACTIVACION -DOBLE - TV + INTERNET</option>
    <option value="REACTIVACION - INSTALACION DE CLARO HOGAR">REACTIVACION - INSTALACION DE CLARO HOGAR</option>
    <option value="REACTIVACION -DOBLE - INTERNET + LINEA"> REACTIVACION -DOBLE - INTERNET + LINEA</option>
    <option value="REACTIVACION -TV - BASICO INDIVIDUAL">REACTIVACION -TV - BASICO INDIVIDUAL</option>
    <option value="REACTIVACION -TV - DIGITAL INDIVIDUAL">REACTIVACION -TV - DIGITAL INDIVIDUAL</option>
    <option value="REACTIVACION -LINEA INDIVIDUAL">REACTIVACION -LINEA INDIVIDUAL</option>
    `;
  } else if (select1.value === "GPON") {
    select2.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>
    <option value="INSTALACION DE CLARO HOGAR">INSTALACION DE CLARO HOGAR</option>
    <option value="DOBLE - IPTV + LINEA"> DOBLE - IPTV + LINEA</option>
    <option value="DOBLE - INTERNET + IPTV">DOBLE - INTERNET + IPTV</option>
    <option value="DOBLE - INTERNET + LINEA">DOBLE - INTERNET + LINEA</option>
    <option value="INTERNET INDIVIDUAL">INTERNET INDIVIDUAL</option>
    <option value="IPTV INDIVIDUAL">IPTV INDIVIDUAL</option>
    <option value="LINEA INDIVIDUAL">LINEA INDIVIDUAL</option>
    `;
  } else if (select1.value === "ADSL") {
    select2.innerHTML = `
    <option value="INTERNET ADSL">INTERNET ADSL</option>
    `;
  } else if (select1.value === "COBRE") {
    select2.innerHTML = `
    <option value="LINEA BASICA">LINEA BASICA</option>
    
    `;
  } else if (select1.value === "DTH") {
    select2.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>
    <option value="TV SATELITAL">TV SATELITAL</option>
    <option value="REACTIVACION">REACTIVACION</option>
    <option value="REFRESH">REFRESH</option>

    `;
  } else {
    select2.innerHTML = `
    <option value="">SELECCIONE UNA OPCION</option>`;
    // select1.innerHTML = `
    // <option value="">SELECCIONA UNA OPCION</option>`;
  }
});

// VALIDACIONES TIPO ORDEN

select_orden.addEventListener("change", function () {
  orden_tv_hfc.disabled = true;
  orden_internet_hfc.disabled = true;
  orden_linea_hfc.disabled = true;
  OrdenInternet_Gpon.disabled = true;
  OrdenTv_Gpon.disabled = true;
  OrdenLinea_Gpon.disabled = true;

  var selectedOption = this.value;
  var options = {
    "INSTALACION DE CLARO HOGAR": [false, false, false],
    "DOBLE - INTERNET + LINEA": [false, true, false],
    "DOBLE - TV + INTERNET": [false, true, true],
    "DOBLE - TV + INTERNET": [false, false, true],
    // "INTERNET INDIVIDUAL": [true, false, true],
    "LINEA INDIVIDUAL": [true, true, false],
    REFRESH: [false, false, true],
    "REACTIVACION - INSTALACION DE CLARO HOGAR": [false, false, false],
    "REACTIVACION -DOBLE - TV + INTERNET": [false, false, true],
    "REACTIVACION -DOBLE - INTERNET + LINEA": [true, false, false],
    "REACTIVACION -TV - DIGITAL INDIVIDUAL": [false, true, true],

    "REACTIVACION -TV - BASICO INDIVIDUAL": [false, true, true],
    "REACTIVACION -INTERNET INDIVIDUAL": [true, false, true],
    "REACTIVACION -LINEA INDIVIDUAL": [true, true, false],
    "TV - BASICO INDIVIDUAL": [false, true, true],
    "TV - DIGITAL INDIVIDUAL": [false, true, true],

    // VALIDACIONES INPUTS DEL SELECT GPON
    "INSTALACION DE CLARO HOGAR": [false, false, false],
    "DOBLE - INTERNET + IPTV": [false, false, true],
    "DOBLE - INTERNET + LINEA": [true, false, false],
    "DOBLE - IPTV + LINEA": [false, true, false],
    "INTERNET INDIVIDUAL": [true, false, true],
    "LINEA INDIVIDUAL": [true, true, false],
    "IPTV INDIVIDUAL": [false, true, true],
  };

  var disabledOptions = options[selectedOption] || [true, true, true];
  orden_tv_hfc.disabled = disabledOptions[0];
  orden_internet_hfc.disabled = disabledOptions[1];
  orden_linea_hfc.disabled = disabledOptions[2];
  OrdenInternet_Gpon.disabled = disabledOptions[0];
  OrdenTv_Gpon.disabled = disabledOptions[1];
  OrdenLinea_Gpon.disabled = disabledOptions[2];

  // deshabilitar todas las opciones si no se ha seleccionado una opción
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

// SELECCION TIPO ACTIVIDAD

const formTypes = [
  {
    select: document.querySelector("select[name='tipo_actividad']"),
    forms: [
      document.getElementById("formHfc_Realizada"),
      document.getElementById("formHfc_Objetada"),
      document.getElementById("formHfc_Anulada"),
      document.getElementById("formHfc_Transferida"),
      document.getElementById("formHfc_Refresh"),
    ],
  },
  {
    select: document.querySelector("select[name='tipo_actividadGpon']"),
    forms: [
      document.getElementById("formGpon_Realizada"),
      document.getElementById("formGpon_Objetada"),
      document.getElementById("formGpon_Anulada"),
      document.getElementById("formGpon_Transferida"),
    ],
  },
  {
    select: document.querySelector("select[name='tipo_actividadAdsl']"),
    forms: [
      document.getElementById("formAdsl_Realizada"),
      document.getElementById("formAdsl_Objetada"),
      document.getElementById("formAdsl_Anulada"),
    ],
  },
  {
    select: document.querySelector("select[name='tipo_actividadCobre']"),
    forms: [
      document.getElementById("formCobre_Realizada"),
      document.getElementById("formCobre_Objetada"),
      document.getElementById("formCobre_Anulada"),
      document.getElementById("formCobre_Transferida"),
    ],
  },

  {
    select: document.querySelector("select[name='tipo_actividadDth']"),
    forms: [
      document.getElementById("formDth_Realizada"),
      document.getElementById("formDth_Objetada"),
      document.getElementById("formDth_Anulada"),
      document.getElementById("formDth_Transferida"),
      document.getElementById("formDth_Refresh"),
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
      } else if (selectedOption === "ANULACION") {
        selectedForm = forms[2];
      } else if (selectedOption === "TRANSFERIDA") {
        selectedForm = forms[3];
      } else if (selectedOption === "REFRESH") {
        selectedForm = forms[4];
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

const selectDth = document.querySelector("select[name='tipo_actividadDth']");
const optionTransferida = selectDth.querySelector(
  "option[value='TRANSFERIDA']"
);
if (optionTransferida) {
  optionTransferida.remove();
}

const selectAdsl = document.querySelector("select[name='tipo_actividadAdsl']");
const optionTransferidaAdsl = selectAdsl.querySelector(
  "option[value='TRANSFERIDA']"
);
if (optionTransferidaAdsl) {
  optionTransferidaAdsl.remove();
}

// DESACTIVACION DE INPUTS CONFORME EL TIPO DE ORDEN

// TIPO ORDEN HFC

const selectHide_TipoOrden = document.getElementById("select_orden");
const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");

const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");
const equipotvHfc = document.querySelectorAll(".equipotvHfc");
const sapHfc = document.getElementById("sapHfc");
const syrengHfc = document.getElementById("syrengHfc");
const GeorefHfc = document.getElementById("GeorefHfc");
const RecibeHfc = document.getElementById("RecibeHfc");
const NodoHfc = document.getElementById("NodoHfc");
const TapHfc = document.getElementById("TapHfc");
const PosicionHfc = document.getElementById("PosicionHfc");
const MaterialesHfc = document.getElementById("MaterialesHfc");

//FUNCION RESET VALUES

function resetValues() {
  const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");
  const equipotvHfc = document.querySelectorAll(".equipotvHfc");
  const sapHfc = document.getElementById("sapHfc");
  const orden_tv_hfc = document.getElementById("orden_tv_hfc");
  const orden_internet_hfc = document.getElementById("orden_internet_hfc");
  const orden_linea_hfc = document.getElementById("orden_linea_hfc");
  const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");

  EquipoModem_Hfc.value = "";
  orden_internet_hfc.value = "";
  orden_tv_hfc.value = "";
  orden_linea_hfc.value = "";
  hideVoip_Hfc.value = "";
  syrengHfc.value = "";
  GeorefHfc.value = "";
  RecibeHfc.value = "";
  NodoHfc.value = "";
  TapHfc.value = "";
  PosicionHfc.value = "";
  MaterialesHfc.value = "";
  sapHfc.value = "";

  equipotvHfc.forEach((equipotv) => {
    equipotv.value = "";
  });
}

// OCULTA FORM TRANSFERIDO SI ES REACTIVACION
const optionTransferidaHfc = document.querySelector(
  "select[name='tipo_actividad'] option.ocultar"
);

const optionTransferidaHfcRefresh = document.querySelector(
  "select[name='tipo_actividad'] option.ocultaRefresh"
);

const inputsHiddenHfc = [
  "syrengHfc",
  "GeorefHfc",
  "RecibeHfc",
  "NodoHfc",
  "TapHfc",
  "PosicionHfc",
  "MaterialesHfc",
  "sapHfc",
  "EquipoModem_Hfc",
  "numeroVoip_hfc",
];

const inputsNoHiddenHfc = [
  "syrengHfc",
  "GeorefHfc",
  "RecibeHfc",
  "NodoHfc",
  "TapHfc",
  "PosicionHfc",
  "MaterialesHfc",
];

selectHide_TipoOrden.addEventListener("change", () => {
  const value = selectHide_TipoOrden.value;
  const tipo_actividad = document.getElementById("tipo_actividad");

  const OptionRealizada = tipo_actividad.querySelector(
    'option[value="REALIZADA"]'
  );
  const OptionObj = tipo_actividad.querySelector('option[value="OBJETADA"]');

  const OptionAnulada = tipo_actividad.querySelector(
    'option[value="ANULACION"]'
  );

  const OptionRefresh = tipo_actividad.querySelector('option[value="REFRESH"]');

  OptionObj.style.display = "block";
  OptionAnulada.style.display = "block";
  OptionRealizada.style.display = "block";
  OptionRefresh.display = "none";

  switch (value) {
    case "INSTALACION DE CLARO HOGAR":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";

      btn_save.style.display = "none";

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      resetValues();

      break;
    case "DOBLE - TV + INTERNET":
      // HIDDEN INPUT VOIP
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      EquipoModem_Hfc.disabled = false;

      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      resetValues();

      break;
    case "DOBLE - INTERNET + LINEA":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = false;
      EquipoModem_Hfc.disabled = false;

      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      resetValues();

      break;
    case "TV - BASICO INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      resetValues();

      break;

    case "TV - DIGITAL INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      resetValues();

      break;
    case "INTERNET INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      resetValues();

      break;
    case "LINEA INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "block"; // muestra el elemento
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      resetValues();

      break;
    case "REFRESH":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none"; // muestra el elemento
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "block"; // muestra el elemento
      }

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      btn_save.style.display = "none";

      OptionRealizada.style.display = "none";
      OptionObj.style.display = "none";
      OptionAnulada.style.display = "none";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      resetValues();

      break;
    case "REACTIVACION -DOBLE - TV + INTERNET":
      // HIDDEN INPUT VOIP
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      hideVoip_Hfc.disabled = true;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

      break;
    case "REACTIVACION - INSTALACION DE CLARO HOGAR":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "none";
      }
      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

      break;

    case "REACTIVACION -DOBLE - INTERNET + LINEA":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "none";
      }
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = true;
      EquipoModem_Hfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

      break;

    case "REACTIVACION -TV - BASICO INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "none";
      }
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      sapHfc.disabled = true;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

      break;

    case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "none";
      }
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

      break;
    case "REACTIVACION -INTERNET INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "none";
      }
      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }

      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

    case "REACTIVACION -LINEA INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "none";
      }
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      OptionRealizada.style.display = "block";
      OptionObj.style.display = "block";
      OptionAnulada.style.display = "block";
      OptionRefresh.display = "none";
      btn_save.style.display = "none";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }
      if (optionTransferidaHfc) {
        optionTransferidaHfc.style.display = "none";
      }
      if (optionTransferidaHfcRefresh) {
        optionTransferidaHfcRefresh.style.display = "none"; // muestra el elemento
      }

      if (tipo_actividad.value === "TRANSFERIDA") {
        formHfc_Transferida.style.display = "none";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
      }

      resetValues();

      break;
    default:
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
      for (let i = 0; i < FormHfc_Hidden.length; i++) {
        FormHfc_Hidden[i].style.display = "none";
      }

      btn_save.style.display = "none";

      resetValues();

      break;
  }
});

function resetValuesGpon() {
  const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon");
  const OrdenInternet_Gpon = document.getElementById("OrdenInternet_Gpon");
  const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon");
  const EqModenGpon = document.getElementById("EqModenGpon");
  const equipotvGpon = document.querySelectorAll(".equipotvGpon");
  const NumeroGpon = document.getElementById("NumeroGpon");

  OrdenTv_Gpon.value = "";
  OrdenInternet_Gpon.value = "";
  OrdenLinea_Gpon.value = "";

  EqModenGpon.value = "";
  NumeroGpon.value = "";

  equipotvGpon.forEach((equipotv) => {
    equipotv.value = "";
  });
}

// DESACTIVACION DE INPUTS CONFORME EL TIPO DE ORDEN

// TIPO ORDEN GPON

const EqModenGpon = document.getElementById("EqModenGpon");
const equipotvGpon = document.querySelectorAll(".equipotvGpon");
const NumeroGpon = document.getElementById("NumeroGpon");

selectHide_TipoOrden.addEventListener("change", () => {
  const value = selectHide_TipoOrden.value;
  // selectHide_TipoOrdenGpon.style.display = "none";
  switch (value) {
    case "INSTALACION DE CLARO HOGAR":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      // selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      resetValuesGpon();

      break;
    case "DOBLE - INTERNET + IPTV":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      // selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;
      NumeroGpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }
      resetValuesGpon();

      break;
    case "DOBLE - INTERNET + LINEA":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      // selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      resetValuesGpon();

      break;
    case "DOBLE - IPTV + LINEA":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      // selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = true;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }
      resetValuesGpon();

      break;
    case "IPTV INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      // selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = true;
      NumeroGpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }
      resetValuesGpon();

      break;
    case "LINEA INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      resetValuesGpon();

      break;

    case "INTERNET INDIVIDUAL":
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      // selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;
      NumeroGpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      resetValuesGpon();

      break;
    default:
      for (let i = 0; i < TipoActividad_Hidden.length; i++) {
        TipoActividad_Hidden[i].style.display = "block";
      }
      resetValuesGpon();

      break;
  }
});

const selectHiddenTipoOrden = document.getElementById("select_orden");
const DisabledRefreshSelect = document.getElementById("refreshSelect");
const hiddenSelectRefresh = document.getElementById("HiddenrefreshSelect");

DisabledRefreshSelect.disabled = true;
hiddenSelectRefresh.style.display = "none";

// DISABLE POR TIPO ORDEN EN CAMBIO DE EQUIPO

selectHiddenTipoOrden.addEventListener("change", () => {
  const value = selectHide_TipoOrden.value;
  // selectHide_TipoOrdenGpon.style.display = "none";

  switch (value) {
    case "INSTALACION CLARO HOGAR":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "DOBLE - TV + INTERNET":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "DOBLE - INTERNET + LINEA":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "TV - DIGITAL INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "TV - BASICO INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "INTERNET INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "LINEA INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "REFRESH":
      DisabledRefreshSelect.disabled = false;
      hiddenSelectRefresh.style.display = "block";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "REACTIVACION - INSTALACION DE CLARO HOGAR":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "REACTIVACION -DOBLE - TV + INTERNET":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";
      break;

    case "REACTIVACION -DOBLE - INTERNET + LINEA":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;

    case "REACTIVACION -TV - BASICO INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;

    case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
    case "REACTIVACION -INTERNET INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

    case "REACTIVACION -LINEA INDIVIDUAL":
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

    default:
      DisabledRefreshSelect.disabled = true;
      hiddenSelectRefresh.style.display = "none";
      DisabledRefreshSelect.value = "SELECCIONE UNA OPCION";

      break;
  }
});

const TecnologiaChangeDTH = document.getElementById("tecnologia");
const selectDthOrden = document.getElementById("select_orden");

document.addEventListener("DOMContentLoaded", function () {
  const OptionRealizada = tipo_actividadDth.querySelector(
    'option[value="REALIZADA"]'
  );
  const OptionObj = tipo_actividadDth.querySelector('option[value="OBJETADA"]');

  const OptionAnulada = tipo_actividadDth.querySelector(
    'option[value="ANULACION"]'
  );

  const OptionRefresh = tipo_actividadDth.querySelector(
    'option[value="REFRESH"]'
  );

  OptionObj.style.display = "block";
  OptionAnulada.style.display = "block";
  OptionRealizada.style.display = "block";
  OptionRefresh.style.display = "none";

  selectDthOrden.addEventListener("change", () => {
    const value = selectDthOrden.value;
    const tipo_actividadDth = document.getElementById("tipo_actividadDth");

    switch (value) {
      case "SELECCIONE UNA OPCION":
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "block";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        btn_save.style.display = "none";

        OptionRealizada.style.display = "block";
        OptionObj.style.display = "block";
        OptionAnulada.style.display = "block";
        OptionRefresh.style.display = "none";
        btn_save.style.display = "none";

        resetValues();

        break;
      case "REFRESH":
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "block";
        }

        tipo_actividadDth.value = "SELECCIONE UNA OPCION";
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }

        btn_save.style.display = "none";

        OptionRealizada.style.display = "none";
        OptionObj.style.display = "none";
        OptionAnulada.style.display = "none";
        OptionRefresh.style.display = "block";
        btn_save.style.display = "none";

        resetValues();

        break;
      case "TV SATELITAL":
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "block";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        btn_save.style.display = "none";

        OptionRealizada.style.display = "block";
        OptionObj.style.display = "block";
        OptionAnulada.style.display = "block";
        OptionRefresh.style.display = "none";
        btn_save.style.display = "none";

        resetValues();

        break;
      case "REACTIVACION":
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "block";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        btn_save.style.display = "none";

        OptionRealizada.style.display = "block";
        OptionObj.style.display = "block";
        OptionAnulada.style.display = "block";
        OptionRefresh.style.display = "none";
        btn_save.style.display = "none";

        resetValues();

        break;
      default:
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "block";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";

        OptionObj.style.display = "block";
        OptionAnulada.style.display = "block";
        OptionRealizada.style.display = "block";
        OptionRefresh.style.display = "none";

        resetValues();

        break;
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const selectOrden = document.getElementById("select_orden");
  const tecnologiaDth = document.getElementById("tecnologia");

  selectOrden.addEventListener("change", function () {
    switch (tecnologiaDth.value + "|" + selectOrden.value) {
      case "DTH|TV SATELITAL":
        btn_save.style.display = "none";
        form4.style.display = "block";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
        // DESHABILITA EL TIPO DE ORDEN AL CAMBIAR DE TECNOLOGIA
        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }
        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }
        // TIPO ACTIVIDAD
        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        break;
      case "DTH|REACTIVACION":
        btn_save.style.display = "none";
        form4.style.display = "block";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
        // DESHABILITA EL TIPO DE ORDEN AL CAMBIAR DE TECNOLOGIA
        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }
        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }
        // TIPO ACTIVIDAD
        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        break;
      case "DTH|REFRESH":
        btn_save.style.display = "none";
        form4.style.display = "block";
        tipoActividad_ChangeName.value = "SELECCIONE UNA OPCION";
        tipo_actividadAdsl.value = "SELECCIONE UNA OPCION";
        tipo_actividadGpon.value = "SELECCIONE UNA OPCION";
        tipo_actividadCobre.value = "SELECCIONE UNA OPCION";
        tipo_actividadDth.value = "SELECCIONE UNA OPCION";
        for (let i = 0; i < TipoActividad_Hidden.length; i++) {
          TipoActividad_Hidden[i].style.display = "none";
        }
        // DESHABILITA EL TIPO DE ORDEN AL CAMBIAR DE TECNOLOGIA
        for (let i = 0; i < OrdenHfc.length; i++) {
          OrdenHfc[i].disabled = true;
        }
        for (let i = 0; i < OrdenGpon.length; i++) {
          OrdenGpon[i].disabled = true;
        }
        // TIPO ACTIVIDAD
        for (let i = 0; i < FormHfc_Hidden.length; i++) {
          FormHfc_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormGpon_Hidden.length; i++) {
          FormGpon_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormAdsl_Hidden.length; i++) {
          FormAdsl_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormCobre_Hidden.length; i++) {
          FormCobre_Hidden[i].style.display = "none";
        }
        for (let i = 0; i < FormDth_Hidden.length; i++) {
          FormDth_Hidden[i].style.display = "none";
        }
        break;
      default:
        break;
    }
  });
});
