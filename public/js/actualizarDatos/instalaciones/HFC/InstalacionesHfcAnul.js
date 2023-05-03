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
  // HFC

  const form = document.getElementById("form1");
  // const selectElements = form.querySelectorAll("select");
  // console.log("ANULADA");

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
        const orden_linea_hfc =
          document.getElementById("orden_linea_hfc").value;
        const orden_tv_hfc = document.getElementById("orden_tv_hfc").value;
        const orden_internet_hfc =
          document.getElementById("orden_internet_hfc").value;
        if (tipo_actividad === "ANULACION") {
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
        }

        break;
    }

    // form.reset();
  });

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
  } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
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
  } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = true;
  } else if (select_orden.value == "REACTIVACION -LINEA INDIVIDUAL") {
    orden_tv_hfc.disabled = true;
    orden_internet_hfc.disabled = true;
    orden_linea_hfc.disabled = false;
  } else if (
    select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
  ) {
    orden_tv_hfc.disabled = false;
    orden_internet_hfc.disabled = false;
    orden_linea_hfc.disabled = false;
  }

  select_orden.addEventListener("change", function () {
    if (select_orden.value == "INSTALACION DE CLARO HOGAR") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;
    } else if (select_orden.value == "DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
    } else if (select_orden.value == "DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_linea_hfc.value = "";
    } else if (select_orden.value == "LINEA INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
    } else if (select_orden.value == "INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_tv_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - TV + INTERNET") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -DOBLE - INTERNET + LINEA") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;

      orden_tv_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -TV - DIGITAL INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -TV - BASICO INDIVIDUAL") {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = true;
      orden_linea_hfc.disabled = true;

      orden_internet_hfc.value = "";
      orden_linea_hfc.value = "";
    } else if (select_orden.value == "REACTIVACION -INTERNET INDIVIDUAL") {
      orden_tv_hfc.disabled = true;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = true;

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

      orden_tv_hfc.value = "";
      orden_internet_hfc.value = "";
    } else if (
      select_orden.value == "REACTIVACION - INSTALACION DE CLARO HOGAR"
    ) {
      orden_tv_hfc.disabled = false;
      orden_internet_hfc.disabled = false;
      orden_linea_hfc.disabled = false;
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
});
