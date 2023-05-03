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
  // GPON
  const form = document.getElementById("form1");
  // const selectElements = form.querySelectorAll("select");
  // console.log("REALIZADA");
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
      case "GPON":
        // Validar los campos para GPON
        const tipo_actividadGpon =
          document.getElementById("tipo_actividadGpon").value;
        const OrdenInternet_Gpon =
          document.getElementById("OrdenInternet_Gpon").value;
        const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon").value;
        const OrdenLinea_Gpon =
          document.getElementById("OrdenLinea_Gpon").value;
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
              title:
                "Las coordenadas deben estar en el formato latitud,longitud",
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
              if (
                equipotv1Gpon !== "" &&
                parseInt(equipotv1Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
              }
              if (
                equipotv2Gpon !== "" &&
                parseInt(equipotv2Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
              }
              if (
                equipotv3Gpon !== "" &&
                parseInt(equipotv3Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
              }
              if (
                equipotv4Gpon !== "" &&
                parseInt(equipotv4Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
              }
              if (
                equipotv5Gpon !== "" &&
                parseInt(equipotv5Gpon.length) !== 12
              ) {
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
              if (
                equipotv1Gpon !== "" &&
                parseInt(equipotv1Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
              }
              if (
                equipotv2Gpon !== "" &&
                parseInt(equipotv2Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
              }
              if (
                equipotv3Gpon !== "" &&
                parseInt(equipotv3Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
              }
              if (
                equipotv4Gpon !== "" &&
                parseInt(equipotv4Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
              }
              if (
                equipotv5Gpon !== "" &&
                parseInt(equipotv5Gpon.length) !== 12
              ) {
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
              if (
                equipotv1Gpon !== "" &&
                parseInt(equipotv1Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
              }
              if (
                equipotv2Gpon !== "" &&
                parseInt(equipotv2Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
              }
              if (
                equipotv3Gpon !== "" &&
                parseInt(equipotv3Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
              }
              if (
                equipotv4Gpon !== "" &&
                parseInt(equipotv4Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
              }
              if (
                equipotv5Gpon !== "" &&
                parseInt(equipotv5Gpon.length) !== 12
              ) {
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
              if (
                equipotv1Gpon !== "" &&
                parseInt(equipotv1Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv1.";
              }
              if (
                equipotv2Gpon !== "" &&
                parseInt(equipotv2Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv2.";
              }
              if (
                equipotv3Gpon !== "" &&
                parseInt(equipotv3Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv3.";
              }
              if (
                equipotv4Gpon !== "" &&
                parseInt(equipotv4Gpon.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv4.";
              }
              if (
                equipotv5Gpon !== "" &&
                parseInt(equipotv5Gpon.length) !== 12
              ) {
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
        }

        break;
    }

    // form.reset();
  });

  const OrdenInternet_Gpon = document.getElementById("OrdenInternet_Gpon");
  const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon");
  const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon");
  const equipotvGpon = document.querySelectorAll(".equipotvGpon");
  const EqModenGpon = document.getElementById("EqModenGpon");
  const NumeroGpon = document.getElementById("NumeroGpon");

  OrdenInternet_Gpon.disabled = true;
  OrdenTv_Gpon.disabled = true;
  OrdenLinea_Gpon.disabled = true;

  if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = false;

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = true;
    }
  } else if (select_orden.value == "DOBLE - INTERNET + IPTV") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = true;

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = true;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = true;
    }

    EqModenGpon.disabled = true;
    NumeroGpon.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = true;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = true;
    }

    EqModenGpon.disabled = false;
    NumeroGpon.disabled = true;
  } else if (select_orden.value == "DOBLE - IPTV + LINEA") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = false;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }

    EqModenGpon.disabled = true;
    NumeroGpon.disabled = false;
  } else if (select_orden.value == "IPTV INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = true;

    for (let i = 0; i < equipotvGpon.length; i++) {
      equipotvGpon[i].disabled = false;
    }

    EqModenGpon.disabled = true;
    NumeroGpon.disabled = true;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = false;

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].value = "";
      }

      OrdenTv_Gpon.value = "";
    } else if (select_orden.value == "DOBLE - INTERNET + IPTV") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = true;

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      NumeroGpon.value = "";
      OrdenLinea_Gpon.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = false;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].value = "";
      }
      OrdenInternet_Gpon.value = "";
      OrdenTv_Gpon.value = "";
      EqModenGpon.value = "";
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = true;
      }

      EqModenGpon.disabled = false;
      NumeroGpon.disabled = true;

      OrdenTv_Gpon.value = "";
      OrdenLinea_Gpon.value = "";
      NumeroGpon.value = "";

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].value = "";
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
    } else if (select_orden.value == "IPTV INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = true;

      for (let i = 0; i < equipotvGpon.length; i++) {
        equipotvGpon[i].disabled = false;
      }

      EqModenGpon.disabled = true;
      NumeroGpon.disabled = true;

      OrdenLinea_Gpon.value = "";
      OrdenInternet_Gpon.value = "";
      EqModenGpon.value = "";
      NumeroGpon.value = "";
    }
  });

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
