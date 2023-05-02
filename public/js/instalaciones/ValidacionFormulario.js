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

// console.log("Orden Internet:", document.getElementById("OrdenLinea_Gpon"));

// const selectElements = form.querySelectorAll("select");

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
    case "HFC":
      // Validar los campos para HFC
      const tipo_actividad = document.getElementById("tipo_actividad").value;
      const orden_linea_hfc = document.getElementById("orden_linea_hfc").value;
      const orden_tv_hfc = document.getElementById("orden_tv_hfc").value;
      const orden_internet_hfc =
        document.getElementById("orden_internet_hfc").value;
      const equipostv1 = document.getElementById("equipostv1").value;
      const equipostv2 = document.getElementById("equipostv2").value;
      const equipostv3 = document.getElementById("equipostv3").value;
      const equipostv4 = document.getElementById("equipostv4").value;
      const equipostv5 = document.getElementById("equipostv5").value;
      const syrengHfc = document.getElementById("syrengHfc").value;
      const sapHfc = document.getElementById("sapHfc").value;
      const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc").value;
      const numeroVoip_hfc = document.getElementById("numeroVoip_hfc").value;
      const GeorefHfc = document.getElementById("GeorefHfc").value;
      const TrabajadoHfc = document.getElementById("TrabajadoHfc").value;
      const ObservacionesHfc =
        document.getElementById("ObservacionesHfc").value;
      const RecibeHfc = document.getElementById("RecibeHfc").value;
      const NodoHfc = document.getElementById("NodoHfc").value;
      const TapHfc = document.getElementById("TapHfc").value;
      const PosicionHfc = document.getElementById("PosicionHfc").value;
      const MaterialesHfc = document.getElementById("MaterialesHfc").value;

      if (tipo_actividad === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividad === "" ||
          // orden_linea_hfc === "" ||
          // orden_tv_hfc === "" ||
          // orden_internet_hfc === "" ||
          // equipostv1 === "" ||
          // equipostv2 === "" ||
          // equipostv3 === "" ||
          // equipostv4 === "" ||
          // equipostv5 === "" ||
          syrengHfc === "" ||
          // sapHfc === "" ||
          // EquipoModem_Hfc === "" ||
          // numeroVoip_hfc === "" ||
          GeorefHfc === "" ||
          TrabajadoHfc === "" ||
          ObservacionesHfc === "" ||
          RecibeHfc === "" ||
          NodoHfc === "" ||
          TapHfc === "" ||
          PosicionHfc === "" ||
          MaterialesHfc === ""
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

        let errorMensaje = "";

        // VALIDAR POR TIPO DE ORDEN
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje =
                "Debes ingresar el N° Orden Internet / N° Orden TV.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Internet / N° Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden linea debe tener 8 dígitos.";
            }
            break;
          case "TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Linea.";
            }
            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;

          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden TV / N° Internet.";
            }
            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden TV debe tener 8 dígitos.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;

          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden TV debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje =
                "Debes ingresar el N° de Internet / N° Orden Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensaje = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Linea";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
        }
        if (errorMensaje !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (!regexCoordenadas.test(GeorefHfc)) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title:
              "Las coordenadas deben estar en el formato latitud, longitud",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        // VALIDAR POR EQUIPO DE TV

        let errorMensajeTv = "";

        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3 .";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }

            break;
          case "DOBLE - TV + INTERNET":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            break;
          case "TV - BASICO INDIVIDUAL":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }

            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }

            break;
          case "LINEA INDIVIDUAL":
            break;
          case "INTERNET INDIVIDUAL":
            break;
          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }
            break;

          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }
            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            if (
              equipostv1 === "" &&
              equipostv2 === "" &&
              equipostv3 === "" &&
              equipostv4 === "" &&
              equipostv5 === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un Equipo TV";
            }
            if (equipostv1 !== "" && parseInt(equipostv1.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
            }
            if (equipostv2 !== "" && parseInt(equipostv2.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
            }
            if (equipostv3 !== "" && parseInt(equipostv3.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3.";
            }
            if (equipostv4 !== "" && parseInt(equipostv4.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
            }
            if (equipostv5 !== "" && parseInt(equipostv5.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
            }

            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            break;
        }

        if (errorMensajeTv !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeTv,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        // VALIDAR POR EQUIPOMODEM ETC
        let errorMensaje3 = "";

        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (
              EquipoModem_Hfc !== "" &&
              !/^[0-9]+$/.test(EquipoModem_Hfc) &&
              EquipoModem_Hfc.length !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            if (numeroVoip_hfc === "") {
              errorMensaje3 = "Debes ingresar el Numero Voip";
            }
            if (
              numeroVoip_hfc !== "" &&
              parseInt(numeroVoip_hfc.length) !== 8
            ) {
              errorMensaje3 = "Debes ingresar 8 digitos en Numero Voip.";
            }
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "DOBLE - TV + INTERNET":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (
              EquipoModem_Hfc !== "" &&
              parseInt(EquipoModem_Hfc.length) !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "DOBLE - INTERNET + LINEA":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (
              EquipoModem_Hfc !== "" &&
              parseInt(EquipoModem_Hfc.length) !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            if (numeroVoip_hfc === "") {
              errorMensaje3 = "Debes ingresar el Numero Voip";
            }
            if (
              numeroVoip_hfc !== "" &&
              parseInt(numeroVoip_hfc.length) !== 8
            ) {
              errorMensaje3 = "Debes ingresar 8 digitos Numero Voip.";
            }
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "TV - BASICO INDIVIDUAL":
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "LINEA INDIVIDUAL":
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "LINEA INDIVIDUAL":
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            if (
              EquipoModem_Hfc !== "" &&
              parseInt(EquipoModem_Hfc.length) !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            break;
          case "LINEA INDIVIDUAL":
            if (numeroVoip_hfc === "") {
              errorMensaje3 = "Debes ingresar el Numero Voip";
            }
            if (sapHfc === "") {
              errorMensaje3 = "Debes ingresar el SAP";
            }
            if (
              numeroVoip_hfc !== "" &&
              parseInt(numeroVoip_hfc.length) !== 8
            ) {
              errorMensaje3 = "Debes ingresar 8 digitos en Numero Voip.";
            }
            break;
          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (
              EquipoModem_Hfc !== "" &&
              parseInt(EquipoModem_Hfc.length) !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            break;
          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (
              EquipoModem_Hfc !== "" &&
              parseInt(EquipoModem_Hfc.length) !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            if (numeroVoip_hfc === "") {
              errorMensaje3 = "Debes ingresar el Numero Voip";
            }
            if (
              numeroVoip_hfc !== "" &&
              parseInt(numeroVoip_hfc.length) !== 8
            ) {
              errorMensaje3 = "Debes ingresar 8 digitos en Numero Voip.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (EquipoModem_Hfc === "") {
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (
              EquipoModem_Hfc !== "" &&
              parseInt(EquipoModem_Hfc.length) !== 16
            ) {
              errorMensaje3 = "Debes ingresar 16 digitos en Equipo Modem.";
            }
            if (numeroVoip_hfc === "") {
              errorMensaje3 = "Debes ingresar el Numero Voip";
            }
            if (
              numeroVoip_hfc !== "" &&
              parseInt(numeroVoip_hfc.length) !== 8
            ) {
              errorMensaje3 = "Debes ingresar 8 digitos en Numero Voip.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            break;
        }

        if (errorMensaje3 !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje3,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (parseInt(syrengHfc.length) !== 8) {
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
      } else if (tipo_actividad === "OBJETADA") {
        const MotivoObjetada_Hfc =
          document.getElementById("MotivoObjetada_Hfc").value;
        const TrabajadoObjetadaHfc = document.getElementById(
          "TrabajadoObjetadaHfc"
        ).value;
        const ComentariosObjetados_Hfc = document.getElementById(
          "ComentariosObjetados_Hfc"
        ).value;

        if (
          (codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividad === "" ||
            // orden_tv_hfc === "" ||
            // orden_internet_hfc === "" ||
            // orden_linea_hfc === "" ||
            MotivoObjetada_Hfc === "",
          TrabajadoObjetadaHfc === "" || ComentariosObjetados_Hfc === "")
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

        let errorMensajeObjetada = "";

        // VALIDAR POR TIPO DE ORDEN
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeObjetada = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada =
                "Debes ingresar el N° Orden Internet / N° Orden TV.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada =
                "Debes ingresar el N° Orden Internet / N° Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeObjetada = "El N° Orden linea debe tener 8 dígitos.";
            }
            break;
          case "TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° Orden Linea.";
            }
            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeObjetada = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° Internet.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada =
                "Debes ingresar el N° Orden TV / N° Internet.";
            }
            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden TV debe tener 8 dígitos.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;

          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden TV debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeObjetada = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada =
                "Debes ingresar el N° de Internet / N° Orden Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeObjetada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeObjetada = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeObjetada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeObjetada = "Debes ingresar el N° Orden Linea";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeObjetada = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
        }

        if (errorMensajeObjetada !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeObjetada,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividad === "TRANSFERIDA") {
        const ComentariosTransferida_Hfc = document.getElementById(
          "ComentariosTransferida_Hfc"
        ).value;
        const TrabajadoTransferido_Hfc = document.getElementById(
          "TrabajadoTransferido_Hfc"
        ).value;
        const MotivoTransferidoHfc = document.getElementById(
          "MotivoTransferidoHfc"
        ).value;

        if (
          (codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividad === "" ||
            // orden_tv_hfc === "" ||
            // orden_internet_hfc === "" ||
            // orden_linea_hfc === "" ||
            MotivoTransferidoHfc === "",
          TrabajadoTransferido_Hfc === "" || ComentariosTransferida_Hfc === "")
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

        let errorMensajeTransferida = "";

        // VALIDAR POR TIPO DE ORDEN
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida =
                "Debes ingresar el N° Orden Internet / N° Orden TV.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida =
                "Debes ingresar el N° Orden Internet / N° Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden linea debe tener 8 dígitos.";
            }
            break;
          case "TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° Orden Linea.";
            }
            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° Internet.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida =
                "Debes ingresar el N° Orden TV / N° Internet.";
            }
            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden TV debe tener 8 dígitos.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;

          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden TV debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida =
                "Debes ingresar el N° de Internet / N° Orden Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeTransferida = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeTransferida = "Debes ingresar el N° Orden Linea";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeTransferida =
                "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
        }

        if (errorMensajeTransferida !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeTransferida,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividad === "ANULACION") {
        const MotivoAnulada_Hfc =
          document.getElementById("MotivoAnulada_Hfc").value;
        const TrabajadoAnulada_Hfc = document.getElementById(
          "TrabajadoAnulada_Hfc"
        ).value;
        const ComentarioAnulada_Hfc = document.getElementById(
          "ComentarioAnulada_Hfc"
        ).value;

        if (
          (codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividad === "" ||
            // orden_tv_hfc === "" ||
            // orden_internet_hfc === "" ||
            // orden_linea_hfc === "" ||
            MotivoAnulada_Hfc === "",
          TrabajadoAnulada_Hfc === "" || ComentarioAnulada_Hfc === "")
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

        let errorMensajeHfcAnulada = "";

        // VALIDAR POR TIPO DE ORDEN
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden Internet / N° Orden TV.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden Internet / N° Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden linea debe tener 8 dígitos.";
            }
            break;
          case "TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° Orden Linea.";
            }
            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° Internet.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden TV / N° Internet.";
            }
            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;

          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° de Internet / N° Orden Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° Orden Linea";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
        }

        if (errorMensajeHfcAnulada !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeHfcAnulada,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividad === "REFRESH") {
        const refreshSelect = document.getElementById("refreshSelect").value;

        const ComentarioRefresh_Hfc = document.getElementById(
          "ComentarioRefresh_Hfc"
        ).value;

        if (
          (codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            dpto_colonia === "" ||
            select_orden === "" ||
            tipo_actividad === "" ||
            orden_tv_hfc === "" ||
            orden_internet_hfc === "" ||
            // orden_linea_hfc === "" ||
            refreshSelect === "",
          ComentarioRefresh_Hfc === "")
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

        let errorMensajeHfcAnulada = "";

        // VALIDAR POR TIPO DE ORDEN
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden Internet / N° Orden TV.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden Internet / N° Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden linea debe tener 8 dígitos.";
            }
            break;
          case "TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° Orden Linea.";
            }
            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° Internet.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;
          case "REFRESH":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden Internet / N° Orden TV.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -DOBLE - TV + INTERNET":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° Orden TV / N° Internet.";
            }
            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }
            break;

          case "REACTIVACION - INSTALACION DE CLARO HOGAR":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -DOBLE - INTERNET + LINEA":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada =
                "Debes ingresar el N° de Internet / N° Orden Linea.";
            }
            if (
              orden_internet_hfc !== "" &&
              parseInt(orden_internet_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "REACTIVACION -TV - BASICO INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -TV - DIGITAL INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° TV";
            }

            if (orden_tv_hfc !== "" && parseInt(orden_tv_hfc.length) !== 8) {
              errorMensajeHfcAnulada = "El N° Orden TV debe tener 8 dígitos.";
            }

            break;
          case "REACTIVACION -LINEA INDIVIDUAL":
            if (
              orden_internet_hfc.trim() === "" &&
              orden_tv_hfc.trim() === "" &&
              orden_linea_hfc.trim() === ""
            ) {
              errorMensajeHfcAnulada = "Debes ingresar el N° Orden Linea";
            }

            if (
              orden_linea_hfc !== "" &&
              parseInt(orden_linea_hfc.length) !== 8
            ) {
              errorMensajeHfcAnulada =
                "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
        }

        if (errorMensajeHfcAnulada !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeHfcAnulada,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }

      break;
    case "GPON":
      // Validar los campos para GPON
      const tipo_actividadGpon =
        document.getElementById("tipo_actividadGpon").value;
      const OrdenInternet_Gpon =
        document.getElementById("OrdenInternet_Gpon").value;
      const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon").value;
      const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon").value;
      const equipotv1Gpon = document.getElementById("equipotv1Gpon").value;
      const equipotv2Gpon = document.getElementById("equipotv2Gpon").value;
      const equipotv3Gpon = document.getElementById("equipostv3Gpon").value;
      const equipotv4Gpon = document.getElementById("equipostv4Gpon").value;
      const equipotv5Gpon = document.getElementById("equipostv5Gpon").value;
      const EqModenGpon = document.getElementById("EqModenGpon").value;
      const GeoreferenciaGpon =
        document.getElementById("GeoreferenciaGpon").value;
      const SapGpon = document.getElementById("SapGpon").value;
      const NumeroGpon = document.getElementById("NumeroGpon").value;
      const TrabajadoGpon = document.getElementById("TrabajadoGpon").value;
      const ObservacionesGpon =
        document.getElementById("ObservacionesGpon").value;
      const RecibeGpon = document.getElementById("RecibeGpon").value;
      const NodoGpon = document.getElementById("NodoGpon").value;
      const CajaGpon = document.getElementById("CajaGpon").value;
      const PuertoGpon = document.getElementById("PuertoGpon").value;
      const MaterialesRedGpon =
        document.getElementById("MaterialesRedGpon").value;

      if (tipo_actividadGpon === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadGpon === "" ||
          // OrdenInternet_Gpon === "" ||
          // OrdenTv_Gpon === "" ||
          // OrdenLinea_Gpon === "" ||
          // equipotv1Gpon === "" ||
          // equipotv2Gpon === "" ||
          // equipotv3Gpon === "" ||
          // equipotv4Gpon === "" ||
          // equipotv5Gpon === "" ||
          // EqModenGpon === "" ||
          GeoreferenciaGpon === "" ||
          SapGpon === "" ||
          // NumeroGpon === "" ||
          TrabajadoGpon === "" ||
          ObservacionesGpon === "" ||
          RecibeGpon === "" ||
          NodoGpon === "" ||
          CajaGpon === "" ||
          PuertoGpon === "" ||
          MaterialesRedGpon === ""
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

        let errorMensaje = "";
        let errorMensajeTv = "";
        let errorMensaje3 = "";

        // Validar si se seleccionó alguna opción válida
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + IPTV":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet / N° IPTV.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet / N° Linea.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "DOBLE - IPTV + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° IPTV / N° Linea.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Internet";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Linea.";
            }
            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "IPTV INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden IPTV.";
            }
            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }
            break;
        }

        if (errorMensaje !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (!regexCoordenadas.test(GeoreferenciaGpon)) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "Las coordenadas deben estar en el formato latitud,longitud",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              equipotv1Gpon === "" &&
              equipotv2Gpon === "" &&
              equipotv3Gpon === "" &&
              equipotv4Gpon === "" &&
              equipotv5Gpon === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un equipo";
            }
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv5.";
            }

            break;
          case "DOBLE - INTERNET + IPTV":
            if (
              equipotv1Gpon === "" &&
              equipotv2Gpon === "" &&
              equipotv3Gpon === "" &&
              equipotv4Gpon === "" &&
              equipotv5Gpon === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un equipo";
            }
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv5.";
            }
            break;
          case "DOBLE - INTERNET + LINEA":
            break;
          case "DOBLE - IPTV + LINEA":
            if (
              equipotv1Gpon === "" &&
              equipotv2Gpon === "" &&
              equipotv3Gpon === "" &&
              equipotv4Gpon === "" &&
              equipotv5Gpon === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un equipo";
            }
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv5.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            break;
          case "LINEA INDIVIDUAL":
            break;
          case "IPTV INDIVIDUAL":
            if (
              equipotv1Gpon === "" &&
              equipotv2Gpon === "" &&
              equipotv3Gpon === "" &&
              equipotv4Gpon === "" &&
              equipotv5Gpon === ""
            ) {
              errorMensajeTv = "Debes ingresar al menos un equipo";
            }
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 12) {
              errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv5.";
            }
            break;
        }

        if (errorMensajeTv !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeTv,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el N° Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos N° Equipo Modem.";
            }
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el  N° Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos  N° Gpon.";
            }
            break;
          case "DOBLE - INTERNET + IPTV":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el  N° Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos N° Equipo Modem.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos  N° Equipo Modem.";
            }
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el  N° Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos  N° Gpon.";
            }
            break;
          case "DOBLE - IPTV + LINEA":
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el N° Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos N° Gpon.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos N° Equipo Modem.";
            }
            break;
          case "LINEA INDIVIDUAL":
            break;
          case "IPTV INDIVIDUAL":
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el N° Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos N° Gpon.";
            }
            break;
        }

        if (errorMensaje3 !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje3,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividadGpon === "OBJETADA") {
        const MotivoObjetado_Gpon = document.getElementById(
          "MotivoObjetado_Gpon"
        ).value;
        const TrabajadoGpon_Objetado = document.getElementById(
          "TrabajadoGpon_Objetado"
        ).value;
        const ObsGpon_Objetada =
          document.getElementById("ObsGpon_Objetada").value;
        const ComentariosGpon_Objetada = document.getElementById(
          "ComentariosGpon_Objetada"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadGpon === "" ||
          // OrdenInternet_Gpon === "" ||
          // OrdenTv_Gpon === "" ||
          // OrdenLinea_Gpon === "" ||
          MotivoObjetado_Gpon === "" ||
          TrabajadoGpon_Objetado === "" ||
          ObsGpon_Objetada === "" ||
          ComentariosGpon_Objetada === ""
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

        let errorMensaje = "";

        // Validar si se seleccionó alguna opción válida
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + IPTV":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet / N° IPTV.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet / N° Linea.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "DOBLE - IPTV + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° IPTV / N° Linea.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Internet";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Linea.";
            }
            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "IPTV INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden IPTV.";
            }
            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }
            break;
        }

        if (errorMensaje !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividadGpon === "TRANSFERIDA") {
        const TrabajadoTransferido_Gpon = document.getElementById(
          "TrabajadoTransferido_Gpon"
        ).value;
        const MotivoTransferidoGpon = document.getElementById(
          "MotivoTransferidoGpon"
        ).value;
        const ComentarioTransferido_Gpon = document.getElementById(
          "ComentarioTransferido_Gpon"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadGpon === "" ||
          // OrdenInternet_Gpon === "" ||
          // OrdenTv_Gpon === "" ||
          // OrdenLinea_Gpon === "" ||
          MotivoTransferidoGpon === "" ||
          TrabajadoTransferido_Gpon === "" ||
          ComentarioTransferido_Gpon === ""
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

        let errorMensaje = "";

        // Validar si se seleccionó alguna opción válida
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + IPTV":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet / N° IPTV.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet / N° Linea.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "DOBLE - IPTV + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° IPTV / N° Linea.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Internet";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Internet debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden Linea.";
            }
            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "IPTV INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Orden IPTV.";
            }
            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El N° Orden Tv debe tener 8 dígitos.";
            }
            break;
        }

        if (errorMensaje !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensaje,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividadGpon === "ANULACION") {
        const MotivoAnulada_Gpon =
          document.getElementById("MotivoAnulada_Gpon").value;
        const TrabajadoAnulada_Gpon = document.getElementById(
          "TrabajadoAnulada_Gpon"
        ).value;
        const ComentarioAnulada_Gpon = document.getElementById(
          "ComentarioAnulada_Gpon"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadGpon === "" ||
          // OrdenInternet_Gpon === "" ||
          // OrdenTv_Gpon === "" ||
          // OrdenLinea_Gpon === "" ||
          MotivoAnulada_Gpon === "" ||
          TrabajadoAnulada_Gpon === "" ||
          ComentarioAnulada_Gpon === ""
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

        let errorMensajeGpon = "";

        // Validar si se seleccionó alguna opción válida
        switch (select_orden) {
          case "INSTALACION DE CLARO HOGAR":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° de las 3 orden.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensajeGpon = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Linea debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + IPTV":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° Internet / N° IPTV.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensajeGpon = "El N° Orden Tv debe tener 8 dígitos.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° Internet / N° Linea.";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Internet debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "DOBLE - IPTV + LINEA":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° IPTV / N° Linea.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensajeGpon = "El N° Orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° Orden Internet";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Internet debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° Orden Linea.";
            }
            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensajeGpon = "El N° Orden Linea debe tener 8 dígitos.";
            }
            break;
          case "IPTV INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensajeGpon = "Debes ingresar el N° Orden IPTV.";
            }
            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensajeGpon = "El N° Orden Tv debe tener 8 dígitos.";
            }
            break;
        }

        if (errorMensajeGpon !== "") {
          Swal.fire({
            icon: "error",
            title: errorMensajeGpon,
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }

      break;
    case "COBRE":
      // Validar los campos para COBRE
      const tipo_actividadCobre = document.getElementById(
        "tipo_actividadCobre"
      ).value;
      const OrdenLineaCobre = document.getElementById("OrdenLineaCobre").value;
      const NumeroCobre = document.getElementById("NumeroCobre").value;
      const GeoreferenciaCobre =
        document.getElementById("GeoreferenciaCobre").value;
      const sap_cobre = document.getElementById("sap_cobre").value;
      const TrabajadoCobre = document.getElementById("TrabajadoCobre").value;
      const ObservacionesCobre =
        document.getElementById("ObservacionesCobre").value;
      const RecibeCobre = document.getElementById("RecibeCobre").value;
      const MaterialesCobre = document.getElementById("MaterialesCobre").value;

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
            title: "Las coordenadas deben estar en el formato latitud,longitud",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividadCobre === "OBJETADA") {
        const MotivoObjetada_Cobre = document.getElementById(
          "MotivoObjetada_Cobre"
        ).value;
        const OrdenCobre_Objetada = document.getElementById(
          "OrdenCobre_Objetada"
        ).value;
        const TrabajadoCobre_Objetado = document.getElementById(
          "TrabajadoCobre_Objetado"
        ).value;
        const ComentariosCobre_Objetados = document.getElementById(
          "ComentariosCobre_Objetados"
        ).value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadCobre === "" ||
          MotivoObjetada_Cobre === "" ||
          OrdenCobre_Objetada === "" ||
          TrabajadoCobre_Objetado === "" ||
          ComentariosCobre_Objetados === ""
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
        if (parseInt(OrdenCobre_Objetada.length) !== 8) {
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
      } else if (tipo_actividadCobre === "ANULACION") {
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
            title: "Las coordenadas deben estar en el formato latitud,longitud",
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
      } else if (tipo_actividadDth === "OBJETADA") {
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
      } else if (tipo_actividadDth === "ANULACION") {
        const MotivoAnulada_Dth =
          document.getElementById("MotivoAnulada_Dth").value;
        const OrdenAnulada_Dth =
          document.getElementById("OrdenAnulada_Dth").value;
        const TrabajadoAnulada_Dth = document.getElementById(
          "TrabajadoAnulada_Dth"
        ).value;
        const ComentarioAnulada_Dth = document.getElementById(
          "ComentarioAnulada_Dth"
        ).value;
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadDth === "" ||
          MotivoAnulada_Dth === "" ||
          OrdenAnulada_Dth === "" ||
          TrabajadoAnulada_Dth === "" ||
          ComentarioAnulada_Dth === ""
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
        } else if (parseInt(OrdenAnulada_Dth.length) !== 8) {
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
      } else if (tipo_actividadDth === "REFRESH") {
        const refreshSelectDth =
          document.getElementById("refreshSelectDth").value;
        const ComentarioRefresh_Dth = document.getElementById(
          "ComentarioRefresh_Dth"
        ).value;
        const NordenRefresh = document.getElementById("NordenRefresh").value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadDth === "" ||
          refreshSelectDth === "" ||
          NordenRefresh === "" ||
          ComentarioRefresh_Dth === ""
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

        if (parseInt(NordenRefresh.length) !== 8) {
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
    case "ADSL":
      const tipo_actividadAdsl =
        document.getElementById("tipo_actividadAdsl").value;

      const orden_internetAdsl = document.getElementById(
        "orden_internet_adsl"
      ).value;
      const GeoRefAdsl = document.getElementById("Georeferencia_Adsl").value;
      const trabajado_adsl = document.getElementById("TrabajadoAdsl").value;
      const obv_adsl = document.getElementById("Obvservaciones_Adsl").value;
      const Recibe_adsl = document.getElementById("Recibe_Adsl").value;
      const materialesAdsl = document.getElementById("Materiales_Adsl").value;

      if (tipo_actividadAdsl === "REALIZADA") {
        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          tipo_actividadAdsl === "" ||
          orden_internetAdsl === "" ||
          GeoRefAdsl === "" ||
          trabajado_adsl === "" ||
          obv_adsl === "" ||
          Recibe_adsl === "" ||
          materialesAdsl === "" ||
          select_orden === ""
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

        if (parseInt(orden_internetAdsl.length) !== 8) {
          Swal.fire({
            icon: "error",
            title: "N° Orden debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (!regexCoordenadas.test(GeoRefAdsl)) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "Las coordenadas deben estar en el formato latitud,longitud",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      } else if (tipo_actividadAdsl === "OBJETADA") {
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
      } else if (tipo_actividadAdsl === "ANULACION") {
        const OrdenAnuladaAdsl =
          document.getElementById("OrdenAnuladaAdsl").value;

        const TrabajadoAnulada_Adsl = document.getElementById(
          "TrabajadoAnulada_Adsl"
        ).value;
        const ComentarioAnulada_Adsl = document.getElementById(
          "ComentarioAnulada_Adsl"
        ).value;

        const MotivoAnulada_Adsl =
          document.getElementById("MotivoAnulada_Adsl").value;

        if (
          codigo_tecnico === "" ||
          telefono === "" ||
          tecnico === "" ||
          motivo_llamada === "" ||
          dpto_colonia === "" ||
          select_orden === "" ||
          tipo_actividadAdsl === "" ||
          OrdenAnuladaAdsl === "" ||
          TrabajadoAnulada_Adsl === "" ||
          ComentarioAnulada_Adsl === "" ||
          MotivoAnulada_Adsl === ""
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

        if (parseInt(OrdenAnuladaAdsl.length) !== 8) {
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

// VALIDACION POR TIPO DE ORDEN

document.addEventListener("DOMContentLoaded", function () {
  const select_orden = document.getElementById("select_orden");
  const OrdenInternet_Gpon = document.getElementById("OrdenInternet_Gpon");
  const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon");
  const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon");
  const tecnologia = document.getElementById("tecnologia");

  select_orden.addEventListener("change", function () {
    if (tecnologia.value === "GPON") {
      if (select_orden.value === "INSTALACION DE CLARO HOGAR") {
        OrdenInternet_Gpon.required = true;
        OrdenTv_Gpon.required = true;
        OrdenLinea_Gpon.required = true;
      } else if (select_orden.value === "DOBLE - IPTV + LINEA") {
        OrdenInternet_Gpon.required = false;
        OrdenTv_Gpon.required = true;
        OrdenLinea_Gpon.required = true;
      } else if (select_orden.value === "DOBLE - INTERNET + IPTV") {
        OrdenInternet_Gpon.required = true;
        OrdenTv_Gpon.required = true;
        OrdenLinea_Gpon.required = false;
      } else if (select_orden.value === "DOBLE - INTERNET + LINEA") {
        OrdenInternet_Gpon.required = true;
        OrdenTv_Gpon.required = false;
        OrdenLinea_Gpon.required = true;
      } else if (select_orden.value === "INTERNET INDIVIDUAL") {
        OrdenInternet_Gpon.required = true;
        OrdenTv_Gpon.required = false;
        OrdenLinea_Gpon.required = false;
      } else if (select_orden.value === "IPTV INDIVIDUAL") {
        OrdenInternet_Gpon.required = false;
        OrdenTv_Gpon.required = true;
        OrdenLinea_Gpon.required = false;
      } else if (select_orden.value === "LINEA INDIVIDUAL") {
        OrdenInternet_Gpon.required = false;
        OrdenTv_Gpon.required = false;
        OrdenLinea_Gpon.required = true;
      } else {
        OrdenInternet_Gpon.required = false;
        OrdenTv_Gpon.required = false;
        OrdenLinea_Gpon.required = false;
      }
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const select_orden = document.getElementById("select_orden");

  const orden_internet_hfc = document.getElementById("orden_internet_hfc");
  const orden_tv_hfc = document.getElementById("orden_tv_hfc");
  const orden_linea_hfc = document.getElementById("orden_linea_hfc");

  const tecnologia = document.getElementById("tecnologia");

  select_orden.addEventListener("change", function () {
    if (tecnologia.value === "HFC") {
      if (select_orden.value === "INSTALACION DE CLARO HOGAR") {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = true;
      } else if (select_orden.value === "DOBLE - TV + INTERNET") {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (select_orden.value === "DOBLE - INTERNET + LINEA") {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = false;
        orden_linea_hfc.required = true;
      } else if (select_orden.value === "TV - BASICO INDIVIDUAL") {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (select_orden.value === "TV - DIGITAL INDIVIDUAL") {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (select_orden.value === "INTERNET INDIVIDUAL") {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = false;
        orden_linea_hfc.required = false;
      } else if (select_orden.value === "LINEA INDIVIDUAL") {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = false;
        orden_linea_hfc.required = true;
      } else if (select_orden.value === "REFRESH") {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (select_orden.value === "REACTIVACION -DOBLE - TV + INTERNET") {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (
        select_orden.value === "REACTIVACION - INSTALACION DE CLARO HOGAR"
      ) {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = true;
      } else if (
        select_orden.value === "REACTIVACION -DOBLE - INTERNET + LINEA"
      ) {
        orden_internet_hfc.required = true;
        orden_tv_hfc.required = false;
        orden_linea_hfc.required = true;
      } else if (
        select_orden.value === "REACTIVACION -TV - BASICO INDIVIDUAL"
      ) {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (
        select_orden.value === "REACTIVACION -TV - DIGITAL INDIVIDUAL"
      ) {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = true;
        orden_linea_hfc.required = false;
      } else if (select_orden.value === "REACTIVACION -LINEA INDIVIDUAL") {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = false;
        orden_linea_hfc.required = true;
      } else {
        orden_internet_hfc.required = false;
        orden_tv_hfc.required = false;
        orden_linea_hfc.required = false;
      }
    }
  });
});
