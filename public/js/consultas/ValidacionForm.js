const tecnologia = document.getElementById("tecnologia");
const checkValid = document.querySelectorAll(".checkValid");
const checkError = document.querySelectorAll(".checkError");
const inputs = document.querySelectorAll("input");
// const checkValid1 = document.getElementById("checkValid1");
// const checkError1 = document.getElementById("checkError1");
const regexCoordenadas =
  /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

// Ocultar todos los elementos al principio
checkValid.forEach(function (el) {
  el.style.display = "none";
});
checkError.forEach(function (el) {
  el.style.display = "none";
});

const form = document.getElementById("form1");
const selectElements = form.querySelectorAll("select");

form.addEventListener("submit", function (event) {
  // event.preventDefault();

  const codigo_tecnico = document.getElementById("codigo_tecnico").value;
  const telefono = document.getElementById("telefono").value;
  const tecnico = document.getElementById("tecnico").value;
  const motivo_llamada = document.getElementById("motivo_llamada").value;

  const MotivoConsulta = document.getElementById("MotivoConsulta").value;
  const TipoMotivoConsulta =
    document.getElementById("TipoMotivoConsulta").value;
  const OrdenConsulta = document.getElementById("OrdenConsulta").value;
  const ObvsConsulta = document.getElementById("ObvsConsulta").value;

  if (motivo_llamada === "CONSULTAS") {
    if (
      codigo_tecnico === "" ||
      telefono === "" ||
      tecnico === "" ||
      motivo_llamada === "" ||
      MotivoConsulta === "" ||
      // TipoMotivoConsulta === "" ||
      OrdenConsulta === "" ||
      ObvsConsulta === ""
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

    if (parseInt(OrdenConsulta.length) !== 8) {
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
