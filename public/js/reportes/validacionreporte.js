const fecha_registro = document.getElementById("fecha_registro");
const motivo_llamada = document.getElementById("motivo_llamada");
const tecnologia = document.getElementById("tecnologia");
const tipo_actividad = document.getElementById("tipo_actividad");
const tipo_postventa = document.getElementById("tipo_postventa");
const usersall = document.getElementById("usersall");
// const optionRefresh = tipo_actividad.querySelector('option[value="REFRESH"]');

tipo_postventa.disabled = true;
tecnologia.disabled = true;
tipo_actividad.disabled = true;

document.addEventListener("DOMContentLoaded", function () {
  const optionHfc = tecnologia.querySelector('option[value="HFC"]');
  const optionGpon = tecnologia.querySelector('option[value="GPON"]');
  const optionAdsl = tecnologia.querySelector('option[value="ADSL"]');
  const optionCobre = tecnologia.querySelector('option[value="COBRE"]');
  const optionDth = tecnologia.querySelector('option[value="DTH"]');
  const optionTodos = tecnologia.querySelector('option[value="TODOS"]');
  const optionRefresh = tipo_actividad.querySelector('option[value="REFRESH"]');
  motivo_llamada.addEventListener("change", function () {
    switch (motivo_llamada.value) {
      case "INSTALACION":
        tecnologia.value = "";
        tecnologia.disabled = false;
        tipo_actividad.disabled = true;
        tipo_postventa.disabled = true;
        tipo_postventa.value = "";
        tipo_actividad.value = "";

        optionHfc.style.display = "block";
        optionGpon.style.display = "block";
        optionAdsl.style.display = "block";
        optionCobre.style.display = "block";
        optionDth.style.display = "block";
        optionTodos.style.display = "block";
        optionRefresh.style.display = "none";

        break;
      case "POSTVENTA":
        tecnologia.disabled = true;
        tipo_postventa.disabled = false;
        tecnologia.value = "";
        tipo_actividad.value = "";
        optionRefresh.style.display = "none";

        break;
      case "REPARACIONES":
        tecnologia.disabled = false;
        tipo_actividad.disabled = true;
        tipo_postventa.disabled = true;
        tipo_postventa.value = "";
        tecnologia.value = "";
        tipo_actividad.value = "";
        // optionRefresh.style.display = "none";

        break;
      case "AGENDAMIENTOS":
        tecnologia.disabled = true;
        tipo_postventa.disabled = true;
        tipo_actividad.disabled = true;
        tipo_postventa.value = "";
        tecnologia.value = "";
        tipo_actividad.value = "";
        optionRefresh.style.display = "none";

        break;
      case "CONSULTAS":
        tecnologia.disabled = true;
        tipo_postventa.disabled = true;
        tipo_actividad.disabled = true;
        tipo_postventa.value = "";
        tecnologia.value = "";
        tipo_actividad.value = "";
        optionRefresh.style.display = "none";

        break;
      default:
        tecnologia.disabled = true;
        tipo_actividad.disabled = true;
        tipo_postventa.disabled = true;
        tipo_postventa.value = "";
        tecnologia.value = "";
        tipo_actividad.value = "";
        optionRefresh.style.display = "none";

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

  const optionRefresh = tipo_actividad.querySelector('option[value="REFRESH"]');

  optionRealizada.style.display = "none";
  optionObjetada.style.display = "none";
  optionTransferida.style.display = "none";
  optionAnulada.style.display = "none";
  optionRefresh.style.display = "none";

  tecnologia.addEventListener("change", function () {
    if (motivo_llamada.value === "INSTALACION") {
      if (tecnologia.value === "COBRE") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "block";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "DTH") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "block";
        optionRefresh.style.display = "block";
      } else if (tecnologia.value === "ADSL") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "none";
        optionAnulada.style.display = "block";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "GPON") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "block";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "HFC") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "block";
        optionRefresh.style.display = "block";
      } else if (tecnologia.value === "TODOS") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "block";
        optionRefresh.style.display = "none";
      }
    } else if (motivo_llamada.value === "REPARACIONES") {
      if (tecnologia.value === "DTH") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "COBRE") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "ADSL") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "GPON") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "HFC") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";

        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
        optionRefresh.style.display = "none";
      } else if (tecnologia.value === "TODOS") {
        tipo_actividad.disabled = false;
        tipo_actividad.value = "";
        ("");
        optionRealizada.style.display = "block";
        optionObjetada.style.display = "block";
        optionTransferida.style.display = "block";
        optionAnulada.style.display = "none";
        optionRefresh.style.display = "none";
      }
    } else {
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const optionHfc = tecnologia.querySelector('option[value="HFC"]');
  const optionGpon = tecnologia.querySelector('option[value="GPON"]');
  const optionAdsl = tecnologia.querySelector('option[value="ADSL"]');
  const optionCobre = tecnologia.querySelector('option[value="COBRE"]');
  const optionDth = tecnologia.querySelector('option[value="DTH"]');
  const optionTodos = tecnologia.querySelector('option[value="TODOS"]');

  optionHfc.style.display = "block";
  optionGpon.style.display = "block";
  optionAdsl.style.display = "block";
  optionCobre.style.display = "block";
  optionDth.style.display = "block";
  optionTodos.style.display = "block";

  tipo_postventa.addEventListener("change", function () {
    if (tipo_postventa.value === "TRASLADO") {
      tecnologia.disabled = false;
      tecnologia.value = "";
      tipo_actividad.value = "";
      optionHfc.style.display = "block";
      optionGpon.style.display = "block";
      optionAdsl.style.display = "block";
      optionCobre.style.display = "block";
      optionDth.style.display = "block";
      optionTodos.style.display = "block";
    } else if (tipo_postventa.value === "CAMBIO NUMERO COBRE") {
      tecnologia.disabled = false;
      tecnologia.value = "";
      tipo_actividad.value = "";

      optionHfc.style.display = "none";
      optionGpon.style.display = "none";
      optionAdsl.style.display = "none";
      optionCobre.style.display = "block";
      optionDth.style.display = "none";
      optionTodos.style.display = "none";
    } else if (tipo_postventa.value === "RECONEXION / RETIRO") {
      tecnologia.disabled = false;
      tecnologia.value = "";
      tipo_actividad.value = "";
      optionHfc.style.display = "block";
      optionGpon.style.display = "none";
      optionAdsl.style.display = "none";
      optionCobre.style.display = "none";
      optionDth.style.display = "block";
      optionTodos.style.display = "block";
    } else if (tipo_postventa.value === "MIGRACION") {
      tecnologia.disabled = false;
      tecnologia.value = "";
      tipo_actividad.value = "";
      optionHfc.style.display = "block";
      optionGpon.style.display = "none";
      optionAdsl.style.display = "none";
      optionCobre.style.display = "none";
      optionDth.style.display = "none";
      optionTodos.style.display = "none";
    } else if (tipo_postventa.value === "CAMBIO DE EQUIPO") {
      tecnologia.disabled = false;
      tecnologia.value = "";
      tipo_actividad.value = "";
      optionHfc.style.display = "block";
      optionGpon.style.display = "block";
      optionAdsl.style.display = "block";
      optionCobre.style.display = "none";
      optionDth.style.display = "block";
      optionTodos.style.display = "block";
    } else if (tipo_postventa.value === "ADICION") {
      tecnologia.disabled = false;
      tecnologia.value = "";
      tipo_actividad.value = "";
      optionHfc.style.display = "block";
      optionGpon.style.display = "block";
      optionAdsl.style.display = "none";
      optionCobre.style.display = "none";
      optionDth.style.display = "block";
      optionTodos.style.display = "block";
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

  const optionRefresh = tipo_actividad.querySelector('option[value="REFRESH"]');

  optionRealizada.style.display = "none";
  optionObjetada.style.display = "none";
  optionTransferida.style.display = "none";
  optionAnulada.style.display = "none";
  optionRefresh.style.display = "none";

  tecnologia.addEventListener("change", function () {
    if (
      tipo_postventa.value === "CAMBIO NUMERO COBRE" &&
      tecnologia.value === "COBRE"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "RECONEXION / RETIRO" &&
      tecnologia.value === "HFC"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "none";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "RECONEXION / RETIRO" &&
      tecnologia.value === "DTH"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "none";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "RECONEXION / RETIRO" &&
      tecnologia.value === "TODOS"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "none";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "MIGRACION" &&
      tecnologia.value === "HFC"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "block";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "CAMBIO DE EQUIPO" &&
      tecnologia.value === "DTH"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "CAMBIO DE EQUIPO" &&
      tecnologia.value === "ADSL"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "CAMBIO DE EQUIPO" &&
      tecnologia.value === "GPON"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "CAMBIO DE EQUIPO" &&
      tecnologia.value === "HFC"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "CAMBIO DE EQUIPO" &&
      tecnologia.value === "TODOS"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "ADICION" &&
      tecnologia.value === "HFC"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "ADICION" &&
      tecnologia.value === "GPON"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";

      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "ADICION" &&
      tecnologia.value === "DTH"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "ADICION" &&
      tecnologia.value === "TODOS"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "TRASLADO" &&
      tecnologia.value === "HFC"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "block";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "TRASLADO" &&
      tecnologia.value === "GPON"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "block";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "TRASLADO" &&
      tecnologia.value === "DTH"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "TRASLADO" &&
      tecnologia.value === "ADSL"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "TRASLADO" &&
      tecnologia.value === "COBRE"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    } else if (
      tipo_postventa.value === "TRASLADO" &&
      tecnologia.value === "TODOS"
    ) {
      tipo_actividad.disabled = false;
      tipo_actividad.value = "";
      optionRealizada.style.display = "block";
      optionObjetada.style.display = "block";
      optionTransferida.style.display = "none";
      optionAnulada.style.display = "block";
    }
  });
});
