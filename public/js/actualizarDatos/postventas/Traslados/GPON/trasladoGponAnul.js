document.addEventListener("DOMContentLoaded", function () {
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
      case "TRASLADO|GPON":
        const TipoActividadTrasladoGpon = document.getElementById(
          "TipoActividadTrasladoGpon"
        ).value;

        if (TipoActividadTrasladoGpon === "ANULACION") {
          const OrdenTvTraslAnuladoGpon = document.getElementById(
            "OrdenTvTraslAnuladoGpon"
          ).value;
          const OrdenIntTrasladoAnulGpon = document.getElementById(
            "OrdenIntTrasladoAnulGpon"
          ).value;
          const OrdenLineaTraslAnulGpon = document.getElementById(
            "OrdenLineaTraslAnulGpon"
          ).value;
          const MotivoTrasladoAnulada_Gpon = document.getElementById(
            "MotivoTrasladoAnulada_Gpon"
          ).value;
          const TrabajadoAnuladaTraslado_gpon = document.getElementById(
            "TrabajadoAnuladaTraslado_gpon"
          ).value;
          const ComentarioTrasladoAnulada_Gpon = document.getElementById(
            "ComentarioTrasladoAnulada_Gpon"
          ).value;

          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            Select_Postventa === "" ||
            select_orden === "" ||
            dpto_colonia === "" ||
            tecnologia === "" ||
            TipoActividadTrasladoGpon === "" ||
            // OrdenTvTraslAnuladoGpon === "" ||
            // OrdenIntTrasladoAnulGpon === "" ||
            // OrdenLineaTraslAnulGpon === "" ||
            MotivoTrasladoAnulada_Gpon === "" ||
            TrabajadoAnuladaTraslado_gpon === "" ||
            ComentarioTrasladoAnulada_Gpon === ""
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

          switch (Select_Postventa) {
            case "TRASLADO":
              if (
                OrdenTvTraslAnuladoGpon === "" &&
                OrdenIntTrasladoAnulGpon === "" &&
                OrdenLineaTraslAnulGpon === ""
              ) {
                errorMensaje = "Debes ingresar al menos un N° Orden";
              }
              if (
                OrdenTvTraslAnuladoGpon !== "" &&
                parseInt(OrdenTvTraslAnuladoGpon.length) !== 8
              ) {
                errorMensaje = "Debes ingresar 8 digitos en N° Orden Tv";
              }
              if (
                OrdenIntTrasladoAnulGpon !== "" &&
                parseInt(OrdenIntTrasladoAnulGpon.length) !== 8
              ) {
                errorMensaje = "Debes ingresar 8 digitos en N° Orden Internet";
              }
              if (
                OrdenLineaTraslAnulGpon !== "" &&
                parseInt(OrdenLineaTraslAnulGpon.length) !== 8
              ) {
                errorMensaje = "Debes ingresar 8 digitos en N° Orden Linea";
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
});
