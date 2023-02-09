document.addEventListener("DOMContentLoaded", function () {
  const form1 = document.getElementById("form1");
  const form2 = document.getElementById("form2");
  const form3 = document.getElementById("form3");
  const form4 = document.getElementById("form4");
  const form5 = document.getElementById("form5");
  const form6 = document.getElementById("form6");
  const btn_show = document.getElementById("btn-save");

  const select = document.querySelector("select[name='tecnologia']");

  form2.style.display = "none";
  form3.style.display = "none";
  form4.style.display = "none";
  form5.style.display = "none";
  form6.style.display = "none";
  btn_show.style.display = "none";

  form1.style.display = "block";

  select.addEventListener("change", function () {
    form2.style.display = "none";
    form3.style.display = "none";
    form4.style.display = "none";
    form5.style.display = "none";
    form6.style.display = "none";
    btn_show.style.display = "none";

    switch (select.value) {
      case "HFC":
        form2.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "ADSL":
        form3.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "DTH":
        form4.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "COBRE":
        form5.style.display = "block";
        btn_show.style.display = "block";
        break;
      case "GPON":
        form6.style.display = "block";
        btn_show.style.display = "block";
        break;
    }
  });
});

const select1 = document.getElementById("tecnologia");
const select2 = document.getElementById("select_orden");

select1.addEventListener("change", function () {
  if (select1.value === "HFC") {
    select2.innerHTML = `
    <option value="TV">SELECCIONA UNA OPCION</option>
    <option value="TV">TV BASICA</option>
    <option value="TV DIG">TV DIGITAL</option>
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

const select3 = document.getElementById("motivo_llamada");
const input_tecnologia = document.getElementById("tec_input");
const input_orden = document.getElementById("select_ordenhide");

select3.addEventListener("change", function () {
  if (select3.value === "POSTVENTA_TRASLADO") {
    input_tecnologia.style.display = "none";
    input_orden.style.display = "none";
  } else {
    input_tecnologia.style.display = "block";
    input_orden.style.display = "block";
  }
});
