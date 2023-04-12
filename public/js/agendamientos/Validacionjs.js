const Agendamiento = document.getElementById("Agendamiento");

const TipoAgendamiento = document.getElementById("TipoAgendamiento");

TipoAgendamiento.disabled = true;
TipoAgendamiento.value = "";

Agendamiento.addEventListener("change", function () {
  if (Agendamiento.value === "POSTVENTAS") {
    TipoAgendamiento.disabled = false;
  } else {
    TipoAgendamiento.disabled = true;
    TipoAgendamiento.value = "";
  }
});

// VALIDACION FORMULARIO

const formAgendamiento = document.getElementById("form1");

formAgendamiento.addEventListener("submit", function (event) {
  // event.preventDefault();

  const codigo_tecnico = document.getElementById("codigo_tecnico").value;
  const telefono = document.getElementById("telefono").value;
  const tecnico = document.getElementById("tecnico").value;
  const motivo_llamada = document.getElementById("motivo_llamada").value;

  const Agendamiento = document.getElementById("Agendamiento").value;
  const TipoAgendamiento = document.getElementById("TipoAgendamiento").value;
  const fecha_registro = document.getElementById("fecha_registro").value;
  const hora_registro = document.getElementById("hora_registro").value;
  const N_Orden = document.getElementById("N_Orden").value;
  const Observaciones = document.getElementById("Observaciones").value;
  const Recibe = document.getElementById("Recibe").value;

  if (motivo_llamada === "AGENDAMIENTOS") {
    if (
      codigo_tecnico === "" ||
      telefono === "" ||
      tecnico === "" ||
      motivo_llamada === "" ||
      Agendamiento === "" ||
      // TipoAgendamiento === "" ||
      fecha_registro === "" ||
      hora_registro === "" ||
      N_Orden === "" ||
      Observaciones === "" ||
      Recibe === ""
    ) {
      Swal.fire({
        icon: "error",
        title: "LOS CAMPOS NO PUEDEN IR VACIOS",
        showConfirmButton: false,
        timer: 1900,
      });
      event.preventDefault();
      return false;
    }

    if (parseInt(N_Orden.length) !== 8) {
      Swal.fire({
        icon: "error",
        title: "N° Orden debe tener 8 digitos",
        showConfirmButton: false,
        timer: 1900,
      });
      event.preventDefault();
      return false;
    }
  }

  // form.reset();
});
