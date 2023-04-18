const fecha_registro = document.getElementById("fecha_registro");
const motivo_llamada = document.getElementById("motivo_llamada");
const tecnologia = document.getElementById("tecnologia");
const tipo_actividad = document.getElementById("tipo_actividad");
const tipo_postventa = document.getElementById("tipo_postventa");
const usersall = document.getElementById("usersall");

tipo_postventa.disabled = true;
tecnologia.disabled = true;
tipo_actividad.disabled = true;

document.addEventListener("DOMContentLoaded", function () {
  motivo_llamada.addEventListener("change", function () {
    switch (motivo_llamada.value) {
      case "INSTALACION":
        tecnologia.disabled = false;
        tipo_actividad.disabled = true;
        tipo_postventa.disabled = true;
        tipo_postventa.value = "";
        break;
      case "POSTVENTA":
        tecnologia.disabled = false;
        tipo_postventa.disabled = false;

        break;
      case "REPARACIONES":
        tecnologia.disabled = false;
        tipo_postventa.disabled = true;
        tipo_postventa.value = "";

        break;
      case "AGENDAMIENTOS":
        tecnologia.disabled = true;
        tipo_postventa.disabled = true;
        tipo_actividad.disabled = true;
        tipo_postventa.value = "";

        break;
      case "CONSULTAS":
        tecnologia.disabled = true;
        tipo_postventa.disabled = true;
        tipo_actividad.disabled = true;
        tipo_postventa.value = "";

        break;
      default:
        tecnologia.disabled = true;
        tipo_postventa.disabled = true;
        tipo_postventa.value = "";

        break;
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const optionRealizada = tipo_actividad.querySelector(
    'option[value="REALIZADA"]'
  );
  const optionObjetada = tipo_actividad.querySelector(
    'option[value="OBJETADA"]'
  );
  const optionTransferida = tipo_actividad.querySelector(
    'option[value="TRANSFERIDA"]'
  );
  const optionAnulada = tipo_actividad.querySelector('option[value="ANULADA"]');

  optionRealizada.style.display = "none";
  optionObjetada.style.display = "none";
  optionTransferida.style.display = "none";
  optionAnulada.style.display = "none";
  tecnologia.addEventListener("change", function () {
    if (motivo_llamada.value === "INSTALACION") {
      if (tecnologia.value === "DTH") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "block";
      } else if (tecnologia.value === "COBRE") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "block";
      } else if (tecnologia.value === "ADSL") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "block";
      } else if (tecnologia.value === "GPON") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "block";
      } else if (tecnologia.value === "HFC") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "block";
      } else if (tecnologia.value === "TODOS") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "block";
      }
    } else if (motivo_llamada.value === "POSTVENTA") {
      if (tecnologia.value === "DTH") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "none";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "none";
      }
    } else if (motivo_llamada.value === "REPARACIONES") {
      if (tecnologia.value === "DTH") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
      } else if (tecnologia.value === "COBRE") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
      } else if (tecnologia.value === "ADSL") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
      } else if (tecnologia.value === "GPON") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
      } else if (tecnologia.value === "HFC") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
      } else if (tecnologia.value === "TODOS") {
        tipo_actividad.disabled = false;

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
      }
    } else {
    }
  });
});
