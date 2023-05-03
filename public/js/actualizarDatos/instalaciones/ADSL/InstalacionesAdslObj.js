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
      case "ADSL":
        // Validar los campos para DTH

        const tipo_actividadAdsl =
          document.getElementById("tipo_actividadAdsl").value;

        if (tipo_actividadAdsl === "OBJETADA") {
          const OrdenAdsl_Objetada =
            document.getElementById("OrdenAdsl_Objetada").value;

          const TrabajadoAdslObjetado = document.getElementById(
            "TrabajadoAdslObjetado"
          ).value;
          const ComentariosObjetada_Adsl = document.getElementById(
            "ComentariosObjetada_Adsl"
          ).value;

          const MotivoObjetada_Adsl = document.getElementById(
            "MotivoObjetada_Adsl"
          ).value;

          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            tipo_actividadAdsl === "" ||
            select_orden === "" ||
            OrdenAdsl_Objetada === "" ||
            TrabajadoAdslObjetado === "" ||
            ComentariosObjetada_Adsl === "" ||
            MotivoObjetada_Adsl === ""
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
          if (parseInt(OrdenAdsl_Objetada.length) !== 8) {
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
