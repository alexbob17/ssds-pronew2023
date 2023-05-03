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

document.addEventListener("DOMContentLoaded", function (event) {
  // GPON

  const form = document.getElementById("form1");
  // const selectElements = form.querySelectorAll("select");

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

        if (tipo_actividadGpon === "ANULACION") {
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
    }

    // form.reset();
  });

  const OrdenInternet_Gpon = document.getElementById("OrdenInternet_Gpon");
  const OrdenTv_Gpon = document.getElementById("OrdenTv_Gpon");
  const OrdenLinea_Gpon = document.getElementById("OrdenLinea_Gpon");

  OrdenInternet_Gpon.disabled = true;
  OrdenTv_Gpon.disabled = true;
  OrdenLinea_Gpon.disabled = true;

  if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = false;
  } else if (select_orden.value == "DOBLE - INTERNET + IPTV") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = true;
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = false;
    OrdenTv_Gpon.disabled = true;
    OrdenLinea_Gpon.disabled = true;
  } else if (select_orden.value == "DOBLE - IPTV + LINEA") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = false;
  } else if (select_orden.value == "IPTV INDIVIDUAL") {
    OrdenInternet_Gpon.disabled = true;
    OrdenTv_Gpon.disabled = false;
    OrdenLinea_Gpon.disabled = true;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = false;

      OrdenTv_Gpon.value = "";
    } else if (select_orden.value == "DOBLE - INTERNET + IPTV") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = true;

      OrdenLinea_Gpon.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = false;

      OrdenInternet_Gpon.value = "";
      OrdenTv_Gpon.value = "";
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = false;
      OrdenTv_Gpon.disabled = true;
      OrdenLinea_Gpon.disabled = true;

      OrdenTv_Gpon.value = "";
      OrdenLinea_Gpon.value = "";
    } else if (select_orden.value == "DOBLE - IPTV + LINEA") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = false;

      OrdenInternet_Gpon.value = "";
    } else if (select_orden.value == "IPTV INDIVIDUAL") {
      OrdenInternet_Gpon.disabled = true;
      OrdenTv_Gpon.disabled = false;
      OrdenLinea_Gpon.disabled = true;

      OrdenLinea_Gpon.value = "";
      OrdenInternet_Gpon.value = "";
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

  // const form = document.getElementById("form1");
});
