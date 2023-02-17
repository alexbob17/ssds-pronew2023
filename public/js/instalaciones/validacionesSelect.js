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

// HIDDEN TIPO ACTIVIDAD AL INICIAR FORMULARIO
const hideTipoActividad = document.getElementById("hideTipoActividad");
const hideTipoActAdsl = document.getElementById("tipo_actividadAdslHidden");
const tipoactividadDth_Hidden = document.getElementById(
  "tipoactividadDth_Hidden"
);

const tipo_actividadCobreHide = document.getElementById(
  "tipo_actividadCobreHide"
);

const tipoactividadHide_Gpon = document.getElementById(
  "tipoactividadHide_Gpon"
);

// HIDDEN FORMULARIOS DE TIPO ACTIVIDAD (REALIZADO/OBJETADO/TRANSFERIDO)

const hfchide_realizado = document.getElementById("formHfc_Realizada");
const hfchide_objetado = document.getElementById("formHfc_Objetada");
const hfchide_transferido = document.getElementById("formHfc_Transferida");

const gponhide_realizado = document.getElementById("formGpon_Realizada");
const gponhide_transferido = document.getElementById("formGpon_Objetada");
const gponhide_objetado = document.getElementById("formGpon_Transferida");

const adslhide_realizado = document.getElementById("formAdsl_Realizada");
const adslhide_objetado = document.getElementById("formAdsl_Objetada");
const adslhide_transferido = document.getElementById("formAdsl_Transferida");

const cobrehide_realizado = document.getElementById("formCobre_Realizada");
const cobrehide_objetado = document.getElementById("formCobre_Objetada");
const cobrehide_transferido = document.getElementById("formCobre_Transferida");

// SEGUIR CON LAS DEMAS HIDDEN FORMS

