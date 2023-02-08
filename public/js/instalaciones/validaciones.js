const form = document.querySelector("form");

form.addEventListener("submit", function (event) {
  event.preventDefault();

  const data = {
    codigo_tecnico: document.querySelector("input[name='codigo_tecnico']")
      .value,
    telefono: document.querySelector("input[name='telefono']").value,
    tecnologia: document.querySelector("input[name='tecnologia']").value,
    motivo_llamada: document.querySelector(
      "input[name='motivo_llamada'][value='instalacion']"
    ).value,
    tipo_orden: document.querySelector("select[name='tipo_orden']").value,
    tecnico: document.querySelector("input[name='tecnico']").value,
  };

  switch (data.tecnologia.value) {
    case "HFC":
      //   data.numero = document.querySelector("input[name='numero']").value;
      break;
    case "ADSL":
      data.orden_internetads = document.querySelector(
        "input[name='orden_internetadsl']"
      ).value;
      data.sap_adsl = document.querySelector("input[name='sap_adsl']").value;
      data.trabajado_adsl = document.querySelector(
        "input[name='trabajado_adsl']"
      ).value;
      data.materiales_adsl = document.querySelector(
        "input[name='materiales_adsl']"
      ).value;
      data.obv_adsl = document.querySelector("input[name='obv_adsl']").value;
      data.tipoactividad_adsl = document.querySelector(
        "input[name='tipoactividad_adsl']"
      ).value;
      break;
    case "DTH":
      break;
    case "COBRE":
      break;

    case "GPON":
      //   data.georeferencia = document.querySelector(
      //     "input[name='georeferencia']"
      //   ).value;
      break;
  }

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "{{route('registro.store')}}");
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(JSON.stringify(data));
});
