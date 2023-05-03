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

        if (tipo_actividadCobre === "ANULACION") {
          const MotivoAnulada_Cobre = document.getElementById(
            "MotivoAnulada_Cobre"
          ).value;
          const OrdenAnuladaCobre =
            document.getElementById("OrdenAnuladaCobre").value;
          const TrabajadoAnulada_Cobre = document.getElementById(
            "TrabajadoAnulada_Cobre"
          ).value;
          const ComentarioAnulada_Cobre = document.getElementById(
            "ComentarioAnulada_Cobre"
          ).value;
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividadCobre === "" ||
            MotivoAnulada_Cobre === "" ||
            OrdenAnuladaCobre === "" ||
            TrabajadoAnulada_Cobre === "" ||
            ComentarioAnulada_Cobre === ""
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
          } else if (parseInt(OrdenAnuladaCobre.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "N° Orden debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          } else {
            // form.reset();
            // selectElements.forEach((selectElement) => {
            //   selectElement.selectedIndex = -1;
            // });
          }
        }
        break;
    }

    // form.reset();
  });
});
