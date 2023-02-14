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
    <option value="TV">SELECCIONA UNA OPCION</option>
      <option value="INDIVIDUAL INTERNET">INDIVIDUAL INTERNET</option>
      <option value="GPON IPTV">GPON IPTV</option>
      <option value="LINEA GPON">LINEA GPON</option>
     
      `;
  } else if (select1.value === "ADSL") {
    select2.innerHTML = `
    <option value="TV">SELECCIONA UNA OPCION</option>
      <option value="INDIVIDUAL INTERNET">INDIVIDUAL INTERNET</option>
      <option value="INDIVIDUAL">INDIVIDUAL</option>
      <option value="REACTIVACION">REACTIVACION</option>
      `;
  } else if (select1.value === "COBRE") {
    select2.innerHTML = `
      <option value="TV">SELECCIONA UNA OPCION</option>
      <option value="INDIVIDUAL INTERNET">INDIVIDUAL</option>
      `;
  } else if (select1.value === "DTH") {
    select2.innerHTML = `
      <option value="TV">SELECCIONA UNA OPCION</option>
      <option value="REACTIVACION">REACTIVACION</option>
      `;
  }
});

// VALIDACIONES TIPO ORDEN

const select_orden = document.getElementById("select_orden");

const orden_tv_hfc = document.getElementById("orden_tv_hfc");
const orden_internet_hfc = document.getElementById("orden_internet_hfc");
const orden_linea_hfc = document.getElementById("orden_linea_hfc");
const btn_save = document.getElementById("btn-submit");

orden_tv_hfc.disabled = true;
orden_internet_hfc.disabled = true;
orden_linea_hfc.disabled = true;
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
  };
  var disabledOptions = options[selectedOption] || [true, true, true];
  orden_tv_hfc.disabled = disabledOptions[0];
  orden_internet_hfc.disabled = disabledOptions[1];
  orden_linea_hfc.disabled = disabledOptions[2];
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

// VALIDACIONES DE INPUTS PARA TIPO DE TRABAJO REALIZADO

document.addEventListener("DOMContentLoaded", function () {
  // HFC
  const formHfc_Realizada = document.getElementById("formHfc_Realizada");
  const formHfc_Objetada = document.getElementById("formHfc_Objetada");
  const formHfc_Transferida = document.getElementById("formHfc_Transferida");

  // GPON
  // const formGpon_Realizada = document.getElementById("formGpon_Realizada");
  // const formGpon_Objetada = document.getElementById("formGpon_Objetada");
  // const formGpon_Transferida = document.getElementById("formGpon_Transferida");

  const select = document.querySelector("select[name='tipo_actividad']");

  formHfc_Realizada.style.display = "none";
  formHfc_Objetada.style.display = "none";
  formHfc_Transferida.style.display = "none";

  select.addEventListener("change", function () {
    formHfc_Realizada.style.display = "none";

    switch (select.value) {
      case "REALIZADA":
        formHfc_Realizada.style.display = "block";
        btn_save.disabled = false;
        btn_save.style.display = "block";
        formHfc_Objetada.style.display = "none";
        break;
      case "OBJETADA":
        formHfc_Realizada.style.display = "none";
        formHfc_Objetada.style.display = "block";
        btn_save.style.display = "block";

        break;
      case "TRANSFERIDA":
        formHfc_Transferida.style.display = "block";
        formHfc_Realizada.style.display = "none";
        formHfc_Objetada.style.display = "none";
        break;
    }
  });
});
