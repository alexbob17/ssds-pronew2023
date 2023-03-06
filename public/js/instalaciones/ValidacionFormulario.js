const tecnologia = document.getElementById("tecnologia");
const checkValid = document.getElementById("checkValid");
const checkError = document.getElementById("checkError");
const checkValid1 = document.getElementById("checkValid1");
const checkError1 = document.getElementById("checkError1");
const regexCoordenadas =
  /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

checkValid.style.display = "none";
checkError.style.display = "none";
checkError1.style.display = "none";
checkValid1.style.display = "none";

// console.log("Orden Internet:", document.getElementById("OrdenLinea_Gpon"));

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
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
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
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
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
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
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
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Linea.";
            }
            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
            }
            break;
          case "IPTV INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° IPTV.";
            }
            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
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
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv5.";
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
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv5.";
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
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv5.";
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
            if (equipotv1Gpon !== "" && parseInt(equipotv1Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv1.";
            }
            if (equipotv2Gpon !== "" && parseInt(equipotv2Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv2.";
            }
            if (equipotv3Gpon !== "" && parseInt(equipotv3Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv3.";
            }
            if (equipotv4Gpon !== "" && parseInt(equipotv4Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv4.";
            }
            if (equipotv5Gpon !== "" && parseInt(equipotv5Gpon.length) !== 10) {
              errorMensajeTv = "Debes ingresar 10 digitos en Equipo Tv5.";
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
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos Equipo Modem.";
            }
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el Numero Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos Numero Gpon.";
            }
            break;
          case "DOBLE - INTERNET + IPTV":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos Equipo Modem.";
            }

            break;
          case "DOBLE - INTERNET + LINEA":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos Equipo Modem.";
            }
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el Numero Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos Numero Gpon.";
            }
            break;
          case "DOBLE - IPTV + LINEA":
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el Numero Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos Numero Gpon.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (EqModenGpon === "") {
              errorMensaje3 = "Debes ingresar el Equipo Modem";
            }
            if (EqModenGpon !== "" && parseInt(EqModenGpon.length) !== 16) {
              errorMensaje3 = "Debes ingresar 16 digitos Equipo Modem.";
            }
            break;
          case "LINEA INDIVIDUAL":
            break;
          case "IPTV INDIVIDUAL":
            if (NumeroGpon === "") {
              errorMensaje3 = "Debes ingresar el Numero Gpon";
            }
            if (NumeroGpon !== "" && parseInt(NumeroGpon.length) !== 8) {
              errorMensaje3 = "Debes ingresar 8 digitos Numero Gpon.";
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
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
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
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
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
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
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
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
            }

            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
            }
            break;
          case "INTERNET INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Internet";
            }
            if (
              OrdenInternet_Gpon !== "" &&
              parseInt(OrdenInternet_Gpon.length) !== 8
            ) {
              errorMensaje =
                "El número de orden de internet debe tener 8 dígitos.";
            }

            break;
          case "LINEA INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° Linea.";
            }
            if (
              OrdenLinea_Gpon !== "" &&
              parseInt(OrdenLinea_Gpon.length) !== 8
            ) {
              errorMensaje = "El número de orden Linea debe tener 8 dígitos.";
            }
            break;
          case "IPTV INDIVIDUAL":
            if (
              OrdenInternet_Gpon.trim() === "" &&
              OrdenTv_Gpon.trim() === "" &&
              OrdenLinea_Gpon.trim() === ""
            ) {
              errorMensaje = "Debes ingresar el N° IPTV.";
            }
            if (OrdenTv_Gpon !== "" && parseInt(OrdenTv_Gpon.length) !== 8) {
              errorMensaje = "El número de orden Tv debe tener 8 dígitos.";
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

        // select_orden.addEventListener("change", function () {
        //   var selectedOption = this.value;

        //   // Validar que se haya ingresado al menos un campo para la opción seleccionada
        //   switch (selectedOption) {
        //     case "INSTALACION DE CLARO HOGAR":
        //       if (
        //         OrdenInternet_Gpon.value.trim() === "" &&
        //         OrdenTv_Gpon.value.trim() === "" &&
        //         OrdenLinea_Gpon.value.trim() === ""
        //       ) {
        //         errorMensaje =
        //           "Debes ingresar al menos una orden INSTALACION CLARO HOGAR.";
        //       }
        //       break;
        //     case "DOBLE - IPTV + LINEA":
        //       if (
        //         OrdenTv_Gpon.value.trim() === "" &&
        //         OrdenLinea_Gpon.value.trim() === ""
        //       ) {
        //         errorMensaje =
        //           "Debes ingresar al menos una orden IPTV + LINEA.";
        //       }
        //       break;
        //     case "DOBLE - INTERNET + LINEA":
        //       if (
        //         OrdenInternet_Gpon.value.trim() === "" &&
        //         OrdenTv_Gpon.value.trim() === ""
        //       ) {
        //         errorMensaje =
        //           "Debes ingresar al menos una orden INTERNET + LINEA.";
        //       }
        //       break;
        //   }
        //   if (errorMensaje !== "") {
        //     Swal.fire({
        //       icon: "error",
        //       title: errorMensaje,
        //       showConfirmButton: false,
        //       timer: 1900,
        //     });
        //     event.preventDefault();
        //     return false;
        //   }
        // });
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
            title: "Orden Linea debe tener 8 digitos",
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
            title: "Orden Linea debe tener 8 digitos",
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
            title: "Orden Linea debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
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
            title: "Orden Tv debe tener 8 digitos",
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
            title: "Syreng debe tener 8 digitos",
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

        if (SmarcardDth1 !== "" && parseInt(SmarcardDth1.length) !== 10) {
          Swal.fire({
            icon: "error",
            title: "Smarcard 1 debe tener 10 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
        if (SmarcardDth2 !== "" && parseInt(SmarcardDth2.length) !== 10) {
          Swal.fire({
            icon: "error",
            title: "Smarcard 2 debe tener 10 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (SmarcardDth3 !== "" && parseInt(SmarcardDth3.length) !== 10) {
          Swal.fire({
            icon: "error",
            title: "Smarcard 3 debe tener 10 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
        if (SmarcardDth4 !== "" && parseInt(SmarcardDth4.length) !== 10) {
          Swal.fire({
            icon: "error",
            title: "Smarcard 4 debe tener 10 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (SmarcardDth5 !== "" && parseInt(SmarcardDth5.length) !== 10) {
          Swal.fire({
            icon: "error",
            title: "Smarcard 5 debe tener 10 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (StbDth1 !== "" && parseInt(StbDth1.length) !== 12) {
          Swal.fire({
            icon: "error",
            title: "STB 1 debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (StbDth2 !== "" && parseInt(StbDth2.length) !== 12) {
          Swal.fire({
            icon: "error",
            title: "STB 2 debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (StbDth3 !== "" && parseInt(StbDth3.length) !== 12) {
          Swal.fire({
            icon: "error",
            title: "STB 3 debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (StbDth4 !== "" && parseInt(StbDth4.length) !== 12) {
          Swal.fire({
            icon: "error",
            title: "STB 4 debe tener 12 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }

        if (StbDth5 !== "" && parseInt(StbDth5.length) !== 12) {
          Swal.fire({
            icon: "error",
            title: "STB 5 debe tener 12 digitos",
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
        // checkValid.style.display = "none";
        // checkError.style.display = "none";
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

        if (parseInt(orden_internetAdsl.length) !== 8) {
          // checkError.style.display = "block";
          Swal.fire({
            icon: "error",
            title: "N Orden debe tener 8 digitos",
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
            title: "Orden internet debe tener 8 digitos",
            showConfirmButton: false,
            timer: 1900,
          });
          event.preventDefault();
          return false;
        }
      }
      break;
  }
});

// var ErrorOrdenInternetAdsl = document.getElementById("ErrorOrdenInternetAdsl");

// ErrorOrdenInternetAdsl.style.display = "none";

// function ValidateOrdenInternet() {
//   const orden_internetAdsl = document.getElementById("orden_internet_adsl");

//   orden_internetAdsl.addEventListener("keyup", function () {
//     if (orden_internetAdsl.value.length > 8) {
//       checkValid.style.display = "none";
//       checkError.style.display = "block";
//       ErrorOrdenInternetAdsl.style.display = "block";
//     } else if (orden_internetAdsl === 0) {
//       checkValid.style.display = "none";
//       checkError.style.display = "block";
//     } else {
//       checkValid.style.display = "block";
//       checkError.style.display = "none";
//       ErrorOrdenInternetAdsl.style.display = "none";
//     }
//   });
// }
