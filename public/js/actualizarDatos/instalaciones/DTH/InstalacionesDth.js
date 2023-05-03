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
  console.log("CARGADO FORM REALIZADO");
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
      case "DTH":
        // Validar los campos para DTH

        const tipo_actividadDth =
          document.getElementById("tipo_actividadDth").value;
        const ordenTv_Dth = document.getElementById("ordenTv_Dth").value;
        const SyrengDth = document.getElementById("SyrengDth").value;
        const sap_dth = document.getElementById("sap_dth").value;
        const GeoreferenciaDth =
          document.getElementById("GeoreferenciaDth").value;
        const TrabajadoDth = document.getElementById("TrabajadoDth").value;
        const SmarcardDth1 = document.getElementById("SmarcardDth1").value;
        const SmarcardDth2 = document.getElementById("SmarcardDth2").value;
        const SmarcardDth3 = document.getElementById("SmarcardDth3").value;
        const SmarcardDth4 = document.getElementById("SmarcardDth4").value;
        const SmarcardDth5 = document.getElementById("SmarcardDth5").value;
        const StbDth1 = document.getElementById("StbDth1").value;
        const StbDth2 = document.getElementById("StbDth2").value;
        const StbDth3 = document.getElementById("StbDth3").value;
        const StbDth4 = document.getElementById("StbDth4").value;
        const StbDth5 = document.getElementById("StbDth5").value;
        const ObservacionesDth =
          document.getElementById("ObservacionesDth").value;
        const RecibeDth = document.getElementById("RecibeDth").value;
        const MaterialesDth = document.getElementById("MaterialesDth").value;

        if (tipo_actividadDth === "REALIZADA") {
          // checkValid.style.display = "none";
          // checkError.style.display = "none";
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividadDth === "" ||
            ordenTv_Dth === "" ||
            SyrengDth === "" ||
            GeoreferenciaDth === "" ||
            sap_dth === "" ||
            TrabajadoDth === "" ||
            // SmarcardDth1 === "" ||
            // StbDth1 === "" ||
            ObservacionesDth === "" ||
            RecibeDth === "" ||
            MaterialesDth === ""
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

          if (parseInt(ordenTv_Dth.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "N° Orden Tv debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }
          if (parseInt(SyrengDth.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "N° Syreng debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          if (!regexCoordenadas.test(GeoreferenciaDth)) {
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

          let errorMensajeSmarcard = "";

          switch (tecnologia.value) {
            case "DTH":
              if (
                SmarcardDth1 === "" &&
                SmarcardDth2 === "" &&
                SmarcardDth3 === "" &&
                SmarcardDth4 === "" &&
                SmarcardDth5 === ""
              ) {
                errorMensajeSmarcard = "Debes ingresar al menos un N° SMARCARD";
              }
              if (SmarcardDth1 !== "" && parseInt(SmarcardDth1.length) !== 10) {
                errorMensajeSmarcard =
                  "Debes ingresar 10 digitos en N° SMARCARD 1.";
              }
              if (SmarcardDth2 !== "" && parseInt(SmarcardDth2.length) !== 10) {
                errorMensajeSmarcard =
                  "Debes ingresar 10 digitos en N° SMARCARD 2.";
              }
              if (SmarcardDth3 !== "" && parseInt(SmarcardDth3.length) !== 10) {
                errorMensajeSmarcard =
                  "Debes ingresar 10 digitos en N° SMARCARD 3 .";
              }
              if (SmarcardDth4 !== "" && parseInt(SmarcardDth4.length) !== 10) {
                errorMensajeSmarcard =
                  "Debes ingresar 10 digitos en N° SMARCARD 4.";
              }
              if (SmarcardDth5 !== "" && parseInt(SmarcardDth5.length) !== 10) {
                errorMensajeSmarcard =
                  "Debes ingresar 10 digitos en N° SMARCARD 5.";
              }

              break;
          }

          if (errorMensajeSmarcard !== "") {
            Swal.fire({
              icon: "error",
              title: errorMensajeSmarcard,
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          let errorMensajeStb = "";

          switch (tecnologia.value) {
            case "DTH":
              if (
                StbDth1 === "" &&
                StbDth2 === "" &&
                StbDth3 === "" &&
                StbDth4 === "" &&
                StbDth5 === ""
              ) {
                errorMensajeStb = "Debes ingresar al menos un N° STB";
              }
              if (StbDth1 !== "" && parseInt(StbDth1.length) !== 12) {
                errorMensajeStb = "Debes ingresar 12 digitos en N° STB 1.";
              }
              if (StbDth2 !== "" && parseInt(StbDth2.length) !== 12) {
                errorMensajeStb = "Debes ingresar 12 digitos en N° STB 2.";
              }
              if (StbDth3 !== "" && parseInt(StbDth3.length) !== 12) {
                errorMensajeStb = "Debes ingresar 12 digitos en N° STB 3 .";
              }
              if (StbDth4 !== "" && parseInt(StbDth4.length) !== 12) {
                errorMensajeStb = "Debes ingresar 12 digitos en N° STB 4.";
              }
              if (StbDth5 !== "" && parseInt(StbDth5.length) !== 12) {
                errorMensajeStb = "Debes ingresar 12 digitos en N° STB 5.";
              }

              break;
          }

          if (errorMensajeStb !== "") {
            Swal.fire({
              icon: "error",
              title: errorMensajeStb,
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