const tipoActividad_ChangeName = document.getElementById("tipo_actividad");

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
        tipoActividad_ChangeName.value = "Seleccione una opción";
        hideTipoActAdsl.style.display = "none";
        hideTipoActividad.style.display = "none";
        tipoactividadDth_Hidden.style.display = "none";
        tipo_actividadCobreHide.style.display = "none";
        tipoactividadHide_Gpon.style.display = "none";

        // TIPO ORDEN

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        // TIPO ACTIVIDAD

        hfchide_realizado.style.display = "none";
        hfchide_objetado.style.display = "none";
        hfchide_transferido.style.display = "none";

        gponhide_realizado.disabled = true;
        gponhide_transferido.disabled = true;
        gponhide_objetado.disabled = true;

        adslhide_realizado.disabled = true;
        adslhide_objetado.disabled = true;
        adslhide_transferido.disabled = true;

        break;
      case "ADSL":
        btn_save.style.display = "none";
        form3.style.display = "block";
        tipoActividad_ChangeName.value = "Seleccione una opción";
        hideTipoActAdsl.style.display = "none";
        hideTipoActividad.style.display = "none";
        tipoactividadDth_Hidden.style.display = "none";
        tipo_actividadCobreHide.style.display = "none";
        tipoactividadHide_Gpon.style.display = "none";

        // TIPO ORDEN

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        // TIPO ACTIVIDAD

        hfchide_realizado.style.display = "none";
        hfchide_objetado.style.display = "none";
        hfchide_transferido.style.display = "none";

        gponhide_realizado.disabled = true;
        gponhide_transferido.disabled = true;
        gponhide_objetado.disabled = true;

        adslhide_realizado.disabled = true;
        adslhide_objetado.disabled = true;
        adslhide_transferido.disabled = true;

        break;
      case "DTH":
        btn_save.style.display = "none";
        form4.style.display = "block";
        tipoActividad_ChangeName.value = "Seleccione una opción";
        hideTipoActAdsl.style.display = "none";
        hideTipoActividad.style.display = "none";
        tipoactividadDth_Hidden.style.display = "none";
        tipo_actividadCobreHide.style.display = "none";
        tipoactividadHide_Gpon.style.display = "none";

        // TIPO ORDEN

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        // TIPO ACTIVIDAD

        hfchide_realizado.style.display = "none";
        hfchide_objetado.style.display = "none";
        hfchide_transferido.style.display = "none";

        gponhide_realizado.disabled = true;
        gponhide_transferido.disabled = true;
        gponhide_objetado.disabled = true;

        adslhide_realizado.disabled = true;
        adslhide_objetado.disabled = true;
        adslhide_transferido.disabled = true;

        break;
      case "COBRE":
        form5.style.display = "block";
        btn_save.style.display = "none";
        tipoActividad_ChangeName.value = "Seleccione una opción";
        hideTipoActAdsl.style.display = "none";
        hideTipoActividad.style.display = "none";
        tipoactividadDth_Hidden.style.display = "none";
        tipo_actividadCobreHide.style.display = "none";
        tipoactividadHide_Gpon.style.display = "none";

        // TIPO ORDEN HIDDEN

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        // TIPO ACTIVIDAD HIDDEN

        hfchide_realizado.style.display = "none";
        hfchide_objetado.style.display = "none";
        hfchide_transferido.style.display = "none";

        gponhide_realizado.disabled = true;
        gponhide_transferido.disabled = true;
        gponhide_objetado.disabled = true;

        adslhide_realizado.disabled = true;
        adslhide_objetado.disabled = true;
        adslhide_transferido.disabled = true;

        break;
      case "GPON":
        btn_save.style.display = "none";
        form6.style.display = "block";
        tipoActividad_ChangeName.value = "Seleccione una opción";
        hideTipoActAdsl.style.display = "none";
        hideTipoActividad.style.display = "none";
        tipoactividadDth_Hidden.style.display = "none";
        tipo_actividadCobreHide.style.display = "none";
        tipoactividadHide_Gpon.style.display = "none";

        // TIPO ORDEN

        orden_tv_hfc.disabled = true;
        orden_internet_hfc.disabled = true;
        orden_linea_hfc.disabled = true;

        OrdenInternet_Gpon.disabled = true;
        OrdenTv_Gpon.disabled = true;
        OrdenLinea_Gpon.disabled = true;

        // TIPO ACTIVIDAD

        hfchide_realizado.style.display = "none";
        hfchide_objetado.style.display = "none";
        hfchide_transferido.style.display = "none";

        gponhide_realizado.style.display = "none";
        gponhide_transferido.style.display = "none";
        gponhide_objetado.style.display = "none";

        adslhide_realizado.disabled = true;
        adslhide_objetado.disabled = true;
        adslhide_transferido.disabled = true;

        break;
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
    <option value="INSTALACION DE CLARO HOGAR">INSTALACION DE CLARO HOGAR</option>
    <option value="DOBLE - TV + INTERNET">DOBLE - TV + INTERNET</option>
    <option value="DOBLE - INTERNET + LINEA">DOBLE - INTERNET + LINEA</option>
    <option value="TV - BASICO INDIVIDUAL">TV - BASICO INDIVIDUAL</option>
    <option value="TV - DIGITAL INDIVIDUAL">TV - DIGITAL INDIVIDUAL</option>
    <option value="INTERNET INDIVIDUAL">INTERNET INDIVIDUAL</option>
    <option value="LINEA INDIVIDUAL">LINEA INDIVIDUAL</option>
    <option value="REACTIVACION -DOBLE - TV + INTERNET">REACTIVACION -DOBLE - TV + INTERNET</option>
    <option value="REACTIVACION - INSTALACION DE CLARO HOGAR">REACTIVACION - INSTALACION DE CLARO HOGAR</option>
    <option value="REACTIVACION -DOBLE - INTERNET + LINEA"> REACTIVACION -DOBLE - INTERNET + LINEA</option>
    <option value="REACTIVACION -TV - BASICO INDIVIDUAL">REACTIVACION -TV - BASICO INDIVIDUAL</option>
    <option value="REACTIVACION -TV - DIGITAL INDIVIDUAL">REACTIVACION -TV - DIGITAL INDIVIDUAL</option>
    <option value="REACTIVACION -LINEA INDIVIDUAL">REACTIVACION -LINEA INDIVIDUAL</option>
    `;
  } else if (select1.value === "GPON") {
    select2.innerHTML = `
    <option value="">SELECCIONA UNA OPCION</option>
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
    <option value="INDIVIDUAL">INDIVIDUAL</option>
    `;
  } else if (select1.value === "COBRE") {
    select2.innerHTML = `
    <option value="INDIVIDUAL">INDIVIDUAL</option>
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

  var selectedOption = this.value;
  var options = {
    "DOBLE - INTERNET + LINEA": [true, false, false],
    "DOBLE - TV + INTERNET": [false, true, true],
    "INSTALACION DE CLARO HOGAR": [false, false, false],
    "DOBLE - TV + INTERNET": [false, false, true],
    "INTERNET INDIVIDUAL": [true, false, true],
    "LINEA INDIVIDUAL": [true, true, false],
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
    "IPTV INDIVIDUAL": [true, false, true],
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

// DESACTIVACION DE INPUTS CONFORME EL TIPO DE ORDEN

// TIPO ORDEN HFC

const selectHide_TipoOrden = document.getElementById("select_orden");
const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");
const equipotv1 = document.getElementById("equipostv1");
const equipotv2 = document.getElementById("equipostv2");
const equipotv3 = document.getElementById("equipostv3");
const equipotv4 = document.getElementById("equipostv4");
const equipotv5 = document.getElementById("equipostv5");
const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");

selectHide_TipoOrden.addEventListener("change", () => {
  const value = selectHide_TipoOrden.value;
  switch (value) {
    case "INSTALACION DE CLARO HOGAR":
      hideTipoActividad.style.display = "block";
      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;
    case "DOBLE - TV + INTERNET":
      // HIDDEN INPUT VOIP
      hideTipoActividad.style.display = "block";
      hideVoip_Hfc.disabled = true;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;
    case "DOBLE - INTERNET + LINEA":
      hideTipoActividad.style.display = "block";
      hideVoip_Hfc.disabled = false;
      equipotv1.disabled = true;
      equipotv2.disabled = true;
      equipotv3.disabled = true;
      equipotv4.disabled = true;
      equipotv5.disabled = true;

      break;
    case "TV - BASICO INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;

    case "TV - DIGITAL INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;
    case "INTERNET INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = false;
      equipotv1.disabled = true;
      equipotv2.disabled = true;
      equipotv3.disabled = true;
      equipotv4.disabled = true;
      equipotv5.disabled = true;

      break;
    case "LINEA INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      equipotv1.disabled = true;
      equipotv2.disabled = true;
      equipotv3.disabled = true;
      equipotv4.disabled = true;
      equipotv5.disabled = true;

      break;
    case "REACTIVACION -DOBLE - TV + INTERNET":
      // HIDDEN INPUT VOIP
      hideTipoActividad.style.display = "block";
      hideVoip_Hfc.disabled = true;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;
    case "REACTIVACION - INSTALACION DE CLARO HOGAR":
      hideTipoActividad.style.display = "block";
      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;

    case "REACTIVACION -DOBLE - INTERNET + LINEA":
      hideTipoActividad.style.display = "block";
      hideVoip_Hfc.disabled = false;
      equipotv1.disabled = true;
      equipotv2.disabled = true;
      equipotv3.disabled = true;
      equipotv4.disabled = true;
      equipotv5.disabled = true;

      break;

    case "REACTIVACION -TV - BASICO INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      equipotv1.disabled = false;
      equipotv2.disabled = false;
      equipotv3.disabled = false;
      equipotv4.disabled = false;
      equipotv5.disabled = false;

      break;
    default:
      hideTipoActividad.style.display = "block";

      break;
  }
});

// DESACTIVACION DE INPUTS CONFORME EL TIPO DE ORDEN

// TIPO ORDEN GPON

const EqModenGpon = document.getElementById("EqModenGpon");

const selectHide_TipoOrdenGpon = document.getElementById(
  "tipoactividadHide_Gpon"
);

selectHide_TipoOrden.addEventListener("change", () => {
  const value = selectHide_TipoOrden.value;
  selectHide_TipoOrdenGpon.style.display = "none";
  switch (value) {
    case "INSTALACION DE CLARO HOGAR":
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;

      break;
    case "DOBLE - INTERNET + IPTV":
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;

      break;
    case "DOBLE - INTERNET + LINEA":
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = false;

      break;
    case "DOBLE - IPTV + LINEA":
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = true;

      break;
    case "IPTV INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = true;

      break;
    case "LINEA INDIVIDUAL":
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      EqModenGpon.disabled = true;

      break;
    default:
      hideTipoActividad.style.display = "block";
      selectHide_TipoOrdenGpon.style.display = "block";
      break;
  }
});
