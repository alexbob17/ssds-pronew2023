document.addEventListener("DOMContentLoaded", function () {
  console.log("CARGADO REALIZADO HFC");

  const form = document.getElementById("form1");
  const regexCoordenadas =
    /^[-]?[0-9]{1,2}[.]?[0-9]*[,][-]?[0-9]{1,3}[.]?[0-9]*$/;

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

  form.addEventListener("submit", function (event) {
    const codigo_tecnico = document.getElementById("codigo_tecnico").value;
    const telefono = document.getElementById("telefono").value;
    const tecnico = document.getElementById("tecnico").value;
    const motivo_llamada = document.getElementById("motivo_llamada").value;
    const select_orden = document.getElementById("select_orden").value;
    const tecnologia = document.getElementById("tecnologia").value;
    const dpto_colonia = document.getElementById("dpto_colonia").value;
    const Select_Postventa = document.getElementById("Select_Postventa").value;

    // OBTENEMOS EL SELECT POSTVENTA
    const selectPostventa = document.querySelector(
      "select[name='Select_Postventa']"
    );

    const selectTecnologia = document.querySelector(
      "select[name='tecnologia']"
    );

    switch (selectPostventa.value + "|" + selectTecnologia.value) {
      case "RECONEXION / RETIRO|HFC":
        const TipoActividadReconexionHfc = document.getElementById(
          "TipoActividadReconexionHfc"
        ).value;
        const EquipoModemRetiroHfc = document.getElementById(
          "EquipoModemRetiroHfc"
        ).value;

        const OrdenRetiroHfc = document.getElementById("OrdenRetiroHfc").value;
        const TrabajadoRetiroHfc =
          document.getElementById("TrabajadoRetiroHfc").value;
        const ObvsRetiroHfc = document.getElementById("ObvsRetiroHfc").value;
        const RecibeRetiroHfc =
          document.getElementById("RecibeRetiroHfc").value;
        const MaterialesRetiroHfc = document.getElementById(
          "MaterialesRetiroHfc"
        ).value;

        if (TipoActividadReconexionHfc === "REALIZADA") {
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            Select_Postventa === "" ||
            select_orden === "" ||
            dpto_colonia === "" ||
            tecnologia === "" ||
            TipoActividadReconexionHfc === "" ||
            OrdenRetiroHfc === "" ||
            TrabajadoRetiroHfc === "" ||
            ObvsRetiroHfc === "" ||
            RecibeRetiroHfc === "" ||
            MaterialesRetiroHfc === ""
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
          if (parseInt(OrdenRetiroHfc.length) !== 8) {
            // checkError.style.display = "block";
            Swal.fire({
              icon: "error",
              title: "El N° Orden debe tener 8 digitos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          let errorMensaje = "";

          switch (select_orden) {
            case "RETIRO ACOMETIDO":
              if (EquipoModemRetiroHfc === "") {
                errorMensaje = "Debes ingresar el N° Equipo";
              }
              if (
                EquipoModemRetiroHfc !== "" &&
                parseInt(EquipoModemRetiroHfc.length) !== 12
              ) {
                errorMensaje = "Debes ingresar 12 digitos en N° Equipo";
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
        }

        break;
    }
  });

  const selectHide_TipoOrden = document.getElementById("select_orden");
  const EquipoModemRetiroHfc = document.getElementById("EquipoModemRetiroHfc");
  const hiddenEquipoRetirar = document.getElementById("hiddenEquipoRetirar");

  EquipoModemRetiroHfc.disabled = true;
  hiddenEquipoRetirar.style.display = "none";
  EquipoModemRetiroHfc.required = false;
  // DISABLE POR TIPO ORDEN EN CAMBIO DE EQUIPO

  selectHide_TipoOrden.addEventListener("change", () => {
    const value = selectHide_TipoOrden.value;
    // selectHide_TipoOrdenGpon.style.display = "none";

    switch (value) {
      case "RECONEXION":
        EquipoModemRetiroHfc.disabled = true;
        hiddenEquipoRetirar.style.display = "none";
        EquipoModemRetiroHfc.value = "";

        break;
      case "RETIRO":
        EquipoModemRetiroHfc.disabled = true;
        hiddenEquipoRetirar.style.display = "none";
        EquipoModemRetiroHfc.value = "";

        break;
      case "RETIRO ACOMETIDO":
        EquipoModemRetiroHfc.disabled = false;
        hiddenEquipoRetirar.style.display = "block";
        EquipoModemRetiroHfc.value = "";

        break;
      default:
        EquipoModemRetiroHfc.disabled = true;
        hiddenEquipoRetirar.style.display = "none";
        EquipoModemRetiroHfc.value = "";
        break;
    }
  });

  if (selectHide_TipoOrden.value === "RECONEXION") {
    EquipoModemRetiroHfc.disabled = true;
    hiddenEquipoRetirar.style.display = "none";
    EquipoModemRetiroHfc.value = "";
    EquipoModemRetiroHfc.required = false;
  }
  if (selectHide_TipoOrden.value === "RETIRO") {
    EquipoModemRetiroHfc.disabled = true;
    hiddenEquipoRetirar.style.display = "none";
    EquipoModemRetiroHfc.value = "";
    EquipoModemRetiroHfc.required = false;
  }
  if (selectHide_TipoOrden.value === "RETIRO ACOMETIDO") {
    EquipoModemRetiroHfc.disabled = false;
    hiddenEquipoRetirar.style.display = "block";
    EquipoModemRetiroHfc.required = true;
  }
  if (selectHide_TipoOrden.value === "RETIRO CM") {
    EquipoModemRetiroHfc.disabled = true;
    hiddenEquipoRetirar.style.display = "none";
    EquipoModemRetiroHfc.value = "";
    EquipoModemRetiroHfc.required = false;
  }
});
