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
      case "MIGRACION|HFC":
        const TipoActividadMigracionHfc = document.getElementById(
          "TipoActividadMigracionHfc"
        ).value;

        const equipotvmigracion1 =
          document.getElementById("equipotvmigracion1").value;
        const equipotvmigracion2 =
          document.getElementById("equipotvmigracion2").value;
        const equipotvmigracion3 =
          document.getElementById("equipotvmigracion3").value;
        const equipotvmigracion4 =
          document.getElementById("equipotvmigracion4").value;
        const equipotvmigracion5 =
          document.getElementById("equipotvmigracion5").value;
        const NOrdenMigracionHfc =
          document.getElementById("NOrdenMigracionHfc").value;
        const SyrengMigracionHfc =
          document.getElementById("SyrengMigracionHfc").value;
        const SapMigracionHfc =
          document.getElementById("SapMigracionHfc").value;
        const ObvsMigracionHfc =
          document.getElementById("ObvsMigracionHfc").value;
        const TrabajadoMigracionHfc = document.getElementById(
          "TrabajadoMigracionHfc"
        ).value;
        const RecibeMigracionHfc =
          document.getElementById("RecibeMigracionHfc").value;
        const NodoMigracionHfc =
          document.getElementById("NodoMigracionHfc").value;
        const TapMigracionRealizadaHfc = document.getElementById(
          "TapMigracionRealizadaHfc"
        ).value;
        const PosicionMigracionHfc = document.getElementById(
          "PosicionMigracionHfc"
        ).value;
        const GeorefMigracionHfc =
          document.getElementById("GeorefMigracionHfc").value;
        const MaterialesMigracionHfc = document.getElementById(
          "MaterialesMigracionHfc"
        ).value;

        if (TipoActividadMigracionHfc === "REALIZADA") {
          if (
            codigo_tecnico === "" ||
            telefono === "" ||
            tecnico === "" ||
            motivo_llamada === "" ||
            Select_Postventa === "" ||
            select_orden === "" ||
            dpto_colonia === "" ||
            tecnologia === "" ||
            TipoActividadMigracionHfc === "" ||
            NOrdenMigracionHfc === "" ||
            SyrengMigracionHfc === "" ||
            SapMigracionHfc === "" ||
            ObvsMigracionHfc === "" ||
            TrabajadoMigracionHfc === "" ||
            RecibeMigracionHfc === "" ||
            NodoMigracionHfc === "" ||
            TapMigracionRealizadaHfc === "" ||
            PosicionMigracionHfc === "" ||
            GeorefMigracionHfc === "" ||
            MaterialesMigracionHfc === ""
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

          if (!/^\d{8}$/.test(SyrengMigracionHfc)) {
            Swal.fire({
              icon: "error",
              title: "El N° Syreng debe tener 8 digitos validos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          if (!regexCoordenadas.test(GeorefMigracionHfc)) {
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

          if (!/^\d{8}$/.test(NOrdenMigracionHfc)) {
            Swal.fire({
              icon: "error",
              title: "El N° Orden debe tener 8 digitos validos",
              showConfirmButton: false,
              timer: 1900,
            });
            event.preventDefault();
            return false;
          }

          // VALIDAR POR EQUIPO DE TV

          let errorMensajeTv = "";

          switch (Select_Postventa) {
            case "MIGRACION":
              if (
                equipotvmigracion1 === "" &&
                equipotvmigracion2 === "" &&
                equipotvmigracion3 === "" &&
                equipotvmigracion4 === "" &&
                equipotvmigracion5 === ""
              ) {
                errorMensajeTv = "Debes ingresar al menos un Equipo TV";
              }
              if (
                equipotvmigracion1 !== "" &&
                parseInt(equipotvmigracion1.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 1.";
              }
              if (
                equipotvmigracion2 !== "" &&
                parseInt(equipotvmigracion2.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 2.";
              }
              if (
                equipotvmigracion3 !== "" &&
                parseInt(equipotvmigracion3.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 3 .";
              }
              if (
                equipotvmigracion4 !== "" &&
                parseInt(equipotvmigracion4.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 4.";
              }
              if (
                equipotvmigracion5 !== "" &&
                parseInt(equipotvmigracion5.length) !== 12
              ) {
                errorMensajeTv = "Debes ingresar 12 digitos en Equipo Tv 5.";
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
        }
        break;
    }
  });
});
