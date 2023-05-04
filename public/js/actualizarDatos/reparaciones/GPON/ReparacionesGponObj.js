const tecnologia = document.getElementById("tecnologia");
const checkValid = document.querySelectorAll(".checkValid");
const checkError = document.querySelectorAll(".checkError");
const inputs = document.querySelectorAll("input");
// const checkValid1 = document.getElementById("checkValid1");
// const checkError1 = document.getElementById("checkError1");
const regexCoordenadas =
  /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

$(function () {
  // Initialize Select2 Elements
  $(".select2").select2();
});

fetch("http://localhost/ssd-claroProd/public/Json/Localizaciones.json")
  .then((response) => response.json())
  .then((datos) => {
    var select_dpto = document.getElementById("dpto_colonia");
    for (var i = 0; i < datos.length; i++) {
      var option = document.createElement("option");
      option.value = datos[i].DEPTO + datos[i].COLONIA;
      option.text = datos[i].DEPTO + datos[i].COLONIA;
      select_dpto.add(option);
    }
  });

// const selectElements = form.querySelectorAll("select");

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form1");

  form.addEventListener("submit", function (event) {
    // event.preventDefault();

    const codigo_tecnico = document.getElementById("codigo_tecnico").value;
    const telefono = document.getElementById("telefono").value;
    const tecnico = document.getElementById("tecnico").value;
    const motivo_llamada = document.getElementById("motivo_llamada").value;
    const select_orden = document.getElementById("select_orden").value;
    const dpto_colonia = document.getElementById("dpto_colonia").value;
    switch (
      tecnologia.value // Usamos .value para obtener el valor del campo select
    ) {
      case "GPON":
        const TipoActividadReparacionGpon = document.getElementById(
          "TipoActividadReparacionGpon"
        ).value;

        if (TipoActividadReparacionGpon === "OBJETADA") {
          const MotivoObjetada_Gpon = document.getElementById(
            "MotivoObjetada_Gpon"
          ).value;

          const OrdenObjGpon = document.getElementById("OrdenObjGpon").value;
          const TrabajadoObjetadaGpon = document.getElementById(
            "TrabajadoObjetadaGpon"
          ).value;

          const ComentariosObjGpon =
            document.getElementById("ComentariosObjGpon").value;

          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            TipoActividadReparacionGpon === "" ||
            MotivoObjetada_Gpon === "" ||
            OrdenObjGpon === "" ||
            TrabajadoObjetadaGpon === "" ||
            ComentariosObjGpon === ""
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
          if (parseInt(OrdenObjGpon.length) !== 8) {
            // checkError.style.display = "block";
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
        break;
    }

    // form.reset();
  });
});
