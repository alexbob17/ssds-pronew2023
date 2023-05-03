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
  //   console.log("CARGADO FORM REALIZADO");
  form.addEventListener("submit", function (event) {
    // event.preventDefault();
    const regexCoordenadas =
      /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

    const codigo_tecnico = document.getElementById("codigo_tecnico").value;
    const telefono = document.getElementById("telefono").value;
    const tecnico = document.getElementById("tecnico").value;
    const motivo_llamada = document.getElementById("motivo_llamada").value;
    const select_orden = document.getElementById("select_orden").value;
    const dpto_colonia = document.getElementById("dpto_colonia").value;
    switch (
      tecnologia.value // Usamos .value para obtener el valor del campo select
    ) {
      case "COBRE":
        // Validar los campos para DTH

        const tipo_actividadCobre = document.getElementById(
          "tipo_actividadCobre"
        ).value;
        const OrdenLineaCobre =
          document.getElementById("OrdenLineaCobre").value;
        const NumeroCobre = document.getElementById("NumeroCobre").value;
        const GeoreferenciaCobre =
          document.getElementById("GeoreferenciaCobre").value;
        const sap_cobre = document.getElementById("sap_cobre").value;
        const TrabajadoCobre = document.getElementById("TrabajadoCobre").value;
        const ObservacionesCobre =
          document.getElementById("ObservacionesCobre").value;
        const RecibeCobre = document.getElementById("RecibeCobre").value;
        const MaterialesCobre =
          document.getElementById("MaterialesCobre").value;

        if (tipo_actividadCobre === "REALIZADA") {
          // checkValid.style.display = "none";
          // checkError.style.display = "none";
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividadCobre === "" ||
            OrdenLineaCobre === "" ||
            NumeroCobre === "" ||
            GeoreferenciaCobre === "" ||
            sap_cobre === "" ||
            TrabajadoCobre === "" ||
            ObservacionesCobre === "" ||
            RecibeCobre === "" ||
            MaterialesCobre === ""
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

          if (parseInt(OrdenLineaCobre.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "N° Orden Linea debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }
          if (parseInt(NumeroCobre.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "N° Cobre debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          if (!regexCoordenadas.test(GeoreferenciaCobre)) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title:
                "Las coordenadas deben estar en el formato latitud,longitud",
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
