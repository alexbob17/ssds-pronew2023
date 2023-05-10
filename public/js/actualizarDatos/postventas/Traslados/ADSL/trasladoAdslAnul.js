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
      case "TRASLADO|ADSL":
        const TipoActividadTrasladoAdsl = document.getElementById(
          "TipoActividadTrasladoAdsl"
        ).value;

        if (TipoActividadTrasladoAdsl === "ANULACION") {
          const MotivoTrasladoAnulada_Adsl = document.getElementById(
            "MotivoTrasladoAnulada_Adsl"
          ).value;
          const NOrdenTrasladosAnulAdsl = document.getElementById(
            "NOrdenTrasladosAnulAdsl"
          ).value;
          const TrabajadoTrasladoTrAnulada_Adsl = document.getElementById(
            "TrabajadoTrasladoTrAnulada_Adsl"
          ).value;
          const ComentarioTrasladoAnulada_Adsl = document.getElementById(
            "ComentarioTrasladoAnulada_Adsl"
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
            TipoActividadTrasladoAdsl === "" ||
            MotivoTrasladoAnulada_Adsl === "" ||
            NOrdenTrasladosAnulAdsl === "" ||
            TrabajadoTrasladoTrAnulada_Adsl === "" ||
            ComentarioTrasladoAnulada_Adsl === ""
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
          if (parseInt(NOrdenTrasladosAnulAdsl.length) !== 8) {
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
        }

        break;
    }
  });
});
