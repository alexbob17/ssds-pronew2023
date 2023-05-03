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
      case "HFC":
        // Validar los campos para HFC
        const tipo_actividad = document.getElementById("tipo_actividad").value;
        const orden_linea_hfc =
          document.getElementById("orden_linea_hfc").value;
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
        const EquipoModem_Hfc =
          document.getElementById("EquipoModem_Hfc").value;
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
                errorMensaje =
                  "Debes ingresar el N° Orden Internet / N° Linea.";
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
        }

        break;

        break;
    }

    // form.reset();
  });

  // HFC
  const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");
  const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");
  const equipotvHfc = document.querySelectorAll(".equipotvHfc");
  const sapHfc = document.getElementById("sapHfc");
  const syrengHfc = document.getElementById("syrengHfc");
  const GeorefHfc = document.getElementById("GeorefHfc");
  const RecibeHfc = document.getElementById("RecibeHfc");
  const NodoHfc = document.getElementById("NodoHfc");
  const TapHfc = document.getElementById("TapHfc");
  const PosicionHfc = document.getElementById("PosicionHfc");
  const MaterialesHfc = document.getElementById("MaterialesHfc");

  const select_orden = document.getElementById("select_orden");
  const tecnologia = document.getElementById("tecnologia");

  const [orden_tv_hfc, orden_internet_hfc, orden_linea_hfc] =
    document.querySelectorAll(
      "#orden_tv_hfc, #orden_internet_hfc, #orden_linea_hfc"
    );

  orden_tv_hfc.disabled = true;
  orden_internet_hfc.disabled = true;
  orden_linea_hfc.disabled = true;

  if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    hideVoip_Hfc.disabled = false;
    EquipoModem_Hfc.disabled = false;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = false;
    EquipoModem_Hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    EquipoModem_Hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = false;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "TV - DIGITAL INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "TV - BASICO INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    hideVoip_Hfc.disabled = true;
    EquipoModem_Hfc.disabled = false;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = true;
    EquipoModem_Hfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }
  } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    sapHfc.disabled = true;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = false;
    hideVoip_Hfc.disabled = true;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = true;
    }

    EquipoModem_Hfc.disabled = true;
    hideVoip_Hfc.disabled = false;
    sapHfc.disabled = true;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  } else if (
    select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
  ) {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;

    for (let i = 0; i < equipotvHfc.length; i++) {
      equipotvHfc[i].disabled = false;
    }

    hideVoip_Hfc.disabled = false;
    EquipoModem_Hfc.disabled = false;
    sapHfc.disabled = false;
    syrengHfc.disabled = false;
    GeorefHfc.disabled = false;
    RecibeHfc.disabled = false;
    NodoHfc.disabled = false;
    TapHfc.disabled = false;
    PosicionHfc.disabled = false;
    MaterialesHfc.disabled = false;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = false;
      EquipoModem_Hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      EquipoModem_Hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      hideVoip_Hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
      EquipoModem_Hfc.value = "";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_linea_hfc.value = "";
      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }

      hideVoip_Hfc.value = "";
    } else if (select_orden.value == "TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
    } else if (select_orden.value == "TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      hideVoip_Hfc.disabled = true;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      hideVoip_Hfc.value = "";
      orden_linea_hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = true;
      EquipoModem_Hfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      sapHfc.value = "";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      sapHfc.disabled = true;
      MaterialesHfc.disabled = false;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
      EquipoModem_Hfc.value = "";
      hideVoip_Hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = false;
      hideVoip_Hfc.disabled = true;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_linea_hfc.value = "";
      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }

      hideVoip_Hfc.value = "";
      sapHfc.value = "";
    } else if (select_orden.value == "REACTIVACION -LINEA INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = true;
      }

      EquipoModem_Hfc.disabled = true;
      hideVoip_Hfc.disabled = false;
      sapHfc.disabled = true;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
      sapHfc.value = "";
      EquipoModem_Hfc.value = "";

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].value = "";
      }
    } else if (select_orden.value == "DOBLE - IPTV + LINEA") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = false;

      OrdenInternet_Gpon.value = "";
      EqModenGpon.value = "";
    } else if (
      select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
    ) {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      for (let i = 0; i < equipotvHfc.length; i++) {
        equipotvHfc[i].disabled = false;
      }

      hideVoip_Hfc.disabled = false;
      EquipoModem_Hfc.disabled = false;
      sapHfc.disabled = false;
      syrengHfc.disabled = false;
      GeorefHfc.disabled = false;
      RecibeHfc.disabled = false;
      NodoHfc.disabled = false;
      TapHfc.disabled = false;
      PosicionHfc.disabled = false;
      MaterialesHfc.disabled = false;
    }
  });

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
    } else if (select_orden.value === "REACTIVACION -TV - BASICO INDIVIDUAL") {
      orden_internet_hfc.required = false;
      orden_tv_hfc.required = true;
      orden_linea_hfc.required = false;
    } else if (select_orden.value === "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
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

  function resetValues() {
    const EquipoModem_Hfc = document.getElementById("EquipoModem_Hfc");
    const equipotvHfc = document.querySelectorAll(".equipotvHfc");
    const sapHfc = document.getElementById("sapHfc");
    const orden_tv_hfc = document.getElementById("orden_tv_hfc");
    const orden_internet_hfc = document.getElementById("orden_internet_hfc");
    const orden_linea_hfc = document.getElementById("orden_linea_hfc");
    const hideVoip_Hfc = document.getElementById("numeroVoip_hfc");

    EquipoModem_Hfc.value = "";
    orden_internet_hfc.value = "";
    orden_tv_hfc.value = "";
    orden_linea_hfc.value = "";
    hideVoip_Hfc.value = "";
    syrengHfc.value = "";
    GeorefHfc.value = "";
    RecibeHfc.value = "";
    NodoHfc.value = "";
    TapHfc.value = "";
    PosicionHfc.value = "";
    MaterialesHfc.value = "";
    sapHfc.value = "";

    equipotvHfc.forEach((equipotv) => {
      equipotv.value = "";
    });
  }
});
