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

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form1");
  // const selectElements = form.querySelectorAll("select");
  // console.log("CARGADO FORM");
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
      case "DTH":
        // Validar los campos para DTH

        const tipo_actividadDth =
          document.getElementById("tipo_actividadDth").value;

        if (tipo_actividadDth === "OBJETADA") {
          const MotivoObjetada_Dth =
            document.getElementById("MotivoObjetada_Dth").value;
          const OrdenObj_Dth = document.getElementById("OrdenObj_Dth").value;
          const TrabajadoObj_Dth =
            document.getElementById("TrabajadoObj_Dth").value;
          const ComentarioObjetado_Dth = document.getElementById(
            "ComentarioObjetado_Dth"
          ).value;
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividadDth === "" ||
            MotivoObjetada_Dth === "" ||
            OrdenObj_Dth === "" ||
            TrabajadoObj_Dth === "" ||
            ComentarioObjetado_Dth === ""
          ) {
            // checkError.style.display = "block";
            // checkError1.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "LOS CAMPOS NO PUEDEN IR VACIOS",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          if (parseInt(OrdenObj_Dth.length) !== 8) {
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
